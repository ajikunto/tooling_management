<?php

class Model_tooling extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getEachToolData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM tool_cs WHERE id = ? AND`bin`!=1";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM tool_cs";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getEachShareData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM share_tool WHERE id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function getDeldata($id = null)
	{
		if ($id) {
			$sql = "SELECT id,dia_A,shape,built_pn,loc FROM tool_cs WHERE id = ? AND`bin`!=1";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function getDelPerm($id = null)
	{
		if ($id) {
			$sql = "SELECT id,dia_A,shape,built_pn,loc FROM tool_cs WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function create($data = array())
	{
		if ($data) {
			$create = $this->db->insert('tool_cs', $data);
			return ($create == true) ? true : false;
		}
	}

	public function addShare($data = array())
	{
		if ($data) {
			$create = $this->db->insert('share_tool', $data);
			return ($create == true) ? true : false;
		}
	}

	public function addShareBuilt($data_share = array())
	{
		if ($data_share) {
			$create = $this->db->insert('share_tool', $data_share);
			return ($create == true) ? true : false;
		}
	}

	public function shareTooling()
	//for admin pne
	{
		$sql = "SELECT
		tool_cs.id,
		tool_cs.built_pn AS 'share_pn',
		tool_cs.shape,		
		tool_cs.dia_A,
		tool_cs.dia_B,
		tool_cs.La,
		tool_cs.Lb,			
		tool_cs.loc,
		tool_cs.line,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		tool_cs.created,
		tool_cs.rev
		FROM `tool_cs`
		UNION
		SELECT
		share_tool.id,
		share_tool.share_pn,
		tool_cs.shape,		
		tool_cs.dia_A,
		tool_cs.dia_B,
		tool_cs.La,
		tool_cs.Lb,			
		tool_cs.loc,
		tool_cs.line,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		share_tool.created,
		tool_cs.rev
		FROM `share_tool` 
		LEFT JOIN tool_cs ON share_tool.tool_id=tool_cs.id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function bin()
	{
		$sql = "SELECT * FROM tool_cs
		WHERE status ='deleted'
		ORDER BY `modified`DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function binDashboard()
	{
		$sql = "SELECT
		tool_cs.id,
		tool_cs.built_pn AS 'share_pn',
		tool_cs.shape,				
		tool_cs.loc,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		tool_cs.created
		FROM `tool_cs`
		WHERE tool_cs.status='deleted'
		UNION
		SELECT
		share_tool.id,
		share_tool.share_pn,
		tool_cs.shape,		
		tool_cs.loc,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		share_tool.created
		FROM `share_tool` 
		LEFT JOIN tool_cs ON share_tool.tool_id=tool_cs.id
		WHERE tool_cs.status='deleted';";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function edit($id, $data)
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('tool_cs', $data);
			return ($update == true) ? true : false;
		}
	}

	public function editShare($id, $data)
	{
		if ($id && $data) {
			$this->db->where('id', $id);
			$update = $this->db->update('share_tool', $data);
			return ($update == true) ? true : false;
		}
	}

	public function rev_update($rev_record = null)
	{
		if ($rev_record) {
			$update = $this->db->insert('rev_record', $rev_record);
			return ($update == true) ? true : false;
		}
	}

	public function getEachRecord($tool_id = null)
	{
		if ($tool_id) {
			$sql = "SELECT * FROM `rev_record` WHERE tool_id=?";
			$query = $this->db->query($sql, array($tool_id));
			return $query->result_array();
		}
	}

	public function remove($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('tool_cs');
			return ($delete == true) ? true : false;
		}
		return false;
	}

	public function removeShare($id)
	{
		if ($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('share_tool');
			return ($delete == true) ? true : false;
		}
		return false;
	}

	public function getToolList()
	{

		$sql = "SELECT * FROM tool_cs WHERE `bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getMandrelList()
	//For public page
	{
		$sql = "SELECT 
		tool_cs.id,
		tool_cs.built_pn AS 'share_pn',
		tool_cs.shape,		
		tool_cs.dia_A,
		tool_cs.dia_B,
		tool_cs.La,
		tool_cs.Lb,		
		tool_cs.loc,
		tool_cs.line,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		tool_cs.created,
		tool_cs.rev
		FROM `tool_cs`
		WHERE 
		shape='CYL' OR
		shape='PTL' OR
		shape='CON' OR
		shape='SCN'
		UNION
		SELECT	
		share_tool.id,
		share_tool.share_pn,
		tool_cs.shape,		
		tool_cs.dia_A,
		tool_cs.dia_B,
		tool_cs.La,
		tool_cs.Lb,			
		tool_cs.loc,
		tool_cs.line,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		share_tool.created,
		tool_cs.rev
		FROM `share_tool` 
		LEFT JOIN tool_cs ON share_tool.tool_id=tool_cs.id";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getDev()
	//For developed tooling or Not ready state
	{
		$sql = "SELECT
		tool_cs.id,
		tool_cs.built_pn AS 'share_pn',
		tool_cs.shape,				
		tool_cs.loc,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		tool_cs.created
	FROM `tool_cs`
	WHERE `status`!='ready' AND
	`status`!='deleted'
	UNION
	SELECT
		share_tool.id,
		share_tool.share_pn,
		tool_cs.shape,		
		tool_cs.loc,
		tool_cs.cust,
		tool_cs.built_pn,
		tool_cs.status,		
		share_tool.created
	FROM `share_tool` 
	LEFT JOIN tool_cs ON share_tool.tool_id=tool_cs.id
	WHERE `status`!='ready' AND
	`status`!='deleted'";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getSeatList()
	//For public page
	{
		$sql = "SELECT * FROM tool_cs 
		WHERE 
		shape='SEAT'
		AND `bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getGRRList()
	//For public page
	{
		$sql = "SELECT * FROM tool_cs 
		WHERE 
		shape='GRR' OR
		shape='SUP-GRR'
		AND `bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getOtherList()
	//For public page
	{
		$sql = "SELECT * FROM tool_cs WHERE NOT
		`shape`='CYL' AND NOT
		`shape`='PTL' AND NOT
		`shape`='CON' AND NOT
		`shape`='SCN' AND NOT
		`shape`='SEAT' AND NOT
		`shape`='GRR' AND NOT
		`shape`='SUP-GRR'
		AND NOT `bin`='1'";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getCYL()
	{
		$sql = "SELECT * FROM tool_cs WHERE shape='CYL' AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getCON()
	{
		$sql = "SELECT * FROM tool_cs WHERE shape='CON' AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getPTL()
	{
		$sql = "SELECT * FROM tool_cs WHERE shape='PTL' AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getSCN()
	{
		$sql = "SELECT * FROM tool_cs WHERE shape='SCN' AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getSeat()
	{
		$sql = "SELECT * FROM tool_cs WHERE shape='SEAT' AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getRoll()
	{
		$sql = "SELECT * FROM tool_cs 
		WHERE shape='END-ROL' OR 
		shape='END-ROL-TAPER' OR
		shape='GRR' OR 
		shape='SUP-GRR'
		AND`bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getPlate()
	{
		$sql = "SELECT * FROM tool_cs 
		WHERE shape='DFP' OR 
		shape='STRIPPER PLATE'
		AND `bin`!=1";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function countTotalBuilt()
	{
		$sql = "SELECT id FROM tool_cs";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function countTotalShare()
	{
		$sql = "SELECT id FROM share_tool";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function countTotalRevise()
	{
		$sql = "SELECT log_id FROM tabel_log WHERE `log_tipe`>1;";
		$query = $this->db->query($sql, array(1));
		return $query->num_rows();
	}

	public function getProcess()
	{

		$sql = "SELECT * FROM process WHERE pro_line='Coil Spring' ORDER BY `pro_id` ASC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getPercent()
	{

		$sql = "SELECT `log_tipe`, CEILING(count(*) * 100.0 / (SELECT count(*) from tabel_log)) as 'Percentage'
		FROM tabel_log
		GROUP BY `log_tipe`;";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function chartThisYear()
	{
	$sql = "SELECT new_tool,
	(CASE bulan WHEN 01 THEN 'Jan'
				WHEN 02 THEN 'Feb'
				WHEN 03 THEN 'Mar'
				WHEN 04 THEN 'Apr'
				WHEN 05 THEN 'May'
				WHEN 06 THEN 'Jun'
				WHEN 07 THEN 'Jul'
				WHEN 08 THEN 'Aug'
				WHEN 09 THEN 'Sep'
				WHEN 10 THEN 'Oct'
				WHEN 11 THEN 'Nov'
				WHEN 12 THEN 'Dec'
				ELSE bulan END) AS bulan
			FROM (SELECT COUNT(`id`) AS new_tool, DATE_FORMAT(`created`, '%m') AS bulan 
	FROM tool_cs
	WHERE year(`modified`) = year(CURDATE())
	GROUP BY DATE_FORMAT(`created`, '%m')
	UNION
	SELECT  0 AS new_tool, month_helper.month AS bulan FROM month_helper) as Q GROUP BY bulan;";
	$query = $this->db->query($sql, array());
	return $query->result();
	}

	public function chartLastYear()
	{
	$sql = "SELECT new_tool,
	(CASE bulan WHEN 01 THEN 'Jan'
				WHEN 02 THEN 'Feb'
				WHEN 03 THEN 'Mar'
				WHEN 04 THEN 'Apr'
				WHEN 05 THEN 'May'
				WHEN 06 THEN 'Jun'
				WHEN 07 THEN 'Jul'
				WHEN 08 THEN 'Aug'
				WHEN 09 THEN 'Sep'
				WHEN 10 THEN 'Oct'
				WHEN 11 THEN 'Nov'
				WHEN 12 THEN 'Dec'
				ELSE bulan END) AS bulan
			FROM (SELECT COUNT(`id`) AS new_tool, DATE_FORMAT(`created`, '%m') AS bulan 
	FROM tool_cs
	WHERE year(`modified`) = year(CURDATE())-1
	GROUP BY DATE_FORMAT(`created`, '%m')
	UNION
	SELECT  0 AS new_tool, month_helper.month AS bulan FROM month_helper) as Q GROUP BY bulan";
	$query = $this->db->query($sql, array());
	return $query->result();
	}
}