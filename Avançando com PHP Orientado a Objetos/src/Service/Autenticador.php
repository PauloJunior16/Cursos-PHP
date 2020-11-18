<?php

namespace Alura\Banco\Service;

use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Autenticavel;

class Autenticador
{
    public function tentaLogin(Autenticavel $autenticavel, string $senha): void
    {

        if($autenticavel->podeAutenticar($senha)) {
            echo "Usuario logado no sistema" . PHP_EOL;
        } else {
            echo "Senha incorreta" . PHP_EOL;
        }
    }
}
