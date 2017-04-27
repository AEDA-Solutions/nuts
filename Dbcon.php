<?php

class Dbcon{
	 //host
	 private $host = 'localhost'; 
	 
	 //usuario
	 private $user = 'root';	

	 //senha
	 private $password = '';

	 //banco de dados
	 private $database = 'Nuts';

	 public function connect_mysql(){
	 //criar conexao
	 	$connection = mysqli_connect($this->host,$this->user,$this->password,$this->database);
	 	//ajustar charset
	 	mysqli_set_charset($connection,'utf8');
	 	return $connection;

	 }

	public function __construct(){

	 }	
}

?>