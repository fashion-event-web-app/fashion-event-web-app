<?php
class Auth {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->startSession();
    }

    private function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        if (!isset($_SESSION['user_id']) ||
            $_SESSION['user_ip'] != $_SERVER['REMOTE_ADDR'] ||
            $_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']) {
            return false;
        }
        return true;
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}

// Helper function to check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}
