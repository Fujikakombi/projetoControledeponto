<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "controle_pontos";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_error()) {
	echo "Falha na conexão: " . mysqli_connect_error();
}

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

//UFT8
mysqli_set_charset($connect, 'utf8');

?>

