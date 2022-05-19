<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testpdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->add_package_path( APPPATH . 'third_party/fpdf');
        $this->load->library(['pdf']);
        $this->load->model(['pasu/report/report_main']);
        if ($this->session->userdata('isLogIn') == false)
        redirect('index.php/login');
    $context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
        $fd = fopen("https://pais.bmb.gov.ph/pas/pasu/report/testpdf/printpdf", "rb", false, $context);
    }

    public function printpdf()
    {
        $gencode = $this->input->post('paid');
        $chk_geninfo = $this->input->post('chk-allgeninfo');
        $chk_pasu = $this->input->post('chk-pasu');
        $chk_catid = $this->input->post('chk-catid');
        $chk_legal = $this->input->post('chk-legal');
        $chk_bgz = $this->input->post('chk-bgz');
        $chk_area = $this->input->post('chk-paarea');
        $chk_buffer = $this->input->post('chk-bzarea');
        $chk_loc = $this->input->post('chk-loc');
        $chk_kba = $this->input->post('chk-kba');
        $chk_ir = $this->input->post('chk-ir');
        $chk_geoloc = $this->input->post('chk-geoloc');
        $chk_bound = $this->input->post('chk-bound');
        $chk_accessibility = $this->input->post('chk-accessibility');
        $chk_wdpa = $this->input->post('chk-wdpa');
        $noofdisplaybio = $this->input->post('countbiodisplay');

        $datas       = $this->report_main->data_main($gencode);
        $boundary       = $this->report_main->queryboundary($gencode);
        $pasu_info   = $this->report_main->query_pasu($gencode);
        $apasu_info   = $this->report_main->query_apasu($gencode);
        $legalstatus = $this->pamain_report->legalstatus($gencode);
        $paarea = $this->pamain_report->paArea($gencode);
        $paareatotal = $this->pamain_report->paAreaTotal($gencode);     
        $location = $this->pamain_report->query_pamblocation($gencode);
        $recog = $this->pamain_report->international_recog($gencode);
        $geographic = $this->pamain_report->biogeographic_combine($gencode);
        $geographiczonmarine = $this->pamain_report->biogeozonmarine($gencode);
        $geographiczonterrestrial = $this->pamain_report->biogeozonterrestrial($gencode);

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
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#fff; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;'); 
                // $table->easyCell($main->pa_name,'colspan:2;font-size:24;align:C;font-style:B;');
                $table->easyCell(iconv("UTF-8", '',$main->pa_name),'colspan:2;font-size:24;align:C;font-style:B;');                
                $table->printRow();
                $table->easyCell(iconv("UTF-8", '',(!empty($main->formerpaname)?$main->formerpaname:"")),'font-size:16;align:C;font-style:I;');                
                $table->printRow();

                $table->rowStyle('border:;border-color:#a1a1a1;');
                $table->easyCell('','img:bmb_assets2/upload/pa_profile_pic/'.(!empty($main->pa_image)?$main->pa_image:"nophoto.jpg").', w280,h300;');
                $table->printRow();

            $table->endTable();
        $pdf->ln(5);  
        if ($chk_geninfo==1 || $chk_pasu == 1 || $chk_catid==1 || $chk_legal==1 || $chk_bgz==1 || $chk_area==1 || $chk_buffer==1 || $chk_loc==1 || $chk_kba==1 || $chk_ir==1 || $chk_geoloc==1 || $chk_bound==1 || $chk_accessibility==1 || $chk_wdpa==1) {
            // $pdf->SetFont('Times','B',12);   
            // $pdf->Cell(0,0,'',1,1,'L');      
            // $pdf->ln(3);  
            // $pdf->Cell(0,0,'GENERAL INFORMATION',0,1,'L');
            // $pdf->ln(3);        
            // $pdf->Cell(0,0,'',1,1,'L');
            // $pdf->ln(5);   
        // $pdf->AddPage('P','A4',0);
            
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
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#fff; font-size:12; border:1;');
            if ($chk_pasu == 1) {
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Protected Area Superintendent', 'align:C;font-size:12;colspan:2;font-style:B');
                    $table->printRow(); 
                foreach ($pasu_info as $pasu) {
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '',$pasu->firstname." ".$pasu->middlename." ".$pasu->lastname.(!empty($pasu->psuffix)?$pasu->psuffix:"")));      
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7"></s> '.(!empty($pasu->mobile)?$pasu->mobile." / ":"").(!empty($pasu->landline)?$pasu->landline." / ":"").(!empty($pasu->email)?$pasu->email:"")));             
                }
                    // $table->printRow();
                    $table->printRow();
            $pdf->SetLineWidth(0.1);
            
            }
            $table->endTable();

            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#fff; font-size:12; border:1;');
            if ($chk_pasu == 1) {
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Assistant Protected Area Superintendent', 'align:C;font-size:12;colspan:2;font-style:B');
                    $table->printRow(); 
                foreach ($apasu_info as $apasu) {
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '',$apasu->apasu_fname." ".$apasu->apasu_mname." ".$apasu->apasu_lname.(!empty($apasu->apasu_suffix)?$apasu->apasu_suffix:"")));      
                    $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7"></s> '.(!empty($apasu->apasu_mobile)?$apasu->apasu_mobile." / ":"").(!empty($apasu->apasu_email)?$apasu->apasu_email:"")));             
                }
                    // $table->printRow();
                    $table->printRow();
            $pdf->SetLineWidth(0.1);
            
            }
            $table->endTable();

            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            if ($chk_pasu == 1) {
                foreach ($pasu_info as $pasu) {
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                }
                    $table->printRow();
            $pdf->SetLineWidth(0.1);
            // $pdf->SetDash(2,3); //5mm on, 5mm off
            // $pdf->Line(10,88,200,87);
            }
            $table->endTable();

            //LEGAL STATUS
            if ($chk_legal==1) {
                $legalstatusNew = $this->pamain_report->legalstatusNew($gencode);
                $table=new easyTable($pdf, '{47.5,47.5,47.5,47.5}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Issuance', 'align:C;font-size:12;colspan:4;font-style:B');
                        $table->printRow();
                    $table->rowStyle('bgcolor:#009879');
                        $table->easyCell(iconv("UTF-8", '','Legal Status'),'align:C;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '','NIPAS Category'),'align:C;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '','Legal Basis'),'align:C;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C;font-color:#fff');
                    $table->printRow();
                    foreach ($legalstatusNew as $legstat) {    
                        $coded=$legstat->legal_generatedcode;
                        $history = $this->pamain_report->legalstatusHistory($coded);

                        $table->rowStyle('border:TBLR;border-color:#a1a1a1');
                            $table->easyCell(iconv("UTF-8", '',(!empty($legstat->nipsub_id)?$legstat->description:"").(!empty($legstat->nip_id)?"\n".$legstat->nipDesc:"")),'align:L');
                            $table->easyCell(iconv("UTF-8", '',($legstat->pa_category_id==11)?$legstat->pa_category_other:$legstat->categoryName),'align:L');
                            $table->easyCell(iconv("UTF-8", '',(!empty($legstat->legis_id)?$legstat->LegisDesc."\n".$legstat->month." ".$legstat->date_year:"")),'align:L');
                            $table->easyCell(iconv("UTF-8", '',(!empty($legstat->legis_area)?$legstat->legis_area." has.":"0 has.")),'align:R');
                        $table->printRow();  

                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ffad33;font-color:#000');
                            $table->easyCell(iconv("UTF-8", '','History of Establishment'),'align:C;colspan:4');
                        $table->printRow();  

                        foreach ($history as $his) {
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$his->sub_nip_description),'align:L');
                            $table->easyCell(iconv("UTF-8", '',($his->nipid_status==1?$his->categoryName:"")),'align:L');
                            $table->easyCell(iconv("UTF-8", '',$his->LegisDesc." No. ".$his->legal_basis_no),'align:L');
                        // if (!empty($his->legal_basis_day)): 
                        //     $table->easyCell(iconv("UTF-8", '',$his->month." ".$his->legal_basis_day.", ".$his->legal_basis_year),'align:L');
                        // else:
                        //     $table->easyCell(iconv("UTF-8", '',$his->month." ".$his->legal_basis_year),'align:L');
                        // endif;
                            $table->easyCell(iconv("UTF-8", '',number_format($his->legal_basis_area,2)." has."),'align:R');

                        $table->printRow();  
                            
                        }

                    }
                             
                $table->endTable(5);
            }

            if ($chk_area==1) {
                $table=new easyTable($pdf, '{95,95}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Area', 'align:C;font-size:12;colspan:2;font-style:B');
                    $table->printRow();        
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Protected Area(has)', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Buffer Zone (has)', 'align:C;font-size:12;font-style:B');
                    $table->printRow(); 
                    foreach ($paarea as $area) {
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',"Land : ".number_format($area->terrestrial,2)."\n Water : ".number_format($area->marine_area,2)."\n Total area: ".number_format($area->terrestrial + $area->marine_area,2)),'align:L');
                            $table->easyCell(iconv("UTF-8", '',"Terrestrial : ".number_format($area->buffer,2)."\n Marine : ".number_format($area->marine_buffer,2)),'align:L');
                        $table->printRow();   
                    }                    
                $table->endTable(5);

                $table=new easyTable($pdf, '{95,95}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Biogeographic Regions', 'align:C;font-size:12;colspan:2;font-style:B');
                    $table->printRow();        
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Terrestrial', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Marine', 'align:C;font-size:12;font-style:B');
                    $table->printRow(); 
                    foreach ($geographiczonmarine as $biom) {
                        $mar = $biom->descs;
                    }
                    foreach ($geographiczonterrestrial as $biot) {
                        $ter = $biot->descs2;
                    }
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$ter),'align:L');
                            $table->easyCell(iconv("UTF-8", '',$mar),'align:L');
                        $table->printRow();   
                                     
                $table->endTable(5);
            }

            if ($chk_loc==1) {
                $locationNew = $this->pamain_report->query_pamblocationNew($gencode);
                $table=new easyTable($pdf, '{47.5,47.5,47.5,47.5}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Administrative Location', 'align:C;font-size:12;colspan:4;font-style:B');
                    $table->printRow();        
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Region', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Province', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Municipality', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Barangay', 'align:C;font-size:12;font-style:B');
                    $table->printRow(); 
                    foreach ($locationNew as $locs) {
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$locs->regionName),'align:L');
                        $table->easyCell(iconv("UTF-8", '',$locs->provinceName),'align:L');
                        $table->easyCell(iconv("UTF-8", '',$locs->municipalName),'align:L');
                        $table->easyCell(iconv("UTF-8", '',$locs->barangayName),'align:L');
                    $table->printRow();   
                    }             
                $table->endTable(5);
            }

            if ($chk_geoloc==1) {
                $table=new easyTable($pdf, '{190}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Geographic Location', 'align:C;font-size:12;colspan:;font-style:B');
                    $table->printRow();       
                    
                    foreach ($geographic as $geoloc) {
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                            // $table->easyCell(iconv("UTF-8", '',$geoloc->Geographic),'align:L');
                            $table->easyCell(iconv("UTF-8", '',"Upper most left \nLongitude : ".($geoloc->uml_lat_direction==1?"East ":"West ").$geoloc->uml_lat_degree."° ".$geoloc->uml_lat_minute."' ".$geoloc->uml_lat_seconds."'' || Latitude : ".($geoloc->uml_long_direction==1?"North ":"South ").$geoloc->uml_long_degree."° ".$geoloc->uml_long_minutes."' ".$geoloc->uml_long_seconds."''\n\n Lower most right \nLongitude : ".($geoloc->lmr_long_direction==1?"East ":"West ").$geoloc->lmr_lat_degree."° ".$geoloc->lmr_lat_minutes."' ".$geoloc->lmr_lat_seconds."'' || Latitude : ".($geoloc->lmr_long_direction==1?"North ":"South ").$geoloc->lmr_long_degree."° ".$geoloc->lmr_long_minutes."' ".$geoloc->lmr_long_seconds."''"),'align:L');
                        $table->printRow();   
                    } 
                        $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                            $table->easyCell('Boundary', 'align:C;font-size:12;colspan:;font-style:B');
                        $table->printRow();  
                        $table->rowStyle('border:B;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',($chk_bound==1?$main->boundary_upper."\n \n":"")),'align:L');
                        $table->printRow();                 
                $table->endTable(5);
            }

            if ($chk_ir==1) {
                $recognew = $this->pamain_report->international_recogNew($gencode);
                $table=new easyTable($pdf, '{190}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('International Recognition', 'align:C;font-size:12;colspan:;font-style:B');
                    $table->printRow();       
                    $recogtitle="";
                    foreach ($recognew as $recg) {
                        $regcode = $recg->recognition_code;
                        $ramsardata = $this->pamain_report->international_ramsarlists($regcode);
                        $listing = "";
                        foreach ($ramsardata as $recglist) {
                            $listing = $recglist->sublisting;
                        }
                        if($recg->recognition==7)
                        {
                            $recogtitle = "Declaration Date";
                        }else if($recg->recognition==2 || $recg->recognition==5 || $recg->recognition==3)
                        {
                            $recogtitle = "Designation Date";
                        }else if($recg->recognition==4)
                        {
                            $recogtitle = "Joining Date";
                        }else if($recg->recognition==6)
                        {
                            $recogtitle = "Recognition Date";    
                        }else if($recg->recognition==1)
                        {
                            $recogtitle = "Inscription Date";                        
                        }
                        if ($recg->recognition==3) {
                            $table->rowStyle('border:B;border-color:#a1a1a1;');
                               $table->easyCell(iconv("UTF-8", '',$recg->recognition_description).(!empty($listing)?"\n".$listing."\n<b>".$recogtitle." : </b>".$recg->month_declared." ".$recg->year_declared:""),'align:L');
                            $table->printRow();   
                        }else{
                            $table->rowStyle('border:B;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '',(($recg->recognition==1||$recg->recognition==8)?$recg->recognition_description."\n".$recg->crit_desc:$recg->recognition_description)."\n<b>".$recogtitle." : </b>".$recg->month_declared." ".$recg->year_declared),'align:L');
                            $table->printRow(); 
                            // (!empty($recg->inscribed)?"\n".$recg->inscribed:"").
                        }
                          
                    }                    
                $table->endTable(5);
            }


            if (!empty($main->accessibility)) {            
                $table=new easyTable($pdf, '{190}', 'font-size:12');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('Accessibility', 'align:C;font-size:12;colspan:;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:B;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$main->accessibility),'align:L');
                    $table->printRow();   
                $table->endTable(5);
            }

            
            if ($chk_wdpa==1) {
                $wdpa = $this->pamain_report->wdpa_combine($gencode);
                $table=new easyTable($pdf, '{190}', 'width:190; border-color:#fff; font-size:12; border:0;');
                    $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                        $table->easyCell('World Database on Protected Area', 'align:C;font-size:12;colspan:;font-style:B');
                    $table->printRow();
                    foreach ($wdpa as $wdpas) { 
                        $check_chr ="";
                        $passcode = $wdpas->generatedcode;
                        $wdpa2 = $this->pamain_report->wdpa_location($passcode);
                        foreach($wdpa2 as $wdpl):
                            $check_chr = $wdpl->wdpalocs;
                        endforeach;
                    $table->rowStyle('border:B;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$wdpas->wdpatext."\n<b>Sub-national location : </b>".$check_chr)); 
                        }
                    $table->printRow();
                $table->endTable();
            }
        }//end Checkbox general information  

        ###########################################################
        ##                                                       ##
        ##              Habitats and Ecosystem                   ##
        ##                                                       ##
        ###########################################################
        $countforforimage = $this->pamain_report->query_count_forforImage($gencode);
        $countforfordetails = $this->pamain_report->query_count_forfordetails($gencode);
        $countinwetimage = $this->pamain_report->query_count_inwetdetails($gencode);
        $countinwetdetails = $this->pamain_report->query_count_inwetdetails($gencode);
        $countcavessimage = $this->pamain_report->query_count_cavesimage($gencode);
        $countcavessdetails = $this->pamain_report->query_count_cavesdetails($gencode);

        $forfor = $this->pamain_report->query_forestformation($gencode);
        $forfor_details_query = $this->pamain_report->query_forestfors_details($gencode);
       
        $caves = $this->pamain_report->query_cave($gencode);
        $cave_details_query = $this->pamain_report->query_cave_details($gencode);

        $chk_forfor = $this->input->post('chk-forfor');
        $chk_vegetative = $this->input->post('chk-vegetative');
        $chk_inwet = $this->input->post('chk-inwet');
        $chk_caves = $this->input->post('chk-caves');
        $chk_coral = $this->input->post('chk-coral');
        $chk_seagrass = $this->input->post('chk-seagrass');
        $chk_mangrove = $this->input->post('chk-mangrove');
        $chk_fish = $this->input->post('chk-fish');
        $chk_habitateco = $this->input->post('chk-habeco');
        if ($chk_habitateco==1 || $chk_forfor == 1 || $chk_vegetative==1 || $chk_inwet==1 || $chk_caves==1 || $chk_coral==1 || $chk_seagrass==1 || $chk_mangrove==1 || $chk_fish==1) {           
            if (!empty($countforforimage) || !empty($countforfordetails) || !empty($countinwetimage) || !empty($countinwetdetails) || !empty($countcavessimage) || !empty($countcavessdetails)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:'); 
                        $table->easyCell('HABITATS AND ECOSYSTEM', 'align:L;font-size:18;font-style:B');
                    $table->printRow();             
                $table->endTable();
                if ($chk_forfor == 1) {
                   if (!empty($forfor) || !empty($forfor_details_query)) {                        
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                                                 
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                            if (!empty($forfor)) {  
                                // if ($countforforimage <= 0) {
                                //     $table->easyCell("FOREST FORMATION \n",'img:bmb_assets2/upload/ff_map_img/nophoto.jpg','w280, h250; font-style:bold;font-color:#FFF');
                                // }else{ 
                                    foreach ($forfor as $ff) {                    
                                        $table->easyCell("FOREST FORMATION \n",'img:bmb_assets2/upload/ff_map_img/'.(!empty($ff->ff_map_img)?$ff->ff_map_img:"nophoto.jpg").', w280, h250;font-style:bold;font-color:#FFF');  
                                    }
                                // }
                            }
                            $table->printRow();
                        $table->endTable();
                    
                        $table=new easyTable($pdf, '{130,60}', 'width:100; border-color:; font-size:12; border:0;');
                            $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                            $table->easyCell('FOREST FORMATION', 'align:C;font-size:12;colspan:2;font-style:B');
                        $table->printRow();        
                        $table->rowStyle('bgcolor:#009879;font-color:#ffffff'); 
                            $table->easyCell('Legend', 'align:C;font-size:12;font-style:B');
                            $table->easyCell('Area(has)', 'align:C;font-size:12;font-style:B');                       
                        $table->printRow();                         
                        foreach ($forfor_details_query as $ff_d) {  
                            $table->rowStyle('border:TLR;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '',$ff_d->ff_details),'align:L');
                                $table->easyCell(iconv("UTF-8", '',$ff_d->ff_area." has."),'align:R');
                            $table->printRow();             
                        }
                        
                        $forfor_SUM = $this->pamain_report->query_GT_forfor($gencode);
                        foreach ($forfor_SUM as $GTforfor) {
                            $table->rowStyle('border:TBLR;border-color:#ff8000;bgcolor:#F96167');
                                $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#FFF;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',number_format($GTforfor->forGT,3)." has."),'align:R;font-color:#FFF;font-style:B');
                            $table->printRow();
                        }                       
                    $table->endTable(5);
                    }
                // $pdf->AddPage('P','A4',0); 
                }
                if ($chk_vegetative == 1) {
                    ###########################################################
                    ##                                                       ##
                    ##                  Vegetative Cover                     ##
                    ##                                                       ##
                    ###########################################################
                    $vegetative = $this->pamain_report->query_vege($gencode);
                    $vegetative_details_query = $this->pamain_report->query_vege_details($gencode);
                    $vegetative_GT = $this->pamain_report->query_vege_GT($gencode);
                    $countvegetative = $this->pamain_report->query_count_vegetative($gencode); 
                    if (!empty($vegetative) || !empty($vegetative_details_query)) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                                if (!empty($vegetative)) {  
                                    if ($countvegetative <= 0) {
                                        $table->easyCell("VEGETATIVE COVER \n",'img:bmb_assets2/upload/vegetative_img/nophoto.jpg','w280, h250;font-style:bold;font-color:#FFF');
                                    }else{ 
                                        foreach ($vegetative as $vege) {                    
                                            $table->easyCell("VEGETATIVE COVER \n",'img:bmb_assets2/upload/vegetative_img/'.(!empty($vege->vegetative_img)?$vege->vegetative_img:"nophoto.jpg").', w280, h250;font-style:bold;font-color:#FFF');  
                                        }
                                    }
                                }
                            $table->printRow();
                        $table->endTable();
                        $i=0;
                        $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell('VEGETATIVE COVER', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#FFF');
                            $table->printRow();
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-style:B');
                                $table->easyCell(iconv("UTF-8", '','Legend'),'align:C;font-color:#FFF');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C;font-color:#FFF');
                            $table->printRow();
                            foreach ($vegetative_details_query as $vege_d) {    
                                $i++;
                                $table->rowStyle('border:TLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',$vege_d->landcover_class),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($vege_d->vegetative_area,2)." has."),'align:R');
                                $table->printRow();                    
                            }
                            foreach ($vegetative_GT as $gtveg) {
                                $gtveg = number_format($gtveg->GTvegetative,2);
                            }
                                $table->rowStyle('border:TBLR;border-color:#ff8000;bgcolor:#F96167');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$gtveg.' has.'),'align:R;font-color:#fff;font-style:B');
                                $table->printRow();
                        $table->endTable(5);
                    }                    
                    // $pdf->AddPage('P','A4',0);    
                }

                if ($chk_inwet == 1) {
                    $inland_wetland = $this->pamain_report->query_inlandwetland($gencode);
                    $inland_details_query = $this->pamain_report->query_iw_details($gencode);                    
                    if (!empty($inland_wetland) || !empty($inland_details_query)) {
                        $pdf->SetFont('Times','',12);                        
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            //     $table->easyCell('INLAND WETLAND', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                            // $table->printRow();    
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff;');
                                if (!empty($inland_wetland)) {  
                                    foreach ($inland_wetland as $iw) {                    
                                        $table->easyCell("INLAND WETLAND \n",'img:bmb_assets2/upload/iwmap/'.(!empty($iw->iw_img)?$iw->iw_img:"nophoto.jpg").', w280, h250;font-style:bold');  
                                    }
                                }
                            $table->printRow();
                        $table->endTable();

                        foreach ($inland_details_query as $data) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                    $table->easyCell($data->iw_name, 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                                $table->printRow();
                                $table->rowStyle('border:B;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff;');
                                    if (!empty($data->inland_map_img)) {
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/iwimg/'.$data->inland_map_img.', w280,h250;font-style:bold');                                
                                        // $table->easyCell('No map image','img:bmb_assets2/upload/iwimg/nophoto.jpg, w280,h300;font-style:I');
                                    }
                                    // else{
                                    // }
                                $table->printRow();
                            $table->endTable();
                            $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                // $table->rowStyle('border:;border-color:#a1a1a1;');
                                //     $table->easyCell(iconv("UTF-8", '','Wetland site name'),'align:L');
                                //     $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                //     $table->easyCell(iconv("UTF-8", '',$data->iw_name),'align:L');
                                // $table->printRow();
                                    $table->easyCell(iconv("UTF-8", '','Locations'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',$data->provinceName.", ".$data->municipalName),'align:L');
                                $table->printRow();
                                    $table->easyCell(iconv("UTF-8", '','Approximate area (has)'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',number_format($data->iw_area,2)." has."),'align:L');
                                $table->printRow();
                                    $table->easyCell(iconv("UTF-8", '','Wetland type'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',$data->wetland_desc),'align:L');
                                $table->printRow();
                                    $table->easyCell(iconv("UTF-8", '','Waterbody Classification'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',$data->id_waterClassDesc." (".$data->waterClass.")"),'align:L');
                                $table->printRow();
                                    $table->easyCell(iconv("UTF-8", '','Year assessed'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',$data->iw_year_assessed),'align:L');
                                $table->printRow();
                            if ($data->iw_longitude_dms_direction == 1) {
                                $long = "East";
                            }else if($data->iw_longitude_dms_direction == 2){
                                $long = "West";
                            }
                            
                            if ($data->iw_latitude_dms_direction == 1) {
                                $lat = "North";
                            }else if($data->iw_latitude_dms_direction == 2){
                                $lat = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Centroid for Geographic Location'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($long)?$long:"")." ".$data->iw_longitude_dms_degrees."° ".$data->iw_longitude_dms_minutes."' ".$data->iw_longitude_dms_seconds."''\n".(!empty($lat)?$lat:"")." ".$data->iw_latitude_dms_degrees."° ".$data->iw_latitude_dms_minutes."' ".$data->iw_latitude_dms_seconds."''"),'align:L');
                            $table->printRow();

                            if ($data->up_long_dms_direction == 1) {
                                $longup = "East";
                            }else if($data->up_long_dms_direction == 2){
                                $longup = "West";
                            }
                            
                            if ($data->up_lat_dms_direction == 1) {
                                $latup = "North";
                            }else if($data->up_lat_dms_direction == 2){
                                $latup = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Upstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longup)?$longup:"")." ".$data->up_long_dms_degrees."° ".$data->up_long_dms_minutes."' ".$data->up_long_dms_seconds."''\n".(!empty($latup)?$latup:"")." ".$data->up_lat_dms_degrees."° ".$data->up_lat_dms_minutes."' ".$data->up_lat_dms_seconds."''"),'align:L');
                            $table->printRow();

                            if ($data->mid_long_dms_direction == 1) {
                                $longmid = "East";
                            }else if($data->mid_long_dms_direction == 2){
                                $longmid = "West";
                            }
                            
                            if ($data->mid_lat_dms_direction == 1) {
                                $latmid = "North";
                            }else if($data->mid_lat_dms_direction == 2){
                                $latmid = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Midstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longmid)?$longmid:"")." ".$data->mid_long_dms_degrees."° ".$data->mid_long_dms_minutes."' ".$data->mid_long_dms_seconds."''\n".(!empty($latmid)?$latmid:"")." ".$data->mid_lat_dms_degrees."° ".$data->mid_lat_dms_minutes."' ".$data->mid_lat_dms_seconds."''"),'align:L');
                            $table->printRow();


                            if ($data->down_long_dms_direction == 1) {
                                $longdown = "East";
                            }else if($data->down_long_dms_direction == 2){
                                $longdown = "West";
                            }
                            
                            if ($data->down_lat_dms_direction == 1) {
                                $latdown = "North";
                            }else if($data->down_lat_dms_direction == 2){
                                $latdown = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Downstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longdown)?$longdown:"")." ".$data->down_long_dms_degrees."° ".$data->down_long_dms_minutes."' ".$data->down_long_dms_seconds."''\n".(!empty($latdown)?$latdown:"")." ".$data->down_lat_dms_degrees."° ".$data->down_lat_dms_minutes."' ".$data->down_lat_dms_seconds."''"),'align:L');
                            $table->printRow();                           

                            $table->endTable(5);   
                        }
                    } 

                    $human_wetland = $this->pamain_report->query_humaninlandwetland($gencode);
                    $human_details_query = $this->pamain_report->query_humaniw_details($gencode);

                    if (!empty($human_wetland) || !empty($human_details_query)) {
                        // $pdf->AddPage('P','A4',0);
                        foreach ($human_wetland as $hiw) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff;'); 
                        // $table->easyCell('HUMAN-MADE WETLAND', 'align:C;font-size:12;font-style:B');
                        // $table->printRow();
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff;');
                        $table->easyCell("HUMAN-MADE WETLAND \n",'img:bmb_assets2/upload/iwhumanmade_map/'.$hiw->hiw_img.', w280,h250;align:C;font-size:12;font-style:B');  
                        $table->printRow();
                        $table->endTable();
                        }  

                        foreach ($human_details_query as $datah) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            //     $table->easyCell($datah->hiw_name, 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                            // $table->printRow();
                            $table->rowStyle('border:B;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff;');
                            if (empty($datah->hinland_map_img)) {
                                $table->easyCell($datah->hiw_name."\n",'img:bmb_assets2/upload/iwhumanmade_img/nophoto.jpg, w280,h250;font-style:bold');
                            }else{
                                $table->easyCell($datah->hiw_name."\n",'img:bmb_assets2/upload/iwhumanmade_img/'.$datah->hinland_map_img.', w280,h250;font-style:bold');                                
                            }
                            $table->printRow();
                            $table->endTable();

                            $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            // $table->rowStyle('border:;border-color:#a1a1a1;');
                            // $table->easyCell(iconv("UTF-8", '','Wetland site name'),'align:L');
                            // $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            // $table->easyCell(iconv("UTF-8", '',$datah->hiw_name),'align:L');
                            // $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','Locations'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',$datah->provinceName.", ".$datah->municipalName),'align:L');
                            $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','Approximate area (has)'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',number_format($datah->hiw_area,2)." has."),'align:L');
                            $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','Wetland type'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',$datah->wetland_desc),'align:L');
                            $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','Waterbody Classification'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',$datah->id_waterClassDesc." (".$datah->waterClass.")"),'align:L');
                            $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','Year assessed'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',$datah->hiw_year_assessed),'align:L');
                            $table->printRow();  
                            if ($datah->hiw_longitude_dms_direction == 1) {
                                $longh = "East";
                            }else if($datah->hiw_longitude_dms_direction == 2){
                                $longh = "West";
                            }
                            
                            if ($datah->hiw_latitude_dms_direction == 1) {
                                $lath = "North";
                            }else if($datah->hiw_latitude_dms_direction == 2){
                                $lath = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Centroid for Geographic Location'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longh)?$longh:"")." ".$datah->hiw_longitude_dms_degrees."° ".$datah->hiw_longitude_dms_minutes."' ".$datah->hiw_longitude_dms_seconds."''\n".(!empty($lath)?$lath:"")." ".$datah->hiw_latitude_dms_degrees."° ".$datah->hiw_latitude_dms_minutes."' ".$datah->hiw_latitude_dms_seconds."''"),'align:L');
                            $table->printRow();

                            if ($datah->hup_long_dms_direction == 1) {
                                $longhup = "East";
                            }else if($datah->hup_long_dms_direction == 2){
                                $longhup = "West";
                            }
                            
                            if ($datah->hup_lat_dms_direction == 1) {
                                $lathup = "North";
                            }else if($datah->hup_lat_dms_direction == 2){
                                $lathup = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Upstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longhup)?$longhup:"")." ".$datah->hup_long_dms_degrees."° ".$datah->hup_long_dms_minutes."' ".$datah->hup_long_dms_seconds."''\n".(!empty($lathup)?$lathup:"")." ".$datah->hup_lat_dms_degrees."° ".$datah->hup_lat_dms_minutes."' ".$datah->hup_lat_dms_seconds."''"),'align:L');
                            $table->printRow();

                             if ($datah->hmid_long_dms_direction == 1) {
                                $longhmid = "East";
                            }else if($datah->hmid_long_dms_direction == 2){
                                $longhmid = "West";
                            }
                            
                            if ($datah->hmid_lat_dms_direction == 1) {
                                $lathmid = "North";
                            }else if($datah->hmid_lat_dms_direction == 2){
                                $lathmid = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Midstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longhmid)?$longhmid:"")." ".$datah->hmid_long_dms_degrees."° ".$datah->hmid_long_dms_minutes."' ".$datah->hmid_long_dms_seconds."''\n".(!empty($lathmid)?$lathmid:"")." ".$datah->hmid_lat_dms_degrees."° ".$datah->hmid_lat_dms_minutes."' ".$datah->hmid_lat_dms_seconds."''"),'align:L');
                            $table->printRow();


                            if ($datah->hdown_long_dms_direction == 1) {
                                $longhdown = "East";
                            }else if($datah->hdown_long_dms_direction == 2){
                                $longhdown = "West";
                            }
                            
                            if ($datah->hdown_lat_dms_direction == 1) {
                                $lathdown = "North";
                            }else if($datah->hdown_lat_dms_direction == 2){
                                $lathdown = "South";
                            }
                            $table->easyCell(iconv("UTF-8", '','Downstream Coordinates'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',(!empty($longhdown)?$longhdown:"")." ".$datah->hdown_long_dms_degrees."° ".$datah->hdown_long_dms_minutes."' ".$datah->hdown_long_dms_seconds."''\n".(!empty($lathdown)?$lathdown:"")." ".$datah->hdown_lat_dms_degrees."° ".$datah->hdown_lat_dms_minutes."' ".$datah->hdown_lat_dms_seconds."''"),'align:L');
                            $table->printRow();

                         
                            $table->endTable(5);   
                            
                        }     
                    }
                    $pdf->AddPage('P','A4',0);    
                }
                if ($chk_caves == 1) {
                    if (!empty($caves) || !empty($cave_details_query)) {                        
                        foreach ($caves as $cavem) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                //     $table->easyCell('CAVES', 'align:C;font-size:12;font-style:B;font-color:#fff');
                                // $table->printRow();
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                // if (empty($cavem->cavemap_img)) {
                                //     $table->easyCell("CAVES \n",'img:bmb_assets2/upload/cavemap_img/nophoto.jpg, w280,h250;font-style:bold');
                                // }else{
                                    $table->easyCell("CAVES \n",'img:bmb_assets2/upload/cavemap_img/'.(!empty($cavem->cavemap_img)?$cavem->cavemap_img:"nophoto.jpg").', w280,h250;font-style:bold');                                
                                // }
                                $table->printRow();
                            $table->endTable();
                        } 

                        foreach ($cave_details_query as $cave) {  
                        $pdf->SetFont('Times','',12);
                        $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell($cave->caves_name, 'align:C;font-size:12;colspan:3;font-style:B;font-color:#fff;');
                            $table->printRow();
                            // $table->rowStyle('border:T;border-color:#a1a1a1;');
                            //     $table->easyCell(iconv("UTF-8", '','Name of Cave'),'align:L');
                            //     $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            //     $table->easyCell(iconv("UTF-8", '',$cave->caves_name),'align:L');
                            // $table->printRow();
                                $table->easyCell(iconv("UTF-8", '','Size of the area (Surveyed length)'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',number_format($cave->caves_area,2)." meter(s)"),'align:L');
                            $table->printRow();
                                $table->easyCell(iconv("UTF-8", '','Location'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',$cave->provinceName.", ".$cave->municipalName),'align:L');
                            $table->printRow();
                                $table->easyCell(iconv("UTF-8", '','Status'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',$cave->cave_status_desc),'align:L');
                            $table->printRow();
                            if ($cave->cave_longitude_dms_direction == 1) {
                                $long = "East";
                            }else if($cave->cave_longitude_dms_direction == 2){
                                $long = "West";
                            }
                            
                            if ($cave->cave_latitude_dms_direction == 1) {
                                $lat = "North";
                            }else if($cave->cave_latitude_dms_direction == 2){
                                $lat = "South";
                            }
                                $table->easyCell(iconv("UTF-8", '','Coordinates (point location)'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',(!empty($long)?$long:"")." ".$cave->cave_longitude_dms_degrees."° ".$cave->cave_longitude_dms_minutes."' ".$cave->cave_longitude_dms_seconds."''\n".(!empty($lat)?$lat:"")." ".$cave->cave_latitude_dms_degrees."° ".$cave->cave_latitude_dms_minutes."' ".$cave->cave_latitude_dms_seconds."''"),'align:L');
                            $table->printRow();
                            $table->rowStyle('border:B;border-color:#a1a1a1;');                            
                                $table->easyCell(iconv("UTF-8", '','Classification'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',$cave->class_no." (".$cave->sub_class_desc.")"),'align:L');
                            $table->printRow();                            
                        $table->endTable(5);   
                        }                    
                    }
                    // $pdf->AddPage('P','A4',0);  
                }
                $coralreef = $this->pamain_report->query_coastal($gencode);
                $coralreef_details_query = $this->pamain_report->query_coral_details($gencode);
                $coralreefspecies_details_query = $this->pamain_report->query_coralspecies_details($gencode);
                $coral_sum = $this->pamain_report->query_coral_SUM($gencode);

                $seagrass = $this->pamain_report->query_seagrass($gencode);
                $seagrass_details_query = $this->pamain_report->query_seagrass_details($gencode);
                $seagrassspecies_details_query = $this->pamain_report->query_seagrasspecies_details($gencode);
                $seagrass_sum = $this->pamain_report->query_seagrass_SUM($gencode);

                $mangrove = $this->pamain_report->query_mangrove($gencode);
                $mangrove_details_query = $this->pamain_report->query_mangrove_details($gencode);
                $mangrovespecies_details_query = $this->pamain_report->query_mangrovepecies_details($gencode);
                $mangrove_sum = $this->pamain_report->query_mangrove_SUM($gencode);

                if ($chk_coral == 1) {                
                    if (!empty($coralreef) || !empty($coralreef_details_query) || !empty($coralreefspecies_details_query)){  
                        // $pdf->AddPage('P','A4',0); 
                        $pdf->SetFont('Times','',12);
                        foreach ($coralreef as $coral) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                        // $table->easyCell('CORAL REEFS', 'align:C;font-size:12;font-style:B;font-color:#fff');
                        // $table->printRow();
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        // $table->easyCell('','img:bmb_assets2/upload/coralreef_map_img/'.$coral->coralreefmap.', w80,h60;');
                        // if (empty($coral->coralreefmap)) {
                        //     $table->easyCell("CORAL REEFS \n",'img:bmb_assets2/upload/coralreef_map_img/nophoto.jpg, w280,h250;font-style:B');
                        // }else{
                            $table->easyCell("CORAL REEFS \n",'img:bmb_assets2/upload/coralreef_map_img/'.(!empty($coral->coralreefmap)?$coral->coralreefmap:"nophoto.jpg").', w280,h250;font-style:B');                                
                        // } 
                        $table->printRow();
                    $table->endTable();     
                        }           

                    $table=new easyTable($pdf, '{100,90}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            $table->easyCell('Coral Reefs Information', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '','Coral reef details'),'align:C');
                        $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                        $table->printRow();
                        
                    foreach ($coralreef_details_query as $coral) { 
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"HCC value (%) : ".$coral->hcc_value."%\nHCC Category : ".$coral->hcc."(".$coral->hcc_condition.")"."\nNo. of TAUs (%) : ".$coral->taus_value."% \nDiversity Category : ".$coral->taus_categorys."(".$coral->taus_values.")\nDate conducted : ".$coral->month." ".$coral->year),'align:L');
                        $table->easyCell(iconv("UTF-8", '',number_format($coral->coral_has,2)." has."),'align:R');                    
                        $table->printRow();
                    }  
                    foreach ($coral_sum as $sum) { 
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167');
                        $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($sum->coral_sum_area,2)." has."),'align:R;font-color:#fff;font-style:B');                    
                        $table->printRow();
                    }                    
                    $table->endTable(5);

                    // $j=0;
                    // $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    // $table->easyCell(iconv("UTF-8", '','Dominant Species'),'align:C');
                    // $table->printRow();

                    // foreach ($coralreefspecies_details_query as $coralspecies) {  

                    // $j++;  
                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');                     
                    // $table->easyCell(iconv("UTF-8", '',$j.") ".$coralspecies->coral_species_name),'font-style:italic');
                    // $table->printRow();
                    // }         
                    // $table->endTable(5);
                    }
                    // $pdf->AddPage('P','A4',0);  
                }
                if ($chk_seagrass == 1) {
                    if (!empty($seagrass) || !empty($seagrass_details_query) || !empty($seagrassspecies_details_query)){                        
                        if (!empty($seagrass)) {
                            $pdf->SetFont('Times','',12);
                            foreach ($seagrass as $seg) {
                                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                                    //     $table->easyCell('SEAGRASS BEDS', 'align:C;font-size:12;font-style:B');
                                    // $table->printRow();
                                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                    // if (empty($seg->seagrass_map)) {
                                    //     $table->easyCell("SEAGRASS BEDS \n",'img:bmb_assets2/upload/seagrass_map/nophoto.jpg, w280,h250;font-style:B');
                                    // }else{
                                        $table->easyCell("SEAGRASS BEDS \n",'img:bmb_assets2/upload/seagrass_map/'.(!empty($seg->seagrass_map)?$seg->seagrass_map:"nophoto.jpg").', w280,h250;font-style:B');                                
                                    // } 
                                    $table->printRow();
                                $table->endTable();     
                            }
                        }
                        $table=new easyTable($pdf, '{100,90}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell('Seagrass Beds Information', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell(iconv("UTF-8", '','Seagrass beds details'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                            $table->printRow();
                        
                            foreach ($seagrass_details_query as $seagrass) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',"Percent cover(%) : ".$seagrass->seagrass_cover_value."Category : ".$seagrass->seagrass_condition."(".$seagrass->seagrass_coverage.")\Diversity Index : ".$seagrass->diversity_value."\nDate conducted : ".$seagrass->month." ".$seagrass->year),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($seagrass->seagrass_area,2)." has."),'align:R');                    
                                $table->printRow();
                            }  
                            foreach ($seagrass_sum as $sum) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',number_format($sum->seagrass_sum_area,2)." has."),'align:R;font-color:#fff;font-style:B');                    
                                $table->printRow();
                            }                    
                        $table->endTable(5);

                        $j=0;
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell(iconv("UTF-8", '','Dominant Species'),'align:C');
                            $table->printRow();

                            foreach ($seagrassspecies_details_query as $seagrass_species) {  
                                $j++;  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');                     
                                    $table->easyCell(iconv("UTF-8", '',$j.") ".$seagrass_species->seagrassName),'font-style:italic');
                                $table->printRow();
                            }         
                        $table->endTable(5);                       
                    }
                    // $pdf->AddPage('P','A4',0);
                }
                if ($chk_mangrove == 1) {                          
                    if (!empty($mangrove) || !empty($mangrove_details_query) || !empty($mangrovespecies_details_query)){ 
                        $pdf->SetFont('Times','',12);
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                            //     $table->easyCell('MANGROVE FORESTS', 'align:C;font-size:12;font-style:B');
                            // $table->printRow();
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                foreach ($mangrove as $mangrov) {
                                    // if (empty($mangrov->mangrove_map)) {
                                    //     $table->easyCell("MANGROVE FORESTS \n",'img:bmb_assets2/upload/mangrove_map/nophoto.jpg, w280,h250;font-style:B');
                                    // }else{
                                        $table->easyCell("MANGROVE FORESTS \n",'img:bmb_assets2/upload/mangrove_map/'.(!empty($mangrov->mangrove_map)?$mangrov->mangrove_map:"nophoto.jpg").', w280,h250;font-style:B');                                
                                    // } 
                                } 
                            $table->printRow();
                        $table->endTable();   

                        $table=new easyTable($pdf, '{130,60}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell('Mangrove Forests Information', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell(iconv("UTF-8", '','Mangrove Forest details'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                            $table->printRow();                        
                            foreach ($mangrove_details_query as $mangroves) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($mangroves->mangrove_condition)?"<b>Crown Cover : </b>".$mangroves->mangrove_criteria:"")."\n".(!empty($mangroves->crown_cover)?"<b>Value : </b>".number_format($mangroves->crown_cover,2)."\n":"").(!empty($mangroves->regen_cat)?"\n<b>Regeneration per m2 : </b>".$mangroves->regen_category."(".$mangroves->regen_value.")":"")."\n<b>Value : </b>".number_format($mangroves->regeneration,2)."\n".(!empty($mangroves->height_cat)?"\n<b>Average Height : </b>".$mangroves->average_height_category."(".$mangroves->average_height_value.")":"").(!empty($mangroves->avg_height)?"\n<b>Value : </b>".number_format($mangroves->avg_height,2)."\n":"").(!empty($mangroves->observe_cat)?"\n<b>Observation : </b>".$mangroves->observation_category:"").(!empty($mangroves->observation)?"\n<b>Value : </b>".$mangroves->observation."\n":"").(!empty($mangroves->divert_cat)?"\n<b>Diversity : </b>".$mangroves->mangrove_conditions."(".$mangroves->mangrove_criteria.")":"").(!empty($mangroves->mangrove_diversity)?"\n<b>Value : </b>".$mangroves->mangrove_diversity."\n":"")
                                ),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($mangroves->mangrove_area,2)." has."),'align:R');                    
                                $table->printRow();
                            } 
                            foreach ($mangrove_sum as $sum) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167;');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',number_format($sum->mangrove_sum_area,2)." has."),'align:R;font-color:#fff;font-style:B');                    
                                $table->printRow();
                            }                    
                        $table->endTable(5); 
                        $j=0;
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell(iconv("UTF-8", '','Dominant Species'),'align:C');
                            $table->printRow();
                            foreach ($mangrovespecies_details_query as $mangrovespecies) { 
                                $j++;  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');                     
                                    $table->easyCell(iconv("UTF-8", '',$j.") ".$mangrovespecies->mangrove_name."<i> (".$mangrovespecies->mangrove_scientific_name.")</i>"));
                                $table->printRow();
                            }         
                        $table->endTable(5);   
                    }
                }

                $fishspecies_details_query = $this->pamain_report->query_fishpecies_details($gencode);
                if ($chk_mangrove == 1) {
                    if (!empty($mangrovespecies_details_query)){ 
                        $table=new easyTable($pdf, '{80,110}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell('Fish Species', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff;');
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell(iconv("UTF-8", '','Fish'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Details'),'align:C');                                
                            $table->printRow(); 
                            foreach ($fishspecies_details_query as $fish) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1');
                                    $table->easyCell(iconv("UTF-8", '',"<i>".$fish->fish_scientific_name."</i>\nFamily : ".$fish->fish_family."\nGroup : ".$fish->fish_group."\nTropic Group :".$fish->fish_tropic_group),'align:L;font-color:#000;');
                                    $table->easyCell(iconv("UTF-8", '',"Diversity (# of species/1000m2) : ".$fish->fish_diversity_value."(".$fish->fish_diverity_values.")\nFish Density (# of individual/1000m2) : ".$fish->density_value."(".$fish->fish_density_value.")\nFish Biomass (MT/kg) : ".$fish->biomass_value."(".$fish->fish_categorys." ".$fish->fish_biomass.")"),'align:L;');                    
                                $table->printRow();
                            }  
                        $table->endTable(5); 
                    }
                }
            }
        }

        ###########################################################
        ##                                                       ##
        ##                   BIOLOGICAL FEATURES                 ##
        ##                                                       ##
        ###########################################################

        $countbiological = $this->pamain_report->query_pambbiological_count($gencode);
        $countbiologicalflora = $this->pamain_report->query_pambbiologicalflora_count($gencode);
        $biological = $this->pamain_report->query_pambbiological($gencode);
        $CRCountFauna = $this->pamain_report->queryCountCRFuana($gencode);        
        $CRCountFlora = $this->pamain_report->queryCountCRFlora($gencode);        
        $CRFAUNA = $this->pamain_report->queryFaunaLimitCR($gencode,$noofdisplaybio);
        $CRFLORA = $this->pamain_report->queryFloraLimitCR($gencode,$noofdisplaybio);
            $pdf->SetFont('Times','',12); 
            $chk_cr = $this->input->post('chk-bcr');         
            $chk_en = $this->input->post('chk-ben');
            $chk_vu = $this->input->post('chk-vu');
            $chk_ew = $this->input->post('chk-ew');
            $chk_ex = $this->input->post('chk-ex');
            $chk_lc = $this->input->post('chk-lc');
            $chk_dd = $this->input->post('chk-bdd');
            $chk_nt = $this->input->post('chk-nt');
            $chk_ne = $this->input->post('chk-ne');
            $chk_ots = $this->input->post('chk-ots');
            $chk_iucn = $this->input->post('chk-iucn');
        if ($chk_en == 1 || $chk_vu==1 || $chk_ew==1 || $chk_ex==1 || $chk_lc==1 || $chk_dd==1 || $chk_nt==1 || $chk_ne==1 || $chk_ots==1 || $chk_iucn==1 || !empty($CRCountFauna) || !empty($CRCountFlora) || !empty($CRFAUNA) || !empty($CRFLORA)) {
            // $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                    $table->easyCell('FLORA AND FAUNA', 'align:C;font-size:18;font-style:B;font-color:#fff');
                $table->printRow();             
            $table->endTable();
            
            if ($chk_cr==1) {
                if (!empty($CRCountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                        $table->easyCell('Critical Endangered Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($CRFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }
                if (!empty($CRCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                        $table->easyCell('Critical Endangered Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($CRFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                    // $table=new easyTable($pdf, '{70,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                    //     $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                    //     $table->easyCell('Critical Endangered', 'align:L;font-size:12;colspan:2;font-style:B');
                    //     $table->printRow();
                    //     foreach ($CRFAUNA as $row) {
                    //         if ($row->image == "") {
                    //             $table->easyCell('','img:bmb_assets2/upload/wildlife_img/nophoto.jpg');
                    //         } else {
                    //             $table->easyCell('','img:bmb_assets2/upload/wildlife_img/'.$row->image.', w80,h60;');
                    //         }
                    //         $table->easyCell(iconv("UTF-8", '',"Common name : ".$row->commonNameSpecies."\nScientific name : <i>".$row->scientificName_genus."\n</i> Order : ".$row->OrderDesc."\nClass : ".$row->ClassDesc."\nResidency status : ".$row->residency_desc."\nKnown Habitats/Ecosystem : ".(($row->chk_forest==1)?"Forest/":" ").(($row->chk_inland==1)?"Inland Wetland/":" ").(($row->chk_cave==1)?"Cave/":" ").(($row->chk_coral==1)?"Coral Reef/":" ").(($row->chk_seagrass==1)?"Seagrasses/":" ").(($row->chk_mangrove==1)?"Mangrove/":" ")),'align:L');     
                    //         $table->printRow();
                    //     }
                    // $table->endTable(10);

                }
            }        

            $ENFaunaCount = $this->pamain_report->queryCountEN($gencode);
            $ENFloraCount = $this->pamain_report->queryCountENFlora($gencode);
            $ENFAUNA = $this->pamain_report->queryFaunaLimitEN($gencode,$noofdisplaybio);
            $ENFLORA = $this->pamain_report->queryFloraLimitEN($gencode,$noofdisplaybio);
            if ($chk_en==1) {
                if (!empty($ENFaunaCount)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                        $table->easyCell('Endangered Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($ENFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }
                if (!empty($ENFloraCount)) {            
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                        $table->easyCell('Endangered Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($ENFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                   
                }
            }

            $VUCountFAUNA = $this->pamain_report->queryCountVUFAUNA($gencode);
            $VUCountFLORA = $this->pamain_report->queryCountVUFLORA($gencode);
            $VUFAUNA = $this->pamain_report->queryFaunaLimitVUFAUNA($gencode,$noofdisplaybio);
            $VUFLORA = $this->pamain_report->queryFaunaLimitVUFLORA($gencode,$noofdisplaybio);
            if ($chk_vu==1) {
                if (!empty($VUCountFAUNA)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffc34d;font-color:#ffffff'); 
                        $table->easyCell('Vulnerable Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($VUFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();               
                }

                if (!empty($VUCountFLORA)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffc34d;font-color:#ffffff'); 
                        $table->easyCell('Vulnerable Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($VUFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);               
                }
            }

            $EWCountFauna = $this->pamain_report->queryCountEWFauna($gencode);
            $EWCountFlora = $this->pamain_report->queryCountEWFlora($gencode);
            $EWFAUNA = $this->pamain_report->queryFaunaLimitEW($gencode,$noofdisplaybio);
            $EWFLORA = $this->pamain_report->queryFloraLimitEW($gencode,$noofdisplaybio);
            if ($chk_ew==1) {
                if (!empty($EWCountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                        $table->easyCell('Extinct in the Wild Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($EWFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }

                if (!empty($EWCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                        $table->easyCell('Extinct in the Wild Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($EWFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                }
            }


            $EXCountFauna = $this->pamain_report->queryCountEXFuana($gencode);
            $EXCountFlora = $this->pamain_report->queryCountEXFlora($gencode);
            $EXFAUNA = $this->pamain_report->queryFaunaLimitEX($gencode,$noofdisplaybio);
            $EXFLORA = $this->pamain_report->queryFloraLimitEX($gencode,$noofdisplaybio);
            if ($chk_ex==1) {
                if (!empty($EXCountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                        $table->easyCell('Extinct Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($EXFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }

                if (!empty($EXCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                        $table->easyCell('Extinct Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($EXFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                }
            }

            $LCCountFuana = $this->pamain_report->queryCountLCFauna($gencode);
            $LCCountFlora = $this->pamain_report->queryCountLCFlora($gencode);
            $LCFAUNA = $this->pamain_report->queryFaunaLimitLC($gencode,$noofdisplaybio);
            $LCFLORA = $this->pamain_report->queryFloraLimitLC($gencode,$noofdisplaybio);
            if ($chk_lc==1) {
                if (!empty($LCCountFuana)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009900;font-color:#ffffff'); 
                        $table->easyCell('Least Concern Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($LCFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();               
                }

                if (!empty($LCCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009900;font-color:#ffffff'); 
                        $table->easyCell('Least Concern Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($LCFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);               
                }
            }

            $DDCountFuana = $this->pamain_report->queryCountDDFauna($gencode);
            $DDCountFlora = $this->pamain_report->queryCountDDFlora($gencode);
            $DDFAUNA = $this->pamain_report->queryFaunaLimitDD($gencode,$noofdisplaybio);
            $DDFLORA = $this->pamain_report->queryFloraLimitDD($gencode,$noofdisplaybio);
            if ($chk_dd==1) {
                if (!empty($DDCountFuana)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#808080;font-color:#ffffff'); 
                        $table->easyCell('Data Defecient Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($DDFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }

                if (!empty($DDCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#808080;font-color:#ffffff'); 
                        $table->easyCell('Data Defecient Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($DDFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                }
            }

            $NTCountFauna = $this->pamain_report->queryCountNTFauna($gencode);
            $NTCountFlora = $this->pamain_report->queryCountNTFlora($gencode);
            $NTFAUNA = $this->pamain_report->queryFaunaLimitNT($gencode,$noofdisplaybio);
            $NTFLORA = $this->pamain_report->queryFloraLimitNT($gencode,$noofdisplaybio);
            if ($chk_nt==1) {
                if (!empty($NTCountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#99cc00;font-color:#000'); 
                        $table->easyCell('Not Threatened Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($NTFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();               
                }

                if (!empty($NTCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#99cc00;font-color:#000'); 
                        $table->easyCell('Not Threatened Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($NTFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);               
                }
            }


            $NECountFauna = $this->pamain_report->queryCountNEFauna($gencode);
            $NECountFlora = $this->pamain_report->queryCountNEFlora($gencode);
            $NEFAUNA = $this->pamain_report->queryFaunaLimitNE($gencode,$noofdisplaybio);
            $NEFLORA = $this->pamain_report->queryFloraLimitNE($gencode,$noofdisplaybio);
            if ($chk_ne==1) {
                if (!empty($NECountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                        $table->easyCell('Not Evaluated Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($NEFAUNA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();                
                }

                if (!empty($NECountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                        $table->easyCell('Not Evaluated Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($NEFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);                
                }
            }
            
            $OTSCountFauna = $this->pamain_report->queryCountOTSFauna($gencode);
            $OTSCountFlora = $this->pamain_report->queryCountOTSFlora($gencode);
            $OTSFUANA = $this->pamain_report->queryFaunaLimitOTS($gencode,$noofdisplaybio);        
            $OTSFLORA = $this->pamain_report->queryFloraLimitOTS($gencode,$noofdisplaybio);        
            if ($chk_ots==1) {
                if (!empty($OTSCountFauna)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                        $table->easyCell('Other Threatened Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($OTSFUANA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable();
                }

                if (!empty($OTSCountFlora)) {
                    $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                        $table->easyCell('Other Threatened Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                        $table->printRow();
                        $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                        $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                        $table->printRow();
                        foreach ($OTSFLORA as $row) {                       
                            $table->rowStyle('border:TBLR;border-color:#009879;bgcolor:#fff;font-color:#000'); 
                            $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                            $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                            $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                            $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                            $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                            $table->printRow();
                        }                  
                    $table->endTable(10);
                }
            }
        }
        ###########################################################
        ##                                                       ##
        ##                   Physical Features                   ##
        ##                                                       ##
        ###########################################################
    $chk_elevation = $this->input->post('chk-elevation');
    $chk_physicalfeat = $this->input->post('chk-phyfeat');
        ###########################################################
        ##                                                       ##
        ##                   TOPO AND SLOPE                      ##
        ##                                                       ##
        ###########################################################   
        $slope_query = $this->pamain_report->query_slope($gencode);
        $countslope = $this->pamain_report->query_count_slope($gencode);
        $query_count_slopeImage = $this->pamain_report->query_count_slopeImage($gencode);
        $slope_details_query = $this->pamain_report->query_slope_details($gencode);
        $chk_topo = $this->input->post('chk-toposlope');
        $chk_geology = $this->input->post('chk-geology');
        $chk_soil = $this->input->post('chk-soil');
        $chk_climate = $this->input->post('chk-climate');
        $chk_hydrology = $this->input->post('chk-hydrology');
        $chk_exlanduse = $this->input->post('chk-existinglanduse');
        $chk_landslide = $this->input->post('chk-landslide');
        $chk_flooding = $this->input->post('chk-flooding');
        $chk_elevation = $this->input->post('chk-elevation');
        $chk_slr = $this->input->post('chk-slr');
        $chk_otherhazard = $this->input->post('chk-othegeohazard');
    if ($chk_physicalfeat == 1 || $chk_topo==1 || $chk_elevation==1 || $chk_geology==1 || $chk_soil==1 || $chk_climate==1 || $chk_hydrology==1 || $chk_exlanduse==1 || $chk_landslide==1 || $chk_flooding==1 || $chk_slr==1 || $chk_otherhazard==1) {
            $i=0;
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;'); 
                    $table->easyCell('PHYSICAL FEATURES', 'align:L;font-size:18;font-style:B;');
                $table->printRow();             
            $table->endTable();
        if ($chk_topo == 1 || $chk_elevation==1) {    
            // if (!empty($slope_details_query)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                        $table->easyCell('TOPOGRAPHY AND SLOPE', 'align:C;font-size:12;font-style:B');
                    $table->printRow();             
                $table->endTable();
                if ($chk_elevation==1) {
                    $pdf->SetFont('Times','',12);   
                    $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Highest Elevation </s> '."\n".number_format($main->elevation_highest,2)." meter(s)"));
                            $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Lowest Elevation </s> '."\n".number_format($main->elevation_lowest,2)." meter(s)"));
                        $table->printRow();
                    $table->endTable();
                }
            }

        if ($chk_topo == 1) {           
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                // if ($query_count_slopeImage <= 0) {
                //     $table->easyCell('No map image show','img:bmb_assets2/upload/topology_img/nophoto.jpg','w280,h290;font-style:italic');
                // } else {
                    foreach ($slope_query as $slope) {
                        $table->easyCell('Map image shows','img:bmb_assets2/upload/topology_img/'.(!empty($slope->topo_map)?$slope->topo_map:"nophoto.jpg").', w280,h290;font-style:italic');
                    }
                // }
                // $table->easyCell('','img:bmb_assets2/upload/topology_img/nophoto.jpg');
                $table->printRow();
                    
            $table->endTable();

            // $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table=new easyTable($pdf, '{190}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#fff');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                $table->easyCell('Map description', 'align:C;font-size:12;font-style:B;');
                $table->printRow();
            foreach ($slope_details_query as $slope_d) {  
                $i++;
                $table->rowStyle('border:TB;border-color:#a1a1a1;');
                $table->easyCell(iconv("UTF-8", '',$i.") ".$slope_d->topology_desc ),'align:L');
                $table->printRow();
                
            }
            $table->endTable(10);
                // $pdf->AddPage('P','A4',0);            
        }

        if ($chk_soil == 1) {
            ###########################################################
            ##                                                       ##
            ##                       Geology                         ##
            ##                                                       ##
            ###########################################################

            $rock_query = $this->pamain_report->query_rock($gencode);
            $countrock = $this->pamain_report->query_count_rock($gencode);
            $rock_details_query = $this->pamain_report->query_rock_details($gencode);
            if (!empty($rock_details_query) || !empty($rock_query)) {
                // $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                    
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($rock_details_query)) {      
                        // if ($countrock <= 0) {
                        // $table->easyCell("ROCK FORMATION \n",'img:bmb_assets2/upload/rock_img/nophoto.jpg','w280,h250;font-style:B');
                        // } else {
                            foreach ($rock_query as $rock) {
                                $table->easyCell("ROCK FORMATION \n",'img:bmb_assets2/upload/rock_img/'.(!empty($rock->rock_img)?$rock->rock_img:"nophoto.jpg").', w280,h250;font-style:B');
                            }
                        // }
                    }
                    $table->printRow();         
                $table->endTable();               
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell('Map description', 'align:C;font-size:12;font-style:B;');
                    $table->printRow();
                    foreach ($rock_details_query as $rockd) {
                        $i++;
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$i.") ".$rockd->rock_details ),'align:L');   
                        $table->printRow();
                    }
                $table->endTable(5);
            }
            // $pdf->AddPage('P','A4',0);            
        }

        if ($chk_geology == 1) {
            ###########################################################
            ##                                                       ##
            ##                           Soil                        ##
            ##                                                       ##
            ###########################################################
            $soil_query = $this->pamain_report->query_soil($gencode);
            $countsoil = $this->pamain_report->query_count_soil($gencode);
            $soil_details_query = $this->pamain_report->query_soil_details($gencode);
            if (!empty($soil_details_query) || !empty($soil_query)) {   
            // $pdf->AddPage('P','A4',0);                             
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('SOIL TYPE', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($soil_details_query)) {
                        // if ($countsoil <= 0) {
                        //     $table->easyCell("SOIL TYPE \n",'img:bmb_assets2/upload/soil_img/nophoto.jpg','w280,h250;font-style:B');
                        // } else {
                            foreach ($soil_query as $soil) {
                                $table->easyCell("SOIL TYPE \n",'img:bmb_assets2/upload/soil_img/'.(!empty($soil->geology_map)?$soil->geology_map:"nophoto.jpg").', w280,h250;font-style:B');
                            }
                        // }
                    }
                    $table->printRow();                
                $table->endTable();
                
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell('Map description', 'align:C;font-size:12;font-style:B;');
                    $table->printRow();              
                    foreach ($soil_details_query as $soil_d) { 
                        $i++;
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$i.") ".$soil_d->geology_desc ),'align:L');  
                        $table->printRow();
                        
                    }
                $table->endTable(5);
            }
                // $pdf->AddPage('P','A4',0);
        } 

        if ($chk_climate == 1) {
            ###########################################################
            ##                                                       ##
            ##                   Climate type                        ##
            ##                                                       ##
            ###########################################################
            $climate_query = $this->pamain_report->query_climate($gencode);
            $countclimate = $this->pamain_report->query_count_climate($gencode);
            $climate_details_query = $this->pamain_report->query_climate_details($gencode);
            if (!empty($climate_details_query) || !empty($climate_query)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        if (!empty($climate_details_query)) {
                            // if ($countclimate <= 0) {
                            // $table->easyCell("CLIMATE TYPE \n",'img:bmb_assets2/upload/climate_img/nophoto.jpg','w280,h250;font-style:B');
                            // } else {
                                foreach ($climate_query as $climate) {
                                    $table->easyCell("CLIMATE TYPE \n",'img:bmb_assets2/upload/climate_img/'.(!empty($climate->climate_img)?$climate->climate_img:"nophoto.jpg").', w280,h250;font-style:B');
                                }
                            // }
                        }
                    $table->printRow();                
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{50,140}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '',"Climate type"),'align:C');    
                        $table->easyCell(iconv("UTF-8", '',"Remarks"),'align:C');    
                    $table->printRow();
                    foreach ($climate_details_query as $climate) { 
                        $i++;
                        $table->rowStyle('border:LRB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$climate->climates_type),'align:L');
                            $table->easyCell(iconv("UTF-8", '',$climate->climate_desc ),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);
            }
                // $pdf->AddPage('P','A4',0);
        } 

        if ($chk_hydrology == 1) {
            ###########################################################
            ##                                                       ##
            ##                   Hydrology/River system              ##
            ##                                                       ##
            ###########################################################     

            $hydro_query = $this->pamain_report->query_hydro($gencode);
            $counthydro = $this->pamain_report->query_count_hydro($gencode);        
            $hydro_details_query = $this->pamain_report->query_hydro_details($gencode);
            if (!empty($hydro_details_query) || !empty($hydro_query)) {                
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($hydro_query)) {         
                        // if ($counthydro <= 0) {
                        //     $table->easyCell("HYDROLOGY/RIVER SYSTEM \n",'img:bmb_assets2/upload/hydrology_img/nophoto.jpg','w280,h250;font-style:B');
                        // } else {
                            foreach ($hydro_query as $hydro) {
                                $table->easyCell("HYDROLOGY/RIVER SYSTEM \n",'img:bmb_assets2/upload/hydrology_img/'.(!empty($hydro->hydro_img)?$hydro->hydro_img:"nophoto.jpg").', w280,h250;font-style:B');
                            }
                        // }
                    }
                    $table->printRow();                
                $table->endTable();
                
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                    
                    foreach ($hydro_details_query as $hydro_d) {
                        $code2 = $hydro_d->hydro_code;
                        $data2 = $this->pamain_report->getAllImageHydrologyWaterParam($code2);
                        $details_s ="";
                        foreach($data2 as $row2):
                            $details_s = $row2->hydrodet."\n";
                        endforeach;
                        $hydrowaterclass = $this->pamain_report->query_hydro_details($gencode);

                        $table->rowStyle('border:TLRB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',($hydro_d->hydro_class == 1)?"Water Classification : ".$hydro_d->id_waterClassDesc."\nSub Water Classification : ".$hydro_d->waterClass."\nRiver-inflow : ".$hydro_d->riverinflow."\nRiver-outflow : ".$hydro_d->riveroutflow."\nDescription : ".$hydro_d->hydro_desc:$details_s),'align:L');
                            // $table->easyCell(iconv("UTF-8", '',"Water Classification : ".$hydro_d->id_waterClassDesc."\n Water Sub Classification : ".$hydro_d->waterClass."\n River – Inflow : ".$hydro_d->riverinflow."\n River – Outflow : ".$hydro_d->riveroutflow."\n Remarks : ".$hydro_d->hydro_desc),'align:L');
                        $table->printRow();
                }
                $table->endTable(5);
            }
                // $pdf->AddPage('P','A4',0);
        }
        
        if ($chk_exlanduse == 1) {
            ###########################################################
            ##                                                       ##
            ##                   Existing Landuse                    ##
            ##                                                       ##
            ###########################################################     

            $exlanduse = $this->pamain_report->query_exlanduse($gencode);
            $exlanduse_details_query = $this->pamain_report->query_exlanduse_details($gencode);
            $exlanduse_GTarea = $this->pamain_report->query_totalexistinglandused($gencode);
            $countexlanduse = $this->pamain_report->query_count_existinglanduse($gencode);        

            if (!empty($exlanduse_details_query) || !empty($exlanduse)) {
                // $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                //     $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                //         $table->easyCell('EXISTING LANDUSE', 'align:C;font-size:12;colspan:2;font-style:B');
                //     $table->printRow();             
                // $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($exlanduse)) {
                        // if ($countexlanduse <= 0) {
                        //     $table->easyCell("EXISTING LANDUSE \n",'img:bmb_assets2/upload/existinglanduse_img/nophoto.jpg','font-style:B');
                        // }else{
                            foreach ($exlanduse as $landuse) {
                                $table->easyCell("EXISTING LANDUSE \n",'img:bmb_assets2/upload/existinglanduse_img/'.(!empty($landuse->landuse_img)?$landuse->landuse_img:"nophoto.jpg").', w280,h250;font-style:B');  
                            }
                        // }
                    }
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{120,80}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                            $table->easyCell(iconv("UTF-8", '','Legend'),'align:C');
                            $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                        $table->printRow();
                        
                    foreach ($exlanduse_details_query as $landuses_d) { 
                        $i++;
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$landuses_d->landuses_desc.(!empty($landuses_d->landuse_sub)?" (".$landuses_d->landuses_sub_desc.")":"")),'align:L');
                            $table->easyCell(iconv("UTF-8", '',$landuses_d->landuse_area." has." ),'align:R');                    
                        $table->printRow();
                    }
                    foreach ($exlanduse_GTarea as $GTEL) {
                        $gtel = number_format($GTEL->gtexistinglanduse,2);
                    }
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ff0000');
                            $table->easyCell(iconv("UTF-8", '',"GRAND TOTAL"),'align:L;font-color:#fff;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',$gtel." has."),'align:R;font-color:#fff;font-style:B');
                        $table->printRow();
                $table->endTable(5);
            }
            // $pdf->AddPage('P','A4',0);
        }  

        $chk_basin = $this->input->post('chk-basin');
        if ($chk_basin == 1) {
            ###########################################################
            ##                                                       ##
            ##             River Basin and Watershed                 ##
            ##                                                       ##
            ########################################################### 
            $riverbasin = $this->pamain_report->query_riverbasin($gencode);
            $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                //     $table->easyCell('RIVER BASIN AND WATERSHED', 'align:C;font-size:12;colspan:2;font-style:B');
                // $table->printRow();             
            $table->endTable();
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                foreach ($riverbasin as $rb) {
                    $table->easyCell("RIVER BASIN AND WATERSHED \n",'img:bmb_assets2/upload/watershed/'.(!empty($rb->watershedmap_img)?$rb->watershedmap_img:"nophoto.jpg").', w280,h250;font-style:B');  
                }                   
                $table->printRow();
            $table->endTable();
            $i=0;
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '','Details'),'align:C');
                    $table->printRow();
                    
                foreach ($riverbasin as $rbd) { 
                    $i++;
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"\n<b>River Basin Name : </b>".$rbd->riverbasin_names."\n<b>Watershed Name : </b>".$rbd->watershed_names."\n<b>Sub-Watershed Name : </b>".$rbd->subwatershed_name),'align:L');                    
                    $table->printRow();
                }
            $table->endTable(5);
        }

        $landslide_query = $this->pamain_report->query_landslide($gencode);
        $countlandslide = $this->pamain_report->query_count_landslide($gencode);
        $landslide_details_query = $this->pamain_report->query_landslide_details($gencode);
        $GT_landslide = $this->pamain_report->query_landslide_GT($gencode);

        $flood_query = $this->pamain_report->query_flooding($gencode);
        $countflood = $this->pamain_report->query_count_flooding($gencode);
        $flooding_details_query = $this->pamain_report->query_flooding_details($gencode);
        $GT_flooding = $this->pamain_report->query_flooding_GT($gencode);

        $sealevel_query = $this->pamain_report->query_sealevelrise($gencode);
        $query_count_sealevel = $this->pamain_report->query_count_sealevel($gencode);
        $sealevel_details_query = $this->pamain_report->query_sealevel_details($gencode);
            
        $storm_query = $this->pamain_report->query_storm($gencode);
        $query_count_tsunami = $this->pamain_report->query_count_tsunami($gencode);
        $tsunami_details_query = $this->pamain_report->query_tsunami_details($gencode);

        $fault_query = $this->pamain_report->query_fault($gencode);
        $query_count_fault = $this->pamain_report->query_count_fault($gencode);
        $fault_details_query = $this->pamain_report->query_fault_details($gencode);

        $ogeohazard_query = $this->pamain_report->query_othergeohazard($gencode);
        $countogeohazard = $this->pamain_report->query_count_othergeohazard($gencode);
        $ogeohazard_details_query = $this->pamain_report->query_othergeohazard_details($gencode);

    if (!empty($landslide_query) || !empty($landslide_details_query) || !empty($flood_query) || !empty($flooding_details_query) || !empty($sealevel_query) || !empty($sealevel_details_query) || !empty($storm_query) || !empty($tsunami_details_query) || !empty($fault_query) || !empty($fault_details_query) || !empty($ogeohazard_query) || !empty($ogeohazard_details_query)) {
            
        // $pdf->AddPage('P','A4',0);
        // $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
        //     $table->rowStyle('border:;border-color:#a1a1a1;'); 
        //         $table->easyCell('GEOHAZARD FEATURES', 'align:L;font-size:18;colspan:2;font-style:B');
        //     $table->printRow();     
        // $table->endTable();

        if ($chk_landslide == 1) {
            ###########################################################
            ##                                                       ##
            ##              Landslide Susceptibility                 ##
            ##                                                       ##
            ###########################################################

            if (!empty($countlandslide)) {
                $pdf->SetFont('Times','',12); 
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('LANDSLIDE SUSCEPTIBILITY', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();     
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($landslide_details_query)) {  
                        // if ($countlandslide <= 0) {
                        //     $table->easyCell("LANDSLIDE SUSCEPTIBILITY \n",'img:bmb_assets2/upload/landslide_img/nophoto.jpg','font-style:B');
                        // }else{ 
                            foreach ($landslide_query as $land) {                    
                                $table->easyCell("LANDSLIDE SUSCEPTIBILITY \n",'img:bmb_assets2/upload/landslide_img/'.(!empty($land->landslide_img)?$land->landslide_img:"nophoto.jpg").', w280, h250;font-style:B');  
                            }
                        // }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#adad9a;bgcolor:#009879;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '',"Legend"),'align:C');    
                        $table->easyCell(iconv("UTF-8", '',"Area (has)"),'align:C');    
                    $table->printRow(); 
                    foreach ($landslide_details_query as $land_d) { 
                        $i++;
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$land_d->landslide_legend),'align:L');
                            $table->easyCell(iconv("UTF-8", '',number_format($land_d->landslide_area,2)." has."),'align:R');
                        $table->printRow();
                        
                    }
                    foreach ($GT_landslide as $gtlsa) {
                       $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ff0000');
                            $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',number_format($gtlsa->GTlsa,2).' has.'),'align:R;font-color:#fff;font-style:B');
                        $table->printRow();
                    }                    
                $table->endTable();
            }
                // $pdf->AddPage('P','A4',0);
        }

        if ($chk_flooding == 1) {
            ###########################################################
            ##                                                       ##
            ##              Flooding Susceptibility                  ##
            ##                                                       ##
            ###########################################################            
            if (!empty($countflood)) {
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('FLOODING SUSCEPTIBILITY', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($flooding_details_query)) {  
                        // if ($countflood <= 0) {
                        //     $table->easyCell("FLOODING SUSCEPTIBILITY \n",'img:bmb_assets2/upload/flooding_img/nophoto.jpg','font-style:italic');
                        // }else{ 
                            foreach ($flood_query as $data) {                    
                                $table->easyCell("FLOODING SUSCEPTIBILITY \n",'img:bmb_assets2/upload/flooding_img/'.(!empty($data->flooding_img)?$data->flooding_img:"nophoto.jpg").', w280, h250;font-style:italic');  
                            }
                        // }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0; 
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#adad9a;bgcolor:#009879;font-color:#fff');
                        $table->easyCell(iconv("UTF-8", '',"Legend"),'align:C');    
                        $table->easyCell(iconv("UTF-8", '',"Area (has)"),'align:C');    
                    $table->printRow(); 
                    foreach ($flooding_details_query as $flooding_d) { 
                        $i++;
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$flooding_d->flooding_legend),'align:L');
                            $table->easyCell(iconv("UTF-8", '',number_format($flooding_d->flooding_area,2)." has."),'align:R');
                        $table->printRow();
                    }
                    foreach ($GT_flooding as $gtflood) {
                       $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ff0000;');
                            $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',number_format($gtflood->GTflood,2).' has.'),'align:R;font-color:#fff;font-style:B');
                        $table->printRow();
                    }                    
                $table->endTable();
            }            
                // $pdf->AddPage('P','A4',0);
        }

        if ($chk_slr == 1) {
            ###########################################################
            ##                                                       ##
            ##              Sea Level Susceptibility                 ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_sealevel)) {
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('SEA LEVEL RISE', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($sealevel_details_query)) {  
                        // if ($query_count_sealevel <= 0) {
                        //     $table->easyCell("SEA LEVEL RISE \n",'img:bmb_assets2/upload/sealevel_img/nophoto.jpg','font-style:B');
                        // }else{ 
                            foreach ($sealevel_query as $data) {                    
                                $table->easyCell("SEA LEVEL RISE \n",'img:bmb_assets2/upload/sealevel_img/'.(!empty($data->sea_img)?$data->sea_img:"nophoto.jpg").', w280, h250;font-style:B');  
                            }
                        // }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                    
                    foreach ($sealevel_details_query as $sealevel) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$sealevel->sea_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);                
            }
                // $pdf->AddPage('P','A4',0);
        }

        $chk_stormsurge = $this->input->post('chk-surge');
        if ($chk_stormsurge == 1) {
            ###########################################################
            ##                                                       ##
            ##                      STORM SURGE                      ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_tsunami)) {
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('STORM SURGE', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($tsunami_details_query)) {  
                        // if ($query_count_tsunami <= 0) {
                        //     $table->easyCell("STORM SURGE \n",'img:bmb_assets2/upload/tsunami_img/nophoto.jpg','font-style:B');
                        // }else{ 
                            foreach ($storm_query as $data) {                    
                                $table->easyCell("STORM SURGE \n",'img:bmb_assets2/upload/tsunami_img/'.(!empty($data->tsunami_img)?$data->tsunami_img:"nophoto.jpg").', w280, h250;font-style:B');  
                            }
                        // }
                    }                
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                    
                    foreach ($tsunami_details_query as $data) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$data->tsunami_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);                      
            }
                // $pdf->AddPage('P','A4',0);
        }                

        $chk_fault = $this->input->post('chk-faultline');
        if ($chk_fault == 1) {
            ###########################################################
            ##                                                       ##
            ##                      FAULT LINE                       ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_fault)) {
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('FAULT LINE', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();             
                $table->endTable();
           
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    if (!empty($fault_details_query)) {  
                        // if ($query_count_fault <= 0) {
                        //     $table->easyCell("FAULT LINE \n",'img:bmb_assets2/upload/fire_img/nophoto.jpg','font-style:B');
                        // }else{ 
                            foreach ($fault_query as $data) {                    
                                $table->easyCell("FAULT LINE \n",'img:bmb_assets2/upload/fire_img/'.(!empty($data->fire_img)?$data->fire_img:"nophoto.jpg").', w280, h250;font-style:B');  
                            }
                        // }
                    }                
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');                    
                    foreach ($fault_details_query as $data) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$data->fire_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);
            }
                // $pdf->AddPage('P','A4',0);
        }
        if ($chk_fault == 1) {
            ###########################################################
            ##                                                       ##
            ##           OTHER GEOHAZARD Susceptibility              ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($countogeohazard)) {
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    //     $table->easyCell('OTHER GEOHAZARD FEATURES', 'align:C;font-size:12;colspan:2;font-style:B');
                    // $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach ($ogeohazard_query as $data) { 
                        if (!empty($ogeohazard_details_query)) {  
                            // if ($countogeohazard <= 0) {
                            //     $table->easyCell("OTHER GEOHAZARD FEATURES \n",'img:bmb_assets2/upload/other_geohazard_img/nophoto.jpg','font-style:B');
                            // }else{ 
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                $table->easyCell("OTHER GEOHAZARD FEATURES \n",'img:bmb_assets2/upload/other_geohazard_img/'.(!empty($data->geohazard_map)?$data->geohazard_map:"nophoto.jpg").', w280, h250;font-style:B');  
                            $table->printRow();  
                            $table->rowStyle('border:;border-color:#a1a1a1');
                                $table->easyCell(iconv("UTF-8", '',$data->geohazard_desc),'align:L');
                            $table->printRow();                        

                            // }
                        }
                    }
                $table->endTable(5);

                // $table->endTable();
                // $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                //     $table->rowStyle('border:;border-color:#a1a1a1;');
                //         $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                //     $table->printRow();
                //         $table->rowStyle('border:TB;border-color:#a1a1a1;');
                //         $table->printRow();
            }
        }
    }
    } 

        ###########################################################
        ##                                                       ##
        ##                      DEMOGRAPHIC                      ##
        ##                                                       ##
        ###########################################################
        $chk_demograph = $this->input->post('chk-demographic');
        $chk_bdfe = $this->input->post('chk-bdfe');
        $chk_cultu = $this->input->post('chk-cultural');
        $countdemo = $this->pamain_report->query_count_demograph($gencode);
        $demogroupbybarangay = $this->pamain_report->getAllbarangayseamsG($gencode);
        $compute = $this->pamain_report->SumDemoPerBrgy($gencode);
        $GTcompute = $this->pamain_report->GrandTotalDemoSeams($gencode);
        if($chk_demograph==1 || $chk_bdfe==1 || $chk_cultu==1){
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                $table->rowStyle('border:;border-color:#a1a1a1;');
                $table->easyCell('SOCIO-ECONOMIC AND CULTURAL FEATURES', 'font-size:18;font-style:B');
            $table->printRow();
            if ($chk_demograph==1) {        
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                    $table->easyCell('DEMOGRAPHIC INFORMATION', 'align:C;font-size:12;font-style:B;font-color:#fff');
                    $table->printRow(); 
                $table->endTable();        
            // if ($chk_demograph==1) {        
                    $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell('NO. OF HOUSEHOLD MEMBER(Including household head)', 'align:C;font-size:12;colspan:4;font-style:B');
                    $table->printRow();  
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Location'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
                    $table->printRow();
                foreach ($demogroupbybarangay as $barangay) {
                    $table->rowStyle('border:TBLR;border-color:#95989c');
                    $table->easyCell(iconv("UTF-8", '',$barangay->provinceName.", ".$barangay->municipalName.", ".$barangay->barangayName),'align:L');
                    foreach ($compute as $row) {
                        if ($barangay->seams_barangay == $row->id_b) {
                            $table->easyCell(iconv("UTF-8", '',number_format($row->total_male,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($row->total_female,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($row->GTseamss,0)),'align:R');
                        }
                    }
                    $table->printRow();    
                }
                $table->rowStyle('border:TBLR;border-color:#a1a1a1');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                    foreach ($GTcompute as $gt) {
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_male,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_female,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->GTseamss,0)),'align:R;font-color:#ff0000;font-style:B');
                    }
                    
                    $table->printRow();
                $table->endTable();

                $tenuredbarangay = $this->pamain_report->getAllbarangayseamsTenuredMIgrant($gencode);
                $computeT = $this->pamain_report->SumDemoPerBrgyTenureMigrant($gencode);
                $GTcomputeMigrant = $this->pamain_report->GrandTotalDemoSeamsTenureMigrant($gencode);
                $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                $table->easyCell('NO. OF TENURED MIGRANT', 'align:C;font-size:12;colspan:4;font-style:B');
                $table->printRow();
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                $table->easyCell(iconv("UTF-8", '','Location'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
                $table->printRow();
                foreach ($tenuredbarangay as $barangay) {
                    $table->rowStyle('border:TBLR;border-color:#95989c');
                    $table->easyCell(iconv("UTF-8", '',$barangay->provinceName.", ".$barangay->municipalName.", ".$barangay->barangayName),'align:L');
                    foreach ($computeT as $row) {
                        if ($barangay->seams_barangay == $row->id_b) {
                            $table->easyCell(iconv("UTF-8", '',number_format($row->total_male,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($row->total_female,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($row->GTseamss,0)),'align:R');
                        }
                    }
                $table->printRow();                
                }
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                    foreach ($GTcomputeMigrant as $gt) {
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_male,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_female,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->GTseamss,0)),'align:R;font-color:#ff0000;font-style:B');
                    }
                    
                    $table->printRow();
                $table->endTable();

                $iccipslist = $this->pamain_report->getAlliccip($gencode);
                $iccipslistcount = $this->pamain_report->getAlliccipMigrant($gencode);
                $GTcomputeMigrant1 = $this->pamain_report->GrandTotalgetAlliccipMigrant($gencode);

                $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                $table->easyCell('NO. OF ICC/IPs', 'align:C;font-size:12;colspan:4;font-style:B');
                $table->printRow();
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                $table->easyCell(iconv("UTF-8", '','Location'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
                $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
                $table->printRow();
                foreach ($iccipslist as $list) {
                    $table->rowStyle('border:TBLR;border-color:#95989c');
                    $table->easyCell(iconv("UTF-8", '',(!empty($list->tribe)) ? $list->tribe : "NONE"),'align:L');
                    // $table->easyCell(iconv("UTF-8", '',$list->tribe),'align:L');
                    foreach ($iccipslistcount as $rowt) {
                        if ($list->ipsiccs == $rowt->ipsiccs) {
                            $table->easyCell(iconv("UTF-8", '',number_format($rowt->total_male,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($rowt->total_female,0)),'align:R');
                            $table->easyCell(iconv("UTF-8", '',number_format($rowt->GTseamss,0)),'align:R');
                        }
                    }
                $table->printRow();                
                }
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                    foreach ($GTcomputeMigrant1 as $gt) {
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_male,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->total_female,0)),'align:R;font-color:#ff0000;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($gt->GTseamss,0)),'align:R;font-color:#ff0000;font-style:B');
                    
                    }
                    $table->printRow();
                    // $pdf->AddPage('P','A4',0);
            }

                $table->endTable();


            ###########################################################
            ##                                                       ##
            ##                      BDFE                             ##
            ##                                                       ##
            ###########################################################
            $countbdfe = $this->pamain_report->query_count_bdfe($gencode);
            $bdfe = $this->pamain_report->getAllBDFE($gencode);

            if ($chk_bdfe == 1) {
                if (!empty($bdfe)) {               
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff'); 
                    $table->easyCell('BIODIVERSITY-FRIENDLY ENTERPRISE (BDFE)', 'align:C;font-size:12;font-style:B');
                    $table->printRow();             
                    $table->endTable();

                    $table=new easyTable($pdf, '{95,95}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach ($bdfe as $rowbdfe) {
                        $bdfe_codegen = $rowbdfe->bdfe_codegen;
                    $table->rowStyle('border:LRT;border-color:#a1a1a1;'); 
                        if ($rowbdfe->lh_long_dms_direction == 1) {
                            $longdir = "East";
                        }elseif($rowbdfe->lh_long_dms_direction == 2){
                            $longdir = "West";
                        }

                        if ($rowbdfe->lh_lat_dms_direction == 1) {
                            $latdir = "North";
                        }elseif($rowbdfe->lh_lat_dms_direction == 2){
                            $latdir = "South";
                        }
                        if ($rowbdfe->proj_proposal == 1) {
                            $prop="Yes";
                        } else {
                            $prop="No";
                        }
                        if ($rowbdfe->lh_business_plan == 1) {
                            $bp="Yes";
                        } else {
                            $bp="No";
                        }
                        if ($rowbdfe->lh_wfp == 1) {
                            $wfp="Yes";
                        } else {
                            $wfp="No";
                        }
                        if ($rowbdfe->lh_moa == 1) {
                            $moa="Yes";
                        } else {
                            $moa="No";
                        }
                        
                        $totalpos = $rowbdfe->lh_po_female+$rowbdfe->lh_po_male;
                        $table->easyCell(iconv("UTF-8", '',
                            '<s "font-color:#234fa7">Name of Enterprise : </s> '.$rowbdfe->enterprise_name."\n".                        
                            '<s "font-color:#234fa7">Name of People Organization : </s> '.$rowbdfe->lh_po_assisted."\n".    
                            '<s "font-color:#234fa7">Contact Number : </s> '.$rowbdfe->lh_contact."\n".
                            '<s "font-color:#234fa7">Type of Registration : </s> '.(($rowbdfe->type_registration == 4)?$rowbdfe->other_registration:$rowbdfe->bdfe_registration_type).", dated ".$rowbdfe->month1." ".$rowbdfe->dor_year."\n".
                            '<s "font-color:#234fa7">Type of Enterprise : </s> '.(!empty($rowbdfe->lh_category)?$rowbdfe->products_desc." - ".(($rowbdfe->lh_sub_category==6||$rowbdfe->lh_sub_category==16||$rowbdfe->lh_sub_category==23||$rowbdfe->lh_sub_category==33||$rowbdfe->lh_sub_category==41)?$rowbdfe->lh_category_others:$rowbdfe->lh_type):"")."\n".
                            '<s "font-color:#234fa7">PO Office Location : </s> '.(!empty($rowbdfe->barangayName)?$rowbdfe->barangayName:" ").(!empty($rowbdfe->municipalName)?", ".$rowbdfe->municipalName:"").(!empty($rowbdfe->provinceName)?", ".$rowbdfe->provinceName:"")."\n".
                            '<s "font-color:#234fa7">Date of Rapid Assessment : </s> '.(!empty($rowbdfe->date_rapidassess_month)?$rowbdfe->month22." ":"").(!empty($rowbdfe->date_rapidassess_day)?$rowbdfe->date_rapidassess_day.", ":"").(!empty($rowbdfe->date_rapidassess_year)?$rowbdfe->date_rapidassess_year:"")."\n".
                            '<s "font-color:#234fa7">Score : </s> '.number_format($rowbdfe->bdfe_score,2)
                            ),'align:L;colspan:2');                
                        $table->printRow();

                        $dataPOname = $this->pamain_report->getallpabdfeponames($bdfe_codegen);
                        $table->rowStyle('border:LR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '','PEOPLE ORGANIZATION'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                        $table->printRow();
                        $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            foreach ($dataPOname as $ponames):
                                $codegroup = $ponames->bdfe_po_codegen;
                                $historypo="";
                                $dataHistoryPoStat = $this->pamain_report->getallpabdfeponamesStatHistory($codegroup);
                                foreach($dataHistoryPoStat as $datahis):
                                    $historypo=$datahis->postathis;
                                endforeach;
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Name of PO : </s>'.$ponames->bdfe_po_name."\n<s 'font-color:#234fa7'>Contact no. : </s>".$ponames->bdfe_contact."\n\nHistory of status\n".$historypo
                                ),'align:L;colspan:2');
                            endforeach;
                        $table->printRow();


                        $bdfecode=$rowbdfe->bdfe_codegen;                        
                        $countbdfepoprod = $this->pamain_report->query_count_po_product($bdfecode);
                        $bdfepoprod = $this->pamain_report->getAllBDFE_po_product($bdfecode);
                        if (!empty($countbdfepoprod)) {
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','PO PRODUCTS'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            foreach ($bdfepoprod as $rowpoprod) {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                    $table->easyCell('PO Products : '.$rowpoprod->po_product_name,'img:bmb_assets2/upload/bdfe_po_product_img/'.$rowpoprod->po_product_image.', w80, h60;font-style:bold;colspan:2;align:L');  
                                $table->printRow();
                            }
                        }

                        $countbdfepolocation = $this->pamain_report->query_count_po_resource($bdfecode);                    
                        $bdfepolocation = $this->pamain_report->getAllBDFE_po_resource($bdfecode);
                        if (!empty($countbdfepolocation)) {                    
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','PO RESOURCE LOCATION'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            foreach ($bdfepolocation as $rowpoloc) {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Product Source : </s> '.$rowpoloc->lhproductsources."\n".
                                    '<s "font-color:#234fa7">Coordinates : </s> '.(!empty($rowpoloc->lh_long_directions)?$rowpoloc->lh_long_directions==1?"East ":"West ":"").(!empty($rowpoloc->lh_long_degs)?$rowpoloc->lh_long_degs."°":"0.000°")." ".(!empty($rowpoloc->lh_long_mins)?$rowpoloc->lh_long_mins."'":"0.000'")." ".(!empty($rowpoloc->lh_long_secs)?$rowpoloc->lh_long_secs."''":"0.000''")." - ".(!empty($rowpoloc->lh_lat_directions)?$rowpoloc->lh_lat_directions==1?"North ":"South ":"").(!empty($rowpoloc->lh_lat_degs)?$rowpoloc->lh_lat_degs."°":"0.000°")." ".(!empty($rowpoloc->lh_lat_mins)?$rowpoloc->lh_lat_mins."'":"0.000'")." ".(!empty($rowpoloc->lh_lat_secs)?$rowpoloc->lh_lat_secs."''":"0.000''")."\n".
                                    '<s "font-color:#234fa7">Total area used (has) : </s> '.(!empty($rowpoloc->lh_product_source_area)?number_format($rowpoloc->lh_product_source_area,3)." has.":"")."\n\n"
                                ),'align:L;colspan:2');  
                                $table->printRow();
                                
                            }
                        }
                        $table->rowStyle('border:LR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '','PROFILING'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                        $table->printRow();
                        $table->rowStyle('border:LR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',
                            '<s "font-color:#234fa7">Date Profiled : </s> '.$rowbdfe->month2.(!empty($rowbdfe->date_profile_day)?" ".$rowbdfe->date_profile_day.", ".$rowbdfe->date_profile_year:"")."\n".
                            '<s "font-color:#234fa7">Number of PO Members : </s> '."Male (".$rowbdfe->lh_po_male.") | Female (".$rowbdfe->lh_po_female.") | Total (".$rowbdfe->lh_po_male + $rowbdfe->lh_po_female.")"."\n".
                            '<s "font-color:#234fa7">Size of Enterprises : </s> '.(!empty($rowbdfe->sizeenter)?($rowbdfe->sizeenter==4?$rowbdfe->lh_enteprise_other:$rowbdfe->size_enterprise):"")."\n".
                            '<s "font-color:#234fa7">Assets Value(Php) : </s> '.(!empty($rowbdfe->poassetval)?number_format($rowbdfe->poassetval,2):"")."\n".
                            '<s "font-color:#234fa7">Average net monthly income(Php) : </s> '.(!empty($rowbdfe->avgnetmonthincome)?number_format($rowbdfe->avgnetmonthincome,2):"")."\n"                    
                            ),'align:L;colspan:2');                
                        $table->printRow();

                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','APPRAISAL'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',
                            '<s "font-color:#234fa7">Date of last PO appraisal : </s> '.(!empty($rowbdfe->month3)?$rowbdfe->month3." ":"").(!empty($rowbdfe->date_appraisal_day)?$rowbdfe->date_appraisal_day.", ":"").(!empty($rowbdfe->date_appraisal_year)?$rowbdfe->date_appraisal_year:"")."\n".
                            ($rowbdfe->bdfe_level==1?'<s "font-color:#234fa7">BDFE Level : </s> '.$rowbdfe->bdfe_level_desc:"")."\n".($rowbdfe->bdfe_level==1?'<s "font-color:#234fa7">Rapid Habitat Assessment : </s>'.$rowbdfe->rapidhabitatassess_file."\n".'<s "font-color:#234fa7">Copy of Business Permit : </s>'.$rowbdfe->businesspermit_file."\n".'<s "font-color:#234fa7">PO Inventory : </s>'.$rowbdfe->poinventory_file:"").
                            ($rowbdfe->bdfe_level==2?'<s "font-color:#234fa7">BDFE Level : </s> '.$rowbdfe->bdfe_level_desc:"")."\n".($rowbdfe->bdfe_level==2?'<s "font-color:#234fa7">BAMS Result : </s>'.$rowbdfe->bamsresult_file."\n".'<s "font-color:#234fa7">Business Plan : </s>'.$rowbdfe->businessplan_file."\n".'<s "font-color:#234fa7">SEAMS result : </s>'.$rowbdfe->seamsresult_file:"").
                            ($rowbdfe->bdfe_level==3?'<s "font-color:#234fa7">BDFE Level : </s> '.$rowbdfe->bdfe_level_desc:"")."\n".($rowbdfe->bdfe_level==3?'<s "font-color:#234fa7">Updated Business Plan : </s>'.$rowbdfe->updatebusinessplan_file."\n".'<s "font-color:#234fa7">BAMS result : </s>'.$rowbdfe->bamsresultdeveloped_file."\n".'<s "font-color:#234fa7">Copy of Business Permit : </s>'.$rowbdfe->businesspermitdeveloped_file."\n".'<s "font-color:#234fa7">PPP Agreement : </s>'.$rowbdfe->pppagreementdeveloped_file:"").
                            ($rowbdfe->bdfe_level==4?'<s "font-color:#234fa7">BDFE Level : </s> '.$rowbdfe->bdfe_level_desc:"")."\n".($rowbdfe->bdfe_level==4?'<s "font-color:#234fa7">LGU resolution : </s>'.$rowbdfe->lguresolution_file."\n".'<s "font-color:#234fa7">BAMS result : </s>'.$rowbdfe->bamsresultsustained_file."\n".'<s "font-color:#234fa7">SEAMS result : </s>'.$rowbdfe->seamsresultsustained_file:"")."\n"
                            // '<s "font-color:#234fa7">Date Profiled : </s> '.BASE_URL('bmb_assets2/upload/strengthened_file/')."\n"      
                            ),'align:L;colspan:2');                
                        $table->printRow();

                        $countbdfeenhancementTA = $this->pamain_report->query_count_enhancement_TA($bdfecode);                    
                        $bdfeenhancementTA = $this->pamain_report->getAllBDFE_enhancement_TA($bdfecode);
                        if (!empty($countbdfeenhancementTA)) { 
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','ENHANCEMENT (Technical Assistance)'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            foreach($bdfeenhancementTA as $enTA)
                            {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Assisting Organization : </s> '.$enTA->ta_assisting_org."\n".'<s "font-color:#234fa7">Duration : </s> '.$enTA->ta_duration." year/s"."\n".'<s "font-color:#234fa7">Dated : </s> '.$enTA->month." ".$enTA->year."\n"
                                ),'align:L;colspan:2');
                                $table->printRow();
                                $code=$enTA->enhancement_code;
                                $bdfeenhancementTAtype = $this->pamain_report->getAllBDFE_enhancement_TA_type_assistance($code);
                                foreach($bdfeenhancementTAtype as $enTAtype)
                                {
                                    $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                    $table->easyCell(iconv("UTF-8", '',
                                        '<s "font-color:#234fa7">Type of Assitance : </s> '.$enTAtype->tatype."\n"
                                    ),'align:L;colspan:2');
                                    $table->printRow();
                                }
                            }
                        }

                        $countbdfeenhancementFA = $this->pamain_report->query_count_enhancement_FA($bdfecode);
                        $bdfeenhancementFA = $this->pamain_report->getAllBDFE_enhancement_FA($bdfecode);
                        if (!empty($countbdfeenhancementFA)) { 
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','ENHANCEMENT (Financial Assistance)'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            foreach($bdfeenhancementFA as $enFA)
                            {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Assisting Organization : </s> '.$enFA->fa_assisting_org."\n".'<s "font-color:#234fa7">Duration : </s> '.$enFA->fa_duration." year/s"."\n".'<s "font-color:#234fa7">Dated : </s> '.$enFA->month." ".$enFA->year
                                ),'align:L;colspan:2');
                                $table->printRow();
                                $code2=$enFA->enhancement_code;
                                $bdfeenhancementFAtype = $this->pamain_report->getAllBDFE_enhancement_FA_type_assistance($code2);
                                foreach($bdfeenhancementFAtype as $enFAtype)
                                {
                                    $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                    $table->easyCell(iconv("UTF-8", '',$enFAtype->fatype."\n"),'align:L;colspan:2');
                                    $table->printRow();
                                }
                            }
                        }

                        $countbdfeenhancementOSA = $this->pamain_report->query_count_enhancement_OSA($bdfecode);
                        $bdfeenhancementOSA = $this->pamain_report->getAllBDFE_enhancement_OSA($bdfecode);
                        if (!empty($countbdfeenhancementOSA)) {
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','ENHANCEMENT (Other Source of Assistance)'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            foreach($bdfeenhancementOSA as $enOSA)
                            {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Assisting Organization : </s> '.$enOSA->oss_assisting_org."\n".'<s "font-color:#234fa7">Duration : </s> '.$enOSA->oss_duration." year/s"."\n".'<s "font-color:#234fa7">Dated : </s> '.$enOSA->month." ".$enOSA->year."\n"
                                ),'align:L;colspan:2');
                                $table->printRow();
                            }
                            $code3=$enOSA->enhancement_code;
                            $bdfeenhancementOSAtype = $this->pamain_report->getAllBDFE_enhancement_OSS_type_assistance($code3);
                            foreach($bdfeenhancementOSAtype as $enOSStype)
                                {
                                    $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                    $table->easyCell(iconv("UTF-8", '',$enOSStype->osstype."\n"),'align:L;colspan:2');
                                    $table->printRow();
                                }
                        }

                        if($rowbdfe->qualifiesrecog==1)
                        {
                            $table->rowStyle('border:LR;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '','RECOGNITIONS'),'align:L;font-color:#ff0000;font-style:B;colspan:2');
                            $table->printRow();
                            $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Date of Endorsement : </s> '.(!empty($rowbdfe->month4)?$rowbdfe->month4:"").(!empty($rowbdfe->date_recog_endorsement_day)?" ".$rowbdfe->date_recog_endorsement_day.", ":"").(!empty($rowbdfe->date_recog_endorsement_year)?$rowbdfe->date_recog_endorsement_year:"")."\n".
                                    '<s "font-color:#234fa7">Date of validaton : </s> '.(!empty($rowbdfe->month5)?$rowbdfe->month5:"").(!empty($rowbdfe->date_recog_validation_day)?" ".$rowbdfe->date_recog_validation_day.", ":"").(!empty($rowbdfe->date_recog_validation_year)?$rowbdfe->date_recog_validation_year:"").
                                    "\n"
                                ),'align:L;colspan:2');
                            $table->printRow();
                            if($rowbdfe->resultvalidation==1)
                            {
                                $table->rowStyle('border:LR;border-color:#a1a1a1;text-align:left');
                                $table->easyCell(iconv("UTF-8", '',
                                    '<s "font-color:#234fa7">Date of Issuance of COR : </s> '.(!empty($rowbdfe->month6)?$rowbdfe->month6:"").(!empty($rowbdfe->dateCOR_day)?" ".$rowbdfe->dateCOR_day.", ":"").(!empty($rowbdfe->dateCOR_year)?$rowbdfe->dateCOR_year:"").
                                    "\n"
                                ),'align:L;colspan:2');
                                $table->printRow();
                            }
                        }

                        $table->rowStyle('border:LRB;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',''),'align:L;font-color:#ff0000;font-style:B;colspan:2');                           
                        $table->printRow();
                        $pdf->Ln(10);
                    }

                    $table->endTable();
                }
            }

            $chk_instit = $this->input->post('chk-institutional');

            ###########################################################
            ##                                                       ##
            ##                   CULTURAL PROFILE                    ##
            ##                                                       ##
            ###########################################################
            if ($chk_cultu == 1) {
                // $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                $table->easyCell('CULTURAL PROFILE', 'align:C;font-size:12;font-style:B;font-color:#fff');
                $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;'); 
                    foreach ($datas as $main) { 
                        $table->easyCell(iconv("UTF-8", '',(!empty($main->ethinicity)?'<s "font-color:#234fa7">Ethnicity</s>'."\n".$main->ethinicity."\n \n":"\n").
                        (!empty($main->archeology)?'<s "font-color:#234fa7">Archeology</s>'."\n".$main->archeology."\n \n":"\n").
                        (!empty($main->cultural_resource)?'<s "font-color:#234fa7">Cultural Resource</s>'."\n".$main->cultural_resource."\n \n":"\n").
                        (!empty($main->belief)?'<s "font-color:#234fa7">Customs and Belief</s>'."\n".$main->belief."\n \n":"\n").
                        (!empty($main->belief)?'<s "font-color:#234fa7">Local/Indigenous Knowledge Practices</s>'."\n".$main->local_inter_knowledge_practices."\n \n":"\n")),'align:L');
                    $table->printRow();  
                    }           
                $table->endTable();
            }
        }

        ###########################################################
        ##                                                       ##
        ##                     MANAGEMENT ZONE                   ##
        ##                                                       ##
        ###########################################################

        $chk_strict = $this->input->post('chk-strict');
        $chk_multiple = $this->input->post('chk-multiple');
        $chk_mgmtplan = $this->input->post('chk-mgmtplan');
        $countmgmtzone = $this->pamain_report->count_managementzone($gencode);
        $query_managementzone = $this->pamain_report->query_managementzone($gencode);
        $query_count_managementzone = $this->pamain_report->query_count_managementzone($gencode);
        $strictq = $this->pamain_report->query_strictprot($gencode);
        $multiusedzone = $this->pamain_report->query_multizone($gencode);
        $GTstrict = $this->pamain_report->query_SUMstrict($gencode);
        $GTmultiple = $this->pamain_report->query_SUMmultiple($gencode);

        $countmgmtplan = $this->pamain_report->count_managementplan($gencode);
        $query_managementplan = $this->pamain_report->query_managementplan($gencode);

        $chk_ecoplan = $this->input->post('chk-ecoplan');
        $chk_wetplan = $this->input->post('chk-wetplan');
        $chk_caveplan = $this->input->post('chk-caveplan');
        $chk_thematicotherplan = $this->input->post('chk-thematic');

        $countecomgmtplan = $this->pamain_report->count_ecomanagementplan($gencode);
        $query_ecomanagementplan = $this->pamain_report->query_ecomanagementplan($gencode);

        $countwetmgmtplan = $this->pamain_report->count_wetmanagementplan($gencode);
        $query_wetmanagementplan = $this->pamain_report->query_wetmanagementplan($gencode);

        $countcavemgmtplan = $this->pamain_report->count_cavemanagementplan($gencode);
        $query_cavemanagementplan = $this->pamain_report->query_cavemanagementplan($gencode);

        $countothrmgmtplan = $this->pamain_report->count_othermanagementplan($gencode);
        $query_othrmanagementplan = $this->pamain_report->query_othermanagementplan($gencode);

    if ($chk_strict == 1 || $chk_multiple == 1 || $chk_mgmtplan == 1 || $chk_thematicotherplan == 1 || $chk_ecoplan == 1 || $chk_wetplan == 1 || $chk_caveplan == 1) {
        if (!empty($query_managementzone) || !empty($strictq) || !empty($multiusedzone) || !empty($countmgmtplan) || !empty($countecomgmtplan) || !empty($countwetmgmtplan) || !empty($countcavemgmtplan) || !empty($countothrmgmtplan)) {
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;'); 
            $table->easyCell('MANAGEMENT PLANNING', 'align:L;font-size:18;font-style:B');
            $table->printRow();             
            $table->endTable();    
            if (!empty($countmgmtzone)) {
                // $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                // $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                // $table->easyCell('MANAGEMENT ZONE', 'align:C;font-size:12;font-style:B;font-color:#fff');
                // $table->printRow();             
                // $table->endTable();                
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    // if ($query_count_managementzone <= 0) {
                    //     $table->easyCell("MANAGEMENT ZONE \n",'img:bmb_assets2/upload/managementzone_img/nophoto.jpg','w280,h250;');
                    // } else {
                        foreach ($query_managementzone as $mgmtzone) {
                            $table->easyCell("MANAGEMENT ZONE \n",'img:bmb_assets2/upload/managementzone_img/'.(!empty($mgmtzone->managementzone_image)?$mgmtzone->managementzone_image:"nophoto.jpg").', w280,h250;font-style:B;');
                        }
                    // }
                    $table->easyCell('','img:bmb_assets2/upload/managementzone_img/nophoto.jpg');
                    $table->printRow();
                    
            $table->endTable();
            $table=new easyTable($pdf, '{100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','STRICT PROTECTION ZONE'),'align:C;colspan:3');
                    $table->printRow();

                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Category'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Archipelagic Sea Lanes'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Area'),'align:C');
                    $table->printRow();
                foreach ($strictq as $stprot) { 
                   if ($stprot->spzcat == 1) {
                       $sp = "Terrestrial";
                   }else{
                        $sp = "Aquatic";
                   }
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '',$sp),'align:L');
                    $table->easyCell(iconv("UTF-8", '',($stprot->strictarchipelagic==1)?"Yes":"No"),'align:C');
                    $table->easyCell(iconv("UTF-8", '',number_format($stprot->s_area,3)." has." ),'align:R');
                    $table->printRow();
                    
                }
                foreach ($GTstrict as $row) {
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167;');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',number_format($row->total_strict,3)." has."),'align:R;font-color:#fff;font-style:B;colspan:2');
                    $table->printRow();
                    
                }
            $table->endTable(10);

            $table=new easyTable($pdf, '{100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','MULTIPLE USED ZONE'),'align:C;colspan:3');
                    $table->printRow();

                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');                   
                    $table->easyCell(iconv("UTF-8", '','Category'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Archipelagic Sea Lanes'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Area'),'align:C');
                    $table->printRow();
                foreach ($multiusedzone as $muz) { 
                   
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '',($muz->multicat==1)?"Terrestrial":"Aquatic"),'align:L');
                    $table->easyCell(iconv("UTF-8", '',($muz->multiarchipelagic==1)?"Yes":"No"),'align:C');
                    $table->easyCell(iconv("UTF-8", '',number_format($muz->area,3)." has." ),'align:R');
                    $table->printRow();                    
                }
                foreach ($GTmultiple as $rowm) {
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167;');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#fff;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',number_format($rowm->total_multi,2)." has."),'align:R;font-color:#fff;font-style:B;colspan:2');
                    $table->printRow();
                    
                }
            $table->endTable(10);
            }

            if (!empty($countmgmtplan)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                $table->easyCell('MANAGEMENT PLAN', 'align:C;font-size:12;font-style:B;font-color:#fff');
                $table->printRow();             
                $table->endTable();             
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach ($query_managementplan as $mplan) { 
                    $table->rowStyle('border:LRTB;border-color:#a1a1a1;'); 
                        $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Objectives : </s>'.(!empty($mplan->mpObjectives)?$mplan->mpObjectives:"N/A")."\n".
                        '<s "font-color:#234fa7">Date Approved : </s>'.(!empty($mplan->month)?$mplan->month:"").(!empty($mplan->mpDay)?" ".$mplan->mpDay.", ":"").(!empty($mplan->year)?$mplan->year:"")."\n".
                        '<s "font-color:#234fa7">Status : </s>'.(!empty($mplan->status_desc)?$mplan->status_desc:"")."\n".
                        '<s "font-color:#234fa7">Duration : </s>'.(!empty($mplan->mpDuration)?$mplan->mpDuration:"")."\n".
                        '<s "font-color:#234fa7">File name : </s>'.(!empty($mplan->mngmtplan_file)?$mplan->mngmtplan_file:"")."\n".
                        '<s "font-color:#234fa7">Remarks : </s>'.(!empty($mplan->mngmtplan_remarks)?$mplan->mngmtplan_remarks:"")."\n"
                    ),'align:L');
                    $table->printRow();  
                    }           
                $table->endTable(10);  
            }

            if($chk_thematicotherplan == 1 || $chk_ecoplan == 1 || $chk_wetplan == 1 || $chk_caveplan == 1 || $chk_thematicotherplan == 1){
                if (!empty($countecomgmtplan) || !empty($countecomgmtplan) || !empty($countwetmgmtplan) || !empty($countcavemgmtplan) || !empty($countothrmgmtplan)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                    $table->easyCell('THEMATIC OR OTHER PLAN', 'align:C;font-size:12;font-style:B;font-color:#fff');
                    $table->printRow();             
                    $table->endTable();
                }
                if($chk_ecoplan == 1){
                    if (!empty($countecomgmtplan)) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            $table->easyCell('Ecotourism Plan', 'align:C;font-size:12;font-style:B;font-color:#fff');
                            $table->printRow(); 
                            foreach ($query_ecomanagementplan as $emplan) { 
                            $table->rowStyle('border:LRTB;border-color:#a1a1a1;'); 
                                $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Date Approved : </s>'.(!empty($emplan->month)?$emplan->month." ":"").(!empty($emplan->ecotourism_plan_dateD)?$emplan->ecotourism_plan_dateD.", ":"").(!empty($emplan->year)?$emplan->year:"")."\n".
                                '<s "font-color:#234fa7">Status : </s>'.(!empty($emplan->status_desc)?$emplan->status_desc:"")."\n".
                                '<s "font-color:#234fa7">File name : </s>'.(!empty($emplan->upload_eco_plan)?$emplan->upload_eco_plan:"")."\n"
                            ),'align:L');
                            $table->printRow();  
                            }           
                        $table->endTable();
                    }
                }          
                if($chk_wetplan == 1){
                    if (!empty($countwetmgmtplan)) {                
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            $table->easyCell('Wetland Plan', 'align:C;font-size:12;font-style:B;font-color:#fff');
                            $table->printRow(); 
                            foreach ($query_wetmanagementplan as $wmplan) { 
                            $table->rowStyle('border:LRTB;border-color:#a1a1a1;'); 
                                $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Date Approved : </s>'.(!empty($wmplan->month)?$wmplan->month." ":"").(!empty($wmplan->wetland_plan_dateD)?$wmplan->wetland_plan_dateD.", ":"").(!empty($wmplan->year)?$wmplan->year:"")."\n".
                                '<s "font-color:#234fa7">Status : </s>'.(!empty($wmplan->status_desc)?$wmplan->status_desc:"")."\n".
                                '<s "font-color:#234fa7">File name : </s>'.(!empty($wmplan->upload_wetland_plan)?$wmplan->upload_wetland_plan:"")."\n"
                            ),'align:L');
                            $table->printRow();  
                            }           
                        $table->endTable();
                    }
                }
                if($chk_caveplan == 1){
                    if (!empty($countcavemgmtplan)) {                
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            $table->easyCell('Caves Plan', 'align:C;font-size:12;font-style:B;font-color:#fff');
                            $table->printRow(); 
                            foreach ($query_cavemanagementplan as $cmplan) { 
                            $table->rowStyle('border:LRTB;border-color:#a1a1a1;'); 
                                $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Date Approved : </s>'.(!empty($cmplan->month)?$cmplan->month." ":"").(!empty($cmplan->cave_plan_dateD)?$cmplan->cave_plan_dateD.", ":"").(!empty($cmplan->year)?$cmplan->year:"")."\n".
                                '<s "font-color:#234fa7">Status : </s>'.(!empty($cmplan->status_desc)?$cmplan->status_desc:"")."\n".
                                '<s "font-color:#234fa7">File name : </s>'.(!empty($cmplan->upload_cave_plan)?$cmplan->upload_cave_plan:"")."\n"
                            ),'align:L');
                            $table->printRow();  
                            }           
                        $table->endTable();
                    }
                }
                if($chk_thematicotherplan == 1){
                    if (!empty($countothrmgmtplan)) {                
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                            $table->easyCell('Other Plan', 'align:C;font-size:12;font-style:B;font-color:#fff');
                            $table->printRow(); 
                            foreach ($query_othrmanagementplan as $omplan) { 
                            $table->rowStyle('border:LRTB;border-color:#a1a1a1;'); 
                                $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Date Approved : </s>'.(!empty($omplan->month)?$omplan->month." ":"").(!empty($omplan->other_plan_dateD)?$omplan->other_plan_dateD.", ":"").(!empty($omplan->year)?$omplan->year:"")."\n".
                                '<s "font-color:#234fa7">Name other of Plan : </s>'.(!empty($omplan->specify_otherplan)?$omplan->specify_otherplan:"")."\n".
                                '<s "font-color:#234fa7">Status : </s>'.(!empty($omplan->status_desc)?$omplan->status_desc:"")."\n".
                                '<s "font-color:#234fa7">File name : </s>'.(!empty($omplan->upload_other_plan)?$omplan->upload_other_plan:"")."\n"
                            ),'align:L');
                            $table->printRow();  
                            }           
                        $table->endTable();
                    }
                }
            }

        }
    }
        
        ###########################################################
        ##                                                       ##
        ##                       ECOTOURISM                      ##
        ##                                                       ##
        ###########################################################

        $chk_attraction = $this->input->post('chk-attraction');
        $chk_facility = $this->input->post('chk-facility');
        $chk_activity = $this->input->post('chk-activity');
        $chk_products = $this->input->post('chk-products');
        $chk_enterprise = $this->input->post('chk-enterprise');

        $attracts = $this->pamain_report->query_attractsmap($gencode);      
        $query_attraction = $this->pamain_report->query_attraction($gencode);
        $count_attraction = $this->pamain_report->count_attraction($gencode);
        $countMapAttraction = $this->pamain_report->count_attraction_map($gencode);

        $facilMap = $this->pamain_report->query_facilitymap($gencode);     
        $query_facility = $this->pamain_report->query_facility($gencode);
        $count_facility = $this->pamain_report->count_facility($gencode);
        $countMapfacility = $this->pamain_report->count_facility_map($gencode);

        $query_product = $this->pamain_report->query_product($gencode);
        $count_facility = $this->pamain_report->count_facility($gencode);

        $query_enterprise = $this->pamain_report->query_enterprise($gencode);
        $count_enterprise = $this->pamain_report->count_enterprise($gencode);
    if (!empty($attracts) || !empty($query_attraction) || !empty($facilMap) || !empty($query_facility) || !empty($query_product) || !empty($query_enterprise)) {     
        if ($chk_attraction==1 || $chk_facility==1 || $chk_products==1 || $chk_enterprise==1){
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:TB;border-color:#a1a1a1;');
            $table->easyCell('ECOTOURISM', 'font-size:18;font-style:B');
            $table->printRow();
            $table->endTable();
            if ($chk_attraction == 1) {               
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    // if ($countMapAttraction <= 0) {
                        // $table->easyCell("ATTRACTION/ACTIVITIES \n",'img:bmb_assets2/upload/attraction_map/nophoto.jpg','w280,h250;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffd480;font-color:#000');
                        $table->easyCell("ATTRACTION/ACTIVITIES");
                    foreach ($attracts as $attract) {
                            $table->easyCell("",'img:bmb_assets2/upload/attraction_map/'.(!empty($attract->attraction_img_map)?$attract->attraction_img_map:"nophoto.jpg").', w280,h250;');
                        }
                    // } else {
                    //     foreach ($attracts as $attract) {
                    //         $table->easyCell("ATTRACTION/ACTIVITIES \n",'img:bmb_assets2/upload/attraction_map/'.$attract->attraction_img_map.', w280,h250;');
                    //     }
                    // }
                    $table->printRow();                    
                $table->endTable();
                if (!empty($count_attraction)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        if ($count_attraction <=0) {
                            $table->easyCell('','img:bmb_assets2/upload/attraction_img/nophoto.jpg');                        
                            $table->printRow();                          
                        }else{
                            foreach ($query_attraction as $adet) {
                                $attcode = $adet->ecogeneratedcode;
                                $query_attraction_img = $this->pamain_report->query_attraction_imgs($attcode);                                
                                $query_attraction_numrows = $this->pamain_report->query_attraction_imgs_numrows($attcode);

                                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                                    $table->easyCell(ucfirst($adet->title)."\n",'img:bmb_assets2/upload/attraction_img/'.(!empty($adet->image_attr)?$adet->image_attr:"nophoto.jpg").', w280,h250;');

                                    $table->printRow();
                                    $table->easyCell('<i>Source of photo '.$adet->source_photo.'</i>');                        
                                    $table->printRow();                                    

                                    $table->rowStyle('border:;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',"\n\n <s> Ecotourism Activities</s>"."\n"),'align:L;font-color:#234fa7;');
                                    $table->printRow(); 

                                    if($adet->chk_activity1==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Hiking/Trekking/Mountaineering</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==1) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity2==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Caving/Spelunking</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==2) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }
                                    
                                    if($adet->chk_activity3==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Scuba diving</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==3) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity4==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Snorkeling</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==4) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity5==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Swimming</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==5) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity6==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Kayaking</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==6) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity7==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Surfing</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==7) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity8==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Wildlife watching</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==8) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity9==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Bird watching</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        // if($query_attraction_numrows >= 0 ):
                                            foreach ($query_attraction_img as $imgs){
                                                if ($imgs->activty_code==9) {
                                                    $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                    $table->printRow();
                                                }
                                            }  
                                        // endif;
                                                 
                                    }

                                    if($adet->chk_activity10==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Village tour</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==10) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity11==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Mangrove tour</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==11) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity12==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Science Museum tours</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==12) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity13==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Biking</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==13) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity14==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Nature photography</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==14) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    if($adet->chk_activity15==1){
                                        $table->rowStyle('border:;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"\n\n <s> Other activity</s>"."\n"),'align:C');
                                        $table->printRow(); 
                                        foreach ($query_attraction_img as $imgs){
                                            if ($imgs->activty_code==15) {
                                                $table->easyCell('','img:bmb_assets2/upload/attraction_multiple_img/'.(!empty($imgs->activity_img)?$imgs->activity_img.',w80,h80':"nophoto.jpg"));                        
                                                $table->printRow();
                                            }
                                        }           
                                    }

                                    $table->rowStyle('border:B;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '','<s> Description : </s>'."\n".$adet->description),'align:L');
                                    $table->printRow();      
                            }
                        }
                    $table->endTable(10);
                }
                // $pdf->AddPage('P','A4',0);
            }
            
            if ($chk_facility==1) {
                if (!empty($count_facility) || !empty($countMapfacility)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;font-style:B;font-color:#fff');                       
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffd480;font-color:#000');
                        $table->easyCell("FACILITY");
                            foreach ($facilMap as $facility) {
                                $table->easyCell("",'img:bmb_assets2/upload/facility_map/'.(!empty($facility->facility_map)?$facility->facility_map:"nophoto.jpg").', w280,h250;');
                            }
                        $table->printRow();
                    $table->endTable();
                }
                if (!empty($count_facility)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                        if ($count_facility <=0) {
                            $table->easyCell('','img:bmb_assets2/upload/facilities_img/nophoto.jpg');                        
                        }else{
                            foreach ($query_facility as $facq) {
                                $codesa=$facq->facilitycode;
                                $table->easyCell('','img:bmb_assets2/upload/facilities_img/'.(!empty($facq->image_facility)?$facq->image_facility:"nophoto.jpg"),'w280,h250;');                        
                                $table->printRow();
                                $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7;font-style:B">'.($facq->title_facility==8?$facq->facility_others:$facq->facility_descs).'</s>'),'align:L');
                                $table->printRow();   
                                $table->easyCell(iconv("UTF-8", '',($facq->noaccomodate!=0 || $facq->noaccomodate=="")?'No. of people accomodate : '.$facq->noaccomodate:""),'align:L');
                                $table->printRow();  
                                $table->easyCell(iconv("UTF-8", '',$facq->description_facility),'align:L');
                                $table->printRow();  
                                $table->easyCell(iconv("UTF-8", '','Facility condition : '.$facq->condition_desc),'align:L');
                                $table->printRow();
                                $table->rowStyle('border:B;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '','Constructed/Build Date : '.$facq->month." ".$facq->year),'align:L');
                                $table->printRow();    

                                $query_facility_imgs = $this->pamain_report->query_facility_multi_img($codesa);
                                foreach ($query_facility_imgs as $faci) {
                                    // $table->easyCell('','img:bmb_assets2/upload/facility_multiple_img/'.(!empty($faci->facilities_img)?$faci->facilities_img:"nophoto.jpg"),'w80,h110;');                        
                                    $table->easyCell('','img:bmb_assets2/upload/facility_multiple_img/'.(!empty($faci->facilities_img)?$faci->facilities_img.',w80,h80':"nophoto.jpg"));                        
                                    $table->printRow();
                                }
                            }
                        }
                    $table->endTable(10);
                }
                    $pdf->AddPage('P','A4',0);            
            }

            ###########################################################
            ##                      PRODUCTS                         ##
            ###########################################################
            

            if ($chk_products == 1) {
                if (!empty($query_product)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                    $table->easyCell('ECOTOURISM PRODUCTS', 'align:C;font-size:12;font-style:B;font-color:#fff');
                    $table->printRow(); 
                    $table->endTable();         

                    foreach ($query_product as $data) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                        if ($data->prod_img == "") {
                            $table->easyCell('','img:bmb_assets2/upload/product_img/nophoto.jpg');
                        } else {
                            $table->easyCell('','img:bmb_assets2/upload/product_img/'.(!empty($data->prod_img)?$data->prod_img:"nophoto.jpg").', w80,h60;');
                        }
                        $table->printRow();                    
                        $table->easyCell(iconv("UTF-8", '',$data->prod_desc),'align:L');    
                        $table->printRow();
                        $table->endTable(10);
                    }           
                }
                    $pdf->AddPage('P','A4',0);            
            }

            ###########################################################
            ##                      ENTERPRISE                       ##
            ###########################################################
            

            if ($chk_enterprise==1) {
                if (!empty($query_enterprise)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                    $table->easyCell('ECOTOURISM ENTERPRISE', 'align:C;font-size:12;font-style:B;font-color:#fff');
                    $table->printRow(); 
                    $table->endTable();         

                    foreach ($query_enterprise as $data) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                        if ($data->enterprise_img == "") {
                            $table->easyCell('','img:bmb_assets2/upload/enterprise_img/nophoto.jpg');
                        } else {
                            $table->easyCell('','img:bmb_assets2/upload/enterprise_img/'.(!empty($data->enterprise_img)?$data->enterprise_img:"nophoto.jpg").', w80,h60;');
                        }
                        $table->printRow();
                        $table->easyCell(iconv("UTF-8", '',$data->enterprise_desc),'align:J');  
                        $table->printRow();
                        $table->endTable(10);
                    }           
                }
            }
        }
    }

        $chk_sapa = $this->input->post('chk-sapa');
        $chk_moa = $this->input->post('chk-moa');
        $chk_pacbrma = $this->input->post('chk-pacbrma');
        $chk_othertenure = $this->input->post('chk-othertenure');
        ###########################################################
        ##                  TENURIAL INSTRUMENT                  ##
        ###########################################################
        $query_project_sapa = $this->pamain_report->query_project_sapa($gencode);
        $query_project_moa = $this->pamain_report->query_project_moa($gencode);
        $query_project_pacbrma = $this->pamain_report->query_project_pacbrma($gencode);
        $query_project_othertenure = $this->pamain_report->query_project_othertenure($gencode);
        $query_project_othertenure_count = $this->pamain_report->query_project_othertenure_count($gencode);
        $querynocrmp = $this->pamain_report->queryRowCRMP($gencode);
        $nocrmp = $this->pamain_report->countRowCRMP($gencode);
        $query_project_moa_count = $this->pamain_report->query_project_moa_count($gencode);
        $query_project_pacbrma_count = $this->pamain_report->query_project_pacbrma_count($gencode);
        $query_project_sapa_count = $this->pamain_report->query_project_sapa_count($gencode);  
    if ($chk_sapa == 1 || $chk_moa == 1 || $chk_pacbrma == 1 || $chk_othertenure == 1){
        if (!empty($query_project_sapa) || !empty($query_project_moa) || !empty($query_project_pacbrma) || !empty($query_project_othertenure)) {
            
            // $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;');
            $table->easyCell('TENURIAL INSTRUMENT', 'font-size:18;colspan:2;font-style:B');
            $table->printRow();
            $table->endTable();

            if ($chk_sapa==1) {
                if ($query_project_sapa_count !=0) {      
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                        $table->easyCell('SPECIAL USE AGREEMENT IN PROTECTED AREA (SAPA)', 'align:C;font-size:12;font-style:B;font-color:#fff');
                        $table->printRow();
                        $table->endTable();          
                        foreach ($query_project_sapa as $sapa) {
                            $codes = $sapa->sapa_generatedcode;
                            $countmonitoring = $this->pamain_report->getallmonitoringcount($codes);
                            $stat="";
                            if ($sapa->status==1) {
                                $stat = '<s "font-color:#016e1e">Active</s>';
                            } elseif($sapa->status==2) {
                                $stat = '<s "font-color:#fcdf00">Pending</s>';                            
                            }elseif($sapa->status==3) {
                                $stat = '<s "font-color:#fc00c1">Renewal</s>';                            
                            }elseif($sapa->status==4) {
                                $stat = '<s "font-color:#fc5400">Cancelled</s>';                            
                            }elseif($sapa->status==5) {
                                $stat = '<s "font-color:#fc0000">Expired</s>';                            
                            }               
                             $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');                           
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('SAPA # : ', 'align:R;font-size:12;font-style:B');
                                     $table->easyCell(iconv("UTF-8", '',$sapa->sapa_no));
                                $table->printRow();  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Nature of Development : ', 'align:R;font-size:12;font-style:B');
                                     $table->easyCell(iconv("UTF-8", '',($sapa->sapa_nature_development==9)?$sapa->sapa_development_others:$sapa->sapa_devtlist));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('SAPA Holder : ', 'align:R;font-size:12;font-style:B');
                                     $table->easyCell(iconv("UTF-8", '',$sapa->sapa_name_proponent));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Duration : ', 'align:R;font-size:12;font-style:B');
                                     $table->easyCell(iconv("UTF-8", '',(!empty($sapa->sapa_duration_from)?$sapa->sapa_duration_from:"").(!empty($sapa->sapa_duration_to)?'-'.$sapa->sapa_duration_to:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Location : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($sapa->sapa_project_location)?$sapa->sapa_project_location:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Area : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($sapa->sapa_area)?$sapa->sapa_area." has.":"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Cost : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($sapa->sapa_project_cost)?'P'.$sapa->sapa_project_cost:"")));
                                $table->printRow(); 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Documents : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',"Approved documents : ".(!empty($sapa->sapa_scanned_file)?"Yes":"No")."\n"."SAPA Rehabilitation Plan : ".(!empty($sapa->sapa_mgm_plan)?"Yes":"No")."\n"."CDMP : ".(!empty($row->sapa_cdmp_file)?"Yes;":"No")."\n"."PAMB Resolution : ".(!empty($row->sapa_pamb_reso)?"Yes":"No")."\n"));
                                $table->printRow();
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('# of Monitoring report : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$countmonitoring));
                                $table->printRow(); 
                                          
                            $table->endTable(5);

                                        
                        }
                }
            }

            if ($chk_moa == 1) {
                if ($query_project_moa_count !=0) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                        $table->easyCell('MEMORANDUM OF AGREEMENT (MOA)', 'align:C;font-size:12;font-style:B;font-color:#fff');
                        $table->printRow();
                        $table->endTable();     
                        foreach ($query_project_moa as $moa) {
                            $codes = $moa->moa_generatedcode;
                            $monitoringrepsCount = $this->pamain_report->getcountallmoamonitoring($codes);
                            if ($moa->moa_status==1) {
                                $stat = '<s "font-color:#016e1e">Active</s>';
                            } elseif($moa->moa_status==2) {
                                $stat = '<s "font-color:#fcdf00">Pending</s>';                            
                            }elseif($moa->moa_status==3) {
                                $stat = '<s "font-color:#fc00c1">Renewal</s>';                            
                            }elseif($moa->moa_status==4) {
                                $stat = '<s "font-color:#fc5400">Cancelled</s>';                            
                            }elseif($moa->moa_status==5) {
                                $stat = '<s "font-color:#fc0000">Expired</s>';                            
                            }
                             $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');                            
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('MOA Holders: ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$moa->moa_holder."(".$stat.")"));
                                $table->printRow();  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Represented by : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$moa->moa_second_party));
                                $table->printRow();     
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Nature of Development : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$moa->moa_devt));
                                $table->printRow();
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Date of Signing : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($moa->moa_from_month)?$moa->moa_from_month." ":"").(!empty($moa->moa_from_day)?$moa->moa_from_day.", ":"").(!empty($moa->moa_from_year)?$moa->moa_from_year:"")));
                                $table->printRow();  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Date of Expiration : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($moa->moa_to_month)?$moa->moa_to_month." ":"").(!empty($moa->moa_to_day)?$moa->moa_to_day.", ":"").(!empty($moa->moa_to_year)?$moa->moa_to_year:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Location : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($moa->moa_location)?$moa->moa_location:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Area : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($moa->moa_area)?$moa->moa_area." has.":"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Cost : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($moa->moa_cost)?'P'.$moa->moa_cost:"")));
                                $table->printRow();  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Documents : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',"Approved documents : ".(!empty($moa->moa_doc_file)?"Yes":"No")."\n"."Project Plan : ".(!empty($moa->moa_mgm_plan)?"Yes":"No")."\n"."PAMB Approved : ".(!empty($row->moa_pamb_approve)?"Yes;":"No")."\n"."PAMB Resolution : ".(!empty($moa->moa_pamb_reso)?"Yes":"No")."\n"));
                                $table->printRow();    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('# of Monitoring report : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$monitoringrepsCount));
                                $table->printRow();              
                            $table->endTable(5);
                        }
               }
            } 

            if ($chk_pacbrma) {
                if ($query_project_pacbrma_count !=0) {
                        foreach ($query_project_pacbrma as $pac) {
                            if ($pac->pacbrma_status==1) {
                                $stat = '<s "font-color:#016e1e">Active</s>';
                            } elseif($pac->pacbrma_status==2) {
                                $stat = '<s "font-color:#fcdf00">Pending</s>';                            
                            }elseif($pac->pacbrma_status==3) {
                                $stat = '<s "font-color:#fc00c1">Renewal</s>';                            
                            }elseif($pac->pacbrma_status==4) {
                                $stat = '<s "font-color:#fc5400">Cancelled</s>';                            
                            }elseif($pac->pacbrma_status==5) {
                                $stat = '<s "font-color:#fc0000">Expired</s>';                            
                            }
                             $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                    $table->easyCell('PROTECTED AREA COMMUNICATION-BASED RESOURCE MANAGEMENT AGREEMENT(PACBRMA)', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff');
                                $table->printRow(); 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('PACBRMA No. : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_no."(".(!empty($stat)?$stat:"").")"));
                                $table->printRow(); 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Head of Organization: ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_holder));
                                $table->printRow();  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Name of PO : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_po));
                                $table->printRow();     
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Nature of Development : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_devt));
                                $table->printRow();
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Duration : ', 'align:R;font-size:12;font-style:B');
                                     $table->easyCell(iconv("UTF-8", '',(!empty($pac->pacbrma_start)?$pac->pacbrma_start:"").(!empty($pac->pacbrma_end)?'-'.$pac->pacbrma_end:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Location : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($pac->pacbrma_location)?$pac->pacbrma_location:"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('Area : ', 'align:R;font-size:12;font-style:B;');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($pac->pacbrma_area)?$pac->pacbrma_area." has.":"")));
                                $table->printRow();                    
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('PACBRMA Member : ', 'align:R;font-size:12;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',"Male - ".(!empty($pac->pacbrma_male)?$pac->pacbrma_male:0)."\n"."Female - ".(!empty($pac->pacbrma_female)?$pac->pacbrma_female:0)."\n"."Total - ".$pac->pacbrma_female + $pac->pacbrma_male."\n"));
                                $table->printRow(); 
                                
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell('No. of Activity : ', 'align:R;font-size:12;font-style:B');
                                    foreach ($querynocrmp as $crmp) {
                                        if ($crmp->pacid == $pac->id_pacbrma) {
                                            $table->easyCell(iconv("UTF-8", '',(!empty($nocrmp)?$nocrmp:"")));

                                        }
                                    }
                                $table->printRow();
                            $table->endTable(10);
                        }
                }
            }
            
            if ($chk_othertenure) {
                if ($query_project_othertenure_count !=0) {
                    foreach ($query_project_othertenure as $otenure) {
                        $stat="";
                        if ($otenure->other_instrument_status==1) {
                            $stat = '<s "font-color:#016e1e">New</s>';
                        } elseif($otenure->other_instrument_status==2) {
                            $stat = '<s "font-color:#fcdf00">Update</s>';                            
                        }elseif($otenure->other_instrument_status==3) {
                            $stat = '<s "font-color:#fc00c1">Expired</s>';                            
                        }
                        $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879'); 
                                $table->easyCell('OTHER PROTECTED AREAS', 'align:C;font-size:12;colspan:2;font-style:B;font-color:#fff');
                            $table->printRow(); 
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Tenured type : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$otenure->types_tenure_desc."(".$stat.")"));
                            $table->printRow(); 
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Tenure holder/proponent name: ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$otenure->tenure_holder));
                            $table->printRow();  
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Nature of development/purpose : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$otenure->tenure_purpose));
                            $table->printRow();     
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Location : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$otenure->other_instrument_location));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Area(has) : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',(!empty($otenure->other_instrument_area)?$otenure->other_instrument_area." has.":"")));
                            $table->printRow();                    
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Duration : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',(!empty($otenure->other_instrument_start)?$otenure->other_instrument_start:"")." - ".(!empty($otenure->other_instrument_expire)?$otenure->other_instrument_expire:"")));
                            $table->printRow();                       
                        $table->endTable(10);
                    }
                }
            }
        }
    }

        $chk_program = $this->input->post('chk-program');
        $chk_project = $this->input->post('chk-project');
        $chk_research = $this->input->post('chk-research');
        $chk_prgActivity = $this->input->post('chk-programActivity');
        $chk_prgProject = $this->input->post('chk-programProject');
        $chk_prgResearch = $this->input->post('chk-programResearch');

        $program = $this->pamain_report->query_all_program($gencode);
        $program_activity = $this->pamain_report->query_all_programActivity($gencode);
        $program_project = $this->pamain_report->query_all_programProject($gencode);
        $program_research = $this->pamain_report->query_all_programResearch($gencode);
        $project = $this->pamain_report->query_all_project($gencode);
        $research = $this->pamain_report->query_all_research($gencode);
    if ($chk_program == 1 || $chk_project == 1 || $chk_research == 1 || $chk_prgActivity == 1 || $chk_prgProject == 1 || $chk_prgResearch == 1){
        if (!empty($program) || !empty($project) || !empty($research)) {            
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;');
            $table->easyCell('PROGRAMS, PROJECTS, AND RESEARCHES', 'font-size:18;colspan:2;font-style:B');
            $table->printRow();
            $table->endTable();
            if ($chk_program==1) {
                if (!empty($program)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                    $table->easyCell('PROGRAMS', 'align:C;font-size:12;font-style:B;font-color:#fff');
                    $table->printRow();
                    $table->endTable();
                    foreach ($program as $prog) {                    
                    $table=new easyTable($pdf, '{190}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:TLR;border-color:#a1a1a1');
                        $table->easyCell(iconv("UTF-8", '',"<b>Sector : </b>".ucwords($prog->name_agency)),'bgcolor:#e6e6e6;');
                        $table->printRow();                       
                        $table->rowStyle('border:BLR;border-color:#a1a1a1');
                        $table->easyCell(iconv("UTF-8", '',"<b>".($prog->sector_program_id==5?$prog->program_name:$prog->program_names)."</b>\n".$prog->program_desc),'bgcolor:#e6e6e6;');
                        $table->printRow();
                    $table->endTable();
                        $i=0;
                        if ($chk_prgActivity==1) {
                            $table=new easyTable($pdf, '{190}', 'width:300; border-color:#ffff00; font-size:12; border:0;:-10px');
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#3973ac;font-color:#fff');
                                    $table->easyCell($prog->program_names.' Activities', 'font-size:12;colspan:3;font-style:B');
                                $table->printRow();                                
                                foreach ($program_activity as $pactivity) {
                                    if ($prog->id_program == $pactivity->id_program) { 
                                    $i++;    
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell($i.") ".(!empty($pactivity->program_activity)?$pactivity->program_activity:"")."\n<b>Area(has.) : </b>".number_format($pactivity->program_activity_area,2)."\n<b>Date conducted : </b>".(!empty($pactivity->program_activity_month)?$pactivity->program_activity_month:"").(!empty($pactivity->program_activity_year)?" ".$pactivity->program_activity_year:"").(!empty($pactivity->program_activity_output)?"\n<b>Output : </b>".$pactivity->program_activity_output:""), 'align:L;font-size:12');
                                        $table->printRow();
                                    }
                                }
                            $table->endTable();
                        }
                        
                        $b=0;
                        if ($chk_prgProject == 1) {
                            $table=new easyTable($pdf, '{190}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#3973ac;font-color:#fff');
                                            $table->easyCell($prog->program_names.' Projects', 'align:L;font-size:12;font-style:B;colspan:4');
                                        $table->printRow();
                                        foreach ($program_project as $pproject) {
                                            if (!empty($pproject)) {
                                                if ($prog->id_program == $pproject->id_program) {
                                                    if ($pproject->proj_typefund==1) {
                                                        $source = "\n<b>Type of Fund : </b>Grants"."\n<b>Name of Grantor : </b>".$pproject->proj_sourcetxt;
                                                    }elseif ($pproject->source_fund==2) {
                                                        $source = "\n<b>Type of Fund : </b>Loans"."\n<b>Lending Institution : </b>".$pproject->proj_sourcetxt;
                                                    }if ($pproject->source_fund==3) {
                                                        $source = "\n<b>Type of Fund : </b>Donation"."\n<b>Name of Donor : </b>".$pproject->proj_sourcetxt;
                                                    }

                                                    $b++;
                                                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                                    $table->easyCell(iconv("UTF-8", '',$b.") <b>Sector : </b>".$pproject->name_agency."\n".
                                                        ($pproject->proj_list_id==20?"<b>".$pproject->proj_name."</b>":"<b>".$pproject->proj_names."</b>").
                                                        "\n".$pproject->proj_desc.
                                                        "\n<b>Proponent/Implementing Partner : </b>".$pproject->proj_proponent.
                                                        "\n<b>Duration : </b>".$pproject->proj_start_implement_month." ".$pproject->proj_start_implement_year." - ".$pproject->proj_end_implement_month." ".$pproject->proj_end_implement_year.
                                                        ($pproject->source_fund==1?"\n<b>Source of fund : </b>".$pproject->sourceoffund:"").(!empty($pproject->proj_typefund)?$source:"")
                                                    ));
                                                    $table->printRow();

                                                }
                                            }
                                        }
                            $table->endTable();
                        }
                        $c=0;
                        if ($chk_prgResearch == 1) {
                           foreach ($program_research as $presearch) {  
                            $pambcode = $presearch->research_code;
                            $resopamb = $this->pamain_report->query_pambreso_byreasearch($pambcode);
                            $pambtxtreso="";
                                foreach($resopamb as $pambr):
                                    $pambtxtreso=$pambr->pambreso;
                                endforeach;
                                if (!empty($presearch)) {
                                    if ($prog->id_program == $presearch->id_program) {
                                        $stattxt="";
                                        if ($presearch->search_status == 3) {
                                            $stattxt = "<b>Status : </b>".$presearch->research_status_details."\n<b>Reason : </b>".$presearch->research_reason;
                                        }else if ($presearch->search_status == 4) {
                                            $stattxt = "<b>Status : </b>".$presearch->research_status_details."\n<b>Reason : </b>".$presearch->research_reason."\n<b>Year extend : </b>".$presearch->research_year_extend;
                                        }else{
                                            $stattxt = "<b>Status : </b>".$presearch->research_status_details;
                                        }
                                    $c++;
                                    $table=new easyTable($pdf, '{190}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#df9f9f;bgcolor:#3973ac;font-color:#fff');
                                        $table->easyCell($prog->program_names.' Research', 'align:L;font-size:12;font-style:B;colspan:3');
                                    $table->printRow();                                    
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',(!empty($presearch->type_research)?"<b>Research Title : </b>".$presearch->type_research.
                                            "\n<b>Purpose : </b>".$presearch->research_purpose:"")).
                                            "\n<b>Duration : </b>".(!empty($presearch->research_month_from)?$presearch->research_month_from." ":"").(!empty($presearch->research_year_from)?$presearch->research_year_from:"")." - ".(!empty($presearch->research_month_to)?$presearch->research_month_to." ":"").(!empty($presearch->research_year_to)?$presearch->research_year_to:"").
                                            "\n<b>Funding Agency : </b>".(!empty($presearch->funding_agency)?$presearch->funding_agency:" ").
                                            "\n<b>Name of Researcher : </b>".(!empty($presearch->name_researcher)?$presearch->name_researcher:" ").
                                            "\n<b>Institution : </b>".(!empty($presearch->institution)?$presearch->institution:" ")."\n".$stattxt.$pambtxtreso
                                        );
                                    $table->printRow();                                   
                                    $table->endTable(5);
                                    }
                                }

                           }
                        }
                    }
                }
            }
            $bb=0;
            if ($chk_project==1) {
                if (!empty($project)) {
                    $table=new easyTable($pdf, '{60,40,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879');
                            $table->easyCell('PROJECTS', 'font-size:12;colspan:4;font-style:B;align:C;font-color:#fff;');
                        $table->printRow();
                    $table->endTable();
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');                           
                    $table->printRow();                        
                            foreach ($project as $proj) {
                                if (!empty($proj)) {
                                    // if ($prog->id_program == $proj->id_program) {
                                        if ($proj->proj_typefund==1) {
                                            $source = "\n<b>Type of Fund : </b>Grants"."\n<b>Name of Grantor : </b>".$proj->proj_sourcetxt;
                                        }elseif ($proj->source_fund==2) {
                                            $source = "\n<b>Type of Fund : </b>Loans"."\n<b>Lending Institution : </b>".$proj->proj_sourcetxt;
                                        }if ($proj->source_fund==3) {
                                            $source = "\n<b>Type of Fund : </b>Donation"."\n<b>Name of Donor : </b>".$proj->proj_sourcetxt;
                                        }

                                        $bb++;
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',$bb.") <b>Sector : </b>".$proj->name_agency."\n".
                                            ($proj->proj_list_id==20?"<b>".$proj->proj_name."</b>":"<b>".$proj->proj_names."</b>").
                                            "\n".$proj->proj_desc.
                                            "\n<b>Proponent/Implementing Partner : </b>".$proj->proj_proponent.
                                            "\n<b>Duration : </b>".$proj->proj_start_implement_month." ".$proj->proj_start_implement_year." - ".$proj->proj_end_implement_month." ".$proj->proj_end_implement_year.
                                            ($proj->source_fund==1?"\n<b>Source of fund : </b>".$proj->sourceoffund:"").(!empty($proj->proj_typefund)?$source:"")
                                        ));
                                        $table->printRow();

                                    // }
                                }
                            }
                    $table->endTable();
                }
            }
            $cc=0;
            $dd=0;
            if ($chk_research) {
                if (!empty($research)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:TB;border-color:#a1a1a1;bgcolor:#009879');
                            $table->easyCell('RESEARCHES', 'font-size:12;colspan:2;font-style:B;align:C;font-color:#fff;');
                        $table->printRow();
                    $table->endTable();
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');                           
                    $table->printRow();
                        foreach ($research as $searchs) {
                            $pambcode = $searchs->research_code;
                            $resopambs = $this->pamain_report->query_pambreso_byreasearch2($pambcode);
                            $pambtxtresos="";
                                foreach($resopambs as $pambrs):
                                    $dd++;
                                    $pambtxtresos=$pambrs->pambreso;
                                endforeach;
                                    $stattxts="";
                                    if ($searchs->search_status == 3) {
                                        $stattxts = "<b>Status : </b>".$searchs->research_status_details."\n<b>Reason : </b>".$searchs->research_reason;
                                    }else if ($searchs->search_status == 4) {
                                        $stattxts = "<b>Status : </b>".$searchs->research_status_details."\n<b>Reason : </b>".$searchs->research_reason."\n<b>Year extend : </b>".$searchs->research_year_extend;
                                    }else{
                                        $stattxts = "<b>Status : </b>".$searchs->research_status_details;
                                    }
                                $cc++;

                                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',(!empty($searchs->type_research)?"<b>Research Title : </b>".$searchs->type_research.
                                        "\n<b>Purpose : </b>".$searchs->research_purpose:"")).
                                        "\n<b>Duration : </b>".(!empty($searchs->research_month_from)?$searchs->research_month_from." ":"").(!empty($searchs->research_year_from)?$searchs->research_year_from:"")." - ".(!empty($searchs->research_month_to)?$searchs->research_month_to." ":"").(!empty($searchs->research_year_to)?$searchs->research_year_to:"").
                                        "\n<b>Funding Agency : </b>".(!empty($searchs->funding_agency)?$searchs->funding_agency:" ").
                                        "\n<b>Name of Researcher : </b>".(!empty($searchs->name_researcher)?$searchs->name_researcher:" ").
                                        "\n<b>Institution : </b>".(!empty($searchs->institution)?$searchs->institution:" ")."\n".$stattxts."\n\n<b>List of PAMB Resolution/s</b>".$pambtxtresos
                                    );
                                $table->printRow(); 
                        }                        
                    $table->endTable();                        
                }
            }
        }
    }
        $chk_threats = $this->input->post('chk-threats');
        $threatMap = $this->pamain_report->query_all_threatsMap($gencode);
        $countMap = $this->pamain_report->count_all_threatsMap($gencode);
        $threats = $this->pamain_report->query_all_threats($gencode);

        $threatsList = $this->pamain_report->getallthreatsLists($gencode);

        if ($chk_threats == 1) {
            if (!empty($threatMap)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:'); 
                        $table->easyCell('THREATS', 'align:L;font-size:18;font-style:B');
                    $table->printRow();             
                $table->endTable(); 
                 $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');   
                    foreach ($threatMap as $tmap) {
                        if ($countMap <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/img_threat_map/nophoto.jpg','w280,h260;');
                        } else {
                            foreach ($threatMap as $tmap) {
                                $table->easyCell('Map image show','img:bmb_assets2/upload/img_threat_map/'.$tmap->threat_map_img.', w280,h260;');
                            }
                        }
                    }
                    $table->printRow();
                $table->endTable(10);

                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach($threats as $thrt) {
                        $codel = $thrt->threat_gencode;
                        $threatsList = $this->pamain_report->getallthreatsLists($codel);

                        $table->rowStyle('border:TLR;border-color:#a1a1a1;');                           
                            $table->easyCell('','img:bmb_assets2/upload/img_threat/'.(!empty($thrt->img_threat)?$thrt->img_threat:"nophoto.jpg").', w80,h60;align:left'); 
                        $table->printRow();
                        $table->rowStyle('border:LR;border-color:#a1a1a1;');
                            $table->easyCell('<b>Location : </b>'.(!empty($thrt->threat_region)?$thrt->regionName:"").(!empty($thrt->threat_province)?", ".$thrt->provinceName:"").(!empty($thrt->threat_municipality)?", ".$thrt->municipalName:"").(!empty($thrt->threat_barangay)?", ".$thrt->barangayName:""), 'align:L;font-size:12;');
                            // $table->easyCell(iconv("UTF-8", '',));
                        $table->printRow();

                        $table->rowStyle('border:BLR;border-color:#a1a1a1;');
                        $table->easyCell('<b>Date Assessed : </b>'.(!empty($thrt->month)?$thrt->month." ":"").(!empty($thrt->year)?$thrt->year:""), 'align:L;font-size:12;');
                            // $table->easyCell(iconv("UTF-8", '',));
                        $table->printRow();

                        $table->rowStyle('border:TBRL;border-color:#a1a1a1;bgcolor:#009879');
                            $table->easyCell('List of threats', 'align:C;font-size:12;font-style:B;colspan:3;font-color:#fff;');
                        $table->printRow();

                        foreach($threatsList as $listthreat) {
                        
                            if ($listthreat->threat_long_degree_x == 1):
                                $long = "East";
                            elseif($listthreat->threat_long_degree_x == 2):
                                $long = "West";
                            else:
                                $long = "";
                            endif;
                            if ($listthreat->threat_lat_degree_x == 1):
                                $lat = "North";
                            elseif($listthreat->threat_lat_degree_x == 2):
                                $lat = "South";
                            else:
                                $lat = "";
                            endif;
                        if (!empty($listthreat)) {
                            $table->rowStyle('border:TBRL;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '',"<b>Nature of threat : </b>".$listthreat->natural_threats_desc.
                                                                   "\n<b>Category : </b>".$listthreat->threats_category_desc.
                                                                   "\n<b>Threats : </b>".$listthreat->sub_cat_desc.
                                                                   "\n<b>Longitude : </b>".$long." ".(!empty($listthreat->threat_long_degree_x)?$listthreat->threat_long_degree_x."° ":"").(!empty($listthreat->threat_long_minute_x)?$listthreat->threat_long_minute_x."' ":"").(!empty($listthreat->threat_long_second_x)?$listthreat->threat_long_second_x."'' ":"").
                                                                   "\n<b>Latitude : </b>".$lat." ".(!empty($listthreat->threat_lat_degree_x)?$listthreat->threat_lat_degree_x."° ":"").(!empty($listthreat->threat_lat_minute_x)?$listthreat->threat_lat_minute_x."' ":"").(!empty($listthreat->threat_lat_second_x)?$listthreat->threat_lat_second_x."'' ":"")

                            ));
                            $table->printRow();
                        }
                    }  
                    $pdf->ln(10);
                }

                $table->endTable(10); 
            }
        }

        $chk_mbMember = $this->input->post('chk-member');
        $chk_mbIssuance = $this->input->post('chk-issuance');
        $countmember = $this->input->post('countmemberdisplay');
        $qMember = $this->pamain_report->queryboardMember($gencode,$countmember);
        $qMemberIssuances = $this->pamain_report->querymemberIssuances($gencode);

        $qMemberMale = $this->pamain_report->CountMemberbySexMale($gencode);
        $qMemberFemale = $this->pamain_report->CountMemberbySexFemale($gencode);
        $pdf->AddPage('P','A4',0);
        
        if ($chk_mbMember==1) {
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                $table->rowStyle('border:;border-color:#a1a1a1;');
                    $table->easyCell('MANAGEMENT BOARD', 'font-size:18;font-style:B');
                $table->printRow();
            $table->endTable();
            if (!empty($qMember)) {
                 $table=new easyTable($pdf, '{100,100,100,}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                 $table->easyCell(iconv("UTF-8", '','TOTAL NO. OF MEMBERS'),'align:C;colspan:5;font-style:B');                    
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$qMemberMale),'align:C');
                        $table->easyCell(iconv("UTF-8", '',$qMemberFemale),'align:C');
                        $sum = $qMemberMale + $qMemberFemale;
                        $table->easyCell(iconv("UTF-8", '',$sum),'align:C');
                    $table->printRow();                    
                $table->endTable();                

                $table=new easyTable($pdf, '{100,40,100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Name'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Sex'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Organization/Offices'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Position'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Date of Appointment'),'align:C');
                    $table->printRow();
                foreach ($qMember as $cmem) {
                    if ($cmem->sex == 1) {
                        $s = "Male";
                    }elseif ($cmem->sex == 2) {
                        $s = "Female";
                    }
                $table->rowStyle('border:TBLR;border-color:#95989c');
                    $table->easyCell(iconv("UTF-8", '',(!empty($cmem->fname)?$cmem->fname:"")." ".(!empty($cmem->mname)?$cmem->mname:"")." ".(!empty($cmem->lname)?$cmem->lname:"")),'align:C');
                    $table->easyCell(iconv("UTF-8", '',(!empty($s)?$s:"")),'align:C');
                    $table->easyCell(iconv("UTF-8", '',(!empty($cmem->office_name)?$cmem->office_name:"")),'align:C');
                    $table->easyCell(iconv("UTF-8", '',(!empty($cmem->designation)?$cmem->designation:"")),'align:C');
                    $table->easyCell(iconv("UTF-8", '',(!empty($cmem->appointment_month)?$cmem->appointment_month:"")."/".(!empty($cmem->appointment_day)?$cmem->appointment_day:"")."/".(!empty($cmem->appointment_year)?$cmem->appointment_year:"")),'align:R');
                $table->printRow();

                }
                $table->endTable(5);                
            }
        }

        if ($chk_mbIssuance==1) {
            if (!empty($qMemberIssuances)) {
                $table=new easyTable($pdf, '{60,70,60}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','MINUTES OF MEETING'),'align:C;colspan:3;font-style:B');                    
                    $table->printRow();
                    $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Date conducted'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Notice of Meeting'),'align:C');                     
                    $table->easyCell(iconv("UTF-8", '','PAMB Resolution'),'align:C');                     
                    $table->printRow();
                    foreach ($qMemberIssuances as $issuances) {
                        $codenom=$issuances->pambreso_code;
                        $listpamb = $this->pamain_report->countpambminutesofmeetings($codenom);

                        $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',(!empty($issuances->month)?$issuances->month:"")." ".(!empty($issuances->day_minutes)?$issuances->day_minutes:"").", ".(!empty($issuances->year)?$issuances->year:"")),'align:L');
                        $table->easyCell(iconv("UTF-8", '',$issuances->title_minutes),'align:L');   
                    foreach ($listpamb as $pambs) {
                        $table->easyCell(iconv("UTF-8", '',$pambs->resolutionname),'align:L');  
                    }
                        $table->printRow();
                    }
                $table->endTable(10); 
            }
        }

        $staff = $this->pamain_report->querymemberpamo($gencode);
        $malepaso =$this->pamain_report->CountpasobySexMale($gencode);
        $femalepaso =$this->pamain_report->CountpasobySexFemale($gencode);
        $chk_pamo = $this->input->post('chk-pamomember');
        if ($chk_pamo== 1) {
            if (!empty($chk_pamo)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                        $table->easyCell('PROTECTED AREA MANAGEMENT OFFICE', 'font-size:18;font-style:B');
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{100,100,100,}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                $table->easyCell(iconv("UTF-8", '','TOTAL NO. OF MEMBERS'),'align:C;colspan:5;font-style:B;');                    
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$malepaso),'align:C');
                        $table->easyCell(iconv("UTF-8", '',$femalepaso),'align:C');
                        $sump = $malepaso + $femalepaso;
                        $table->easyCell(iconv("UTF-8", '',$sump),'align:C');
                    $table->printRow();                    
                $table->endTable();    

                $table=new easyTable($pdf, '{100,100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#009879;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','Name'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Sex'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Status of appointment'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Position/Designation'),'align:C');
                    $table->printRow();
                    foreach ($staff as $stf) {
                        if ($stf->tsex==1) {
                            $sexx = "Male";
                        }elseif($stf->tsex==2){
                            $sexx = "Female";
                        }
                        $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1');
                        $table->easyCell(iconv("UTF-8", '',(!empty($stf->tfname)?ucwords($stf->tfname):"")." ".(!empty($stf->tmname)?substr(ucfirst($stf->tmname),0,1).".":"")." ".(!empty($stf->tlname)?ucwords($stf->tlname):"")),'align:L');
                        $table->easyCell(iconv("UTF-8", '',(!empty($sexx)?$sexx:"")),'align:C');
                        $table->easyCell(iconv("UTF-8", '',(!empty($stf->adescription)?$stf->adescription:"")),'align:C');
                        $table->easyCell(iconv("UTF-8", '',(!empty($stf->tposition)?$stf->tposition:"")),'align:C');
                    $table->printRow();
                    }
                $table->endTable(10);
            }
        }
        $chk_references = $this->input->post('chk-reference');
        $refer =$this->pamain_report->qreferences($gencode);
        if ($chk_references==1) {            
            if (!empty($refer)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell('REFERENCES', 'font-size:18;font-style:B');
                    $table->printRow();                   
                $table->endTable();
                $d=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach ($refer as $ref) {
                    $d++;
                    $table->rowStyle('border:;border-color:#a1a1a1;');                    
                    $table->easyCell(iconv("UTF-8", '',$d.") ".(!empty($ref->author)?$ref->author:"")." ".(!empty($ref->ref_date_month)?$ref->ref_date_month:"")." ".(!empty($ref->ref_date_year)?$ref->ref_date_year:"")." ".(!empty($ref->title)?$ref->title:"")." ".(!empty($ref->link)?$ref->link:"")),'align:L');
                    $table->printRow();                   

                    } 
                $table->endTable();                    
            }
        }
}//end IF GENCODE OR IF NULL PA
    
        $pdf->Output();
    }
}

/*
* application/controllers/Testpdf.php
*/
