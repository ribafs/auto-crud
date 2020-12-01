<?php
if(isset($_POST['enviar'])){

    $num_campos = num_campos();
	$campos = '';
	$valores = '';

    for($x=1;$x<$num_campos;$x++){
        $campo = nome_campo($x);

		// Este if gera o seguinte código para a variável $campos = "nome, email, data_nasc, cpf" (exemplo para clientes)
		// E também para a variável $valores = ":nome, :email, :data_nasc, cpf"
		if($x<$num_campos-1){
            $campos .= "$campo,";
            $valores .= ":$campo, ";
		}else{
            $campos .= "$campo";
            $valores .= ":$campo";
		}
	}

    $sql = "INSERT INTO $table ($campos) VALUES ($valores)";
    $sth = $pdo->prepare($sql);    

    for($x=1;$x<$num_campos;$x++){
        $campo = nome_campo($x);
		$sth->bindParam(":$campo", $_POST["$campo"], PDO::PARAM_STR);
	}

    $executa = $sth->execute();

    if($executa){
         print "<script>location='index.php';</script>";
    }else{
        echo 'Erro ao inserir os dados';
    }
}
// Como é apenas código php não precisa da tag de fechamento do php
