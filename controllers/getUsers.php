<?php



//obtenemos todos los usuarios almacenados en nuestra base de datos
function getUsers($connection){
    try{
        $sql = "select * from users";

        $dbConnection = $connection;
        

        $instancia = $dbConnection->prepare($sql);

        $instancia->execute();

        if($instancia){

            $resultado = $instancia->fetchAll();
            return $resultado;
        }
        else{
            throw new Exception("Error al realizar la instancia sql");
        }
    }
    catch(Exception $e){
        echo "error ".$e->getMessage();
    }
}

?>