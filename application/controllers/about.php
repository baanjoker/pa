<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class about extends CI_Controller
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
		$data['page_title'] = 'About';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		$data['about'] = $this->setting_model->about();

		// redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('login'));
        
		$data['content'] = $this->load->view('frontend/about',$data,true);
		$this->load->view('main_wrapper',$data);
	}
}