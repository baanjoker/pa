<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
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
		$data['base']=$this->config->item('base_url');		
		$data['page_title'] = 'News and Events';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		$data['webslide'] = $this->setting_model->webslide();
		$data['webproject'] = $this->setting_model->webproject();
		$data['location'] = $this->home_model->query_pamblocation();
		$data['paname'] = $this->home_model->query_PA();
		$data['news_d'] = $this->home_model->query_new_list();
        // redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('maintenance'));

		$data['content'] = $this->load->view('frontend/news',$data,true);
		$this->load->view('main_wrapper',$data);
	}

	public function details($id=null){
		$data['base']=$this->config->item('base_url');		

		$data['page_title'] = 'News and Events';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		$data['webslide'] = $this->setting_model->webslide();
		$data['webproject'] = $this->setting_model->webproject();
		$data['location'] = $this->home_model->query_pamblocation();
		$data['paname'] = $this->home_model->query_PA();
		$data['item'] = $this->home_model->query_get_news($id);

		  if ($data['webSetting']->status == 0) 
            redirect(base_url('maintenance'));

        $data['content'] = $this->load->view('frontend/news_details',$data,true);
		$this->load->view('main_wrapper',$data);
	}
	

}
