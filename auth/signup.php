<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/auth.php';
require_once __DIR__.'/../includes/db.php';
session_start();

// Initialize variables
$error = '';
$full_name = '';
$email = '';
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $full_name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Simple validation
    if (empty($full_name) || empty($email) || strlen($password) < 8 || $password !== $confirm_password) {
        $error = "Please check: Name, valid email, and matching passwords (8+ chars)";
    } else {
        try {
            $db = Database::getInstance();
            
            // Check if email exists (simplified)
            $check = $db->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
            $check->execute([$email]);
            
            if ($check->fetch()) {
                $error = "This email is already registered";
            } else {
                // Create username and hash password
                $username = strtolower(str_replace(' ', '.', $full_name));
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert user (simplified query)
                $stmt = $db->prepare(
                    "INSERT INTO users (username, full_name, email, password_hash) 
                    VALUES (?, ?, ?, ?)"
                );
                
                if ($stmt->execute([$username, $full_name, $email, $hashed_password])) {
                    $_SESSION['signup_success'] = true;
                    header("Location: login.php");
                    exit;
                }
            }
        } catch (Exception $e) {
            // Safe error message for users
            $error = "System busy. Please try again shortly.";
            // Detailed error for debugging (check XAMPP logs)
            error_log("SIGNUP ERROR: " . date('Y-m-d H:i:s') . " - " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | Fashion Event Web</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
  <div class="auth-container">
    <header class="auth-header">
      <h1>Create Account</h1>
      <p>Join our fashion community</p>
    </header>

    <main class="auth-form">
      <?php if (isset($_SESSION['signup_success'])): ?>
        <?php unset($_SESSION['signup_success']); ?>
        <div class="alert success">Registration successful! Please login.</div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="alert error"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form method="POST" novalidate>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($full_name); ?>" required>
        </div>
        
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required minlength="8">
          <small>Minimum 8 characters</small>
        </div>

        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn-primary">Sign Up</button>
      </form>

      <div class="auth-footer">
        <p>Already have an account? <a href="login.php" class="active">Login</a></p>
      </div>
    </main>
  </div>
</body>
</html>