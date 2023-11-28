<?php 

    include "utils/paises.php";
    include "db/connection.php";
    include_once "controllers/getUser.php";
    include_once "controllers/updateUser.php";

    $connection = connectionDB();


    $nombre = $_GET["nombre"];
    $dni = $_GET["dni"];

    $countrys = getAllPaises();

    $userData = getUserData($connection,$nombre,$dni);

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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php"><p class="h4">Home</p></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container d-flex flex-column justify-content-center">
        <h3 class="p-4">Registro de personas</h3>
        <div class="response_server"><?php print_r(updateUser($connection));?></div>
        <form class= "p-3" method="POST" action="modificar_usuario.php<?php echo"?nombre=".$nombre."&dni=".$dni;?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="nombre" id="name" autocomplete="name"
                <?php echo isset($userData["Nombre"])?' value="'.$userData["Nombre"].'"' : 'value="Error al obtener la información"'; ?>>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni"
                <?php echo isset($userData["Dni"])?'value="'.$userData["Dni"].'"': 'value="Error al obtener la informacion"'?>>
            </div>
            <div class="mb-3">
                <label for="paises" class="form-label">Pais</label>
                <select class="form-select" aria-label="Default select example" name="pais" id="paises">
                <?php if($countrys != null){foreach($countrys as $countryIndice=>$valorCountry){?>
                <option 
                    <?php 
                    if(isset($userData["Pais"]) && agregarSignoBajo($valorCountry->name->official) == $userData["Pais"]){
                        echo "value=".agregarSignoBajo($valorCountry->name->official)." selected";
                    }else{
                        echo "value=".agregarSignoBajo($valorCountry->name->official);
                    }
                    ?>>
                    <?php echo $valorCountry->name->official;?>
                </option>
                <?php }}?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="email"
                <?php echo isset($userData["Email"])? ' value="'.$userData["Email"].'"':'value="Error al obtener la informacion"'?>>
            </div>
            <button type="submit" class="btn btn-primary">Modificar informacion</button>
        </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>