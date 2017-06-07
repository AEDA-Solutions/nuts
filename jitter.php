<?php 

function jitter($host, $port, $timeout) { 

	error_reporting(0);
	ini_set(“display_errors”, 0 );

	$tB = microtime(true); 
	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
	if (!$fP) { return "down"; } 
	$tA = microtime(true); 
	$ping1 = round((($tA - $tB) * 1000), 0)." ms"; 
	return $ping1;
}
	$j1 = jitter("google.com.br", 80, 10);
	sleep(2);
	$j2 = jitter("google.com.br", 80, 10);
	sleep(2);
	$j3 = jitter("google.com.br", 80, 10);

	$soma = ($j1+$j2+$j3)/3;

	echo "Seu Jitter é: $soma";
?>