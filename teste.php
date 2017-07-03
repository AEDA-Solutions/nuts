<?php
require_once('NetController.php');
  $NetController = new NetController();
    $weightArray = $NetController->weightData(); // array com os pesos
  $data = $NetController->get_user_data();
  var_dump($data);
?>