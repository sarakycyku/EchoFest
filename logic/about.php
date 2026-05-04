
<?php
include __DIR__ . '/../includes/header.php';

require_once __DIR__ . '/../classes/Person.php';
require_once __DIR__ . '/../classes/TeamMember.php';

$stats = [
    ["number" => 150, "suffix" => "K+", "label"=> "Annual Visitors"],
    ["number" => 200, "suffix" => "+", "label"=> "Artists Performed"],
    ["number" => 6, "suffix" => "", "label"=>"Years Running"],
    ["number" => 5, "suffix" => "", "label"=> "Stages"],
];

$team = [];

$member1 = new TeamMember();
$member1->setName("Sara Kycyku");
$member1->setRole("Festival Director");
$member1->setBio("Leads the vision of EchoFest and oversees the creative direction of every edition.");
$member1->setImage("/EchoFest/assets/images/team_sara.jpg");
$team[] = $member1;

$member2 = new TeamMember();
$member2->setName("Dua Bilalli");
$member2->setRole("Marketing Director");
$member2->setBio("Builds the EchoFest identity and connects the festival with audiences across platforms.");
$member2->setImage("/EchoFest/assets/images/team_dua.jpg");
$team[] = $member2;

$member3 = new TeamMember();
$member3->setName("Rrezon Ibishi");
$member3->setRole("Creative Director");
$member3->setBio("Shapes the festival atmosphere through visuals, stage concepts, and immersive design.");
$member3->setImage("/EchoFest/assets/images/team_rrezon.jpg");
$team[] = $member3;

$member4 = new TeamMember();
$member4->setName("Pranvera Gashi");
$member4->setRole("Operations Director");
$member4->setBio("Coordinates logistics, artist planning, and the smooth running of the full event experience.");
$member4->setImage("/EchoFest/assets/images/team_pranvera.jpg");
$team[] = $member4;

$member5 = new TeamMember();
$member5->setName("Rumesa Bejiqi");
$member5->setRole("Guest Relations Manager");
$member5->setBio("Ensures every attendee has an exceptional festival experience through dedicated guest services and support.");
$member5->setImage("/EchoFest/assets/images/team_rumesa.jpg");
$team[] = $member5;
?>
