<?php
    include "controllers/deleteUser.php";
    include "controllers/getUser.php";
    include "db/connection.php";

    $connection = connectionDB();

    $nombre=$_GET["nombre"];
    $dni = $_GET["dni"];

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
    <?php 
    try{
        $userID=getUserID($connection,$nombre,$dni);

        $response= deleteUser($connection,$userID);

        echo '<div class="alert alert-success">'.$response.'</div>';
    }
    catch(Exception $e){
        echo '<div class="alert alert-warning">'.$e->getMessage().'</div>';
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>