<?php
include '../config.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$tipo = $_FILES['foto']['type'];

$sqlinsert = "INSERT INTO equipo SET nombre='$nombre',precio='$precio',categoria='$categoria'";
$sqllastid = 'select max(id) as id from equipo';

if ($mysqli->query($sqlinsert) && ($execunsulta = $mysqli->query($sqllastid))) {
    //dentro de condicion
    while ($row = mysqli_fetch_array($execunsulta)) {
        $id = $row['id'];
        if ($_FILES['foto']['type'] == 'image/png') {
            copy(
                $_FILES['foto']['tmp_name'],
                '../img/imgProducto/' . $id . '.png'
            );
            $ruta = $id . '.png';
            $sql = "update equipo SET imagen='$ruta' WHERE id='$id';";
            $mysqli->query($sql);
            header(
                'Location: http://localhost:8080/ProyectoWebFinal/' .
                    'administrador.php'
            );
        } else {
            echo 'extencion no valida';
        }
    }
    $mysqli->commit();
} else {
    $mysqli->rollback();
    echo 'Error';
}

?>
