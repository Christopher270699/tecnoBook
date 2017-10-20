<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <!--Buscador-->
    <div class="container">
        <label for="txt_buscarDatos" class="col-xs-2 control-label">Buscar Por:</label>   
        <div class="col-xs-3">
            <select class="form-control input-sm" name="txt_descripcionConsulta" id="txt_descripcionConsulta">
                <option value="0">Seleccione una opción...</option>
                <option value="1">Título Libro</option>
                <option value="2">Nombre Estudiante</option>
            </select>
            <!--<input type="text" class="form-control input-sm validate[required]"  id="txt_nombreLibro" name="txt_nombreLibro"/>-->
        </div>
        <div class="col-xs-5">
            <input type="text" class="col-xs-12 input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante"/>
        </div>
        <div class="col-xs-2">
            <input type="button" class="col-xs-12 btn-sm btn-success" id="buscarEstudianteRatificar" value="Buscar"/>
        </div>
    </div>
    <div class="col-xs-offset-6"></div>
    <div class="col-xs-12"><br></div>
    <div class="col-lg-10 col-xs-12"></div>
    <!--Tabla-->
    <table class="table table-condensed" id="tablaRatificar">
        <tr>
            <th colspan="8" class="nombreTabla text-center">CIRCULACIÓN</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nombre del Libro</th>
            <th>Nombre del Estudiante</th>
            <th>Cédula</th>
            <th>Fecha del Pedido</th>
            <th>Fecha de Entrega</th>
            <th>Tiempo Restante</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $mensaje = "'¿Ya se ha entregado el préstamo?'";
        $mensaje = "'¿Se debe multar este Préstamo?'";
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
            echo $value['cedula'];
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
            //$diferenciaDias = $fechaIngreso->diff($fechaSalida);
            //echo $diferenciaDias->format('%R%a día(s)');
            echo '</td>';
            echo '<td class = text-center>';
            echo '<a class="btn-sm btn-success" href="editarFactura/' . $value['id'] . '">Editar</a> &nbsp;';
            echo '<a class="btn-sm btn-warning" href="eliminarFactura/' . $value['id'] . '" onclick = "return confirm(' . $mensaje . ');">Devuelto</a> &nbsp;';
            echo '<a class="btn-sm btn-danger" href="multarFactura/' . $value['id'] . '" onclick = "return confirm(' . $mensaje . ');">Multar</a>';
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