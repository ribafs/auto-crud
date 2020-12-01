<?php

if(isset($_POST['send'])){

    $set = $crud->updateSet();

    $sql = "UPDATE ".$crud->table." SET $set WHERE id = :id";
    $sth = $crud->pdo->prepare($sql);

    for($x=0;$x<$crud->numFields();$x++){
        $field = $crud->fieldName($x);
		$sth->bindParam(":$field", $_POST["$field"], PDO::PARAM_INT);
	}

   if($sth->execute()){
        print "<script>location='index.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
