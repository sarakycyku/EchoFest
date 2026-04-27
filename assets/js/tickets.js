const qtys = {};

function changeQty(id, change) {
  if (!qtys[id]) qtys[id] = 1;
  qtys[id] = Math.max(1, qtys[id] + change);
  document.getElementById('num-' + id).textContent = qtys[id];
}

function buyNow(id, basePrice, loc) {
  const qty = qtys[id] || 1;
  window.location.href = `purchase.php?ticket=${id}&qty=${qty}&loc=${loc}`;
}

//per animacion
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.animate').forEach(el => observer.observe(el));