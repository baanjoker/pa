<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model'
			
		]);
	}

	// *
	//  * Index Page for this controller.
	//  *
	//  * Maps to the following URL
	//  * 		http://example.com/index.php/welcome
	//  *	- or -
	//  * 		http://example.com/index.php/welcome/index
	//  *	- or -
	//  * Since this controller is set as the default controller in
	//  * config/routes.php, it's displayed at http://example.com/
	//  *
	//  * So any other public methods not prefixed with an underscore will
	//  * map to /index.php/welcome/<method_name>
	//  * @see https://codeigniter.com/user_guide/general/urls.html
	
	public function index()
	{
		if ($this->session->userdata('isLogIn') === true || $this->session->userdata('status') === 1) 
            redirect('dashboard'); 
        
		$data['page_title'] = 'Login';

		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();

		$this->form_validation->set_rules('email','Email Address','required|max_length[50]|valid_email');
		$this->form_validation->set_rules('password','Password','required|max_length[32]|md5');
		$data['user']=(object)$postData = 
		[
			'email'		=>	$this->input->post('email',true),
			'password'	=>  hash('sha256',$this->input->post('password'))
			// 'password'	=>  hash('sha256',$this->input->post('password',true))
			// 'password'	=>	md5($this->input->post('password',true)),
			// 'user_role'	=>	$this->input->post('user_role',true),
		];

		if($this->form_validation->run() === true)
		{
			$check_user = $this->login_model->check_user($postData);
            $check_user_disabled = $this->login_model->check_user_disabled($postData);
			
			if ($check_user->num_rows() === 1) {

			$setting = $this->setting_model->read($postData);

                //store data in session
                $this->session->set_userdata([
                    'isLogIn'   		=> true,
                    'user_id'   		=> $check_user->row()->user_id,
                    'password'   		=> $check_user->row()->password,
                    'email'     		=> $check_user->row()->email,
                    'fullname'  		=> $check_user->row()->firstname,
                    'middlenames'  		=> $check_user->row()->middlename,
                    'lastnames'			=> $check_user->row()->lastname,
                    'address' 			=> $check_user->row()->address,
                    'user_role' 		=> $check_user->row()->user_role,
                    'picture'   		=> $check_user->row()->picture,
                    'create_date'   	=> $check_user->row()->create_date,
                    'last_logs'   		=> $check_user->row()->last_update,
                    'region' 			=> $check_user->row()->region,
                    'department' 		=> $check_user->row()->department,
                    'designation' 		=> $check_user->row()->designation,
                    'mobile' 			=> $check_user->row()->mobile,
					'landline' 			=> $check_user->row()->landline,
					'dob' 				=> $check_user->row()->dob,
					'blood_type' 		=> $check_user->row()->blood_type,
					'municipality' 		=> $check_user->row()->municipality,
					'province' 			=> $check_user->row()->province,
					'status' 			=> $check_user->row()->status,
					'office_emailadd' 	=> $check_user->row()->office_emailadd,

					
                ]);

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
			'status'		=>	'login',
			'logs'			=>	$this->session->userdata('fullname')." ".$this->session->userdata('lastnames')." ".'Login',
			'date_logs'		=>	$now,
		];
		
        $query_loginlogs = $this->login_model->login_logs($postDataLogs);
                //redirect to dashboard home page
                redirect('dashboard');

            } elseif($check_user_disabled->num_rows() === 1){
            	$this->session->set_flashdata('exception',"Account disabled!<br> Please contact the administrator.");
                //redirect to login form
                redirect('login');
            }

            else {
                #set exception message
                $this->session->set_flashdata('exception',"Incorrect email/password!");
                //redirect to login form
                redirect('login');
            }

        } else {
        
		$this->load->view('login_wrapper',$data);
		}
	}

	public function reset_password()
	{
		$data['page_title'] = "Reset Password";
		$data['content'] = $this->load->view('reset_password',$data,true);
		$this->load->view('reset_wrapper',$data);
	}

	public function reset()
	{
	
	}
}	

