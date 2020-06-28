<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url('dist/img/logo.png'); ?>">    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- //Agregado desde la vista -->
    <?php $this->renderSection('head'); ?>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
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
                    <h2><?php echo $title; ?></h2>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="<?php echo base_url().session('avatar'); ?>" alt="User Avatar"
                            class="img-size-32 img-circle mr-3">
                        <span class="d-none d-lg-inline"><?php echo session()->nombre." ".session()->apellido; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <i class="fas fa-user mr-2"></i>Mis Datos
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url();?>/auth/logout" class="dropdown-item">
                            <!-- Message Start -->
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesi&oacute;n
                            <!-- Message End -->
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>" class="brand-link">
                <img src="<?php echo base_url('dist/img/logo.png'); ?>" alt="Studio 16 Logo"
                    class="brand-image elevation-3" style="opacity: .8; background-color:white;">
                <span class="brand-text font-weight-light">Studio 16</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url().session('avatar'); ?>" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo session()->nombre." ".session()->apellido; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/calendar" class="nav-link">
                                        <i class="far fa-calendar-alt nav-icon"></i>
                                        <p>Calendario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/calendar" class="nav-link">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Agregar Evento</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Musicos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/Musicos" class="nav-link">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p>Listado</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/musicos/agregar" class="nav-link">
                                        <i class="fas fa-edit nav-icon"></i>
                                        <p>Agregar Musico</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-ship"></i>
                                <p>
                                    Barcos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>/Musicos" class="nav-link">
                                        <i class="far fa-list-alt nav-icon"></i>
                                        <p>Listado</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?php $this->renderSection('contenido') ?>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; <a href="https://serendipia.com.ar">Serendipia</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('/dist/js/adminlte.min.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('/dist/js/demo.js'); ?>"></script>
    <?php $this->renderSection('footer'); ?>
</body>

</html>