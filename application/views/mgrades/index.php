<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Material Grade used for Tooling
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Material</button>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Material Grade List</li>
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
                    <th>Grade Name</th>
                    <th>Description</th>
                    <th>Standard</th>
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


<!-- create brand modal -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Grade</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" action="<?php echo base_url('mgrades/create') ?>" method="post" id="createForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="grade_name">Grade Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter grade name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" class="form-control" id="desc" name="desc" placeholder="Enter description" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="standard">Standard</label>
            <input type="text" class="form-control" id="standard" name="standard" placeholder="Standard" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
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
        <h4 class="modal-title">Edit material grade</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('mgrades/update') ?>" method="post" id="updateForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="edit_name">Grade Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter grade name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_desc">Description</label>
            <input type="text" class="form-control" id="edit_desc" name="edit_desc" placeholder="Enter description" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_standard">Standard</label>
            <input type="text" class="form-control" id="edit_standard" name="edit_standard" placeholder="Standard" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="edit_status">Status</label>
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
        <h4 class="modal-title">Remove Grade</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('mgrades/remove') ?>" method="post" id="removeForm">
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
  $("#element-menu").addClass('menu-open');
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'mgrades/fetchMgradeData',
      'dom': 'Bfrtip',
      'responsive': true,
      'autoWidth': false,
      'iDisplayLength': 25,
      'buttons': ['copy', 'excel', 'csv', 'pdf', 'print']
    });

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

  });

  // edit function
  function editFunc(id) {
    $.ajax({
      url: base_url + 'mgrades/fetchMgradeDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {

        $("#edit_name").val(response.name);
        $("#edit_desc").val(response.descript);
        $("#edit_standard").val(response.standard);
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
            mgrade_id: id
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