<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 *
 */

class CEPA extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'pasu/dashboard_model',
			'pasu/pamain_model',
			'pasu/report/report_main'
		]);
		$this->load->library(['pdf']);
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
		redirect('login');
		$context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
        $fd = fopen("https://pais.bmb.gov.ph/pas/pasu/report/cepa/printcepa", "rb", false, $context);
	}

	public function index()
	{
		$data['page_title'] = 'Communication Education and Public Awareness';
        $user_id = $this->session->userdata('user_id');

        $fname = $this->session->userdata('fullname');
        $mname = $this->session->userdata('middlenames');
        $lname = $this->session->userdata('lastnames');
        $data['designation'] = $this->session->userdata('designation');
        $data['completename'] = $fname." ".$mname." ".$lname;
        $data['read'] = $this->dashboard_model->read_by_id($user_id);
        $data['monthListed'] = $this->pamain_model->monthListed();
        $data['yearListed']		= $this->pamain_model->yearListed();
        $data['yearduration']     = $this->pamain_model->yearduration();
		$data['dayList']		= $this->pamain_model->dayList();
		$data['paList']			= $this->pamain_model->paList();
        $data['quarter']         = $this->pamain_model->QuarterlyList();
        $data['content'] = $this->load->view('pasu/report/cepa_report',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
	}

	public function printcepa()
    {
    	$gencode = $this->input->post('pacepaid');
        $datas       = $this->report_main->data_main($gencode);
        $cepa_data 	 = $this->report_main->cepaactivityreport($gencode);
    	$pdf = new Pdf();
        $pdf->AddPage('P','A4',0);
        $pdf->AliasNbPages(); 
        if ($gencode == "") {
            $pdf->Cell(0,0,'',0,1,'C');
        } else {       
	        foreach ($datas as $row) {            
	          	$title= $row->pa_name;
        		$pdf->SetTitle($title);
	        }
	        foreach($cepa_data as $row):
		        $table=new easyTable($pdf, '{190}', 'width:100; border-color:#fff; font-size:12; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '','CEPA ACTIVITY REPORT OF '.strtoupper($title)),'font-size:12;align:L;font-style:B;bgcolor:#cccccc');                
	            	$table->printRow();
	            $table->endTable();
	            $table=new easyTable($pdf, '{35,50,30,75}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '','ACTIVITY:'),'font-size:10;align:L;font-style:B;');              
	            		$table->easyCell(iconv("UTF-8", '',$row->activity_name),'font-size:10;align:L;');              
	            		$table->easyCell(iconv("UTF-8", '',"OBJECTIVE/S"),'rowspan:3;font-size:10;align:L;font-style:B;');              
	            		$table->easyCell(iconv("UTF-8", '',$row->activity_objective),'rowspan:3;font-size:10;align:L;');              
	            	$table->printRow();

	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '','DATE:'),'font-size:10;align:L;font-style:B;');              
	            		$table->easyCell(iconv("UTF-8", '',(!empty($row->activity_month)?$row->month." ":"").(!empty($row->activity_day)?$row->activity_day.", ":"").(!empty($row->activity_year)?$row->year:"")),'font-size:10;align:L;');    
	            	$table->printRow();

	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '','VENUE:'),'font-size:10;align:L;font-style:B;');              
	            		$table->easyCell(iconv("UTF-8", '',(!empty($row->activity_venue)?$row->activity_venue:"")),'font-size:10;align:L;');    
	            	$table->printRow();

	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '','HIGHLIGHTS:'),'font-size:10;align:L;font-style:B;colspan:4');              
	            	$table->printRow();

	            	$table->rowStyle('border:TBLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '',(!empty($row->activity_summary)?$row->activity_summary:"")),'font-size:10;align:L;colspan:4');    
	            	$table->printRow();
	            $table->endTable();

	            	// AUDIENCE/STRAT/IEC

	            $table=new easyTable($pdf, '{8,55,8,55,8,56}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#cccccc');
	            		$table->easyCell(iconv("UTF-8", '','AUDIENCE'),'font-size:10;align:C;font-style:B;colspan:6');
	            	$table->printRow();
	            	$table->rowStyle('border:TBLR;border-color:#404040;');
	            		$table->easyCell(iconv("UTF-8", '','Male'),'font-size:10;align:L;font-style:B;align:C;colspan:2');
	            		$table->easyCell(iconv("UTF-8", '','Female'),'font-size:10;align:L;font-style:B;align:C;colspan:2');
	            		$table->easyCell(iconv("UTF-8", '','Total'),'font-size:10;align:L;font-style:B;align:C;colspan:2');
	            	$table->printRow();
	            	$table->rowStyle('border:TBLR;border-color:#404040;');
	            		$table->easyCell(iconv("UTF-8", '',number_format($row->activity_male)),'font-size:10;align:C;colspan:2');
	            		$table->easyCell(iconv("UTF-8", '',number_format($row->activity_female)),'font-size:10;align:C;colspan:2');
	            		$table->easyCell(iconv("UTF-8", '',number_format($row->activity_total)),'font-size:10;align:C;colspan:2');
	            	$table->printRow();

	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Audience Type'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();

	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_1==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '',"Pre School"),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_2==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Elementary School'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_3==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Junior High School'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_4==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Sr. High School'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_5==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Academe'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_6==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Media'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_7==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Policy Makers'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_8==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Brgy LGU'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_9==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','City LGU'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_10==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Municipal LGU'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_11==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Provincial LGU'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_12==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Religious group'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_13==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Peoples Organization'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_14==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','OGAs'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_15==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','NGOs'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:BLR;border-color:#404040;'); 
                	$table->easyCell('',($row->chk_audience_16==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Local Communities'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->chk_audience_17==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Private sector'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->chk_audience_18==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Others: '.($row->chk_audience_18==0?"":$row->chk_audience_18_others)),'font-size:10;align:L;');
	            	$table->printRow();
	            	
	            $table->endTable();

	            // STARTEGY
	            $table=new easyTable($pdf, '{8,55,8,55,8,56}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#cccccc');
	            		$table->easyCell(iconv("UTF-8", '','STRATEGY'),'font-size:10;align:C;font-style:B;colspan:6');
	            	$table->printRow();

	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->activity_chks1==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '',"Lecture"),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->activity_chks2==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Game/Competition'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->activity_chks3==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Theater'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->activity_chks4==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Educational Tour'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->activity_chks5==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Campaign'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->activity_chks6==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Research'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LR;border-color:#404040;'); 
                	$table->easyCell('',($row->activity_chks7==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Exhibit/Fair'),'font-size:10;align:L;'); 
                	$table->easyCell('',($row->activity_chks8==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Fun run/Walk-a-thon'),'font-size:10;align:L;');              
                	$table->easyCell('',($row->activity_chks9==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;');
	            		$table->easyCell(iconv("UTF-8", '','Mass media'),'font-size:10;align:L;');
	            	$table->printRow();
	            	$table->rowStyle('border:LBR;border-color:#404040;'); 
                	$table->easyCell('',($row->activity_chks10==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;border:LR;');
	            		$table->easyCell(iconv("UTF-8", '','Printed Materials'),'font-size:10;align:L;border:LR;'); 
                	$table->easyCell('',($row->activity_chks11==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;rowspan:2');
	            		$table->easyCell(iconv("UTF-8", '','Forum/Dialogue/Symposium'),'font-size:10;align:L;rowspan:2');              
                	$table->easyCell('',($row->activity_chks12==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4;rowspan:2');
	            		$table->easyCell(iconv("UTF-8", '','Interview/Focus Group Discussion'),'font-size:10;align:L;rowspan:2');
	            	$table->printRow();
	            	$table->rowStyle('border:LBR;border-color:#404040;'); 
	            	$table->easyCell('',($row->activity_chks13==0?'img:bmb_assets2/img/square.png':'img:bmb_assets2/img/checkbox.png').', w4, h4');
	            		$table->easyCell(iconv("UTF-8", '','Others: '.($row->activity_chks13==0?"":$row->chk_s_others)),'font-size:10;align:L;');
	            	$table->printRow();
	            $table->endTable();

	            // METHODS & MATERIALS USED
	            $table=new easyTable($pdf, '{8,55,8,55,8,56}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#cccccc');
	            		$table->easyCell(iconv("UTF-8", '','METHODS & MATERIALS USED'),'font-size:10;align:C;font-style:B;colspan:6');
	            	$table->printRow();
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Print Materials'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();

	            	$cepacode = $row->cepacode;
	            	$dataprint1 = $this->report_main->cepaprint($cepacode);
					$a=0;foreach($dataprint1 as $rowp):
					$a++;
					$table->rowStyle('border:LR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',$a.") ".($rowp->print_name=='14'?$rowp->print_name_others:$rowp->cepa_print_details)),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();					
					endforeach;	            	
					

	            	$datamm = $this->report_main->cepamultimedia($cepacode);
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Multimedia'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();
	            	$b=0;foreach($datamm as $rowmm):
					$b++;
					$table->rowStyle('border:LR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',$b.") ".($rowmm->multimedia=='8'?$rowmm->cepa_multimedia_other:$rowmm->cepa_multimedia_desc)),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();					
					endforeach;	   

					$datasm = $this->report_main->cepasocialmedia($cepacode);
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Social Media'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();
	            	$c=0;foreach($datasm as $rowsm):
					$c++;
					$table->rowStyle('border:LR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',$c.") ".($rowsm->multimedia=='8'?$rowsm->other_socialmedia:$rowsm->cepa_multimedia_desc)),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();					
					endforeach;

					$databs = $this->report_main->cepabroadcast($cepacode);
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Social Media'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();
	            	$d=0;foreach($databs as $rowbs):
					$d++;
					$table->rowStyle('border:LR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',$d.") ".$rowbs->cepa_multimedia_desc),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();					
					endforeach;

					$datasi = $this->report_main->cepasouvenir($cepacode);
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#ffe6e6'); 
	            		$table->easyCell(iconv("UTF-8", '','Souvenir'),'font-size:10;align:L;font-style:B;colspan:6');              
	            	$table->printRow();
	            	$e=0;foreach($datasi as $rowsi):
					$e++;
					$table->rowStyle('border:LR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',$e.") ".($rowsi->souveniritem=='15'?$rowsi->souvenir_other:$rowsi->cepa_souvenir_details)),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();					
					endforeach;

					$table->rowStyle('border:BLR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',''),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();	
	            $table->endTable();

	            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TLR;border-color:#404040;bgcolor:#cccccc');
	            		$table->easyCell(iconv("UTF-8", '','EVALUATION'),'font-size:10;align:C;font-style:B;');
	            	$table->printRow();	            
	            	$table->rowStyle('border:LR;border-color:#404040;bgcolor:#cccccc'); 
	            		$table->easyCell(iconv("UTF-8", '','(Provide brief evaluation of the activity based on pre and post test)'),'font-size:8;align:C;font-style:I;');              
	            	$table->printRow();
	            	$table->rowStyle('border:BLR;border-color:#404040;'); 
	            		$table->easyCell(iconv("UTF-8", '',$row->activity_details),'font-size:10;align:L;colspan:6');              
	            	$table->printRow();
	            $table->endTable();

	            $table=new easyTable($pdf, '{190}', 'width:100; border-color:#fff; font-size:10; border:1;font-family:arial');
	            	$table->rowStyle('border:TBLR;border-color:#404040;bgcolor:#cccccc');
	            		$table->easyCell(iconv("UTF-8", '','PHOTO IMAGES'),'font-size:10;align:C;font-style:B;colspan:6');
	            	$table->printRow();

	            	$dataimg = $this->report_main->get_cepa_activity_img($cepacode);
					$z="";foreach($dataimg as $rowimg):
					++$z;
					$table->rowStyle('border:LR;border-color:#404040');
                		$table->easyCell('ANNEX '.$z,'img:bmb_assets2/upload/cepa_activity_report/'.$rowimg->activity_img.', w200,h55;');
	            	$table->printRow();					
					endforeach;
					$table->rowStyle('border:BLR;border-color:#404040');
						$table->easyCell(iconv("UTF-8", '',''),'font-size:10;align:L;colspan:6'); 
	            	$table->printRow();	
	            $table->endTable();

	        endforeach;
    	} //end if else $gencode =="";
    	$pdf->Output();
    } // end public function
}