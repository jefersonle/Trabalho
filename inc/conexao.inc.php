<?php
$host = 'localhost';
$usuario = 'postgres';
$senha = '123';
$banco = 'veiculos';

pg_connect("host=$host user=$usuario password=$senha dbname=$banco");
?>
