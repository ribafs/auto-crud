<?php
$host = 'localhost';
$db   = 'testes'; // Dica: auto-crud não foi aceito
$user = 'root';
$pass = 'root';
$sgbd = 'mysql';      // Opções: pgsql ou mysql
$port = 3306;
$table = '';

// Conectar ao banco com PDO
try {
    $pdo = new PDO("$sgbd:host=$host;dbname=$db;port=$port", $user, $pass);

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
