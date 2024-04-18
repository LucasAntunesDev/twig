<?php
// login.php
require('twig_carregar.php');
require('inc/banco.php');
session_start();

$dados = $pdo->prepare('SELECT * FROM usuarios WHERE nome = :nome');
$dados->execute([
    ':nome' => $_POST['nome']
]);
$usuarios = $dados->fetch(PDO::FETCH_ASSOC);

$senha = $_POST['senha'];
$senha_criptografada = $usuarios['senha'];

if(password_verify($senha, $senha_criptografada)){
    // echo 'mesma senha';
    
}else{
    echo 'não é a mesma senha';
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