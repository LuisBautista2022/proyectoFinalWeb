<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleImage.css">
    <link rel="stylesheet icon" href="./favicon.svg" type="image/svg+xml">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Productos</title>
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
    <style>
        .product .box-container {
            grid-template-rows: repeat(auto-fit, 32rem);
        }
        .product .box-container .box img {
  width: 300px;
  height: 300px;
  object-fit: contain;
  margin-bottom: 1rem;
}
.product .box-container .box {
height: 32rem;
box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 25%);
}

.header {
            z-index: 2;
        }
        hr{
            margin-top: 0px;
        }
        /*  */

        .contEquipo{
            overflow-y:scroll;
            scroll-behavior: smooth;
            height:400px;
        }
        .row{
            margin:0px;
        }
        .nav span{
            opacity: 0;
        }
        .nav span{
            transition: all 1s ease;
        }
        .nav._expand span{
  margin: 0px 0px;
  opacity: 1;
}
.nav:before{
    content: 'MENU';
  position: absolute;
  padding: 7px 25px;
  margin: 0px -65px;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
  color: #007bff;
  border-radius: 50px;
  border: 2px solid #007bff;
  transition: all 0.3s ease;
  transition: all .3s;
  opacity: 1;
}
.nav._expand:before{
opacity: 0;
}
    </style>
   

    <section class="product " id="menu">
        <div class="heading">
            <img src="images/heading-img.png" alt="">
            <h3>Nuestros Productos</h3>
        </div>
        <div class="wrapper">
            <!-- filter Items -->
            <nav class="nav">
                <div class="items">
                    <span class="item active" data-name="all">All</span>
                    <?php
                    include 'config.php';
                    $sqlCategoria =
                        'SELECT categoria from equipo GROUP BY categoria';
                    $execonsultaCategoria = $mysqli->query($sqlCategoria);
                    while ($rowC = $execonsultaCategoria->fetch_object()) { ?>
                            <span class="item" data-name="<?= $rowC->categoria ?>"><?= $rowC->categoria ?></span>
                        <?php }
                    ?>
                </div>
            </nav>
        </div>
        <div class="gallery">
        <div class="box-container mb-5">
            <?php
            // $con = conectar();
            $sql = 'SELECT * from equipo';
            $execonsulta = $mysqli->query($sql);
            while ($row = $execonsulta->fetch_object()) { ?>
                    <div class="box image" data-name="<?= $row->categoria ?>">
                        <div class="equipo" data-name="<?= $row->categoria ?>" data-nombre="<?= $row->nombre ?>" data-precio="<?= $row->precio ?> Bs.">
                            <img  src="img/imgProducto/<?= $row->imagen ?>" alt="">
                        </div>
                        <h6 class="nombreEC"><?= $row->nombre ?></h6>
                        <h6><?= $row->categoria ?></h6>
                        <h4 class="precioEC"><?= $row->precio ?> Bs.</h4>
                        <hr class="mx-5">
                        <?php if (
                            isset($_SESSION['usuario']) &&
                            isset($_SESSION['tipo'])
                        ) {
                            if ($_SESSION['tipo'] == 'usuario') { ?>
                        <form action="BDD/agregarCarrito.php" method="post">
                            <input type="text" name="id" value="<?= $row->id ?>" hidden>
                            <input type="text" name="nombre" value="<?= $row->nombre ?>" hidden>
                            <input type="text" name="imagen" value="<?= $row->imagen ?>" hidden>
                            <input type="text" name="precio" value="<?= $row->precio ?>" hidden>
                            <div class="input-group flex-nowrap px-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">Cantidad</span>
                                </div>
                                <input type="number" name="cantidad" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min="1" pattern="^[0-9]+">
                                <input class="btn btn-secondary ml-1" type="submit" value="Añadir Carrito">
                            </div>
                        </form>
                        <?php }
                        } ?>
                    </div>
                    <?php }
            ?>
                </div>
        </div>
    </section>

   <div class="preview-box container">
        <div class="details">
            <span class="title">Categoria : &nbsp;<b></b></span>
            <span class="icon fas fa-times"></span>
        </div>
        <hr>
        <div class="row d-flex align-items-stretch">
            <div class="image-box col-7">
                <img src="" alt="">
            </div>
            <div class="col-5 contEquipo">
                <p class="nombreE"></p>
                <p>Precio : &nbsp;<b class="precioE">1000 Bs.</b></p>
                <p class="contenidoE"></p>
            </div>
        </div>
    </div>
    <div class="shadow"></div>
    <!-- footer -->
    <footer>
        <div class="footer-top py-5">
            <div class="contenedor">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="img/LogoPc.jpg" alt="Micro logo">
                    </a>
                    <p class="footer-text">
                        Garcia PC
                    </p>
                </div>
                <ul class="footer-list">
                    <li>
                        <p class="footer-link-title">Información</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Tienda Virtual </a>
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

        <div class="credit">&copy; copyright @ 2022 by <span>Garcia PC</span> | Todos los derechos reservados
        </div>

    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
    <script src="scriptImagen.js"></script>
    <script>
        $(document).ready(function(){
        $(".nav").click(function(){
          $(this).toggleClass("_expand");
        });
      });
    </script>
    <script>
        //selecting all required elements
const filterItem = document.querySelector(".items");
const filterImg = document.querySelectorAll(".gallery .image");
const filterImgP = document.querySelectorAll(".gallery .equipo");

window.onload = () => {
  //after window loaded
  filterItem.onclick = (selectedItem) => {
    //if user click on filterItem div
    if (selectedItem.target.classList.contains("item")) {
      //if user selected item has .item class
      filterItem.querySelector(".active").classList.remove("active"); //remove the active class which is in first item
      selectedItem.target.classList.add("active"); //add that active class on user selected item
      let filterName = selectedItem.target.getAttribute("data-name"); //getting data-name value of user selected item and store in a filtername variable
      filterImg.forEach((image) => {
        let filterImges = image.getAttribute("data-name"); //getting image data-name value
        //if user selected item data-name value is equal to images data-name value
        //or user selected item data-name value is equal to "all"
        if (filterImges == filterName || filterName == "all") {
          image.classList.remove("hide"); //first remove the hide class from the image
          image.classList.add("show"); //add show class in image
        } else {
          image.classList.add("hide"); //add hide class in image
          image.classList.remove("show"); //remove show class from the image
        }
      });
    }
  };
  for (let i = 0; i < filterImg.length; i++) {
    filterImgP[i].setAttribute("onclick", "preview(this)"); //adding onclick attribute in all available images
  }
};

//fullscreen image preview function
//selecting all required elements
const previewBox = document.querySelector(".preview-box"),
  categoryName = previewBox.querySelector(".title b"),
  previewImg = previewBox.querySelector("img"),
  closeIcon = previewBox.querySelector(".icon"),
  shadow = document.querySelector(".shadow"),
  nombreF = document.querySelector(".nombreE"),
  precioF = document.querySelector(".precioE");

function preview(element) {
  //once user click on any image then remove the scroll bar of the body, so user cant scroll up or down
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevImg = element.querySelector("img").src; //getting user clicked image source link and stored in a variable
  let selectedImgCategory = element.getAttribute("data-name"); //getting user clicked image data-name value
  let nombreEC = element.getAttribute("data-nombre"); 
  let precioEC = element.getAttribute("data-precio"); 

  previewImg.src = selectedPrevImg; //passing the user clicked image source in preview image source
  categoryName.textContent = selectedImgCategory; //passing user clicked data-name value in category name
  nombreF.textContent = nombreEC; 
  precioF.textContent = precioEC; 

  previewBox.classList.add("show"); //show the preview image box
  shadow.classList.add("show"); //show the light grey background
  closeIcon.onclick = () => {
    //if user click on close icon of preview box
    previewBox.classList.remove("show"); //hide the preview box
    shadow.classList.remove("show"); //hide the light grey background
    document.querySelector("body").style.overflow = "auto"; //show the scroll bar on body
  };
}

    </script>
</body>

</html>