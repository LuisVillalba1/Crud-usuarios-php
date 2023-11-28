<?php
include "config.php";

//function que nos devuelve nuestro pdo de nuestra base de datos
function connectionDB(){
    global $HOST, $DBNAME, $DBUSERNAME, $DBPASSWORD;
    try{
        $connection = new PDO("mysql:host=$HOST;dbname=$DBNAME",$DBUSERNAME,$DBPASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch(ERRMODE_EXCEPTION $e){
        echo "Error al conectarse a la base de datos:".$e->getMessage();
    }
}

?>