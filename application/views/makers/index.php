<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Tooling Maker / Supplier
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Maker</button>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="breadcrumb-item active">Maker List</li>
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Country</th>
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
        <h4 class="modal-title">Add New Tooling Maker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" action="<?php echo base_url('makers/create') ?>" method="post" id="createForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="model">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter maker name" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="country" autocomplete="off">
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
        <h4 class="modal-title">Edit Maker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('makers/update') ?>" method="post" id="updateForm">
        <div class="modal-body">

          <div class="form-group">
            <label for="model">Name</label>
            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Enter maker name" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" id="edit_address" name="edit_address" placeholder="Address" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control" id="edit_phone" name="edit_phone" placeholder="Phone No" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="name">Country</label>
            <input type="text" class="form-control" id="edit_country" name="edit_country" placeholder="country" autocomplete="off">
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
        <h4 class="modal-title">Remove Maker</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <form role="form" action="<?php echo base_url('makers/remove') ?>" method="post" id="removeForm">
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

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'makers/fetchMakerData',
      'responsive': true,
      'autoWidth': false,
      'iDisplayLength': 25,
    });
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

  // edit function
  function editFunc(id) {
    $.ajax({
      url: base_url + 'makers/fetchMakerDataById/' + id,
      type: 'post',
      dataType: 'json',
      success: function(response) {
        $("#edit_name").val(response.maker_name);
        $("#edit_address").val(response.address);
        $("#edit_phone").val(response.phone);
        $("#edit_country").val(response.country);
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
            maker_id: id
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