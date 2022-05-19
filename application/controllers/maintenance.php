<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class maintenance extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model'
		]);
	}

	public function index()
	{
		$data['webSetting'] = $this->setting_model->webSetting();
		// redirect if website status is disabled
        if ($data['webSetting']->status == 1) 
            redirect(base_url('home'));

		$this->load->view('maintenance');
	}

}