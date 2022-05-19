<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class statistics extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'home_model'
		]);
	}

	public function index(){		
		$data['page_title'] = 'Statistics';
		$data['setting'] = $this->setting_model->read();
		$data['webSetting'] = $this->setting_model->webSetting();
		// redirect if website status is disabled
        if ($data['webSetting']->status == 0) 
            redirect(base_url('login'));

        $result = $this->home_model->getResultperRegion();
        $results = $this->home_model->getResultperRegionMarine();
        $result2 = $this->home_model->get_all_regions();
        $result3 = $this->home_model->get_by_classification();
        $result4 = $this->home_model->get_by_cpa();
        $result5 = $this->home_model->get_land();
        $result6 = $this->home_model->get_water();


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
            $total = $land1->total_landarea / 30000000  * 100;
            $total22 = 30000000 / 30000000 * 100 - $total;

            $total5[] = number_format($total,2);
            $total5[] = number_format($total22,2);
        }
        $label5 = array();
        foreach ($result5 as $landlabel) {
            $label5[] = 'Total land area of the Protected Area ('.number_format($land1->total_landarea,2).' has)';
            $label5[] ='Total land area of the Philippines (30,000,000 has)';
        }

        $total6= array();
        foreach ($result6 as $water) {
            $totale = $water->total_water / 220644600  * 100;
            $total22 = 220644600 / 220644600 * 100 - $totale;

            $total6[] = number_format($totale,2);
            $total6[] = number_format($total22,2);
        }
        $label6 = array();
        // foreach ($result6 as $waterlabel) {
            $label6[] = 'Total sea area of the Protected Area ('.number_format($water->total_water,2).' has)';
            $label6[] ='Total sea area of the Philippines (220,644,600.00 has)';
        // }

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

		$data['content'] = $this->load->view('frontend/statistics',$data,true);
		$this->load->view('main_wrapper',$data);
	}
}