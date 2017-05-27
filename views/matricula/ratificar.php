<div class="row">
    <div class="col-xs-12 text-center">
        <h2>Módulo Matrícula</h2>
    </div>
</div>

<div class="row">
    <div class="col-xs-3">
    Búsqueda por identificación:
    </div>
    <div class="col-xs-2">
        <input type="text" class="input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante" />
    </div>
    <div class="col-xs-2">
        <input type="button" class="btn-sm btn-success" id="buscarEstudianteRatificar" value="Buscar" />
    </div>
    <div class="col-xs-offset-5"></div>
    <div class="col-xs-12"><br></div>
    <div class="col-lg-10 col-xs-12">
        <table class="table table-condensed" id="tablaRatificar">
            <tr>
                <td colspan="9" class="nombreTabla">LISTA DE ESTUDIANTES POR RATIFICAR</td>
            </tr>
            <tr>
                <th>N°</th>
                <th>Identificación</th>
                <th>1<sup>er</sup> apellido</th>
                <th>2<sup>do</sup> apellido</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Grupo</th>
                <th>Subgrupo</th>
                <th>Acción</th>
            </tr>
            <?php
            $con = 1;
            foreach ($this->listaEstudiantes as $lista => $value) {
                echo '<tr>';
                echo '<td>';
                echo $con;
                echo '</td>';
                echo '<td>';
                echo $value['cedula'];
                echo '</td>';
                echo '<td>';
                echo $value['apellido1'];
                echo '</td>';
                echo '<td>';
                echo $value['apellido2'];
                echo '</td>';
                echo '<td>';
                echo $value['nombre'];
                echo '</td>';
                echo '<td>';
                echo $value['nivel'];
                echo '</td>';
                echo '<td>';
                echo $value['grupo'];
                echo '</td>';
                echo '<td>';
                echo $value['sub_grupo'];
                echo '</td>';
                echo '<td>';
                echo '<a class="btn-sm btn-primary" href="ratificarEstudiante/' . $value['cedula'] . '">Ratificar</a>';
                echo '</td>';
                echo '</tr>';
                $con++;
            }

            //print_r($this->personaList);
            ?>
            <tr>
                <td colspan='9' class="lineaFin"></td>
            </tr>
            <tr>
                <td colspan='9'>Última línea</td>
            </tr>
        </table>
    </div>
    <div class="col-xs-4">&nbsp;</div>
    <div class="col-xs-4">
        <a class="btn-lg btn-success" href="<?php echo URL; ?>matricula/ratificar">Ver lista completa</a>
    </div>
</div>
<br>