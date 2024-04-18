<?php
// criar_usuario.php
require('twig_carregar.php');

// $usuario = $_POST['nome'];
// $senha = $_POST['senha'];
// $senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

// $query = $pdo->prepare('INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)');

// $query->execute([
//     ':nome' =>
//     $nome,
//     ':senha' =>
//     $senha_criptografada
// ]);

echo $twig->render('criar_usuario.html', [
    'titulo' => 'Criar usuário',
]);