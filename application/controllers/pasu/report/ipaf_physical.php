<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 *
 */
/**
 *
 */
class ipaf_physical extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library([
    			'PDFL',
    			// 'PDFPAMAIN',
    			]);
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
        $data['page_title'] = 'Physical Report of Operation';
        $user_id = $this->session->userdata('user_id');
        $fname = $this->session->userdata('fullname');
        $mname = $this->session->userdata('middlenames');
        $lname = $this->session->userdata('lastnames');
        $data['designation'] = $this->session->userdata('designation');
        $data['completename'] = $fname." ".$mname." ".$lname;
        $data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['monthListed'] = $this->pamain_model->monthListed();
        $data['yearListed']     = $this->pamain_model->yearListed();
        $data['yearduration']     = $this->pamain_model->yearduration();
        $data['dayList']        = $this->pamain_model->dayList();
        $data['paList']         = $this->pamain_model->paList();
        $data['quarter']         = $this->pamain_model->QuarterlyList();
        $data['content'] = $this->load->view('pasu/report/ipaf_physical_report',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
    }

    public function getYearPhyRep()
        {
        $generatedcode = $this->input->post('searchPa');
            if (!empty($generatedcode)) {
            // $query = $this->db->select('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode = $generatedcode')
             $query = $this->db->select('*')
             ->from('tblipaf_physical')
             ->where('generatedcode',$generatedcode)
             ->group_by('physical_year')
                ->get();

            // $this->db->query('SELECT date_year_coontri,generatedcode FROM tblpaipafcontri UNION SELECT date_year_income,generatedcode FROM tblpaipafincome WHERE generatedcode ='$generatedcode);

            $option = "<option value=\"\">Select Year</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $year) {
                    $option .= "<option value=\"$year->physical_year\">$year->physical_year</option>";
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

    public function fetchphysicalreports(){
        $codegens = $this->input->post('palist');
        $year = $this->input->post('payear');
        $quarter = $this->input->post('quarter');
        $data = $this->pamain_model->getallyearsphysicalGenerateReport($codegens,$year,$quarter);
        $datas = $this->pamain_model->getallmonthphysicalGenerateReport($codegens,$year,$quarter);
        foreach($data as $row): 
            $code = $row->physical_code;
            $id = $row->id_ipaf_physical;
            $ptr1 = $this->pamain_model->getallphyrepperJan($id,$code,$year,$quarter);            
            $ptr2 = $this->pamain_model->getallphyrepperFeb($id,$code,$year,$quarter);            
            $ptr3 = $this->pamain_model->getallphyrepperMar($id,$code,$year,$quarter);            
            $ptr4 = $this->pamain_model->getallphyrepperApr($id,$code,$year,$quarter);            
            $ptr5 = $this->pamain_model->getallphyrepperMay($id,$code,$year,$quarter);            
            $ptr6 = $this->pamain_model->getallphyrepperJun($id,$code,$year,$quarter);            
            $ptr7 = $this->pamain_model->getallphyrepperJul($id,$code,$year,$quarter);            
            $ptr8 = $this->pamain_model->getallphyrepperAug($id,$code,$year,$quarter);            
            $ptr9 = $this->pamain_model->getallphyrepperSep($id,$code,$year,$quarter);            
            $ptr10 = $this->pamain_model->getallphyrepperOct($id,$code,$year,$quarter);            
            $ptr11 = $this->pamain_model->getallphyrepperNov($id,$code,$year,$quarter);            
            $ptr12 = $this->pamain_model->getallphyrepperDec($id,$code,$year,$quarter); 
            $gtpt = $this->pamain_model->getallTotalphyrepperuarter($id,$code,$year,$quarter); 
          ?>

          <tr style="text-align: left;">
            <td style="text-transform: uppercase;"><?php echo $row->physical_progactivityproj?></td>
            <td><?php echo $row->physical_indicator?></td>
            <td style="text-align:right;"><?php echo number_format($row->physical_cost,2)?></td>
            <td style="text-align:right;"><?php echo number_format($row->physical_quantity)?></td>
            <td style="text-align:right">
                <?php foreach($ptr1 as $rt1): echo (!empty($rt1->physical_target_quantity)?$rt1->physical_target_quantity:"0"); endforeach;?>                    
                <?php foreach($ptr4 as $rt4): echo (!empty($rt4->physical_target_quantity)?$rt4->physical_target_quantity:"0"); endforeach;?>                    
                <?php foreach($ptr7 as $rt7): echo (!empty($rt7->physical_target_quantity)?$rt7->physical_target_quantity:"0"); endforeach;?>                    
                <?php foreach($ptr10 as $rt10): echo (!empty($rt10->physical_target_quantity)?$rt10->physical_target_quantity:"0"); endforeach;?>                    
            </td>
            <td style="text-align:right">
                <?php foreach($ptr2 as $rt2): echo (!empty($rt2->physical_target_quantity)?$rt2->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr5 as $rt5): echo (!empty($rt5->physical_target_quantity)?$rt5->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr8 as $rt8): echo (!empty($rt8->physical_target_quantity)?$rt8->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr11 as $rt11): echo (!empty($rt11->physical_target_quantity)?$rt11->physical_target_quantity:"0"); endforeach;?>  
            </td> 
            <td style="text-align:right">
                <?php foreach($ptr3 as $rt3): echo (!empty($rt3->physical_target_quantity)?$rt3->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr6 as $rt6): echo (!empty($rt6->physical_target_quantity)?$rt6->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr9 as $rt9): echo (!empty($rt9->physical_target_quantity)?$rt9->physical_target_quantity:"0"); endforeach;?>  
                <?php foreach($ptr12 as $rt12): echo (!empty($rt12->physical_target_quantity)?$rt12->physical_target_quantity:"0"); endforeach;?>  
            </td>
            <td style="text-align:right;color:#ff4d4d;font-weight: 700;">
                <?php foreach($gtpt as $gt1): echo $gt1->totalptq; endforeach;?>                
            </td>
            <td style="text-align:right">
                <?php foreach($ptr1 as $rt1): echo (!empty($rt1->physical_target_accomp)?$rt1->physical_target_accomp:"0"); endforeach;?>                    
                <?php foreach($ptr4 as $rt4): echo (!empty($rt4->physical_target_accomp)?$rt4->physical_target_accomp:"0"); endforeach;?>                    
                <?php foreach($ptr7 as $rt7): echo (!empty($rt7->physical_target_accomp)?$rt7->physical_target_accomp:"0"); endforeach;?>                    
                <?php foreach($ptr10 as $rt10): echo (!empty($rt10->physical_target_accomp)?$rt10->physical_target_accomp:"0"); endforeach;?>                    
            </td>
            <td style="text-align:right">
                <?php foreach($ptr2 as $rt2): echo (!empty($rt2->physical_target_accomp)?$rt2->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr5 as $rt5): echo (!empty($rt5->physical_target_accomp)?$rt5->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr8 as $rt8): echo (!empty($rt8->physical_target_accomp)?$rt8->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr11 as $rt11): echo (!empty($rt11->physical_target_accomp)?$rt11->physical_target_accomp:"0"); endforeach;?>  
            </td> 
            <td style="text-align:right">
                <?php foreach($ptr3 as $rt3): echo (!empty($rt3->physical_target_accomp)?$rt3->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr6 as $rt6): echo (!empty($rt6->physical_target_accomp)?$rt6->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr9 as $rt9): echo (!empty($rt9->physical_target_accomp)?$rt9->physical_target_accomp:"0"); endforeach;?>  
                <?php foreach($ptr12 as $rt12): echo (!empty($rt12->physical_target_accomp)?$rt12->physical_target_accomp:"0"); endforeach;?>  
            </td>
            <td style="text-align:right;color:#ff4d4d;font-weight: 700;">
                <?php foreach($gtpt as $gt1): echo $gt1->totalpta; endforeach;?>                
            </td>
            <td style="text-align:right">
                <?php foreach($ptr1 as $rt1): echo (!empty(number_format($rt1->physical_cost_target,2))?number_format($rt1->physical_cost_target,2):"0"); endforeach;?>                    
                <?php foreach($ptr4 as $rt4): echo (!empty(number_format($rt4->physical_cost_target,2))?number_format($rt4->physical_cost_target,2):"0"); endforeach;?>                    
                <?php foreach($ptr7 as $rt7): echo (!empty(number_format($rt7->physical_cost_target,2))?number_format($rt7->physical_cost_target,2):"0"); endforeach;?>                    
                <?php foreach($ptr10 as $rt10): echo (!empty(number_format($rt10->physical_cost_target,2))?number_format($rt10->physical_cost_target,2):"0"); endforeach;?>                    
            </td>
            <td style="text-align:right">
                <?php foreach($ptr2 as $rt2): echo (!empty(number_format($rt2->physical_cost_target,2))?number_format($rt2->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr5 as $rt5): echo (!empty(number_format($rt5->physical_cost_target,2))?number_format($rt5->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr8 as $rt8): echo (!empty(number_format($rt8->physical_cost_target,2))?number_format($rt8->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr11 as $rt11): echo (!empty(number_format($rt11->physical_cost_target,2))?number_format($rt11->physical_cost_target,2):"0"); endforeach;?>  
            </td> 
            <td style="text-align:right">
                <?php foreach($ptr3 as $rt3): echo (!empty(number_format($rt3->physical_cost_target,2))?number_format($rt3->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr6 as $rt6): echo (!empty(number_format($rt6->physical_cost_target,2))?number_format($rt6->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr9 as $rt9): echo (!empty(number_format($rt9->physical_cost_target,2))?number_format($rt9->physical_cost_target,2):"0"); endforeach;?>  
                <?php foreach($ptr12 as $rt12): echo (!empty(number_format($rt12->physical_cost_target,2))?number_format($rt12->physical_cost_target,2):"0"); endforeach;?>  
            </td>
            <td style="text-align:right;color:#ff4d4d;font-weight: 700;">
                <?php foreach($gtpt as $gt1): echo number_format($gt1->totalpct,2); endforeach;?>                
            </td>
            <td style="text-align:right">
                <?php foreach($ptr1 as $rt1): echo (!empty(number_format($rt1->physical_cost_accomplishment,2))?number_format($rt1->physical_cost_accomplishment,2):"0"); endforeach;?>                    
                <?php foreach($ptr4 as $rt4): echo (!empty(number_format($rt4->physical_cost_accomplishment,2))?number_format($rt4->physical_cost_accomplishment,2):"0"); endforeach;?>                    
                <?php foreach($ptr7 as $rt7): echo (!empty(number_format($rt7->physical_cost_accomplishment,2))?number_format($rt7->physical_cost_accomplishment,2):"0"); endforeach;?>                    
                <?php foreach($ptr10 as $rt10): echo (!empty(number_format($rt10->physical_cost_accomplishment,2))?number_format($rt10->physical_cost_accomplishment,2):"0"); endforeach;?>                    
            </td>
            <td style="text-align:right">
                <?php foreach($ptr2 as $rt2): echo (!empty(number_format($rt2->physical_cost_accomplishment,2))?number_format($rt2->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr5 as $rt5): echo (!empty(number_format($rt5->physical_cost_accomplishment,2))?number_format($rt5->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr8 as $rt8): echo (!empty(number_format($rt8->physical_cost_accomplishment,2))?number_format($rt8->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr11 as $rt11): echo (!empty(number_format($rt11->physical_cost_accomplishment,2))?number_format($rt11->physical_cost_accomplishment,2):"0"); endforeach;?>  
            </td> 
            <td style="text-align:right">
                <?php foreach($ptr3 as $rt3): echo (!empty(number_format($rt3->physical_cost_accomplishment,2))?number_format($rt3->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr6 as $rt6): echo (!empty(number_format($rt6->physical_cost_accomplishment,2))?number_format($rt6->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr9 as $rt9): echo (!empty(number_format($rt9->physical_cost_accomplishment,2))?number_format($rt9->physical_cost_accomplishment,2):"0"); endforeach;?>  
                <?php foreach($ptr12 as $rt12): echo (!empty(number_format($rt12->physical_cost_accomplishment,2))?number_format($rt12->physical_cost_accomplishment,2):"0"); endforeach;?>  
            </td>
            <td style="text-align:right;color:#ff4d4d;font-weight: 700;">
                <?php foreach($gtpt as $gt1): echo number_format($gt1->totalpca,2); endforeach;?>                
            </td>
          </tr>
        <?php endforeach;
    }

    public function physicalreport(){
		$codegens = $this->input->post('searchPAphyrep');
		$year = $this->input->post('searchPAphyrepyear');
		$quarter = $this->input->post('searchPAphyrepquarter');
    $data = $this->pamain_model->getallyearsphysicalGenerateReport($codegens,$year,$quarter);
    $datas = $this->pamain_model->getallmonthphysicalGenerateReport($codegens,$year,$quarter);
		$pdf = new PDFL();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Times','',10);
		$table = new easyTable($pdf, '{200, 200, 200, 200, 200,200,200,200,200, 200, 200, 200, 200,200,200,200,200,200,200,200}','align:C{LCRR};border:1; border-color:#4d4d4d; ');
			$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(255,255,255);
        $table->rowStyle('border:TB;border-color:#000;');
				$pdf->Multicell(336,5,"QUARTERLY PHYSICAL REPORT OF OPERATION\n ".$quarter." Quarter for CY ".$year,1,'L',true);
        $table->printRow();

		$table->printRow();
		$table->rowStyle('align:{CCCCCCCCCCCCCCCCCC}; bgcolor:#4d94ff;font-color:#fff;font-style:B');
 		$table->easyCell("Program / Activity/ Project", 'paddingY:3;rowspan:2');
 		$table->easyCell("Performance Measures", 'paddingY:3;rowspan:2');
    $table->easyCell("Cost", 'paddingY:3;rowspan:2');
    $table->easyCell("Quantity", 'paddingY:3;rowspan:2');
    $table->easyCell("Physical Target (Month)", 'paddingY:3;colspan:4');
    $table->easyCell("Physical Accomplishment (Month)", 'paddingY:3;colspan:4');
    $table->easyCell("Financial Target (Month)", 'paddingY:3;colspan:4');
 		$table->easyCell("Financial Accomplishment (Month)", 'paddingY:3;colspan:4');
 		$table->printRow();
    $table->rowStyle('align:{CCCCCCCCCCCCCCCCCC}; bgcolor:#4d94ff;font-color:#fff;font-style:B');
    $table->easyCell("1st", 'paddingY:3;');
    $table->easyCell("2nd", 'paddingY:3;');
    $table->easyCell("3rd", 'paddingY:3;');
    $table->easyCell("Total", 'paddingY:3;');
    $table->easyCell("1st", 'paddingY:3;');
    $table->easyCell("2nd", 'paddingY:3;');
    $table->easyCell("3rd", 'paddingY:3;');
    $table->easyCell("Total", 'paddingY:3;');
    $table->easyCell("1st", 'paddingY:3;');
    $table->easyCell("2nd", 'paddingY:3;');
    $table->easyCell("3rd", 'paddingY:3;');
    $table->easyCell("Total", 'paddingY:3;');
    $table->easyCell("1st", 'paddingY:3;');
    $table->easyCell("2nd", 'paddingY:3;');
    $table->easyCell("3rd", 'paddingY:3;');
    $table->easyCell("Total", 'paddingY:3;');
    $table->printRow();
    foreach($data as $row){
      $code = $row->physical_code;
      $id = $row->id_ipaf_physical;
      $ptr1 = $this->pamain_model->getallphyrepperJan($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',1);      
        $this->db->group_by('physical_code');
        $query_row1 = $this->db->get('tblipaf_physical_target');  

      $ptr2 = $this->pamain_model->getallphyrepperFeb($id,$code,$year,$quarter);

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',2);      
        $this->db->group_by('physical_code');
        $query_row2 = $this->db->get('tblipaf_physical_target');

      $ptr3 = $this->pamain_model->getallphyrepperMar($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',3);      
        $this->db->group_by('physical_code');
        $query_row3 = $this->db->get('tblipaf_physical_target');

      $ptr4 = $this->pamain_model->getallphyrepperApr($id,$code,$year,$quarter);    

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',4);      
        $this->db->group_by('physical_code');
        $query_row4 = $this->db->get('tblipaf_physical_target');

      $ptr5 = $this->pamain_model->getallphyrepperMay($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',5);      
        $this->db->group_by('physical_code');
        $query_row5 = $this->db->get('tblipaf_physical_target');

      $ptr6 = $this->pamain_model->getallphyrepperJun($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',6);      
        $this->db->group_by('physical_code');
        $query_row6 = $this->db->get('tblipaf_physical_target');

      $ptr7 = $this->pamain_model->getallphyrepperJul($id,$code,$year,$quarter);      

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',7);      
        $this->db->group_by('physical_code');
        $query_row7 = $this->db->get('tblipaf_physical_target');

      $ptr8 = $this->pamain_model->getallphyrepperAug($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',8);      
        $this->db->group_by('physical_code');
        $query_row8 = $this->db->get('tblipaf_physical_target');

      $ptr9 = $this->pamain_model->getallphyrepperSep($id,$code,$year,$quarter);  

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',9);      
        $this->db->group_by('physical_code');
        $query_row9 = $this->db->get('tblipaf_physical_target');

      $ptr10 = $this->pamain_model->getallphyrepperOct($id,$code,$year,$quarter);  

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',10);      
        $this->db->group_by('physical_code');
        $query_row10 = $this->db->get('tblipaf_physical_target');

      $ptr11 = $this->pamain_model->getallphyrepperNov($id,$code,$year,$quarter);      

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',11);      
        $this->db->group_by('physical_code');
        $query_row11 = $this->db->get('tblipaf_physical_target');

      $ptr12 = $this->pamain_model->getallphyrepperDec($id,$code,$year,$quarter); 

        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',12);      
        $this->db->group_by('physical_code');
        $query_row12 = $this->db->get('tblipaf_physical_target');

      $gtpt = $this->pamain_model->getallTotalphyrepperuarter($id,$code,$year,$quarter); 
        $datatotal = $this->pamain_model->getSUMtotalcostphysicalReport($codegens,$year);
          $table->rowStyle('align:{LLRRLLLLLL};valign:M;border:LRB;paddingY:2;font-color:#000;');
          $table->easyCell($row->physical_progactivityproj);
          $table->easyCell($row->physical_indicator);
          $table->easyCell(number_format($row->physical_cost,2)); 
          $table->easyCell(number_format($row->physical_quantity));
                  if($query_row1->num_rows() > 0):           
                    foreach($ptr1 as $rt1):
                        $table->easyCell($rt1->physical_target_quantity);   
                    endforeach;
                  else:             
                    $table->easyCell(0);   
                  endif;

                  if($query_row2->num_rows() > 0):           
                    foreach($ptr2 as $rt2):
                        $table->easyCell($rt2->physical_target_quantity);   
                    endforeach;
                  else:             
                    $table->easyCell(0);   
                  endif;


                  if($query_row4->num_rows() > 0):           
                    foreach($ptr4 as $rt4):
                        $table->easyCell($rt4->physical_target_quantity);   
                    endforeach;
                  else:             
                    $table->easyCell(0);   
                  endif;
            
    $table->printRow();
          


          

          //   $table->easyCell($row->year,"colspan:2;font-style:b;font-color:#000;font-size:10");
          //   foreach($datatotal as $totala):
          //     $table->easyCell(number_format($totala->total,2),'font-style:b;font-color:#000;font-size:10');
          //     $table->easyCell("","colspan:5");
          //   endforeach;
          // $table->printRow();
          //   foreach($data3 as $row3):
          //     $table->rowStyle('align:{LLRLCCCCC};valign:M;border:;paddingY:2;font-color:#000;');
          //       $datatotalm = $this->pamain_model->getSUMtotalcostphysicalReportbyMonth($codegens,$year);
          //       foreach($datatotalm as $totalm):
          //         if($row3->id_month == $totalm->id_month):
          //           $table->easyCell($row3->month,"colspan:2");
          //           $table->easyCell(number_format($totalm->total,2),'font-color:#000');
          //           $table->easyCell("","colspan:5");
          //         endif;
          //       endforeach;
          //     $table->printRow();
          //     foreach($data as $row2):
          //       if ($row3->id_month == $row2->physical_month):
          //         if ($row2->id_year == $row->physical_year):
          //           $table->rowStyle('align:{LLRLCCCCC};valign:M;border:B;paddingY:2;font-color:#000');
          //           $table->easyCell("");
          //           $table->easyCell($row2->physical_progactivityproj);
          //           $table->easyCell(number_format($row2->physical_cost,2));
          //           $table->easyCell($row2->physical_performance_measure);
          //           $table->easyCell($row2->physical_target);
          //           $table->easyCell($row2->physical_accom);
          //           $table->easyCell($row2->physical_variance);
          //           $table->easyCell($row2->physical_remarks);
          //           $table->printRow();
          //         endif;
          //       endif;
          //     endforeach;
            // endforeach;
    }
    $pdf->Output();
	}

  public function fetchphysicalreportsYear(){
      $codegens = $this->input->post('palist');
      $year = $this->input->post('payear');
      $data2 = $this->pamain_model->getallyearsphysicalGenerateReportYear($codegens,$year);
      $data3 = $this->pamain_model->getallmonthphysicalGenerateReportYear($codegens,$year);
      foreach($data2 as $row):
        $pcode = $row->physical_code;
        $pyear = $row->physical_year;   
          ?>
          <tr>
            <td style="border:1px dotted #000 !important"><?php echo $row->physical_progactivityproj?></td>
            <td><?php echo $row->physical_indicator ?></td>
            <td style="text-align:right"><?php echo number_format($row->physical_cost,2)?></td>
            <td style="text-align:right"><?php echo number_format($row->physical_quantity)?></td>
            <?php 
                    $pJan = $this->pamain_model->getallphyrepJan($pcode,$pyear);
                    $pFeb = $this->pamain_model->getallphyrepFeb($pcode,$pyear);
                    $pMar = $this->pamain_model->getallphyrepMar($pcode,$pyear);
                    $p1Q = $this->pamain_model->getallphyrep1q($pcode,$pyear);
                    $a1Q = $this->pamain_model->getallphyacc1q($pcode,$pyear);

                    $pApr = $this->pamain_model->getallphyrepApr($pcode,$pyear);
                    $pMay = $this->pamain_model->getallphyrepMay($pcode,$pyear);
                    $pJun = $this->pamain_model->getallphyrepJun($pcode,$pyear);
                    $p2Q = $this->pamain_model->getallphyrep2q($pcode,$pyear);
                    $a2Q = $this->pamain_model->getallphyacc2q($pcode,$pyear);

                    $pJul = $this->pamain_model->getallphyrepJul($pcode,$pyear);
                    $pAug = $this->pamain_model->getallphyrepAug($pcode,$pyear);
                    $pSep = $this->pamain_model->getallphyrepSep($pcode,$pyear);
                    $p3Q = $this->pamain_model->getallphyrep3q($pcode,$pyear);
                    $a3Q = $this->pamain_model->getallphyacc3q($pcode,$pyear);

                    $pOct = $this->pamain_model->getallphyrepOct($pcode,$pyear);
                    $pNov = $this->pamain_model->getallphyrepNov($pcode,$pyear);
                    $pDec = $this->pamain_model->getallphyrepDec($pcode,$pyear);
                    $p4Q = $this->pamain_model->getallphyrep4q($pcode,$pyear);
                    $a4Q = $this->pamain_model->getallphyacc4q($pcode,$pyear);

                    $ptotal = $this->pamain_model->getalltotalannualphyrep($pcode,$pyear);
                    $atotal = $this->pamain_model->getalltotalannualphyaccom($pcode,$pyear);
                    $peratotal = $this->pamain_model->getalltotalannualpercentagephysicalreport($pcode,$pyear);

                    $fJan = $this->pamain_model->getallfinrepJan($pcode,$pyear);
                    $fFeb = $this->pamain_model->getallfinrepFeb($pcode,$pyear);
                    $fMar = $this->pamain_model->getallfinrepMar($pcode,$pyear);
                    $f1Q = $this->pamain_model->getalfinyrep1q($pcode,$pyear);
                    $fa1Q = $this->pamain_model->getallfinacc1q($pcode,$pyear);
                    $fApr = $this->pamain_model->getallfinrepApr($pcode,$pyear);
                    $fMay = $this->pamain_model->getallfinrepMay($pcode,$pyear);
                    $fJun = $this->pamain_model->getallfinrepJun($pcode,$pyear);
                    $f2Q = $this->pamain_model->getalfinyrep2q($pcode,$pyear);
                    $fa2Q = $this->pamain_model->getallfinacc2q($pcode,$pyear);
                    $fJul = $this->pamain_model->getallfinrepJul($pcode,$pyear);
                    $fAug = $this->pamain_model->getallfinrepAug($pcode,$pyear);
                    $fSep = $this->pamain_model->getallfinrepSep($pcode,$pyear);
                    $f3Q = $this->pamain_model->getalfinyrep3q($pcode,$pyear);
                    $fa3Q = $this->pamain_model->getallfinacc3q($pcode,$pyear);
                    $fOct = $this->pamain_model->getallfinrepOct($pcode,$pyear);
                    $fNov = $this->pamain_model->getallfinrepNov($pcode,$pyear);
                    $fDec = $this->pamain_model->getallfinrepDec($pcode,$pyear);
                    $f4Q = $this->pamain_model->getalfinyrep4q($pcode,$pyear);
                    $fa4Q = $this->pamain_model->getallfinacc4q($pcode,$pyear);

                    $ftotal = $this->pamain_model->getalltotalannualfinrep($pcode,$pyear);
                    $fatotal = $this->pamain_model->getalltotalannualfinaccom($pcode,$pyear);
                  ?>
              <td class="">
                    <?php foreach($pJan as $pjan): echo $pjan->physical_target_quantity; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pFeb as $pfeb): echo $pfeb->physical_target_quantity; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pMar as $pmar): echo $pmar->physical_target_quantity; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($p1Q as $pq1): echo $pq1->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pApr as $papr): echo $papr->physical_target_quantity; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pMay as $pmay): echo $pmay->physical_target_quantity; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pJun as $pjun): echo $pjun->physical_target_quantity; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($p2Q as $pq2): echo $pq2->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pJul as $pjul): echo $pjul->physical_target_quantity; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pAug as $paug): echo $paug->physical_target_quantity; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pSep as $psep): echo $psep->physical_target_quantity; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($p3Q as $pq3): echo $pq3->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pOct as $poct): echo $poct->physical_target_quantity; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pNov as $pnov): echo $pnov->physical_target_quantity; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pDec as $pdec): echo $pdec->physical_target_quantity; endforeach;?>                    
                </td>
                <td style="color:red;">
                    <?php foreach($p4Q as $pq4): echo $pq4->totalpt; endforeach;?>                    
                </td>
                <td style="color:red; font-weight: 700; text-align: right;">
                    <?php foreach($ptotal as $pt): echo $pt->annualphyrep; endforeach;?>                    
                </td>
                <!-- END PHYSICAL TARGET -->

                <!-- PHYSICAL ACCOMPLISHMENT -->

                <td class="">
                    <?php foreach($pJan as $pjan): echo $pjan->physical_target_accomp; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pFeb as $pfeb): echo $pfeb->physical_target_accomp; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pMar as $pmar): echo $pmar->physical_target_accomp; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($a1Q as $aq1): echo $aq1->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pApr as $papr): echo $papr->physical_target_accomp; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pMay as $pmay): echo $pmay->physical_target_accomp; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pJun as $pjun): echo $pjun->physical_target_accomp; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($a2Q as $aq2): echo $aq2->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pJul as $pjul): echo $pjul->physical_target_accomp; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pAug as $paug): echo $paug->physical_target_accomp; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pSep as $psep): echo $psep->physical_target_accomp; endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($a3Q as $aq3): echo $aq3->totalpt; endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($pOct as $poct): echo $poct->physical_target_accomp; endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($pNov as $pnov): echo $pnov->physical_target_accomp; endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($pDec as $pdec): echo $pdec->physical_target_accomp; endforeach;?>                    
                </td>
                <td style="color:red;">
                    <?php foreach($a4Q as $aq4): echo $aq4->totalpt; endforeach;?>                    
                </td>
                <td style="color:red; font-weight: 700; text-align: right;">
                    <?php foreach($atotal as $at): echo $at->annualphyaccom; endforeach;?>                    
                </td>
                <td style="color:red; font-weight: 700; text-align: right;">
                    <?php foreach($peratotal as $pat): echo number_format(($pat->annualphyaccom / $pat->annualphytar)*100,2)."%"; endforeach;?>                    
                </td>
                <!-- END PHYSICAL ACCOMPLISHMENT -->

                <!-- FINANCIAL TARGET -->
                <td class="">
                    <?php foreach($fJan as $fjan): echo number_format($fjan->physical_cost_target,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fFeb as $ffeb): echo number_format($ffeb->physical_cost_target,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fMar as $fmar): echo number_format($fmar->physical_cost_target,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($f1Q as $fq1): echo number_format($fq1->totalft,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fApr as $f4): echo number_format($f4->physical_cost_target,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fMay as $f5): echo number_format($f5->physical_cost_target,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fJun as $f6): echo number_format($f6->physical_cost_target,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($f2Q as $fq2): echo number_format($fq2->totalft,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fJul as $f7): echo number_format($f7->physical_cost_target,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fAug as $f8): echo number_format($f8->physical_cost_target,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fSep as $f9): echo number_format($f9->physical_cost_target,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($f3Q as $fq3): echo number_format($fq3->totalft,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fOct as $f10): echo number_format($f10->physical_cost_target,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fNov as $f11): echo number_format($f11->physical_cost_target,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fDec as $f12): echo number_format($f12->physical_cost_target,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($f4Q as $fq4): echo number_format($fq4->totalft,2); endforeach;?>                    
                </td>
                <td style="color:red; font-weight: 700; text-align: right;">
                    <?php foreach($ftotal as $ft): echo number_format($ft->annualfinrep,2); endforeach;?>                    
                </td>
                <!-- END FINANCIAL TARGET -->

                <!-- FINANCIAL ACCOMPLISHMENT -->
                <td class="">
                    <?php foreach($fJan as $fjan): echo number_format($fjan->physical_cost_accomplishment,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fFeb as $ffeb): echo number_format($ffeb->physical_cost_accomplishment,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fMar as $fmar): echo number_format($fmar->physical_cost_accomplishment,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($fa1Q as $fq1): echo number_format($fq1->totalfa,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fApr as $f4): echo number_format($f4->physical_cost_accomplishment,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fMay as $f5): echo number_format($f5->physical_cost_accomplishment,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fJun as $f6): echo number_format($f6->physical_cost_accomplishment,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($fa2Q as $fq2): echo number_format($fq2->totalfa,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fJul as $f7): echo number_format($f7->physical_cost_accomplishment,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fAug as $f8): echo number_format($f8->physical_cost_accomplishment,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fSep as $f9): echo number_format($f9->physical_cost_accomplishment,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($fa3Q as $fq3): echo number_format($fq3->totalfa,2); endforeach;?>                    
                </td>
                <td class="">
                    <?php foreach($fOct as $f10): echo number_format($f10->physical_cost_accomplishment,2); endforeach;?>                    
                </td> 
                <td class="">
                    <?php foreach($fNov as $f11): echo number_format($f11->physical_cost_accomplishment,2); endforeach;?>                    
                </td>                
                <td class="">
                    <?php foreach($fDec as $f12): echo number_format($f12->physical_cost_accomplishment,2); endforeach;?>                    
                </td>
                 <td style="color:red;">
                    <?php foreach($fa4Q as $fq4): echo number_format($fq4->totalfa,2); endforeach;?>                    
                </td>
                <td style="color:red; font-weight: 700; text-align: right;">
                    <?php foreach($fatotal as $fa): echo number_format($fa->annualfinaccom,2); endforeach;?>                    
                </td>
          </tr>
          <?php
      endforeach;
  }

  public function physicalreportyearly(){
  $codegens = $this->input->post('searchPAphyrepYearly');
  $year = $this->input->post('searchPAphyyearYearly');
  $data = $this->pamain_model->getallphysicalreportGenerateReportYear($codegens,$year);
  $data2 = $this->pamain_model->getallyearsphysicalGenerateReportYear($codegens,$year);
  $data3 = $this->pamain_model->getallmonthphysicalGenerateReportYear($codegens,$year);

  $pdf = new PDFL();
      $pdf->AddPage();
      $pdf->AliasNbPages();
      $pdf->SetFont('Times','',12);
  $table = new easyTable($pdf, '{200, 200, 200, 200, 200,200,200,200}','align:C{LCRR};border:1; border-color:#a1a1a1; ');
    $pdf->SetFillColor(255, 255, 255);
      $pdf->SetDrawColor(255,255,255);
    foreach ($data2 as $rowyr) {
      $table->rowStyle('border:TB;border-color:#000;');
      $pdf->Multicell(336,5,"QUARTERLY PHYSICAL REPORT OF OPERATION\n For the Quarter Ending                                                                                                                                                                                            CY ".$rowyr->year,1,'C',true);
      $table->printRow();
    }
  $table->printRow();
  $table->rowStyle('align:{CCCCCCCCCCCCCCCCCC}; bgcolor:#009879;font-color:#fff;font-style:B');
  $table->easyCell("Dated", 'paddingY:3;');
  $table->easyCell("Program / Activity/ Project", 'paddingY:3;');
  $table->easyCell("Cost", 'paddingY:3;');
  $table->easyCell("Performance Measures", 'paddingY:3;');
  $table->easyCell("Physical Target", 'paddingY:3;');
  $table->easyCell("Accomplishment", 'paddingY:3;');
  $table->easyCell("Variance", 'paddingY:3;');
  $table->easyCell("Remarks", 'paddingY:3;');
  $table->printRow();
  foreach($data2 as $row){
      $year=$row->physical_year;
      $datatotal = $this->pamain_model->getSUMtotalcostphysicalReport($codegens,$year);
        $table->rowStyle('align:{LLRLLLLLLL};valign:M;border:;paddingY:2;font-color:#000;bgcolor:#FFF4A3');
          $table->easyCell($row->year,"colspan:2;font-style:b;font-color:#ff6666;font-size:13");
          foreach($datatotal as $totala):
            $table->easyCell(number_format($totala->total,2),'font-style:b;font-color:#ff6666;font-size:13');
            $table->easyCell("","colspan:5");
          endforeach;
        $table->printRow();
          foreach($data3 as $row3):
            $table->rowStyle('align:{LLRLCCCCC};valign:M;border:;paddingY:2;font-color:#000;bgcolor:#FFF4A3');
              $datatotalm = $this->pamain_model->getSUMtotalcostphysicalReportbyMonth($codegens,$year);
              foreach($datatotalm as $totalm):
                if($row3->id_month == $totalm->id_month):
                  $table->easyCell($row3->month,"colspan:2");
                  $table->easyCell(number_format($totalm->total,2),'font-color:#ff6666');
                  $table->easyCell("","colspan:5");
                endif;
              endforeach;
            $table->printRow();
            foreach($data as $row2):
              if ($row3->id_month == $row2->physical_month):
                if ($row2->id_year == $row->physical_year):
                  $table->rowStyle('align:{LLRLCCCCC};valign:M;border:B;paddingY:2;font-color:#000');
                  $table->easyCell("");
                  $table->easyCell($row2->physical_progactivityproj);
                  $table->easyCell(number_format($row2->physical_cost,2));
                  $table->easyCell($row2->physical_performance_measure);
                  $table->easyCell($row2->physical_target);
                  $table->easyCell($row2->physical_accom);
                  $table->easyCell($row2->physical_variance);
                  $table->easyCell($row2->physical_remarks);
                  $table->printRow();
                endif;
              endif;
            endforeach;
          endforeach;
  }
  $pdf->Output();
}

public function fetchactualincomereports(){
        $codegens = $this->input->post('palist');
        $year = $this->input->post('payear');
        $quarter = $this->input->post('quarter');
        $dataM = $this->pamain_model->getMonths($quarter);
        $data = $this->pamain_model->getallsourceincomeReportGen($codegens,$year,$quarter);
        $data2 = $this->pamain_model->getallsourceincomeOthersReportGen($codegens,$year,$quarter);   
        $sumEF = $this->pamain_model->getSUMEntranceFee($codegens,$year,$quarter);   
        $sumFUF = $this->pamain_model->getSUMFaciityUserFee($codegens,$year,$quarter);
        $sumRF = $this->pamain_model->getSUMRecreationalFee($codegens,$year,$quarter);
        $sumRUF = $this->pamain_model->getSUMResourceUserFee($codegens,$year,$quarter);
        $sumSAPA = $this->pamain_model->getSUMSAPAFee($codegens,$year,$quarter);
        $sumMOA = $this->pamain_model->getSUMMOAFee($codegens,$year,$quarter);
        $sumRSA = $this->pamain_model->getSUMRSAFee($codegens,$year,$quarter);
        $sumCLA = $this->pamain_model->getSUMCLAFee($codegens,$year,$quarter);
        $sumOTHER = $this->pamain_model->getSUMOtherFee($codegens,$year,$quarter);
        $dataOther = $this->pamain_model->getincomeotherFees($codegens,$year,$quarter);
        $dataTotal1stMonth = $this->pamain_model->getTotalfor1stmont($codegens,$year,$quarter);
        $sumOTHER2 = $this->pamain_model->getSUMOtherFeebyMonth($codegens,$year,$quarter);
        $SUMFine = $this->pamain_model->getSUMFines($codegens,$year,$quarter);   
        $datadonatecash = $this->pamain_model->getalldonationCash($codegens,$year,$quarter);   
        $SUMdonatecash = $this->pamain_model->getSUMdonationCash($codegens,$year,$quarter);   
        $SUMdonatecashbyYear = $this->pamain_model->getSUMdonationCashbyYear($codegens,$year,$quarter);   
        $datadonateinkind = $this->pamain_model->getalldonationInkind($codegens,$year,$quarter);  
        $SUMGrant = $this->pamain_model->getSUMGrant($codegens,$year,$quarter);   
        $SUMEndowment = $this->pamain_model->getSUMEndowment($codegens,$year,$quarter);   
        $dataOthersfee = $this->pamain_model->getincomeothersourceFees($codegens,$year,$quarter);
        $dataOthersfeeList = $this->pamain_model->getallsourceOthersReportGen($codegens,$year,$quarter);
        $SUMOTHs = $this->pamain_model->getSUMotherssource($codegens,$year,$quarter);   
        $SUMOTHsbyYear = $this->pamain_model->getSumOthersourcebyyear($codegens,$year,$quarter);   
        $SUMOTHsbyQtr = $this->pamain_model->getSUMotherssourceQtr($codegens,$year,$quarter);
        $sumCT = $this->pamain_model->getCommulativetotalactualincome($codegens,$year,$quarter);   
        $sumCOTHER = $this->pamain_model->getCommulativeSUMOtherFee($codegens,$year,$quarter);
        $SUMCdonatecash = $this->pamain_model->getCommulativeSUMdonationCash($codegens,$year,$quarter);   
        $dataCOthersfee = $this->pamain_model->getCommulativeincomeothersourceFees($codegens,$year,$quarter); 
        $dataCprevyear = $this->pamain_model->getCommulativeincomeprevyear($codegens,$year,$quarter); 
        $ctotal1 = 0;
        $ctotal2 = 0;
        $ctotal3 = 0;
        $ctotal4 = 0;
        $ctotal5 = 0;
        $dataprev = $this->pamain_model->getallsourceincomePrevious($codegens,$year,$quarter);
       
        ?>
      <?php 
        $tot=0;
        $totalEF=0;
        $num1=0;   
        $num2=0;   
        $num3=0;   
        $subtotal1=0; 
        $subtotal2=0; 
        $totalincomedeposited=0; 
        $cumulativeincomedepositwBTR=0; 

        $num1FUF=0;   
        $num2FUF=0;   
        $num3FUF=0;   
        $subtotal1FUF=0; 
        $subtotal2FUF=0; 
        $totalincomedepositedFUF=0; 
        $cumulativeincomedepositwBTRFUF=0;

        $num1RF=0;   
        $num2RF=0;   
        $num3RF=0;   
        $subtotal1RF=0; 
        $subtotal2RF=0; 
        $totalincomedepositedRF=0; 
        $cumulativeincomedepositwBTRRF=0;

        $num1RUF=0;   
        $num2RUF=0;   
        $num3RUF=0;   
        $subtotal1RUF=0; 
        $subtotal2RUF=0; 
        $totalincomedepositedRUF=0; 
        $cumulativeincomedepositwBTRRUF=0;

        $num1SAPA=0;   
        $num2SAPA=0;   
        $num3SAPA=0;   
        $subtotal1SAPA=0; 
        $subtotal2SAPA=0; 
        $totalincomedepositedSAPA=0; 
        $cumulativeincomedepositwBTRSAPA=0;

        $num1MOA=0;   
        $num2MOA=0;   
        $num3MOA=0;   
        $subtotal1MOA=0; 
        $subtotal2MOA=0; 
        $totalincomedepositedMOA=0; 
        $cumulativeincomedepositwBTRMOA=0;

        $num1RSA=0;   
        $num2RSA=0;   
        $num3RSA=0;   
        $subtotal1RSA=0; 
        $subtotal2RSA=0; 
        $totalincomedepositedRSA=0; 
        $cumulativeincomedepositwBTRRSA=0;

        $num1CLA=0;   
        $num2CLA=0;   
        $num3CLA=0;   
        $subtotal1CLA=0; 
        $subtotal2CLA=0; 
        $totalincomedepositedCLA=0; 
        $cumulativeincomedepositwBTRCLA=0;

        $totalOTH=0;
        $num1OTH=0;   
        $num2OTH=0;   
        $num3OTH=0;   
        $subtotal1OTH=0; 
        $subtotal2OTH=0; 
        $totalincomedepositedOTH=0; 
        $cumulativeincomedepositwBTROTH=0;

        $totalEF1=0;
        $num1_1=0;   
        $num2_1=0;   
        $num3_1=0;   
        $subtotal1_1=0; 
        $subtotal2_1=0; 
        $totalincomedeposited_1=0; 
        $cumulativeincomedepositwBTR_1=0; 

        $totalCD1=0;
        $num1_2=0;   
        $num2_2=0;   
        $num3_2=0;   
        $subtotal1_2=0;
        $totalcashdonate_1=0;
        $cumulativecashdonatewBTR=0;

        $totalGrant=0;
        $num1_3=0;   
        $num2_3=0;   
        $num3_3=0;   
        $subtotal1_3=0;
        $totalgrant_1=0;
        $cumulativegrantwBTR=0;

        $totalEndow=0;
        $num1_4=0;   
        $num2_4=0;   
        $num3_4=0;   
        $subtotal1_4=0;
        $totalendow_1=0;
        $cumulativeendowwBTR=0;

        $totalOTHs=0;
        $num1_5=0;   
        $num2_5=0;   
        $num3_5=0;   
        $subtotal1_5=0;
        $totaloths_1=0;
        $cumulativeothsBTR=0;

        ?>
        <tr>
          <td class="hide" colspan="10" style="background-color:#ffe6e6">Income from Operations (AGDB) <i>(Subject to 75% PA-RIA Deposit and 25% SAGF Remittance to BTr)</i></td>
        </tr>

        <tr class="hide">
            <td></td>
            <td>
                <?php foreach ($dataM as $m):?>  
                <?php 
                if ($m->id_month==1||$m->id_month==4||$m->id_month==7||$m->id_month==10):
                  echo $m->month; 
                endif;
                ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($dataM as $m2):?>  
                <?php 
                if ($m2->id_month==2||$m2->id_month==5||$m2->id_month==8||$m2->id_month==11):
                  echo $m2->month; 
                endif;
                ?>                
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($dataM as $m3):?>  
                <?php 
                if ($m3->id_month==3||$m3->id_month==6||$m3->id_month==9||$m3->id_month==12):
                  echo $m3->month; 
                endif;
                ?>                
                <?php endforeach; ?>           
            </td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Entrance Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumEF)?number_format($row->dsumEF,2):"0.00");
                      $num1=$row->dsumEF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumEF)?number_format($row2->dsumEF,2):"0.00");
                      $num2=$row2->dsumEF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumEF)?number_format($row3->dsumEF,2):"0.00");
                      $num3=$row3->dsumEF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1=$num1+$num2+$num3,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1=$num1+$num2+$num3 ?></td>
            <td>
                <?php foreach ($sumEF as $sEF):?>  
                  <?php echo number_format($sEF->EntranceSum,2);
                    $totalEF = $sEF->EntranceSum;
                  ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumEF as $sEF):
                echo $sEF->EntranceSum;
                endforeach; ?>
            </td>           
            <td ><?php echo number_format($subtotal1=$num1+$num2+$num3+$totalEF,2); $totalincomedeposited = $subtotal1=$num1+$num2+$num3+$totalEF?></td>
            <td>IN PROGRESS . . .</td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1=$num1+$num2+$num3+$totalEF; ?></td>
            <td><?php echo number_format($totalEF+$totalincomedeposited,2);$cumulativeincomedepositwBTR=$totalEF+$totalincomedeposited ?></td>
            <td class="subtotal-total4 hidden"><?php echo $totalEF+$totalincomedeposited ?></td>
            <td><?php echo number_format($totalEF+$cumulativeincomedepositwBTR,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalEF+$cumulativeincomedepositwBTR ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Facilities User Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumFF)?number_format($row->dsumFF,2):"0.00");
                      $num1FUF=$row->dsumFF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumFF)?number_format($row2->dsumFF,2):"0.00");
                      $num2FUF=$row2->dsumFF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumFF)?number_format($row3->dsumFF,2):"0.00");
                      $num3FUF=$row3->dsumFF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1FUF=$num1FUF+$num2FUF+$num3FUF,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1FUF=$num1FUF+$num2FUF+$num3FUF ?></td>
            <td>
                <?php foreach ($sumFUF as $x):?>  
                  <?php echo number_format($x->FUFSum,2);
                    $totalFUF = $x->FUFSum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumFUF as $x):?>  
                  <?php echo $x->FUFSum
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1FUF=$num1FUF+$num2FUF+$num3FUF+$totalFUF,2); $totalincomedeposited = $subtotal1FUF=$num1FUF+$num2FUF+$num3FUF+$totalFUF?></td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1FUF=$num1FUF+$num2FUF+$num3FUF+$totalFUF; ?></td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalFUF+$totalincomedeposited,2);$cumulativeincomedepositwBTRFUF=$totalFUF+$totalincomedeposited ?></td>
            <td class="subtotal-total4 hidden"><?php echo $totalFUF+$totalincomedeposited ?></td>
            <td><?php echo number_format($totalFUF+$cumulativeincomedepositwBTRFUF,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalFUF+$cumulativeincomedepositwBTRFUF ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Recreational Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumRF)?number_format($row->dsumRF,2):"0.00");
                      $num1RF=$row->dsumRF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumRF)?number_format($row2->dsumRF,2):"0.00");
                      $num2RF=$row2->dsumRF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumRF)?number_format($row3->dsumRF,2):"0.00");
                      $num3RF=$row3->dsumRF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1RF=$num1RF+$num2RF+$num3RF,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1RF=$num1RF+$num2RF+$num3RF ?></td>
            <td>
                <?php foreach ($sumRF as $x):?>  
                  <?php echo number_format($x->RFsum,2);
                    $totalRF = $x->RFsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumRF as $x):?>  
                  <?php echo $x->RFsum;
                    $totalRF = $x->RFsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1RF=$num1RF+$num2RF+$num3RF+$totalRF,2); $totalincomedeposited = $subtotal1RF=$num1RF+$num2RF+$num3RF+$totalRF?></td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1RF=$num1RF+$num2RF+$num3RF+$totalRF; ?></td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalRF+$totalincomedeposited,2);$cumulativeincomedepositwBTRRF=$totalRF+$totalincomedeposited ?></td>
            <td class="subtotal-total4 hidden"><?php echo $totalRF+$totalincomedeposited ?></td>
            <td><?php echo number_format($totalRF+$cumulativeincomedepositwBTRRF,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalRF+$cumulativeincomedepositwBTRRF ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Resource User Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumRUF)?number_format($row->dsumRUF,2):"0.00");
                      $num1RUF=$row->dsumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumRUF)?number_format($row2->dsumRUF,2):"0.00");
                      $num2RUF=$row2->dsumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumRUF)?number_format($row3->dsumRUF,2):"0.00");
                      $num3RUF=$row3->dsumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1RUF=$num1RUF+$num2RUF+$num3RUF,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1RUF=$num1RUF+$num2RUF+$num3RUF ?></td>
            <td>
                <?php foreach ($sumRUF as $x):?>  
                  <?php echo number_format($x->RUFsum,2);
                    $totalRUF = $x->RUFsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumRUF as $x):?>  
                  <?php echo $x->RUFsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1RUF=$num1RUF+$num2RUF+$num3RUF+$totalRUF,2); $totalincomedeposited = $subtotal1RUF=$num1RUF+$num2RUF+$num3RUF+$totalRUF?></td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1RUF=$num1RUF+$num2RUF+$num3RUF+$totalRUF; ?></td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalRUF+$totalincomedeposited,2);$cumulativeincomedepositwBTRRUF=$totalRUF+$totalincomedeposited ?></td>
            <td class="subtotal-total4 hidden"><?php echo $totalRUF+$totalincomedeposited ?></td>
            <td><?php echo number_format($totalRUF+$cumulativeincomedepositwBTRRUF,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalRUF+$cumulativeincomedepositwBTRRUF ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">SAPA Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumSAPA)?number_format($row->dsumSAPA,2):"0.00");
                      $num1SAPA=$row->dsumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumSAPA)?number_format($row2->dsumSAPA,2):"0.00");
                      $num2SAPA=$row2->dsumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumSAPA)?number_format($row3->dsumSAPA,2):"0.00");
                      $num3SAPA=$row3->dsumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1SAPA=$num1SAPA+$num2SAPA+$num3SAPA,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1SAPA=$num1SAPA+$num2SAPA+$num3SAPA ?></td>
            <td>
                <?php foreach ($sumSAPA as $x):?>  
                  <?php echo number_format($x->SAPAsum,2);
                    $totalSAPA = $x->SAPAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumSAPA as $x):?>  
                  <?php echo $x->SAPAsum;
                    $totalSAPA = $x->SAPAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1SAPA=$num1SAPA+$num2SAPA+$num3SAPA+$totalSAPA,2); 
                $totalincomedepositedSAPA = $subtotal1SAPA=$num1SAPA+$num2SAPA+$num3SAPA+$totalSAPA?>              
            </td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1SAPA=$num1SAPA+$num2SAPA+$num3SAPA+$totalSAPA; ?>      
            </td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalSAPA+$totalincomedepositedSAPA,2);
                $cumulativeincomedepositwBTRSAPA=$totalSAPA+$totalincomedepositedSAPA; 
                ?>
            </td>
            <td class="subtotal-total4 hidden"><?php echo $totalSAPA+$totalincomedepositedSAPA; ?>
            </td>
            <td><?php echo number_format($totalSAPA+$cumulativeincomedepositwBTRSAPA,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalSAPA+$cumulativeincomedepositwBTRSAPA ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">MOA Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumMOA)?number_format($row->dsumMOA,2):"0.00");
                      $num1MOA=$row->dsumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumMOA)?number_format($row2->dsumMOA,2):"0.00");
                      $num2MOA=$row2->dsumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumMOA)?number_format($row3->dsumMOA,2):"0.00");
                      $num3MOA=$row3->dsumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1MOA=$num1MOA+$num2MOA+$num3MOA,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1MOA=$num1MOA+$num2MOA+$num3MOA ?></td>
            <td>
                <?php foreach ($sumMOA as $x):?>  
                  <?php echo number_format($x->MOAsum,2);
                    $totalMOA = $x->MOAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumMOA as $x):?>  
                  <?php echo $x->MOAsum;
                    $totalMOA = $x->MOAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1MOA=$num1MOA+$num2MOA+$num3MOA+$totalMOA,2); 
                $totalincomedepositedMOA = $subtotal1MOA=$num1MOA+$num2MOA+$num3MOA+$totalMOA?>              
            </td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1MOA=$num1MOA+$num2MOA+$num3MOA+$totalMOA; ?>              
            </td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalMOA+$totalincomedepositedMOA,2);
                $cumulativeincomedepositwBTRMOA=$totalMOA+$totalincomedepositedMOA; 
                ?>
            </td>
            <td class="subtotal-total4 hidden"><?php echo $totalMOA+$totalincomedepositedMOA; ?></td>
            <td><?php echo number_format($totalMOA+$cumulativeincomedepositwBTRMOA,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalMOA+$cumulativeincomedepositwBTRMOA ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Revenue-Sharing Agreements</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumRSA)?number_format($row->dsumRSA,2):"0.00");
                      $num1RSA=$row->dsumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumRSA)?number_format($row2->dsumRSA,2):"0.00");
                      $num2RSA=$row2->dsumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumRSA)?number_format($row3->dsumRSA,2):"0.00");
                      $num3RSA=$row3->dsumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1RSA=$num1RSA+$num2RSA+$num3RSA,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1RSA=$num1RSA+$num2RSA+$num3RSA ?></td>
            <td>
                <?php foreach ($sumRSA as $x):?>  
                  <?php echo number_format($x->RSAsum,2);
                    $totalRSA = $x->RSAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumRSA as $x):?>  
                  <?php echo $x->RSAsum;
                    $totalRSA = $x->RSAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1RSA=$num1RSA+$num2RSA+$num3RSA+$totalRSA,2); 
                $totalincomedepositedRSA = $subtotal1RSA=$num1RSA+$num2RSA+$num3RSA+$totalRSA ?>              
            </td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1RSA=$num1RSA+$num2RSA+$num3RSA+$totalRSA ?>              
            </td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalRSA+$totalincomedepositedRSA,2);
                $cumulativeincomedepositwBTRRSA=$totalRSA+$totalincomedepositedRSA; 
                ?>
            </td>
            <td class="subtotal-total4 hidden"><?php echo $totalRSA+$totalincomedepositedRSA ?></td>
            <td><?php echo number_format($totalRSA+$cumulativeincomedepositwBTRRSA,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalRSA+$cumulativeincomedepositwBTRRSA ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Clearance, License, Admin Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumCLA)?number_format($row->dsumCLA,2):"0.00");
                      $num1CLA=$row->dsumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumCLA)?number_format($row2->dsumCLA,2):"0.00");
                      $num2CLA=$row2->dsumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumCLA)?number_format($row3->dsumCLA,2):"0.00");
                      $num3CLA=$row3->dsumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1CLA=$num1CLA+$num2CLA+$num3CLA,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1CLA=$num1CLA+$num2CLA+$num3CLA ?></td>
            <td>
                <?php foreach ($sumCLA as $x):?>  
                  <?php echo number_format($x->CLAsum,2);
                    $totalCLA = $x->CLAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumCLA as $x):?>  
                  <?php echo $x->CLAsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1CLA=$num1CLA+$num2CLA+$num3CLA+$totalCLA,2); 
                $totalincomedepositedCLA = $subtotal1CLA=$num1CLA+$num2CLA+$num3CLA+$totalCLA?>              
            </td>
             <td class="subtotal-total3 hidden"><?php echo $subtotal1CLA=$num1CLA+$num2CLA+$num3CLA+$totalCLA; ?>    
            </td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalCLA+$totalincomedepositedCLA,2);
                $cumulativeincomedepositwBTRCLA=$totalCLA+$totalincomedepositedCLA; 
                ?>
            </td>
            <td class="subtotal-total4 hidden"><?php echo $totalCLA+$totalincomedepositedCLA; ?></td>
            <td><?php echo number_format($totalCLA+$cumulativeincomedepositwBTRCLA,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalCLA+$cumulativeincomedepositwBTRCLA ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Other Fee</td>
            <td>
                <?php foreach ($dataOther as $row):?>  
                  <?php 
                    if ($row->income_other_month==1 || $row->income_other_month==4 || $row->income_other_month==7 || $row->income_other_month==10):
                      echo (!empty($row->OTHsum)?number_format($row->OTHsum,2):"0.00");
                      $num1OTH=$row->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($dataOther as $row2):?>  
                  <?php 
                    if ($row2->income_other_month==2 || $row2->income_other_month==5 || $row2->income_other_month==8 || $row2->income_other_month==11):
                      echo (!empty($row2->OTHsum)?number_format($row2->OTHsum,2):"0.00");
                      $num2OTH=$row2->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($dataOther as $row3):?>  
                  <?php 
                    if ($row3->income_other_month==3 || $row3->income_other_month==6 || $row3->income_other_month==9 || $row3->income_other_month==12): 
                      echo (!empty($row3->OTHsum)?number_format($row3->OTHsum,2):"0.00");
                      $num3OTH=$row3->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1OTH=$num1OTH+$num2OTH+$num3OTH,2) ?></td>
            <td class="subtotal-total hidden" style="background-color:#ccffeb"><?php echo $subtotal1OTH=$num1OTH+$num2OTH+$num3OTH ?></td>
            <td>
                <?php foreach ($sumOTHER as $x):?>  
                  <?php echo number_format($x->OTHsum,2);
                    $totalOTH = $x->OTHsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotal-total2 hidden">
                <?php foreach ($sumOTHER as $x):?>  
                  <?php echo $x->OTHsum;
                    $totalOTH = $x->OTHsum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td><?php echo number_format($subtotal1OTH=$num1OTH+$num2OTH+$num3OTH+$totalOTH,2); 
                $totalincomedepositedOTH = $subtotal1OTH=$num1OTH+$num2OTH+$num3OTH+$totalOTH?>              
            </td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1OTH=$num1OTH+$num2OTH+$num3OTH+$totalOTH ?>              
            </td>
            <td>IN PROGRESS . . .</td>
            <td><?php echo number_format($totalOTH+$totalincomedepositedOTH,2);
                $cumulativeincomedepositwBTROTH=$totalOTH+$totalincomedepositedOTH; 
                ?>
            </td>
            <td class="subtotal-total4 hidden"><?php echo $totalOTH+$totalincomedepositedOTH ?></td>
            <td><?php echo number_format($totalOTH+$cumulativeincomedepositwBTROTH,2) ?></td>
            <td class="subtotal-total5 hidden"><?php echo $totalOTH+$cumulativeincomedepositwBTROTH ?></td>
        </tr>

        <tr style="background-color:#80b3ff;font-weight: 700;" class="hide">
            <td class="hide">SUB-TOTAL</td>
            <td style="text-align:right" id="row1sum">
              <?php foreach ($sumOTHER2 as $othertotal):?>
                <?php if ($othertotal->income_other_month==1 || $othertotal->income_other_month==4 || $othertotal->income_other_month==7 || $othertotal->income_other_month==10): 
                  $tot=($othertotal->OTHsum==0?0.00:$othertotal->OTHsum);
                  ?>
                <?php endif ?>
              <?php endforeach;?>

              <?php foreach ($dataTotal1stMonth as $total):?>
                <?php if ($total->income_date_month==1 || $total->income_date_month==4 || $total->income_date_month==7 || $total->income_date_month==10): ?>
                  <?php echo number_format($total->sumpermonth+$tot,2); ?>
                <?php endif ?>
              <?php endforeach;?>
            </td>
            <td style="text-align:right" id="row2sum">
              <?php foreach ($sumOTHER2 as $othertotal):?>
                <?php if ($othertotal->income_other_month==2 || $othertotal->income_other_month==5 || $othertotal->income_other_month==8 || $othertotal->income_other_month==11): 
                  $tot=($othertotal->OTHsum==0?0.00:$othertotal->OTHsum);
                  ?>
                <?php endif ?>
              <?php endforeach;?>

              <?php foreach ($dataTotal1stMonth as $total):?>
                <?php if ($total->income_date_month==2 || $total->income_date_month==5 || $total->income_date_month==8 || $total->income_date_month==11): ?>
                  <?php echo number_format($total->sumpermonth+$tot,2); ?>
                <?php endif ?>
              <?php endforeach;?>
            </td>
            <td style="text-align:right" id="row3sum">
              <?php foreach ($sumOTHER2 as $othertotal):?>
                <?php if ($othertotal->income_other_month==3 || $othertotal->income_other_month==6 || $othertotal->income_other_month==9 || $othertotal->income_other_month==12): 
                  $tot=($othertotal->OTHsum==0?0.00:$othertotal->OTHsum);
                  ?>
                <?php endif ?>
              <?php endforeach;?>

              <?php foreach ($dataTotal1stMonth as $total):?>
                <?php if ($total->income_date_month==3 || $total->income_date_month==6 || $total->income_date_month==9 || $total->income_date_month==12): ?>
                  <?php echo number_format($total->sumpermonth+$tot,2); ?>
                <?php endif ?>
              <?php endforeach;?>
            </td>
            <td style="text-align:right" id="subtotal-ans1" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal-ans2" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal-ans3" style="text-align:right"></td>
            <td></td>
            <td style="text-align:right" id="subtotal-ans4" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal-ans5" style="text-align:right"></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Fines, Penalties, Damage Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                      echo (!empty($row->dsumFINE)?number_format($row->dsumFINE,2):"0.00");
                      $num1_1=$row->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_1 hidden">
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->income_date_month==1 || $row->income_date_month==4 || $row->income_date_month==7 || $row->income_date_month==10):
                    echo $row->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo (!empty($row2->dsumFINE)?number_format($row2->dsumFINE,2):"0.00");
                      $num2_1=$row2->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_2 hidden">
                <?php foreach ($data as $row2):?>  
                  <?php 
                    if ($row2->income_date_month==2 || $row2->income_date_month==5 || $row2->income_date_month==8 || $row2->income_date_month==11):
                      echo $row2->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo (!empty($row3->dsumFINE)?number_format($row3->dsumFINE,2):"0.00");
                      $num3_1=$row3->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_3 hidden">
                <?php foreach ($data as $row3):?>  
                  <?php 
                    if ($row3->income_date_month==3 || $row3->income_date_month==6 || $row3->income_date_month==9 || $row3->income_date_month==12): 
                      echo $row3->dsumFINE;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1_1=$num1_1+$num2_1+$num3_1,2) ?></td>
            <td class="subtotalothersourceincome_col_4 hidden"><?php echo $subtotal1_1=$num1_1+$num2_1+$num3_1 ?></td>
            <td class="subtotal-totals hidden" style="background-color:#ccffeb"><?php echo $subtotal1=$num1+$num2+$num3 ?></td>
            <td>
                <?php foreach ($SUMFine as $x):?>  
                  <?php echo number_format($x->FineSum,2);
                    $totalFines = $x->FineSum;
                  ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotalothersourceincome_col_5 hidden">
                <?php foreach ($SUMFine as $x):?>  
                  <?php echo $x->FineSum;
                  ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotal-totals2 hidden">
                <?php foreach ($SUMFine as $x):?>  
                  <?php echo $x->FineSum ?>
                <?php endforeach; ?>
            </td> 
            <td><?php echo number_format($subtotal1_1=$num1_1+$num2_1+$num3_1+$totalFines,2); $totalincomedeposited_1 = $subtotal1_1=$num1_1+$num2_1+$num3_1+$totalFines?></td>
            <td class="subtotalothersourceincome_col_6 hidden"><?php echo $subtotal1_1=$num1_1+$num2_1+$num3_1+$totalFines; ?></td>
            <td>IN PROGRESS . . .</td>
            <td class="subtotal-totals3 hidden"><?php echo $subtotal1_1=$num1_1+$num2_1+$num3_1+$totalFines; ?></td>
            <td><?php echo number_format($totalFines+$totalincomedeposited_1,2);$cumulativeincomedepositwBTR_1=$totalFines+$totalincomedeposited_1 ?></td>
            <td class="subtotal-totals4 hidden"><?php echo $totalFines+$totalincomedeposited_1 ?></td>
            <td class="subtotalothersourceincome_col_7 hidden"><?php echo $totalFines+$totalincomedeposited_1 ?></td>
            <td><?php echo number_format($totalFines+$cumulativeincomedepositwBTR_1,2) ?></td>
            <td class="subtotal-totals5 hidden"><?php echo $totalFines+$cumulativeincomedepositwBTR_1 ?></td>            
            <td class="subtotalothersourceincome_col_8 hidden"><?php echo $totalFines+$cumulativeincomedepositwBTR_1 ?></td>            
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Donation (Cash)</td>
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_month==1 || $rowdonatecash->income_donate_month==4 || $rowdonatecash->income_donate_month==7 || $rowdonatecash->income_donate_month==10):                      
                        echo $rowdonatecash->cashdonate;
                        $num1_2=$rowdonatecash->sumperqrt;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalothersourceincome_col_1 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_month==1 || $rowdonatecash->income_donate_month==4 || $rowdonatecash->income_donate_month==7 || $rowdonatecash->income_donate_month==10):                      
                        echo $rowdonatecash->sumperqrt;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                    <?php 
                        if ($rowdonatecash->income_donate_month==2 || $rowdonatecash->income_donate_month==5 || $rowdonatecash->income_donate_month==8 || $rowdonatecash->income_donate_month==11):                      
                            echo $rowdonatecash->cashdonate;
                            $num2_2=$rowdonatecash->sumperqrt;
                        endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_2 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                    <?php 
                        if ($rowdonatecash->income_donate_month==2 || $rowdonatecash->income_donate_month==5 || $rowdonatecash->income_donate_month==8 || $rowdonatecash->income_donate_month==11):                      
                            echo $rowdonatecash->sumperqrt;
                        endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                    <?php 
                        if ($rowdonatecash->income_donate_month==3 || $rowdonatecash->income_donate_month==6 || $rowdonatecash->income_donate_month==9 || $rowdonatecash->income_donate_month==12):                      
                            echo $rowdonatecash->cashdonate;
                            $num3_2=$rowdonatecash->sumperqrt;
                        endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_3 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                    <?php 
                        if ($rowdonatecash->income_donate_month==3 || $rowdonatecash->income_donate_month==6 || $rowdonatecash->income_donate_month==9 || $rowdonatecash->income_donate_month==12):                      
                            echo $rowdonatecash->sumperqrt;
                        endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb">
              <?php foreach($SUMdonatecash as $dcash): ?>
                <?php echo number_format($dcash->SUMDonation,2); ?>
              <?php endforeach; ?>
            </td>
            <td class="subtotal-totals hidden">
              <?php foreach($SUMdonatecash as $dcash): ?>
                <?php echo $dcash->SUMDonation; ?>
              <?php endforeach; ?>
            </td>
            <td class="subtotalothersourceincome_col_4 hidden">
              <?php foreach($SUMdonatecash as $dcash): ?>
                <?php echo $dcash->SUMDonation; ?>
              <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($SUMdonatecashbyYear as $sdcby):?>  
                  <?php echo number_format($sdcby->SUMDonations,2);
                    $totalCD1 = $sdcby->SUMDonations;
                  ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotal-totals2 hidden">
                <?php foreach ($SUMdonatecashbyYear as $sdcby):?>  
                  <?php echo $sdcby->SUMDonations; ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotalothersourceincome_col_5 hidden">
                <?php foreach ($SUMdonatecashbyYear as $sdcby):?>  
                  <?php echo $sdcby->SUMDonations; ?>
                <?php endforeach; ?>
            </td> 
            <td ><?php echo number_format($subtotal1_2=$num1_2+$num2_2+$num3_2+$totalCD1,2); $totalcashdonate_1 = $subtotal1_2=$num1_2+$num2_2+$num3_2+$totalCD1?></td>
            <td class="subtotalothersourceincome_col_6 hidden"><?php echo $num1_2+$num2_2+$num3_2+$totalCD1 ?></td>
            <td>IN PROGRESS . . .</td>
            <td class="subtotal-total3 hidden"><?php echo $subtotal1_2=$num1_2+$num2_2+$num3_2+$totalCD1; ?></td>
            <td><?php echo number_format($totalCD1+$totalcashdonate_1,2);$cumulativecashdonatewBTR=$totalCD1+$totalcashdonate_1 ?></td>
            <td class="subtotalothersourceincome_col_7 subtotal-total4 hidden"><?php echo $totalCD1+$totalcashdonate_1 ?></td>
            <td><?php echo number_format($totalCD1+$cumulativecashdonatewBTR,2) ?></td>
            <td class="subtotalothersourceincome_col_8 subtotal-total5 hidden"><?php echo $totalCD1+$cumulativecashdonatewBTR ?></td>
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Donation (In-kind)</td>   
            <td>
                <?php foreach ($datadonateinkind as $rowd):?>  
                  <?php 
                    if ($rowd->income_donate_month==1 || $rowd->income_donate_month==4 || $rowd->income_donate_month==7 || $rowd->income_donate_month==10):                      
                        echo (!empty($rowd->inkinddonate)?$rowd->inkinddonate:"");
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>           
            <td>
                <?php foreach ($datadonateinkind as $rowd):?>  
                  <?php 
                    if ($rowd->income_donate_month==2 || $rowd->income_donate_month==5 || $rowd->income_donate_month==8 || $rowd->income_donate_month==11):                      
                        echo (!empty($rowd->inkinddonate)?$rowd->inkinddonate:"");
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td>
                <?php foreach ($datadonateinkind as $rowd):?>  
                  <?php 
                    if ($rowd->income_donate_month==3 || $rowd->income_donate_month==6 || $rowd->income_donate_month==9 || $rowd->income_donate_month==12):                      
                        echo (!empty($rowd->inkinddonate)?$rowd->inkinddonate:"");
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td style="background-color:#ccffeb"></td> 
            <td></td> 
            <td></td> 
            <td>IN PROGRESS . . .</td>
            <td></td> 
            <td></td> 
        </tr>
        
        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Grant</td>   
            <td>
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==1 || $rowgrant->income_date_month==4 || $rowgrant->income_date_month==7 || $rowgrant->income_date_month==10):                      
                        echo number_format($rowgrant->dsumGRANT,2);
                        $num1_3=$rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td class="subtotalothersourceincome_col_1 hidden">
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==1 || $rowgrant->income_date_month==4 || $rowgrant->income_date_month==7 || $rowgrant->income_date_month==10):                      
                        echo $rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td>
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==2 || $rowgrant->income_date_month==5 || $rowgrant->income_date_month==8 || $rowgrant->income_date_month==11):                      
                        echo number_format($rowgrant->dsumGRANT,2);
                        $num2_3=$rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td class="subtotalothersourceincome_col_2 hidden">
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==2 || $rowgrant->income_date_month==5 || $rowgrant->income_date_month==8 || $rowgrant->income_date_month==11):                      
                        echo $rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td>
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==3 || $rowgrant->income_date_month==6 || $rowgrant->income_date_month==9 || $rowgrant->income_date_month==12):                      
                        echo number_format($rowgrant->dsumGRANT,2);
                        $num3_3=$rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td class="subtotalothersourceincome_col_3 hidden">
                <?php foreach ($data as $rowgrant):?>  
                  <?php 
                    if ($rowgrant->income_date_month==3 || $rowgrant->income_date_month==6 || $rowgrant->income_date_month==9 || $rowgrant->income_date_month==12):                      
                        echo $rowgrant->dsumGRANT;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1_3=$num1_3+$num2_3+$num3_3,2) ?></td>
            <td class="subtotalothersourceincome_col_4 subtotal-totals hidden" style="background-color:#ccffeb"><?php echo $subtotal1_3=$num1_3+$num2_3+$num3_3 ?></td>    
            <td>
                <?php foreach ($SUMGrant as $x):?>  
                  <?php echo number_format($x->Grantsum,2);
                    $totalGrant = $x->Grantsum;
                  ?>
                <?php endforeach; ?>
            </td>  
            <td class="subtotalothersourceincome_col_5 subtotal-totals2 hidden">
                <?php foreach ($SUMGrant as $x):?>  
                  <?php echo $x->Grantsum; ?>
                <?php endforeach; ?>
            </td>
            <td ><?php echo number_format($subtotal1_3=$num1_3+$num2_3+$num3_3+$totalGrant,2); $totalgrant_1 = $subtotal1_3=$num1_3+$num2_3+$num3_3+$totalGrant?></td>
            <td>IN PROGRESS . . .</td>
            <td class="subtotalothersourceincome_col_6 subtotal-totals3 hidden"><?php echo $subtotal1_3=$num1_3+$num2_3+$num3_3+$totalGrant; ?></td>
            <td><?php echo number_format($totalGrant+$totalgrant_1,2);$cumulativegrantwBTR=$totalGrant+$totalgrant_1 ?></td>
            <td class="subtotalothersourceincome_col_7 subtotal-totals4 hidden"><?php echo $totalGrant+$totalgrant_1 ?></td>
            <td><?php echo number_format($totalGrant+$cumulativegrantwBTR,2) ?></td>
            <td class="subtotalothersourceincome_col_8 subtotal-totals5 hidden"><?php echo $totalGrant+$cumulativegrantwBTR ?></td>    
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Endowment</td>   
            <td>
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==1 || $rowendow->income_date_month==4 || $rowendow->income_date_month==7 || $rowendow->income_date_month==10):                      
                        echo number_format($rowendow->dsumENDOW,2);
                        $num1_4=$rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td class="subtotalothersourceincome_col_1 hidden">
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==1 || $rowendow->income_date_month==4 || $rowendow->income_date_month==7 || $rowendow->income_date_month==10):                      
                        echo $rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==2 || $rowendow->income_date_month==5 || $rowendow->income_date_month==8 || $rowendow->income_date_month==11):                      
                        echo number_format($rowendow->dsumENDOW,2);
                        $num2_4=$rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td class="subtotalothersourceincome_col_2 hidden">
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==2 || $rowendow->income_date_month==5 || $rowendow->income_date_month==8 || $rowendow->income_date_month==11):                      
                        echo $rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==3 || $rowendow->income_date_month==6 || $rowendow->income_date_month==9 || $rowendow->income_date_month==12):                      
                        echo number_format($rowendow->dsumENDOW,2);
                        $num3_4=$rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td> 
            <td class="subtotalothersourceincome_col_3 hidden">
                <?php foreach ($data as $rowendow):?>  
                  <?php 
                    if ($rowendow->income_date_month==3 || $rowendow->income_date_month==6 || $rowendow->income_date_month==9 || $rowendow->income_date_month==12):                      
                        echo $rowendow->dsumENDOW;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td style="background-color:#ccffeb"><?php echo number_format($subtotal1_4=$num1_4+$num2_4+$num3_4,2) ?></td>
            <td class="subtotalothersourceincome_col_4 subtotal-totals hidden" style="background-color:#ccffeb"><?php echo $subtotal1_4=$num1_4+$num2_4+$num3_4 ?></td>    
            <td>
                <?php foreach ($SUMEndowment as $x):?>  
                  <?php echo number_format($x->Endowmentsum,2);
                    $totalEndow = $x->Endowmentsum;
                  ?>
                <?php endforeach; ?>
            </td>  
            <td class="subtotalothersourceincome_col_5 subtotal-totals2 hidden">
                <?php foreach ($SUMEndowment as $x):?>  
                  <?php echo $x->Endowmentsum; ?>
                <?php endforeach; ?>
            </td>
            <td ><?php echo number_format($subtotal1_4=$num1_4+$num2_4+$num3_4+$totalEndow,2); $totalendow_1 = $subtotal1_4=$num1_4+$num2_3+$num3_4+$totalEndow?></td>
            <td>IN PROGRESS . . .</td>
            <td class="subtotalothersourceincome_col_6 subtotal-totals3 hidden"><?php echo $subtotal1_4=$num1_4+$num2_4+$num3_4+$totalEndow; ?></td>
            <td><?php echo number_format($totalEndow+$totalendow_1,2);$cumulativeendowwBTR=$totalEndow+$totalendow_1 ?></td>
            <td class="subtotalothersourceincome_col_7 subtotal-totals4 hidden"><?php echo $totalEndow+$totalendow_1 ?></td>
            <td><?php echo number_format($totalEndow+$cumulativeendowwBTR,2) ?></td>
            <td class="subtotalothersourceincome_col_8 subtotal-totals5 hidden"><?php echo $totalEndow+$cumulativeendowwBTR ?></td>    
        </tr>

        <tr style="text-align:right" class="hide">
            <td style="text-align:left">Other fee</td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_1):?>  
                  <?php 
                    if ($row_1->otherincome_other_month==1 || $row_1->otherincome_other_month==4 || $row_1->otherincome_other_month==7 || $row_1->otherincome_other_month==10):
                      echo $row_1->othersources;
                      // $num1_5=$row_1->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalothersourceincome_col_1 hidden">
                <?php foreach ($SUMOTHsbyQtr as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_month==1 || $sum1->otherincome_other_month==4 || $sum1->otherincome_other_month==7 || $sum1->otherincome_other_month==10):
                     echo $num1_5=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_2):?>  
                  <?php 
                    if ($row_2->otherincome_other_month==2 || $row_2->otherincome_other_month==5 || $row_2->otherincome_other_month==8 || $row_2->otherincome_other_month==11):
                      echo $row_2->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_2 hidden">
                <?php foreach ($SUMOTHsbyQtr as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_month==2 || $sum1->otherincome_other_month==5 || $sum1->otherincome_other_month==8 || $sum1->otherincome_other_month==11):
                     echo $num2_5=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_3):?>  
                  <?php 
                    if ($row_3->otherincome_other_month==3 || $row_3->otherincome_other_month==6 || $row_3->otherincome_other_month==9 || $row_3->otherincome_other_month==12): 
                      echo $row_3->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalothersourceincome_col_3 hidden">
                <?php foreach ($SUMOTHsbyQtr as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_month==3 || $sum1->otherincome_other_month==6 || $sum1->otherincome_other_month==9 || $sum1->otherincome_other_month==12):
                     echo $num3_5=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfee as $x):?>  
                  <?php echo number_format($x->OTHsourcesum,2);
                    $totalOTH = $x->OTHsourcesum;
                  ?>
                <?php endforeach; ?>
            </td>
            <td class="subtotalothersourceincome_col_4 subtotal-totals hidden">
                <?php foreach ($dataOthersfee as $x):?>  
                  <?php echo $x->OTHsourcesum; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($SUMOTHs as $x):?>  
                  <?php echo number_format($x->OthsSum,2);
                    $totalOTHs = $x->OthsSum;
                  ?>
                <?php endforeach; ?>
            </td> 
            <td class="subtotalothersourceincome_col_5 subtotal-totals2 hidden">
                <?php foreach ($SUMOTHs as $x):?>  
                  <?php echo $x->OthsSum; ?>
                <?php endforeach; ?>
            </td>
             <td ><?php echo number_format($subtotal1_5=$num1_5+$num2_5+$num3_5+$totalOTHs,2); $totaloths_1 = $subtotal1_5=$num1_5+$num2_5+$num3_5+$totalOTHs?></td>
            <td>IN PROGRESS . . .</td>num1_5
            <td class="subtotalothersourceincome_col_6 subtotal-total3 hidden"><?php echo $subtotal1_5=$num1_5+$num1_5+$num1_5+$totaloths_1; ?></td>
            <td><?php echo number_format($totaloths_1+$totaloths_1,2);$cumulativeothsBTR=$totaloths_1+$totaloths_1 ?></td>
            <td class="subtotalothersourceincome_col_7 subtotal-total4 hidden"><?php echo $totaloths_1+$totaloths_1 ?></td>
            <td><?php echo number_format($totaloths_1+$cumulativeothsBTR,2) ?></td>
            <td class="subtotalothersourceincome_col_8 subtotal-total5 hidden"><?php echo $totaloths_1+$cumulativeothsBTR ?></td>
        </tr>

        <tr style="background-color:#80b3ff;font-weight: 700;" class="hide">
            <td class="hide">SUB-TOTAL</td>            
            <td style="text-align:right" id="subtotal22-ans1" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans2" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans3" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans4" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans5" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans6" style="text-align:right"></td>
            <td></td>
            <td style="text-align:right" id="subtotal22-ans7" style="text-align:right"></td>
            <td style="text-align:right" id="subtotal22-ans8" style="text-align:right"></td>
        </tr>
        <tr>
          <td id="gt1"></td>
          <td id="gt2"></td>
          <td id="gt3"></td>
          <!--  -->
          <td id="gt4"></td>

          <td id="gt5" class="hidden"></td>
          <?php 
            
            foreach ($sumCT as $c1) {
              $ctotal1 = $c1->CTotal;
            }

            foreach ($sumCOTHER as $c2) {
              $ctotal2 = $c2->COTHsum;
            }

            foreach ($SUMCdonatecash as $c3) {
              $ctotal3 = $c3->CSUMDonation;
            }

            foreach ($dataCOthersfee as $c4) {
              $ctotal4 = $c4->COTHsourcesum;
            }

            foreach ($dataCprevyear as $c5) {
              $ctotal5 = $c5->Csumprevinc;
            }
          ?>

          <td class="hidden" id="gt5_1"><?php echo $ctotal1 + $ctotal2 + $ctotal3 + $ctotal4 + $ctotal5 ?></td>
          <td><?php echo number_format($ctotal1 + $ctotal2 + $ctotal3 + $ctotal4 + $ctotal5,2) ?></td>
          <td id="gt6"></td>
          <td id="gt7"></td>
          <td id="gt8"></td>
          <td id="gt8_1" class="hide"></td>
          <td id="gt9"></td>
        </tr>

        <?php 
    }
    public function fetchactualincomereportsbyYr2(){
        $codegens = $this->input->post('palist');
        $year = $this->input->post('payear');
        $dataQtr = $this->pamain_model->getMonthsbyYr();
        $data = $this->pamain_model->getallsourceincomeReportGenbyYr2($codegens,$year);
        $dataOTH = $this->pamain_model->getincomeotherFeesbyYr($codegens,$year);
        $dataSUMdonatecash = $this->pamain_model->getSUMdonationcashbyYr2($codegens,$year);
        $SUMOTHsbyYrs = $this->pamain_model->getSUMotherssourcebyYrs2($codegens,$year);
        $SUMprevincome = $this->pamain_model->getSUMprevincomebyYr($codegens,$year);
        $num1=0;
        $num2=0;
        $num3=0;
        $num4=0;

        $num1_1=0;
        $num2_1=0;
        $num3_1=0;
        $num4_1=0;

        $num1_2=0;
        $num2_2=0;
        $num3_2=0;
        $num4_2=0;

        $num1_3=0;
        $num2_3=0;
        $num3_3=0;
        $num4_3=0;

        $tno1 =0;
        $tno2 =0;
        $tno3 =0;
        $tno4 =0;

        $sss =0;
        ?>
        <tr style="text-align:right">
          <td>
            <?php foreach ($SUMOTHsbyYrs as $rowo2):?>  
              <?php 
                if ($rowo2->otherincome_other_quarter=="1st"):
                 $num4=$rowo2->OthsSumQtr;
                endif;
              ?>
            <?php endforeach; ?>
            <?php foreach ($dataSUMdonatecash as $rowc):?>  
              <?php 
                if ($rowc->income_donate_quarter=="1st"):
                  number_format($rowc->CashSum,2);
                  $num3=$rowc->CashSum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($dataOTH as $rowo):?>  
              <?php 
                if ($rowo->QtrCode=="1st"):
                  number_format($rowo->OTHsum,2);
                  $num2=$rowo->OTHsum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($data as $row):?>  
              <?php 
                if ($row->QtrCode=="1st"):
                  number_format($row->sumperqtr,2);
                  $num1=$row->sumperqtr;
                endif;
              ?>
            <?php endforeach; ?>   
            <?php echo $tno1 = number_format($num1 + $num2 + $num3 + $num4,2); ?> 
          </td>
          <td>
            <?php foreach ($SUMOTHsbyYrs as $rowo2):?>  
              <?php 
                if ($rowo2->otherincome_other_quarter=="2nd"):
                 $num4_1=$rowo2->OthsSumQtr;
                endif;
              ?>
            <?php endforeach; ?>
            <?php foreach ($dataSUMdonatecash as $rowc):?>  
              <?php 
                if ($rowc->income_donate_quarter=="2nd"):
                  number_format($rowc->CashSum,2);
                  $num3_1=$rowc->CashSum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($dataOTH as $rowo):?>  
              <?php 
                if ($rowo->QtrCode=="2nd"):
                  number_format($rowo->OTHsum,2);
                  $num2_1=$rowo->OTHsum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($data as $row):?>  
              <?php 
                if ($row->QtrCode=="2nd"):
                  number_format($row->sumperqtr,2);
                  $num1_1=$row->sumperqtr;
                endif;
              ?>
            <?php endforeach; ?>   
            <?php echo $tno2 = number_format($num1_1 + $num2_1 + $num3_1 + $num4_1,2); ?> 
          </td>
          <td>
            <?php foreach ($SUMOTHsbyYrs as $rowo2):?>  
              <?php 
                if ($rowo2->otherincome_other_quarter=="3rd"):
                 $num4_2=$rowo2->OthsSumQtr;
                endif;
              ?>
            <?php endforeach; ?>
            <?php foreach ($dataSUMdonatecash as $rowc):?>  
              <?php 
                if ($rowc->income_donate_quarter=="3rd"):
                  number_format($rowc->CashSum,2);
                  $num3_2=$rowc->CashSum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($dataOTH as $rowo):?>  
              <?php 
                if ($rowo->QtrCode=="3rd"):
                  number_format($rowo->OTHsum,2);
                  $num2_2=$rowo->OTHsum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($data as $row):?>  
              <?php 
                if ($row->QtrCode=="3rd"):
                  number_format($row->sumperqtr,2);
                  $num1_2=$row->sumperqtr;
                endif;
              ?>
            <?php endforeach; ?>   
            <?php echo $tno3 = number_format($num1_2 + $num2_2 + $num3_2 + $num4_2,2); ?> 
          </td>
          <td>
            <?php foreach ($SUMOTHsbyYrs as $rowo2):?>  
              <?php 
                if ($rowo2->otherincome_other_quarter=="4th"):
                 $num4_3=$rowo2->OthsSumQtr;
                endif;
              ?>
            <?php endforeach; ?>
            <?php foreach ($dataSUMdonatecash as $rowc):?>  
              <?php 
                if ($rowc->income_donate_quarter=="4th"):
                  number_format($rowc->CashSum,2);
                  $num3_3=$rowc->CashSum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($dataOTH as $rowo):?>  
              <?php 
                if ($rowo->QtrCode=="4th"):
                  number_format($rowo->OTHsum,2);
                  $num2_3=$rowo->OTHsum;
                endif;
              ?>
            <?php endforeach; ?>  
            <?php foreach ($data as $row):?>  
              <?php 
                if ($row->QtrCode=="4th"):
                  number_format($row->sumperqtr,2);
                  $num1_3=$row->sumperqtr;
                endif;
              ?>
            <?php endforeach; ?>   
            <?php echo $tno4 = number_format($num1_3 + $num2_3 + $num3_3 + $num4_3,2); ?> 
          </td>
          <td><?php echo $tno1+$tno2+$tno3+$tno4 ?></td>
          <td>
            <?php foreach ($SUMprevincome as $prev):?>  
              <?php 
                 $sss=$prev->SumPrevIncome;
              ?>
            <?php endforeach; ?>
            <?php echo number_format(($tno1+$tno2+$tno3+$tno4+$sss)*.75,2) ?>
          </td>
          <td>
            <?php echo number_format(($tno1+$tno2+$tno3+$tno4+$sss)*.25,2) ?>            
          </td>
        </tr>
    <?php 
    }

    public function fetchactualincomereportsbyYr(){
        $codegens = $this->input->post('palist');
        $year = $this->input->post('payear');
        $dataQtr = $this->pamain_model->getMonthsbyYr();
        $data = $this->pamain_model->getallsourceincomeReportGenbyYr($codegens,$year);
        $dataEF = $this->pamain_model->getSUMEntranceFeebyYr($codegens,$year);
        $dataOTH = $this->pamain_model->getincomeotherFeesbyYr($codegens,$year);
        $dataOTHsum = $this->pamain_model->getSUMOtherfeebyYr($codegens,$year);
        $datadonatecash = $this->pamain_model->getalldonationCashbyYr($codegens,$year);   
        $dataSUMdonatecash = $this->pamain_model->getSUMdonationcashbyYr($codegens,$year);
        $datadonateinkind = $this->pamain_model->getalldonationInkindbyYr($codegens,$year);   
        $dataOthersfeeList = $this->pamain_model->getallsourceOthersbyYrs($codegens,$year);
        // $SUMOTHsbyYrs = $this->pamain_model->getSUMotherssourcebyYrs($codegens,$year);   
        $SUMOTHsbyYrs = $this->pamain_model->getSUMotherssourcebyYrs2($codegens,$year);
        $dataOIS = $this->pamain_model->getSUMOthersourceincbyYr($codegens,$year);
        ?>

        <?php 
            $num1=0;
            $num2=0;
            $num3=0;
            $num4=0;
            $num5=0;
            $subtotal1=0;
            $subtotal2=0;

            $num1_1=0;
            $num2_1=0;
            $num3_1=0;
            $num4_1=0;
            $num5_1=0;
            $subtotal1_1=0;
            $subtotal2_1=0;

            $num1_2=0;
            $num2_2=0;
            $num3_2=0;
            $num4_2=0;
            $num5_2=0;
            $subtotal1_2=0;
            $subtotal2_2=0;

            $num1_3=0;
            $num2_3=0;
            $num3_3=0;
            $num4_3=0;
            $num5_3=0;
            $subtotal1_3=0;
            $subtotal2_3=0;

            $num1_4=0;
            $num2_4=0;
            $num3_4=0;
            $num4_4=0;
            $num5_4=0;
            $subtotal1_4=0;
            $subtotal2_4=0;

            $num1_5=0;
            $num2_5=0;
            $num3_5=0;
            $num4_5=0;
            $num5_5=0;
            $subtotal1_5=0;
            $subtotal2_5=0;

            $num1_6=0;
            $num2_6=0;
            $num3_6=0;
            $num4_6=0;
            $num5_6=0;
            $subtotal1_6=0;
            $subtotal2_6=0;

            $num1_7=0;
            $num2_7=0;
            $num3_7=0;
            $num4_7=0;
            $num5_7=0;
            $subtotal1_7=0;
            $subtotal2_7=0;

            $num1_8=0;
            $num2_8=0;
            $num3_8=0;
            $num4_8=0;
            $num5_8=0;
            $subtotal1_8=0;
            $subtotal2_8=0;

            $num1_9=0;
            $num2_9=0;
            $num3_9=0;
            $num4_9=0;
            $num5_9=0;
            $subtotal1_9=0;
            $subtotal2_9=0;

            $num1_10=0;
            $num2_10=0;
            $num3_10=0;
            $num4_10=0;
            $num5_10=0;
            $subtotal1_10=0;
            $subtotal2_10=0;

            $num1_11=0;
            $num2_11=0;
            $num3_11=0;
            $num4_11=0;
            $num5_11=0;
            $subtotal1_11=0;
            $subtotal2_11=0;

            $num1_12=0;
            $num2_12=0;
            $num3_12=0;
            $num4_12=0;
            $num5_12=0;
            $subtotal1_12=0;
            $subtotal2_12=0;

            $num1_13=0;
            $num2_13=0;
            $num3_13=0;
            $num4_13=0;
            $num5_13=0;
            $subtotal1_13=0;
            $subtotal2_13=0;
        ?>

        <tr>
          <td colspan="10" style="background-color:#ffe6e6">Income from Operations (AGDB) <i>(Subject to 75% PA-RIA Deposit and 25% SAGF Remittance to BTr)</i></td>
        </tr>
        <tr style="text-align:right">
            <td style="text-align:left">Entrance Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumEF,2);
                      $num1=$row->sumEF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumEF,2);
                      $num2=$row->sumEF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumEF,2);
                      $num3=$row->sumEF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumEF,2);
                      $num4=$row->sumEF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4?></td>
            <td>
                <?php echo number_format($num1+$num2+$num3+$num4,2);$subtotal1=$num1+$num2+$num3+$num4?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->EFsum,2);
                      $num5=$rowEF->EFsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5?></td>
            <td>
                <?php
                    echo  number_format($subtotal1+$num5,2);$subtotal2=$subtotal1+$num5;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2?></td>
        </tr>
        
        <tr style="text-align:right">
            <td style="text-align:left">Facilities User Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->FUFsum,2);
                      $num1_1=$row->FUFsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_1?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->FUFsum,2);
                      $num2_1=$row->FUFsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_1?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->FUFsum,2);
                      $num3_1=$row->FUFsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_1?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->FUFsum,2);
                      $num4_1=$row->FUFsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_1?></td>
            <td>
                <?php echo number_format($num1_1+$num2_1+$num3_1+$num4_1,2);$subtotal1_1=$num1_1+$num2_1+$num3_1+$num4_1;?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_1?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->FUFsum,2);
                      $num5_1=$rowEF->FUFsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_1?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_1+$num5_1,2);$subtotal2_1=$subtotal1_1+$num5_1;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_1?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Recreational Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumRF,2);
                      $num1_2=$row->sumRF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_2?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumRF,2);
                      $num2_2=$row->sumRF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_2?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumRF,2);
                      $num3_2=$row->sumRF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_2?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumRF,2);
                      $num4_2=$row->sumRF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_2?></td>
            <td>
                <?php echo number_format($num1_2+$num2_2+$num3_2+$num4_2,2);$subtotal1_2=$num1_2+$num2_2+$num3_2+$num4_2?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_2?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->RFsum,2);
                      $num5_2=$rowEF->RFsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_2?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_2+$num5_2,2);$subtotal2_2=$subtotal1_2+$num5_2;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_2?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Resource Users Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumRUF,2);
                      $num1_3=$row->sumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_3?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumRUF,2);
                      $num2_3=$row->sumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_3?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumRUF,2);
                      $num3_3=$row->sumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_3?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumRUF,2);
                      $num4_3=$row->sumRUF;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_3?></td>
            <td>
                <?php echo number_format($num1_3+$num2_3+$num3_3+$num4_3,2);$subtotal1_3=$num1_3+$num2_3+$num3_3+$num4_3?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_3?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->RUGsum,2);
                      $num5_3=$rowEF->RUGsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_3?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_3+$num5_3,2);$subtotal2_3=$subtotal1_3+$num5_3;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_3?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">SAPA Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumSAPA,2);
                      $num1_4=$row->sumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_4?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumSAPA,2);
                      $num2_4=$row->sumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_4?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumSAPA,2);
                      $num3_4=$row->sumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_4?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumSAPA,2);
                      $num4_4=$row->sumSAPA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_4?></td>
            <td>
                <?php echo number_format($num1_4+$num2_4+$num3_4+$num4_4,2);$subtotal1_4=$num1_4+$num2_4+$num3_4+$num4_4?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_4?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->SAPAsum,2);
                      $num5_4=$rowEF->SAPAsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_4?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_4+$num5_4,2);$subtotal2_4=$subtotal1_4+$num5_4;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_4?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">MOA Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumMOA,2);
                      $num1_5=$row->sumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_5?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumMOA,2);
                      $num2_5=$row->sumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_5?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumMOA,2);
                      $num3_5=$row->sumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_5?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumMOA,2);
                      $num4_5=$row->sumMOA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_5?></td>
            <td>
                <?php echo number_format($num1_5+$num2_5+$num3_5+$num4_5,2);$subtotal1_5=$num1_5+$num2_5+$num3_5+$num4_5?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_5?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->MOAsum,2);
                      $num5_5=$rowEF->MOAsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_5?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_5+$num5_5,2);$subtotal2_5=$subtotal1_5+$num5_5;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_5?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Revenue-Sharing Agreements Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumRSA,2);
                      $num1_6=$row->sumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_6?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumRSA,2);
                      $num2_6=$row->sumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_6?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumRSA,2);
                      $num3_6=$row->sumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_6?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumRSA,2);
                      $num4_6=$row->sumRSA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_6?></td>
            <td>
                <?php echo number_format($num1_6+$num2_6+$num3_6+$num4_6,2);$subtotal1_6=$num1_6+$num2_6+$num3_6+$num4_6?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_6?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->RSAsum,2);
                      $num5_6=$rowEF->RSAsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_6?></td>
            <td>
                <?php
                    echo number_format($subtotal1_6+$num5_6,2);$subtotal2_6=$subtotal1_6+$num5_6;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_6?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Clearance, License, Admin Fee</td>            
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumCLA,2);
                      $num1_7=$row->sumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_7?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumCLA,2);
                      $num2_7=$row->sumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_7?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumCLA,2);
                      $num3_7=$row->sumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_7?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumCLA,2);
                      $num4_7=$row->sumCLA;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_7?></td>
            <td>
                <?php echo number_format($num1_7+$num2_7+$num3_7+$num4_7,2);$subtotal1_7=$num1_7+$num2_7+$num3_7+$num4_7?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_7?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->CLAsum,2);
                      $num5_7=$rowEF->CLAsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_7?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_7+$num5_7,2);$subtotal2_7=$subtotal1_7+$num5_7;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_7?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Other Fee</td>            
            <td>
                <?php foreach ($dataOTH as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->OTHsum,2);
                      $num1_8=$row->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow1 hidden"><?php echo $num1_8?></td>
            <td>
                <?php foreach ($dataOTH as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->OTHsum,2);
                      $num2_8=$row->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow2 hidden"><?php echo $num2_8?></td>
            <td>
                <?php foreach ($dataOTH as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->OTHsum,2);
                      $num3_8=$row->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow3 hidden"><?php echo $num3_8?></td>
            <td>
                <?php foreach ($dataOTH as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->OTHsum,2);
                      $num4_8=$row->OTHsum;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow4 hidden"><?php echo $num4_8?></td>
            <td>
                <?php echo number_format($num1_8+$num2_8+$num3_8+$num4_8,2);$subtotal1_8=$num1_8+$num2_8+$num3_8+$num4_8?>
            </td>
            <td class="subtotalrow5 hidden"><?php echo $subtotal1_8?></td>
            <td>
                <?php foreach ($dataOTHsum as $rowSum):?>  
                  <?php 
                      echo number_format($rowSum->sumOTH,2);
                      $num5_8=$rowSum->sumOTH;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrow6 hidden"><?php echo $num5_8?></td>
            <td>
                <?php
                    echo  number_format($subtotal1_8+$num5_8,2);$subtotal2_8=$subtotal1_8+$num5_8;
                ?>
            </td>
            <td class="subtotalrow7 hidden"><?php echo $subtotal2_8?></td>
        </tr>

        <tr style="background-color:#80b3ff;font-weight: 700;">
            <td>SUB-TOTAL</td>
            <td style="text-align:right" id="subyrlyans1" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans2" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans3" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans4" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans5" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans6" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyans7" style="text-align:right"></td>   
        </tr>

        <tr>
          <td colspan="10" style="background-color:#ffe6e6">Other Income Sources <i>(100% PA-RIA Deposit)</i></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Fines, Penalties, Damage Fee</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumFP,2);
                      $num1_9=$row->sumFP;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows1 hidden"><?php echo $num1_9?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumFP,2);
                      $num2_9=$row->sumFP;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows2 hidden"><?php echo $num2_9?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumFP,2);
                      $num3_9=$row->sumFP;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows3 hidden"><?php echo $num3_9?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumFP,2);
                      $num4_9=$row->sumFP;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows4 hidden"><?php echo $num4_9?></td>
            <td>
                <?php echo number_format($num1_9+$num2_9+$num3_9+$num4_9,2);$subtotal1_9=$num1_9+$num2_9+$num3_9+$num4_9?>
            </td>
            <td class="subtotalrows5 hidden"><?php echo $subtotal1_9?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->FPsum,2);
                      $num5_9=$rowEF->FPsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows6 hidden"><?php echo $num5_9?></td>
            <td>
                <?php
                    echo number_format($subtotal1_9+$num5_9,2);$subtotal2_9=$subtotal1_9+$num5_9;
                ?>
            </td>
            <td class="subtotalrows7 hidden"><?php echo $subtotal2_9?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Donation (Cash)</td>
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="1st"):                      
                        echo $rowdonatecash->cashdonate;
                        $num1_10=$rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalrows1 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="1st"):
                        echo $rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="2nd"):                      
                        echo $rowdonatecash->cashdonate;
                        $num2_10=$rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalrows2 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="2nd"):
                        echo $rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="3rd"):                      
                        echo $rowdonatecash->cashdonate;
                        $num3_10=$rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalrows3 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="3rd"):
                        echo $rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>   
            <td>
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="4th"):                      
                        echo $rowdonatecash->cashdonate;
                        $num4_10=$rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalrows4 hidden">
                <?php foreach ($datadonatecash as $rowdonatecash):?>  
                  <?php 
                    if ($rowdonatecash->income_donate_quarter=="4th"):
                        echo $rowdonatecash->sumperYr;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>  
            <td>
                <?php echo number_format($num1_10+$num2_10+$num3_10+$num4_10,2);$subtotal1_10=$num1_10+$num2_10+$num3_10+$num4_10?>
            </td>
            <td class="subtotalrows5 hidden"><?php echo $subtotal1_10?></td>
            <td>
                <?php foreach ($dataSUMdonatecash as $rowC):?>  
                  <?php 
                      echo number_format($rowC->CashSum,2);
                      $num5_10=$rowC->CashSum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows6 hidden"><?php echo $num5_10?></td>
            <td>
                <?php
                    echo number_format($subtotal1_10+$num5_10,2);$subtotal2_10=$subtotal1_10+$num5_10;
                ?>
            </td>
            <td class="subtotalrows7 hidden"><?php echo $subtotal2_10?></td>       
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Donation (In-kind)</td>
            <td>
                <?php foreach ($datadonateinkind as $row):?>  
                  <?php 
                    if ($row->income_donate_quarter=="1st"):                      
                        echo $row->inkinddonate;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td>
                <?php foreach ($datadonateinkind as $row):?>  
                  <?php 
                    if ($row->income_donate_quarter=="2nd"):                      
                        echo $row->inkinddonate;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td>
                <?php foreach ($datadonateinkind as $row):?>  
                  <?php 
                    if ($row->income_donate_quarter=="3rd"):                      
                        echo $row->inkinddonate;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>

            <td>
                <?php foreach ($datadonateinkind as $row):?>  
                  <?php 
                    if ($row->income_donate_quarter=="4th"):                      
                        echo $row->inkinddonate;
                    endif;
                    ?>
                <?php endforeach; ?>           
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Grant</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumGR,2);
                      $num1_11=$row->sumGR;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows1 hidden"><?php echo $num1_11?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumGR,2);
                      $num2_11=$row->sumGR;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows2 hidden"><?php echo $num2_11?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumGR,2);
                      $num3_11=$row->sumGR;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows3 hidden"><?php echo $num3_11?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumGR,2);
                      $num4_11=$row->sumGR;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows4 hidden"><?php echo $num4_11?></td>
            <td>
                <?php echo number_format($num1_11+$num2_11+$num3_11+$num4_11,2);$subtotal1_11=$num1_11+$num2_11+$num3_11+$num4_11?>
            </td>
            <td class="subtotalrows5 hidden"><?php echo $subtotal1_11?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->GRsum,2);
                      $num5_11=$rowEF->GRsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows6 hidden"><?php echo $num5_11?></td>
            <td>
                <?php
                    echo number_format($subtotal1_11+$num5_11,2);$subtotal2_11=$subtotal1_11+$num5_11;
                ?>
            </td>
            <td class="subtotalrows7 hidden"><?php echo $subtotal2_11?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Endowment</td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="1st"):
                      echo number_format($row->sumEND,2);
                      $num1_12=$row->sumEND;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows1 hidden"><?php echo $num1_12?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="2nd"):
                      echo number_format($row->sumEND,2);
                      $num2_12=$row->sumEND;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows2 hidden"><?php echo $num2_12?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="3rd"):
                      echo number_format($row->sumEND,2);
                      $num3_12=$row->sumEND;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows3 hidden"><?php echo $num3_12?></td>
            <td>
                <?php foreach ($data as $row):?>  
                  <?php 
                    if ($row->QtrCode=="4th"):
                      echo number_format($row->sumEND,2);
                      $num4_12=$row->sumEND;
                    endif;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows4 hidden"><?php echo $num4_12?></td>
            <td>
                <?php echo number_format($num1_12+$num2_12+$num3_12+$num4_12,2);$subtotal1_12=$num1_12+$num2_12+$num3_12+$num4_12?>
            </td>
            <td class="subtotalrows5 hidden"><?php echo $subtotal1_12?></td>
            <td>
                <?php foreach ($dataEF as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->ENDsum,2);
                      $num5_12=$rowEF->ENDsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows6 hidden"><?php echo $num5_12?></td>
            <td>
                <?php
                    echo number_format($subtotal1_12+$num5_12,2);$subtotal2_12=$subtotal1_12+$num5_12;
                ?>
            </td>
            <td class="subtotalrows7 hidden"><?php echo $subtotal2_12?></td>
        </tr>

        <tr style="text-align:right">
            <td style="text-align:left">Other fee</td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_1):?>  
                  <?php 
                    if ($row_1->otherincome_other_quarter=="1st"):
                      echo $row_1->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>

            <td class="subtotalrows1 hidden">
                <?php foreach ($SUMOTHsbyYrs as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_quarter=="1st"):
                     echo $num1_13=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_2):?>  
                  <?php 
                    if ($row_2->otherincome_other_quarter=="2nd"):
                      echo $row_2->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalrows2 hidden">
                <?php foreach ($SUMOTHsbyYrs as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_quarter=="2nd"):
                     echo $num2_13=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_3):?>  
                  <?php 
                    if ($row_3->otherincome_other_quarter=="3rd"): 
                      echo $row_3->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalrows3 hidden">
                <?php foreach ($SUMOTHsbyYrs as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_quarter=="3rd"):
                     echo $num3_13=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php foreach ($dataOthersfeeList as $row_3):?>  
                  <?php 
                    if ($row_3->otherincome_other_quarter=="4th"): 
                      echo $row_3->othersources;
                    endif;
                  ?>
                <?php endforeach; ?>           
            </td>
            <td class="subtotalrows4 hidden">
                <?php foreach ($SUMOTHsbyYrs as $sum1):?>  
                  <?php 
                    if ($sum1->otherincome_other_quarter=="4th"):
                     echo $num4_13=$sum1->OthsSumQtr;
                    endif;
                  ?>
                <?php endforeach; ?>   
            </td>
            <td>
                <?php echo number_format($num1_13+$num2_13+$num3_13+$num4_13,2);$subtotal1_13=$num1_13+$num2_13+$num3_13+$num4_13?>
            </td>
            <td class="subtotalrows5 hidden"><?php echo $subtotal1_13?></td>
            <td>
                <?php foreach ($dataOIS as $rowEF):?>  
                  <?php 
                      echo number_format($rowEF->OSIsum,2);
                      $num5_13=$rowEF->OSIsum;
                  ?>
                <?php endforeach; ?>    
            </td>
            <td class="subtotalrows6 hidden"><?php echo $num5_13?></td>
            <td>
                <?php
                    echo number_format($subtotal1_13+$num5_13,2);$subtotal2_13=$subtotal1_13+$num5_13;
                ?>
            </td>
            <td class="subtotalrows7 hidden"><?php echo $subtotal2_13?></td>
        </tr>

        <tr style="background-color:#80b3ff;font-weight: 700;">
            <td>SUB-TOTAL</td>
            <td style="text-align:right" id="subyrlyanss1" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss2" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss3" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss4" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss5" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss6" style="text-align:right"></td>
            <td style="text-align:right" id="subyrlyanss7" style="text-align:right"></td>   
        </tr>
        <?php
    }
}
