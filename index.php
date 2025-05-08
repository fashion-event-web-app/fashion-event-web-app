<?php
// Enable strict error reporting
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Define application root
define('APP_ROOT', __DIR__);

// Load configuration
require_once APP_ROOT . '/includes/config.php';
require_once APP_ROOT . '/includes/router.php';

// Initialize router with error handling
try {
    $router = new Router();
    
    // Route definitions with validation
    $routes = [
        ''           => 'index-content.php',
        'login'      => 'auth/login.php',
        'signup'     => 'auth/signup.php',
        'profile'    => 'dashboards/profile.php',
        'outfit'     => 'dashboards/Outfit.php',
        'event'      => 'dashboards/Event.php',
        'voting'     => 'dashboards/Voting.php',
        'suggestions'=> 'dashboards/Suggestions.php',
        'settings'   => 'dashboards/Settings.php'
    ];

    foreach ($routes as $path => $file) {
        $router->addRoute($path, function() use ($file) {
            $fullPath = APP_ROOT . '/' . $file;
            
            if (!file_exists($fullPath)) {
                error_log("Missing route file: $fullPath");
                throw new RuntimeException("Route handler missing");
            }
            
            include $fullPath;
        });
    }

    // Get clean request path
    $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestPath = trim($requestPath, '/');
    
    // Debug logging
    error_log("Dispatching route: $requestPath");
    
    // Dispatch with error handling
    $router->dispatch($requestPath);

} catch (Throwable $e) {
    // Centralized error handling
    error_log("Application error: " . $e->getMessage());
    
    http_response_code(500);
    if (file_exists(APP_ROOT . '/500.php')) {
        include APP_ROOT . '/500.php';
    } else {
        die('Application error - please try again later');
    }
}