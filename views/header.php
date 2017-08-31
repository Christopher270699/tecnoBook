<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title><?= (isset($this->title)) ? $this->title : ''; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap-flatly.css">
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
            jQuery(document).ready(function () {
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Libro <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php if (Session::get('tipoUsuario') < 1) { ?>
                                                <li><a href="<?php echo URL; ?>libro/agregarLibro">Agregar Libro</a></li>
                                                <li><a href="<?php echo URL; ?>libro/cargarLibros">Lista de Libros</a></li>
                                            <?php } ?>
                                            <?php if (Session::get('tipoUsuario') >= 1) { ?>
                                                <li><a href="<?php echo URL; ?>libroNormal/cargarLibros">Lista de Libros</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solicitud <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php if (Session::get('tipoUsuario') > 0) { ?>
                                                <li><a href="<?php echo URL; ?>solicitud/agregarSolicitud">Agregar Solicitud</a></li>
                                                <li><a href="<?php echo URL; ?>solicitud/cargarSolicitud">Lista de Solicitudes</a></li>
                                            <?php } ?>
                                            <?php if (Session::get('tipoUsuario') < 1) { ?>
                                                <li><a href="<?php echo URL; ?>solicitud/cargarSolicitud">Aceptar Solicitud</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php if (Session::get('tipoUsuario') < 1) { ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuario <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL; ?>usuario/agregarUsuario">Agregar Usuario</a></li>
                                                <li><a href="<?php echo URL; ?>usuario/cargarUsuario">Lista de Usuarios</a></li>
                                                <?php if (Session::get('tipoUsuario') < 2) { ?>
                                                    <li><a href="<?php echo URL; ?>actualizarestudiantes/cargarSeccionesEstudiantes">Cargar Secciones Estudiantes</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Préstamo <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php if (Session::get('tipoUsuario') < 1) { ?>
                                                <li><a href="<?php echo URL; ?>factura/agregarFactura">Agregar Préstamo</a></li>
                                                <li><a href="<?php echo URL; ?>factura/cargarFactura">Lista de Préstamos</a></li>
                                            <?php } ?>
                                            <?php if (Session::get('tipoUsuario') >= 1) { ?>
                                                <li><a href="<?php echo URL; ?>facturaNormal/cargarFacturaNormal">Mis Préstamos</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Multa <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php if (Session::get('tipoUsuario') < 1) { ?>
                                                <li><a href="<?php echo URL; ?>multa/cargarMulta">Lista de Multas</a></li>
                                            <?php } ?>
                                            <?php if (Session::get('tipoUsuario') >= 1) { ?>
                                                <li><a href="<?php echo URL; ?>multaNormal/cargarMultaNormal">Mis Multas</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contacto <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php echo URL; ?>contacto/acercaDe">Acerca de Nosotros...</a></li>
                                            <li><a href="<?php echo URL; ?>contacto/sugerencia">Enviar Sugerencia</a></li>
                                        </ul>
                                    </li>
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
            <div class="col-xs-1">

            </div>
            <div class="col-xs-1">
                <br>
                <img src="<?php echo URL; ?>public/img/IconoTecnoBook.jpg" alt="Logo Empresa" class="img-rounded pull-left img-responsive">
            </div>
            <div class="col-xs-8 text-center">
                <div class="row">
                    <div class="col-xs-12">
                        <h1><strong>TECNO-BOOK</strong></h1>
                        <h4><p class="text-success">Colegio Técnico Profesional de Carrizal, Dirección Regional de Alajuela Circuito -01-</p></h4>
                        <h4><p class="text-success">Telefax: 2483-0055</p></h4>
                        <!--<label id="datetime" size="50"></label>-->
                    </div>
                </div>
            </div>
            <div class="col-xs-1">
                <br>
                <img src="<?php echo URL; ?>public/img/logoctpcarrizal.png" alt="Logo CTPC" class="img-rounded pull-right img-responsive">
            </div>
            <div class="col-xs-1"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
