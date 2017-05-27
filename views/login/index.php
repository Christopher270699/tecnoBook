<h2>Iniciar Sesión</h2>
<hr>
<div class="row">
    <div class="col-xs-2">
        <img src="public/img/inicionsesion.png" alt="Inicion Sesion" class="img-rounded pull-left img-responsive">
    </div>
    <div class="col-md-5 col-xs-9">
        <form id="MyForm" action="login/run" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>
                <div class="form-group">
                    <label for="tf_usuario" class="col-md-4 col-xs-6 control-label">Nombre Usuario:</label>
                    <div class="col-md-8 col-xs-6 ">
                        <input class="form-control input-sm validate[required]" name="tf_usuario" id="tf_usuario" placeholder="Nombre usuario" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tf_clave" class="col-md-4 col-xs-6 control-label">Contraseña:</label>
                    <div class="col-md-8 col-xs-6">
                        <input class="form-control input-sm validate[required]" name="tf_clave" id="tf_clave" placeholder="Password" type="password">
                        <a href="<?php echo URL; ?>login/recuperarClave">Olvidó su password?</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-8 col-xs-offset-4">
                        <button class="btn btn-default">Cancelar</button>
                        <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!--Cierre de col-xs-5-->
    <div class="col-md-5 col-xs-1"></div>
</div>
