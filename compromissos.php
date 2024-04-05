<?php
# compromissos.php
require('twig_carregar.php');
require('inc/banco.php');

use Carbon\Carbon;

$dados = $pdo->query('SELECT * FROM compromissos');

$compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';

$dia_na_semana = [];

// foreach($compromissos as $compromisso){
//     //var_dump($dado['data']);
//     echo $compromisso['data'];
//     echo '<br>';
//     var_dump(Carbon::createFromDate($compromisso['data'])->isWeekend());
//     echo '<br>';
// }

for($i = 0; $i < sizeof($compromissos); $i++){
    // echo $compromissos[$i]['descricao'];
    // echo '<br>';
    // var_dump(Carbon::createFromDate($compromissos[$i]['data'])->isWeekend());
    // $is_fim_de_semana = Carbon::createFromDate($compromissos[$i]['data'])->isWeekend();
    //var_dump(Carbon::createFromDate($compromissos[$i]['data'])->isWeekend());
    if(Carbon::createFromDate($compromissos[$i]['data'])->isWeekend()){
        $is_fim_de_semana = 'Sim';
    }else {
        $is_fim_de_semana = 'Não';
    }

    // echo $is_fim_de_semana;
    echo '<br>';
    $compromissos[$i]['fim_de_semana'] = $is_fim_de_semana;
    // echo $dia_na_semana[$i];
    // echo 'teste: '. $teste;
}

// die;

echo $twig->render('compromissos.html', ['compromissos' => $compromissos, 'titulo' => 'Compromissos', 'dia_na_semana' => $dia_na_semana]);