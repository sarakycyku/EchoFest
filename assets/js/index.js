  const container = document.getElementById('particles');
  const colors = ['#ffffff','#a78bfa','#06b6d4','#9ca3af','#c4b5fd'];
  for (let i = 0; i < 28; i++) {
    const d = document.createElement('div');
    d.className = 'dot';
    const size = Math.random() * 4 + 1.5;
    d.style.cssText = `
      width:${size}px; height:${size}px;
      left:${Math.random()*100}%;
      background:${colors[Math.floor(Math.random()*colors.length)]};
      animation-duration:${8+Math.random()*14}s;
      animation-delay:${Math.random()*10}s;
    `;
    container.appendChild(d);
  }