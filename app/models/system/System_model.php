<?php

class System_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getCategories() {
		// $this->db->select('*')->from('menus');
		// $this->db->where('fid = 0');
		$query = $this->db->query("select * from cms_categories order by rank");
		// $result = $this->db->get()->result('array');
		$result = $query->result('array');
		
		return $result;
	}
	public function getSiteInfo() {
		$this->db->select('*')->from('site_info');
		$info = $this->db->get()->first_row('array');
		return $info;
	}
}
