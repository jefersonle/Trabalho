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
	$sql = "DELETE FROM veiculo WHERE id_modelo = '$id'";
	pg_query($sql);
	
	$sql = "DELETE FROM modelo where id_modelo='$id'";
	pg_query($sql);
}
?>
