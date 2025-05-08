<?php
// Include necessary files
require_once __DIR__ . '/../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vote on Trending Styles</title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/voting.css">
</head>
<body>
  <div class="voting-container">
    <header class="voting-header">
      <h1>Vote on Trending Styles</h1>
      <p>Help shape the next fashion trends by voting on these outfits</p>
    </header>

    <!-- Category Filters -->
    <div class="filter-tabs">
      <button class="filter-tab active" data-filter="all">All Styles</button>
      <button class="filter-tab" data-filter="streetwear">Streetwear</button>
      <button class="filter-tab" data-filter="minimalist">Minimalist</button>
      <button class="filter-tab" data-filter="formal">Formal</button>
      <button class="filter-tab" data-filter="casual">Casual</button>
    </div>

    <main id="outfits-container">
      <!-- Outfits will be loaded here dynamically -->
    </main>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
      <a href="../index.php">
        <span class="nav-icon">🏠</span>
      <span class="nav-text">Home</span>
      </a>
      <a href="voting.php" class="active">
        <span class="nav-icon">✋</span>
        <span class="nav-text">Voting</span>
      </a>
      <a href="profile.php">
        <span class="nav-icon">👤</span>
      <span class="nav-text">Profile</span>
      </a>
    </nav>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const outfitsContainer = document.getElementById('outfits-container');
      const filterTabs = document.querySelectorAll('.filter-tab');
      
      // Sample outfit data (in a real app, you would fetch this from your JSON file)
      const outfits = [
        {
          "title": "Oversized Denim Jacket",
          "style": "streetwear",
          "image": "../assets/images/streetwear-set.jpg",
          "likes": 124,
          "description": "Urban streetwear with a 90s inspired oversized denim jacket"
        },
        {
          "title": "Monochromatic Minimalist",
          "style": "minimalist",
          "image": "../assets/images/minimal-office.jpg",
          "likes": 89,
          "description": "Clean lines and neutral tones for professional settings"
        },
        {
          "title": "Summer Breeze Outfit",
          "style": "casual",
          "image": "../assets/images/summer-breeze.jpg",
          "likes": 156,
          "description": "Lightweight fabrics for warm summer days"
        },
        {
          "title": "Executive Power Suit",
          "style": "formal",
          "image": "../assets/images/power-suit.jpg",
          "likes": 72,
          "description": "Tailored navy suit for corporate settings"
        },
        {
          "title": "Cashmere Wool Overcoat",
          "style": "formal",
          "image": "../assets/images/winter-overcoat.jpg",
          "likes": 98,
          "description": "Luxury winter overcoat with fox fur collar"
        }
      ];

      // Load all outfits initially
      loadOutfits(outfits);

      // Filter functionality
      filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
          filterTabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          
          const filter = tab.dataset.filter;
          const filteredOutfits = filter === 'all' 
            ? outfits 
            : outfits.filter(outfit => outfit.style === filter);
            
          loadOutfits(filteredOutfits);
        });
      });

      function loadOutfits(outfitsToLoad) {
        outfitsContainer.innerHTML = '';
        
        outfitsToLoad.forEach(outfit => {
          const outfitCard = document.createElement('section');
          outfitCard.className = 'voting-card';
          outfitCard.dataset.style = outfit.style;
          
          outfitCard.innerHTML = `
            <img src="${outfit.image}" alt="${outfit.title}" class="voting-image">
            <div class="voting-content">
              <h2 class="voting-title">${outfit.title}</h2>
              <p class="outfit-description">${outfit.description}</p>
              <div class="vote-buttons">
                <button class="vote-btn like-btn">
                  <span>Like</span>
                  <span class="count">${outfit.likes}</span>
                </button>
                <button class="vote-btn dislike-btn">
                  <span>Dislike</span>
                </button>
              </div>
              <div class="vote-progress">
                <div class="progress-bar" style="width: ${Math.random() * 100}%"></div>
              </div>
            </div>
          `;
          
          outfitsContainer.appendChild(outfitCard);
        });

        // Add event listeners to new buttons
        document.querySelectorAll('.like-btn, .dislike-btn').forEach(btn => {
          btn.addEventListener('click', function() {
            const countElement = this.querySelector('.count');
            if (countElement) {
              const currentCount = parseInt(countElement.textContent);
              countElement.textContent = this.classList.contains('like-btn') 
                ? currentCount + 1 
                : Math.max(0, currentCount - 1);
            }
          });
        });
      }
    });
  </script>
</body>
</html>