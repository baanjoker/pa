<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
  * 
  */
 class wetland extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();

 		$this->load->model([
			'wetland_model'
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
 	}

 	public function index()
 	{
 		$data['page_title']	=	'Wetland Areas in the Philippines';
 		$data['setting']	=	$this->setting_model->read();

 		$data['content']	=	$this->load->view('main_server/wetland/wetland',$data,TRUE);
 		$this->load->view('main_server/dashboard',$data);
 	}

 	public function load_wetland()
	{
		$draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblwetland');
        $this->db->join('tbllocregion','tblwetland.regionid = tbllocregion.id','LEFT');
        $this->db->join('tbllocprovince','tblwetland.provinceid = tbllocprovince.id_p','LEFT');
        $this->db->join('tbllocmunicipality','tblwetland.municipalid = tbllocmunicipality.id_m','LEFT');
        $this->db->join('tbllocbarangay','tblwetland.barangayid = tbllocbarangay.id_b','LEFT');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
               $r->wetlandname,
               $r->regionName,
               $r->provinceName,
               $r->municipalName,
               $r->barangayName,
                "<a type='button' class='btn btn-flat btn-success' href='./wetland/form/".$r->id_wetland."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-warning' href='../report/printpdf/pdffilewetland/".$r->id_wetland."' title='PDF' data-id=".$r->id_wetland."><i class='ion ion-android-attach'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletewetland' title='Delete' data-id=".$r->id_wetland."><i class='ion ion-android-delete'></i></a>"

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

    public function form($id_wetland=null)
    {
    	$data['page_title']	=	'Wetland Areas in the Philippines';
 		$data['setting']	=	$this->setting_model->read();
 		$data['identifier'] = $this->uri->segment(4);
 		$data['wtype']	= $this->wetland_model->wetlandtypeList();
 		$data['regionlist'] = $this->wetland_model->regionlist();
        $data['records'] = $this->wetland_model->getData($id_wetland);
        $data['wldesc'] = $this->wetland_model->wldesc($id_wetland);
        $data['prov_list'] = $this->wetland_model->prov_list($id_wetland);
        $data['mun_list'] = $this->wetland_model->mun_list($id_wetland);
        $data['bar_list'] = $this->wetland_model->bar_list($id_wetland);
 		$data['content']	=	$this->load->view('main_server/wetland/wetlandform',$data,TRUE);
 		$this->load->view('main_server/dashboard',$data);
    }

    public function getwldesc()
 		{
       $wltype = $this->input->post('wltype');
            if (!empty($wltype)) {
            $query = $this->db->select('*')
                ->from('tblwetlanddesc')
                ->where('wtype_id',$wltype)
                ->get();	

            $option = "<option value=\"\">Select Wetland description</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $results) {
                    $option .= ("<option value=\"$results->id_wdesc\">$results->wdescdesc</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No item available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid item selected";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function getProv()
 		{
       $regid = $this->input->post('regid');
            if (!empty($regid)) {
            $query = $this->db->select('*')
                ->from('tbllocprovince')
                ->where('regionid',$regid)
                ->get();	

            $option = "<option value=\"\">Select Province</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $prov) {
                    $option .= ucwords("<option value=\"$prov->id_p\">$prov->provinceName</option>");
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

            $options = "<option value=\"\">Select Municipality/City</option>"; 
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $municipals) {
                    $options .= ucwords("<option value=\"$municipals->id_m\">$municipals->municipalName</option>");
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

            $options = "<option value=\"\">Select Barangay</option>"; 
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $barangay) {
                    $options .= "<option value=\"$barangay->id_b\">$barangay->barangayName</option>";
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

    function check_wetlandname($wetlandname) {        
    if($this->input->post('id_wetland'))
        $id_c = $this->input->post('id_wetland');
    else
        $id_c = '';
    $result = $this->wetland_model->check_name($id_c, $wetlandname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_wetlandname', 'Wetland name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_wetland()
    {
        if ($this->input->post('id_wetland',true) == null)
        {
            $this->form_validation->set_rules('wetlandname','Wetland Name','required|is_unique[tblwetland.wetlandname]');
            $this->form_validation->set_rules('wltype','Type of wetland','required');
            $this->form_validation->set_rules('wldesc','Wetland Description','required');
            $this->form_validation->set_rules('regionid','Region','required');
            $this->form_validation->set_rules('provinceid','Province','required');
            $this->form_validation->set_rules('municipalid','Municipality','required');
            $data['wetland'] = (object)$postData = [
                'id_wetland'      =>  $this->input->post('id_wetland',true),
                'wetlandname'      =>  $this->input->post('wetlandname',true),
                'wltypeid'     =>  $this->input->post('wltype',true),
                'wldescid' =>  $this->input->post('wldesc',true),
                'wetlandpa' =>  $this->input->post('wetlandpa')==null ? 1 : 0,
                'regionid' =>  $this->input->post('regionid',true),
                'provinceid' =>  $this->input->post('provinceid',true),
                'municipalid' =>  $this->input->post('municipalid',true),
                'barangayid' =>  $this->input->post('barangayid',true),
                'landuse' =>  $this->input->post('landuse',true),
                'status' =>  $this->input->post('status',true),
                'remarks' =>  $this->input->post('remarks',true),
                'coor_lat_deg' =>  $this->input->post('coor_lat_deg',true),
                'coor_lat_min' =>  $this->input->post('coor_lat_min',true),                
                'coor_lat_sec' =>  $this->input->post('coor_lat_sec',true),
                'coor_long_deg' =>  $this->input->post('coor_long_deg',true),
                'coor_long_min' =>  $this->input->post('coor_long_min',true),                
                'coor_long_sec' =>  $this->input->post('coor_long_sec',true),
                'area' =>  $this->input->post('area',true),
                'altitude' =>  $this->input->post('altitude',true),
                'depth' =>  $this->input->post('depth',true),
            ];
        } else {
            $this->form_validation->set_rules('wetlandname','Wetland Name','required|callback_check_wetlandname');
            $this->form_validation->set_rules('wltype','Type of wetland','required');
            $this->form_validation->set_rules('wldesc','Wetland Description','required');
            $this->form_validation->set_rules('regionid','Region','required');
            $this->form_validation->set_rules('provinceid','Province','required');
            $this->form_validation->set_rules('municipalid','Municipality','required');
            $data['wetland'] = (object)$postData = [
                'id_wetland'      =>  $this->input->post('id_wetland',true),
                'wetlandname'      =>  $this->input->post('wetlandname',true),
                'wltypeid'     =>  $this->input->post('wltype',true),
                'wldescid' =>  $this->input->post('wldesc',true),
                'wetlandpa' =>  $this->input->post('wetlandpa')==null ? 0 : 1,
                'regionid' =>  $this->input->post('regionid',true),
                'provinceid' =>  $this->input->post('provinceid',true),
                'municipalid' =>  $this->input->post('municipalid',true),
                'barangayid' =>  $this->input->post('barangayid',true),
                'landuse' =>  $this->input->post('landuse',true),
                'status' =>  $this->input->post('status',true),
                'remarks' =>  $this->input->post('remarks',true),
                'coor_lat_deg' =>  $this->input->post('coor_lat_deg',true),
                'coor_lat_min' =>  $this->input->post('coor_lat_min',true),                
                'coor_lat_sec' =>  $this->input->post('coor_lat_sec',true),
                'coor_long_deg' =>  $this->input->post('coor_long_deg',true),
                'coor_long_min' =>  $this->input->post('coor_long_min',true),                
                'coor_long_sec' =>  $this->input->post('coor_long_sec',true),
                'area' =>  $this->input->post('area',true),
                'altitude' =>  $this->input->post('altitude',true),
                'depth' =>  $this->input->post('depth',true),
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagewetland'] = validation_errors();
        }else{
            if(empty($postData['id_wetland'])){
                $query = $this->wetland_model->create($postData);
                if($query){
                $output['messagewetland'] = "<strong style='color:yellow'>".$this->input->post('wetlandname')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messagewetland'] = 'New Cave registered successfully';
                }
            }else{

                $query = $this->wetland_model->update($postData);

                if($query){
                $output['messagewetland'] = "<strong style='color:yellow'>".$this->input->post('wetlandname')."</strong> ".' successfully update';
                }else{
                $output['error'] = true;
                $output['messagewetland'] = 'Cave successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    public function delete_wetland($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tblwetland WHERE id_wetland = '$id'";

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

 } 