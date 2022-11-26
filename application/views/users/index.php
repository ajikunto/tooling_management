<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Users
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
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
        <div class="col">
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

          <!-- table start below -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <?php if (in_array('createUser', $user_permission)) : ?>
                  <a href="<?php echo base_url('users/create') ?>" class="btn btn-outline-secondary btn-sm">Add New User</a>
                <?php endif; ?>
                <?php if (in_array('createGroup', $user_permission)) : ?>
                  <a href="<?php echo base_url('groups/create') ?>" class="btn btn-outline-secondary btn-sm">Add New Group</a>
                <?php endif; ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table id="userTable" class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Pict</th>
                    <th>Username</th>
                    <th>Dept</th>
                    <th>Name</th>
                    <th>Last Login</th>
                    <th>Group Level Auth</th>
                    <?php if (in_array('deleteUser', $user_permission)) : ?>
                      <th>Action</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($userlist) : ?>
                    <?php foreach ($userlist as $k => $v) : ?>
                      <tr>
                        <td><img class="img-size-50 mr-3 img-circle" src="<?php if (empty($v['user_info']['foto'])) {
                                                                            echo base_url('user/img/user-default.png');
                                                                          } else {
                                                                            echo base_url('user/' . $v['user_info']['foto']);
                                                                          } ?>" alt="User profile picture"></td>
                        <td><?php echo $v['user_info']['username']; ?></td>
                        <td><?php echo $v['user_info']['dept']; ?></td>
                        <td><?php echo $v['user_info']['firstname'] . ' ' . $v['user_info']['lastname']; ?></td>
                        <td><?php echo date("j M y (g:ia)", strtotime($v['user_info']['last_login'])); ?></td>
                        <td><?php echo $v['user_group']['group_name']; ?></td>
                        <?php if (in_array('deleteUser', $user_permission)) : ?>
                          <td>
                            <a href="<?php echo base_url('users/reset/' . $v['user_info']['id']) ?>" title="Reset user password" class="btn btn-outline-secondary btn-sm"><i class="fa fa-undo"></i></a>
                            <a href="<?php echo base_url('users/edit/' . $v['user_info']['id']) ?>" title="Edit user data" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('users/delete/' . $v['user_info']['id']) ?>" title="Delete user" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash"></i></a>
                          </td>
                        <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>

        <!-- /.card -->
      </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->