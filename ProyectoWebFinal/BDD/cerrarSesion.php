<?php
ob_start();
session_cache_limiter(false);
session_start();
include '../config.php';

if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    session_destroy();
    $sqldelete = 'DELETE FROM carrito';
    $mysqli->query($sqldelete);
    $mysqli->commit();
    header('Location: http://localhost:8080/ProyectoWebFinal/index.php');
} else {
    header('Location: http://localhost:8080/ProyectoWebFinal/index.php');
}
?>
