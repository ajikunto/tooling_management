<?php

class Log extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['page_title'] = 'Activity Log';
		$this->load->model('m_log');
	}

	public function index()
	{
		$this->render_template('logs/index', $this->data);
	}

	public function fetchLog()
	{
		$result = array('data' => array());
		$data = $this->m_log->viewLog();
		foreach ($data as $key => $value) {
			$status = '';
			if ($value['log_tipe'] == '0') {
				$status = '<p class="text-success">User Login</p>';
			} elseif ($value['log_tipe'] == '1') {
				$status = '<p class="text-muted">User Logout</p>';
			} elseif ($value['log_tipe'] == '2') {
				$status = '<p class="text-info">Add</p>';
			} elseif ($value['log_tipe'] == '3') {
				$status = '<p class="text-info">Edit</p>';
			} elseif ($value['log_tipe'] == '4') {
				$status = '<p class="text-danger">Delete</p>';
			} else {
				$status = '<p class="text-info">Other</p>';
			};
			$result['data'][$key] = array(
				$value['log_id'],
				$value['log_time'],
				$value['log_user'],
				$status,
				$value['log_desc'],
			);
		}
		echo json_encode($result);
	}
}
