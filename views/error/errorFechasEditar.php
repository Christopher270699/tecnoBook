<?php
//print_r($this->estadoMatricula);
//die;
?>
<form id="MyForm" action="<?php echo URL; ?>factura/volverFormularioEditar" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <div class ="form-group">
        <div class="col-xs-12 text-center">
            <div class="row">
                <div class="col-xs-12">
                    <h1>ERROR</h1>
                    <h4>Lo sentimos, el período de tiempo del préstamo debe ser de almenos un día y no mayor a 15 días.</h4>
                    <h5>Por favor, vuelva a ingresar los datos.</h5>
                    &nbsp;
                    &nbsp;
                    <div class="col-xs-12 text-center">
                        <input type="submit" class="btn btn-primary" id="btn_volver" value="Volver A Las Facturas"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
&nbsp;
&nbsp;
&nbsp;