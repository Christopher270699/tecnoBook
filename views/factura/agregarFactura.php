<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<form id="MyForm" action="<?php echo URL; ?>factura/guardarFactura" method="POST" enctype="multipart/form-data" class="form-horizontal">
    <fieldset>
        
        <div class="row">
            <div class="row">
                <div class="form-group">
                    <label for="tf_Niveles" class="col-xs-2 control-label">Nivel:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="tf_Niveles" id="tf_Niveles">
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($this->consultaNiveles as $value) {
                                ?>
                                <option value="<?php echo $value['nivel']; ?>"><?php echo $value['nivel']; ?></option>
                                <?php
                            }
                            ?>  
                        </select>
                    </div>
                    <label for="tf_Grupos" class="col-xs-2 control-label">Grupo:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="tf_Grupos" id="tf_Grupos">
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <table class="table table-condensed" id="listaEstudiantes"></table>
                </div>
            </div>

            <legend class="text-center">Agregar Préstamo</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
            <!--L2 Nombre Estudiante (Formulario Hugo)-->
            <div class="form-group">
                <label for="txt_nombreLibro" class="col-xs-2 control-label">Nombre del Libro:</label>
                <div class="col-xs-4">
                    <select class="form-control input-sm" name="txt_nombreLibro" id="txt_nombreLibro">
                        <option value="">Seleccione una opción...</option>
                        <?php
                        foreach ($this->listaLibros as $value) {
                            echo "<option value='" . $value['titulo'] . "' ";
                            ?> > <?php
                            echo $value['titulo'] . "</option>";
                        }
                        ?>
                    </select> 
                    <!--<input type="text" class="form-control input-sm validate[required]"  id="txt_nombreLibro" name="txt_nombreLibro"/>-->
                </div>
                <label for="txt_nombreEstudiante" class="col-xs-2 control-label">Nombre del Estudiante:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm" value='<?php echo $_SESSION['nombre']; ?>' id="txt_nombreEstudiante" name="txt_nombreEstudiante"/>
                </div>
            </div>
            <div class="form-group">
                <label for="txt_fechaPedido" class="col-xs-2 control-label">Fecha del Pedido:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaPedido" name="txt_fechaPedido"/>
                </div>
                <label for="txt_fechaEntrega" class="col-xs-2 control-label">Fecha de Entrega:</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control input-sm validate[required]"  id="txt_fechaEntrega" name="txt_fechaEntrega"/>
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