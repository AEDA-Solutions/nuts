<?php
		
	require_once('NetDatabase.php');

	class NetController{

		private $NetDatabase;

		public function __construct(){
			$this->NetDatabase = new NetDatabase();
		}

		//todas as funções de obtenção de dados devem ser executadas nessa função
		//para que os dados sejam inseridos na tabela de qualidade de rede permanente
		public function save_data(){

		}

		//retorna um float com o valor do ping em ms se o servidor responder
		//retorna false caso o servidor nao responda
		function checkPing($host, $port, $timeout) { 
		  	//retorna o ping caso de certo, ou false caso de errado

		  	$tB = microtime(true); 
 		 	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
		 	if (!$fP) { return false; } 
 			$tA = microtime(true); 
			return round((($tA - $tB) * 1000), 0); 
		}

		function location(){
			header('Location: get_location.php');
		}


		function checkPacketLoss($address, $count) {
    		$command = 'ping -c %d %s';
    		$output = shell_exec(sprintf($command, $count, $address));

    		if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
      		  $packetLoss = (float)$match[1]; 
  			
  			} 

    		else {
    			return false;
        		//throw new \Exception('Packet loss not found.');
    		}

    
    		return $packetLoss;
		}
	}
?>