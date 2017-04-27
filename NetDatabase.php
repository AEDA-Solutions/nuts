<?php
	
	//classe que faz operações na tabela de dados de rede permanente
	class NetDatabase(){
		
		private $Dbcon;

		public function __construct(){
			$this->Dbcon = new Dbcon();
		}

	}
?>