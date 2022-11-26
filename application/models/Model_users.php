<?php

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function show_users()
	{
		$query = $this->db->get('users');
		return $query;
	}

	public function getUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getUserName($id = null)
	{
		if ($id) {
			$sql = "SELECT username,firstname,lastname FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function getnama($user = null)
	{
		if ($user) {
			$sql = "SELECT firstname,lastname FROM users WHERE username = ?";
			$query = $this->db->query($sql, array($user));
			return $query->result_array();
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);
		return ($update == true) ? true : false;
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users WHERE id != ?";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}


	public function news($data = null)
	{
		if ($data) {
			$create = $this->db->insert('news', $data);
			return ($create == true) ? true : false;
		}
	}

	public function create_file($nama_file, $user)
	{
		$data = array(
			'foto' => $nama_file,
		);
		$this->db->where('id', $user);
		$this->db->update('users', $data);
	}

	public function getHeader()
	{

		$sql = "SELECT * FROM gbr";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function create_header($nama_file)
	{
		$data = array(
			'file' => $nama_file,
		);
		$this->db->insert('gbr', $data);
	}

	public function remove_header($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('gbr');
		return ($delete == true) ? true : false;
	}
}
