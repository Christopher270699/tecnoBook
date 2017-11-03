<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <div class="container">
        <label for="txt_buscarDatos" class="col-xs-2 control-label">Buscar Usuario:</label>
        <div class="col-xs-8">
            <input type="text" class="col-xs-12 input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante"/>
        </div>
        <div class="col-xs-2">
            <input type="button" class="col-xs-12 btn-sm btn-success" id="buscarEstudianteRatificar" value="Buscar"/>
        </div>
    </div>
    <div class="col-xs-offset-6"></div>
    <div class="col-xs-12"><br></div>
    <div class="col-lg-10 col-xs-12"></div>
    <table class="table table-condensed" id="tablaRatificar">
        <tr>
            <th colspan="10" class="nombreTabla text-center">Lista de Usuarios</th>
        </tr>
        <tr>
            <th>N°</th>
            <th>Cédula</th>
            <th>Nombre Completo</th>            
            <th>Correo Electrónico</th>
            <th>Télefono</th>
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
            echo $value['cedula'];
            echo '</td>';
            echo '<td>';
            echo $value['nombre'];
            echo '</td>';
            echo '<td>';
            echo $value['correo'];
            echo '</td>';
            echo '<td>';
            echo $value['telefono'];
            echo '</td>';
            echo '<td class = text-center>';
            echo '<a class="btn-sm btn-warning" href="editarUsuario/' . $value['cedula'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
            echo '<a class="btn-sm btn-danger" href="eliminarUsuario/' . $value['cedula'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
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