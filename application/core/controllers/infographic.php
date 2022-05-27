<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Infographic extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'home_model'		
		]);
		
	}

	public function index()
    { 
        $data['page_title'] = 'Information Graphics';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		$data['webproject'] = $this->setting_model->webproject();
		$data['location'] = $this->home_model->query_pamblocation();
		$data['paname'] = $this->home_model->query_PA();
		// redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('login'));
        
		$data['content'] = $this->load->view('frontend/infographics',$data,true);
		$this->load->view('main_wrapper',$data);
    }
}