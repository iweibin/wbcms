<?php


class Index extends CI_Controller{
	public $_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('system/system_model');
		$this->_data['modelName'] = "系统";	
		$this->_data['siteInfo'] = $this->system_model->getSiteInfo(); 
	}

	public function index() {
		if($this->session->userdata('logged_in')) {
			redirect('system/index/logged_in');
		} else {
			// show_notice('请先登录');
			$this->load->view('Admin/login');
		}
	}


	public function logged_in() {
		$this->is_login();
		// 栏目获取
		$this->_data['menu'] = $this->system_model->getCategories();
		$this->_data['actionName'] = "系统情况";
		$this->_data['level'] = $this->session->userdata('level');
		$this->_data['amount_admin'] = $this->db->count_all_results('admin');		
		$this->_data['amount_article'] = $this->db->count_all_results('articles');
		$this->db->where('released',1);
		$this->_data['amount_released'] = $this->db->count_all_results('articles');

		$this->load->view('Admin/header',$this->_data);
		$this->load->view('Admin/left',$this->_data);
		$this->load->view('Admin/default',$this->_data);
		$this->load->view('Admin/footer');
	}

	public function siteInfo($action = '') {
		if(empty($action)) {
			$this->_data['actionName'] = "站点设置";
			$this->_data['menu'] = $this->system_model->getCategories();

			$this->db->select('*')->from('site_info');
			$this->_data['siteInfo'] = $this->db->get()->first_row('array');
			$this->_data['level'] = $this->session->userdata('level');

			$this->load->view('Admin/header',$this->_data);
			$this->load->view('Admin/left',$this->_data);
			$this->load->view('Admin/site_info',$this->_data);
			$this->load->view('Admin/footer');

		} elseif($action == 'modify') {
			$id = $this->input->post('id');
			$siteurl = $this->input->post('url');
			$title = $this->input->post('title');
			$tel = $this->input->post('tel');
			$qq = $this->input->post('qq');
			$email = $this->input->post('email');
			$closed = $this->input->post('closed');
			//$logo = $this->input->post('logo');

			$data = array(
				'siteurl'	=> $siteurl,
				'title'		=> $title,
				'tel'		=> $tel,
				'email'		=> $email,
				'qq'		=> $qq,
				'date'		=> date('Y-m-d H:i:s',time()),
				'closed'	=> $closed
				);
			$this->db->where('id',$id);
			$r = $this->db->update('site_info',$data);
			if($r) {
				show_notice('操作成功','system/index/siteInfo');
			}
		}
	}


  	public function is_login() {
  		if( !$this->session->userdata('logged_in')) {
  			show_notice('请先登录','system');
  		}
  	}

}

