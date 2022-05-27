<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class PAReport extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'pasu/dashboard_model',
			'pasu/pamain_model'
		]);
		
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
		redirect('login');
	}

	public function index()
	{
		$data['page_title'] = 'Protected Area Report';
		$data['paList']			= $this->pamain_model->paListReport();
		$data['countbio'] =[
            ''  => 'All',
            '1' => '1',
            '5' => '5',
            '10' => '10',
            '15' => '15',
            '20' => '20'
            ];
		$data['content'] = $this->load->view('pasu/report/pareport',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
	}

}