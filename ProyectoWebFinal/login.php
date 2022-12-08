<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['tipo'])) { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>

<body>
    <section class="section1020">
        <div class="container1020">
            <div class="user singinBx">
                <div class="imgBx"><img src="img/Login.jpg"></div>
                <div class="formBx">
                    <form action="BDD/sesion.php" method="post">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario">
                        <input type="password" name="contraseña" placeholder="Contraseña">
                        <div class="botones">
                            <a class="volver" href="index.php">
                                Volver
                            </a>
                            <input type="submit" name="" value="Iniciar">
                        </div>
                        <p class="signup">No tengo una Cuenta <a href="#" onclick="toggleForm();">Registrarse</a></p>
                    </form>
                </div>
            </div>
            <div class="user singupBx">
                <div class="formBx">
                    <form action="BDD/registrar.php" method="post">
                        <h2>Create un Cuenta</h2>
                        <input type="text" name="nombreUsuario" placeholder="Nombre de Usuario">
                        <input type="email" name="correo" placeholder="Correo Electronico">
                        <input type="password" name="contraseña" placeholder="Contraseña">
                        <input type="password" name="" placeholder="Confirmar Contraseña">
                        <div class="botones">
                            <a class="volver" href="index.php">
                                Volver
                            </a>
                            <input type="submit" name="" value="Crear">
                        </div>
                        <p class="signup">Ya tengo una Cuenta <a href="#" onclick="toggleForm();">Iniciar Sesion</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="img/Maquinaria2.jpg"></div>
            </div>
        </div>
    </section>
    <script>
        function toggleForm() {
            var container = document.querySelector(".container1020");
            container.classList.toggle("active");
        }

    </script>
</body>

</html>
<?php } else {header('Location: index.php');} ?>
