<?php defined('BASEPATH') OR exit('No direct script access allowed');

class psgc_model extends CI_Model {
 
	// private $table = "tblcave";
	private $regions = "tbllocregion";
	private $provinces = "tbllocprovince";
    private $municipalities = "tbllocmunicipality";
    private $barangay = "tbllocbarangay";

    public function region_list()
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

    public function countProvince($id)
    {
        return $this->db->select("COUNT(provinceCode) AS total")           
            ->from($this->provinces)  
            ->where('regionid',$id)
            ->get()
            ->row_array();
    }

    public function countAllRegion()
    {
        return $this->db->select("COUNT(regionCode) AS total")           
            ->from($this->regions)  
            ->get()
            ->row_array();
    }

    public function countAllProvince()
    {
        return $this->db->select("COUNT(provinceCode) AS total")           
            ->from($this->provinces)  
            ->get()
            ->row_array();
    }

    public function countAllMunicipalities()
    {
        return $this->db->select("COUNT(municipalName) AS total")           
            ->from($this->municipalities)  
            ->get()
            ->row_array();
    }

    public function countAllbarangay()
    {
        return $this->db->select("COUNT(barangayName) AS total")           
            ->from($this->barangay)  
            ->get()
            ->row_array();
    }

     public function countMunisipyo($id)
    {
        return $this->db->select("COUNT(municipalName) AS total") 
                        ->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left')
                        ->join('tbllocregion','tbllocprovince.regionid = tbllocregion.id','left')          
                        ->from($this->municipalities)  
                        ->where('tbllocregion.id',$id)
                        ->get()
                        ->row_array();
    }

    public function countMunicipality($id)
    {
        return $this->db->select("COUNT(municipalCode) AS total")           
                        ->from($this->municipalities)  
                        ->where('provinceid',$id)
                        ->get()
                        ->row_array();
    }

    public function countBarangay_by_province($id)
    {
        return $this->db->select("COUNT(barangayCode) AS total")           
            ->from($this->barangay) 
            ->join('tbllocmunicipality','tbllocbarangay.municipalid = tbllocmunicipality.id_m','left')

            ->where('tbllocmunicipality.provinceid',$id)
            ->get()
            ->row_array();
    }

    public function countBarangay($id)
    {
        $rc = $this->input->get('rc');
        return $this->db->select("COUNT(barangayCode) AS total")           
            ->from($this->barangay) 
            ->join('tbllocmunicipality','tbllocbarangay.municipalid = tbllocmunicipality.id_m','left')
            ->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left')
            ->join('tbllocregion','tbllocprovince.regionid = tbllocregion.id','left')
            ->where('tbllocregion.id',$id)
            ->get()
            ->row_array();
    }

    public function countBarangay_by_municipality($id)
    {
        return $this->db->select("COUNT(barangayCode) AS total")           
            ->from($this->barangay) 
            ->where('municipalid',$id)
            ->get()
            ->row_array();
    }

	public function regionsList()
	{
		return $this->db->select("*")
	            ->from($this->regions)
	            ->get()
	            ->result();
	}

	public function create($data = [])
	{	 
		return $this->db->insert($this->regions,$data);
	}

    public function create_province($data = [])
    {    
        return $this->db->insert($this->provinces,$data);
    }

	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
		->update($this->regions,$data);		

	} 

    public function delete_region($id = null)
    {
        $this->db->where('id',$id)
            ->delete($this->regions);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_province($id = null)
    {
        $this->db->where('id_p',$id)
            ->delete($this->provinces);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_municipality($id = null)
    {
        $this->db->where('id_m',$id)
            ->delete($this->municipalities);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_barangay($id = null)
    {
        $this->db->where('id_b',$id)
            ->delete($this->barangay);

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_province($data = [])
    {
        return $this->db->where('id_p',$data['id_p'])
        ->update($this->provinces,$data);     

    } 
	public function identify($id=null)
	{
		return $this->db->select("*")

			->from($this->regions)	
			->where('id',$id)
			->get()
			->row();
	}

	function check_regionCode($id, $region_code) {
        $this->db->where('regionCOde', $region_code);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tbllocregion')->num_rows();
    }

    function check_regionName($id, $region_name) {
        $this->db->where('regionName', $region_name);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('tbllocregion')->num_rows();
    }

    function check_provinceCode($id, $province_code) {
        $this->db->where('provinceCode', $province_code);
        if($id) {
            $this->db->where_not_in('id_p', $id);
        }
        return $this->db->get('tbllocprovince')->num_rows();
    }

    function check_provinceName($id, $province_name) {
        $this->db->where('provinceName', $province_name);
        if($id) {
            $this->db->where_not_in('id_p', $id);
        }
        return $this->db->get('tbllocprovince')->num_rows();
    }

    public function getProvs($rc=null)
    {
    $code_r = $this->input->get('rc');
	$results = array();
    $this->db->select("*");
    $this->db->from($this->provinces);
    $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
    $this->db->where('tbllocregion.id',$code_r);

    $query = $this->db->get();

    if($query->num_rows() > 0) {
        $results = $query->result();
    }
    return $results;
    }

    public function getAllProvs($rc=null)
    {
     $code_r = $this->input->get('rc');
	$result1 = array();
    $this->db->select("*");
    $this->db->from($this->provinces);
    $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
    // $this->db->where('tbllocregion.id',$code_r);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
        $result1 = $query->result();
    }
    return $result1;
    }

    public function identifyProvince($rc=null)
    {
     $code_r = $this->input->get('rc');
    $result1 = array();
    $this->db->select("*");
    $this->db->from($this->provinces);
    $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
    $this->db->where('tbllocregion.id',$code_r);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
        $result1 = $query->result();
    }
    return $result1;
    }

    public function identify_rc($id=null)
    {
        return $this->db->select("*")   
            ->from($this->regions)  
            ->where('id',$id)
            ->get()
            ->row();
    }

    public function identify_pc($id=null)
    {
        return $this->db->select("*")   
            ->from($this->regions)  
            ->where('id',$id)
            ->get()
            ->row();
    }

     public function identify_mc2($id=null)
    {
        return $this->db->select("*")   
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')
            ->from($this->provinces)  
            ->where('id_p',$id)
            ->get()
            ->row();
    }

     public function identify_bc2($id=null)
    {
        return $this->db->select("*")
            ->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left') 
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')
            ->from($this->municipalities)  
            ->where('id_m',$id)
            ->get()
            ->row();
    }

    public function identify_muncode($id=null)
    {
        return $this->db->select("*") 
            ->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left')
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')      
            ->from($this->municipalities)  
            ->where('provinceid',$id)
            ->get()
            ->row();
    }

     public function getProvince($id=null)
    {
        return $this->db->select("*")   
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')        
            ->from($this->provinces)  
            ->where('id_p',$id)
            ->get()
            ->row();
    }


    public function identify_pc_in_barangay($rc=null,$id=null)
    {
        $pc = $this->input->get('pc');
        return $this->db->select("*")           
            ->from($this->provinces)  
            ->where('id_p',$pc)
            ->get()
            ->row();
    }

    public function getMunicipality($id=null)
    {
        return $this->db->select("*")   
            ->join('tbllocprovince', 'tbllocmunicipality.provinceid = tbllocprovince.id_p','left')
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')            
            ->from($this->municipalities)  
            ->where('id_m',$id)
            ->get()
            ->row();
    }

    public function getBarangay($id=null)
    {
        return $this->db->select("*")
            ->join('tbllocmunicipality', 'tbllocbarangay.municipalid = tbllocmunicipality.id_m','left')   
            ->join('tbllocprovince','tbllocmunicipality.provinceid = tbllocprovince.id_p','left')
            ->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left')
            ->from($this->barangay)  
            ->where('id_b',$id)
            ->get()
            ->row();
    }

    public function identify_mc()
    {
       
        $mc = $this->input->get('id');
        return $this->db->select("*")           
            ->from($this->municipalities)  
            ->where('id_m',$mc)
            ->get()
            ->row();
    }

    public function identify_mc_in_barangay($rc=null,$id=null,$pc=null)
    {
       
        $mc = $this->input->get('id');
        return $this->db->select("*")           
            ->from($this->municipalities)  
            ->where('id_m',$mc)
            ->get()
            ->row();
    }


    public function province($rc=null)
        {    
        $pc = $this->input->get('rc');
        $result = $this->db->select("*")
            ->from($this->provinces)  
            ->where('regionid',$pc)
            ->get()
            ->result();
        
        if (!empty($result)) {
            foreach ($result as $value) {
                $list[$value->id_p] = strtoupper($value->provinceName); 
            }
            return $list;
        } else {
            return false;
        }       
        }

    public function identify_pc2($rc=null,$id=null)
    {
        $rc = $this->input->get('rc');
        $id = $this->input->get('id');
        return $this->db->select("*")           
            ->from($this->municipalities)  
            ->where('id_m',$id)
            ->get()
            ->row();
    }

    public function create_municipality($data = [])
    {    
        return $this->db->insert($this->municipalities,$data);
    }

    public function update_municipality($data = [])
    {
        return $this->db->where('id_m',$data['id_m'])
        ->update($this->municipalities,$data);     

    } 

    function check_municipalCode($id, $municipalcode) {
        $this->db->where('municipalCode', $municipalcode);
        if($id) {
            $this->db->where_not_in('id_m', $id);
        }
        return $this->db->get('tbllocmunicipality')->num_rows();
    }

    function check_municipalName($id, $municipalname) 
    {
        $pc = $this->input->post('province_id');

        $where = "municipalName='$municipalname' AND provinceid='$pc'";
        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_m', $id,'provinceid',$pc);
        }
        return $this->db->get('tbllocmunicipality')->num_rows();
    }

    public function getAllbarangay($id=null,$rc=null,$pc=null,$mc=null)
    {
    $code_m = $this->input->get('mc');
    $results1 = array();
    $this->db->select("*");
    $this->db->from($this->barangay);    
    $this->db->join('tbllocmunicipality', 'tbllocbarangay.municipalid = tbllocmunicipality.id_m','left');
    $this->db->join('tbllocprovince', 'tbllocmunicipality.provinceid = tbllocprovince.id_p','left');
    $this->db->join('tbllocregion', 'tbllocprovince.regionid = tbllocregion.id','left');
    $this->db->where('municipalid',$code_m);
    $query = $this->db->get();
    if($query->num_rows() > 0) {
        $results1 = $query->result();
    }
    return $results1;
    }

    public function municipal($pc=null)
        {    
        $mc = $this->input->get('pc');
        $result = $this->db->select("*")
            ->from($this->municipalities)  
            ->where('provinceid',$mc)
            ->get()
            ->result();
        
        if (!empty($result)) {
            foreach ($result as $value) {
                $list[$value->id_m] = strtoupper($value->municipalName); 
            }
            return $list;
        } else {
            return false;
        }       
        }

    public function create_barangay($data = [])
    {    
        return $this->db->insert($this->barangay,$data);
    }

    public function update_barangay($data = [])
    {
        return $this->db->where('id_b',$data['id_b'])
        ->update($this->barangay,$data);
    } 

    public function identify_bc($id=null)
    {        
        $id = $this->input->get('id');
        return $this->db->select("*")           
            ->from($this->barangay)           
            ->where('id_b',$id)
            ->get()
            ->row();
    }

    function check_barangayCode($id, $barangaycode) {
        $this->db->where('barangayCode', $barangaycode);
        if($id) {
            $this->db->where_not_in('id_b', $id);
        }
        return $this->db->get('tbllocbarangay')->num_rows();
    }

    function check_barangayName_update($id, $barangayname) {
        $mc = $this->input->post('municipal_id');
        $where = "barangayName='$barangayname' AND municipalid='$mc'";
        $this->db->where($where); 

        if($id) {
            $this->db->where_not_in('id_b', $id, 'municipalid', $mc);
            // $this->db->or_where_not_in('municipalCode', $mc);
        }
        return $this->db->get('tbllocbarangay')->num_rows();
    }

     function check_barangayName_add($id, $barangayname, $municipal_id) {   
        
        $mc = $this->input->post('municipal_id');
        $where = "barangayName='$barangayname' AND municipalid='$mc'";

        $this->db->where($where);       

        if($id) {
            $this->db->where_not_in('id_b',$id);
        }
        return $this->db->get('tbllocbarangay')->num_rows();

    }

}