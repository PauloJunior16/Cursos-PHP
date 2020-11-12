<?php

require_once 'funcoes.php';

$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Alberto',
        'saldo' => 1000
    ],
    '123.456.789-11' => [
        'titular' => 'Maria',
        'saldo' => 15000
    ],
    '123.456.789-12' => [
        'titular' => 'José',
        'saldo' => 2500
    ]
];

$contasCorrentes['123.456.789-11'] = sacar(
    $contasCorrentes['123.456.789-11'],
    5000);

$contasCorrentes['123.456.789-10'] = depositar(
    $contasCorrentes['123.456.789-10'],
    500);

unset($contasCorrentes['123.456.789-12']);

titularComLetrasmaiusculas($contasCorrentes['123.456.789-10']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Contas Correntes</h1>

    <dl>
        <?php foreach($contasCorrentes as $cpf => $conta) { ?>
        <dt>
            <h3> <?= $conta['titular']; ?> - <?= $cpf; ?> </h3>
        </dt>
        <dd>
            Saldo:  <?= $conta['saldo']; ?>
        </dd>
        <?php } ?>
    </dl>

</body>
</html>
