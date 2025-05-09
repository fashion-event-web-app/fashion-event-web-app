<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/auth.php';
require_once __DIR__.'/../includes/db.php';
session_start();

// Only redirect to profile if this is a POST login attempt from an already logged-in user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    header("Location: ../dashboards/profile.php");
    exit();
}

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    try {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT user_id, username, email, password_hash FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password_hash"])) {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["user_name"] = $user["username"];
            $_SESSION["user_email"] = $user["email"];
            
            session_regenerate_id(true);
            
            // Redirect to either the requested page or profile
            if (isset($_SESSION['redirect_to'])) {
                $target = $_SESSION['redirect_to'];
                unset($_SESSION['redirect_to']);
                header("Location: $target");
            } else {
                header("Location: ../dashboards/profile.php");
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        error_log("Login error: ".$e->getMessage());
        $error = "System error. Please try again later.";
    }
}

// Set error reporting (should be at top, but kept here for context)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Fashion Event Web</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
  <div class="auth-container">
    <header class="auth-header">
      <h1>Welcome Back</h1>
      <p>Login to your fashion account</p>
    </header>

    <main class="auth-form">
      <?php if ($error): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="btn-primary">Login</button>
      </form>

      <div class="auth-footer">
        <p>Don't have an account? <a href="signup.php" class="active">signup</a></p>
      </div>
    </main>
  </div>
</body>
</html>