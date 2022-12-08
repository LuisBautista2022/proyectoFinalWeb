<?php
include '../config.php';

$id = $_POST['id'];
$sqldelete = "DELETE FROM equipo WHERE id='$id'";

if ($mysqli->query($sqldelete)) {
    $mysqli->commit();
    echo 'Eliminado';
    header(
        'Location: http://localhost:8080/ProyectoWebFinal/' .
            'administrador.php',
        true,
        303
    );
} else {
    $mysqli->rollback();
    echo 'Error';
}

?>
