<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>matricula/guardarRatificacion" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL ESTUDIANTE</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_nacionalidad" class="col-xs-2 control-label">Nacionalidad:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm" name="tf_nacionalidad" id="tf_nacionalidad">
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaPaises as $value) {
                            echo "<option value='" . $value['codigoPais'] . "' ";
                            if ($value['codigoPais'] == $this->infoEstudiante[0]['nacionalidad'])
                                echo "selected";
                            ?> > <?php
                            echo $value['nombrePais'] . "</option>";
                        }
                        ?>
                    </select> 
                </div>
                <label for="tf_cedulaEstudiante" class="col-xs-2 control-label">Identificación:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante" value="<?php echo $this->infoEstudiante[0]['cedula']; ?>"/>
                </div>
            </div> 
            <!--L2 Nombre Estudiante (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ape1" class="col-xs-2 control-label">1er apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_ape1" name="tf_ape1" value='<?php echo $this->infoEstudiante[0]['apellido1']; ?>'/>
                </div>
                <label for="tf_ape2" class="col-xs-2 control-label">2do apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2" name="tf_ape2" value='<?php echo $this->infoEstudiante[0]['apellido2']; ?>'/>
                </div>
                <label for="tf_nombre" class="col-xs-2 control-label">Nombre completo:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_nombre" name="tf_nombre" value='<?php echo $this->infoEstudiante[0]['nombre']; ?>'/>
                </div> 
            </div> 
            <!--L3 Fecha Nacimiento (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_fnacpersona" class="col-xs-2 control-label">Fecha de Nacimiento (Año-Mes-Día):</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]"  id="tf_fnacpersona" name="tf_fnacpersona" value='<?php if ($this->infoEstudiante != null) echo $this->infoEstudiante[0]['fechaNacimiento']; ?>'/>
                </div>
                <label for="tf_edad" class="col-xs-2 control-label">Edad:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]"  id="tf_edad" name="tf_edad" value='<?php if ($this->datosSistema[0]['annio_lectivo'] != null) echo $this->datosSistema[0]['annio_lectivo'] - (date(substr($this->infoEstudiante[0]['fechaNacimiento'], 0, 4))); ?>'/>
                </div>
                <label for="tf_genero" class="col-xs-2 control-label">Género:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm validate[required]" name="tf_genero" id="tf_genero">
                        <option value="">Seleccione</option>
                        <option value="0" <?php if ($this->infoEstudiante[0]['sexo'] == 0) echo 'selected'; ?>>Femenino</option>
                        <option value="1" <?php if ($this->infoEstudiante[0]['sexo'] == 1) echo 'selected'; ?>>Masculino</option>
                    </select> 
                </div>
            </div>
            <!--L4 Telefono y email *Tel.Casa (Nuevo)(Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_telHabitEstudiante" class="col-xs-2 control-label">Tel. Habitación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitEstudiante" id="tf_telHabitEstudiante" value='<?php if ($this->infoEstudiante != null) echo $this->infoEstudiante[0]['telefonoCasa']; ?>'/>
                </div>
                <label for="tf_telcelular" class="col-xs-2 control-label">Tel. Celular:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelular" id="tf_telcelular" value='<?php echo $this->infoEstudiante[0]['telefonoCelular']; ?>'>
                </div>
                <label for="tf_email" class="col-xs-2 control-label">Email:</label>
                <div class="col-xs-2">
                    <input class="form-control input-sm" type="email" name="tf_email" id="tf_email" value='<?php echo $this->infoEstudiante[0]['email']; ?>'>
                </div>
            </div>
            <!--L5 Domicilio (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_domicilio" class="col-xs-2 control-label">Domicilio:</label>
                <div class="col-xs-10">
                    <textarea class="form-control validate[required]" rows="1" name="tf_domicilio" id="tf_domicilio"><?php echo $this->infoEstudiante[0]['domicilio']; ?></textarea>
                </div>
                <div class="col-xs-4"></div>
            </div>
            <!--L6 Provincia, Canton, Distrito (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_provincias" class="col-xs-2 control-label">Provincia:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm validate[required]" name="tf_provincias" id="tf_provincias">
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaProvincias as $value) {
                            ?>
                            <option value="<?php echo $value['IdProvincia']; ?>"<?php if ($value['IdProvincia'] == $this->infoEstudiante[0]['IdProvincia']) echo ' selected'; ?>><?php echo $value['nombreProvincia']; ?></option>
                            <?php
                        }
                        ?>  
                    </select>
                </div>
                <label for="tf_cantones" class="col-xs-2 control-label">Cantón:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm validate[required]" name="tf_cantones" id="tf_cantones">
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaCantones as $value) {
                            if ($this->infoEstudiante != null && $value['IdProvincia'] == $this->infoEstudiante[0]['IdProvincia']) {
                                ?>
                                <option value="<?php echo $value['IdCanton']; ?>"
                                    <?php if ($value['IdCanton'] == $this->infoEstudiante[0]['IdCanton']) echo ' selected'; ?>>
                                <?php echo $value['Canton']; ?></option>
                                <?php
                            }
                        }
                        ?>  
                    </select>
                </div>
                <label for="tf_distritos" class="col-xs-2 control-label">Distrito:</label>
                <div class="col-xs-2">
                    <select  class="form-control input-sm validate[required]" name="tf_distritos" id="tf_distritos">  
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaDistritos as $value) {
                            if ($this->infoEstudiante != null && $value['IdCanton'] == $this->infoEstudiante[0]['IdCanton']) {
                                ?>
                                <option value="<?php echo $value['IdDistrito']; ?>"
                                    <?php if ($value['IdDistrito'] == $this->infoEstudiante[0]['IdDistrito']) echo ' selected'; ?>>
                                <?php echo $value['Distrito']; ?></option>
                                <?php
                            }
                        }
                        ?>    
                    </select>
                </div>
            </div>

            <!--L8 Enfermedad (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_enfermedad" class="col-xs-2 control-label">¿Padece alguna enfermedad?</label>
                <div class="col-xs-2">
                    <select  class="form-control input-sm" name="sel_enfermedad" id="sel_enfermedad">
                        <option value="0" <?php if ($this->enfermedadEstudiante == null) echo 'selected'; ?>>No</option> 
                        <option value="1" <?php if ($this->enfermedadEstudiante != null) echo 'selected'; ?>>Sí</option>
                    </select>
                </div>
                <div class="col-xs-2">

                    <?php
                    if ($this->enfermedadEstudiante != null) {
                        echo '<input type="text" class="form-control input-sm" name="tf_enfermedadDescripcion" id="tf_enfermedadDescripcion" value="' . $this->enfermedadEstudiante[0]['descripcion'] . '"/>';
                    } else {
                        echo '<input type="text" class="form-control input-sm" name="tf_enfermedadDescripcion" id="tf_enfermedadDescripcion" style="display:none;"/>';
                    }
                    ?>
                </div>
            </div>
            <br><br><br>
            <!--L7 Primaria (Formulario Hugo)-->
            <h4>Primaria</h4>
            <div class="form-group">
                <label for="slt_provinciaPrim" class="col-xs-2 control-label">Provincia:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm" name="slt_provinciaPrim" id="slt_provinciaPrim">
                        <option value="">SELECCIONE</option>
                        <?php
                        foreach ($this->consultaProvincias as $value) {
                            ?>
                            <option value="<?php echo $value['IdProvincia']; ?>"<?php if ($this->escuelaEstudiante != null && $value['IdProvincia'] == $this->escuelaEstudiante[0]['IdProvincia']) echo ' selected'; ?>><?php echo $value['nombreProvincia']; ?></option>
                            <?php
                        }
                        ?>  
                    </select>
                </div>
                <label for="slt_cantonPrim" class="col-xs-2 control-label">Canton:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm" name="slt_cantonPrim" id="slt_cantonPrim">
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaCantones as $value) {
                            if ($this->escuelaEstudiante != null && $value['IdProvincia'] == $this->escuelaEstudiante[0]['IdProvincia']) {
                                ?>
                                <option value="<?php echo $value['IdCanton']; ?>"
                                    <?php if ($value['IdCanton'] == $this->escuelaEstudiante[0]['IdCanton']) echo ' selected'; ?>>
                                <?php echo $value['Canton']; ?></option>
                                <?php
                            }
                        }
                        ?>  
                    </select>
                </div>
                <label for="slt_distritoPrim" class="col-xs-2 control-label">Distrito:</label>
                <div class="col-xs-2">
                    <select  class="form-control input-sm" name="slt_distritoPrim" id="slt_distritoPrim">  
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaDistritos as $value) {
                            if ($this->escuelaEstudiante != null && $value['IdCanton'] == $this->escuelaEstudiante[0]['IdCanton']) {
                                ?>
                                <option value="<?php echo $value['IdDistrito']; ?>"
                                    <?php if ($value['IdDistrito'] == $this->escuelaEstudiante[0]['IdDistrito']) echo ' selected'; ?>>
                                <?php echo $value['Distrito']; ?></option>
                                <?php
                            }
                        }
                        ?>
                        <option value="0">--OTRA--</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="slt_primaria" class="col-xs-2 control-label">Escuela:</label>
                <div class="col-xs-3">
                    <select  class="form-control input-sm" name="tf_primaria" id="tf_primaria" value='<?php echo $this->infoEstudiante[0]['escuela_procedencia']; ?>'> 
                        <option value="">Seleccione</option>
                        <?php
                        foreach ($this->consultaEscuelas as $value) {
                            if ($this->escuelaEstudiante != null && $value['IdDistrito'] == $this->escuelaEstudiante[0]['IdDistrito']) {
                                ?>
                                <option value="<?php echo $value['id']; ?>"
                                    <?php if ($value['id'] == $this->escuelaEstudiante[0]['id']) echo ' selected'; ?>>
                                <?php echo $value['nombre']; ?></option>
                                <?php
                            }
                        }
                        ?> 
                    </select>
                </div>
            </div>
            <br><br>
            <legend class="text-center">DATOS DEL HOGAR</legend>
            <h4>Madre</h4>
            <!--L13 Cedula de la Madre (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_cedulaMadre" class="col-xs-2 control-label">Identificación:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaMadre" id="tf_cedulaMadre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['ced_madre']; ?>'/>
                </div>
                <div class="col-xs-2">
                    <input type="button" class="btn-sm btn-success" id="buscarMadre" value="Buscar" />
                </div>
            </div> 
            <!--L14 Nombre de la Madre (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ape1Madre" class="col-xs-2 control-label">1er apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Madre" name="tf_ape1Madre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['apellido1_madre']; ?>'/>
                </div>
                <label for="tf_ape2Madre" class="col-xs-2 control-label">2do apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Madre" name="tf_ape2Madre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['apellido2_madre']; ?>'/>
                </div>
                <label for="tf_nombreMadre" class="col-xs-2 control-label">Nombre completo:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombreMadre" name="tf_nombreMadre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['nombre_madre']; ?>'/>
                </div> 
            </div> 
            <!--L15 Telefonos y Ocupación de la Madre (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_telCasaMadre" class="col-xs-2 control-label">Tel. Casa:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaMadre" id="tf_telCasaMadre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['telefonoCasaMadre']; ?>'/>
                </div>
                <label for="tf_telCelMadre" class="col-xs-2 control-label">Tel. Celular:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelMadre" id="tf_telCelMadre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['telefonoCelMadre']; ?>'/>
                </div>
                <label for="tf_ocupacionMadre" class="col-xs-2 control-label">Ocupación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm" name="tf_ocupacionMadre" id="tf_ocupacionMadre" value='<?php if ($this->madreEstudiante != null) echo $this->madreEstudiante[0]['ocupacionMadre']; ?>'/>
                </div> 
            </div>

            <h4>Padre</h4>
            <!--L16 Cedula del Padre (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_cedulaPadre" class="col-xs-2 control-label">Identificación:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaPadre" id="tf_cedulaPadre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['ced_padre']; ?>'/>
                </div>
                <div class="col-xs-2">
                    <input type="button" class="btn-sm btn-success" id="buscarPadre" value="Buscar" />
                </div>
            </div> 
            <!--L17 Nombre del Padre (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ape1Padre" class="col-xs-2 control-label">1er apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Padre" name="tf_ape1Padre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['apellido1_padre']; ?>'/>
                </div>
                <label for="tf_ape2Padre" class="col-xs-2 control-label">2do apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Padre" name="tf_ape2Padre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['apellido2_padre']; ?>'/>
                </div>
                <label for="tf_nombrePadre" class="col-xs-2 control-label">Nombre completo:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombrePadre" name="tf_nombrePadre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['nombre_padre']; ?>'/>
                </div> 
            </div> 
            <!--L18 Telefonos y Ocupación del Padre (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_telCasaPadre" class="col-xs-2 control-label">Tel. Casa:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaPadre" id="tf_telCasaPadre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['telefonoCasaPadre']; ?>'/>
                </div>
                <label for="tf_telCelPadre" class="col-xs-2 control-label">Tel. Celular:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelPadre" id="tf_telCelPadre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['telefonoCelPadre']; ?>'/>
                </div>
                <label for="tf_ocupacionPadre" class="col-xs-2 control-label">Ocupación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm" name="tf_ocupacionPadre" id="tf_ocupacionPadre" value='<?php if ($this->padreEstudiante != null) echo $this->padreEstudiante[0]['ocupacionPadre']; ?>'/>
                </div> 
            </div>

            <h4>Encargado Legal</h4>
            <!--L9 Cedula y parentesco* del encargado legal (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_parentesco" class="col-xs-2 control-label">Parentesco:</label>
                <div class="col-xs-2">
                    <select  class="form-control input-sm validate[required]" name="sel_parentesco" id="sel_parentesco"> 
                        <option value="">Seleccione</option> 
                        <option value="Padre" <?php if ($this->encargadoLegal[0]['parentesco'] == 'Padre') echo 'selected'; ?>>Padre</option> 
                        <option value="Madre" <?php if ($this->encargadoLegal[0]['parentesco'] == 'Madre') echo 'selected'; ?>>Madre</option>
                        <option value="Otro" <?php if ($this->encargadoLegal[0]['parentesco'] == 'Otro') echo 'selected'; ?>>Otro</option>
                    </select>
                </div>
                <label for="tf_cedulaEncargado" class="col-xs-2 control-label">Identificación:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaEncargado" id="tf_cedulaEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['ced_encargado']; ?>'/>
                </div>
                <div class="col-xs-2">
                    <input type="button" class="btn-sm btn-success" id="buscarEncargado" value="Buscar" />
                </div>
            </div> 
            <!--L10 Nombre del encargado legal (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ape1Encargado" class="col-xs-2 control-label">1er apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_ape1Encargado" name="tf_ape1Encargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['apellido1_encargado']; ?>'/>
                </div>
                <label for="tf_ape2Encargado" class="col-xs-2 control-label">2do apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Encargado" name="tf_ape2Encargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['apellido2_encargado']; ?>'/>
                </div>
                <label for="tf_nombreEncargado" class="col-xs-2 control-label">Nombre completo:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_nombreEncargado" name="tf_nombreEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['nombre_encargado']; ?>'/>
                </div> 
            </div> 
            <!--L11 Telefono Habitacion y celular (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_telHabitEncargado" class="col-xs-2 control-label">Tel. Habitación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitEncargado" id="tf_telHabitEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['telefonoCasaEncargado']; ?>'/>
                </div>
                <label for="tf_telcelularEncargado" class="col-xs-2 control-label">Tel. Celular:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelularEncargado" id="tf_telcelularEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['telefonoCelularEncargado']; ?>'/>
                </div>
            </div>
            <!--L12 Ocupación y email (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ocupacionEncargado" class="col-xs-2 control-label">Ocupación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[required]" name="tf_ocupacionEncargado" id="tf_ocupacionEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['ocupacionEncargado']; ?>'/>
                </div>
                <label for="tf_emailEncargado" class="col-xs-2 control-label">Email:</label>
                <div class="col-xs-2">
                    <input class="form-control input-sm" type="email" name="tf_emailEncargado" id="tf_emailEncargado" value='<?php if ($this->encargadoLegal != null) echo $this->encargadoLegal[0]['emailEncargado']; ?>'/>
                </div>
            </div>

            <h4>En caso de emergencia llamar a</h4>
            <!--L19 Cedula Persona En Caso de Emergencia (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_parentescoCasoEmergencia" class="col-xs-2 control-label">Parentesco:</label>
                <div class="col-xs-2">
                    <select  class="form-control input-sm validate[required]" name="sel_parentescoCasoEmergencia" id="sel_parentescoCasoEmergencia"> 
                        <option value="">Seleccione</option> 
                        <option value="Padre" <?php if ($this->personaEmergenciaEstudiante != null && $this->personaEmergenciaEstudiante[0]['parentesco'] == 'Padre') echo 'selected'; ?>>Padre</option> 
                        <option value="Madre" <?php if ($this->personaEmergenciaEstudiante != null && $this->personaEmergenciaEstudiante[0]['parentesco'] == 'Madre') echo 'selected'; ?>>Madre</option>
                        <option value="Otro" <?php if ($this->personaEmergenciaEstudiante != null && $this->personaEmergenciaEstudiante[0]['parentesco'] == 'Otro') echo 'selected'; ?>>Otro</option>
                    </select>
                </div>
                <label for="tf_cedulaPersonaEmergencia" class="col-xs-2 control-label">Identificación:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaPersonaEmergencia" id="tf_cedulaPersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['ced_personaEmergencia']; ?>'/>
                </div>
                <div class="col-xs-2">
                    <input type="button" class="btn-sm btn-success" id="buscarPersonaEmergencia" value="Buscar" />
                </div>
            </div> 
            <!--L20 Nombre de la Persona En Caso de Emergencia (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_ape1PersonaEmergencia" class="col-xs-2 control-label">1er apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_ape1PersonaEmergencia" name="tf_ape1PersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['apellido1_personaEmergencia']; ?>'/>
                </div>
                <label for="tf_ape2PersonaEmergencia" class="col-xs-2 control-label">2do apellido:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2PersonaEmergencia" name="tf_ape2PersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['apellido2_personaEmergencia']; ?>'/>
                </div>
                <label for="tf_nombrePersonaEmergencia" class="col-xs-2 control-label">Nombre completo:</label>
                <div class="col-xs-2">
                    <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_nombrePersonaEmergencia" name="tf_nombrePersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['nombre_personaEmergencia']; ?>'/>
                </div> 
            </div> 
            <!--L21 Telefonos de la Persona En Caso de Emergencia (Formulario Hugo)-->
            <div class="form-group">
                <label for="tf_telHabitPersonaEmergencia" class="col-xs-2 control-label">Tel. Habitación:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitPersonaEmergencia" id="tf_telHabitPersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['telefonoCasaPersonaEmergencia']; ?>'/>
                </div>
                <label for="tf_telcelularPersonaEmergencia" class="col-xs-2 control-label">Tel. Celular:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelularPersonaEmergencia" id="tf_telcelularPersonaEmergencia" value='<?php if ($this->personaEmergenciaEstudiante != null) echo $this->personaEmergenciaEstudiante[0]['telefonoCelularPersonaEmergencia']; ?>'/>
                </div>
            </div>
            <br><br>
            <legend class="text-center">DATOS DE LA INSTITUCIÓN</legend>
            <!--L22 Nivel a Matricular, Condicion, Adelanto (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_condicion" class="col-xs-2 control-label">Condición:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm validate[required]" name="sl_condicion" id="sl_condicion">
                        <option value="">Seleccione</option>
                        <option value="Regular" <?php if ($this->infoCondicionMatricula != null && $this->infoCondicionMatricula[0]['condicion'] == 'Regular') echo 'selected'; ?>>Regular</option>
                        <option value="Repite" <?php if ($this->infoCondicionMatricula != null && $this->infoCondicionMatricula[0]['condicion'] == 'Repite') echo 'selected'; ?>>Repite</option>
                    </select> 
                </div>
                <label for="tf_nivelMatricular" class="col-xs-2 control-label">Nivel a matricular:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm validate[required]" name="sl_nivelMatricular" id="sl_nivelMatricular">
                        <option value="<?php echo $this->infoEstudiante[0]['nivel']; ?>"><?php echo $this->infoEstudiante[0]['nivel']; ?></option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select> 
                </div>
                <?php
                if (($this->infoEstudiante[0]['nivel']) > 9) {
                    echo '<label for="tf_especialidad" class="col-xs-2 control-label" id="especialidadLabel">Especialidad:</label>';
                    echo '<div class="col-xs-2" id="especialidad">';
                    echo '<select class="form-control input-sm" name="tf_especialidad" id="tf_especialidad">';
                    echo '<option value="">Seleccione</option>';

                    foreach ($this->consultaEspecialidades as $value) {
                        echo "<option value='" . $value['codigoEspecialidad'] . "' ";
                        if ($this->especialidadEstudiante != NULL && $value['codigoEspecialidad'] == $this->especialidadEstudiante[0]['cod_especialidad'])
                            echo "selected";
                        ?> > <?php
                        echo $value['nombreEspecialidad'] . "</option>";
                    }

                    echo '</select>';
                    echo '</div>';
                }else {
                    echo '<label for="tf_especialidad" class="col-xs-2 control-label" id="especialidadLabel" style="display:none;">Especialidad:</label>';
                    echo '<div class="col-xs-2" id="especialidad" style="display:none;">';
                    echo '<select class="form-control input-sm" name="tf_especialidad" id="tf_especialidad">';
                    echo '<option value="">Seleccione</option>';

                    foreach ($this->consultaEspecialidades as $value) {
                        echo "<option value='" . $value['codigoEspecialidad'] . "' ";
                        if ($this->especialidadEstudiante != NULL && $value['codigoEspecialidad'] == $this->especialidadEstudiante[0]['cod_especialidad'])
                            echo "selected";
                        ?> > <?php
                        echo $value['nombreEspecialidad'] . "</option>";
                    }

                    echo '</select>';
                    echo '</div>';
                }
                ?>
            </div>
            <!--L23 Adecuacion y Becas (Formulario Hugo)-->
            <div class="form-group"> 
                <div class="col-xs-offset-4"></div>
                <?php
                if ($this->infoAdelanta != null) {
                    echo '<label for="tf_adelanta" class="col-xs-2 control-label" id="sl_adelantaLabel">Adelanta:</label>';
                    echo '<div class="col-xs-2">';
                    echo '<select class="form-control input-sm" name="sl_adelanta" id="sl_adelanta">';
                    echo '<option value="si" selected>Si</option>';
                    echo '<option value="no">No</option>';
                    echo '</select>';
                    echo '</div>';
                } else {
                    echo '<label for="tf_adelanta" class="col-xs-2 control-label" id="sl_adelantaLabel">Adelanta:</label>';
                    echo '<div class="col-xs-2">';
                    echo '<select class="form-control input-sm" name="sl_adelanta" id="sl_adelanta">';
                    echo '<option value="si">Si</option>';
                    echo '<option value="no" selected>No</option>';
                    echo '</select>';
                    echo '</div>';
                }
                ?>
            </div>
            <!--L24 Poliza (Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_poliza" class="col-xs-2 control-label">N° de póliza:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm" name="tf_poliza" id="tf_poliza" value='<?php if ($this->polizaEstudiante != null) echo $this->polizaEstudiante[0]['numero_poliza']; ?>'/>
                </div>
                <label for="tf_polizaVence" class="col-xs-2 control-label">Fecha Vencimiento:</label>
                <div class="col-xs-2">
                    <input type="text" class="form-control input-sm" name="tf_polizaVence" id="tf_polizaVence" value='<?php if ($this->polizaEstudiante != null) echo $this->polizaEstudiante[0]['fecha_vence']; ?>'/>
                </div>
                <div class="col-xs-4">
                    &nbsp;
                </div>
            </div>
            <br><br>
            <!--L26 Imprimir y Guardar (Formulario Hugo)-->
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="submit" class="btn btn-primary" id="guardar" value="Guardar e Imprimir" />
                </div>
            </div>
        </fieldset>
    </form>
</div>