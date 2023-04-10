<?php
include ("../Conexion/bd.php");
    ini_set('display_errors', 1);
date_default_timezone_set("America/Bogota");
  
$calificacion=$_POST['calificacion'];
$comentario=$_POST['comentario'];
$cod_producto=$_POST['cod_producto'];

$query = "insert into comentarios (calificacion, comentario, cod_producto) values ('$calificacion', '$comentario','$cod_producto')";

$result = $conn ->query($query);

if($result){
    $header = "MIME-Version: 1.0 \r\n";
    $header.= "Content-type: text/html; charset=utf-8 \r\n";
    mail($header);
    $regresar = $_SERVER['HTTP_REFERER'];
    echo "<script>document.location='$regresar';</script>";
}else{
    echo "No se inserto";
}

mysqli_close($conn);
?>