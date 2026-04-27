<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$has_consented = isset($_SESSION['cookie_consent']) || isset($_COOKIE['echofest_consent']);
?>