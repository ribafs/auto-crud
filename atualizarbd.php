<?php

if(isset($_POST['enviar'])){

	$set='';
    $num_campos = num_campos();
        
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		// A linha abaixo gerará a linha: $nome = 'Nome do cliente';
	    $$campo = $_POST[$campo];

		// Esta if gerará a variável $set contendo "$nome = :$nome, $email = :$email, ...";
		if($x<$num_campos-1){
			if($x==0) continue;// Evitar o id
			$set .= "$campo = :$campo,";
		}else{
			if($x==0) continue;
			$set .= "$campo = :$campo";
		}
	}

    $sql = "UPDATE $table SET $set WHERE id = :id";

    $sth = $pdo->prepare($sql);

    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_STR);
	}

   if($sth->execute()){
        print "<script>location='index.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
