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

    public function getAllData($id_main=null)
    {
        return $this->db->select("*")
                        ->from($this->table)
                        ->where('id_main',$id_main)
                        ->get()
                        ->row();
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
                        $list[$value->id_year] = strtoupper($value->year);
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

        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id');

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table6);
        return $query->result();
    }

    function check_Name($codegen = '', $commonname) {
        // $where = "id_genus_get = '$commonname' AND generatedcode = '$codegen'";
        // $this->db->where($where);

        $this->db->where('generatedcode', $codegen);
        // $this->db->or_where('id_genus_get',$commonname);
        if($codegen) {
            $this->db->where_not_in('generatedcode', $codegen,'id_genus_get',$commonname);
        }
        return $this->db->get($this->table6)->num_rows();
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

}
