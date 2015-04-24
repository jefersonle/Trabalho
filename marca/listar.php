<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Inclui arquivo de conexão ao banco de dados
include '../inc/conexao.inc.php';

//Seleciona todos os itens da tabela para exibir na tela
$sql = "SELECT * FROM marca ORDER BY id_marca DESC";
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
					//Cria laço para exibir cada item selecionado no BD
					while($dados = pg_fetch_assoc($query)){
						
				?>
				
				<tr>
					<td><?=$dados['id_marca']?></td>
					<td><?=$dados['nome']?></td>
					<td><a href="editar.php?id=<?=$dados['id_marca']?>">Editar</a></td>
					<td><a href="excluir.php?id=<?=$dados['id_marca']?>" onclick='javascript: return confirm("TEM CERTEZA QUE DESEJA EXCLUIR ESTA MARCA? \n\n NOTE QUE TODOS OS VEICULOS E MODELOS DESTA MARCA TAMBEM SERAO DELETADOS!")'>Excluir</a></td>
				</tr>		
						
				<?php		
					}
				?>
				
			</table>
		</div>
	</body>
</html>
