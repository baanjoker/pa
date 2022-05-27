<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class Dashboard extends CI_Controller
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
        		
        $user_region = $this->session->userdata('region');
        $user_role	 = $this->session->userdata('user_role');
        $user_id	 = $this->session->userdata('user_id'); 
        $gencode     = $this->input->post('gencode');       

        
        $data['quarter'] = $this->dashboard_model->QuarterlyList(); 
        $data['regions'] = $this->dashboard_model->region_display($user_region);
 		$data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['countPa'] = $this->dashboard_model->countPa($user_id);
 		$data['blood'] = $this->dashboard_model->blood_list();
		$data['gender'] = $this->dashboard_model->gender_list();
		$data['region']	= $this->dashboard_model->region_list();
        $data['yearList'] = $this->dashboard_model->yearList();
        $data['page_title'] = "Dashboard";
		$data['setting'] = $this->setting_model->read();
        $data['year'] = $this->dashboard_model->getYear();
        $data['yearListed'] = $this->dashboard_model->yearListed();
        $data['pamain'] = $this->dashboard_model->getPA($user_id);
        $data['paList'] = $this->dashboard_model->paList();
        $data['paListvisitor'] = $this->dashboard_model->paListvisitor();
        $data['durations'] =[
            ''  => 'Select',
            '+1 Year' => '+1 Year',
            '+3 Years' => '+3 Years',
            '5 Years' => '+5 Years',
            '+10 Years' => '+10 Years'
            ];


		$data['content'] = $this->load->view('pasu/dashboard',$data,true); 
		$this->load->view('pasu/main_wrapper',$data);
	}

    public function annualgraphdisplay()
    {
        $year = $this->input->post('year');
        $year2 = $this->input->post('year2');
        $pa = $this->input->post('pa');
        $user_id     = $this->session->userdata('user_id'); 
        $queryyears = $this->dashboard_model->queryyear($year,$year2);        
        $query1 = $this->dashboard_model->queryannual1($user_id,$year,$year2,$pa);
        $query2 = $this->dashboard_model->queryannual2($user_id,$year,$year2,$pa);
        $query3 = $this->dashboard_model->queryannual3($user_id,$year,$year2,$pa);

        $years = array();
        $amount = array();
        $amountothers = array();
        // foreach ($queryyears as $ff) {           
            foreach ($query1 as $aa) {
                foreach ($query2 as $bb) {
                    foreach ($query3 as $cc) {
                    if ($aa->year == $bb->income_year && $aa->year == $cc->disbursement_year) { 
                        $amount[] =  (!empty($aa->ggtotal)|| $aa->ggtotal == 0.00 ?$aa->ggtotal:0) + (!empty($bb->other_amounts)|| $bb->other_amounts == 0.00 ?$bb->other_amounts:0) + (!empty($cc->disburse_amount)|| $cc->disburse_amount == 0.00 ?$cc->disburse_amount:0);                                       
                        $years[] = $aa->date_year_income;
                        }
                    }
                }
            }            
        // }

        foreach ($query2 as $bb) {
            $amountothers[] = $bb->other_amounts;
        }

        $data['messageyear'] = $years; 
        $data['messageamount'] = $amount; 
        $data['messageamountother'] = $amountothers; 

        echo json_encode($data);

    }

    public function visitorsBarGraph()
    {
        $year = $this->input->post('year');
        $quarter = $this->input->post('quarter');
        $pa = $this->input->post('pa');
        $user_id     = $this->session->userdata('user_id'); 
        $query1 = $this->dashboard_model->queryVisitors($year,$quarter,$pa,$user_id);
        $query2 = $this->dashboard_model->queryVisitors($year,$quarter,$pa,$user_id);
        $query3 = $this->dashboard_model->queryVisitorsMonth($year,$quarter,$pa,$user_id);
        $male = array();
        $female = array();
        $month = array();
        $month2 = array();

        if (!empty($query1)) 
        {
            foreach ($query1 as $row) {
                $female[] = $row->totalFemale;
                $month[] = $row->month;

            }
            foreach ($query2 as $row2) {
                $male[] = $row2->totalMale;
                $month2[] = $row2->month;

            }

            // foreach ($query3 as $row3) {
            //     $month[] = $row3->month;
            // }

        }

        $data['messageMale'] = $male;                  
        $data['messageFemale'] = $female;                  
        $data['messageMonth'] = $month;                  
        $data['status'] = true;
        echo json_encode($data);

    }
    
    public function chartData()
    {
        $paid = $this->input->post('paid');    
        $yearid = $this->input->post('yearid');    
        $user_id     = $this->session->userdata('user_id'); 
        $date_months = $this->dashboard_model->queryresultbyyear($user_id,$paid,$yearid);
        $incomes = $this->dashboard_model->queryresultbyyears($user_id,$paid,$yearid);

        $other = $this->dashboard_model->queryresultOthersbyyears($user_id,$paid,$yearid);
        $dis = $this->dashboard_model->queryresultdisbyyears($user_id,$paid,$yearid);

        $month = array();
        $month1 = array();
        $month2 = array();
        $amount1 = array();
        $amount2 = array();
        $amount3 = array();
        $year = array();

            foreach ($incomes as $bb) {
                foreach ($other as $aa) {
                    foreach ($dis as $cc) {
                        if ($aa->income_month == $bb->date_month_income && $aa->income_month == $cc->disbursement_month) {
                        $amount1[] = (!empty($bb->incomeit)?$bb->incomeit:0) + (!empty($aa->othersum)|| $aa->othersum == 0.00 ?$aa->othersum:0) + (!empty($cc->dissum)|| $cc->dissum == 0.00 ?$cc->dissum:0);
                        $month1[] = $bb->month;
                        }
                    }
                }
            }
        $data['messagemonth'] = $month1;  
        $data['messageyear'] = $year;  
        $data['messageamount'] = $amount1;                  
        $data['status'] = true;
        echo json_encode($data);
        
    }

    public function chartdatabymonth()
    {
        $user_id    =   $this->session->userdata('user_id');        
        $paid       =   $this->input->post('paid');
        $yearid     =   $this->input->post('yearid');
        $quarter    =   $this->input->post('quarter');
        $super = $this->dashboard_model->incomefeebymonth($paid,$yearid,$quarter);
        $others = $this->dashboard_model->incomeotherfeebymonth($paid,$yearid,$quarter);
        $disburse = $this->dashboard_model->incomedistributionfeebymonth($paid,$yearid,$quarter);

        $entrance = array();
        $facility = array();
        $resource = array();
        $concession = array();
        $other = array();
        $distribution = array();

        if (!empty($super)) {
            foreach ($super as $trys) {
                $entrance[] = $trys->total_entrance;   
                $facility[] = $trys->total_facility;
                $resource[] = $trys->total_resource;        
                $concession[] = $trys->total_concession;        
            }
            foreach ($others as $oth) {
                $other[] = $oth->total_others;   
            }
            foreach ($disburse as $dis) {
                $distribution[] = $dis->total_distribution;
            }
        }
        $data['messageentrance'] = $entrance;  
        $data['messagefacility'] = $facility;  
        $data['messageresource'] = $resource;  
        $data['messageconcession'] = $concession;  
        $data['messageother'] = $other;  
        $data['messagedisbursement'] = $distribution;  
        $data['status'] = true;
        echo json_encode($data);


    }

    public function getYearadd()
        {
        $selectYear = $this->input->post('selectYear');
        $add = date("Y",strtotime('+15 years')) + 15;
        // $years = range($add,1900);
        $years = range(date("Y",strtotime('+5 years')),$selectYear);        

            // $list[''] = "Year";
            $option = "<option value=\"\">Select Year</option>";

                if (!empty($years)) {
                    foreach ($years as $value) {
                        // $list[$value] = $value;
                    $option .= "<option value=\"$value\">$value</option>";

            }
            // return $list;
            $data['lists'] = $option;  
            $data['status'] = true;
        } else {
            // return false;
            $data['status'] = false;
        }

        echo json_encode($data);

    }

    public function getYearaddvisitor()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('paid');
            if (!empty($generatedcode)) {
             $query = $this->db->select('*')
             ->from('tblpaipafvisitors')  
             ->where('tblpaipafvisitors.generatedcode',$generatedcode)
             ->group_by('date_year')
                ->get();

            $option = "<option value=\"\">Select Year</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $year) {
                    $option .= "<option value=\"$year->date_year\">$year->date_year</option>";
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No record available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "";
            $data['status'] = null;
        }
        echo json_encode($data);

    }

    public function getYear()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('paid');
            if (!empty($generatedcode)) {
             $query = $this->db->select('*')
             ->from('tblpaipafincome')  
             ->where('tblpaipafincome.generatedcode',$generatedcode)
             ->group_by('date_year_income')
                ->get();

            $option = "<option value=\"\">Select Year</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $year) {
                    $option .= "<option value=\"$year->date_year_income\">$year->date_year_income</option>";
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No record available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "";
            $data['status'] = null;
        }
        echo json_encode($data);
    }

    public function income(){
        $data['page_title'] = "Dashboard";
        $year1 = $this->input->post('yearOne');
        $year2 = $this->input->post('yearTwo');
        $user_id = $this->session->userdata('user_id');
        
        $earning1 = $this->dashboard_model->getEarning($year1,$user_id);
        $earning2 = $this->dashboard_model->getEarning($year2,$user_id);

        $total1= array();
        $total2= array();

        foreach ($earning1 as $tot) {
            $total1[] = $tot->grand_total;
        }

        foreach ($earning2 as $tot) {
            $total2[] = $tot->grand_total;
        }   

        $bulan = $this->dashboard_model->getMonth();
        $label = array();
        foreach ($bulan as $m) {
            $label[] = $m->month;
        }

        //print_r($label);

        $data['label'] = json_encode($label);//json_encode($label);
        $data['year'] = $this->dashboard_model->getYear();
        $data['result1'] = json_encode($total1);
        $data['result2'] = json_encode($total2);
        $data['one'] = $year1;
        $data['two'] = $year2;

        $data['content'] = $this->load->view('pasu/chart',$data,true);
        $this->load->view('pasu/pasu_wrapper',$data);
    }

    
    public function count_chart()
    {
        $user_region = $this->session->userdata('region');
        $data = $this->dashboard_model->get_all_regions($user_region); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Category", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->categoryName", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    }

    public function count_chart_classification()
    {
        $user_region = $this->session->userdata('region');
        $data = $this->dashboard_model->get_by_classification($user_region); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Classification", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->nipDesc", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
    }

    public function count_chart_cpa()
    {
        $user_region = $this->session->userdata('region');
        $data = $this->dashboard_model->get_by_cpa($user_region); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "cpa", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->CPABIdesc", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->total, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce);
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
		$fullastname = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
		$data['login_log']=(object)$postdataLogs = 
		[
			'user_id'	=>	$this->session->userdata('user_id'),
			'user_role'		=>	$this->session->userdata('user_role'),
			'status'		=>	'logout',
			'logs'			=>	$this->session->userdata('fullastname')." ".$this->session->userdata('lastnames')." ".'Logout',
			'date_logs'		=>	$now,
		];

		$data['login_log']=(object)$postdataLogsUpdate = 
		[
			'user_id'	=>	$this->session->userdata('user_id'),			
			'last_update'		=>	$now,
		];

        $query_loginlogs = $this->login_model->login_logs($postdataLogs);
		$query_loginlogs = $this->login_model->update_logs($postdataLogsUpdate);
        redirect('login');
    } 

     public function update()
    {
        if(!empty($_FILES['file-upload']['name'])){                
            $config ['upload_path'] = 'assets/img/profile';
            $config['file_name'] = $_FILES['file-upload']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('file-upload')){
                $uploaddata = $this->upload->data();
                $filenames = $uploaddata['file_name'];
            }
        }

        if ($this->input->post('user_id',true)==null) {
            $this->form_validation->set_rules('firstname','First Name','trim|required');
            $this->form_validation->set_rules('lastname','Last Name','trim|required');         
            $this->form_validation->set_rules('address','Home address','trim|required');
            $this->form_validation->set_rules('email','Email address','trim|valid_email|required|callback_check_emails');

        $data['profile'] = (object)$postdata = [    
            'user_id'=>  $this->input->post('user_id',true),
            'firstname'     =>  $this->input->post('firstname',true),
            'middlename'     =>  $this->input->post('mname',true),
            'lastname'     =>  $this->input->post('lastname',true),
            'dob' =>  $this->input->post('dob',true),
            'address'   =>  $this->input->post('address',true),
            'landline'  =>  $this->input->post('landline',true),
            'mobile'   =>  $this->input->post('mobile',true),
          	'designation'   =>  $this->input->post('designation',true),
            'email'     =>  $this->input->post('email',true),
            'picture'   => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        } else {
            $this->form_validation->set_rules('firstname','First Name','trim|required');
            $this->form_validation->set_rules('lastname','Last Name','trim|required');         
            $this->form_validation->set_rules('address','Home address','trim|required');
            $this->form_validation->set_rules('email','Email address','trim|valid_email|required|callback_check_emails');

            $data['profile'] = (object)$postdata = [        
            'user_id'	=>  $this->input->post('user_id',true),  
            'firstname' =>  $this->input->post('firstname',true),
            'middlename'     =>  $this->input->post('mname',true),
            'lastname'  =>  $this->input->post('lastname',true),
            'dob' 		=>  $this->input->post('dob',true),
            'address'   =>  $this->input->post('address',true),
            'mobile'   	=>  $this->input->post('mobile',true),
            'landline'	=>	$this->input->post('landline',true),
            'designation'   =>  $this->input->post('designation',true),
            'email'     =>  $this->input->post('email',true),
            'region'	=>	$this->input->post('region',true),
            // 'password'   =>  hash('sha256',$this->input->post('password',true)),         
            'picture'   => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        }

        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageuser'] = validation_errors();
        }else{
            if(empty($postdata['user_id'])){      

                $query = $this->dashboard_model->createMain($postdata);
                if($query){
                $output['messagemain'] = $this->input->post('firstname')." ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagemain'] = 'Successfully registered';
                }

            }else{

                $query = $this->dashboard_model->updateProfile($postdata);

                if($query){
                $output['messageuser'] = $this->input->post('firstname')." ".'successfully update';
                }else{
                $output['error'] = true;
                $output['messageuser'] = 'Successfully Update';
                }
            }
        }
        echo json_encode($output);
    }

    function check_emails($email) {        
    if($this->input->post('user_id'))
        $id = $this->input->post('user_id');
    else
        $id = '';
    $result = $this->dashboard_model->check_email($id, $email);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_emails', 'Email address already exists');
        $response = false;
    }
    return $response;
    }

    public function update_password(){
        if ($this->input->post('user_id',true))        {
            
            $rules = array(
            [           
                'field' =>  'newpassword' ,
                'label' =>  'New Password',
                'rules' =>  'required|trim|callback_valid_password'
            ],
            [
                'field' =>  'repassword' ,
                'label' =>  'Re-type Password',
                'rules' =>  'required|trim|matches[newpassword]'
            ]);

            $this->form_validation->set_rules($rules);

            $data['user']=(object)$postdata = 
            [
            'user_id'    =>  $this->input->post('user_id',true),
            'password'      =>  hash('sha256',$this->input->post('newpassword'))
            ];
           
            if ($this->form_validation->run() == false) {
                $output['error'] = true;
                $output['messagePass'] = validation_errors();
            }else{
                if(!empty($postdata['user_id'])){
                    $query = $this->profile_model->updatePass($postdata);
                        if($query){
                        $output['messagePass'] = 'Account successfully change password, your account has been automatically logout!';
                        $this->session->sess_destroy();
                        
                        }else{
                        $output['error'] = true;
                        $output['messagePass'] = 'Account successfully update password';
                    } 
                }
            }
        }
        echo json_encode($output);
    }

    public function valid_password($newpassword = '')
    {
        $password = trim($newpassword);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }

   
}