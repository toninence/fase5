<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="<?= base_url('public/dist/img/logo.png'); ?>">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->renderSection('head'); ?>
        <link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css'); ?>">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css'); ?>">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class='navbar-nav ml-auto'>
                    <li class="nav-item d-none d-sm-inline-block">
                        <h2><?= isset($pagina) ? $pagina : '' ?></h2>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <img src="<?php echo base_url('public/dist/img/avatar/').'/'.session('avatar'); ?>" alt="Avatar"
                                class="img-size-32 img-circle mr-3">
                            <span class="d-none d-lg-inline"><?= session()->nombre." ".session()->apellido; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                            <a href="./perfil" class="dropdown-item">
                                <i class="fas fa-user mr-2"></i>Mis Datos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./suscripcion" class="dropdown-item">
                                <i class="fas fa-medal mr-2"></i>Mi Suscripción
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="./logout" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="<?= base_url('public/dist/img/logo.png'); ?>" alt="Fase 5 logo"
                        class="brand-image elevation-3" style="opacity: .8; background-color:white;">
                    <span class="brand-text font-weight-light">Fase 5</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="<?= base_url('public/dist/img/avatar/').'/'.session('avatar'); ?>" class="img-circle elevation-2"
                                alt="Avatar">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?= session()->nombre." ".session()->apellido; ?></a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('inicio'); ?>" class="nav-link inicio">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('reservas'); ?>" class="nav-link reservas">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>Reservas</i></p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('clientes'); ?>" class="nav-link clientes">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Registro de Clientes</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('comercios'); ?>" class="nav-link comercios">
                                    <i class="nav-icon fas fa-store"></i>
                                    <p>Comercios</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('empleados'); ?>" class="nav-link empleados">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>Empleados</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('mesas'); ?>" class="nav-link mesas">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>Mesas</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('turnos'); ?>" class="nav-link turnos">
                                    <i class="nav-icon fas fa-hourglass-half"></i>
                                    <p>Turnos</p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url('localidades'); ?>" class="nav-link localidades">
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <p>Localidades</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            <?= $this->renderSection('contenido') ?>
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Versión</b> 1.0
                </div>
                <strong>Hecho por <a href="https://serendipia.com.ar" target="_blank">Serendipia</a></strong>
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <script src="<?= base_url('public/plugins/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('public/dist/js/adminlte.min.js'); ?>"></script>
        <script src="<?= base_url('public/dist/js/demo.js'); ?>"></script>
        <script>
            let url = window.location.pathname
            /* en hosting */
            /* url = url.substr(1) */
            /* en local */
            url = url.split('/')
            url = url[url.length-1]
            let menu = document.querySelector(`.${url}`)
            menu.classList.add('bg-success')
        </script>
        <?php $this->renderSection('footer'); ?>
    </body>
</html>