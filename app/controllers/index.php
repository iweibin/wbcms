<?php

class Index extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index() {
		echo header("Location:".base_url()."index.php/user/home");
	}
}