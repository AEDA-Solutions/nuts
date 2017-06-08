<?php
	
	session_start();
	require_once("UserController.php");
	
	if($_POST['course'] != $_SESSION['course']){
		$_SESSION['course'] = $_POST['course'];
	}
	
	if($_POST['email'] != $_SESSION['email']){
		$_SESSION['email'] = $_POST['email'];
	}
	
	$UserController = new UserController();
	if($UserController->update_user()){
		//header('Location: ');
	}

	else{
		//header	
	
	}



?>
