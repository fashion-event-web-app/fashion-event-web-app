<?php
// Start session and include necessary files
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/auth.php';
require_once __DIR__.'/../includes/db.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.php");
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
try {
    $db = Database::getInstance();
    $stmt = $db->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    
    if (!$user) {
        throw new Exception("User not found");
    }
} catch (Exception $e) {
    error_log("Profile Error: " . $e->getMessage());
       header("Location: " . BASE_URL . "auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile | Fashion App</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
  <div class="profile-container">
    <header class="profile-header">
      <div class="profile-avatar">
        <img src="../assets/images/user-avatar.jpg" alt="User Avatar">
      </div>
      <h1><?= htmlspecialchars($user['full_name'] ?? $user['username'] ?? 'User') ?></h1>
      <p class="profile-email"><?= htmlspecialchars($user['email'] ?? 'example@example.com') ?></p>
    </header>

    <!-- Preferences Grid -->
    <div class="preferences-grid">
      <section class="preference-card">
        <h2 class="section-title">
          <span class="icon">👕</span> Style Preferences
        </h2>
        <ul class="tag-list">
          <li class="tag">Streetwear</li>
          <li class="tag">Minimalist</li>
          <li class="tag">Business Casual</li>
          <li class="tag">Formal</li>
        </ul>
      </section>

      <section class="preference-card">
        <h2 class="section-title">
          <span class="icon">🏷️</span> Favorite Brands
        </h2>
        <ul class="tag-list">
          <li class="tag">Zara</li>
          <li class="tag">Nike</li>
          <li class="tag">Gucci</li>
          <li class="tag">Noir Élégance</li>
        </ul>
      </section>
    </div>

    <!-- Voting History -->
    <section class="history-card">
      <h2 class="section-title">
        <span class="icon">🗳️</span> Voting History
      </h2>
      <div class="history-item">
        <div class="history-content">
          <p class="history-name">Oversized Denim Jacket</p>
          <span class="history-vote">👍 Liked</span>
        </div>
        <span class="history-date">2023-10-15</span>
      </div>
      <div class="history-item">
        <div class="history-content">
          <p class="history-name">High-Waisted Pants</p>
          <span class="history-vote">👎 Disliked</span>
        </div>
        <span class="history-date">2023-10-10</span>
      </div>
      <div class="history-item">
        <div class="history-content">
          <p class="history-name">Winter Velvet Tuxedo</p>
          <span class="history-vote">👍 Liked</span>
        </div>
        <span class="history-date">2023-12-05</span>
      </div>
    </section>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
    <a href="/" class="nav-link">
        <span class="nav-icon">🏠</span>
        <span class="nav-text">Home</span>
      </a>
      <a href="suggestions.php" class="nav-link">
        <span class="nav-icon">🛠️</span>  
        <span class="nav-text">Suggestions</span>
      </a>
      <a href="outfit.php" class="nav-link">
        <span class="nav-icon">👗</span>
        <span class="nav-text">Outfits</span>
      </a>
      <a href="voting.php" class="nav-link">
        <span class="nav-icon">✋</span>
        <span class="nav-text">Voting</span>
      </a>
      <a href="event.php" class="nav-link">
        <span class="nav-icon">📅</span>
        <span class="nav-text">Events</span>
      </a>
      <a href="settings.php" class="nav-link">
        <span class="nav-icon">⚙️</span> 
        <span class="nav-text">Settings</span>
      </a>
    </nav>
  </div>
</body>
</html>