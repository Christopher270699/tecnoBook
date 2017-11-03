<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>registroUsuario/agregarUsuario" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">Agregar Usuario</legend>
            <!--CÉDULA CONTRASEÑA-->
            <div class="form-group">
                <label for="txt_cedula" class="col-xs-2 control-label">Cédula:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_cedula" name="txt_cedula"/>
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
            <!--CORREO TELÉFONO-->
            <div class="form-group">
                <label for="txt_correo" class="col-xs-2 control-label">Correo Electrónico:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_correo" name="txt_correo"/>
                </div>
                <label for="txt_telefono" class="col-xs-2 control-label">Télefono:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_telefono" name="txt_telefono"/>
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