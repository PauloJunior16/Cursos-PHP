<?php

require_once __DIR__ . '/vendor/autoload.php';

$antonio = new Titular(new Cpf('123.456.789-10'), 'Antonio');
$primeiraConta = new Conta($antonio);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo "Titular: " . $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo "CPF: " . $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo "Saldo: " . $primeiraConta->recuperarSaldo() . PHP_EOL;
echo PHP_EOL;
$patricia = new Titular(new Cpf('123.456.789-11'), 'Patricia');
$segundaConta = new Conta($patricia);
$segundaConta->depositar(900);
$segundaConta->sacar(450);

echo "Titular: " . $segundaConta->recuperaNomeTitular() . PHP_EOL;
echo "CPF: " . $segundaConta->recuperaCpfTitular() . PHP_EOL;
echo "Saldo: " . $segundaConta->recuperarSaldo() . PHP_EOL;
echo PHP_EOL;
echo "Quantidade de contas registradas: " . Conta::recuperaNumeroDeContas();