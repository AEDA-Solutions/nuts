<?php
		
	require_once('NetDatabase.php');

	class NetController{

		private $NetDatabase;

		public function __construct(){
			this->NetDatabase = new NetDatabase();
		}

		//todas as funções de obtenção de dados devem ser executadas nessa função
		//para que os dados sejam inseridos na tabela de qualidade de rede permanente
		public function save_data(){

		}

		//retorna um float com o valor do ping em ms se o servidor responder
		//retorna false caso o servidor nao responda
		function ping($host, $port, $timeout) { 
		  	
		  	$tB = microtime(true); 
 		 	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
		 	if (!$fP) { return false; } 
 			$tA = microtime(true); 
			return round((($tA - $tB) * 1000), 0); 
		}

	}
?>