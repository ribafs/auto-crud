<?php
if(isset($_POST['enviar'])){

    $inserirStr = inserirStr();

    $sql = "INSERT INTO $table $inserirStr";
    $sth = $pdo->prepare($sql);    

    for($x=1;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_INT);
	}
    $executa = $sth->execute();

    if($executa){
         print "<script>location='index.php';</script>";
    }else{
        echo 'Erro ao inserir os dados';
    }
}
// Como é apenas código php não precisa da tag de fechamento do php
