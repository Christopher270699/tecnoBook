<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <table class="table table-condensed">
        <tr>
            <th colspan="9" class="nombreTabla text-center">ESTUDIANTES MATRICULADOS - CURSO LECTIVO <?php echo $this->datosSistema[0]['annio_lectivo']; ?></th>
        </tr>
        <tr>
            <th>N°</th>
            <th>Identificación</th>
            <th>1re apellido</th>
            <th>2do apellido</th>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Condición</th>
            <th colspan="2" class="text-center">Acción</th>
        </tr>
        <?php
        $con = 1;
        foreach ($this->estadoMatricula as $lista => $value) {
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
            echo $value['condicion'];
            echo '</td>';
            echo '<td class="text-right" >';
            if (Session::get('tipoUsuario') <=3 ){
            echo '<a class="btn-sm btn-primary" href="editarMatricula/' . $value['cedula'] . '">Editar</a>';
            }else{
                echo '-';
            }
            echo '</td>';
            echo '<td>';
            echo '<a class="btn-sm btn-warning text-left" href="imprimirMatricula/' . $value['cedula'] . '"  target="_blank">Imprimir</a>';
            echo '</td>';
            echo '</tr>';
            $con++;
        }
        ?>
        <tr>
            <td colspan='9' class="lineaFin"></td>
        </tr>
        <tr>
            <td colspan='9'>Última línea</td>
        </tr>
    </table>
</center>