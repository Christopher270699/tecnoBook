<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>registroUsuario/buscarUsuario" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">Buscar Cuenta</legend>
            <!--BUSCADOR-->
            <div class="form-group">
                <label for="txt_buscarEstudiante" class="col-xs-2 control-label">Buscar por Cédula:</label>
                <div class="col-xs-6">
                    <input type="text" class="col-xs-12 form-control input-sm validate[required]" placeholder="X-XXXX-XXXX" name="txt_buscarEstudiante" id="txt_buscarEstudiante"/>
                </div>
                <div class="col-xs-4">                    
                    <button type="submit" class="col-xs-12 btn btn-sm btn-success">Buscar</button>
                </div>
            </div>            
        </fieldset>
        <br>
    </form>
</div>
