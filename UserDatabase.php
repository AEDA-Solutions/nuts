<?php
	
	require_once('Dbcon.php');
	require_once('User.php');

	class UserDatabase{

		private $Dbcon;

		public function __construct(){
			$this->Dbcon = new Dbcon();
		}

		public function search_by_email($email){

			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM users where email ='$email' ";
			if($result = mysqli_query($connection,$sql)){
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
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
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
			else{
				//erro ao realizar a verificacao na tabela users
				return false;
			}	
 		}

 		public function insert_user($User){

 			$name = $User->get_name();
			$email = $User->get_email();
			$id = $User->get_id();
			$password =$User->get_password();
			$course = $User->get_course();

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

		public function update_user_data($User){

			$name = $User->get_name();
			$email = $User->get_email();
			$id = $User->get_id();
			$password =$User->get_password();
			$course = $User->get_course();

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

		public function delete_user_data($id){

 			$connection = $this->Dbcon->connect_mysql();
 			$sql = "DELETE from users WHERE id = '$id'";
			if(mysqli_query($connection,$sql)){
				/*usuario apagado com sucesso*/
				return true;
			}
			else{
				return false;
 			}
		}

		public function search_by_id_and_password($id,$password){
			//usada para o login do usuario
			$connection = $this->Dbcon->connect_mysql();
			$sql = "SELECT * FROM users WHERE id ='$id' AND password = '$password'";
			if($result = mysqli_query($connection,$sql)){
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
			else{
				echo "Houve um erro na verificacao, contate o administrador";
				return false;
				//erro ao acessar o banco de dados
			}
		}
	}
?>