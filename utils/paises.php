<?php 

function getAllPaises(){
    try{
        $url = "https://restcountries.com/v3.1/all?fields=name,flags";
        $data = file_get_contents($url);

        if($data == false){
            throw new Exception("Error al obtener la informacion");
        }
        $response = json_decode($data);
        
        if($response != null){
            return $response;
        }
        throw new Exception("error al convertir la informacion");
    }
    catch(Exception $e){
        echo "Ha ocurrido un error:".$e->getMessage();
    }
}

function agregarSignoBajo($palabra){
    for($i = 0; $i < strlen($palabra);$i++){
        if($palabra[$i] == " "){
            $palabra[$i] = "_";
        }
    }
    return $palabra;
}

function eliminarSignoBajo($palabra){
    for($i = 0; strlen($palabra);$i++){
        if($palabra[$i] == "_"){
            $palabra[$i] = " ";
        }
    }
    return $palabra;
}

?>