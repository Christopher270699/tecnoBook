<div class="row">
    <h2>Datos de Estudiantes sin Grupo asignado</h2>
    <table class="table table-condensed" id="tablaRatificar">
        <tr>
            <th>N°</th>
            <th>Identificación</th>
            <th>Nombre del estudiante</th>
            <th>Nivel</th>
            <th>Condición</th>
            <th>Tel. Casa</th>
            <th>Cel. Estu</th>
            <th>Genero</th>
            <th>Fecha Nacimiento</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $con = 1;
        foreach ($this->estudiantesMatriculadosSinGrupo as $lista => $value) {
            echo '<tr>';
            echo '<td>';
            echo $con;
            echo '</td>';
            echo '<td>';
            echo $value['cedula'];
            echo '</td>';
            echo '<td>';
            echo $value['apellido1'] . ' ' . $value['apellido2'] . ' ' . $value['nombre'];
            echo '</td>';
            echo '<td>';
            echo $value['nivel'];
            echo '</td>';
            echo '<td>';
            echo $value['condicion'];
            echo '</td>';
            echo '<td>';
            echo substr($value['telefonoCasa'], 0, 4) . '-' . substr($value['telefonoCasa'],4);
            echo '</td>';
            echo '<td>';
            echo substr($value['telefonoCelular'], 0, 4) . '-' . substr($value['telefonoCelular'],4);
            echo '</td>';
            echo '<td>';
            if($value['sexo']==0){
                echo 'M';
            }else{
                echo 'H';
            }
            echo '</td>';
            echo '<td>';
            echo $value['fechaNacimiento'];
            echo '</td>';
            echo '<td>';
            echo '<a class="btn-sm btn-warning" href="asignarSeccion/' . $value['cedula'] . '">Asignar Sección</a>';
            echo '</td>';
            echo '<td>';
            echo '<a class="btn-sm btn-danger" href="eliminarMatricula/' . $value['cedula'] . '">Eliminar Matrícula</a>';
            echo '</td>';
            echo '</tr>';
            $con++;
        }
        ?>
    </table>
</div>