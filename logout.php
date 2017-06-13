<?php
	
	session_start();

	unset($_SESSION['id']);
	unset($_SESSION['course']);
	unset($_SESSION['email']); 
	unset($_SESSION['password']);
	unset($_SESSION['name']);

	header('Location: index.php');

?>
