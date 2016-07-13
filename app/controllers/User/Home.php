<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('user/home_model');
		$this->_data['categories'] = $this->home_model->getCategories();
	}

	public function index($cid = 1) {
		$this->_data['articles'] = $this->home_model->getArticles($cid);
		$this->_data['recommend_articles'] = $this->home_model->getRecommendArticles($cid);
		$this->_data['cid'] = $cid;

		$this->load->view('User/header',$this->_data);
		$this->load->view('User/home',$this->_data);
		$this->load->view('User/footer');
	}


	public function showDetail($cid, $aid) {
		$this->_data['cid'] = $cid;
		$this->_data['article_detail'] = $this->home_model->getArticleDetail($aid);
		$this->_data['recommend_articles'] = $this->home_model->getRecommendArticles($cid);

		$this->load->view('User/header',$this->_data);
		$this->load->view('User/detail',$this->_data);
		$this->load->view('User/footer');
	}
}
