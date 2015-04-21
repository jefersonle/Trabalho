<?php
include '../inc/conexao.inc.php';

$sql = "SELECT * FROM cor";
$query = pg_query($sql);

?>
<html>
	<head>
		<title>Listagem de Cores</title>
	</head>
	<body>
		<div>
			<table>
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
