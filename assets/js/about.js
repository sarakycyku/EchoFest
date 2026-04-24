
// REVEAL ON SCROLL

const reveals = document.querySelectorAll('.reveal');

const revealOnScroll = () => {
  const windowHeight = window.innerHeight;

  reveals.forEach(el => {
    const top = el.getBoundingClientRect().top;

    if (top < windowHeight - 100) {
      el.classList.add('active');
    }
  });
};

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();



// COUNTER ANIMATION

const counters = document.querySelectorAll('.stat-number');

const runCounter = (el) => {
  const target = +el.getAttribute('data-target');
  const suffix = el.getAttribute('data-suffix') || "";
  let count = 0;

  const update = () => {
    const increment = target / 100;

    if (count < target) {
      count += increment;
      el.innerText = Math.floor(count) + suffix;
      requestAnimationFrame(update);
    } else {
      el.innerText = target + suffix;
    }
  };

  update();
};

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      runCounter(entry.target);
      observer.unobserve(entry.target);
    }
  });
});

counters.forEach(c => observer.observe(c));



// TEAM HOVER EFFECT

const teamCards = document.querySelectorAll('.team-card');

teamCards.forEach(card => {
  card.addEventListener('mouseenter', () => {
    card.style.transform = "scale(1.05)";
  });

  card.addEventListener('mouseleave', () => {
    card.style.transform = "scale(1)";
  });
});



// PARALLAX HERO

const hero = document.querySelector('.about-hero');

window.addEventListener('scroll', () => {
  let offset = window.scrollY;
  hero.style.backgroundPositionY = offset * 0.5 + "px";
});