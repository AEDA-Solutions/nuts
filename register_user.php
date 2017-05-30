<?php

	require_once('UserController.php');

	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$course = $_POST['course'];
	
	$User = new User($name,$id,$email,$password,$course);
	$UserController = new UserController();
	if($UserController->register_user($User)){
		echo "Usuário registrado com sucesso !";
		header('Location: indexusuario.php');
		
	}
	else{
		//houve um erro no cadastro
	}
	
?>

<?php
	
	session_start(); 
	require_once('UserController.php');
	$id = $_POST['id'];
	$password = md5($_POST['password']);
		
	$UserController = new UserController();
	if($UserController->login($id,$password)){
		header('Location: indexusuario.php');
	}			
		 
	else{
		header('Location: index.php?erro=1');
	}

?>

