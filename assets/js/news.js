function openNews(title, desc, full){
  document.getElementById("modalTitle").innerText = title;
  document.getElementById("modalDesc").innerText = desc;
  document.getElementById("modalFull").innerText = full;

  document.getElementById("newsModal").style.display = "flex";
  document.body.style.overflow = "hidden";
}

function closeNews(){
  document.getElementById("newsModal").style.display = "none";
  document.body.style.overflow = "auto";
}

window.onclick = function(e){
  if(e.target.id === "newsModal"){
    closeNews();
  }
}