<?php
	require_once('NetDatabase.php');
	$NetDatabase = new NetDatabase();
	$d = $NetDatabase->get_current_user(oid)data_ordered_by_date(1);
	print_r($d);
?>