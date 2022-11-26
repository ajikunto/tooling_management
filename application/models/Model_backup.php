<?php

class Model_backup extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('backup', $data);
			return ($create == true) ? true : false;
		}
	}

	public function remove($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('backup');
			return ($delete == true) ? true : false;
		}
		return false;
	}

	public function getBackupList()
	{
		$sql = "SELECT * FROM backup ORDER BY created DESC";
		$query = $this->db->query($sql, array());
		return $query->result_array();
	}
}
