<?php

	require_once('UserController.php');

	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$course = $_POST['course'];

	$User = new User($name,$id,$email,$password,$course);
	$UserController = new UserController();
	$UserController->register_user($User);

?>