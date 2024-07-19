
<?php
/*Ingreso de nuevos clientes*/

$server="sql312.infinityfree.com";
$usuario="if0_36937266";
$contrasena="fXF0Tsy8ngJqOw";
$bd="if0_36937266_Easypro";

/*Conexion a la BD*/
$conexion=mysqli_connect($server,$usuario,$contrasena,$bd)
or die ("error de conexion");


$cedula = $_POST ["cedula"];
$nombre = $_POST ["nombre"];
$genero = $_POST ["genero"];
$ocupacion = $_POST ["ocupacion"];
$fechanacimiento = $_POST ["fechanacimiento"];
$direccion = $_POST ["direccion"];
$correoelectronico = $_POST ["correoelectronico"];
$telefono = $_POST ["telefono"];

/*Insertar clientes*/
$insertar= "INSERT INTO cliente values ('$cedula','$nombre','$genero','$ocupacion','$fechanacimiento',
 '$direccion','$correoelectronico','$telefono')";

$resultado=mysqli_query($conexion,$insertar) 
or die ("<script language= 'JavaScript'>
            alert ('Ya existe un cliente con esa cedula');
            location.assign('clientes-mostrar.php');
            </script>");

mysqli_close($conexion);

echo '<script>alert("Datos insertados correctamente")</script> ';
echo "<script>location.href='clientes-mostrar.php'</script>";

?>



