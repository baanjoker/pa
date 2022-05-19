<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

/**
 * 
 */
class library extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'library_model',
            'login_model',
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

    public function index()
    {
        $data['page_title'] = "Library Setting";
        $data['setting'] = $this->setting_model->read();
        $userid = $this->session->userdata('user_id');
        $data['lastlog'] = $this->login_model->read_lastlogs($userid);

        $data['content'] = $this->load->view('main_server/libraries',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }
// ==================================================================//
//                          DEFINITION OF TERM                       //
// ================================================================= //
	public function defterm()
	{
		$data['page_title'] = "Definition of Terms";
		$data['setting'] = $this->setting_model->read();

		$data['content'] = $this->load->view('main_server/extra/defterm',$data,true);		
		$this->load->view('main_server/dashboard',$data);
	}

	public function load_DefTerm()
    {
    	$draw   = intval($this->input->get("draw"));
    	$start  = intval($this->input->get("start"));
    	$length = intval($this->input->get("length"));

    	$query = $this->db->get("tbldefterms");

    	$data = [];
    	foreach ($query->result() as $r) {
    		$data[] = array(
    			"",//this if for auto number
    			$r->keywords,
    			$r->definition,
    			"<a type='button' class='btn btn-flat btn-success' href='././dtform/".$r->id."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
    			"<a type='button' class='btn btn-flat btn-danger btn-deletedefterm' title='Delete' data-id=".$r->id."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_DefTerm($id = null) 
    {

        $output = array();
		 $sql = "DELETE FROM tbldefterms WHERE id = '$id'";

		if($this->db->query($sql)){
			$output['status'] = 'success';
			$output['message'] = 'Data deleted successfully';
		}
		else{
			$output['status'] = 'error';
			$output['message'] = 'Something went wrong in deleting the data';
		}
		echo json_encode($output);
    }

    public function dtform($id=null)
    {
    	$data['identifier'] = $this->uri->segment(4);
    	$data['page_title'] = 'Definition of Terms';
		$data['setting'] = $this->setting_model->read();

		$data['dtList'] = $this->library_model->getDatadefterm($id);

		$data['content'] = $this->load->view('main_server/extra/dtform',$data,TRUE);
		$this->load->view('main_server/dashboard',$data);
    }

    public function save_dt()
    {
    	if ($this->input->post('id',true) == null) 
		{
			$this->form_validation->set_rules('keywords','Keywords','required');
			$this->form_validation->set_rules('definition','Definition of Terms','required');
			$data['dataResult'] = (object)$postData = [
				'id'			=>	$this->input->post('id',true),
				'keywords'		=>	$this->input->post('keywords',true),
				'definition'	=>	$this->input->post('definition',true)
			];
		} else {
			$this->form_validation->set_rules('keywords','CV CODE','required');
			$this->form_validation->set_rules('definition','Definition of Terms','required');
			$data['dataResult'] = (object)$postData = [
				'id'		=>	$this->input->post('id',true),
				'keywords'		=>	$this->input->post('keywords',true),
				'definition'	=>	$this->input->post('definition',true)
			];
		}
		 if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagedt'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->library_model->createdefterm($postData);
                if($query){
                $output['messagedt'] = 'Successfully Registered';
                }else{
                $output['error'] = true;
                $output['messagedt'] = 'Successfully Registered';
                }
            }else{

                $query = $this->library_model->updatedefterm($postData);

                if($query){
                $output['messagedt'] = 'Successfully update record';
                }else{
                $output['error'] = true;
                $output['messagedt'] = 'Successfully update record';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          CITE                                     //
// ================================================================= //

public function cite()
    {
        $data['page_title'] = "CITE Status";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/cite',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_cite()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblcitestatus");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->CitesCode,
                $r->Description,
                "<a type='button' class='btn btn-flat btn-success' href='././citeform/".$r->id."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletecite' title='Delete' data-id=".$r->id."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_cite($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblcitestatus WHERE id = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function citeform($id=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'CITE Status';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatacite($id);

        $data['content'] = $this->load->view('main_server/extra/citeform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_Codes($citescode) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->library_model->check_CodeCite($id, $citescode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_Codes', 'CITE Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_names($description) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->library_model->check_NameCite($id, $description);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_cite()
    {
        if ($this->input->post('id',true) == null)
        {
            $this->form_validation->set_rules('citescode','CITE Codes','required|is_unique[tblcitestatus.CitesCode]');
            $this->form_validation->set_rules('description','Name','required|is_unique[tblcitestatus.Description]');
            $data['cites'] = (object)$postData = [
                'id'            =>  $this->input->post('id',true),
                'CitesCode'     =>  $this->input->post('citescode',true),
                'Description'   =>  $this->input->post('description',true)
            ];
        } else {
            $this->form_validation->set_rules('citescode','CITE Codes','required|callback_check_Codes');
            $this->form_validation->set_rules('description','Name','required|callback_check_names');
            $data['cites'] = (object)$postData = [
                'id'            =>  $this->input->post('id',true),
                'CitesCode'     =>  $this->input->post('citescode',true),
                'Description'   =>  $this->input->post('description',true)
            ];
        }
         if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagecite'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->library_model->createcite($postData);
                if($query){
                $output['messagecite'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagecite'] = 'Successfully Registered';
                }
            }else{

                $query = $this->library_model->updatecite($postData);

                if($query){
                $output['messagecite'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully update record';
                }else{
                $output['error'] = true;
                $output['messagecite'] = 'Successfully update record';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          CMS                                      //
// ================================================================= //

public function cms()
    {
        $data['page_title'] = "Conservation of Migratory Species of Wild Animals";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/cms',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_cms()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblcmsstatus");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->CMSCode,
                $r->Description,
                "<a type='button' class='btn btn-flat btn-success' href='././cmsform/".$r->id_cms."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletecms' title='Delete' data-id=".$r->id_cms."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_cms($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblcmsstatus WHERE id_cms = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function cmsform($id_cms=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Conservation of Migratory Species of Wild Animals';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatacms($id_cms);

        $data['content'] = $this->load->view('main_server/extra/cmsform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesCms($cmscode) {        
    if($this->input->post('id_cms'))
        $id_cms = $this->input->post('id_cms');
    else
        $id_cms = '';
    $result = $this->library_model->check_CodeCms($id_cms, $cmscode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesCms', 'CMS Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesCms($description) {        
    if($this->input->post('id_cms'))
        $id_cms = $this->input->post('id_cms');
    else
        $id_cms = '';
    $result = $this->library_model->check_NameCms($id_cms, $description);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesCms', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_cms()
    {
        if ($this->input->post('id_cms',true) == null) 
        {
            $this->form_validation->set_rules('cmscode','CMS CODE','required|max_length[5]|is_unique[tblcmsstatus.CMSCode]');
            $this->form_validation->set_rules('description','Description','required|is_unique[tblcmsstatus.Description]');
            $data['cms'] = (object)$postData = [
                'id_cms'        =>  $this->input->post('id_cms',true),
                'CMSCode'       =>  $this->input->post('cmscode',true),
                'Description'   =>  $this->input->post('description',true)
            ];
        } else {
            $this->form_validation->set_rules('cmscode','CMS CODE','required|max_length[5]|callback_check_CodesCms');
            $this->form_validation->set_rules('description','Description','required|callback_check_namesCms');
            $data['cms'] = (object)$postData = [
                'id_cms'        =>  $this->input->post('id_cms',true),
                'CMSCode'       =>  $this->input->post('cmscode',true),
                'Description'   =>  $this->input->post('description',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagecms'] = validation_errors();
        }else{
            if(empty($postData['id_cms'])){
                $query = $this->library_model->createcms($postData);
                if($query){
                $output['messagecms'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagecms'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updatecms($postData);
                if($query){
                $output['messagecms'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messagecms'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          MARITAL                                  //
// ================================================================= //

public function marital()
    {
        $data['page_title'] = "Marital Status";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/marital',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_marital()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblcvstatus");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->cvcode,
                $r->cvdesc,
                "<a type='button' class='btn btn-flat btn-success' href='././maritalform/".$r->id_marital."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletemarital' title='Delete' data-id=".$r->id_marital."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_marital($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblcvstatus WHERE id_marital = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function maritalform($id_marital=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Marital Status';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatamarital($id_marital);

        $data['content'] = $this->load->view('main_server/extra/maritalform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesMarital($cvcode) {        
    if($this->input->post('id_marital'))
        $id_marital = $this->input->post('id_marital');
    else
        $id_marital = '';
    $result = $this->library_model->check_CodeMarital($id_marital, $cvcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesMarital', 'Marital Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesMarital($cvdesc) {        
    if($this->input->post('id_marital'))
        $id_marital = $this->input->post('id_marital');
    else
        $id_marital = '';
    $result = $this->library_model->check_NameMarital($id_marital, $cvdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesMarital', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_marital()
    {
        if ($this->input->post('id_marital',true) == null) 
        {
            $this->form_validation->set_rules('cvcode','Marital Code','required|max_length[5]|is_unique[tblcvstatus.cvcode]');
            $this->form_validation->set_rules('cvdesc','Description','required|is_unique[tblcvstatus.cvdesc]');
            $data['marital'] = (object)$postData = [
                'id_marital'=>  $this->input->post('id_marital',true),
                'cvcode'    =>  $this->input->post('cvcode',true),
                'cvdesc'    =>  $this->input->post('cvdesc',true)
            ];
        } else {
            $this->form_validation->set_rules('cvcode','Marital Code','required|max_length[5]|callback_check_CodesMarital');
            $this->form_validation->set_rules('cvdesc','Description','required|callback_check_namesMarital');
            $data['marital'] = (object)$postData = [
                'id_marital'=>  $this->input->post('id_marital',true),
                'cvcode'    =>  $this->input->post('cvcode',true),
                'cvdesc'    =>  $this->input->post('cvdesc',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagemarital'] = validation_errors();
        }else{
            if(empty($postData['id_marital'])){
                $query = $this->library_model->createmarital($postData);
                if($query){
                $output['messagemarital'] = "<strong style='color:yellow'>".$this->input->post('cvdesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagemarital'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updatemarital($postData);
                if($query){
                $output['messagemarital'] = "<strong style='color:yellow'>".$this->input->post('cvdesc')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messagemarital'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }


// ==================================================================//
//                          ECOSYSTEM                                //
// ================================================================= //

public function ecosystem()
    {
        $data['page_title'] = "Ecosystem Library";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/ecosystem',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_eco()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblecosystems");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->EcoCode,
                $r->description,
                "<a type='button' class='btn btn-flat btn-success' href='././ecoform/".$r->id."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteeco' title='Delete' data-id=".$r->id."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_eco($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblecosystems WHERE id = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function ecoform($id=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Ecosystem Library';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDataeco($id);

        $data['content'] = $this->load->view('main_server/extra/ecoform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesEco($ecocode) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->library_model->check_CodeEco($id, $ecocode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesEco', 'Ecosystem Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesEco($description) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->library_model->check_NameEco($id, $description);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesEco', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_eco()
    {
        if ($this->input->post('id',true) == null) 
        {
            $this->form_validation->set_rules('ecocode','Ecosystem Code','required|is_unique[tblecosystems.EcoCode]');
            $this->form_validation->set_rules('description','Description','required|is_unique[tblecosystems.description]');
            $data['ecosystem'] = (object)$postData = [
                'id'            =>  $this->input->post('id',true),
                'EcoCode'       =>  $this->input->post('ecocode',true),
                'description'   =>  $this->input->post('description',true)
            ];
        } else {
            $this->form_validation->set_rules('ecocode','Ecosystem Code','required|callback_check_CodesEco');
            $this->form_validation->set_rules('description','Description','required|callback_check_namesEco');
            $data['ecosystem'] = (object)$postData = [
                'id'        =>  $this->input->post('id',true),
                'EcoCode'       =>  $this->input->post('ecocode',true),
                'description'   =>  $this->input->post('description',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageeco'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->library_model->createeco($postData);
                if($query){
                $output['messageeco'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messageeco'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updateeco($postData);
                if($query){
                $output['messageeco'] = "<strong style='color:yellow'>".$this->input->post('description')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messageeco'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          BIOGEOLOCATION                           //
// ================================================================= //

public function biogeolocation()
    {
        $data['page_title'] = "Biogeolocation Library";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/biogeolocation',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_bio()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblpatbzones");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->TBZCode,
                $r->TBZlocation,
                "<a type='button' class='btn btn-flat btn-success' href='././bioform/".$r->id_tbz."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletebio' title='Delete' data-id=".$r->id_tbz."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_bio($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblpatbzones WHERE id_tbz = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function bioform($id_tbz=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Biogeolocation Library';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatabio($id_tbz);

        $data['content'] = $this->load->view('main_server/extra/bioform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesBio($tbzcode) {        
    if($this->input->post('id_tbz'))
        $id = $this->input->post('id_tbz');
    else
        $id = '';
    $result = $this->library_model->check_CodeBio($id, $tbzcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesBio', 'Biogeolocation Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesBio($tbzlocation) {        
    if($this->input->post('id_tbz'))
        $id = $this->input->post('id_tbz');
    else
        $id = '';
    $result = $this->library_model->check_NameBio($id, $tbzlocation);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesBio', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_bio()
    {
        if ($this->input->post('id_tbz',true) == null)
        {
        $this->form_validation->set_rules('tbzcode','TBZ Code','required|is_unique[tblpatbzones.TBZCode]');
        $this->form_validation->set_rules('tbzlocation','TBZ Location','required|is_unique[tblpatbzones.TBZlocation]');
        $data['tbz'] = (object)$postData = [
            'id_tbz'            =>  $this->input->post('id_tbz',true),
            'TBZCode'           => $this->input->post('tbzcode',true),
            'TBZlocation'       => $this->input->post('tbzlocation',true),
        ];
        }else{
        $this->form_validation->set_rules('tbzcode','TBZ Code','required|callback_check_CodesBio');
        $this->form_validation->set_rules('tbzlocation','TBZ Location','required|callback_check_namesBio');
        $data['tbz'] = (object)$postData = [
            'id_tbz'            =>  $this->input->post('id_tbz',true),
            'TBZCode'           => $this->input->post('tbzcode',true),
            'TBZlocation'       => $this->input->post('tbzlocation',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagebio'] = validation_errors();
        }else{
            if(empty($postData['id_tbz'])){
                $query = $this->library_model->createbio($postData);
                if($query){
                $output['messagebio'] = "<strong style='color:yellow'>".$this->input->post('tbzlocation')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagebio'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updatebio($postData);
                if($query){
                $output['messagebio'] = "<strong style='color:yellow'>".$this->input->post('tbzlocation')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messagebio'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          CLASSIFICATION                           //
// ================================================================= //

public function classification()
    {
        $data['page_title'] = "Classification for Protected Area";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/classification',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_class()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblnip");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->nipCode,
                $r->nipDesc,
                "<a type='button' class='btn btn-flat btn-success' href='././classform/".$r->id_nip."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteclass' title='Delete' data-id=".$r->id_nip."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_class($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblnip WHERE id_nip = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function classform($id_nip=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Classification for Protected Area';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDataclass($id_nip);

        $data['content'] = $this->load->view('main_server/extra/classform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesClass($nipcode) {        
    if($this->input->post('id_nip'))
        $id = $this->input->post('id_nip');
    else
        $id = '';
    $result = $this->library_model->check_CodeClass($id, $nipcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesClass', 'Classification Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesClass($nipdesc) {        
    if($this->input->post('id_nip'))
        $id = $this->input->post('id_nip');
    else
        $id = '';
    $result = $this->library_model->check_NameClass($id, $nipdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesClass', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_class()
    {
        if ($this->input->post('id_nip',true) == null)
        {
        $this->form_validation->set_rules('nipcode','NIP Code','required|is_unique[tblnip.nipCode]');
        $this->form_validation->set_rules('nipdesc','NIP Description','required|is_unique[tblnip.nipDesc]');
        $data['nip'] = (object)$postData = [
            'id_nip'            =>  $this->input->post('id_nip',true),
            'nipCode'           => $this->input->post('nipcode',true),
            'nipDesc'       => $this->input->post('nipdesc',true),
        ];
        }else{
        $this->form_validation->set_rules('nipcode','NIP Code','required|callback_check_CodesClass');
        $this->form_validation->set_rules('nipdesc','NIP Description','required|callback_check_namesClass');
        $data['nip'] = (object)$postData = [
            'id_nip'            =>  $this->input->post('id_nip',true),
            'nipCode'           => $this->input->post('nipcode',true),
            'nipDesc'       => $this->input->post('nipdesc',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageclass'] = validation_errors();
        }else{
            if(empty($postData['id_nip'])){
                $query = $this->library_model->createclass($postData);
                if($query){
                $output['messageclass'] = "<strong style='color:yellow'>".$this->input->post('nipdesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messageclass'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updateclass($postData);
                if($query){
                $output['messageclass'] = "<strong style='color:yellow'>".$this->input->post('nipdesc')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messageclass'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          CATEGORY                                 //
// ================================================================= //

public function category()
    {
        $data['page_title'] = "Category for Protected Area";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/category',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_cat()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblpacategory");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->categoryCode,
                $r->categoryName,
                "<a type='button' class='btn btn-flat btn-success' href='././catform/".$r->id_cat."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletecat' title='Delete' data-id=".$r->id_cat."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_cat($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblpacategory WHERE id_cat = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function catform($id_cat=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Category for Protected Area';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatacat($id_cat);

        $data['content'] = $this->load->view('main_server/extra/catform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesCat($categorycode) {        
    if($this->input->post('id_cat'))
        $id = $this->input->post('id_cat');
    else
        $id = '';
    $result = $this->library_model->check_CodeCat($id, $categorycode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesCat', 'Category Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesCat($categoryname) {        
    if($this->input->post('id_cat'))
        $id = $this->input->post('id_cat');
    else
        $id = '';
    $result = $this->library_model->check_NameCat($id, $categoryname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesCat', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_cat()
    {
        if ($this->input->post('id_cat',true) == null)
        {
        $this->form_validation->set_rules('categorycode','Category Code','required|is_unique[tblpacategory.categoryCode]');
        $this->form_validation->set_rules('categoryname','Category Name','required|is_unique[tblpacategory.categoryName]');
        $data['category'] = (object)$postData = [
            'id_cat'             => $this->input->post('id_cat',true),
            'categoryCode'       => $this->input->post('categorycode',true),
            'categoryName'       => $this->input->post('categoryname',true),
        ];
        }else{
        $this->form_validation->set_rules('categorycode','Category Code','required|callback_check_CodesCat');
        $this->form_validation->set_rules('categoryname','Category Name','required|callback_check_namesCat');
        $data['category'] = (object)$postData = [
            'id_cat'            =>  $this->input->post('id_cat',true),
            'categoryCode'      =>  $this->input->post('categorycode',true),
            'categoryName'      =>  $this->input->post('categoryname',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagecat'] = validation_errors();
        }else{
            if(empty($postData['id_cat'])){
                $query = $this->library_model->createcat($postData);
                if($query){
                $output['messagecat'] = "<strong style='color:yellow'>".$this->input->post('categoryname')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagecat'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updatecat($postData);
                if($query){
                $output['messagecat'] = "<strong style='color:yellow'>".$this->input->post('categoryname')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messagecat'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          LEGISLATION                              //
// ================================================================= //

public function legislation()
    {
        $data['page_title'] = "Legislation for Protected Area";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/legislation',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_leg()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tbllegislation");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->LegisCode,
                $r->LegisDesc,
                "<a type='button' class='btn btn-flat btn-success' href='././legform/".$r->id_legis."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteleg' title='Delete' data-id=".$r->id_legis."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_leg($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tbllegislation WHERE id_legis = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function legform($id_legis=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Legislation for Protected Area';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDataleg($id_legis);

        $data['content'] = $this->load->view('main_server/extra/legform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesLeg($legiscode) {        
    if($this->input->post('id_legis'))
        $id = $this->input->post('id_legis');
    else
        $id = '';
    $result = $this->library_model->check_CodeLeg($id, $legiscode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesLeg', 'Legislation Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesLeg($legisdesc) {        
    if($this->input->post('id_legis'))
        $id = $this->input->post('id_legis');
    else
        $id = '';
    $result = $this->library_model->check_NameLeg($id, $legisdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesLeg', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_leg()
    {
        if ($this->input->post('id_legis',true) == null)
        {
        $this->form_validation->set_rules('legiscode','Legislation Code','required|is_unique[tbllegislation.LegisCode]');
        $this->form_validation->set_rules('legisdesc','Legislation Description','required|is_unique[tbllegislation.LegisDesc]');
        $data['legislation'] = (object)$postData = [
            'id_legis'          =>  $this->input->post('id_legis',true),
            'LegisCode'     => $this->input->post('legiscode',true),
            'LegisDesc'     => $this->input->post('legisdesc',true),
        ];
        }else{
        $this->form_validation->set_rules('legiscode','Legislation Code','required|callback_check_CodesLeg');
        $this->form_validation->set_rules('legisdesc','Legislation Description','required|callback_check_namesLeg');
        $data['legislation'] = (object)$postData = [
            'id_legis'          =>  $this->input->post('id_legis',true),
            'LegisCode'     => $this->input->post('legiscode',true),
            'LegisDesc'     => $this->input->post('legisdesc',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageleg'] = validation_errors();
        }else{
            if(empty($postData['id_legis'])){
                $query = $this->library_model->createleg($postData);
                if($query){
                $output['messageleg'] = "<strong style='color:yellow'>".$this->input->post('legisdesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messageleg'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updateleg($postData);
                if($query){
                $output['messageleg'] = "<strong style='color:yellow'>".$this->input->post('legisdesc')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messageleg'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

// ==================================================================//
//                          CONSERVATION                             //
// ================================================================= //

public function conservation()
    {
        $data['page_title'] = "Conservation for Protected Area";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/conservation',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_con()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblpacareadesc');
        $this->db->JOIN('tblpacparea','tblpacareadesc.CPAreaCode = tblpacparea.id_pacparea','LEFT');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->CPAreaDesc,
                $r->CPABICode,
                $r->CPABIdesc,
                "<a type='button' class='btn btn-flat btn-success' href='././conform/".$r->id_pac."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletecon' title='Delete' data-id=".$r->id_pac."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_con($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblpacareadesc WHERE id_pac = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function conform($id_pac=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Conservation for Protected Area';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatacon($id_pac);
        $data['conList'] = $this->library_model->conList();

        $data['content'] = $this->load->view('main_server/extra/conform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_CodesCon($cpabicode) {        
    if($this->input->post('id_pac'))
        $id = $this->input->post('id_pac');
    else
        $id = '';
    $result = $this->library_model->check_CodeCon($id, $cpabicode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_CodesCon', 'Conservation Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_namesCon($CPABIdesc,$cpacode) {        
    if($this->input->post('id_pac'))
        $id = $this->input->post('id_pac');
    else
        $id = '';
    $result = $this->library_model->check_NameCon($id, $CPABIdesc,$cpacode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_namesCon', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_con()
    {
        if ($this->input->post('id_pac',true) == null)
        {
        $this->form_validation->set_rules('cpacode','Conservation Priority Area Code','required');
        $this->form_validation->set_rules('cpabicode','Conservation Priority Area BI code','required|is_unique[tblpacareadesc.CPABICode]');
        $this->form_validation->set_rules('CPABIdesc','Description','required|is_unique[tblpacareadesc.CPABIdesc]');
        $data['cpa'] = (object)$postData = [
            'id_pac'            =>  $this->input->post('id_pac',true),
            'CPAreaCode'        =>  $this->input->post('cpacode',true),
            'CPABICode'         =>  $this->input->post('cpabicode',true),
            'CPABIdesc'       =>    $this->input->post('CPABIdesc',true),
        ];
        }else{
        $this->form_validation->set_rules('cpacode','Conservation Priority Area Code','required');
        $this->form_validation->set_rules('cpabicode','Conservation Priority Area BI code','required|callback_check_CodesCon');
        $this->form_validation->set_rules('CPABIdesc','Description','required|callback_check_namesCon');
        $data['cpa'] = (object)$postData = [
            'id_pac'            =>  $this->input->post('id_pac',true),
            'CPAreaCode'        =>  $this->input->post('cpacode',true),
            'CPABICode'         =>  $this->input->post('cpabicode',true),
            'CPABIdesc'       =>    $this->input->post('CPABIdesc',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagecon'] = validation_errors();
        }else{
            if(empty($postData['id_pac'])){
                $query = $this->library_model->createcon($postData);
                if($query){
                $output['messagecon'] = "<strong style='color:yellow'>".$this->input->post('CPABIdesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagecon'] = 'Successfully Registered';
                }
            }else{
                $query = $this->library_model->updatecon($postData);
                if($query){
                $output['messagecon'] = "<strong style='color:yellow'>".$this->input->post('CPABIdesc')."</strong> ".'Successfully update information';
                }else{
                $output['error'] = true;
                $output['messagecon'] = 'Successfully update information';
                }
            }
        }
        echo json_encode($output);
    }

    // ==================================================================//
//                          WETLAND TYPE                             //
// ================================================================= //

    public function wltype()
    {
        $data['page_title'] = "Wetland Type Library";
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/extra/wltype',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_wltype()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("tblwetlandtype");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->wtypecode,
                $r->wtypedesc,
                "<a type='button' class='btn btn-flat btn-warning' title='View Wetland Description' href='././wldesc/".$r->id_wtype."'><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-success' href='././wltypeform/".$r->id_wtype."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletewltype' title='Delete' data-id=".$r->id_wtype."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_wltype($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblwetlandtype WHERE id_wtype = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function wltypeform($id_wtype=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wetland Type Library';
        $data['setting'] = $this->setting_model->read();

        $data['datas'] = $this->library_model->getDatawtype($id_wtype);

        $data['content'] = $this->load->view('main_server/extra/wltypeform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_Codeswtype($wtypecode) {        
    if($this->input->post('id_wtype'))
        $id = $this->input->post('id_wtype');
    else
        $id = '';
    $result = $this->library_model->check_Codewtype($id, $wtypecode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_Codeswtype', 'Wetland Type Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_nameswtype($wtypedesc) {        
    if($this->input->post('id_wtype'))
        $id = $this->input->post('id_wtype');
    else
        $id = '';
    $result = $this->library_model->check_Namewtype($id, $wtypedesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_nameswtype', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_wltype()
    {
        if ($this->input->post('id_wtype',true) == null)
        {
            $this->form_validation->set_rules('wtypecode','Wetland Type Code','required|is_unique[tblwetlandtype.wtypecode]');
            $this->form_validation->set_rules('wtypedesc','Name','required|is_unique[tblwetlandtype.wtypedesc]');
            $data['wtype'] = (object)$postData = [
                'id_wtype'            =>  $this->input->post('id_wtype',true),
                'wtypecode'     =>  $this->input->post('wtypecode',true),
                'wtypedesc'   =>  $this->input->post('wtypedesc',true)
            ];
        } else {
            $this->form_validation->set_rules('wtypecode','Wetland Type Code','required|callback_check_Codeswtype');
            $this->form_validation->set_rules('wtypedesc','Name','required|callback_check_nameswtype');
            $data['wtype'] = (object)$postData = [
                'id_wtype'            =>  $this->input->post('id_wtype',true),
                'wtypecode'     =>  $this->input->post('wtypecode',true),
                'wtypedesc'   =>  $this->input->post('wtypedesc',true)
            ];
        }
         if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagewtype'] = validation_errors();
        }else{
            if(empty($postData['id_wtype'])){
                $query = $this->library_model->createwltype($postData);
                if($query){
                $output['messagewtype'] = "<strong style='color:yellow'>".$this->input->post('wtypedesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagewtype'] = 'Successfully Registered';
                }
            }else{

                $query = $this->library_model->updatewltype($postData);

                if($query){
                $output['messagewtype'] = "<strong style='color:yellow'>".$this->input->post('wtypedesc')."</strong> ".'Successfully update record';
                }else{
                $output['error'] = true;
                $output['messagewtype'] = 'Successfully update record';
                }
            }
        }
        echo json_encode($output);
    }


// ==================================================================//
//                          WETLAND DESC                             //
// ================================================================= //

    public function wldesc()
    {
        $data['page_title'] = "Wetland Description Library";
        $data['setting'] = $this->setting_model->read();
        $data['wltype_id'] = $this->uri->segment(4);
        $data['content'] = $this->load->view('main_server/extra/wldesc',$data,true);       
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_wldesc($id=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

         if (!empty($id)) {
            $this->db->select("*");
            $this->db->from('tblwetlanddesc');
            $this->db->join('tblwetlandtype','tblwetlanddesc.wtype_id = tblwetlandtype.id_wtype','LEFT');
            $this->db->where('tblwetlanddesc.wtype_id',$id);
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wtypedesc,
                   $r->wdesccode,
                   $r->wdescdesc,
                    "<a type='button' class='btn btn-flat btn-success' href='../wldescform/".$r->id_wdesc."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deletewdesc' title='Delete' data-id=".$r->id_wdesc."><i class='ion ion-android-delete'></i></a>"
                );
            }
        } else {

            $this->db->select("*");
            $this->db->from('tblwetlanddesc');
            $this->db->join('tblwetlandtype','tblwetlanddesc.wtype_id = tblwetlandtype.id_wtype','LEFT');
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wtypedesc,
                   $r->wdesccode,
                   $r->wdescdesc,                    
                    "<a type='button' class='btn btn-flat btn-success' href='wldescform/".$r->id_wdesc."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deletewdesc' title='Delete' data-id=".$r->id_wdesc."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_wldesc($id = null) 
    {

        $output = array();
         $sql = "DELETE FROM tblwetlanddesc WHERE id_wdesc = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data deleted successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function wldescform($id_wdesc=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wetland Description Library';
        $data['setting'] = $this->setting_model->read();
        $data['wtypelist'] = $this->library_model->wtypelist();
        $data['datas'] = $this->library_model->getDatawdesc($id_wdesc);

        $data['content'] = $this->load->view('main_server/extra/wldescform',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_Codeswdesc($wdesccode) {        
    if($this->input->post('id_wdesc'))
        $id = $this->input->post('id_wdesc');
    else
        $id = '';
    $result = $this->library_model->check_Codewdesc($id, $wdesccode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_Codeswdesc', 'Wetland Type Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_nameswdesc($wdescdesc, $wtypeid) {        
    if($this->input->post('id_wdesc'))
        $id = $this->input->post('id_wdesc');
    else
        $id = '';
    $result = $this->library_model->check_Namewdesc($id, $wtypeid, $wdescdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_nameswdesc', 'Name already exists');
        $response = false;
    }
    return $response;
    }

     function check_wdescName_adds($wdescdesc, $wtypeid) {        
    if($this->input->post('id_wdesc'))
        $id = $this->input->post('id_wdesc');
    else
        $id = '';
    $result = $this->library_model->check_wdescName_add($id, $wtypeid, $wdescdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_wdescName_adds', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_wldesc()
    {
        if ($this->input->post('id_wdesc',true) == null)
        {
            $this->form_validation->set_rules('wtypeid','Wetland Type','required');
            $this->form_validation->set_rules('wdesccode','Wetland Desc Code','required|is_unique[tblwetlanddesc.wdesccode]');
            $this->form_validation->set_rules('wdescdesc','Description','required');
            $data['wtype'] = (object)$postData = [
                'id_wdesc'            =>  $this->input->post('id_wdesc',true),
                'wtype_id'     =>  $this->input->post('wtypeid',true),
                'wdesccode'     =>  $this->input->post('wdesccode',true),
                'wdescdesc'   =>  $this->input->post('wdescdesc',true)
            ];
        } else {
            $this->form_validation->set_rules('wtypeid','Wetland Type','required');
            $this->form_validation->set_rules('wdesccode','Wetland Desc Code','required|callback_check_Codeswdesc');
            $this->form_validation->set_rules('wdescdesc','Description','required');
            $data['wtype'] = (object)$postData = [
                'id_wdesc'            =>  $this->input->post('id_wdesc',true),
                'wtype_id'     =>  $this->input->post('wtypeid',true),
                'wdesccode'     =>  $this->input->post('wdesccode',true),
                'wdescdesc'   =>  $this->input->post('wdescdesc',true)
            ];
        }
         if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagewdesc'] = validation_errors();
        }else{
            if(empty($postData['id_wdesc'])){
                $query = $this->library_model->createwldesc($postData);
                if($query){
                $output['messagewdesc'] = "<strong style='color:yellow'>".$this->input->post('wdescdesc')."</strong> ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagewdesc'] = 'Successfully Registered';
                }
            }else{

                $query = $this->library_model->updatewldesc($postData);

                if($query){
                $output['messagewdesc'] = "<strong style='color:yellow'>".$this->input->post('wdescdesc')."</strong> ".'Successfully update record';
                }else{
                $output['error'] = true;
                $output['messagewdesc'] = 'Successfully update record';
                }
            }
        }
        echo json_encode($output);
    }
}