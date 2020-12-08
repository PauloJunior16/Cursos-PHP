<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class ContaTest extends TestCase
{

    /**
     * @dataProvider geraConta
     * @covers Conta::depositar
     */
    public function testDepositoInvalido(Conta $conta)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Valor precisa ser positivo");

        $conta->depositar(-100);
    }

    /**
     * @dataProvider  geraConta
     * @covers Conta::depositar
     * @covers Conta::recuperarSaldo
     */
    public function testValorDoDepositoDeveSerPositivo(Conta $conta)
    {
        $conta->depositar(1000);
        static::assertEquals(1000, $conta->recuperarSaldo());
    }

    /**
     * @dataProvider  geraConta
     * @covers Conta::__construct
     * @covers Conta::depositar
     * @covers Conta::sacar
     * @covers Conta::recuperarSaldo
     * @covers  Conta::__destruct
     */
    public function testValorDoSaqueDeveSerPositivo(Conta $conta)
    {
        $conta->depositar(200);
        $conta->sacar(100);

        static::assertEquals(100, $conta->recuperarSaldo());
    }

    /**
     * @dataProvider geraContaComSaldo
     * @covers Conta::transferir
     */
    public function testTransfereSemSaldo(Conta $conta)
    {
        $cpf2 = new Cpf('123.456.789-10');
        $titular2 = new Titular($cpf2, 'Titular de Teste');
        $conta2 = new Conta($titular2);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Saldo indisponível");
        $conta->transferir(1200, $conta2);
    }

    /**
     * @dataProvider  geraContaComSaldo
     * @covers Conta::__construct
     * @covers Conta::depositar
     * @covers Conta::sacar
     * @covers Conta::recuperarSaldo
     * @covers  Conta::__destruct
     */
    public function testValorDoSaqueNaoPodeSerMaiorQueSaldo(Conta $conta)
    {
        $conta->sacar(100);

        static::assertEquals(900, $conta->recuperarSaldo());
    }

    /**
     * @dataProvider  geraContaComSaldo
     * @covers Conta::__construct
     * @covers Conta::depositar
     * @covers Conta::sacar
     * @covers Conta::transferir
     * @covers Conta::recuperarSaldo
     * @covers  Conta::__destruct
     * @covers  Cpf::__construct
     * @covers  Titular::__construct
     * @covers  Titular::validaNomeTitular

     */
    public function testValorDaTransferenciaDeveSerPositivo(Conta $conta)
    {
        $cpf2 = new Cpf('123.456.789-10');
        $titular2 = new Titular($cpf2, 'Titular de Teste');
        $conta2 = new Conta($titular2);

        $conta->transferir(500,$conta2);

        static::assertEquals(500, $conta2->recuperarSaldo());

    }

    /**
     * @dataProvider  geraContaComSaldo
     * @covers Conta::__construct
     * @covers Conta::depositar
     * @covers Conta::sacar
     * @covers Conta::transferir
     * @covers Conta::recuperarSaldo
     * @covers  Conta::__destruct
     * @covers  Cpf::__construct
     * @covers  Titular::__construct
     * @covers  Titular::validaNomeTitular

     */
    public function testValorDaTransferenciaNaoPodeSerMaiorQueSaldo(Conta $conta)
    {
        $cpf2 = new Cpf('123.456.789-10');
        $titular2 = new Titular($cpf2, 'Titular de Teste');
        $conta2 = new Conta($titular2);

        $conta->transferir(500,$conta2);

        static::assertEquals(500, $conta->recuperarSaldo());
        static::assertEquals(500, $conta2->recuperarSaldo());

    }

    /**
     * @dataProvider  geraConta
     * @covers Conta::__construct
     * @covers Conta::depositar
     * @covers Conta::sacar
     * @covers Conta::transferir
     * @covers Conta::recuperarSaldo
     * @covers  Conta::__destruct
     * @covers  Cpf::__construct
     * @covers  Titular::__construct
     * @covers  Titular::validaNomeTitular
     * @covers  Conta::recuperaNumeroDeContas()
     */
    public function testRecuperaNumeroDeContas()
    {
        $conta1 = new Conta(new Titular(new Cpf('123.456.789-10'), "Titular 1"));
        $conta2 = new Conta(new Titular(new Cpf('123.456.789-11'), "Titular 2"));
        $conta2 = new Conta(new Titular(new Cpf('123.456.789-12'), "Titular 3"));

        $qtdeContas = Conta::recuperaNumeroDeContas();

        static::assertEquals(11, $qtdeContas);
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
    public function geraContaComSaldo()
    {
        $cpf = new Cpf('123.456.789-10');
        $titular = new Titular($cpf, 'Titular de Teste');
        $conta = new Conta($titular);
        $conta->depositar(1000);

        return [
            [$conta]
        ];
    }

}