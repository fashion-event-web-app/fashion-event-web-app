<?php
// Include necessary files
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Featured Outfits | Fashion App</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/outfits.css">
</head>
<body>
  <div class="outfit-container">
    <header class="app-header">
      <h1>Featured Outfits</h1>
      <p class="subtitle">Discover the latest fashion trends and styles</p>
    </header>

    <div class="filter-bar">
      <div class="filter-group">
        <label for="style-filter">Style:</label>
        <select id="style-filter">
          <option value="all">All Styles</option>
          <option value="streetwear">Streetwear</option>
          <option value="minimalist">Minimalist</option>
          <option value="casual">Casual</option>
          <option value="formal">Formal</option>
        </select>
      </div>
      <div class="filter-group">
        <label for="season-filter">Season:</label>
        <select id="season-filter">
          <option value="all">All Seasons</option>
          <option value="spring">Spring</option>
          <option value="summer">Summer</option>
          <option value="fall">Fall</option>
          <option value="winter">Winter</option>
        </select>
      </div>
    </div>

    <div id="outfitGrid" class="outfit-grid">
      <!-- Outfit 1 -->
      <article class="outfit-card" data-style="streetwear" data-season="fall">
        <img src="../assets/images/streetwear-set.jpg" alt="Urban Streetwear Set" class="outfit-image">
        <div class="outfit-info">
          <h3>Urban Streetwear Set</h3>
          <p class="designer-brand">Alex Chen for UrbanX</p>
          <p class="outfit-description">Edgy streetwear combination perfect for urban exploration.</p>
          <div class="outfit-meta">
            <span class="style-tag">Streetwear</span>
            <span class="season-tag">Fall</span>
          </div>
        </div>
      </article>
      
      <!-- Outfit 2 -->
      <article class="outfit-card" data-style="minimalist" data-season="all">
        <img src="../assets/images/minimal-office.jpg" alt="Minimalist Office Wear" class="outfit-image">
        <div class="outfit-info">
          <h3>Minimalist Office Wear</h3>
          <p class="designer-brand">Sophia Lee for Minimal</p>
          <p class="outfit-description">Clean lines and neutral tones for professional settings.</p>
          <div class="outfit-meta">
            <span class="style-tag">Minimalist</span>
            <span class="season-tag">All</span>
          </div>
        </div>
      </article>
      
      <!-- Outfit 3 -->
      <article class="outfit-card" data-style="casual" data-season="summer">
        <img src="../assets/images/summer-breeze.jpg" alt="Summer Breeze Outfit" class="outfit-image">
        <div class="outfit-info">
          <h3>Summer Breeze Outfit</h3>
          <p class="designer-brand">Carlos Mendez for BeachLife</p>
          <p class="outfit-description">Lightweight fabrics and breezy design for hot summer days.</p>
          <div class="outfit-meta">
            <span class="style-tag">Casual</span>
            <span class="season-tag">Summer</span>
          </div>
        </div>
      </article>
      
      <!-- Outfit 4 -->
      <article class="outfit-card" data-style="formal" data-season="spring">
        <img src="../assets/images/power-suit.jpg" alt="Executive Power Suit" class="outfit-image">
        <div class="outfit-info">
          <h3>Executive Power Suit</h3>
          <p class="designer-brand">Victoria Stone for Boardroom</p>
          <p class="outfit-description">Sharp navy suit with tailored fit for corporate settings.</p>
          <div class="outfit-meta">
            <span class="style-tag">Formal</span>
            <span class="season-tag">Spring</span>
          </div>
        </div>
      </article>
      
      <!-- Outfit 5 -->
      <article class="outfit-card" data-style="formal" data-season="winter">
        <img src="../assets/images/winter-overcoat.jpg" alt="Cashmere Wool Overcoat" class="outfit-image">
        <div class="outfit-info">
          <h3>Cashmere Wool Overcoat</h3>
          <p class="designer-brand">Eleanor Whitmore for Frost & Hart</p>
          <p class="outfit-description">Heavyweight cashmere-wool blend overcoat with fox fur collar.</p>
          <div class="outfit-meta">
            <span class="style-tag">Formal</span>
            <span class="season-tag">Winter</span>
          </div>
        </div>
      </article>
    </div>
  </div>

  

  <!-- Bottom Navigation -->
  <nav class="bottom-nav">
    <a href="/">
      <span class="nav-icon">🏠</span>
      <span class="nav-text">Home</span>
    </a>
    <a href="profile.php">
      <span class="nav-icon">👤</span>
      <span class="nav-text">Profile</span>
    </a>
    <a href="Outfit.php" class="active">
      <span class="nav-icon">👗</span>
      <span class="nav-text">Outfits</span>
    </a>
    <a href="Voting.php">
      <span class="nav-icon">✋</span>
      <span class="nav-text">Voting</span>
    </a>
    <a href="Event.php">
    <span class="nav-icon">📅</span>
        <span class="nav-text">Events</span></a>
  </nav>

  <script src="../js/outfit.js"></script>
</body>
</html>