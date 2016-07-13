<?php

class Admin_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getUsers() {
		// $this->db->select('uid,userName,email,regdate')->from('admin');
		// $this->where('order by level');
		$query = $this->db->query("select uid,userName,email,regdate,level from cms_admin order by level desc");
		// $result = $this->db->get()->result('array');
		$result = $query->result('array');
		return $result;
	}
}
