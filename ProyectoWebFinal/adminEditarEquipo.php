<?php
session_start();
if (isset($_SESSION['usuario']) && isset($_SESSION['tipo'])) {
    if ($_SESSION['tipo'] == 'admin') {

        include 'config.php';

        $id = $_GET['id'];
        $sqlselect = "SELECT * FROM equipo where id='$id'";
        ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Editar</title>
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
        <h2>Editar Equipo</h2>
        <form action="BDD/editarEquipo.php" method="post" enctype="multipart/form-data">
            <?php
            $execonsulta = $mysqli->query($sqlselect);
            while ($row = $execonsulta->fetch_object()) { ?>
          <div class="inputBx">
            <div class="row">
              <div class="col-md-6">
                <span>Nombre Equipo</span>
                <input type="text" name="id" value="<?= $row->id ?>" hidden>
                <input type="text" name="nombre" value="<?= $row->nombre ?>" placeholder="Nombre">
              </div>
              <div class="col-md-6">
                <span>Precio</span>
                <input type="text" name="precio" value="<?= $row->precio ?>" placeholder="Precio">
              </div>
           
            </div>
          </div>
          <div class="inputBx">
            <div class="row">
              <div class="col-md-12">
                <span>Categoria</span>
                <input type="text" name="categoria" value="<?= $row->categoria ?>" placeholder="Categoria">
              </div>
           
            </div>
          </div>

          <div class="inputBx">
            <span>Imagen de Equipo </span>
            <input type="file" name="foto" id="file" hidden>
            <input type="text" name="fotoEditada"  value="<?= $row->imagen ?>" hidden>
            <label for="file" id="selector">archivo seleccionado : <?= $row->imagen ?></label>
          </div>
          <div class="inputBx">
            <div class="row">
              <div class="col-md-6 re">
                <input type="submit" value="Editar" id="">
              </div>
              <div class="col-md-6">
                <a href="Administrador.php">
                  <input type="button" value="Cancelar" id="">
                </a>
              </div>
            </div>
          </div>
          <?php }
            ?>
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
<?php
    }
} else {
    header('Location: index.php');
} ?>
