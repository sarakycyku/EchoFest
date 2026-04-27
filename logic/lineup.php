<?php
include '../includes/header.php';

/* =========================
   EVENTS DATA
   ========================= */
$events = [
    ["artist"=>"Dua Lipa","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/dua_lipa.png","hits"=>["Levitating","New Rules","Don't Start Now"]],
    ["artist"=>"DJ Snake","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/dj_snake.png","hits"=>["Taki Taki","Lean On","Let Me Love You"]],
    ["artist"=>"Martin Garrix","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/martin_garrix.png","hits"=>["Animals","Scared to Be Lonely","In the Name of Love"]],
    ["artist"=>"Rita Ora","stage"=>"Pop Stage","day"=>"Friday","image"=>"../assets/images/rita_ora.png","hits"=>["Anywhere","Let You Love Me","Your Song"]],
    ["artist"=>"The Weeknd","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/weeknd.png","hits"=>["Blinding Lights","Starboy","Save Your Tears"]],
    ["artist"=>"Calvin Harris","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/calvin_harris.png","hits"=>["Summer","One Kiss","Feel So Close"]],
    ["artist"=>"Billie Eilish","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/billie_eilish.png","hits"=>["Bad Guy","Ocean Eyes","Happier Than Ever"]],
    ["artist"=>"Ed Sheeran","stage"=>"Acoustic Stage","day"=>"Saturday","image"=>"../assets/images/ed_sheeran.png","hits"=>["Shape of You","Perfect","Photograph"]],
    ["artist"=>"David Guetta","stage"=>"EDM Stage","day"=>"Friday","image"=>"../assets/images/david_guetta.png","hits"=>["Titanium","Play Hard","Without You"]],
       ["artist"=>"Sia","stage"=>"Pop Stage","day"=>"Sunday","image"=>"../assets/images/sia.png","hits"=>["Chandelier","Cheap Thrills","Elastic Heart"]
   ],
 ["artist"=>"Rihanna","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/rihanna.png","hits"=>["Diamonds","Umbrella","We Found Love"]],

     ["artist"=>"Drake","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/drake.png","hits"=>["God's Plan","Hotline Bling","One Dance"]],

     ["artist"=>"Taylor Swift","stage"=>"Pop Stage","day"=>"Sunday","image"=>"../assets/images/taylor_swift.png","hits"=>["Love Story","Blank Space","Shake It Off"]],
 ["artist"=>"Ariana Grande","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/ariana_grande.png","hits"=>["7 rings","Into You","No Tears Left To Cry"]],
["artist"=>"Dafina Zeqiri","stage"=>"Pop Stage","day"=>"Friday","image"=>"../assets/images/dafina_zeqiri.png","hits"=>["Four Seasons","Million Dollar Baby","Bye Bye"]],

["artist"=>"Ledri Vula","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/ledri_vula.png","hits"=>["Piano Rap","Krejt Shokët","Princess Diana"]],["artist"=>"Noizy","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/noizy.png","hits"=>["Toto","Jena Mbretër","Big Body Benzo"]],

                                                                                                                                                                  ["artist"=>"Tayna","stage"=>"Pop Stage","day"=>"Saturday","image"=>"../assets/images/tayna.png","hits"=>["Columbiana","Sicko","Si ai"]],

                                                                                                                                                                  ["artist"=>"Mozzik","stage"=>"Main Stage","day"=>"Sunday","image"=>"../assets/images/mozzik.png","hits"=>["Madonna","Bonjour Madame","Hana"]],

                                                                                                                                                                  ["artist"=>"Yll Limani","stage"=>"Acoustic Stage","day"=>"Friday","image"=>"../assets/images/yll_limani.png","hits"=>["Buzeqeshja","Harrom","Nuk po du me t'pa"]]];

/* =========================
   GET VALUES
   ========================= */
$search = isset($_GET['q']) ? trim($_GET['q']) : "";
$sort   = isset($_GET['sort']) ? $_GET['sort'] : "";

/* VALIDATION */
if ($search && !preg_match("/^[a-zA-Z ]+$/", $search)) {
    die("Invalid search input");
}

/* =========================
   FILTER
   ========================= */
$filtered = array_filter($events, function($e) use ($search) {
    return $search == "" || stripos($e["artist"], $search) !== false;
});

/* =========================
   SORT LOGIC
   ========================= */
if ($sort == "az") {
    usort($filtered, fn($a,$b)=>strcmp($a["artist"],$b["artist"]));
}

if ($sort == "za") {
    usort($filtered, fn($a,$b)=>strcmp($b["artist"],$a["artist"]));
}

if ($sort == "day") {
    $order = ["Friday"=>1, "Saturday"=>2, "Sunday"=>3];
    usort($filtered, fn($a,$b)=>$order[$a["day"]] <=> $order[$b["day"]]);
}

if ($sort == "stage") {
    usort($filtered, fn($a,$b)=>strcmp($a["stage"],$b["stage"]));
}
?>