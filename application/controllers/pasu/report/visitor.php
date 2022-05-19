<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class visitor extends CI_Controller
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
    $context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
	}

	public function index()
	{
		$data['page_title'] = 'IPAF Report by Year';
        $user_id = $this->session->userdata('user_id');
        $data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['monthListed'] = $this->pamain_model->monthListed();
        $data['yearListed']		= $this->pamain_model->yearListed();
		$data['dayList']		= $this->pamain_model->dayList();
		$data['paList']			= $this->pamain_model->paListVisitor();
        $data['quarter']         = $this->pamain_model->QuarterlyList();		
        $data['content'] = $this->load->view('pasu/report/visitor_report',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
	}

	public function searchvisitorbyquarter()
	{
		$searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $quarter = $this->input->post('quarter');
        $data = $this->pamain_model->fetchSearchVisitor($searchPa,$year_list,$quarter);
        $data2 = $this->pamain_model->fetchSearchVisitorGrandTotal($searchPa,$year_list,$quarter);
        foreach($data as $row){
            ?>
            <tr>
                <td style="text-align: center"><?php echo $row->date_month." ".$row->date_day.", ".$row->date_year; ?></td>       
                <td style="text-align: center"><?php echo $row->no_male_local; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_local; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_local; ?></td>
                <td style="text-align: center"><?php echo $row->no_male_local_student; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_local_student; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_student; ?></td>
                <td style="text-align: center"><?php echo $row->no_male_local_pwd; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_local_pwd; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_pwd; ?></td>
                <td style="text-align: center"><?php echo $row->no_male_local_sc; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_local_sc; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_sc; ?></td>
                <td style="text-align: center"><?php echo $row->no_male_local_children; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_local_children; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_children; ?></td>
                <td style="text-align: center"><?php echo $row->no_male_foreign; ?></td>
                <td style="text-align: center"><?php echo $row->no_female_foreign; ?></td>
                <td style="color:red;text-align: center"><?php echo $row->total_foreign; ?></td>
                <td style="text-align: center"><?php echo $row->total_male; ?></td>
                <td style="text-align: center"><?php echo $row->total_female; ?></td>
                <td style="color: red;font-weight: 700;text-align: center"><?php echo $row->grand_total; ?></td>      
            </tr>
            <?php
        }
            foreach ($data2 as $Trow) { ?>
            <tr>
                <td style="color: red;font-weight: 700;text-align: center">GRAND TOTAL</td>
                <td style="color: red;font-weight: 700;text-align: right" colspan="3"><?php echo $Trow->gtadults; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;" colspan="3"><?php echo $Trow->gtstudents; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;" colspan="3"><?php echo $Trow->gtpwd; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;" colspan="3"><?php echo $Trow->gtsc; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;" colspan="3"><?php echo $Trow->gtchildren; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;" colspan="3"><?php echo $Trow->gtforeign; ?></td>
                <td style="color: red;font-weight: 700;text-align: right;font-size: 24px" colspan="3"><?php echo $Trow->overallGrandTotal; ?></td>
            </tr>
            <?php }
    }

    public function searchvisitorLogbyquarter()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $quarter = $this->input->post('quarter');
        
        $data = $this->pamain_model->fetchSearchVisitorLogbook_date($searchPa,$year_list,$quarter);
        $data1 = $this->pamain_model->fetchSearchVisitorLogbook_male_below($searchPa,$year_list,$quarter);
        $data2 = $this->pamain_model->fetchSearchVisitorLogbook_female_below($searchPa,$year_list,$quarter);
        $data3 = $this->pamain_model->fetchSearchVisitorLogbook_total_below($searchPa,$year_list,$quarter);

        $data4 = $this->pamain_model->fetchSearchVisitorLogbook_male_pwd($searchPa,$year_list,$quarter);
        $data5 = $this->pamain_model->fetchSearchVisitorLogbook_female_pwd($searchPa,$year_list,$quarter);
        $data6 = $this->pamain_model->fetchSearchVisitorLogbook_total_pwd($searchPa,$year_list,$quarter);

        $data7 = $this->pamain_model->fetchSearchVisitorLogbook_male_senior($searchPa,$year_list,$quarter);
        $data8 = $this->pamain_model->fetchSearchVisitorLogbook_female_senior($searchPa,$year_list,$quarter);
        $data9 = $this->pamain_model->fetchSearchVisitorLogbook_total_senior($searchPa,$year_list,$quarter);

        $data10 = $this->pamain_model->fetchSearchVisitorLogbook_male_student($searchPa,$year_list,$quarter);
        $data11 = $this->pamain_model->fetchSearchVisitorLogbook_female_student($searchPa,$year_list,$quarter);
        $data12 = $this->pamain_model->fetchSearchVisitorLogbook_total_student($searchPa,$year_list,$quarter);

        $data16 = $this->pamain_model->fetchSearchVisitorLogbook_male_adult($searchPa,$year_list,$quarter);
        $data17 = $this->pamain_model->fetchSearchVisitorLogbook_female_adult($searchPa,$year_list,$quarter);
        $data18 = $this->pamain_model->fetchSearchVisitorLogbook_total_adult($searchPa,$year_list,$quarter);


        $data13 = $this->pamain_model->fetchSearchVisitorLogbook_foreign_male($searchPa,$year_list,$quarter);
        $data14 = $this->pamain_model->fetchSearchVisitorLogbook_foreign_female($searchPa,$year_list,$quarter);
        $data15 = $this->pamain_model->fetchSearchVisitorLogbook_total_foreign($searchPa,$year_list,$quarter);

        $totalmalelocal = $this->pamain_model->fetchSearchVisitorLogbook_tMaleLocal($searchPa,$year_list,$quarter);

        $grandtotalLocal = $this->pamain_model->fetchSearchVisitorLogbook_totalLocal($searchPa,$year_list,$quarter);
        $grandgtotal = $this->pamain_model->fetchSearchVisitorLogbook_GTOTAL($searchPa,$year_list,$quarter);
        
       $grandtotalMale = $this->pamain_model->fetchSearchVisitorLogbook_GTOTALMALE($searchPa,$year_list,$quarter);
       $grandtotalFeMale = $this->pamain_model->fetchSearchVisitorLogbook_GTOTALFEMALE($searchPa,$year_list,$quarter);
            ?>
            <?php foreach($data as $row): 
            ?>     
            <tr>
                <td><?php echo $row->month." ".$row->visitorlog_year; ?></td>
                <td>
                <?php foreach ($data1 as $rowM7):
                    if ($rowM7->visitorlog_month == $row->visitorlog_month):
                        echo $rowM7->below;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data2 as $rowF7):
                    if ($rowF7->visitorlog_month == $row->visitorlog_month):
                        echo $rowF7->below2;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data3 as $row7T):
                    if ($row7T->visitorlog_month == $row->visitorlog_month):
                        echo $row7T->totalbelow;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data4 as $rowpwdM):
                    if ($rowpwdM->visitorlog_month == $row->visitorlog_month):
                        echo $rowpwdM->malepwd;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data5 as $rowpwdF):
                    if ($rowpwdF->visitorlog_month == $row->visitorlog_month):
                        echo $rowpwdF->femalepwd;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data6 as $rowpwdT):
                    if ($rowpwdT->visitorlog_month == $row->visitorlog_month):
                        echo $rowpwdT->totalpwd;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data7 as $rowsen):
                    if ($rowsen->visitorlog_month == $row->visitorlog_month):
                        echo $rowsen->malesenior;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data8 as $rowsenF):
                    if ($rowsenF->visitorlog_month == $row->visitorlog_month):
                        echo $rowsenF->femalesenior;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data9 as $rowsenT):
                    if ($rowsenT->visitorlog_month == $row->visitorlog_month):
                        echo $rowsenT->totalsenior;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data10 as $rowstudeM):
                    if ($rowstudeM->visitorlog_month == $row->visitorlog_month):
                        echo $rowstudeM->malestudent;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data11 as $rowstudeF):
                    if ($rowstudeF->visitorlog_month == $row->visitorlog_month):
                        echo $rowstudeF->femalestudent;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data12 as $rowstudeT):
                    if ($rowstudeT->visitorlog_month == $row->visitorlog_month):
                        echo $rowstudeT->totalstudent;
                    endif;
                    endforeach; ?>
                </td>

                <td>
                <?php foreach ($data16 as $rowadultM):
                    if ($rowadultM->visitorlog_month == $row->visitorlog_month):
                        echo $rowadultM->maleadult;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data17 as $rowadultF):
                    if ($rowadultF->visitorlog_month == $row->visitorlog_month):
                        echo $rowadultF->femaleadult;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data18 as $rowadultT):
                    if ($rowadultT->visitorlog_month == $row->visitorlog_month):
                        echo $rowadultT->totaladult;
                    endif;
                    endforeach; ?>
                </td>
                
               <td>
                   <?php foreach ($grandtotalLocal as $rowtot ):
                    if ($rowtot->visitorlog_month == $row->visitorlog_month):
                    ?>
                       <?php echo $rowtot->totalloclss ?>
                   <?php endif; endforeach ?>
               </td>

                <td>
                <?php foreach ($data13 as $rowforMale):
                    if ($rowforMale->visitorlog_month == $row->visitorlog_month):
                        echo $rowforMale->forMale;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data14 as $rowforFemale):
                    if ($rowforFemale->visitorlog_month == $row->visitorlog_month):
                        echo $rowforFemale->forFemale;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                <?php foreach ($data15 as $rowforT):
                    if ($rowforT->visitorlog_month == $row->visitorlog_month):
                        echo $rowforT->totalfor;
                    endif;
                    endforeach; ?>
                </td>
                <td>
                    <?php 
                    foreach ($grandtotalMale as $rowgtm):
                    if ($rowgtm->visitorlog_month == $row->visitorlog_month):
                        echo $rowgtm->gtmale;
                    endif;
                    endforeach;
                        ?>
                </td>

                <td>
                    <?php 
                    foreach ($grandtotalFeMale as $rowgtf):
                    if ($rowgtf->visitorlog_month == $row->visitorlog_month):
                        echo $rowgtf->gtfemale;
                    endif;
                    endforeach;
                        ?>
                </td>
                    
                <td><?php 
                    foreach ($grandgtotal as $rowgt):
                    if ($rowgt->visitorlog_month == $row->visitorlog_month):
                echo $rowgt->gggttt;
                endif;
                    endforeach;
                ?></td>
            </tr>

            <?php
            endforeach;
    }   

    public function getYear()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('searchPaVisitor');
            if (!empty($generatedcode)) {
            $query = $this->db->select('*')
                ->from('tblpaipafvisitors')  
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

    public function getYearVisitorLogs()
        {
        $user_id = $this->session->userdata('user_id');
        $generatedcode = $this->input->post('searchPaVisitor');
            if (!empty($generatedcode)) {
            $query = $this->db->select('*')
                ->from('tblipafvisitorslog')  
                ->where('generatedcode',$generatedcode)
                ->group_by('visitorlog_year')
                ->get();

            $option = "<option value=\"\">Select Year</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $year) {
                    $option .= "<option value=\"$year->visitorlog_year\">$year->visitorlog_year</option>";
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
}
