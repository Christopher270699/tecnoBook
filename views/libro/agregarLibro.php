<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>libro/guardarLibro" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">Agregar Libro</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
                <!--L2 Nombre Estudiante (Formulario Hugo)-->
                <div class="form-group">
                    <label for="txt_titulo" class="col-xs-2 control-label">Titulo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_Titulo" name="txt_titulo"/>
                    </div>
                    <label for="txt_autor" class="col-xs-2 control-label">Autor:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm"  id="txt_Autor" name="txt_autor"/>
                    </div>
                    <label for="txt_categoria" class="col-xs-2 control-label">Categoria:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_Categoria" name="txt_categoria"/>
                    </div> 
                </div> 
                <!--L3 Fecha Nacimiento (Formulario Hugo)-->
                <div class="form-group">
                    <label for="txt_codigo" class="col-xs-2 control-label">Codigo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_Codigo" name="txt_codigo"/>
                    </div>
                </div>
            <br><br>
            <!--L25 Imprimir y Guardar (Formulario Hugo)-->
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-primary" id="guardar" value="Guardar e Imprimir" />
                </div>
            </div>
        </fieldset>
    </form>
</div>