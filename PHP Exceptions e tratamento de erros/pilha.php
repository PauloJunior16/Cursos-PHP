<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();
    } catch (Throwable $problema) {
        echo "Exception message: " . $problema->getMessage() . PHP_EOL;
        echo "Eexception on Line: " . $problema->getLine() . PHP_EOL;
        echo $problema->getTraceAsString() . PHP_EOL;
    }

    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{

    echo 'Entrei na função 2' . PHP_EOL;

    throw new BadFunctionCallException('Mensagem de exceção');
  

    echo 'Saindo da função 2' . PHP_EOL;
}

echo 'Iniciando o programa principal' . PHP_EOL;
funcao1();
echo 'Finalizando o programa principal' . PHP_EOL;
