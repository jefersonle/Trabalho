<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['modelo'];
	$marca = $_POST['marca'];
	if(!empty($nome)){
		$sql = "INSERT INTO modelo (id_marca, nome) VALUES ('$marca', '$nome')";
		pg_query($sql);
		header('Location: listar.php');
	}else{
		echo 'Modelo invalido!';
	}
}

$sql = "SELECT * FROM marca";
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
			<p><input type="submit" value="Cadastrar Modelo"></p>
		</form>
	</body>
</html>
