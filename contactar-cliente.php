<?php
//CONTACTAR CLIENTE

include ("conexion-mostrar.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion EASYPRO - Contacto de Clientes</title>
    <link rel="stylesheet" href="/CSS/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/estilos.css">
</head>
<body><?php

      if(isset($_POST['enviar'])){
        //Entra aqui si se presiona actualizar
        $cedula=$_POST['cedula']; 
        $nombre=$_POST['nombre'];
        $genero=$_POST['genero'];
        $ocupacion=$_POST['ocupacion'];
        $fechanacimiento=$_POST['fechanacimiento'];
        $direccion=$_POST['direccion'];
        $correoelectronico=$_POST['correoelectronico'];
        $telefono=$_POST['telefono'];

        //Actualizar cliente
        $sql = "update cliente set nombre = '".$nombre."', 
              genero = '".$genero."',
              ocupacion = '".$ocupacion."',
              fechanacimiento = '".$fechanacimiento."',
              direccion = '".$direccion."',
              correoelectronico = '".$correoelectronico."',
              telefono = '".$telefono."'
          where cedula = '".$cedula."'";
          $resultado=mysqli_query($conexion,$sql);

          if($resultado){
            echo "<script language= 'JavaScript'>
            alert ('Los datos se actualizaron correctamente');
            location.assign('clientes-mostrar.php');
            </script>";

          }else{
            echo "<script language= 'JavaScript'>
            alert ('Los datos NO se actualizaron correctamente');
            location.assign('clientes-mostrar.php');
            </script>";

          }
          mysqli_close($conexion);

      }else{
        //Entra aqui si NO se presiona actualizar
        $cedula=$_GET['cedula'];
        $sql="select * from cliente where cedula='".$cedula."'";
        $resultado=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_assoc($resultado);
        $cedula=$fila["Cedula"]; 
        $nombre=$fila["Nombre"];
        $genero=$fila["Genero"];
        $ocupacion=$fila["Ocupacion"];
        $fechanacimiento=$fila["FechaNacimiento"];
        $direccion=$fila["Direccion"];
        $correoelectronico=$fila["CorreoElectronico"];
        $telefono=$fila["Telefono"];

        mysqli_close($conexion);

    ?>
    <header class="barra">
<div class="contenedor">
<h1>Administracion - EASYPRO</h1>
</div>
</header>

<div class="grid contenedor contenido-principal">
 <aside class="sidebar col-3">
<h2>Gestion de Clientes</h2>
<nav class="navegacion">
<a href="clientes-mostrar.php" class="clientes">Lista de clientes</a>
<a href="paginaprincipal.html" class="salir">Salir</a>
</nav>
 </aside>

        <main class="caja-contenido col-9"> 
              <!--Formulario-->
            <h2>Contactar cliente</h2>

            <form action="/clientes" method="POST">
                <form method="POST">
                   
                <!--Titulo-->    
                <legend>Formulario de contacto</legend>

                <div class="campo">
                      <!--Ingresar correo para mandar msj-->
                    <form action="tatiana.badilla@g-easypro.com" method="post">
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" placeholder="Asunto" required>
                </div>
                <!--Campo para ingresar correo-->
                <div class="campo">
                    <label>Correo Electronico:</label>
                    <input type="email" placeholder="Correo Electronico" name="correoelectronico" required="required"
                    value="<?php echo $correoelectronico; ?>"> 
                </div>
                <!--Campo para ingresar mensaje-->
                <div class="campo">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje"placeholder="  Mensaje"required></textarea>

                </div>
            </select>
            <!--Boton enviar-->
            <div class="enviar">
                <input type="submit" class="btn btn-verde" value="Enviar mensaje">
            
        </div>

            </form>

        </main>
    </div>
    <?php
                     }
            ?>
    
</body>
</html>