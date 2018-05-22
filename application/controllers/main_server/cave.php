<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cave extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'cave_model',
			
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
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
		$data['page_title'] = 'Cave Information';
		$data['setting'] = $this->setting_model->read();
		// $data['region_list'] = $this->cave_model->region_list(); //Display the list of Regions
		// $data['prov_list'] = $this->cave_model->prov_list();
        // $data['caves'] = $this->cave_model->caveData();

		$data['content'] = $this->load->view('main_server/cave/cave',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

    public function get_listCave()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblcaves');
        $this->db->join('tbllocregion', 'tblcaves.regionCode = tbllocregion.id','left');
        $this->db->join('tbllocprovince', 'tblcaves.provinceCode = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality', 'tblcaves.municipalCode = tbllocmunicipality.id_m','left');
      $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->cave_name,
                $r->regionName." (".$r->regionDesc.")",
                $r->provinceName,
                $r->municipalName,
                "<a type='button' class='btn btn-flat btn-success' href='cave/edit/".$r->id_cave."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletecave' title='Delete' data-id=".$r->id_cave."><i class='ion ion-android-delete'></i></a>"
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

     public function delete_caveList($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tblcaves WHERE id_cave = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected cave successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function caveForm()
    {
        $data['page_title'] = 'Cave Information';
        $data['setting'] = $this->setting_model->read();
        $data['rlist'] = $this->cave_model->region_list();
        $data['cave'] = (object)$postData = ['id_cave' => $this->input->post('id_cave',true)];
       
        $data['content'] = $this->load->view('main_server/cave/caveForm',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }
    // ======================================================================================================================

	public function getProv()
 		{
       $regid = $this->input->post('regid');
            if (!empty($regid)) {
            $query = $this->db->select('*')
                ->from('tbllocprovince')
                ->where('regionid',$regid)
                ->get();	

            $option = "<option value=\"\">SELECT PROVINCE</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $prov) {
                    $option .= strtoupper("<option value=\"$prov->id_p\">$prov->provinceName</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No Provinces available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Region selected";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function getMunicipal()
 		{
       $regid = $this->input->post('regid');
       $provid = $this->input->post('provid');

            if (!empty($provid)) {
            $querys = $this->db->select('*')
                ->from('tbllocmunicipality')
                ->where('provinceid',$provid)              
                ->get();	

            $options = "<option value=\"\">SELECT MUNICIPALITY/CITY</option>"; 
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $municipals) {
                    $options .= "<option value=\"$municipals->id_m\">$municipals->municipalName</option>";
                } 
                $data['message'] = $options;
                $data['status'] = true;
            } else {
                $data['message'] = "No Municipalities available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Province";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function getBarangay()
        {
       // $regid = $this->input->post('regid');
       // $provid = $this->input->post('provid');
       $municipal_id = $this->input->post('municipal_id');

            if (!empty($municipal_id)) {
            $querys = $this->db->select('*')
                ->from('tbllocbarangay')
                ->where('municipalid',$municipal_id)  
                ->order_by('barangayName','ASC')            
                ->get();    

            $options = "<option value=\"\">SELECT BARANGAY</option>"; 
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $barangay) {
                    $options .= strtoupper("<option value=\"$barangay->id_b\">$barangay->barangayName</option>");
                } 
                $data['message'] = $options;
                $data['status'] = true;
            } else {
                $data['message'] = "No Barangays available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Municipality";
            $data['status'] = null;
        }

        echo json_encode($data);
    }


    // for callback_check_Cave set_rules validation_form
    function check_caveNames($cave_name) {  
    $data['cave'] = (object)$postData = [
            'id_cave'           => $this->input->post('id_cave',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'      => $this->input->post('sitio',true),
            'cave_name'     => $this->input->post('cave_name',true),
        ];
    if($this->input->post('id_cave'))
        $id_cave = $this->input->post('id_cave');
    else
        $id_cave = '';
    $result = $this->cave_model->check_caveName($id_cave, $cave_name);
    if($result == 0)
        $response = true;
    else {
         
        $this->form_validation->set_message('check_caveNames', 'Cave Name already exists');
        $response = false;    
        // redirect('main_server/cave/edit/'.$postData['id_cave'].'?rc='.$postData['regionCode'].'&pc='.$postData['provinceCode'].'&mc='.$postData['municipalCode']);    
    }
    return $response;    
    }


    public function save_cave()
    {
        if ($this->input->post('id_cave',true) == null)
        {
        $this->form_validation->set_rules('cave_name','Name of the Cave','required|is_unique[tblcaves.cave_name]');
        $this->form_validation->set_rules('region','Region','required');
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('municipal','Municipality','required');
        $data['cave'] = (object)$postData = [
            'id_cave'           => $this->input->post('id_cave',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'             => $this->input->post('sitio',true),
            'cave_name'         => $this->input->post('cave_name',true),
        ];
        }else{
        $this->form_validation->set_rules('cave_name','Name of the Cave','required|callback_check_caveNames');
        $this->form_validation->set_rules('region','Region','required');
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('municipal','Municipality','required');       
        $data['cave'] = (object)$postData = [
            'id_cave'           => $this->input->post('id_cave',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'             => $this->input->post('sitio',true),
            'cave_name'         => $this->input->post('cave_name',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageCave'] = validation_errors();
        }else{
            if(empty($postData['id_cave'])){
                $query = $this->cave_model->create($postData);
                if($query){
                $output['messageCave'] = $this->input->post('cave_name')." ".'New Cave registered successfully';
                }else{
                $output['error'] = true;
                $output['messageCave'] = 'New Cave registered successfully';
                }
            }else{

                $query = $this->cave_model->update($postData);

                if($query){
                $output['messageCave'] = $this->input->post('cave_name')." ".'Cave successfully update';
                }else{
                $output['error'] = true;
                $output['messageCave'] = 'Cave successfully update';
                }                
            }
        }
        echo json_encode($output);
    }

    public function edit($id_cave=null)
    {
        $data['page_title'] = 'Cave Information';
        $data['setting'] = $this->setting_model->read();
        $data['rlist'] = $this->cave_model->region_list();        
        $data['plist'] = $this->cave_model->prov_list($id_cave);
        $data['mlist'] = $this->cave_model->mun_list($id_cave);
        $data['blist'] = $this->cave_model->bar_list($id_cave);

        $data['cave'] =  $this->cave_model->identify_id($id_cave);
        
        $data['content'] = $this->load->view('main_server/cave/caveForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }


    // ===============================================================================================================================//
    //                                                                                                                                //
    //                                                                                                                                // 
    // ===============================================================================================================================//
    public function create($id_cave=null,$rc=null,$pc=null,$mc=null)
    {
       
        if ($this->input->post('id_cave',true) == null)
        {
        $this->form_validation->set_rules('region','Region','required');
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('municipal','Municipality','required');
        $this->form_validation->set_rules('barangay','Barangay');
        $this->form_validation->set_rules('sitio','Sitio');
        $this->form_validation->set_rules('cave_name','Name of the Cave','required|is_unique[tblcaves.cave_name]');
        $data['cave'] = (object)$postData = [
            'id_cave'           => $this->input->post('id_cave',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'             => $this->input->post('sitio',true),
            'cave_name'         => $this->input->post('cave_name',true),
        ];
        }else{
        $this->form_validation->set_rules('region','Region','required');
        $this->form_validation->set_rules('province','Province','required');
        $this->form_validation->set_rules('municipal','Municipality','required');
        $this->form_validation->set_rules('barangay','Barangay');
        $this->form_validation->set_rules('sitio','Sitio');
        $this->form_validation->set_rules('cave_name','Name of the Cave','required|callback_check_caveNames');
        $data['cave'] = (object)$postData = [
            'id_cave'           => $this->input->post('id_cave',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'             => $this->input->post('sitio',true),
            'cave_name'         => $this->input->post('cave_name',true),
        ];
        }
        if($this->form_validation->run() == true){
            if(empty($postData['id_cave'])){

                if($this->cave_model->create($postData))
                    {     
                        $this->session->set_flashdata('message',"Save successfully!");                                     
                    } else {
                        #set exception message
                        $this->session->set_flashdata('message',"Unsucessfully Save!");
                        // $this->session->set_flashdata('exception',"Please try again!");                        
                    }
                redirect('main_server/cave/create','refresh');

        } else {

        if ($this->cave_model->update($postData)){
                        #set success message
                         $this->session->set_flashdata('message',"Update successfully!");
                       
                } else {
                        #set exception message
                        $this->session->set_flashdata('message',"Unsucessfully Update!");
                        // $this->session->set_flashdata('exception',"Please try again!");
                       
                }
                redirect('main_server/cave/edit/'.$postData['id_cave'].'?rc='.$postData['regionCode'].'&pc='.$postData['provinceCode'].'&mc='.$postData['municipalCode']);
            }

    } else {
        $data['page_title'] = "Cave Information";
        $data['setting'] = $this->setting_model->read();
        $data['rlist'] = $this->cave_model->region_list(); //Display the list of Regions
        $data['plist'] = $this->cave_model->province_list();
        $data['mlist'] = $this->cave_model->municipal_list();
        $data['blist'] = $this->cave_model->barangay_list();

        $data['provinceselect'] = $this->cave_model->province($rc);
        $data['municipalselect'] = $this->cave_model->municipal($pc);
        $data['barangayselect'] = $this->cave_model->barangay($mc);

        $data['content'] = $this->load->view('main_server/cave',$data,true);
        $this->load->view('main_server/dashboard',$data);

        }
    }
    public function cave_list()
    {
        $data['page_title'] = "Cave Information";
        $data['setting'] = $this->setting_model->read();
        // $data['cave'] =  $this->cave_model->identify_id();
        

        $data['content'] = $this->load->view('main_server/cave_list',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function edits($id_cave=null,$rc=null,$pc=null,$mc=null)
    {
        $data['page_title'] = "Cave Information";
        $data['setting'] = $this->setting_model->read();
        
        $data['cave'] =  $this->cave_model->identify_id($id_cave);
        $data['setting'] = $this->setting_model->read();
        $data['rlist'] = $this->cave_model->region_list(); //Display the list of Regions
        
        $data['plist'] = $this->cave_model->province_list();
        $data['mlist'] = $this->cave_model->municipal_list();
        $data['blist'] = $this->cave_model->barangay_list();

        $data['provinceselect'] = $this->cave_model->province($rc);
        $data['municipalselect'] = $this->cave_model->municipal($pc);
        $data['barangayselect'] = $this->cave_model->barangay($mc);


        $data['content'] = $this->load->view('main_server/cave',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function delete($id = null) 
    {
        if ($this->cave_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message',"Delete successfully!");
        } else {
            #set exception message
            $this->session->set_flashdata('exception',"Please try again!");
        }
        redirect('main_server/cave');
    }

}