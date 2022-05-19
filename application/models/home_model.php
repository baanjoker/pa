<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home_model extends CI_Model
{
	private $location ='tblpamainlocation';
	private $main ='tblpamain';
	private $advisory ='tbladvisory';


	public function query_pamblocation()
    {		
    	$this->db->distinct();
    	$this->db->select('DISTINCT(tbllocregion.regionDesc) AS reg, pa_name,tblpamain.generatedcode,id_main');
    	$this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
		$this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
		$this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
		$this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
		$this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
		$this->db->group_by('tblpamainlocation.region_id');
		$query= $this->db->get($this->location);
		   return $query->result();
	}

	public function query_PA_counts()
    {		
		$query = $this->db->get('tblpamain');
		return $query->num_rows();
	}

	public function query_PA()
    {		
    	$this->db->distinct();
    	$this->db->select('DISTINCT(tbllocregion.regionDesc) AS reg, group_concat(distinct tbllocprovince.provinceName) as locprov, pa_name,tblpamain.generatedcode,id_main');
    	$this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
		$this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
		$this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
		$this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
		$this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
		$this->db->group_by('tblpamainlocation.generatedcode');
		$query= $this->db->get($this->location);
		   return $query->result();
	}

	public function query_news()
    {		
    	$this->db->select('*');
    	$this->db->where('advisory_status',1);
    	$this->db->limit(2);
    	$this->db->order_by('advisory_date','DESC');
		$query= $this->db->get($this->advisory);
		   return $query->result();
	}

	public function query_new_list()
    {		
    	$this->db->select('*');
    	$this->db->where('advisory_status',1);
    	$this->db->order_by('advisory_date','DESC');
		$query= $this->db->get($this->advisory);
		   return $query->result();
	}

	public function query_get_news($id)
	{
		return $this->db->select("*")
            ->from('tbladvisory') 
			->where('advisory_status',1)  
            ->where('id_advisory',$id)
            ->order_by('id_advisory','asc')
			->get()
			->row();
	} 

	public function infopa($generatedcode)
	{
		return $this->db->select('*')
						->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')	
						->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT')						
						->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')						
						->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')						
						->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','LEFT')						

						->where('tblpamain.generatedcode',$generatedcode)
						->get($this->main)
						->result();
	}

    public function getAllPAsInformation($codegens){
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT') 
                        ->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT')                      
                        ->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')                     
                        ->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')                        
                        ->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function getAllLegislationHome($codegens){
        $this->db->join('tblnip','tblpamainlegislation.nip_id = tblnip.id_nip','LEFT');
        $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id = tblnipsub.id_subnip','LEFT');
        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpacategory','tblpamainlegislation.pa_category_id = tblpacategory.id_cat','LEFT');
        // $this->db->join('tbldateyear','tblpamainlegislation.date_year = tbldateyear.id_year','LEFT');

        $this->db->where('generatedcode',$codegens);
        $this->db->order_by("date_year","desc");
        $query1 = $this->db->get('tblpamainlegislation');
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function getAllpaLocations($codegens){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamainlocation');
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

	public function infopaimage($generatedcode)
	{
		return $this->db->select('*')
						->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','LEFT')						
						->where('tblpamain.generatedcode',$generatedcode)
						->limit(1)
						->get($this->main)
						->result();
	}

	public function infolegal($generatedcode)
	{
		return $this->db->select('group_concat( concat(tbllegislation.LegisDesc," No. ", legis_no," dated ",tbldatemonth.month," ",date_year, "	") separator "<br>") as try')
						->join('tblpamainlegislation','tblpamain.generatedcode = tblpamainlegislation.generatedcode','LEFT')
						->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT')
						->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left')
						->where('tblpamain.generatedcode',$generatedcode)
						->get($this->main)
						->result();
	}

	public function infolegallimit($generatedcode)
	{
		return $this->db->select('*')
						->join('tblpamainlegislation','tblpamain.generatedcode = tblpamainlegislation.generatedcode','LEFT')
						->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT')
						->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left')
						->where('tblpamain.generatedcode',$generatedcode)
						->limit(1)						
						->get($this->main)
						->result();
	}

	public function infolocation($generatedcode)
	{
		return $this->db->select('group_concat(distinct tbllocregion.regionName) as locreg, 
    						   group_concat(tbllocmunicipality.municipalName,", ",tbllocprovince.provinceName separator "\n ") as locprov')
						
		 				
						->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
						->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left')
						->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left')
						->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left')
		 				->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left')
						->where('tblpamain.generatedcode',$generatedcode)
						->get($this->main)
						->result();
	}

	public function biogeographic_combine($generatedcode)
    {
    		$this->db->select('group_concat( concat("Longitude: ",geographic_long1," - ", geographic_long2,"<br>","Latitude: ",geographic_lat1," - ", geographic_lat2) separator "<br> ") as Geographic');
			$this->db->where('tblpamain.generatedcode',$generatedcode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get($this->main);
		    return $query->result();
	}

    public function getalleventlists($code){

        $this->db->where('generatedcode',$code);
        // $query = $this->db->get('tblpamainevent');
        // return $query->result();
        // $this->db->order_by('id');
        return $this->db->get('tblpamainevent');
    }

	public function infobiological($generatedcode)
    {
    		$this->db->select('group_concat(commonNameSpecies separator ", ") as biological')
			->join('tblpamainbiological','tblpamain.generatedcode = tblpamainbiological.generatedcode','LEFT')
			->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','LEFT')
			->where('tblpamain.generatedcode',$generatedcode)
			->group_by('tblpamainbiological.generatedcode');
			$query= $this->db->get($this->main);
		    return $query->result();
	}

	public function getResultperRegion(){
        return $this->db->distinct()
        ->select("DISTINCT(tbllocregion.regionDesc) AS reg, SUM(tblpamain.terrestrial) as total_area, SUM(marine_area) as mtotal")
        ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
		->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left')
		->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left')
		->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left')
		->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left')       
        // ->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')")
        ->group_by('tblpamainlocation.region_id')
        ->order_by('tbllocregion.id','ASC')
        ->get('tblpamain')->result();
    }

    public function getResultperRegionMarine(){
        return $this->db->distinct()
        ->select("DISTINCT(tbllocregion.regionDesc) AS reg, SUM(tblpamain.marine_area) as total_marinearea, SUM(tblpamain.terrestrial) as total_landarea")
        ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
		->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left')
		->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left')
		->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left')
		->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left')       
        // ->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')")
        ->group_by('tblpamainlocation.region_id')
        ->order_by('tbllocregion.id','ASC')
        ->get('tblpamain')->result();
    }

    public function getRegionLM()
    {
        return $this->db->distinct()
                        ->select('DISTINCT(tbllocregion.regionName) as reg, COUNT(tblipafvisitorslog.generatedcode) as countLM')
                        ->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','1')                       
                        ->group_by('tblipafvisitorslog.generatedcode')      
                        ->order_by('id')
                        ->group_by('id')                   
                        ->get('tblipafvisitorslog')->result();
    }
    public function getRegionLF()
    {
        return $this->db->distinct()
                        ->select('DISTINCT(tbllocregion.regionName) as reg, COUNT(tblipafvisitorslog.generatedcode) as countLF')
                        ->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','2')
                        ->where('visitorlog_forloc','1')                       
                        ->group_by('tblipafvisitorslog.generatedcode') 
                        ->order_by('id')
                        ->group_by('id')                        
                        ->get('tblipafvisitorslog')->result();
    }

    public function getRegionFM()
    {
        return $this->db->distinct()
                        ->select('DISTINCT(tbllocregion.regionName) as reg, COUNT(tblipafvisitorslog.generatedcode) as countFM')
                        ->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','2')                       
                        ->group_by('tblipafvisitorslog.generatedcode')   
                        ->order_by('id')
                        ->group_by('id')                      
                        ->get('tblipafvisitorslog')->result();
    }

    public function getRegionFF()
    {
        return $this->db->distinct()
                        ->select('DISTINCT(tbllocregion.regionName) as reg, COUNT(tblipafvisitorslog.generatedcode) as countFF')
                        ->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','2')
                        ->where('visitorlog_forloc','2')                       
                        ->group_by('tblipafvisitorslog.generatedcode')   
                        ->order_by('id')
                        ->group_by('id')                      
                        ->get('tblipafvisitorslog')->result();
    }

    public function get_all_regions() 
    { 
        return $this->db->select('tblpacategory.categoryName,COUNT(pacategory_id) as total')
        				->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')
        				->group_by('tblpamain.pacategory_id')
        				->get('tblpamain')->result(); 
    } 

    public function get_all_PA() 
    { 
        return $this->db->select('COUNT(generatedcode) as totalPA,user_id,regionName')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->group_by('region')
                        ->order_by('totalPA','DESC')
                        ->where('status',1)
                        ->get('tblpamain')->result(); 
    }

    public function get_all_PA_region($region) 
    { 
        return $this->db->select('COUNT(generatedcode) as totalperReg,provinceName')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        ->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT')
                        ->where('tbluser.region',$region)
                        ->group_by('province')
                        ->order_by('totalperReg','DESC')                        
                        ->get('tblpamain')->result(); 
    }

    public function get_all_total_Area() 
    { 
        return $this->db->select('SUM(terrestrial + marine_area) as totalarea,user_id,regionName')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->group_by('region')
                        ->order_by('totalarea','DESC')
                        ->get('tblpamain')->result(); 
    }

    public function get_all_total_Area_region($region) 
    { 
        return $this->db->select('SUM(terrestrial + marine_area) as totalarea,user_id,provinceName')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        // ->join('tbllocregion',cvxdfffff'tbluser.region = tbllocregion.id','LEFT')
                        ->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT')                        
                        ->where('tbluser.region',$region)
                        ->group_by('province')
                        ->order_by('totalarea','DESC')
                        ->get('tblpamain')->result(); 
    }

    public function get_all_total_Areas() 
    { 
        return $this->db->select('SUM(terrestrial) as totalarea') 
                        ->get('tblpamain')->result(); 
    }

    // public function get_all_total_visitorsLM() 
    // { 
    //     $date = new DateTime("now");
    //     $curr_year = $date->format('Y');
    //     $curr_month = $date->format('F');
    //     return $this->db->select('COUNT(tblipafvisitorslog.generatedcode) as countLM,regionName,tblipafvisitorslog.generatedcode') 
    //                     ->join('tblipafvisitorslog','tblpamain.generatedcode=tblipafvisitorslog.generatedcode','left')
    //                     ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
    //                     ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
    //                     ->group_by('tblipafvisitorslog.generatedcode')                         
    //                     ->where('visitorlog_sex','1')
    //                     ->where('visitorlog_forloc','1')   
    //                     // ->where('visitorlog_year',$curr_year)                    
    //                     ->get('tblpamain')->result(); 
      
    // }

    public function get_all_total_visitorsLF() 
    { 
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
       return $this->db->select('COUNT(tblipafvisitorslog.generatedcode) as countLF,regionName,tblipafvisitorslog.generatedcode') 
                        ->join('tblipafvisitorslog','tblpamain.generatedcode=tblipafvisitorslog.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->group_by('tblipafvisitorslog.generatedcode')                         
                        ->where('visitorlog_sex','2')
                        ->where('visitorlog_forloc','1')                       
                        // ->where('visitorlog_year',$curr_year)                    
                        ->get('tblpamain')->result(); 
    }

    public function get_all_total_visitorsFM() 
    { 
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

       return $this->db->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','2')                       
                        // ->where('visitorlog_year',$curr_year)                    
                        ->get('tblipafvisitorslog')->num_rows();  
    }

    public function get_all_total_visitorsLM() 
    { 
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        return $this->db->select('COUNT(tblipafvisitorslog.generatedcode) as countLF,regionName,tblipafvisitorslog.generatedcode')
                        ->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','1')                       
                        ->group_by('tblipafvisitorslog.generatedcode')                     
                        ->get('tblipafvisitorslog')->num_rows();  
    }

    public function count_FM() 
    {
        return $this->db->group_by('generatedcode')   
                        ->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','2')
                        ->get('tblipafvisitorslog')->num_rows();
    }

    public function getallRegion() 
    { 
        return $this->db->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->order_by('id')
                        ->group_by('id')
                        ->get('tblipafvisitorslog')->result(); 
    }

    public function getallRegionbyLF() 
    { 
        return $this->db->where('visitorlog_sex','2')
                        ->where('visitorlog_forloc','1')                       
                        ->get('tblipafvisitorslog')->result();
    }

    public function getallRegionbyLM() 
    { 
        return $this->db->join('tblpamain','tblipafvisitorslog.generatedcode=tblpamain.generatedcode','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
                        ->where('visitorlog_sex','1')
                        ->where('visitorlog_forloc','1')                       
                        ->group_by('tblipafvisitorslog.generatedcode')                         
                        ->get('tblipafvisitorslog')->result();
    }

    public function get_all_total_MarineAreas() 
    { 
        return $this->db->select('SUM(marine_area) as totalaream')                        
                        ->get('tblpamain')->result(); 
    }


    public function get_by_classification() 
    { 
        return $this->db->select('tblnip.nipDesc,COUNT(nip_id) as total')
        				->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT')
        				->group_by('tblpamain.nip_id')
        				->get('tblpamain')->result(); 
    } 

	public function get_by_cpa() 
    { 
        return $this->db->select('tblpacareadesc.CPABIdesc,COUNT(cpabi_id) as total')
        				->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')
        				->group_by('tblpamain.cpabi_id')
        				->get('tblpamain')->result(); 
    }

    public function get_land() 
    { 
        return $this->db->distinct()
        ->select("SUM(tblpamain.terrestrial) as total_landarea")
        ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
		->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left')
		->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left')
		->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left')
		->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left')       
        // ->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')")
        // ->group_by('tblpamainlocation.region_id')
        ->order_by('tbllocregion.id','ASC')
        ->get('tblpamain')->result();
    }

     public function get_water() 
    { 
        return $this->db->distinct()
        ->select("SUM(tblpamain.marine_area) as total_water")
        ->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT')
		->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left')
		->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left')
		->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left')
		->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left')       
        // ->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')")
        // ->group_by('tblpamainlocation.region_id')
        ->order_by('tbllocregion.id','ASC')
        ->get('tblpamain')->result();
    }

    // public function getallparecords(){   
    //     $this->db->select('count(*) as countsPA,region,regionName');
    //     $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
    //     $this->db->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT');
    //     $this->db->group_by('region');
    //     $query = $this->db->get('tblpamain');
    //     return $query->result();
    // }

     public function getallparecords(){   
        $this->db->select('count(*) as countsPA,region,regionName');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
        $this->db->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->where('status',1)
                        ->where('user_role',3);
        $this->db->group_by('region');
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function getallRegions(){   
        $query = $this->db->get('tbllocregion');        
        return $query->result();
    }

    public function getalllegisperPAProc(){   

      return $query = $this->db->query("SELECT COUNT(generatedcode) AS legis FROM ( select max(date_year) as _max, generatedcode,nip_id from tblpamainlegislation group by generatedcode ORDER BY tblpamainlegislation.`generatedcode` DESC) legis WHERE nip_id = 1");
    }

    public function getalllegisperPAProc2(){   

      return $query = $this->db->query("SELECT COUNT(generatedcode) AS legis FROM ( select max(date_year) as _max, generatedcode,nip_id from tblpamainlegislation group by generatedcode ORDER BY tblpamainlegislation.`generatedcode` DESC) legis WHERE nip_id = 2");
    }

    public function getalllegisperPAProc3(){   

      return $query = $this->db->query("SELECT COUNT(generatedcode) AS legis FROM ( select max(date_year) as _max, generatedcode,nip_id from tblpamainlegislation group by generatedcode ORDER BY tblpamainlegislation.`generatedcode` DESC) legis WHERE nip_id = 3");
    }

    public function getalllegisperperPA(){   

    	$this->db->select('MAX(date_year) as _max,nip_id, generatedcode,date_year');
    	$this->db->group_by('generatedcode');
        $query = $this->db->get('tblpamainlegislation');
         return $query->result();
    }

    public function getallparecordsbyProvince($dataprov){   
        $this->db->select('count(*) as countsPA,province,provinceName');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
        $this->db->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT');
        $this->db->where('regionid',$dataprov);
        $this->db->where('user_role',3);
        $this->db->group_by('province');
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function getprovs($paidss)
    {
        $this->db->where('id_p',$paidss);
        $query = $this->db->get('tbllocprovince');
        return $query->result();
        
    }

    public function getallparecordsPAbyProvince($datapas){   
        $this->db->select('*');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT');
        // $this->db->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','LEFT');
        $this->db->where('tbluser.province',$datapas);
        // $this->db->group_by('tbluser.province');
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function getalllegisperperPAselect(){   
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function gettotalPA(){   
        $query = $this->db->select('count(generatedcode) as totalPA')
                          ->get('tblpamain');
        return $query->result();
    }

    public function gettotalPAreg($region){   
        $query = $this->db->select('count(generatedcode) as totalPA')
                          ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                          ->where('region',$region)
                          ->get('tblpamain');
        return $query->result();
    }

    public function gettotalPAAreareg($region){   
        $query = $this->db->select('SUM(terrestrial + marine_area) as totalPAarea')
                          ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                          ->where('region',$region)
                          ->get('tblpamain');
        return $query->result();
    }

    public function gettotalPAArea(){   
        $query = $this->db->select('SUM(terrestrial + marine_area) as totalPAarea')
                          ->get('tblpamain');
        return $query->result();
    }

    public function querydateyear()
    {
        return $this->db->select("*")
                    ->get('tbldateyear')
                    ->result();
    }

    public function querycalendars($codes)
    {
        return $this->db->select("*")
                    ->where('generatedcode',$codes)
                    ->get('tblpamaineventapigoogle')
                    ->result();
    }

    public function queryyear()
    {
        return $this->db->select("date_year_income as maxyr,SUM(entrancefee+facilities+resource+concession) as sumincome")
        			->group_by('date_year_income')
                    ->get('tblpaipafincome')
                    ->result();
    }

    public function queryvisiotrsa()
    {
        return $this->db->select("SUM(no_male_local+no_female_local+
        							  no_male_local_student+no_female_local_student+
        							  no_male_local_pwd+no_female_local_pwd+
        							  no_male_local_sc+no_female_local_sc+
        							  no_male_local_children+no_female_local_children+
        							  no_male_foreign+no_female_foreign
        							) as sumvisitors,date_year")
        			->group_by('date_year')
        			->group_by('date_year')
                    ->get('tblpaipafvisitors')
                    ->result();
    }
    public function get_all_regions1() 
    { 
        return $this->db->select('tblpacategory.categoryName,COUNT(pacategory_id) as total')
        				->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')
        				->group_by('tblpamain.pacategory_id')
        				->get('tblpamain')->result(); 
    } 

    public function queryincomeperyear()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('SUM(entrancefee + tblpaipafincome.facilities + resource + concession) as totalincome,regionName,id_income')
        ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('totalincome','DESC')
        // ->where('date_year_income',$date)
        ->get('tblpaipafincome')->result();
    }

    public function queryincomeperyeardevfee($id)        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('SUM(devfee_amount) as totaldev')
        ->join('tblpamain','tblpaipafdevfee.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('totaldev','DESC')
        ->where('id_fromincome',$id)
        ->get('tblpaipafdevfee')->result();
    }

    public function queryincomeperyearother($id)        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('SUM(other_amount) as totalother')
        ->join('tblpamain','tblpaipafincomeothers.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('totalother','DESC')
        ->where('id_fromincome',$id)
        ->get('tblpaipafincomeothers')->result();
    }

     public function querypavisitorsperregion()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as noofvisitor,regionName')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('noofvisitor','DESC')
        // ->where('id_fromincome',$id)
        ->get('tblipafvisitorslog')->result();
    }

     public function querypavisitorsperregionMale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as malevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('malevisitor','DESC')
        ->where('visitorlog_sex',1)
        ->get('tblipafvisitorslog')->result();
    }

     public function querypavisitorsperregionFemale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as femalevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        ->order_by('femalevisitor','DESC')
        ->where('visitorlog_sex',2)
        ->get('tblipafvisitorslog')->result();
    }

    public function querypavisitorsperregionS()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');
        return $this->db->select('*')        
        ->join('tbluser','tbllocregion.id = tbluser.region','left')
        ->group_by('region')
        ->get('tbllocregion')->result();
    }

    public function querypavisitorsperregionLocMale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as locmalevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        // ->order_by('locmalevisitor','DESC')
        ->where('visitorlog_forloc',1)
        ->where('visitorlog_sex',1)
        ->get('tblipafvisitorslog')->result();
    }

     public function querypavisitorsperregionLocFemale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as locfemalevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        ->group_by('region')
        // ->order_by('locfemalevisitor','DESC')
        ->where('visitorlog_forloc',1)
        ->where('visitorlog_sex',2)
        ->get('tblipafvisitorslog')->result();
    }

    public function querypavisitorsperregionForMale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as formalevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        // ->group_by('region')
        // ->order_by('formalevisitor','DESC')
        ->where('visitorlog_forloc',2)
        ->where('visitorlog_sex',1)
        ->get('tblipafvisitorslog')->result();
    }

     public function querypavisitorsperregionForFemale()        
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y');

        return $this->db->select('COUNT(*) as forfemalevisitor,regionName,tblipafvisitorslog.generatedcode')
        ->join('tblpamain','tblipafvisitorslog.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
        // ->group_by('region')
        // ->order_by('forfemalevisitor','DESC')
        ->where('visitorlog_forloc',2)
        ->where('visitorlog_sex',2)
        ->get('tblipafvisitorslog')->result();
    }



}
