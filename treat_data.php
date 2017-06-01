<?php
require_once('NetController.php');
//post de latitude conterá uma string vazia "" caso a aquisição da posição tenha falhado

if ($_POST['latitude']){
	$NetController = new NetController();
	$NetController->set_location($_POST['latitude'],$_POST['longitude']);
	$NetController->set_download_speed($_POST['download_speed']);
	if($NetController->run_net_test()){
		//echo "os dados de rede foram enviados ao banco de dados";
		header('Location: tabela.php');
	}

	else{
		//echo "banana";
	}
}
else{
	//echo "deu banana";
}

?>