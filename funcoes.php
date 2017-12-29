<?php

// Número de campos da tabela atual
function num_campos(){
	global $table, $pdo;
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $num_campos = $sth->columnCount();
    return $num_campos;
}

// Nome de campo pelo número $x
function nome_campo($x){
	global $table, $pdo;
    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);
    $meta = $sth->getColumnMeta($x);
    $campo = $meta['name'];
    return $campo;
}

function updateSet(){
	$set='';
    $num_campos = num_campos();
        
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		// A linha abaixo gerará a linha: $nome = 'Nome do cliente';
	    $$campo = $_POST[$campo];

		// Este if gerará a variável $set contendo "$nome = :$nome, $email = :$email, ...";
		if($x<$num_campos-1){
			if($x==0) continue;
			$set .= "$campo = :$campo,";
		}else{
			if($x==0) continue;
			$set .= "$campo = :$campo";
		}
	}
    return $set;
}

function inserirStr(){
    $num_campos = num_campos();
	$campos = '';
	$valores = '';

    for($x=1;$x<$num_campos;$x++){
        $campo = nome_campo($x);

		// Este if gera o seguinte código para a variável $campos = "nome, email, data_nasc, cpf" (exemplo para clientes)
		// E também para a variável $valores = ":nome, :email, :data_nasc, cpf"
		if($x<$num_campos-1){
            $campos .= "$campo,";
            $valores .= ":$campo, ";
		}else{
            $campos .= "$campo";
            $valores .= ":$campo";
		}
	}
    $inserirStr = "($campos) VALUES ($valores)";
    return $inserirStr;
}
