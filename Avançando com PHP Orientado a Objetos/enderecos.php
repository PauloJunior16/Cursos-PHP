<?php

use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$umEndereco = new Endereco(
    'São Paulo',
    'Tatuapé',
    'Rua generica',
    '100'
);

$outroEndereco = new Endereco(
    'São Paulo',
    'Morumbi',
    'Rua de rico',
    '200'
);

echo $umEndereco . PHP_EOL;
echo $outroEndereco . PHP_EOL;