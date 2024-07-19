
<?php

/*Codigo BD para el ingreso del administrador*/

$dbhost = "sql312.infinityfree.com";
$dbuser = "if0_36937266";
$dbpass = "fXF0Tsy8ngJqOw";
$dbname = "if0_36937266_Easypro";

/*Conexion a la BD*/
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if(!$conn){ 
  
die("No hay conexion: ".mysqli_connect_error());
 
}

$nombre = $_POST ["txtusuario"];
$pass = $_POST ["txtpassword"];

/*Seleccion de los datos de la BD para ingresar*/
$query = mysqli_query($conn, "SELECT * FROM login WHERE usuario = '$nombre' AND password = '$pass'");
$nr = mysqli_num_rows($query);

if ($nr == 1){    
/*Si los datos son correctos, ingresa a la pagina principal*/
header("Location: paginaprincipal.html");

}

else if ($nr == 0){
      echo "<script language= 'JavaScript'>
            alert ('No puede ingresar');
            location.assign('index.html');
            </script>";;

}

?>

