document.addEventListener("DOMContentLoaded", () => {
  const editButtons = document.querySelectorAll(".btn-edit-small");
  const clearBtn = document.getElementById("clearBtn");
  const saveBtn = document.getElementById("saveBtn");
  const formTitle = document.getElementById("formTitle");

  const fields = {
    id: document.getElementById("eventId"),
    title: document.getElementById("title"),
    artist: document.getElementById("artist"),
    date: document.getElementById("date"),
    time: document.getElementById("time"),
    location: document.getElementById("location"),
    stage: document.getElementById("stage"),
    category: document.getElementById("category"),
    description: document.getElementById("description"),
    image: document.getElementById("image")
  };

  editButtons.forEach(button => {
    button.addEventListener("click", () => {
      fields.id.value = button.dataset.id;
      fields.title.value = button.dataset.title;
      fields.artist.value = button.dataset.artist;
      fields.date.value = button.dataset.date;
      fields.time.value = button.dataset.time;
      fields.location.value = button.dataset.location;
      fields.stage.value = button.dataset.stage;
      fields.category.value = button.dataset.category;
      fields.description.value = button.dataset.description;
      fields.image.value = button.dataset.image;

      formTitle.textContent = "Edit Event";
      saveBtn.textContent = "Update Event";
    });
  });

  clearBtn.addEventListener("click", () => {
    Object.values(fields).forEach(field => field.value = "");
    formTitle.textContent = "Add New Event";
    saveBtn.textContent = "Add Event";
  });
});