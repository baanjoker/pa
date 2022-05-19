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
			'pasu/report/pamain_report'
		]);
		if ($this->session->userdata('isLogIn') == false
			// || $this->session->userdata('user_role') != 1
			// || $this->session->userdata('user_role') != 3
		)
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
        	
 		$pasuQuery = $this->pamain_report->query_pasu($gencode);
		$proc_legis = $this->pamain_report->query_pambproc_combined($gencode);		
		$geographic = $this->pamain_report->biogeographic_combine($gencode);
		$datas = $this->pamain_report->query_search_individual($gencode);
		$paarea = $this->pamain_report->paArea($gencode);
		$legalstatus = $this->pamain_report->legalstatus($gencode);
		$legalstatus2 = $this->pamain_report->legalstatus2($gencode);
		$paareatotal = $this->pamain_report->paAreaTotal($gencode);		
 		$data_pamb = $this->pamain_report->query_pambmember($gencode);
 		$tribe = $this->pamain_report->query_tribe($gencode);
		$countless = $this->pamain_report->query_pambmember_count($gencode);
		$location = $this->pamain_report->query_pamblocation($gencode);
		$countlocation = $this->pamain_report->query_pamblocation_count($gencode);
		$proc = $this->pamain_report->query_pambproc($gencode);
		$countproc = $this->pamain_report->query_pambproc_count($gencode);
		$biological = $this->pamain_report->query_pambbiological($gencode);
		$counttribe = $this->pamain_report->query_tribe_count($gencode);
		$countbiological = $this->pamain_report->query_pambbiological_count($gencode);
		$project = $this->pamain_report->query_pambproject($gencode);
		$countproject = $this->pamain_report->query_pambproject_count($gencode);
		$image = $this->pamain_report->query_pambimage($gencode);
		$attract = $this->pamain_report->query_attractimage($gencode);
		$facility = $this->pamain_report->query_facilityimage($gencode);
		$activity = $this->pamain_report->query_activityimage($gencode);
		$agro = $this->pamain_report->query_agroimage($gencode);
		$countimage = $this->pamain_report->query_pambimage_count($gencode);
		$income = $this->pamain_report->query_income($gencode);
		$income_distinct = $this->pamain_report->query_income_distinct($gencode);
		$countincome = $this->pamain_report->query_income_count($gencode);
		$multiplezone = $this->pamain_report->multiplezone($gencode);
		$strictprotzone = $this->pamain_report->query_strict($gencode);
		$threats = $this->pamain_report->query_threatss($gencode);
		$references = $this->pamain_report->query_reference($gencode);
		$recog = $this->pamain_report->international_recog($gencode);
		$biologicalflora = $this->pamain_report->query_pambbiologicalflora($gencode);
		$countbiologicalflora = $this->pamain_report->query_pambbiologicalflora_count($gencode);

 		$pdf = new PDFPAMAIN();
 		$pdf->AddPage();
 		$pdf->AliasNbPages();
 		$pdf->SetFont('Times','B',24);
 		foreach($datas as $row)
 		{
 			$title = $row->pa_name;
 		}
		$pdf->SetTitle($title);

 		$pdf->SetWidths(array(50,140));
 		$w = array(0,2);
		// $pdf->Cell($w[0],6,$row->pa_name,0,0,'C');

		$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:20; border:1');
 		$table->rowStyle('border:;border-color:#a1a1a1;');
 		// $table->easyCell('Protected Area Superintendent (PASu)', 'font-size:12;colspan:2;font-style:B');
 				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell(iconv("UTF-8", '',$row->pa_name));
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);

		$pdf->SetFont('Times','',12);
 		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
 		$table->rowStyle('border:TB;border-color:#a1a1a1;');
 		$table->easyCell('GENERAL INFORMATION', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
 		$table->rowStyle('border:;border-color:#a1a1a1;');
 		// $table->easyCell('Protected Area Superintendent (PASu)', 'font-size:12;colspan:2;font-style:B');
 			foreach ($pasuQuery as $pasu) {
 				$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">PASu Name:</s>'."\n".$pasu->firstname." ".$pasu->lastname));
 				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Contact:</s>'."\n Mobile No: ".$pasu->mobile."\n Landline No: ".$pasu->landline."\n Email Address: ".$pasu->email));
 			}
		$table->printRow();
		$table->endTable();

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:T;border-color:#a1a1a1;');
			foreach ($proc_legis as $row1) {	
				foreach ($datas as $row2) {
					foreach ($proc as $row3) {
						foreach ($paarea as $row4) {
							foreach ($paareatotal as $row5) {
								foreach ($recog as $rowrecog) {									
									foreach ($legalstatus as $rowlegal) {
										if (!empty($rowlegal->nipsub_id)) {
											$thrt1 = $rowlegal->legis;
												# code...
											} else {
											$thrt1 = $rowlegal->nlegis;
											}
										$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Legal Basis:</s>'."\n".$row1->try											
											."\n\n".'<s "font-color:#234fa7">Legal Status:</s>'."\n".$rowlegal->legis
											."\n\n".'<s "font-color:#234fa7">Category:</s>'."\n".$row2->categoryName
											."\n\n".'<s "font-color:#234fa7">Terrestrial Land area (has):</s>'."\n".number_format($row4->terrestrial,2)." has."
											."\n\n".'<s "font-color:#234fa7">Marine area (has):</s>'."\n".number_format($row4->marine_area,2)." has."
											."\n\n".'<s "font-color:#234fa7">Total area (has):</s>'."\n".number_format($row5->total_area,2)." has."
											."\n\n".'<s "font-color:#234fa7">Terrestrial Buffer zone (has):</s>'."\n".number_format($row4->buffer,2)." has."						
											."\n\n".'<s "font-color:#234fa7">Marine Buffer zone (has):</s>'."\n".number_format($row4->marine_buffer,2)." has."
											."\n\n".'<s "font-color:#234fa7">Accessibility :</s>'."\n".$row2->accessibility
										));	
									}
								}					
							}
						}
					}
				}
			}
			foreach ($datas as $row2) {
				foreach ($geographic as $row) {
					foreach ($location as $row_loc) {
							foreach ($recog as $rowrecog) {
							if (!empty($row_loc->try2)) {
							$comment = strtolower($row_loc->try2);

							$sentences = explode('. ', $comment);

							$counter = 0;
							foreach ($sentences as $sentence) {
							$sentences[$counter] = ucfirst($sentence);
							$counter++;
							}
							$fixed = implode('. ', $sentences);

							if ($row2->kba == '1') {
								$answer = 'Yes';
							}else{
								$answer = 'No';
							}

							if (!empty($rowrecog)) {
								$displayinterrecog = $rowrecog->interrecog;
							} else {
								$displayinterrecog = "No data";
							}							
							
							
							$table->easyCell(iconv("UTF-8", 'KOI8-R',
									'<s "font-color:#234fa7">Geographic Location:</s>'."\n".$row->Geographic
									."\n\n".'<s "font-color:#234fa7">Key Biodiversity Area:</s>'."\n".$answer." (".$row2->CPABIdesc.")"	
									."\n\n".'<s "font-color:#234fa7">Region(s):</s>'."\n".$row_loc->try1
									."\n\n".'<s "font-color:#234fa7">Locations:</s>'."\n".ucwords(!empty($fixed)?$fixed:"")
									."\n\n".'<s "font-color:#234fa7">Biogeograpic Zone:</s>'."\n".$row2->TBZlocation
									."\n\n".'<s "font-color:#234fa7">Protected Area Boundary:</s>'."\n ".$row2->boundary_upper
									."\n\n".'<s "font-color:#234fa7">International Recognition</s>'."\n".$displayinterrecog
								));
							}
						}
					}
				}
			}
		$table->printRow();
		$table->endTable(5);
		$pdf->Ln(7);

 		###########################################################
 		##														 ##
 		##					 MANAGEMENT ZONE 					 ##
 		##														 ##
 		###########################################################
 		$query_managementzone = $this->pamain_report->query_managementzone($gencode);
 		$query_count_managementzone = $this->pamain_report->query_count_managementzone($gencode);
 		$countmulti = $this->pamain_report->query_count_multi($gencode);
 		
 		

 		if (!empty($countmulti)) {
 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('MANAGEMENT ZONE', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();

			
 			if (!empty($query_count_managementzone)) {
			$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			// $table->easyCell('Management Zone Map', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				

			foreach ($query_managementzone as $mzone) {

				$table->rowStyle('border:;border-color:#a1a1a1;');

				if ($mzone->managementzone_image == "") {
					$table->easyCell('','img:bmb_assets2/upload/managementzone_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/managementzone_img/'.$mzone->managementzone_image.', w80,h60;');
				}
				
	 			// $table->easyCell('','img:bmb_assets2/upload/managementzone_img/'.$mzone->managementzone_image.', w80,h60;');	
				// $table->printRow();
			}
			
			$table->endTable(10);
		}

			$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				
					if (!empty($row2->strict_protection_desc) && !empty($row2->strict_protection_area)) {
						$message1 = '<s "font-color:#234fa7">Strict Protection Zone:</s>'."\n".$row2->strict_protection_desc."\n Area (has) : ".number_format($row2->strict_protection_area,2);
					}else{
						$message1 = "";
					}
					$table->easyCell(iconv("UTF-8", '',$message1));
				$table->printRow();
			$table->endTable(5);

			$tableB=new easyTable($pdf, '{150,40}', 'width:100;l-margin:0; align:L{LC}; border-color:#000; font-size:12; border:1');  
			  	$tableB->rowStyle('border:T;border-color:#a1a1a1;'); 
				$tableB->rowStyle('align:{C}; bgcolor:#cccccc;');
				$tableB->easyCell("Multiple Used Zone");
				$tableB->easyCell("Area");
			   $tableB->printRow(); 
			foreach ($multiplezone as $mzone) {
			$tableB->rowStyle('align:C; valign:M'); 								
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$mzone->description ));
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$mzone->area." has." ));
			$tableB->printRow();			 
			}
			$multiplezoneGT = $this->pamain_report->multiplezoneGT($gencode);
			foreach ($multiplezoneGT as $mzonegt) {
			$tableB->rowStyle('align:C; valign:M; bgcolor:#cccccc;font-style:bold;'); 	
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',"GRAND TOTAL" ));
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$mzonegt->totalmz." has." ));
			$tableB->printRow(); 
			}
			$tableB->endTable(10); 
		}

		###########################################################
 		##														 ##
 		##					 Physical Features 					 ##
 		##														 ##
 		###########################################################
		$slope_query = $this->pamain_report->query_slope($gencode);
 		$countslope = $this->pamain_report->query_count_slope($gencode);
 		$query_count_slopeImage = $this->pamain_report->query_count_slopeImage($gencode);
 		$slope_details_query = $this->pamain_report->query_slope_details($gencode);

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('PHYSICAL FEATURES', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:;border-color:#a1a1a1;');
		
			if (!empty($row2->hydrology)) {
				$message1 = $row2->hydrology;
			}else{
				$message1 = "<i>"."(No data)"."</i>";
			}

			if (!empty($row2->existing_landuse)) {
				$message2 = $row2->existing_landuse;
			}else{
				$message2 = "<i>"."(No data)"."</i>";
			}

			if (!empty($row2->vegetative)) {
				$message3 = $row2->vegetative;
			}else{
				$message3 = "<i>"."(No data)"."</i>";
			}
			$table->easyCell(iconv("UTF-8", '',
									'<s "font-color:#234fa7">Elevation:</s>'."\n"."Highest Elevation : ".number_format($row2->elevation_highest,2)." meter(s) \n Lowest Elevation : ".number_format($row2->elevation_lowest,2)." meter(s)"));
			
			// $table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Hydrology/River system : </s>'."\n".$message1
			// 							."\n\n".'<s "font-color:#234fa7">Vegetative cover : </s>'."\n".$message3));	
							
						
		$table->printRow();
		$table->endTable(5);

		###########################################################
 		##														 ##
 		##					 Topography and Slope				 ##
 		##														 ##
 		###########################################################
		$i=0;
		if (!empty($slope_details_query)) {
			$table=new easyTable($pdf, '{60}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('TOPOGRAPHY AND SLOPE', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();
		}

			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($query_count_slopeImage <= 0) {
					$table->easyCell('No map image show','img:bmb_assets2/upload/topology_img/nophoto.jpg');
				} else {
					foreach ($slope_query as $slope) {
						$table->easyCell('Map image shows','img:bmb_assets2/upload/topology_img/'.$slope->topo_map.', w80,h60;');
					}
				}
				$table->easyCell('','img:bmb_assets2/upload/topology_img/nophoto.jpg');
				$table->printRow();
				
		$table->endTable(10);


			$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($slope_details_query as $slope_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$slope_d->topology_desc ),'align:L');	
	 			// $table->easyCell(iconv("UTF-8", '',$slope->topo_desc),'align:L');
	 			// $table->easyCell(iconv("UTF-8", '',$slope_d->topology_desc ));	
				$table->printRow();
				
			}
		$table->endTable(10);

		###########################################################
 		##														 ##
 		##							 Soil						 ##
 		##														 ##
 		###########################################################
		$soil_query = $this->pamain_report->query_soil($gencode);
 		$countsoil = $this->pamain_report->query_count_soil($gencode);
 		$soil_details_query = $this->pamain_report->query_soil_details($gencode);

 		if (!empty($soil_details_query)) {
			$table=new easyTable($pdf, '{15}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('SOIL', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
		$table->endTable();
		}

		$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
 			if (!empty($soil_details_query)) {
				if ($countsoil <= 0) {
					$table->easyCell('No map image show','img:bmb_assets2/upload/soil_img/nophoto.jpg');
				} else {
					foreach ($soil_query as $soil) {
						$table->easyCell('Map image shows','img:bmb_assets2/upload/soil_img/'.$soil->geology_map.', w80,h60;');
					}
				}
			}
			$table->printRow();
			
		$table->endTable(10);
		
		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($soil_details_query as $soil_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$soil_d->geology_desc ),'align:L');	
				$table->printRow();
				
			}
		$table->endTable(5);

		###########################################################
 		##														 ##
 		##						 Geology 						 ##
 		##														 ##
 		###########################################################

		$rock_query = $this->pamain_report->query_rock($gencode);
 		$countrock = $this->pamain_report->query_count_rock($gencode);
 		$rock_details_query = $this->pamain_report->query_rock_details($gencode);

 		if (!empty($rock_details_query)) {
			$table=new easyTable($pdf, '{50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('ROCK FORMATION', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
		$table->endTable();
		}



		$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
 			if (!empty($rock_details_query)) {		
				if ($countrock <= 0) {
				$table->easyCell('No map image show','img:bmb_assets2/upload/rock_img/nophoto.jpg');
				} else {
					foreach ($rock_query as $rock) {
						$table->easyCell('Map image shows','img:bmb_assets2/upload/rock_img/'.$rock->rock_img.', w80,h60;');
					}
				}
			}
			$table->printRow();			
			$table->endTable(10);

		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($rock_details_query as $rockd) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$rockd->rock_details ),'align:L');	
				$table->printRow();
				
			}
		$table->endTable(5);

		###########################################################
 		##														 ##
 		##					 Hydrology/River system				 ##
 		##														 ##
 		###########################################################		

		$hydro_query = $this->pamain_report->query_hydro($gencode);
 		$counthydro = $this->pamain_report->query_count_hydro($gencode);		
 		$hydro_details_query = $this->pamain_report->query_hydro_details($gencode);

 		if (!empty($hydro_details_query)) {
			$table=new easyTable($pdf, '{70}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('HYDROLOGY/RIVER SYSTEM', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
		$table->endTable();
		}

		$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
 		if (!empty($hydro_details_query)) {			
			if ($counthydro <= 0) {
				$table->easyCell('','img:bmb_assets2/upload/hydrology_img/nophoto.jpg');
			} else {
				foreach ($hydro_query as $hydro) {
					$table->easyCell('','img:bmb_assets2/upload/hydrology_img/'.$hydro->hydro_img.', w80,h60;');
				}
			}
		}
			$table->printRow();
			
		$table->endTable(5);
		
		$i=0;
			foreach ($hydro_details_query as $hydro_d) {	
				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$hydro_d->hydro_desc ),'align:L');
				$table->printRow();
				$table->endTable(5);				
		}

		###########################################################
 		##														 ##
 		##					 Climate type 						 ##
 		##														 ##
 		###########################################################
		$climate_query = $this->pamain_report->query_climate($gencode);
 		$countclimate = $this->pamain_report->query_count_climate($gencode);
 		$climate_details_query = $this->pamain_report->query_climate_details($gencode);

 		if (!empty($climate_details_query)) {
			$table=new easyTable($pdf, '{40}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('CLIMATE TYPE', 'align:L;font-size:12;colspan:2;font-style:B;text-align:C;');
			$table->printRow();				
			$table->endTable();
		}
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		if (!empty($climate_details_query)) {
				if ($counthydro <= 0) {
				$table->easyCell('','img:bmb_assets2/upload/climate_img/nophoto.jpg');
				} else {
					foreach ($climate_query as $climate) {
						$table->easyCell('','img:bmb_assets2/upload/climate_img/'.$climate->climate_img.', w80,h60;');
					}
				}
			}
			$table->printRow();
			
		$table->endTable(5);

		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($climate_details_query as $climate) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$climate->climate_desc ),'align:L');
				$table->printRow();
				
			}
		$table->endTable(10);

		###########################################################
 		##														 ##
 		##					 Existing Landuse 					 ##
 		##														 ##
 		###########################################################		

 		$exlanduse = $this->pamain_report->query_exlanduse($gencode);
 		$exlanduse_details_query = $this->pamain_report->query_exlanduse_details($gencode);

 		if (!empty($exlanduse)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Existing Landuse', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->endTable();

			foreach ($exlanduse as $landuse) {
				$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell('','img:bmb_assets2/upload/existinglanduse_img/'.$landuse->landuse_img.', w80,h60;');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

 		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($exlanduse_details_query as $landuses_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$landuses_d->landuse_desc." (".$landuses_d->landuse_area." has.)" ),'align:L');
				$table->printRow();
				
			}
		$table->endTable(5);

		###########################################################
 		##														 ##
 		##					Vegetative Cover 				 	 ##
 		##														 ##
 		###########################################################

		$vegetative = $this->pamain_report->query_vege($gencode);
 		$vegetative_details_query = $this->pamain_report->query_vege_details($gencode);

 		if (!empty($vegetative)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Vegetative Cover', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->endTable();

			foreach ($vegetative as $vege) {
				$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell('','img:bmb_assets2/upload/vegetative_img/'.$vege->vegetative_img.', w80, h80;');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

 		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($vegetative_details_query as $vege_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$vege_d->vegetative_desc." (".$vege_d->vegetative_area." has.)" ),'align:L');
				$table->printRow();
				
			}
		$table->endTable(5);

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('GEOHAZARD FEATURES', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();

		###########################################################
 		##														 ##
 		##				Landslide Susceptibility 				 ##
 		##														 ##
 		###########################################################
		$landslide_query = $this->pamain_report->query_landslide($gencode);
 		$countlandslide = $this->pamain_report->query_count_landslide($gencode);
 		$landslide_details_query = $this->pamain_report->query_landslide_details($gencode);

 		if (!empty($countlandslide)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Landslide Susceptibility', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();		
				$table->endTable();


			foreach ($landslide_query as $land) {
				$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');				
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell('','img:bmb_assets2/upload/landslide_img/'.$land->landslide_img.',w80,h60;');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($landslide_details_query as $land_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$land_d->landslide_desc." (".$land_d->landslide_area."has.)"),'align:L');
				$table->printRow();
				
			}
		$table->endTable(10);

		###########################################################
 		##														 ##
 		##				Flooding Susceptibility 				 ##
 		##														 ##
 		###########################################################
		$flood_query = $this->pamain_report->query_flooding($gencode);
 		$countflood = $this->pamain_report->query_count_flooding($gencode);
 		$flooding_details_query = $this->pamain_report->query_flooding_details($gencode);

 		if (!empty($countflood)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Flooding Susceptibility', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->endTable();

			foreach ($flood_query as $data) {
				$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell('','img:bmb_assets2/upload/flooding_img/'.$data->flooding_img.', w80,h60;');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($flooding_details_query as $flooding_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$flooding_d->flooding_desc." (".$flooding_d->flooding_area."has.)"),'align:L');
				$table->printRow();
				
			}
		$table->endTable(10);

		###########################################################
 		##														 ##
 		##					 BIOLOGICAL FEATURES 				 ##
 		##														 ##
 		###########################################################
		
 		if (!empty($countbiological) || !empty($countbiologicalflora)) {
 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('BIOLOGICAL FEATURES', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();
 		}
		
 		if (!empty($countbiological)) {
			$table=new easyTable($pdf, '{70,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Critical endangered Fauna', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();
		$table->endTable(10);
		$table=new easyTable($pdf, '{70,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($biological as $row) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($row->image == "") {
					$table->easyCell('','img:bmb_assets2/upload/wildlife_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/wildlife_img/'.$row->image.', w80,h60;');
				}
	 			// $table->easyCell('','img:bmb_assets2/upload/wildlife_img/'.$row->image.', w50,h50;');	
	 			$table->easyCell(iconv("UTF-8", '',"Common name : ".$row->commonNameSpecies."\nScientific Name : <i>".$row->scientificName_genus."</i>\nClass : ".$row->ClassDesc."\n Order : ".$row->OrderDesc),'align:L');	
				$table->printRow();
			}			
		$table->endTable(10);
		}

		if (!empty($countbiologicalflora)) {
			$table=new easyTable($pdf, '{70,130}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Flora', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				

			foreach ($biologicalflora as $rowfl) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell('','img:bmb_assets2/upload/wildlife_img/'.$rowfl->image.', w50,h50;');	
	 			$table->easyCell(iconv("UTF-8", '',"Common name : ".$rowfl->commonNameSpecies."\nScientific Name : <i>".$rowfl->scientificName_genus."</i>\nClass : ".$rowfl->ClassDesc."\n Order : ".$rowfl->OrderDesc),'align:L');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

		###########################################################
 		##														 ##
 		##			SOCIO-CULTURAL AND ECONOMIC FEATURES		 ##
 		##														 ##
 		###########################################################
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('SOCIO-ECONOMIC AND CULTURAL FEATURES', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();

		if (!empty($row2->livelihood)) {
				$messagelive = $row2->livelihood;
			} else {
				$messagelive = "<i>"."(No data)"."</i>";
		}
		$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Livelihood/Enterprise', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();
	 			$table->easyCell(iconv("UTF-8", '',$messagelive),'align:L');	
				$table->printRow();				
			
		$table->endTable(10);

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:T;border-color:#fff;');
	 	$table->easyCell('Cultural Profile', 'align:L;font-size:12;colspan:2;font-style:B');
		$table->printRow();				

		foreach ($datas as $row2) {
			if (!empty($row2->demography)) {
				$messagedemo = $row2->demography;
			} else {
				$messagedemo = "<i>"."(No data)"."</i>";
			}			
			if (!empty($row2->cultural_resource)) {
				$messagecultural = $row2->cultural_resource;
			} else {
				$messagecultural = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->archeology)) {
				$messagearcheology = $row2->archeology;
			} else {
				$messagearcheology = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->economic_profile)) {
				$message_ecoprofile = $row2->economic_profile;
			} else {
				$message_ecoprofile = "<i>"."(No data)"."</i>";
			}			

			if (!empty($row2->ethinicity)) {
				$messageethnicity = $row2->ethinicity;
			} else {
				$messageethnicity = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->social_service)) {
				$messagesocser = $row2->social_service;
			} else {
				$messagesocser = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->belief)) {
				$messagebelief = $row2->belief;
			} else {
				$messagebelief = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->tenured_migrant)) {
				$messagemigrant = $row2->tenured_migrant;
			} else {
				$messagemigrant = "<i>"."(No data)"."</i>";
			}
			if (!empty($row2->institutional_profile)) {
				$message_insprof = $row2->institutional_profile;
			} else {
				$message_insprof = "<i>"."(No data)"."</i>";
			}

			$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Ethnicity:</s>'."\n".$messageethnicity
								."\n\n".'<s "font-color:#234fa7">Cultural Resources:</s>'."\n".$messagecultural), 'font-size:12;');

			$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Archeology:</s>'."\n".$messagearcheology
								."\n\n".'<s "font-color:#234fa7">Customs and Beliefs:</s>'."\n".$messagebelief), 'font-size:12;');
		}
		$table->printRow();
		$table->endTable(5);

		$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('Institutional Profile', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();
	 			$table->easyCell(iconv("UTF-8", '',$message_insprof),'align:L');	
				$table->printRow();				
			
		$table->endTable(10);
		###########################################################
 		##														 ##
 		##						Occupants						 ##
 		##														 ##
 		###########################################################
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('OCCUPANTS', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);
	 	$pdf->SetFont('Times','',12);	 	
	 	$w = array(143,47); //Total width 190
		$pdf->SetFillColor(204, 204, 204);
		$pdf->SetDrawColor(50,50,100);
		$pdf->cell($w[0],5,'Monitored by Sex',1,0,'C',true);		
		$pdf->cell($w[1],5,'Number of',1,0,'C',true);		
		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);

	 	$pdf->SetFont('Times','',12);	 	
	 	$w = array(47,47,49,47); //Total width 190
		$pdf->SetFillColor(204, 204, 204);
		$pdf->SetDrawColor(50,50,100);
		$pdf->cell($w[0],5,'Total no. of Male',1,0,'C',true);
		$pdf->cell($w[1],5,'Total no. of Female',1,0,'C',true);
		$pdf->setTextColor(255,0,0);
		$pdf->cell($w[2],5,'Total Occupants',1,0,'C',true);
		$pdf->setTextColor(0,0,0);		
		$pdf->cell($w[3],5,'Tenured Migrant',1,0,'C',true);
		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
		$pdf->Cell($w[0],6,$row2->no_occupant_male,1,0,'C');
		$pdf->Cell($w[1],6,$row2->no_occupant_female,1,0,'C');
		$pdf->setTextColor(255,0,0);		
		$pdf->Cell($w[2],6,$row2->no_occupants,1,0,'C');
		$pdf->setTextColor(0,0,0);				
		$pdf->Cell($w[3],6,$row2->no_tenured_migrant,1,0,'C');

		###########################################################
 		##														 ##
 		##	  Indigenous Cultural Community/Indigenous People	 ##
 		##														 ##
 		###########################################################
		$pdf->Ln(15);
	 	$pdf->SetFont('Times','',12);	 	
	 	$w = array(190); //Total width 190
		$pdf->SetFillColor(204, 204, 204);
		$pdf->SetDrawColor(50,50,100);
		$pdf->cell($w[0],9,'Indigenous Cultural Community/Indigenous People',1,0,'C',true);		
		$pdf->Ln(9);
		$pdf->SetFont('Times','',12);

		$pdf->SetFont('Times','',12);	 	
	 	$w = array(100,30,30,30); //Total width 190
		$pdf->SetFillColor(204, 204, 204);
		$pdf->SetDrawColor(50,50,100);
		$pdf->cell($w[0],5,'ICCs/IPs',1,0,'C',true);
		$pdf->cell($w[1],5,'Male',1,0,'C',true);
		$pdf->cell($w[2],5,'Female',1,0,'C',true);
		$pdf->setTextColor(255,0,0);			
		$pdf->cell($w[3],5,'Total',1,0,'C',true);
		$pdf->setTextColor(0,0,0);			
		$pdf->Ln(5);


		$query_occupants = $this->pamain_report->query_occupants($gencode);
 		$count_occupants = $this->pamain_report->count_occupants($gencode);
 		$grand_total = $this->pamain_report->grandtotalicc($gencode);
 		foreach ($query_occupants as $occupant) {
 			$total = $occupant->male_iccip + $occupant->female_iccip;
			$pdf->Cell($w[0],6,$occupant->tribe_name,1,0,'L'); 			
			$pdf->Cell($w[1],6,$occupant->male_iccip,1,0,'C'); 			
			$pdf->Cell($w[2],6,$occupant->female_iccip,1,0,'C'); 	
			$pdf->setTextColor(255,0,0);
			$pdf->Cell($w[3],6,number_format($total),1,0,'R'); 	
			$pdf->setTextColor(0,0,0);
			$pdf->Ln();
 		}
 		foreach ($grand_total as $total) {
	 		$pdf->SetFont('Times','',12);	 	
		 	$w = array(160,30); //Total width 190
			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],9,'GRAND TOTAL',1,0,'C',true);	
			$pdf->setTextColor(255,0,0);	
	 		$pdf->SetFont('Times','',16); 	
			$pdf->cell($w[1],9,$total->GrandTotal,1,0,'R',true);	
			$pdf->setTextColor(0,0,0);				
			$pdf->Ln(9);
			$pdf->SetFont('Times','',12);
 		}
 		
		$pdf->Ln(10);



		###########################################################
 		##														 ##
 		##				Habitats and Ecosystem 					 ##
 		##														 ##
 		###########################################################
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('HABITATS AND ECOSYSTEM', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();

 		$forfor = $this->pamain_report->query_forestformation($gencode);
 		$forfor_details_query = $this->pamain_report->query_forestfors_details($gencode);
 		$inland_wetland = $this->pamain_report->query_inlandwetland($gencode);
 		$inland_details_query = $this->pamain_report->query_iw_details($gencode);
 		$caves = $this->pamain_report->query_cave($gencode);
 		$cave_details_query = $this->pamain_report->query_cave_details($gencode);

 		if (!empty($forfor)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Forest Formation', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($forfor as $ff) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/ff_map_img/'.$ff->ff_map_img.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable();
		

 		$i=0;
		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			foreach ($forfor_details_query as $ff_d) {	
				$i++;
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',$i.") ".$ff_d->ff_details." (".$ff_d->ff_area." has.)" ),'align:L');
				$table->printRow();				
			}
		$table->endTable(10);
		}

		if (!empty($inland_wetland)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Inland Wetland', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($inland_wetland as $iw) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/iwmap/'.$iw->iw_img.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable(); 	
		}

		if (!empty($inland_wetland)) {	
		$pdf->SetFont('Times','',12);				
		 	$w = array(190); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],9,'Inland Wetland',1,0,'C',true);		
			$pdf->Ln(9);
			$pdf->SetFont('Times','',12);
			$w = array(60,30,50,50); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],5,'Inland Wetlands',1,0,'C',true);
			$pdf->cell($w[1],5,'Area',1,0,'C',true);
			$pdf->cell($w[2],5,'Location',1,0,'C',true);
			$pdf->cell($w[3],5,'Wetland types',1,0,'C',true);
			$pdf->Ln(5);		

						
			foreach ($inland_details_query as $row) {
				$pdf->SetWidths(array(60,30,50,50));
				$pdf->Cell($w[0],6,$row->iw_name,1,0,'L');
				$pdf->Cell($w[1],6,number_format($row->iw_area,2)." has.",1,0,'L');
				$pdf->Cell($w[2],6,$row->provinceName.", ".$row->municipalName,1,0,'L');
				$pdf->Cell($w[3],6,$row->wetland_desc,1,0,'C');
				$pdf->Ln();
			}
			$pdf->Ln(10);
		} 

		if (!empty($caves)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Caves', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($caves as $cavem) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/cavemap_img/'.$cavem->cavemap_img.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable(); 	
		}

		if (!empty($caves)) {	
		$pdf->SetFont('Times','',12);				
		 	$w = array(190); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],9,'Caves',1,0,'C',true);		
			$pdf->Ln(9);
			$pdf->SetFont('Times','',12);
			$w = array(60,30,50,50); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],5,'Cave name',1,0,'C',true);
			$pdf->cell($w[1],5,'Area(meters)',1,0,'C',true);
			$pdf->cell($w[2],5,'Location',1,0,'C',true);
			$pdf->cell($w[3],5,'Cave Classification',1,0,'C',true);
			$pdf->Ln(5);
						
			foreach ($cave_details_query as $rowcave) {
				$pdf->SetWidths(array(60,30,50,50));
				$pdf->Cell($w[0],6,$rowcave->caves_name,1,0,'L');
				$pdf->Cell($w[1],6,number_format($rowcave->caves_area,2)." meter(s).",1,0,'L');
				$pdf->Cell($w[2],6,$rowcave->provinceName.", ".$rowcave->municipalName,1,0,'L');
				$pdf->Cell($w[3],6,$rowcave->class_no,1,0,'C');
				$pdf->Ln();
			}
			$pdf->Ln(10);
		} 

		$coralreef = $this->pamain_report->query_coastal($gencode);
 		$coralreef_details_query = $this->pamain_report->query_coral_details($gencode);
 		$coralreefspecies_details_query = $this->pamain_report->query_coralspecies_details($gencode);

		if (!empty($coralreef)) {
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('COASTAL/MARINE', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();

			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Coral Reef Ecosystem', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($coralreef as $coral) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/coralreef_map_img/'.$coral->coralreefmap.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable(); 	
		}


		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:T;border-color:#a1a1a1;');	
		foreach ($coralreef_details_query as $coral) {	
		$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Map details:</s>'."\n".$coral->coral_details));	
		}
		foreach ($coralreefspecies_details_query as $coralspecies) {	
		$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Existing species in the area:</s>'."\n<i>".$coralspecies->coralspeciesd."</i>"));
		}
					
		$table->printRow();
		$table->endTable(5);

		$pdf->Ln(7);


		$seagrass = $this->pamain_report->query_seagrass($gencode);
 		$seagrass_details_query = $this->pamain_report->query_seagrass_details($gencode);
 		$seagrassspecies_details_query = $this->pamain_report->query_seagrasspecies_details($gencode);

		if (!empty($seagrass)) {
			
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Seagrass Ecosystem', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($seagrass as $seg) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/seagrass_map/'.$seg->seagrass_map.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable(); 	
		}

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:T;border-color:#a1a1a1;');	
		foreach ($seagrass_details_query as $seagrass) {	
		$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Map details:</s>'."\n".$seagrass->seagrass_details));	
		}

		foreach ($seagrassspecies_details_query as $coralspecies) {	
		$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Existing species in the area:</s>'."\n<i>".$coralspecies->seagrassspecies."</i>"));
		}
					
		$table->printRow();
		$table->endTable(5);

		$pdf->Ln(7);

		$mangrove = $this->pamain_report->query_mangrove($gencode);
 		$mangrove_details_query = $this->pamain_report->query_mangrove_details($gencode);
 		$mangrovespecies_details_query = $this->pamain_report->query_mangrovepecies_details($gencode);

		if (!empty($mangrove)) {
			
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 		$table->easyCell('Mangrove Ecosystem', 'align:L;font-size:12;colspan:2;font-style:B');
			$table->printRow();				
			$table->endTable();

			foreach ($mangrove as $mangrov) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
			$table->rowStyle('border:;border-color:#a1a1a1;');
	 		$table->easyCell('','img:bmb_assets2/upload/mangrove_map/'.$mangrov->mangrove_map.', w80,h60;');	
			$table->printRow();
			}			
		$table->endTable(); 	
		}

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:T;border-color:#a1a1a1;');	
		foreach ($mangrove_details_query as $mangroves) {	
		$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Map details:</s>'."\n".$mangroves->mangrove_details));	
		}

		foreach ($mangrovespecies_details_query as $mangrovespecies) {	
		$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Existing species in the area:</s>'."\n<i>".$mangrovespecies->mangrovespeciest."</i>"));
		}
					
		$table->printRow();
		$table->endTable(5);

		$pdf->Ln(7);

 		###########################################################
 		##														 ##
 		##						Ecotourism						 ##
 		##														 ##
 		###########################################################
		$attracts = $this->pamain_report->query_attractsmap($gencode); 		
 		$query_attraction = $this->pamain_report->query_attraction($gencode);
 		$count_attraction = $this->pamain_report->count_attraction($gencode);
		$facil = $this->pamain_report->query_facilitymap($gencode); 	
		$query_facility = $this->pamain_report->query_facility($gencode);
 		$count_facility = $this->pamain_report->count_facility($gencode);
		$actvity = $this->pamain_report->query_activitymap($gencode); 	 		
		$query_activity = $this->pamain_report->query_activity($gencode);
 		$count_activity = $this->pamain_report->count_activity($gencode);
 		
 		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('ECOTOURISM', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln();
	 	$pdf->SetFont('Times','',12);

	 	###########################################################
 		##						Attraction						 ##
 		###########################################################
 	// 	foreach ($attracts as $attcts) {
		// 	$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
		// 	$table->rowStyle('border:;border-color:#a1a1a1;');
	 // 		$table->easyCell('','img:bmb_assets2/upload/attraction_map/'.$attcts->attraction_img_map);	
		// 	$table->printRow();
		// 	}			
		// $table->endTable();

 		if (!empty($count_attraction)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('ATTRACTION', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();	
				$table->endTable();			

			foreach ($attracts as $attcts) {
			$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');			
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($attcts->attraction_img_map == "") {
					$table->easyCell('No image','img:bmb_assets2/upload/attraction_map/nophoto.jpg');
				} else {
					$table->easyCell('Map shows of attraction site','img:bmb_assets2/upload/attraction_map/'.$attcts->attraction_img_map.', w80,h60;');
				}
		 		// $table->easyCell('Map shows of attraction site','img:bmb_assets2/upload/attraction_map/'.$attcts->attraction_img_map.', w80,h60;');	
				$table->printRow();
				$table->endTable();
				
			}

			foreach ($query_attraction as $data) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->image_attr == "") {
					$table->easyCell('','img:bmb_assets2/upload/attraction_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/attraction_img/'.$data->image_attr.', w80,h60;');
				}
	 			$table->easyCell(iconv("UTF-8", '',"<b>".ucfirst($data->title)."</b>\n\n".$data->description),'align:L');	
				$table->printRow();
				$table->endTable(10);
			}			
		}

		###########################################################
 		##						Facilities						 ##
 		###########################################################
 	// 	foreach ($attracts as $attcts) {
		// 	$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
		// 	$table->rowStyle('border:;border-color:#a1a1a1;');
	 // 		$table->easyCell('','img:bmb_assets2/upload/attraction_map/'.$attcts->attraction_img_map);	
		// 	$table->printRow();
		// 	}			
		// $table->endTable();

 		if (!empty($count_facility)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('FACILITY', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();	
				$table->endTable();			

			foreach ($facil as $fas) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');			
				$table->rowStyle('border:;border-color:#a1a1a1;');
		 		$table->easyCell('Map shows of attraction site','img:bmb_assets2/upload/facility_map/'.$fas->facility_map.', w80,h60;');	
				$table->printRow();
				$table->endTable();
				
			}

			foreach ($query_facility as $data) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->image_facility == "") {
					$table->easyCell('','img:bmb_assets2/upload/facilities_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/facilities_img/'.$data->image_facility.', w80,h60;');
				}
	 			$table->easyCell(iconv("UTF-8", '',"<b>".ucfirst($data->title_facility)."</b>\n\n".$data->description_facility),'align:L');	
				$table->printRow();
				$table->endTable(10);
			}			
		}

		###########################################################
 		##						ACTIVITY						 ##
 		###########################################################
 	// 	foreach ($attracts as $attcts) {
		// 	$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
		// 	$table->rowStyle('border:;border-color:#a1a1a1;');
	 // 		$table->easyCell('','img:bmb_assets2/upload/attraction_map/'.$attcts->attraction_img_map);	
		// 	$table->printRow();
		// 	}			
		// $table->endTable();

 		if (!empty($count_activity)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('ACTIVITY', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();	
				$table->endTable();			

			foreach ($actvity as $active) {
			$table=new easyTable($pdf, '{100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');			
				$table->rowStyle('border:;border-color:#a1a1a1;');
		 		$table->easyCell('Map shows of attraction site','img:bmb_assets2/upload/activity_map/'.$active->ecotourism_map.', w80,h60;');	
				$table->printRow();
				$table->endTable();
				
			}

			foreach ($query_activity as $data) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->image_eco == "") {
					$table->easyCell('','img:bmb_assets2/upload/ecotourism_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/ecotourism_img/'.$data->image_eco.', w80,h60;');
				}
	 			$table->easyCell(iconv("UTF-8", '',"<b>".ucfirst($data->activity_title)."</b>\n\n".$data->description_activity),'align:L');	
				$table->printRow();
				$table->endTable(10);
			}			
		}


		###########################################################
 		##						PRODUCTS						 ##
 		###########################################################
		$query_product = $this->pamain_report->query_product($gencode);
		$count_facility = $this->pamain_report->count_facility($gencode);

 		if (!empty($query_product)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('PRODUCT', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();	
				$table->endTable();			

			foreach ($query_product as $data) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->prod_img == "") {
					$table->easyCell('','img:bmb_assets2/upload/product_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/product_img/'.$data->prod_img.', w80,h60;');
				}
	 			$table->easyCell(iconv("UTF-8", '',$data->prod_desc),'align:L');	
				$table->printRow();
				$table->endTable(10);
			}			
		}

		###########################################################
 		##						ENTERPRISE						 ##
 		###########################################################
		$query_enterprise = $this->pamain_report->query_enterprise($gencode);
		$count_enterprise = $this->pamain_report->count_enterprise($gencode);

 		if (!empty($query_enterprise)) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
	 			$table->easyCell('ENTERPRISE', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();	
				$table->endTable();			

			foreach ($query_enterprise as $data) {
				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->enterprise_img == "") {
					$table->easyCell('','img:bmb_assets2/upload/enterprise_img/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/enterprise_img/'.$data->enterprise_img.', w80,h60;');
				}
	 			$table->easyCell(iconv("UTF-8", '',$data->enterprise_desc),'align:L');	
				$table->printRow();
				$table->endTable(10);
			}			
		}

		// ###########################################################
 	// 	##						Products						 ##
 	// 	###########################################################
		// 	$query_product = $this->pamain_report->query_product($gencode);
	 // 		// $count_facility = $this->pamain_report->count_facility($gencode);
		// 	if (!empty($query_product)) {
		// 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
		//  			$table->rowStyle('border:;border-color:#a1a1a1;'); 
		//  			$table->easyCell('Products', 'align:L;font-size:12;colspan:2;font-style:B');
		// 			$table->printRow();
		// 			$table->endTable();	

		// 		foreach ($query_product as $data) {
		// 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');				
		// 			$table->rowStyle('border:;border-color:#a1a1a1;');
		// 			if ($data->prod_img == "") {
		// 			$table->easyCell('','img:bmb_assets2/upload/product_img/nophoto.jpg');
		// 			} else {
		//  			$table->easyCell('','img:bmb_assets2/upload/product_img/'.$data->prod_img.', w80,h60;');	
		//  			$table->easyCell(iconv("UTF-8", '',$data->prod_desc),'align:L');	
		// 			$table->printRow();
		// 			}
		// 		}
				
		// 	$table->endTable(10);
		// 	}

		// ###########################################################
 	// 	##						ENTERPRISE						 ##
 	// 	###########################################################
		// 	$query_enterprise = $this->pamain_report->query_enterprise($gencode);
	 // 		// $count_facility = $this->pamain_report->count_facility($gencode);
		// 	if (!empty($query_enterprise)) {
		// 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
		//  			$table->rowStyle('border:;border-color:#a1a1a1;'); 
		//  			$table->easyCell('Enterprise', 'align:L;font-size:12;colspan:2;font-style:B');
		// 			$table->printRow();
		// 			$table->endTable();	

		// 		foreach ($query_enterprise as $data) {
		// 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');				
		// 			$table->rowStyle('border:;border-color:#a1a1a1;');
		// 			if ($data->enterprise_img == "") {
		// 			$table->easyCell('','img:bmb_assets2/upload/enterprise_img/nophoto.jpg');
		// 			} else {
		//  				$table->easyCell('','img:bmb_assets2/upload/enterprise_img/'.$data->enterprise_img.', w80,h60;');	
		//  				$table->easyCell(iconv("UTF-8", '',$data->enterprise_desc),'align:L');	
		// 				$table->printRow();
		// 				$table->endTable(10);
		// 			}
		// 		}
				
		// 	}
 	// 	} 
 		
		

		###########################################################
 		##														 ##
 		##					Project Established					 ##
 		##														 ##
 		###########################################################
 		$query_project = $this->pamain_report->query_project($gencode);
 		$count_project = $this->pamain_report->count_project($gencode);
		$query_programs = $this->pamain_report->query_programs($gencode);
 		$count_programs = $this->pamain_report->count_programs($gencode);
 		$query_research = $this->pamain_report->query_research($gencode);
 		$count_research = $this->pamain_report->count_research($gencode);

		$query_project_sapa = $this->pamain_report->query_project_sapa($gencode);
		$query_project_moa = $this->pamain_report->query_project_moa($gencode);
		$query_project_pacbrma = $this->pamain_report->query_project_pacbrma($gencode);

		$query_project_moa_count = $this->pamain_report->query_project_moa_count($gencode);
		$query_project_pacbrma_count = $this->pamain_report->query_project_pacbrma_count($gencode);
		$query_project_sapa_count = $this->pamain_report->query_project_sapa_count($gencode);

 		if (!empty($count_project) || !empty($count_programs) || !empty($count_research)) {
 			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('TENURIAL INSTRUMENT', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();
			$pdf->Ln(5);
		 	$pdf->SetFont('Times','',12);

		###########################################################
 		##					Tenurial instrument					 ##
 		###########################################################
		 	
		if (!empty($query_project_moa_count)) {
				
		 	$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#ffffff;');
			$table->easyCell('Memorandum of Agreement (MOA)', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();
			// $pdf->Ln(5);		

						
			foreach ($query_project_moa as $row) {		
				if ($row->type_processing == "moa") {				
					
				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',
									'<s "font-color:#234fa7">Proponent Name:</s>'." ".$row->project_name
									."\n".'<s "font-color:#234fa7">Nature of development:</s>'." ".$row->nature_development
									."\n".'<s "font-color:#234fa7">Locations:</s>'." ".$row->proj_location
									."\n".'<s "font-color:#234fa7">Area:</s>'." ".number_format($row->proj_area,2)." has."								
								));	
				$table->printRow();
		$table->endTable(5);
				}	
			}
			$pdf->Ln(10);

			
		}

		if (!empty($query_project_pacbrma_count)) {
		 	$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#ffffff;');
			$table->easyCell('Protected Area Community Based Resources Management Agreement (PACBRMA)', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();
			foreach ($query_project_pacbrma as $row) {		
				if ($row->type_processing == "pacbrma") {				
					
				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',
									'<s "font-color:#234fa7">Proponent Name:</s>'." ".$row->project_name
									."\n".'<s "font-color:#234fa7">Nature of development:</s>'." ".$row->nature_development
									."\n".'<s "font-color:#234fa7">Locations:</s>'." ".$row->proj_location
									."\n".'<s "font-color:#234fa7">Area:</s>'." ".number_format($row->proj_area,2)." has."								
								));	
				$table->printRow();
		$table->endTable(5);
				}	
			}
			$pdf->Ln(10);
		}

		if (!empty($query_project_sapa_count)) {
		 	$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
			$table->rowStyle('border:TB;border-color:#ffffff;');
			$table->easyCell('Special Use Agreement in Protected Area (SAPA)', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
			$table->endTable();
			foreach ($query_project_sapa as $row) {		
				if ($row->type_processing == "sapa") {				
					
				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '',
									'<s "font-color:#234fa7">Proponent Name:</s>'." ".$row->project_name
									."\n".'<s "font-color:#234fa7">Nature of development:</s>'." ".$row->nature_development
									."\n".'<s "font-color:#234fa7">Locations:</s>'." ".$row->proj_location
									."\n".'<s "font-color:#234fa7">Area:</s>'." ".number_format($row->proj_area,2)." has."								
								));	
				$table->printRow();
		$table->endTable(5);
				}	
			}
			$pdf->Ln(10);
		}

		// if (!empty($query_project_pacbrma_count)) {				
		 	
		// 	$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		// 	$table->rowStyle('border:TB;border-color:#ffffff;');
		// 	$table->easyCell('Protected Area Community Based Resources Management Agreement (PACBRMA)', 'font-size:12;colspan:2;font-style:B');
		// 	$table->printRow();
		// 	$table->endTable();	
						
		// 	foreach ($query_project_pacbrma as $row) {		
		// 		if ($row->type_processing == "pacbrma") {				
		// 			$pdf->SetWidths(array(60,50,50,30));
		// 			$pdf->Cell($w[0],6,$row->project_name,1,0,'C');
		// 			$pdf->Cell($w[1],6,$row->nature_development,1,0,'C');
		// 			$pdf->Cell($w[2],6,$row->proj_location,1,0,'C');
		// 			$pdf->Cell($w[3],6,number_format($row->proj_area,2),1,0,'C');
		// 			$pdf->Ln();
		// 		}	
		// 	}
		// 	$pdf->Ln(10);
		// } 

		// if (!empty($query_project_sapa_count)) {
				
		//  	$w = array(190); //Total width 190
		// 	$pdf->SetFillColor(204, 204, 204);
		// 	$pdf->SetDrawColor(50,50,100);
		// 	$pdf->cell($w[0],9,'Special Use Agreement in Protected Area (SAPA)',1,0,'C',true);		
		// 	$pdf->Ln(9);
		// 	$pdf->SetFont('Times','',12);
		// 	$pdf->SetFont('Times','',12);	 	
		// 	$w = array(60,50,50,30); //Total width 190
		// 	$pdf->SetFillColor(204, 204, 204);
		// 	$pdf->SetDrawColor(50,50,100);
		// 	$pdf->cell($w[0],5,'Proponent',1,0,'C',true);
		// 	$pdf->cell($w[1],5,'Nature of Devt',1,0,'C',true);
		// 	$pdf->cell($w[2],5,'Location',1,0,'C',true);
		// 	$pdf->cell($w[3],5,'Area(has)',1,0,'C',true);
		// 	$pdf->Ln(5);		

						
		// 	foreach ($query_project_sapa as $row) {		
		// 		if ($row->type_processing == "sapa") {				
		// 			$pdf->SetWidths(array(60,50,50,30));
		// 			$pdf->Cell($w[0],6,$row->project_name,1,0,'L');
		// 			$pdf->Cell($w[1],6,$row->nature_development,1,0,'L');
		// 			$pdf->Cell($w[2],6,$row->proj_location,1,0,'L');
		// 			$pdf->Cell($w[3],6,number_format($row->proj_area,2),1,0,'C');
		// 			$pdf->Ln();
		// 		}	
		// 	}
		// 	$pdf->Ln(10);
		// } 
 	}

 		###########################################################
 		##														 ##
		##						PROGRAM 						 ##
 		##														 ##
 		###########################################################

 		$query_program = $this->pamain_report->query_program($gencode);
 		$query_program_count = $this->pamain_report->query_program_count($gencode);

		if (!empty($query_program_count)) {
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('PROGRAM', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(3);
		$pdf->SetFont('Times','',12);
				
		 	$w = array(190); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],9,'Program(s)',1,0,'C',true);		
			$pdf->Ln(9);
			$pdf->SetFont('Times','',12);
			$w = array(60,50,50,30); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],5,'Program Name',1,0,'C',true);
			$pdf->cell($w[1],5,'Proponent',1,0,'C',true);
			$pdf->cell($w[2],5,'Location',1,0,'C',true);
			$pdf->cell($w[3],5,'Area(has)',1,0,'C',true);
			$pdf->Ln(5);		

						
			foreach ($query_program as $row) {
				$pdf->SetWidths(array(60,50,50,30));
				$pdf->Cell($w[0],6,$row->program_name,1,0,'L');
				$pdf->Cell($w[1],6,$row->program_proponent,1,0,'L');
				$pdf->Cell($w[2],6,$row->program_location,1,0,'L');
				$pdf->Cell($w[3],6,number_format($row->program_area,2),1,0,'C');
				$pdf->Ln();
			}
			$pdf->Ln(10);
		} 

		###########################################################
 		##														 ##
		##						PROJECT 						 ##
 		##														 ##
 		###########################################################

 		$query_project = $this->pamain_report->query_project($gencode);
 		$count_project = $this->pamain_report->count_project($gencode);

		if (!empty($count_project)) {
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('PROJECT', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(3);
		 $pdf->SetFont('Times','',12);
				
		 	$w = array(190); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],9,'Project(s)',1,0,'C',true);		
			$pdf->Ln(9);
			$pdf->SetFont('Times','',12);
			$w = array(60,50,50,30); //Total width 190
			$pdf->SetFillColor(204, 204, 204);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],5,'Project Name',1,0,'C',true);
			$pdf->cell($w[1],5,'Proponent',1,0,'C',true);
			$pdf->cell($w[2],5,'Location',1,0,'C',true);
			$pdf->cell($w[3],5,'Area(has)',1,0,'C',true);
			$pdf->Ln(5);		

						
			foreach ($query_project as $row) {
				$pdf->SetWidths(array(60,50,50,30));
				$pdf->Cell($w[0],6,$row->proj_name,1,0,'L');
				$pdf->Cell($w[1],6,$row->proj_proponent,1,0,'L');
				$pdf->Cell($w[2],6,$row->proj_location,1,0,'L');
				$pdf->Cell($w[3],6,number_format($row->proj_area,2),1,0,'C');
				$pdf->Ln();
			}
			$pdf->Ln(10);
		}     


		###########################################################
 		##														 ##
		##						RESEARCH 						 ##
 		##														 ##
 		###########################################################

 		$query_researches = $this->pamain_report->query_researches($gencode);
 		$query_researches_count = $this->pamain_report->query_researches_count($gencode);

		if (!empty($query_researches_count)) {
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('RESEARCH', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);
		$pdf->SetFont('Times','',12);
				
		 // 	$w = array(190); //Total width 190
			// $pdf->SetFillColor(204, 204, 204);
			// $pdf->SetDrawColor(50,50,100);
			// $pdf->cell($w[0],9,'Research',1,0,'C',true);		
			// $pdf->Ln(4);
			// $pdf->SetFont('Times','',12);
			// $w = array(190); //Total width 190
			// $pdf->SetFillColor(204, 204, 204);
			// $pdf->SetDrawColor(50,50,100);
			// $pdf->cell($w[0],5,'Type of Research',1,0,'C',true);
			// $pdf->cell($w[0],5,'Title of Research',1,0,'C',true);
			
			// $pdf->Ln(5);	
			$i=0;
			foreach ($query_researches as $row) {
				$pdf->SetWidths(array(190));
				// $pdf->Cell($w[0],6,$row->search_type,1,0,'L');
				// $pdf->Cell($w[0],6,$row->search_title,1,0,'L');				
				// $pdf->Ln();
				$i++;
				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0');
				$table->rowStyle('border:;border-color:#a1a1a1;');
				$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">'.$i.')</s>'." ".$row->search_title));	
				$table->printRow();
				$table->endTable();
				}
			$pdf->Ln(5);
		}  


		###########################################################
 		##														 ##
 		##						THREATS 						 ##
 		##														 ##
 		###########################################################

 		$query_threat = $this->pamain_report->query_threat($gencode);
 		$query_threat_count = $this->pamain_report->query_threat_count($gencode);

 		if (!empty($query_threat_count)) {		
 		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('THREATS', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);
	 	$pdf->SetFont('Times','',12);

				$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
				$table->printRow();				

			foreach ($query_threat as $data) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
				if ($data->img_threat == "") {
					$table->easyCell('','img:bmb_assets2/upload/img_threat/nophoto.jpg');
				} else {
					$table->easyCell('','img:bmb_assets2/upload/img_threat/'.$data->img_threat.', w80,h60;');
				}
	 				
	 			$table->easyCell(iconv("UTF-8", '',$data->threat_desc),'align:L');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

		###########################################################
 		##														 ##
 		##						PAMB 						 	 ##
 		##														 ##
 		###########################################################

		if (!empty($countless)){
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('PROTECTED AREA MANAGEMENT BOARD', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);
	 	$pdf->SetFont('Times','',12);

				$table=new easyTable($pdf, '{50,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:TLR;border-color:#a1a1a1;'); 
 				$table->easyCell('MEMBERS', 'align:C;font-size:12;colspan:4;font-style:B');
				$table->printRow();
				$table->rowStyle('border:TBLR;border-color:#a1a1a1;'); 
 				$table->easyCell('Name','font-size:12;font-style:B');
				$table->easyCell('Gender','font-size:12;font-style:B');
				$table->easyCell('Offices','font-size:12;font-style:B');
				$table->easyCell('Position','font-size:12;font-style:B');
				$table->printRow();	
			
			foreach ($data_pamb as $row_p) {
				$table->rowStyle('border:TBLR;border-color:#a1a1a1;');
 				$table->easyCell(iconv("UTF-8", '',$row_p->fname." ".$row_p->lname));	
 				$table->easyCell(iconv("UTF-8", '',$row_p->sexdesc));	
 				$table->easyCell(iconv("UTF-8", '',$row_p->office_name));
 				$table->easyCell(iconv("UTF-8", '',$row_p->designation));
				$table->printRow();
			}
			$table->endTable(5);
		}
		
		
		###########################################################
 		##														 ##
 		##						REFERENCES 						 ##
 		##														 ##
 		###########################################################

 		$query_references = $this->pamain_report->query_references($gencode);
 		$query_references_count = $this->pamain_report->query_references_count($gencode);

 		if (!empty($query_references_count)) {		
 		$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('REFERENCE', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		$pdf->Ln(5);
	 	$pdf->SetFont('Times','',12);

				$table=new easyTable($pdf, '{190}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 			$table->rowStyle('border:;border-color:#a1a1a1;'); 
				$table->printRow();				

			foreach ($query_references as $row) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
	 			$table->easyCell(iconv("UTF-8", '',$row->author.' '.$row->ref_date_month.' '.$row->ref_date_year.'. <i>'.$row->title.'</i>'.$row->place.' '.$row->link),'align:L');	
				$table->printRow();
			}
			
		$table->endTable(10);
		}

 		$pdf->Output(); 		
    }	
}
