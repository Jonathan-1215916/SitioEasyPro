<?php

//ELIMINAR CLIENTE

$cedula=$_GET['cedula'];
include("conexion-mostrar.php");

//delete from cliente where cedula=$cedula
$sql="delete from cliente where cedula='".$cedula."'";
$resultado = mysqli_query($conexion, $sql);

if($resultado){
    echo "<script language= 'JavaScript'>
            alert ('Los datos se eliminaron correctamente');
            location.assign('clientes-mostrar.php');
            </script>";

}else{
    echo "<script language= 'JavaScript'>
            alert ('Los datos NO se eliminaron de la tabla');
            location.assign('clientes-mostrar.php');
            </script>";

}


?>