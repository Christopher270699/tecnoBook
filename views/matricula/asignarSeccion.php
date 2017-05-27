<div class="row">
    <div class="col-xs-12">
        <h2>Datos del Estudiante</h2>
    </div>
    
    <div class="col-xs-12">
        <table class="table table-condensed" id="tablaRatificar">
            <tr>
                <th>Identificación</th>
                <th>Nombre del estudiante</th>
                <th>Nivel</th>
                <th>Genero</th>
                <th>Fecha Nacimiento</th>
                <th>Domicilio</th>
            </tr>
            <?php
            foreach ($this->datosEstudiante as $lista => $value) {
                echo '<tr>';
                echo '<td>';
                echo $value['cedula'];
                echo '</td>';
                echo '<td>';
                echo $value['apellido1'] . ' ' . $value['apellido2'] . ' ' . $value['nombre'];
                echo '</td>';
                echo '<td>';
                echo $value['nivel'];
                echo '</td>';
                echo '<td>';
                if($value['sexo']==0){
                    echo 'Mujer';
                }else{
                    echo 'Hombre';
                }
                echo '</td>';
                echo '<td>';
                echo $value['fechaNacimiento'];
                echo '</td>';
                echo '<td>';
                echo $value['domicilio'];
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <div class="col-xs-12">
        <h2>Asignar Sección</h2>
    </div>
    
    <div class="col-xs-12">
        <form id="MyForm" action="<?php echo URL; ?>matricula/guardarAsignarSeccion" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                 <label for="sl_NivelesAsignarSeccion" class="col-xs-2 control-label">Nivel:</label>
                 <div class="col-xs-2">
                     <select class="form-control input-sm validate[required]" name="sl_NivelesAsignarSeccion" id="sl_NivelesAsignarSeccion">
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

                 <label for="sl_GruposAsignarSeccion" class="col-xs-2 control-label">Grupo:</label>
                 <div class="col-xs-2">
                     <select class="form-control input-sm validate[required]" name="sl_GruposAsignarSeccion" id="sl_GruposAsignarSeccion">
                     </select>
                 </div>

                 <label for="sl_SubGruposAsignarSeccion" class="col-xs-2 control-label">SubGrupo:</label>
                 <div class="col-xs-2">
                     <select class="form-control input-sm validate[required]" name="sl_SubGruposAsignarSeccion" id="sl_SubGruposAsignarSeccion">
                     </select>
                 </div>
                 <br />
                 <br />
             </div>
            
            <div class="form-group"> 
                <div class="col-xs-12 text-center">
                    <input type="hidden" name="ced_estudiante" value="<?php foreach ($this->datosEstudiante as $lista => $value) {echo $value['cedula'];}?>">
                    <input type="submit" class="btn btn-primary" id="guardar" value="Guardar" />
                </div>
            </div>
            </form>
    </div>
</div>