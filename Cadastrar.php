<?php
require_once 'config.php';
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']) ;
    $email = addslashes($_POST['email']) ;
    $curso = addslashes($_POST['curso']) ;
    $senha = addslashes($_POST['senha']);

    $sql = $pdo->prepare('INSERT INTO aluno (nome, email, curso, senha) VALUES (:nome, :email, :curso, :senha) ');
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':curso', $curso);
    $sql->bindValue(':senha', md5($senha));
    $sql->execute();

    header('Location: index.php');
}