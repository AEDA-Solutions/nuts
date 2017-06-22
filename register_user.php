<?php

	require_once('UserController.php');

	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$course = $_POST['course'];
	
	$User = new User($name,$id,$email,$password,$course);
	$UserController = new UserController();
	$err = $UserController->register_user($User);
	if($err == 1){
		session_start();		
		if($UserController->login($id,$password)){
			header('Location: perfil.php?sucesso=1');
		}			
	}

	else if($err == 2){ // matricula ja cadastrada
		header('Location: sign_up.php?erro=2');
	}

	else if($err == 3){ // email ja cadastrado
		header('Location: sign_up.php?erro=3');
	}

	else if($err == 4){ // email e matricula ja cadastrados
		header('Location: sign_up.php?erro=4');
	}

	else{ // erro no banco de dados
		header('Location: sign_up.php?erro=5');
	}
	
?>
