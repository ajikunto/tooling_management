<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-gray card-tabs">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Tooling Master List
                            </h3>
                        </div>
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">Mandrels</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-seat-tab" data-toggle="pill"
                                        href="#custom-tabs-one-seat" role="tab" aria-controls="custom-tabs-one-seat"
                                        aria-selected="false">Coil Seats</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-grr-tab" data-toggle="pill"
                                        href="#custom-tabs-one-grr" role="tab" aria-controls="custom-tabs-one-grr"
                                        aria-selected="false">Guide Rollers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-other-tab" data-toggle="pill"
                                        href="#custom-tabs-one-other" role="tab" aria-controls="custom-tabs-one-other"
                                        aria-selected="false">Other Toolings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="card-body">
                                        <div class="card-body table-responsive p-0">
                                            <p>Advance Filter Range (Find Suitable mandrel) :</p>
                                            <table cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label for="min">A-side (from):</label>
                                                            <input class="form-control" type="text" id="min" name="min"
                                                                style="width: 75%;" placeholder="Min...">
                                                        </td>
                                                        <td>
                                                            <label for="min2">B-side (from):</label>
                                                            <input class="form-control" type="text" id="min2"
                                                                name="min2" style="width: 75%;" placeholder="Min...">
                                                        </td>
                                                        <td>
                                                            <label for="min3">a | GI A (from):</label>
                                                            <input class="form-control" type="text" id="min3"
                                                                name="min3" style="width: 75%;" placeholder="Min...">
                                                        </td>
                                                        <td>
                                                            <label for="min4">b | GI B (from):</label>
                                                            <input class="form-control" type="text" id="min4"
                                                                name="min4" style="width: 75%;" placeholder="Min...">
                                                        </td>
                                                        <td>
                                                            <label for="shape">Shape :</label>
                                                            <input class="form-control" type="text" id="shape"
                                                                name="shape" style="width: 75%;" placeholder="Shape">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="max">A-side (to):</label>
                                                            <input class="form-control" type="text" id="max" name="max"
                                                                style="width: 75%;" placeholder="Max...">
                                                        </td>
                                                        <td>
                                                            <label for="max2">B-side (to):</label>
                                                            <input class="form-control" type="text" id="max2"
                                                                name="max2" style="width: 75%;" placeholder="Max...">
                                                        </td>
                                                        <td>
                                                            <label for="max3">a | GI A (to):</label>
                                                            <input class="form-control" type="text" id="max3"
                                                                name="max3" style="width: 75%;" placeholder="Max...">
                                                        </td>
                                                        <td>
                                                            <label for="max4">b | GI B (to):</label>
                                                            <input class="form-control" type="text" id="max4"
                                                                name="max4" style="width: 75%;" placeholder="Max...">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <table id="tableTool" class="table table-sm table-striped projects">
                                                <thead>
                                                    <tr>
                                                        <th>Part No</th>
                                                        <th style="width: 8%;">Shape</th>
                                                        <th>Side A</th>
                                                        <th>Side B</th>
                                                        <th>a | GI A</th>
                                                        <th>b | GI B</th>
                                                        <th>Rack</th>
                                                        <th style="width: 5%;">Line</th>
                                                        <th>Customer</th>
                                                        <th>Built PN</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th>Rev</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-seat" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-seat-tab">
                                    <div class="card-body">
                                        <div class="card-body table-responsive p-0">
                                            <table id="tableSeat" class="table table-sm table-striped projects">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 8%;">Type</th>
                                                        <th>Process</th>
                                                        <th>Size A</th>
                                                        <th>Size B</th>
                                                        <th>Turn</th>
                                                        <th>Pitch</th>
                                                        <th>Rack</th>
                                                        <th style="width: 5%;">Line</th>
                                                        <th>Customer</th>
                                                        <th>Built PN</th>
                                                        <th>Status</th>
                                                        <th>Rev</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-grr" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-grr-tab">
                                    <div class="card-body">
                                        <div class="card-body table-responsive p-0">
                                            <table id="tableGRR" class="table table-sm table-striped projects">
                                                <thead>
                                                    <tr>
                                                        <th>Shape</th>
                                                        <th>Process</th>
                                                        <th>Radius</th>
                                                        <th>Width</th>
                                                        <th>Rack</th>
                                                        <th style="width: 5%;">Line</th>
                                                        <th>Customer</th>
                                                        <th>Built PN</th>
                                                        <th>Status</th>
                                                        <th>Rev</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-other" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-other-tab">
                                    <div class="card-body">
                                        <div class="card-body table-responsive p-0">
                                            <table id="tableOther" class="table table-sm table-striped projects">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Process</th>
                                                        <th>D1</th>
                                                        <th>Width</th>
                                                        <th>Rack</th>
                                                        <th style="width: 5%;">Line</th>
                                                        <th>Customer</th>
                                                        <th>Built PN</th>
                                                        <th>Status</th>
                                                        <th>Rev</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";

/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
    var min = parseFloat($('#min').val());
    var max = parseFloat($('#max').val());
    var dim = parseFloat(data[2]) || 0; // use data for the dim column (2)

    if (
        (isNaN(min) && isNaN(max)) ||
        (isNaN(min) && dim <= max) ||
        (min <= dim && isNaN(max)) ||
        (min <= dim && dim <= max)

    ) {
        return true;
    }
    return false;
});

$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

    var min2 = parseFloat($('#min2').val());
    var max2 = parseFloat($('#max2').val());
    var dim2 = parseFloat(data[3]) || 0; // use data for the dim column (3)

    if (
        (isNaN(min2) && isNaN(max2)) || (isNaN(min2) && dim2 <= max2) || (min2 <= dim2 && isNaN(max2)) || (
            min2 <= dim2 && dim2 <= max2)
    ) {
        return true;
    }
    return false;
});

$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

    var min3 = parseFloat($('#min3').val());
    var max3 = parseFloat($('#max3').val());
    var dim3 = parseFloat(data[4]) || 0; // use data for the dim column (4)

    if (
        (isNaN(min3) && isNaN(max3)) || (isNaN(min3) && dim3 <= max3) || (min3 <= dim3 && isNaN(max3)) || (
            min3 <= dim3 && dim3 <= max3)
    ) {
        return true;
    }
    return false;
});

$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

    var min4 = parseFloat($('#min4').val());
    var max4 = parseFloat($('#max4').val());
    var dim4 = parseFloat(data[5]) || 0; // use data for the dim column (4)

    if (
        (isNaN(min4) && isNaN(max4)) || (isNaN(min4) && dim4 <= max4) || (min4 <= dim4 && isNaN(max4)) || (
            min4 <= dim4 && dim4 <= max4)
    ) {
        return true;
    }
    return false;
});

$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {

var shape = $('#shape').val();
var result_shape = data[1] || ''; // use data for the dim column (4)

if (
    shape == '' || shape == result_shape
) {
    return true;
}
return false;
});

$(document).ready(function() {
    // Setup - add a text input to each header cell
    $('#tableTool thead tr').clone(true).appendTo('#tableTool thead');
    $('#tableTool thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-info" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tableTool.column(i).search() !== this.value) {
                tableTool
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });

    tableTool = $('#tableTool').DataTable({
        ajax: base_url + 'public_home/showMandrels',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 100,
        dom: 'itp'
    });
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup(function() {
        tableTool.draw();
    });
    $('#min2, #max2').keyup(function() {
        tableTool.draw();
    });
    $('#min3, #max3').keyup(function() {
        tableTool.draw();
    });
    $('#min4, #max4').keyup(function() {
        tableTool.draw();
    });
    $('#shape').keyup(function() {
        tableTool.draw();
    });
})

$(document).ready(function() {
    // Setup - add a text input to each header cell
    $('#tableSeat thead tr').clone(true).appendTo('#tableSeat thead');
    $('#tableSeat thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tableSeat.column(i).search() !== this.value) {
                tableSeat
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tableSeat = $('#tableSeat').DataTable({
        ajax: base_url + 'public_home/showSeats',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
    });
})

$(document).ready(function() {
    // Setup - add a text input to each header cell
    $('#tableGRR thead tr').clone(true).appendTo('#tableGRR thead');
    $('#tableGRR thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tableGRR.column(i).search() !== this.value) {
                tableGRR
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tableGRR = $('#tableGRR').DataTable({
        ajax: base_url + 'public_home/showGRRs',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
    });
})

$(document).ready(function() {
    // Setup - add a text input to each header cell
    $('#tableOther thead tr').clone(true).appendTo('#tableOther thead');
    $('#tableOther thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tableOther.column(i).search() !== this.value) {
                tableOther
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tableOther = $('#tableOther').DataTable({
        ajax: base_url + 'public_home/showOthers',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
    });
})
</script>