<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
*
*/
class pamain extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
		$this->load->model([
            'setting_model',
            'users/pa/pamain_model',
            'users/dashboard_model'
		]);

		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=2)
		redirect('login');

        $context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
	}

	public function index()
	{
		$data['page_title'] = "Protected Area";
		$data['setting'] = $this->setting_model->read();
        $user_region = $this->session->userdata('region');
        $data['regionss'] = $this->dashboard_model->region_display($user_region);

		$data['regionid'] = $this->session->userdata('region');
		$user_id = $this->session->userdata('user_id');
		$data['user_region'] = $this->pamain_model->user_region($user_id);

		$data['content'] = $this->load->view('users/protected/main',$data,TRUE);
		$this->load->view('users/dashboard',$data);
	}

	public function fetchpamain()
	{
		$regionId = $this->input->post('coderegions');
        $data = $this->pamain_model->getAlldatafromthisregion2($regionId);
           foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->pa_name; ?></td>
                <td><?php echo ucwords($row->provinceName); ?></td>
                <!-- <td><?php echo $row->municipalName; ?></td>                                -->
                <td>                	
                    <a type="button" class="btn btn-flat btn-warning" href="printpdf/pdffilepa/<?php echo $row->generatedcode ?>" title="PDF" data-id=".$r->id_main." target="_blank"><i class='fa fa-file-pdf-o fa-2x'></i></a>                	
                </td>
            </tr>
            <?php
        }
	}

    public function delete($id)
    {
        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $query_result = $this->pamain_model->pa_name_identity($id);
        foreach($query_result as $row){
        $data['pa_logs'] = (object)$postDataLogs = [
            'user_account'  =>  $this->session->userdata('user_id'),
            'region'        =>  $this->session->userdata('region'),
            'status_id'     =>  '3',
            'generatedcode' =>  $row->generatedcode,
            'event'         =>  $row->pa_name." remove from the record",
            'event_time'    =>  $now, 
        ];
        }
        $output = array();
        $this->pamain_model->createLogs($postDataLogs);
        $this->pamain_model->delete_location($id);
        $this->pamain_model->delete_proclamation($id);
        $this->pamain_model->delete_biological($id);
        $this->pamain_model->delete_project($id);
        $this->pamain_model->delete_occupants($id);
        $this->pamain_model->delete_visitors($id);
        $this->pamain_model->delete_map($id);
        // ==============================================
        // $sqls = $this->db->select('filename')
        //         ->where('generatedcode',$id)
        //         ->get('tblpamainlegislation')
        //         ->row();
        // unlink('bmb_assets2/upload/pdf_file_legislation/'.$sqls->filename);

        // $filedel = '/bmb_assets2/upload/pdf_file_legislation/';
        // if (file_exists($filedel)) {
        //     echo "The file filename exists";
        //    unlink($filedel);
        // } else {
        //    echo "The file filename does not exist";
        // }
        // ===============================================
        $sql = "DELETE FROM tblpamain WHERE generatedcode = '$id'";

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

	public function form($gencode)
	{
		$data['page_title'] = "Protected Area Information";
		$data['setting'] = $this->setting_model->read();
        $user_region = $this->session->userdata('region');
        $data['regionss'] = $this->dashboard_model->region_display($user_region);        
		$data['pamain'] = $this->pamain_model->getAllData($gencode);
		$data['classList'] = $this->pamain_model->classList();
		$data['categoryList'] = $this->pamain_model->categoryList();
		$data['cpabiList'] = $this->pamain_model->cpabiList();
		$data['zoneList'] = $this->pamain_model->zoneList();
		$data['iucnList'] = $this->pamain_model->iucnList();
		$data['monthList'] = $this->pamain_model->monthList();
        $data['yearList'] = $this->pamain_model->yearList();
        $data['yearListed'] = $this->pamain_model->yearListed();
        $data['dayList'] = $this->pamain_model->dayList();
        $data['procList'] = $this->pamain_model->procList();
		$data['sexList'] = $this->pamain_model->sexList();
		$data['commonnameList'] = $this->pamain_model->commonnameList();
		$data['maritalStatus'] = $this->pamain_model->maritalStatus();
		$data['organizationposition'] = $this->pamain_model->organizationposition();
        $data['commonnameList'] = $this->pamain_model->commonnameList();
        $data['tribelist'] = $this->pamain_model->tribelist();
        $data['triberelation'] = $this->pamain_model->triberelation();

        $UserRegions = $this->session->userdata('region');
        $data['regionList'] = $this->pamain_model->regionList($UserRegions);

		$data['content'] = $this->load->view('users/protected/form',$data,TRUE);
		$this->load->view('users/dashboard',$data);
	}

    public function registerMain()
    {

        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        if ($this->input->post('id_main',true) == null)
        {
        $this->form_validation->set_rules('pa_name','Name of Protected Area','required|is_unique[tblpamain.pa_name]');
        $this->form_validation->set_rules('nip_id','Protected Area Classification','required');
        $this->form_validation->set_rules('pacategory_id','Protected Area Category','required');
        $this->form_validation->set_rules('tbz_id','Biogeographic Zone','required');

        $gencode = $this->input->post('gencode');
        $count = $this->pamain_model->count_location($gencode);
        if ($count <= 0) {
            $this->form_validation->set_rules('location','Province and Municipality in location tab','required');
        } else {
            # code...
        }
        

        $data['pamain'] = (object)$postData = [
            'id_main'               => $this->input->post('id_main',true),
            'generatedcode'         => $this->input->post('gencode',true),
            'pacode'                => $this->input->post('gencode',true),
            'pa_name'               => $this->input->post('pa_name',true),
            'nip_id'                => $this->input->post('nip_id',true),
            'pacategory_id'         => $this->input->post('pacategory_id',true),
            'cpabi_id'              => $this->input->post('cpabi_id',true),
            'tbz_id'                => $this->input->post('tbz_id',true),
            'iucn_id'               => $this->input->post('iucncode',true),
            'pamb_approve'          => $this->input->post('pambcheck')==null ? 0 : 1,
            'pamb_month'            => $this->input->post('date_monthPAMB',true),
            'pamb_day'              => $this->input->post('date_dayPAMB',true),
            'pamb_year'             => $this->input->post('date_yearPAMB',true),
            'ipaf'                  => $this->input->post('ipaf')==null ? 0 : 1,
            'heritage'              => $this->input->post('whsites')==null ? 0 : 1,
            'transboundary'         => $this->input->post('tbsites')==null ? 0 : 1,
            'ramsar'                => $this->input->post('ramsasites')==null ? 0 : 1,
            'nipas_compilemap'      => $this->input->post('compilemap')==null ? 0 : 1,
            'nipas_resourceprofile' => $this->input->post('resourceprofile')==null ? 0 : 1,
            'nipas_paplan'          => $this->input->post('paplan')==null ? 0 : 1,
            'nipas_regionalreview'  => $this->input->post('regionalreview')==null ? 0 : 1,
            'nipas_nationalreview'  => $this->input->post('nationalreview')==null ? 0 : 1,
            'nipas_presproc'        => $this->input->post('presproc')==null ? 0 : 1,
            'nipas_congress'        => $this->input->post('congressenact')==null ? 0 : 1,
            'geographic_long1'      => $this->input->post('long1',true),
            'geographic_long2'      => $this->input->post('long2',true),
            'geographic_lat1'       => $this->input->post('lat1',true),
            'geographic_lat2'       => $this->input->post('lat2',true),
            'pa_boundary'           => $this->input->post('boundary',true),
            'landuses'              => $this->input->post('landuses',true),
            'accessibility'         => $this->input->post('accessibility',true),
            'elevation_highest'     => $this->input->post('highestelev',true),
            'elevation_lowest'      => $this->input->post('lowestelev',true),
            'topology'              => $this->input->post('topo',true),
            'climate'               => $this->input->post('climate',true),
            'hydrology'             => $this->input->post('hydro',true),
            'location_details'      => $this->input->post('location',true),
            'existing_landuse'      => $this->input->post('existing_landuse',true),
            'soil'                  => $this->input->post('soil',true),
            'cultural_resource'     => $this->input->post('culturalresource',true),
            'politics'              => $this->input->post('politics',true),
            'belief'                => $this->input->post('belief',true),
            'archeology'            => $this->input->post('archeology',true),
            'ethinicity'            => $this->input->post('ethnicity',true),
            'demography'            => $this->input->post('demography',true),
            'livelihood'            => $this->input->post('livelihood',true),
            'social_service'        => $this->input->post('socialservice',true),
            'tourism'               => $this->input->post('tourism',true),
            'facilities'            => $this->input->post('facilities',true),
            'science_research'      => $this->input->post('research',true),
            'educational'           => $this->input->post('educational',true),
            'threats'               => $this->input->post('threat',true),
            'reference'             => $this->input->post('reference',true),
        ];

        $data['pa_logs'] = (object)$postDataLogs = [
            'user_account'  =>  $this->session->userdata('user_id'),
            'region'        =>  $this->session->userdata('region'),
            'status_id'     =>  '1',
            'generatedcode' =>  $this->input->post('gencode',true),
            'event'         =>  "Succesfully added new protected area ". $this->input->post('pa_name'),
            'event_time'    =>  $now, 
        ];

        }else{
        $this->form_validation->set_rules('pa_name','Name of Protected Area','required');
        $this->form_validation->set_rules('nip_id','Protected Area Classification','required');
        $this->form_validation->set_rules('pacategory_id','Protected Area Category','required');
        $this->form_validation->set_rules('tbz_id','Biogeographic Zone','required');

        $gencode = $this->input->post('gencode');
        $count = $this->pamain_model->count_location($gencode);
        if ($count <= 0) {
            $this->form_validation->set_rules('location','Province and Municipality in location tab','required');
        } else {
            # code...
        }
        
        $data['pamain'] = (object)$postData = [
            'id_main'               => $this->input->post('id_main',true),
            'generatedcode'         => $this->input->post('gencode',true),
            'pacode'                => $this->input->post('gencode',true),
            'pa_name'               => $this->input->post('pa_name',true),
            'nip_id'                => $this->input->post('nip_id',true),
            'pacategory_id'         => $this->input->post('pacategory_id',true),
            'cpabi_id'              => $this->input->post('cpabi_id',true),
            'tbz_id'                => $this->input->post('tbz_id',true),
            'iucn_id'               => $this->input->post('iucncode',true),
            'pamb_approve'          => $this->input->post('pambcheck')==null ? 0 : 1,
            'pamb_month'            => $this->input->post('date_monthPAMB',true),
            'pamb_day'              => $this->input->post('date_dayPAMB',true),
            'pamb_year'             => $this->input->post('date_yearPAMB',true),
            'ipaf'                  => $this->input->post('ipaf')==null ? 0 : 1,
            'heritage'              => $this->input->post('whsites')==null ? 0 : 1,
            'transboundary'         => $this->input->post('tbsites')==null ? 0 : 1,
            'ramsar'                => $this->input->post('ramsasites')==null ? 0 : 1,
            'nipas_compilemap'      => $this->input->post('compilemap')==null ? 0 : 1,
            'nipas_resourceprofile' => $this->input->post('resourceprofile')==null ? 0 : 1,
            'nipas_paplan'          => $this->input->post('paplan')==null ? 0 : 1,
            'nipas_regionalreview'  => $this->input->post('regionalreview')==null ? 0 : 1,
            'nipas_nationalreview'  => $this->input->post('nationalreview')==null ? 0 : 1,
            'nipas_presproc'        => $this->input->post('presproc')==null ? 0 : 1,
            'nipas_congress'        => $this->input->post('congressenact')==null ? 0 : 1,
            'geographic_long1'      => $this->input->post('long1',true),
            'geographic_long2'      => $this->input->post('long2',true),
            'geographic_lat1'       => $this->input->post('lat1',true),
            'geographic_lat2'       => $this->input->post('lat2',true),
            'pa_boundary'           => $this->input->post('boundary',true),
            'landuses'              => $this->input->post('landuses',true),
            'accessibility'         => $this->input->post('accessibility',true),
            'elevation_highest'     => $this->input->post('highestelev',true),
            'elevation_lowest'      => $this->input->post('lowestelev',true),
            'topology'              => $this->input->post('topo',true),
            'climate'               => $this->input->post('climate',true),
            'hydrology'             => $this->input->post('hydro',true),
            'location_details'      => $this->input->post('location',true),
            'existing_landuse'      => $this->input->post('existing_landuse',true),
            'soil'                  => $this->input->post('soil',true),
            'cultural_resource'     => $this->input->post('culturalresource',true),
            'politics'              => $this->input->post('politics',true),
            'belief'                => $this->input->post('belief',true),
            'archeology'            => $this->input->post('archeology',true),
            'ethinicity'            => $this->input->post('ethnicity',true),
            'demography'            => $this->input->post('demography',true),
            'livelihood'            => $this->input->post('livelihood',true),
            'social_service'        => $this->input->post('socialservice',true),
            'tourism'               => $this->input->post('tourism',true),
            'facilities'            => $this->input->post('facilities',true),
            'science_research'      => $this->input->post('research',true),
            'educational'           => $this->input->post('educational',true),
            'threats'               => $this->input->post('threat',true),
            'reference'             => $this->input->post('reference',true),
        ];

        $data['pa_logs'] = (object)$postDataLogs = [
            'user_account'  =>  $this->session->userdata('user_id'),
            'region'        =>  $this->session->userdata('region'),
            'status_id'     =>  '2',
            'generatedcode' =>  $this->input->post('gencode',true),
            'event'         =>  "Update some information of ". $this->input->post('pa_name'),
            'event_time'    =>  $now, 
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagemain'] = validation_errors();
        }else{
            if(empty($postData['id_main'])){
                $query = $this->pamain_model->createMain($postData);
                $this->pamain_model->createLogs($postDataLogs);

                if($query){
                $output['messagemain'] = $this->input->post('pa_name')." ".'New Protected Area registered successfully';
                }else{
                $output['error'] = true;
                $output['messagemain'] = 'Somethings wrong in registration';
                }

                
            }else{

                $query = $this->pamain_model->updateMain($postData);
                $this->pamain_model->createLogs($postDataLogs);
                if($query){
                $output['messagemain'] = $this->input->post('pa_name')." ".'Protected Area successfully update';
                }else{
                $output['error'] = true;
                $output['messagemain'] = 'Somethings wrong in Updating Information';
                }
            }
        }
        echo json_encode($output);
    }
    
	public function fetchlocation(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAlllocation($codegens);
           foreach($data as $row){
            ?>
            <tr>
                <!-- <td><?php echo $row->generatedcode; ?></td> -->
                <td><?php echo $row->regionName; ?></td>
                <td><?php echo ucfirst($row->provinceName); ?></td>
                <td><?php echo ucfirst($row->municipalName); ?></td>
                <td><?php echo $row->barangayName; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removelocations" data-id="<?php echo $row->id_loc ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }


    }

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
                    $options .= strtoupper("<option value=\"$municipals->id_m\">$municipals->municipalName</option>");
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

    public function location()
    {

        if ($this->input->post('generatedcode',true) == null)
        {
        $this->form_validation->set_rules('region_id','Region','required');
        $this->form_validation->set_rules('province_id','Province','required');
        // $this->form_validation->set_rules('municipal_id','Municipal','required');
        // $this->form_validation->set_rules('barangay_id','Barangay','required');
        $data['pamainloc'] = (object)$postData = [
            'id_loc'                => $this->input->post('id_loc',true),
            'generatedcode '    => $this->input->post('gencode',true),
            'region_id'         => $this->input->post('region_id',true),
            'province_id'       => $this->input->post('province_id',true),
            'municipal_id'      => $this->input->post('municipal_id',true),
            'barangay_id'       => $this->input->post('barangay_id',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = validation_errors();
        }else{
            if(empty($postData['generatedcode'])){
                $query = $this->pamain_model->createlocation($postData);
                if($query){
                $output['message'] = 'New Location successfully added';
                }else{
                $output['error'] = true;
                $output['message'] = 'Something wrong';
                }
            }else{

                $query = $this->pamain_model->updatelocation($postData);

                if($query){
                $output['message'] = 'Location successfully update';
                }else{
                $output['error'] = true;
                $output['message'] = 'Something wrong';
                }
            }
        }
        echo json_encode($output);
    }

    public function deletelocation($id)
    {

        $output = array();
         $sql = "DELETE FROM tblpamainlocation WHERE id_loc = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function legislation_save()
    {

        $output1 = array('error' => false);
        if ($this->input->post('id_palegis',true) == null )
        {
        $this->form_validation->set_rules('legis_id','Legislation Name','required');
        $this->form_validation->set_rules('legisno','Legislation Number','required');
        $this->form_validation->set_rules('date_year','Year dated','required');
        $this->form_validation->set_rules('date_month','Month dated','required');
        $this->form_validation->set_rules('area','Area (hectares)','decimal');
        $this->form_validation->set_rules('buffer','Buffer Zone (hectares)');

            if(!empty($_FILES['picture']['name'])){
            $config ['upload_path'] = 'bmb_assets2/upload/pdf_file_legislation';
            $config['file_name'] = $_FILES['picture']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('picture')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            }

        $data['pamainlegis'] = (object)$postDataLegis = [
            'generatedcode '    => $this->input->post('gencode',true),
            'legis_id'          => $this->input->post('legis_id',true),
            'legis_no'          => $this->input->post('legisno',true),
            'date_year'         => $this->input->post('date_year',true),
            'date_month'        => $this->input->post('date_month',true),
            'date_day'          => $this->input->post('date_day',true),
            'area'              => $this->input->post('area',true),
            'buffer'            => $this->input->post('buffer',true),
            // 'filename'          => $filename,

        ];
        }else{
            $data['pamainlegis'] = (object)$postDataLegis = [
            'generatedcode '    => $this->input->post('gencode',true),
            'legis_id'          => $this->input->post('legis_id',true),
            'legis_no'          => $this->input->post('legisno',true),
            'date_year'         => $this->input->post('date_year',true),
            'date_month'        => $this->input->post('date_month',true),
            'date_day'          => $this->input->post('date_day',true),
            'area'              => $this->input->post('area',true),
            'buffer'            => $this->input->post('buffer',true),
            // 'filename'          => ''
        ];
        }
        }

        if ($this->form_validation->run() == false) {
            // if(!empty($_FILES['picture']['name'])){
                $output1['error'] = true;
                $output1['messagelegis'] = validation_errors();


        }else{
            if(empty($postDataLegis['id_palegis'])){
                $query = $this->pamain_model->createLegis($postDataLegis);
                if($query){
                $output1['messagelegis'] = 'Legislation registered successfully';
                }else{
                $output1['error'] = true;
                $output1['messagelegis'] = 'Legislation registered successfully';
                }
            }else{

                $query = $this->pamain_model->updatelocation($postDataLegis);

                if($query){
                $output1['messagelegis'] = 'Legislation successfully update';
                }else{
                $output1['error'] = true;
                $output1['messagelegis'] = 'Legislation registered successfully';
                }
            }
        }


        echo json_encode($output1);
    }

    public function fetchlegis(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAllLegislation($codegens);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->LegisDesc." No. ".$row->legis_no; ?></td>
                <?php if (!empty($row->date_day)): ?>
                    <td><?php echo $row->month." ".$row->date_day.", ".$row->date_year; ?></td>
                <?php else: ?>
                    <td><?php echo $row->month." ".$row->date_year; ?></td>
                <?php endif ?>
                <td><?php echo number_format($row->area,2); ?></td>
                <td><?php echo number_format($row->buffer,2); ?></td>
                <?php if (!empty($row->filename)): ?>
                    <td><a title="<?php echo $row->LegisDesc." No. ".$row->legis_no; ?>" target="_blank" href="<?php echo base_url('bmb_assets2/upload/pdf_file_legislation/'.$row->filename) ?>"><i class="fa fa-paperclip fa-2x"></i></a></td>
                <?php else: ?>
                    <td>No attached file</td>
                <?php endif ?>

                <td><button type="button" class="btn btn-danger btn-flat removelegislation" data-id="<?php echo $row->id_palegis ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deletelegis($id)
    {
			$sql1 = $this->db->where('id_palegis',$id)
											->get('tblpamainlegislation')
											->row();
			unlink('bmb_assets2/upload/pdf_file_legislation/'.$sql1->filename);

        $output = array();
         $sql = "DELETE FROM tblpamainlegislation WHERE id_palegis = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function pambmember()
    {

        if ($this->input->post('generatedcode',true) == null)
        {
        $this->form_validation->set_rules('fname','First name','required|min_length[3]');
        $this->form_validation->set_rules('lname','Lastname','required|min_length[3]');
        // $this->form_validation->set_rules('sex','Gender','required');
        // $this->form_validation->set_rules('maritalstatus','Marital Status','required');
        // $this->form_validation->set_rules('address','Residential Address','required');
        $this->form_validation->set_rules('organization','Organization/Offices','required');
        $this->form_validation->set_rules('position','Position/Designation','required');
        // $this->form_validation->set_rules('officeaddress','Office Address','required');
        $data['pamb'] = (object)$postData = [
            'generatedcode '        => $this->input->post('gencode',true),
            'fname'                 => $this->input->post('fname',true),
            'lname'                 => $this->input->post('lname',true),
            'mname'                 => $this->input->post('mname',true),
            'residential_address'   => $this->input->post('address',true),
            'sex'                   => $this->input->post('sex',true),
            'civil_status'          => $this->input->post('maritalstatus',true),
            'office_name'           => $this->input->post('organization',true),
            'office_address'        => $this->input->post('officeaddress',true),
            'designation'           => $this->input->post('position',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagepamb'] = validation_errors();
        }else{
            if(empty($postData['generatedcode'])){
                $query = $this->pamain_model->createpambmember($postData);
                if($query){
                $output['messagepamb'] = 'New member registered successfully';
                }else{
                $output['error'] = true;
                $output['messagepamb'] = 'New member registered successfully';
                }
            }else{

                $query = $this->pamain_model->updatelocation($postData);

                if($query){
                $output['messagepamb'] = 'Member successfully update';
                }else{
                $output['error'] = true;
                $output['messagepamb'] = 'Member registered successfully';
                }
            }
        }
        echo json_encode($output);
    }

    public function fetchPAMB(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAllPAMBmembers($codegens);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->fname." ".$row->lname; ?></td>
                <td><?php echo $row->sexdesc ?></td>
                <td><?php echo $row->cvdesc; ?></td>
                <td><?php echo $row->office_name."<br>".$row->office_address; ?></td>
                <td><?php echo $row->description; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removepambmember" data-id="<?php echo $row->id_pambmember ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deletepambmember($id)
    {

        $output = array();
         $sql = "DELETE FROM tblpambmember WHERE id_pambmember = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Member Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    function check_names_bio($commonname,$gencode) {        
    if($this->input->post('id_pabiological'))
        $id = $this->input->post('id_pabiological');
    else
        $id = '';
    $result = $this->pamain_model->check_Name_bio($id,$commonname,$gencode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names_bio', 'Name already selected');
        $response = false;
    }
    return $response;
    }

    public function registerBiological()
    {

        $output = array('error' => false);
        if ($this->input->post('id_pabiological',true) == null)
        {
        $this->form_validation->set_rules('commonname','Common Name','required|callback_check_names_bio');
        $data['biological'] = (object)$postData = [
            'id_pabiological'   =>  $this->input->post('id_pabiological',true),
            'generatedcode '    => $this->input->post('gencode',true),
            'id_genus_get'       => $this->input->post('commonname',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagebiological'] = validation_errors();
        }else{
            if(empty($postData['id_pabiological'])){
                $query = $this->pamain_model->createBiological($postData);
                if($query){
                $output['messagebiological'] = 'New Biological feature registered successfully';
                }else{
                $output['error'] = true;
                $output['messagebiological'] = 'Biological registered feature successfully';
                }
            }
        }
        echo json_encode($output);
    }

    public function fetchBiological(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAllbiological($codegens);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->wdesc; ?></td>
                <td><?php echo $row->ClassDesc; ?></td>
                <td><?php echo $row->OrderDesc; ?></td>
                <td><?php echo $row->CommonName; ?></td>
                <td><?php echo $row->commonNameSpecies; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removebiological" data-id="<?php echo $row->id_pabiological ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deletebiological($id)
    {

        $output = array();
         $sql = "DELETE FROM tblpamainbiological WHERE id_pabiological = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function registerProject()
    {

        $output = array('error' => false);
        if ($this->input->post('generatedcode',true) == null)
        {
        $this->form_validation->set_rules('projectname','Project Name','required');
        $this->form_validation->set_rules('yearstart','Year started');
        $this->form_validation->set_rules('yearend','Year end');
        $this->form_validation->set_rules('funding','Source of fund');
        $this->form_validation->set_rules('amount_fund','Amount of fund');
        $this->form_validation->set_rules('implementor','Implementator');
        $this->form_validation->set_rules('remarks','Remarks');
        $data['project'] = (object)$postData = [
            'generatedcode '    => $this->input->post('gencode',true),
            'project_name'      => $this->input->post('projectname',true),
            'date_start'        => $this->input->post('yearstart',true),
            'date_end'          => $this->input->post('yearend',true),
            'source_fund'       => $this->input->post('funding',true),
            'amount'            => $this->input->post('amount_fund',true),
            'implementor'       => $this->input->post('implementor',true),
            'remarks'           => $this->input->post('remarks',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageproject'] = validation_errors();
        }else{
            if(empty($postData['generatedcode'])){
                $query = $this->pamain_model->createProject($postData);
                if($query){
                $output['messageproject'] = 'New Project  registered successfully';
                }else{
                $output['error'] = true;
                $output['messageproject'] = 'New Project registered  successfully';
                }
            }else{

                $query = $this->pamain_model->update($postData);

                if($query){
                $output['messageproject'] = 'Data successfully update';
                }else{
                $output['error'] = true;
                $output['messageproject'] = 'User registered successfully';
                }
            }
        }
        echo json_encode($output);
    }

    public function fetchProject(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAllproject($codegens);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->project_name; ?></td>
                <td><?php echo "From ".$row->date_start." To ".$row->date_end ?></td>
                <td><?php echo $row->source_fund; ?></td>
                <td><?php echo "&#8369; ".number_format($row->amount,2); ?></td>
                <td><?php echo $row->implementor; ?></td>
                <td><?php echo $row->remarks; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removeproject" data-id="<?php echo $row->id_project ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deleteproject($id)
    {

        $output = array();
         $sql = "DELETE FROM tblpamainproject WHERE id_project = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Project Name Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function registerTribe()
    {

        $output = array('error' => false);
        if ($this->input->post('generatedcode',true) == null)
        {
        $this->form_validation->set_rules('householdtag','Household Tag Number','required');
        $this->form_validation->set_rules('tribe_fname','First Name','required');
        $this->form_validation->set_rules('tribe_lname','Last Name','required');
        $this->form_validation->set_rules('tribe','Tribe','required');
        $data['project'] = (object)$postData = [
            'generatedcode '    => $this->input->post('gencode',true),
            'tribe_housetag'    => $this->input->post('householdtag',true),
            'tribe'             => $this->input->post('tribe',true),
            'tribe_fname'       => $this->input->post('tribe_fname',true),
            'tribe_mname'       => $this->input->post('tribe_mname',true),
            'tribe_lname'       => $this->input->post('tribe_lname',true),
            'tribe_month'       => $this->input->post('month_occupied',true),
            'tribe_day'         => $this->input->post('day_occupied',true),
            'tribe_year'        => $this->input->post('year_occupied',true),
            'tribe_relationship'=> $this->input->post('tribe_relation',true),
            'tribe_gender'      => $this->input->post('tribe_gender',true),
            'tribe_marital'     => $this->input->post('tribe_maritalstatus',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagetribe'] = validation_errors();
        }else{
            if(empty($postData['generatedcode'])){
                $query = $this->pamain_model->createTribe($postData);
                if($query){
                $output['messagetribe'] = 'New Tribe Member  registered successfully';
                }else{
                $output['error'] = true;
                $output['messagetribe'] = 'New Tribe Member registered  successfully';
                }
            }else{

                $query = $this->pamain_model->update($postData);

                if($query){
                $output['messagetribe'] = 'Data successfully update';
                }else{
                $output['error'] = true;
                $output['messagetribe'] = 'User registered successfully';
                }
            }
        }
        echo json_encode($output);
    }

    public function fetchTribe(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAlltribe($codegens);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->tribe_housetag; ?></td>
                <td><?php echo $row->month." ".$row->tribe_day.", ".$row->tribe_year ?></td>
                <td><?php echo $row->tribe_name; ?></td>
                <td><?php echo $row->tribe_fname." ".$row->tribe_mname." ".$row->tribe_lname; ?></td>
                <td><?php echo $row->reladesc; ?></td>
                <td><?php echo $row->sexdesc; ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removetribe" data-id="<?php echo $row->id_tribemember ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deletetribe($id)
    {

        $output = array();
         $sql = "DELETE FROM tblsrpaoRegister WHERE id_tribemember = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Project Name Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

            function check_date($id,$gencode) {        
            if($this->input->post('id_rate'))
                $id = $this->input->post('id_rate');
            else
                $id = '';
            $result = $this->pamain_model->check_Date($id,$gencode);
            if($result == 0)
                $response = true;
            else {
                $this->form_validation->set_message('check_date', 'Date already selected');
                $response = false;
            }
            return $response;
            }

        function numeric_wcomma ($str)
        {
            return preg_match('/^[0-9,]+$/', $str);
        }

        public function income()
    {

        if ($this->input->post('generatedcode',true) == null)
        {
        $this->form_validation->set_rules('year_monitoring','Year','required|callback_check_date');
        $this->form_validation->set_rules('month_monitoring','Month','required|callback_check_date');
        $this->form_validation->set_rules('local_male','No. of local male visitors','required|numeric');
        $this->form_validation->set_rules('local_female','No. of local female visitors','required|numeric');
        $this->form_validation->set_rules('foreign_male','No. of foreign male visitors','required|numeric');
        $this->form_validation->set_rules('foreign_female','No. of foreign female visitors','required|numeric');
        $this->form_validation->set_rules('entrancefee','Total income of entrance fee','required|numeric');
        $this->form_validation->set_rules('parkingfee','Total income of parking fee','required|numeric');
        $this->form_validation->set_rules('rentalsfee','Total income of rentals','required|numeric');
        $this->form_validation->set_rules('otherfee','Total income of other fees','required|numeric');
        $data['pamainincome'] = (object)$postData = [
            'generatedcode '    => $this->input->post('gencode',true),
            'date_year'         => $this->input->post('year_monitoring',true),
            'date_month'       => $this->input->post('month_monitoring',true),
            'localmale'      => $this->input->post('local_male',true),
            'localfemale'       => $this->input->post('local_female',true),
            'foreignmale'      => $this->input->post('foreign_male',true),
            'foreignfemale'       => $this->input->post('foreign_female',true),
            'entrance'      => $this->input->post('entrancefee',true),
            'parkingfee'       => $this->input->post('parkingfee',true),
            'rentalsfee'      => $this->input->post('rentalsfee',true),
            'others'       => $this->input->post('otherfee',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['incomeMessage'] = validation_errors();
        }else{
            if(empty($postData['generatedcode'])){
                $query = $this->pamain_model->createincome($postData);
                if($query){
                $output['incomeMessage'] = 'Visitors and income successfully added';
                }else{
                $output['error'] = true;
                $output['incomeMessage'] = 'Visitors and income successfully added';
                }
            }else{

                $query = $this->pamain_model->updateincome($postData);

                if($query){
                $output['incomeMessage'] = 'Visitors and income successfully update';
                }else{
                $output['error'] = true;
                $output['incomeMessage'] = 'Visitors and income successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    public function fetchincome(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getallIncome($codegens);
           foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->month." ".$row->year; ?></td>
                <td><?php echo "Male : ".$row->localmale."<br>Female : ".$row->localfemale."<br> Total : ".$row->total_local; ?></td>
                <td><?php echo "Male : ".$row->foreignmale."<br>Female : ".$row->foreignfemale."<br> Total : ".$row->total_foreign; ?></td>
                <td><?php echo "Entrance Fee : &#8369; ".number_format($row->entrance,2)."<br>Parking Fee : &#8369; ".number_format($row->parkingfee,2)."<br> Rentals Fee : &#8369; ".number_format($row->rentalsfee,2)."<br> Others Fee : &#8369; ".number_format($row->others,2); ?></td>
                <td><?php echo "Sub-IPAF : &#8369; ".number_format($row->total_sub,2)."<br> Central IPAF : &#8369; ".number_format($row->total_central,2)."<br><h4> GRAND TOTAL : &#8369; ".number_format($row->grand_total,2); ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removefee" data-id="<?php echo $row->id_rate ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }

    public function deleteincome($id)
    {

        $output = array();
         $sql = "DELETE FROM tblpavisitorsrate WHERE id_rate = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Data Removed successfully';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function image_upload_save()
    {
        $output2 = array('error' => false);
        #-------------------------------#

        if(!empty($_FILES['picture2']['name'])){                
            $config ['upload_path'] = 'bmb_assets2/upload/map_image';
            $config['file_name'] = $_FILES['picture2']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('picture2')){
                $uploadData = $this->upload->data();
                $filenames = $uploadData['file_name'];
            }
        }
        if ($this->input->post('id_image') == null)
        {
        $this->form_validation->set_rules('gencode','Code','required');
        $data['pamainimage'] = (object)$postDataImage = [
            'id_image'          => $this->input->post('id_image',true),
            'generatedcode '    => $this->input->post('gencode',true),
            'remarks'           =>  $this->input->post('remarks_image',true),
            'filename'          => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        }
        
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageimage'] = validation_errors();
        }else{
            if (empty($filenames)) {
                $output['error'] = true;
                $output['messageimage'] = 'No image upload';
            } else {
               if(empty($postDataImage['id_image'])){
                $query = $this->pamain_model->createImage($postDataImage);
                if($query){
                $output['messageimage'] = 'Image successfully uploaded';
                }else{
                $output['error'] = true;
                $output['messageimage'] = 'No image upload';
                }
            }
            }
            
            
        }
        echo json_encode($output);
    }

     public function fetchImage(){
        $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getAllImage($codegens);
        foreach($data as $row){
            ?>

            <tr>
                <td><img style="max-height: 100px; max-width: 100px; width: 100px; height: 100px" src=" <?php echo base_url('bmb_assets2/upload/map_image/').$row->filename ?>" /></td>
                <td><?php echo '<p>'.$row->remarks.'</p>'; ?></td>     
                <td><a href="<?php echo base_url('bmb_assets2/upload/map_image/').$row->filename ?>" download="<?php echo $row->filename; ?>">Download</a></td>            
                <td><button type="button" class="btn btn-danger btn-flat removeimage" data-id="<?php echo $row->id_image ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }
    }


                // $sql = $this->db->where('id_image',$id)->get('tblpamainimageupload')->row();
                // unlink('bmb_assets2/upload/map_image/'.$sql->filename);

        public function deleteimages($id)
        {
            $sql1 = $this->db->where('id_image',$id)
                                            ->get('tblpamainimageupload')
                                            ->row();
            unlink('bmb_assets2/upload/map_image/'.$sql1->filename);
            // $image_path = base_url().'bmb_assets2/upload/map_image/'; // your image path
            $sql = "DELETE FROM tblpamainimageupload WHERE id_image = '$id'";
            if ($this->db->query($sql)) {

                $output['status'] = 'success';
                $output['message'] = 'Image successfully removed';
            } else {
                $output['status'] = 'error';
                $output['message'] = 'Something went wrong in deleting the data';
            }
              echo json_encode($output);
            //  unlink('bmb_assets2/upload/map_image/'.$sql->filename);
        }
}