<?php

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Alberto',
        'saldo' => 1000
    ],
    '123.456.789-11' => [
        'titular' => 'Maria',
        'saldo' => 15000
    ],
    '123.456.789-12' => [
        'titular' => 'José',
        'saldo' => 2500
    ]
];

$contasCorrentes['123.258.852-12'] = [
    'titular' => 'Claudia',
    'saldo' => 2000
];

foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . " " . $conta['titular'] . PHP_EOL;
}
