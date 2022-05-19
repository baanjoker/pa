<?php defined('BASEPATH') OR exit('No direct script access allowed');

class wildlife_model extends CI_Model {

	private $table1 = 'tblwcategory';
    private $table2 = 'tblclass';
    private $table3 = 'tblorderw';
    private $table4 = 'tblfamily';
    private $table5 = 'tblwspeciesgenus';


	public function getData($id_cat=null)
    {
        return $this->db->select("*")           
            ->from($this->table1)
            ->where('id',$id_cat)
            ->get()
            ->row();
    }

     public function create($data = [])
    {    
        return $this->db->insert($this->table1,$data);

    }

    public function update($data = [])
    {
        return $this->db->where('id',$data['id'])
        ->update($this->table1,$data);       
    }

    function check_Code($id, $wcode) {
        $this->db->where('wcode', $wcode);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->table1)->num_rows();
    }

    function check_Name($id, $wdesc) {
        $this->db->where('wdesc', $wdesc);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->table1)->num_rows();
    }

    public function createClass($data = [])
    {    
        return $this->db->insert($this->table2,$data);

    }

    public function updateClass($data = [])
    {
        return $this->db->where('id_c',$data['id_c'])
        ->update($this->table2,$data);       
    }

    public function getDataClass($id_c=null)
    {
        return $this->db->select("*")           
            ->from($this->table2)
            ->where('id_c',$id_c)
            ->get()
            ->row();
    }

    public function categoryList()
    {
        $result = $this->db->select("*")
        ->from('tblwcategory')
        ->get()
        ->result();
        $list[''] = "SELECT SPECIES CATEGORY";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id] = ucwords($value->wdesc);
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
        $list[''] = "SELECT IUCN STATUS";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id] = ucwords($value->description);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function residency_status()
    {
        $result = $this->db->select("*")
        ->from('tblpamainbiological_residency')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_residency] = ucwords($value->residency_desc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function palist()
    {
        $result = $this->db->select("*")
        ->from('tblpamain')
        ->order_by('pa_name')
        ->get()
        ->result();
        $list[''] = "SELECT PROTECTED AREA";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->generatedcode] = ucwords($value->pa_name);
            }
            return $list;
        } else {
            return false;
        }
    }
   
    function check_cCode($id_c, $classcode) {
        $this->db->where('ClassCode', $classcode);
        if($id_c) {
            $this->db->where_not_in('id_c', $id_c);
        }
        return $this->db->get($this->table2)->num_rows();
    }

    function check_Name_class($id_c, $ClassDesc) {
        $this->db->where('ClassDesc', $ClassDesc);
        if($id_c) {
            $this->db->where_not_in('id_c', $id_c);
        }
        return $this->db->get($this->table2)->num_rows();
    }


    public function getDataOrder($id_family=null)
    {
        return $this->db->select("*")           
            ->from($this->table3)
            ->where('id_family',$id_family)
            ->get()
            ->row();
    }

     public function createOrder($data = [])
    {    
        return $this->db->insert($this->table3,$data);

    }

    public function updateOrder($data = [])
    {
        return $this->db->where('id_family',$data['id_family'])
        ->update($this->table3,$data);       
    }

    function check_Code_order($id_family, $ordercode) {
        $this->db->where('OrderCode', $ordercode);
        if($id_family) {
            $this->db->where_not_in('id_family', $id_family);
        }
        return $this->db->get($this->table3)->num_rows();
    }


    function check_Name_order($id, $orderdesc) {
        $this->db->where('OrderDesc', $orderdesc);
        if($id) {
            $this->db->where_not_in('id_family', $id);
        }
        return $this->db->get($this->table3)->num_rows();
    }

    public function identify_order_class($id_family=null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblorderw','tblclass.WCode = tblorderw.wCategory','left');
        $this->db->from('tblclass');
        $this->db->where('id_family',$id_family);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result['']= 'SELECT CLASS';
                    $result[$row->id_c]= ucwords($row->ClassDesc);
                }
         
                return $result;
    }

    public function getDataFamily($id_scientific=null)
    {
        return $this->db->select("*")           
            ->from($this->table4)
            ->where('id_scientific',$id_scientific)
            ->get()
            ->row();
    }

    public function createFamily($data = [])
    {    
        return $this->db->insert($this->table4,$data);

    }

    public function updateFamily($data = [])
    {
        return $this->db->where('id_scientific',$data['id_scientific'])
        ->update($this->table4,$data);       
    }

    function check_familyname($id, $scientificname) {
        $this->db->where('ScientificName', $scientificname);
        if($id) {
            $this->db->where_not_in('id_scientific', $id);
        }
        return $this->db->get($this->table4)->num_rows();
    }

    function check_familycode($id, $wfamily) {
        $this->db->where('FamilyCode', $wfamily);
        if($id) {
            $this->db->where_not_in('id_scientific', $id);
        }
        return $this->db->get($this->table4)->num_rows();
    }

    public function identify_family_class($id_scientific=null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblfamily','tblclass.WCode = tblfamily.WCode','left');
        $this->db->from('tblclass');
        $this->db->where('id_scientific',$id_scientific);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result['']= 'SELECT CLASS';
                    $result[$row->id_c]= ucwords($row->ClassDesc);
                }
         
                return $result;
    }

    public function identify_family_order($id_scientific=null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblfamily','tblorderw.ClassCodes = tblfamily.ClassCode','left');
        $this->db->from('tblorderw');
        $this->db->where('id_scientific',$id_scientific);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result['']= 'SELECT ORDER';
                    $result[$row->id_family]= ucwords($row->OrderDesc);
                }
         
                return $result;
    }

    public function getDataSpecies($id_genus=null)
    {
        return $this->db->select("*")           
            ->from($this->table5)
            ->where('id_genus',$id_genus)
            ->get()
            ->row();
    }

    public function familyList()
    {
        $result = $this->db->select("*")
        ->from('tblfamily')
        ->order_by('ScientificName','ASC')
        ->get()
        ->result();
        $list[''] = "SELECT FAMILY NAME";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_scientific] = ucwords($value->ScientificName);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function createSpecies($data = [])
    {    
        return $this->db->insert($this->table5,$data);

    }

    public function updateSpecies($data = [])
    {
        return $this->db->where('id_genus',$data['id_genus'])
        ->update($this->table5,$data);       
    }

    function check_codeSpecies($id_genus, $speciescode) {
        $this->db->where('speciesCode', $speciescode);
        if($id_genus) {
            $this->db->where_not_in('id_genus', $id_genus);
        }
        return $this->db->get($this->table5)->num_rows();
    }

    function check_commonNames($id_genus, $commonname) {
        $this->db->where('commonNameSpecies', $commonname);
        if($id_genus) {
            $this->db->where_not_in('id_genus', $id_genus);
        }
        return $this->db->get($this->table5)->num_rows();
    }

    function check_scientificNames($id_genus, $scientificname) {
        $this->db->where('scientificName_genus', $scientificname);
        if($id_genus) {
            $this->db->where_not_in('id_genus', $id_genus);
        }
        return $this->db->get($this->table5)->num_rows();
    }
}