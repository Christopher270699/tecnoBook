<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <table class="table table-condensed">
        <tr>
            <th colspan="8" class="nombreTabla text-center">Lista de Libros</th>
        </tr>
        <tr>
            <th>N°</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Editorial</th>
            <th colspan="2" class="text-center">Acción</th>
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
            echo $value['categoria'];
            echo '</td>';
            echo '<td>';
            echo $value['editorial'];
            echo '</td>';
            echo '<td class = text-center>';
            echo '<a class="btn-sm btn-warning" href="editarLibro/' . $value['codigo'] . '">Editar</a> &nbsp; &nbsp; &nbsp;';
            echo '<a class="btn-sm btn-danger" href="eliminarLibro/' . $value['codigo'] . '" onclick = "return confirm(' . $mensaje . ');">Eliminar</a>';
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