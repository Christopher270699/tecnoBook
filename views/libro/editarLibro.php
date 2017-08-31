<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <h1>Libro</h1>
    <form id="MyForm" action="<?php echo URL; ?>libro/actualizarLibro" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL LIBRO</legend>
            <!--L1 TITULO AUTOR CATEGORIA)-->
            <div class="form-group">
                <label for="txt_titulo" class="col-xs-2 control-label">Título:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_titulo" name="txt_titulo" value='<?php echo $this->datosLibro[0]['titulo']; ?>'/>
                </div>
                <label for="txt_autor" class="col-xs-2 control-label">Autor:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm"  id="txt_autor" name="txt_autor" value='<?php echo $this->datosLibro[0]['autor']; ?>'/>
                </div>
                <label for="txt_categoria" class="col-xs-2 control-label">Descriptor:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_categoria" name="txt_categoria" value='<?php echo $this->datosLibro[0]['categoria']; ?>'/>
                </div>
            </div>
            <!--L3 CODIGO EDITORIAL INSCRIPCION-->
            <div class="form-group">
                <label for="txt_codigo" class="col-xs-2 control-label">Código:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_codigo" name="txt_codigo" value='<?php if ($this->datosLibro != null) echo $this->datosLibro[0]['codigo']; ?>'disabled=""/>
                    <input type="hidden" id="txt_codigo" name="txt_codigo" value='<?php if ($this->datosLibro != null) echo $this->datosLibro[0]['codigo']; ?>'/>
                </div>
                <label for="txt_editorial" class="col-xs-2 control-label">Editorial:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_editorial" name="txt_editorial" value='<?php echo $this->datosLibro[0]['editorial']; ?>'/>
                </div> 
                <label for="txt_inscripcion" class="col-xs-2 control-label">N° de Inscripción:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_inscripcion" name="txt_inscripcion" value='<?php echo $this->datosLibro[0]['inscripcion']; ?>'/>
                </div> 
            </div>
            <!--L4 FECHA PUBLICACION LUGAR PUBLICACION ISBN-->
            <div class="form-group">
                <label for="txt_fechaPublicacion" class="col-xs-2 control-label">Fecha de Publicación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaPublicacion" name="txt_fechaPublicacion" value='<?php echo $this->datosLibro[0]['fechaPublicacion']; ?>'/>
                </div>
                <label for="txt_lugarPublicacion" class="col-xs-2 control-label">Lugar de Publicación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm"  id="txt_lugarPublicacion" name="txt_lugarPublicacion" value='<?php echo $this->datosLibro[0]['lugarPublicacion']; ?>'/>
                </div>
                <label for="txt_isbn" class="col-xs-2 control-label">ISBN:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_isbn" name="txt_isbn" value='<?php echo $this->datosLibro[0]['isbn']; ?>'/>
                </div>
            </div>
            <!--L5 CONTENIDO-->
            <label for="txt_contenido" class="col-xs-2 control-label">Editorial:</label>
            <div class="col-xs-10">
                <input type="text" class="form-control input-sm validate[required]"  id="txt_contenido" name="txt_contenido" value='<?php echo $this->datosLibro[0]['contenido']; ?>'/>
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