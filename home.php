<?php

if(isset($_SESSION['id'])){
	//o usuario esta autenticado
	echo "Usuário autenticado !";
}

else{
	//o usuario nao foi autenticado
	header('Location: index.php?erro=1');
}

?>