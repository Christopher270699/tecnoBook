<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <h1>Usuario</h1>
    <form id="MyForm" action="<?php echo URL; ?>usuario/actualizarUsuario" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL USUARIO</legend>
            <!--L2 Nombre Estudiante (Formulario Hugo)-->
                <div class="form-group">
                    <label for="txt_nombreUsuario" class="col-xs-2 control-label">Nombre de Usuario:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_nombreUsuario" name="txt_nombreUsuario" value='<?php echo $this->datosUsuario[0]['nombreUsuario']; ?>' disabled=""/>
                        <input type="hidden" id="txt_nombreUsuario" name="txt_nombreUsuario" value='<?php echo $this->datosUsuario[0]['nombreUsuario']; ?>'/>
                    </div>
                    <label for="txt_password" class="col-xs-2 control-label">Contraseña:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm"  id="txt_password" name="txt_password" value='<?php echo $this->datosUsuario[0]['password']; ?>'/>
                    </div>
                    <label for="txt_cedula" class="col-xs-2 control-label">Cédula:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_cedula" name="txt_cedula" value='<?php echo $this->datosUsuario[0]['cedula']; ?>'/>
                    </div> 
                </div> 
                <!--L3 Fecha Nacimiento (Formulario Hugo)-->
                <div class="form-group">
                    <label for="txt_correo" class="col-xs-2 control-label">Correo Electrónico:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_correo" name="txt_correo" value='<?php echo $this->datosUsuario[0]['correo']; ?>'/>
                    </div>
                    <label for="txt_telefono" class="col-xs-2 control-label">Télefono:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_telefono" name="txt_telefono" value='<?php echo $this->datosUsuario[0]['telefono']; ?>'/>
                    </div>
                    <label for="txt_seccion" class="col-xs-2 control-label">Sección:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="txt_seccion" name="txt_seccion" value='<?php echo $this->datosUsuario[0]['seccion']; ?>'/>
                    </div>
                </div>
            <br><br>
            <!--L25 Imprimir y Guardar (Formulario Hugo)-->
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-success" id="guardar" value="Guardar" />
                </div>
            </div>
        </fieldset>
    </form>
</div>