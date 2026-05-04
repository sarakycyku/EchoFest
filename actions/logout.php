<?php
session_start();
session_unset();
session_destroy();
header("Location: ../pages/client/login.php");
exit;
?>