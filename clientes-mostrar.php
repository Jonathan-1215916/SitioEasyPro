<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion EASYPRO - Gestion de Clientes</title>
    <link rel="stylesheet" href="/CSS/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Staatliches" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/estilos.css">
    <link rel="stylesheet" href="/CSS/tabla.css">
    

    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Estas seguro que deseas eliminar este cliente?');

      }
    
//Funcion de contactar por Whatsaap
function abrirWhatsApp(telefono, nombre) {
  const mensajePredeterminado = "¡Hola " + nombre + "! Somos la empresa EASYPRO, ¿Te gustaria conocer mas de nuestros servicios?";
  const urlWhatsApp = `https://wa.me/${telefono}?text=${encodeURIComponent(mensajePredeterminado)}`;
  window.open(urlWhatsApp);
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
            <h1>Administracion - EASYPRO</h1>
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
                        
                        // Mostrar cada cliente en una fila de la tabla
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

                            <span class="tooltip">
                            <a href="Editar_Cliente.php?cedula=<?php echo $filas['Cedula']; ?>" class="Whatsapp"><img src="Imagenes/editar.png" alt="WhatsApp" ></a>
                            <span class="tooltip-text">Editar</span></span>

                            <span class="tooltip">
                            <a href="eliminar_cliente.php?cedula=<?php echo $filas['Cedula']; ?>" class="Whatsapp"><img src="Imagenes/eliminar.png" alt="WhatsApp"></a>
                            <span class="tooltip-text">Eliminar</span></span>

                            <span class="tooltip">
                            <a href="contactar-cliente.php?cedula=<?php echo $filas['Cedula']; ?>" class="Whatsapp"><img src="Imagenes/contactar.png" alt="WhatsApp"></a>
                            <span class="tooltip-text">Contactar</span></span>

                            <a href="javascript:abrirWhatsApp('<?php echo $filas['Telefono'] ?>', '<?php echo $filas['Nombre'] ?>')" class="Whatsapp">
                            <img src="Imagenes/whatsapp.png" alt="WhatsApp">
                            </a>

                           </td>
                        </tr>

                            <?php 
                        } 
                        
                        ?>
                       
                </tbody>
            </table>
            <div class="acciones-tabla">
                <a href="paginaprincipal.html"  class="btn btn-azul"><i class="fa fa-undo"></i>Volver</a>
                <a href="nuevo-cliente.html"  class="btn btn-verde"><i class="fa fa-address-book"></i>Agregar nuevo cliente</a>
                <a href="./excel.php"  class="btn btn-amarillo"><i class="fa fa-address-book"></i>Descargar lista</a>

            </div>

            <?php 
            // Cerrar la conexión a la base de datos
                        mysqli_close($conexion);?>
        </body>
        </html>
