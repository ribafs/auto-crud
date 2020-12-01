<?php
if(isset($_POST['send'])){

//    $insertString = $crud->insertString();

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$nascimento = $_POST['nascimento'];
	$cpf = $_POST['cpf'];

/*
	$sql = "INSERT INTO clientes (nome, email, nascimento, cpf) VALUES (?, ?, ?, ?)";

	$sth = $db->prepare($sql);

	$sth->bindParam(1, $nome);
	$sth->bindParam(2, $email);
	$sth->bindParam(3, $nascimento);
	$sth->bindParam(4, $cpf);
*/
	$exec = $crud->insert();

	if($exec){
		header('location: index.php');
	}else{
		echo 'Erro ao inserir os dados';
	}

}
// Como é apenas código php não precisa da tag de fechamento do php
