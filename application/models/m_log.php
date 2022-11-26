<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_log extends CI_Model
{
    public function save_log($param)
    {
        $sql        = $this->db->insert('tabel_log', $param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function viewLog()
    {
        $sql = "SELECT * FROM `tabel_log` ORDER BY `log_id` DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function viewReport()
    {
        $sql = "SELECT `log_desc`,`log_time`
        FROM tabel_log
        WHERE 
        `log_tipe`='2' OR
        `log_tipe`='3' OR
        `log_tipe`='4'
        ORDER by `log_time` DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }
}
