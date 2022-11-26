<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Database Backup
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">DB backup</li>
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
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small Card (Stat card) -->

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">System Maintenance (Back-Up database)</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-6">
              <a class="btn btn-app" href="<?= base_url('backup/backupDB'); ?>">
                <i class="fas fa-save"></i>
                Back-up Database
              </a>
            </div>
            <div class="container-fluid">
              <div class="table-responsive">
                <table id="manageTable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>File Name</th>
                      <th>Back-up Date</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {
    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'backup/fetchDBData',
      'responsive': true,
      'autoWidth': false,
      'iDisplayLength': 25,
    });
  });
</script>