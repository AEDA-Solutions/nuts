<?php
	require_once('NetController.php');
  $NetController = new NetController();
  $data = $NetController->get_user_data();
  echo json_encode($data);
?>