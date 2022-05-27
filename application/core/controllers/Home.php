<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'home_model'
		]);
	}
	 
	public function index()
	{
		//=================================================//
		//												   //
		//if user logged direct access in server dashboard //
		//												   //
		//=================================================//
		// if ($this->session->userdata('isLogIn') === true) 
        // redirect('dashboard'); 

		$data['base']=$this->config->item('base_url');
		
		$data['page_title'] = 'Home';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		$data['webslide'] = $this->setting_model->webslide();
		$data['webproject'] = $this->setting_model->webproject();
		$data['location'] = $this->home_model->query_pamblocation();
		$data['paname'] = $this->home_model->query_PA();
		$data['countpa'] = $this->home_model->query_PA_counts();
		$data['news'] = $this->home_model->query_news();		
        $data['datapa'] = $this->home_model->getalllegisperperPAselect();
		$data['proccount'] = $this->home_model->getalllegisperPAProc();
		$data['proccount2'] = $this->home_model->getalllegisperPAProc2();
		$data['proccount3'] = $this->home_model->getalllegisperPAProc3();
		$data['trytoquery'] = $this->home_model->getalllegisperperPA();
        $data['totalpas'] = $this->home_model->gettotalPA();
        $data['totalpaarea'] = $this->home_model->gettotalPAArea();

        


        // redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('maintenance'));

        $result = $this->home_model->getResultperRegion();
        $results = $this->home_model->getResultperRegionMarine();
        $result2 = $this->home_model->get_all_regions();
        $result3 = $this->home_model->get_by_classification();
        $result4 = $this->home_model->get_by_cpa();
        $result5 = $this->home_model->get_land();
        $result6 = $this->home_model->get_water();

        $resultsRegion_LM = $this->home_model->getRegionLM();
        $resultsRegion_LF = $this->home_model->getRegionLF();
        $resultsRegion_FM = $this->home_model->getRegionFM();
        $resultsRegion_FF = $this->home_model->getRegionFF();

        $totalm= array();
        foreach ($results as $tots) {
        	$sumthis = $tots->total_marinearea + $tots->total_landarea;
            if ($sumthis <= 0) $sumthis = 1;
        	$percentme = $tots->total_marinearea/$sumthis * 100;
            $totalm[] = number_format($percentme,2);
        }
        $labelm = array();
        foreach ($results as $mm) {
            $labelm[] = $mm->reg;
        }

        $total1= array();
        foreach ($result as $tot) {
        	$sumthis = $tot->total_area + $tot->mtotal;
            if ($sumthis <= 0) $sumthis = 1;            
        	$percentme = $tot->total_area /  $sumthis * 100;
            $total1[] =  number_format($percentme,2);
        }

        $labelLM = array();
        foreach ($resultsRegion_LM as $bb) {
            $labelLM[] = $bb->reg;
        }

        $totalbb= array();
        foreach ($resultsRegion_LM as $bbr) {
            $sumthis = $bbr->countLM;
            if ($sumthis <= 0) $sumthis = 1;            
            $percentme = $sumthis;
            $totalbb[] =  $percentme;
        }

        $totalbbf= array();
        foreach ($resultsRegion_LF as $bbf) {
            $sumthis = $bbf->countLF;
            if ($sumthis <= 0) $sumthis = 1;
            $percentme = $sumthis;
            $totalbbf[] = $percentme;
        }

        $totalbbfm= array();
        foreach ($resultsRegion_FM as $bbr) {
            $sumthis = $bbr->countFM;
            if ($sumthis <= 0) $sumthis = 1;            
            $percentme = $sumthis;
            $totalbbfm[] =  $percentme;
        }

        $totalbbff= array();
        foreach ($resultsRegion_FF as $bbr) {
            $sumthis = $bbr->countFF;
            if ($sumthis <= 0) $sumthis = 1;            
            $percentme = $sumthis;
            $totalbbff[] =  $percentme;
        }

        $label = array();
        foreach ($result as $m) {
            $label[] = $m->reg;
        }

		$total2= array();
        foreach ($result2 as $cat) {
            $total2[] = $cat->total;
        }
        $label2 = array();
        foreach ($result2 as $catm) {
            $label2[] = $catm->categoryName;
        }

        $total3= array();
        foreach ($result3 as $class) {
            $total3[] = $class->total;
        }
        $label3 = array();
        foreach ($result3 as $classm) {
            $label3[] = $classm->nipDesc;
        }

        $total4= array();
        foreach ($result4 as $cpa) {
            $total4[] = $cpa->total;
        }
        $label4 = array();
        foreach ($result4 as $cpam) {
            $label4[] = $cpam->CPABIdesc;
        }

        $total5= array();
        foreach ($result5 as $land1) {
            // $total = $land1->total_landarea / 30000000  * 100;
            $total = 4682382.09 / 30000000  * 100;
            $total22 = 30000000 / 30000000 * 100 - $total;

            $total5[] = number_format($total,2);
            $total5[] = number_format($total22,2);
        }
        $label5 = array();
        foreach ($result5 as $landlabel) {
            // $label5[] = 'Total land area of the Protected Area ('.number_format($land1->total_landarea,2).' has)';
            $label5[] = 'Total land area of the Protected Area ('.number_format(4682382.09,2).' has)';
            $label5[] ='Total land area of the Philippines (30,000,000 has)';
        }

        $total6= array();
        foreach ($result6 as $water) {
            // $totale = $water->total_water / 220644600  * 100;
            $totale = 3080577.87 / 220644600  * 100;
            $total22 = 220644600 / 220644600 * 100 - $totale;

            $total6[] = number_format($totale,2);
            $total6[] = number_format($total22,2);
        }
        $label6 = array();
        // foreach ($result6 as $waterlabel) {
            // $label6[] = 'Total sea area of the Protected Area ('.number_format($water->total_water,2).' has)';
        $label6[] = 'Total marine area of the Protected Area ('.number_format(3080577.87,2).' has)';
            $label6[] ='Total marine area of the Philippines (220,644,600.00 has)';
        // }
        $data['labelregion'] = json_encode($labelLM);//json_encode($label);
        $data['resultbb1'] = json_encode($totalbb);
        $data['resultbb2'] = json_encode($totalbbf);
        $data['resultbb3'] = json_encode($totalbbfm);
        $data['resultbb4'] = json_encode($totalbbff);

        $data['label'] = json_encode($label);//json_encode($label);
        $data['result1'] = json_encode($total1);

        $data['labelm'] = json_encode($labelm);//json_encode($label);
        $data['resultm'] = json_encode($totalm);

        $data['label2'] = json_encode($label2);
        $data['result2'] = json_encode($total2);

        $data['label3'] = json_encode($label3);
        $data['result3'] = json_encode($total3);

        $data['label4'] = json_encode($label4);
        $data['result4'] = json_encode($total4);

        $data['label5'] = json_encode($label5);
        $data['result5'] = json_encode($total5);

        $data['label6'] = json_encode($label6);
        $data['result6'] = json_encode($total6);


        $result2 = $this->home_model->get_all_regions();
        $total2= array();
        foreach ($result2 as $cat) {
            $total2[] = $cat->total;
        }
        $label2 = array();
        foreach ($result2 as $catm) {
            $label2[] = $catm->categoryName;
        }

        $data['label2'] = json_encode($label2);
        $data['result2'] = json_encode($total2);

		$data['content'] = $this->load->view('frontend/home',$data,true);
		$this->load->view('main_wrapper',$data);
	}

	public function info($generatedcode){
		$data['base']=$this->config->item('base_url');
		$data['webSetting'] = $this->setting_model->webSetting();		
		// $data['page_title'] = $pa_name;
		$data['info'] = $this->home_model->infopa($generatedcode);
		$data['infoimage'] = $this->home_model->infopaimage($generatedcode);
		$data['infolegal'] = $this->home_model->infolegal($generatedcode);
		$data['infolegallimit'] = $this->home_model->infolegallimit($generatedcode);
		$data['infolocation'] = $this->home_model->infolocation($generatedcode);
		$data['biogeographic_combine'] = $this->home_model->biogeographic_combine($generatedcode);
		$data['infobiological'] = $this->home_model->infobiological($generatedcode);

		$data['content'] = $this->load->view('frontend/info',$data,true);
		$this->load->view('main_wrapper',$data);
	}

	public function region($region=null){
		$data['webSetting'] = $this->setting_model->webSetting();		
        // $data['prov'] = $this->uri->segment(3);
        $data['totalpasreg'] = $this->home_model->gettotalPAreg($region);
        $data['totalareareg'] = $this->home_model->gettotalPAAreareg($region);
        $data['prov'] = $region;
		$data['content'] = $this->load->view('frontend/region',$data,true);
		$this->load->view('main_wrapper',$data);


	}

    public function fetchpainformationdisplay(){
        $codegens = $this->input->post('codegens');
        $data = $this->home_model->getAllPAsInformation($codegens);
        foreach($data as $rowMain){
            $data2 = $this->home_model->getAllLegislationHome($codegens);
            $dataL = $this->home_model->getAllpaLocations($codegens);
            ?>
            <tr id="<?php echo $rowMain->id_main; ?>" class="trow">
                <td><?php echo "PASu Name : <b>".$rowMain->firstname." ".$rowMain->lastname."</b>"; ?></td>
                <td><?php echo "Email Address : <b>".$rowMain->email."</b>"; ?></td>
                <td><?php echo "Contact No. : <b>".$rowMain->landline."</b>"; ?></td>
            </tr>
            <tr style="background-color: #009879;color:#fff">
                <td>Legal Status</td>
                <td>NIPAS Category</td>
                <td>Legal Basis</td>
                <td>Dated</td>
            </tr>
            <?php foreach($data2 as $row): ?>
           <tr id="<?php echo $row->id_palegis; ?>">
                <?php if (!empty($row->nipsub_id)){ ?>
                    <td><?php echo (!empty($row->sub_nip_description)?$row->sub_nip_description." - ":"").(!empty($row->nipDesc)?" ".$row->nipDesc:""); ?></td>
                <?php } else { ?>
                    <td><?php echo $row->nipDesc?></td>
                <?php } ?>
                <td><?php echo (!empty($row->pa_category_id)?$row->categoryName:"").(!empty($row->pa_category_other)?"(".$row->pa_category_other.")":""); ?></td>
                <td><?php echo $row->LegisDesc." No. ".$row->legis_no; ?></td>
                <?php if (!empty($row->date_day)): ?>
                    <td><?php echo $row->month." ".$row->date_day.", ".$row->date_year; ?></td>
                <?php else: ?>
                    <td><?php echo $row->month." ".$row->date_year; ?></td>
                <?php endif;endforeach; ?>
            </tr>
            <tr style="background-color: #009879;color:#fff">
                <td>Land Area(has.)</td>
                <td>Water Area(has.)</td>
                <td>Total Area(has.)</td>
                <td>Buffer Zone</td>
            </tr>
            <tr>
                <td><?php echo number_format($rowMain->area,2)?></td>
                <td><?php echo number_format($rowMain->marine_area,2)?></td>
                <td><?php echo number_format($rowMain->area + $rowMain->marine_area,2)?></td>
                <td><?php echo "Terrestrial : ".number_format($rowMain->buffer,2)."<br>Marine : ".number_format($rowMain->marine_buffer,2)?></td>
            </tr>
            <tr style="background-color: #009879;color:#fff">
                <td>Region</td>
                <td>Province</td>
                <td>Municipality</td>
                <td>Barangay</td>
            </tr>
            <?php foreach($dataL as $rowL): ?>
            <tr>
                <td><?php echo $rowL->regionName; ?></td>
                <td><?php echo $rowL->provinceName; ?></td>
                <td><?php echo $rowL->municipalName." (".$rowL->cong_dist.")"; ?></td>
                <td><?php echo $rowL->barangayName; ?></td>
            </tr>            
            <?php endforeach; ?>
            <tr style="background-color: #009879;color:#fff">
                <td colspan="4" style="text-align:center">Accessibility</td>                
            </tr>
            <tr>
                <td colspan="4">
                    <?php echo htmlspecialchars_decode($rowMain->embeded_map); ?>
                </td>
            </tr> 
                 
            <?php
        }
    }

    public function fetcheventlist(){
        $code = $this->input->post('code');
        $event_data = $this->home_model->getalleventlists($code);
        foreach($event_data->result_array() as $row):
            $data[] = array(
            'id' => $row['id_paevent'],
            'title' => $row['event_title'],
            'desc' => $row['event_desc'],
            'conducted' => $row['event_conducted'],
            'start' => $row['event_start'],
            'end' => $row['event_end']
           );
        endforeach;
        echo json_encode($data);
    }

	public function fetchpadisplaybyProvince(){
        $dataprov = $this->input->post('regions');

		$databyprovince = $this->home_model->getallparecordsbyProvince($dataprov);     
	        foreach($databyprovince as $row){
	            ?>
	            <tr>
	                <td><?php echo $row->provinceName ?></td>                
	                <td><?php echo $row->countsPA; ?></td>
	                <!-- <td><?php echo ""; ?></td> -->
	                <td><a class="btn btn-success" href="<?= base_url('home/province/'.$row->province) ?>">View</a></td>
	            </tr>
	            <?php
	        }
    }

    public function province(){
        $data['webSetting'] = $this->setting_model->webSetting();       
        $data['paids'] = $this->uri->segment(3);
        $paidss = $this->uri->segment(3);
        $data['checkprov'] = $this->home_model->getprovs($paidss);
        $data['content'] = $this->load->view('frontend/province',$data,true);
        $this->load->view('main_wrapper',$data);
    }

    public function fetchpadisplayPAbyProvince(){
        $datapas = $this->input->post('paids');

        $dataPAbyProv = $this->home_model->getallparecordsPAbyProvince($datapas);     
            foreach($dataPAbyProv as $row){
                ?>
                <tr>
                    <td><?php echo $row->pa_name ?></td>                
                    <!-- <td><?php echo $row->countsPA; ?></td> -->
                    <td><a class="btn btn-success" href="<?= base_url('home/info/'.$row->generatedcode) ?>">View</a></td>
                </tr>
                <?php
            }
    }

    public function trydisplat(){
        $codes = $this->input->post('code');
        $querydate = $this->home_model->querycalendars($codes);        

        $apiid = array();
        $emailid = array();

        foreach ($querydate as $fv) {
            $novisitor[] = $fv->googleapi;
            $datenow[] = $fv->googleemail;
        } 


        $data['messageid'] = 'AIzaSyCeJ8dhZE01O2LQ9VOZy6wUdTkIXlnqz5k'; 
        $data['messageemail'] = 'forondajames@gmail.com'; 

        echo json_encode($data);
    }

	public function fetchpadisplay(){
        $data = $this->home_model->getallparecords();
	        foreach($data as $row){
	            ?>
	            <tr>
	                <td><?php echo $row->regionName ?></td>                
	                <td><?php echo $row->countsPA; ?></td>
	                <td><a class="btn btn-success" href="<?= base_url('home/region/'.$row->region) ?>">View</a></td>
	            </tr>
	            <?php
	        }
    }

    public function fetchpadisplays(){
        // $datapa = $this->home_model->getalllegisperperPAselect();
        	$data = $this->home_model->getalllegisperperPA();        		
        	   foreach($data as $row){
        	   	$cc = $row->_max;
	            ?>
	            <tr>
	                <td><?php echo $row->generatedcode ?></td>                
	                <td><?php echo $row->nip_id; ?></td>
	                <td><?php echo $row->_max; ?></td>
	            </tr>
	            <?php
	        }
        ?>        
        <?php 
        
	     
    }

    public function annualgraphdisplaHome()
    {
        $queryyears = $this->home_model->queryyear();        
        $queryvisitors = $this->home_model->queryvisiotrsa();
        $querydate = $this->home_model->querydateyear();        

        $years = array();
        $amount = array();
        $novisitor = array();

        foreach ($queryvisitors as $fv) {
            $novisitor[] = $fv->sumvisitors;
            $datenow[] = $fv->date_year;
        } 


        $data['messageyear'] = $datenow; 
        $data['messageamount'] = $amount; 
        $data['messagetotalvisitor'] = $novisitor; 

        echo json_encode($data);

    }

    public function annualgraphdisplaHomeIncome()
    {
        $queryyears = $this->home_model->queryyear();        
        $queryvisitors = $this->home_model->queryvisiotrsa();
        $querydate = $this->home_model->querydateyear();        

        $years = array();
        $amount = array();
        $novisitor = array();
        foreach ($queryyears as $ff) {  
            	$amount[] = $ff->sumincome;       
            	$datenow[] = $ff->maxyr;       
            }   

        $data['messageyear'] = $datenow; 
        $data['messageamount'] = $amount; 
        $data['messagetotalvisitor'] = $novisitor; 

        echo json_encode($data);

    }


    public function count_chartTotalPA()
    {
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Region", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Total", 
        //     "pattern" => "", 
        //     "type" => "number" 
        // ); 
        // foreach($data as $cd) 
        //     { 
        //     $responce->rows[]["c"] = array( 
        //         array( 
        //             "v" => "$cd->regionName", 
        //             "f" => null 
        //         ) , 
        //         array( 
        //             "v" => (int)$cd->totalPA, 
        //             "f" => null 
        //         ) 
        //     ); 
        //     } 
 
        // echo json_encode($responce);
        $data = $this->home_model->get_all_PA(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"No. of PA",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Total",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {    
          $rows[] = array("c"=>array(array("v"=>(string)ltrim($object->regionName,"Region ")),array("v"=>(int)$object->totalPA),array("v"=>(int)$object->totalPA)));
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }

    public function totalincomeperregionbyyear()
    {
        $data = $this->home_model->queryincomeperyear(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"Income",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Total income",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {
             $id = $object->id_income;
                $datas = $this->home_model->queryincomeperyeardevfee($id); 
                $datar = $this->home_model->queryincomeperyearother($id); 
                foreach ($datas as $me) {
                   $is = $me->totaldev;

                foreach ($datar as $ms) {
                   $it = $ms->totalother;


          $rows[] = array("c"=>array(array("v"=>(string)ltrim($object->regionName,"Region ")),array("v"=>(int)$object->totalincome+$is+$it),array("v"=>(int)$object->totalincome+$is+$it)));
        }
                }
                }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }

    public function totalvisitorsperregionbyyear()
    {
        $data = $this->home_model->querypavisitorsperregion(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"No. of Visitors",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"No. of Visitors",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {
          $rows[] = array("c"=>array(array("v"=>(string)ltrim($object->regionName,"Region ")),array("v"=>(int)$object->noofvisitor),array("v"=>(int)$object->noofvisitor)));
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }


    public function totalvisitorMalebyRegionperYear()
    {
        $data = $this->home_model->querypavisitorsperregionMale(); 
        $dataf = $this->home_model->querypavisitorsperregionFemale(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"No. of Male Visitors",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Male",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        $cols[] = array("id"=>"",
            "label"=>"No. of Female Visitors",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Female",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        foreach ($dataf as $objectf) {
            foreach ($data as $object) {
                if ($objectf->regionName == $object->regionName) {
                    # code...
                $rows[] = array("c"=>array(array("v"=>(string)ltrim($object->regionName,"Region ")),array("v"=>(int)$object->malevisitor),array("v"=>(int)$object->malevisitor),array("v"=>(int)$objectf->femalevisitor),array("v"=>(int)$objectf->femalevisitor)));
                }
            }
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }

    public function totalvisitorbyRegionperYearLF()
    {
        $datar = $this->home_model->querypavisitorsperregionS(); 
        $data = $this->home_model->querypavisitorsperregionLocMale(); 
        $dataf = $this->home_model->querypavisitorsperregionLocFemale(); 
        $datafm = $this->home_model->querypavisitorsperregionForMale(); 
        $dataff = $this->home_model->querypavisitorsperregionForFemale(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"Local Female",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Local Male",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        $cols[] = array("id"=>"",
            "label"=>"Local Female",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Local Female",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        $cols[] = array("id"=>"",
            "label"=>"Local Male",
            "pattern"=>"",
            "type"=>"number"
        );          
              
    foreach ($datar as $region) {
        foreach ($data as $object) {
            foreach ($dataf as $objectf) {              
                if ($region->regionName == $object->regionName) {     
                    if ($region->regionName == $objectf->regionName) {
                            $rows[] = array("c"=>array(array("v"=>(string)ltrim($region->regionName,"Region ")),array("v"=>(int)$object->locmalevisitor),array("v"=>(int)$object->locmalevisitor),array("v"=>(int)$objectf->locfemalevisitor),array("v"=>(int)$objectf->locfemalevisitor)));
                        
                    }    
                }
            }
        }
    }
        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }

    public function totalvisitorbyRegionperYearLFF()
    {
        $datar = $this->home_model->querypavisitorsperregionS();  
        $data = $this->home_model->querypavisitorsperregionForMale(); 
        $dataf = $this->home_model->querypavisitorsperregionForFemale(); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"Foreign Female",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Foreign Male",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        $cols[] = array("id"=>"",
            "label"=>"Foreign Female",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Foreign Female",
            "type"=>"number",
            "role"=>"annotation",
        ); 
        $cols[] = array("id"=>"",
            "label"=>"Foreign Male",
            "pattern"=>"",
            "type"=>"number"
        );          
              
    foreach ($datar as $region) {
        foreach ($data as $object) {
            foreach ($dataf as $objectf) {              
                if ($region->regionName == $object->regionName) {     
                    if ($region->regionName == $objectf->regionName) {
                            $rows[] = array("c"=>array(array("v"=>(string)ltrim($region->regionName,"Region ")),array("v"=>(int)$object->formalevisitor),array("v"=>(int)$object->formalevisitor),array("v"=>(int)$objectf->forfemalevisitor),array("v"=>(int)$objectf->forfemalevisitor)));
                        
                    }    
                }
            }
        }
    }
        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
    }

    public function count_chartTotalPARegion()
    {
        $region = $this->input->post('regions');
        
        $data = $this->home_model->get_all_PA_region($region); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Province",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"No. of PA",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Total",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {    
          $rows[] = array("c"=>array(array("v"=>(string)$object->provinceName),array("v"=>(int)$object->totalperReg),array("v"=>(int)$object->totalperReg)));
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Province", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Total", 
        //     "pattern" => "", 
        //     "type" => "number" 
        // ); 
        // foreach($data as $cd) 
        //     { 
        //     $responce->rows[]["c"] = array( 
        //         array( 
        //             "v" => "$cd->provinceName", 
        //             "f" => null 
        //         ) , 
        //         array( 
        //             "v" => (int)$cd->totalperReg, 
        //             "f" => null 
        //         ) 
        //     ); 
        //     } 
 
        // echo json_encode($responce);
    }

    public function count_chartTotalArea()
    {
        $data = $this->home_model->get_all_total_Area(); 
        

        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Region",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"Total Area(has)",
            "pattern"=>"",
            "type"=>"number"
        );  

        $cols[] = array("id"=>"",
            "label"=>"Total Area(has)",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {
          $rows[] = array("c"=>array(array("v"=>(string)ltrim($object->regionName,"Region ")),array("v"=>(int)$object->totalarea),array("v"=>(int)$object->totalarea)));
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);
        //         //data to json 

        // $response->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Category", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        // $response->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Total", 
        //     "pattern" => "", 
        //     "type" => "number" 
        // ); 
        // foreach($data as $cd) 
        //     { 
        //     $response->rows[]["c"] = array( 
        //         array( 
        //             "v" => "$cd->regionName", 
        //             "f" => null,
        //         ) , 
        //         array( 
        //             "v" => (int)$cd->totalarea, 
        //             "f" => null,
        //         ) 
        //     ); 
        //     } 
 
        // echo json_encode($response);
    }

    public function count_chartTotalAreaRegion()
    {
        $region = $this->input->post('regions');
        
        $data = $this->home_model->get_all_total_Area_region($region); 
        $array = array();
        $cols = array();
        $rows = array();
        $cols[] = array(
            "id"=>"",
            "label"=>" Province",
            "pattern"=>"",
            "type"=>"string"
        );
        $cols[] = array("id"=>"",
            "label"=>"Total Area (has)",
            "pattern"=>"",
            "type"=>"number"
        );  
        $cols[] = array("id"=>"",
            "label"=>"Total",
            "type"=>"number",
            "role"=>"annotation",
        ); 

        foreach ($data as $object) {    
          $rows[] = array("c"=>array(array("v"=>(string)$object->provinceName),array("v"=>(int)$object->totalarea),array("v"=>(int)$object->totalarea)));
        }

        $array = array("cols"=>$cols,"rows"=>$rows);
        echo json_encode($array);


        // $region = $this->input->post('regions');        
        // $data = $this->home_model->get_all_total_Area_region($region); 
 
        // //         //data to json 
 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Category", 
        //     "pattern" => "", 
        //     "type" => "string" 
        // ); 
        // $responce->cols[] = array( 
        //     "id" => "", 
        //     "label" => "Total", 
        //     "pattern" => "", 
        //     "type" => "number" 
        // ); 
        // foreach($data as $cd) 
        //     { 
        //     $responce->rows[]["c"] = array( 
        //         array( 
        //             "v" => "$cd->provinceName", 
        //             "f" => null 
        //         ) , 
        //         array( 
        //             "v" => (int)$cd->totalarea, 
        //             "f" => null 
        //         ) 
        //     ); 
        //     } 
 
        // echo json_encode($responce);
    }
    public function count_chart_Land()
    {
        $data = $this->home_model->get_all_total_Areas(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Category", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = 
            array( 
                array( 
                    "v" => "Protected Area", 
                    "f" => null 
                ) ,
                array( 
                    "v" => (int)$cd->totalarea, 
                    "f" => null 
                ) , 
              
            );
        } 
            $responce->rows[]["c"] = 
            array( 
                array( 
                    "v" => "Philippine Land Area", 
                    "f" => null 
                ) ,
                array( 
                    "v" => (int)30000000    , 
                    "f" => null 
                ) , 
              
            ); 
        echo json_encode($responce);
    }

    public function count_chart_Marine()
    {
        $datas = $this->home_model->get_all_total_MarineAreas(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Category", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($datas as $cds) 
            { 
            $responce->rows[]["c"] = 
            array( 
                array( 
                    "v" => "Marine Protected Area", 
                    "f" => null 
                ) ,
                array( 
                    "v" => (int)$cds->totalaream, 
                    "f" => null 
                ) , 
              
            );
            }
            $responce->rows[]["c"] = 
            array( 
                array( 
                    "v" => "Philippine Marine Area", 
                    "f" => null 
                ) ,
                array( 
                    "v" => (int)220644600.00, 
                    "f" => null 
                ) , 
              
            ); 

        echo json_encode($responce);
    }

    // public function count_chart_visitors()
    // {
    //     $dataLM = $this->home_model->get_all_total_visitorsLM(); 
    //     $dataLF = $this->home_model->get_all_total_visitorsLF(); 
    //     $dataFM = $this->home_model->get_all_total_visitorsFM(); 
    //     $dataReg = $this->home_model->getallRegion(); 
    //     $countFM = $this->home_model->count_FM(); 

    //     $RLM = $this->home_model->getallRegionbyLM();
    //     $RLF = $this->home_model->getallRegionbyLF();

    //     //         //data to json 
 
    //     $responce->cols[] = array( 
    //         "id" => "", 
    //         "label" => "Region", 
    //         "pattern" => "", 
    //         "type" => "string" 
    //     ); 
       
    //     $responce->cols[] = array( 
    //         "id" => "", 
    //         "label" => "Local (M)", 
    //         "pattern" => "", 
    //         "type" => "number" 
    //     ); 
    //     $responce->cols[] = array( 
    //         "id" => "", 
    //         "label" => "Local (F)", 
    //         "pattern" => "", 
    //         "type" => "number" 
    //     );
    //     // $responce->cols[] = array( 
    //     //     "id" => "", 
    //     //     "label" => "Foregin (M)", 
    //     //     "pattern" => "", 
    //     //     "type" => "number" 
    //     // );
    //     foreach ($dataReg as $reg)  
    //         // foreach ($dataLM as $data1) 
    //         foreach ($RLM as $d1)
    //              {
    //                         $responce->rows[]["c"]= array(
    //                             array(
    //                                 "v" => $d1->regionName,
    //                                 "f" => null
    //                             ), 
    //                             array(
    //                                 "v" => ($d1->regionName==$reg->regionName?$dataLM:0),
    //                                 "f" => null
    //                             ),
    //                         );                              
                                
    // }
    //     echo json_encode($responce);
    // }


}
