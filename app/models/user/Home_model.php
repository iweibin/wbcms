<?php

class Home_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	public function getArticles($cid){
		$this->db->select('*')->from('articles');
		$this->db->where(array('category' => $cid, 'released' => 1, 'showed' => 1));
		$data = $this->db->get()->result('array');
		return $data;
	}
	public function getCategories() {
		// $this->db->select('*')->from('menus');
		// $this->db->where('fid = 0');
		$query = $this->db->query("select * from cms_categories order by rank");
		// $result = $this->db->get()->result('array');
		$result = $query->result('array');
		
		return $result;
	}

	public function getRecommendArticles($cid) {
		$this->db->select('*')->from('articles');
		$this->db->where(array('category' => $cid, 'released' => 1, 'showed' => 1, 'recommend' => 1));
		$data = $this->db->get()->result('array');
		return $data;
	}

	public function getArticleDetail($aid) {
		$this->db->select('*')->from('articles');
		$this->db->where('id',$aid);
		$data = $this->db->get()->first_row('array');
		return $data;
	}
}
