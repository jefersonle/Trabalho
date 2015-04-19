<?php
//Inclui arquivo de conexão ao BD
include '../inc/conexao.inc.php';
//Pega o id do cadastro para deletar no BD
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM cor where id_cor='$id";
	pg_query($sql);
}
?>
