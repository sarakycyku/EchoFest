const qtys = {};

function changeQty(id, change) {
  if (!qtys[id]) qtys[id] = 1;
  qtys[id] = Math.max(1, qtys[id] + change);
  document.getElementById('num-' + id).textContent = qtys[id];

  //update price
  const priceMap = { early: 79, regular: 129, vip: 299 };
  const total = priceMap[id] * qtys[id];
  const btn = document.getElementById('buy-' + id);
  if (btn) btn.textContent = 'Buy Now €' + total;
}

function buyNow(id, basePrice) {
  const qty = qtys[id] || 1;
  window.location.href = `purchase.php?ticket=${id}&qty=${qty}&loc=<?= $selected ?>`;
}