<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

/**
 * 
 */

class ipaf_report extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDF',
			'PDFPAMAIN',
			]);
		$this->load->model([
			'library_model',
            'login_model',
            'pamain_model',
            // 'report/pamain_model'
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
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
		$data['page_title'] = "Integrated Protected Area Fund (IPAF) Report";
        $data['setting'] = $this->setting_model->read();
        $data['paList']	= $this->pamain_model->paList();

        $data['content'] = $this->load->view('main_server/report/ipaf_report',$data,true);       
        $this->load->view('main_server/dashboard',$data);
	}

	public function getYear()
        {
        $user_id = $this->session->userdata('user_id');
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

    public function incomeSearch()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $data = $this->pamain_model->getIpafYearMain($searchPa,$year_list);
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

    public function ipafreport()
    {
        $searchPa   = $this->input->post('searchPa');        
        $user_id = $this->session->userdata('user_id');
        $searchpa = $this->input->post('searchpa');
        $searchyear = $this->input->post('searchyear');
        $searchmonth = $this->input->post('searchmonth');
        $resultQuery = $this->pamain_model->resultQuerybyMonthly($searchpa,$searchyear,$searchmonth,$user_id);
        $groupbyYear = $this->pamain_model->groupbyYear($searchpa,$searchyear,$searchmonth,$user_id);
        $resultQueryGrandTotal = $this->pamain_model->resultQueryGrandTotal($searchpa,$searchyear,$searchmonth,$user_id);
        $resultQueryGrandTotals = $this->pamain_model->resultQueryGrandTotals($searchpa,$searchyear,$searchmonth,$user_id);

        $pdf = new PDFPAMAIN();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Times','B',24);
        $pdf->SetTitle('IPAF REPORT BY MONTH');

        
            $pdf->SetFont('Times','',12);
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:TB;border-color:#fff;');
            foreach ($resultQueryGrandTotal as $data) {
                $table->easyCell($data->pa_name.' IPAF Report as of '.$data->date_month.' '.$data->date_year, ' colspan:2;font-size:12');      
            }
            $table->printRow();
            $pdf->Ln(5);    

        $table->rowStyle('border:LRTB;border-color:#000;');
                $table->printRow();
                $pdf->SetFillColor(180,180,255);
                $w = array(30,100, 60); //Total width 190
                    $pdf->SetDrawColor(50,50,100);
                    $pdf->cell($w[0],5,'Date',1,0,'C',true);
                    $pdf->cell($w[1],5,'Details',1,0,'C',true);             
                    $pdf->cell($w[2],5,'Total IPAF',1,0,'C',true);  
                    $pdf->Ln(5);

        foreach ($resultQueryGrandTotal as $data) {
            $table->printRow(); 

            $pdf->SetWidths(array(30,100,60));                  
            $pdf->Row(array("\n\n\n".$data->date_month.' '.$data->date_day,"\nTotal Number of Visitors : ".$data->total_visit."\n\nVisitors Income : ".$data->visitors_total."\nFacilities income : ".$data->facilities_total."\nParking income : ".$data->parking_total."\nRecreational income : ".$data->recreational_total."\nDocumentation and Photography income : ".$data->commercialdoc_photography."\nLand activity income : ".$data->trekking_total."\nWater activitincome : ".$data->scuba_total,"\n\n\n\n\nTotal income : ".$data->total)); 
            $pdf->Ln(2);
            $pdf->cell(190,0,'','LR','l','',True);
            $pdf->Ln();             
            $table->printRow();
        }

         foreach ($resultQueryGrandTotals as $data) {
            $pdf->Ln(2);
            $table->rowStyle('border:LRTB;border-color:#fff;');
            $pdf->Row(array("","","Sub-IPAF : ".$data->total_sub."\nCental IPAF : ".$data->total_central));
            // $table->easyCell('Sub-IPAF : '.$data->total_sub, ' colspan:2;font-size:12');     
            $table->printRow();
        }
            
    $pdf->Output(); 
    }


    public function incomeSearchYear()
    {
        $searchPa   = $this->input->post('searchPa');
        $year_list  = $this->input->post('year_list');
        $data = $this->pamain_model->getIpafYearMain($searchPa,$year_list);
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

    public function ipafreportbyYear()
    {
        $searchpa = $this->input->post('searchpas');
        $searchyear = $this->input->post('searchyears');
        $resultQuerybyYear = $this->pamain_model->resultQuerybyYears($searchpa,$searchyear);
        $resultQueryGrandTotalbyYear = $this->pamain_model->resultQueryGrandTotalbyYears($searchpa,$searchyear);

        $pdf = new PDFPAMAIN();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Times','B',24);
        $pdf->SetTitle('IPAF REPORT BY YEAR');  
        
        
            $pdf->SetFont('Times','',12);
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:TB;border-color:#fff;');
            foreach ($resultQueryGrandTotalbyYear as $data) {
                $table->easyCell($data->pa_name.' generated IPAF report, Year '.$data->date_year.'.', ' colspan:2;font-size:12');   
            }   
            $table->printRow();
            $pdf->Ln(5);
        
        $table->rowStyle('border:TB;border-color:#fff;');
                $table->printRow();
                $pdf->SetFillColor(180,180,255);
                $w = array(30,100, 60); //Total width 190
                    $pdf->SetDrawColor(50,50,100);
                    $pdf->cell($w[0],5,'Date',1,0,'C',true);
                    $pdf->cell($w[1],5,'Details',1,0,'C',true);             
                    $pdf->cell($w[2],5,'Total IPAF',1,0,'C',true);  
                    $pdf->Ln(5);

        foreach ($resultQuerybyYear as $data) {
            $table->printRow(); 

            $pdf->SetWidths(array(30,100,60));                  
            $pdf->Row(array("\n\n\n".$data->date_month,'No. of Local Visitors : '.$data->no_visitors."\n\nVisitors income : ".$data->visitors."\nFacilities income : ".$data->facilities."\nParking income : ".$data->parking_area."\nRecreational income : ".$data->recreational_activity."\nWater activity income : ".$data->water_activity,"\n\n\n\n\nTotal income : ".$data->total)); 
            $pdf->Ln(2);
            $pdf->cell(190,0,'','LR','l','',True);
            $pdf->Ln();             
            $table->printRow();
        }
    $table->endTable();
            
    $pdf->Output(); 
    }

}