<?php

class Reports extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Reports';
		$this->load->model('m_log');
		$this->load->model('model_tooling');
		$this->load->model('model_shapes');
	}

	public function index()
	{
		$this->data['graph_toolingThis'] = $this->model_tooling->chartThisYear();
        $this->data['graph_toolingLast'] = $this->model_tooling->chartLastYear();

        $this->data['total_built'] = $this->model_tooling->countTotalBuilt();
        $this->data['total_share'] = $this->model_tooling->countTotalShare();
        $this->data['total_shape'] = $this->model_shapes->countTotalShapes();
        $this->data['total_revise'] = $this->model_tooling->countTotalRevise();

		$this->render_template('reports/index', $this->data);
	}

	public function fetchReport()
	{
		$result = array('data' => array());
		$data = $this->m_log->viewReport();
		foreach ($data as $key => $value) {
			$tgl = date("M Y", strtotime($value['log_time']));
			$result['data'][$key] = array(
				$value['log_desc'],
				$tgl,
			);
		}
		echo json_encode($result);
	}
}
