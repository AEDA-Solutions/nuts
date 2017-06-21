<?php 

function jitter($host, $port, $timeout) { 

	error_reporting(0);
	ini_set(“display_errors”, 0 );

	$tB = microtime(true); 
	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
	if (!$fP) { return "down"; } 
	$tA = microtime(true); 
	$ping1 = round((($tA - $tB) * 1000), 0); 
	return $ping1;
}
	$i = 10;

	$ping1 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping2 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping3 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping4 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping5 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping6 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping7 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping8 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping9 = jitter("google.com.br", 80, 10); 
	sleep(0.002);
	$ping10 = jitter("google.com.br", 80, 10); 
	sleep(0.002);

	$soma = $ping1+$ping2+$ping3+$ping4+$ping5+$ping6+$ping7+$ping8+$ping9+$ping10;
	$media = $soma/$i;
	
	$somatorio = ($ping1 - $media)*($ping1 - $media) + ($ping2 - $media)*($ping2 - $media) + ($ping3 - $media)*($ping3 - $media) + ($ping4 - $media)*($ping4 - $media) + ($ping5 - $media)*($ping5 - $media) + ($ping6 - $media)*($ping6 - $media) + ($ping7 - $media)*($ping7 - $media) + ($ping8 - $media)*($ping8 - $media) + ($ping9 - $media)*($ping9 - $media) + ($ping10 - $media)*($ping10 - $media);
	
	$variancia = $somatorio/$i;


	$desvio_padrao = sqrt($variancia);

	//echo "$ping1 \n";
	//echo "$ping2 \n";
	//echo "$ping3 \n";
	//echo "$ping4 \n";
	//echo "$ping5 \n";
	//echo "$ping6 \n";
	//echo "$ping7 \n";
	//echo "$ping8 \n";
	//echo "$ping9 \n";
	//echo "$ping10 \n";

	//echo "Sua média é: $media \n";
	//echo "$Seu somatório total: $variancia \n";
	echo "Seu Jitter é: $desvio_padrao ms";

	//$desvio_padrao = stats_standard_deviation($jitter_temporario);