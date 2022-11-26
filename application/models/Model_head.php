<?php

class Model_head extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function showHeader()
	{
		$sql = "SELECT file FROM gbr ORDER BY RAND() LIMIT 0,1";
		$query = $this->db->query($sql, array());
		return $query->row_array();
	}
}
