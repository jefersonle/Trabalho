<?php
include 'conexao.inc.php';
$sql = "SELECT
		modelo.id_modelo,
		modelo.id_marca,
		modelo.nome modelo_nome,
		marca.nome marca_nome
	FROM
		modelo
	INNER JOIN marca ON marca.id_marca = modelo.id_modelo";
$query = pg_query($sql);
?>
<html>
	<head>
		<title>Listagem de Modelos</title>
	</head>
	<body>
		<div>
			<h2>Listagem de Marcas</h2>
			<table>
				<tr>
					<td>
						ID
					</td>
					<td>
						Nome
					</td>
					<td>
						ID da Marca
					</td>
					<td>
						Marca
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
						<?=$dados['id_modelo']?>
					</td>
					<td>
						<?=$dados['modelo_nome']?>
					</td>
					<td>
						<?=$dados['id_marca']?>
					</td>
					<td>
						<?=$dados['marca_nome']?>
					</td>
					<td>
						<a href="editar.php?id=<?=$dados['id_modelo']?>">Editar</a>
					</td>
					<td>
						<a href="excluir.php?id=<?=$dados['id_modelo']?>">Excluir</a>
					</td>
				</tr>
						
				<?php		
					}
				?>
				
				
				
			</table>
		</div>
	</body>
</html>
