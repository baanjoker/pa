<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cave_model extends CI_Model {
 
	private $tablecave = "tblcaves";
	private $tblprov = "tbllocprovince";
	private $tblmun = "tbllocmunicipality";
	private $tblbar = "tbllocbarangay";

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

	public function prov_list($id_cave = null)
	{
		$result = array();
		$this->db->select('*');
		$this->db->join('tblcaves','tbllocprovince.regionid = tblcaves.regionCode','left');
		$this->db->from('tbllocprovince');
		$this->db->where('id_cave',$id_cave);
		$array_keys_values = $this->db->get();
		        foreach ($array_keys_values->result() as $row)
		        {
		            $result[0]= 'SELECT PROVINCE';
		            $result[$row->id_p]= strtoupper($row->provinceName);
		        }
		 
		        return $result;
			}

	public function mun_list($id_cave = null)
	{
		$result = array();
		$this->db->select('*');
		$this->db->join('tblcaves','tbllocmunicipality.provinceid = tblcaves.provinceCode','left');
		$this->db->from('tbllocmunicipality');
		$this->db->where('id_cave',$id_cave);
		$array_keys_values = $this->db->get();
		        foreach ($array_keys_values->result() as $row)
		        {
		            $result[0]= 'SELECT MUNICIPALITY';
		            $result[$row->id_m]= strtoupper($row->municipalName);
		        }
		 
		        return $result;
			}

	public function bar_list($id_cave = null)
	{
		$result = array();
		$this->db->select('*');
		$this->db->join('tblcaves','tbllocbarangay.municipalid = tblcaves.municipalCode','left');
		$this->db->from('tbllocbarangay');
		$this->db->where('id_cave',$id_cave);
		$array_keys_values = $this->db->get();
		        foreach ($array_keys_values->result() as $row)
		        {
		            $result[0]= 'SELECT BARANGAY';
		            $result[$row->id_b]= strtoupper($row->barangayName);
		        }
		 
		        return $result;
			}

	public function create($data = [])
	{	 
		return $this->db->insert($this->tablecave,$data);

	}

	public function update($data = [])
	{
		return $this->db->where('id_cave',$data['id_cave'])
		->update($this->tablecave,$data);		

	} 

	public function delete($id = null)
	{
		$this->db->where('id_cave',$id)
			->delete($this->tablecave);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

	public function count_cave()
	{
		return $this->db->query('
			SELECT COUNT(*) AS total
			FROM tblcaves
		')
		->row();
	}

	public function count_family()
	{
		return $this->db->query('
			SELECT COUNT(*) AS total
			FROM tblwspeciesgenus
		')
		->row();
	}

	public function count_pamain()
	{
		return $this->db->query('
			SELECT COUNT(*) AS total
			FROM tblpamain
		')
		->row();
	}

	public function caveData()
	{
		return $this->db->select("*")
	            ->from($this->tablecave) 
	            ->join('tbllocregion', 'tblcaves.regionCode = tbllocregion.id','left')
	            ->join('tbllocprovince', 'tblcaves.provinceCode = tbllocprovince.id_p','left')
	            ->join('tbllocmunicipality', 'tblcaves.municipalCode = tbllocmunicipality.id_m','left')
	            ->join('tbllocbarangay', 'tblcaves.barangayCode = tbllocbarangay.id_b','left')
	            ->get()
	            ->result();
	}

	public function identify_id($id_cave=null)
	{
		return $this->db->select("*")			
			->from($this->tablecave)
			->where('id_cave',$id_cave)
			->get()
			->row();
	}

	// public function province_list($id_cave=null)
	//  	{ 	 
	//  	// $id_cave =$this->uri->segment(4);
	//  	$result = $this->db->select("*")
	// 		->from($this->tablecave)	
	// 		->join('tbllocprovince', 'tblcaves.provinceCode = tbllocprovince.provinceCode','left')
	// 		->where('id_cave',$id_cave)
	// 		->get()
	// 		->result();
		
	// 	if (!empty($result)) {
	// 		foreach ($result as $value) {
	// 			$list[$value->id_p] = strtoupper($value->provinceName); 
	// 		}
	// 		return $list;
	// 	} else {
	// 		return false;
	// 	}		
	//  	}

	// public function province($region=null)
	//  	{ 	 	
	 	
	//  	$result = $this->db->select("*")
	// 		->from($this->tblprov)	
	// 		->join('tblcaves', 'tbllocprovince.provinceCode = tblcaves.provinceCode','left')
	// 		->where('regionid',$region)
	// 		->get()
	// 		->result();
		
	// 		if (!empty($result)) {
	// 			foreach ($result as $value) {
	// 				$list[$value->id_p] = strtoupper($value->provinceName); 
	// 			}
	// 			return $list;
	// 		} else {
	// 			return false;
	// 		}

	//  	}

	//  	public function municipal_list()
	//  	{ 	 
	//  	$id_cave =$this->uri->segment(4);
	//  	$result = $this->db->select("*")
	// 		->from($this->tablecave)	
	// 		->join('tbllocmunicipality', 'tblcaves.municipalCode = tbllocmunicipality.municipalCode','left')
	// 		->where('id_cave',$id_cave)
	// 		->get()
	// 		->result();
		
	// 	if (!empty($result)) {
	// 		foreach ($result as $value) {
	// 			$list[$value->id_m] = strtoupper($value->municipalName); 
	// 		}
	// 		return $list;
	// 	} else {
	// 		return false;
	// 	}		
	//  	}

	//  	public function municipal($pc=null)
	//  	{ 	 
	//  	$code_p = $this->input->get('pc');
	//  	$result = $this->db->select("*")
	// 		->from($this->tblmun)	
	// 		->where('provinceid',$code_p)
	// 		->get()
	// 		->result();
		
	// 	if (!empty($result)) {
	// 		foreach ($result as $value) {
	// 			$list[$value->id_m] = strtoupper($value->municipalName); 
	// 		}
	// 		return $list;
	// 	} else {
	// 		return false;
	// 	}		
	//  	}

	//  	public function barangay_list()
	//  	{ 	 
	//  	$id_cave =$this->uri->segment(4);
	//  	$result = $this->db->select("*")
	// 		->from($this->tablecave)	
	// 		->join('tbllocbarangay', 'tblcaves.barangayCode = tbllocbarangay.barangayCode','left')
	// 		->where('id_cave',$id_cave)
	// 		->get()
	// 		->result();
		
	// 	if (!empty($result)) {
	// 		foreach ($result as $value) {
	// 			$list[$value->id_b] = strtoupper($value->barangayName); 
	// 		}
	// 		return $list;
	// 	} else {
	// 		return false;
	// 	}		
	//  	}

	//  	public function barangay($mc=null)
	//  	{ 	 
	//  	$code_b = $this->input->get('mc');
	//  	$result = $this->db->select("*")
	// 		->from($this->tblbar)	
	// 		->where('municipalid',$code_b)
	// 		->get()
	// 		->result();
		
	// 	if (!empty($result)) {
	// 		foreach ($result as $value) {
	// 			$list[$value->id_b] = strtoupper($value->barangayName); 
	// 		}
	// 		return $list;
	// 	} else {
	// 		return false;
	// 	}		
	//  	}
	
	function check_caveName($id_cave = '', $cave_name) {
        $this->db->where('cave_name', $cave_name);
        if($id_cave) {
            $this->db->where_not_in('id_cave', $id_cave);
        }
        return $this->db->get('tblcaves')->num_rows();
    }
}