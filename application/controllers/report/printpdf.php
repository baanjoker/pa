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
			'PDFWL',
			'PDFWLINFO',
			'PDFWATER',
			'PDFPAMAIN',
			]);
		$this->load->model([
			'report/cave_report_model',
			'report/wetland_report_model',
			'report/waterfowl_report_model',
			'report/pamain_report'
		]);
		if ($this->session->userdata('isLogIn') == false
			|| $this->session->userdata('user_role') != 1
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

	public function cavesprint()
	{
		$field 		= 	$this->input->post('c_field1');
		$compared 	= 	$this->input->post('comparison1');
		$valued 	= 	$this->input->post('c_value1');
		$andor1		=	$this->input->post('comparisonandor2');
		$field2		=	$this->input->post('c_field2');
		$compared2	=	$this->input->post('comparison2');
		$valued2	=	$this->input->post('c_value2');
		$sortby		=	$this->input->post('c_field4');
		$orderby	=	$this->input->post('orderby');

	$data = $this->cave_report_model->query_search($field,$compared,$valued,$andor1,$field2,$compared2,$valued2,$sortby,$orderby);

	$pdf = new PDF();
	///var_dump(get_class_methods($pdf));

	$pdf->AddPage();
	$pdf->AliasNbPages();
	 // $pdf->Cell(0,-20,'List of existing Caves in the Philippines',0,0,'C');
    // Line break
  
	// $pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
	$pdf->SetFont('Times','',10);

	// $pdf->Output('D','filename.pdf');

    $w = array(55, 40, 50, 45);
    foreach($data as $row)
    {
   
        $pdf->Cell($w[0],6,$row->cave_name,'LR',0);
        $pdf->Cell($w[1],6,$row->regionName,'LR',0);
        $pdf->Cell($w[2],6,$row->provinceName,'LR',0);
        $pdf->Cell($w[3],6,$row->municipalName,'LR',0);
        $pdf->Ln();

    }


	$pdf->Output();
	}

	public function wetlandpdf()
	{
		$field 		= 	$this->input->post('c_field1');
		$compared 	= 	$this->input->post('comparison1');
		$valued 	= 	$this->input->post('c_value1');
		$andor1		=	$this->input->post('comparisonandor2');
		$field2		=	$this->input->post('c_field2');
		$compared2	=	$this->input->post('comparison2');
		$valued2	=	$this->input->post('c_value2');
		$sortby		=	$this->input->post('c_field4');
		$orderby	=	$this->input->post('orderby');

	$data = $this->wetland_report_model->query_search($field,$compared,$valued,$andor1,$field2,$compared2,$valued2,$sortby,$orderby);

	$pdf = new PDFWL();
	///var_dump(get_class_methods($pdf));

	$pdf->AddPage();
	$pdf->AliasNbPages();
	 // $pdf->Cell(0,-20,'List of existing Caves in the Philippines',0,0,'C');
    // Line break
  
	// $pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
	$pdf->SetFont('Times','',10);

	// $pdf->Output('D','filename.pdf');

    $w = array(55, 40, 50, 45);
    foreach($data as $row)
    {
   
        $pdf->Cell($w[0],6,$row->wetlandname,'LR',0);
        $pdf->Cell($w[1],6,$row->regionName,'LR',0);
        $pdf->Cell($w[2],6,$row->provinceName,'LR',0);
        $pdf->Cell($w[3],6,$row->municipalName,'LR',0);
        $pdf->Ln();

    }


	$pdf->Output();
	}


	public function pdffilewetland($id_wetland=null)
    {
    	
 		$datas = $this->wetland_report_model->query_search_individual($id_wetland);

 		$pdf = new PDFWLINFO();
 		$pdf->AddPage();
 		$pdf->AliasNbPages();
 		$pdf->SetFont('Times','B',24);


 		$pdf->SetWidths(array(50,140));
 		$w = array(0,2);

 		foreach($datas as $row)
    	{
 		$pdf->Cell($w[0],6,$row->wetlandname,0,0,'C');
        $pdf->Ln(20);
 		}
 		$pdf->SetFont('Times','',12);
 		// $pdf->Cell(5,6,'Wetland Type','B',0,'c');  
 		foreach($datas as $row)
 		{
 			$pdf->Row(array('Wetland Type :',$row->wtypedesc)); 
 			$pdf->Ln(5);
 			$pdf->Row(array('Wetland Description :',$row->wdescdesc));
 			$pdf->Ln(5);
 			if($row->wetlandpa == 1)
 			{
 				$pdf->Row(array('','Within Protected Area'));
 				$pdf->Ln(5);
 			} else {

 			}
 			$pdf->Row(array('Region :',$row->regionName));
 			$pdf->Ln(5);
 			$pdf->Row(array('Province :',$row->provinceName));
 			$pdf->Ln(5);
 			$pdf->Row(array('Muncipality :',$row->municipalName));
 			$pdf->Ln(5);
 			if(!empty($row->barangayName))
 			{
 				$pdf->Row(array('Barangay :',$row->barangayName));
 				$pdf->Ln(5);
 			}else{

 			}
 			
 			$pdf->Row(array('Area(Hectare) :',$row->area));
 			$pdf->Ln(5);
 			if(!empty($row->landuse))
 			{
	 			$pdf->Row(array('Landuses :',$row->landuse));
	 			$pdf->Ln(5);
	 		}else{

	 		}
 			if(!empty($row->status))
 			{
 			$pdf->Row(array('Status of the Area :',$row->status));
 			$pdf->Ln(5);
	 		}else{

	 		}
	 		if(!empty($row->remarks))
 			{
	 			$pdf->Row(array('Remarks :',$row->remarks));
	 			$pdf->Ln(5);
	 		}else{
	 			$pdf->Row(array('Remarks :','None'));
	 			$pdf->Ln(5);
	 		}
	 		$pdf->SetFont('Times','I',10);
 			$pdf->Cell(0,6,'*** Nothings Follow ***','T',0,'C');
 		}
 		
 		$pdf->Output(); 		
    }	

    public function waterfowlpdf()
	{
		$field 		= 	$this->input->post('c_field1');
		$compared 	= 	$this->input->post('comparison1');
		$valued 	= 	$this->input->post('c_value1');
		$andor1		=	$this->input->post('comparisonandor2');
		$field2		=	$this->input->post('c_field2');
		$compared2	=	$this->input->post('comparison2');
		$valued2	=	$this->input->post('c_value2');
		$sortby		=	$this->input->post('c_field4');
		$orderby	=	$this->input->post('orderby');

	$data = $this->waterfowl_report_model->query_search($field,$compared,$valued,$andor1,$field2,$compared2,$valued2,$sortby,$orderby);

	$pdf = new PDFWATER();
	///var_dump(get_class_methods($pdf));

	$pdf->AddPage();
	$pdf->AliasNbPages();
	 // $pdf->Cell(0,-20,'List of existing Caves in the Philippines',0,0,'C');
    // Line break
  
	// $pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
	$pdf->SetFont('Times','',10);

	// $pdf->Output('D','filename.pdf');

    $w = array(55, 25, 40, 25, 45);
    foreach($data as $row)
    {
   
        $pdf->Cell($w[0],6,$row->wetlandname,0,0);        
        $pdf->Cell($w[1],6,$row->regionName,0,0);
        $pdf->Cell($w[2],6,$row->provinceName,0,0);
        $pdf->Cell($w[3],6,$row->month." ".$row->year,0,0);
        $pdf->multicell($w[4],6,$row->species,0,0);
        $pdf->Ln();

    }


	$pdf->Output();
	}

	public function pdffilewater($id_wf=null)
    {
    	
 		$datas = $this->waterfowl_report_model->query_search_individual($id_wf);

 		$pdf = new PDFWLINFO();
 		$pdf->AddPage();
 		$pdf->AliasNbPages();
 		$pdf->SetFont('Times','B',24);


 		$pdf->SetWidths(array(50,140));
 		$w = array(0,2);

 		foreach($datas as $row)
    	{
 		$pdf->Cell($w[0],6,$row->wetlandname,0,0,'C');
        $pdf->Ln(7);

        $pdf->SetFont('Times','',12);
        $pdf->Cell($w[0],6,$row->regionName.", ".$row->provinceName,0,0,'C');
        $pdf->Ln(15);
 		}
 		$pdf->SetFont('Times','',12);
 		// $pdf->Cell(5,6,'Wetland Type','B',0,'c');  
 		foreach($datas as $row)
 		{ 	
 			if(!empty($row->year) && !empty($row->month))
 			{
	 			$pdf->Row(array('Date Census :',$row->month." ".$row->year));
	 			$pdf->Ln(5);
	 		}else{

	 		}

	 		$pdf->Row(array('Identified Species :',$row->species));
	 		$pdf->Ln(5);
 			
	 		$pdf->SetFont('Times','I',10);
 			$pdf->Cell(0,6,'*** Nothings Follow ***','T',0,'C');
 		}
 		
 		$pdf->Output(); 		
    }	

    public function pdffilepa($gencode=null)
    {
     $pasuQuery = $this->pamain_report->query_pasu($gencode);
		$proc_legis = $this->pamain_report->query_pambproc_combined($gencode);		
		$geographic = $this->pamain_report->biogeographic_combine($gencode);
		$datas = $this->pamain_report->query_search_individual($gencode);
		$paarea = $this->pamain_report->paArea($gencode);
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
		$pdf->Cell($w[0],6,$row->pa_name,0,0,'C');
		$pdf->Ln(15);

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
							$table->easyCell(iconv("UTF-8", 'KOI8-R', '<s "font-color:#234fa7">Legal Basis:</s>'."\n".$row1->try
								."\n\n".'<s "font-color:#234fa7">Classification:</s>'."\n".$row2->nipDesc
								."\n\n".'<s "font-color:#234fa7">Category:</s>'."\n".$row2->categoryName
								."\n\n".'<s "font-color:#234fa7">Conservation Area:</s>'."\n".$row2->CPABIdesc
								."\n\n".'<s "font-color:#234fa7">Terrestrial Land area (has):</s>'."\n".number_format($row4->area,2)." has."
								."\n\n".'<s "font-color:#234fa7">Buffer zone (has):</s>'."\n".number_format($row4->buffer,2)." has."
								."\n\n".'<s "font-color:#234fa7">Marine area (has):</s>'."\n".number_format($row4->marine_area,2)." has."
								."\n\n".'<s "font-color:#234fa7">Total area (has):</s>'."\n".number_format($row5->total_area,2)." has."	
							), 'font-size:12;');						
							}
						}
					}
				}
			}
			foreach ($datas as $row2) {
				foreach ($geographic as $row) {
					foreach ($location as $row_loc) {
													
							if (!empty($row_loc->try2)) {
							$comment = strtolower($row_loc->try2);

							$sentences = explode('. ', $comment);

							$counter = 0;
							foreach ($sentences as $sentence) {
							$sentences[$counter] = ucfirst($sentence);
							$counter++;
							}

							$fixed = implode('. ', $sentences);
							$table->easyCell(iconv("UTF-8", '',
									'<s "font-color:#234fa7">Elevation:</s>'."\n"."Highest Elevation: ".number_format($row2->elevation_highest,2)." meter(s) \n Lowest Elevation: ".number_format($row2->elevation_lowest,2)." meter(s)"
									."\n\n".'<s "font-color:#234fa7">Geographic Location:</s>'."\n".$row->Geographic	
									."\n\n".'<s "font-color:#234fa7">Region(s):</s>'."\n".$row_loc->try1
									."\n\n".'<s "font-color:#234fa7">Locations:</s>'."\n".ucwords($fixed)
									."\n\n".'<s "font-color:#234fa7">Biogeograpic Zone:</s>'."\n".$row2->TBZlocation
									."\n\n".'<s "font-color:#234fa7">Protected Area Boundary:</s>'."\n North: ".$row2->pa_boundary_north."\n East: ".$row2->pa_boundary_east."\n West: ".$row2->pa_boundary_west."\n South: ".$row2->pa_boundary_south
								));
							
						}
					}
				}
			}
		$table->printRow();
		$table->endTable(5);

		$pdf->Ln(7);

		$table=new easyTable($pdf, '{40,40,40,40,40}', 'border-color:#ffff00; font-size:12; border:0');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('Status of Accomplishments for NIPAS/ENIPAS Implementation','colspan:5;font-size:12;font-style:B');
			$table->printRow();
			if (!empty($row2->nipas_mapstd)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Maps and TDs</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Maps and TDs</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_pasa)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PASA</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PASA</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_legislated)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Legislated</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Legislated</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_delineation)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Delineation</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Delineation</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_proclaimed)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Proclaimed</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Proclaimed</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			$table->printRow();			
			if (!empty($row2->nipas_Demarcation)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Demarcation</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">Demarcation</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->pamb_approve)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PAMB</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PAMB</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_pamp)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PAMP</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">PAMP</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_ipaf)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">IPAF</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">IPAF</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			if (!empty($row2->nipas_sapa)) {
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">SAPA</s>'),'img:bmb_assets2/img/check2.png, w7;');
			}else{
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#0000">SAPA</s>'),'img:bmb_assets2/img/ekis1.png, w7;');
			}
			$table->printRow();
		$table->endTable(5);
		
		$pdf->AddPage();
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:1;');
		$table->rowStyle('border:TB;border-color:#a1a1a1;');
		$table->easyCell('MANAGEMENT ZONE', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$table->endTable();
		// $pdf->Ln(5);

		$x=$pdf->GetX();
		$y=$pdf->GetY();
		$tableB=new easyTable($pdf, '{60,35}', 'width:100;l-margin:2; align:L{LC}; border-color:#000; font-size:12; border:1');
		$tableB->rowStyle('border:T;border-color:#a1a1a1;'); 
		$tableB->rowStyle('align:{L}; bgcolor:#00ace6;');
		$tableB->easyCell("Strict Protection Zone");
		$tableB->easyCell("Area");	 
		$tableB->printRow();		  
		foreach ($strictprotzone as $szone) {
			$tableB->rowStyle('align:C; valign:M');
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$szone->description));
			$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$szone->s_area." has." ));
			$tableB->printRow();
		}
			$tableB->endTable(10);
		
		// ########################################################
		$pdf->SetY($y);		
		$tableB=new easyTable($pdf,'{60, 35}', 'width:; l-margin:97; border1; border-color:#000;font-size:12; border:1;');  
		  	$tableB->rowStyle('border:T;border-color:#a1a1a1;'); 
			$tableB->rowStyle('align:{L}; bgcolor:#00ace6;');
			$tableB->easyCell("Multiple Used Zone");
			$tableB->easyCell("Area");
		   $tableB->printRow(); 
		foreach ($multiplezone as $mzone) {
		$tableB->rowStyle('align:C; valign:M'); 								
		$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$mzone->description ));
		$tableB->easyCell(iconv("UTF-8", 'KOI8-R',$mzone->area." has." ));
		$tableB->printRow();			 
		}
		$tableB->endTable(10);
	
		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('SOCIO-ECONOMICS','font-size:12;font-style:B');			
			$table->easyCell('PHYSICAL FEATURES','font-size:12;font-style:B');
			$table->printRow();
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Ethinicity: </s>'."\n".$row2->ethinicity
						."\n\n".'<s "font-color:#234fa7">Demography:</s>'."\n".$row2->demography
						."\n\n".'<s "font-color:#234fa7">Livelihood:</s>'."\n".$row2->livelihood
						."\n\n".'<s "font-color:#234fa7">Basic Social Service:</s>'."\n".$row2->social_service
						."\n\n".'<s "font-color:#00000; font-style:bold">ANTROPOLOGY</s>'
						."\n\n".'<s "font-color:#234fa7">Cultural Resource:</s>'."\n".$row2->cultural_resource						
						."\n\n".'<s "font-color:#234fa7">Customs and Beliefs:</s>'."\n".$row2->belief
						."\n\n".'<s "font-color:#234fa7">Archeology:</s>'."\n".$row2->archeology
						."\n\n".'<s "font-color:#234fa7">Tenured Migrants:</s>'."\n".$row2->tenured_migrant
						));		
			$table->easyCell(iconv("UTF-8", '','<s "font-color:#234fa7">Climate Type:</s>'."\n".$row2->climate 						
						."\n\n".'<s "font-color:#234fa7">Topology:</s>'."\n".$row2->topology
						."\n\n".'<s "font-color:#234fa7">Hydrology/River System:</s>'."\n".$row2->hydrology
						."\n\n".'<s "font-color:#234fa7">Landcover:</s>'."\n".$row2->landcover
						."\n\n".'<s "font-color:#234fa7">Existing Landuse:</s>'."\n".$row2->existing_landuse
						."\n\n".'<s "font-color:#234fa7">Geologic Features:</s>'."\n".$row2->geologic_feature
						// ."\n\n".'<s "font-color:#234fa7">Demography:</s>'."\n".$row2->demography
					));	
		
			$table->printRow();
		$table->endTable();

		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('USES OF THE AREA','font-size:12;font-style:B');			
			$table->easyCell('','font-size:12;font-style:B');
			$table->printRow();
			$table->easyCell(iconv("UTF-8", 'KOI8-R','<s "font-color:#234fa7">Tourism Purposes: </s>'."\n".$row2->tourism
						."\n\n".'<s "font-color:#234fa7">Facility Purposes:</s>'."\n".$row2->facilities	
						// ."\n\n".'<s "font-color:#234fa7">Science and Research Purposes:</s>'."\n".$row2->science_research	
						// ."\n\n".'<s "font-color:#234fa7">Facility Purposes:</s>'."\n".$row2->facilities						
						));		
			$table->easyCell(iconv("UTF-8", 'KOI8-R','<s "font-color:#234fa7">Science and Research Purposes:</s>'."\n".$row2->science_research 						
						."\n\n".'<s "font-color:#234fa7">Educational Purposes:</s>'."\n".$row2->educational						
						));	
		
			$table->printRow();
		$table->endTable();

		if (!empty($counttribe)) {
				$pdf->Ln(10);
	        	$pdf->SetFont('Times','B',12);
	 			$pdf->Cell(0,0,'LIST OF OCCUPANTS',0,0,'c');
	 			$pdf->Ln(5);
	 			$pdf->SetFont('Times','',11);
	 			$w = array(25, 35, 50, 55, 25); //Total width 190
				$pdf->SetFillColor(180,180,255);
				$pdf->SetDrawColor(50,50,100);
				$pdf->cell($w[0],5,'Tag No.',1,0,'C',true);
				$pdf->cell($w[1],5,'Date Occupied',1,0,'C',true);
				$pdf->cell($w[2],5,'Tribe',1,0,'C',true);
				$pdf->cell($w[3],5,'Full Name',1,0,'C',true);
				$pdf->cell($w[4],5,'Gender',1,0,'C',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','',12);
				foreach ($tribe as $tri) {

					// $pdf->Cell($w[0],6,$row->description,1,0);  
					$pdf->Cell($w[0],6,$tri->tribe_housetag,1,0,'C');
				    $pdf->Cell($w[1],6,$tri->month." ".$tri->tribe_day.", ".$tri->tribe_year,1,0);
				    $pdf->Cell($w[2],6,$tri->tribe_name,1,0);
				    $pdf->Cell($w[3],6,$tri->tribe_fname." ".$tri->tribe_lname,1,0);
				    $pdf->Cell($w[4],6,$tri->sexdesc,1,0);
				    $pdf->Ln();
				}
				
 			}

 	

		if (!empty($counttribe)) {
				$pdf->Ln(10);
	        	$pdf->SetFont('Times','B',12);
	 			$pdf->Cell(0,0,'LIST OF OCCUPANTS',0,0,'c');
	 			$pdf->Ln(5);
	 			$pdf->SetFont('Times','',11);
	 			$w = array(25, 35, 50, 55, 25); //Total width 190
				$pdf->SetFillColor(180,180,255);
				$pdf->SetDrawColor(50,50,100);
				$pdf->cell($w[0],5,'Tag No.',1,0,'C',true);
				$pdf->cell($w[1],5,'Date Occupied',1,0,'C',true);
				$pdf->cell($w[2],5,'Tribe',1,0,'C',true);
				$pdf->cell($w[3],5,'Full Name',1,0,'C',true);
				$pdf->cell($w[4],5,'Gender',1,0,'C',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','',12);
				foreach ($tribe as $tri) {

					// $pdf->Cell($w[0],6,$row->description,1,0);  
					$pdf->Cell($w[0],6,$tri->tribe_housetag,1,0,'C');
				    $pdf->Cell($w[1],6,$tri->month." ".$tri->tribe_day.", ".$tri->tribe_year,1,0);
				    $pdf->Cell($w[2],6,$tri->tribe_name,1,0);
				    $pdf->Cell($w[3],6,$tri->tribe_fname." ".$tri->tribe_lname,1,0);
				    $pdf->Cell($w[4],6,$tri->sexdesc,1,0);
				    $pdf->Ln();
				}
				
 			}

 		if (!empty($countbiological)) {
	 			$pdf->Ln(10);
	        	$pdf->SetFont('Times','B',12);
	 			$pdf->Cell(0,0,'LIST OF BIOLOGICAL FEATURES',0,0,'c');
	 			$pdf->Ln(5);
	 			$pdf->SetFont('Times','',11);
	 			$w = array(25, 25, 30, 55, 55); //Total width 190
				$pdf->SetFillColor(180,180,255);
				$pdf->SetDrawColor(50,50,100);
				$pdf->cell($w[0],5,'Status',1,0,'C',true);
				$pdf->cell($w[1],5,'Class',1,0,'C',true);
				$pdf->cell($w[2],5,'Order',1,0,'C',true);
				$pdf->cell($w[3],5,'Common Name',1,0,'C',true);
				$pdf->cell($w[4],5,'Scientific Name',1,0,'C',true);
				$pdf->Ln(5);
				$pdf->SetFont('Times','',12);
				foreach ($biological as $row) {

					// $pdf->Cell($w[0],6,$row->description,1,0);  
					$pdf->Cell($w[0],6,$row->IUCNCode,1,0,'C');
				    $pdf->Cell($w[1],6,$row->ClassDesc,1,0);
				    $pdf->Cell($w[2],6,$row->OrderDesc,1,0);
				    $pdf->Cell($w[3],6,$row->commonNameSpecies,1,0);
				    $pdf->Cell($w[4],6,$row->scientificName_genus,1,0);
				    $pdf->Ln();
				}
 			}

 		$pdf->Ln(7);

 		$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0');
			$table->rowStyle('border:TB;border-color:#a1a1a1;');
			$table->easyCell('GEOHAZARD FEATURES','font-size:12;font-style:B');			
			$table->easyCell('','font-size:12;font-style:B');
			$table->printRow();
			$table->easyCell(iconv("UTF-8", 'KOI8-R','<s "font-color:#234fa7">Landslide susceptibility: </s>'."\n".$row2->landslide
						."\n\n".'<s "font-color:#234fa7">Flooding susceptibility:</s>'."\n".$row2->flooding						
						));		
			$table->easyCell(iconv("UTF-8", 'KOI8-R','<s "font-color:#234fa7">Sea level rise:</s>'."\n".$row2->sealevelrise 						
						."\n\n".'<s "font-color:#234fa7">Tsunami Susceptibility:</s>'."\n".$row2->tsunami						
						));	
		
			$table->printRow();
		$table->endTable();

 		$pdf->Ln(7); 		

		if (!empty($countless)){
				$table=new easyTable($pdf, '{50,50,50,50}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:TLR;border-color:#a1a1a1;'); 
 				$table->easyCell('PAMB MEMBERS', 'align:C;font-size:12;colspan:4;font-style:B');
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
 				$table->easyCell(iconv("UTF-8", '',$row_p->description));
				$table->printRow();
			}
			$table->endTable(5);
		}
		if(!empty($attract)){		
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:;border-color:#a1a1a1;'); 
 				$table->easyCell('ECO-TOURISM ATTRACTION', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->printRow();					
			foreach ($attract as $img_at) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell('','img:bmb_assets2/upload/attraction_img/'.$img_at->image_attr);	
 				$table->easyCell(iconv("UTF-8", '',$img_at->title."\n\n".$img_at->description),'align:L');	 				
				$table->printRow();
			}
		$table->endTable(5);
		}

		if(!empty($facility)){		
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:;border-color:#a1a1a1;'); 
 				$table->easyCell('ECO-TOURISM FACILITY', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->printRow();					
			foreach ($facility as $img_facility) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell('','img:bmb_assets2/upload/facilities_img/'.$img_facility->image_facility);	
 				$table->easyCell(iconv("UTF-8", '',$img_facility->title_facility."\n\n".$img_facility->description_facility),'align:L');	 				
				$table->printRow();
			}
			$table->endTable(5);
		}

		if(!empty($activity)){
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:;border-color:#a1a1a1;'); 
 				$table->easyCell('ECO-TOURISM ACTIVITY', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->printRow();					
			foreach ($activity as $img_activity) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell('','img:bmb_assets2/upload/ecotourism_img/'.$img_activity->image_eco);	
 				$table->easyCell(iconv("UTF-8", '',$img_activity->activities."\n\n".$img_activity->description),'align:L');	 				
				$table->printRow();
			}
			$table->endTable(5);
		}

		if(!empty($agro)){
			$table=new easyTable($pdf, '{100,100}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 				$table->rowStyle('border:;border-color:#a1a1a1;'); 
 				$table->easyCell('AGROFORESTRY ACTIVITY', 'align:L;font-size:12;colspan:2;font-style:B');
				$table->printRow();				
				$table->printRow();					
			foreach ($agro as $img_agro) {
				$table->rowStyle('border:;border-color:#a1a1a1;');
 				$table->easyCell('','img:bmb_assets2/upload/agroforestry_img/'.$img_agro->image_agro);	
 				$table->easyCell(iconv("UTF-8", '',$img_agro->title_agro."\n Area : ".$img_agro->has_agro."has. \n\n".$img_agro->description_agro),'align:L');	
				$table->printRow();
			}

			$table->endTable(5);
		}
		if (!empty($threats)) {
		$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 		$table->rowStyle('border:TB;border-color:#a1a1a1;'); 		
		$table->easyCell('THREAT(S)', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
		$n = 0;
			foreach ($threats as $thr) {
				$n++;
			$table->easyCell(iconv("UTF-8", '',''.$n.'. ' .ucfirst($thr->threat_desc)));	
			$table->printRow();
			}
			
		$table->endTable(10);
		}

		if (!empty($countproject)) {
			$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
	 		$table->rowStyle('border:TB;border-color:#a1a1a1;'); 		
			$table->easyCell('PROJECT ESTABLISHED', 'font-size:12;colspan:2;font-style:B');
			$table->printRow();
	 		$pdf->Ln(2);
	 		$pdf->SetFont('Times','',11);
	 		$w = array(80, 35, 30, 45); //Total width 190
			$pdf->SetFillColor(180,180,255);
			$pdf->SetDrawColor(50,50,100);
			$pdf->cell($w[0],5,'Tenurial Instrument/ Tenured Holder',1,0,'C',true);
			$pdf->cell($w[1],5,'Type of Issuance',1,0,'C',true);
			$pdf->cell($w[2],5,'Year Implemented',1,0,'C',true);
			$pdf->cell($w[3],5,'Amount',1,0,'C',true);
			$pdf->Ln(5);
			$pdf->SetFont('Times','',12);
			foreach ($project as $proj) {	
				if (!empty($proj->implementor)) {
					$pdf->Cell($w[0],6,$proj->project_name."\n by ".$proj->implementor,1,0,'');								
				}else{
					$pdf->Cell($w[0],6,$proj->project_name,1,0,'');
				}		
				if ($proj->type_processing == "moa") {
					$pdf->Cell($w[1],6,'MOA',1,0);
				}else{
					$pdf->Cell($w[1],6,'SAPA No. '.$proj->sapa_no,1,0);
				}
			    
			    $pdf->Cell($w[2],6,$proj->date_start." - ".$proj->date_end,1,0);
			    $pdf->Cell($w[3],6,'Php '.number_format($proj->amount,2),1,0,'R');
			    $pdf->Ln();
			}
			$table->endTable(10);
		}
		
		if (!empty($references)) {
		// $pdf->Ln(7);
		$table=new easyTable($pdf, '{200}', 'width:100; border-color:#ffff00; font-size:12; border:0;');
 		$table->rowStyle('border:TB;border-color:#a1a1a1;');
 		$table->easyCell('REFERENCE', 'font-size:12;colspan:2;font-style:B');
		$table->printRow();
			$n = 0;
			foreach ($references as $ref) {
				$n++;
			$table->easyCell(iconv("UTF-8", '',''.$n.'. ' .ucfirst($ref->reference_desc)."\n\n Reference link : ".$ref->link));	
			$table->printRow();
			}
		$table->endTable();
		}
		
		if (!empty($countimage)) {
 				$image_height = 200;
				$image_width = 190;
				//get current X and Y
				$start_x = $pdf->GetX();
				$start_y = $pdf->GetY();				
	        		$counter = 1;
	 				foreach ($image as $row_i) {
	 				$pdf->AddPage();
	 				$pdf->SetFont('Times','B',12);
	 				$pdf->Cell(0,0,'Map of '.$row_i->pa_name,0,0,'c');
	 				$pdf->Ln(5);
	 				$pdf->SetFont('Times','I',12);
	 				$pdf->Cell(0,0,'ANNEX '.$counter,0,0,'c');
	 				$pdf->Ln(5);	 					 				
					$pdf->Cell(0, 0,$pdf->image('bmb_assets2/upload/map_image/'.$row_i->filename,$pdf->GetX(), $pdf->GetY(),$image_width,$image_height),0,0,'C');
					$pdf->SetXY($start_x + $image_width + 3, $start_y);
					$counter++;
	 				}
 			}


 		$pdf->Output(); 		
    }
}
