<?php
$host = 'localhost';
$db   = 'auto-crud'; // Dica: auto-crud não foi aceito
$user = 'root';
$pass = 'mysql';
$sgbd = 'mysql';      // Opções: pgsql ou mysql
$table = 'clientes';
$script = 'scripts/clientes_my.sql';

// Criar banco e importar script. Disponível somente para MySQL por enquanto

// Conectar para um banco interno
if($sgbd == 'mysql'){
	$pdo0 = new PDO("$sgbd:host=$host;dbname=sys;", $user, $pass);

	// Caso não exista o banco $db será criado
	$ret = $pdo0->query('create database if not exists '.$db);

	// Se for criado o banco o script $script será importado para o mesmo
	if($ret){
		$pdo0->query('use '.$db);
		$sqlSource = file_get_contents($script);
		$pdo0->exec($sqlSource);
		$pdo0 = null;
	}
}

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
