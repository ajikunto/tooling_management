<?php

class Model_customers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getCustomerData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM customers WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM customers";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('customers', $data);
			return ($create == true) ? true : false;
		}
	}

	public function update($id = null, $data = array())
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('customers', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('customers');
		return ($delete == true) ? true : false;
	}

	public function getActiveCustomer()
	{
		$sql = "SELECT * FROM customers WHERE status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function countTotalCustomers()
	{
		$sql = "SELECT * FROM customers";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function getAllCustomers()
	{
		$sql = "SELECT cust_name FROM customers ORDER BY cust_name ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
