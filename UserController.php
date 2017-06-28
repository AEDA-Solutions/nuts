<?php
	
	require_once('UserDatabase.php');

 	class UserController{
 		
 		private $UserDatabase;

 		public function __construct(){
 			$this->UserDatabase = new UserDatabase();
 		} 
 		
 		public function login($reg,$password){
 			
 			$user_data = $this->UserDatabase->search_by_reg_and_password($reg,$password);
 
 			if(isset($user_data['reg'])){
 				//usuario foi encontrado
 				//validar session tbm na home.php
 				$_SESSION['id'] = $user_data['id'];
 				$_SESSION['reg'] = $user_data['reg'];
				$_SESSION['course'] = $user_data['course'];
				$_SESSION['email'] = $user_data['email'];
				$_SESSION['password'] = $user_data['password'];
				$_SESSION['name'] = $user_data['name'];
				
				return true;
 			}

 			else{
 			//usuario nao existe
			//Erro pode ser recuperado via $_GET['erro'] no index.php
			return false;
 			}

 		}

 		public function register_user($User){
 			//0 erro de sql
 			//1 sucesso
 			//2 matricula
 			//3 email
 			//4 ambos
 		
 			$valid_reg = false;
 			$valid_email = false;
 			$email = $User->get_email();
 			$reg = $User->get_reg();
 			
 			if($this->validate_reg($reg)){
 				$valid_reg = true;
 			}
 			else{
 				// erro na procura do banco de dados ou id ja cadastrada
				// echo "Esta matrícula já está cadastrada";

 			}

 			if($this->validate_email($email)){
 				$valid_email = true;
 			}
 			else{
 				// erro na procura do banco de dados ou email ja cadastrado
 				//echo "Este email já está cadastrado";
 				
 			}

 			if($valid_email && $valid_reg){
 				//prosseguir com o cadastro
 
 				if($this->UserDatabase->insert_user($User)){
 					return 1;
 					//usuario cadastrado com sucesso
 				}

 				else{
 					//echo "Houve um erro ao cadastrar o usuário, contate o administrador.";
					return false;
 				}

 			}


 			else if(!($valid_reg) && !($valid_email)){// ambos email a matricula estão invalidos
 				return 4;
 			}

 			else if (!($valid_reg) && ($valid_email)){ // apenas a matricula está invalida
 				return 2;
 			}

 			else if($valid_email && !($valid_reg)){ // apenas o email está invalido 
 				return 3;
 			}
 			

 		}

 		public function change_user_email($email){

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
 		
 		public function validate_reg($reg){

 			$user_data = $this->UserDatabase->search_by_reg($reg);
 			
 			if(isset($user_data['reg'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 
		}

 		public function validate_email($email){

 			$user_data = $this->UserDatabase->search_by_email($email);
 			
 			if(isset($user_data['email'])){
 				return false;
 			}	
 			else{
 				return true;
 			}
 		}

 		public function delete_user($User){

 			$reg = $User->get_reg();

 			if($this->UserDatabase->delete_user_data($reg)){
 				// deu certo \o/
 				return true;
 			}

 			else{
 				// deu ruim :(
 				return false;
 			}

 		}

 		public function update_user(){
 			//função que atualiza os dados do usuário logado, com base nas variáveis de SESSAO
 			$User = new User($_SESSION['name'],$_SESSION['reg'],$_SESSION['email'],$_SESSION['password'],$_SESSION['course']);
 			if($this->UserDatabase->update_user_data($User)){
 				return true;
 			}

 			else{
 				return false;
 			}
 		}

 	}
?>