<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
* 
*/
class psgc_locations extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'psgc_model',
            'cave_model',
            
		]);

		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1
		)
		redirect('index.php/login');
	}

	public function regionList()
	{
		$data['page_title'] = "Philippine Standard Geographic Code";
		$data['regionList'] = $this->psgc_model->regionsList();
		$data['setting'] = $this->setting_model->read();

        //============= COUNT ==================//
        $data['countAllRegion'] = $this->psgc_model->countAllRegion();
        $data['countAllProvince'] = $this->psgc_model->countAllProvince();
        $data['countAllMunicipalities'] = $this->psgc_model->countAllMunicipalities();
        $data['countAllbarangay'] = $this->psgc_model->countAllbarangay();        
        //=========== END COUNT ================//


		$data['content'] = $this->load->view('main_server/psgc/psgc_region',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function region()
	{
		$data['page_title'] = "Philippine Standard Geographic Code";
		$data['setting'] = $this->setting_model->read();
       	$data['psgc'] = (object)$postData = [
            'id'			=> $this->input->post('id',true),
            'regionCode'	=> $this->input->post('region_code',true),
            'regionName'	=> $this->input->post('region_name',true),
            'regionDesc'    => $this->input->post('region_desc',true),
        ];
        $data['identify'] = $this->psgc_model->identify();
        $data['regionList'] = $this->psgc_model->regionsList();
        $data['content'] = $this->load->view('main_server/psgc/psgc_regionForm',$data,true);
		$this->load->view('main_server/dashboard',$data);

	}

	public function editr($id=null)
	{
        

		$data['page_title'] = "Philippine Standard Geographic Code";
		$data['setting'] = $this->setting_model->read();
		$data['psgc'] = $this->psgc_model->identify($id);

		$data['regionList'] = $this->psgc_model->regionsList();
        $data['content'] = $this->load->view('main_server/psgc/psgc_regionForm',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function save_region()
	{
		if ($this->input->post('id',true) == null)
        {
        $this->form_validation->set_rules('region_code','Region Code','required|is_unique[tbllocregion.regionCode]|min_length[9]|max_length[9]');
        	$this->form_validation->set_rules('region_name','Region Name','required|is_unique[tbllocregion.regionname]');
        	 $data['psgc'] = (object)$postData = [
            'id'			=> $this->input->post('id',true),
            'regionCode'	=> $this->input->post('region_code',true),
            'regionName'	=> $this->input->post('region_name',true),
            'regionDesc'    => $this->input->post('region_desc',true),
            ];
			}else{

			$this->form_validation->set_rules('region_code','Regions Code','min_length[9]|max_length[9]|callback_check_regionCodes');
        	$this->form_validation->set_rules('region_name','Region Name','required|callback_check_regionNames');
        	 $data['psgc'] = (object)$postData = [
            'id'			=> $this->input->post('id',true),
            'regionCode'	=> $this->input->post('region_code',true),
            'regionName'	=> $this->input->post('region_name',true),
            'regionDesc'    => $this->input->post('region_desc',true),
        ];
    	}
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageRegion'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->psgc_model->create($postData);
                if($query){
                $output['messageRegion'] = $this->input->post('region_name')." ".'New Region registered successfully';
                }else{
                $output['error'] = true;
                $output['messageRegion'] = 'New Region registered successfully';
                }
            }else{

                $query = $this->psgc_model->update($postData);

                if($query){
                $output['messageRegion'] = $this->input->post('region_name')." ".'Region successfully update';
                }else{
                $output['error'] = true;
                $output['messageRegion'] = 'Region successfully update';
                }
            }
        }
        echo json_encode($output);
	}

	public function get_regionList()
    {
    	$draw   = intval($this->input->get("draw"));
    	$start  = intval($this->input->get("start"));
    	$length = intval($this->input->get("length"));

    	$this->db->select("*");
	    $this->db->from('tbllocregion');
      	$query = $this->db->get();

    	$data = [];
    	foreach ($query->result() as $r) {
    		$data[] = array(
    			"",//this if for auto number
    			$r->regionName." (".$r->regionDesc.")",
				$r->regionCode,
				"<a type='button' class='btn btn-flat btn-warning' title='View Province' href='provinceList/".$r->id."'><i class='ion ion-eye'></i></a>"." ".
    			"<a type='button' class='btn btn-flat btn-success' href='editr/".$r->id."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
    			"<a type='button' class='btn btn-flat btn-danger btn-deleteregion' title='Delete' data-id=".$r->id."><i class='ion ion-android-delete'>&nbsp</i></a>"
    		);
    	}

    	$result = array(
    		"draw" => $draw,
    		"recordsTotal" => $query->num_rows(),
    		"recordsFiltered" => $query->num_rows(),
    		"data" => $data
    	);

    	echo json_encode($result);
    	exit();
    }

		public function delete_RegionfromList($id = null)
    {

        $output = array();
		
        // $sql = "DELETE FROM tbllocregion WHERE id = '$id'";
        $sql = "DELETE tbllocregion, tbllocprovince, tbllocmunicipality,tbllocbarangay FROM tbllocregion 
                LEFT JOIN tbllocprovince ON tbllocregion.id = tbllocprovince.regionid
                LEFT JOIN tbllocmunicipality ON tbllocprovince.id_p = tbllocmunicipality.provinceid
                LEFT JOIN  tbllocbarangay ON tbllocmunicipality.id_m = tbllocbarangay.municipalid
                WHERE      tbllocregion.id = '$id'";

		if($this->db->query($sql)){
			$output['status'] = 'success';
			$output['message'] = 'Region selected successfully deleted';
		}
		else{
			$output['status'] = 'error';
			$output['message'] = 'Something went wrong in deleting the data';
		}
		echo json_encode($output);
    }

// for callback_check_regionCodes set_rules validation_form
	function check_regionCodes($region_code) {
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->psgc_model->check_regionCode($id, $region_code);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_regionCodes', 'Region Code already exists');
        $response = false;
    }
    return $response;
	}

// for callback_check_regionNames set_rules validation_form
	function check_regionNames($region_name) {
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->psgc_model->check_regionName($id, $region_name);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_regionNames', 'Region Name already exists');
        $response = false;
    }
    return $response;
	}
//=============================================================//


	//======================================================================//
	//									PROVINCE 							//
	// =====================================================================//
	
	public function provinceList()
	{
        $id = $this->uri->segment('4');
		$data['page_title'] = "Philippine Standard Geographic Code";
		// $data['regionList'] = $this->psgc_model->regionsList();
        $data['provList'] = $this->psgc_model->identify_pc($id);
		$data['setting'] = $this->setting_model->read();
        $data['rc'] = $this->uri->segment('4');

        //============= COUNT ==================//
        $data['countAllProvince'] = $this->psgc_model->countAllProvince();
        $data['countAllMunicipalities'] = $this->psgc_model->countAllMunicipalities();
        $data['countAllbarangay'] = $this->psgc_model->countAllbarangay();
        $data['totalProvince'] = $this->psgc_model->countProvince($id);
        $data['totalMunicipality'] = $this->psgc_model->countMunisipyo($id);
        $data['totalBararangay'] = $this->psgc_model->countBarangay($id);
        //=========== END COUNT ================//

		$data['content'] = $this->load->view('main_server/psgc/psgc_province',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function get_provinceList($id=null)
    {
        
    	$draw   = intval($this->input->get("draw"));
    	$start  = intval($this->input->get("start"));
    	$length = intval($this->input->get("length"));
        
        if (!empty($id)) {
        $this->db->select("*");
        $this->db->from('tbllocprovince');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $this->db->where('regionid',$id);
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->provinceName,
                $r->provinceCode,                
                "<a type='button' class='btn btn-flat btn-warning' href='../municipalityList/".$r->id_p."' title='View Municipality' ><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-success' href='../editp/".$r->id_p."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteprovince' title='Delete' data-id=".$r->id_p."><i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        } else {

        $this->db->select("*");
        $this->db->from('tbllocprovince');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->provinceName,
                $r->provinceCode,                
                "<a type='button' class='btn btn-flat btn-warning' href='municipalityList/".$r->id_p."' title='View Municipality' ><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' name='edit' class='btn btn-flat btn-success' href='editp/".$r->id_p."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteprovince' title='Delete' data-id=".$r->id_p."><i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        }

    	$result = array(
    		"draw" => $draw,
    		"recordsTotal" => $query->num_rows(),
    		"recordsFiltered" => $query->num_rows(),
    		"data" => $data
    	);

    	echo json_encode($result);
    	exit();
    }

    public function province()
    {   
        $id = $this->uri->segment('4');
        $data['regionId'] = $this->uri->segment('4');
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['provList'] = $this->psgc_model->identify_pc($id);

        $data['alldata']    =   (object)$postData = [
            'id_p'            => $this->input->post('id_p',true),
        ];

        $data['content'] = $this->load->view('main_server/psgc/psgc_provinceForm',$data,true);
        $this->load->view('main_server/dashboard',$data);

    }

    public function editp($id=null)
    {
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['provList'] = $this->psgc_model->identify_pc($id);
        $data['alldata']    = $this->psgc_model->getProvince($id);
        // $data['regionList'] = $this->psgc_model->regionsList();
        $data['content'] = $this->load->view('main_server/psgc/psgc_provinceForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function delete_province($id = null)
    {

        $output = array();

        $sql = "DELETE tbllocprovince, tbllocmunicipality,tbllocbarangay FROM tbllocprovince 
                LEFT JOIN tbllocmunicipality ON tbllocprovince.id_p = tbllocmunicipality.provinceid
                LEFT JOIN  tbllocbarangay ON tbllocmunicipality.id_m = tbllocbarangay.municipalid
                WHERE      tbllocprovince.id_p = '$id'";
        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected province successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    // for callback_check_provinceCode set_rules validation_form
    function check_provinceCodes($province_code) {
    if($this->input->post('id_p'))
        $id = $this->input->post('id_p');
    else
        $id = '';
    $result = $this->psgc_model->check_provinceCode($id, $province_code);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_provinceCodes', 'Province Code already exists');
        $response = false;
    }
    return $response;
    }

    // for callback_check_regionNames set_rules validation_form
    function check_provinceNames($province_name) {
    if($this->input->post('id_p'))
        $id = $this->input->post('id_p');
    else
        $id = '';
    $result = $this->psgc_model->check_provinceName($id, $province_name);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_provinceNames', 'Province Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_province()
    {
        if ($this->input->post('id_p',true)==null)
        {
            $this->form_validation->set_rules('province_code','Province Code','required|is_unique[tbllocprovince.provinceCode]|min_length[9]');
            $this->form_validation->set_rules('province_name','Province Name','required|is_unique[tbllocprovince.provinceName]');
            $data['psgc'] = (object)$postData = [
            'id_p'            => $this->input->post('id_p',true),
            'regionid'        => $this->input->post('region_id',true),            
            'provinceCode'    => $this->input->post('province_code',true),
            'provinceName'    => $this->input->post('province_name',true),
            ];

        } else {

            $this->form_validation->set_rules('province_code','Province Code','required|max_length[9]|callback_check_provinceCodes');
            $this->form_validation->set_rules('province_name','Province Name','required|callback_check_provinceNames');
            $data['psgc'] = (object)$postData = [
            'id_p'            => $this->input->post('id_p',true),
            'regionid'        => $this->input->post('region_id',true),
            'provinceCode'    => $this->input->post('province_code',true),
            'provinceName'    => $this->input->post('province_name',true),
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageProvince'] = validation_errors();

        }else{
            if(empty($postData['id_p'])){
                $query = $this->psgc_model->create_province($postData);
                if($query){
                $output['messageProvince'] = $this->input->post('province_name')." ".'New Region registered successfully';
                }else{
                $output['error'] = true;
                $output['messageProvince'] = 'New Region registered successfully';
                }
            }else{

                $query = $this->psgc_model->update_province($postData);

                if($query){
                $output['messageProvince'] = $this->input->post('province_name')." ".'Region successfully update';
                }else{
                $output['error'] = true;
                $output['messageProvince'] = 'Region successfully update';
                }
            }
        }
        echo json_encode($output);
    }
	//==========================END PROVINCE=================================//
	

    //======================================================================//
    //                                  MUNICIPALITY                            //
    // =====================================================================//
    
    public function municipalityList()
    {

        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['pc'] = $this->uri->segment('4');
        $id = $this->uri->segment('4');
        $data['municipalList'] = $this->psgc_model->identify_muncode($id);
        $data['identifymc'] = $this->psgc_model->identify_mc2($id);

        //============= COUNT ==================//
        $data['countAllProvince'] = $this->psgc_model->countAllProvince();
        $data['countAllMunicipalities'] = $this->psgc_model->countAllMunicipalities();
        $data['countAllbarangay'] = $this->psgc_model->countAllbarangay();
        $data['countMunicipality'] = $this->psgc_model->countMunicipality($id);
        $data['totalBararangay'] = $this->psgc_model->countBarangay_by_province($id);
        //=========== END COUNT ================//

        $data['content'] = $this->load->view('main_server/psgc/psgc_municipality',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function get_municipalityList($id=null)
    {
        
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        if (!empty($id)) {
        $this->db->select("*");
        $this->db->from('tbllocmunicipality');
        $this->db->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $this->db->where('provinceid',$id);
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->municipalName,
                $r->municipalCode,                
                "<a type='button' class='btn btn-flat btn-warning' href='../barangayList/".$r->id_m."' title='View Barangay' ><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-success' href='../editm/".$r->id_m."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletemunicipality' title='Delete' data-id=".$r->id_m."> <i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        } else {

       $this->db->select("*");
        $this->db->from('tbllocmunicipality');
        $this->db->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->municipalName,
                $r->municipalCode,          
                "<a type='button' class='btn btn-flat btn-warning' href='barangayList/".$r->id_m."' title='View Barangay' ><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' name='edit' class='btn btn-flat btn-success' href='editm/".$r->id_m."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletemunicipality' title='Delete' data-id=".$r->id_m."><i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

    public function delete_municipality($id = null)
    {

        $output = array();
        $sql = "DELETE tbllocmunicipality,tbllocbarangay FROM tbllocmunicipality 
                LEFT JOIN  tbllocbarangay ON tbllocmunicipality.id_m = tbllocbarangay.municipalid
                WHERE      tbllocmunicipality.id_m = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected municipality successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function municipalities()
    {
       
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['regionId'] = $this->uri->segment('4');
        $id = $this->uri->segment('4');
        $data['identifyRecords']   = $this->psgc_model->identify_mc2($id);
        $data['alldata'] = (object)$postData = ['id_m' => $this->input->post('id_m',true)];        
        $data['content'] = $this->load->view('main_server/psgc/psgc_municipalityForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

     public function editm($id=null)
    {       
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['alldata'] = $this->psgc_model->getMunicipality($id);

        $data['content'] = $this->load->view('main_server/psgc/psgc_municipalityForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    // for callback_check_provinceCode set_rules validation_form
    function check_municipalCodes($municipalcode) {
    if($this->input->post('id_m'))
        $id = $this->input->post('id_m');
    else
        $id = '';
    $result = $this->psgc_model->check_municipalCode($id, $municipalcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_municipalCodes', 'Municipal Code already exists');
        $response = false;
    }
    return $response;
    }

    // for callback_check_regionNames set_rules validation_form
    function check_municipalNames($municipalname,$province_id) {
    if($this->input->post('id_m'))
        $id = $this->input->post('id_m');
    else
        $id = '';
    $result = $this->psgc_model->check_municipalName($id, $municipalname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_municipalNames', 'Municipal Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_municipal()
    {
        if ($this->input->post('id_m',true)==null) {
            $this->form_validation->set_rules('municipalcode','Municipal Code','required|is_unique[tbllocmunicipality.municipalCode]|min_length[9]');
            $this->form_validation->set_rules('municipalname','Municipal Name','required|is_unique[tbllocmunicipality.municipalName]');
            $data['psgc'] = (object)$postData = [
            'id_m'            => $this->input->post('id_m',true),
            'provinceid'      => $this->input->post('province_id',true),
            'regionid'      => $this->input->post('region_id',true),
            'municipalCode'    => $this->input->post('municipalcode',true),
            'municipalName'        => $this->input->post('municipalname',true),
            ];
        } else {
            $this->form_validation->set_rules('municipalcode','Municipal Code','required|callback_check_municipalCodes|min_length[9]');
            $this->form_validation->set_rules('municipalname','Municipal Name','required|callback_check_municipalNames');
            $data['psgc'] = (object)$postData = [
            'id_m'            => $this->input->post('id_m',true),
            'provinceid'      => $this->input->post('province_id',true),
            'regionid'      => $this->input->post('region_id',true),
            'municipalCode'    => $this->input->post('municipalcode',true),
            'municipalName'        => $this->input->post('municipalname',true),
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageMunicipal'] = validation_errors();

        }else{
            if(empty($postData['id_m'])){
                $query = $this->psgc_model->create_municipality($postData);
                if($query){
                $output['messageMunicipal'] = $this->input->post('municipalname')." ".'New Municipal registered successfully';
                }else{
                $output['error'] = true;
                $output['messageMunicipal'] = 'New Municipal registered successfully';
                }
            }else{

                $query = $this->psgc_model->update_municipality($postData);

                if($query){
                $output['messageMunicipal'] = $this->input->post('municipalname')." ".'Municipal successfully update';
                }else{
                $output['error'] = true;
                $output['messageMunicipal'] = 'Municipal successfully update';
                }
            }
        }
        echo json_encode($output);
    }
    //==========================END MUNICIPALITY=================================//


    //======================================================================//
    //                                  BARANGAY                            //
    // =====================================================================//
    
    public function barangayList()
    {
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['mc'] = $this->uri->segment('4');
        $id = $this->uri->segment('4');
        $data['identifybc'] = $this->psgc_model->identify_bc2($id);

        //============= COUNT ==================//
        $data['countAllProvince'] = $this->psgc_model->countAllProvince();
        $data['countAllMunicipalities'] = $this->psgc_model->countAllMunicipalities();
        $data['countAllbarangay'] = $this->psgc_model->countAllbarangay();
        $data['totalBararangay'] = $this->psgc_model->countBarangay_by_municipality($id);       
        //=========== END COUNT ================//

        $data['content'] = $this->load->view('main_server/psgc/psgc_barangay',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function get_barangayList($id=null)
    {
        
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        if (!empty($id)) {
        $this->db->select("*");
        $this->db->from('tbllocbarangay');
        $this->db->join('tbllocmunicipality','tbllocbarangay.municipalid = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $this->db->where('municipalid',$id);
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->barangayName,
                $r->barangayCode, 
                "<a type='button' class='btn btn-flat btn-success' href='../editb/".$r->id_b."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletebarangay' title='Delete' data-id=".$r->id_b."><i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        } else {

       $this->db->select("*");
        $this->db->from('tbllocbarangay');
        $this->db->join('tbllocmunicipality','tbllocbarangay.municipalid = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left');
        $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number                
                $r->barangayName,
                $r->barangayCode,          
                "<a type='button' name='edit' class='btn btn-flat btn-success' href='editb/".$r->id_m."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletebarangay' title='Delete' data-id=".$r->id_b."><i class='ion ion-android-delete'>&nbsp</i></a>"
            );
        }

        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

    public function delete_barangay($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tbllocbarangay WHERE id_b = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected barangay successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function barangay($id)
    {
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['alldata'] = (object)$postData = ['id_b' => $this->input->post('id_b',true)];
        $data['identifyRecords']   = $this->psgc_model->identify_bc2($id);

        $data['content'] = $this->load->view('main_server/psgc/psgc_barangayForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function editb($id=null)
    {
        $data['page_title'] = "Philippine Standard Geographic Code";
        $data['setting'] = $this->setting_model->read();
        $data['alldata'] = $this->psgc_model->getBarangay($id);

        $data['content'] = $this->load->view('main_server/psgc/psgc_barangayForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    
    // for callback_check_provinceCode set_rules validation_form
    function check_barangayCodes($barangaycode) {
    if($this->input->post('id_b'))
        $id = $this->input->post('id_b');
    else
        $id = '';
    $result = $this->psgc_model->check_barangayCode($id, $barangaycode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_barangayCodes', 'Barangay Code already exists');
        $response = false;
    }
    return $response;
    }

    // for callback_check_regionNames set_rules validation_form
    public function check_barangayName_up($barangayname) {
    if($this->input->post('id_b'))
        $id = $this->input->post('id_b');
    else
        $id = '';
    $result = $this->psgc_model->check_barangayName_update($id, $barangayname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_barangayName_up', 'Barangay Name already exists');
        $response = false;
    }
    return $response;
    }

    // --------------------------------------------------------------------------//
    public function check_barangayNames_add($barangayname,$municipal_id) {
    if($this->input->post('id_b'))
        $id = $this->input->post('id_b');
    else
        $id = '';
        $result = $this->psgc_model->check_barangayName_add($id, $barangayname, $municipal_id);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_barangayNames_add', 'Barangay Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_barangay()
    {
        if ($this->input->post('id_b',true)==null) {
            $this->form_validation->set_rules('barangaycode','Barangay Code','required|is_unique[tbllocbarangay.barangayCode]|min_length[9]');
            $this->form_validation->set_rules('barangayname','Barangay Name','required|callback_check_barangayNames_add');
            $data['psgc'] = (object)$postData = [
            'id_b'          => $this->input->post('id_b',true),
            // 'regionid'      => $this->input->post('region_id',true),
            // 'provinceid'    => $this->input->post('province_id',true),
            'municipalid'   => $this->input->post('municipal_id',true),
            'barangayCode'  => $this->input->post('barangaycode',true),
            'barangayName'  => $this->input->post('barangayname',true),
            ];
        } else {
            $this->form_validation->set_rules('barangaycode','Barangay Code','required|callback_check_barangayCodes|min_length[9]');
            $this->form_validation->set_rules('barangayname','Barangay Name','required|callback_check_barangayName_up');
            $data['psgc'] = (object)$postData = [
            'id_b'          => $this->input->post('id_b',true),
            // 'regionid'      => $this->input->post('region_id',true),
            // 'provinceid'    => $this->input->post('province_id',true),
            'municipalid'   => $this->input->post('municipal_id',true),
            'barangayCode'  => $this->input->post('barangaycode',true),
            'barangayName'  => $this->input->post('barangayname',true),
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageBarangay'] = validation_errors();

        }else{
            if(empty($postData['id_b'])){
                $query = $this->psgc_model->create_barangay($postData);
                if($query){
                $output['messageBarangay'] = $this->input->post('barangayname')." ".'New Barangay registered successfully';
                }else{
                $output['error'] = true;
                $output['messageBarangay'] = 'New Barangay registered successfully';
                }
            }else{

                $query = $this->psgc_model->update_barangay($postData);

                if($query){
                $output['messageBarangay'] = $this->input->post('barangayname')." ".'Barangay successfully update';
                }else{
                $output['error'] = true;
                $output['messageBarangay'] = 'Barangay successfully update';
                }
            }
        }
        echo json_encode($output);
    }
    //==========================END BARANGAY=================================//
}