<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>usuario/guardarUsuario" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">Agregar Usuario</legend>
            <!--NOMBRE DE USUARIO CONTRASEÑA-->
            <div class="form-group">
                <label for="txt_nombreUsuario" class="col-xs-2 control-label">Nombre de Usuario:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_nombreUsuario" name="txt_nombreUsuario"/>
                </div>
                <label for="txt_password" class="col-xs-2 control-label">Contraseña:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_password" name="txt_password"/>
                </div>
            </div>
            <!--NOMBRE COMPLETO-->
            <div class="form-group">
                <label for="txt_nombre" class="col-xs-2 control-label">Nombre Completo:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_nombre" name="txt_nombre"/>
                </div>
            </div>
            <!--CÉDULA CORREO-->
            <div class="form-group">
                <label for="txt_cedula" class="col-xs-2 control-label">Cédula:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_cedula" name="txt_cedula"/>
                </div>
                <label for="txt_correo" class="col-xs-2 control-label">Correo Electrónico:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_correo" name="txt_correo"/>
                </div>
            </div>
            <!--TÉLEFONO SECCIÓN-->
            <div class="form-group">
                <label for="txt_telefono" class="col-xs-2 control-label">Télefono:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_telefono" name="txt_telefono"/>
                </div>
                <label for="txt_seccion" class="col-xs-2 control-label">Sección:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_seccion" name="txt_seccion"/>
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