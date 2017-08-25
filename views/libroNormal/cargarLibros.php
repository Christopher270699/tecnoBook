<?php
//print_r($this->estadoMatricula);
//die;
?>
<center>
    <div class="container">
        <!--BUSCADOR-->
        <div class="col-xs-4">
            Búsqueda por identificación:
        </div>
        <div class="col-xs-2">
            <input type="text" class="input-sm validate[required]" name="txt_nombreLibro" id="txt_nombreLibro" />
        </div>
        <div class="col-xs-2">
            <input type="button" class="btn-sm btn-success" id="buscarLibroRatificar" value="Buscar" />
        </div>
        <div class="col-xs-offset-5"></div>
        <div class="col-xs-12"><br></div>
        <div class="col-lg-10 col-xs-12"></div>
    </div>
    <!--TABLA-->
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