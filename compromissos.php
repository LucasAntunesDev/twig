<?php
# compromissos.php
require('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

for ($i = 0; $i < sizeof($compromissos); $i++) {
    $data = $compromissos[$i]['data'];
    
    $data = Carbon::parse($data);  
    // echo '<br>';
    // echo '<pre>';
    // echo $data;

    // echo $data;

    $compromissos[$i]['fim_de_semana'] = $data->isWeekend() ? 'Sim' : 'Não';
    $compromissos[$i]['data'] = $data->locale('pt_BR')->isoFormat('LLLL');
}

// die;

echo $twig->render('compromissos.html', ['compromissos' => $compromissos, 'titulo' => 'Compromissos']);