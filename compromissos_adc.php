<?php
# compromissos_adc.php
require('inc/banco.php');
$descricao = $_POST['descricao'] ?? null;
$data = $_POST['data'] ?? null;

$query = $pdo->prepare('INSERT INTO compromissos (descricao, data) VALUES (:descricao, :data)');
// $query->bindValue(':item', $item);

$query->execute([
    ':descricao' =>
    $descricao,
    ':data' =>
    $data
]);

$query->execute();

header('location:compromissos.php');