<?php

/* Inicio variables */
$nombreF = $_POST['nombreF'];
$rutF = $_POST['rutF'];
$correoF = $_POST['correoF'];
$comF = $_POST['comF'];

 /*Fin variables*/ 
//Conexión a base de datos
$conexion = new mysqli('localhost','root','','aabasedeform');
if ($conexion->connect_error) {
    die ("Conexión fallida: " . $conexion->connect_error);
} else if(empty($nombreF) or empty($rutF) or empty($correoF) or empty($comF)){
echo"Le faltan campos por rellenar";
}else{
    $prep= $conexion->prepare ("INSERT INTO registro(Nombre,Rut,Correo,Comentarios)
    values(?,?,?,?)");
    
    $prep->bind_param("ssss",$nombreF,$rutF,$correoF,$comF);
    $prep->execute();
    echo"Sus datos han sido guardados exitosamente";
    $prep->close();
    $conexion->close();
}

?>