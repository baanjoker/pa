<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
*
*/
class pamain_model extends CI_Model
{
	private $table = 'tblpamain';
    private $table2 = 'tblpamainlocation';
    private $table3 = 'tblpamainlegislation';
    private $table4 = 'tblpambmember';
    private $table5 = 'tblwspeciesgenus';
    private $table6 = 'tblpamainbiological';
    private $table7 = 'tblpamainproject';
    private $table8 = 'tblsrpaoregister';
	private $table9	=  'tblpamainimageupload';
    private $table10 = 'tblpavisitorsrate';
    private $table11 = 'tblpaecotourism';
    private $fee_new = 'tblpamainvisitorpa';
    private $ipafs = 'tblpaipaf';

    public function resultQuerybyYears($searchpa,$searchyear)
    {
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
    public function resultQueryGrandTotalbyYears($searchpa,$searchyear){
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

    

    public function createMain($data = [])
    {
        return $this->db->insert($this->table,$data);

    }

    public function updateMain($data = [])
    {
        return $this->db->where('id_main',$data['id_main'])
        ->update($this->table,$data);
    }

	public function create($data = [])
    {
        return $this->db->insert($this->table,$data);

    }

    public function insertfile($file){
            return $this->db->insert($this->table3, $file);
        }

    public function createLegis($data = [])
    {
        return $this->db->insert($this->table3,$data);

    }

	public function createImage($data = [])
    {
        return $this->db->insert($this->table9,$data);

    }

    public function update($data = [])
    {
        return $this->db->where('id_main',$data['id_main'])
        ->update($this->table,$data);
    }

     public function getAllUsers(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getbiogeoter(){
        $this->db->join('tblpatbzones','tblpamain_terrestrial_biozone.biodiv_terrestrial=tblpatbzones.id_tbz','LEFT');
        $query = $this->db->get('tblpamain_terrestrial_biozone');
        return $query->result();
    }

    public function getAllData($gencode=null)
    {
        return $this->db->select("*")
                        ->from($this->table)
                        ->where('generatedcode',$gencode)
                        ->get()
                        ->row();
    }

    public function createImageeco($data = [])
    {
        return $this->db->insert($this->table11,$data);

    }

    public function classList()
    {

        $result = $this->db->select("*")
            ->from('tblnip')
            ->get()
            ->result();

            $list[''] = "SELECT CLASSIFICATION";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_nip] = strtoupper($value->nipDesc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function categoryList()
    {

        $result = $this->db->select("*")
            ->from('tblpacategory')
            ->get()
            ->result();

            $list[''] = "SELECT CATEGORY";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cat] = strtoupper($value->categoryName);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cpabiList()
    {

        $result = $this->db->select("*")
            ->from('tblpacareadesc')
            ->get()
            ->result();

            $list[''] = "SELECT PRIORITY AREA";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_pac] = strtoupper($value->CPABIdesc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function zoneList()
    {

        $result = $this->db->select("*")
            ->from('tblpatbzones')
            ->get()
            ->result();

            $list[''] = "SELECT BIOGEOGRAPHIC LOCATION";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tbz] = strtoupper($value->TBZlocation);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function regionList()
    {

        $result = $this->db->select("*")
            ->from('tbllocregion')
            ->get()
            ->result();

            $list[''] = "SELECT REGION";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = strtoupper($value->regionName);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function procList()
    {

        $result = $this->db->select("*")
            ->from('tbllegislation')
            ->get()
            ->result();

            $list[''] = "SELECT ORDINANCE";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_legis] = strtoupper($value->LegisDesc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function monthList()
    {

        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Month";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_month] = $value->month;
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

    public function yearListedduration()
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

    public function dayList()
    {

        $result = $this->db->select("*")
            ->from('tbldateday')
            ->get()
            ->result();

            $list[''] = "Day";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_day] = strtoupper($value->day);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function iucnList()
    {

        $result = $this->db->select("*")
            ->from('tbliucncode')
            ->get()
            ->result();

            $list[''] = "IUCN Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = strtoupper($value->description);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function sexList()
    {

        $result = $this->db->select("*")
            ->from('tblsex')
            ->get()
            ->result();

            $list[''] = "Select Gender";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->sexcode] = $value->sexdesc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function maritalStatus()
        {

            $result = $this->db->select("*")
                ->from('tblcvstatus')
                ->get()
                ->result();

                $list[''] = "Select Status";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_marital] = $value->cvdesc;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function organizationposition()
        {

            $result = $this->db->select("*")
                ->from('tblpambmemberposition')
                ->get()
                ->result();

                $list[''] = "Select Position";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_memposition] = $value->description;
                }
                return $list;
            } else {
                return false;
            }
        }



    public function createlocation($data = [])
    {
        return $this->db->insert($this->table2,$data);
    }

    public function createpambmember($data = [])
    {
        return $this->db->insert($this->table4,$data);
    }

    public function updatelocation($data = [])
    {
        return $this->db->where('id_loc',$data['id_loc'])
        ->update($this->table2,$data);
    }

    public function getAllUsers2($codegens){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table2);
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function getAllLegislation($codegens){

        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month');
        $this->db->where('generatedcode',$codegens);
        $query1 = $this->db->get($this->table3);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function getAllPAMBmembers($codegens){

        // $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        $this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition');
        $this->db->where('generatedcode',$codegens);
        $query1 = $this->db->get($this->table4);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function commonnameList()
    {

        $result = $this->db->select("*")
            ->from($this->table5)
            ->order_by('commonNameSpecies','ASC')
            ->get()
            ->result();

            $list[''] = "SELECT WILDLIFE COMMON NAME";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = strtoupper($value->commonNameSpecies);
            }
            return $list;
        } else {
            return false;
        }

    }

    public function getvalueCommonName($selected_value){
        // $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        // $this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition');
        $this->db->where('id_genus',$selected_value);
        $query1 = $this->db->get($this->table5);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function createBiological($data = [])
    {
        return $this->db->insert($this->table6,$data);

    }

    public function getAllbiological($codegens){

        // $this->db->join('tblwspeciesgenus','tbliucncode.id = tblwspeciesgenus.status','LEFT');

        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table6);
        return $query->result();
    }

    function check_Name_bio($id,$commonname,$gencode) {
        $idpa = $this->input->post('gencode');
        $where = "id_genus_get='$commonname' and generatedcode='$idpa'";
        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_pabiological',$id,'generatedcode',$idpa);
        }
        return $this->db->get('tblpamainbiological')->num_rows();
    }

    public function createProject($data = [])
    {
        return $this->db->insert($this->table7,$data);

    }

    public function getAllproject($codegens){
        
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table7);
        return $query->result();
    }

    public function tribelist()
    {

        $result = $this->db->select("*")
            ->from('tblsrpaotribe')
            ->get()
            ->result();

            $list[''] = "SELECT TRIBE";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tribe] = strtoupper($value->tribe_name);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function triberelation()
    {

        $result = $this->db->select("*")
            ->from('tblsrpaorelationship')
            ->get()
            ->result();

            $list[''] = "SELECT RELATIONSHIP";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_relation] = strtoupper($value->reladesc);
            }
            return $list;
        } else {
            return false;
        }
    }

     public function createTribe($data = [])
    {
        return $this->db->insert($this->table8,$data);

    }

    public function getAlltribe($codegens){


        $this->db->join('tblsex','tblsrpaoregister.tribe_gender = tblsex.id','left');
        $this->db->join('tbldatemonth','tblsrpaoregister.tribe_month = tbldatemonth.id_month','left');
        $this->db->join('tblsrpaorelationship','tblsrpaoregister.tribe_relationship = tblsrpaorelationship.id_relation','left');
        $this->db->join('tblcvstatus','tblsrpaoregister.tribe_marital = tblcvstatus.id_marital','left');
        $this->db->join('tblsrpaotribe','tblsrpaoregister.tribe = tblsrpaotribe.id_tribe','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table8);
        return $query->result();
    }

    public function getAllImage($codegens){
   
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table9);
        return $query->result();
    }

    public function getAllImageeco($codegens){
   
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table11);
        return $query->result();
    }

    public function createincome($data = [])
    {
        return $this->db->insert($this->table10,$data);
    }

    public function updateincome($data = [])
    {
        return $this->db->where('id_rate',$data['id_rate'])
        ->update($this->table10,$data);
    }

    public function getallIncome($codegens){
        $this->db->select(" tbldateyear.year,
                            tbldatemonth.month,
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

        $this->db->join('tbldateyear','tblpavisitorsrate.date_year = tbldateyear.id_year','left');
        $this->db->join('tbldatemonth','tblpavisitorsrate.date_month = tbldatemonth.id_month','left');
        $this->db->order_by('tblpavisitorsrate.date_year','DESC');
        $this->db->order_by('tblpavisitorsrate.date_month','DESC');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table10);
        return $query->result();

    }

    function check_Date($id, $gencode) {
        $year = $this->input->post('year_monitoring');
        $month = $this->input->post('month_monitoring');
        $code = $this->input->post('gencode');
        $where = "date_year ='$year' and date_month ='$month' and generatedcode='$code'";
        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_rate',$id,'generatedcode',$code);
        }
        return $this->db->get('tblpavisitorsrate')->num_rows();
    }

    function count_pamb_members($gencode){
        $this->db->from('tblpambmember');
        $this->db->where('generatedcode',$gencode);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
    }

     public function paList()
    {
        $result = $this->db->select("*")
            ->join('tblpamain','tblipafsourceincome.generatedcode = tblpamain.generatedcode')
            ->from('tblipafsourceincome')
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

    public function getIpafYearMain($searchPa,$year_list){
        $this->db->select('id_ipaf,generatedcode,no_visitors,visitors,facilities,parking_area,recreational_activity,water_activity,date_month,date_year,
                          (visitors+facilities+parking_area+recreational_activity+water_activity) AS total')
                 ->where('generatedcode',$searchPa)
                 ->where('date_year',$year_list)               
                 ->group_by('date_month');
                 $query = $this->db->get($this->ipafs);
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
        $this->db->select("tblpamain.pa_name,id_fee,date_month,date_day,date_year,tblpamainvisitorpa.generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
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
        $this->db->join('tblpamain','tblpamainvisitorpa.generatedcode = tblpamain.generatedcode');        
        $this->db->where('tblpamainvisitorpa.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        $this->db->group_by('generatedcode');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }
}
