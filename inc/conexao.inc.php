<?php
/*
TRABALHO DOS ALUNOS:
ALEXSANDRA MARQUES
JEFERSON EURIDES
VICTOR STEVES
*/
//Variaveis utilizadas na conexao
$host = 'localhost';
$usuario = 'postgres';
$senha = '123';
$banco = 'veiculos';

//conecta ao banco de dados
pg_connect("host=$host user=$usuario password=$senha dbname=$banco");
?>
