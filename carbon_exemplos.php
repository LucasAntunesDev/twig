<?php
# carbon_exemplos.php
require('vendor/autoload.php');

use Carbon\Carbon;

// Agora
echo Carbon::now();
echo '<br>';

// Adicionar um dia
echo Carbon::now()->addDay();
echo '<br>';

// Subtrair uma semana
echo Carbon::now()->subWeek();
echo '<br>';

// Adicionar quatro anos
echo 'Próximas olímpiadas: ';
echo Carbon::createFromDate(2024)->addYears(4)->year;
echo '<br>';

// Idade de alguém
echo 'Sua idade é: ';
echo Carbon::createFromDate(2000, 4, 1)->age;
echo '<br>';

// Final de semana?
// if(Carbon::now()->isWeekend()) echo 'Festa';
// else echo 'Aula';
echo (Carbon::now()->isWeekend()) ? 'Festa' : 'Aula';