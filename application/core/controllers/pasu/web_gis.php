<?php defined('BASEPATH') OR exit ('No direct access script allowed!');
/**
 * 
 */
class web_gis extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();        
		$this->load->model([
			'pasu/pamain_model',
			'pasu/dashboard_model',
			'pasu/web_gis/gis_main'
		]);
        

		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
        redirect('login');
	}

	public function index(){
		$data['page_title'] = 'Create Protected Area';

		// $data['content'] = $this->load->view('web_gis/main_wrapper',$data,TRUE);
		$this->load->view('web_gis/main_wrapper',$data);
	}

	public function ctrl_gis(){
		$datas = $this->gis_main->gis_theat();
		echo json_encode($datas);
	}

	public function geojsonToText(){
		$datas_json = $this->gis_main->geojsonTotxt();
		echo json_encode($datas_json);
	}
}