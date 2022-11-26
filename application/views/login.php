<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AAS P&E | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo">
      <b>P&E</b>-AAS
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in, to start your session</p>
        <?php echo validation_errors(); ?>
        <?php if (!empty($errors)) {
          echo $errors;
        } ?>
        <form action="<?php echo base_url('auth/login') ?>" method="post">
          <div class="input-group mb-3">
            <input type="username" class="form-control" name="username" placeholder="Username" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary float-right">Sign In <i class="fas fa-sign-in-alt"></i></button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
      <div class="card-footer text-center">
        <a href="<?php echo base_url('public_home') ?>">Or back to previous page</a>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.js"></script>

  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>