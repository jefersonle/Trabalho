<?php
<?php
//Inclui arquivo de conexão ao BD
include '../inc/conexao.inc.php';
//Pega o id do cadastro para deletar no BD
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM marca where id_marca='$id";
	pg_query($sql);
}
?>	
?>
