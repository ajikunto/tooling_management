<?php

class Model_mgrades extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getMgradeData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM mgrade WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM mgrade";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('mgrade', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($id = null, $data = array())
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('mgrade', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('mgrade');
			return ($delete == true) ? true : false;
		}

		return false;
	}

	public function getActiveMgrade()
	{
		$sql = "SELECT * FROM mgrade WHERE status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function countTotalMgrades()
	{
		$sql = "SELECT * FROM mgrade";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
