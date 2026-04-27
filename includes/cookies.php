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
    <form method="POST" action="../logic/cookies.php" class="cookie-form">

                <div class="cookie-grid">

                    <div class="cookie-box required">
                        <h3>Necessary Cookies</h3>
                        <p>
                            These cookies are essential for the website to function properly.
                            They enable core features such as security, authentication, sessions,
                            and accessibility. They cannot be disabled.
                        </p>

                        <label>
                            <input type="checkbox" checked disabled>
                            Always active (required)
                        </label>
                    </div>

                <div class="cookie-box">
                                    <h3>Analytics Cookies</h3>
                                    <p>
                                        These cookies help us understand how visitors interact with the website.
                                        We use tools like Google Analytics to measure traffic, performance,
                                        and user behavior in order to improve our services.
                                    </p>

                                    <label>
                                        <input type="checkbox" name="analytics">
                                        Allow analytics
                                    </label>
                                </div>