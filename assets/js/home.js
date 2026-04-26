// home.js — EchoFest
(function () {
  // Particles
  const container = document.getElementById('particles');
  const colors = ['#a78bfa','#06b6d4','#c4b5fd','#67e8f9','#ffffff','#818cf8'];
  if (container) {
    for (let i = 0; i < 24; i++) {
      const d = document.createElement('div');
      d.className = 'dot';
      const size = Math.random() * 3.5 + 0.8;
      d.style.cssText =
        `width:${size}px;height:${size}px;` +
        `left:${Math.random() * 100}%;bottom:0;` +
        `background:${colors[Math.floor(Math.random() * colors.length)]};` +
        `animation-duration:${9 + Math.random() * 14}s;` +
        `animation-delay:${Math.random() * 10}s;`;
      container.appendChild(d);
    }
  }
})();