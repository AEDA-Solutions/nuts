<?php

require_once('NetController.php');
$Uc = new NetController();
$user_data = $Uc->get_netdata();
echo print_r($user_data);

?>