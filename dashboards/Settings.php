<?php
session_start();
require_once __DIR__.'/../includes/config.php';

// Placeholder for user data if not logged in
$user = [
    'email' => 'user@example.com'
];

// Check if user is logged in and get data
if (isset($_SESSION['user_id'])) {
    // In a real app, you would fetch user data from the database
    // For now, we'll use placeholder data
    $user = [
        'email' => $_SESSION['user_email'] ?? 'user@example.com'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings | Fashion App</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>../css/global.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>../css/settings.css">
</head>
<body>
  <div class="fullscreen-bg">
    <header class="app-header">
      <h1>Settings</h1>
    </header>

    <main class="settings-container">
      <!-- Account Section -->
      <section class="settings-card">
        <h2 class="section-title">Account</h2>
        <div class="setting-item">
          <span>Email</span>
          <span><?= htmlspecialchars($user['email']) ?></span>
        </div>
        <div class="setting-item">
          <span>Password</span>
          <button class="text-button">Change</button>
        </div>
      </section>

      <!-- Preferences -->
      <section class="settings-card">
        <h2 class="section-title">Preferences</h2>
        <div class="setting-item">
          <span>Dark Mode</span>
          <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
          </label>
        </div>
      </section>

      <!-- Danger Zone -->
      <section class="settings-card danger-zone">
        <h2 class="section-title">Danger Zone</h2>
        <button class="danger-button">Delete Account</button>
      </section>
    </main>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
      <a href="<?php echo BASE_URL; ?>">
        <span class="nav-icon">🏠</span>
        <span class="nav-text">Home</span>
      </a>
      <a href="<?php echo BASE_URL; ?>profile">
        <span class="nav-icon">👤</span>
        <span class="nav-text">Profile</span>
      </a>
      <a href="<?php echo BASE_URL; ?>settings" class="active">
        <span class="nav-icon">⚙️</span>  
      <span class="nav-text">Settings</span></a>
    </nav>
  </div>

  <script src="<?php echo BASE_URL; ?>js/settings.js"></script>
</body>
</html>
