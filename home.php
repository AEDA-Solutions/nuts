<?php
session_start();

if(isset($_SESSION['reg'])){
	//o usuario esta autenticado
	echo "Usuário autenticado !";
}
else{
	//o usuario nao foi autenticado
	//header('Location: index.php?erro=2');
}
?>