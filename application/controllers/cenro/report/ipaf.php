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
            'cenro/cenro_model',
		]);
		
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=4)
		redirect('login');
    $context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
	}

    public function byMonth()
    {
        $data['page_title'] =   'Integrated Protected Area Fund Yearly Report';
        $data['blood'] = $this->cenro_model->blood_list();
        $data['gender'] = $this->cenro_model->gender_list();
        $data['region'] = $this->cenro_model->region_list();
        $user_region        =   $this->session->userdata('region');
        $user_role          =   $this->session->userdata('user_role');
        $user               =   $this->session->userdata('user_id');
        $muncipalId         =   $this->session->userdata('municipality');   
        $data['muncipalId'] =   $this->session->userdata('municipality');        
             
        $data['read']       =   $this->cenro_model->read_by_id($user);
        $data['paList']     =   $this->cenro_model->paList();
        $data['yearListed']     = $this->cenro_model->yearListed();
        $data['yearduration']     = $this->cenro_model->yearduration();
        
        $data['content'] = $this->load->view('cenro/report/ipaf_month',$data,TRUE);
        $this->load->view('cenro/cenro_wrapper',$data);
    }

    public function byYear(){
        $data['page_title'] = 'Integrated Protected Area Fund Quarterly Report';
        $user_id = $this->session->userdata('user_id');

        $data['read'] = $this->cenro_model->read_by_id($user_id);
        $data['monthListed'] = $this->cenro_model->monthListed();
        $data['yearListed']     = $this->cenro_model->yearListed();
        // $data['dayList']        = $this->cenro_model->dayList();
        $data['quarter']         = $this->cenro_model->QuarterlyList();
        $data['paList']         = $this->cenro_model->paList();

        $data['content'] = $this->load->view('cenro/report/ipaf_year',$data,TRUE);
        $this->load->view('cenro/cenro_wrapper',$data);
    }

    public function incomeSearch()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $month_list = $this->input->post('month_list');
        $user_id = $this->session->userdata('user_id');
        $data = $this->cenro_model->getallfeeReportQuerried($searchPa,$year_list,$month_list,$user_id);
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
                ->from('tblpaipafincome')  
                ->where('generatedcode',$generatedcode)
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
        $GTTO = 0;
        $GTTO75 = 0;
        $GTTO25 = 0;
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $user_id = $this->session->userdata('user_id');
        $quarter = $this->input->post('quarter');

        $data = $this->cenro_model->getIpafYear($searchPa,$year_list,$quarter);
        $data2 = $this->cenro_model->getGrandtotalIpaf($searchPa,$year_list,$quarter);
        $datadis = $this->cenro_model->getGrandtotalDisburse($searchPa,$year_list,$quarter);
        $datadevs = $this->cenro_model->getGrandtotalDevelopments($searchPa,$year_list,$quarter);
        $dataoth = $this->cenro_model->getGrandtotalother1($searchPa,$year_list,$quarter);
        foreach($data as $row){
            $id = $row->id_income;
            $dataother = $this->cenro_model->searchallIpafotherbyyear($id,$searchPa,$year_list,$quarter);
            $datadisbursement = $this->cenro_model->searchallIpafdisbursementbyyear($id,$searchPa,$year_list,$quarter);
            $datadevelopment = $this->cenro_model->searchallIpafdevelopmentbyyear($id,$searchPa,$year_list,$quarter);
            ?>
            <tr>
                <td><?php echo $row->date_month_income; ?></td>
                <td><?php echo $row->date_year_income; ?></td>               
                <td style="text-align: right"><?php echo number_format($row->sum_entrance,2); ?></td>
                <td style="text-align: right"><?php echo number_format($row->sum_facility,2); ?></td>
                <td style="text-align: right"><?php echo number_format($row->sum_resource,2); ?></td>
                <td style="text-align: right"><?php echo number_format($row->sum_concession,2); ?></td>  
                <td>

                <?php foreach ($datadevelopment as $rowdev): 
                    if ($row->date_month_income == $rowdev->dev_month):
                        echo  $rowdev->sumdevelopment;
                        $devs = $rowdev->sumdevelopment;
                    endif;
                endforeach; 
                ?>              
                            
                </td> 

                <td class="hide"><?php echo $row->other_specify_title; ?></td>                                           
                <td class="hide"><?php echo $row->other_specify_amount; ?></td>  
                <td>
                <?php foreach ($dataother as $row3):
                        if ($row->date_month_income == $row3->income_month ):
                            echo  $row3->sumOther3;
                            $dt = $row3->sumOther3;
                        endif;
                    endforeach; ?>            
                </td>     
                <?php 
                foreach ($datadisbursement as $rowdt): 
                    if ($row->id_income == $rowdt->id_fromincome): 
                        $tcq75 = $rowdt->sumdisbursement * 0.75;
                        $tcq25 = $rowdt->sumdisbursement * 0.25;
                    endif;
                endforeach;
                ?>
                <?php $sum_income = $row->Grand_total_income + (!empty($devs)?$devs:0) + (!empty($dt)?$dt:0); ?>
                <?php $income75 = $sum_income * 0.75; ?>
                <?php $income25 = $sum_income * 0.25; ?>

                <td><?php
                    echo number_format($sum_income,2);
                    ?>                    
                </td>
                <td style="text-align: right"><?php echo number_format($income75,2); ?></td>                                           
                <td style="text-align: right" class="hide"><?php echo number_format($tcq75,2); ?></td>                                           
                <td style="text-align: right"><?php echo number_format($income25,2); ?></td>                                           
                <td style="text-align: right" class="hide"><?php echo number_format($tcq25,2); ?></td>                                           
                <td style="color:red;text-align: right"><?php echo number_format($sum_income,2); ?></td> 
            </tr>
            <?php
        }
        ?>
        <?php  ?>
            <tr>
                <td style="color:red; font-weight: 700" colspan="2">GRAND TOTAL</td>
                    <?php
                        foreach ($data2 as $gt) {
                            $val1 = $gt->grandtotal;
                        }
                        foreach ($datadevs as $gtd) {
                            $val2 = $gtd->grandtotalDevelopment;
                        }
                        foreach ($dataoth as $gto) { 
                            $val3 = $gto->grandtotalothe;
                        }
                        $GTTO += $val1+ (!empty($val2)?$val2:0)+(!empty($val3)?$val3:0);
                        $GTTO75 += ($val1+ (!empty($val2)?$val2:0)+(!empty($val3)?$val3:0))*0.75;
                        $GTTO25 += ($val1+ (!empty($val2)?$val2:0)+(!empty($val3)?$val3:0))*0.25;

                        foreach ($datadis as $gtds) {
                            $val4 = number_format($gtds->grandtotalDisburse,2);
                        }
                            $GTD75 += $val4*0.75;
                            $GTD25 += $val4*0.25;

                    ?>
                <td style="color:red; font-weight: 700;text-align: right" colspan="7"></td>

                <td style="color:red; font-weight: 700;text-align: right" colspan="">
                        <?php echo number_format($GTTO75,2);?>
                </td>
                <td style="color:red; font-weight: 700;text-align: right" class="hide"><?php echo number_format($GTD75,2);?></td>
                <td style="color:red; font-weight: 700;text-align: right" colspan="">
                        <?php echo number_format($GTTO25,2);?>
                </td>
                <td style="color:red; font-weight: 700;text-align: right" class="hide"><?php echo number_format($GTD25,2);?></td>
                <td style="font-size:20px;color:red; font-weight: 700;text-align: right" colspan="">
                        <?php echo number_format($GTTO,2);?>
                </td>
            </tr>
        <?php
    }

    public function incomeSearchYear2()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $user_id = $this->session->userdata('user_id');
        $quarter = $this->input->post('quarter');
        $data = $this->cenro_model->getIpafYearOthers($searchPa,$year_list,$quarter);
        foreach($data as $rows){
            $id = $rows->id_income;
            $datadevfee = $this->cenro_model->searchdevfeesbyyear($id,$searchPa,$year_list,$quarter);
            $datadisbursement = $this->cenro_model->searchdsibursementfeesbyyear($id,$searchPa,$year_list,$quarter);
            $datacontri = $this->cenro_model->searchcontribyyear($id,$searchPa,$year_list,$quarter);
            $dataff = $this->cenro_model->searchffbyyear($id,$searchPa,$year_list,$quarter);
            ?>
            <tr>
                <td><?php echo $rows->date_month_income; ?></td>
                <td><?php echo $rows->date_year_income; ?></td> 

                <?php if (!empty($datadisbursement)): ?>
                    <?php foreach ($datadisbursement as $disbf):?>
                        <td class="hide"><?php echo  $disbf->disbursefee ?></td> 
                    <?php endforeach; ?>
                <?php else: ?>
                    <td class="hide"></td>
                <?php endif; ?>
                <?php if (!empty($datacontri)): ?>
                    <?php foreach ($datacontri as $cf):?>
                        <td><?php echo  $cf->contrif ?></td> 
                    <?php endforeach; ?>
                <?php else: ?>
                    <td></td>
                <?php endif; ?>

                <?php if (!empty($dataff)): ?>
                    <?php foreach ($dataff as $ff):?>
                        <td><?php echo  $ff->ffd ?></td> 
                    <?php endforeach; ?>
                <?php else: ?>
                    <td></td>
                <?php endif; ?>

            </tr>
            <?php
        }
        ?>
            
    <?php 
    }

}											