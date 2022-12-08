<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <style>
        .carritoImagen{
            width: 50px;
        }
    </style>
<div class="container pt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <?php 
                 include 'config.php';
            $sqlcount = 'SELECT COUNT(*) AS "count" from carrito';
            $numero="";
            $total = 0.0;
            $execonsultaCount = $mysqli->query($sqlcount);
            while ($rowC = $execonsultaCount->fetch_object()) {
                $numero = $rowC->count;
            }
            ?>
            <h2>Carrito</h2>
            <h2><?php echo $numero?></h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    // $con = conectar();
                    $sql = 'SELECT * from carrito';
                    $execonsulta = $mysqli->query($sql);
                    while ($row = $execonsulta->fetch_object()) {
                        
                        $total += $row->cantidad * $row->precio; 
                        ?>
                        <tr>
                        <td><img class="carritoImagen" src="img/imgProducto/<?= $row->imagen ?>"></td>
                        <td><?= $row->nombre ?></td>
                        <td><?= $row->cantidad ?> </td>
                        <td><?= $row->precio ?> Bs</td>
                        <td>
                            <form action="BDD/eliminarCarrito.php?ventana=2" method="post" >
                                <input type="text" name="id" value="<?= $row->id ?>" hidden>
                                <input type="submit" class="btn btn-danger" value="X">
                            </form>
                        </td>
                        </tr>
                    <?php }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="card-header d-flex justify-content-between">
            <?php 
            if($numero >= 1){
                ?>
                <form action="BDD/vaciarCarrito.php?ventana=2">
                    <input class="btn btn-danger" type="submit" value="Vaciar Carrito">
                </form>
            <?php
            }else{
                ?>
                <div></div>
                <?php
            }
            ?>
            <div>
                <h4>Total : <?php echo $total;?> Bs</h4>
            </div>
        </div>
    </div>
    <div class="pt-3 d-flex justify-content-between">
        <a class="btn btn-secondary" href="productos.php">Volver a los Productos</a>
        <?php 
            if($numero >= 1){
                ?>
                <form action="BDD/finalizarPedido.php" method="post">
                    <input type="text" name="total" value="<?php echo $total?>" hidden>
                    <input class="btn btn-success" type="submit" value="Proceder al Pedido">
                </form>
            <?php
            }else{
                ?>
                <div></div>
                <?php
            }
            ?>
    </div>
</div>

<footer>
        <div class="footer-top py-5">
            <div class="contenedor">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="img/LogoPc.jpg" alt="Micro logo">
                    </a>
                    <p class="footer-text">
                        Garcia-PC
                    </p>
                </div>
                <ul class="footer-list">
                    <li>
                        <p class="footer-link-title">Información</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Tienda Virtual</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Av. America N°100</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">GarciaPc@gmail.com</a>
                    </li>
                </ul>
                <div class="social-list-box">
                    <p class="social-title">Follow Us On:</p>
                    <ul class="social-list">
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="credit">&copy; copyright @ 2022 by <span>Garcia PC  </span> | Todos los derechos reservados
        </div>

    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>