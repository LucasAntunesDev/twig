<?php
# compromissos.php
require('twig_carregar.php');
require('inc/banco.php');

$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('compromissos.html', ['compromissos' => $compromissos, 'titulo' => 'Compromissos']);