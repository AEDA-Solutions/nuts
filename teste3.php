<?php
	
	require_once('NetDatabase.php');
	$NetController = new NetDatabase();
	$d = $NetController->search_by_distance(-15.7942,-47.8822,200000);
	echo var_dump($d);

?>