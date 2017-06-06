<?php
	
	require_once('UserDatabase.php');

 	class UserController{
 		
 		private $UserDatabase;

 		public function __construct(){
 			$this->UserDatabase = new UserDatabase();
 		} 
 		
 		public function login($id,$password){
 			
 			$user_data = $this->UserDatabase->search_by_id_and_password($id,$password);
 
 			if(isset($user_data['id'])){
 				//usuario foi encontrado
 				//validar session tbm na home.php
				$_SESSION['id'] = $user_data['id'];
				$_SESSION['email'] = $user_data['email'];
				return true;
 			}

 			else{
 			//usuario nao existe
			//Erro pode ser recuperado via $_GET['erro'] no index.php
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
 
 				if($this->UserDatabase->insert_user($User)){
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
			if($this->UserDatabase->update_user_data($User)){
				//sucesso
			}
			else{

			}
 		}

 		public function change_user_email($User,$email){

 			$User->set_email($email);
			if($this->UserDatabase->update_user_data($User)){
				//sucesso
			}
			else{

			}
 		}

 		public function change_user_password($User,$password){

 			$User->set_password($password);
			if($this->UserDatabase->update_user_data($User)){
				//sucesso
			}
			else{

			}
 		}

 		public function change_user_course($User,$course){

 			$User->set_course($course);
			if($this->UserDatabase->update_user_data($User)){
				//sucesso
			}
			else{

			}
 		}

 		// funcoes privadas
 		
 		private function validate_id($User){

 			$id = $User->get_id();
 			$user_data = $this->UserDatabase->search_by_id($id);
 			
 			if(isset($user_data['id'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 
		}

 		private function validate_email($User){

 			$email = $User->get_email();
 			$user_data = $this->UserDatabase->search_by_email($email);
 			
 			if(isset($user_data['email'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 		}

 		public function delete_user($User){

 			$id = $User->get_id();

 			if($this->UserDatabase->delete_user_data($id)){
 				// deu certo \o/
 				return true;
 			}

 			else{
 				// deu ruim :(
 				return false;
 		}

 		}

 	}
?>