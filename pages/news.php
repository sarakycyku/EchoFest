<?php
$awards = [
  [
    "title" => "Best Festival 2025",
    "img" => "../assets/images/award1.png"
  ],
  [
    "title" => "Top Music Event",
    "img" => "../assets/images/award2.png"
  ],
  [
    "title" => "Best Stage Design",
    "img" => "../assets/images/award3.jpg"
  ],
  [
    "title" => "Eco Friendly Award",
    "img" => "../assets/images/award4.png"
  ],
  [
    "title" => "Audience Choice",
    "img" => "../assets/images/award5.jpg"
  ],
  [
    "title" => "Best Lineup",
    "img" => "../assets/images/award6.jpg"
  ]
];
$news = [
  [
    "title" => "EchoFest 2026 Lineup Announcement",
    "desc" => "First wave of artists revealed for EchoFest 2026.",
    "full" => "EchoFest 2026 has officially announced its first lineup wave. International DJs and global artists are joining this massive edition, making it the biggest EchoFest ever."
  ],
  [
    "title" => "New Main Stage Experience",
    "desc" => "LED dome stage with immersive visuals.",
    "full" => "The new main stage features a 360° LED dome, laser systems, and immersive visual effects for a next-level festival experience."
  ],
  [
    "title" => "Festival Zones Expanded",
    "desc" => "More music, food and chill areas added.",
    "full" => "New expanded zones include food courts, chill lounges, and interactive music spaces for visitors."
  ],
  [
    "title" => "Global Headliners Confirmed",
    "desc" => "Big names joining EchoFest 2026.",
    "full" => "Top global artists from electronic and pop scenes are confirmed with exclusive performances."
  ],
  [
    "title" => "Eco-Friendly Initiative",
    "desc" => "Sustainability plan introduced.",
    "full" => "EchoFest is reducing plastic use and introducing green energy systems for a more sustainable festival."
  ],
  [
    "title" => "Official App Launch",
    "desc" => "Festival app now live.",
    "full" => "The EchoFest app is now live with schedules, maps, and live updates."
  ],
  [
    "title" => "Afterparty Locations",
    "desc" => "Official venues announced.",
    "full" => "Official afterparty locations are confirmed across top clubs in the city."
  ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EchoFest News</title>

<link rel="stylesheet" href="../assets/css/news.css">
</head>

<body class="news-page">

<?php include '../includes/header.php'; ?>

 <section class="about-hero">
     <div class="about-overlay"></div>
     <div class="about-hero-content reveal">
         <p class="about-eyebrow"> Don't miss anything</p>
         <h1>Latest News</h1>
         <p class="about-tagline">Updates about EchoFest 2026 festival experience</p>
     </div>
 </section>


<section class="news-container">

  <?php foreach($news as $n): ?>
    <div class="news-card"
         onclick='openNews(<?= json_encode($n["title"]) ?>,
                            <?= json_encode($n["desc"]) ?>,
                            <?= json_encode($n["full"]) ?>)'>

      <div class="left">
        <h3><?= $n['title'] ?></h3>
        <p><?= $n['desc'] ?></p>
      </div>

      <div class="right">
       <?php $now = date("d M Y H:i"); ?>
       <span><?= $now ?></span>
      </div>

    </div>
  <?php endforeach; ?>

</section>
<section class="awards-section">

  <h2 class="section-title">Awards</h2>

  <div class="awards-grid">

    <?php foreach($awards as $a): ?>
      <div class="award-card">
        <img src="<?= $a['img'] ?>" alt="<?= $a['title'] ?>">
        <h3><?= $a['title'] ?></h3>
      </div>
    <?php endforeach; ?>

  </div>

</section>

<!-- MODAL -->
<div id="newsModal" class="modal">
  <div class="modal-content">

    <span class="close" onclick="closeNews()">&times;</span>

    <h2 id="modalTitle"></h2>
    <p id="modalDesc"></p>
    <div id="modalFull"></div>

  </div>
</div>
<script>
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
</script>

<?php include '../includes/footer.php'; ?>



</body>
</html>
