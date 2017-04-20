<?php
	
	require_once('DbController.php');
	require_once('User.php');

 	class UserController{
 		
 		private $DbController;
 		private $home;
 		private $error;

 		public function __construct(){
 			$this->DbController = new DbController();
 			$this->home = 'home.php';
 			$this->error = 'index.php?erro=1';
 		} 
 		
 		public function login($id,$password){
 			
 			$user_data = $this->DbController->search_by_id_and_password($id,$password);
 
 			if(isset($user_data['id'])){
 				//usuario foi encontrado
 				//validar session tbm na home.php
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['email'] = $user_data['email'];
				header("Location: $this->home");
				return true;
 			}

 			else{
 			//usuario nao existe
			//Erro pode ser recuperado via $_GET['erro'] no index.php
			header("Location: $this->error");
			return false;
 			}
 		 }


 		public function register_user($User){
 		
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

 			else{
 				//prosseguir com o cadastro
 				$name = $User->get_name();
 				$email = $User->get_email();
 				$id = $User->get_id();
 				$password = $User->get_password();
 				$course = $User->get_course();
 				if($this->DbController->insert_user($name,$email,$id,$password,$course)){
 					return true;
 					//usuario cadastrado com sucesso
 				}

 				else{
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

 			$User->set_course($course);
			$this->update_user_data();
 		}

 		// funcoes privadas
 		
 		private function validate_id($User){

 			$id = $User->get_id();
 			$user_data = $this->DbController->search_by_id($id);
 			
 			if(isset($user_data['id'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 
		}

 		private function validate_email($User){

 			$email = $User->get_email();
 			$user_data = $this->DbController->search_by_email($email);
 			
 			if(isset($user_data['email'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 		}

 		private function update_user_data($User){

 			$name = $User->get_name();
 			$email = $User->get_email();
 			$id = $User->get_id();
 			$password = $User->get_password();
 			$course = $User->get_course();

 			if($this->DbController->update_user($name,$email,$id,$password,$course)){
 				//sucesso na operacao
 			}

 			else{
 				//falha na operacao
				echo "Não foi possivel alterar seus dados, por favor contate o administrador";
 			}

 		}

 	}
?>