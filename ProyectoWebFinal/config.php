<?php
$hostname = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'pc';
//instancia el objeto de la base de datos
$mysqli = new mysqli($hostname, $usuario, $password, $basededatos);
$mysqli->set_charset('utf8');
// function conectar()
// {
//     $hostname = 'localhost';
//     $usuario = 'root';
//     $password = '';
//     $basededatos = 'pc';
//     $con = mysqli_connect($hostname, $usuario, $password);
//     mysqli_select_db($con, $basededatos);
//     return $con;
// }
?>
