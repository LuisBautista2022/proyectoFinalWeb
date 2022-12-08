<?php
include '../config.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$fotoEditada = $_POST['fotoEditada'];
$tipo = $_FILES['foto']['type'];

if ($tipo == null) {
    $sqlupdate = "UPDATE equipo SET nombre='$nombre',precio='$precio',categoria='$categoria',imagen='$fotoEditada' WHERE id='$id'";
    $mysqli->query($sqlupdate);
    $mysqli->commit();
    header(
        'Location: http://localhost:8080/ProyectoWebFinal/' .
            'administrador.php'
    );
} else {
    if (
        $_FILES['foto']['type'] == 'image/png' ||
        $_FILES['foto']['type'] == 'image/jpg'
    ) {
        unlink('../img/imgProducto/' . $fotoEditada);
        copy($_FILES['foto']['tmp_name'], '../img/imgProducto/' . $id . '.png');
        $ruta = $id . '.png';
        $sqlupdate = "UPDATE equipo SET nombre='$nombre',precio='$precio',categoria='$categoria',imagen='$ruta' WHERE id='$id'";
        $mysqli->query($sqlupdate);
        $mysqli->commit();
        header(
            'Location: http://localhost:8080/ProyectoWebFinal/' .
                'administrador.php'
        );
    } else {
        echo 'extencion no valida';
    }
}

?>
