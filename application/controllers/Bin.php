<?php

class Bin extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Removed Toolings';
		$this->load->model('model_tooling');
	}

	public function index()
	{
		$this->render_template('bin/index', $this->data);
	}

	public function fetchBin()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->bin();
		foreach ($data as $key => $value) {
			$button = '';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Restore" onclick="restoreFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#restoreModal"><i class="fa fa-undo"></i></button>';
			$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Delete Permanent" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			
			$tgl = date("d M Y", strtotime($value['modified']));
			$result['data'][$key] = array(
				$value['id'],
				$value['built_pn'],
				$value['shape'],
				$value['loc'],
				$value['dia_A'],
				$value['dia_B'],
				$value['material'],
				$value['line'],
				$value['status'],
				$tgl,
				$button
			);
		}
		echo json_encode($result);
	}

	public function fetchDashboard()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->binDashboard();
		foreach ($data as $key => $value) {
			$tgl = date("d M Y", strtotime($value['created']));
			$status = '<button type="button" class="btn btn-outline-danger btn-sm">Deleted</button>';
			$result['data'][$key] = array(
				$value['share_pn'],
				$value['shape'],
				$value['loc'],
				$value['cust'],
				$value['built_pn'],
				$status,
				$tgl,

			);
		}
		echo json_encode($result);
	}
}
