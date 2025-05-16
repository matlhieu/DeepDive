document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn');
  
    buttons.forEach(btn => {
      btn.addEventListener('click', function () {
        const type = btn.dataset.type;
        const originalText = btn.textContent.trim();
        btn.disabled = true;
        btn.textContent = 'Mise à jour...';
  
        setTimeout(() => {
          btn.disabled = false;
  
          if (type === 'vip') {
            btn.textContent = (originalText === 'VIP') ? 'non VIP' : 'VIP';
          } else if (type === 'ban') {
            btn.textContent = (originalText === 'Bannir') ? 'Débannir' : 'Bannir';
          }
        }, 2500);
      });
    });
  });
