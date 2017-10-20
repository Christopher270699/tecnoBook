<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <h1>Solicitud</h1>
    <form id="MyForm" action="<?php echo URL; ?>solicitud/revisarSolicitud" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DE LA FACTURA</legend>
            <!--L2 Nombre Estudiante (Formulario Hugo)-->
            <div class="form-group">
                <label for="txt_id" class="col-xs-2 control-label">ID:</label>
                <div class="col-xs-10">
                    <input type="text" disabled="" class="form-control input-sm validate[required]"  id="txt_id" name="txt_id" value='<?php echo $this->datosSolicitud[0]['id']; ?>'/>
                    <input type="hidden" id="txt_id" name="txt_id" value='<?php echo $this->datosSolicitud[0]['id']; ?>'/>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_nombreLibro" class="col-xs-2 control-label">Nombre del Libro:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_nombreLibro" name="txt_nombreLibro" value='<?php echo $this->datosSolicitud[0]['nombreLibro']; ?>'/>
                </div>
                <label for="txt_nombreEstudiante" class="col-xs-2 control-label">Nombre del Estudiante:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm"  id="txt_nombreEstudiante" name="txt_nombreEstudiante" value='<?php echo $this->datosSolicitud[0]['nombreEstudiante']; ?>'/>
                </div>    
            </div>
            <div class="form-group">
                <label for="txt_fechaPedido" class="col-xs-2 control-label">Fecha del Pedido:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaPedido" name="txt_fechaPedido" value='<?php echo $this->datosSolicitud[0]['fechaPedido']; ?>'/>
                </div>
                <label for="txt_fechaEntrega" class="col-xs-2 control-label">Fecha de Entrega:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaEntrega" name="txt_fechaEntrega" value='<?php echo $this->datosSolicitud[0]['fechaEntrega']; ?>'/>
                </div>
            </div>
            <br><br>
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
