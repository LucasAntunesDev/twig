<?php
# horario.php
require('twig_carregar.php');

use Carbon\Carbon;

$data = Carbon::now('America/Sao_Paulo')->locale('pt_BR')->isoFormat('LLLL');

$amanha = Carbon::now('America/Sao_Paulo')->addDay()->locale('pt_BR')->isoFormat('LLLL');

echo $twig->render('horario.html', ['titulo' => 'Horário', 'hoje' => $data, 'amanha' => $amanha]);