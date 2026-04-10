// =============================
// FutureNav - Minimal Navbar JS
// Only core navbar functionality
// =============================
document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const navLinks = document.querySelectorAll('.nav-link');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

  // Mobile Menu Toggle
  mobileMenuButton.addEventListener('click', () => {
    mobileMenuButton.classList.toggle('active');
    if (mobileMenu.classList.contains('open')) {
      mobileMenu.style.height = '0';
      mobileMenu.classList.remove('open');
    } else {
      mobileMenu.classList.add('open');
      mobileMenu.style.height = `${mobileMenu.scrollHeight}px`;
    }
  });

  // Close mobile menu when a link is clicked
  mobileNavLinks.forEach(link => {
    link.addEventListener('click', () => {
      mobileMenuButton.classList.remove('active');
      mobileMenu.style.height = '0';
      mobileMenu.classList.remove('open');
    });
  });

  // Navbar scroll effect
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
    highlightCurrentLink();
  });

  // Highlight active nav link based on scroll
  function highlightCurrentLink() {
    let current = '';
    navLinks.forEach(link => link.classList.remove('active'));
    mobileNavLinks.forEach(link => link.classList.remove('active'));
    
    // Optional: only check section ids if you have them
    document.querySelectorAll('section').forEach(section => {
      const sectionTop = section.offsetTop - 100;
      const sectionHeight = section.offsetHeight;
      if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
        current = section.getAttribute('id');
      }
    });

    if (current) {
      navLinks.forEach(link => {
        if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
      });
      mobileNavLinks.forEach(link => {
        if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
      });
    }
  }

  // Smooth scroll for nav links
  navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = link.getAttribute('href');
      const targetSection = document.querySelector(targetId);
      if (targetSection) {
        const offsetTop = targetSection.offsetTop - 70; // Adjust for navbar
        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
      }
    });
  });

  highlightCurrentLink(); // Initialize active link on load
});