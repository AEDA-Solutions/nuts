<?php
	
	session_start(); 
	require_once('UserController.php');
	$reg = $_POST['reg'];
	$password = md5($_POST['password']);
		
	$UserController = new UserController();
	if($UserController->login($reg,$password)){
		header('Location: perfil.php');
		
	}				 
	else{
		header('Location: index.php?erro=1');
	}

?>

