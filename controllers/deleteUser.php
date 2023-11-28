<?php 

    function deleteUser($connection,$id){
        try{
            $query = "delete from users where UserID = $id";

            $instancia = $connection->prepare($query);

            $instancia->execute();

            if(!$instancia){
                throw new Exception("Ha ocurrido un error");
            }

            return "Se ha eliminado el usuario correctamente";

        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

?>