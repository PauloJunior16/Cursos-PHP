<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class CpfTest extends TestCase
{

    /**
     * @dataProvider geraCpf
     * @covers Cpf::__construct
     * @covers Cpf::recuperaNumero
     */
    public function testCpfDoTitularInvalido(Cpf $cpf)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Cpf inválido");

        $cpf = new Cpf("606.678.211-2");
    }

    /**
     * @dataProvider geraCpf
     * @covers Cpf::__construct
     * @covers Cpf::recuperaNumero
     */
    public function testCpfDoTitularValido(Cpf $cpf)
    {
        $cpfTeste =new Cpf('123.456.789-10');
        static::assertEquals($cpf->recuperaNumero(), $cpfTeste->recuperaNumero());
    }

    /**
     * @codeCoverageIgnore
     */
    public function geraCpf()
    {
        $cpf = new Cpf('123.456.789-10');
        return [
            [$cpf]
        ];
    }
}