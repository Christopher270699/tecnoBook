<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>libro/guardarLibro" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">Agregar Libro</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
            <!--TITULO AUTOR CATEGORIA)-->
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
            <!--L3 CODIGO EDITORIAL INSCRIPCION-->
            <div class="form-group">
                <label for="txt_codigo" class="col-xs-2 control-label">Código:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_Codigo" name="txt_codigo"/>
                </div>
                <label for="txt_editorial" class="col-xs-2 control-label">Editorial:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_editorial" name="txt_editorial"/>
                </div>
                <label for="txt_inscripcion" class="col-xs-2 control-label">N° de Inscripción:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_inscripcion" name="txt_inscripcion"/>
                </div>
            </div>
            <!--L4 FECHA PUBLICACION LUGAR PUBLICACION ISBN-->
            <div class="form-group">
                <label for="txt_fechaPublicacion" class="col-xs-2 control-label">Fecha de Publicación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaPublicacion" name="txt_fechaPublicacion"/>
                </div>
                <label for="txt_lugarPublicacion" class="col-xs-2 control-label">Lugar de Publicación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_lugarPublicacion" name="txt_lugarPublicacion"/>
                </div>
                <label for="txt_isbn" class="col-xs-2 control-label">ISBN:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_isbn" name="txt_isbn"/>
                </div>
            </div>
            <!--L5 CONTENIDO-->
            <div class="form-group">
                <label for="txt_contenido" class="col-xs-2 control-label">Contenido:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_contenido" name="txt_contenido"/>
                </div>
            </div>
            <br><br>
            <!--L25 GUARDAR-->
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-primary" id="guardar" value="Guardar e Imprimir" />
                </div>
            </div>
        </fieldset>
    </form>
</div>