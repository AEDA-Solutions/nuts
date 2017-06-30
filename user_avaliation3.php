<?php

session_start();
$_SESSION['user_avaliation'] = $_POST['user_avaliation'];
header('Location: analise.php');

?>