<?php
# compromissos.php
require('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

$dia_na_semana = [];


for ($i = 0; $i < sizeof($compromissos); $i++) {
    $compromissos[$i]['fim_de_semana'] = Carbon::createFromDate($compromissos[$i]['data'])->isWeekend() ? 'Sim' : 'Não';
}

echo $twig->render('compromissos.html', ['compromissos' => $compromissos, 'titulo' => 'Compromissos']);