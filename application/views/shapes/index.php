<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Tooling Type | Jig | Dies List


            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Type</button>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Tooling Type List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small Card (Stat card) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table id="manageTable" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Shape Initial</th>
                    <th>Shape Name</th>
                    <th>Application</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="uploadModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Tooling Drawing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('shapes/do_upload'); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="label_id">ID:</label>
                <input type="text" name="label_id" class="form-control" id="label_id" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="label_init">Type :</label>
                <input type="text" name="label_init" class="form-control" id="label_init" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="label_part">Name :</label>
                <input type="text" name="label_part" class="form-control" id="label_part" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="label_appli">Application:</label>
                <input type="text" name="label_appli" class="form-control" id="label_appli" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="label_name">Current linked drawing file:</label>
                <input type="text" name="label_name" class="form-control" id="label_name" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="FormControlFile">Replace or New Drawing here :</label>
                <input type="file" name="filedoc" class="form-control-file" id="FormControlFile" required>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- create brand modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Shape</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" action="<?php echo base_url('shapes/create') ?>" method="post" id="createForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="init">Shape / Form initial</label>
            <input type="text" class="form-control" id="init" name="init" placeholder="Enter initial" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="name">Shape / Form name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="appli">Application</label>
            <select class="form-control" id="appli" name="appli">
              <option value="Coil Spring">Coil Spring</option>
              <option value="U-Bolt">U-Bolt</option>
            </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit material grade modal -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Shape</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('shapes/update') ?>" method="post" id="updateForm">
        <div class="modal-body">

          <div class="form-group">
            <label for="edit_init">Shape / Form initial</label>
            <input type="text" class="form-control" id="edit_init" name="edit_init" placeholder="Enter Shape / Form inital" autocomplete="off" readonly>
          </div>

          <div class="form-group">
            <label for="edit_name">Shape / Form Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter Shape / Form name" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="appli">Application</label>
            <select class="form-control" id="edit_appli" name="edit_appli">
              <option value="Coil Spring">Coil Spring</option>
              <option value="U-Bolt">U-Bolt</option>
            </select>
          </div>

          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="edit_status" name="edit_status">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- remove grade modal -->
<div class="modal fade" id="removeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remove Shape</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('shapes/remove') ?>" method="post" id="removeForm">
        <div class="modal-body">
          <p>Do you really want to remove ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--create function-->
<script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {
    $("#element-menu").addClass('menu-open');
    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'shapes/fetchShapeData',
      'responsive': true,
      'autoWidth': false,
      'iDisplayLength': 25,
      buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
      dom: 'Btip',
    });
  });

  //upload form function:
  function drwUpload(id) {
    $.ajax({
      url: base_url + 'shapes/labelDeleteById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {
        $("#label_id").val(response.id);
        $("#label_init").val(response.init);
        $("#label_part").val(response.name);
        $("#label_appli").val(response.appli);
        $("#label_name").val(response.dwg_file);
      }
    });
  }

  // submit the create from 
  $("#createForm").unbind('submit').on('submit', function() {
    var form = $(this);

    // remove the text-danger
    $(".text-danger").remove();

    $.ajax({
      url: form.attr('action'),
      type: form.attr('method'),
      data: form.serialize(), // /converting the form data into array and sending it to server
      dataType: 'json',
      success: function(response) {
        manageTable.ajax.reload(null, false);
        if (response.success === true) {
          // hide the modal
          $("#addModal").modal('hide');
          // reset the form
          $("#createForm")[0].reset();
          $("#createForm .form-group").removeClass('has-error').removeClass('has-success');
          //SweetAlert2 notification
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 8000
            });
            $(function() {
              Toast.fire({
                icon: 'success',
                title: response.messages
              })
            });
          });
        } else {
          if (response.messages instanceof Object) {
            $.each(response.messages, function(index, value) {
              var id = $("#" + index);
              id.closest('.form-group')
                .removeClass('has-error')
                .removeClass('has-success')
                .addClass(value.length > 0 ? 'has-error' : 'has-success');
              id.after(value);

            });
          } else {
            //SweetAlert2 notification
            $(function() {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000
              });
              $(function() {
                Toast.fire({
                  icon: 'error',
                  title: response.messages
                })
              });
            });
          }
        }
      }
    });

    return false;
  });

  // edit function
  function editFunc(id) {
    $.ajax({
      url: base_url + 'shapes/fetchShapeDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {
        $("#edit_init").val(response.init);
        $("#edit_name").val(response.name);
        $("#edit_appli").val(response.appli);
        $("#edit_status").val(response.status);

        // submit the edit from 
        $("#updateForm").unbind('submit').bind('submit', function() {
          var form = $(this);

          // remove the text-danger
          $(".text-danger").remove();

          $.ajax({
            url: form.attr('action') + '/' + id,
            type: form.attr('method'),
            data: form.serialize(), // /converting the form data into array and sending it to server
            dataType: 'json',
            success: function(response) {
              manageTable.ajax.reload(null, false);
              if (response.success === true) {
                // hide the modal
                $("#editModal").modal('hide');
                // reset the form
                $("#createForm")[0].reset();
                $("#createForm .form-group").removeClass('has-error').removeClass('has-success');
                //SweetAlert2 notification
                $(function() {
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 8000
                  });
                  $(function() {
                    Toast.fire({
                      icon: 'success',
                      title: response.messages
                    })
                  });
                });
              } else {
                if (response.messages instanceof Object) {
                  $.each(response.messages, function(index, value) {
                    var id = $("#" + index);
                    id.closest('.form-group')
                      .removeClass('has-error')
                      .removeClass('has-success')
                      .addClass(value.length > 0 ? 'has-error' : 'has-success');
                    id.after(value);

                  });
                } else {
                  //SweetAlert2 notification
                  $(function() {
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 8000
                    });
                    $(function() {
                      Toast.fire({
                        icon: 'error',
                        title: response.messages
                      })
                    });
                  });
                }
              }
            }
          });

          return false;
        });

      }
    });
  }

  // remove functions 
  function removeFunc(id) {
    if (id) {
      $("#removeForm").on('submit', function() {

        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: {
            shape_id: id
          },
          dataType: 'json',
          success: function(response) {
            manageTable.ajax.reload(null, false);
            // hide the modal
            $("#removeModal").modal('hide');
            if (response.success === true) {
              //SweetAlert2 notification
              $(function() {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 8000
                });
                $(function() {
                  Toast.fire({
                    icon: 'success',
                    title: response.messages
                  })
                });
              });
            } else {
              $(function() {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 8000
                });
                $(function() {
                  Toast.fire({
                    icon: 'error',
                    title: response.messages
                  })
                });
              });
            }
          }
        });

        return false;
      });
    }
  }
</script>