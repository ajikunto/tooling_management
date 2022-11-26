<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard -Tooling Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-block bg-gradient-primary" data-toggle="modal"
                            data-target="#addModal"><i class="fas fa-search"></i> Find Suitable Mandrel</button>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="counter-count"><?= $total_built; ?></h3>

                            <p>Toolings (Built Part Numbers)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('built'); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                            <h3 class="counter-count"><?= $total_share; ?></h3>

                            <p>Total Part Numbers (Share Tooling)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('share_tool'); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 class="counter-count"><?= $total_shape; ?></h3>

                            <p>Tooling Type</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('shapes'); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="counter-count"><?= $total_revise; ?><sup style="font-size: 20px">x</sup></h3>

                            <p>Tooling Update / Revise / Edit</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('log'); ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"><i class="fas fa-exclamation-triangle text-xl text-warning"></i> To be Followed Up</h3>
                            <div class="card-tools">
                                <a href="<?= base_url('built'); ?>" class="btn btn-tool btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="tblDev" class="table table-sm table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Part No</th>
                                        <th>Shape</th>
                                        <th>Rack</th>
                                        <th>Customer</th>
                                        <th>Built PN</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"><i class="fas fa-info text-xl text-danger"></i> Removed Tooling</h3>
                            <div class="card-tools">
                                <a href="<?= base_url('bin'); ?>" class="btn btn-tool btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table id="binTable" class="table table-sm table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Part No</th>
                                        <th>Shape</th>
                                        <th>Rack</th>
                                        <th>Customer</th>
                                        <th>Built PN</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <!-- /.col-md-6 -->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title"><i class="far fa-chart-bar text-xl text-info"></i> Tooling Development</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <canvas id="tooling-chart" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"><i class="fas fa-chart-pie text-xl text-info"></i> Activity Statistic</h3>
                            <div class="card-tools">
                                <a href="<?= base_url('log'); ?>" class="btn btn-tool btn-sm">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($statistic) : ?>
                            <?php foreach ($statistic as $k => $v) : ?>
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <?php
                                        if ($v['log_tipe'] == '0') {
                                            echo 
                                            '<p class="text-success text-xl"><i class="fa fa-users"></i></p>
                                                <p class="d-flex flex-column text-right">
                                                <span class="font-weight-bold">'.$v['Percentage'] .' %</span>
                                                <span class="text-muted">User Login</span>
                                            </p>';
                                        } elseif ($v['log_tipe'] == '1') {
                                            echo
                                            '<p class="text-info text-xl"><i class="fa fa-user"></i></p>
                                                <p class="d-flex flex-column text-right">
                                                <span class="font-weight-bold">'.$v['Percentage'] .' %</span>
                                                <span class="text-muted">User Logout</span>
                                            </p>';
                                        } elseif ($v['log_tipe'] == '2') {
                                            echo 
                                            '<p class="text-info text-xl"><i class="fa fa-plus"></i></p>
                                                <p class="d-flex flex-column text-right">
                                                <span class="font-weight-bold">'.$v['Percentage'] .' %</span>
                                                <span class="text-muted">Add New Tooling</span>
                                            </p>';
                                        } elseif ($v['log_tipe'] == '3') {
                                            echo 
                                            '<p class="text-warning text-xl"><i class="fas fa-edit"></i></p>
                                                <p class="d-flex flex-column text-right">
                                                <span class="font-weight-bold">'.$v['Percentage'] .' %</span>
                                                <span class="text-muted">Edit/Revise Tooling</span>
                                            </p>';
                                        } elseif ($v['log_tipe'] == '4') {
                                            echo 
                                            '<p class="text-danger text-xl"><i class="fas fa-trash"></i></p>
                                            <p class="d-flex flex-column text-right">
                                            <span class="font-weight-bold">'.$v['Percentage'] .' %</span>
                                            <span class="text-muted">Remove Tooling</span>
                                            </p>';
                                        }
                                        ?>
                            </div>
                            <?php endforeach ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- create new tooling modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Find Suitable Mandrel <small>( Advance Filter Range )</small></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="card-body p-0">

                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table cellspacing="2" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="min">A-side (from):</label>
                                            <input class="form-control" type="text" id="min" name="min"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="min2">B-side (from):</label>
                                            <input class="form-control" type="text" id="min2" name="min2"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="min3">a | GI A (from):</label>
                                            <input class="form-control" type="text" id="min3" name="min3"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="min4">b | GI B (from):</label>
                                            <input class="form-control" type="text" id="min4" name="min4"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="shape">Shape :</label>
                                            <input class="form-control" type="text" id="shape" name="shape"
                                                style="width: 75%;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="max">A-side (to):</label>
                                            <input class="form-control" type="text" id="max" name="max"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="max2">B-side (to):</label>
                                            <input class="form-control" type="text" id="max2" name="max2"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="max3">a | GI A (to):</label>
                                            <input class="form-control" type="text" id="max3" name="max3"
                                                style="width: 75%;">
                                        </td>
                                        <td>
                                            <label for="max4">b | GI B (to):</label>
                                            <input class="form-control" type="text" id="max4" name="max4"
                                                style="width: 75%;">
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
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>

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
    tableTool = $('#tableTool').DataTable({
        ajax: base_url + 'public_home/showMandrels',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 7,
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
</script>

<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
$(document).ready(function() {

    $('.counter-count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2500,
            easing: 'swing',
            step: function(now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    $('#binTable').DataTable({
        'ajax': base_url + 'bin/fetchDashboard',
        'responsive': true,
        'autoWidth': false,
        dom: 'tp',
    });

    $('#tblDev').DataTable({
        'ajax': base_url + 'toolings/tblDev',
        'responsive': true,
        'autoWidth': false,
        dom: 'tp',
    });
});

$(function() {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#tooling-chart').get(0).getContext('2d')

    var areaChartData = {
        labels: [<?php
          foreach ($graph_toolingThis as $data) {
            echo "'" . $data->bulan . "',";
          }
          ?>],
        datasets: [{
                label: 'Last Year',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [<?php
          foreach ($graph_toolingLast as $data) {
            echo "'" . $data->new_tool . "',";
          }
          ?>]
            },
            {
                label: 'This Year',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?php
          foreach ($graph_toolingThis as $data) {
            echo "'" . $data->new_tool . "',";
          }
          ?>]
            },
        ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#tooling-chart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })
})
</script>