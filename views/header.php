<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title><?= (isset($this->title)) ? $this->title : ''; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo URL; ?>public/css/smoothness/jquery-ui-1.8.24.custom.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo URL; ?>public/css/jQueryValidationEngine/validationEngine.jquery.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo URL; ?>public/css/jQueryValidationEngine/template.css">

        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui-1.8.24.custom.min.js"></script>        
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQueryValidationEngine/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQueryValidationEngine/languages/jquery.validationEngine-es.js"></script>

<!--<script src="<?php echo URL; ?>public/js/jquery-1.11.1.js"></script>-->
        <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="<?php echo URL; ?>public/js/hora.js"></script>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
            }
        }
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                //validar campos       
                jQuery("#MyForm").validationEngine();
                //mostrar mensaje    
                //$(".mensajes").show();
                //$('#datetime').jTime();
            });
        </script> 
    </head>
  <body>
<?php Session::init(); 
 ?>
            <!--Si esta logeded-->
            <!--Menu-->
<?php if (Session::get('loggedIn') == true): ?> 
                <div class="row">
                    <div class="col-xs-12">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL; ?>index/index">Inicio</a>
                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Secciones <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?php echo URL; ?>seccion/index">Ver Sección</a></li>
                          <?php if (Session::get('tipoUsuario') < 2){ ?>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/cargarSeccionesEstudiantes">Cargar Secciones Estudiantes</a></li>
                          <?php }  ?>
                        </ul>
                      </li>
                      <?php if (Session::get('tipoUsuario') <= 3){ ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estudiantes <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?php echo URL; ?>persona/listaEstudiantes">Lista Estudiante</a></li>
                          <li class="divider"></li>
                          <?php if (Session::get('tipoUsuario') <= 2){ ?>
                          <li><a href="<?php echo URL; ?>persona/datosEstudiantes">Datos Generales Estudiantes</a></li>
                          <li><a href="<?php echo URL; ?>persona/nuevoIngresoTardio">Nuevo Ingreso</a></li>
                          <li><a href="<?php echo URL; ?>persona/expedientesEstudiantes">Expedientes de Estudiantes</a></li>
                          <li class="divider"></li>
                          <?php } if (Session::get('tipoUsuario') <= 3){ ?>
                          <li><a href="<?php echo URL; ?>persona/ingresarBeca">Ingresar beca transporte de Estudiantes</a></li>
                          <li><a href="<?php echo URL; ?>persona/listaBecas">Lista becas transporte de Estudiantes</a></li>
                          <li class="divider"></li>
                          <li><a href="<?php echo URL; ?>persona/ingresarBecaComedor">Ingresar beca comedor de Estudiantes</a></li>
                          <li><a href="<?php echo URL; ?>persona/listaBecasComedor">Lista becas comedor de Estudiantes</a></li>
                          <?php }?>
                        </ul>
                      </li>
                    <?php }?>
                      <?php if (Session::get('tipoUsuario') <= 3){ ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Matrícula <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php if (Session::get('tipoUsuario') == 1){ ?>
                            <li><a href="<?php echo URL; ?>matricula/prematricula">Pre-Matricula</a></li>
                            <li><a href="<?php echo URL; ?>matricula/listaprematricula">Lista Pre-Matricula</a></li>
                            <li class="divider"></li>
                            <?php } if (Session::get('tipoUsuario') <= 3){ ?>
                            <li><a href="<?php echo URL; ?>matricula/ratificarSetimo">Ratificar 7°</a></li>
                            <li><a href="<?php echo URL; ?>matricula/ratificar">Ratificar 8° - 12°</a></li>
                            <li><a href="<?php echo URL; ?>matricula/nuevoIngreso">Nuevo Ingreso</a></li>
                            <li><a href="<?php echo URL; ?>matricula/estudiantesMatriculados">Ver estudainte matriculados</a></li>
                            <?php }?>
                            <?php if (Session::get('tipoUsuario') <= 2){ ?>
                            <li class="divider"></li>
                            <li><a href="<?php echo URL; ?>matricula/estudiantesMatriculadosSinGrupo">Matriculados Sin Grupo Asignado</a></li>
                            <li><a href="<?php echo URL; ?>estadistica/matriculaInicialSegunEdad">Matricula Inicial Segun Edad</a></li>
                            <li><a href="<?php echo URL; ?>estadistica/matriculaInicialSegunRepitencia">Matricula Inicial Segun Repitencia</a></li>
                            <li><a href="<?php echo URL; ?>estadistica/matriculaInicialSegunModalidad">Matricula Inicial Segun Modalidad</a></li>
                            <li><a href="<?php echo URL; ?>estadistica/lugarDeResidencia">Estadistica Lugar De Residencia</a></li>
                            <li><a href="<?php echo URL; ?>matricula/resumenCondicionEstudiantes">Resumen Condición Estudiantes</a></li>
                            <li><a href="<?php echo URL; ?>estadistica/estudiantesExtrangeros">Estudiantes extrangeros</a></li>
                            <?php }?>
                        </ul>
                      </li>
                    <?php }?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ausencias <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <?php if (Session::get('tipoUsuario') <= 2){ ?>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/cargarAusencias">Cargar Ausencias</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/verAusencias">Ver Ausencias</a></li>
                          <?php } if (Session::get('tipoUsuario') == 4){ ?>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/consultarAusencias">Consultar Ausencias</a></li>
                          <?php } ?>
                        </ul>
                      </li>
                    <?php if (Session::get('tipoUsuario') == 1){ ?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administrador <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/ingresarPersonal">Ingresar Personal</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/listaEstudiantesEspecialidad">Lista de Estudiantes Matriculados</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/proyeccionMatricula">Proyección</a></li>
                          <li><a href="<?php echo URL; ?>seccion/indexConfigSecciones">Configuración Secciones</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/cargaEstudiantesSeccion">Carga Estudiantes-Seccion</a></li>
                            <li class="divider"></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/index">Actualizar cédulas BD</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/actuPasswordEstu">Reiniciar contraseñas Estudaintes</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/actuPasswordDocente">Reiniciar contraseñas Docente</a></li>
                          <li><a href="<?php echo URL; ?>actualizarestudiantes/estudiantesVoca">Estudiantes Voca</a></li>
                            <li class="divider"></li>
                          <li><a href="<?php echo URL; ?>persona/modificarCedulaEstudiante">Modificar cédula de estudiante</a></li>
                          <li><a href="<?php echo URL; ?>configSistema/index">Configuración del Sistema</a></li>
                        </ul>
                      </li>
                    <?php }?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $_SESSION['nombre']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Editar perfil</a></li>
                            <li><a href="<?php echo URL; ?>dashboard/logout">Salir</a></li>
                        </ul>
                     </li>
                    </ul>
                  </div>
                </div>
              </nav>
                    </div>
                </div>
                <!--Si no esta loged-->
<?php else: ?>
                <div class="row">
                    <div class="col-xs-12">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL; ?>index/index">Inicio</a>
                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li><a href="<?php echo URL; ?>login">Iniciar Sesión</a></li>
                    </ul>
                  </div>
                </div>
              </nav>
                    </div>
                </div>
<?php endif; ?>
                <br><br><br>
            <!--Contenido para mostrar todas las paginas-->
            <div class="row">
                <div class="col-xs-1"></div>
                <div class="col-xs-1">
                    <img src="<?php echo URL; ?>public/img/logoEmpresa.png" alt="Logo Empresa" class="img-rounded pull-left img-responsive">
                </div>
                <div class="col-xs-8 text-center">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Aplicación bla bla bla</h1>
                            <h4><p class="text-success">Colegio Técnico Profesional de Carrizal, Dirección Regional de Alajuela Circuito -01-</p></h4>
                            <h4><p class="text-succes">Telefax: 2483-0055</p></h4>
                            <!--<label id="datetime" size="50"></label>-->
                        </div>
                    </div>
                </div>
                <div class="col-xs-1">
                    <img src="<?php echo URL; ?>public/img/logoctpcarrizal.png" alt="Logo CTPC" class="img-rounded pull-right img-responsive">
                </div>
                <div class="col-xs-1"></div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    