<?php
include '../includes/header.php';

$stats = [
    ["number" => 150, "suffix" => "K+", "label"=> "Visitors"],
    ["number" => 200, "suffix" => "+", "label"=> "Artists"],
    ["number" => 6, "suffix" => "", "label"=>"Years"],
    ["number" => 5, "suffix" => "", "label"=> "Stages"],
];
?>

<link rel="stylesheet" href="../assets/css/about.css">

<section class="about-hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>ABOUT US</h1>
        <p>Where sound becomes memory</p>
    </div>
</section>

<section class="about-section">
    <div class="container about-grid">
        <div>
            <h2>Our Story</h2>
            <p>
              EchoFest is more than a music festival. It is a space where people,
              sound and energy come together.
            </p> 
        </div>

        <div>
            <img src="../assets/images/story.jpg" class="about-img">
        </div>
    </div>
</section>

<section class="about-section stats">
    <div class="container stats-grid">
        <?php foreach ($stats as $s): ?>
            <div>
                <h3><?=$s['number'] . $s['suffix']; ?></h3>
                <p><?= $s['label']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php include '../includes/footer.php'; ?>