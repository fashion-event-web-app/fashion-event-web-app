document.addEventListener('DOMContentLoaded', () => {
    fetch('../Outfits.json')
      .then(response => response.json())
      .then(outfits => {
        const grid = document.getElementById('outfitGrid');
        
        outfits.forEach(outfit => {
          grid.innerHTML += `
            <div class="outfit-card" data-style="${outfit.style}" data-season="${outfit.season}">
              <span class="brand-tag">${outfit.brand}</span>
              <img src="${outfit.image}" alt="${outfit.title}" class="outfit-img">
              <div class="outfit-details">
                <h2>${outfit.title}</h2>
                <p><strong>Designer:</strong> ${outfit.designer}</p>
                <p><strong>Style:</strong> ${outfit.style}</p>
                <p>${outfit.description}</p>
              </div>
              <button class="like-button" aria-label="Like this outfit">
                ♥
              </button>
            </div>
          `;
        });
  
        // Add filter functionality
        const styleFilter = document.getElementById('style-filter');
        const seasonFilter = document.getElementById('season-filter');
        
        const filterOutfits = () => {
          const styleValue = styleFilter.value;
          const seasonValue = seasonFilter.value;
          
          document.querySelectorAll('.outfit-card').forEach(card => {
            const cardStyle = card.dataset.style;
            const cardSeason = card.dataset.season;
            
            const styleMatch = styleValue === 'all' || cardStyle === styleValue;
            const seasonMatch = seasonValue === 'all' || cardSeason === seasonValue;
            
            card.style.display = (styleMatch && seasonMatch) ? 'block' : 'none';
          });
        };
        
        styleFilter.addEventListener('change', filterOutfits);
        seasonFilter.addEventListener('change', filterOutfits);
        
        // Add like button functionality
        document.querySelectorAll('.like-button').forEach(button => {
          button.addEventListener('click', function() {
            this.classList.toggle('liked');
          });
        });
      });
  });