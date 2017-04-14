<?php

class Dbcon{
	 //host
	 private $host = 'localhost'; 
	 
	 //usuario
	 private $user = 'root';	

	 //senha
	 private $password = '';

	 //banco de dados
	 private $database = 'nuts';

	 public function connect_mysql(){
	 //criar conexao
	 	$connection = mysqli_connect($this->host,$this->usuario,$this->senha,$this->database);
	 	//ajustar charset
	 	mysqli_set_charset($connection,'utf8');
	 	return $connection;

	 }

	 public function __construct($host,$user,$password,$database){
	 	$this->host = $host;
	 	$this->user = $user;
	 	$this->password = $password;
	 	$this->database= $database;
	 }

	public function __construct(){

	 }
	
}

?>