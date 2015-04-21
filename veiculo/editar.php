<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';

$id = $_GET['id'];
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$modelo = $_POST['modelo'];
	$cor = $_POST['cor'];
	$placa = $_POST['placa'];
	$ano_fab = $_POST['ano_fab'];
	$ano_mod = $_POST['ano_mod'];
	if(!empty($modelo) && !empty($cor) && !empty($placa) && !empty($ano_fab) && !empty($ano_mod)){
		$sql = "UPDATE veiculo SET id_modelo='$modelo' id_cor='$cor' placa='$placa' ano_fab='$ano_fab' ano_mod='$ano_mod' WHERE id_veiculo='$id'";
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
					$sql = "SELECT * FROM veiculo WHERE id_veiculo='$id'";
					$query = pg_query($sql);
					$veiculo = pg_fetch_assoc($query);
					
					
					$sql = "SELECT * FROM modelo";
					$modelos = pg_query($sql);
					while($dados = pg_fetch_assoc($modelos)){
				?>
					<option value="<?=$dados['id_modelo']?>" 
					
					<?php
						if($dados['id_modelo'] == $veiculo['id_modelo']) echo "checked='checked'";
					?>
					
					><?=$dados['nome']?></option>
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
					<option value="<?=$dados['id_cor']?>" 
					
					<?php
						if($dados['id_cor'] == $veiculo['id_cor']) echo "checked='checked'";
					?>
					
					><?=$dados['nome']?></option>
				<?php
					}
				?>
				</select>
			</p>
			<p>Placa:<input type="text" name="placa" value="<?=$veiculo['placa']?>" /></p>
			<p>Ano de Fabricação:<input type="text" name="ano_fab" value="<?=$veiculo['ano_fab']?>" /></p>
			<p>Ano do Modelo:<input type="text" name="ano_mod" value="<?=$veiculo['ano_mod']?>"/></p>
			<p><input type="submit" value="Editar Veiculo"></p>
		</form>
	</body>
</html>
