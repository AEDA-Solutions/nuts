<?php
	
	session_start();

	unset($_SESSION['id']);
	unset($SESSION['email']);

	header('Location : home.php');

?>