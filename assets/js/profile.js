const container = document.getElementById('pf-particles');
const colors = ['#a78bfa','#06b6d4','#c4b5fd','#67e8f9','#ffffff','#818cf8'];

for(let i = 0; i < 22; i++){
  const d = document.createElement('div');
  d.className = 'pf-dot';
  const size = Math.random() * 3 + 1;
  const startY = window.innerHeight + 20;
  d.style.cssText = `
    width:${size}px;
    height:${size}px;
    left:${Math.random()*100}%;
    top:${startY}px;
    position:fixed;
    border-radius:50%;
    z-index:0;
    pointer-events:none;
    background:${colors[Math.floor(Math.random()*colors.length)]};
    animation: floatDot ${7+Math.random()*12}s ${Math.random()*8}s linear infinite;
  `;
  document.body.appendChild(d);  
}