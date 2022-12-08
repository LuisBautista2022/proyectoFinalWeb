<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] == 'admin') { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <script src="https://kit.fontawesome.com/11c2a0ea1c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin.css">
</head>

<body>
    <div class="contenedor">
        <div class="profile-header">
            <div class="profile-img">
                <img src="img/contact.jpg" alt="" width="200">
            </div>
            <div class="profile-nav-info">
                <h3>PC </h3>
                <div class="address">
                    <p class="state">ADMINISTRADOR</p>
                    <span class="country">BOLIVIA.</span>
                </div>
            </div>

        </div>
        <div class="main-bd">
            <div class="left-side">
                <div class="profile-side">
                    <p class="mobile-no">
                        <i class="fa fa-phone"></i>77924317
                    </p>
                    <p class="user-mail">
                        <i class="fa fa-envelope"></i>PCGRACIA@gmail.com
                    </p>
                    <div class="user-bio">
                        <h3></h3>
                    </div>
                    <div class="profile-btn">
                        <a href="index.php" class="chatbtn">
                            <i class="fa fa-reply"></i><br />Volver
                        </a>

                        <a href="BDD/cerrarSesion.php" class="chatbtn">
                            <i class="fa fa-sign-out"></i><br />Cerra Sesion
                        </a>
                    </div>

                </div>
            </div>
            <div class="right-side">
                <div class="nav">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">Equipos</li>
                        <li onclick="tabs(1)" class="user-review">Pedidos</li>
                        
                    </ul>
                </div>
                <div class="profile-body">
                    <div class="profile-post tab">
                        <!-- tab -->
                        <!-- Paquetees-->
                        <div class="sectP">
                            <div class="filtroB">
                                <a href="adminAgregarEquipo.php" style="padding:0px 0;">
                                    <button class="btnF btn2" id="agregar"><i class="fa fa-plus-square"></i> Agregar</button>
                                </a>

                            </div>
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include 'config.php';
                                // $con = conectar();
                                $sql = 'SELECT * from equipo';
                                $execonsulta = $mysqli->query($sql);
                                while ($row = $execonsulta->fetch_object()) { ?>
                                    <tr>
                                        <th scope="row"><?= $row->id ?></th>
                                        <td><?= $row->nombre ?></td>
                                        <td><?= $row->precio ?> Bs</td>
                                        <td><?= $row->categoria ?> </td>
                                        <td><img class="imagenTabla" src="img/imgProducto/<?= $row->imagen ?>" alt=""></td>
                                        <td>
                                            <a href="adminEditarEquipo.php?id=<?= $row->id ?>">
                                                <button class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="BDD/eliminarEquipo.php" method="post" >
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
                        <!-- Fin Paquetees-->
                    </div>

                    <div class="profile-review tab">
                        <div class="sectP">
                        <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Nombre Usuario</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sqlPedido = 'SELECT e.nombre,e.imagen,dp.cantidad,u.nombre AS usuario
                                FROM detallepedido dp
                                INNER JOIN equipo e ON dp.idEquipo=e.id
                                INNER JOIN pedido p ON dp.idPedido=p.id
                                INNER JOIN usuario u ON p.idUsuario=u.id;';
                                $execonsultaPedido = $mysqli->query($sqlPedido);
                                while (
                                    $row = $execonsultaPedido->fetch_object()
                                ) { ?>
                                    <tr>
                                        <td><?= $row->nombre ?></td>
                                        <td><img class="imagenTabla" src="img/imgProducto/<?= $row->imagen ?>" alt=""></td>
                                        <td><?= $row->cantidad ?></td>
                                        <td><?= $row->usuario ?> </td>
                                    </tr>
                                    <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $('.nav ul li').click(function () {
    $(this).addClass("active").siblings().removeClass('active');
})



const tabBtn = document.querySelectorAll('.nav ul li');
const tab = document.querySelectorAll('.tab');

function tabs(panelIndex) {
    tab.forEach(function (node) {
        node.style.display = 'none';
    });
    tab[panelIndex].style.display = 'block';
}
tabs(0);


</script>
</html>
<?php }
} else {
    header('Location: index.php');
} ?>
