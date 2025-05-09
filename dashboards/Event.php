<?php
// Include necessary files
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Events</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/events.css">
</head>
<body>
  <div class="events-container">
    <header class="events-header">
      <h1>Upcoming Fashion Events</h1>
      <p>Discover the hottest runway shows, exhibitions, and industry gatherings worldwide</p>
    </header>

 
    <main>
      <!-- Event 1 -->
      <article class="event-card">
        <div class="event-image-container">
          <img src="../assets/images/paris-fashion-week.jpg" alt="Paris Fashion Week" class="event-image">
          <span class="event-badge">Featured Event</span>
        </div>
        <div class="event-content">
          <h2 class="event-title">Paris Fashion Week</h2>
          <div class="event-meta">
            <span class="event-date">
              <i class="fas fa-calendar-alt event-icon"></i>
              March 3-10, 2024
            </span>
            <span class="event-location">
              <i class="fas fa-map-marker-alt event-icon"></i>
              Paris, France
            </span>
          </div>
          <p class="event-description">
            The most prestigious fashion event in the world featuring top designers and luxury brands. 
            Experience exclusive runway shows and after-parties with industry elites.
          </p>
          <div class="event-actions">
            
            <button class="event-button primary-button">
              <i class="fas fa-heart"></i> Save Event
            </button>
          </div>
        </div>
      </article>

      <!-- Event 2 -->
      <article class="event-card">
        <div class="event-image-container">
        <img src="../assets/images/tokyo-expo.jpg" alt="Met Gala" class="event-image">
            <span class="event-badge">Exclusive</span>
        </div>
        <div class="event-content">
          <h2 class="event-title">tokyo-expo</h2>
          <div class="event-meta">
            <span class="event-date">
              <i class="fas fa-calendar-alt event-icon"></i>
              May 6, 2024
            </span>
            <span class="event-location">
              <i class="fas fa-map-marker-alt event-icon"></i>
              New York, USA
            </span>
          </div>
          <p class="event-description">
            Fashion's biggest night out! The annual fundraising gala for the Metropolitan Museum of Art's Costume Institute 
            features celebrity guests and avant-garde fashion.
          </p>
          <div class="event-actions">
              <button class="event-button primary-button">
              <i class="fas fa-heart"></i> Save Event
            </button>
          </div>
        </div>
      </article>

      <!-- Event 3 -->
      <article class="event-card">
        <div class="event-image-container">
          <img src="../assets/images/milan-fashion-show.jpg" alt="Milan Fashion Show" class="event-image">
        </div>
        <div class="event-content">
          <h2 class="event-title">Milan Fashion Show</h2>
          <div class="event-meta">
            <span class="event-date">
              <i class="fas fa-calendar-alt event-icon"></i>
              February 20-26, 2024
            </span>
            <span class="event-location">
              <i class="fas fa-map-marker-alt event-icon"></i>
              Milan, Italy
            </span>
          </div>
          <p class="event-description">
            Experience Italian luxury at its finest. The Milan Fashion Show showcases the best of Italian design 
            with a focus on craftsmanship and innovation.
          </p>
          <div class="event-actions">
            
            <button class="event-button primary-button">
              <i class="fas fa-heart"></i> Save Event
            </button>
          </div>
        </div>
      </article>
    </main>

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
    <a href="voting.php" class="active">
        <span class="nav-icon">✋</span>
        <span class="nav-text">Voting</span>
      </a>
      <a href="Event.php">
    <span class="nav-icon">📅</span>
        <span class="nav-text">Events</span></a>
    </nav>
  </div>

  <script src="<?php echo BASE_URL; ?>../js/event.js"></script>
</body>
</html>
