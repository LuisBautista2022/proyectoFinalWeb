<?php
ob_start();
session_start();
include '../config.php';

$nombreUsuario = $_POST['nombreUsuario'];
$contraseña = $_POST['contraseña'];

$sqlselect = 'SELECT * FROM usuario ';
$execonsulta = $mysqli->query($sqlselect);

$sqlcount = 'SELECT COUNT(*) AS "count" from usuario';
$execonsultaCount = $mysqli->query($sqlcount);

while ($rowC = $execonsultaCount->fetch_object()) {
    $contador = $rowC->count;
    $aux = 0;
    while ($row = $execonsulta->fetch_object()) {
        $aux++;
        if ($row->nombre == $nombreUsuario && $row->contraseña == $contraseña) {
            $_SESSION['usuario'] = $nombreUsuario;
            $_SESSION['tipo'] = $row->tipoUsuario;
            $_SESSION['idUsuario'] = $row->id;
            $sqldelete = 'DELETE FROM carrito';
            $mysqli->query($sqldelete);
            $mysqli->commit();
            if ($row->tipoUsuario == 'admin') {
                header(
                    'Location: http://localhost:8080/ProyectoWebFinal/' .
                        'administrador.php'
                );
                break;
            } else {
                header('Location: http://localhost:8080/ProyectoWebFinal/');
                break;
            }
        } else {
            if ($aux == $contador) {
                echo 'Datos no validos';
                header(
                    'Location: http://localhost:8080/ProyectoWebFinal/login.php'
                );
                break;
            }
        }
    }
}

?>
