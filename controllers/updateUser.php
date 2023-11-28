<?php

    //modificamos los o el valor de un usuario
    function updateUser($connection){
        $nombre = $_GET["nombre"];
        $dni = $_GET["dni"];
        if($_POST){
            if($_POST["nombre"] && $_POST["dni"] && $_POST["pais"] && $_POST["email"]){
                $nombreNuevo = $_POST["nombre"];
                $dniNuevo = $_POST["dni"];
                $paisNuevo = $_POST["pais"];
                $emailNuevo = $_POST["email"];

            try{
                $id = getUserID($connection,$nombre,$dni);
                $sql = "update users SET Nombre = '$nombreNuevo', Dni = $dniNuevo, Pais = '$paisNuevo', Email = '$emailNuevo' WHERE UserID = $id;";

                $instancia = $connection->prepare($sql);

                $instancia->execute();

                if(!$instancia){
                    throw new Exception("Ha ocurrido un error");
                }

                //en caso de que se hayan modificado mas de una columna
                if($instancia->rowCount() > 0){
                    return '<div class="alert alert-success">Usuario modificado con exito</div>';
                }

                throw new Exception("Por favor modifique algun valor");

            }
            catch(Exception $e){
                return '<div class="alert alert-warning">'.$e->getMessage().'</div>';
            }
            }
            else{
                return '<div class="alert alert-danger">Alguno de los campos esta vacio</div>';
            }
        }
    }

?>