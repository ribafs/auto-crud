<?php
require_once('./cabecalho.php');
require_once('./conexao.php');

// Receebr o id via GET do busca_resultados.php ou via POST deste arquivo
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	$id=$_POST['id'];
}

// Mostrar nome da Tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>

<!-- Mostrar form de atualização -->
<div class="container" align="center">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="atualizar.php">
                <table class="table table-bordered table-responsive table-hover">

<?php
    $sth = $pdo->prepare("SELECT * from $table WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um único bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);

    $num_campos = num_campos();
            
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
?>
        <tr><td><b><?=ucfirst($campo)?></td><td><input type="text" name="<?=$campo?>" value="<?=$reg->$campo?>"></td></tr>
<?php
}
?>
            <input name="id" type="hidden" value="<?=$id?>">
            <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </table>
        </form>
        </div>
    <div>
</div>

<?php
require_once('./rodape.php');
require_once('./atualizarbd.php');
?>

