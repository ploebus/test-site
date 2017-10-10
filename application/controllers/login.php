<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	 }

	 function index()
	 {
	 
	   $this->load->helper(array('form'));
	   $data['main_content'] = 'login_form';
	   $this->load->view('login_form');
	 }

	function validate_credentials()
	{

		$this->load->model('user');
		$this->load->library('session');
		$query = $this->user->validate();

		if($query) //if the user's credentials validated...
		{
			$data = array(
					'username' => $query->username,
					'is_logged_in' => TRUE,
					'OrgName'=>$query->OrgName,
					'Name'=> $query->first_name." ".$query->last_name
					);
			
			$this->session->set_userdata($data);
			
			if($this->session->userdata('username') == "admin"){
				redirect('admin/home_page');
			}
			else{
				redirect('site/home_page');
			}
		
		}
		
		else
			{
				$this->index();
			}

	}
	
	
}

