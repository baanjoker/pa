<?php 
defined('BASEPATH') OR exit ('No direct script access allowed!');
/**
 * 
 */
class PDFIPAFLANDSCAPE extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDFL',
			// 'PDFPAMAIN',
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

	public function ipafreportweekly()
	{
		$searchpa = $this->input->post('searchPa2');
        $searchyear = $this->input->post('searchYear2');
        $month = $this->input->post('months2');
        $day1 = $this->input->post('fdays');
        $day2= $this->input->post('tdays');
        $prepared = $this->input->post('name11');
        $prepared_designation = $this->input->post('designation11');
        $reviewed = $this->input->post('name21');
        $reviewed_designation = $this->input->post('designation21');
        $submitted = $this->input->post('name31');
        $submitted_designation = $this->input->post('designation31');

        $displaypa = $this->pamain_model->resultpa($searchpa);
        $resultgroupweekly = $this->pamain_model->resultgroupweekly($searchpa,$searchyear,$month,$day1,$day2);

        $pdf = new PDFL();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Times','',12);
        $table = new easyTable($pdf,'{200, 180, 180, 180, 180,180,180,180,180,180}','width:100; border-color:#000; font-size:10; border:1;');
        $table->rowStyle('border:TB;border-color:#fff;');
        $table->printRow();
			$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(255,255,255);
        	foreach ($displaypa as $datas) {				
				$pdf->Multicell(336,5,"BIODIVERSITY MANAGEMENT BUREAU\n".$datas->name." Statistics Report\n".$month.' '.$day1.'-'.$day2.", ".$searchyear,1,'C',true);
			}
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(252, 248, 227);
			$w = array(60,180,90,120); //Total width 190
				$pdf->SetDrawColor(50,50,100);				
		$table->printRow();
		$table->rowStyle('align:{CCCC}; bgcolor:#fcf8e3;font-color:#000');
		$table->easyCell("Date Collected", 'paddingY:3;');
		$table->easyCell("Income Generated(Peso)", 'colspan:6;paddingY:3;');
		$table->easyCell("Amount/Date Deposited to BTR", 'colspan:5;paddingY:3;');
		$table->printRow();
		$table->rowStyle('align:{CCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
		$table->easyCell('MM-DD-YYYY','paddingY:3;');
		$table->easyCell('Entrance','paddingY:3;');
		$table->easyCell('Facilities','paddingY:3;');
		$table->easyCell('Resource','paddingY:3;');
		$table->easyCell('Concession','paddingY:3;');
		$table->easyCell('Development','paddingY:3;');
		$table->easyCell('Others','paddingY:3;');
		$table->easyCell('Retained 75%','paddingY:3;');
		// $table->easyCell('Disbursement 75%','paddingY:3;');
		$table->easyCell('SAGF 25%','paddingY:3;');
		// $table->easyCell('Disbursement 25%','paddingY:3;');
		$table->easyCell('Total Income','paddingY:3;');
		$table->printRow();
					// $pdf->Ln(10);
			$table->rowStyle('border:TB;border-color:#fff;');
        	$data2 = $this->pamain_model->getpdfGrandtotalIpafperweek($searchpa,$searchyear,$month,$day1,$day2);

			foreach ($resultgroupweekly as $data) {
				$id = $data->id_income;
            	$dataother = $this->pamain_model->searchpdfotherbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
            	$dataother2 = $this->pamain_model->searchincomeotherperweek($id,$searchpa,$searchyear,$month,$day1,$day2);
            	$datadisbursement = $this->pamain_model->searchpdfdisbursementbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
            	$datadevelopment = $this->pamain_model->searchpdfdevelopmentbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
            	$totaldevelopment = $this->pamain_model->searchincomedevelopmentperweek($id,$searchpa,$searchyear,$month,$day1,$day2);
            	$table->rowStyle('align:{LLLLL};valign:M;border:LRB;paddingY:2;font-color:#000;');
				$table->easyCell($data->date_month_income.' '.$data->date_day_income.', '.$data->date_year_income);			   
				$table->easyCell(number_format($data->sum_entrance,2));			   
				$table->easyCell(number_format($data->sum_facility,2));			   
				$table->easyCell(number_format($data->sum_resource,2));			   
				$table->easyCell(number_format($data->sum_concession,2));			   
				if (!empty($datadevelopment)): 
                   	foreach ($datadevelopment as $rowd):
						$table->easyCell($rowd->development_view);
                       $display_development = $rowd->sumdevelopment;
                   	endforeach;  
                 endif;
				if (!empty($dataother)): 
                   	foreach ($dataother as $row3):
						$table->easyCell($row3->sumOther);
                       $display_Other = $row3->sumOther;
                   	endforeach;  
                 endif;	
                      		
                $sum_income = $data->Grand_total_income + (!empty($display_development)?$display_development:0)  + (!empty($display_Other)?$display_Other:0); 
                $income75 = $sum_income * 0.75; 
                $income25 = $sum_income * 0.25;

                foreach ($datadisbursement as $dt) {
                 	$dt75 = $dt->sumdisbursement*0.75;
                 	$dt25 = $dt->sumdisbursement*0.25;
                 } 
				// $table->easyCell(number_format($sum_income,2));			   
				$table->easyCell(number_format($income75,2));			   
				// $table->easyCell(number_format($dt75,2));			   
				$table->easyCell(number_format($income25,2));			   
				// $table->easyCell(number_format($dt25,2));			   
				$table->easyCell(number_format($sum_income,2));
				$table->printRow();
					}
					foreach ($data2 as $rtg) {

						$id = $rtg->id_income;
			            $dataotherGT = $this->pamain_model->searchpdfallIpafotherbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2);
			            $datadisbursementGT = $this->pamain_model->searchpdfallIpafdisbursementbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2);
			            $datadevelopmentGT = $this->pamain_model->searchpdfallIpafdevelopmentbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2);
			            foreach ($datadevelopmentGT as $row122):
			            	$disburseTotal = $row122->sumdevelopmentGT;

			            endforeach;
			            foreach ($dataotherGT as $row33):
			            	$GrandTotal_income = $rtg->grandtotal +  $row33->sumOtherGT + $row122->sumdevelopmentGT;
			            	$Grandtotal75 = $GrandTotal_income *0.75;
			            	$Grandtotal25 = $GrandTotal_income *0.25;
			            endforeach;
			            foreach ($datadisbursementGT as $rowdt):
			            	$GTdt75 = $rowdt->sumdisbursementGT*0.75;
			            	$GTdt25 = $rowdt->sumdisbursementGT*0.25;
			            endforeach;
				$table->easyCell("GRAND TOTAL",'colspan:7;');			   
				$table->easyCell(number_format($Grandtotal75,2));
				// $table->easyCell(number_format($GTdt75,2));
				$table->easyCell(number_format($Grandtotal25,2));		
				// $table->easyCell(number_format($GTdt25,2));		
				$table->easyCell(number_format($GrandTotal_income,2));		
					$table->printRow();
					}
					$pdf->Ln(20);

					$table->rowStyle('border:TB;border-color:#fff;');
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetDrawColor(50,50,100);
						$table->printRow();
						$w = array(110,110,110); //Total width 190
							$pdf->SetDrawColor(50,50,100);
			 				$pdf->SetFont('Times','',12);
			    			$pdf->SetTextColor(0, 0, 0);
							$pdf->cell($w[0],10,'Special Collection Officer:',0,0,'L',true);
							$pdf->cell($w[1],10,'Protected Area Superintendent:',0,0,'L',true);				
							$pdf->Multicell($w[2],10,'CENRO/PERNO Reviewed by:',0,'L',true);
					$table->printRow();
					$table->rowStyle('border:TB;border-color:#fff;');
						$table->printRow();
						$w = array(110,110,110); //Total width 190
							$pdf->SetDrawColor(50,50,100);
			 				$pdf->SetFont('Times','',12);
			    			$pdf->SetTextColor(0, 0, 0);
							$pdf->cell($w[0],10,'___________________________________',0,0,'C',true);
							$pdf->cell($w[1],10,'___________________________________',0,0,'C',true);				
							$pdf->Multicell($w[2],10,'___________________________________',0,'C',true);
					$table->printRow();
					$table->rowStyle('border:TB;border-color:#fff;');
						$table->printRow();
						$w = array(110,110,110); //Total width 190
							$pdf->SetDrawColor(50,50,100);
			 				$pdf->SetFont('Times','',12);
			    			$pdf->SetTextColor(0, 0, 0);
							$pdf->cell($w[0],5,$prepared,0,0,'C',true);
							$pdf->cell($w[1],5,$reviewed,0,0,'C',true);				
							$pdf->Multicell($w[2],5,$submitted,0,'C',true);
					$table->printRow();
					$table->rowStyle('border:TB;border-color:#fff;');
						$table->printRow();
						$w = array(110,110,110); //Total width 190
							$pdf->SetDrawColor(50,50,100);
			 				$pdf->SetFont('Times','',12);
			    			$pdf->SetTextColor(0, 0, 0);
							$pdf->cell($w[0],5,$prepared_designation,0,0,'C',true);
							$pdf->cell($w[1],5,$reviewed_designation,0,0,'C',true);				
							$pdf->Multicell($w[2],5,$submitted_designation,0,'C',true);
					$table->printRow();
			 	$table->endTable();
			 	// -----------------------------------------------------------------------------//
			 	$pdf->AddPage();
		 		$pdf->SetFont('Times','',12);
				$table1=new easyTable($pdf, '{250, 400, 400,18}','align:C{LCRR};border:1; border-color:#a1a1a1; ');

				$table1->rowStyle('align:{C}; bgcolor:#fff;font-color:#000;');
		 		foreach ($displaypa as $data1) {
		 			$pdf->Multicell(330,5,"BIODIVERSITY MANAGEMENT BUREAU\n".$datas->name." Statistics Report\n".$month.' '.$day1.'-'.$day2.", ".$searchyear,1,'C',true);
				}
		 		$table1->printRow();

				$table1->rowStyle('align:{CCCC}; bgcolor:#fcf8e3;font-color:#000');
		 		$table1->easyCell("Date Collected", 'paddingY:3;');
		 		$table1->easyCell("Trust Fund", 'colspan:2;paddingY:3;');
		 		$table1->printRow();

				$table1->rowStyle('align:{CCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
				$table1->easyCell('MM-DD-YYYY','paddingY:3;');
				// $table1->easyCell('Year','paddingY:3;');
				$table1->easyCell('Contribution','paddingY:3;');
				// $table1->easyCell('Disbursement','paddingY:3;');
				$table1->easyCell('Fines and Penalties','paddingY:3;');
				$table1->printRow();
				$resultQuerybyYearOthers = $this->pamain_model->resultQuerybyweeklyOthers($searchpa,$searchyear,$month,$day1,$day2);

					foreach ($resultQuerybyYearOthers as $rowdata) {
						$id = $rowdata->id_income;
			            $datadevfee = $this->pamain_model->searchpdfdevfeesbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
			            $datadisbursementfee = $this->pamain_model->searchpdfdevfeesbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
			            $datacontri = $this->pamain_model->searchpdfcontribyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);
			            $dataff = $this->pamain_model->searchpdfffbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2);

					   $table1->rowStyle('align:{LLLLL};valign:M;border:LRB;paddingY:2;font-color:#000;');
					   $table1->easyCell($rowdata->date_month_income.' '.$rowdata->date_day_income.', '.$rowdata->date_year_income);			   
					   // $table1->easyCell($rowdata->date_year_income);	
					   if (!empty($datacontri)):
							foreach ($datacontri as $cf):
								$table1->easyCell($cf->contrif);	
							endforeach;
						endif;		
						// if (!empty($datadisbursementfee)):
						// 	foreach ($datadisbursementfee as $df):
						// 		$table1->easyCell($df->disburementfee);	
						// 	endforeach;
						// endif;
						if (!empty($dataff)):
							foreach ($dataff as $ff):
								$table1->easyCell($ff->ffd);	
							endforeach;
						endif;	   
					   $table1->printRow();
					}
				$pdf->Ln(10);
				$table1->rowStyle('border:TB;border-color:#fff;');
					$table1->printRow();
					$w = array(110,110,110); //Total width 190
						$pdf->SetDrawColor(50,50,100);
		 				$pdf->SetFont('Times','',12);
		    			$pdf->SetTextColor(0, 0, 0);
						$pdf->cell($w[0],10,'Special Collection Officer:',0,0,'L',true);
						$pdf->cell($w[1],10,'Protected Area Superintendent:',0,0,'L',true);				
						$pdf->Multicell($w[2],10,'CENRO/PERNO Reviewed by:',0,'L',true);
				$table1->printRow();
				$table1->rowStyle('border:TB;border-color:#fff;');
					$table1->printRow();
					// $pdf->Line(10,35,340,35)$pdf->SetLineWidth(1)
					$w = array(110,110,110); //Total width 190
						$pdf->SetDrawColor(50,50,100);
		 				$pdf->SetFont('Times','',12);
		    			$pdf->SetTextColor(0, 0, 0);
						$pdf->cell($w[0],10,'___________________________________',0,0,'C',true);
						$pdf->cell($w[1],10,'___________________________________',0,0,'C',true);				
						$pdf->Multicell($w[2],10,'___________________________________',0,'C',true);
				$table1->printRow();
				$table1->rowStyle('border:T;border-color:#fff;');
					$table1->printRow();
					$w = array(110,110,110); //Total width 190
						$pdf->SetDrawColor(50,50,100);
		 				$pdf->SetFont('Times','',12);
		    			$pdf->SetTextColor(0, 0, 0);
						$pdf->cell($w[0],5,$prepared,0,0,'C',true);
						$pdf->cell($w[1],5,$reviewed,0,0,'C',true);				
						$pdf->Multicell($w[2],5,$submitted,0,'C',true);
				$table1->printRow();
				$table1->rowStyle('border:TB;border-color:#fff;');
					$table1->printRow();
					$w = array(110,110,110); //Total width 190
						$pdf->SetDrawColor(50,50,100);
		 				$pdf->SetFont('Times','',12);
		    			$pdf->SetTextColor(0, 0, 0);
						$pdf->cell($w[0],5,$prepared_designation,0,0,'C',true);
						$pdf->cell($w[1],5,$reviewed_designation,0,0,'C',true);				
						$pdf->Multicell($w[2],5,$submitted_designation,0,'C',true);
				$table1->printRow();
		 	$table1->endTable();	
        $pdf->SetTextColor(0, 0, 0);
    	$pdf->SetLineWidth(1);
		$pdf->Output(); 
	}

	public function ipafreportbyYear()
	{

        $searchpa = $this->input->post('searchPa');
        $searchyear = $this->input->post('searchYear');
        $quarter = $this->input->post('searchquarter');
        $prepared = $this->input->post('name1');
        $prepared_designation = $this->input->post('designation1');
        $reviewed = $this->input->post('name2');
        $reviewed_designation = $this->input->post('designation2');
        $submitted = $this->input->post('name3');
        $submitted_designation = $this->input->post('designation3');

		$resultgroupbyYear = $this->pamain_model->resultgroupbyYear($searchpa,$searchyear,$quarter);
        $resultQuerybyYear = $this->pamain_model->resultQuerybyYear($searchpa,$searchyear,$quarter);
        $querydevelopmentfee = $this->pamain_model->querydevelopmentfee($searchpa,$searchyear,$quarter);
        $querycontrifee = $this->pamain_model->querycontrifee($searchpa,$searchyear,$quarter);
        $queryquarter = $this->pamain_model->queryquarter($quarter);
		$getGrandtotalIpaf = $this->pamain_model->getGrandtotalIpaf($searchpa,$searchyear,$quarter);

		$resultQuerybyYearOthers = $this->pamain_model->resultQuerybyYearOthers($searchpa,$searchyear,$quarter);
		$getgrantotalOther = $this->pamain_model->getgrantotalOther($searchpa,$searchyear,$quarter);

        $resultQueryGrandTotalbyYear = $this->pamain_model->resultQueryGrandTotalbyYear($searchpa,$searchyear);

		$pdf = new PDFL();
		$pdf->AddPage();
		$pdf->AliasNbPages();		
 		$pdf->SetFont('Times','B',24);
 		$pdf->SetTitle('IPAF Quarterly Report'); 	
	 	$pdf->SetFont('Times','',10);
		$table=new easyTable($pdf, '{250,250}', 'width:100; border-color:#ffff00; font-size:12; border:1;');		
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(252, 248, 227);
				$pdf->SetDrawColor(50,50,100);
		 	foreach ($resultgroupbyYear as $data1) {				
				$pdf->Multicell(330.5,5,"BIODIVERSITY MANAGEMENT BUREAU\n".$data1->pa_name." Statistics Report\n".$quarter." Quarter CY ".$searchyear,1,'C',true);
			}
		$table->printRow();

		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(252, 248, 227);
			$w = array(30,200.3,100.3); //Total width 190
				$pdf->SetDrawColor(50,50,100);
				$pdf->cell($w[0],10,'Date Collected',1,0,'C',true);
				$pdf->cell($w[1],10,'Income Generated(Peso)',1,0,'C',true);				
				$pdf->Multicell($w[2],10,'Amount/Date Deposited to BTR',1,'C',true);
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
				$table->printRow();
				$pdf->SetFillColor(252, 248, 227);
				$w = array(30,33.4); //Total width 190
					$pdf->SetDrawColor(50,50,100);
					$pdf->cell($w[0],10,'Month/Year',1,0,'C',true);
					// $pdf->cell($w[0],10,'Year',1,0,'C',true);		
					$pdf->SetFillColor(252, 248, 227);
					$pdf->cell($w[1],10,'Entrance',1,0,'C',true);
					$pdf->cell($w[1],10,'Facilities',1,0,'C',true);
					$pdf->cell($w[1],10,'Resource',1,0,'C',true);
					$pdf->cell($w[1],10,'Concession',1,0,'C',true);					
					$pdf->cell($w[1],10,'Development',1,0,'C',true);					
					$pdf->cell($w[1],10,'Others',1,0,'C',true);
					// $pdf->cell($w[1],10,'Total Income',1,0,'C',true);
					$pdf->SetFillColor(252, 248, 227);
					$pdf->cell($w[1],10,'Retained 75%',1,0,'C',true);
					// $pdf->cell($w[1],10,'Disbursement 75%',1,0,'C',true);
					$pdf->cell($w[1],10,'SAGF 25%',1,0,'C',true);
					// $pdf->cell($w[1],10,'Disbursement 25%',1,0,'C',true);
					$pdf->cell($w[1],10,'Total Income',1,0,'C',true);
					$pdf->Ln(10);
			$table->rowStyle('border:TB;border-color:#fff;');
					// foreach ($querydevelopmentfee as $data2) {
        	$data2 = $this->pamain_model->getpdfGrandtotalIpaf($searchpa,$searchyear,$quarter);

		foreach ($resultQuerybyYear as $data) {
				$id = $data->id_income;
            	$dataother = $this->pamain_model->searchpdfotherbyyear($id,$searchpa,$searchyear,$quarter);
            	$datadisbursement = $this->pamain_model->searchpdfdisbursementbyquarter($id,$searchpa,$searchyear,$quarter);
            	$datadevelopment = $this->pamain_model->searchpdfdevelopmentbyquarter($id,$searchpa,$searchyear,$quarter);

				$pdf->SetFillColor(255, 255, 255);
				$w = array(30,33.4); //Total width 190
					$pdf->SetDrawColor(50,50,100);
					$pdf->cell($w[0],10,$data->date_month_income." ".$data->date_year_income,1,0,'L',true);
					// $pdf->cell($w[0],10,$data->date_year_income,1,0,'C',true);				
					$pdf->cell($w[1],10,number_format($data->sum_entrance,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->sum_facility,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->sum_resource,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($data->sum_concession,2),1,0,'R',true);
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
					// $pdf->cell($w[1],10,number_format($sum_income,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($income75,2),1,0,'R',true);
					// $pdf->cell($w[1],10,number_format($disburse75,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($income25,2),1,0,'R',true);
					// $pdf->cell($w[1],10,number_format($disburse25,2),1,0,'R',true);
					$pdf->cell($w[1],10,number_format($sum_income,2),1,0,'R',true);			
					$pdf->Ln();		
					$table->printRow();
					}
		foreach ($data2 as $rtg) {

			$id = $rtg->id_income;
            $dataotherGT = $this->pamain_model->searchpdfallIpafotherbyyearGT($id,$searchpa,$searchyear,$quarter);
            $datadisbursementGT = $this->pamain_model->searchpdfallIpafdisbursementbyyearGT($id,$searchpa,$searchyear,$quarter);
            $datadevelopmentGT = $this->pamain_model->searchpdfallIpafdevelopmentbyyearGT($id,$searchpa,$searchyear,$quarter);
            foreach ($datadevelopmentGT as $row122):
            	$disburseTotal = $row122->sumdevelopmentGT;
            endforeach;
            foreach ($dataotherGT as $row33):
            	$GrandTotal_income = $rtg->grandtotal +  $row33->sumOtherGT + $row122->sumdevelopmentGT;
            	$Grandtotal75 = $GrandTotal_income *0.75;
            	$Grandtotal25 = $GrandTotal_income *0.25;
            endforeach;
            foreach ($datadisbursementGT as $gtd):
            	$GTdis75 = $gtd->sumdisbursementGT*0.75;
            	$GTdis25 = $gtd->sumdisbursementGT*0.25;
            endforeach;

		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$pdf->SetFillColor(255, 255, 255);
			$w = array(35,167,33.5,33.3,30.1); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','B',12);
    			$pdf->SetTextColor(255, 0, 0); 				
				$pdf->cell(63.4,10,'GRAND TOTAL',1,0,'C',true);
    			$pdf->SetTextColor(255, 0, 0);
				$pdf->cell($w[1],10,'',1,0,'R',true);				
				$pdf->cell($w[2],10,number_format($Grandtotal75,2),1,0,'R',true);				
				// $pdf->cell(27.4,10,number_format($GTdis75,2),1,0,'R',true);				
				$pdf->cell($w[3],10,number_format($Grandtotal25,2),1,0,'R',true);				
				// $pdf->cell(27.4,10,number_format($GTdis25,2),1,0,'R',true);				
				$pdf->cell($w[3],10,number_format($GrandTotal_income,2),1,0,'R',true);				
				// $pdf->Multicell($w[1],10,number_format($data2->grandtotal_btr,2),1,'R',true);
		$table->printRow();
		}
		$pdf->Ln(20);

		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],10,'Special Collection Officer:',0,0,'L',true);
				$pdf->cell($w[1],10,'Protected Area Superintendent:',0,0,'L',true);				
				$pdf->Multicell($w[2],10,'CENRO/PERNO Reviewed by:',0,'L',true);
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],10,'___________________________________',0,0,'C',true);
				$pdf->cell($w[1],10,'___________________________________',0,0,'C',true);				
				$pdf->Multicell($w[2],10,'___________________________________',0,'C',true);
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],5,$prepared,0,0,'C',true);
				$pdf->cell($w[1],5,$reviewed,0,0,'C',true);				
				$pdf->Multicell($w[2],5,$submitted,0,'C',true);
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#fff;');
			$table->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],5,$prepared_designation,0,0,'C',true);
				$pdf->cell($w[1],5,$reviewed_designation,0,0,'C',true);				
				$pdf->Multicell($w[2],5,$submitted_designation,0,'C',true);
		$table->printRow();
 	$table->endTable();

 		$pdf->AddPage();
 		$pdf->SetFont('Times','',12);
		$table1=new easyTable($pdf, '{100, 100, 200, 200}','align:C{LCRR};border:1; border-color:#a1a1a1; ');

		$table1->rowStyle('align:{C}; bgcolor:#fff;font-color:#000;');
 		foreach ($resultgroupbyYear as $data1) {
 			$table1->easyCell("BIODIVERSITY MANAGEMENT BUREAU\n".$data1->pa_name." Statistics Report\n".$quarter." Quarter CY ".$searchyear, 'colspan:4;paddingY:3;');
		}
 		$table1->printRow();

		$table1->rowStyle('align:{CCCC}; bgcolor:#fcf8e3;font-color:#000');
 		$table1->easyCell("Date Collected", 'colspan:2;paddingY:3;');
 		$table1->easyCell("Trust Fund", 'colspan:2;paddingY:3;');
 		$table1->printRow();

		$table1->rowStyle('align:{CCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
		$table1->easyCell('Month','paddingY:3;');
		$table1->easyCell('Year','paddingY:3;');
		$table1->easyCell('Contribution','paddingY:3;');
		// $table1->easyCell('Disbursement','paddingY:3;');
		$table1->easyCell('Fines and Penalties','paddingY:3;');
		$table1->printRow();

			foreach ($resultQuerybyYearOthers as $rowdata) {
				$id = $rowdata->id_income;
	            $datadevfee = $this->pamain_model->searchpdfdevfeesbyyear($id,$searchpa,$searchyear,$quarter);
	            $datadisbursementnew = $this->pamain_model->searchpdfdisbursementfeebyyear($id,$searchpa,$searchyear,$quarter);
	            $datacontri = $this->pamain_model->searchpdfcontribyyear($id,$searchpa,$searchyear,$quarter);
	            $dataff = $this->pamain_model->searchpdfffbyyear($id,$searchpa,$searchyear,$quarter);

			   $table1->rowStyle('align:{CCLLL};valign:M;border:LRB;paddingY:2;font-color:#000;');
			   $table1->easyCell($rowdata->date_month_income);			   
			   $table1->easyCell($rowdata->date_year_income);	
			   if (!empty($datacontri)):
					foreach ($datacontri as $cf):
						$table1->easyCell($cf->contrif);	
					endforeach;
				endif;		
				// if (!empty($datadisbursementnew)):
				// 	foreach ($datadisbursementnew as $df):
				// 		$table1->easyCell($df->disbursement_view);	
				// 	endforeach;
				// endif;
				if (!empty($dataff)):
					foreach ($dataff as $ff):
						$table1->easyCell($ff->ffd);	
					endforeach;
				endif;	   
			   $table1->printRow();
			}
		$pdf->Ln(10);
		$table1->rowStyle('border:TB;border-color:#fff;');
			$table1->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],10,'Special Collection Officer:',0,0,'L',true);
				$pdf->cell($w[1],10,'Protected Area Superintendent:',0,0,'L',true);				
				$pdf->Multicell($w[2],10,'CENRO/PERNO Reviewed by:',0,'L',true);
		$table1->printRow();
		$table1->rowStyle('border:TB;border-color:#fff;');
			$table1->printRow();
			// $pdf->Line(10,35,340,35)$pdf->SetLineWidth(1)
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],10,'___________________________________',0,0,'C',true);
				$pdf->cell($w[1],10,'___________________________________',0,0,'C',true);				
				$pdf->Multicell($w[2],10,'___________________________________',0,'C',true);
		$table1->printRow();
		$table1->rowStyle('border:T;border-color:#fff;');
			$table1->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],5,$prepared,0,0,'C',true);
				$pdf->cell($w[1],5,$reviewed,0,0,'C',true);				
				$pdf->Multicell($w[2],5,$submitted,0,'C',true);
		$table1->printRow();
		$table1->rowStyle('border:TB;border-color:#fff;');
			$table1->printRow();
			$w = array(110,110,110); //Total width 190
				$pdf->SetDrawColor(50,50,100);
 				$pdf->SetFont('Times','',12);
    			$pdf->SetTextColor(0, 0, 0);
				$pdf->cell($w[0],5,$prepared_designation,0,0,'C',true);
				$pdf->cell($w[1],5,$reviewed_designation,0,0,'C',true);				
				$pdf->Multicell($w[2],5,$submitted_designation,0,'C',true);
		$table1->printRow();
 	$table1->endTable();	

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetLineWidth(1);
	$pdf->Output(); 
	}
		

}