<?php

class Share_tool extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Share Toolings';
		$this->load->model('model_tooling');
	}

	public function index()
	{
		$this->render_template('share_tools/index', $this->data);
	}

	public function fetchShare()
	{
		$result = array('data' => array());
		$data = $this->model_tooling->shareTooling();
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
			if ($value['share_pn']==$value['built_pn']) {
				$button = '<a href="home">Built P/N</a>';
			} else {
				$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Edit data" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>';
				$button .= '<button type="button" class="btn btn-outline-secondary btn-sm" title="Remove" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
			}
			$rev_rec = '';
			$rev_rec = ($value['share_pn']==$value['built_pn'] && $value['rev'] > 0) ? $rev_rec .= '<button type="button" class="btn btn-outline-info btn-sm" title="Revision history" onclick="recordFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#recordModal">' . $value['rev'] . '</button>' : $value['rev'] ;

			$tgl = date("d M Y", strtotime($value['created']));
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
				$rev_rec,
				$button
			);
		}
		echo json_encode($result);
	}
}
