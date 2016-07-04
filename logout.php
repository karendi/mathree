<?php
session_start();

include('Login.php');
unset($_SESSION['username']);
session_destroy();

header("Location: Login.html");
exit;
?>
