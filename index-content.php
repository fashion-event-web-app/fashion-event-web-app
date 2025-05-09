<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Discover the latest fashion trends and personalized style suggestions">
  <title>Home | Fashion App</title>
  <link rel="stylesheet" href="./css/global.css">
  <link rel="stylesheet" href="./css/home.css">
</head>
<body>
  <div class="home-container">
    <!-- Hero Section -->
    <section class="hero-section" aria-labelledby="hero-heading">
      <img src="./assets/images/welcome.jpg" alt="Fashionable woman smiling" class="hero-image">
      <div class="hero-overlay">
        <div class="hero-text">
          <h1 id="hero-heading">Discover Your Unique Style</h1>
          <p>Explore the latest fashion trends, vote on upcoming collections, and get personalized outfit suggestions.</p>
          <div class="hero-actions">
            <a href="./dashboards/outfit.php" class="hero-cta">Browse Outfits</a>
            <a href="./auth/login.php" class="hero-cta secondary">Sign In</a>
          </div>
        </div>
      </div>
    </section>

<!-- Trending Outfits -->
<section class="featured-section" aria-labelledby="trending-heading">
      <div class="section-header">
        <h2 id="trending-heading" class="section-title">Trending This Week</h2>
        <a href="./dashboards/outfit.php" class="view-all">View All</a>
      </div>
      <div class="trending-grid">
        <!-- Item 1 -->
        <article class="trending-item">
          <img src="./assets/images/streetwear-set.jpg" alt="Urban streetwear outfit with denim jacket" class="trending-img">
          <span class="trending-badge" aria-label="Popular item">Hot</span>
          <div class="trending-info">
            <h3 class="trending-name">Urban Streetwear</h3>
            <p class="trending-description">Edgy combinations for city life</p>
          </div>
        </article>
        
        <!-- Item 2 -->
        <article class="trending-item">
          <img src="./assets/images/Minimalist Chic.jpg" alt="Minimalist office outfit with neutral tones" class="trending-img">
          <div class="trending-info">
            <h3 class="trending-name">Minimalist Chic</h3>
            <p class="trending-description">Clean lines and neutral tones</p>
          </div>
        </article>
        
        <!-- Item 3 -->
        <article class="trending-item">
          <img src="./assets/images/evening-elegance.jpg" alt="Formal evening gown for galas" class="trending-img">
          <span class="trending-badge" aria-label="New arrival">New</span>
          <div class="trending-info">
            <h3 class="trending-name">Evening Elegance</h3>
            <p class="trending-description">Gala-ready formal wear</p>
          </div>
        </article>
        
        <!-- Item 4 -->
        <article class="trending-item">
          <img src="./assets/images/summer-breeze.jpg" alt="Lightweight summer outfit" class="trending-img">
          <div class="trending-info">
            <h3 class="trending-name">Summer Breeze</h3>
            <p class="trending-description">Lightweight fabrics for warm days</p>
          </div>
        </article>
      </div>
    </section>

     <!-- Quick Actions -->
     <section class="quick-actions" aria-labelledby="quick-actions-heading">
      <h2 id="quick-actions-heading" class="visually-hidden">Quick Actions</h2>
      <div class="actions-grid">
        <a href="./dashboards/voting.php" class="action-card" aria-label="Vote on fashion trends">
          <div class="action-icon" aria-hidden="true">✋</div>
          <h3 class="action-title">Vote Now</h3>
          <p class="action-text">Shape the next fashion trends</p>
        </a>
        
        <a href="./dashboards/suggestions.php" class="action-card" aria-label="Get style suggestions">
          <div class="action-icon" aria-hidden="true">💡</div>
          <h3 class="action-title">Get Suggestions</h3>
          <p class="action-text">Personalized for your style</p>
        </a>
        
        <a href="./auth/login.php" class="action-card" aria-label="Login to your account">
          <div class="action-icon" aria-hidden="true">🔑</div>
          <h3 class="action-title">Login</h3>
          <p class="action-text">Access your profile</p>
        </a>
        
        <a href="./auth/signup.php" class="action-card" aria-label="Create new account">
          <div class="action-icon" aria-hidden="true">✍️</div>
          <h3 class="action-title">Sign Up</h3>  </a>
          <a href="./auth/logout.php"  class="action-card"></a>
          <div class="action-icon" aria-hidden="true">🚪</div>
          <h3 class="action-title">log out</h3></a>
          <h2 class="action-text">Join our community</h2>
      
      </div>
    </section>
  </div>

  <!-- Bottom Navigation -->
  <nav class="bottom-nav" aria-label="Main navigation">
    <a href="/" class="nav-link active" aria-current="page">
      <span class="nav-icon">🏠</span>
      <span class="nav-text">Home</span>
    </a>
    <a href="./dashboards/profile.php" class="nav-link">
      <span class="nav-icon">👤</span>
      <span class="nav-text">Profile</span>
    </a>
    <a href="./dashboards/Outfit.php" class="nav-link">
      <span class="nav-icon">👗</span>
      <span class="nav-text">Outfits</span>
    </a>
    <a href="./dashboards/voting.php" class="nav-link">
      <span class="nav-icon">✋</span>
      <span class="nav-text">Voting</span>
    </a>
  </nav>

  <script src="/js/main.js" defer></script>
</body>
</html>