<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public $_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('system/system_model');
		$this->load->model('system/admin_model');
		$this->load->model('system/home_model');
		$this->_data['siteInfo'] = $this->system_model->getSiteInfo(); 
			
	}

	public function index($cid = 1) {

		$this->_data['cid'] = $cid;
		$this->_data['modelName'] = $this->home_model->getModel($cid);	
		$this->_data['actionName'] = "文章管理";

		$this->_data['menu'] = $this->system_model->getCategories();
		$this->_data['level'] = $this->session->userdata('level');
		$this->_data['articles'] = $this->home_model->getArticles($cid);

		$this->load->view('Admin/header',$this->_data);
		$this->load->view('Admin/left',$this->_data);
		$this->load->view('Admin/article_header',$this->_data);
		$this->load->view('Admin/article_list',$this->_data);
		$this->load->view('Admin/footer');
		// $this->load->view('Admin/default');
	}

	/**
	 * 添加文章
	 * @param [string] $action 操作
	 * @return
	 */
	public function acticle($cid = 1,$action = '',$id = '') {
		if(empty($action)) {

			$this->_data['cid'] = $cid;
			$this->_data['modelName'] = $this->home_model->getModel($cid);	
			$this->_data['actionName'] = "添加文章";

			$this->_data['menu'] = $this->system_model->getCategories();
			$this->_data['level'] = $this->session->userdata('level');

			$this->load->view('Admin/header',$this->_data);
			$this->load->view('Admin/left',$this->_data);
		 	$this->load->view('Admin/article_header',$this->_data);
			$this->load->view('Admin/article_detail',$this->_data);
			$this->load->view('Admin/footer');
		} elseif($action == "edit") {
			$data = $this->input->post();
			$data['content'] = trim($data['content']);
			$data['date'] = date("Y-m-d",time());
			if(empty($id)) {
				$r = $this->db->insert('articles',$data);
			} else {
				$this->db->where('id',$id);
				$r = $this->db->update('articles',$data);
			}
			if($r) {
				show_notice('操作成功','system/home/index/'.$cid);
			} else {
				show_notice('操作失败','system/home/acticle');
			}
		} elseif($action == "modify") {

			$this->_data['cid'] = $cid;
			$this->_data['modelName'] = $this->home_model->getModel($cid);	
			$this->_data['actionName'] = "修改文章";

			$this->_data['menu'] = $this->system_model->getCategories();
			$this->_data['level'] = $this->session->userdata('level');

			$this->db->select('*')->from('articles');
			$this->db->where('id',$id);
			$this->_data['article'] = $this->db->get()->first_row('array');


			$this->load->view('Admin/header',$this->_data);
			$this->load->view('Admin/left',$this->_data);
			$this->load->view('Admin/article_header',$this->_data);
			$this->load->view('Admin/article_modify',$this->_data);
			$this->load->view('Admin/footer');
		} elseif($action == 'del') {
			$this->db->where('id',$id);
			$r = $this->db->delete('articles');
			if($r) {
				show_notice('操作成功','system/home/index/'.$cid);
			} else {
				show_notice('操作失败','system/home/index/'.$cid);
			}
		} elseif( $action == 'release') {
			$this->db->select('released')->from('articles');
			$this->db->where('id',$id);
			$result = $this->db->get()->first_row('array');
			$released = $result['released'];

			$this->db->where('id',$id);
			if($released) {
				$r = $this->db->update('articles',array('released' => 0));
			} else {
				$r = $this->db->update('articles',array('released' => 1));
			}
			if($r) {
				show_notice('操作成功','system/home/index/'.$cid);
			} 
		}
			
	}
}
