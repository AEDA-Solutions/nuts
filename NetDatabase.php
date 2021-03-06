<?php
	require_once('Dbcon.php');
	//classe que faz operações na tabela de dados de rede permanente
	class NetDatabase{
		
		private $Dbcon;

		public function __construct(){
			$this->Dbcon = new Dbcon();
		}

		public function insert_net_data($latitude,$longitude,$ping,$packetloss,$download_speed,$jitter,$upload_speed){
			session_start();
 			$connection = $this->Dbcon->connect_mysql();
 			if(isset($_SESSION['id'])){
 				$id = $_SESSION['id'];
 				if(isset($_SESSION['user_avaliation'])){
 					$user_avaliation = $_SESSION['user_avaliation'];
 					$sql = "INSERT INTO netdata(id,latitude,longitude,ping,packetloss,download_speed,jitter,upload_speed,user_avaliation,fk_user) VALUES(NULL,'$latitude','$longitude','$ping','$packetloss','$download_speed','$jitter','$upload_speed','$user_avaliation','$id')"; 	
 								
 				}
 				else{
 					$sql = "INSERT INTO netdata(id,latitude,longitude,ping,packetloss,download_speed,jitter,upload_speed,fk_user) VALUES(NULL,'$latitude','$longitude','$ping','$packetloss','$download_speed','$jitter','$upload_speed','$id')";
 				}
 			}

 			else{

 				$sql = "INSERT INTO netdata(id,latitude,longitude,ping,packetloss,download_speed,jitter,upload_speed) VALUES(NULL,'$latitude','$longitude','$ping','$packetloss','$download_speed','$jitter','$upload_speed')";

 			}
			if(mysqli_query($connection,$sql)){
				//dados registrados com sucesso
				return true;
			}
			else{		
				echo "aqui";		
				return false;
 			}
		}

		public function search_by_ping($ping){

 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata where ping ='$ping'";
			if($result = mysqli_query($connection,$sql)){
				$netdata = mysqli_fetch_assoc($result);
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}	
 		}

 		public function search_by_jitter($jitter){


 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata where jitter ='$jitter'";
			if($result = mysqli_query($connection,$sql)){
				$netdata = mysqli_fetch_assoc($result);
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
 		}
 	}
 		public function search_by_distance($latitude,$longitude,$radius){
 			//Obs: distancia deve ser passada em metros
 			//Caso sejam adicionados mais campos a tabela netdata, a querry
 			//dessa função deverá ser atualizada para obter tambem esse novos campos		
 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT latitude, longitude, ping, packetloss,download_speed,upload_speed,jitter, distance
  					FROM (
 					SELECT z.latitude,
       						z.longitude,
       						z.ping, 
      						z.packetloss,
      						z.download_speed,
      						z.jitter,
      						z.user_avaliation,
      						z.upload_speed,
       						p.radius,
       					 	p.distance_unit
                 			* DEGREES(ACOS(COS(RADIANS(p.latpoint))
                 			* COS(RADIANS(z.latitude))
                 			* COS(RADIANS(p.longpoint - z.longitude))
                 			+ SIN(RADIANS(p.latpoint))
                 			* SIN(RADIANS(z.latitude)))) AS distance
  					FROM netdata AS z
  					JOIN (   /* these are the query parameters */
       					SELECT  '$latitude'  AS latpoint, '$longitude' AS longpoint,
      			        '$radius' AS radius, 111045 AS distance_unit
    				) AS p ON 1=1
  					
  					WHERE z.latitude
     					BETWEEN p.latpoint  - (p.radius / p.distance_unit)
         			AND p.latpoint  + (p.radius / p.distance_unit)
    				AND z.longitude
    				 BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
         				AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
 					) AS d
 					WHERE distance <= radius
 					ORDER BY distance
 					LIMIT 1";
			
			if($result = mysqli_query($connection,$sql)){
				$netdata = array();
				foreach($result as $row){
					array_push($netdata,$row);
				}
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}	
 		}

 		public function get_data_ordered_by_date(){

 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata ORDER BY usertime";
			if($result = mysqli_query($connection,$sql)){
				$netdata = array();
				foreach($result as $row){
					array_push($netdata,$row);
				}
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}	
 		}

 		public function get_all_data(){
 			//retorna a tabela netdata
 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata";
			if($result = mysqli_query($connection,$sql)){
				$netdata = array();
				foreach($result as $row){
					array_push($netdata,$row);
				}
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}		
 		}

 		public function get_best_data(){
 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata ORDER BY download_speed ";
			if($result = mysqli_query($connection,$sql)){
				$netdata = array();
				foreach($result as $row){
					array_push($netdata,$row);
				}
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}
 		}
 		public function get_udata_ordered_by_date($id){

 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata WHERE fk_user = '$id' ORDER BY usertime LIMIT 10";
			if($result = mysqli_query($connection,$sql)){
				$netdata = array();
				foreach($result as $row){
					array_push($netdata,$row);
				}
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}	
 		}
 		public function populateDb(){
 			$lat = array(-15.7628,-15.7599,-15.778,-15.7709,-15.7652,-15.7777,-15.7538,-15.7758);

 			$long = array(-47.8736,-47.8700,-47.8578,-47.8635,-47.8587,-47.8576);

 			for($i = 0; $i< sizeof($lat);$i++){
 				for($j =0;$j<sizeof($long);$j++){
 				$latitude = $lat[$i];
 				$longitude = $long[$j];
 				$ping = rand(10, 150);
 				$jitter = rand(10, 150);
 				$download_speed = rand(0,15);
 				$packetloss = rand(0,100);
 				$upload_speed = rand(0,7);
 				$x = rand(1,2);
 				$sql = "INSERT INTO netdata(latitude,longitude,ping,packetloss,download_speed,upload_speed,jitter,fk_user) VALUES('$latitude','$longitude','$ping','$packetloss','$download_speed','$upload_speed','$jitter','$x')";

 				$connection = $this->Dbcon->connect_mysql();
 				$result = mysqli_query($connection,$sql);
 			}

 			}
 			
 		}


	}
?>
