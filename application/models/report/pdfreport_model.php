<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class pdfreport_model extends CI_Model
{
    private $pamain = 'tblpamain';
    private $member = 'tblpambmember';
    private $location = 'tblpamainlocation';
    private $proclamation = 'tblpamainlegislation';
    private $biological = 'tblpamainbiological';
    private $project = 'tblpamainproject';
    private $image = 'tblpamainimageupload';
    private $attract = 'tblpaattraction';
    private $facility = 'tblpafacility';
    private $activity = 'tblpaecotourism';
    private $income = 'tblpavisitorsrate';
    private $pasu = 'tbluser';
    private $multiplezone = 'tblpamultiplezone';
    private $strictzone = 'tblstrictprotzone';
    private $tribe = 'tblsrpaoregister';
    private $agro = 'tblpaagroforestry';
    private $threats = 'tblpathreat';
    private $reference = 'tblpareference';
    private $fee_new = 'tblpamainvisitorpa';


    public function query_search_individual($gencode)
    {
            $this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','left');
            $this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','left');
            $this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','left');
            $this->db->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','left');
            $this->db->join('tbliucncode','tblpamain.iucn_id = tbliucncode.id','left');
            $this->db->join('tbldatemonth','tblpamain.pamb_month = tbldatemonth.id_month','left');
            $this->db->join('tbldateyear','tblpamain.pamb_year = tbldateyear.id_year','left');
            $this->db->where('generatedcode',$gencode);
            $query = $this->db->get($this->pamain);
            return $query->result();
    }

    public function paArea($gencode)
    {
            $this->db->select('*');         
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->pamain);
            return $query->result();
    }

    public function paAreaTotal($gencode)
    {
            $this->db->select('(area + marine_area + buffer) as total_area');           
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->pamain);
            return $query->result();
    }
    
    public function query_pambmember($gencode)
    {
            $this->db->join('tblpambmember','tblpamain.generatedcode = tblpambmember.generatedcode','left');
            $this->db->join('tblsex','tblpambmember.sex = tblsex.id','left');
            $this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition','left');
            $this->db->order_by('tblpambmember.designation','ASC');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query2 = $this->db->get($this->pamain);
            return $query2->result();
    }

     public function query_tribe($gencode)
    {

            $this->db->join('tblsrpaoregister','tblpamain.generatedcode = tblsrpaoregister.generatedcode','left');
            $this->db->join('tblsex','tblsrpaoregister.tribe_gender = tblsex.id','left');
            $this->db->join('tblsrpaotribe','tblsrpaoregister.tribe = tblsrpaotribe.id_tribe','left');
            $this->db->join('tbldatemonth','tblsrpaoregister.tribe_month = tbldatemonth.id_month','left');
            $this->db->join('tbldateyear','tblsrpaoregister.tribe_year = tbldateyear.id_year','left');

            // $this->db->order_by('tblpambmember.designation','ASC');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query2 = $this->db->get($this->pamain);
            return $query2->result();
            
    }

    public function query_threatss($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpathreat.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->threats);
            return $query->result();            
    }

    public function query_reference($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpareference.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->reference);
            return $query->result();
            
    }
    
    public function query_pambmember_count($gencode)
    {
            $this->db->join('tblpamain','tblpambmember.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->member);
            return $query->num_rows();
    }

    public function query_pamblocation($gencode)
    {
            $this->db->select('group_concat(distinct tbllocregion.regionName) as try1, 
                               group_concat(tbllocprovince.provinceName,", ",tbllocmunicipality.municipalName separator "\n ") as try2');
            $this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
            $this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
            $this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
            $this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
            $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('tblpamainlocation.generatedcode');
            $query= $this->db->get($this->location);
            return $query->result();
    }

    public function query_pamblocation_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->location);
            return $query->num_rows();
    }

    public function query_pambproc($gencode)
    {
            $this->db->select('SUM(tblpamainlegislation.legis_area) as total_area,SUM(tblpamainlegislation.buffer) as total_buffer');
            $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');
            $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
            $this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('tblpamainlegislation.generatedcode');
            $query= $this->db->get($this->proclamation);
            return $query->result();
    }

    public function query_pambproc_combined($gencode)
    {
            $this->db->select('group_concat( concat(tbllegislation.LegisDesc," No. ", legis_no," (",tbldatemonth.month," ",date_year, ")") separator "\n ") as try');
            $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');
            $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
            $this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamainlegislation.generatedcode',$gencode);
            $this->db->group_by('tblpamainlegislation.generatedcode');
            $query= $this->db->get($this->proclamation);
            return $query->result();
    }

    public function query_pasu($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tbluser.user_id = tblpamain.pasu_id','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->pasu);
            return $query->result();
    }

    public function query_apasu($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpaapasuinfo.id_apasu = tblpamain.pasu_id','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpaapasuinfo');
            return $query->result();
    }

    public function count_pambproc($gencode)
    {
            $this->db->select('COUNT id_palegis as total');
            $this->db->where('generatedcode',$gencode);
            $this->db->group_by('id_palegis');
            $query= $this->db->get($this->proclamation);
            return $query->num_rows();
    }

    public function query_pambproc_count($gencode)
    {
            $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','left');
            $this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->proclamation);
            return $query->num_rows();
    }

    public function query_pambbiological($gencode)
    {
            $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
            $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
            $this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
            $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->biological);
            return $query->result();
    }

    public function query_pambbiological_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->biological);
            return $query->num_rows();
    }

    public function query_tribe_count($gencode)
    {
            $this->db->join('tblpamain','tblsrpaoregister.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->tribe);
            return $query->num_rows();
    }

    public function query_pambproject($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->project);
            return $query->result();
    }

    public function query_pambproject_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->project);
            return $query->num_rows();
    }

    public function query_pambimage($gencode)
    {
            $this->db->join('tblpamain','tblpamainimageupload.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->image);
            return $query->result();
    }

    public function query_attractimage($gencode)
    {
            $this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->attract);
            return $query->result();
    }

    public function query_facilityimage($gencode)
    {
            $this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->facility);
            return $query->result();
    }

    public function query_activityimage($gencode)
    {
            $this->db->join('tblpamain','tblpaecotourism.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->activity);
            return $query->result();
    }

    public function query_agroimage($gencode)
    {
            $this->db->join('tblpamain','tblpaagroforestry.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->agro);
            return $query->result();
    }

    public function query_pambimage_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainimageupload.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->image);
            return $query->num_rows();
    }

    public function query_income($gencode)
    {       
            // $this->db->distinct('tblpavisitorsrate.date_year');
            $this->db->select("
                            date_month,
                            date_year,
                            id_rate,
                            localmale,
                            localfemale,
                            foreignmale,
                            foreignfemale,
                            entrance,parkingfee,rentalsfee,others,
                            (localmale + localfemale) AS total_local,
                            (foreignmale + foreignfemale) AS total_foreign,
                            ((entrance + parkingfee + rentalsfee + others) *.75) AS total_sub,
                            ((entrance + parkingfee + rentalsfee + others) *.25) AS total_central,
                            (entrance + parkingfee + rentalsfee + others) AS grand_total");

            
            $this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->order_by('tblpavisitorsrate.date_year','ASC');
            $this->db->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')");
            $this->db->group_by(array("tblpavisitorsrate.date_month", "tblpavisitorsrate.date_year"));
            $query= $this->db->get($this->income);
            return $query->result();
    }

    public function query_income_distinct($gencode)
    {
            $this->db->distinct();
            $this->db->select("tblpavisitorsrate.date_year as year_start");
            $this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('tblpavisitorsrate.date_year');
            $this->db->order_by('tblpavisitorsrate.date_year','DESC');
            $this->db->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')");

            $query= $this->db->get($this->income);
            return $query->result();
    }

    public function query_income_count($gencode)
    {
            $this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->income);
            return $query->num_rows();
    }

    public function multiplezone($gencode)
    {   
            $this->db->select('*');  
            $this->db->where('generatedcode',$gencode);
            $query2 = $this->db->get($this->multiplezone);
            return $query2->result();           
    }

     public function query_strict($gencode)
    {
            $this->db->select('*');
            $this->db->where('generatedcode',$gencode);
            $query2 = $this->db->get($this->strictzone);
            return $query2->result();           
    }


    public function strictprotzones($gencode)
    {
                
            $this->db->select('generatedcode, group_concat("* ",description separator "\n ") as descs');    
            $this->db->where('generatedcode',$gencode);
            $this->db->group_by('generatedcode');
            $query= $this->db->get($this->strictzone);
            return $query->result();
    }
    public function biogeographic_combine($gencode)
    {
            $this->db->select('group_concat( concat("Longitude: ",geographic_long1," - ", geographic_long2,"\n","Latitude: ",geographic_lat1," - ", geographic_lat2) separator "\n ") as Geographic');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('generatedcode');
            $query= $this->db->get($this->pamain);
            return $query->result();
    }

    public function query_lgu($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpalgu.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get($this->pasu);
            return $query->result();
    }

    public function getallfeeReportQuerried($searchPa,$year_list,$month_list){
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
        $this->db->where('date_month',$month_list);
        $this->db->order_by('date_day');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    
    public function resultQuerybyMonthly($searchpa,$searchyear,$searchmonth,$user_id)
    {
        $this->db->select("id_fee,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                SUM(locMale + locFemale) as local_visit,  
                SUM(forMale + forFemale) as foreign_visit,       
                SUM(locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as recreational_total, (trekking_biking_foreign + trekking_biking_local) as trekking_total, (scuba_foreign + scuba_local) as scuba_total,                
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as total");
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('date_month',$searchmonth);
        $this->db->order_by('date_day','ASC');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function groupbyYear($searchpa,$searchyear,$searchmonth,$user_id)
    {
        $this->db->select('*');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('date_month',$searchmonth);

        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function resultQueryGrandTotal($searchpa,$searchyear,$searchmonth,$user_id){
        $this->db->select("tblpamain.pa_name,id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,tblpamainvisitorpa.generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                (locMale + locFemale + forMale + forFemale) as total_visit,
                 (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                 (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as recreational_total, (trekking_biking_foreign + trekking_biking_local) as trekking_total, (scuba_foreign + scuba_local) as scuba_total,                
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                 ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central");
        $this->db->join('tblpamain','tblpamainvisitorpa.generatedcode = tblpamain.generatedcode');
        $this->db->where('tblpamainvisitorpa.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('date_month',$searchmonth);
        $this->db->order_by('date_day');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function resultQueryGrandTotals($searchpa,$searchyear,$searchmonth,$user_id){
        $this->db->select("id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,                               
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                 ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central");
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('date_month',$searchmonth);
        $this->db->order_by('date_day');
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

     public function getallfeeReportQuerriedbyYear($searchPa,$year_list,$user_id){
        $this->db->select("tblpamain.pa_name,id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,tblpamainvisitorpa.generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
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
        $this->db->join('tblpamain','tblpamainvisitorpa.generatedcode = tblpamain.generatedcode');
        $this->db->where('tblpamainvisitorpa.generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->order_by('date_day');
        $this->db->group_by('date_month');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function resultQuerybyYear($searchpa,$searchyear,$user_id)
    {
        $this->db->select("tblpamain.pa_name,id_fee,date_month,date_day,date_year,tblpamainvisitorpa.generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                SUM(locMale + locFemale) as local_visit,  
                SUM(forMale + forFemale) as foreign_visit,       
                SUM(locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as recreational_total, (trekking_biking_foreign + trekking_biking_local) as trekking_total, (scuba_foreign + scuba_local) as scuba_total,                
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central
                ");
        $this->db->join('tblpamain','tblpamainvisitorpa.generatedcode = tblpamain.generatedcode');
        $this->db->where('tblpamainvisitorpa.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        $this->db->order_by('date_day','ASC');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function groupbyYear2nd($searchpa,$searchyear,$user_id)
    {
        $this->db->select('*');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function resultQueryGrandTotalbyYear($searchpa,$searchyear,$user_id)
    {
        $this->db->select("id_fee,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as recreational_total, (trekking_biking_foreign + trekking_biking_local) as trekking_total, (scuba_foreign + scuba_local) as scuba_total,                
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central,
                ");
        // $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        $this->db->group_by('generatedcode');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }
}