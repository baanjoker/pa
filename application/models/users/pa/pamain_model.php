<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * 
 */
class pamain_model extends CI_Model
{
	private $identify_region = "tbluser";
	private $pamain_by_region = "tblpamain";
    private $main = "tblpamain";
    private $location = "tblpamainlocation";
    private $legislation = "tblpamainlegislation";
    private $pamb = "tblpambmember";
    private $species = "tblwspeciesgenus";
    private $biological = "tblpamainbiological";
    private $project = "tblpamainproject";
    private $occupants = "tblsrpaoregister";
    private $visitors = "tblpavisitorsrate";
    private $map = "tblpamainimageupload";
    private $log = "tblaudit_logs";

    public function createMain($data = [])
    {
        return $this->db->insert($this->main,$data);
    }

    public function updateMain($data = [])
    {
        return $this->db->where('id_main',$data['id_main'])
        ->update($this->main,$data);
    }

    public function createLogs($data = [])
    {
        return $this->db->insert($this->log,$data);
    }

	public function user_region($user_id=null)
	{
		return $this->db->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
						->where('tbluser.user_id',$user_id)
						->get($this->identify_region)
						->row();
	}

    public function delete_location($id){

        return $this->db->where('generatedcode',$id)
              ->delete($this->location);               
    }

    public function delete_proclamation($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->legislation);               
    }

    public function delete_biological($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->biological);               
    }

    public function delete_project($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->project);               
    }

    public function delete_occupants($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->occupants);               
    }

    public function delete_visitors($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->visitors);               
    }

    public function delete_map($id){
        return $this->db->where('generatedcode',$id)
              ->delete($this->map);               
    }
	public function getAlldatafromthisregion($regionId){
        $this->db->select('tblpamain.id_main, tblpamain.pa_name, tblpamain.generatedcode, GROUP_CONCAT(DISTINCT tbllocprovince.provinceName SEPARATOR ",") as prov,GROUP_CONCAT(DISTINCT tbllocmunicipality.municipalName SEPARATOR ",") as mun');
        $this->db->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->where('tblpamainlocation.region_id',$regionId);
        $this->db->order_by('pa_name','');
        $this->db->group_by('generatedcode');
        $query = $this->db->get($this->pamain_by_region);
        
        return $query->result();

    }

    public function getAlldatafromthisregion2($regionId){
        // $this->db->select('tblpamain.id_main, tblpamain.pa_name, tblpamain.generatedcode, GROUP_CONCAT(DISTINCT tbllocprovince.provinceName SEPARATOR ",") as prov,GROUP_CONCAT(DISTINCT tbllocmunicipality.municipalName SEPARATOR ",") as mun');
        $this->db->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left');
        $this->db->join('tbllocmunicipality','tbluser.municipality = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocprovince','tbluser.province = tbllocprovince.id_p','left');
        $this->db->where('tbluser.region',$regionId);
        $this->db->order_by('pa_name','');
        // $this->db->group_by('generatedcode');
        $query = $this->db->get($this->pamain_by_region);
        
        return $query->result();

    }

    public function pa_name_identity($id=null){
        $this->db->select('pa_name,generatedcode');
        $this->db->where('generatedcode',$id);
        $query_name = $this->db->get('tblpamain');
        return $query_name->result();
    }
    public function getAllData($gencode=null)
    {
        return $this->db->select("*")
                        ->from($this->pamain_by_region)
                        ->where('generatedcode',$gencode)
                        ->get()
                        ->row();
    }

    public function classList()
    {

        $result = $this->db->select("*")
            ->from('tblnip')
            ->get()
            ->result();

            $list[''] = "Select Classification";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_nip] = ucfirst($value->nipDesc);
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

            $list[''] = "Select Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cat] = ucfirst($value->categoryName);
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

            $list[''] = "Select Priority Area";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_pac] = ucfirst($value->CPABIdesc);
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

            $list[''] = "Select Biogeographic Location";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tbz] = ucfirst($value->TBZlocation);
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
                        $list[$value->id] = ucfirst($value->description);
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
                        $list[$value->id_year] = strtoupper($value->year);
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

    public function regionList($UserRegions)
    {

        $result = $this->db->select("*")
            ->from('tbllocregion')
            ->where('id',$UserRegions)
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

    public function getAlllocation($codegens){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->location);
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function createlocation($data = [])
    {
        return $this->db->insert($this->location,$data);
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

    public function getAllLegislation($codegens){

        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month');
        $this->db->where('generatedcode',$codegens);
        $query1 = $this->db->get($this->legislation);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function createLegis($data = [])
    {
        return $this->db->insert($this->legislation,$data);
    }

    public function updatelocation($data = [])
    {
        return $this->db->where('id_loc',$data['id_loc'])
        ->update($this->legislation,$data);
    }

    public function sexList()
    {
        $result = $this->db->select("*")
            ->from('tblsex')
            ->get()
            ->result();

            $list[''] = "SELECT GENDER";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->sexcode] = strtoupper($value->sexdesc);
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

                $list[''] = "SELECT STATUS";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_marital] = strtoupper($value->cvdesc);
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
                            $list[$value->id_memposition] = strtoupper($value->description);
                }
                return $list;
            } else {
                return false;
            }
        }

    public function createpambmember($data = [])
    {
        return $this->db->insert($this->pamb,$data);
    }

    public function getAllPAMBmembers($codegens){
		$this->db->join('tblcvstatus','tblpambmember.civil_status = tblcvstatus.id_marital','LEFT');
    	$this->db->join('tblsex','tblpambmember.sex = tblsex.id','LEFT');
        $this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query1 = $this->db->get($this->pamb);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function commonnameList()
    {

        $result = $this->db->select("*")
            ->from($this->species)
            ->order_by('commonNameSpecies','ASC')
            ->get()
            ->result();

            $list[''] = "SELECT WILDLIFE COMMON NAME";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = ucfirst($value->commonNameSpecies);
            }
            return $list;
        } else {
            return false;
        }

    }

    public function createBiological($data = [])
    {
        return $this->db->insert($this->biological,$data);

    }

    public function getAllbiological($codegens){

        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->biological);
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
        return $this->db->insert($this->project,$data);

    }

    public function getAllproject($codegens){
        
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->project);
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
        return $this->db->insert($this->occupants,$data);

    }

    public function getAlltribe($codegens){


        $this->db->join('tblsex','tblsrpaoregister.tribe_gender = tblsex.id','left');
        $this->db->join('tbldatemonth','tblsrpaoregister.tribe_month = tbldatemonth.id_month','left');
        $this->db->join('tblsrpaorelationship','tblsrpaoregister.tribe_relationship = tblsrpaorelationship.id_relation','left');
        $this->db->join('tblcvstatus','tblsrpaoregister.tribe_marital = tblcvstatus.id_marital','left');
        $this->db->join('tblsrpaotribe','tblsrpaoregister.tribe = tblsrpaotribe.id_tribe','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->occupants);
        return $query->result();
    }

    public function createincome($data = [])
    {
        return $this->db->insert($this->visitors,$data);
    }

    public function updateincome($data = [])
    {
        return $this->db->where('id_rate',$data['id_rate'])
        ->update($this->visitors,$data);
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
        $query = $this->db->get($this->visitors);
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

    public function getAllImage($codegens){
   
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->map);
        return $query->result();
    }

    public function createImage($data = [])
    {
        return $this->db->insert($this->map,$data);

    }

    public function count_location($gencode)
    {
            // $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamainlocation.generatedcode',$gencode);
            $query= $this->db->get($this->location);
            return $query->num_rows();
    }
    
}