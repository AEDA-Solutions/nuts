<?php
	require_once('Dbcon.php');
	//classe que faz operações na tabela de dados de rede permanente
	class NetDatabase{
		
		private $Dbcon;

		public function __construct(){
			$this->Dbcon = new Dbcon();
		}

		public function insert_net_data($latitude,$longitude,$ping,$packetloss){

 			$connection = $this->Dbcon->connect_mysql();
 			$sql = "INSERT INTO netdata(id,latitude,longitude,ping,packetloss) VALUES(NULL,'$latitude','$longitude','$ping','$packetloss')";
			if(mysqli_query($connection,$sql)){
				//dados registrados com sucesso
				return true;
			}
			else{
				echo "aqui";
				return false;
 			}
		}

	}
?>