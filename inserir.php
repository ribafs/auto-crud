<?php
require_once('./cabecalho.php');
require_once('./conexao.php');

// Mostrar o nome da tabela
print '<h3 align="center">'.ucfirst($table).'</h3>';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <table class="table table-bordered table-responsive">    
            <form method="post" action="inserir.php?table=<?=$table?>"> 

<?php
    $num_campos = num_campos();        
    for($x=0;$x<$num_campos;$x++){
        $campo = nome_campo($x);

        if($x>0){
?>
        <tr><td><b><?=ucfirst($campo)?></td><td><input type="text" name="<?=$campo?>"></td></tr>

<?php
        }
    }
?>
            <input name="table" type="hidden" value="<?=$table?>">
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php
require_once('./rodape.php');
require_once('./inserirbd.php');
?>
