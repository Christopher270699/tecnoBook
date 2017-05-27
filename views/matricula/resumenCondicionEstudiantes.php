<div class="row">
    <div class="col-xs-12">
        <h2>Condición Final de los Estudiantes</h2>
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
            <br />
            <br />
        </div>
    </div>
</div>

<div class="row">
    <table class="table table-condensed" id="listaEstudiantes">
        <thead><tr><th>Genero</th><th>Cantidad</th></tr></thead>
        <tbody><?php
                    $repitentesMujer=0;
                    $repitentesHombres=0;
                    foreach ($this->resumenCondicionEstudiantes as $value) {
                        if($value['sexo']==0){
                            $repitentesMujer++;
                        }else{
                            $repitentesHombres++;
                        }
                    }
                    
                ?>
            <tr>
                <td>
                    Mujeres
                </td>
                <td>
                    <?php echo $repitentesMujer; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Hombres
                </td>
                <td>
                    <?php echo $repitentesHombres; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>