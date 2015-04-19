<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['marca'];
	if(!empty($nome)){
		$sql = "INSERT INTO marca (nome) VALUES ('$nome')";
		pg_query($sql);
		header('Location: listar.php');
	}else{
		echo 'Marca invalida!';
	}
}

$sql = "SELEECT * FROM marca";
$marcas = pg_query($sql);
?>

<html>
	<head>
		<title>Cadastrar Marca</title>
	</head>
	<body>
		<h2>Cadastrar Marca</h2>
		<form action="" method="post">
			<p>
				<select name="marca">
				<?php 
					while($dados = pg_fetch_assoc($marcas)){
				?>
					<option value="<?=$dados['id_marca']?>"><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>Nome:<input type="text" name="modelo" /></p>
			<p><input type="submit" value="Cadastrar Marca"></p>
		</form>
	</body>
</html>
