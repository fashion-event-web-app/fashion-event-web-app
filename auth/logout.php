<?php
// auth/logout.php
require_once __DIR__.'/../includes/config.php';
session_start();

// Regenerate session ID for security
session_regenerate_id(true);

// Unset all session variables
$_SESSION = [];

// Destroy the session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

// Redirect with success message
header("Location: ".BASE_URL."?logout=1");
exit;
?>