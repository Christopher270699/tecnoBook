<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <!--Tabla-->
    <table class="table table-condensed" id="tablaRatificar">
        <tr>
            <th colspan="8" class="nombreTabla text-center">MIS MULTAS</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nombre del Libro</th>
            <th>Nombre del Estudiante</th>
            <th>Fecha del Pedido</th>
            <th>Fecha de Entrega</th>
            <th>Tiempo de Atraso</th>
        </tr>
        <?php
        foreach ($this->listaMultaNormal as $lista => $value) {
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
            $fechaIngreso = new DateTime();
            $fechaSalida = new DateTime($value['fechaEntrega']);
            //PRIMERA FORMA
            $diferenciaDias = $fechaIngreso->diff($fechaSalida);
            echo (int) $diferenciaDias->format('%R%a') . " día(s)";
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