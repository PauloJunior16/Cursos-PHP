<?php

class Conta
{
    private $cpfTitular;
    private $nomeTitular;
    private $saldo;

    public function sacar(float $valorASacar)
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }
            $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }
            $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponivel";
            return;
        }
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
    }
}
