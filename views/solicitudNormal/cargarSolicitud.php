<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <table class="table table-condensed">
        <tr>
            <th colspan="8" class="nombreTabla text-center">Lista de Solicitudes</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nombre del Libro</th>
            <th>Nombre del Estudiante</th>
            <th>Fecha del Pedido</th>
            <th>Fecha de Entrega</th>
            <th>Tiempo del Préstamo</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $mensaje = "'¿Desea eliminar esta solicitud?'";
        foreach ($this->listaSolicitudes as $lista => $value) {
            echo '<td>';
            echo $value['id'];
            echo '</td>';
            echo '<td>';
            echo $value['nombreLibro'];
            echo '</td>';
            echo '<td>';
            echo $value['nombreEstudiante'];
            echo '</td>';
            echo '<td>';
            echo $value['fechaPedido'];
            echo '</td>';
            echo '<td>';
            echo $value['fechaEntrega'];
            echo '</td>';
            echo '<td>';
            //FECHAS
            $fechaIngreso = new DateTime($value['fechaPedido']);
            $fechaSalida = new DateTime($value['fechaEntrega']);
            //PRIMERA FORMA
            $diferenciaDias = $fechaIngreso->diff($fechaSalida);
            echo $diferenciaDias->format('%R%a día(s)');
            echo '</td>';
            echo '<td class = text-center>';
            if (Session::get('tipoUsuario') > 0) {
                echo '<a class="btn-sm btn-warning" href="editarSolicitud/' . $value['id'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
                echo '<a class="btn-sm btn-danger" href="eliminarSolicitud/' . $value['id'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
            }
            if (Session::get('tipoUsuario') < 1) {
                echo '<a class="btn-sm btn-primary" href="aceptarSolicitud/' . $value['id'] . '">Aceptar</a> &nbsp; &nbsp; &nbsp;';
                echo '<a class="btn-sm btn-danger" href="eliminarSolicitud/' . $value['id'] . '" onclick = "return confirm(' . $mensaje . ');">Rechazar</a>';
            }
            echo '</td>';
            echo '</tr>';
        }
        ?>
        <tr>
            <td colspan='8' class="lineaFin"></td>
        </tr>
        <tr>
            <td colspan='8'>Última Línea</td>
        </tr>
    </table>
</center>