<?php
include "db/connection.php";

include "controllers/postUsers.php";
include "controllers/getUsers.php";


$dbConnection = connectionDB();

$users = getUsers($dbConnection);

include "utils/paises.php";


$countrys=getAllPaises();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ce5d9700c6.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid d-flex flex-row flex-wrap">
    <div class="contenedor_form">
        <h3 class="p-4">Registro de personas</h3>
        <form class= "p-3" method="POST" action="main.php">
            <?php registerUser($dbConnection); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="nombre" id="name" autocomplete="name">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni">
            </div>
            <div class="mb-3">
                <label for="paises" class="form-label">Pais</label>
                <select class="form-select" aria-label="Default select example" name="pais" id="paises">
                <?php if($countrys != null){foreach($countrys as $indice=>$valor){?>
                <option value=<?php echo agregarSignoBajo($valor->name->official)?>><?php echo $valor->name->official;?></option>
                <?php }}?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-6 p-4">
    <table class="table">
        <h3>Usuarios</h3>
        <div class="Response_server">

        </div>
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">DNI</th>
      <th scope="col">Pais</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php?>
    <tr>
        <?php if(count($users) > 0){foreach($users as $indice=>$valor){?>
      <td><?php echo $valor["Nombre"];?></td>
      <td><?php echo $valor["Dni"];?></td>
      <td><?php echo $valor["Pais"];?></td>
      <td><?php echo $valor["Email"];?></td>
      <td><a href="modificar_usuario.php?<?php echo"nombre=".$valor["Nombre"]."&dni=".$valor["Dni"] ?>"><i class="fa-solid fa-pen-to-square text-success fa-lg update"></i></a></td>
      <td><a href="eliminarUsuario.php?<?php echo"nombre=".$valor["Nombre"]."&dni=".$valor["Dni"] ?>"><i class="fa-solid fa-trash text-danger fa-lg delete"></i></a></td>
    </tr>
    <?php }}?>
  </tbody>
</table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>