document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.vote-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const isLike = this.classList.contains('like-btn');
        const countEl = this.querySelector('.count');
        
        if (countEl) {
          let count = parseInt(countEl.textContent);
          countEl.textContent = isLike ? count + 1 : count - 1;
        }
        
        // Visual feedback
        this.style.transform = 'scale(0.98)';
        setTimeout(() => this.style.transform = '', 200);
        
        // Save to localStorage (replace with API call later)
        const outfitName = this.closest('.voting-card').querySelector('h2').textContent;
        saveVote(outfitName, isLike);
      });
    });
  });
  
  function saveVote(outfitName, isLike) {
    const votes = JSON.parse(localStorage.getItem('outfitVotes') || '{}');
    votes[outfitName] = (votes[outfitName] || 0) + (isLike ? 1 : -1);
    localStorage.setItem('outfitVotes', JSON.stringify(votes));
  }