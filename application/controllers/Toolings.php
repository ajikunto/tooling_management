<?php

class Toolings extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->load->model('model_tooling');
	}

	public function create()
	{
		$response = array();
		$this->form_validation->set_rules('dia_A', 'Size', 'required',);
		$this->form_validation->set_rules('part_no', 'Built P/N', 'required',);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$data = array(
				'shape' => $this->input->post('shape'),
				'dia_A' => $this->input->post('dia_A'),
				'dia_B' => $this->input->post('dia_B'),
				'La' => $this->input->post('La'),
				'Lb' => $this->input->post('Lb'),
				'full_length' => $this->input->post('full_length'),
				'coil_A' => $this->input->post('coil_A'),
				'coil_B' => $this->input->post('coil_B'),
				'material' => $this->input->post('mgrade'),
				'process' => $this->input->post('process'),
				'loc' => $this->input->post('loc'),
				'line' => $this->input->post('line'),
				'zone' => $this->input->post('zone'),
				'remark' => $this->input->post('remark'),
				'cust' => $this->input->post('cust'),
				'built_pn' => $this->input->post('part_no'),
				'maker' => $this->input->post('maker'),
				'status' => $this->input->post('status'),
				'product' => $this->input->post('product'),
				'rev' => '0'
			);
			
			$create = $this->model_tooling->create($data);
			
			if ($create == true) {
				helper_log('2',  'Add new Tooling: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'New Tooling Succesfully created';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while creating the new tooling';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($response);
	}

	public function edit($id = null)
	{
		$response = array();
		$this->form_validation->set_rules('edit_dia_A', 'Size', 'required',);
		$this->form_validation->set_rules('edit_part_no', 'Built P/N', 'required',);
		$this->form_validation->set_rules('edit_remark', 'Remark', 'required',);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$data = array(
				'shape' => $this->input->post('edit_shape'),
				'dia_A' => $this->input->post('edit_dia_A'),
				'dia_B' => $this->input->post('edit_dia_B'),
				'La' => $this->input->post('edit_La'),
				'Lb' => $this->input->post('edit_Lb'),
				'full_length' => $this->input->post('edit_full_length'),
				'coil_A' => $this->input->post('edit_coil_A'),
				'coil_B' => $this->input->post('edit_coil_B'),
				'material' => $this->input->post('edit_mgrade'),
				'process' => $this->input->post('edit_process'),
				'loc' => $this->input->post('edit_loc'),
				'line' => $this->input->post('edit_line'),
				'zone' => $this->input->post('edit_zone'),
				'remark' => $this->input->post('edit_remark'),
				'cust' => $this->input->post('edit_cust'),
				'built_pn' => $this->input->post('edit_part_no'),
				'maker' => $this->input->post('edit_maker'),
				'status' => $this->input->post('edit_status'),
				'rev' => $this->input->post('edit_rev') + (1),
				'rev_date' => $this->input->post('edit_rev_date'),
			);
			$rev_record = array(
				'tool_id' => $id,
				'rev_no' => $this->input->post('edit_rev') + (1),
				'reason' => $this->input->post('edit_remark'),
				'user_name' => $this->session->userdata('username'),
				'rev_date' => $this->input->post('edit_rev_date'),
			);

			$create = $this->model_tooling->edit($id, $data);
			$revise = $this->model_tooling->rev_update($rev_record);
			if ($create && $revise == true) {
				helper_log('3',  'Update Tooling: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'Tooling Succesfully updated';
				$this->session->set_flashdata('msg-success', 'Tooling updated Successfuly');
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while updating the tooling';
				$this->session->set_flashdata('msg-error', 'Tooling updated got some error');
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($response);
	}

	public function editShare($id = null)
	{
		$response = array();
		$this->form_validation->set_rules('edit_share_pn', 'Part Number', 'required',);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$data = array(
				'product' => $this->input->post('edit_product'),
				'share_pn' => $this->input->post('edit_share_pn')
			);

			$create = $this->model_tooling->editShare($id, $data);
			if ($create == true) {
				helper_log('3',  'Update Share p/n: ' . implode(', ', $data));
				$response['success'] = true;
				$response['messages'] = 'Share p/n Succesfully updated';
				$this->session->set_flashdata('msg-success', 'Share p/n updated Successfuly');
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while updating the Share p/n';
				$this->session->set_flashdata('msg-error', 'Share p/n updated got some error');
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($response);
	}

	public function addShare($id = null)
	{
		$response = array();
		$this->form_validation->set_rules('add_part_no', 'P/N', 'required',);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run() == TRUE) {
			// true case
			$data = array(
				'tool_id' => $id,
				'built_pn' => $this->input->post('share_part_no'),
				'product' => $this->input->post('share_product'),
				'share_pn' => $this->input->post('add_part_no'),
			);
			$create = $this->model_tooling->addShare($data);
			if ($create == true) {
				helper_log('3',  'Add p/n: ' . $this->input->post('add_part_no').' Into Built p/n: '.$this->input->post('share_part_no'));
				$response['success'] = true;
				$response['messages'] = $this->input->post('add_part_no').' added to '.$this->input->post('share_part_no');
				
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error in the database while add new P/N';
			}
		} else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
				$response['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($response);
	}

	public function view_record($tool_id)
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getEachRecord($tool_id);
		foreach ($data as $key => $value) {
			$tgl_rev = date("d M Y", strtotime($value['rev_date']));
			$result['data'][$key] = array(
				$value['rev_no'],
				$value['reason'],
				$value['user_name'],
				$tgl_rev
			);
		}
		echo json_encode($result);
	}


	public function tblCYL()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getCYL();
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

			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';

			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i> share</button>';

			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;	

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['full_length'],
				$value['coil_A'],
				$value['material'],
				$value['loc'],
				$value['line'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblCON()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getCON();
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
			
			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"> share</i></button>';
			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['dia_B'],
				$value['La'],
				$value['Lb'],
				$value['full_length'],
				$value['coil_A'],
				$value['coil_B'],
				$value['material'],
				$value['loc'],
				$value['line'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblPTL()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getPTL();
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
			
			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i> share</button>';

			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['dia_B'],
				$value['La'],
				$value['Lb'],
				$value['full_length'],
				$value['coil_A'],
				$value['coil_B'],
				$value['material'],
				$value['loc'],
				$value['line'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblSCN()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getSCN();
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
			
			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i> share</button>';
			$rev_rec = '';
			$$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['dia_B'],
				$value['La'],
				$value['Lb'],
				$value['full_length'],
				$value['coil_A'],
				$value['coil_B'],
				$value['material'],
				$value['loc'],
				$value['line'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblSeat()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getSeat();
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

			$pitch = "";
			$pitch = ($value['La'] == 0) ? $pitch = "Flat" : $value['La'];
			$turn = "";
			$turn = ($value['Lb'] == 0) ? $turn = "Flat" : $value['Lb'];

			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i></button>';
			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['dia_B'],
				$pitch,
				$turn,
				$value['full_length'],
				$value['material'],
				$value['process'],
				$value['loc'],
				$value['line'],
				$value['zone'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblRoll()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getRoll();
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

			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i></button>';
			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['full_length'],
				$value['material'],
				$value['process'],
				$value['loc'],
				$value['line'],
				$value['zone'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblPlate()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getPlate();
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

			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			$share = '';
			$share .= '<button type="button" class="btn btn-outline-primary btn-sm" title="Add share P/N" onclick="shareFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#shareModal"><i class="fa fa-plus"></i></button>';
			$rev_rec = '';
			$rev_rec = ($value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$result['data'][$key] = array(
				$value['shape'],
				$value['dia_A'],
				$value['full_length'],
				$value['material'],
				$value['process'],
				$value['loc'],
				$value['line'],
				$value['zone'],
				$value['remark'],
				$value['cust'],
				$value['built_pn'] . ' ' . $share,
				$rev_rec,
				$status,
				$button
			);
		}
		echo json_encode($result);
	}

	public function tblDev()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->getDev();
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
			$tgl = date("d M Y", strtotime($value['created']));

			$result['data'][$key] = array(
				$value['share_pn'],
				$value['shape'],
				$value['loc'],
				$value['cust'],
				$value['built_pn'],
				$status,
				$tgl
			);
		}
		echo json_encode($result);
	}

	public function fetchToolDataById($id = null)
	{
		if ($id) {
			$data = $this->model_tooling->getEachToolData($id);
			echo json_encode($data);
		}
	}

	public function fetchShareDataById($id = null)
	{
		if ($id) {
			$data = $this->model_tooling->getEachShareData($id);
			echo json_encode($data);
		}
	}

	public function labelDeleteById($id = null)
	{
		if ($id) {
			$data = $this->model_tooling->getDeldata($id);
			echo json_encode($data);
		}
	}

	public function labelDeleteByShareId($id = null)
	{
		if ($id) {
			$data = $this->model_tooling->getEachShareData($id);
			echo json_encode($data);
		}
	}

	public function labelPermDeleteById($id = null)
	{
		if ($id) {
			$data = $this->model_tooling->getDelPerm($id);
			echo json_encode($data);
		}
	}

	public function del()
	//Permanently delete the data from database
	{
		$id = $this->input->post('id');
		$loc = $this->input->post('loc');
		$pn = $this->input->post('pn');
		$response = array();
		if ($id) {
			$delete = $this->model_tooling->remove($id);
			if ($delete == true) {
				helper_log('4',  "Permanent delete tooling : " .$pn." (Location: ".$loc.") ");
				$response['success'] = true;
				$response['messages'] = "A tooling from ".$loc." has been deleted";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while deleting the selected tooling";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}

	public function delShare()
	{
		$id = $this->input->post('id');
		$pn = $this->input->post('share_pn');
		$response = array();
		if ($id) {
			$delete = $this->model_tooling->removeShare($id);
			if ($delete == true) {
				helper_log('4',  "Permanent delete child Part No : " . $pn);
				$response['success'] = true;
				$response['messages'] = "A part no has been deleted";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while deleting the selected p/n";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}

	public function remove()
	{
		//tooling Status as moved (status  as deleted)
		$id = $this->input->post('id');
		$loc = $this->input->post('loc');
		$pn = $this->input->post('pn');
		if ($id) {
			$data['status'] = 'deleted';
			$delete = $this->model_tooling->edit($id, $data);
			if ($delete == true) {
				helper_log('4',  "Remove tooling CS pn: " . $pn."( ".$loc." )");
				$response['success'] = true;
				$response['messages'] = "A tooling has been removed";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the selected tooling";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}

	public function restore()
	{
		//tooling Status as  (ready)
		$id = $this->input->post('id');
		$loc = $this->input->post('loc');
		$pn = $this->input->post('pn');
		if ($id) {
			$data['status'] = 'ready';
			$restore = $this->model_tooling->edit($id, $data);
			if ($restore == true) {
				helper_log('4',  "Restore tooling CS pn: " . $pn."( ".$loc." )");
				$response['success'] = true;
				$response['messages'] = "A tooling has been restored";
			} else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while restore the selected tooling";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}
		echo json_encode($response);
	}
}
