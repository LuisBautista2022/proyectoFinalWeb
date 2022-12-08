<?php
include '../config.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$imagen = $_POST['imagen'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = 'SELECT * from carrito';
$sqlcount = 'SELECT COUNT(*) AS "count" from carrito';
$execonsulta = $mysqli->query($sql);
$execonsultaCount = $mysqli->query($sqlcount);

    while ($rowC = $execonsultaCount->fetch_object()) {
        if($rowC->count==0){
            $sqlinsert = "INSERT INTO carrito SET id='$id',nombre='$nombre',imagen='$imagen',precio='$precio',cantidad='$cantidad'";
                if ($mysqli->query($sqlinsert)) {
                    $mysqli->commit();
                    echo 'Registrado';
                    header('Location: http://localhost:8080/ProyectoWebFinal/' . 'productos.php');
                } else {
                    $mysqli->rollback();
                    echo 'Error';
                }
        }else{
            while ($row = $execonsulta->fetch_object()) {
                if ($row->id == $id) {
                    $suma = $row->cantidad + $cantidad;
                    $sqlupdate = "UPDATE carrito SET cantidad='$suma' WHERE id='$id'";
                    $mysqli->query($sqlupdate);
                    $mysqli->commit();
                    header('Location: http://localhost:8080/ProyectoWebFinal/' . 'productos.php');
                } else {
                    $sqlinsert = "INSERT INTO carrito SET id='$id',nombre='$nombre',imagen='$imagen',precio='$precio',cantidad='$cantidad'";
                    if ($mysqli->query($sqlinsert)) {
                        $mysqli->commit();
                        echo 'Registrado';
                        header('Location: http://localhost:8080/ProyectoWebFinal/' . 'productos.php');
                    } else {
                        $mysqli->rollback();
                        echo 'Error';
                    }
                break;
                }
            }
        }
    }

    
//}



?>