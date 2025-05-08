document.addEventListener('DOMContentLoaded', () => {
    // Sample data - in a real app you would fetch this from an API
    const fashionEvents = [
      {
        id: "1",
        title: "Paris Fashion Week",
        date: "2023-11-15",
        location: "Paris, France",
        image: "../assets/images/paris-fashion-week.jpg",
        description: "The most prestigious fashion event in the world featuring top designers."
      },
      {
        id: "2",
        title: "Milan Fashion Show",
        date: "2023-12-05",
        location: "Milan, Italy",
        image: "../assets/images/milan-fashion-show.jpg",
        description: "Experience Italian luxury fashion at its finest."
      },
      {
        id: "3",
        title: "New York Trendsetters",
        date: "2024-01-10",
        location: "New York, USA",
        image: "../assets/images/ny-trendsetters.jpg",
        description: "Discover emerging designers and streetwear trends."
      },
      {
        id: "4",
        title: "Tokyo Street Fashion Expo",
        date: "2024-02-20",
        location: "Tokyo, Japan",
        image: "../assets/images/tokyo-expo.jpg",
        description: "Celebrating the vibrant street fashion culture of Tokyo."
      }
    ];
  
    const grid = document.getElementById('eventsGrid');
    
    fashionEvents.forEach(event => {
      grid.innerHTML += `
        <div class="event-card">
          <img src="${event.image}" alt="${event.title}" class="event-img">
          <div class="event-details">
            <h3 class="event-title">${event.title}</h3>
            <p class="event-meta event-date">${event.date}</p>
            <p class="event-meta event-location">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              ${event.location}
            </p>
            <p>${event.description}</p>
          </div>
        </div>
      `;
    });
  });
