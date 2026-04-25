document.addEventListener("DOMContentLoaded", () => {

  const modal = document.getElementById("eventModal");
  const closeBtn = document.getElementById("modalClose");
  const detailsButtons = document.querySelectorAll(".btn-details");

  detailsButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("modalImage").src = btn.dataset.image;
      document.getElementById("modalTitle").textContent = btn.dataset.title;
      document.getElementById("modalArtist").textContent = "Artist: " + btn.dataset.artist;
      document.getElementById("modalInfo").textContent =
        btn.dataset.date + " | " + btn.dataset.time + " | " + btn.dataset.stage + " | " + btn.dataset.location;
      document.getElementById("modalDescription").textContent = btn.dataset.description;

      modal.classList.add("show");
    });
  });

  closeBtn.addEventListener("click", () => {
    modal.classList.remove("show");
  });

  modal.addEventListener("click", e => {
    if (e.target === modal) {
      modal.classList.remove("show");
    }
  });

});