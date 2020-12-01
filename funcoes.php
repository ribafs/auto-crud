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
