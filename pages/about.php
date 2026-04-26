<?php
include '../includes/header.php';

require_once '../classes/Person.php';
require_once '../classes/TeamMember.php';

$stats = [
    ["number" => 150, "suffix" => "K+", "label"=> "Annual Visitors"],
    ["number" => 200, "suffix" => "+", "label"=> "Artists Performed"],
    ["number" => 6, "suffix" => "", "label"=>"Years Running"],
    ["number" => 5, "suffix" => "", "label"=> "Stages"],
];

$team = [
    new TeamMember(
        "Sara Kycyku",
        "Festival Director",
        "Leads the vision of EchoFest and oversees the creative direction of every edition.",
        "../assets/images/team_sara.jpg"
    ),
    new TeamMember(
        "Dua Bilalli",
        "Marketing Director",
        "Builds the EchoFest identity and connects the festival with audiences across platforms.",
        "../assets/images/team_dua.jpg"
    ),
    new TeamMember(
        "Rrezon Ibishi",
        "Creative Director",
        "Shapes the festival atmosphere through visuals, stage concepts, and immersive design.",
        "../assets/images/team_rrezon.jpg"
    ),
    new TeamMember(
        "Pranvera Gashi",
        "Operations Director",
        "Coordinates logistics, artist planning, and the smooth running of the full event experience.",
        "../assets/images/team_pranvera.jpg"
    ),
     new TeamMember(
            "Rumesa Bejiqi",
            "Stage & Artist Coordinator",
            "This role keeps the whole festival running on time and prevents chaos on stage.",
            "../assets/images/team_rumesa.jpg"
        )
];
?>

<title>About Us</title>


<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/EchoFest/assets/css/about.css">

<section class="about-hero">
    <div class="about-overlay"></div>
    <div class="about-hero-content reveal">
        <p class="about-eyebrow">Official Story / EchoFest 2026</p>
        <h1>ABOUT US</h1>
        <p class="about-tagline">Where sound becomes memory</p>
    </div>
</section>

<section class="about-section">
    <div class="about-container about-grid">
        <div class="about-text reveal">
            <p class="section-label">Our Story</p>
            <h2>A Festival Built Around Energy, Sound, and People</h2>
            <p>
              EchoFest was created with one goal in mind: to bring people together through unforgettable
              music experiences. More than just a festival, it is a place where sound, emotion, and atmosphere
              come together in one immersive world.
            </p> 
            <p>
              From live performances and powerful visuals to the energy of the crowd, every part of EchoFest
              is designed to create moments that stay with you long after the event ends.
            </p>
        </div>

        <div class="reveal">
            <img 
                src="../assets/images/story.jpg" 
                alt="Ech0Fest Crowd"
                class="about-image"
            >
        </div>
    </div>
</section>

<section class="about-section about-stats">
    <div class="about-container stats-grid">
        <?php foreach ($stats as $s): ?>
            <div class="stat-card reveal">
                <div class="stat-number"
                     data-target="<?= $s['number']; ?>"
                     data-suffix="<?= $s['suffix']; ?>">0</div>
                <div class="stat-label"><?= $s['label']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="about-section">
    <div class="about-container">
        <div class="heading-center reveal">
            <p class="section-label">What We Stand For</p>
            <h2>Core Values</h2>
            <p>
                 The ideas that shape every EchoFest edition and every visitor experience.
        </p>
    </div>

    <div class="cards-grid">
        <div class="info-card reveal">
            <div class="icon-circle">♫</div>
            <h3>Passion for Music</h3>
            <p>We believe music creates connection, emotion, and unforgettable moments.</p>
        </div>

        <div class="info-card reveal">
                <div class="icon-circle">♥</div>
                <h3>Community</h3>
                <p>EchoFest is a shared space for artists, fans, and everyone who loves live experiences.</p>
            </div>

        <div class="info-card reveal">
            <div class="icon-circle">★</div>
            <h3>Qualityc</h3>
            <p>We celebrate diversity and create an open environment where everyone feels welcome.</p>
        </div>

        <div class="info-card reveal">
                <div class="icon-circle">◎</div>
                <h3>Inclusion</h3>
                <p>We celebrate diversity and create an open environment where everyone feels welcome.</p>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="about-container">
        <div class="heading-center reveal">
            <p class="section-label">Meet The Team</p>
            <h2>The People Behind EchoFest</h2>
        </div>  
        
        <div class="team-grid">
            <?php foreach($team as $member): ?>
                <div class="team-card reveal">
                    <img src="<?= $member->getImage(); ?>" alt="<?=$member->getName(); ?>">
                    <div class="team-info">
                        <h3><?=$member->getName(); ?></h3>
                        <div class="team-role"><?= $member->getRole();?></div>
                        <p><?=$member->getBio(); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="about-container">
        <div class="mission-box reveal">
            <div class="mission-icon">⚡</div>
            <h2>Our Mission</h2>
            <p>
                To create a festival experience that unites people through music, creativity, and
                shared energy in an unforgettable atmosphere.
            </p>
            <div class="mission-quote">"Where music unites, memories begin"</div>
            </div>
        </div>
</section>

<section class="about-section">
    <div class="about-container cta-box reveal">
        <h2>Ready to Feel the Echo?</h2>
        <p>Explore the lineup, discover the experience, and join EchoFest 2026.</p>
        <div class="cta-actions">
            <a href="tickets.php" class="btn-primary">Get Tickets</a>
            <a href="lineup.php" class="btn-secondary">Explore Lineup</a>
        </div>    
    </div>
</section>

<script src="/EchoFest/assets/js/about.js"></script>

<?php include '../includes/footer.php'; ?>