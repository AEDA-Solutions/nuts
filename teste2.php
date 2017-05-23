<?php 

require_once('UserDatabase.php');
$UD = new UserDatabase();
$user_teste = $UD->delete_user_data(160010152);
echo ($user_teste);

?>