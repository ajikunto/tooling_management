<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Share Tooling List
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i
                                    class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active">Share Tooling List</li>
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
                                <table id="shareTable" class="table-sm table m-0">
                                    <thead>
                                        <tr>
                                            <th>Part Number</th>
                                            <th>Shape</th>
                                            <th>Size A</th>
                                            <th>Size B</th>
                                            <th>a</th>
                                            <th>b</th>
                                            <th>Rack</th>
                                            <th>Line</th>
                                            <th>Customer</th>
                                            <th>Built Part Number</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Rev</th>
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
<!-- /.content-wrapper -->

<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Share P/N</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>

            <form role="form" action="<?php echo base_url('toolings/editShare') ?>" method="post" id="editForm">
                <div class="card-body">
                    <div class="form-group">
                        <label for="edit_id">ID</label>
                        <input type="text" class="form-control" id="edit_id" name="edit_id" readonly />
                    </div>
                    <div class="form-group">
                        <label for="edit_built_pn">Built P/N</label>
                        <input type="text" class="form-control" id="edit_built_pn" name="edit_built_pn" readonly />
                    </div>
                    <div class="form-group">
                        <label for="edit_product">Product</label>
                        <input type="text" class="form-control" id="edit_product" name="edit_product" />
                    </div>
                    <div class="form-group">
                        <label for="edit_share_pn">Part No</label>
                        <input type="text" class="form-control" id="edit_share_pn" name="edit_share_pn" />
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url('share_tool') ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary float-sm-right">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Revision history -->
<div class="modal fade" id="recordModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Revision records</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                        onclick="tutupTable()">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- /.modal -->
                <div class="card-header border-transparent">
                    <table id="tableRec" class="table m-0 p-0">
                        <thead>
                            <tr>
                                <th>Rev</th>
                                <th>Reason of Revision</th>
                                <th>By</th>
                                <th>Rev Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- remove record modal -->
<div class="modal fade" id="removeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Remove a Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" action="<?php echo base_url('toolings/delShare'); ?>" method="post" id="removeForm">
                <div class="modal-body">
                    <p>Do you really want to remove the selected item ?</p>
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

<!--create function-->
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";

var tabelku;

function recordFunc(id) {
    var tool_id = id;
    tabelku = $('#tableRec').DataTable({
        ajax: base_url + 'toolings/view_record/' + tool_id,
        responsive: true,
        autoWidth: false,
        dom: 'tp',
    });
}

function tutupTable() {
    tabelku.destroy();
}

$(document).ready(function() {
    $('#shareTable thead tr').clone(true).appendTo('#shareTable thead');
    $('#shareTable thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (shareTable.column(i).search() !== this.value) {
                shareTable
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

    // initialize the datatable 
    shareTable = $('#shareTable').DataTable({
        'ajax': base_url + 'share_tool/fetchShare',
        'responsive': true,
        'autoWidth': false,
        'iDisplayLength': 100,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });
});

function editFunc(id) {
    $.ajax({
        url: base_url + 'toolings/fetchShareDataById/' + id,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $("#edit_id").val(response.id);
            $("#edit_built_pn").val(response.built_pn);
            $("#edit_product").val(response.product);
            $("#edit_share_pn").val(response.share_pn);
            // submit the edit from 
            $("#editForm").unbind('submit').bind('submit', function() {
                var form = $(this);

                // remove the text-danger
                $(".text-danger").remove();

                $.ajax({
                    url: form.attr('action') + '/' + id,
                    type: form.attr('method'),
                    data: form
                        .serialize(), // /converting the form data into array and sending it to server
                    dataType: 'json',
                    success: function(response) {
                        //manageTable.ajax.reload(null, true);
                        shareTable.ajax.reload(null, false);
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

                            // hide the modal
                            $("#editModal").modal('hide');
                            // reset the form 
                            $("#editForm .form-group").removeClass('has-error')
                                .removeClass('has-success');

                        } else {

                            if (response.messages instanceof Object) {
                                $.each(response.messages, function(index, value) {
                                    var id = $("#" + index);

                                    id.closest('.form-group')
                                        .removeClass('has-error')
                                        .removeClass('has-success')
                                        .addClass(value.length > 0 ?
                                            'has-error' : 'has-success');

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
                                            title: response
                                                .messages
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

function removeFunc(id) {
    if (id) {
        $.ajax({
            url: base_url + 'toolings/labelDeleteByShareId/' + id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $("#label_delete").val(response.share_pn + '. [from built p/n: ' + response.built_pn +
                    '].');

                $("#removeForm").on('submit', function() {
                    var form = $(this);
                    $(".text-danger").remove();
                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: {
                            id: id,
                            share_pn: response.share_pn
                        },
                        dataType: 'json',
                        success: function(response) {
                            //manageTable.ajax.reload(null, false);
                            shareTable.ajax.reload(null, false);
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
</script>