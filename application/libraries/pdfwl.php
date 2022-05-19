<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once dirname(__FILE__) . '/fpdf/fpdf.php';

class PDFWL extends FPDF
{
protected $B;
protected $I;
protected $U;
protected $HREF;
protected $fontList;
protected $issetfont;
protected $issetcolor;
 function __construct($orientation='P', $unit='mm', $format='A4')
 {
 parent::__construct($orientation,$unit,$format);
 }

 // Page header
function Header()
{
    // Logo
    $filename=base_url('bmb_assets2/img/denr-emb-logo.gif');
    $this->Image($filename,13,10,20);
    // Arial bold 15
    $this->SetFont('Times','',10);
    // Move to the right
    $this->Cell(25);
    // Title
    $this->SetTextColor(0, 0, 0);
    $this->Cell(0,0,'Republic of the Philippines',0,0,'');
    $this->Ln(5);

    $this->Cell(25);
    $this->SetTextColor(0, 0, 255);
    $this->SetFont('Times','B',12);
    $this->Cell(0,0,'Department of Environment and Natural Resource',0,0,'');    
    $this->Ln(5);

    $this->Cell(25);
    $this->SetTextColor(0, 100, 0);
    $this->SetFont('Times','',12);
    $this->Cell(0,0,'Biodiversity Management Bureau',0,0,'');
    $this->Ln(5);

    $this->Cell(25);
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('Times','',9);
    $this->Cell(0,0,'Ninoy Aquino Parks and Wildlife Center, 1100 Diliman Quezon City, Philippines',0,0,'');
    $this->Ln(5);

    $this->Cell(25);
    $this->SetFont('Times','I',9);
    $this->Cell(0,0,'Telephone: +(63 2) 9246031-35 / Email: bmb@bmb.gov.ph ',0,0,'');

    // $this->Line(10,35,200,35);
    // $this->SetLineWidth(1);
    // // Line break
    // $this->Ln(15);

    $this->Line(10,35,200,35);
    $this->Ln(5);
    $this->SetFont('Times','B',12);
    $this->Cell(0,20,'List of existing Wetland in the Philippines',0,0,'C');
    // Line break
    $this->Ln(20);
    
      // table header
    $this->SetFont('Times','B',11);
    $w = array(55, 40, 50, 45);
    $this->SetFillColor(180,180,255);
    $this->SetDrawColor(50,50,100);
    $this->cell($w[0],5,'Name',1,0,'C',true);
    $this->cell($w[1],5,'Region',1,0,'C',true);
    $this->cell($w[2],5,'Province',1,0,'C',true);
    $this->cell($w[3],5,'Municipality',1,1,'C',true);
}

// Page footer
function Footer()
{
    // 
    $this->cell(190,0,'','T','l','',True);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}
  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */