<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Pegando item a ser editado por GET
$id = $_GET['id'];
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$modelo = $_POST['modelo'];
	$cor = $_POST['cor'];
	$placa = $_POST['placa'];
	$ano_fab = $_POST['ano_fab'];
	$ano_mod = $_POST['ano_mod'];
	$preco = $_POST['preco'];
	if(!empty($modelo) && !empty($cor) && !empty($placa) && !empty($ano_fab) && !empty($ano_mod)){
		//Modifica informações do item especificado por GET
		$sql = "UPDATE veiculo SET id_modelo='$modelo', id_cor='$cor', placa='$placa', ano_fabricacao='$ano_fab', ano_modelo='$ano_mod', preco='$preco' WHERE id_veiculo='$id'";
		$query = pg_query($sql);
		
	}else{
		echo 'Campos obrigatórios sem preenchimento!';
	}
}
?>
<html>
	<head>
		<title>Editar Veiculo</title>
	</head>
	<body>
		<h2>Editar Veiculo</h2>
		<form action="" method="post">
			<p>
				Selecione o modelo do veiculo: 
				<select name="modelo">
				<?php 
					//Seleciona todas as informações do item passado por GET para editar no form
					$sql = "SELECT * FROM veiculo WHERE id_veiculo='$id'";
					$query = pg_query($sql);
					$veiculo = pg_fetch_assoc($query);
					
					//Seleciona todos os itens da tabela modelo para criar um select de modelos
					$sql = "SELECT * FROM modelo";
					$modelos = pg_query($sql);
					//Laço para criar select de modelos
					while($dados = pg_fetch_assoc($modelos)){
				?>
					<option value="<?=$dados['id_modelo']?>" ><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>
				Selecione a Cor do Veiculo: 
				<select name="cor">
				<?php 
					//Seleciona todos os itens da tabela cor para criar select de cores
					$sql = "SELECT * FROM cor";
					$cores = pg_query($sql);
					//Laço para criar selecte de cores
					while($dados = pg_fetch_assoc($cores)){
				?>
					<option value="<?=$dados['id_cor']?>"><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>Placa:<input type="text" name="placa" value="<?=$veiculo['placa']?>" /></p>
			<p>Ano de Fabricação:<input type="text" name="ano_fab" value="<?=$veiculo['ano_fabricacao']?>" /></p>
			<p>Ano do Modelo:<input type="text" name="ano_mod" value="<?=$veiculo['ano_modelo']?>"/></p>
			<p>Preço:<input type="text" name="preco" value="<?=$veiculo['preco']?>"/></p>
			<p><input type="submit" value="Editar Veiculo"></p>
		</form>
	</body>
</html>
