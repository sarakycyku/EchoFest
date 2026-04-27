<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_cookie_preferences'])) {

    $preferences = [
        'necessary'   => true,
        'analytics'   => isset($_POST['analytics']) ? true : false,
        'marketing'   => isset($_POST['marketing']) ? true : false,
        'third_party' => isset($_POST['third_party']) ? true : false,
        'timestamp'   => time()
    ];
 // Session
    $_SESSION['cookie_consent'] = $preferences;

    // Cookie (30 days)
    setcookie(
        'echofest_consent',
        json_encode($preferences),
        time() + (86400 * 30),
        "/",
        "",
        false,
        true // HttpOnly
    );
      // Redirect back
        $redirect = $_SERVER['HTTP_REFERER'] ?? '../public/index.php';
        header("Location: $redirect");
        exit();
    }