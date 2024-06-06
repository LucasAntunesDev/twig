<?php
// login.php
require('twig_carregar.php');
require('inc/banco.php');
session_start();

$dados = $pdo->prepare('SELECT * FROM usuarios WHERE nome = :nome');
$dados->execute([
    ':nome' => $_POST['nome']
]);

$usuario_banco_de_dados = $dados->fetch(PDO::FETCH_ASSOC);
$usuario_formulario = $_POST['nome'];

$senha_criptografada = $usuario_banco_de_dados['senha'];
$senha_formulario = $_POST['senha'];

$nome_usuario = $usuario_banco_de_dados['nome'];


if (password_verify($senha_formulario, $senha_criptografada) && $usuario_formulario === $nome_usuario) {
    $_SESSION['usuario'] = $nome_usuario;
    echo $twig->render('index.html', [
        'titulo' => 'Início',
    ]);
} else {
    echo $twig->render('login.html', [
        'titulo' => 'Login', 'warning' => 1
    ]);
}
die;

$usuario = $_POST['nome'];
$senha = $_POST['senha'];
// $senha = 'teste';
$senha_criptografada = password_hash($senha, PASSWORD_BCRYPT);

$_SESSION['usuario'] = $usuario;

echo $_SESSION['usuario'];

echo $twig->render('login.html', [
    'titulo' => 'Login',
]);

die;





































if (
    isset($SESSION['usuario'])
) {
    echo $usuario . '<br>' . $senha . '<br>' . $senha_criptografada;

    echo (password_verify($senha, $senha_criptografada)) ?
        '<br> Senha Correta =D'
        :
        '<br> Senha incorreta :(';
} else {
    session_start();
    $_SESSION['usuario'] = $usuario;

    echo $twig->render('login.html', [
        'titulo' => 'Login',
    ]);
    // echo 'não';
    // header('location:login.php');
}

die;

// echo $twig->render('login.html', [
//     'titulo' => 'Login',
// ]);