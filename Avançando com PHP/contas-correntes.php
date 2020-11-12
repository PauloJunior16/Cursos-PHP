<?php

$conta1 = [
    'titular' => 'Alberto',
    'saldo' => 1000
];
$conta2 = [
    'titular' => 'Maria',
    'saldo' => 15000
];
$conta3 = [
    'titular' => 'José',
    'saldo' => 2500
];

$contasCorrentes = [$conta1, $conta2, $conta3];

for ($i = 0; $i < count($contasCorrentes); $i++) {
    echo $contasCorrentes[$i]['titular'] . PHP_EOL;
}
