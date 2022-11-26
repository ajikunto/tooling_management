<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Header Image (will shown randomly)</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php echo $this->session->flashdata('msg-h'); ?>
              <form class="form-horizontal" action="<?php echo base_url('users/upload_header'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="FormControlFile">Upload Header image :</label>
                  <input type="file" name="filedoc" class="form-control-file" id="FormControlFile" required>
                  <div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                </div>
              </form>
              <div class="card-body table-responsive p-0">
                <table id="userTable" class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>File</th>
                      <th>Uploaded</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($header_data) : ?>
                      <?php foreach ($header_data as $k => $v) : ?>
                        <tr>
                          <td><?php echo $v['id']; ?></td>
                          <td><img class="img-size-50" src="<?= base_url('user/img/' . $v['file']);?>" alt="Picture"></td>
                          <td><?php echo date("j M y (g:ia)", strtotime($v['created'])); ?></td>
                          <td>
                            <a href="<?php echo base_url('users/delete_header/' . $v['id']) ?>" title="Delete image" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-lg-8">
          <div class="row">
            <!-- table start below -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Edit My Profile </h3>
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
              <!-- /.card-header -->
              <form role="form" action="<?php base_url('users/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php echo validation_errors(); ?>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $user_data['username'] ?>" autocomplete="off" readonly>
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
                        <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Leave the password field empty if you don't want to change.
                        </div>
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
                  </div>
                  <div class="box-footer">
                    <div>
                      <a href="<?php echo base_url('home') ?>" class="btn btn-secondary float-left">Home</a>
                      <button type="submit" class="btn btn-primary float-right">Update My profile</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- About Me Box -->
            <div class="card card-primary card-outline">
              <div class="row">
                <div class="col-md-6">
                  <div class="text-center">
                    <img class="img-fluid img-circle" src="<?php if (empty($user_data['foto'])) {
                                                              echo base_url('user/img/user-default.png');
                                                            } else {
                                                              echo base_url('user/' . $user_data['foto']);
                                                            } ?>" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $user_data['firstname'];
                                                            echo (' ');
                                                            echo $user_data['lastname']; ?></h3>

                  <hr>
                </div>
                <div class="col-md-6">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <form class="form-horizontal" action="<?php echo base_url('users/do_upload'); ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="FormControlFile">
                          <?php if (empty($user_data['foto'])) {
                            echo 'Upload profile picture :';
                          } else {
                            echo 'Change my picture :';
                          } ?>
                        </label>
                        <input type="file" name="filedoc" class="form-control-file" id="FormControlFile" required>
                        <div>
                          <button type="submit" class="btn btn-primary">Upload</button>
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