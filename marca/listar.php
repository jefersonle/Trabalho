<?php
include '../inc/conexao.inc.php';

$sql = "SELECT * FROM marca";
$query = pg_query($sql);

?>
<html>
	<head>
		<title>Listagem de Marcas</title>
	</head>
	<body>
		<div>
			<h2>Listagem de Marcas</h2>
			<p><a href="cadastrar.php">Nova Marca</a></p>
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
					while($dados = pg_fetch_assoc($query)){
						
				?>
				
				<tr>
					<td><?=$dados['id_marca']?></td>
					<td><?=$dados['nome']?></td>
					<td><a href="editar.php?id=<?=$dados['id_marca']?>">Editar</a></td>
					<td><a href="excluir.php?id=<?=$dados['id_marca']?>">Excluir</a></td>
				</tr>		
						
				<?php		
					}
				?>
				
			</table>
		</div>
	</body>
</html>
