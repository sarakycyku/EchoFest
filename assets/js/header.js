document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("menuToggle");
  const menu = document.getElementById("menu");

  menu.addEventListener("show.bs.collapse", () => {
    btn.classList.add("active");
  });

  menu.addEventListener("hide.bs.collapse", () => {
    btn.classList.remove("active");
  });
});