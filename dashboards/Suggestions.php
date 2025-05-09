<?php
// Include necessary files
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personalized Suggestions</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/suggestions.css">
</head>
<body>
  <div class="suggestions-container">
    <header class="suggestions-header">
      <h1>Your Personalized Suggestions</h1>
      <p>Curated just for you based on your preferences and voting history</p>
    </header>

    <main>
      <!-- Suggestion 1 -->
      <section class="suggestion-card">
        <span class="personalized-badge">For You</span>
        <h2 class="suggestion-title">African elegant</h2> Outfits</h2>
        <p class="suggestion-meta">Matches your minimalist votes</p>
        <img src="../assets/images/african-dress.jpg" alt="elegant outfit example" class="suggestion-image">
        <div class="suggestion-actions">
          <button class="action-button save-button">
            <span>💾</span> Save
          </button>
          <button class="action-button view-button">
            <span>👀</span> View Similar
          </button>
        </div>
      </section>
      
      <!-- Suggestion 2 -->
      <section class="suggestion-card">
        <span class="personalized-badge">Trending</span>
        <h2 class="suggestion-title">Oversized Blazers</h2>
        <p class="suggestion-meta">Trend you frequently engage with</p>
        <img src="../assets/images/oversized-blazer.jpg" alt="Oversized blazer outfit" class="suggestion-image">
        <div class="suggestion-actions">
          <button class="action-button save-button">
            <span>💾</span> Save
          </button>
          <button class="action-button view-button">
            <span>👀</span> View Similar
          </button>
        </div>
      </section>
      
      <!-- Suggestion 3 -->
      <section class="suggestion-card">
        <h2 class="suggestion-title">Winter Formal Wear</h2>
        <p class="suggestion-meta">Based on your liked formal outfits</p>
        <img src="../assets/images/winter-formal.jpg" alt="Winter formal outfit" class="suggestion-image">
        <div class="suggestion-actions">
          <button class="action-button save-button">
            <span>💾</span> Save
          </button>
          <button class="action-button view-button">
            <span>👀</span> View Similar
          </button>
        </div>
      </section>
    </main>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
      <a href="/">
        <span class="nav-icon">🏠</span>
      <span class="nav-text">Home</span>
      </a>
      <a href="voting.php">
        <span class="nav-icon">✋</span>
        <span class="nav-text">Voting</span>
      </a>
      <a href="Settings.php" class="active">
        <span class="nav-icon">⚙️</span> 
      <span class="nav-text">Settings</span></a>
      <a href="profile.php">
        <span class="nav-icon">👤</span>
      <span class="nav-text">Profile</span>
      </a>
    </nav>
  </div>

  <script src="../js/suggestions.js"></script>
</body>
</html>