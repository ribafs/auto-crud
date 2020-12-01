<?php 
require_once('./cabecalho.php');
include './conexao.php';

// Busca
if(isset($_GET['palavra'])){
    $palavra=$_GET['palavra'];
    $campo = nome_campo(1);

    $sql = "select * from $table WHERE $campo LIKE :palavra order by id";
    $sth = $pdo->prepare($sql);
    $sth->bindValue(":palavra", $palavra."%");
    $sth->execute();
    $rows =$sth->fetchAll(PDO::FETCH_ASSOC);
}

print '<div class="container" align="center">';
print '<h4>Registro(s) encontrado(s)</h4>';

if(count($rows) > 0){
	print '<div class="container" align="center">';
    echo '<table class="table table-hover">';
    echo "<tr>";

    $num_campos = num_campos();
        
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);
      	?>
        <th><?=ucfirst($campo)?></th>
       	<?php
    }

	print '<th colspan="2">Ação</th>';
    echo "</tr>";
 
    // Loop através dos registros recebidos
    foreach ($rows as $row){
        echo "<tr>";
            for($x=0;$x<$num_campos;$x++){
                $campo = nome_campo($x);
		        ?>
		        <td><?=$row[$campo]?></td>
		        <?php
            }
			?>
            <td><a href="atualizar.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-edit" title="Editar"></a></td>
            <td><a href="excluir.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td></tr>

			<?php
        echo "</tr>";
    } 
    echo "</table>";

}else{
    print '<h3>Nenhum Registro encontrado!</h3>';
}

?>

<input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar">
</div>

<?php require_once('./cabecalho.php'); ?>
