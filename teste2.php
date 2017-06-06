<?php 

require_once('UserController.php');
$UD = new UserController();
$User = new User("bla",111,"BLA","BLA","BLA");
echo ($UD->delete_user($User));

?>