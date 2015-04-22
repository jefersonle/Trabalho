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
	$preco = $_POST['preco'];

	if(!empty($modelo) && !empty($cor) && !empty($placa) && !empty($ano_fab) && !empty($ano_mod)){
		//Insere item no BD
		$sql = "INSERT INTO veiculo (id_modelo, id_cor, placa, ano_fab, ano_mod, preco) VALUES ('$modelo', '$cor', '$placa', '$ano_fab', '$ano_mod', '$preco')";
		pg_query($sql);
		//Redireciona para pagina listar
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
					//Seleciona todos os itens da tabela modelo para criar um select de modelos
					$sql = "SELECT * FROM modelo";
					$modelos = pg_query($sql);
					//Laço para criar o select de modelos
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
					//Seleciona todos os itens da tabela cor para criar um select de cores
					$sql = "SELECT * FROM cor";
					$cores = pg_query($sql);
					//Laço para criar um select de cores
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
			<p>Preço:<input type="text" name="preco" /></p>
			<p><input type="submit" value="Cadastrar Veiculo"></p>
		</form>
	</body>
</html>
