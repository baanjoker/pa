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
		if ($this->session->userdata('isLogIn') === true) 
            redirect('dashboard'); 
		$data['page_title'] = 'Login';

		$data['setting'] = $this->setting_model->read();

		$this->form_validation->set_rules('email','Email Address','required|max_length[50]|valid_email');
		$this->form_validation->set_rules('password','Password','required|max_length[32]|md5');
		$this->form_validation->set_rules('user_role','User Position','required');
		$data['user']=(object)$postData = 
		[
			'email'		=>	$this->input->post('email',true),
			'password'	=>	md5($this->input->post('password',true)),
			'user_role'	=>	$this->input->post('user_role',true),
		];

		if($this->form_validation->run() === true)
		{
			$check_user = $this->login_model->check_user($postData);
			
			if ($check_user->num_rows() === 1) {

			$setting = $this->setting_model->read($postData);

                //store data in session
                $this->session->set_userdata([
                    'isLogIn'   => true,
                    'user_id'   => $check_user->row()->user_id,
                    'email'     => $check_user->row()->email,
                    'fullname'  => $check_user->row()->firstname,
                    'lastnames'	=> $check_user->row()->lastname,
                    'user_role' => $check_user->row()->user_role,
                    'picture'   => $check_user->row()->picture, 
                ]);
                //redirect to dashboard home page
                redirect('dashboard');
            } else {
                #set exception message
                $this->session->set_flashdata('exception',"Incorrect email/password!");
                //redirect to login form
                redirect('login');
            }

        } else {
        
		$this->load->view('login_wrapper',$data);
		}
	}
}	

