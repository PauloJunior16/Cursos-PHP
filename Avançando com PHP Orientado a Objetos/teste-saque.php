<?php

use Alura\Banco\Modelo\Conta\{Titular, Conta, ContaPoupanca, ContaCorrente};
use Alura\Banco\Modelo\{CPF, Endereco};

require_once 'autoload.php';

$conta = new ContaPoupanca(
    new Titular(
        new CPF('123.456.789-10'),
        'Asdrubal Gomes',
        new Endereco('São Paulo', 'Itaquera', 'Rua da Estação', '1')
    )
);

$conta->deposita(500);
$conta->saca(100);

echo $conta->recuperaSaldo() . PHP_EOL;