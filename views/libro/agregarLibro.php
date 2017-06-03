<?php
//print_r($this->especialidadEstudiante);
//die;
?>
<div class="row">
    <form id="MyForm" action="<?php echo URL; ?>matricula/guardarNuevoIngreso" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <legend class="text-center">DATOS DEL ESTUDIANTE</legend>
            <!--L1 Cedula y Genero *Nacionalidad (Nuevo)(Formulario Hugo)-->
            <div class="form-group"> 
                <label for="tf_nacionalidad" class="col-xs-2 control-label">Nacionalidad:</label>
                <div class="col-xs-2">
                    <select class="form-control input-sm" name="tf_nacionalidad" id="tf_nacionalidad">
                        <option value="506">COSTA RICA</option>
                        <?php
                        foreach ($this->consultaPaises as $value) {
                            echo "<option value='" . $value['codigoPais'] . "'>";
                            echo $value['nombrePais']."</option>";
                        }
                            ?>
                        </select> 
                    </div>
                    <label for="tf_cedulaEstudiante" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaEstudiante" id="tf_cedulaEstudiante"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarEstudiante" value="Buscar"  style="display:block;"/>
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
                <!--L4 Telefono y email *Tel.Casa (Nuevo)(Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telHabitEstudiante" class="col-xs-2 control-label">Tel. Habitación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitEstudiante" id="tf_telHabitEstudiante"/>
                    </div>
                    <label for="tf_telcelular" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelular" id="tf_telcelular"/>
                    </div>
                    <label for="tf_email" class="col-xs-2 control-label">Email:</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="email" name="tf_email" id="tf_email" data-error="Atención, esta dirección de email es invalida"/>
                    </div>
                </div>
                <!--L5 Domicilio (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_domicilio" class="col-xs-2 control-label">Domicilio:</label>
                    <div class="col-xs-10">
                        <textarea class="form-control validate[required]" rows="1" name="tf_domicilio" id="tf_domicilio"></textarea>
                    </div>
                    <div class="col-xs-4"></div>
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
                <!--L8 Enfermedad (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_enfermedad" class="col-xs-2 control-label">¿Padece alguna enfermedad?</label>
                    <div class="col-xs-2">
                        <select  class="form-control input-sm" name="sel_enfermedad" id="sel_enfermedad"> 
                            <option value="0" selected>No</option> 
                            <option value="1">Sí</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_enfermedadDescripcion" id="tf_enfermedadDescripcion"  style="display:none;"/>
                    </div>
                </div>
                <br><br>
                <!--L7 Primaria (Formulario Hugo)-->
                <h4>Primaria</h4>
                <div class="form-group">
                    <label for="slt_provinciaPrim" class="col-xs-2 control-label">Provincia:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="slt_provinciaPrim" id="slt_provinciaPrim">
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
                    <label for="slt_cantonPrim" class="col-xs-2 control-label">Canton:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="slt_cantonPrim" id="slt_cantonPrim">
                        
                        </select>
                    </div>
                    <label for="slt_distritoPrim" class="col-xs-2 control-label">Distrito:</label>
                    <div class="col-xs-2">
                        <select  class="form-control input-sm" name="slt_distritoPrim" id="slt_distritoPrim">  
                        
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="slt_primaria" class="col-xs-2 control-label">Escuela:</label>
                    <div class="col-xs-3">
                        <select  class="form-control input-sm" name="tf_primaria" id="tf_primaria"> 
                            <option value="0">--OTRA--</option>
                        </select>
                    </div>
                </div>
                <br><br>
                <legend class="text-center">DATOS DEL HOGAR</legend>
                <h4>Madre</h4>
                <!--L13 Cedula de la Madre (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_cedulaMadre_NI" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaMadre_NI" id="tf_cedulaMadre_NI"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarMadre_NI" value="Buscar" />
                    </div>
                </div> 
                <!--L14 Nombre de la Madre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1Madre_NI" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Madre_NI" name="tf_ape1Madre_NI"/>
                    </div>
                    <label for="tf_ape2Madre_NI" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Madre_NI" name="tf_ape2Madre_NI"/>
                    </div>
                    <label for="tf_nombreMadre_NI" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombreMadre_NI" name="tf_nombreMadre_NI"/>
                    </div> 
                </div> 
                <!--L15 Telefonos y Ocupación de la Madre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telCasaMadre" class="col-xs-2 control-label">Tel. Habitación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaMadre" id="tf_telCasaMadre"/>
                    </div>
                    <label for="tf_telCelMadre" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelMadre" id="tf_telCelMadre"/>
                    </div>
                    <label for="tf_ocupacionMadre" class="col-xs-2 control-label">Ocupación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_ocupacionMadre" id="tf_ocupacionMadre"/>
                    </div> 
                </div>

                <h4>Padre</h4>
                <!--L16 Cedula del Padre (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_cedulaPadre_NI" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm " name="tf_cedulaPadre_NI" id="tf_cedulaPadre_NI"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarPadre_NI" value="Buscar" />
                    </div>
                </div> 
                <!--L17 Nombre del Padre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1Padre_NI" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape1Padre_NI" name="tf_ape1Padre_NI"/>
                    </div>
                    <label for="tf_ape2Padre_NI" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2Padre_NI" name="tf_ape2Padre_NI"/>
                    </div>
                    <label for="tf_nombrePadre_NI" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_nombrePadre_NI" name="tf_nombrePadre_NI"/>
                    </div> 
                </div> 
                <!--L18 Telefonos y Ocupación del Padre (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telCasaPadre" class="col-xs-2 control-label">Tel. Habitación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCasaPadre" id="tf_telCasaPadre"/>
                    </div>
                    <label for="tf_telCelPadre" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telCelPadre" id="tf_telCelPadre"/>
                    </div>
                    <label for="tf_ocupacionPadre" class="col-xs-2 control-label">Ocupación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_ocupacionPadre" id="tf_ocupacionPadre"/>
                    </div> 
                </div>

                <h4>Encargado Legal</h4>
                <!--L9 Cedula y parentesco* del encargado legal (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_parentesco" class="col-xs-2 control-label">Parentesco:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="sel_parentesco" id="sel_parentesco_NI">
                            <option value="">Seleccione</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Otro">Otro</option>
                        </select> 
                    </div>
                    <label for="tf_cedulaEncargado_NI" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaEncargado_NI" id="tf_cedulaEncargado_NI"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarEncargado_NI" value="Buscar" />
                    </div>
                </div> 
                <!--L10 Nombre del encargado legal (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1Encargado_NI" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="tf_ape1Encargado_NI" name="tf_ape1Encargado_NI"/>
                    </div>
                    <label for="tf_ape2Encargado_NI" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm"  id="tf_ape2Encargado_NI" name="tf_ape2Encargado_NI"/>
                    </div>
                    <label for="tf_nombreEncargado_NI" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]"  id="tf_nombreEncargado_NI" name="tf_nombreEncargado_NI"/>
                    </div> 
                </div> 
                <!--L11 Telefono Habitacion y celular (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telHabitEncargado" class="col-xs-2 control-label">Tel. Habitación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitEncargado" id="tf_telHabitEncargado"/>
                    </div>
                    <label for="tf_telcelularEncargado" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelularEncargado" id="tf_telcelularEncargado"/>
                    </div>
                </div>
                <!--L12 Ocupación y email (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ocupacionEncargado" class="col-xs-2 control-label">Ocupación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[required]" name="tf_ocupacionEncargado" id="tf_ocupacionEncargado"/>
                    </div>
                    <label for="tf_emailEncargado" class="col-xs-2 control-label">Email:</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="tf_emailEncargado" id="tf_emailEncargado"/>
                    </div>
                </div>

                <h4>En caso de emergencia llamar a</h4>
                <!--L19 Cedula Persona En Caso de Emergencia (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_parentescoCasoEmergencia" class="col-xs-2 control-label">Parentesco:</label>
                    <div class="col-xs-2">
                        <select  class="form-control input-sm validate[required]" name="sel_parentescoCasoEmergencia" id="sel_parentescoCasoEmergencia_NI"> 
                            <option value="">Seleccione</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <label for="tf_cedulaPersonaEmergencia_NI" class="col-xs-2 control-label">Identificación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]" name="tf_cedulaPersonaEmergencia_NI" id="tf_cedulaPersonaEmergencia_NI"/>
                    </div>
                    <div class="col-xs-2">
                        <input type="button" class="btn-sm btn-success" id="buscarPersonaEmergencia_NI" value="Buscar" />
                    </div>
                </div> 
                <!--L20 Nombre de la Persona En Caso de Emergencia (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_ape1PersonaEmergencia_NI" class="col-xs-2 control-label">1er apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_ape1PersonaEmergencia_NI" name="tf_ape1PersonaEmergencia_NI"/>
                    </div>
                    <label for="tf_ape2PersonaEmergencia_NI" class="col-xs-2 control-label">2do apellido:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm"  id="tf_ape2PersonaEmergencia_NI" name="tf_ape2PersonaEmergencia_NI"/>
                    </div>
                    <label for="tf_nombrePersonaEmergencia_NI" class="col-xs-2 control-label">Nombre completo:</label>
                    <div class="col-xs-2">
                        <input type="text" class="text-uppercase form-control input-sm validate[required]"  id="tf_nombrePersonaEmergencia_NI" name="tf_nombrePersonaEmergencia_NI"/>
                    </div> 
                </div> 
                <!--L21 Telefonos de la Persona En Caso de Emergencia (Formulario Hugo)-->
                <div class="form-group">
                    <label for="tf_telHabitPersonaEmergencia" class="col-xs-2 control-label">Tel. Habitación:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telHabitPersonaEmergencia" id="tf_telHabitPersonaEmergencia"/>
                    </div>
                    <label for="tf_telcelularPersonaEmergencia" class="col-xs-2 control-label">Tel. Celular:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm validate[custom[number]]" name="tf_telcelularPersonaEmergencia" id="tf_telcelularPersonaEmergencia"/>
                    </div>
                </div>
                <br><br>
                <legend class="text-center">DATOS DE LA INSTITUCIÓN</legend>
                <!--L22 Nivel a Matricular, Condicion, Adelanto (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_nivelMatricular" class="col-xs-2 control-label">Nivel a matricular:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="sl_nivelMatricular" id="sl_nivelMatricular">
                            <option value="">Seleccione</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> 
                    </div>
                    <label for="tf_condicion" class="col-xs-2 control-label">Condición:</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm validate[required]" name="sl_condicion" id="sl_condicion">
                            <option value="">Seleccione</option>
                            <option value="Regular">Regular</option>
                            <option value="Repite">Repite</option>
                        </select> 
                    </div>
                    <label for="tf_especialidad" class="col-xs-2 control-label" id="especialidadLabel" style="display:none;">Especialidad:</label>
                    <div class="col-xs-2" id="especialidad" style="display:none;">
                        <select class="form-control input-sm" name="tf_especialidad" id="tf_especialidad">
                            <option value="">Seleccione</option>
                            <?php
                            foreach ($this->consultaEspecialidades as $value) {
                            echo "<option value='" . $value['codigoEspecialidad'] . "'>" . $value['nombreEspecialidad']."</option>";
                            }
                           ?>
                        </select>
                    </div>
                </div>
                <!--L24 Poliza (Formulario Hugo)-->
                <div class="form-group"> 
                    <label for="tf_poliza" class="col-xs-2 control-label">N° de póliza:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_poliza" id="tf_poliza"/>
                    </div>
                    <label for="tf_polizaVence" class="col-xs-2 control-label">Fecha Vencimiento:</label>
                    <div class="col-xs-2">
                        <input type="text" class="form-control input-sm" name="tf_polizaVence" id="tf_polizaVence"/>
                    </div>
                    
                    <div class="col-xs-2">
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