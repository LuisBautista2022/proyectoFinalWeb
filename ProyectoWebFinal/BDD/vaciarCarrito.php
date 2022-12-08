<?php
include '../config.php';

$id = $_POST['id'];
$sqldelete = "DELETE FROM carrito";

if ($mysqli->query($sqldelete)) {
    $mysqli->commit();
    echo 'Eliminado';
    if($_GET['ventana']==1){
        header(
            'Location: http://localhost:8080/ProyectoWebFinal/' .
                'productos.php'
        );
    }else{
        header(
            'Location: http://localhost:8080/ProyectoWebFinal/' .
                'carrito.php'
        );
    }
} else {
    $mysqli->rollback();
    echo 'Error';
}

?>
