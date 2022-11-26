<?php

class Backup extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'DB Backup';
		$this->load->model('model_backup');
	}

	public function index()
	{

		$this->render_template('backup/index', $this->data);
	}

	public function backupDB()
	{
		$this->load->dbutil();
		$aturan = array(
			'format'        => 'zip',                       // gzip, zip, txt
			'filename'      => 'pne.sql',              		// File name - NEEDED ONLY WITH ZIP FILES
		);
		$this->load->helper('file');
		$backup = $this->dbutil->backup($aturan);
		$nama_database = 'PNE-backup-' . date('Y-m-d') . '.zip';

		write_file('./db/PNE-backup-' . date('Y-m-d') . '.zip', $backup, 'w+');
		$data = array(
			'file' => $nama_database,
		);
		if ($this->model_backup->create($data)) {
			helper_log('3',  'Update Database : ' . $nama_database);
			$this->session->set_flashdata('success', 'Database back-up succesfully');
			redirect('backup', 'refresh');
		} else {
			$this->session->set_flashdata('error', 'Unable to backup the database');
			redirect('backup');
		}
	}


	public function fetchDBData()
	{

		$result = array('data' => array());
		$data = $this->model_backup->getBackupList();
		foreach ($data as $key => $value) {
			$result['data'][$key] = array(
				$value['id'],
				$value['file'],
				$value['created'],
			);
		}

		echo json_encode($result);
	}
}
