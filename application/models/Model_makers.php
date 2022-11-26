<?php

class Model_makers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getMakerData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM makers WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM makers";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('makers', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($id = null, $data = array())
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('makers', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('makers');
		return ($delete == true) ? true : false;
	}

	public function getActiveMaker()
	{
		$sql = "SELECT * FROM makers WHERE status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function countTotalMakers()
	{
		$sql = "SELECT * FROM makers";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function getAllMakers()
	{
		$sql = "SELECT maker_name FROM makers ORDER BY maker_name ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
