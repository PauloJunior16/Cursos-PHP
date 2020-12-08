<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class TitularTest extends TestCase
{

    /**
     * @dataProvider geraCpf
     * @covers Titular::__construct()
     * @covers Titular::validaNomeTitular
     * @uses CPF::__construct()
     * @uses Titular::validaNomeTitular()
     */
    public function testTitularComNomeInvalido($cpf)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Nome precisa ter pelo menos 5 caracteres");

        $titular = new Titular($cpf, "J");
    }

    /**
     * @dataProvider geraTitular
     * @covers Titular::recuperaNome
     * @covers Titular::__construct
     * @covers Titular::validaNomeTitular
     * @covers Conta::recuperaNomeTitular
     * @covers  Conta::__construct
     * @covers Conta::__destruct
     * @covers Cpf::__construct
     */
    public function testTitularComNomeValido(Titular $titular)
    {
        $titularTeste = new Titular(new Cpf('123.456.789-10'), 'Titular de Teste');
        $conta = new Conta($titularTeste);

        static::assertEquals($titular->recuperaNome(), $conta->recuperaNomeTitular());
    }

    /**
     * @dataProvider geraConta
     * @covers Titular::recuperaNome
     * @covers Titular::__construct
     * @covers Titular::validaNomeTitular
     * @covers Titular::recuperaCpf
     * @covers Conta::recuperaCpfTitular
     * @covers Conta::recuperaNomeTitular
     * @covers  Conta::__construct
     * @covers Conta::__destruct
     * @covers Cpf::__construct
     * @covers Cpf::recuperaNumero
     */
    public function testCpfDoTitularPrecisaSerValido(Conta $conta)
    {
        $titularTeste = new Titular(new Cpf('123.456.789-10'), 'Titular de Teste');
        $contaTeste = new Conta($titularTeste);

        static::assertEquals($conta->recuperaCpfTitular(), $contaTeste->recuperaCpfTitular());
    }

    /**
     * @codeCoverageIgnore
     */
    public function geraTitular()
    {
        $cpf = new Cpf('123.456.789-10');
        $titular = new Titular($cpf, 'Titular de Teste');

        return [
            [$titular]
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function geraConta()
    {
        $cpf = new Cpf('123.456.789-10');
        $titular = new Titular($cpf, 'Titular de Teste');
        $conta = new Conta($titular);
        return [
            [$conta]
        ];
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