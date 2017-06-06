<?php 

require_once('UserController.php');
$UD = new UserController();
$User = new User("name",111,"email","passoword","course");
echo ($UD->delete_user($User));

/*
require_once('UserDatabase.php');
$UD = new UserDatabase();
$user_teste = $UD->delete_user_data(160010152);
echo ($user_teste);
*/

?>