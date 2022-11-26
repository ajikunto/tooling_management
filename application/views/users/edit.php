<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>Edit selected User</h1>
        </div>
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-error alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <!-- Small Card (Stat card) -->
      <div class="col-md-12">
        <!-- table start below -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit a User</h3>
          </div>

          <!-- /.card-header -->
          <form role="form" action="<?php base_url('users/edit') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Info !</h5>
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="groups">Groups</label>
                    <select class="form-control" id="groups" name="groups">
                      <option value="">Select Groups</option>
                      <?php foreach ($group_data as $k => $v) : ?>
                        <option value="<?php echo $v['id'] ?>" <?php if ($user_group['id'] == $v['id']) {
                                                                  echo 'selected';
                                                                } ?>><?php echo $v['group_name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="dept">Department</label>
                    <select class="form-control" id="dept" name="dept">
                      <option value="<?php echo $user_data['dept'] ?>" selected><?php echo $user_data['dept'] ?></option>
                      <option value="IMS">IMS</option>
                      <option value="PRD-CS">Prod CS</option>
                      <option value="PRD-UB">Prod UB</option>
                      <option value="PPCD">PPCD</option>
                      <option value="WAREHOUSE">Warehouse</option>
                      <option value="RND">R&D</option>
                      <option value="QA">QA</option>
                      <option value="PNE">P&E</option>
                      <option value="MAINT">Maintenance</option>
                      <option value="HR">HRD/GA</option>
                      <option value="SALES">Sales/MKT</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?php echo $user_data['firstname'] ?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?php echo $user_data['lastname'] ?>" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="cpassword">Confirm password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      Leave the password empty, if you don't want to change it.
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <div>
                  <a href="<?php echo base_url('users/') ?>" class="btn btn-secondary float-left">Back</a>
                  <button type="submit" class="btn btn-primary float-right">Update User</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>