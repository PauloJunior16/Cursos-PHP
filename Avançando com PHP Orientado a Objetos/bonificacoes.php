<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\{CPF};
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Funcionario\Funcionario;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\Funcionario\Desenvolvedor;
use Alura\Banco\Modelo\Funcionario\EditorVideo;

$umFuncionario = new Desenvolvedor(
    'Astoulfo',
    new CPF('987.654.321-10'),
    '1000'
);

$umFuncionario->sobeDeNivel();

$umaFuncionaria = new Gerente(
    'Maria',
    new CPF('987.654.321-11'),
    '3000'
);

$umDiretor= new Diretor(
    'Bozonaro',
    new CPF('987.654.321-66'),
    '5000'
);

$umEditor= new EditorVideo(
    'Gaveta',
    new CPF('101.010.321-01'),
    '1500'
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umaFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);
echo $controlador->recuperaTotal() . PHP_EOL;