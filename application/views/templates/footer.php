<!-- Main Footer -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="sidebar">
        <nav class="mt">
            <ul class="navbar-nav p-2">
                <h5>Advance Menu <i class="fas fa-key"></i></h5>
                <li class="nav-item">
                    <a href="<?= base_url('home'); ?>" class="nav-link">
                        <p><i class="fas fa-home"></i> Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('reports'); ?>" class="nav-link">
                        <p><i class="far fa-chart-bar"></i> Monthly Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('built'); ?>" class="nav-link">
                        <p><i class="fa fa-cog"></i> Built Part Numbers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('share_tool'); ?>" class="nav-link">
                        <p><i class="fa fa-cogs"></i> All Part Numbers (Share)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('bin'); ?>" class="nav-link">
                        <p><i class="fa fa-trash"></i> Deleted Toolings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('shapes'); ?>" class="nav-link">
                        <p><i class="fas fa-scroll"></i> Tooling Type
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('mgrades'); ?>" class="nav-link">
                        <p><i class="fas fa-scroll"></i> Material List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('makers'); ?>" class="nav-link">
                        <p><i class="far fa-edit"></i> Suppliers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('customers'); ?>" class="nav-link">
                        <p><i class="far fa-edit"></i> Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('backup'); ?>" class="nav-link">
                        <p><i class="fas fa-save"></i> Backup Database
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('log'); ?>" class="nav-link">
                        <p><i class="far fa-edit"></i> Activity Log
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- /.control-sidebar -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <!-- To the right -->

        <!-- Default to the left -->
        <strong>Copyright &copy; 2022-<?php echo date('Y'); ?> PT. APM ARMADA SUSPENSION</a>.</strong> All rights reserved.
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>

</body>

</html>