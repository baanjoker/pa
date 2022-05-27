<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class fee_setting extends CI_Controller
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
		$user_id	 = $this->session->userdata('user_id');
		$data['read'] = $this->dashboard_model->read_by_id($user_id);
		$data['checkfee'] = $this->pamain_model->CheckFee($user_id);
		$data['page_title'] = "General Setting";
		$data['content'] = $this->load->view('pasu/fee_setting',$data,true);
		$this->load->view('pasu/pasu_wrapper',$data);

	}

	public function savefee()
    {

        if ($this->input->post('id_mainfee',true) == null)
        {

        $this->form_validation->set_rules('fil_adults','Amount for Filipinos Adult','required');
        $this->form_validation->set_rules('fil_students','Amount for Filipinos Students','required');
        $this->form_validation->set_rules('fil_distab','Amount for Filipinos Person w/ disability and senior citizens','required');
        $this->form_validation->set_rules('facility_tables','Amount for Facility tables','required');
        $this->form_validation->set_rules('facility_cottages_day','Amount for Facility cottages','required');
        $this->form_validation->set_rules('facility_cottages_night','Amount for Facility cottages','required');        
        $this->form_validation->set_rules('facility_campingsite','Amount for Facility Camping site','required');
        $this->form_validation->set_rules('facility_swimmingpool','Amount for Facility Swimming pool','required');
        $this->form_validation->set_rules('facility_bcourt_daytime','Amount for Sports Facility dayetime','required');
        $this->form_validation->set_rules('facility_bcourt_light','Amount for Sports Facility with lights','required');       
        $this->form_validation->set_rules('facility_dockingarea','Amount for Facility Docking area','required');
        $this->form_validation->set_rules('special_docking_area','Amount for Special Docking area','required');
        $this->form_validation->set_rules('parking_tricycle','Amount for Parking fee of tricycle','required');
        $this->form_validation->set_rules('parking_cars','Amount for Parking fee of Cars/SUV','required');
        $this->form_validation->set_rules('parking_jeep','Amount for Parking fee of Passenger Jeep/Coaster','required');
        $this->form_validation->set_rules('parking_bus','Amount for Parking fee of Mini-bus and Tour bus','required');
        $this->form_validation->set_rules('recreational_waterbase_activity_local','Amount of Waterbase activity for Filipinos','required');
        $this->form_validation->set_rules('recreational_waterbase_activity_foreign','Amount of Waterbase activity for Foreigns','required');
        $this->form_validation->set_rules('recreational_hiking_local','Amount of Recreational Hiking/Biking activity for Filipinos','required');
        $this->form_validation->set_rules('recreational_hiking_foreign','Amount of Recreational Hiking/Biking activity for Foreigns','required');
        $this->form_validation->set_rules('commercialdoc_photography','Amount for Commercial Documentation and Photography','required');
        $this->form_validation->set_rules('trekking_biking_local','Amount for Trekking, Biking, Mountain Climbing and Caving for Filipinos','required');
        $this->form_validation->set_rules('trekking_biking_foreign','Amount for Trekking, Biking, Mountain Climbing and Caving for Foreigns','required');
        $this->form_validation->set_rules('scuba_local','Amount for SCUBA diving, Whitewater Rafting and Non-Motorized Watersports for Filipinos','required');
        $this->form_validation->set_rules('scuba_foreign','Amount for SCUBA diving, Whitewater Rafting and Non-Motorized Watersports for Foreigns','required');

        $data['pafee'] = (object)$postData = [
            'id_mainfee'               					=> $this->input->post('id_mainfee',true),        	
            'pasu_id'               					=> $this->input->post('pasu_id',true),
            'fil_adults'            					=> $this->input->post('fil_adults',true),
            'fil_students'          					=> $this->input->post('fil_students',true),
            'fil_distab'            					=> $this->input->post('fil_distab',true),
            'foreigner'									=> $this->input->post('foreigner',true),
            'facility_tables'       					=> $this->input->post('facility_tables',true),
            'facility_cottages_day'     				=> $this->input->post('facility_cottages_day',true),
            'facility_cottages_night'     				=> $this->input->post('facility_cottages_night',true),
            'facility_campingsite'  					=> $this->input->post('facility_campingsite',true),
            'facility_swimmingpool' 					=> $this->input->post('facility_swimmingpool',true),
            'facility_bcourt_daytime'       			=> $this->input->post('facility_bcourt_daytime',true),
            'facility_bcourt_light'       				=> $this->input->post('facility_bcourt_light',true),            
            'facility_dockingarea'  					=> $this->input->post('facility_dockingarea',true),
            'special_docking_area'  					=> $this->input->post('special_docking_area',true),
            'parking_tricycle'      					=> $this->input->post('parking_tricycle',true),
            'parking_cars'          					=> $this->input->post('parking_cars',true),
            'parking_jeep'          					=> $this->input->post('parking_jeep',true),
            'parking_bus'           					=> $this->input->post('parking_bus',true),
            'recreational_waterbase_activity_local'   	=> $this->input->post('recreational_waterbase_activity_local',true),
            'recreational_waterbase_activity_foreign' 	=> $this->input->post('recreational_waterbase_activity_foreign',true),
            'recreational_hiking_local'               	=> $this->input->post('recreational_hiking_local',true),
            'recreational_hiking_foreign'  				=> $this->input->post('recreational_hiking_foreign',true),
            'commercialdoc_photography'    				=> $this->input->post('commercialdoc_photography',true),
            'trekking_biking_local'        				=> $this->input->post('trekking_biking_local',true),
            'trekking_biking_foreign'      				=> $this->input->post('trekking_biking_foreign',true),
            'scuba_local'               				=> $this->input->post('scuba_local',true),
            'scuba_foreign'               				=> $this->input->post('scuba_foreign',true),
            
        ];
        }else{
        $this->form_validation->set_rules('fil_adults','Amount for Filipinos Adult','required');
        $this->form_validation->set_rules('fil_students','Amount for Filipinos Students','required');
        $this->form_validation->set_rules('fil_distab','Amount for Filipinos Person w/ disability and senior citizens','required');
        $this->form_validation->set_rules('facility_tables','Amount for Facility tables','required');
        $this->form_validation->set_rules('facility_cottages_day','Amount for Facility cottages','required');
        $this->form_validation->set_rules('facility_cottages_night','Amount for Facility cottages','required'); 
        $this->form_validation->set_rules('facility_campingsite','Amount for Facility Camping site','required');
        $this->form_validation->set_rules('facility_swimmingpool','Amount for Facility Swimming pool','required');
        $this->form_validation->set_rules('facility_bcourt_daytime','Amount for Sports Facility dayetime','required');
        $this->form_validation->set_rules('facility_bcourt_light','Amount for Sports Facility with lights','required');       
        $this->form_validation->set_rules('facility_dockingarea','Amount for Facility Docking area','required');
        $this->form_validation->set_rules('special_docking_area','Amount for Special Docking area','required');
        $this->form_validation->set_rules('parking_tricycle','Amount for Parking fee of tricycle','required');
        $this->form_validation->set_rules('parking_cars','Amount for Parking fee of Cars/SUV','required');
        $this->form_validation->set_rules('parking_jeep','Amount for Parking fee of Passenger Jeep/Coaster','required');
        $this->form_validation->set_rules('parking_bus','Amount for Parking fee of Mini-bus and Tour bus','required');
        $this->form_validation->set_rules('recreational_waterbase_activity_local','Amount of Waterbase activity for Filipinos','required');
        $this->form_validation->set_rules('recreational_waterbase_activity_foreign','Amount of Waterbase activity for Foreigns','required');
        $this->form_validation->set_rules('recreational_hiking_local','Amount of Recreational Hiking/Biking activity for Filipinos','required');
        $this->form_validation->set_rules('recreational_hiking_foreign','Amount of Recreational Hiking/Biking activity for Foreigns','required');
        $this->form_validation->set_rules('commercialdoc_photography','Amount for Commercial Documentation and Photography','required');
        $this->form_validation->set_rules('trekking_biking_local','Amount for Trekking, Biking, Mountain Climbing and Caving for Filipinos','required');
        $this->form_validation->set_rules('trekking_biking_foreign','Amount for Trekking, Biking, Mountain Climbing and Caving for Foreigns','required');
        $this->form_validation->set_rules('scuba_local','Amount for SCUBA diving, Whitewater Rafting and Non-Motorized Watersports for Filipinos','required');
        $this->form_validation->set_rules('scuba_foreign','Amount for SCUBA diving, Whitewater Rafting and Non-Motorized Watersports for Foreigns','required');
        
        $data['pafee'] = (object)$postData = [
        	'id_mainfee'               					=> $this->input->post('id_mainfee',true),       
            'pasu_id'               					=> $this->input->post('pasu_id',true),
            'fil_adults'            					=> $this->input->post('fil_adults',true),
            'fil_students'          					=> $this->input->post('fil_students',true),
            'fil_distab'            					=> $this->input->post('fil_distab',true),
            'foreigner'									=> $this->input->post('foreigner',true),
            'facility_tables'       					=> $this->input->post('facility_tables',true),
            'facility_cottages_day'     				=> $this->input->post('facility_cottages_day',true),
            'facility_cottages_night'     				=> $this->input->post('facility_cottages_night',true),            
            'facility_campingsite'  					=> $this->input->post('facility_campingsite',true),
            'facility_swimmingpool' 					=> $this->input->post('facility_swimmingpool',true),
            'facility_bcourt_daytime'       			=> $this->input->post('facility_bcourt_daytime',true),
            'facility_bcourt_light'       				=> $this->input->post('facility_bcourt_light',true),    
            'facility_dockingarea'  					=> $this->input->post('facility_dockingarea',true),
            'special_docking_area'  					=> $this->input->post('special_docking_area',true),
            'parking_tricycle'      					=> $this->input->post('parking_tricycle',true),
            'parking_cars'          					=> $this->input->post('parking_cars',true),
            'parking_jeep'          					=> $this->input->post('parking_jeep',true),
            'parking_bus'           					=> $this->input->post('parking_bus',true),
            'recreational_waterbase_activity_local'   	=> $this->input->post('recreational_waterbase_activity_local',true),
            'recreational_waterbase_activity_foreign' 	=> $this->input->post('recreational_waterbase_activity_foreign',true),
            'recreational_hiking_local'               	=> $this->input->post('recreational_hiking_local',true),
            'recreational_hiking_foreign'  				=> $this->input->post('recreational_hiking_foreign',true),
            'commercialdoc_photography'    				=> $this->input->post('commercialdoc_photography',true),
            'trekking_biking_local'        				=> $this->input->post('trekking_biking_local',true),
            'trekking_biking_foreign'      				=> $this->input->post('trekking_biking_foreign',true),
            'scuba_local'               				=> $this->input->post('scuba_local',true),
            'scuba_foreign'               				=> $this->input->post('scuba_foreign',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagefee'] = validation_errors();
        }else{
            if(empty($postData['id_mainfee'])){
                $query = $this->pamain_model->createFee($postData);
                if($query){
                $output['messagefee'] = 'New Rate of fee registered successfully';
                }else{
                $output['error'] = true;
                $output['messagefee'] = 'New Rate of fee registered successfully';
                }
            }else{

                $query = $this->pamain_model->updateFee($postData);

                if($query){
                $output['messagefee'] = 'Rate of fee successfully update';
                }else{
                $output['error'] = true;
                $output['messagefee'] = 'Rate of fee update successfully';
                }
            }
        }
        echo json_encode($output);
    }
}