<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		//=================================================//
		//												   //
		//if user logged direct access in server dashboard //
		//												   //
		//=================================================//
		// if ($this->session->userdata('isLogIn') === true) 
        // redirect('dashboard'); 

		$data['base']=$this->config->item('base_url');
		
		$data['page_title'] = 'Home';
		$data['setting'] = $this->setting_model->read();

		// $data['content'] = $this->load->view('front-end/home',$data,true);
		$this->load->view('main_wrapper',$data);
	}

}
