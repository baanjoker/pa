<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * 
 */
class dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'users/dashboard_model',
			// 'users/pa/pamain_model'
		]);
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') !=2) 
            redirect('login'); 
	}

	public function index()
	{
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') !=2) 
            redirect('login'); 
        
        $user_region = $this->session->userdata('region');
        $data['regionss'] = $this->dashboard_model->region_display($user_region);
        $data['paCount'] = $this->dashboard_model->paCount($user_region);

		$data['page_title'] = "Dashboard";
		$data['setting'] = $this->setting_model->read();
		
		$data['content'] = $this->load->view('users/board',$data,true);
		$this->load->view('users/dashboard',$data);
	}

	public function logout()
    {  
        $this->session->sess_destroy(); 

        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

		if ($this->session->userdata('user_role') == 1) {
			$personnel = 'Administrator';
		} else {
			$personnel = 'Users';
		}
		$fullname = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
		$data['login_log']=(object)$postDataLogs = 
		[
			'account_id'	=>	$this->session->userdata('user_id'),
			'user_role'		=>	$this->session->userdata('user_role'),
			'status'		=>	'logout',
			'logs'			=>	$this->session->userdata('fullname')." ".$this->session->userdata('lastnames')." ".'Logout',
			'date_logs'		=>	$now,
		];

		$data['login_log']=(object)$postDataLogsUpdate = 
		[
			'user_id'	=>	$this->session->userdata('user_id'),			
			'last_update'		=>	$now,
		];

        $query_loginlogs = $this->login_model->login_logs($postDataLogs);
		$query_loginlogs = $this->login_model->update_logs($postDataLogsUpdate);

        redirect('login');
    } 
}