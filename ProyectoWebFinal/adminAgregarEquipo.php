<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] == 'admin') { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="styleAgregarEquipo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <section>
    <div class="imgBx">
      <img src="img/fondo.jpg" alt="">
    </div>
    <div class="contentBx">
      <div class="formBx">
        <h2>Agregar Equipo</h2>
        <form action="BDD/agregarEquipo.php" method="post" enctype="multipart/form-data">
          <div class="inputBx">
            <div class="row">
              <div class="col-md-6">
                <span>Nombre Equipo</span>
                <input type="text" name="nombre"  placeholder="Nombre">
              </div>
              <div class="col-md-6">
                <span>Precio</span>
                <input type="number" name="precio" placeholder="Precio" min="1" pattern="^[0-9]+">
              </div>
            </div>
          </div>
          <div class="inputBx">
            <div class="row">
              
              <div class="col-md-12">
                <span>Categoria</span>
                <input type="text" name="cartegoria"  placeholder="Categoria">
              </div>
              
            </div>
          </div>

          <div class="inputBx">
            <span>Imagen de Equipo:</span>
            <input type="file" name="foto" id="file" hidden>
            <label for="file" id="selector">Seleccionar Archivo</label>
          </div>
          <div class="inputBx">
            <div class="row">
              <div class="col-md-6 re">
                <input type="submit" value="Registrar" id="">
              </div>
              <div class="col-md-6">
                <a href="Administrador.php">
                  <input type="button" value="Cancelar" id="">
                </a>
              </div>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    var loader=function(e){
      let file = e.target.files;
      let show = "<span>Archivo Seleccionado : </span>" + file[0].name;
      let output = document.getElementById('selector');
      output.innerHTML=show;
      output.classList.add("active");
    };
    //
    let fileInput = document.getElementById("file");
    fileInput.addEventListener("change",loader);
  </script>
</body>
</html>
<?php }
} else {
    header('Location: index.php');
} ?>
