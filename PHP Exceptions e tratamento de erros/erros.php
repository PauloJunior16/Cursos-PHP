<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Usar apenas em aplicações lançadas para usuários
ini_set('log_errors', 0);
ini_set('error_log', '/var/log/aplicacao');*/

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    switch ($errno) {
        case E_WARNING:
            echo "Aviso: implementação perigosa na linha: " . $errline . PHP_EOL;
            break;
        case E_NOTICE:
            echo "Aviso: implementação pode ser feita de outra forma na linha: " . $errline . PHP_EOL;
            break;
    }
});

echo $variavel;

echo $array[12];

//echo CONSTANTE;
