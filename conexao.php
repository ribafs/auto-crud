<?php
$host = 'localhost';
$db   = 'auto-crud'; // Dica: auto-crud não foi aceito
$user = 'root';
$pass = 'mysql';
$sgbd = 'mysql';      // Opções: pgsql ou mysql
$table = 'clientes';

// Conectar ao banco com PDO
try {
    $pdo = new PDO("$sgbd:host=$host;dbname=$db;", $user, $pass);

    // echo 'Conectado para o banco de dados<br />';

    // Fechar conexão com o banco de dados
    // $pdo = null;
}catch(PDOException $e){
    echo '<br><br><b>Mensagem</b>: '. $e->getMessage().'<br>';// Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento
    echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
    echo '<b>Linha</b>: '.$e->getLine().'<br>';
}

// Incluir o funcoes.php
require_once('./funcoes.php');
