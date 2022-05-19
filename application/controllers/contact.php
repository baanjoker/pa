<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class contact extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model'
		]);
	}

	public function index(){		
		$data['page_title'] = 'Contact Us';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		// redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('login'));
        
		$data['content'] = $this->load->view('frontend/contact',$data,true);
		$this->load->view('main_wrapper',$data);
	}
}