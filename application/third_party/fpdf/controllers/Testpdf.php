<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Name:  Testpdf
*
* Version: 1.0.0
*
* Author: Pedro Ruiz Hidalgo
*		  ruizhidalgopedro@gmail.com
*         @pedroruizhidalg
*
* Location: application/controllers/Testpdf.php
*
* Created:  208-02-27
*
* Description:  This demonstrates pdf library is working.
*
* Requirements: PHP5 or above
*
*/


class Testpdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->add_package_path( APPPATH . 'third_party/fpdf');
        $this->load->library('pdf');
        $this->load->model(['pasu/report/report_main']);
        if ($this->session->userdata('isLogIn') == false)
        redirect('index.php/login');
    }

	public function index()
	{
        $this->pdf = new Pdf();
        $this->pdf->Add_Page('P','A4',0);
        $this->pdf->AliasNbPages();
        
        $datas  =   $this->report_main->data_main($gencode);
        $pasu_info   =   $this->report_main->query_pasu($gencode);

        $pdf = new Pdf();
        $pdf->Add_Page('P','A4',0);
        $pdf->AliasNbPages();        
        foreach ($datas as $main) {
          $title= $main->pa_name;
        }
        $pdf->SetTitle($title);
        
        $pdf->SetFont('Times','',18);        
        $pdf->Cell(0,0,$main->pa_name,0,1,'C');
        $pdf->ln(10);

        $pdf->SetFont('Times','B',12);   
        $pdf->Cell(0,0,'',1,1,'L');      
        $pdf->ln(3);  
        $pdf->Cell(0,0,'General Information',0,1,'L');
        $pdf->ln(3);        
        $pdf->Cell(0,0,'',1,1,'L');
        $pdf->ln(5);   

        $this->pdf->Output( 'page.pdf' , 'I' );
	}
}

/*
* application/controllers/Testpdf.php
*/
