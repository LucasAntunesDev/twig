<?php
// salvar_usuario.php
require('twig_carregar.php');
require('inc/banco.php');

$usuario = $_POST['nome'];
$senha = $_POST['senha'];
$senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

$query = $pdo->prepare('INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)');

$query->execute([
    ':nome' =>
    $usuario,
    ':senha' =>
    $senha_criptografada
]);

echo $twig->render('login.html', [
    'titulo' => 'Login',
]);