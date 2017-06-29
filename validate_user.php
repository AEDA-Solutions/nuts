<?php
	
	session_start(); 
	require_once('UserController.php');
	$reg = $_POST['reg'];
	$password = md5($_POST['password']);
		
	$UserController = new UserController();
	$errorCode = $UserController->login($reg,$password);
	if($errorCode == 3){ // sucesso no login
		header('Location: perfil.php?sucesso=1');
		
	}				 
	else if($errorCode == 1){ // matricula nao encontrada
		header('Location: index.php?erro=1');
	}

	else if($errorCode == 2){ // matricula encontrada, mas senha errada
		header('Location: index.php?erro=6');
	}
?>

