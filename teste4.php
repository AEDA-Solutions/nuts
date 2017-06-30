<?php
session_start();
require_once("NetDatabase.php");
$A = new NetDatabase();
$A->populateDb();
?>