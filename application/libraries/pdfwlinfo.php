<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once dirname(__FILE__) . '/fpdf/fpdf.php';

class PDFWLINFO extends FPDF
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
	global $title;	
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

    $this->Line(10,35,200,35);
    $this->SetLineWidth(1);
    // Line break
    $this->Ln(15);
    // $this->Cell(0,20,'List of existing Wetland in the Philippines',0,0,'C');
    // Line break
    // $this->Ln(20);
    
      // table header    
}

// Page footer
function Footer()
{
    // 
    // $this->cell(190,0,'','T','l','',True);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
    // Draw the border line
    // $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}




}
  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */