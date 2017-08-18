<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <table class="table table-condensed">
        <tr>
            <th colspan="8" class="nombreTabla text-center">Lista de Facturas</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nombre del Libro</th>
            <th>Nombre del Estudiante</th>
            <th>Fecha del Pedido</th>
            <th>Fecha de Entrega</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $mensaje = "'¿Desea eliminar esta factura?'";
        foreach ($this->listaFacturas as $lista => $value) {
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
            echo '<td class = text-center>';
            echo '<a class="btn-sm btn-warning" href="editarFactura/' . $value['nombreLibro'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
            echo '<a class="btn-sm btn-danger" href="eliminarFactura/' . $value['nombreLibro'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
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