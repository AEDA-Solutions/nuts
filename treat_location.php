<?php
require_once('NetController.php');

if (isset($_POST['latitude'])){
	$NetController = new NetController();
	$NetController->set_location($_POST['latitude'],$_POST['longitude']);
	if($NetController->run_net_test()){
		echo "os dados de rede foram enviados ao banco de dados";
	}

	else{
		echo "banana";
	}
}
else{
	echo "deu banana";
}
?>