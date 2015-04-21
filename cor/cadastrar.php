<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['cor'];
	if(!empty($nome)){
		$sql = "INSERT INTO cor (nome) VALUES ('$nome')";
		pg_query($sql);
		header('Location: listar.php');
	}else{
		echo 'Nome invalido!';
	}
}
?>
<html>
	<head>
		<title>Cadastrar Cor</title>
	</head>
	<body>
		<h2>Cadastrar Cor</h2>
		<form action="" method="post">
			<p>Nome:<input type="text" name="cor" /></p>
			<p><input type="submit" value="Cadastrar Cor"></p>
		</form>
	</body>
</html>
