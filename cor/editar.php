<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['cor'];
	$id = $_POST['id'];
	if(!empty($nome)){
		//Atualiza cadastro no BD
		$sql = "UPDATE cor SET nome='$nome' where id_cor='$id'";
		$query = pg_query($sql);
	}else{
		echo 'Nome invalido!';
	}
}
?>
<html>
	<head>
		<title>Editar Cor</title>
	</head>
	<body>
		<h2>Editar Cor</h2>
		<form action="" method="post">
		  <?php
		  //Pega id do registro por GET
		  $id = $_GET['id'];
		  //Seleciona item passado por GET no BD para edição
		  $sql = "SELECT * FROM cor WHERE id_cor='$id'";
		  $query = pg_query($sql);
		    
		  while($dados = pg_fetch_assoc($query)){
		  ?>
			<p>Nome:<input type="text" name="cor" value="<?=$dados['nome']?>" /></p>
			<input type="hidden" name="id" value="<?=$id?>">
			<?php
		  }
			?>
			<p><input type="submit" value="Editar Cor"></p>
		</form>
	</body>

