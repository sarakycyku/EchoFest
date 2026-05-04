<?php
session_start();
session_unset();
session_destroy();
header("Location: /EchoFest/pages/client/login.php");
exit;
?>
