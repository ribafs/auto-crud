<?php

if(isset($_POST['enviar'])){

    $set = updateSet();

    $sql = "UPDATE $table SET $set WHERE id = :id";
    $sth = $pdo->prepare($sql);

    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
	}

   if($sth->execute()){
        print "<script>location='index.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
