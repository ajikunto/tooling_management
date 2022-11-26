<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo $page_title; ?></title>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Font Awesome harus dipakai-->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">

    <!-- New DataTables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/datatables.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/css/buttons.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/ColReorder-1.5.2/css/colReorder.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/KeyTable-2.5.2/css/keyTable.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/Responsive-2.2.5/css/responsive.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/RowGroup-1.1.2/css/rowGroup.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/SearchPanes-1.1.1/css/searchPanes.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/Select-1.3.1/css/select.bootstrap4.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/plugins/DataTables/FixedHeader-3.1.7/css/dataTables.fixedHeader.min.css" />

    <!-- SweetAlert2 -->
    <script src="<?= base_url('assets') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.js"></script>

    <!-- New datatable -->
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/datatables.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/jQuery-3.3.1/jquery-3.3.1.js"></script> -->
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/JSZip-2.5.0/jszip.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/DataTables-1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/buttons.flash.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/buttons.html5.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Buttons-1.6.2/js/buttons.print.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/ColReorder-1.5.2/js/dataTables.colReorder.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/KeyTable-2.5.2/js/dataTables.keyTable.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Responsive-2.2.5/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/RowGroup-1.1.2/js/dataTables.rowGroup.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/SearchPanes-1.1.1/js/dataTables.searchPanes.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/SearchPanes-1.1.1/js/searchPanes.bootstrap4.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/Select-1.3.1/js/dataTables.select.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/plugins/DataTables/FixedHeader-3.1.7/js/dataTables.fixedHeader.min.js"></script>

    <!-- ChartJS -->
    <script src="<?= base_url('assets') ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets') ?>/plugins/moment/moment.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="<?= base_url('assets') ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-white navbar-light">
            <div class="container-fluid">
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- User Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <?php
                        $session_data = $this->session->userdata();
                        if ($session_data['logged_in'] == TRUE) : ?>
                            <!-- User Login -->
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <h5><i class="fas fa-user"></i></h5>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                                <a href="<?= base_url('users/profile'); ?>" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                My Profile
                                                <span class="float-right text-sm text-warning"><i class="fas fa-address-card"></i></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Log-Off
                                                <span class="float-right text-sm text-muted"><i class="fas fa-sign-out-alt"></i></span>
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                            </div>
                        <?php endif ?>
                    </li>

                    <?php
                    $session_data = $this->session->userdata();
                    if ($session_data['logged_in'] == TRUE) : ?>
                        <li class="nav-item">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <?php
                        $session_data = $this->session->userdata();
                        if ($session_data['logged_in'] == true) : ?>
                            <div class="widget-user-header text-white" style="background: url('<?= base_url('user/img/') . $session_data['head_img'] ?>') center center;">
                                <h3 class="widget-user-username text-center">TOOLING MANAGEMENT</h3>
                                <h5 class="widget-user-desc text-center">P&E Departement</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= base_url('assets') ?>/dist/APM.png" alt="APM">
                            </div>
                        <?php endif ?>
                        <?php
                        $session_data = $this->session->userdata();
                        if ($session_data['logged_in'] == false) : ?>
                            <div class="widget-user-header text-white" style="background: url('<?= base_url('assets') ?>/dist/steel.jpg') center center;">
                                <h3 class="widget-user-username text-center">TOOLING MANAGEMENT</h3>
                                <h5 class="widget-user-desc text-center">P&E Departement</h5>

                                <h4 class="float-sm-right">
                                    <a href="<?= base_url('auth/login'); ?>" class="btn btn-outline-secondary btn-sm"> Sign In <i class="fas fa-key"></i></a>
                                </h4>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?= base_url('assets') ?>/dist/APM.png" alt="APM">
                            </div>
                        <?php endif ?>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        </div>