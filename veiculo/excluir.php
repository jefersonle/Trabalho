<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Inclui arquivo de conexão ao BD
include '../inc/conexao.inc.php';
//Pega o id do cadastro e deleta do BD
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM modelo WHERE id_marca='$id'";
	$query = pg_query($sql);
	$modelos = array();
	while($modelo = pg_fetch_assoc($query)){
		$modelos[] = $modelo['id_modelo'];
	}

	foreach($modelos as $id_modelo){
		$sql = "DELETE FROM veiculo WHERE id_modelo = '$id_modelo'";
		pg_query($sql);
	}

	$sql = "DELETE FROM modelo WHERE id_marca = '$id'";
	pg_query($sql);
	
	$sql = "DELETE FROM veiculo where id_veiculo='$id'";
	pg_query($sql);
}
?>
