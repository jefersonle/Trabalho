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
	$nome = $_POST['modelo'];
	$marca = $_POST['marca'];
	if(!empty($nome)){
		//Insere novo item no BD
		$sql = "INSERT INTO modelo (id_marca, nome) VALUES ('$marca', '$nome')";
		pg_query($sql);
		//Redireciona para pagina listar
		header('Location: listar.php');
	}else{
		echo 'Modelo invalido!';
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
			<p>
				<select name="marca">
				<?php 
					//Seleciona todos os itens da tabela marca para criar um select de marcas
					$sql = "SELECT * FROM marca";
					$marcas = pg_query($sql);
					//Cria um laço para criar o select de marcas com as linhas do BD
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
