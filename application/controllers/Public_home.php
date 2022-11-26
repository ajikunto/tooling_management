<?php

class Public_home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Public Home';
        $this->load->model('model_tooling');
        $this->load->model('model_users');
    }

    public function index()
    {
        $this->render_template('public_home', $this->data);
    }

    public function showMandrels()
    {
        $result = array('data' => array());
        $data = $this->model_tooling->getMandrelList();
        foreach ($data as $key => $value) {
            $status = '';
			if ($value['status'] == 'ready') {
				$status = '<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#flowPublished">Ready</button>';
			} elseif ($value['status'] == 'design') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Design</button>';
			} elseif ($value['status'] == 'fabrication') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Fabrication</button>';
			}elseif ($value['status'] == 'repair') {
					$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Under Repair</button>';
			} elseif ($value['status'] == 'deleted') {
					$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Deleted</button>';
			} else {
				$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Missing</button>';
			};
            $tgl=date("d M Y",strtotime($value['created']));

            $result['data'][$key] = array(
                $value['share_pn'],
				$value['shape'],
				$value['dia_A'],
				$value['dia_B'],
                $value['La'],
				$value['Lb'],
				$value['loc'],
				$value['line'],
				$value['cust'],
				$value['built_pn'],
				$status,
				$tgl,
				$value['rev'],
            );
        }
        echo json_encode($result);
    }

    public function showSeats()
    {
        $result = array('data' => array());
        $data = $this->model_tooling->getSeatList();
        foreach ($data as $key => $value) {
            $status = '';
			if ($value['status'] == 'ready') {
				$status = '<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#flowPublished">Ready</button>';
			} elseif ($value['status'] == 'design') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Design</button>';
			} elseif ($value['status'] == 'fabrication') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Fabrication</button>';
			} elseif ($value['status'] == 'deleted') {
					$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Deleted</button>';
			} else {
				$status = '<button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#flowRejected">Under Repair</button>';
			};

            $turn = '';
            $turn = ($value['La'] > 0) ? $value['La'] : $pitch = "Flat";
            $pitch = '';
            $pitch = ($value['Lb'] > 0) ? $value['Lb'] : $pitch = "Flat";

            $result['data'][$key] = array(
                $value['shape'],
                $value['process'],
                $value['dia_A'],
                $value['dia_B'],
                $turn,
                $pitch,
                $value['loc'],
                $value['line'],
                $value['cust'],
                $value['built_pn'],
                $status,
                $value['rev'],
            );
        }
        echo json_encode($result);
    }

    public function showGRRs()
    {
        $result = array('data' => array());
        $data = $this->model_tooling->getGRRList();
        foreach ($data as $key => $value) {
            $status = '';
			if ($value['status'] == 'ready') {
				$status = '<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#flowPublished">Ready</button>';
			} elseif ($value['status'] == 'design') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Design</button>';
			} elseif ($value['status'] == 'fabrication') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Fabrication</button>';
			} elseif ($value['status'] == 'deleted') {
					$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Deleted</button>';
			} else {
				$status = '<button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#flowRejected">Under Repair</button>';
			};

            $result['data'][$key] = array(
                $value['shape'],
                $value['process'],
                $value['dia_A'],
                $value['full_length'],
                $value['loc'],
                $value['line'],
                $value['cust'],
                $value['built_pn'],
                $status,
                $value['rev'],
            );
        }
        echo json_encode($result);
    }

    public function showOthers()
    {
        $result = array('data' => array());
        $data = $this->model_tooling->getOtherList();
        foreach ($data as $key => $value) {
            $status = '';
			if ($value['status'] == 'ready') {
				$status = '<button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#flowPublished">Ready</button>';
			} elseif ($value['status'] == 'design') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Design</button>';
			} elseif ($value['status'] == 'fabrication') {
				$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Fabrication</button>';
			}elseif ($value['status'] == 'repair') {
					$status = '<button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#flowDraft">Under Repair</button>';
			} elseif ($value['status'] == 'deleted') {
					$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Deleted</button>';
			} else {
				$status = '<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#flowRejected">Missing</button>';
			};

            $result['data'][$key] = array(
                $value['shape'],
                $value['process'],
                $value['dia_A'],
                $value['full_length'],
                $value['loc'],
                $value['line'],
                $value['cust'],
                $value['built_pn'],
                $status,
                $value['rev'],
            );
        }
        echo json_encode($result);
    }
}
