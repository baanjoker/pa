<?php 
defined('BASEPATH') OR exit ('No direct script access allowed!');

/**
 * 
 */
class printpdf extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDF',
			'PDFPAMAIN',
			]);
		$this->load->model([
			'cenro/report/pamain_report'
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

    public function pdffilepa($gencode=null)
    {

    	$chk_geninfo = 1;
        $chk_pasu = 1;
        $chk_catid = 1;
        $chk_legal = 1;
        $chk_bgz = 1;
        $chk_area = 1;
        $chk_buffer = 1;
        $chk_loc = 1;
        $chk_kba = 1;
        $chk_ir = 1;
        $chk_geoloc = 1;
        $chk_bound = 1;
        $chk_accessibility = 1;
        $chk_wdpa = 1;
        $noofdisplaybio = 1;
        	
 		$datas       = $this->pamain_report->data_main($gencode);
        $boundary       = $this->pamain_report->queryboundary($gencode);
        $pasu_info   = $this->pamain_report->query_pasu($gencode);
        $legalstatus = $this->pamain_report->legalstatus($gencode);
        $paarea = $this->pamain_report->paArea($gencode);
        $paareatotal = $this->pamain_report->paAreaTotal($gencode);     
        $location = $this->pamain_report->query_pamblocation($gencode);
        $recog = $this->pamain_report->international_recog($gencode);
        $geographic = $this->pamain_report->biogeographic_combine($gencode);	

        $pdf = new Pdf();
        $pdf->AddPage('P','A4',0);
        $pdf->AliasNbPages(); 
        if ($gencode == "") {
            $pdf->Cell(0,0,'',0,1,'C');
        } else{       
        foreach ($datas as $main) {            
          $title= $main->pa_name;
        }
        $pdf->SetTitle($title);
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;'); 
                // $table->easyCell($main->pa_name,'colspan:2;font-size:24;align:C;font-style:B;');
                $table->easyCell(iconv("UTF-8", '',$main->pa_name),'colspan:2;font-size:24;align:C;font-style:B;');                
                $table->printRow();

                $table->rowStyle('border:;border-color:#a1a1a1;');
                $table->easyCell('','img:bmb_assets2/upload/pa_profile_pic/'.(!empty($main->pa_image)?$main->pa_image:'nophoto.jpg').', w280,h300;');
                $table->printRow();

            $table->endTable();
        $pdf->ln(5);  
        
        $pdf->AddPage('P','A4',0);      
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                $pdf->SetFont('Times','B',18);   
                // $pdf->Cell(0,0,'',1,1,'L');      
                $pdf->ln(3);  
                $pdf->Cell(0,0,'GENERAL INFORMATION',0,1,'L');
                $pdf->ln(3);        
                // $pdf->Cell(0,0,'',1,1,'L');
                $table->printRow();
            $table->endTable(5);  
            $pdf->SetFont('Times','',12); 
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            if ($chk_pasu == 1) {
                foreach ($pasu_info as $pasu) {
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Protected Area Superintendent </s> '."\n".$pasu->firstname." ".$pasu->middlename." ".$pasu->lastname));
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Assistant Protected Area Superintendent </s> '."\n".$pasu->apasu_fname." ".$pasu->apasu_mname.". ".$pasu->apasu_lname));
                }
                    $table->printRow();

                foreach ($pasu_info as $pasu) {
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7"></s> '.$pasu->mobile." / ".$pasu->landline." / ".$pasu->email));
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7"></s> '.$pasu->apasu_mobile." / ".$pasu->apasu_email));
                }
                    $table->printRow();
            $pdf->SetLineWidth(0.1);
            // $pdf->SetDash(2,3); //5mm on, 5mm off
            // $pdf->Line(10,88,200,87);
            }
            $table->endTable();
            
            foreach ($paarea as $area) {
                $terrestrial = $area->terrestrial;
                $marine = $area->marine_area;
            }
            foreach ($paareatotal as $totalpaarea) {
                $totala= $totalpaarea->total_area;
            }
            foreach ($location as $row_loc) {
                if (!empty($row_loc->try3)) {
                    $comment = strtolower($row_loc->try3);
                    $sentences = explode('. ', $comment);
                    $counter = 0;
                        foreach ($sentences as $sentence) {
                            $sentences[$counter] = ucwords($sentence);
                            $counter++;
                        }
                $fixed = implode('. ', $sentences);
                }elseif (empty($row_loc->barangay_id)) {
                   $commentmun = strtolower($row_loc->municipalonly);
                    $municipalityonly = explode('. ', $commentmun);
                    $counter = 0;
                        foreach ($municipalityonly as $sentences) {
                            $municipalityonly[$counter] = ucwords($sentences);
                            $counter++;
                        }
                $fixed = implode('. ', $municipalityonly);
                }
            }
            
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');

            if ($chk_catid == 1  || $chk_bgz==1 || $chk_area==1 || $chk_buffer==1 || $chk_loc==1) {
               $table->rowStyle('border:;border-color:#a1a1a1;');             
                    $table->easyCell(iconv("UTF-8", '',
                        ($chk_catid==1?'<s "font-color:#234fa7">Category</s>'."\n".$main->categoryName."\n \n":"\n").
                        ($chk_bgz==1?'<s "font-color:#234fa7">Biogeographic Zone</s>'."\n".$main->TBZlocation."\n\n":"\n \n").
                        ($chk_area==1?'<s "font-color:#234fa7">Area</s>'."\n"."Terrestrial : ".number_format($area->terrestrial,2)." has. \n"."Marine : ".number_format($area->marine_area,2)." has. \n Total : ".number_format($totalpaarea->total_area,2)." has. \n\n":"").
                        ($chk_buffer==1?'<s "font-color:#234fa7">Buffer Zone</s>'."\n"."Terrestrial : ".number_format($area->buffer,2)." has. \n"."Marine : ".number_format($area->marine_buffer,2)." has. \n\n":"").($chk_loc==1?'<s "font-color:#234fa7">Location(Barangay, Municipal, Province)</s>'."\n".$fixed:"")
                    ));
            }

            $table->rowStyle('border:;border-color:#a1a1a1;');
                foreach ($recog as $rowrecog) {
                    if ($rowrecog->recognition == 5) {
                       $strplce =  $rowrecog->recognition ==5;
                        $r1 = str_replace(5,"",$strplce);
                    }else{
                        $strplce =  $rowrecog->recognition ==5;
                        $r1 = str_replace("Others","",$rowrecog->interrecog);
                    }
                }
                foreach ($legalstatus as $legal) {
                    if (!empty($legal->nipsub_id)) {
                        $thrt1 = $legal->legis;
                    } else {
                        $thrt1 = $legal->nlegis;
                    }
                }
                

                foreach ($geographic as $geoloc) {
                    
                }
                    $table->easyCell(iconv("UTF-8", '',($chk_legal==1?'<s "font-color:#234fa7">Legal Status</s>'."\n".$thrt1."\n \n":"").
                        ($chk_kba==1?'<s "font-color:#234fa7">Key Biodiversity Area:</s>'."\n".$main->CPABIdesc."\n\n":"").
                        ($chk_ir==1?'<s "font-color:#234fa7">International Recognition:</s>'."\n".
                            $r1."\n\n":"").
                        ($chk_geoloc==1?'<s "font-color:#234fa7">Geographic Location:</s>'."\n".$geoloc->Geographic."\n\n":"")
                ));        
            $table->printRow();
            $table->endTable();
            
            $table=new easyTable($pdf, '{190}', 'width:190; border-color:#fff; font-size:12; border:0;');
                
                $table->easyCell(iconv("UTF-8", '',($chk_accessibility==1?'<s "font-color:#234fa7;align:J">Accessibility</s>'."\n".$main->accessibility."\n \n":"")
                )); 
                $table->printRow();

            $table->endTable();
            $table=new easyTable($pdf, '{190}', 'width:190; border-color:#fff; font-size:12; border:0;');
                foreach ($datas as $bound) {            
                $table->easyCell(iconv("UTF-8", '',($chk_bound==1?'<s "font-color:#234fa7>Boundary</s>'."\n".$bound->boundary_upper."\n \n":"")
                )); 
                }
                $table->printRow();

            $table->endTable();
            $wdpa = $this->pamain_report->wdpa_combine($gencode);


            $table=new easyTable($pdf, '{190}', 'width:190; border-color:#fff; font-size:12; border:0;');
                foreach ($wdpa as $wdpas) {            
                $table->easyCell(iconv("UTF-8", '',($chk_wdpa==1?'<s "font-color:#234fa7>World Database on Protected Area</s>'."\n".$wdpas->wdpatext."\n \n":"")
                )); 
                }
                $table->printRow();

            $table->endTable();
        }//end Checkbox general information
        $pdf->Output();
    }	
}
