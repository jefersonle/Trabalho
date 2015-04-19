<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$modelo = $_POST['modelo'];
	$cor = $_POST['cor'];
	$placa = $_POST['placa'];
	$ano_fab = $_POST['ano_fab'];
	$ano_mod = $_POST['ano_mod'];
	if(!empty($modelo) && !empty($cor) && !empty($placa) && !empty($ano_fab) && !empty($ano_mod)){
		$sql = "INSERT INTO veiculo (id_modelo, id_cor, placa, ano_fab, ano_mod) VALUES ('$modelo', '$cor', '$placa', '$ano_fab', '$ano_mod')";
		pg_query($sql);
		header('Location: listar.php');
	}else{
		echo 'Campos obrigatórios sem preenchimento!';
	}
}
?>
<html>
	<head>
		<title>Cadastrar Veiculo</title>
	</head>
	<body>
		<h2>Cadastrar Veiculo</h2>
		<form action="" method="post">
			<p>
				Selecione o modelo do veiculo: 
				<select name="modelo">
				<?php 
					$sql = "SELECT * FROM modelo";
					$modelos = pg_query($sql);
					while($dados = pg_fetch_assoc($modelos)){
				?>
					<option value="<?=$dados['id_modelo']?>"><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>
				Selecione a Cor do Veiculo: 
				<select name="cor">
				<?php 
					$sql = "SELECT * FROM cor";
					$cores = pg_query($sql);
					while($dados = pg_fetch_assoc($cores)){
				?>
					<option value="<?=$dados['id_cor']?>"><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>Placa:<input type="text" name="placa" /></p>
			<p>Ano de Fabricação:<input type="text" name="ano_fab" /></p>
			<p>Ano do Modelo:<input type="text" name="ano_mod" /></p>
			<p><input type="submit" value="Cadastrar Veiculo"></p>
		</form>
	</body>
</html>
