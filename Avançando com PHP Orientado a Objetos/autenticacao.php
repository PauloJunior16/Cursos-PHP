<?php

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Service\Autenticador;
use Alura\Banco\Service\Autenticavel;

require_once 'autoload.php';

$autenticador = new Autenticador;
$umDiretor = new Diretor(
    'Temer',
    new CPF('123.456.789-11'),
    '5000'
);

$autenticador->tentaLogin($umDiretor, '1234') . PHP_EOL;