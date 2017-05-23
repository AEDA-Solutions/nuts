<?php
		
	require_once('NetDatabase.php');

	class NetController{

		// primeiro deve ser colocada a latitude e longite por meio do metodo set_location()
		// depois deve ser executada a função run_net_test()
		private $NetDatabase;
		private $latitude;
		private $longitude;

		public function __construct(){
			$this->NetDatabase = new NetDatabase();
		}

		//todas as funções de obtenção de dados devem ser executadas nessa função
		//para que os dados sejam inseridos na tabela de qualidade de rede permanente
		public function run_net_test(){
			
			if($ping = $this->check_ping("matriculaweb.unb.br", 80, 10)){}
			else{return false;}

			if($packetloss = $this->check_packet_loss('www.netflix.com', 20)){}
			else{}

			if($this->NetDatabase->insert_net_data($this->latitude,$this->longitude,$ping,$packetloss)){
				return true;
			}

			else{return false;}

		}

		//retorna um float com o valor do ping em ms se o servidor responder
		//retorna false caso o servidor naoresponda
		function check_ping($host, $port, $timeout) { 
		  	//retorna o ping caso de certo, ou false caso de errado

		  	$tB = microtime(true); 
 		 	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
		 	if (!$fP) { return false; } 
 			$tA = microtime(true); 
			return round((($tA - $tB) * 1000), 0); 
		}

		function set_location($latitude,$longitude){
			$this->latitude=$latitude;
			$this->longitude=$longitude;
		}


		function check_packet_loss($host, $count) {
    		$command = 'ping -c %d %s';
    		$output = shell_exec(sprintf($command, $count, $host));

    		if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
      		  $packetLoss = (float)$match[1]; 
  			
  			} 

    		else {
    			return false;
        		//throw new \Exception('Packet loss not found.');
    		}

    
    		return $packetLoss;
		}

		public function get_netdata(){
			return $this->NetDatabase->get_all_data();
		}
	}
?>