<?php
class Router {
    private $routes = [];
    private $errorHandlers = [];

    public function __construct() {
        // Register default error handlers
        $this->errorHandlers = [
            404 => function() {
                http_response_code(404);
                $this->renderErrorPage('404.php', 'Page Not Found');
            },
            500 => function() {
                http_response_code(500);
                $this->renderErrorPage('500.php', 'Server Error');
            }
        ];
    }

    public function addRoute(string $route, callable $callback): void {
        $this->routes[$route] = $callback;
    }

    public function setErrorHandler(int $statusCode, callable $handler): void {
        $this->errorHandlers[$statusCode] = $handler;
    }

    public function dispatch(string $url): void {
        try {
            $url = $this->sanitizeUrl($url);
            
            if (array_key_exists($url, $this->routes)) {
                call_user_func($this->routes[$url]);
                return;
            }

            // Try pattern matching for dynamic routes
            foreach ($this->routes as $route => $callback) {
                if ($this->matchRoute($route, $url)) {
                    call_user_func($callback);
                    return;
                }
            }

            $this->triggerError(404);
            
        } catch (Throwable $e) {
            error_log("Router Error: " . $e->getMessage());
            $this->triggerError(500);
        }
    }

    private function sanitizeUrl(string $url): string {
        $url = trim(parse_url($url, PHP_URL_PATH), '/');
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    private function matchRoute(string $route, string $url): bool {
        // Convert route pattern to regex
        $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[^/]+)', $route);
        $pattern = "@^$pattern$@i";
        
        if (preg_match($pattern, $url, $matches)) {
            foreach ($matches as $key => $value) {
                if (is_string($key)) {
                    $_GET[$key] = $value;
                }
            }
            return true;
        }
        return false;
    }

    private function triggerError(int $statusCode): void {
        if (isset($this->errorHandlers[$statusCode])) {
            call_user_func($this->errorHandlers[$statusCode]);
        } else {
            http_response_code($statusCode);
            die("HTTP Error $statusCode");
        }
        exit;
    }

    private function renderErrorPage(string $view, string $message): void {
        $errorFile = __DIR__.'/../views/errors/'.$view;
        if (file_exists($errorFile)) {
            include $errorFile;
        } else {
            die($message);
        }
    }
}