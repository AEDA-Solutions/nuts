<?php

function checkPacketLoss($address, $count) {
    $command = 'ping -c %d %s';
    $output = shell_exec(sprintf($command, $count, $address));

    if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
        $packetLoss = (float)$match[1]; 
    } else {
        throw new \Exception('Packet loss not found.');
    }

    return $packetLoss;
}

echo checkPacketLoss('www.globoesporte.com', 30);
?>