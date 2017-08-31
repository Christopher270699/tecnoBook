<?php
//print_r($this->estadoMatricula);
//die;
?>

<center>
    <!--BUSCADOR-->
    <div class="container">
        <label for="txt_buscarDatos" class="col-xs-2 control-label">Buscar Por:</label>   
        <div class="col-xs-2">
            <select class="form-control input-sm" name="txt_descripcionConsulta" id="txt_descripcionConsulta">
                <option value="0">Seleccione una opción...</option>
                <option value="1">Título</option>
                <option value="2">Autor</option>
                <option value="3">Código</option>
                <option value="4">Descriptor</option>
            </select>
            <!--<input type="text" class="form-control input-sm validate[required]"  id="txt_nombreLibro" name="txt_nombreLibro"/>-->
        </div>
        <div class="col-xs-6">
            <input type="text" class="col-xs-12 input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante"/>
        </div>
        <div class="col-xs-2">
            <input type="button" class="col-xs-12 btn-sm btn-success" id="buscarEstudianteRatificar" value="Buscar"/>
        </div>
    </div>
    <div class="col-xs-offset-6"></div>
    <div class="col-xs-12"><br></div>
    <div class="col-lg-10 col-xs-12"></div>
    <!--TABLA-->
    <table class="table table-condensed" id="tablaRatificar">
        <tr>
            <th colspan="8" class="nombreTabla text-center">Lista de Libros</th>
        </tr>
        <tr>
            <th>N°</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Código</th>
            <th>Descriptor</th>
            <th>Editorial</th>
            <?php if (Session::get('tipoUsuario') < 1) { ?>
                <th colspan="2" class="text-center">Acción</th>
            <?php } ?>
            <?php if (Session::get('tipoUsuario') >= 1) { ?>
                <th colspan="2" class="text-center"></th>
            <?php } ?>
        </tr>
        <?php
        $con = 1;
        $mensaje = "'¿Desea eliminar este libro?'";
        foreach ($this->listaLibros as $lista => $value) {
            echo '<tr>';
            echo '<td>';
            echo $con;
            echo '</td>';
            echo '<td>';
            echo $value['titulo'];
            echo '</td>';
            echo '<td>';
            echo $value['autor'];
            echo '</td>';
            echo '<td>';
            echo $value['codigo'];
            echo '</td>';
            echo '<td>';
            echo $value['categoria'];
            echo '</td>';
            echo '<td>';
            echo $value['editorial'];
            echo '</td>';
            echo '<td class = text-center>';
            if (Session::get('tipoUsuario') < 1) {
                echo '<a class="btn-sm btn-warning" href="editarLibro/' . $value['codigo'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
                echo '<a class="btn-sm btn-danger" href="eliminarLibro/' . $value['codigo'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
            }
            echo '</td>';
            echo '</tr>';
            $con++;
        }
        ?>
        <tr>
            <td colspan='8' class="lineaFin"></td>
        </tr>
        <tr>
            <td colspan='8'>Última línea</td>
        </tr>
    </table>
</center>