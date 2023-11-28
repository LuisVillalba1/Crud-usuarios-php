<?php 

//verificamos si ya existe un usuario con ese nombre y dni
function verifyUserRepeat($connection,$nombre,$dni){
    $query = "select * from users WHERE Nombre='$nombre' AND Dni=$dni;";

    $instancia = $connection->prepare($query);
    
    $instancia->execute();
    
    if(!$instancia){
        throw new Exception("Error al ejecutar la query");
    }

    $resultado = $instancia->fetch(PDO::FETCH_ASSOC);
    
    if($resultado && isset($resultado["Nombre"])){
        throw new Exception("Ya existe un usuario con ese nombre y dni");
    }

    return false;
}

function getUserID($connection,$nombre,$dni){
    $query = "select UserID from users WHERE Nombre='$nombre' AND Dni=$dni;";

    $instancia = $connection->prepare($query);

    $instancia->execute();

    if(!$instancia){
        throw new Exception("Error al ejecutar la sentencia");
    }
    //usamos pdo para obtener el resultado como un array
    $resultado = $instancia->fetch(PDO::FETCH_ASSOC);

    if($resultado && isset($resultado["UserID"])){
        return $resultado["UserID"];
    }
    throw new Exception("No se ha encontrado el usuario");
}

function getUserData($connection,$nombre,$dni){

    try{
        $query = "select * from users WHERE Nombre='$nombre' AND Dni=$dni;";

        $instancia = $connection->prepare($query);
    
        $instancia->execute();
    
        if(!$instancia){
            throw new Exception("Error al obtener la informacion del usuario");
        }
    
        $resultado = $instancia->fetch(PDO::FETCH_ASSOC);
    
        if($resultado && isset($resultado["Nombre"])){
           return $resultado;
        }
    
        throw new Exception("No se ha encontrado ningun usuario");
    }
    catch(Exception $e){
        return $e->getMessage();
    }

}

?>