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
			'pasu/dashboard_model',
			'pasu/pamain_model'
		]);

		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
		redirect('login');
	}

	public function index()
	{
		$data['page_title'] = 'IPAF Report by Year';
        $user_id = $this->session->userdata('user_id');

        $fname = $this->session->userdata('fullname');
        $mname = $this->session->userdata('middlenames');
        $lname = $this->session->userdata('lastnames');
        $data['designation'] = $this->session->userdata('designation');

        $data['completename'] = $fname." ".$mname." ".$lname;
        $data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['monthListed'] = $this->pamain_model->monthListed();
        $data['yearListed']		= $this->pamain_model->yearListed();
        $data['yearduration']     = $this->pamain_model->yearduration();
		$data['dayList']		= $this->pamain_model->dayList();
		$data['paList']			= $this->pamain_model->paList();
        $data['quarter']         = $this->pamain_model->QuarterlyList();
        $data['content'] = $this->load->view('pasu/report/ipaf_actualincome',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
	}
    public function byDate(){
        $data['page_title'] = 'IPAF Report by Year';
        $user_id = $this->session->userdata('user_id');

        $data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['monthListed'] = $this->pamain_model->monthListed();
        $data['yearListed']     = $this->pamain_model->yearListed();
        $data['yearduration']     = $this->pamain_model->yearduration();
        $data['dayList']        = $this->pamain_model->dayList();
        $data['paList']         = $this->pamain_model->paList();

        $data['content'] = $this->load->view('pasu/report/ipaf_report_year',$data,TRUE);
        $this->load->view('pasu/pasu_wrapper',$data);
    }

	public function fetchincomeReport(){
        $codegens = $this->input->post('codegens');
        $user_id = $this->session->userdata('user_id');

        $data = $this->pamain_model->getallfeeReport($user_id);

           foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->date_month." ".$row->date_day.", ".$row->date_year; ?></td>
                <td><?php echo "Adults : ".$row->fil_adults."<br> Student: ".$row->fil_students."<br> Person with Disability : ".$row->fil_distab."<br> Foreigner: ".$row->foreigner ?></td>
                <td><?php echo "Picnic Table : ".$row->facility_tables."<br>Cottages<br>&nbsp &nbsp Day : ".$row->facility_cottages_day.
                    "<br>&nbsp &nbsp Night : ".$row->facility_cottages_night."<br>Camping Site: ".$row->facility_campingsite."<br> Swimming : ".$row->facility_swimmingpool.
                    "<br>Sport Facilities<br> &nbsp &nbsp Daytime :".$row->facility_bcourt_daytime."<br> &nbsp &nbsp Lights : ".$row->facility_bcourt_light.
                    "<br>Docking Area : ".$row->facility_dockingarea."<br> Special Docking Area  : ".$row->special_docking_area ?></td>
                <td><?php echo "Tricycle/Motorcycle : ".$row->parking_tricycle."<br> Car/SUV : ".$row->parking_cars."<br> Passenger Jeep/Coaster : ".$row->parking_jeep."<br> Mini/Tour Bus : ".$row->parking_bus ?></td>
                <td><?php echo "Recreational Activity<br>Water-based Activities<br> &nbsp &nbsp For Filipino : ".$row->recreational_waterbase_activity_foreign."<br>&nbsp &nbsp For Foreigner :".$row->recreational_waterbase_activity_local.
                    "<br>Hiking and Biking<br> &nbsp &nbsp For Filipino : ".$row->trekking_biking_local."<br>&nbsp &nbsp For Foreigner : ".$row->trekking_biking_foreign.
                    "<br>Documentation and Photography : ".$row->commercialdoc_photography.
                    "<br>Trekking, Biking, Mountain Climbing and Caving<br>&nbsp &nbsp For Filipino : ".$row->trekking_biking_local."<br>&nbsp &nbsp For Foreigner : ".$row->trekking_biking_foreign.
                    "<br>SCUBA diving, Whitewater Rafting and Non-Motorized Watersports<br> &nbsp &nbsp For Filipino : ".$row->scuba_local."<br> &nbsp &nbsp For Foreigner : ".$row->scuba_foreign ?></td>
                <td><button type="button" class="btn btn-danger btn-flat removefee" data-id="<?php echo $row->id_fee ?>" title="Remove"><i class="fa fa-times"></i></button></td>
            </tr>
            <?php
        }

        // $data['content'] = $this->load->view('pasu/report/ipaf_report',$data,TRUE);
        // $this->load->view('pasu/pasu_wrapper',$data);
    }


    public function incomeSearch()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $month_list = $this->input->post('month_list');
        $user_id = $this->session->userdata('user_id');
        $data = $this->pamain_model->getallfeeReportQuerried($searchPa,$year_list,$month_list,$user_id);
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
    public function incomeperweek(){
        $searchPa = $this->input->post('searchPa');
        $year = $this->input->post('year');
        $months = $this->input->post('months');
        $fday = $this->input->post('fday');
        $tday = $this->input->post('tday');
        $data = $this->pamain_model->getallIpafIncomeWeekly($searchPa,$year,$fday,$tday,$months);
        $dataGT = $this->pamain_model->getallIpafIncomeWeeklyGrandTotal($searchPa,$year,$fday,$tday,$months);

        foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row->visitorlogs_month." ".$row->visitorlogs_day.", ".$row->visitorlogs_year; ?></td>
                        <td><?php echo number_format($row->efamount,2); ?></td>
                        <td><?php echo number_format($row->ffamount,2); ?></td>
                        <td><?php echo number_format($row->rfamount,2); ?></td>
                        <td><?php echo number_format($row->cfamount,2); ?></td>
                        <td><?php echo number_format($row->dfamount,2); ?></td>
                        <td><?php echo number_format($row->ofamount,2); ?></td>
                        <td><?php echo number_format($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount,2) ?></td>
                        <td><?php echo number_format(($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount)*.75,2) ?></td>
                        <td><?php echo number_format(($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount)*.25,2) ?></td>
                        <td><?php echo number_format($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount,2) ?></td>
                    </tr>
        <?php }

        foreach ($dataGT as $rowgt) { ?>
            <tr style="background-color: #d6e0f5;font-weight: 600;color: #008000">
                <td colspan="7">GRAND TOTAL</td>
                <td><?php echo number_format($rowgt->efamount+$rowgt->ffamount+$rowgt->rfamount+$rowgt->cfamount+$rowgt->dfamount+$rowgt->ofamount,2) ?></td>
                <td><?php echo number_format(($rowgt->efamount+$rowgt->ffamount+$rowgt->rfamount+$rowgt->cfamount+$rowgt->dfamount+$rowgt->ofamount)*.75,2) ?></td>
                <td><?php echo number_format(($rowgt->efamount+$rowgt->ffamount+$rowgt->rfamount+$rowgt->cfamount+$rowgt->dfamount+$rowgt->ofamount)*.25,2) ?></td>
                <td><?php echo number_format($rowgt->efamount+$rowgt->ffamount+$rowgt->rfamount+$rowgt->cfamount+$rowgt->dfamount+$rowgt->ofamount,2) ?></td>
            </tr>
        <?php
        }
    }

     public function incomeSearchperweekDH()
    {
        $gtto = 0;
        $gtto75 = 0;
        $gtto25 = 0;
        $searchPa = $this->input->post('searchPa');
        $year = $this->input->post('year');
        $months = $this->input->post('months');
        $fday = $this->input->post('fday');
        $tday = $this->input->post('tday');
        $data = $this->pamain_model->getallIpafIncomeWeeklyContriFinePenalty($searchPa,$year,$fday,$tday,$months);
        foreach($data as $row){?>
            <tr>
                <td><?php echo $row->visitorlogs_month." ".$row->visitorlogs_day.", ".$row->visitorlogs_year; ?></td>
                <td><?php echo $row->contritext; ?></td>
                <td><?php echo $row->fpfamount; ?></td>
            </tr>
        <?php
        }

    }

    public function incomeSearchYear()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $user_id = $this->session->userdata('user_id');
        $quarter = $this->input->post('quarter');
        //  $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getallIpafIncomeQuarterly($searchPa,$year_list,$quarter);
        // $datacr = $this->pamain_model->getallIpafincomecertificates($codegens);
        // $dataGT = $this->pamain_model->grandtotalincomevisit($codegens);
        foreach ($data as $row) { ?>
            <tr>
                <td><?php echo $row->visitorlogs_month; ?></td>
                <td><?php echo $row->visitorlogs_year; ?></td>
                <td><?php echo number_format($row->efamount,2); ?></td>
                <td><?php echo number_format($row->ffamount,2); ?></td>
                <td><?php echo number_format($row->rfamount,2); ?></td>
                <td><?php echo number_format($row->cfamount,2); ?></td>
                <td><?php echo number_format($row->dfamount,2); ?></td>
                <td><?php echo number_format($row->ofamount,2); ?></td>
                <td><?php echo number_format($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount,2) ?></td>
                <td><?php echo number_format(($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount)*.75,2) ?></td>
                <td><?php echo number_format(($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount)*.25,2) ?></td>
                <td><?php echo number_format($row->efamount+$row->ffamount+$row->rfamount+$row->cfamount+$row->dfamount+$row->ofamount,2) ?></td>
            </tr>

<?php }
    }

    public function incomeSearchYear2()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $user_id = $this->session->userdata('user_id');
        $quarter = $this->input->post('quarter');
        //  $codegens = $this->input->post('codegens');
        $data = $this->pamain_model->getallIpafIncomeQuarterly($searchPa,$year_list,$quarter);
        // $datacr = $this->pamain_model->getallIpafincomecertificates($codegens);
        // $dataGT = $this->pamain_model->grandtotalincomevisit($codegens);
        foreach ($data as $row) { ?>
            <tr>
                <td><?php echo $row->visitorlogs_month; ?></td>
                <td><?php echo $row->visitorlogs_year; ?></td>
                <td><?php echo $row->contritext; ?></td>
                <td><?php echo $row->fpfamount; ?></td>
            </tr>

<?php }
    }

    public function incomeSearchs()
    {
    	$codegens = $this->input->post('codegens');
    	$searchpa = $this->input->post('searchpa');
        $user_id = $this->session->userdata('user_id');

        $yyy   = $this->pamain_model->query_by_year($user_id,$codegens);
        $data = $this->pamain_model->getallfeeReportFiltered($codegens,$user_id,$searchpa);

            foreach ($yyy as $year){ ?>
            <p><?php echo $year->date_year; ?></p>
            <!-- <?php echo form_dropdown('searchpa',$year->date_year,'','class="form-control border-input" id="searchPa"') ?>        -->
                <!-- <input type="button" name="monthDate" value="<?php echo $year->date_year; ?>" class="btn btn-primary" id="selectDate">                    -->
            <?php }

    }

    public function incomeSearcher()
    {
        $codegens = $this->input->post('codegens');
        $month = $this->input->post('month');
        $user_id = $this->session->userdata('user_id');
        $yyy   = $this->pamain_model->query_by_year($user_id,$codegens);
        $data = $this->pamain_model->getallfeeReportFiltered($codegens,$user_id,$month);

            foreach ($yyy as $year){ ?>
            <div class="left-vertical-tabs center-tabs">
                <ul class="nav nav-stacked" role="tablist">
                    <li>
                        <a id="selectDate" aria-expanded="true"><?php echo $year->date_year; ?></a><br>
                    </li>
                </ul>
            </div>
           <?php }

    }

    public function getYear()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('searchPa');
            if (!empty($generatedcode)) {
            // $query = $this->db->select('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode = $generatedcode')
             $query = $this->db->select('*')
             ->from('tblpaipafincome')
             ->where('tblpaipafincome.generatedcode',$generatedcode)
             ->group_by('date_year_income')
                ->get();

            // $this->db->query('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode ='$generatedcode);

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

    public function getYearIncome()
        {
        $generatedcode = $this->input->post('searchPa');
            if (!empty($generatedcode)) {
             $query = $this->db->select('*')
             // ->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT')
             ->from('tblipafsourceincome')
             ->where('tblipafsourceincome.generatedcode',$generatedcode)
             ->group_by('income_date_year')
                ->get();
            $option = "<option value=\"\">Select Year</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $year) {
                    $option .= "<option value=\"$year->income_date_year\">$year->income_date_year</option>";
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



    public function getYear2()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('searchPa2');
            if (!empty($generatedcode)) {
            // $query = $this->db->select('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode = $generatedcode')
             $query = $this->db->select('*')
             ->from('tblpaipafincome')
             ->where('tblpaipafincome.generatedcode',$generatedcode)
             ->group_by('date_year_income')
                ->get();

            // $this->db->query('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode ='$generatedcode);

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

}
