<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$has_consented = isset($_SESSION['cookie_consent']) || isset($_COOKIE['echofest_consent']);
?>
<?php if (!$has_consented): ?>
<div id="cookie-banner">
    <link rel="stylesheet" href="/EchoFest/assets/css/cookies.css">

    <div class="cookie-wrapper">

        <div class="cookie-header">
            <h2>Cookie Preferences</h2>
            <p>
                We use cookies to ensure the proper functioning of the website,
                to analyze traffic, and to improve your overall user experience.
                You can choose which categories you allow.
            </p>
        </div>