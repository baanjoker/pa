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
			'PDFL',
			]);
		$this->load->model([
			'cenro/report/pamain_report',
			'cenro/cenro_model'
		]);
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=4)
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
		$searchpa = $this->input->post('searchpaCenro');
        $searchyear = $this->input->post('searchYearCenro');
        $quarter = $this->input->post('searchquarter');

		$resultgroupbyYear = $this->cenro_model->resultgroupbyYear($searchpa,$searchyear,$quarter);
        $resultQuerybyYear = $this->cenro_model->resultQuerybyYear($searchpa,$searchyear,$quarter);
        $querydevelopmentfee = $this->cenro_model->querydevelopmentfee($searchpa,$searchyear,$quarter);
        $querycontrifee = $this->cenro_model->querycontrifee($searchpa,$searchyear,$quarter);
        $queryquarter = $this->cenro_model->queryquarter($quarter);
		$getGrandtotalIpaf = $this->cenro_model->getGrandtotalIpaf($searchpa,$searchyear,$quarter);

		$resultQuerybyYearOthers = $this->cenro_model->resultQuerybyYearOthers($searchpa,$searchyear,$quarter);
		$getgrantotalOther = $this->cenro_model->getgrantotalOther($searchpa,$searchyear,$quarter);

        $resultQueryGrandTotalbyYear = $this->cenro_model->resultQueryGrandTotalbyYear($searchpa,$searchyear);

		$pdf = new PDFL();
		$pdf->AddPage();
		$pdf->AliasNbPages();		
 		$pdf->SetFont('Times','B',24);
 		$pdf->SetTitle('IPAF Quarterly Report'); 	
	 	$pdf->SetFont('Times','',12);
		$table=new easyTable($pdf, '{250,250}', 'width:100; border-color:#ffff00; font-size:12; border:1;');		
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(50,50,100);
		 	foreach ($resultgroupbyYear as $data1) {				
				$pdf->Multicell(330,5,"PROTECTED AREAS, WILDLIFE AND COASTAL ZONE MANAGEMENT SERVICE\n".$data1->pa_name." Statistics Report\n".$quarter." Quarter CY ".$searchyear,1,'C',true);
			}
		$table->printRow();

		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(252, 248, 227);
			$w = array(30,210,90); //Total width 190
				$pdf->SetDrawColor(50,50,100);
				$pdf->cell($w[0],10,'Period Covered',1,0,'C',true);
				$pdf->cell($w[1],10,'Income Generated',1,0,'C',true);				
				$pdf->Multicell($w[2],10,'Amount/Date Deposited to BTR',1,'C',true);
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
				$table->printRow();
				$pdf->SetFillColor(252, 248, 227);
				$w = array(30,30); //Total width 190
					$pdf->SetDrawColor(50,50,100);
					$pdf->cell($w[0],10,'Month & Year',1,0,'C',true);
					$pdf->SetFillColor(252, 248, 227);
					$pdf->cell($w[1],10,'Entrance',1,0,'C',true);
					$pdf->cell($w[1],10,'Facilities',1,0,'C',true);
					$pdf->cell($w[1],10,'Resource',1,0,'C',true);
					$pdf->cell($w[1],10,'Concession',1,0,'C',true);					
					$pdf->cell($w[1],10,'Development',1,0,'C',true);
					$pdf->cell($w[1],10,'Others',1,0,'C',true);
					$pdf->cell($w[1],10,'Total Income',1,0,'C',true);
					$pdf->SetFillColor(252, 248, 227);
					$pdf->cell($w[1],10,'Retained 75%',1,0,'C',true);
					$pdf->cell($w[1],10,'SAGF 25%',1,0,'C',true);
					$pdf->cell($w[1],10,'Total Income',1,0,'C',true);
					$pdf->Ln(10);
			$table->rowStyle('border:TB;border-color:#fff;');
					// foreach ($querydevelopmentfee as $data2) {
        		$data2 = $this->cenro_model->getpdfGrandtotalIpaf($searchpa,$searchyear,$quarter);
		
		foreach ($resultQuerybyYear as $data) {
				$id = $data->id_income;
            	$dataother = $this->cenro_model->searchpdfotherbyyear($id,$searchpa,$searchyear,$quarter);
            	$datadisbursement = $this->cenro_model->searchpdfdisbursementbyquarter($id,$searchpa,$searchyear,$quarter);
            	$datadevelopment = $this->cenro_model->searchpdfdevelopmentbyquarter($id,$searchpa,$searchyear,$quarter);

				$pdf->SetFillColor(255, 255, 255);
				$w = array(30,30); //Total width 190
					$pdf->SetDrawColor(50,50,100);
					$pdf->cell($w[0],10,$data->date_month_income.' '.$data->date_year_income,1,0,'L',true);
					$pdf->cell($w[1],10,number_format($data->entrancefee,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->facilities,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->resource,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->concession,2),1,0,'R',true);
					if (!empty($datadevelopment)): 
                    	foreach ($datadevelopment as $rowd):
							$pdf->cell($w[1],10,$rowd->sumdevelopment,1,0,'R',true);	
                    	endforeach;  
                 	endif;
					if (!empty($dataother)): 
                    	foreach ($dataother as $row3):
							$pdf->cell($w[1],10,$row3->sumOther,1,0,'R',true);	
                    	endforeach;  
                 	endif;		

                 	$sum_income = $data->Grand_total_income + $row3->sumOther + $rowd->sumdevelopment;
                	$income75 = $sum_income * 0.75; 
                	$income25 = $sum_income * 0.25; 
					foreach ($datadisbursement as $distotal) {
                		$disburse75 = $distotal->sumdisbursement*0.75;
                		$disburse25 = $distotal->sumdisbursement*0.25;
                	}
					$pdf->cell($w[1],10,number_format($sum_income,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($income75,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($income25,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($sum_income,2),1,0,'R',true);				
					$pdf->Ln();		
					$table->printRow();
					}
		foreach ($data2 as $rtg) {

			$id = $rtg->id_income;
            $dataotherGT = $this->cenro_model->searchpdfallIpafotherbyyearGT($id,$searchpa,$searchyear,$quarter);
            foreach ($dataotherGT as $row33):
            	$GrandTotal_income = $rtg->grandtotal +  $row33->sumOtherGT;
            endforeach;

		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(255, 255, 255);
			$w = array(35,270); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','B',12);
    			$pdf->SetTextColor(255, 0, 0); 				
				$pdf->cell(60,10,'GRAND TOTAL',1,0,'C',true);
    			$pdf->SetTextColor(255, 0, 0);
				$pdf->cell($w[1],10,number_format($GrandTotal_income,2),1,0,'R',true);				
				// $pdf->Multicell($w[1],10,number_format($data2->grandtotal_btr,2),1,'R',true);
		$table->printRow();
		}
 	$table->endTable();

 		$pdf->AddPage();
 		$pdf->SetFont('Times','',12);
 	// 	$table1=new easyTable($pdf, 2);
		// $table1->easyCell('Trust Fund', 'font-size:30; font-style:B; font-color:#00bfff;');
		// $table1->printRow();
 	// 	$table1->endTable(5);

		$table1=new easyTable($pdf, '{100, 200, 200}','align:C{LCRR};border:1; border-color:#a1a1a1; ');

		$table1->rowStyle('align:{C}; bgcolor:#fff;font-color:#000;');
 		foreach ($resultgroupbyYear as $data1) {
 			$table1->easyCell("PROTECTED AREAS, WILDLIFE AND COASTAL ZONE MANAGEMENT SERVICE\n".$data1->pa_name." Statistics Report\n".$quarter." Quarter CY ".$searchyear, 'colspan:5;paddingY:3;');
		}
 		$table1->printRow();

		$table1->rowStyle('align:{CCCC}; bgcolor:#fcf8e3;font-color:#000');
 		$table1->easyCell("Period Covered (Month/Year))", 'colspan:1;rowspan:2;paddingY:3;');
 		$table1->easyCell("Income Generated", 'colspan:3;paddingY:3;');
 		$table1->printRow();

		$table1->rowStyle('align:{CCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
		$table1->easyCell('Contribution','paddingY:3;');
		// $table1->easyCell('Development','paddingY:3;');
		$table1->easyCell('Fines and Penalties','paddingY:3;');
		$table1->printRow();

			foreach ($resultQuerybyYearOthers as $rowdata) {
				$id = $rowdata->id_income;
	            $datadevfee = $this->cenro_model->searchpdfdevfeesbyyear($id,$searchpa,$searchyear,$quarter);
	            $datacontri = $this->cenro_model->searchpdfcontribyyear($id,$searchpa,$searchyear,$quarter);
	            $dataff = $this->cenro_model->searchpdfffbyyear($id,$searchpa,$searchyear,$quarter);

			   $table1->rowStyle('align:{CCLLL};valign:M;border:LRB;paddingY:2;font-color:#000;');
			   $table1->easyCell($rowdata->date_month_income.' '.$rowdata->date_year_income);			   
			   if (!empty($datacontri)):
					foreach ($datacontri as $cf):
						$table1->easyCell($cf->contrif);	
					endforeach;
				endif;		
				// if (!empty($datadevfee)):
				// 	foreach ($datadevfee as $df):
				// 		$table1->easyCell($df->devfee);	
				// 	endforeach;
				// endif;
				if (!empty($dataff)):
					foreach ($dataff as $ff):
						$table1->easyCell($ff->ffd);	
					endforeach;
				endif;	   
			   $table1->printRow();
			}
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetLineWidth(1);
	$pdf->Output(); 
	}
}