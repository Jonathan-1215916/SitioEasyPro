<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM - Lista de Clientes</title>
    <link rel="stylesheet" href="/CSS/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/estilos.css">
    <link rel="stylesheet" href="/CSS/tabla.css">

    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Estas seguro que deseas eliminar este cliente?');

      }
      </script>
</head>
<body>


<?php
      // Conexión a la base de datos
     include("conexion-mostrar.php");

    // Consulta para obtener la lista de clientes
    $sql = "SELECT * FROM cliente";
    $resultado = mysqli_query($conexion, $sql);

?>


    <header class="barra">
        <div class="contenedor">
            <h1>Administrador de Clientes - EASYPRO</h1>
        </div>
    </header>
    <div class="grid contenedor contenido-principal">
    <aside class="sidebar col-3">
            
        <main class="caja-contenido col-9"> 
              <!--Formulario-->
            <h2>Lista de Clientes</h2>

            <table class="tabla-responsive">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Género</th>
                        <th>Ocupación</th>
                        <th>Fecha Nacimiento</th>
                        <th>Dirección</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                

                    <?php
                        
                        // Mostrar cada cliente en la tabla
                        while ($filas = mysqli_fetch_assoc($resultado)){
                    ?>    
                        <tr>
                            <td><?php echo $filas['Cedula'] ?> </td>
                            <td><?php echo $filas['Nombre'] ?> </td>
                            <td><?php echo $filas['Genero'] ?> </td>
                            <td><?php echo $filas['Ocupacion'] ?> </td>
                            <td><?php echo $filas['FechaNacimiento'] ?> </td>
                            <td><?php echo $filas['Direccion'] ?> </td>
                            <td><?php echo $filas['CorreoElectronico'] ?> </td>
                            <td><?php echo $filas['Telefono'] ?> </td>
                            <td>

                            <?php echo"<a href='actualizar-clientes.php?cedula=".$filas ['Cedula']."'>EDIT</a>"; ?>
                            -
                            <?php echo"<a href='eliminar-clientes.php?cedula=".$filas ['Cedula']."' onclick='return confirmar()'>ELIM</a>"; ?>
                            -
                            <?php echo"<a href='contactar-clientes.html'>CONTACT</a>"; ?>
                            
                    
                           </td>
                        </tr>

                            <?php 
                        } 
                        
                        ?>
                       
                </tbody>
            </table>
            <div class="acciones-tabla">
                <a href="paginaprincipal.html"  class="btn btn-amarillo"><i class="fas fa-pen-alt"></i>Volver</a>
                <a href="nuevo-cliente.html"  class="btn btn-azul"><i class="fa fa-address-book"></i>Agregar nuevo cliente</a>
            </div>

            <?php 
            // Cerrar la conexión a la base de datos
                        mysqli_close($conexion);?>
        </body>
        </html>
