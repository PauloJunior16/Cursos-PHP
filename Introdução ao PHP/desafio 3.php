<?php
$peso = 75;
$altura = 1.69;

$imc = $peso / $altura ** 2;

echo " Seu IMC é $imc\n";

if ($imc < 18.5) {
    echo "Você está abaixo do peso.";
} elseif ($imc <= 24.9) {
    echo "Você está em seu peso normal.";
} elseif ($imc <= 29.9) {
    echo "Você está com sobrepeso.";
} elseif ($imc <= 34.9) {
    echo "VocÊ está com obesidade Grau I.";
} elseif ($imc <= 39.9) {
    echo "Você está com obesidade Grau II.";
} else {
    echo "Você está com obesidade morbida!";
}

