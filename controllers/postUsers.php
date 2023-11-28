<?php 
    include "getUser.php";

    //registarmos un nuevo usuario
    function registerUser($connection){
        if($_POST){
            //verificamos que el usuario haya completado todos los campos
            if($_POST["nombre"] && $_POST["dni"] && $_POST["pais"] && $_POST["email"]){
                $nombre = $_POST["nombre"];
                $dni = $_POST["dni"];
                $pais = $_POST["pais"];
                $email = $_POST["email"];

                try{    
                    $userRepeat = verifyUserRepeat($connection,$nombre,$dni);
                    $sql = $connection->query("insert into users(Nombre,Dni,Pais,Email) values ('$nombre','$dni','$pais','$email')");

                    if($sql){
                        echo '<div class="alert alert-success">Usuario registrado</div>';
                    }
                    else{
                    echo '<div class="alert alert-danger">Ha ocurrido un error</div>';
                    }
                }
                catch(Exception $e){
                    echo '<div class="alert alert-danger">'.$e->getMessage().'</div>';
                }
            }
            else{
                echo '<div class="alert alert-danger">Alguno de los campos esta vacio</div>';
            }
        }
    }
 
?>