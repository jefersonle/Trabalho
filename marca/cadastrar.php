<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['marca'];
	if(!empty($nome)){
		//Insere item no BD
		$sql = "INSERT INTO marca (nome) VALUES ('$nome')";
		pg_query($sql);
		//Redireciona para pagina listar
		header('Location: listar.php');
	}else{
		echo 'Marca invalida!';
	}
}
?>
<html>
	<head>
		<title>Cadastrar Marca</title>
	</head>
	<body>
		<h2>Cadastrar Marca</h2>
		<form action="" method="post">
			<p>Nome:<input type="text" name="marca" /></p>
			<p><input type="submit" value="Cadastrar Marca"></p>
		</form>
	</body>
</html>
