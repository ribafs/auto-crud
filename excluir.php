<?php 
require_once('./cabecalho.php');
require_once('./conexao.php');

// Recebido da busca_resultados.php
$id=$_GET['id'];

// Mostrar nome da tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Realmente excluir o registro abaixo?</h3>
            <br>

<?php

$sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR);
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);

    $sql = "SELECT * FROM $table";
    $sth = $pdo->query($sql);

    $num_campos = num_campos();
        
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
        ?>
        <!-- Mostrar nomes de campos e respectivos valores-->
        <b><?=ucfirst($campo)?>:</b> <?=$reg->$campo?><br>
        <?php
    }
?>
        <br>
        <form method="post" action="">
        <input name="id" type="hidden" value="<?=$id?>">
        <input name="enviar" class="btn btn-danger" type="submit" value="Excluir!">&nbsp;&nbsp;&nbsp;
        <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
        </form>
        </div>
    <div>
</div>

<?php
require_once('./rodape.php');
require_once('./excluirbd.php');
?>
