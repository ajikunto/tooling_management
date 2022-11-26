<?php

class Model_notif extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function countDesign()
	{
		$sql = "SELECT `id` FROM `tool_cs` WHERE `stat`='design'";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}


	function _doc_hit()
	{
		//date + 1 >= current date, means select for last 2 days
		$sql = "SELECT COUNT(id) FROM doc WHERE DATE(`created`)+7>= DATE(curdate())";
		$query = $this->db->query($sql, array());
		$hit = $query->row_array();
		return $hit;
	}
}
