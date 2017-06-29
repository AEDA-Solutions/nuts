<?php
	require_once('NetController.php');
	$NetController = new NetController();
	$weightArray = $NetController->weightData(); // array com os pesos
	$data = $NetController->weightCordinates(); // array onde cada elemento é um array com latitude e longitude
	for($i = 0; $i < sizeof($weightArray); $i++){
		array_push($data[$i],$weightArray[$i]);
	}	
	print_r($weightArray);
?>