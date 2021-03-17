<?php

$dsn = 'mysql:dbname=projetolib;localhost';
$dbname = 'root';
$dbpass = 'senha';

try {
$pdo = new PDO($dsn, $dbname, $dbpass);

} catch (PDOException $e) {
    echo "Falhou a conexão".$e->getMessage();
    exit;
}


