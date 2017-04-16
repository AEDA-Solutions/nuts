<?php
	
	require_once('Dbcon.php')

	class DbController{

		private $Dbcon = new Dbcon();

		public function search_by_email($email){

			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM users where email ='$email' ";
			if($result = mysqli_query($connection,$sql)){
				return $result;
			}
			else{
				//erro ao realizar a verificacao na tabela users
				return false;
			}	
 		}

 		public function search_by_id($id){

 			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM users where id ='$id' ";
			if($result = mysqli_query($connection,$sql)){
				return $result;
			}
			else{
				//erro ao realizar a verificacao na tabela users
				return false;
			}	
 		}

 		public function insert_user($name,$email,$id,$password,$course){

 			$connection = $this->Dbcon->connect_mysql();
 			$sql = "insert into users(name,email,id,password,course) values('$name','$email','$id','$password','$course')";
			if(mysqli_query($connection,$sql)){
				/*usuario registrado com sucesso*/
				return true;
			}
			else{
				return false;
 			}
		}

		public function update_user($name,$email,$id,$password,$course){

			$connection = $this->Dbcon->connect_mysql();
 			$sql = "update users set name = '$name', email = '$email', password = '$password', course = '$course' where id = '$id'";
			if($result = mysqli_query($connection,$sql)){
				return true;
				//sucesso na operacao
				}
				else{
					return false;
				}

		}
	}
?>