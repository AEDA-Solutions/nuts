<?php
	require_once('Dbcon.php');
	//classe que faz operações na tabela de dados de rede permanente
	class NetDatabase{
		
		private $Dbcon;

		public function __construct(){
			$this->Dbcon = new Dbcon();
		}

		public function insert_net_data($latitude,$longitude,$ping,$packetloss,$download_speed){

 			$connection = $this->Dbcon->connect_mysql();
 			$sql = "INSERT INTO netdata(id,latitude,longitude,ping,packetloss,download_speed) VALUES(NULL,'$latitude','$longitude','$ping','$packetloss','$download_speed')";
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
			$sql = "SELECT * FROM netdata where ping ='ping'";
			if($result = mysqli_query($connection,$sql)){
				$netdata = mysqli_fetch_assoc($result);
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
			}	
 		}
/*
 		public function search_by_jitter($jitter){


 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM netdata where jitter ='jitter'";
			if($result = mysqli_query($connection,$sql)){
				$netdata = mysqli_fetch_assoc($result);
				return $netdata;
			}
			else{
				//erro ao realizar a verificacao na tabela netdata
				return false;
 		}
*/
 		public function search_by_distance($latitude,$longitude,$radius){
 			//Obs: distancia deve ser passada em metros
 			//Caso sejam adicionados mais campos a tabela netdata, a querry
 			//dessa função deverá ser atualizada para obter tambem esse novos campos		
 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT latitude, longitude, ping, packetloss,download_speed, distance
  					FROM (
 					SELECT z.latitude,
       						z.longitude,
       						z.ping, 
      						z.packetloss,
      						z.download_speed,
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
 					LIMIT 10";
			
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

	}
?>
