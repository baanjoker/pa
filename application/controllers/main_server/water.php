<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
  * 
  */
 class water extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();

 		$this->load->model([
			'waterfowl_model'
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
 	}

 	public function index()
 	{
 		$data['page_title']	=	'Waterfowl in the Philippines';
 		$data['setting']	=	$this->setting_model->read();

 		$data['content']	=	$this->load->view('main_server/water/water',$data,TRUE);
 		$this->load->view('main_server/dashboard',$data);
 	}

 	public function form($id_wf=null,$randomcode=null)
 	{
 		$data['page_title']	=	'Waterfowl in the Philippines';
 		$data['setting']	=	$this->setting_model->read();
        $data['records']    = $this->waterfowl_model->getAllData($id_wf);
        $data['plist']      = $this->waterfowl_model->prov_list($id_wf);
        $data['wetlandlist']      = $this->waterfowl_model->wetland_list($id_wf);
        $data['identifier'] = $this->uri->segment(4);
 		$data['regionlist'] = 	$this->waterfowl_model->regionlist();
 		$data['dateyear'] = 	$this->waterfowl_model->dateyear();
 		$data['datemonth'] = 	$this->waterfowl_model->datemonth();
 		$data['speciesList'] = 	$this->waterfowl_model->speciesList();
 		$data['content']	=	$this->load->view('main_server/water/waterform',$data,TRUE);
 		$this->load->view('main_server/dashboard',$data);
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

    public function getWetland()
 		{
       $provid = $this->input->post('provid');
            if (!empty($provid)) {
            $query = $this->db->select('*')
                ->from('tblwetland')
                ->where('provinceid',$provid)
                ->get();	

            $option = "<option value=\"\">Select Wetland</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $prov) {
                    $option .= ucwords("<option value=\"$prov->id_wetland\">$prov->wetlandname</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No Wetland available, add new Wetland?"."<a type='button'  href='../wetland/form'>Click here</>";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid item selected";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function load_species($code=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblwaterfowlspecies');
        $this->db->join('tblwspeciesgenus', 'tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');
        $this->db->where('tblwaterfowlspecies.randomcode',$code);
      $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->scientificName_genus,               
                $r->total,
                "<a type='button' class='btn btn-flat btn-success' href='water/form/".$r->id_wfspecies."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteSpecies' title='Delete' data-id=".$r->id_wfspecies."><i class='ion ion-android-delete'></i></a>"
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

     public function delete_species($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tblwaterfowlspecies WHERE id_wfspecies = '$id'";

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

    function check_names($genus_id,$gencode) {        
    if($this->input->post('id_wfspecies'))
        $id = $this->input->post('id_wfspecies');
    else
        $id = '';
    $result = $this->waterfowl_model->check_Name($id,$genus_id,$gencode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names', 'Name already exists');
        $response = false;
    }
    return $response;
    }


    public function save_species()
    {
            if ($this->input->post('id_wfspecies',true)==null) {                
        	$this->form_validation->set_rules('genus_id','Species Name','required|callback_check_names');
            $this->form_validation->set_rules('total','Total Number','required|is_numeric');
        	$data['species'] = (object)$postData = [
        		'id_wfspecies'			=>	$this->input->post('id_wfspecies',true),
        		'randomcode'		=>	$this->input->post('gencode',true),
        		'species_id'	=> 	$this->input->post('genus_id',true),
        		'total'	=> 	$this->input->post('total',true),
        	];       
            }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagespecies'] = validation_errors();
        }else{
            if(empty($postData['gencode'])){
                $query = $this->waterfowl_model->createspecies($postData);
                if($query){
                $output['messagespecies'] = 'Registered successfully';
                }else{
                $output['error'] = true;
                $output['messagespecies'] = 'Registered successfully';
                }            
            }
        }
        echo json_encode($output);
    }

    public function fetchspecies(){
        $codegens = $this->input->post('codegens');
        $data = $this->waterfowl_model->getAllspecies($codegens);
        foreach($data as $row){
            ?>
            <tr>                
                <td><?php echo $row->scientificName_genus; ?></td>
                <td><?php echo $row->total; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat btn-deleteSpecies" data-id="<?php echo $row->id_wfspecies ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function fetchgtotal(){
        $codegens = $this->input->post('codegens');
        $data = $this->waterfowl_model->gtotal($codegens);
        foreach($data as $row){
            ?>
            <tr>                
                <td style="color:red" class="pull-right"><strong>GRAND TOTAL</strong></td>
                <td style="color:red"><strong><?php echo $row->gtotal; ?></strong></td>
                <td></td>
            </tr>
            <?php
        }
    }

    function check_wetlands($wetlandid) {        
    if($this->input->post('id_wf'))
        $id = $this->input->post('id_wf');
    else
        $id = '';
    $result = $this->waterfowl_model->check_Wetlands($id, $wetlandid);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_wetlands', 'Name already registered');
        $response = false;
    }
    return $response;
    }

    public function save_water()
    {
            if ($this->input->post('id_wf',true) == null)
        {
            $this->form_validation->set_rules('regid','Region','required');
            $this->form_validation->set_rules('provid','Province','required');
            $this->form_validation->set_rules('wetlandid','Wetland Area','required|is_unique[tblwaterfowl.wetlandid]');
            $data['waters'] = (object)$postData = [
                'id_wf'         =>  $this->input->post('id_wf',true),
                'randomcode'    =>  $this->input->post('gencode',true),
                'regionid'      =>  $this->input->post('regid',true),
                'provinceid'    =>  $this->input->post('provid',true),
                'wetlandid'     =>  $this->input->post('wetlandid',true),
                'year_census'   =>  $this->input->post('year',true),
                'month_census'  =>  $this->input->post('month',true),
            ];
        } else {
            $this->form_validation->set_rules('regid','Region','required');
            $this->form_validation->set_rules('provid','Province','required');
            $this->form_validation->set_rules('wetlandid','Wetland Area','required|callback_check_wetlands');
            $data['waters'] = (object)$postData = [
                'id_wf'         =>  $this->input->post('id_wf',true),
                'randomcode'    =>  $this->input->post('gencode',true),
                'regionid'      =>  $this->input->post('regid',true),
                'provinceid'    =>  $this->input->post('provid',true),
                'wetlandid'     =>  $this->input->post('wetlandid',true),
                'year_census'   =>  $this->input->post('year',true),
                'month_census'  =>  $this->input->post('month',true),
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagewater'] = validation_errors();
        }else{
            if(empty($postData['id_wf'])){
                $query = $this->waterfowl_model->createwf($postData);
                if($query){
                $output['messagewater'] = 'Registered successfully';
                }else{
                $output['error'] = true;
                $output['messagewater'] = 'New registered successfully';
                }
            }else{

                $query = $this->waterfowl_model->updatewf($postData);

                if($query){
                $output['messagewater'] = 'Successfully update';
                }else{
                $output['error'] = true;
                $output['messagewater'] = 'Successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    public function load_water()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblwaterfowl');
        $this->db->join('tbllocregion','tblwaterfowl.regionid = tbllocregion.id','LEFT');
        $this->db->join('tbllocprovince','tblwaterfowl.provinceid = tbllocprovince.id_p','LEFT');
        $this->db->join('tblwetland','tblwaterfowl.wetlandid = tblwetland.id_wetland','LEFT');
      $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
                $r->wetlandname,
                $r->regionName,
                $r->provinceName,
                "<a type='button' class='btn btn-flat btn-success' href='water/form/".$r->id_wf."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deletewater' title='Delete' data-id=".$r->id_wf."><i class='ion ion-android-delete'></i></a>"
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

    public function delete_water($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tblwaterfowl WHERE id_wf = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected waterfowl successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }


}