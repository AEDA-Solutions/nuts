<?php
session_start();
require_once('UserController.php');
if(md5($_POST['old_password']) == $_SESSION['password']){
	$_SESSION['password'] = md5($_POST['new_password']);
	$UserController = new UserController();
	$UserController->update_user();
	header('Location: senha.php?sucesso=1');
}
else{
	header('Location: senha.php?sucesso=0');
}

?>