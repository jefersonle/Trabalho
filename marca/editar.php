<?php
//Incluindo arquivo de conexao com DB
include '../inc/conexao.inc.php';
//Testando requisição
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nome = $_POST['marca'];
	$id = $_POST['id'];
	
	if(!empty($nome)){
		$sql = "UPDATE marca SET nome='$nome'";
		$query = pg_query($sql);
	}else{
		echo 'Marca invalida!';
	}
}
?>
<html>
	<head>
		<title>Editar Marca</title>
	</head>
	<body>
		<h2>Editar Marca</h2>
		<form action="" method="post">
			
			<?php
			$id = $_GET['id'];
			$sql = "SELECT * FROM marca WHERE id_marca='$id'";
			$query = pg_query($sql);
			
			while($dados = pg_fetch_assoc($query)){
			?>
			<p>Nome:<input type="text" name="marca" value="<?=$dados['nome']?>"/></p>
			<input type="hidden" name="id" value="<?=$id?>">
			<?php
			}
			?>
			<p><input type="submit" value="Editar Marca"></p>
		</form>
	</body>
</html>
