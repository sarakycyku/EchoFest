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