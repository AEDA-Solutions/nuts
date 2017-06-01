<?php

	require_once('UserController.php');

	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$course = $_POST['course'];
	
	$User = new User($name,$id,$email,$password,$course);
	$UserController = new UserController();
	if($UserController->register_user($User)){
		session_start();
		if($UserController->login($id,$password)){
			header('Location: indexusuario.php');
		}			
		 
		else{
			header('Location: index.php?erro=1');
		}
		
	}
	
	else{
		//houve um erro no cadastro
	}
	
?>
