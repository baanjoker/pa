<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class PENRO_model extends CI_Model
{
	private $user	=  "tbluser";
	private $cenro  =  "tbllocmunicipality";
	private $blood  = "tblbloodtype";
    private $sex    = "tblsex";
    private $region = "tbllocregion";
    private $pamain	= "tblpamain";
    private $fee_new = 'tblpamainvisitorpa';
    private $ipafs = 'tblpaipaf';
    

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
			->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT')
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
            ->order_by('id_year','desc')            
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
            ->order_by('id_year',"desc")
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

    public function getPA($provId)
    {
    	$this->db->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','LEFT'); 
    	// $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','LEFT'); 
    	
        $this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT');
        $this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT');
    	$this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT');
        $this->db->where_in('provinceid',$provId);
        $this->db->group_by('tblpamain.generatedcode');

        $query = $this->db->get($this->pamain);
        return $query->result();

    } 

    public function paList($provId)
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->join('tblpamain','tblpaipaf.generatedcode = tblpamain.generatedcode')        
            ->join('tbluser','tblpamain.pasu_id = tbluser.user_id')
            ->from('tblpaipaf')
            ->where('province',$provId)
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

    public function getIpafYearPenro($searchPa,$year_list){
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
        // $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->order_by('date_day');
        // $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

}