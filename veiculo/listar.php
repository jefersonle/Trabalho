<?php
include 'conexao.inc.php';

$sql = "SELECT
		veiculo.id_veiculo,
		veiculo.nome nome_veiculo,
		veiculo.id_modelo,
		veiculo.id_cor,
		veiculo.placa,
		veiculo.ano_fab,
		veiculo.ano_mod,
		veiculo.preco,
		modelo.nome nome_modelo,
		modelo.id_marca,
		cor.nome nome_cor,
		marca.nome nome_marca
	FROM
		veiculo
	INNER JOIN modelo ON modelo.id_modelo = veiculo.id_modelo
	INNER JOIN cor ON cor.id_cor = veiculo.id_cor
	INNER JOIN marca ON marca.id_marca = modelo.id_marca";
	
$query = pg_query($sql);

?>
<html>
	<head>
		<title>Listagem de Veiculos</title>
	</head>
	<body>
		<div>
			<h2>Listagem de Veiculos</h2>
			<table>
				<tr>
					<td>
						ID
					</td>
					<td>
						Nome
					</td>
					<td>
						ID do Modelo
					</td>
					<td>
						Modelo
					</td>
					<td>
						ID da Marca
					</td>
					<td>
						Marca
					</td>
					<td>
						ID da Cor
					</td>
					<td>
						Cor
					</td>
					<td>
						Placa
					</td>
					<td>
						Ano de Fabricação
					</td>
					<td>
						Ano do Modelo
					</td>
					<td>
						Preço
					</td>
					<td>
						Editar
					</td>
					<td>
						Deletar
					</td>
					
				</tr>
				
				<?php
					while($dados = pg_fetch_assoc($query)){
				?>		
				
				<tr>
					<td>
						<?=$dados['id_veiculo']?>
					</td>
					<td>
						<?=$dados['nome_veiculo']?>
					</td>
					<td>
						<?=$dados['id_modelo']?>
					</td>
					<td>
						<?=$dados['nome_modelo']?>
					</td>
					<td>
						<?=$dados['id_marca']?>
					</td>
					<td>
						<?=$dados['nome_marca']?>
					</td>
					<td>
						<?=$dados['id_cor']?>
					</td>
					<td>
						<?=$dados['nome_cor']?>
					</td>
					<td>
						<?=$dados['placa']?>
					</td>
					<td>
						<?=$dados['ano_fab']?>
					</td>
					<td>
						<?=$dados['ano_mod']?>
					</td>
					<td>
						<?=$dados['preco']?>
					</td>
					<td>
						<a href="editar.php?id=<?=$dados['id_veiculo']?>">Editar</a>
					</td>
					<td>
						<a href="excluir.php?id=<?=$dados['id_veiculo']?>">Excluir</a>
					</td>
					
				</tr>		
						
				<?php		
					}
				?>
				
				
			</table>
		</div>
	</body>
</html>
