<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <h1>Libro</h1>
    <form id="MyForm" action="<?php echo URL; ?>libro/actualizarLibro" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL LIBRO</legend>
            <!--L2 Nombre Estudiante (Formulario Hugo)-->
            <div class="form-group">
                <label for="txt_titulo" class="col-xs-2 control-label">Titulo:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_titulo" name="txt_titulo" value='<?php echo $this->datosLibro[0]['titulo']; ?>'/>
                </div>
                <label for="txt_autor" class="col-xs-2 control-label">Autor:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm"  id="txt_autor" name="txt_autor" value='<?php echo $this->datosLibro[0]['autor']; ?>'/>
                </div>
                <label for="txt_categoria" class="col-xs-2 control-label">Categoria:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_categoria" name="txt_categoria" value='<?php echo $this->datosLibro[0]['categoria']; ?>'/>
                </div> 
            </div> 
            <!--L3 Fecha Nacimiento (Formulario Hugo)-->
            <div class="form-group">
                <label for="txt_codigo" class="col-xs-2 control-label">Codigo:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_codigo" name="txt_codigo" value='<?php if ($this->datosLibro != null) echo $this->datosLibro[0]['codigo']; ?>'disabled=""/>
                    <input type="hidden" id="txt_codigo" name="txt_codigo" value='<?php if ($this->datosLibro != null) echo $this->datosLibro[0]['codigo']; ?>'/>
                </div>
            </div>
            <br><br>
            <!--L25 Imprimir y Guardar (Formulario Hugo)-->
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-primary" id="guardar" value="Guardar" />
                </div>
            </div>
        </fieldset>
    </form>
</div>