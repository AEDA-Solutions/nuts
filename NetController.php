<?php
		
	require_once('NetDatabase.php');

	class NetController{

		// primeiro deve ser colocada a latitude e longite por meio do metodo set_location()
		// depois deve ser executada a função run_net_test()
		private $NetDatabase;
		private $latitude;
		private $longitude;
		private $download_speed;
		private $upload_speed;

		public function __construct(){
			$this->NetDatabase = new NetDatabase();
		}

		//todas as funções de obtenção de dados devem ser executadas nessa função
		//para que os dados sejam inseridos na tabela de qualidade de rede permanente
		public function run_net_test(){
			
			session_start();
			if($ping = $this->check_ping("matriculaweb.unb.br", 80, 10)){}
			else{
				return false;}

			if($packetloss = $this->check_packet_loss('www.youtube.com', 10)){}
			else{
			}
			if($jitter = $this->check_jitter("matriculaweb.unb.br", 80, 10)){}
			else{
				return false;}
			

			if($this->NetDatabase->insert_net_data($this->latitude,$this->longitude,$ping,$packetloss,$this->download_speed,$jitter,$this->upload_speed)){

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
			$ping1 = round((($tA - $tB) * 1000), 0); 
			return $ping1;
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

		function set_upload_speed($upload_speed){
			$this->upload_speed = $upload_speed;
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

		public function getDataOrderedByDate(){
			return $this->NetDatabase->get_date_ordered_by_date();
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

		public function weightData(){

			$weightArray = array();
			$data = $this->NetDatabase->get_data_ordered_by_date();
			$DateWeight = sizeof($data);
			for($i = 0; $i < $DateWeight; $i++){
				
				$DownloadWeight = $this->weightDownloadSpeed($data[$i]['download_speed']);
				$PingWeight = $this->weightPing($data[$i]['ping']);
				$JitterWeight = $this->weightJitter($data[$i]['jitter']);

				if(isset($date[$i]['user_avaliation'])){ // a avaliação do usuário varia de 0 a 5
					$FinalWeight = ($DownloadWeight*0.75 + $PingWeight*0.15 + $JitterWeight*0.1)*($this->getDateWeight($i,$DateWeight))*0.7 + ($date[i]['user_avaliation'])*0.3*2 ;

				}
				
				else{
					$FinalWeight = ($DownloadWeight*0.75 + $PingWeight*0.15 + $JitterWeight*0.1)*($this->getDateWeight($i,$DateWeight));
				}

				array_push($weightArray,$FinalWeight);
			}

			return $weightArray;
		}

		private function getDateWeight($i,$DateWeight){

			if(($i >= 0) && ($i<($DateWeight/3))){return (1/3);}
			if(($i >=($DateWeight/3)) && ($i<(2)*($DateWeight/3))){return (2/3);}
			if($i >= (2)*($DateWeight/3)){return 1;}
		}

		public function weightCordinates(){
			$coords_array = array();
			$data = $this->NetDatabase->get_data_ordered_by_date();
			$DateWeight = sizeof($data);
			for($i = 0; $i < $DateWeight; $i++){
				$temp = array($data[$i]['latitude'],$data[$i]['longitude']);
				array_push($coords_array,$temp);
			}

			return $coords_array;

		}

		private function weightDownloadSpeed($download_speed){

			if($download_speed < 0.5){ return 10;}
			else if(($download_speed >= 0.5) && ($download_speed < 0.7)){ return 20;}
			else if(($download_speed >= 0.7) && ($download_speed < 1)){ return 30;}
			else if(($download_speed >= 1) && ($download_speed < 1.8)){ return 40;}
			else if(($download_speed >= 1.8) && ($download_speed < 2.4)){ return 50;}
			else if(($download_speed >= 2.4) && ($download_speed < 3.9)){ return 60;}
			else if(($download_speed >= 3.9) && ($download_speed < 6)){ return 70;}
			else if(($download_speed >= 6) && ($download_speed < 7.5)){ return 80;}
			else if(($download_speed >= 7.5) && ($download_speed < 8)){ return 90;}
			else{ return 10;}

		}

		private function weightPing($ping){
			if($ping > 150){ return 1;}
			else if(($ping <= 150) && ($ping > 130)){ return 2;}
			else if(($ping <= 130) && ($ping > 120)){ return 3;}
			else if(($ping <= 120) && ($ping > 100)){ return 4;}
			else if(($ping <= 100) && ($ping > 80)){ return 5;}
			else if(($ping <= 70) && ($ping > 60)){ return 6;}
			else if(($ping <= 60) && ($ping > 45)){ return 7;}
			else if(($ping <= 45) && ($ping > 30)){ return 8;}
			else if(($ping <= 30) && ($ping > 20)){ return 9;}
			else { return 10;}

		}

		private function weightJitter($jitter){
			if($jitter > 150){ return 1;}
			else if(($jitter <= 150) && ($jitter  > 130)){ return 2;}
			else if(($jitter <= 130) && ($jitter  > 120)){ return 3;}
			else if(($jitter <= 120) && ($jitter > 100)){ return 4;}
			else if(($jitter <= 100) && ($jitter > 80)){ return 5;}
			else if(($jitter <= 70) && ($jitter > 60)){ return 6;}
			else if(($jitter <= 60) && ($jitter > 45)){ return 7;}
			else if(($jitter <= 45) && ($jitter > 30)){ return 8;}
			else if(($jitter <= 30) && ($jitter > 20)){ return 9;}
			else { return 10;}
		}
	}
?>
