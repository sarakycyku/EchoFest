document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("menuToggle");
  const menu = document.getElementById("menu");

  if (btn && menu) {
    menu.addEventListener("show.bs.collapse", () => {
      btn.classList.add("active");
    });

    menu.addEventListener("hide.bs.collapse", () => {
      btn.classList.remove("active");
    });
  }

  let currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

  if (currentPath.endsWith("/")) {
    currentPath += "index.php";
  }

  navLinks.forEach((link) => {
    const linkPath = new URL(link.href).pathname;
    link.classList.remove("active");

    if (linkPath === currentPath) {
      link.classList.add("active");
    }
  });
});
