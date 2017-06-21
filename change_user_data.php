<?php
require_once("UserController.php");
session_start();
$isthereChange = false;
$invalid_email = false;
$UserController = new UserController();
if($_SESSION['email'] != $_POST['email']){
	
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
	header('Location: configuracoes.php?sucesso=1');
}

else if($invalid_email){ //EMAIL INVALIDO
	header('Location: configuracoes.php?erro=1');
}
else{ // NAO HOUVE MUDANÇAS
	header('Location: configuracoes.php?sucesso=2');
}


?>