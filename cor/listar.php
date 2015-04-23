<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/

//incluir arquivo de conexao ao BD
include '../inc/conexao.inc.php';

//Seleciona itens da tabela cor para exibir
$sql = "SELECT * FROM cor ORDER BY id_cor DESC";
$query = pg_query($sql);

?>
<html>
	<head>
		<title>Listagem de Cores</title>
	</head>
	<body>
		<div>
			<h2>Listagem de Cores</h2>
			<p><a href="cadastrar.php">Nova Cor</a></p>
			<table border="1">
				<tr>
					<td>
						ID
					</td>
					<td>
						Nome
					</td>
					<td>
						Editar
					</td>
					<td>
						Deletar
					</td>
				</tr>
				<?php
					//cria um laço para exibir cada item retornado da consulta
					while($dados = pg_fetch_assoc($query)){
						
				?>
				
				<tr>
					<td><?=$dados['id_cor']?></td>
					<td><?=$dados['nome']?></td>
					<td><a href="editar.php?id=<?=$dados['id_cor']?>">Editar</a></td>
					<td><a href="excluir.php?id=<?=$dados['id_cor']?>">Excluir</a></td>
				</tr>
				
				<?php		
					}
				?>
			</table>
		</div>
	</body>
</html>
