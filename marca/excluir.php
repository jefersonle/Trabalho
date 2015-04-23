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
	$sql = "DELETE FROM marca where id_marca='$id'";
	pg_query($sql);
}
?>
