<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Inlcui arquivo de conexao
include '../inc/conexao.inc.php';

//Seleciona as informações dos modelos e suas devidas marcas relacionadas
$sql = "SELECT
		modelo.id_modelo,
		modelo.id_marca,
		modelo.nome modelo_nome,
		marca.nome marca_nome
	FROM
		modelo
	INNER JOIN marca ON marca.id_marca = modelo.id_marca
	ORDER BY modelo.id_modelo DESC";
$query = pg_query($sql);
?>
<html>
	<head>
		<title>Listagem de Modelos</title>
	</head>
	<body>
		<div>
			<h2>Listagem de Modelos</h2>
			<p><a href="cadastrar.php">Novo Modelo</a></p>
			<table border="1">
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
					//Laço para exibir cada item da consulta no BD
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
						<a href="excluir.php?id=<?=$dados['id_modelo']?>" onclick='javascript: return confirm("TEM CERTEZA QUE DESEJA EXCLUIR ESTE MODELO? /n/n NOTE QUE TODOS OS VEICULOS DESTE MODELO TAMBEM SERAO DELETADOS!")'>Excluir</a>
					</td>
				</tr>
						
				<?php		
					}
				?>
				
				
				
			</table>
		</div>
	</body>
</html>
