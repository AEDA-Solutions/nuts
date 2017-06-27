<?php
		
	require_once('NetDatabase.php');

	class NetController{

		// primeiro deve ser colocada a latitude e longite por meio do metodo set_location()
		// depois deve ser executada a função run_net_test()
		private $NetDatabase;
		private $latitude;
		private $longitude;
		private $download_speed;

		public function __construct(){
			$this->NetDatabase = new NetDatabase();
		}

		//todas as funções de obtenção de dados devem ser executadas nessa função
		//para que os dados sejam inseridos na tabela de qualidade de rede permanente
		public function run_net_test(){
			
			if($ping = $this->check_ping("matriculaweb.unb.br", 80, 10)){}
			else{
				return false;}

			if($packetloss = $this->check_packet_loss('www.youtube.com', 10)){}
			else{
			}
			if($jitter = $this->check_jitter("matriculaweb.unb.br", 80, 10)){}
			else{
				return false;}
			
			if($this->NetDatabase->insert_net_data($this->latitude,$this->longitude,$ping,$packetloss,$this->download_speed,$jitter)){

				return true;
			}

			else{
				return false;}

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

		function check_jitter($host, $port, $timeout) { 

			error_reporting(0);
			ini_set(“display_errors”, 0 );

			$tB = microtime(true); 
			$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
			if (!$fP) { return "down"; } 
			$tA = microtime(true); 
			$ping = round((($tA - $tB) * 1000), 0); 
			return $ping;
			$i = 10;

			$ping1 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping2 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping3 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping4 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping5 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping6 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping7 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping8 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping9 = jitter("google.com.br", 80, 10); 
			sleep(0.002);
			$ping10 = jitter("google.com.br", 80, 10); 
			sleep(0.002);

			$soma = $ping1+$ping2+$ping3+$ping4+$ping5+$ping6+$ping7+$ping8+$ping9+$ping10;
			$media = $soma/$i;
	
			$somatorio = ($ping1 - $media)*($ping1 - $media) + ($ping2 - $media)*($ping2 - $media) + ($ping3 - $media)*($ping3 - $media) + ($ping4 - $media)*($ping4 - $media) + ($ping5 - $media)*($ping5 - $media) + ($ping6 - $media)*($ping6 - $media) + ($ping7 - $media)*($ping7 - $media) + ($ping8 - $media)*($ping8 - $media) + ($ping9 - $media)*($ping9 - $media) + ($ping10 - $media)*($ping10 - $media);
	
			$variancia = $somatorio/$i;
			$desvio_padrao = sqrt($variancia);

			return $desvio_padrao;
	
		}


		function set_location($latitude,$longitude){
			$this->latitude=$latitude;
			$this->longitude=$longitude;
		}

		function set_download_speed($download_speed){
			$this->download_speed = $download_speed;
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

		public function get_nearby_data($latitude,$longitude){
			return $this->NetDatabase->search_by_distance($latitude,$longitude,2000000);
		}

		public function get_last_data(){
			$net_data = $this->get_netdata();
			return end($net_data);
		}
	}
?>