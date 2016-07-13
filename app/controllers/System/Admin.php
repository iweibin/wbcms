<?php

class Admin extends CI_Controller {
	public $_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('system/system_model');
		$this->load->model('system/admin_model');
		$this->_data['modelName'] = "系统";
		$this->_data['siteInfo'] = $this->system_model->getSiteInfo(); 
	}

	/**
	 * 管理用户
	 */
	public function manage() {
		$this->is_login();

		$this->_data['actionName'] = "用户管理";
		$this->_data['menu'] = $this->system_model->getCategories();
		$this->_data['user'] = $this->admin_model->getUsers();
		$this->_data['level'] = $this->session->userdata('level');	


		$this->load->view('Admin/header',$this->_data);
		$this->load->view('Admin/left',$this->_data);
		$this->load->view('Admin/admin_manage',$this->_data);
		$this->load->view('Admin/footer');
		// $this->load->view('Admin/default');
	}
	/**
	 * 取消管理员
	 */
	public function cancelAdmin($uid) {
		$this->is_login();
		// $this->db->select('level')->from('admin');
		// $this->db->where('uid',$uid);
		// $result = $this->db->get()->first_row('array');
		$query = $this->db->query("select level from cms_admin where uid = ".$uid);
		$result = $query->first_row('array');
		//print_r($result);
		// echo $result['level'];
		if($result['level'] != 2 ) {
			$data['level'] = 0;
			$this->db->where('uid',$uid);
			$r = $this->db->update('admin',$data);

			//$r = $this->db->query('update cms_admin set level = 0 where uid = '.$uid);
			if( $r ) {
				//echo "<script>alert('操作成功');location.href='".site_url('system/admin/manage')."'</script>";
				show_notice('操作成功','system/admin/manage');
			}
		} else {
			//echo "<script>alert('无法进行该操作');location.href='".site_url('system/admin/manage')."'</script>";
			show_notice('无法进行该操作','system/admin/manage');

		}
	}
	/**
	 * 设置管理员
	 */
	public function setAdmin($uid) {
		$this->is_login();
		// $this->db->select('level')->from('admin');
		// $this->db->where('uid',$uid);
		// $result = $this->db->get()->first_row('array');
		$query = $this->db->query("select level from cms_admin where uid = ".$uid);
		$result = $query->first_row('array');
		//print_r($result);
		// echo $result['level'];
		if($result['level'] == 0 ) {
			$data['level'] = 1;
			$this->db->where('uid',$uid);
			$r = $this->db->update('admin',$data);

			//$r = $this->db->query('update cms_admin set level = 0 where uid = '.$uid);
			if( $r ) {
				//echo "<script>alert('操作成功');location.href='".site_url('system/admin/manage')."'</script>";
				show_notice('操作成功','system/admin/manage');
			}
		} else {
			//echo "<script>alert('无法进行该操作');location.href='".site_url('system/admin/manage')."'</script>";
			show_notice('无法进行该操作','system/admin/manage');
		}
	}

	/**
	 * 删除用户
	 */
	public function delAdmin($uid) {
		$this->is_login();

		$level = $this->session->userdata('level');
		if( $level == 2 ) {
			$this->db->select('level')->from('admin');
			$this->db->where('uid',$uid);
			$result = $this->db->get()->first_row('array');
			if($result['level'] != 2) {
				$this->db->where('uid',$uid);
				$r = $this->db->delete('admin');
				if( $r ) {
					show_notice('操作成功','system/admin/manage');
				}
			} else {
				show_notice('超级管理员你也敢删！','system/admin/manage');
			}
		} else {
			show_notice('权限不够，无法进行该操作','system/admin/manage');
		}
	}

	/**
	 * 用户登录
	 */
	public function login() {

		$account = $this->input->post('account');
		$pwd = $this->input->post('pwd');

		$this->db->select('*')->from('admin');
		$this->db->where('account',$account);
		$info = $this->db->get()->first_row('array');


		if( $info ) {
			if($info['level'] != 0) {
				if( $info['password'] == md5(md5($pwd).$info['userKey']) ) {
					$newSession = array(
						'account'  => $info['account'],
						'userName' => $info['userName'],
						'level'	   => $info['level'],
						'logged_in'=> TRUE	
						);
					$this->session->set_userdata($newSession);
					//echo "<script>alert('登陆成功');location.href='".site_url('system/index/logged_in')."'</script>";
					show_notice('登录成功','system/index/logged_in');
				} else {
					//echo "<script>alert('用户名或密码错误');location.href='".site_url('system')."'</script>";
					show_notice('用户名或密码错误','system');
				}
			} else {
				show_notice('该用户不是管理员，请联系站长','system');
			}
		} else {
			//echo "<script>alert('用户名或密码错误');location.href='".site_url('system')."'</script>";
			show_notice('用户名或密码错误','system');
		}
	}
	/**
	 * 注销登陆
	 */
	public function logout() {
		$this->session->sess_destroy();
		//echo "<script>alert('已注销登陆');location.href='".site_url('system')."'</script>";
		show_notice('已注销登陆','system');
	}
	/**
	 * 添加管理员
	 */
	public function new_admin() {
		$this->is_login();
		$account = $this->input->post('account');
		$userName = $this->input->post('userName');
		$pwd = $this->input->post('pwd');
		$email = $this->input->post('email');
		$userKey = $this->getRandChar(8);

		$data = array(
			'account' => $account,
			'userName'=> $userName,
			'password'=> md5(md5($pwd).$userKey),
			'email'	  => $email,	
			'regdate' => date("Y-m-d H:i:s",time()),
			'level'	  => 1,
			'userKey' => $userKey
			);
		$r = $this->db->insert('admin',$data);
		if($r) {
			// echo "<script>alert('添加成功');location.href='".site_url('system/admin/manage')."'</script>";
			show_notice('添加成功','system/admin/manage');
		}
	}
	public function modify($action = '') {
		$this->is_login();
		if(empty($action)) {

			$this->_data['actionName'] = "修改信息";
			$this->_data['menu'] = $this->system_model->getCategories();
			$this->_data['level'] = $this->session->userdata('level');	

			$this->db->select('account,email,userName')->from('admin');
			$this->db->where('account',$this->session->userdata('account'));
			$this->_data['userInfo'] = $this->db->get()->first_row('array');

			// $this->_data['userInfo'] = $this->session->userdata();

			$this->load->view('Admin/header',$this->_data);
			$this->load->view('Admin/left',$this->_data);
			$this->load->view('Admin/admin_modify',$this->_data);
			$this->load->view('Admin/footer');
			// $this->load->view('Admin/default');
		} elseif($action == 'do') {
			$data = array();
			$account = $this->input->post('account');
			$userName = $this->input->post('userName');
			$pwd = $this->input->post('pwd');
			$email = $this->input->post('email');
			if($pwd) {

				$this->db->select('userKey')->from('admin');
				$this->db->where('account',$account);
				$result = $this->db->get()->first_row('array');

				$data['password'] = md5(md5($pwd).$result['userKey']);
			}
			//$data['account'] = $account;
			$data['userName'] = $userName;
			$data['email'] = $email;
			
			//print_r($data);
			$this->db->where('account',$account);
			$r = $this->db->update('admin',$data);
			if($r) {
				show_notice('修改成功','system/admin/modify');
			}
		}
	}



	/**
	 *  获取userKey
	 * @length 长度
	 */
	public function getRandChar($length){
	   $str = null;
	   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	   $max = strlen($strPol)-1;

		for($i = 0; $i < $length; $i++) {
			$str .= $strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
		}
	   return $str;
  	}

  	public function is_login() {
  		if( !$this->session->userdata('logged_in')) {
  			show_notice('请先登录','system');
  		}
  	}
}	