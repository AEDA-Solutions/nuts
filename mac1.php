<?php 
// LIMPA VARIAVEL IP
$ip = "";
// SE EXISTIR PEGA O IP DA REDE, SE NAO PEGA O IP REMOTO
$ip = ($_SERVER["HTTP_X_FORWARDED_FOR"] != '') ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER['REMOTE_ADDR'];
// MANDA UM PACOTE DE INFORMACAO
$ping = shell_exec("ping -c1 ".$ip."");
// ELE PROCURA SE NA LISTA DO ARP TEM ESSE IP E CAPTURA TODAS AS INFORMACOES
$output = shell_exec("arp -n ".$ip."");
// SEPARA A STRING DE SAIDA POR ESPACO EM BRANCO
$mac = preg_split("/\s+/",$output);
// MACS CADASTRADOS EM UM ARRAY
$macs = array(
        "nome-1" => "00:00:00:00:00:1A",
        "nome-2" => "00:00:00:00:00:1B"
);
//COMPARA OS MACS DA PLACA COM O DO ARRAY
echo ($macs["nome-1"] == $mac[8]) ? "MAC TRUE" : "MAC FALSO";
 ?>