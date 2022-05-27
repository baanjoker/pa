<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

/**
 * 
 */
class pdfpavisitorslandscape extends CI_Controller
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

	public function index()
	{
		$searchpa = $this->input->post('searchPaVisitorlogs');
        $searchyear = $this->input->post('searchYearVisitorLogs');
        $quarter = $this->input->post('searchquarterLogs');

        $paname = $this->pamain_model->resultpa($searchpa);
        $visitorsResult = $this->pamain_model->visitorsLogsResult($searchpa,$searchyear,$quarter);

        $malebelow = $this->pamain_model->visitorsLogsResultmalebelow($searchpa,$searchyear,$quarter);
        $femalebelow = $this->pamain_model->visitorsLogsResultfemalebelow($searchpa,$searchyear,$quarter);
        $totalbelow = $this->pamain_model->visitorsLogsResulttotalbelow($searchpa,$searchyear,$quarter);
		
		$malepwd = $this->pamain_model->visitorsLogsResultmalepwd($searchpa,$searchyear,$quarter);
        $femalepwd = $this->pamain_model->visitorsLogsResultfemalepwd($searchpa,$searchyear,$quarter);
        $totalpwd = $this->pamain_model->visitorsLogsResulttotalpwd($searchpa,$searchyear,$quarter);

        $malesenior = $this->pamain_model->visitorsLogsResultmalesenior($searchpa,$searchyear,$quarter);
        $femalesenior = $this->pamain_model->visitorsLogsResultfemalesenior($searchpa,$searchyear,$quarter);
        $totalsenior = $this->pamain_model->visitorsLogsResulttotalsenior($searchpa,$searchyear,$quarter);

        $pdf = new PDFL();
		$pdf->AddPage();
		$pdf->AliasNbPages();
 		$pdf->SetFont('Times','B',24);
 		$pdf->SetTitle('Protected Area Visitors Quarterly Report'); 	
	 	$pdf->SetFont('Times','',12);
		// $table=new easyTable($pdf, '{150,200,150,150}', 'width:100; border-color:#ffff00; font-size:12; border:1;');		
        $table = new easyTable($pdf,'{180, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100,  100, 100, 100, 100, 100, 100, 100}','width:auto; border-color:#000; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#000;');
		$table->printRow();
			$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(50,50,100);
		 	foreach ($paname as $data1) {				
				$pdf->Multicell(336,5, "BIODIVERSITY MANAGEMENT BUREAU\n".$data1->name."\nProtected Area Visitors Statistics Report\n".$quarter." Quarter CY ".$searchyear,1,'C',true);
			}
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#000;');
			$table->printRow();
			$pdf->SetFillColor(252, 248, 227);
			$pdf->SetDrawColor(50,50,100);	
		$table->printRow();				
		$table->rowStyle('align:{CCCC}; bgcolor:#fcf8e3;font-color:#000');
		$table->easyCell("Period Covered", 'rowspan:3;paddingY:3;');
		$table->easyCell("Local visitors", 'colspan:12;paddingY:3;');
		$table->easyCell("Foreign visitors", 'rowspan:2;colspan:3;paddingY:3;');
		$table->easyCell("Sub Total", 'rowspan:2;colspan:3;paddingY:3;');
		$table->printRow();

		$table->rowStyle('align:{CCCCCCCCCCCCCCCCCCCCCCCC}; bgcolor:#fcf8e3;font-color:#000');
		$table->easyCell("Children Below 7y/o", 'colspan:3;paddingY:3;bgcolor:#61ff66');
		$table->easyCell("Person with Disability", 'colspan:3;paddingY:3;bgcolor:#61d2ff');
		$table->easyCell("Senior Citizen", 'colspan:3;paddingY:3;bgcolor:#f2a668');
		$table->easyCell("Student", 'colspan:3;paddingY:3;bgcolor:#f268b8');

		$table->printRow();

		$table->rowStyle('align:{CCCCCCCCCCCCCCCCCCCCCCCCCCCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell('M','paddingY:3;');
		// $table->easyCell('F','paddingY:3;');
		// $table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->easyCell('M','paddingY:3;');
		$table->easyCell('F','paddingY:3;');
		$table->easyCell('T','paddingY:3;bgcolor:#ffc9c9');
		$table->printRow();
		$table->rowStyle('border:TB;border-color:#000;');
		foreach ($visitorsResult as $data) {		
		$table->rowStyle('align:{RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR};valign:M;border:TLRB;paddingY:2;font-color:#000;');
		$table->easyCell($data->visitorlog_month." ".$data->visitorlog_year,'paddingY:3;');
		foreach ($malebelow as $mb) {
            if ($data->visitorlog_month == $mb->visitorlog_month){
			$table->easyCell($mb->below,'paddingY:3;');
			}
		}

		foreach ($femalebelow as $fmb) {
            if ($data->visitorlog_month == $fmb->visitorlog_month){
			$table->easyCell($fmb->febelow,'paddingY:3;');
			}
		}

		foreach ($totalbelow as $tmb) {
            if ($data->visitorlog_month == $tmb->visitorlog_month){
			$table->easyCell($tmb->totalbelow,'paddingY:3;');
			}
		}

		foreach ($malepwd as $mp) {
            if ($data->visitorlog_month == $mp->visitorlog_month){
			$table->easyCell($mp->malepwd,'paddingY:3;');
			}
		}

		foreach ($femalepwd as $fp) {
            if ($data->visitorlog_month == $fp->visitorlog_month){
			$table->easyCell(($fp->femalepwd?$fp->femalepwd:"0"),'paddingY:3;');
			}
		}

		foreach ($totalpwd as $tp) {
            if ($data->visitorlog_month == $tp->visitorlog_month){
			$table->easyCell($tp->totalpwd,'paddingY:3;');
			}
		}

		foreach ($malesenior as $ms) {
            if ($data->visitorlog_month == $ms->visitorlog_month){
			$table->easyCell($ms->malesenior,'paddingY:3;');
			}
		}

		foreach ($femalesenior as $fs) {
            if ($data->visitorlog_month == $fs->visitorlog_month){
			$table->easyCell($fs->femalesenior,'paddingY:3;');
			}
		}

		foreach ($totalsenior as $ts) {
            if ($data->visitorlog_month == $ts->visitorlog_month){
			$table->easyCell($ts->totalsenior,'paddingY:3;');
			}
		}
		// $table->easyCell($data->no_male_local,'paddingY:3;');
		// $table->easyCell($data->no_female_local,'paddingY:3;');
		// $table->easyCell($data->total_local,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->no_male_local_student,'paddingY:3;');
		// $table->easyCell($data->no_female_local_student,'paddingY:3;');
		// $table->easyCell($data->total_student,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->no_male_local_pwd,'paddingY:3;');
		// $table->easyCell($data->no_female_local_pwd,'paddingY:3;');
		// $table->easyCell($data->total_pwd,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->no_male_local_sc,'paddingY:3;');
		// $table->easyCell($data->no_female_local_sc,'paddingY:3;');
		// $table->easyCell($data->total_sc,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->no_male_local_children,'paddingY:3;');
		// $table->easyCell($data->no_female_local_children,'paddingY:3;');
		// $table->easyCell($data->total_children,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->no_male_foreign,'paddingY:3;');
		// $table->easyCell($data->no_female_foreign,'paddingY:3;');
		// $table->easyCell($data->total_foreign,'paddingY:3;bgcolor:#ffc9c9');
		// $table->easyCell($data->total_male,'paddingY:3;');
		// $table->easyCell($data->total_female,'paddingY:3;');
		// $table->easyCell($data->grand_total,'paddingY:3;bgcolor:#ffc9c9');
		$table->printRow();
		}

		// foreach ($QueryvisitorsResultGT as $data2) {
		// $table->rowStyle('border:TB;border-color:#fff;');
		// 	$table->printRow();
		// 	$pdf->SetFillColor(255, 255, 255);
		// 	$w = array(35,270); //Total width 190
		// 		$pdf->SetDrawColor(50,50,100);
 	// 			$pdf->SetFont('Times','B',12);
  //   			$pdf->SetTextColor(255, 0, 0); 				
		// 		$table->easyCell("Grand Total", 'paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtadults, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtstudents, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtpwd, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtsc, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtchildren, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->gtforeign, 'align:R;colspan:3;paddingY:3;bgcolor:#fff');
		// 		$table->easyCell($data2->overallGrandTotal, 'align:R;colspan:3;paddingY:3;bgcolor:#fff;font-size:18;font-style:B;');
  //   			$pdf->SetTextColor(255, 0, 0);
		// 		// $pdf->cell($w[1],10,number_format($data2->grandtotal,2),1,0,'R',true);
		// 		// $pdf->Multicell($w[1],10,$data2->grand_total,1,'R',true);
		// $table->printRow();
		// }
 	// 	$pdf->SetFont('Times','B',12);

 		$table->endTable();
		$pdf->Output(); 
	}
}