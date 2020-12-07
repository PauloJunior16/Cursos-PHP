<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class ContaTest extends TestCase
{

    public function testValorSaqueDeveSerPositivo()
    {
//        $this->expectException(DomainException::class);
//        $this->expectExceptionMessage('Valor do deposito deve ser positivo');

        $titular = new Titular(new Cpf('123456789-10'), 'titular teste');

        $conta1 = new Conta($titular);
        $conta1->depositar(1000);

    }
}