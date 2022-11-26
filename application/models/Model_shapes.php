<?php

class Model_shapes extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getShapeData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM shapes WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM shapes";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('shapes', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($id = null, $data = array())
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('shapes', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id = null)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('shapes');
			return ($delete == true) ? true : false;
		}

		return false;
	}

	public function getActiveShapeCS()
	{
		$sql = "SELECT * FROM `shapes` WHERE `appli`='Coil Spring' AND `status`=1 ";
		$query = $this->db->query($sql, array());
		return $query->result_array();
	}

	public function getActiveShapeUB()
	{
		$sql = "SELECT * FROM `shapes` WHERE `appli`='U-Bolt' AND `status`=1 ";
		$query = $this->db->query($sql, array());
		return $query->result_array();
	}

	public function getDeldata($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM shapes WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function buat_file($id, $data)
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$this->db->update('shapes', $data);
		}
	}

	public function countTotalShapes()
	{
		$sql = "SELECT id FROM shapes";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}
}
