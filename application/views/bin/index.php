<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Deleted Tooling List
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i
                                    class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active">Removed Tooling List</li>
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
                            <div class="table-responsive">
                                <table id="binTable" class="table-sm table m-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th>Built PN</th>
                                            <th>Shape</th>
                                            <th>Rack</th>
                                            <th>Size A</th>
                                            <th>Size B</th>
                                            <th>Material</th>
                                            <th style="width: 3%;">Line</th>
                                            <th>Status</th>
                                            <th>Date Deleted</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
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
<!-- remove record modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Permanent Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" action="<?php echo base_url('toolings/del'); ?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>Do you really want to Delete the selected item ?</p>
                    <input type="text" class="form-control is-warning" id="label_delete" name="label_delete" readonly />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- restre modal -->
<div class="modal fade" id="restoreModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Restore Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" action="<?php echo base_url('toolings/restore'); ?>" method="post" id="restoreForm">
                <div class="modal-body">
                    <p>Restore selected item to database ?</p>
                    <input type="text" class="form-control is-warning" id="label_restore" name="label_restore" readonly />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Restore</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!--create function-->
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
var manageTable
$(document).ready(function() {

    // initialize the datatable 
    manageTable = $('#binTable').DataTable({
        'ajax': base_url + 'bin/fetchBin',
        'responsive': true,
        'autoWidth': false,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });
});

function removeFunc(id) {
    if (id) {
        $.ajax({
            url: base_url + 'toolings/labelPermDeleteById/' + id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $("#label_delete").val(response.shape + '. Size ' + response.dia_A + ' For ' + response
                    .built_pn + ' (' + response.loc + ')');

                $("#removeForm").on('submit', function() {
                    var form = $(this);
                    $(".text-danger").remove();
                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: {
                            id: id,
                            loc: response.loc,
                            pn: response.built_pn
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
                                            title: response
                                                .messages
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
                                            title: response
                                                .messages
                                        })
                                    });
                                });
                            }
                        }
                    });
                    return false;
                });
            }
        });
    }
}

function restoreFunc(id) {
    if (id) {
        $.ajax({
            url: base_url + 'toolings/labelPermDeleteById/' + id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $("#label_restore").val(response.shape + '. Size ' + response.dia_A + ' For ' + response
                    .built_pn + ' (' + response.loc + ')');

                $("#restoreForm").on('submit', function() {
                    var form = $(this);
                    $(".text-danger").remove();
                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: {
                            id: id,
                            loc: response.loc,
                            pn: response.built_pn
                        },
                        dataType: 'json',
                        success: function(response) {
                            manageTable.ajax.reload(null, false);
                            // hide the modal
                            $("#restoreModal").modal('hide');
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
                                            title: response
                                                .messages
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
                                            title: response
                                                .messages
                                        })
                                    });
                                });
                            }
                        }
                    });
                    return false;
                });
            }
        });
    }
}
</script>