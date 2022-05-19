<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once dirname(__FILE__) . '/fpdf/fpdf.php';
require_once dirname(__FILE__) . '/fpdf-easytable-master/easyTable.php';
require_once dirname(__FILE__) . '/fpdf-easytable-master/formatedString.php';

class PDFL extends FPDF
{
protected $B;
protected $I;
protected $U;
protected $HREF;
protected $fontList;
protected $issetfont;
protected $issetcolor;
 function __construct($orientation='L', $unit='mm', $format='Legal')
{
        $ci                     =   & get_instance();  
        $ci->load->model(['pasu/report/pamain_report']);

        $this->head_title_top       =   $this->format($ci->config->item('head_title_top'));
        $this->head_title           =   $this->format($ci->config->item('head_title'));
        $this->head_subtitle        =   $this->format($ci->config->item('head_subtitle'));
        $this->footer_page_literal  =   $this->format($ci->config->item('footer_page_literal'));
        $this->head_office          =   $ci->session->userdata('department');
        $this->head_address         =   $ci->session->userdata('address');
        $this->head_emailadd        =   $ci->session->userdata('office_emailadd');
        $this->head_contact         =   $ci->session->userdata('landline');

        $this->base_url         =   $ci->config->item('url_wrapper');
        if ( $this->base_url === TRUE)
            $this->logo = base_url( $ci->config->item('logo') );
        else
            $this->logo = $ci->config->item('logo');

 
 parent::__construct($orientation,$unit,$format);
 }

 function vcell($c_width,$c_height,$x_axis,$text){
$w_w=$c_height/3;
$w_w_1=$w_w+2;
$w_w1=$w_w+$w_w+$w_w+3;
$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array 

$lengthToSplit = 50;
if($len>$lengthToSplit){
$w_text=str_split($text,$lengthToSplit);
$this->SetX($x_axis);
$this->Cell($c_width,$w_w_1,$w_text[0],'','','');
if(isset($w_text[1])) {
    $this->SetX($x_axis);
    $this->Cell($c_width,$w_w1,$w_text[1],'','','');
}
$this->SetX($x_axis);
$this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
}
else{
    $this->SetX($x_axis);
    $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
    }


 // Page header
function Header()
{

    global $title;  

        // $filename=base_url('bmb_assets2/img/logo_new.png');
        // $this->Image($filename,13,10,22);

        $this->Image('http://car.emb.gov.ph/wp-content/uploads/2015/04/DENR-Logo.png',13,10,22);
    

        $this->SetFont( 'Times' , '' ,10 );
        $this->Cell(25);

        $this->Cell(120,0,'Republic of the Philippines',0,0,'L');
        $this->Ln('5');
        $this->SetFont('Times','B',12);
        $this->Cell(25);

        $this->SetTextColor(0, 0, 255);
        $this->Cell(120,0,'Department of Environment and Natural Resources',0,0,'L');
        $this->Ln('5');
        $this->SetFont('Times','',12);
        $this->Cell(25);

        $this->SetTextColor(0, 100, 0);
        $this->Cell(120,0,$this->head_office,0,0,'L');        
        $this->Ln('5');        
        $this->SetFont('Times','',10);
        $this->Cell(25);

        $this->SetTextColor(0, 0, 0);
        $this->Cell(120,0,$this->head_address,0,0,'L');      
        $this->Ln('5');        
        $this->SetFont('Times','',10);
        $this->Cell(25);

        $this->Cell(120,0,"Landline # : ".$this->head_contact."/Email address : ".$this->head_emailadd,0,0,'L');      
        $this->Ln('4');        
        $this->SetFont('Times','',25);
        $this->Cell(25);
        // $this->Cell(120,10,$this->head_subtitle,0,0,'L');
        // Line break
        $this->Line(10,35,340,35);
        $this->Ln(10);
}
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function RotatedText($x,$y,$txt,$angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}
// Page footer
function Footer()
{
    $this->SetTextColor(0, 0, 0);
    // $this->cell(190,0,'','T','l','',True);
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Protected Area Information System',0,0,'L');    
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');

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

function format($str)
    {
        return utf8_decode($str);
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

function MultiCellBlt($w, $h, $blt, $txt, $border=0, $align='J', $fill=false)
    {
        //Get bullet width including margins
        $blt_width = $this->GetStringWidth($blt)+$this->cMargin*2;

        //Save x
        $bak_x = $this->x;

        //Output bullet
        $this->Cell($blt_width,$h,$blt,0,'',$fill);

        //Output text
        $this->MultiCell($w-$blt_width,$h,$txt,$border,$align,$fill);

        //Restore x
        $this->x = $bak_x;
    }

    // -----------------------------------------------------------------------------------------------------------//
    // 
    // 
    // -----------------------------------------------------------------------------------------------------------//
    public function PageBreak(){
       return $this->PageBreakTrigger;
   }

    public function current_font($c){
      if($c=='family'){
         return $this->FontFamily;
      }
      elseif($c=='style'){
         return $this->FontStyle;
      }
      elseif($c=='size'){
         return $this->FontSizePt;
      }
   }
   public function get_color($c){
      if($c=='fill'){
         return $this->FillColor;
      }
      elseif($c=='text'){
         return $this->TextColor;
      }
   }
   public function get_page_width(){
      return $this->w;
   }
   public function get_margin($c){
      if($c=='l'){
         return $this->lMargin;
      }
      elseif($c=='r'){
         return $this->rMargin;
      }
      elseif($c=='t'){
         return $this->tMargin;
      }
   }
   public function get_linewidth(){
      return $this->LineWidth;
   }
   public function get_orientation(){
      return $this->CurOrientation;
   }
   static private $hex=array('0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,
   'A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15);
   public function is_rgb($str){
      $a=true;
      $tmp=explode(',', trim($str, ','));
      foreach($tmp as $color){
         if(!is_numeric($color) || $color<0 || $color>255){
            $a=false;
            break;
         }
      }
      return $a;
   }
   public function is_hex($str){
      $a=true;
      $str=strtoupper($str);
      $n=strlen($str);
      if(($n==7 || $n==4) && $str[0]=='#'){
         for($i=1; $i<$n; $i++){
            if(!isset(self::$hex[$str[$i]])){
               $a=false;
               break;
            }
         }
      }
      else{
         $a=false;
      }
      return $a;
   }
   public function hextodec($str){
      $result=array();
      $str=strtoupper(substr($str,1));
      $n=strlen($str);
      for($i=0; $i<3; $i++){
         if($n==6){
            $result[$i]=self::$hex[$str[2*$i]]*16+self::$hex[$str[2*$i+1]];
         }
         else{
            $result[$i]=self::$hex[$str[$i]]*16+self::$hex[$str[$i]];
         }
      }
      return $result;
   }
   static private $options=array('F'=>'', 'T'=>'', 'D'=>'');
   public function resetColor($str, $p='F'){
      if(isset(self::$options[$p]) && self::$options[$p]!=$str){
         self::$options[$p]=$str;
         $array=array();
         if($this->is_hex($str)){
            $array=$this->hextodec($str);
         }
         elseif($this->is_rgb($str)){
            $array=explode(',', trim($str, ','));
            for($i=0; $i<3; $i++){
               if(!isset($array[$i])){
                  $array[$i]=0;
               }
            }
         }
         else{
            $array=array(null, null, null);
            $i=0;
            $tmp=explode(' ', $str);
            foreach($tmp as $c){
               if(is_numeric($c)){
                  $array[$i]=$c*256;
                  $i++;
               }
            }
         }
         if($p=='T'){
            $this->SetTextColor($array[0],$array[1],$array[2]);
         }
         elseif($p=='D'){
            $this->SetDrawColor($array[0],$array[1], $array[2]);
         }
         elseif($p=='F'){
            $this->SetFillColor($array[0],$array[1],$array[2]);
         }
      }
   }
   static private $font_def='';
   public function resetFont($font_family, $font_style, $font_size){
      if(self::$font_def!=$font_family .'-' . $font_style . '-' .$font_size){
         self::$font_def=$font_family .'-' . $font_style . '-' .$font_size;
         $this->SetFont($font_family, $font_style, $font_size);
      }
   }
   public function resetStaticData(){
      self::$font_def='';
      self::$options=array('F'=>'', 'T'=>'', 'D'=>'');
   }
   /***********************************************************************
   *
   * Based on FPDF method SetFont
   *
   ************************************************************************/
   private function &FontData($family, $style, $size){
      if($family=='')
      $family = $this->FontFamily;
      else
      $family = strtolower($family);
      $style = strtoupper($style);
      if(strpos($style,'U')!==false){
         $this->underline = true;
         $style = str_replace('U','',$style);
      }
      if($style=='IB')
      $style = 'BI';
      $fontkey = $family.$style;
      if(!isset($this->fonts[$fontkey])){
         if($family=='arial')
         $family = 'helvetica';
         if(in_array($family,$this->CoreFonts)){
            if($family=='symbol' || $family=='zapfdingbats')
            $style = '';
            $fontkey = $family.$style;
            if(!isset($this->fonts[$fontkey]))
            $this->AddFont($family,$style);
         }
         else
         $this->Error('Undefined font: '.$family.' '.$style);
      }
      $result['FontSize'] = $size/$this->k;
      $result['CurrentFont']=&$this->fonts[$fontkey];
      return $result;
   }
    
   private function setLines(&$fstring, $p, $q){
      $parced_str=& $fstring->parced_str;
      $lines=& $fstring->lines;
      $linesmap=& $fstring->linesmap;
      $cfty=$fstring->get_current_style($p);
      $ffs=$cfty['font-family'] . $cfty['style'];
      if(!isset($fstring->used_fonts[$ffs])){
         $fstring->used_fonts[$ffs]=& $this->FontData($cfty['font-family'], $cfty['style'], $cfty['font-size']);
      }
      $cw=& $fstring->used_fonts[$ffs]['CurrentFont']['cw'];
      $wmax = $fstring->width*1000*$this->k;
      $j=count($lines)-1;
      $k=strlen($lines[$j]);
         if(!isset($linesmap[$j][0])) {
         $linesmap[$j]=array($p,$p, 0);
      }
      $sl=$cw[' ']*$cfty['font-size'];
      $x=$a=$linesmap[$j][2];
      if($k>0){
         $x+=$sl;
         $lines[$j].=' ';
         $linesmap[$j][2]+=$sl;
      }
      $u=$p;
      $t='';
      $l=$p+$q;
      $ftmp='';
      for($i=$p; $i<$l; $i++){
            if($ftmp!=$ffs){
            $cfty=$fstring->get_current_style($i);
            $ffs=$cfty['font-family'] . $cfty['style'];
            if(!isset($fstring->used_fonts[$ffs])){
               $fstring->used_fonts[$ffs]=& $this->FontData($cfty['font-family'], $cfty['style'], $cfty['font-size']);
            }
            $cw=& $fstring->used_fonts[$ffs]['CurrentFont']['cw'];
            $ftmp=$ffs;
         }
         $x+=$cw[$parced_str[$i]]*$cfty['font-size'];
         if($x>$wmax){
            if($a>0){
               $t=substr($parced_str,$p, $i-$p);
               $lines[$j]=substr($lines[$j],0,$k);
               $linesmap[$j][1]=$p-1;
               $linesmap[$j][2]=$a;
               $x-=($a+$sl);
               $a=0;
               $u=$p;
            }
            else{
               $x=$cw[$parced_str[$i]]*$cfty['font-size'];
               $t='';
               $u=$i;
            }
            $j++;
            $lines[$j]=$t;
            $linesmap[$j]=array();
            $linesmap[$j][0]=$u;
            $linesmap[$j][2]=0;
         }
         $lines[$j].=$parced_str[$i];
         $linesmap[$j][1]=$i;
         $linesmap[$j][2]=$x;
      }
      return;
   }
   public function &extMultiCell($font_family, $font_style, $font_size, $font_color, $w, $txt){
      $result=array();
      if($w==0){
         return $result;
      }
      $this->current_font=array('font-family'=>$font_family, 'style'=>$font_style, 'font-size'=>$font_size, 'font-color'=>$font_color);
      $fstring=new formatedString($txt, $w, $this->current_font);
      $word='';
      $p=0;
      $i=0;
      $n=strlen($fstring->parced_str);
      while($i<$n){
         $word.=$fstring->parced_str[$i];
         if($fstring->parced_str[$i]=="\n" || $fstring->parced_str[$i]==' ' || $i==$n-1){
            $word=trim($word);
            $this->setLines($fstring, $p, strlen($word));
            $p=$i+1;
            $word='';
            if($fstring->parced_str[$i]=="\n" && $i<$n-1){
               $z=0;
               $j=count($fstring->lines);
               $fstring->lines[$j]='';
               $fstring->linesmap[$j]=array();
            }
         }
         $i++;
      }
      if($n==0){
         return $result;
      }
      $n=count($fstring->lines);
         for($i=0; $i<$n; $i++){
         $result[$i]=$fstring->break_by_style($i);
      }
      return $result;
   }
   private function GetMixStringWidth($line){
      $w = 0;
      foreach($line['chunks'] as $i=>$chunk){
         $t=0;
         $cf=& $this->FontData($line['style'][$i]['font-family'], $line['style'][$i]['style'], $line['style'][$i]['font-size']);
         $cw=& $cf['CurrentFont']['cw'];
         $s=implode('', explode(' ',$chunk));
         $l = strlen($s);
         for($j=0;$j<$l;$j++){
            $t+=$cw[$s[$j]];
         }
         $w+=$t*$line['style'][$i]['font-size'];
      }
      return $w;
   }
   public function CellBlock($w, $lh, &$lines, $align='J'){
      if($w==0){
         return;
      }
      $ctmp='';
      $ftmp='';
      foreach($lines as $i=>$line){
         $k = $this->k;
         if($this->y+$lh*$line['height']>$this->PageBreakTrigger){
            break;
         }
         $dx=0;
         $dw=0;
         if($line['width']!=0){
            if($align=='R'){
               $dx = $w-$line['width']/($this->k*1000);
            }
            elseif($align=='C'){
               $dx = ($w-$line['width']/($this->k*1000))/2;
            }
            if($align=='J'){
               $tmp=explode(' ', implode('',$line['chunks']));
               $ns=count($tmp);
               if($ns>1){
                  $sx=implode('',$tmp);
                  $delta=$this->GetMixStringWidth($line)/($this->k*1000);
                  $dw=($w-$delta)*(1/($ns-1));
               }
            }
         }
         $xx=$this->x+$dx;
         foreach($line['chunks'] as $tj=>$txt){
            $this->resetFont($line['style'][$tj]['font-family'], $line['style'][$tj]['style'], $line['style'][$tj]['font-size']);
            $this->resetColor($line['style'][$tj]['font-color'], 'T');
            $y=$this->y+0.5*$lh*$line['height'] +0.3*$line['height']/$this->k;
            if($dw){
               $tmp=explode(' ', $txt);
               foreach($tmp as $e=>$tt){
                  if($e>0){
                     $xx+=$dw;
                     if($tt==''){
                        continue;
                     }
                  }
                  $this->Text($xx, $y, $tt);
                     if($line['style'][$tj]['href']){
                     $yr=$this->y+0.5*($lh*$line['height']-$line['height']/$this->k);
                     $this->Link($xx, $yr, $this->GetStringWidth($txt),$line['height']/$this->k, $line['style'][$tj]['href']);
                  }
                  $xx+=$this->GetStringWidth($tt);
               }
            }
            else{
               $this->Text($xx, $y, $txt);
                  if($line['style'][$tj]['href']){
                  $yr=$this->y+0.5*($lh*$line['height']-$line['height']/$this->k);
                  $this->Link($xx, $yr, $this->GetStringWidth($txt),$line['height']/$this->k, $line['style'][$tj]['href']);
               }
               $xx+=$this->GetStringWidth($txt);
            }
         }
         unset($lines[$i]);
         $this->y += $lh*$line['height'];
      }
   }

}
  
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */

