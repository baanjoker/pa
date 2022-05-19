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
            'dashboard_model',
			'psgc_model',
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
            redirect('users/dashboard'); 
        if ($this->session->userdata('user_role') == 3) 
        	    redirect('pasu/dashboard'); 
        if ($this->session->userdata('user_role') == 4) 
                redirect('cenro/dashboard');
        if ($this->session->userdata('user_role') == 5) 
                redirect('penro/dashboard');

		$data['page_title'] = "DASHBOARD";
		$data['setting'] = $this->setting_model->read();
		$data['cave'] = $this->cave_model->count_cave();
		$data['family'] = $this->cave_model->count_family();
		$data['count_pamain'] = $this->cave_model->count_pamain();
		$userid = $this->session->userdata('user_id');
		$data['lastlog'] = $this->login_model->read_lastlogs($userid);
        $data['queryMe'] = $this->dashboard_model->get_by_map(); 
		
		$data['content'] = $this->load->view('main_server/dash',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function count_chart()
	{
		// $data = $this->cave_model->get_all_regions(); 
 
  //       //         //data to json 
 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "Category", 
  //           "pattern" => "", 
  //           "type" => "string" 
  //       ); 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "Total", 
  //           "pattern" => "", 
  //           "type" => "number" 
  //       ); 
  //       foreach($data as $cd) 
  //           { 
  //           $responce->rows[]["c"] = array( 
  //               array( 
  //                   "v" => "$cd->categoryName", 
  //                   "f" => null 
  //               ) , 
  //               array( 
  //                   "v" => (int)$cd->total, 
  //                   "f" => null 
  //               ) 
  //           ); 
  //           } 
 
  //       echo json_encode($responce);
	}

	public function count_chart_classification()
	{
		// $data = $this->cave_model->get_by_classification(); 
 
  //       //         //data to json 
 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "Classification", 
  //           "pattern" => "", 
  //           "type" => "string" 
  //       ); 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "Total", 
  //           "pattern" => "", 
  //           "type" => "number" 
  //       ); 
  //       foreach($data as $cd) 
  //           { 
  //           $responce->rows[]["c"] = array( 
  //               array( 
  //                   "v" => "$cd->nipDesc", 
  //                   "f" => null 
  //               ) , 
  //               array( 
  //                   "v" => (int)$cd->total, 
  //                   "f" => null 
  //               ) 
  //           ); 
  //           } 
 
  //       echo json_encode($responce);
	}

	public function count_chart_cpa()
	{
		// $data = $this->cave_model->get_by_cpa(); 
 
  //       //         //data to json 
 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "cpa", 
  //           "pattern" => "", 
  //           "type" => "string" 
  //       ); 
  //       $responce->cols[] = array( 
  //           "id" => "", 
  //           "label" => "Total", 
  //           "pattern" => "", 
  //           "type" => "number" 
  //       ); 
  //       foreach($data as $cd) 
  //           { 
  //           $responce->rows[]["c"] = array( 
  //               array( 
  //                   "v" => "$cd->CPABIdesc", 
  //                   "f" => null 
  //               ) , 
  //               array( 
  //                   "v" => (int)$cd->total, 
  //                   "f" => null 
  //               ) 
  //           ); 
  //           } 
 
  //       echo json_encode($responce);
	}

public function count_chart_map()
    {
        // $data = $this->dashboard_model->get_by_map(); 
 
        // //         //data to json 
 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Code", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Name", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        //  $responce->cols[] = array( 
        //     "id" => "Value", 
        //     "label" => "Value", 
        //     "pattern" => "", 
        //     "type" => "number" 
        // ); 
        // foreach($data as $cd) 
        //     { 
        //     $responce->rows[]["c"] = array( 
        //         array( 
        //             "v" => "$cd->code", 
        //             "f" => null 
        //         ) , 
        //         array( 
        //             "v" => "$cd->regionName", 
        //             "f" => null 
        //         ) ,
        //         array( 
        //             "v" => "$cd->id", 
        //             "f" => null 
        //         )  
        //     ); 
        //     } 
 
        // echo json_encode($responce);
    }
	 public function logout()
    {  
        $this->session->sess_destroy();
        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
		$now = date('Y-m-d H:i:s');

		if ($this->session->userdata('user_role') == 1) {
			$personnel = 'Administrator';
		} else {
			$personnel = 'Users';
		}
		$fullname = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
		$data['login_log']=(object)$postDataLogs = 
		[
			'account_id'	=>	$this->session->userdata('user_id'),
			'user_role'		=>	$this->session->userdata('user_role'),
			'status'		=>	'logout',
			'logs'			=>	$this->session->userdata('fullname')." ".$this->session->userdata('lastnames')." ".'Logout',
			'date_logs'		=>	$now,
		];

		$data['login_log']=(object)$postDataLogsUpdate = 
		[
			'user_id'	=>	$this->session->userdata('user_id'),			
			'last_update'		=>	$now,
		];
        if (!empty($this->session->userdata('user_id'))) {
            $query_loginlogs = $this->login_model->login_logs($postDataLogs);
            $query_loginlogs = $this->login_model->update_logs($postDataLogsUpdate);
        } else {
        redirect('login');
            # code...
        }
        
        redirect('login');
    } 
}