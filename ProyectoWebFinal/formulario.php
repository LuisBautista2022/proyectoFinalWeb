<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
<form action="agregarEquipo.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="nombre">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" name="precio" aria-describedby="emailHelp" placeholder="precio">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Imagen</label>
    <input type="file" class="form-control" name="foto" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>