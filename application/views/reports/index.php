<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Monthly Department Report
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>"><i
                                    class="fa fa-dashboard"></i> Home</a></li>
                        <li class="breadcrumb-item active">Report List</li>
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
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Tooling Development</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <canvas id="tooling-chart" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box">
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
                    <div class="small-box">
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
                    <div class="small-box">
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
                    <div class="small-box">
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="reportTable" class="table-sm table m-0">
                                    <thead>
                                        <tr>
                                            <th>Activity</th>
                                            <th>Month</th>
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

<!--create function-->
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
$(document).ready(function() {
    $('#reportTable thead tr').clone(true).appendTo('#reportTable thead');
    $('#reportTable thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 60%" />'
        );
        $('input', this).on('keyup change', function() {
            if (reportTable.column(i).search() !== this.value) {
                reportTable
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    reportTable = $('#reportTable').DataTable({
        'ajax': base_url + 'reports/fetchReport',
        'responsive': true,
        'autoWidth': false,
        'iDisplayLength': 25,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp'
    });
});
</script>
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
$(document).ready(function() {

    $('.counter-count').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
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

$(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#tooling-chart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [<?php
          foreach ($graph_toolingThis as $data) {
            echo "'" . $data->bulan . "',";
          }
          ?>],
      datasets: [
        {
          label               : 'Last Year',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php
          foreach ($graph_toolingLast as $data) {
            echo "'" . $data->new_tool . "',";
          }
          ?>]
        },
        {
          label               : 'This Year',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
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
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
  })
</script>