<?php
session_start();
session_destroy();

require('twig_carregar.php');
require('inc/banco.php');

echo $twig->render('index.html', ['titulo' => 'Início']);
