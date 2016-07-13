<?php

class Home_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getArticles($cid){
		$this->db->select('*')->from('articles');
		$this->db->where('category',$cid);
		$data = $this->db->get()->result('array');
		return $data;
	}
	public function getModel($cid) {
		$this->db->select('cname')->from('categories');
		$this->db->where('cid',$cid);
		$result = $this->db->get()->first_row('array');
		return $result['cname'];
	}
}
