<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Galeria</title>
</head>

<body>
    <header class="header">
        <section class="flex">
            <a href="#" class="logo"><img src="img/LogoPc.jpg" alt=""></a>
            <?php include 'menu.php'; ?>
            <div id="menu-btn" class="fas fa-bars"></div>
        </section>
    </header>


    <!--  -->
    <section class="gallery" id="gallery">
        <div class="heading">
            <h3>Galeria</h3>
        </div>
        <div class="box-container">
            <img src="img/galeria 1.png" alt="">
            <img src="img/galeria 2.png" alt="">
            <img src="img/galeria 3.png" alt="">
            <img src="img/galeria 4.png" alt="">
            <img src="img/galeria 5.png" alt="">
            <img src="img/Producto_laptop.jpg" alt="">
            
            
        </div>
    </section>
    <!-- footer -->
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

        <div class="credit">&copy; copyright @ 2022 by <span>Garcia-PC</span> | Todos los derechos reservados
        </div>

    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>

</html>