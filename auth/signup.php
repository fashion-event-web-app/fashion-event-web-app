<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/auth.php';
require_once __DIR__.'/../includes/db.php';
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: '.BASE_URL.'profile');
    exit();
}

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Basic validation
    if ($password !== $confirm_password) {
        $error = "Passwords don't match";
    } else {
        try {
            $db = Database::getInstance();
            
            // Check if email already exists
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $error = "Email already in use";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $result = $stmt->execute([$name, $email, $hashed_password]);
                
                if ($result) {
                    header('Location: '.BASE_URL.'login?registered=1');
                    exit();
                } else {
                    $error = "Registration failed";
                }
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
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
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>../css/global.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>../css/auth.css">
</head>
<body>
  <div class="auth-container">
    <header class="auth-header">
      <h1>Create Account</h1>
      <p>Join our fashion community</p>
    </header>

    <main class="auth-form">
      <?php if (isset($_GET['registered'])): ?>
        <div class="alert success">Registration successful! Please login.</div>
      <?php endif; ?>

      <?php if (isset($error)): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn-primary">Sign Up</button>
      </form>

      <div class="auth-footer">
        <p>Already have an account? <a href="login.php" class="active">login</a></p>
      </div>
    </main>
  </div>
</body>
</html>
