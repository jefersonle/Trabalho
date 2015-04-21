<?php
//Inclui arquivo de conexão ao BD
include '../inc/conexao.inc.php';
//Pega o id do cadastro e deleta do BD
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM veiculo where id_veiculo='$id'";
	pg_query($sql);
}
?>
