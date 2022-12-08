<?php
include '../config.php';

$nombreUsuario = $_POST['nombreUsuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$sqlinsert = "INSERT INTO usuario SET nombre='$nombreUsuario',correo='$correo',contraseña='$contraseña',tipoUsuario='usuario'";

if ($mysqli->query($sqlinsert)) {
    $mysqli->commit();
    echo 'Registrado';
    header('Location: http://localhost:8080/ProyectoWebFinal/' . 'login.php');
} else {
    $mysqli->rollback();
    echo 'Error';
    header('Location: http://localhost:8080/ProyectoWebFinal/' . 'login.php');
}
?>
