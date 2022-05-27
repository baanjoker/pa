<?php defined('BASEPATH') or exit ('no direct script access allowed');
/**
 * 
 */
class PDFIPAFDISBURSEMENTLANDSCAPE extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDFL',
			]);
		$this->load->model([
			'pasu/report/pamain_report',
			'pasu/dashboard_model',
			'pasu/pamain_model'
		]);
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 3
		)
		redirect('index.php/login');
	}

	public function ipafdisbursementreport(){
		$disburse_pa = $this->input->post('disburse_pa');
		$disburse_year = $this->input->post('disburse_year');
		$disburse_year_to = $this->input->post('disburse_year_to');
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
		$pdf->Output(); 
		
	}
}