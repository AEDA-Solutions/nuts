<?php
	
	session_start(); 
	require_once('UserController.php');
	$id = $_POST['id'];
	$password = md5($_POST['password']);
		
	$UserController = new UserController();
	if($UserController->login($id,$password)){
		header('Location: home.php');
	}			
		 
	else{
		header('Location: index.php?erro=1');
	}

?>

