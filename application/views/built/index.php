    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Built Part number List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Built Part Numbers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card disabled color-palette card-tabs">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Tooling Master List (Coil Spring)
                                </h3>
                                <h3 class="card-title float-sm-right">
                                    <button class="btn btn-block btn-default btn-sm" data-toggle="modal"
                                        data-target="#addModal">Add New Tooling (CS)</button>
                                </h3>
                                <h5 class="text-center">
                                    <cite>
                                        <?php if ($this->session->flashdata('msg-success')) : ?>
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('msg-success'); ?>
                                        </div>
                                        <?php elseif ($this->session->flashdata('msg-error')) : ?>
                                        <div class="alert alert-error alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('msg-error'); ?>
                                        </div>
                                        <?php endif; ?>
                                    </cite>
                                </h5>
                            </div>
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">Mandrel CYL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-cone-tab" data-toggle="pill"
                                            href="#custom-tabs-one-cone" role="tab" aria-controls="custom-tabs-one-cone"
                                            aria-selected="true">Mandrel Conical</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-ptl-tab" data-toggle="pill"
                                            href="#custom-tabs-one-ptl" role="tab" aria-controls="custom-tabs-one-ptl"
                                            aria-selected="true">Mandrel Pigtail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-scn-tab" data-toggle="pill"
                                            href="#custom-tabs-one-scn" role="tab" aria-controls="custom-tabs-one-scn"
                                            aria-selected="false">Mandrel Semicon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-seat-tab" data-toggle="pill"
                                            href="#custom-tabs-one-seat" role="tab" aria-controls="custom-tabs-one-seat"
                                            aria-selected="false">Coil Seat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-roller-tab" data-toggle="pill"
                                            href="#custom-tabs-one-roller" role="tab"
                                            aria-controls="custom-tabs-one-roller" aria-selected="false">End Roller</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-plate-tab" data-toggle="pill"
                                            href="#custom-tabs-one-plate" role="tab"
                                            aria-controls="custom-tabs-one-stripper" aria-selected="false">Plate
                                            (Stripper | Face)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-0">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-0">
                                                <table id="tblCYL" class="table table-sm table-striped projects m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Shape</th>
                                                            <th>Mandrel Size</th>
                                                            <th>Full Length</th>
                                                            <th>Coil Size</th>
                                                            <th>Material</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-cone" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-cone-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblCON" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Shape</th>
                                                            <th>Dia A</th>
                                                            <th>Dia B</th>
                                                            <th>L A</th>
                                                            <th>L B</th>
                                                            <th>Length</th>
                                                            <th>Coil A</th>
                                                            <th>Coil B</th>
                                                            <th>Material</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-ptl" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-ptl-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblPTL" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Shape</th>
                                                            <th>Dia A</th>
                                                            <th>Dia B</th>
                                                            <th>GI start</th>
                                                            <th>GI end</th>
                                                            <th>Length</th>
                                                            <th>Coil A</th>
                                                            <th>Coil B</th>
                                                            <th>Material</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-scn" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-scn-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblSCN" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Shape</th>
                                                            <th>Dia A</th>
                                                            <th>Dia B</th>
                                                            <th>L A</th>
                                                            <th>L B</th>
                                                            <th>Length</th>
                                                            <th>Coil A</th>
                                                            <th>Coil B</th>
                                                            <th>Material</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
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
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblSeat" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Dia A</th>
                                                            <th>Dia B</th>
                                                            <th>Turn</th>
                                                            <th>Pitch</th>
                                                            <th>Length</th>
                                                            <th>Material</th>
                                                            <th>Process</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Zone</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-roller" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-roller-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblRoll" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Dia A</th>
                                                            <th>Length</th>
                                                            <th>Material</th>
                                                            <th>Process</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Zone</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-plate" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-plate-tab">
                                        <div class="card-body">
                                            <div class="card-body table-responsive p-1">
                                                <table id="tblPlate" class="table table-sm table-striped projects">
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Dia A</th>
                                                            <th>Length</th>
                                                            <th>Material</th>
                                                            <th>Process</th>
                                                            <th>Loc</th>
                                                            <th>Line</th>
                                                            <th>Zone</th>
                                                            <th>Remark</th>
                                                            <th>Cust</th>
                                                            <th style="width: 12%;">Built PN</th>
                                                            <th>Rev</th>
                                                            <th>Status</th>
                                                            <th style="width: 6%;">Action</th>
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
    <!-- /.content-wrapper -->

    <!-- create new tooling modal -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add New Tooling - Coil Spring</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="card-body">
                    <!-- <div class="col-12 product-image-thumbs"> -->
                    <img src="" id="tool-img" class="product-image">
                    <!-- </div> -->
                </div>

                <form role="form" action="<?php echo base_url('toolings/create') ?>" method="post" id="createForm">
                    <div class="card-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="process">Process</label>
                                    <select class="form-control" id="process" name="process">
                                        <option value="Coiling">Coiling</option>
                                        <?php foreach ($proc_data as $v) : ?>
                                        <option value="<?php echo $v['pro_name'] ?>"><?php echo $v['pro_name'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="line">Line</label>
                                    <select class="form-control" id="line" name="line" onchange="myLength()">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="shape">Tooling Type</label>
                                    <select class="form-control" id="shape" name="shape" onchange="mytype()">
                                        <?php foreach ($shapeCS_data as $v) : ?>
                                        <option value="<?php echo $v['init'] ?>"><?php echo $v['init'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="lblda" for="dia_A">Diameter A (mm)</label>
                                    <input type="text" class="form-control" id="dia_A" name="dia_A" placeholder=""
                                        autocomplete="off" onchange="mydim()" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="lbldb" for="dia_B">Diameter B (mm)</label>
                                    <input type="text" class="form-control" id="dia_B" name="dia_B" placeholder=""
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label id="rack" for="loc">Rack <cite>(A123)</cite></label>
                                    <input type="text" class="form-control" id="loc" name="loc" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="lbla" for="La">Length a (mm | turn)</label>
                                    <input type="text" class="form-control" id="La" name="La" autocomplete="off"
                                        readonly />
                                    <!-- <input type="text" class="form-control" id="La" name="La" placeholder="Length a (mm|turn)" autocomplete="off" readonly /> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="lblb" for="Lb">Length b (mm | turn)</label>
                                    <input type="text" class="form-control" id="Lb" name="Lb" autocomplete="off"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="coil_A">Coil Dia A(mm)</label>
                                    <input type="text" class="form-control" id="coil_A" name="coil_A"
                                        placeholder="Spring diameter A (mm)" autocomplete="off"
                                        onchange="myCoildim()" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="coil_B">Coil Dia B(mm)</label>
                                    <input type="text" class="form-control" id="coil_B" name="coil_B"
                                        placeholder="Spring diameter B (mm)" autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="mgrade">Material Grade</label>
                                    <select class="form-control" id="mgrade" name="mgrade">
                                        <?php foreach ($mgrade_data as $v) : ?>
                                        <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="full_length">Full Length (mm)</label>
                                    <input type="text" class="form-control" id="full_length" name="full_length"
                                        placeholder="Full Length (mm)" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="zone">Zone *(AMS)</label>
                                    <input type="text" class="form-control" id="zone" name="zone" placeholder="Z1"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Customer /Project</label>
                                    <select class="form-control" id="cust" name="cust">
                                        <?php foreach ($cust_data as $v) : ?>
                                        <option value="<?php echo $v['cust_name']; ?>"><?php echo $v['cust_name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="part_no">Coil Part Number<cite class="text-danger"> *</cite></label>
                                    <input type="text" class="form-control" id="part_no" name="part_no"
                                        placeholder="Coil Spring part number" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Maker/Supplier</label>
                                    <select class="form-control" id="maker" name="maker">
                                        <?php foreach ($maker_data as $v) : ?>
                                        <option value="<?php echo $v['maker_name']; ?>"><?php echo $v['maker_name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="design" selected>Design</option>
                                        <option value="fabrication">Fabrication</option>
                                        <option value="ready">Ready</option>
                                        <option value="repair">Under Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <input type="text" class="form-control" id="product" name="product"
                                        value="Coil Spring" autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <input type="text" class="form-control" id="remark" name="remark"
                                        placeholder="Important note here" autocomplete="off"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo base_url('home') ?>" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary float-sm-right">Create</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Edit tooling modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Update Tooling Data - Coil Spring</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="card-body">
                    <div class="col-12 product-image-thumbs">
                        <img id="edit_tool-img" src="" class="product-image">
                    </div>
                </div>
                <form role="form" action="<?php echo base_url('toolings/edit') ?>" method="post" id="editForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_process">Process</label>
                                    <select class="form-control" id="edit_process" name="edit_process">
                                        <?php foreach ($proc_data as $v) : ?>
                                        <option value="<?php echo $v['pro_name'] ?>"><?php echo $v['pro_name'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_line">Line</label>
                                    <select class="form-control" id="edit_line" name="edit_line"
                                        onchange="myEditLength()">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="-">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_shape">Tooling Type</label>
                                    <select class="form-control" id="edit_shape" name="edit_shape"
                                        onchange="myEdittype()">
                                        <?php foreach ($shapeCS_data as $v) : ?>
                                        <option value="<?php echo $v['init'] ?>"><?php echo $v['init'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="edit_dia_A">Diameter A (mm)</label>
                                    <input type="text" class="form-control" id="edit_dia_A" name="edit_dia_A"
                                        placeholder="" autocomplete="off" onchange="mydim()" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="edit_dia_B">Diameter B (mm)</label>
                                    <input type="text" class="form-control" id="edit_dia_B" name="edit_dia_B"
                                        placeholder="" autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label id="edit_rack" for="edit_loc">Rack <cite>(A123)</cite></label>
                                    <input type="text" class="form-control" id="edit_loc" name="edit_loc"
                                        placeholder="Rack Location No" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="edit_lbla" for="edit_La">Length a (mm | turn)</label>
                                    <input type="text" class="form-control" id="edit_La" name="edit_La"
                                        autocomplete="off" readonly />
                                    <!-- <input type="text" class="form-control" id="La" name="La" placeholder="Length a (mm|turn)" autocomplete="off" readonly /> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="edit_lblb" for="edit_Lb">Length b (mm | turn)</label>
                                    <input type="text" class="form-control" id="edit_Lb" name="edit_Lb"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="edit_coil_A">Coil Dia A(mm)</label>
                                    <input type="text" class="form-control" id="edit_coil_A" name="edit_coil_A"
                                        placeholder="Spring diameter A (mm)" autocomplete="off"
                                        onchange="myCoildim()" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="edit_coil_B">Coil Dia B(mm)</label>
                                    <input type="text" class="form-control" id="edit_coil_B" name="edit_coil_B"
                                        placeholder="Spring diameter B (mm)" autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_mgrade">Material Grade</label>
                                    <select class="form-control" id="edit_mgrade" name="edit_mgrade">
                                        <?php foreach ($mgrade_data as $v) : ?>
                                        <option value="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="edit_full_length">Full Length (mm)</label>
                                    <input type="text" class="form-control" id="edit_full_length"
                                        name="edit_full_length" placeholder="Full Length (mm)" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_zone">Zone *(AMS)</label>
                                    <input type="text" class="form-control" id="edit_zone" name="edit_zone"
                                        placeholder="Z1" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Customer /Project</label>
                                    <select class="form-control" id="edit_cust" name="edit_cust">
                                        <?php foreach ($cust_data as $v) : ?>
                                        <option value="<?php echo $v['cust_name']; ?>"><?php echo $v['cust_name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_part_no">Coil Part Number<cite class="text-danger">
                                            *</cite></label>
                                    <input type="text" class="form-control" id="edit_part_no" name="edit_part_no"
                                        placeholder="Coil Spring part number" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Maker/Supplier</label>
                                    <select class="form-control" id="edit_maker" name="edit_maker">
                                        <?php foreach ($maker_data as $v) : ?>
                                        <option value="<?php echo $v['maker_name']; ?>"><?php echo $v['maker_name']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="edit_status" name="edit_status">
                                        <option value="design">Design</option>
                                        <option value="fabrication" selected>Fabrication</option>
                                        <option value="ready" selected>Ready</option>
                                        <option value="repair" selected>Under Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_rev">Revision</label>
                                    <input type="text" class="form-control" id="edit_rev" name="edit_rev"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="edit_rev_date">Revision Date<cite class="text-danger"> *</cite></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" name="edit_rev_date"
                                            id="edit_rev_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="prev_remark">Previous Remark</label>
                                    <input type="text" class="form-control" id="prev_remark" name="prev_remark"
                                        placeholder="Important note here" autocomplete="off" readonly></input>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="edit_remark">Revision Remark</label>
                                    <input type="text" class="form-control" id="edit_remark" name="edit_remark"
                                        placeholder="Important note here" autocomplete="off"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo base_url('home') ?>" class="btn btn-secondary">Back</a>
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

    <!-- Add share P/N modal -->
    <div class="modal fade" id="shareModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add share P/N - Coil Spring</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <hr>
                <form role="form" action="<?php echo base_url('toolings/addShare') ?>" method="post" id="shareForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_process">Process</label>
                                    <input type="text" class="form-control" id="share_process" name="share_process"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_line">Line</label>
                                    <input type="text" class="form-control" id="share_line" name="share_line"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_shape">Tooling type</label>
                                    <input type="text" class="form-control" id="share_shape" name="share_shape"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="share_dia_A">Diameter A (mm)</label>
                                    <input type="text" class="form-control" id="share_dia_A" name="share_dia_A"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="share_dia_B">Diameter B (mm)</label>
                                    <input type="text" class="form-control" id="share_dia_B" name="share_dia_B"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label id="share_rack" for="share_loc">Rack <cite>(A123)</cite></label>
                                    <input type="text" class="form-control" id="share_loc" name="share_loc"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="share_lbla" for="share_La">Length a (mm | turn)</label>
                                    <input type="text" class="form-control" id="share_La" name="share_La"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label id="share_lblb" for="share_Lb">Length b (mm | turn)</label>
                                    <input type="text" class="form-control" id="share_Lb" name="share_Lb"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="share_coil_A">Coil Dia A(mm)</label>
                                    <input type="text" class="form-control" id="share_coil_A" name="share_coil_A"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="share_coil_B">Coil Dia B(mm)</label>
                                    <input type="text" class="form-control" id="share_coil_B" name="share_coil_B"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_mgrade">Material Grade</label>
                                    <input type="text" class="form-control" id="share_mgrade" name="share_mgrade"
                                        autocomplete="off" readonly readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class=" form-group">
                                    <label for="share_full_length">Full Length (mm)</label>
                                    <input type="text" class="form-control" id="share_full_length"
                                        name="share_full_length" autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_zone">Zone *(AMS)</label>
                                    <input type="text" class="form-control" id="share_zone" name="share_zone"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Customer /Project</label>
                                    <input type="text" class="form-control" id="share_cust" name="share_cust"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_part_no">Built P/N<cite class="text-danger"> *</cite></label>
                                    <input type="text" class="form-control" id="share_part_no" name="share_part_no"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Maker/Supplier</label>
                                    <input type="text" class="form-control" id="share_maker" name="share_maker"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_status">Status</label>
                                    <input type="text" class="form-control" id="share_status" name="share_status"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_rev">Revision</label>
                                    <input type="text" class="form-control" id="share_rev" name="share_rev"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_rev_date">Revision Date<cite class="text-danger"> *</cite></label>
                                    <input type="text" class="form-control" id="share_rev_date" name="share_rev_date"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="share_remark">Remark</label>
                                    <input type="text" class="form-control" id="share_remark" name="share_remark"
                                        autocomplete="off" readonly />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-info">
                                    <label for="add_part_no">Add Coil Part Number<cite class="text-danger">
                                            *</cite></label>
                                    <input type="text" class="form-control" id="add_part_no" name="add_part_no"
                                        placeholder="Coil Spring part number" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="share_product">Product</label>
                                    <input type="text" class="form-control" id="share_product" name="share_product"
                                        value="Coil Spring" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="<?php echo base_url('home') ?>" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary float-sm-right">Add</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- remove record modal -->
    <div class="modal fade" id="removeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove a Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form role="form" action="<?php echo base_url('toolings/remove'); ?>" method="post" id="removeForm">
                    <div class="modal-body">
                        <p>Do you really want to remove the selected item ?</p>
                        <input type="text" class="form-control is-warning" id="label_delete" name="label_delete"
                            readonly />
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

    <script type="text/javascript">
// Fetch Document list
var base_url = "<?php echo base_url(); ?>";
var manageTable;
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


    // Setup - add a text input to each header cell
    $('#tblCYL thead tr').clone(true).appendTo('#tblCYL thead');
    $('#tblCYL thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblCYL.column(i).search() !== this.value) {
                tblCYL
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblCYL = $('#tblCYL').DataTable({
        ajax: base_url + 'toolings/tblCYL',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblCON thead tr').clone(true).appendTo('#tblCON thead');
    $('#tblCON thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblCON.column(i).search() !== this.value) {
                tblCON
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblCON = $('#tblCON').DataTable({
        ajax: base_url + 'toolings/tblCON',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblPTL thead tr').clone(true).appendTo('#tblPTL thead');
    $('#tblPTL thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblPTL.column(i).search() !== this.value) {
                tblPTL
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblPTL = $('#tblPTL').DataTable({
        ajax: base_url + 'toolings/tblPTL',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblSCN thead tr').clone(true).appendTo('#tblSCN thead');
    $('#tblSCN thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblSCN.column(i).search() !== this.value) {
                tblSCN
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblSCN = $('#tblSCN').DataTable({
        ajax: base_url + 'toolings/tblSCN',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblSeat thead tr').clone(true).appendTo('#tblSeat thead');
    $('#tblSeat thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblSeat.column(i).search() !== this.value) {
                tblSeat
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblSeat = $('#tblSeat').DataTable({
        ajax: base_url + 'toolings/tblSeat',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblRoll thead tr').clone(true).appendTo('#tblRoll thead');
    $('#tblRoll thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblRoll.column(i).search() !== this.value) {
                tblRoll
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblRoll = $('#tblRoll').DataTable({
        ajax: base_url + 'toolings/tblRoll',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });

    $('#tblPlate thead tr').clone(true).appendTo('#tblPlate thead');
    $('#tblPlate thead tr:eq(1) th').each(function(i) {
        $(this).html(
            '<input class="form-control form-control-sm is-warning" type="text" placeholder="Search..." style="width: 90%" />'
        );
        $('input', this).on('keyup change', function() {
            if (tblPlate.column(i).search() !== this.value) {
                tblPlate
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    tblPlate = $('#tblPlate').DataTable({
        ajax: base_url + 'toolings/tblPlate',
        responsive: true,
        autoWidth: false,
        iDisplayLength: 50,
        buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
        dom: 'Bitp',
    });
})

function mydim() {
    if (document.getElementById("shape").value == "CYL") {
        document.getElementById('dia_B').value = document.getElementById('dia_A').value;
    }
}

function myCoildim() {
    if (document.getElementById("shape").value == "CYL") {
        document.getElementById('coil_B').value = document.getElementById('coil_A').value;
    }
}

function myLength() {
    if (document.getElementById("line").value == "1") {
        document.getElementById('full_length').value = '800'
    } else if (document.getElementById("line").value == "2") {
        document.getElementById('full_length').value = '600'
    } else {
        document.getElementById('full_length').value = '0'
    };
}

function myEditLength() {
    if (document.getElementById("edit_line").value == "1") {
        document.getElementById('edit_full_length').value = '800'
    } else if (document.getElementById("edit_line").value == "2") {
        document.getElementById('edit_full_length').value = '600'
    } else {
        document.getElementById('edit_full_length').value = '0'
    };
}

function mytype() {
    if (document.getElementById("shape").value == "PTL") {
        $("#tool-img").attr("src", base_url + '/user/img/PTL.png');
        $('#La').prop('readonly', false);
        $('#Lb').prop('readonly', false);
        $('#dia_B').prop('readonly', false);
        $('#coil_A').prop('readonly', false);
        $('#coil_B').prop('readonly', false);
        document.getElementById('lblda').innerHTML = "Diameter A";
        document.getElementById('lbldb').innerHTML = "Diameter B";
        document.getElementById('lbla').innerHTML = "G.I. start (turn)";
        document.getElementById('lblb').innerHTML = "G.I. end (turn)";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";


    } else if (document.getElementById("shape").value == "SCN") {
        $("#tool-img").attr("src", base_url + '/user/img/SCN.png');
        $('#La').prop('readonly', false);
        $('#Lb').prop('readonly', false);
        $('#dia_B').prop('readonly', false);
        $('#coil_A').prop('readonly', false);
        $('#coil_B').prop('readonly', false);
        document.getElementById('lblda').innerHTML = "Diameter A";
        document.getElementById('lbldb').innerHTML = "Diameter B";
        document.getElementById('lbla').innerHTML = "Length A";
        document.getElementById('lblb').innerHTML = "Length B";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";

    } else if (document.getElementById("shape").value == "CON") {
        $("#tool-img").attr("src", base_url + '/user/img/CONIC.png');
        $('#La').prop('readonly', false);
        $('#Lb').prop('readonly', false);
        $('#dia_B').prop('readonly', false);
        $('#coil_A').prop('readonly', false);
        $('#coil_B').prop('readonly', false);
        document.getElementById('lblda').innerHTML = "Diameter A";
        document.getElementById('lbldb').innerHTML = "Diameter B";
        document.getElementById('lbla').innerHTML = "Length A";
        document.getElementById('lblb').innerHTML = "Length B";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";

    } else if (document.getElementById("shape").value == "CYL") {
        $("#tool-img").attr("src", base_url + '/user/img/CYL.png');
        $('#dia_B').prop('readonly', true);
        $('#coil_A').prop('readonly', false);
        $('#coil_B').prop('readonly', true);
        $('#La').val('').prop('readonly', true);
        $('#Lb').val('').prop('readonly', true);
        document.getElementById('lblda').innerHTML = "Diameter A";
        document.getElementById('lbldb').innerHTML = "Diameter B";
        document.getElementById('lbla').innerHTML = "-";
        document.getElementById('lblb').innerHTML = "-";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";

    } else if (document.getElementById("shape").value == "SEAT") {
        $("#tool-img").attr("src", base_url + '/user/img/SEAT.png');
        $('#La').prop('readonly', false);
        $('#Lb').prop('readonly', false);
        $('#dia_B').prop('readonly', false);
        $('#coil_A').prop('readonly', true);
        $('#coil_B').prop('readonly', true);
        document.getElementById('lblda').innerHTML = "D1 (mm)";
        document.getElementById('lbldb').innerHTML = "D2 (mm)";
        document.getElementById('lbla').innerHTML = "Turn [for Flat=0]";
        document.getElementById('lblb').innerHTML = "Pitch [for Flat=0]";
        document.getElementById('rack').innerHTML = "LU/LL/PU/PL";
        document.getElementById('full_length').value = ''

    } else if (document.getElementById("shape").value == "GRR") {
        $("#tool-img").attr("src", base_url + '/user/img/GRR.png');
        document.getElementById('lblda').innerHTML = "Radius (mm)";
        document.getElementById('lbla').innerHTML = "-";
        document.getElementById('lblb').innerHTML = "-";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";
        $('#La').prop('readonly', true);
        $('#Lb').prop('readonly', true);
        $('#coil_A').prop('readonly', true);
        $('#coil_B').prop('readonly', true);
        $('#dia_B').prop('readonly', true);

    } else if (document.getElementById("shape").value == "SUP-GRR") {
        $("#tool-img").attr("src", base_url + '/user/img/SUP-GRR.png');
        document.getElementById('lblda').innerHTML = "Radius (mm)";
        document.getElementById('lbla').innerHTML = "-";
        document.getElementById('lblb').innerHTML = "-";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";
        $('#La').prop('readonly', true);
        $('#Lb').prop('readonly', true);
        $('#coil_A').prop('readonly', true);
        $('#coil_B').prop('readonly', true);
        $('#dia_B').prop('readonly', true);

    } else {
        $("#tool-img").attr("src", base_url + '');
        document.getElementById('lblda').innerHTML = "D1 (mm)";
        document.getElementById('lbla').innerHTML = "-";
        document.getElementById('lblb').innerHTML = "-";
        document.getElementById('rack').innerHTML = "Rack <cite> (A123)</cite>";
        $('#La').prop('readonly', true);
        $('#Lb').prop('readonly', true);
        $('#coil_A').prop('readonly', true);
        $('#coil_B').prop('readonly', true);
        $('#dia_B').prop('readonly', true);
    }

}

$("#editModal").on("shown.bs.modal", function(e) {
    myEdittype();
    myEditLength();
})

function myEdittype() {
    if (document.getElementById("edit_shape").value == "PTL") {
        $("#edit_tool-img").attr("src", base_url + '/user/img/PTL.png');
        $('#edit_La').prop('readonly', false);
        $('#edit_Lb').prop('readonly', false);
        $('#edit_dia_B').prop('readonly', false);
        $('#edit_coil_A').prop('readonly', false);
        $('#edit_coil_B').prop('readonly', false);
        document.getElementById('edit_lbla').innerHTML = "G.I. start(turn)";
        document.getElementById('edit_lblb').innerHTML = "G.I. end(turn)";
        if (document.getElementById("edit_line").value == "1") {
            document.getElementById('edit_full_length').value = '800'
        } else if (document.getElementById("edit_line").value == "2") {
            document.getElementById('edit_full_length').value = '600'
        }

    } else if (document.getElementById("edit_shape").value == "SCN") {
        $("#edit_tool-img").attr("src", base_url + '/user/img/SCN.png');
        $('#edit_La').prop('readonly', false);
        $('#edit_Lb').prop('readonly', false);
        $('#edit_dia_B').prop('readonly', false);
        $('#edit_coil_A').prop('readonly', false);
        $('#edit_coil_B').prop('readonly', false);
        document.getElementById('edit_lbla').innerHTML = "Length A";
        document.getElementById('edit_lblb').innerHTML = "Length B";
        if (document.getElementById("edit_line").value == "1") {
            document.getElementById('edit_full_length').value = '800'
        } else if (document.getElementById("edit_line").value == "2") {
            document.getElementById('edit_full_length').value = '600'
        }

    } else if (document.getElementById("edit_shape").value == "CON") {
        $("#edit_tool-img").attr("src", base_url + '/user/img/CONIC.png');
        $('#edit_La').prop('readonly', false);
        $('#edit_Lb').prop('readonly', false);
        $('#edit_dia_B').prop('readonly', false);
        $('#edit_coil_A').prop('readonly', false);
        $('#edit_coil_B').prop('readonly', false);
        document.getElementById('edit_lbla').innerHTML = "Length A";
        document.getElementById('edit_lblb').innerHTML = "Length B";
        if (document.getElementById("edit_line").value == "1") {
            document.getElementById('edit_full_length').value = '800'
        } else if (document.getElementById("edit_line").value == "2") {
            document.getElementById('edit_full_length').value = '600'
        }

    } else if (document.getElementById("edit_shape").value == "CYL") {
        $("#edit_tool-img").attr("src", base_url + '/user/img/CYL.png');
        $('#edit_dia_B').prop('readonly', true);
        $('#edit_coil_A').prop('readonly', false);
        $('#edit_coil_B').prop('readonly', true);
        $('#edit_La').val('').prop('readonly', true);
        $('#edit_Lb').val('').prop('readonly', true);
        document.getElementById('edit_lbla').innerHTML = "-";
        document.getElementById('edit_lblb').innerHTML = "-";
        if (document.getElementById("edit_line").value == "1") {
            document.getElementById('edit_full_length').value = '800'
        } else if (document.getElementById("edit_line").value == "2") {
            document.getElementById('edit_full_length').value = '600'
        }

    } else {
        $("#edit_tool-img").attr("src", '');
        document.getElementById('edit_lbla').innerHTML = "-";
        document.getElementById('edit_lblb').innerHTML = "-";
        $('#edit_La').prop('readonly', true);
        $('#edit_Lb').prop('readonly', true);
        $('#edit_coil_A').prop('readonly', true);
        $('#edit_coil_B').prop('readonly', true);
        $('#edit_dia_B').prop('readonly', true);
    }

}

$(function() {
    //Date picker
    $('#edit_rev_date').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
})

// submit the create form 
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
            //manageTable.ajax.reload(null, false);
            tblCYL.ajax.reload(null, false);
            tblCON.ajax.reload(null, false);
            tblPTL.ajax.reload(null, false);
            tblSCN.ajax.reload(null, false);
            tblSeat.ajax.reload(null, false);
            tblRoll.ajax.reload(null, false);
            tblPlate.ajax.reload(null, false);
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
        url: base_url + 'toolings/fetchToolDataById/' + id,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $("#edit_process").val(response.process);
            $("#edit_line").val(response.line);
            $("#edit_shape").val(response.shape);
            $("#edit_dia_A").val(response.dia_A);
            $("#edit_dia_B").val(response.dia_B);
            $("#edit_full_length").val(response.full_length);
            $("#edit_La").val(response.La);
            $("#edit_Lb").val(response.Lb);
            $("#edit_coil_A").val(response.coil_A);
            $("#edit_coil_B").val(response.coil_B);
            $("#edit_mgrade").val(response.material);
            $("#edit_loc").val(response.loc);
            $("#edit_zone").val(response.zone);
            $("#edit_cust").val(response.cust);
            $("#edit_part_no").val(response.built_pn);
            $("#edit_maker").val(response.maker);
            $("#edit_status").val(response.status);
            $("#edit_rev").val(response.rev);
            $("#edit_rev_date").val(response.rev_date);
            $("#prev_remark").val(response.remark);
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
                        tblCYL.ajax.reload(null, false);
                        tblCON.ajax.reload(null, false);
                        tblPTL.ajax.reload(null, false);
                        tblSCN.ajax.reload(null, false);
                        tblSeat.ajax.reload(null, false);
                        tblRoll.ajax.reload(null, false);
                        tblPlate.ajax.reload(null, false);
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

// edit function
function shareFunc(id) {
    $.ajax({
        url: base_url + 'toolings/fetchToolDataById/' + id,
        type: 'post',
        dataType: 'json',
        success: function(response) {
            $("#share_process").val(response.process);
            $("#share_line").val(response.line);
            $("#share_shape").val(response.shape);
            $("#share_dia_A").val(response.dia_A);
            $("#share_dia_B").val(response.dia_B);
            $("#share_full_length").val(response.full_length);
            $("#share_La").val(response.La);
            $("#share_Lb").val(response.Lb);
            $("#share_coil_A").val(response.coil_A);
            $("#share_coil_B").val(response.coil_B);
            $("#share_mgrade").val(response.material);
            $("#share_loc").val(response.loc);
            $("#share_zone").val(response.zone);
            $("#share_cust").val(response.cust);
            $("#share_part_no").val(response.built_pn);
            $("#share_maker").val(response.maker);
            $("#share_status").val(response.status);
            $("#share_rev").val(response.rev);
            $("#share_rev_date").val(response.rev_date);
            $("#share_remark").val(response.remark);
            // submit the edit from 
            $("#shareForm").unbind('submit').bind('submit', function() {
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
                        tblCYL.ajax.reload(null, false);
                        tblCON.ajax.reload(null, false);
                        tblPTL.ajax.reload(null, false);
                        tblSCN.ajax.reload(null, false);
                        tblSeat.ajax.reload(null, false);
                        tblRoll.ajax.reload(null, false);
                        tblPlate.ajax.reload(null, false);
                        if (response.success === true) {
                            //SweetAlert2 notification
                            $(function() {
                                const Toast = Swal.mixin({
                                    toast: false,
                                    showConfirmButton: true,
                                });
                                $(function() {
                                    Toast.fire({
                                        icon: 'success',
                                        title: response
                                            .messages,
                                        text: 'Chop the drawing. As it has been added in share tooling',
                                        footer: 'New P/N Added to the mandrel.'
                                    })
                                });
                            });

                            // hide the modal
                            $("#shareModal").modal('hide');
                            // reset the form 
                            $("#shareForm .form-group").removeClass('has-error')
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
            url: base_url + 'toolings/labelDeleteById/' + id,
            type: 'post',
            dataType: 'json',
            success: function(response) {
                $("#label_delete").val(response.shape + '. Size: ' + response.dia_A + '. Built P/N: ' + response
                    .built_pn + '. Rack (' + response.loc + ').');

                $("#removeForm").on('submit', function() {
                    var form = $(this);
                    $(".text-danger").remove();
                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: {
                            id: id,
                            pn: response.built_pn,
                            loc: response.loc
                        },
                        dataType: 'json',
                        success: function(response) {
                            //manageTable.ajax.reload(null, false);
                            tblCYL.ajax.reload(null, false);
                            tblCON.ajax.reload(null, false);
                            tblPTL.ajax.reload(null, false);
                            tblSCN.ajax.reload(null, false);
                            tblSeat.ajax.reload(null, false);
                            tblRoll.ajax.reload(null, false);
                            tblPlate.ajax.reload(null, false);
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