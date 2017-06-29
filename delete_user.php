<?php
session_start();
require_once('UserController.php');
$UserController = new UserController();
if($_SESSION['password'] == md5($_POST['password'])){
	$User = new User($_SESSION['name'],$_SESSION['reg'],$_SESSION['email'],$_SESSION['password'],$_SESSION['course']);
	$UserController->delete_user($User);
	unset($_SESSION['id']);
	unset($_SESSION['reg']);
	unset($_SESSION['course']);
	unset($_SESSION['email']); 
	unset($_SESSION['password']);
	unset($_SESSION['name']);

	header('Location: index.php?sucesso=4');
}

else{
	header('Location: configuracoes.php?erro=2');
}
?>