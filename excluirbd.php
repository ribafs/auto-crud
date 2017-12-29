<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM  $table WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);   

    if( $sth->execute()){
        print "<script>location='index.php';</script>";
    }else{
        print "Erro ao exclur o registro!<br><br>";
    }
}
