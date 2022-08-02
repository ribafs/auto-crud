<?php
require_once('./conexao.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Criador Automático de CRUDs</title>
 
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
        <!-- Include custom CSS. -->
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
 
    </head>
<body>
<?php
if($table == ''){
    print '<div class="container"><h1 class="text-center">Antes precisa configurar o banco e indicar a tabela em conexao.php</h1>';
    exit;
}
?>
<div id='retrieved-data' style='height:15em;'>
    <!--
    This is where data will be shown.
    -->
    <img src="./imagnes/ajax-loader.gif" />
</div>

<script type = "text/javascript" src = "./js/jquery.min.js"></script>
<script type = "text/javascript">
$(function(){
    // show the first page
    getdata(1);
});
 
function getdata(pageno){
    // source of data
    var targetURL = 'busca_resultados.php?page=' + pageno;
 
    // show loading animation
    $('#retrieved-data').html('<img src="./imagens/ajax-loader.gif" />');
 
    // load to show new data
    $('#retrieved-data').load(targetURL).hide().fadeIn('slow');
}
</script>

</body>
</html>
