<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Pega id do item especificado em GET
$id = $_GET['id'];
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['modelo'];
	$marca = $_POST['marca'];
	if(!empty($nome)){
		//Atualiza informações do item cujo id foi passado por GET
		$sql = "UPDATE modelo SET id_marca='$marca', nome='$nome' WHERE id_modelo='$id'";
		pg_query($sql);
	}else{
		echo 'Modelo invalido!';
	}
}
?>

<html>
	<head>
		<title>Editar Modelo</title>
	</head>
	<body>
		<h2>Editar Modelo</h2>
		<form action="" method="post">
			<p>
				<select name="marca">
				<?php 
					//Seleciona todas as informações do item cujo id foi passado por GET para editar
					$sql = "SELECT * FROM modelo WHERE id_modelo='$id'";
					$query = pg_query($sql);
					$modelo = pg_fetch_assoc($query);
					
					//Seleciona todas as linhas da tabela marca para criar um select de marcas
					$sql = "SELECT * FROM marca";
					$marcas = pg_query($sql);
					//Laço para criar select de marcas
					while($dados = pg_fetch_assoc($marcas)){
				?>
					<option value="<?=$dados['id_marca']?>" 
					<?php
						if($dados['id_marca'] == $modelo['id_marca']) echo "checked='checked'";
					?>><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>Nome:<input type="text" name="modelo" value="<?=$modelo['nome']?>" /></p>
			<p><input type="submit" value="Cadastrar Modelo"></p>
		</form>
	</body>
