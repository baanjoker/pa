<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'cave_model',
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
		if ($this->session->userdata('isLogIn') == false) 
            redirect('login'); 
        if ($this->session->userdata('user_role') == 2) 
            redirect('report/assign_to_me'); 
        if ($this->session->userdata('user_role') == 3) 
            redirect('report/assign_by_me'); 

		$data['page_title'] = "DASHBOARD";
		$data['head_title'] = "DASHBOARD";
		$data['setting'] = $this->setting_model->read();
		$data['cave'] = $this->cave_model->count_cave();
		$data['family'] = $this->cave_model->count_family();
		$data['count_pamain'] = $this->cave_model->count_pamain();
		
		$data['content'] = $this->load->view('main_server/dash',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	 public function logout()
    {  
        $this->session->sess_destroy(); 
        redirect('login');
    } 
}