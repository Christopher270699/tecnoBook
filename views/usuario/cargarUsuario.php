<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <table class="table table-condensed">
        <tr>
            <th colspan="10" class="nombreTabla text-center">Lista de Usuarios</th>
        </tr>
        <tr>
            <th>N°</th>
            <th>Nombre de Usuario</th>
            <th>Contraseña</th>
            <th>Nombre Completo</th>
            <th>Cédula</th>
            <th>Correo Electrónico</th>
            <th>Télefono</th>
            <th>Sección</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $con = 1;
        $mensaje = "'¿Desea eliminar este usuario?'";
        foreach ($this->listaUsuarios as $lista => $value) {
            echo '<tr>';
            echo '<td>';
            echo $con;
            echo '</td>';
            echo '<td>';
            echo $value['nombreUsuario'];
            echo '</td>';
            echo '<td>';
            echo $value['password'];
            echo '</td>';
            echo '<td>';
            echo $value['nombre'];
            echo '</td>';
            echo '<td>';
            echo $value['cedula'];
            echo '</td>';
            echo '<td>';
            echo $value['correo'];
            echo '</td>';
            echo '<td>';
            echo $value['telefono'];
            echo '</td>';
            echo '<td>';
            echo $value['seccion'];
            echo '</td>';
            echo '<td class = text-center>';
            echo '<a class="btn-sm btn-warning" href="editarUsuario/' . $value['nombreUsuario'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
            echo '<a class="btn-sm btn-danger" href="eliminarUsuario/' . $value['nombreUsuario'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
            $con++;
        }
        ?>
        <tr>
            <td colspan='10' class="lineaFin"></td>
        </tr>
        <tr>
            <td colspan='10'>Última Línea</td>
        </tr>
    </table>
</center>