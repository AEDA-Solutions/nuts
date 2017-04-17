<?php
	
	require_once('UserController.php');
	
	$id = $_POST['id'];
	$password = $_POST['password'];

	$UserController = new UserController();
	$UserController->login($id,$password);

?>
