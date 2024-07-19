<?php

//EDITAR CLIENTE

include ("conexion-mostrar.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM</title>
    <link rel="stylesheet" href="/CSS/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/estilos.css">
    <link rel="stylesheet" href="/CSStabla.css">
</head>
<body>
    <?php

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
            location.assign('leer-clientes.php');
            </script>";

          }else{
            echo "<script language= 'JavaScript'>
            alert ('Los datos NO se actualizaron correctamente');
            location.assign('leer-clientes.php');
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
    <!--INGRESO DE CLIENTES-->
    <header class="barra">
        <div class="contenedor">
          
            <h1>Administrador de Clientes - EASYPRO</h1>
        </div>
    </header>

    <div class="grid contenedor contenido-principal">

        <main class="caja-contenido col-9"> 
            <!--Titulo-->
            <h2>Editar Cliente</h2>
            <!--Metodo POST para ingresar los clientes a la BD-->
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
               
                <form method="POST">
                <!--Titulo formulario-->
                <legend>Llena todos los campos</legend>
                <!--Campos para llenar datos de los clientes-->

                <div class="campo">
                    <label>Cedula:</label>
                    <input type="text" placeholder="Cedula" name="cedula" required="required"
                    value="<?php echo $cedula; ?>"> 
                    
                </div>

                <div class="campo">
                    <label>Nombre completo:</label>
                    <input type="text" placeholder="Nombre Cliente" name="nombre" required="required"
                    value="<?php echo $nombre; ?>"> 
                </div>

                <div class="campo">
                    <label>Genero:</label>
                    <label for="radio"> Hombre <input type="radio" name="genero" value="Hombre" id="Hombre" required="required" 
                    value="<?php echo $genero; ?>"> </label>
                    <label for="radio"> Mujer <input type="radio" name="genero" value="Mujer" id="Mujer" required="required"
                    value="<?php echo $genero; ?>"> </label>
                </div>

                <div class="campo">
                    <label>Ocupacion:</label>
                    <input type="text" placeholder="Ocupacion" name="ocupacion" required="required"
                    value="<?php echo $ocupacion; ?>"> 
                </div>

                <div class="campo">
                    <label>Fecha de nacimiento:</label>
                    <input type="date" placeholder="Fecha Nacimiento" name="fechanacimiento"required="required"
                    value="<?php echo $fechanacimiento; ?>"> 
                </div>

                <div class="campo">
                    <label>Direccion:</label>
                    <input type="text" placeholder="Direccion" name="direccion" required="required"
                    value="<?php echo $direccion; ?>"> 
                </div>

                <div class="campo">
                    <label>Correo Electronico:</label>
                    <input type="email" placeholder="Correo Electronico" name="correoelectronico" required="required"
                    value="<?php echo $correoelectronico; ?>"> 
                </div>

                <div class="campo">
                    <label>Telefono:</label>
                    <input type="text" placeholder="Teléfono Cliente" name="telefono" required="required"
                    value="<?php echo $telefono; ?>"> 
                </div>

                <div class="enviar">
                    <input type="submit" name="enviar" value= "Actualizar cliente">
                <a href="leer-clientes.php"  class="btn btn-amarillo"><i class="fas fa-pen-alt"></i>Volver</a>
                
            
                </div>

            </form>
            <?php
                     
            ?>

        </main>
    </div>
    <?php
                     }
            ?>
</body>
</html>