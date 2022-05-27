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
        if ($chk_geninfo==1) {
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
            foreach ($geographiczonmarine as $biom) {
                $mar = $biom->descs;
            }
            foreach ($geographiczonterrestrial as $biot) {
                $ter = $biot->descs2;
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
                        ($chk_catid==1?'<s "font-color:#234fa7">Category</s>'."\n".($main->categoryName=="Other"?$main->other_category:$main->categoryName)."\n \n":"\n").
                        ($chk_bgz==1?'<s "font-color:#234fa7">Biogeographic Zone</s>'."\n"."Marine : \n".$mar."\nTerrestrial : \n".$ter."\n\n":"\n \n").
                        ($chk_area==1?'<s "font-color:#234fa7">Area</s>'."\n"."Terrestrial : ".number_format($area->terrestrial,2)." has. \n"."Marine : ".number_format($area->marine_area,2)." has. \n Total : ".number_format($totalpaarea->total_area,2)." has. \n\n":"").
                        ($chk_buffer==1?'<s "font-color:#234fa7">Buffer Zone</s>'."\n"."Terrestrial : ".number_format($area->buffer,2)." has. \n"."Marine : ".number_format($area->marine_buffer,2)." has. \n\n":"").($chk_loc==1?'<s "font-color:#234fa7">Location(Barangay, Municipal, Province)</s>'."\n".(!empty($fixed)?$fixed:""):"")
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
        $chk_habitateco = $this->input->post('chk-habeco');
        if ($chk_habitateco==1) {           
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
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('FOREST FORMATION', 'align:L;font-size:12;colspan:2;font-style:B');
                            $table->printRow();             
                        $table->endTable();

                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                            if (!empty($forfor)) {  
                                if ($countforforimage <= 0) {
                                    $table->easyCell('No map image show','img:bmb_assets2/upload/ff_map_img/nophoto.jpg','font-style:italic');
                                }else{ 
                                    foreach ($forfor as $ff) {                    
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/ff_map_img/'.$ff->ff_map_img.', w280, h260;font-style:italic');  
                                    }
                                }
                            }
                            $table->printRow();
                        $table->endTable();
                    $i=0;
                    $table=new easyTable($pdf, '{130,60}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#143D59');
                            $table->easyCell(iconv("UTF-8", '','Legend'),'align:C;font-color:#FBF8BE');
                            $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C;font-color:#FBF8BE');
                        $table->printRow();
                        foreach ($forfor_details_query as $ff_d) {  
                            $i++;
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '',$ff_d->ff_details),'align:L');
                                $table->easyCell(iconv("UTF-8", '',$ff_d->ff_area." has."),'align:R');
                            $table->printRow();             
                        }
                        
                        $forfor_SUM = $this->pamain_report->query_GT_forfor($gencode);
                        foreach ($forfor_SUM as $GTforfor) {
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#F96167');
                                $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#FFF;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',number_format($GTforfor->forGT,2)." has."),'align:R;font-color:#FFF;font-style:B');
                            $table->printRow();
                        }                       
                    $table->endTable(5);
                    }
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
                        $pdf->AddPage('P','A4',0);
                        $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('VEGETATIVE COVER', 'align:L;font-size:12;colspan:2;font-style:B');
                            $table->printRow();             
                        $table->endTable();
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                if (!empty($vegetative)) {  
                                    if ($countvegetative <= 0) {
                                        $table->easyCell('No map image show','img:bmb_assets2/upload/vegetative_img/nophoto.jpg','font-style:italic');
                                    }else{ 
                                        foreach ($vegetative as $vege) {                    
                                            $table->easyCell('Map image shows','img:bmb_assets2/upload/vegetative_img/'.$vege->vegetative_img.', w280, h260;font-style:italic');  
                                        }
                                    }
                                }
                            $table->printRow();
                        $table->endTable();
                        $i=0;
                        $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                                $table->easyCell(iconv("UTF-8", '','Legend'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                            $table->printRow();
                            foreach ($vegetative_details_query as $vege_d) {    
                                $i++;
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',$vege_d->landcover_class),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($vege_d->vegetative_area,2)." has."),'align:R');
                                $table->printRow();                    
                            }
                            foreach ($vegetative_GT as $gtveg) {
                                $gtveg = number_format($gtveg->GTvegetative,2);
                            }
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',$gtveg.' has.'),'align:R;font-color:#ff3333;font-style:B');
                                $table->printRow();
                        $table->endTable(5);
                    }                    
                }

                if ($chk_inwet == 1) {
                    $inland_wetland = $this->pamain_report->query_inlandwetland($gencode);
                    $inland_details_query = $this->pamain_report->query_iw_details($gencode);                    
                    if (!empty($inland_wetland) || !empty($inland_details_query)) {
                        $pdf->AddPage('P','A4',0);    
                        $pdf->SetFont('Times','',12); 
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('INLAND WETLAND', 'align:L;font-size:12;colspan:2;font-style:B');
                            $table->printRow();             
                        $table->endTable();
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                if (empty($inland_wetland)) {  
                                    $table->easyCell('No map image show','img:bmb_assets2/upload/iwmap/nophoto.jpg','font-style:italic');
                                }else{ 
                                    foreach ($inland_wetland as $iw) {                    
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/iwmap/'.$iw->iw_img.', w280, h260;font-style:italic');  
                                    }
                                }
                            $table->printRow();
                        $table->endTable();

                        foreach ($inland_details_query as $data) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:B;border-color:#a1a1a1;bgcolor:#adad9a');
                                    if (empty($data->inland_map_img)) {
                                        $table->easyCell('No map image','img:bmb_assets2/upload/iwimg/nophoto.jpg, w280,h340;font-style:I');
                                    }else{
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/iwimg/'.$data->inland_map_img.', w280,h340;font-style:I');                                
                                    }
                                $table->printRow();
                            $table->endTable();
                            $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '','Wetland site name'),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                    $table->easyCell(iconv("UTF-8", '',$data->iw_name),'align:L');
                                $table->printRow();
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
                        $pdf->AddPage('P','A4',0);    
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('HUMAN-MADE WETLAND', 'align:L;font-size:12;font-style:B');
                        $table->printRow();             
                        $table->endTable();

                        foreach ($human_wetland as $hiw) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                        $table->easyCell('','img:bmb_assets2/upload/iwhumanmade_map/'.$hiw->hiw_img.', w280,h320;');  
                        $table->printRow();
                        $table->endTable();
                        }  

                        foreach ($human_details_query as $datah) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:B;border-color:#a1a1a1;bgcolor:#adad9a');
                            if (empty($datah->hinland_map_img)) {
                                $table->easyCell('No map image','img:bmb_assets2/upload/iwhumanmade_img/nophoto.jpg, w280,h340;font-style:I');
                            }else{
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/iwhumanmade_img/'.$datah->hinland_map_img.', w280,h340;font-style:I');                                
                            }
                            $table->printRow();
                            $table->endTable();

                            $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','Wetland site name'),'align:L');
                            $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                            $table->easyCell(iconv("UTF-8", '',$datah->hiw_name),'align:L');
                            $table->printRow();
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
                }
                if ($chk_caves == 1) {
                    if (!empty($caves) || !empty($cave_details_query)) {
                        $pdf->AddPage('P','A4',0);    
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('CAVES', 'align:L;font-size:12;font-style:B');
                            $table->printRow();             
                        $table->endTable();
                        foreach ($caves as $cavem) {
                            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                if (empty($cavem->cavemap_img)) {
                                    $table->easyCell('No map image','img:bmb_assets2/upload/cavemap_img/nophoto.jpg, w280,h250;font-style:I');
                                }else{
                                    $table->easyCell('Map image shows','img:bmb_assets2/upload/cavemap_img/'.$cavem->cavemap_img.', w280,h250;font-style:I');                                
                                }
                                $table->printRow();
                            $table->endTable();
                        } 

                        foreach ($cave_details_query as $cave) {  
                        $pdf->SetFont('Times','',12);
                        $table=new easyTable($pdf, '{70,5,115}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:T;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '','Name of Cave'),'align:L');
                                $table->easyCell(iconv("UTF-8", '',':'),'align:C');
                                $table->easyCell(iconv("UTF-8", '',$cave->caves_name),'align:L');
                            $table->printRow();
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

                if (!empty($coralreef) || !empty($coralreef_details_query) || !empty($coralreefspecies_details_query) || !empty($seagrass) || !empty($seagrass_details_query) || !empty($seagrassspecies_details_query) || !empty($mangrove) || !empty($mangrove_details_query) || !empty($mangrovespecies_details_query)) {
                    $pdf->AddPage('P','A4',0);  
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1'); 
                    $table->easyCell('COASTAL/MARINE', 'align:L;font-size:18;font-style:B');
                    $table->printRow();             
                    $table->endTable();                           
                    }
                if ($chk_coral == 1) {                
                    if (!empty($coralreef) || !empty($coralreef_details_query) || !empty($coralreefspecies_details_query)){  
                        // $pdf->AddPage('P','A4',0);  
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('CORAL REEF ECOSYSTEM', 'align:L;font-size:12;font-style:B');
                        $table->printRow();             
                        $table->endTable();                      
                        $pdf->SetFont('Times','',12);
                        foreach ($coralreef as $coral) {
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                        // $table->easyCell('','img:bmb_assets2/upload/coralreef_map_img/'.$coral->coralreefmap.', w80,h60;');
                        if (empty($coral->coralreefmap)) {
                            $table->easyCell('No map image','img:bmb_assets2/upload/coralreef_map_img/nophoto.jpg, w280,h310;font-style:I');
                        }else{
                            $table->easyCell('Map image shows','img:bmb_assets2/upload/coralreef_map_img/'.$coral->coralreefmap.', w280,h310;font-style:I');                                
                        } 
                        $table->printRow();
                    $table->endTable();     
                        }           

                    $table=new easyTable($pdf, '{100,90}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                        $table->easyCell(iconv("UTF-8", '','Condition'),'align:C');
                        $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                        $table->printRow();
                        
                    foreach ($coralreef_details_query as $coral) { 
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$coral->hcc."(".$coral->hcc_condition.")"),'align:L');
                        $table->easyCell(iconv("UTF-8", '',number_format($coral->coral_has,2)." has."),'align:R');                    
                        $table->printRow();
                    }  
                    foreach ($coral_sum as $sum) { 
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                        $table->easyCell(iconv("UTF-8", '',number_format($sum->coral_sum_area,2)." has."),'align:R;font-color:#ff3333;font-style:B');                    
                        $table->printRow();
                    }                    
                    $table->endTable(5);

                    $j=0;
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                    $table->easyCell(iconv("UTF-8", '','Dominant Species'),'align:C');
                    $table->printRow();

                    foreach ($coralreefspecies_details_query as $coralspecies) {  

                    $j++;  
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');                     
                    $table->easyCell(iconv("UTF-8", '',$j.") ".$coralspecies->coral_species_name),'font-style:italic');
                    $table->printRow();
                    }         
                    $table->endTable(5);
                    }
                }
                if ($chk_seagrass == 1) {
                    if (!empty($seagrass) || !empty($seagrass_details_query) || !empty($seagrassspecies_details_query)){
                        $pdf->AddPage('P','A4',0);  
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('SEAGRASS BED', 'align:L;font-size:12;font-style:B');
                            $table->printRow();             
                        $table->endTable(); 
                        if (!empty($seagrass)) {
                            $pdf->SetFont('Times','',12);
                            foreach ($seagrass as $seg) {
                                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                    if (empty($seg->seagrass_map)) {
                                        $table->easyCell('No map image','img:bmb_assets2/upload/seagrass_map/nophoto.jpg, w280,h320;font-style:I');
                                    }else{
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/seagrass_map/'.$seg->seagrass_map.', w280,h320;font-style:I');                                
                                    } 
                                    $table->printRow();
                                $table->endTable();     
                            }
                        }
                        $table=new easyTable($pdf, '{100,90}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                                $table->easyCell(iconv("UTF-8", '','Condition'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                            $table->printRow();
                        
                            foreach ($seagrass_details_query as $seagrass) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',$seagrass->seagrass_condition."(".$seagrass->seagrass_coverage.")"),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($seagrass->seagrass_area,2)." has."),'align:R');                    
                                $table->printRow();
                            }  
                            foreach ($seagrass_sum as $sum) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',number_format($sum->seagrass_sum_area,2)." has."),'align:R;font-color:#ff3333;font-style:B');                    
                                $table->printRow();
                            }                    
                        $table->endTable(5);

                        $j=0;
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                }
                if ($chk_mangrove == 1) {
                          
                    if (!empty($mangrove) || !empty($mangrove_details_query) || !empty($mangrovespecies_details_query)){                        
                        $pdf->AddPage('P','A4',0);  
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('MANGROVE BED', 'align:L;font-size:12;font-style:B');
                            $table->printRow();             
                        $table->endTable();    
                        $pdf->SetFont('Times','',12);
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                foreach ($mangrove as $mangrov) {
                                    if (empty($mangrov->mangrove_map)) {
                                        $table->easyCell('No map image','img:bmb_assets2/upload/mangrove_map/nophoto.jpg, w280,h320;font-style:I');
                                    }else{
                                        $table->easyCell('Map image shows','img:bmb_assets2/upload/mangrove_map/'.$mangrov->mangrove_map.', w280,h320;font-style:I');                                
                                    } 
                                } 
                            $table->printRow();
                        $table->endTable();   

                        $table=new easyTable($pdf, '{130,60}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                                $table->easyCell(iconv("UTF-8", '','Condition'),'align:C');
                                $table->easyCell(iconv("UTF-8", '','Area(has)'),'align:C');
                            $table->printRow();                        
                            foreach ($mangrove_details_query as $mangroves) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '',$mangroves->mangrove_conditions."(".$mangroves->mangrove_criteria.")"),'align:L');
                                    $table->easyCell(iconv("UTF-8", '',number_format($mangroves->mangrove_area,2)." has."),'align:R');                    
                                $table->printRow();
                            } 
                            foreach ($mangrove_sum as $sum) { 
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                                    $table->easyCell(iconv("UTF-8", '',number_format($sum->mangrove_sum_area,2)." has."),'align:R;font-color:#ff3333;font-style:B');                    
                                $table->printRow();
                            }                    
                        $table->endTable(5); 
                        $j=0;
                        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                                $table->easyCell(iconv("UTF-8", '','Dominant Species'),'align:C');
                            $table->printRow();
                            foreach ($mangrovespecies_details_query as $mangrovespecies) { 
                                $j++;  
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;');                     
                                    $table->easyCell(iconv("UTF-8", '',$j.") ".$mangrovespecies->mangrove_name."<i> (".$mangrovespecies->mangrove_scientific_name.")</i>"));
                                $table->printRow();
                            }         
                        $table->endTable(5); 
                    // foreach ($mangrovespecies_details_query as $mangrovespecies) {  
                    // $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Existing species in the area:</s>'."\n<i>".$mangrovespecies->mangrovespeciest."</i>"));
                    // }                            
                    // $table->printRow();
                    // $table->endTable(5);
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
        if (!empty($countbiological) || !empty($countbiologicalflora)) {
        $pdf->AddPage('P','A4',0);            
        $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $pdf->SetFont('Times','B',18);   
            $pdf->ln(3);  
            $pdf->Cell(0,0,'BIOLOGICAL FEATURES',0,1,'L');
            $pdf->ln(3);        
            $table->printRow();
        $table->endTable(5); 
        }    

        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;bgcolor:#cccccc');
            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#e6e6e6;font-color:#000'); 
                $table->easyCell('FLORA AND FAUNA', 'align:C;font-size:18;font-style:B');
                $table->printRow();
        $table->endTable();     
        $pdf->SetFont('Times','',12); 
        $chk_cr = $this->input->post('chk-bcr');         
        $CRCountFauna = $this->pamain_report->queryCountCRFuana($gencode);        
        $CRCountFlora = $this->pamain_report->queryCountCRFlora($gencode);        
        $CRFAUNA = $this->pamain_report->queryFaunaLimitCR($gencode,$noofdisplaybio);
        $CRFLORA = $this->pamain_report->queryFloraLimitCR($gencode,$noofdisplaybio);
        if ($chk_cr==1) {
            if (!empty($CRCountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                    $table->easyCell('Critical Endangered Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($CRFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                    $table->easyCell('Critical Endangered Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($CRFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
                        $table->easyCell(iconv("UTF-8", '',$row->commonNameSpecies."\n<i>".$row->scientificName_genus."</i>"),'align:L;font-size:12;');    
                        $table->easyCell($row->OrderDesc, 'align:L;font-size:12');
                        $table->easyCell($row->ClassDesc, 'align:L;font-size:12');
                        $table->easyCell($row->residency_desc, 'align:L;font-size:12');
                        $table->easyCell((($row->chk_forest==1)?"Forest\n":" ").(($row->chk_inland==1)?"Inland Wetland\n":" ").(($row->chk_cave==1)?"Cave\n":" ").(($row->chk_coral==1)?"Coral Reef\n":" ").(($row->chk_seagrass==1)?"Seagrasses\n":" ").(($row->chk_mangrove==1)?"Mangrove":" "), 'align:L;font-size:12');
                        $table->printRow();
                    }                  
                $table->endTable(10);
                // $table=new easyTable($pdf, '{70,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
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

        $chk_en = $this->input->post('chk-ben');
        $ENFaunaCount = $this->pamain_report->queryCountEN($gencode);
        $ENFloraCount = $this->pamain_report->queryCountENFlora($gencode);
        $ENFAUNA = $this->pamain_report->queryFaunaLimitEN($gencode,$noofdisplaybio);
        $ENFLORA = $this->pamain_report->queryFloraLimitEN($gencode,$noofdisplaybio);
        if ($chk_en==1) {
            if (!empty($ENFaunaCount)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                    $table->easyCell('Endangered Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($ENFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ff0000;font-color:#ffffff'); 
                    $table->easyCell('Endangered Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($ENFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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

        $chk_vu = $this->input->post('chk-vu');
        $VUCountFAUNA = $this->pamain_report->queryCountVUFAUNA($gencode);
        $VUCountFLORA = $this->pamain_report->queryCountVUFLORA($gencode);
        $VUFAUNA = $this->pamain_report->queryFaunaLimitVUFAUNA($gencode,$noofdisplaybio);
        $VUFLORA = $this->pamain_report->queryFaunaLimitVUFLORA($gencode,$noofdisplaybio);
        if ($chk_vu==1) {
            if (!empty($VUCountFAUNA)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffc34d;font-color:#ffffff'); 
                    $table->easyCell('Vulnerable Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($VUFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#ffc34d;font-color:#ffffff'); 
                    $table->easyCell('Vulnerable Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($VUFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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

        $chk_ew = $this->input->post('chk-ew');
        $EWCountFauna = $this->pamain_report->queryCountEWFauna($gencode);
        $EWCountFlora = $this->pamain_report->queryCountEWFlora($gencode);
        $EWFAUNA = $this->pamain_report->queryFaunaLimitEW($gencode,$noofdisplaybio);
        $EWFLORA = $this->pamain_report->queryFloraLimitEW($gencode,$noofdisplaybio);
        if ($chk_ew==1) {
            if (!empty($EWCountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                    $table->easyCell('Extinct in the Wild Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($EWFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                    $table->easyCell('Extinct in the Wild Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($EWFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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


        $chk_ex = $this->input->post('chk-ex');
        $EXCountFauna = $this->pamain_report->queryCountEXFuana($gencode);
        $EXCountFlora = $this->pamain_report->queryCountEXFlora($gencode);
        $EXFAUNA = $this->pamain_report->queryFaunaLimitEX($gencode,$noofdisplaybio);
        $EXFLORA = $this->pamain_report->queryFloraLimitEX($gencode,$noofdisplaybio);
        if ($chk_ex==1) {
            if (!empty($EXCountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                    $table->easyCell('Extinct Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($EXFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#4d004d;font-color:#ffffff'); 
                    $table->easyCell('Extinct Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($EXFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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

        $chk_lc = $this->input->post('chk-lc');
        $LCCountFuana = $this->pamain_report->queryCountLCFauna($gencode);
        $LCCountFlora = $this->pamain_report->queryCountLCFlora($gencode);
        $LCFAUNA = $this->pamain_report->queryFaunaLimitLC($gencode,$noofdisplaybio);
        $LCFLORA = $this->pamain_report->queryFloraLimitLC($gencode,$noofdisplaybio);
        if ($chk_lc==1) {
            if (!empty($LCCountFuana)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009900;font-color:#ffffff'); 
                    $table->easyCell('Least Concern Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($LCFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#009900;font-color:#ffffff'); 
                    $table->easyCell('Least Concern Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($LCFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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

        $chk_dd = $this->input->post('chk-bdd');
        $DDCountFuana = $this->pamain_report->queryCountDDFauna($gencode);
        $DDCountFlora = $this->pamain_report->queryCountDDFlora($gencode);
        $DDFAUNA = $this->pamain_report->queryFaunaLimitDD($gencode,$noofdisplaybio);
        $DDFLORA = $this->pamain_report->queryFloraLimitDD($gencode,$noofdisplaybio);
        if ($chk_dd==1) {
            if (!empty($DDCountFuana)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#808080;font-color:#ffffff'); 
                    $table->easyCell('Data Defecient Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($DDFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#808080;font-color:#ffffff'); 
                    $table->easyCell('Data Defecient Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($DDFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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

        $chk_nt = $this->input->post('chk-nt');
        $NTCountFauna = $this->pamain_report->queryCountNTFauna($gencode);
        $NTCountFlora = $this->pamain_report->queryCountNTFlora($gencode);
        $NTFAUNA = $this->pamain_report->queryFaunaLimitNT($gencode,$noofdisplaybio);
        $NTFLORA = $this->pamain_report->queryFloraLimitNT($gencode,$noofdisplaybio);
        if ($chk_nt==1) {
            if (!empty($NTCountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#99cc00;font-color:#000'); 
                    $table->easyCell('Not Threatened Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($NTFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#99cc00;font-color:#000'); 
                    $table->easyCell('Not Threatened Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($NTFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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


        $chk_ne = $this->input->post('chk-ne');
        $NECountFauna = $this->pamain_report->queryCountNEFauna($gencode);
        $NECountFlora = $this->pamain_report->queryCountNEFlora($gencode);
        $NEFAUNA = $this->pamain_report->queryFaunaLimitNE($gencode,$noofdisplaybio);
        $NEFLORA = $this->pamain_report->queryFloraLimitNE($gencode,$noofdisplaybio);
        if ($chk_ne==1) {
            if (!empty($NECountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                    $table->easyCell('Not Evaluated Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($NEFAUNA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                    $table->easyCell('Not Evaluated Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($NEFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
        
        $chk_ots = $this->input->post('chk-ots');
        $OTSCountFauna = $this->pamain_report->queryCountOTSFauna($gencode);
        $OTSCountFlora = $this->pamain_report->queryCountOTSFlora($gencode);
        $OTSFUANA = $this->pamain_report->queryFaunaLimitOTS($gencode,$noofdisplaybio);        
        $OTSFLORA = $this->pamain_report->queryFloraLimitOTS($gencode,$noofdisplaybio);        
        if ($chk_ots==1) {
            if (!empty($OTSCountFauna)) {
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                    $table->easyCell('Other Threatened Fauna', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($OTSFUANA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
                $table=new easyTable($pdf, '{50,40,25,25,50}', 'width:190; border-color:#ffff00; font-size:12; border:0;bgcolor:#f2f2f2');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#ffffff'); 
                    $table->easyCell('Other Threatened Flora', 'align:C;font-size:12;colspan:5;font-style:B');
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#fff;bgcolor:#b3b3b3;font-color:#000'); 
                    $table->easyCell('Species name', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Order', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Class', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Residency Status', 'align:C;font-size:12;font-style:B');
                    $table->easyCell('Known Habitats/Ecosystem', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    foreach ($OTSFLORA as $row) {                       
                        $table->rowStyle('border:TBLR;border-color:#b3b3b3;bgcolor:#f2f2f2;font-color:#000'); 
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
        $chk_slr = $this->input->post('chk-slr');
        $chk_otherhazard = $this->input->post('chk-othegeohazard');
        if ($chk_topo == 1) {            
            $i=0;
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                    $table->easyCell('PHYSICAL FEATURES', 'align:L;font-size:18;font-style:B');
                $table->printRow();             
            $table->endTable();
            if (!empty($slope_details_query)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('TOPOGRAPHY AND SLOPE', 'align:L;font-size:12;font-style:B');
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


                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if ($query_count_slopeImage <= 0) {
                        $table->easyCell('No map image show','img:bmb_assets2/upload/topology_img/nophoto.jpg','w280,h240;font-style:italic');
                    } else {
                        foreach ($slope_query as $slope) {
                            $table->easyCell('Map image shows','img:bmb_assets2/upload/topology_img/'.$slope->topo_map.', w280,h240;font-style:italic');
                        }
                    }
                    $table->easyCell('','img:bmb_assets2/upload/topology_img/nophoto.jpg');
                    $table->printRow();
                    
                $table->endTable();


            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;');
            $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
            $table->printRow();
            foreach ($slope_details_query as $slope_d) {  
                $i++;
                $table->rowStyle('border:TB;border-color:#a1a1a1;');
                $table->easyCell(iconv("UTF-8", '',$i.") ".$slope_d->topology_desc ),'align:L');
                $table->printRow();
                
            }
            $table->endTable(10);
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

                $pdf->AddPage('P','A4',0);            
                    $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('ROCK FORMATION', 'align:L;font-size:12;colspan:2;font-style:B');
                        $table->printRow();             
                    $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($rock_details_query)) {      
                        if ($countrock <= 0) {
                        $table->easyCell('No map image show','img:bmb_assets2/upload/rock_img/nophoto.jpg','w280,h260;font-style:italic');
                        } else {
                            foreach ($rock_query as $rock) {
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/rock_img/'.$rock->rock_img.', w280,h260;font-style:italic');
                            }
                        }
                    }
                    $table->printRow();         
                $table->endTable();               
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($rock_details_query as $rockd) {
                        $i++;
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$i.") ".$rockd->rock_details ),'align:L');   
                        $table->printRow();
                    }
                $table->endTable(5);
            }
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
                $pdf->AddPage('P','A4',0);            
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('SOIL TYPE', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();

                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($soil_details_query)) {
                        if ($countsoil <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/soil_img/nophoto.jpg','w280,h260;font-style:italic');
                        } else {
                            foreach ($soil_query as $soil) {
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/soil_img/'.$soil->geology_map.', w280,h260;font-style:italic');
                            }
                        }
                    }
                    $table->printRow();                
                $table->endTable();
                
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($soil_details_query as $soil_d) { 
                        $i++;
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$i.") ".$soil_d->geology_desc ),'align:L');  
                        $table->printRow();
                        
                    }
                $table->endTable(5);
            }
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
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('CLIMATE TYPE', 'align:L;font-size:12;colspan:2;font-style:B;text-align:C;');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                        if (!empty($climate_details_query)) {
                            if ($countclimate <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/climate_img/nophoto.jpg','w280,h260;font-style:italic');
                            } else {
                                foreach ($climate_query as $climate) {
                                    $table->easyCell('Map image shows','img:bmb_assets2/upload/climate_img/'.$climate->climate_img.', w280,h260;font-style:italic');
                                }
                            }
                        }
                    $table->printRow();                
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{50,140}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('HYDROLOGY/RIVER SYSTEM', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($hydro_query)) {         
                        if ($counthydro <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/hydrology_img/nophoto.jpg','font-style:italic');
                        } else {
                            foreach ($hydro_query as $hydro) {
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/hydrology_img/'.$hydro->hydro_img.', w280,h260;font-style:italic');
                            }
                        }
                    }
                    $table->printRow();                
                $table->endTable();
                
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($hydro_details_query as $hydro_d) {    
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',"Water Classification : ".$hydro_d->id_waterClassDesc."\n Water Sub Classification : ".$hydro_d->waterClass."\n River – Inflow : ".$hydro_d->riverinflow."\n River – Outflow : ".$hydro_d->riveroutflow."\n Remarks : ".$hydro_d->hydro_desc),'align:L');
                        $table->printRow();
                }
                $table->endTable(5);
            }
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
            $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('EXISTING LANDUSE', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($exlanduse)) {
                        if ($countexlanduse <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/existinglanduse_img/nophoto.jpg','font-style:italic');
                        }else{
                            foreach ($exlanduse as $landuse) {
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/existinglanduse_img/'.$landuse->landuse_img.', w280,h260;font-style:italic');  
                            }
                        }
                    }
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{120,80}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',"GRAND TOTAL"),'align:L;font-color:#ff3333;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',$gtel." has."),'align:R;font-color:#ff3333;font-style:B');
                        $table->printRow();
                $table->endTable(5);
            }
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
            
        $pdf->AddPage('P','A4',0);
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;'); 
                $table->easyCell('GEOHAZARD FEATURES', 'align:L;font-size:18;colspan:2;font-style:B');
            $table->printRow();     
        $table->endTable();

        if ($chk_landslide == 1) {
            ###########################################################
            ##                                                       ##
            ##              Landslide Susceptibility                 ##
            ##                                                       ##
            ###########################################################

            if (!empty($countlandslide)) {
                $pdf->SetFont('Times','',12); 
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('LANDSLIDE SUSCEPTIBILITY', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();     
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($landslide_details_query)) {  
                        if ($countlandslide <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/landslide_img/nophoto.jpg','font-style:italic');
                        }else{ 
                            foreach ($landslide_query as $land) {                    
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/landslide_img/'.$land->landslide_img.', w280, h260;font-style:italic');  
                            }
                        }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#adad9a;bgcolor:#adad9a');
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
                       $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',number_format($gtlsa->GTlsa,2).' has.'),'align:R;font-color:#ff3333;font-style:B');
                        $table->printRow();
                    }                    
                $table->endTable();
            }
        }

        if ($chk_flooding == 1) {
            ###########################################################
            ##                                                       ##
            ##              Flooding Susceptibility                  ##
            ##                                                       ##
            ###########################################################            
            if (!empty($countflood)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('FLOODING SUSCEPTIBILITY', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($flooding_details_query)) {  
                        if ($countflood <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/flooding_img/nophoto.jpg','font-style:italic');
                        }else{ 
                            foreach ($flood_query as $data) {                    
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/flooding_img/'.$data->flooding_img.', w280, h260;font-style:italic');  
                            }
                        }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0; 
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#adad9a;bgcolor:#adad9a');
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
                       $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                            $table->easyCell(iconv("UTF-8", '',number_format($gtflood->GTflood,2).' has.'),'align:R;font-color:#ff3333;font-style:B');
                        $table->printRow();
                    }                    
                $table->endTable();
            }            
        }

        if ($chk_slr == 1) {
            ###########################################################
            ##                                                       ##
            ##              Sea Level Susceptibility                 ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_sealevel)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('SEA LEVEL RISE', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($sealevel_details_query)) {  
                        if ($query_count_sealevel <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/sealevel_img/nophoto.jpg','font-style:italic');
                        }else{ 
                            foreach ($sealevel_query as $data) {                    
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/sealevel_img/'.$data->sea_img.', w280, h260;font-style:italic');  
                            }
                        }
                    }                
                    $table->printRow();
                $table->endTable();
                $i=0;
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($sealevel_details_query as $sealevel) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$sealevel->sea_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);                
            }
        }

        $chk_stormsurge = $this->input->post('chk-surge');
        if ($chk_stormsurge == 1) {
            ###########################################################
            ##                                                       ##
            ##                      STORM SURGE                      ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_tsunami)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('STORM SURGE', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($tsunami_details_query)) {  
                        if ($query_count_tsunami <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/tsunami_img/nophoto.jpg','font-style:italic');
                        }else{ 
                            foreach ($storm_query as $data) {                    
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/tsunami_img/'.$data->tsunami_img.', w280, h260;font-style:italic');  
                            }
                        }
                    }                
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($tsunami_details_query as $data) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$data->tsunami_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);                      
            }
        }                

        $chk_fault = $this->input->post('chk-faultline');
        if ($chk_fault == 1) {
            ###########################################################
            ##                                                       ##
            ##                      FAULT LINE                       ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($query_count_fault)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('FAULT LINE', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
           
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                    if (!empty($fault_details_query)) {  
                        if ($query_count_fault <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/fire_img/nophoto.jpg','font-style:italic');
                        }else{ 
                            foreach ($fault_query as $data) {                    
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/fire_img/'.$data->fire_img.', w280, h260;font-style:italic');  
                            }
                        }
                    }                
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                    $table->printRow();
                    foreach ($fault_details_query as $data) {    
                        $table->rowStyle('border:TB;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$data->fire_desc),'align:L');
                        $table->printRow();
                    }
                $table->endTable(5);
            }
        }
        if ($chk_fault == 1) {
            ###########################################################
            ##                                                       ##
            ##           OTHER GEOHAZARD Susceptibility              ##
            ##                                                       ##
            ###########################################################
            
            if (!empty($countogeohazard)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                        $table->easyCell('OTHER GEOHAZARD FEATURES', 'align:L;font-size:12;colspan:2;font-style:B');
                    $table->printRow();             
                $table->endTable();
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    foreach ($ogeohazard_query as $data) { 
                        if (!empty($ogeohazard_details_query)) {  
                            if ($countogeohazard <= 0) {
                                $table->easyCell('No map image show','img:bmb_assets2/upload/other_geohazard_img/nophoto.jpg','font-style:italic');
                            }else{ 
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#adad9a');
                                $table->easyCell('Map image shows','img:bmb_assets2/upload/other_geohazard_img/'.$data->geohazard_map.', w280, h260;font-style:italic');  
                            $table->printRow();         

                             $table->rowStyle('border:;border-color:#a1a1a1;');
                                $table->easyCell(iconv("UTF-8", '',"Map description"),'align:C;font-style:italic');    
                            $table->printRow();               

                            $table->rowStyle('border:;border-color:#a1a1a1');
                                $table->easyCell(iconv("UTF-8", '',$data->geohazard_desc),'align:L');
                            $table->printRow();                        

                            }
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
        ###########################################################
        ##                                                       ##
        ##                      DEMOGRAPHIC                      ##
        ##                                                       ##
        ###########################################################
        $chk_demograph = $this->input->post('chk-demographic');
        $countdemo = $this->pamain_report->query_count_demograph($gencode);
        $demogroupbybarangay = $this->pamain_report->getAllbarangayseamsG($gencode);
        $compute = $this->pamain_report->SumDemoPerBrgy($gencode);
        $GTcompute = $this->pamain_report->GrandTotalDemoSeams($gencode);
        $pdf->AddPage('P','A4',0);
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;');
            $table->easyCell('SOCIO-ECONOMIC AND CULTURAL FEATURES', 'font-size:18;font-style:B');
        $table->printRow();
        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
            $table->easyCell('DEMOGRAPHIC INFORMATION', 'align:L;font-size:12;font-style:B');
            $table->printRow(); 
        $table->endTable();        
        if ($chk_demograph==1) {        
                $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                $table->easyCell('NO. OF HOUSEHOLD MEMBER(Including household head)', 'align:C;font-size:12;colspan:4;font-style:B');
                $table->printRow();  
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                $table->easyCell(iconv("UTF-8", '','Location'),'align:L');
                $table->easyCell(iconv("UTF-8", '','Male'),'align:R');
                $table->easyCell(iconv("UTF-8", '','Female'),'align:R');
                $table->easyCell(iconv("UTF-8", '','Total'),'align:R');
                $table->printRow();
            foreach ($demogroupbybarangay as $barangay) {
                $table->rowStyle('border:TBLR;border-color:#95989c');
                $table->easyCell(iconv("UTF-8", '',$barangay->provinceName.", ".$barangay->municipalName.", ".$barangay->barangayName),'align:L');
                foreach ($compute as $row) {
                    if ($barangay->seams_barangay == $row->id_b) {
                        $table->easyCell(iconv("UTF-8", '',$row->total_male),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$row->total_female),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$row->GTseamss),'align:R');
                    }
                }
                $table->printRow();    
            }
            $table->rowStyle('border:TBLR;border-color:#a1a1a1');
                $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                foreach ($GTcompute as $gt) {
                    $table->easyCell(iconv("UTF-8", '',$gt->total_male),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->total_female),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->GTseamss),'align:R;font-color:#ff0000;font-style:B');
                }
                
                $table->printRow();
            $table->endTable();

            $tenuredbarangay = $this->pamain_report->getAllbarangayseamsTenuredMIgrant($gencode);
            $computeT = $this->pamain_report->SumDemoPerBrgyTenureMigrant($gencode);
            $GTcomputeMigrant = $this->pamain_report->GrandTotalDemoSeamsTenureMigrant($gencode);
            $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#fff'); 
            $table->easyCell('NO. OF TENURED MIGRANT', 'align:C;font-size:12;colspan:4;font-style:B');
            $table->printRow();
            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
            $table->easyCell(iconv("UTF-8", '','Location'),'align:L');
            $table->easyCell(iconv("UTF-8", '','Male'),'align:C');
            $table->easyCell(iconv("UTF-8", '','Female'),'align:C');
            $table->easyCell(iconv("UTF-8", '','Total'),'align:C');
            $table->printRow();
            foreach ($tenuredbarangay as $barangay) {
                $table->rowStyle('border:TBLR;border-color:#95989c');
                $table->easyCell(iconv("UTF-8", '',$barangay->provinceName.", ".$barangay->municipalName.", ".$barangay->barangayName),'align:L');
                foreach ($computeT as $row) {
                    if ($barangay->seams_barangay == $row->id_b) {
                        $table->easyCell(iconv("UTF-8", '',$row->total_male),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$row->total_female),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$row->GTseamss),'align:R');
                    }
                }
            $table->printRow();                
            }
            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:');
                $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                foreach ($GTcomputeMigrant as $gt) {
                    $table->easyCell(iconv("UTF-8", '',$gt->total_male),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->total_female),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->GTseamss),'align:R;font-color:#ff0000;font-style:B');
                }
                
                $table->printRow();
            $table->endTable();

            $iccipslist = $this->pamain_report->getAlliccip($gencode);
            $iccipslistcount = $this->pamain_report->getAlliccipMigrant($gencode);
            $GTcomputeMigrant1 = $this->pamain_report->GrandTotalgetAlliccipMigrant($gencode);

            $table=new easyTable($pdf, '{100,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#000;font-color:#fff'); 
            $table->easyCell('NO. OF ICC/IPs', 'align:C;font-size:12;colspan:4;font-style:B');
            $table->printRow();
            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
            $table->easyCell(iconv("UTF-8", '','Location'),'align:L');
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
                        $table->easyCell(iconv("UTF-8", '',$rowt->total_male),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$rowt->total_female),'align:R');
                        $table->easyCell(iconv("UTF-8", '',$rowt->GTseamss),'align:R');
                    }
                }
            $table->printRow();                
            }
            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:');
                $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff0000;font-style:B');
                foreach ($GTcomputeMigrant1 as $gt) {
                    $table->easyCell(iconv("UTF-8", '',$gt->total_male),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->total_female),'align:R;font-color:#ff0000;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',$gt->GTseamss),'align:R;font-color:#ff0000;font-style:B');
                }
                
                $table->printRow();
            $table->endTable();
        }



        ###########################################################
        ##                                                       ##
        ##                      BDFE                             ##
        ##                                                       ##
        ###########################################################
        $chk_bdfe = $this->input->post('chk-bdfe');
        $countbdfe = $this->pamain_report->query_count_bdfe($gencode);
        $bdfe = $this->pamain_report->getAllBDFE($gencode);

        if ($chk_bdfe == 1) {
            if (!empty($bdfe)) {               
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('BIODIVERSITY-FRIENDLY ENTERPRISE (BDFE)', 'align:L;font-size:12;font-style:B');
                $table->printRow();             
                $table->endTable();

                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:BT;border-color:#a1a1a1;'); 
                foreach ($bdfe as $rowbdfe) {
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
                        '<s "font-color:#234fa7">Type of Enterprise : </s> '.$rowbdfe->lh_type."\n".
                        (!empty($rowbdfe->lh_desc)?'<s "font-color:#234fa7;align:L">Enterprise Description</s>'."\n".$rowbdfe->lh_desc."\n":"").
                        '<s "font-color:#234fa7">Location : </s> '.$rowbdfe->provinceName.", ".$rowbdfe->municipalName.", ".$rowbdfe->barangayName."\n".
                        '<s "font-color:#234fa7">Coordinates : </s> '.(!empty($longdir)?$longdir:"")." ".$rowbdfe->lh_long_dms_degree."° ".$rowbdfe->lh_long_dms_minute."' ".$rowbdfe->lh_long_dms_second."'' (".$rowbdfe->lh_long_dd.")"." / ".(!empty($latdir)?$latdir:"")." ".$rowbdfe->lh_lat_dms_degree."° ".$rowbdfe->lh_lat_dms_minute."' ".$rowbdfe->lh_lat_dms_second."'' (".$rowbdfe->lh_lat_dd.")"."\n".
                        '<s "font-color:#234fa7">Area(has) : </s> '.$rowbdfe->lh_area."has."."\n".
                        '<s "font-color:#234fa7">Date of Assessed : </s> '.$rowbdfe->lh_assessed_month_frm."/".$rowbdfe->lh_assessed_day_frm."/".$rowbdfe->lh_assessed_year_frm."-".$rowbdfe->lh_assessed_month_to."/".$rowbdfe->lh_assessed_day_to."/".$rowbdfe->lh_assessed_year_to."\n".
                        '<s "font-color:#234fa7">Offices/Agencies involved in the Operations : </s> '.$rowbdfe->office_involved."\n".
                        '<s "font-color:#234fa7">Number of PO Members : </s> '."M(".$rowbdfe->lh_po_male.") F(".$rowbdfe->lh_po_female.") Total(".$totalpos.")\n".
                        '<s "font-color:#234fa7">Other source of assistance : </s> '.$rowbdfe->other_source_assistance."\n".
                        '<s "font-color:#234fa7">Project Proposal : </s> '.$prop."\n".
                        '<s "font-color:#234fa7">Business Plan : </s> '.$bp."\n".
                        '<s "font-color:#234fa7">Regional approved WFP : </s> '.$wfp."\n".
                        '<s "font-color:#234fa7">Memorandum of Agreement : </s> '.$moa."\n".
                        '<s "font-color:#234fa7">Rating : </s> '."Ecological (".$rowbdfe->lh_ecological."%)|Economic (".$rowbdfe->lh_economic."%)|Equity (".$rowbdfe->lh_equity."%)|Total Rating (".$rowbdfe->lh_total_rating."%)\n".
                        '<s "font-color:#234fa7">Capacity Needs : </s> '."\n".$rowbdfe->capacity_desc."\n"

                ),'align:L');                
                $table->printRow();
                }
                $table->endTable();
            }
        }

        $chk_cultu = $this->input->post('chk-cultural');
        $chk_instit = $this->input->post('chk-institutional');

        ###########################################################
        ##                                                       ##
        ##                   CULTURAL PROFILE                    ##
        ##                                                       ##
        ###########################################################
        if ($chk_cultu == 1) {
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
            $table->easyCell('CULTURAL PROFILE', 'align:L;font-size:12;font-style:B');
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

        ###########################################################
        ##                                                       ##
        ##                     MANAGEMENT ZONE                   ##
        ##                                                       ##
        ###########################################################

        $chk_strict = $this->input->post('chk-strict');
        $chk_multiple = $this->input->post('chk-multiple');
        $countmgmtzone = $this->pamain_report->count_managementzone($gencode);
        $query_managementzone = $this->pamain_report->query_managementzone($gencode);
        $query_count_managementzone = $this->pamain_report->query_count_managementzone($gencode);
        $strictq = $this->pamain_report->query_strictprot($gencode);
        $multiusedzone = $this->pamain_report->query_multizone($gencode);
        $GTstrict = $this->pamain_report->query_SUMstrict($gencode);
        $GTmultiple = $this->pamain_report->query_SUMmultiple($gencode);


    if ($chk_strict == 1) {
        if (!empty($query_managementzone) || !empty($strictq) || !empty($multiusedzone)) {
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
            $table->rowStyle('border:;border-color:#a1a1a1;'); 
            $table->easyCell('MANAGEMENT PLANNING', 'align:L;font-size:18;font-style:B');
            $table->printRow();             
            $table->endTable();    
            if (!empty($countmgmtzone)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('MANAGEMENT ZONE', 'align:L;font-size:12;font-style:B');
                $table->printRow();             
                $table->endTable();                
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    if ($query_count_managementzone <= 0) {
                        $table->easyCell('No map image show','img:bmb_assets2/upload/managementzone_img/nophoto.jpg','w280,h260;');
                    } else {
                        foreach ($query_managementzone as $mgmtzone) {
                            $table->easyCell('Map image shows','img:bmb_assets2/upload/managementzone_img/'.(!empty($mgmtzone->managementzone_image)?$mgmtzone->managementzone_image:"nophoto.jpg").', w280,h260;');
                        }
                    }
                    $table->easyCell('','img:bmb_assets2/upload/managementzone_img/nophoto.jpg');
                    $table->printRow();
                    
            $table->endTable();
            $table=new easyTable($pdf, '{100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','STRICT PROTECTION ZONE'),'align:C;colspan:3');
                    $table->printRow();

                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                    $table->easyCell(iconv("UTF-8", '',$stprot->s_area." has." ),'align:R');
                    $table->printRow();
                    
                }
                foreach ($GTstrict as $row) {
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',number_format($row->total_strict,2)." has."),'align:R;font-color:#ff3333;font-style:B;colspan:2');
                    $table->printRow();
                    
                }
            $table->endTable(10);

            $table=new easyTable($pdf, '{100,100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','MULTIPLE USED ZONE'),'align:C;colspan:3');
                    $table->printRow();

                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');                   
                    $table->easyCell(iconv("UTF-8", '','Category'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Archipelagic Sea Lanes'),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Area'),'align:C');
                    $table->printRow();
                foreach ($multiusedzone as $muz) { 
                   
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '',($muz->multicat==1)?"Terrestrial":"Aquatic"),'align:L');
                    $table->easyCell(iconv("UTF-8", '',($muz->multiarchipelagic==1)?"Yes":"No"),'align:C');
                    $table->easyCell(iconv("UTF-8", '',$muz->area." has." ),'align:R');
                    $table->printRow();                    
                }
                foreach ($GTmultiple as $rowm) {
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                    $table->easyCell(iconv("UTF-8", '','GRAND TOTAL'),'align:L;font-color:#ff3333;font-style:B');
                    $table->easyCell(iconv("UTF-8", '',number_format($rowm->total_multi,2)." has."),'align:R;font-color:#ff3333;font-style:B;colspan:2');
                    $table->printRow();
                    
                }
            $table->endTable(10);
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
        $pdf->AddPage('P','A4',0);
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
        $table->rowStyle('border:TB;border-color:#a1a1a1;');
        $table->easyCell('ECOTOURISM', 'font-size:18;font-style:B');
        $table->printRow();
        $table->endTable();
        if ($chk_attraction == 1) {
            if (!empty($count_attraction) || !empty($countMapAttraction)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('ATTRACTION/ACTIVITIES', 'align:L;font-size:12;font-style:B');
                $table->printRow();             
                $table->endTable();                
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    if ($countMapAttraction <= 0) {
                        $table->easyCell('No map image show','img:bmb_assets2/upload/attraction_map/nophoto.jpg','w280,h310;');
                    } else {
                        foreach ($attracts as $attract) {
                            $table->easyCell('Map image shows','img:bmb_assets2/upload/attraction_map/'.$attract->attraction_img_map.', w280,h310;');
                        }
                    }
                    $table->easyCell('','img:bmb_assets2/upload/attraction_map/nophoto.jpg');
                    $table->printRow();                    
                $table->endTable();
            }
            if (!empty($count_attraction)) {
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    if ($count_attraction <=0) {
                        $table->easyCell('','img:bmb_assets2/upload/attraction_img/nophoto.jpg');                        
                        $table->printRow();   
                    }else{
                        foreach ($query_attraction as $adet) {
                            $table->easyCell('','img:bmb_assets2/upload/attraction_img/'.(!empty($adet->image_attr)?$adet->image_attr:"nophoto.jpg"),'w280,h310;');                        
                            $table->printRow();
                            $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7;font-style:B">'.$adet->title.'</s>'."\n Ecotourism Activities : ".$adet->ecotourism_activities_details),'align:L');
                            $table->printRow();   
                            $table->rowStyle('border:B;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$adet->description),'align:L');
                            $table->printRow();                 
                        }
                    }
                $table->endTable(10);
            }
        }
        
        if ($chk_facility==1) {
            if (!empty($count_facility) || !empty($countMapfacility)) {
            $pdf->AddPage('P','A4',0);
            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('FACILITY', 'align:L;font-size:12;font-style:B');
                $table->printRow();             
                $table->endTable();                
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    if ($countMapfacility <= 0) {
                        $table->easyCell('No map image show','img:bmb_assets2/upload/facility_map/nophoto.jpg','w280,h310;');
                    } else {
                        foreach ($facilMap as $facility) {
                            // $table->easyCell('Map image shows','img:bmb_assets2/upload/facility_map/'.!empty($facility->facility_map?$facility->facility_map:"nophoto.jpg").', w80,h60;');
                            $table->easyCell('Map image shows','img:bmb_assets2/upload/facility_map/'.$facility->facility_map.',w280,h320;font-style:I');
                        }
                    }
                    $table->easyCell('','img:bmb_assets2/upload/facility_map/nophoto.jpg');
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
                            $table->easyCell('','img:bmb_assets2/upload/facilities_img/'.(!empty($facq->image_facility)?$facq->image_facility:"nophoto.jpg"),'w280,h310;');                        
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
                        }
                    }
                $table->endTable(10);
            }
        }
        
        // $actvity = $this->pamain_report->query_activitymap($gencode);           
        // $query_activity = $this->pamain_report->query_activity($gencode);
        // $count_activity = $this->pamain_report->count_activity($gencode);
        // $count_activityMap = $this->pamain_report->count_activityMap($gencode);
        // if ($chk_activity==1) {
        //     if (!empty($count_activity) || !empty($count_activityMap)) {
        //     $pdf->AddPage('P','A4',0);
        //     $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
        //         $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
        //         $table->easyCell('ACTIVITIES', 'align:L;font-size:12;colspan:2;font-style:B');
        //         $table->printRow();             
        //         $table->endTable();                
        //         $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
        //             $table->rowStyle('border:;border-color:#a1a1a1;');
        //             if ($count_activityMap <= 0) {
        //                 $table->easyCell('No map image show','img:bmb_assets2/upload/activity_map/nophoto.jpg','w280,h320');
        //             } else {
        //                 foreach ($actvity as $activitys) {
        //                     $table->easyCell('Map image shows','img:bmb_assets2/upload/activity_map/'.$activitys->ecotourism_map.', w280,h320;');
        //                 }
        //             }
        //             $table->easyCell('','img:bmb_assets2/upload/activity_map/nophoto.jpg');
        //             $table->printRow();                    
        //         $table->endTable(10);
        //     }
        //     if (!empty($count_activityMap)) {
        //     $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
        //             $table->rowStyle('border:;border-color:#a1a1a1;');
        //             if ($count_activityMap <=0) {
        //                 $table->easyCell('','img:bmb_assets2/upload/activity_map/nophoto.jpg');                        
        //             }else{
        //                 foreach ($query_activity as $active) {
        //                     $table->easyCell('','img:bmb_assets2/upload/ecotourism_img/'.$active->image_eco.', w80,h60;');
        //                     $table->printRow();   
        //                     $table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7;font-style:B">'.$active->activity_title.'</s>'."\n".$active->description_activity),'align:L');
        //                     $table->printRow();                    
        //                 }
        //             }
        //         $table->endTable(10);
        //     }
        // }

        ###########################################################
        ##                      PRODUCTS                         ##
        ###########################################################
        

        if ($chk_products == 1) {
            if (!empty($query_product)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('ECOTOURISM PRODUCTS', 'align:L;font-size:12;font-style:B');
                $table->printRow(); 
                $table->endTable();         

                foreach ($query_product as $data) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    if ($data->prod_img == "") {
                        $table->easyCell('','img:bmb_assets2/upload/product_img/nophoto.jpg');
                    } else {
                        $table->easyCell('','img:bmb_assets2/upload/product_img/'.$data->prod_img.', w80,h60;');
                    }
                    $table->printRow();                    
                    $table->easyCell(iconv("UTF-8", '',$data->prod_desc),'align:L');    
                    $table->printRow();
                    $table->endTable(10);
                }           
            }
        }

        ###########################################################
        ##                      ENTERPRISE                       ##
        ###########################################################
        

        if ($chk_enterprise==1) {
            if (!empty($query_enterprise)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                $table->easyCell('ECOTOURISM ENTERPRISE', 'align:L;font-size:12;font-style:B');
                $table->printRow(); 
                $table->endTable();         

                foreach ($query_enterprise as $data) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                    if ($data->enterprise_img == "") {
                        $table->easyCell('','img:bmb_assets2/upload/enterprise_img/nophoto.jpg');
                    } else {
                        $table->easyCell('','img:bmb_assets2/upload/enterprise_img/'.$data->enterprise_img.', w80,h60;');
                    }
                    $table->printRow();
                    $table->easyCell(iconv("UTF-8", '',$data->enterprise_desc),'align:J');  
                    $table->printRow();
                    $table->endTable(10);
                }           
            }
        }
    }

        $chk_sapa = $this->input->post('chk-sapa');
        $chk_moa = $this->input->post('chk-moa');
        $chk_pacbrma = $this->input->post('chk-pacbrma');
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
    if (!empty($query_project_sapa) || !empty($query_project_moa) || !empty($query_project_pacbrma) || !empty($query_project_othertenure)) {
        
        $pdf->AddPage('P','A4',0);
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
        $table->rowStyle('border:;border-color:#a1a1a1;');
        $table->easyCell('TENURIAL INSTRUMENT', 'font-size:18;colspan:2;font-style:B');
        $table->printRow();
        $table->endTable();

        if ($chk_sapa==1) {
            if ($query_project_sapa_count !=0) {      
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc');
                    $table->easyCell('SPECIAL USE AGREEMENT IN PROTECTED AREA (SAPA)', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    $table->endTable();          
                    foreach ($query_project_sapa as $sapa) {
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
                                $table->easyCell('Holder Name : ', 'align:R;font-size:12;font-style:B');
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
                        $table->endTable(5);
                    }
            }
        }

        if ($chk_moa == 1) {
            if ($query_project_moa_count !=0) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc');
                    $table->easyCell('MEMORANDUM OF AGREEMENT (MOA)', 'align:C;font-size:12;font-style:B');
                    $table->printRow();
                    $table->endTable();     
                    foreach ($query_project_moa as $moa) {
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
                                $table->easyCell('Name of Proponent: ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$moa->moa_holder."(".$stat.")"));
                            $table->printRow();  
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Second Party : ', 'align:R;font-size:12;font-style:B');
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
                            $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                                $table->easyCell('PROTECTED AREA COMMUNICATION-BASED RESOURCE MANAGEMENT AGREEMENT(PACBRMA)', 'align:C;font-size:12;colspan:2;font-style:B');
                            $table->printRow(); 
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('PACBRMA No. : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_no."(".(!empty($stat)?$stat:"").")"));
                            $table->printRow(); 
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Name of Proponent: ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$pac->pacbrma_holder));
                            $table->printRow();  
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('People Organization : ', 'align:R;font-size:12;font-style:B');
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
                                $table->easyCell('Cost : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',(!empty($pac->pacbrma_cost)?'P'.$pac->pacbrma_cost:"")));
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
        
        $chk_othertenure = $this->input->post('chk-othertenure');
        if ($chk_othertenure) {
            if ($query_project_othertenure_count !=0) {
                foreach ($query_project_othertenure as $otenure) {
                    if ($otenure->other_instrument_status==1) {
                        $stat = '<s "font-color:#016e1e">New</s>';
                    } elseif($otenure->other_instrument_status==2) {
                        $stat = '<s "font-color:#fcdf00">Update</s>';                            
                    }elseif($otenure->other_instrument_status==3) {
                        $stat = '<s "font-color:#fc00c1">Expired</s>';                            
                    }
                    $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc'); 
                            $table->easyCell('OTHER PROTECTED AREAS', 'align:C;font-size:12;colspan:2;font-style:B');
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
                    $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc');
                    $table->easyCell('PROGRAMS', 'font-size:12;font-style:B');
                    $table->printRow();
                    $table->endTable();
                    foreach ($program as $prog) {                    
                    $table=new easyTable($pdf, '{190}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:TLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',ucwords($prog->program_name)),'font-style:B;');
                        $table->printRow();                       
                        $table->rowStyle('border:BLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$prog->program_details));
                        $table->printRow();
                    $table->endTable();
                        $i=0;
                        if ($chk_prgActivity==1) {
                            $table=new easyTable($pdf, '{100,45,45}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#df9f9f');
                                    $table->easyCell('PROGRAM ACTIVITIES', 'font-size:12;colspan:3;font-style:B');
                                $table->printRow();
                                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ffe6cc');
                                $table->easyCell('Program activity', 'align:C;font-size:12;font-style:B;');
                                $table->easyCell('Date conducted', 'align:C;font-size:12;font-style:B;');
                                $table->easyCell('Area of development', 'align:C;font-size:12;font-style:B;');
                                $table->printRow();
                                foreach ($program_activity as $pactivity) {
                                    if ($prog->id_program == $pactivity->id_program) { 
                                    $i++;    
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell($i.") ".(!empty($pactivity->program_activity)?$pactivity->program_activity:""), 'align:L;font-size:12');
                                        $table->easyCell(iconv("UTF-8", '',(!empty($pactivity->program_activity_month)?$pactivity->program_activity_month:"").(!empty($pactivity->program_activity_year)?" ".$pactivity->program_activity_year:"")));                                        
                                        $table->easyCell(iconv("UTF-8", '',(!empty($pactivity->program_activity_devt)?number_format($pactivity->program_activity_devt,2)." has.":"")),'align:R');
                                        $table->printRow();
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',"<b>Activity Output</b>\n".(!empty($pactivity->program_activity_output)?$pactivity->program_activity_output:"")),'colspan:3');
                                        $table->printRow(5);
                                    }
                                }
                            $table->endTable(5);
                        }
                        
                        $b=0;
                        if ($chk_prgProject == 1) {
                            foreach ($program_project as $pproject) {
                                if (!empty($pproject)) {
                                    if ($prog->id_program == $pproject->id_program) {
                                        if ($pproject->source_fund=="Foreign Assisted") {
                                            $source = "Foreign Assisted";
                                        }elseif ($pproject->source_fund=="Government Fund") {
                                            $source = "Government Fund";
                                        }if ($pproject->source_fund=="Both: Foreign Assisted and Government Fund") {
                                            $source = "Foreign Assisted and Foreign Assisted";
                                        }
                                        $b++;
                                        $table=new easyTable($pdf, '{50,40,60,40}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#df9f9f');
                                            $table->easyCell('PROGRAM PROJECTS', 'align:L;font-size:12;font-style:B;colspan:4');
                                        $table->printRow();
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ffe6cc');
                                            $table->easyCell('Project and Proponent Name', 'align:C;font-size:12;font-style:B;');
                                            $table->easyCell('Area', 'align:C;font-size:12;font-style:B;');
                                            $table->easyCell('Location', 'align:C;font-size:12;font-style:B;');
                                            $table->easyCell('Source of Fund', 'align:C;font-size:12;font-style:B;');
                                        $table->printRow();   
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',(!empty($pproject->proj_name)?$pproject->proj_name."\n".$pproject->proj_proponent:"")));       
                                        $table->easyCell(iconv("UTF-8", '',(!empty($pproject->proj_area)?$pproject->proj_area." has.":"")),'align:R');       
                                        $table->easyCell(iconv("UTF-8", '',(!empty($pproject->proj_location)?$pproject->proj_location:""))); 
                                        $table->easyCell(iconv("UTF-8", '',(!empty($source)?$source:"")));      
                                        $table->printRow();
                                        $table->endTable(5);

                                    }
                                }
                            }
                        }
                        $c=0;
                        if ($chk_prgResearch == 1) {
                           foreach ($program_research as $presearch) {                                
                                if (!empty($presearch)) {
                                    if ($prog->id_program == $presearch->id_program) {
                                    $c++;
                                    $table=new easyTable($pdf, '{70,60,60}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#df9f9f');
                                        $table->easyCell('PROGRAM RESEARCHES', 'align:L;font-size:12;font-style:B;colspan:3');
                                    $table->printRow();
                                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#ffe6cc');
                                        $table->easyCell('Type of Research and Purpose', 'align:L;font-size:12;font-style:B;');
                                        $table->easyCell('Permit', 'align:L;font-size:12;font-style:B;');
                                        $table->easyCell('PAMB Resolution', 'align:L;font-size:12;font-style:B;');
                                    $table->printRow();
                                        $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                        $table->easyCell(iconv("UTF-8", '',(!empty($presearch->type_research)?$presearch->type_research."\n".$presearch->research_purpose:"")));
                                        $table->easyCell(iconv("UTF-8", '',(!empty($presearch->permit_no)?$presearch->permit_no:"")));
                                        $table->easyCell(iconv("UTF-8", '',(!empty($presearch->pamb_reso_no)?$presearch->pamb_reso_no:"")."\n".(!empty($presearch->pamb_reso_title)?$presearch->pamb_reso_title:"")));
                                    $table->printRow();

                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Purpose', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->research_purpose)?$presearch->research_purpose:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Year Researched', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->research_year)?$presearch->research_year:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Permit Number', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->permit_no)?$presearch->permit_no:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Funding Agency', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->funding_agency)?$presearch->funding_agency:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Name of Researcher', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->name_researcher)?$presearch->name_researcher:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('Institution', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->institution)?$presearch->institution:"")));
                                    // $table->printRow();
                                    // $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                    //     $table->easyCell('PAMB Resolution', 'align:L;font-size:12;font-style:B;');
                                    //     $table->easyCell(iconv("UTF-8", '',(!empty($presearch->pamb_reso_no)?$presearch->pamb_reso_no:"")."\n".(!empty($presearch->pamb_reso_title)?$presearch->pamb_reso_title:"")));
                                    // $pdf->Ln(5);
                                    $table->endTable(5);
                                    }
                                }

                           }
                        }
                    }
                }
            }

            if ($chk_project==1) {
                if (!empty($project)) {
                    $table=new easyTable($pdf, '{60,40,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:;border-color:#a1a1a1;bgcolor:#cccccc');
                            $table->easyCell('PROJECTS', 'font-size:12;colspan:4;font-style:B');
                        $table->printRow();
                    $table->endTable();
                    $table=new easyTable($pdf, '{60,40,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                            $table->easyCell('Project and proponent name', 'align:C;font-size:12;font-style:B');
                            $table->easyCell('Source of fund', 'align:C;font-size:12;font-style:B');
                            $table->easyCell('Location', 'align:C;font-size:12;font-style:B');
                            $table->easyCell('Area', 'align:C;font-size:12;font-style:B');
                            $table->printRow();
                        foreach ($project as $proj) {
                            if ($proj->source_fund=="Foreign Assisted") {
                                $sources = "Foreign Assisted";
                            }elseif ($proj->source_fund=="Government Fund") {
                                $sources = "Government Fund";
                            }if ($proj->source_fund=="Both: Foreign Assisted and Government Fund") {
                                $sources = "Foreign Assisted and Foreign Assisted";
                            }
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',$proj->proj_name."\n".$proj->proj_proponent));
                            $table->easyCell(iconv("UTF-8", '',(!empty($proj->source_fund)?$proj->source_fund:"")));
                            $table->easyCell(iconv("UTF-8", '',(!empty($proj->proj_location)?$proj->proj_location:"")));
                            $table->easyCell(iconv("UTF-8", '',(!empty($proj->proj_area)?$proj->proj_area." has.":"")),'align:R');
                            $table->printRow();
                        }
                    $table->endTable();
                }
            }

            if ($chk_research) {
                if (!empty($research)) {
                    $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                        $table->rowStyle('border:TB;border-color:#a1a1a1;bgcolor:#cccccc');
                            $table->easyCell('RESEARCHES', 'font-size:12;colspan:2;font-style:B');
                        $table->printRow();
                    $table->endTable();
                    $table=new easyTable($pdf, '{70,60,60}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                            $table->easyCell('Type of Research and Purpose', 'align:L;font-size:12;font-style:B;');
                            $table->easyCell('Permit', 'align:L;font-size:12;font-style:B;');
                            $table->easyCell('PAMB Resolution', 'align:L;font-size:12;font-style:B;');
                            $table->printRow();
                        foreach ($research as $searchs) {
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                            $table->easyCell(iconv("UTF-8", '',(!empty($searchs->research_type)?$searchs->research_type."\n".$searchs->research_purpose:"")));
                            $table->easyCell(iconv("UTF-8", '',(!empty($searchs->permit_no)?$searchs->permit_no:"")));
                            $table->easyCell(iconv("UTF-8", '',(!empty($searchs->pamb_reso_no)?$searchs->pamb_reso_no:"")."\n".(!empty($searchs->pamb_reso_title)?$searchs->pamb_reso_title:"")));
                            $table->printRow();
                        }
                    $table->endTable();
                        // $table=new easyTable($pdf, '{50,150}', 'width:300; border-color:#ffff00; font-size:12; border:0;');
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Type of Researches : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->research_type)?$searchs->research_type:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Purpose : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->research_purpose)?$searchs->research_purpose:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Year Research : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->research_year)?$searchs->research_year:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Funding Agency : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->funding_agency)?$searchs->funding_agency:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Name of Researcher : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->name_researcher)?$searchs->name_researcher:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Institution : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->institution)?$searchs->institution:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('Permit Number : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->permit_no)?$searchs->permit_no:"")));
                        //     $table->printRow();
                        //     $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                        //         $table->easyCell('PAMB Resolution : ', 'align:R;font-size:12;font-style:B');
                        //         $table->easyCell(iconv("UTF-8", '',(!empty($searchs->pamb_reso_no)?$searchs->pamb_reso_no:"")."\n".(!empty($searchs->pamb_reso_title)?$searchs->pamb_reso_title:"")));
                        //     $table->printRow();
                        // 
                        // $pdf->Ln(5);
                }
            }
        }
        $chk_threats = $this->input->post('chk-threats');
        $threatMap = $this->pamain_report->query_all_threatsMap($gencode);
        $countMap = $this->pamain_report->count_all_threatsMap($gencode);
        $threats = $this->pamain_report->query_all_threats($gencode);
        if ($chk_threats==1) {
           if (!empty($threatMap)) {
                $pdf->AddPage('P','A4',0);
                $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell('THREATS', 'font-size:18;font-style:B');
                    $table->printRow();
                $table->endTable();
               foreach ($threatMap as $tmap) {
                   $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        $table->rowStyle('border:;border-color:#a1a1a1;');
                        if ($countMap <= 0) {
                            $table->easyCell('No map image show','img:bmb_assets2/upload/img_threat_map/nophoto.jpg','w280,h260;');
                        } else {
                            foreach ($threatMap as $tmap) {
                                $table->easyCell('Map image show','img:bmb_assets2/upload/img_threat_map/'.$tmap->threat_map_img.', w280,h260;');
                            }
                        }
                        $table->easyCell('','img:bmb_assets2/upload/img_threat_map/nophoto.jpg');
                        $table->printRow();                    
                    $table->endTable(10);
                    foreach ($threats as $thrt) {
                        // $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                        //     $table->rowStyle('border:;border-color:#a1a1a1;');
                        //     if ($thrt->img_threat == "") {
                        //         $table->easyCell('','img:bmb_assets2/upload/img_threat/nophoto.jpg');
                        //     } else {
                        //         $table->easyCell('','img:bmb_assets2/upload/img_threat/'.$thrt->img_threat.', w80,h60;');
                        //     }                            
                        //     $table->printRow();
                        // $table->endTable();
                        $table=new easyTable($pdf, '{60,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                            $table->rowStyle('border:;border-color:#a1a1a1;');
                            if ($thrt->img_threat == "") {
                                $table->easyCell('','img:bmb_assets2/upload/img_threat/nophoto.jpg'.'colspan:2;align:left');
                            } else {
                                $table->easyCell('','img:bmb_assets2/upload/img_threat/'.$thrt->img_threat.', w80,h60;colspan:2;align:left');
                            }                            
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Status : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->rank));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Additional Qualifier/Cut-off : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',number_format($thrt->qualifier,2)."%"));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Category : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->threats_category_desc));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Threats : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->sub_cat_desc));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Remarks : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->threat_desc));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Location : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->threats_location));
                            $table->printRow();
                            if ($thrt->threats_longitude_dms_direction == 1) {
                                $longdir = "East";
                            }elseif($thrt->threats_longitude_dms_direction == 2){
                                $longdir = "West";
                            }

                            if ($thrt->threats_latitude_dms_direction == 1) {
                                $latdir = "North";
                            }elseif($thrt->threats_latitude_dms_direction == 2){
                                $latdir = "South";
                            }
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Coordinates : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->threats_longitude_dms_degrees."°".$thrt->threats_longitude_dms_minutes."'".$thrt->threats_longitude_dms_seconds."'' ".$longdir."\n".
                                    $thrt->threats_latitude_dms_degrees."°".$thrt->threats_latitude_dms_minutes."'".$thrt->threats_latitude_dms_seconds."'' ".$latdir
                            ));
                            $table->printRow();
                            $table->rowStyle('border:TBLR;border-color:#a1a1a1;');
                                $table->easyCell('Date assessed : ', 'align:R;font-size:12;font-style:B');
                                $table->easyCell(iconv("UTF-8", '',$thrt->month." ".$thrt->year));
                            $table->printRow();
                        $table->endTable(10);
                    }
               }
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
        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
            $table->rowStyle('border:;border-color:#a1a1a1;');
                $table->easyCell('MANAGEMENT BOARD', 'font-size:18;font-style:B');
            $table->printRow();
        $table->endTable();
        if ($chk_mbMember==1) {
            if (!empty($qMember)) {
                 $table=new easyTable($pdf, '{100,100,100,}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                 $table->easyCell(iconv("UTF-8", '','TOTAL NO. OF MEMBERS'),'align:C;colspan:5;font-style:B');                    
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                $table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                    $table->easyCell(iconv("UTF-8", '','PAMB RESOLUTION'),'align:C;colspan:2;font-style:B');                    
                    $table->printRow();
                    $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
                    $table->easyCell(iconv("UTF-8", '','Resolution No. '),'align:C');
                    $table->easyCell(iconv("UTF-8", '','Resolution Title'),'align:C');                     
                    $table->printRow();
                    foreach ($qMemberIssuances as $issuances) {
                        $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1;');
                        $table->easyCell(iconv("UTF-8", '',$issuances->resolution_no),'align:L');   
                        $table->easyCell(iconv("UTF-8", '',$issuances->resolution_name),'align:L');   

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
                    $table->rowStyle('border:;border-color:#a1a1a1;');
                        $table->easyCell('PROTECTED AREA MANAGEMENT OFFICE', 'font-size:18;font-style:B');
                    $table->printRow();
                $table->endTable();
                $table=new easyTable($pdf, '{100,100,100,}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
                $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#000;font-color:#fff');
                $table->easyCell(iconv("UTF-8", '','TOTAL NO. OF MEMBERS'),'align:C;colspan:5;font-style:B;');                    
                    $table->printRow();
                    $table->rowStyle('border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
                    $table->rowStyle('
                        border:TBLR;border-color:#a1a1a1;bgcolor:#adad9a');
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
