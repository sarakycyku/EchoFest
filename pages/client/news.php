<?php include("../../logic/news.php")?>
<link rel="icon" href="../../assets/images/logo2-pabg.png">

<link rel="stylesheet" href="../../assets/css/news.css?v=1.3">

<?php include '../../includes/header.php'; ?>

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

      <?php
      $fakeTime = date("d M Y H:i", strtotime("-".rand(1,48)." hours"));
      ?>
      <span><?= $fakeTime ?></span>
    </div>
  <?php endforeach; ?>

</section>



<section>
         <h1 class='awards'>Awards</h1>

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


<?php include '../../includes/footer.php'; ?>


<script src="../../assets/js/news.js"></script>

</body>
</html>
