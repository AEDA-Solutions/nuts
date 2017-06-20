<?php
require_once("UserController.php");
session_start();
$isthereChange = false;
$invalid_email = false;
if($_SESSION['email'] != $_POST['email']){
	
	$UserController = new UserController();
	if($UserController->validate_email($_POST['email'])){
		$_SESSION['email'] = $_POST['email'];
		$isthereChange = true;
	}
	else{
		$invalid_email = true;
	}
}
if($_SESSION['course'] != $_POST['course']){
	$isthereChange = true;
	$_SESSION['course'] = $_POST['course'];
}

if($isthereChange && (!$invalid_email)){ //SUCESSO
	$UserController->update_user();
	header('Location: configuracoes?sucesso=1')
}

else if($invalid_email){ //EMAIL INVALIDO
	header('Location: configuracoes?erro=1')
}
else{ // NAO HOUVE MUDANÇAS
	header('Location: configuracoes?sucesso=2')
}


?>