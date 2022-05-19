<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class CENRO_model extends CI_Model
{
	private $user	=  "tbluser";
	private $cenro  =  "tbllocmunicipality";
	private $blood  = "tblbloodtype";
    private $sex    = "tblsex";
    private $region = "tbllocregion";
    private $pamain	= "tblpamain";
    private $ipafs = 'tblpaipaf';
    private $table2 ='tblpamainlocation';
    private $table3 = 'tblpamainlegislation';

	public function userList($muncipalId)
	{
		return $this->db->select("*")
			// ->join('tblpamainlocation','tbllocmunicipality.cenro_id = tblpamainlocation.municipal_id')
			->from($this->cenro)
			->where('id_m',$muncipalId)
			->limit(1)
			->get()
			->row();
	}

	public function read_by_id($user = null)
	{
		return $this->db->select("*")
			->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
			->join('tblsex','tbluser.sex = tblsex.id','LEFT')
			->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
			->join('tbllocmunicipality','tbluser.municipality = tbllocmunicipality.id_m','LEFT')
			->from($this->user)
			->where('user_id',$user)
			->get()
			->row();
	} 

	public function region_display($user_region){		 
        return $this->db->select("*")
                        ->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
        		->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->from($this->user)
                        ->where('region',$user_region)
                        ->get()
                        ->row();
	}

        public function blood_list()
        {
        $result = $this->db->select("*")
            ->from($this->blood)
            ->get()
            ->result();

            $list[''] = "Select Blood";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_blood] = strtoupper($value->symbol);
            }
            return $list;
        } else {
            return false;
        }            
        }

        public function gender_list()
        {
        $result = $this->db->select("*")
            ->from($this->sex)
            ->get()
            ->result();

            $list[''] = "Select Gender";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = strtoupper($value->sexdesc);
            }
            return $list;
        } else {
            return false;
        }            
        }

        public function yearList()
    {

        $result = $this->db->select("*")
            ->from('tbldateyear')
            ->get()
            ->result();

            $list[''] = "Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_year] = $value->year;
            }
            return $list;
        } else {
            return false;
        }
    }
         public function region_list()
        {
        $result = $this->db->select("*")
            ->from($this->region)
            ->get()
            ->result();

            $list[''] = "Select Region";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = $value->regionName;
            }
            return $list;
        } else {
            return false;
        }            
        }

    public function monthListed()
    {

        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Month";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->month] = $value->month;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function yearListed()
    {

        $result = $this->db->select("*")
            ->from('tbldateyear')
            ->get()
            ->result();

            $list[''] = "Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->year] = strtoupper($value->year);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function QuarterlyList()
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Select Quarter";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->QtrCode] = $value->QtrCode;
            }
            return $list;
        } else {
            return false;
        }
    }

    function check_email($id, $email) {
        $this->db->where('email', $email);
        if($id) {
            $this->db->where_not_in('user_id', $id);
        }
        return $this->db->get($this->user)->num_rows();
        }

        public function createMain($data = [])
        {
        return $this->db->insert($this->user,$data);
        }

        public function updateProfile($data = [])
        {
        return $this->db->where('user_id',$data['user_id'])
        ->update($this->user,$data);
        }

        public function updatePass($data = [])
        {
                return $this->db->where('user_id',$data['user_id'])
                ->update($this->user,$data);           

        }

    public function getPA($muncipalId)
    {
        $this->db->select('id_main,pasu_id,tblpamain.generatedcode,pa_name,pa_image,other_category,categoryName,other_category,categoryName,marine_area,terrestrial')
                 ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
                 ->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','LEFT')
                 ->join('tbluser','tbllocmunicipality.cenro_id = tbluser.cenro','LEFT')
                 ->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')
                 ->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT')
                 ->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')
                 ->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','LEFT')
                 ->where('cenro',$muncipalId)
                 ->group_by('tblpamain.generatedcode');
        $query = $this->db->get($this->pamain);
        return $query->result();
    } 

    public function getAllLegislationbyIDs($id){
        // $this->db->select('group_concat(nipDesc," ",sub_nip_description,"<br>",LegisDesc," No. ",legis_no separator "<br><br>") as legaltext,tblpamainlegislation.nipsub_id'); 
        $this->db->join('tblnip','tblpamainlegislation.nip_id = tblnip.id_nip','LEFT'); 
        $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id = tblnipsub.id_subnip','LEFT');  
        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','LEFT');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
        $this->db->where('tblpamain.pasu_id',$id);
        $this->db->order_by('LENGTH(date_year)');
        $this->db->order_by('date_year','DESC');
        $query = $this->db->get($this->table3);
        return $query->result();
       
    }

    public function get_all_total_Area_region($municipal) 
    { 
        return $this->db->select('SUM(terrestrial + marine_area) as totalarea,user_id,provinceName,pa_name')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        // ->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT')                        
                        ->where('tbluser.municipality',$municipal)
                        ->group_by('province')
                        ->order_by('totalarea','DESC')
                        ->get('tblpamain')->result(); 
    }

    public function get_all_PA_municipal($municipal) 
    { 
        return $this->db->select('COUNT(generatedcode) as totalpermunicipal,provinceName,pa_name')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        ->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT')
                        ->where('tbluser.municipality',$municipal)
                        ->group_by('generatedcode')
                        ->order_by('totalpermunicipal','DESC')                        
                        ->get('tblpamain')->result(); 
    }

    public function getAllUsersIDs($id){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','LEFT');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
        $this->db->where('tblpamain.pasu_id',$id);
        $query = $this->db->get($this->table2);
        return $query->result();

    }

    public function paList()
    {
        // $user_id = $this->session->userdata('municipality');

        // $result = $this->db->select("*")
        //     ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','LEFT')
        //     ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')            
        //     ->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.cenro_id','LEFT')            
        //     ->from('tblpaipafincome')
        //     ->where_in('municipal_id',$user_id)
        //     ->get()
        //     ->result();

        $user_id = $this->session->userdata('municipality');

        $result = $this->db->select("*")
            ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode')
            ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
            ->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','LEFT')        
            ->join('tbluser','tbllocmunicipality.cenro_id = tbluser.municipality','LEFT')
            ->from('tblpaipafincome')            
            ->where('tbllocmunicipality.cenro_id',$user_id)
            // ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','LEFT')
            // ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')    
            // ->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.cenro_id','LEFT')
            // ->where('tbllocmunicipality.cenro_id',$user_id)
            ->get()
            ->result();

            $list[''] = "Select Protected Area";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->generatedcode] = $value->pa_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function getIpafYearCenro($searchPa,$year_list){
        $this->db->select('id_ipaf,generatedcode,no_visitors,visitors,facilities,parking_area,recreational_activity,water_activity,date_month,date_year,
                          (visitors+facilities+parking_area+recreational_activity+water_activity) AS total')
                 ->where('generatedcode',$searchPa)
                 ->where('date_year',$year_list)               
                 ->group_by('date_month');
                 $query = $this->db->get($this->ipafs);
                 return $query->result();
    }

     public function getallfeeReportQuerried($searchPa,$year_list,$searchMonth,$user_id){
        $this->db->select("id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                (locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as other_total,
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as sub_total
                ");
        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->where('date_month',$searchMonth);
        $this->db->order_by('date_day');
        // $this->db->group_by('date_year');
        // $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

     public function getallfeeReportQuerriedbyYear($searchPa,$year_list,$user_id){
        $this->db->select("id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,       
                SUM(locMale + locFemale) as local_visit,  
                SUM(forMale + forFemale) as foreign_visit,       
                SUM(locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as total_recreational,
                (trekking_biking_foreign + trekking_biking_local) as land_total,
                (scuba_foreign + scuba_local) as water_total,
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as sub_total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central
                ");
        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->order_by('date_day');
        // $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function getIpafYear($searchPa,$year_list,$quarter){ 
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            SUM(entrancefee) as sum_entrance,SUM(facilities) as sum_facility,SUM(resource) as sum_resource,SUM(concession) as sum_concession,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount,tbldatemonth.id_month')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter)        
        ->order_by('tbldatemonth.id_month') 
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');     
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    // public function getIpafYear($searchPa,$year_list,$quarter){      
    //     $this->db->select('(entrancefee + facilities + resource + concession ) as Grand_total_income,
    //         (entrancefee + facilities + resource + concession)*0.75 as total_75,
    //         (entrancefee + facilities + resource + concession)*0.25 as total_25,
    //         (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
    //         id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,development,
    //         finespenalties,other_specify_title,other_specify_amount,tbldatemonth.id_month')
    //     ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
    //     ->where('tblpaipafincome.generatedcode',$searchPa)
    //     ->where('date_year_income',$year_list)
    //     ->where('QtrCode',$quarter)        
    //     ->order_by('tbldatemonth.id_month') 
    //     ->group_by('date_month_income')
    //     ->order_by('LENGTH(tbldatemonth.id_month)');     
    //     $query = $this->db->get('tblpaipafincome');
    //     return $query->result();

    // }

    public function searchallIpafotherbyyearGT($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('SUM(other_amount) as sumOtherGT')        
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchPa)
        // ->where('id_fromincome',$id)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    // public function searchallIpafotherbyyear($id,$searchPa,$year_list,$quarter){ 
    //     $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')        
    //     ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
    //     ->where('tblpaipafincomeothers.generatedcode',$searchPa)
    //     ->where('id_fromincome',$id)
    //     ->where('income_year',$year_list)
    //     ->where('QtrCode',$quarter);
    //     // ->group_by('income_month');
    //     $query = $this->db->get('tblpaipafincomeothers');
    //     return $query->result();
    // }

    public function searchallIpafotherbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')        
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchallIpafdisbursementbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursements,disbursement_month,id_fromincome,disbursement_day,disbursement_year,generatedcode,id_ipafdisburse,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')  
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        ->group_by('disbursement_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchallIpafdevelopmentbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as developmentdetails,dev_month,id_fromincome,dev_day,dev_year,generatedcode,id_devfees ,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')  
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        ->group_by('dev_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchpdfdisbursementbyquarter($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "\n") as disburse_view, disbursement_month,disbursement_day,disbursement_year,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')        
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfdevelopmentbyquarter($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "\n") as development_view, dev_month,dev_day,dev_year,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')        
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandtotalIpaf2($searchPa,$year_list,$quarter){        
       $this->db->select('SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal,
            SUM(tblpaipafdevfee.devfee_amount) + SUM(tblpaipafcontri.amount) + SUM(tblpaipafpenalty.penalty_amount) as grandtotal100,
            (entrancefee + facilities + resource + concession + other_specify_amount) as Grand_total_btr,            
            SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal_btr,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,
            other_specify_title,other_specify_amount,devfee_amount,dev_month,amount,penalty_amount,penalty_month', FALSE)
        ->join('tblpaipafdevfee','tblpaipafincome.date_month_income = tblpaipafdevfee.dev_month','Left')
        ->join('tblpaipafcontri','tblpaipafincome.date_month_income = tblpaipafcontri.date_month_coontri','Left')
        ->join('tblpaipafpenalty','tblpaipafincome.date_month_income = tblpaipafpenalty.penalty_month','Left')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('tblpaipafincome.date_year_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();

    }

    public function getIpafYearOthers($searchPa,$year_list,$quarter){        
        $this->db->select('*')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter)        
        ->order_by('tbldatemonth.id_month') 
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');     
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searchdevfeesbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as devfee')        
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchdsibursementfeesbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursefee')        
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchcontribyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                        "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                         contri_remarks," : ",contri_amount separator "<hr> ") as contrif')        
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchffbyyear($id,$searchPa,$year_list,$quarter){ 
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "<br> ") as ffd')        
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function resultgroupbyYear($searchpa,$searchyear,$quarter)
    {
        $this->db->select('(entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount) as Grand_total_income,
            (entrancefee + tblpaipafincome.facilities + resource + concession  + other_specify_amount)*0.75 as total_75,
            (entrancefee + tblpaipafincome.facilities + resource + concession  + other_specify_amount)*0.25 as total_25,
            (entrancefee + tblpaipafincome.facilities + resource + concession  + other_specify_amount) as Grand_total_btr,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,tblpaipafincome.facilities,resource,concession,other_specify_title,other_specify_amount,pa_name')
        ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','left')        
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter)
        ->group_by('tblpaipafincome.generatedcode');
        // ->group_by('date_month_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function resultQuerybyYear($searchpa,$searchyear,$quarter)
    {
        $this->db->select('(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,
            other_specify_title,other_specify_amount,tbldatemonth.id_month')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter)        
        ->order_by('tbldatemonth.id_month') 
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');     
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function querydevelopmentfee($searchpa,$searchyear,$quarter)
    {
        $this->db->select('*');
        $this->db->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','Left');   
        $this->db->where('tblpaipafdevfee.generatedcode',$searchpa);
        $this->db->where('dev_year',$searchyear);
        $this->db->where('QtrCode',$quarter);       
        // $this->db->group_by('generatedcode');       
        // $this->db->group_by('dev_year');       
        $this->db->group_by('devfee_amount');       
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function querycontrifee($searchpa,$searchyear,$quarter)
    {
        $this->db->select('*');
        $this->db->join('tbldatemonth','tblpaipafcontri.date_month_coontri = tbldatemonth.month','Left');   
        $this->db->where('tblpaipafcontri.generatedcode',$searchpa);
        $this->db->where('date_year_coontri',$searchyear);
        $this->db->where('QtrCode',$quarter);       
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();
    }

    public function queryquarter($quarter)
    {
        $this->db->select('*')
        ->where('QtrCode',$quarter)
        ->group_by('month');
        $query = $this->db->get('tbldatemonth');
        return $query->result();
    }

    public function getGrandtotalIpaf($searchPa,$year_list,$quarter){        
        $this->db->select('date_month_income,SUM(entrancefee + facilities + resource + concession) as grandtotal')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandtotalDisburse($searchPa,$year_list,$quarter){        
        $this->db->select('disbursement_month,SUM(disbursement_amount) as grandtotalDisburse')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','left')
        // ->join('tblpaipafincomeothers','tblpaipafdisbursement.id_fromincome = tblpaipafincomeothers.id_fromincome','INNER')
        ->where('tblpaipafdisbursement.generatedcode',$searchPa)
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('disbursement_year');
        // ->group_by(array('date_month_income','date_year_income'));
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getGrandtotalDevelopments($searchPa,$year_list,$quarter){        
        $this->db->select('dev_month,SUM(devfee_amount) as grandtotalDevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','left')
        ->where('tblpaipafdevfee.generatedcode',$searchPa)
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandtotalother1($searchPa,$year_list,$quarter){        
        $this->db->select('id_fromincome,income_month,SUM(other_amount) as grandtotalothe')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','left')
        ->where('tblpaipafincomeothers.generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('income_year');
        // ->group_by(array('date_month_income','date_year_income'));
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    // public function getGrandtotalIpaf($searchPa,$year_list,$quarter){        
    //     $this->db->select('id_income,SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal')
    //     ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
    //     ->where('tblpaipafincome.generatedcode',$searchPa)
    //     ->where('date_year_income',$year_list)
    //     ->where('QtrCode',$quarter);
    //     $query = $this->db->get('tblpaipafincome');
    //     return $query->result();
    // }

    public function resultQuerybyYearOthers($searchpa,$searchyear,$quarter){        
        $this->db->select('*')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getgrantotalOther($searchpa,$searchyear,$quarter){        
        $this->db->select('SUM(amount) + SUM(devt_fee) + SUM(penalty_fee) as grandtotal')
        ->join('tbldatemonth','tblpaipafcontri.date_month_coontri = tbldatemonth.month')
        ->where('generatedcode',$searchpa)
        ->where('date_year_coontri',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();
    }

    public function resultQueryGrandTotalbyYear($searchpa,$searchyear){
        $this->db->select('pa_name,id_ipaf,tblpaipaf.generatedcode,no_visitors,visitors,tblpaipaf.facilities,parking_area,recreational_activity,water_activity,date_month,date_year,
                          (visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) AS total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .75) AS sub_total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .25) AS central_total')
                 ->join('tblpamain','tblpaipaf.generatedcode = tblpamain.generatedcode','left')
                 ->where('tblpaipaf.generatedcode',$searchpa)
                 ->where('date_year',$searchyear)                 
                 ->group_by('date_year')
                 ->group_by('date_month');
                 $query = $this->db->get($this->ipafs);
                 return $query->result();
    }

    public function searchpdfotherbyyear($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat(other_title,": ",other_amount separator "\n") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')        
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('income_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getpdfGrandtotalIpaf($searchpa,$searchyear,$quarter){        
        $this->db->select('id_income,SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();

    }

    public function searchpdfallIpafotherbyyearGT($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('SUM(other_amount) as sumOtherGT')        
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchpa)
        // ->where('id_fromincome',$id)
        ->where('income_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfdevfeesbyyear($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat(dev_remarks,": Php ",devfee_amount separator "\n") as devfee')        
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchpdfcontribyyear($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"\n"
                                        "Mode payment : ",tblfinancialassistancesub.description,"\n",
                                         "Php",contri_amount separator "\n\n ") as contrif')        
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchpdfffbyyear($id,$searchpa,$searchyear,$quarter){ 
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "\n ") as ffd')        
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function yearduration()
    {
        $add = date("Y",strtotime('+15 years')) + 15;
        $years = range($add,1900);
            $list[''] = "Year";
                if (!empty($years)) {
                    foreach ($years as $value) {
                        $list[$value] = $value;
            }
            return $list;
        } else {
            return false;
        }
    }


}