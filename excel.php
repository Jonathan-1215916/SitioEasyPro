<?php
header ("Content-Type: application/xls");
header ("Content-Disposition: attachment; filename = Lista Clientes.xls");
?>
                <table>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>Ocupacion</th>
                        <th>Fecha Nacimiento</th>
                        <th>Direccion</th>
                        <th>Correo Electronico</th>
                        <th>Telefono</th>
                    </tr>
                

                    <?php
                        // Conexión a la base de datos
                        include("conexion-mostrar.php");

                        // Consulta para obtener la lista de clientes
                        $sql = "SELECT * FROM cliente";
                        $resultado = mysqli_query($conexion, $sql);
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
                        </tr>

                            <?php }
                        
                        
                        ?>
                       
                </tbody>
            </table>

