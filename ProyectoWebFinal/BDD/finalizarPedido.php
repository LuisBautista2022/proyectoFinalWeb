<?php 
include '../config.php';
session_start();

$totalPedido = $_POST['total'];
$idUsuario = $_SESSION['idUsuario'];


$sqlinsert = "INSERT INTO pedido SET total='$totalPedido',idUsuario='$idUsuario'";
$sqllastid = 'select max(id) as id from pedido';
if($mysqli->query($sqlinsert) && ($execunsultaId = $mysqli->query($sqllastid))){
    while ($row = mysqli_fetch_array($execunsultaId)) {
        $id = $row['id'];
        $sql = 'SELECT * from carrito';
        $execonsulta = $mysqli->query($sql);
        while ($row = $execonsulta->fetch_object()) {
            $sqlinsertDetalle = "INSERT INTO detallePedido SET idEquipo='$row->id',idPedido='$id',cantidad='$row->cantidad'";
            $mysqli->query($sqlinsertDetalle);
        }
        header(
            'Location: http://localhost:8080/ProyectoWebFinal/' .
                'productos.php'
        );
        $sqldelete = "DELETE FROM carrito";
        $mysqli->query($sqldelete);
    }
}
else {
    $mysqli->rollback();
    echo 'Error';
}

?>