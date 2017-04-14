<?php
	
	require_once('Dbcon.php');
	require_once('User.php');

 	class UserController{
 		
 		private $Dbcon = new Dbcon(); //users é o nome da tabela em sql que guarda os usuarios


 		//funcoes publicas
 		public function register_user($User){
 		
 			$connection = $this->Dbcon->connect_mysql();
 			$isThereError = false;

 			if($this->validate_id($User)){

 			}
 			else{
 				// erro na procura do banco de dados ou id ja cadastrada
				echo "Esta matrícula já está cadastrada";
 				$isThereError = true;
 			}

 			if($this->validate_email($User)){

 			}
 			else{
 				// erro na procura do banco de dados ou email ja cadastrado
 				echo "Este email já está cadastrado";
 				$isThereError = true;
 			}

 			if($isThereError){
 				return false;

 			}

 			$name = $User->get_name();
 			$email = $User->get_email();
 			$id = $User->get_id();
 			$password = $User->get_password();
 			$course = $User->get_course();


 			else{
 				//prosseguir com o cadastro
 				$sql = "insert into users(name,email,id,password,course) values('$name','$email','$id','$password','$course')";
				if(mysqli_query($connection,$sql)){
				/*usuario registrado com sucesso*/
				}
				else{
				/*erro no cadastro*/
				echo "Houve um erro ao cadastrar o usuário, contate o administrador.";
				return false;
				}
 			}

 		}

 		public function change_user_name($User,$name){

 			$User->set_name($name);
			$this->update_user_data();
 		}

 		public function change_user_email($User,$email){

 			$User->set_email($email);
			$this->update_user_data();
 		}

 		public function change_user_password($User,$password){

 			$User->set_password($password);
			$this->update_user_data();
 		}

 		public function change_user_course($User,$course){

 			$User->set_course($course));
			$this->update_user_data();
 		}

 		// funcoes privadas
 		
 		private function validate_id($User){

 			$id = $User->get_id();
 			$sql = "select * from users where id ='$id' ";
			if($result = mysqli_query($connection,$sql)){
				if(isset($result['id'])){
					// matricula ja cadastrada
					return false;
				}
				else{
					return true;
				}

			}

			else{
			// erro ao realizar a verificacao
				return false;
			}

		}

 		private function validate_email($User){

 			$email = $User->get_email();
			$sql = "select * from users where email ='$email' ";
			if($result = mysqli_query($connection,$sql)){
				if(isset($result['email'])){
					return false;
				}
				else{
					return true;
				}

			}
			else{
				//erro ao realizar verificação
				return false;
			}		
 		}

 		private function update_user_data($User){

 			$name = $User->get_name();
 			$email = $User->get_email();
 			$id = $User->get_id();
 			$password = $User->get_password();
 			$course = $User->get_course();
 			
 			$connection = $this->Dbcon->connect_mysql();
 			$sql = "update users set name = '$name', email = '$email', password = '$password', course = '$course' where id = '$id'";
			if($result = mysqli_query($connection,$sql)){
				//sucesso na operacao
				}
				else{
					//falha na operacao
					echo "Não foi possivel alterar seus dados, por favor contate o administrador";
					return false;
				}

			}

 		}

 	}
?>