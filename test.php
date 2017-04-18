<?php

	echo "CHEGUEI";
	require_once('UserController.php');
	echo "CHEGUEI";
	$id = $_POST['id'];
	$password = $_POST['password'];

	$UserController = new UserController();
	$UserController->login($id,$password);

?>