<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */

class Ipaf extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
            'users/region_model'
            // 'penro/penro_model',
            // 'users/pa/pamain_model',
            // 'users/dashboard_model'
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
        
    }

    public function byMonth()
    {
        $data['page_title'] =   'Integrated Protected Area Fund Report by Month';
        $data['setting'] = $this->setting_model->read();
        $user_region        =   $this->session->userdata('region');
        $user               =   $this->session->userdata('user_id');
        $provId         =   $this->session->userdata('province');   

        $data['muncipalId'] =   $this->session->userdata('municipality');   
        $data['regionss'] = $this->region_model->region_display($user_region);
        $data['read']       =   $this->region_model->read_by_id($user);
        $data['paList']     =   $this->region_model->paList($user_region);
        
        $data['content'] = $this->load->view('users/report/ipaf_month',$data,TRUE);
        $this->load->view('users/dashboard',$data);
    }

    public function byYear(){
        $data['page_title'] = 'Integrated Protected Area Fund Report by Year';
        $data['setting'] = $this->setting_model->read();
        $user_region        =   $this->session->userdata('region');
        $data['regionss'] = $this->region_model->region_display($user_region);

        $user_id = $this->session->userdata('user_id');

        $data['read'] = $this->region_model->read_by_id($user_id);
        $data['monthListed'] = $this->region_model->monthListed();
        $data['yearListed']     = $this->region_model->yearListed();
        $provId         =   $this->session->userdata('province');
        $data['paList']         = $this->region_model->paList($user_region);

        $data['content'] = $this->load->view('users/report/ipaf_year',$data,TRUE);
        $this->load->view('users/dashboard',$data);
    }

    public function incomeSearch()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $month_list = $this->input->post('month_list');
        $user_id = $this->session->userdata('user_id');
        $data = $this->region_model->getallfeeReportQuerried($searchPa,$year_list,$month_list,$user_id);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->date_month." ".$row->date_day.", ".$row->date_year; ?></td>
                <td><?php echo "No. of Local Male : ".$row->locMale."<br> No. of Local Female : ".$row->locFemale."<br> No. of Foreign Male : ".$row->forMale."<br> No. of Foreign Female : ".$row->forFemale."<br><hr> Total No. of visitors : ".$row->total_visit."<br><hr> Adults : ".$row->fil_adults."<br> Student: ".$row->fil_students."<br> Person with Disability : ".$row->fil_distab."<br> Foreigner: ".$row->foreigner."<br><hr> Total : ".$row->visitors_total ?></td>
                <td><?php echo "Picnic Table : ".$row->facility_tables."<br>Cottages<br>&nbsp &nbsp Day : ".$row->facility_cottages_day.
                    "<br>&nbsp &nbsp Night : ".$row->facility_cottages_night."<br>Camping Site: ".$row->facility_campingsite."<br> Swimming : ".$row->facility_swimmingpool.
                    "<br>Sport Facilities<br> &nbsp &nbsp Daytime :".$row->facility_bcourt_daytime."<br> &nbsp &nbsp Lights : ".$row->facility_bcourt_light.
                    "<br>Docking Area : ".$row->facility_dockingarea."<br> Special Docking Area  : ".$row->special_docking_area."<br><hr> Total : ".$row->facilities_total ?></td>
                <td><?php echo "Tricycle/Motorcycle : ".$row->parking_tricycle."<br> Car/SUV : ".$row->parking_cars."<br> Passenger Jeep/Coaster : ".$row->parking_jeep."<br> Mini/Tour Bus : ".$row->parking_bus."<br><hr> Total : ".$row->parking_total ?></td>
                <td><?php echo "Recreational Activity<br>Water-based Activities<br> &nbsp &nbsp For Filipino : ".$row->recreational_waterbase_activity_foreign."<br>&nbsp &nbsp For Foreigner :".$row->recreational_waterbase_activity_local.
                    "<br>Hiking and Biking<br> &nbsp &nbsp For Filipino : ".$row->trekking_biking_local."<br>&nbsp &nbsp For Foreigner : ".$row->trekking_biking_foreign.
                    "<br>Documentation and Photography : ".$row->commercialdoc_photography.
                    "<br>Trekking, Biking, Mountain Climbing and Caving<br>&nbsp &nbsp For Filipino : ".$row->trekking_biking_local."<br>&nbsp &nbsp For Foreigner : ".$row->trekking_biking_foreign.
                    "<br>SCUBA diving, Whitewater Rafting and Non-Motorized Watersports<br> &nbsp &nbsp For Filipino : ".$row->scuba_local."<br> &nbsp &nbsp For Foreigner : ".$row->scuba_foreign."<br><hr> Total : ".$row->other_total ?></td>
                <td><?php echo "Visitors : ".$row->visitors_total."<br> Facilities : ".$row->facilities_total."<br> Parking Area : ".$row->parking_total."<br>Others : ".$row->other_total."<br><hr>Sub Total : ".$row->sub_total ?></td>
                 
            </tr>            
            <?php
        }
    }

    public function getYear()
        {
        $generatedcode = $this->input->post('searchPa');
            if (!empty($generatedcode)) {
            $query = $this->db->select('*')
                ->from('tblpaipaf')  
                ->where('generatedcode',$generatedcode)
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

    public function getMonth()
        {
            $generatedcode = $this->input->post('searchPa');
            $searchyear    = $this->input->post('searchYear');
            if (!empty($generatedcode)) {
            $query = $this->db->select('*')
                ->from('tblpamainvisitorpa')
                ->where('generatedcode',$generatedcode)
                ->where('date_year',$searchyear)
                ->group_by('date_month')
                ->get();

            $option = "<option value=\"\">Select Month</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $month) {
                    $option .= "<option value=\"$month->date_month\">$month->date_month</option>";
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No record available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid insert selected";
            $data['status'] = null;
        }
        echo json_encode($data);
    }

    public function incomeSearchYear()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $data = $this->region_model->getIpafYearRegion($searchPa,$year_list);
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->date_month; ?></td>
                <td><?php echo "Total no. of visitors : ".$row->no_visitors."<hr>Visitors income: ".$row->visitors."<br>Facilities income: ".$row->facilities."<br>Parking income: ".$row->parking_area."<br>Recreational Income : ".$row->recreational_activity."<br>Water activity income : ".$row->water_activity ?></td>              
                <td><?php echo "<br><hr>Grand Total : ".$row->total?></td>     
            </tr> 

            <?php
        }

    }

}											