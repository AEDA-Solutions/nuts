<?php 

require_once('UserController.php');
$UD = new UserController();
$user_teste = $UD->delete_user(160010152);
echo ($user_teste);

?>