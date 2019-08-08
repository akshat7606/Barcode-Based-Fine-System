<?php
    session_start();
	unset($_SESSION['transID']);
	unset($_SESSION);
	session_destroy();
    header("Location:studentlogin.php");
	exit();
?>