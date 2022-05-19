<?php 
defined('BASEPATH') OR exit ('No direct script access allowed!');
/**
 * 
 */
class PDFIPAF extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDF',
			'PDFPAMAIN',
			]);
		$this->load->model([
			'pasu/report/pamain_report',
			'pasu/dashboard_model',
			'pasu/pamain_model'
		]);
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 3
		)
		redirect('index.php/login');
	$context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
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

		$table->rowStyle('border:TB;border-color:#fff;');
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
			$table->rowStyle('border:TB;border-color:#fff;');
			$pdf->Row(array("","","Sub-IPAF : ".$data->total_sub."\nCental IPAF : ".$data->total_central));
	 		// $table->easyCell('Sub-IPAF : '.$data->total_sub, ' colspan:2;font-size:12');		
			$table->printRow();
		}
			
	$pdf->Output(); 
	}

	public function ipafreportbyYear()
	{
        $searchpa = $this->input->post('searchPa');
        $searchyear = $this->input->post('searchYear');
        $resultQuerybyYear = $this->pamain_model->resultQuerybyYear($searchpa,$searchyear);
        $resultQueryGrandTotalbyYear = $this->pamain_model->resultQueryGrandTotalbyYear($searchpa,$searchyear);

		$pdf = new PDFPAMAIN();
		$pdf->AddPage();
		$pdf->AliasNbPages();
 		$pdf->SetFont('Times','B',24);
 		$pdf->SetTitle('IPAF REPORT BY YEAR'); 	
 		
 		
	 		$pdf->SetFont('Times','',12);
		 	$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		 	$table->rowStyle('border:TB;border-color:#fff;');
		 	foreach ($resultQueryGrandTotalbyYear as $data) {
		 		$table->easyCell($data->pa_name.' IPAF Report on Year '.$data->date_year, ' colspan:2;font-size:12');	
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