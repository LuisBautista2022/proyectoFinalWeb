<style>
    .menu{
        display:flex;
    }
.submenu #carrito {
  display: none;
}
.submenu:hover #carrito {
  display: block;
  position: absolute;
  right: 10px;
  color: white;
  top: 100%;
  z-index: 1;
  background-color: #FFF;
  padding: 20px;
  min-height: 400px;
  min-width: 300px;
  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 50%);
}
.button-vaciar{
    display: inline-block;
    height: 38px;
    padding: 0 30px;
    color: #555;
    text-align: center;
    font-size: 11px;
    font-weight: 600;
    line-height: 38px;
    letter-spacing: .1rem;
    text-transform: uppercase;
    text-decoration: none;
    white-space: nowrap;
    background-color: transparent;
    border-radius: 4px;
    border: 1px solid #bbb;
    cursor: pointer;
    margin: auto !important;
    width: 100%;

}
.carritoImagen{
    width: 50px;
}
</style>
<nav class="menu pr-5">
                <a href="index.php">Inicio</a>
                <a href="productos.php">Productos</a>
                <a href="hitoria.php">Historia</a>
                <a href="galeria.php">Galeria</a>
                <a href="contacto.php">Contacto</a>
                <?php
                session_start();
                if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
                    if ($_SESSION['tipo'] == 'admin') { ?>
                        <a href="Administrador.php">Perfil</a>
                    <?php } else { ?>
                        <li class="submenu">
                            <a  href="carrito.php">Carrito</a>
                            <div id="carrito">
                                    <table id="lista-carrito" class="table table-striped ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                            </tr>  
                                            <tbody>
                                            <?php
                                            include 'config.php';
                                            // $con = conectar();
                                            $sql = 'SELECT * from carrito';
                                            $execonsulta = $mysqli->query($sql);
                                            while ($row = $execonsulta->fetch_object()) { ?>
                                                <tr>
                                                <td><img class="carritoImagen" src="img/imgProducto/<?= $row->imagen ?>"></td>
                                                <td><?= $row->nombre ?></td>
                                                <td><?= $row->cantidad ?> </td>
                                                <td><?= $row->precio ?> Bs</td>
                                                <td>
                                                    <form action="BDD/eliminarCarrito.php?ventana=1" method="post" >
                                                        <input type="text" name="id" value="<?= $row->id ?>" hidden>
                                                        <input type="submit" class="btn btn-danger" value="X">
                                                    </form>
                                                </td>
                                                </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </thead>

                                        <a href="BDD/vaciarCarrito.php?ventana=1" id="vaciar-carrito" class="button-vaciar">Vaciar Carrito</a>
                                    </table>
                            </div>
                        </li>
                        <a href="BDD/cerrarSesion.php">Cerrar Sesion</a>
                    <?php }
                } else {
                     ?>
                    <a href="login.php">Iniciar Sesion</a>
                <?php
                }
                ?>
            </nav>