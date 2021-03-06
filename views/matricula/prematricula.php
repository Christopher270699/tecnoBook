<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <h1>Pre-Matricula</h1>
    <form id="MyForm" action="<?php echo URL; ?>matricula/guardarPrematricula" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL ESTUDIANTE</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_nacionalidad" class="col-xs-2 control-label">Nacionalidad:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm" name="tf_nacionalidad" id="tf_nacionalidad">
                        <option value="506">COSTA RICA</option>
                        <option value="0">OTRO</option>
                        </select> 
                    </div>
                    <label for="tf_cedulaEstudiante" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarEstuPrematricula" value="Buscar"  style="display:block;"/>
                    </div>
                </div> 
                <!--L2 Nombre Estudiante (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_ape1" name="tf_ape1"/>
                    </div>
                    <label for="tf_ape2" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2" name="tf_ape2"/>
                    </div>
                    <label for="tf_nombre" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_nombre" name="tf_nombre"/>
                    </div> 
                </div> 
                <!--L3 Fecha Nacimiento (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_fnacpersona" class="col-xs-2 control-label">Fecha de Nacimiento (Año-Mes-Día):</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="tf_fnacpersona" name="tf_fnacpersona"/>
                    </div>
                    <label for="tf_edad" class="col-xs-2 control-label">Edad:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]"  id="tf_edad" name="tf_edad"/>
                    </div>
                    <label for="tf_genero" class="col-xs-2 control-label">Género:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="tf_genero" id="tf_genero">
                            <option value="">Seleccione</option>
                                <option value="0">Femenino</option>
                                <option value="1" >Masculino</option>
                        </select> 
                    </div>
                </div>
                <!--L7 Primaria (Formulario Hugo)-->
                <div class="form-group">
                    <label for="slt_primaria" class="col-xs-2 control-label">Escuela de procedencia:</label>
                    <div class="col-xs-3">
                        <select  class="form-control input-sm validate[required]" name="tf_primaria" id="tf_primaria">  
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($this->consultaEscuelasPrematricula as $value) {
                                ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option>
                                <?php
                            }
                            ?>  
                            <option value="9999">--OTRA--</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <legend class="text-center">DATOS DEL HOGAR</legend>
                <h4>Padre</h4>
                <!--L16 Cedula del Padre (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_cedulaPadre" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaPadre" id="tf_cedulaPadre"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarPadrePrematricula" value="Buscar" />
                    </div>
                </div> 
                <!--L17 Nombre del Padre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1Padre" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Padre" name="tf_ape1Padre"/>
                    </div>
                    <label for="tf_ape2Padre" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Padre" name="tf_ape2Padre"/>
                    </div>
                    <label for="tf_nombrePadre" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombrePadre" name="tf_nombrePadre"/>
                    </div> 
                </div> 
                <!--L18 Telefonos y Ocupación del Padre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telCelPadre" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelPadre" id="tf_telCelPadre"/>
                    </div>
                    <label for="tf_telCasaPadre" class="col-xs-2 control-label">Tel. Casa:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaPadre" id="tf_telCasaPadre"/>
                    </div>
                    <label for="tf_ocupacionPadre" class="col-xs-2 control-label">Ocupación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_ocupacionPadre" id="tf_ocupacionPadre"/>
                    </div> 
                </div>
                
                <h4>Madre</h4>
                <!--L13 Cedula de la Madre (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_cedulaMadre" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaMadre" id="tf_cedulaMadre"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarMadrePrematricula" value="Buscar" />
                    </div>
                </div> 
                <!--L14 Nombre de la Madre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1Madre" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Madre" name="tf_ape1Madre"/>
                    </div>
                    <label for="tf_ape2Madre" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Madre" name="tf_ape2Madre"/>
                    </div>
                    <label for="tf_nombreMadre" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombreMadre" name="tf_nombreMadre"/>
                    </div> 
                </div> 
                <!--L15 Telefonos y Ocupación de la Madre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telCelMadre" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelMadre" id="tf_telCelMadre"/>
                    </div>
                    <label for="tf_telCasaMadre" class="col-xs-2 control-label">Tel. Casa:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaMadre" id="tf_telCasaMadre"/>
                    </div>
                    <label for="tf_ocupacionMadre" class="col-xs-2 control-label">Ocupación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_ocupacionMadre" id="tf_ocupacionMadre"/>
                    </div> 
                </div>

                <!--L5 Domicilio (Formulario Hugo)-->
                <h4>DIRECCIÓN EXACTA DE LA CASA DE HABITACIÓN:</h4>
                <div class="form-group">
                    <div class="col-xs-2">
                        
                    </div>
                    <div class="col-xs-10">
                        <textarea class="form-control validate[required]" rows="1" name="tf_domicilio" id="tf_domicilio"></textarea>
                    </div>
                </div>
                <!--L6 Provincia, Canton, Distrito (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_provincias_NI" class="col-xs-2 control-label">Provincia:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="tf_provincias_NI" id="tf_provincias_NI">
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($this->consultaProvincias as $value) {
                                ?>
                                <option value="<?php echo $value['IdProvincia']; ?>"><?php echo $value['nombreProvincia']; ?></option>
                                <?php
                            }
                            ?>  
                        </select>
                    </div>
                    <label for="tf_cantones_NI" class="col-xs-2 control-label">Cantón:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="tf_cantones_NI" id="tf_cantones_NI">
                            
                        </select>
                    </div>
                    <label for="tf_distritos_NI" class="col-xs-2 control-label">Distrito:</label>
                    <div class="col-xs-2">
                        <select  class="form-control input-sm validate[required]" name="tf_distritos_NI" id="tf_distritos_NI">  
                            
                        </select>
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