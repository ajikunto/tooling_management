<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-md-12 col-xs-12">
          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h5><i class="icon fas fa-info"></i> Info !</h5>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-6">
          <h1>Reset selected user's password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <!-- Small Card (Stat card) -->
      <div class="row">
        <div class="col-md-10">
          <!-- table start below -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $user_data['firstname'] . ' ' . $user_data['lastname'] ?></h3>
            </div>

            <!-- /.card-header -->

            <div class="card-body">
              <div class="row">
                <div class="col mt-12">
                  <form role="form" action="<?php base_url('users/reset') ?>" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12">
                      <div class="position-relative p-1 bg-gray" style="height: 300px">
                        <div class="ribbon-wrapper ribbon-xl">
                          <div class="ribbon bg-danger text-xl">
                            Reset
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_data['username'] ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="dept">Department</label>
                            <input type="text" class="form-control" id="dept" name="dept" value="<?php echo $user_data['dept'] ?>" readonly>
                          </div>
                        </div>
                        <h4>Do you really want to reset user password ?</h4>
                        <small>(please complete the application form signed by superior before proceed.)</small>
                        <br />
                      </div>
                      <br />
                      <div class="box-footer">
                        <div>
                          <a href="<?php echo base_url('users/') ?>" class="btn btn-outline-primary float-left">Back</a>
                          <button type="submit" class="btn btn-warning float-right">Reset User</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>