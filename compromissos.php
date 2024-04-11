<?php
# compromissos.php
require('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

foreach ($compromissos as $indice => $compromisso) {
    $compromissos[$indice]['fimdesemana'] = Carbon::parse($compromisso['data'])->isWeekend() ? 'Sim' : 'Não';
}

echo $twig->render('compromissos.html', ['compromissos' => $compromissos, 'titulo' => 'Compromissos']);