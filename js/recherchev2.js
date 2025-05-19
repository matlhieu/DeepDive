document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('resultats-box');
  const select    = document.getElementById('triage-selection');

  select.addEventListener('change', () => {
    const [key, order] = select.value.split('_');
    const cards = Array.from(container.querySelectorAll('.un-carré-info'));
    cards.sort((a, b) => (parseFloat(a.dataset[key]) - parseFloat(b.dataset[key])) * (order === 'asc' ? 1 : -1));
    container.innerHTML = '';
    cards.forEach(c => container.appendChild(c));
    });
  });
