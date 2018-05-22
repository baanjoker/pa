<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class waterfowl_model extends CI_Model
{
	private $water = 'tblwaterfowl';
	private $species = 'tblwaterfowlspecies';
	
	public function regionlist()
    {
        $result = $this->db->select("*")
        ->from('tbllocregion')
        ->get()
        ->result();
        $list[''] = "Select Region";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id] = $value->regionName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function dateyear()
    {
        $result = $this->db->select("*")
        ->from('tbldateyear')
        ->get()
        ->result();
        $list[''] = "Select Year";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_year] = $value->year;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function datemonth()
    {
        $result = $this->db->select("*")
        ->from('tbldatemonth')
        ->get()
        ->result();
        $list[''] = "Select Month";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_month] = $value->month;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function speciesList()
    {
        $result = $this->db->select("*")
        ->from('tblwspeciesgenus')
        ->order_by('scientificName_genus','ASC')
        ->get()
        ->result();
        $list[''] = "Select Species";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_genus] = $value->scientificName_genus;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function createspecies($data = [])
    {    
        return $this->db->insert($this->species,$data);

    }

    public function getAllspecies($codegens){

        // $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        $this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus');
        $this->db->where('randomcode',$codegens);
        $query1 = $this->db->get($this->species);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function gtotal($codegens)
	{
		// return $this->db->query('
		// 	SELECT SUM(total) AS gtotal
		// 	FROM tblwaterfowlspecies
		// ')
		// ->row();
	$this->db->select_sum('total','gtotal');
    $this->db->from('tblwaterfowlspecies');
    $this->db->where('randomcode',$codegens);;
    $query = $this->db->get();
    return $query->result();
	}

	public function createwf($data = [])
    {    
        return $this->db->insert($this->water,$data);

    }

    public function updatewf($data = [])
    {
        return $this->db->where('id_wf',$data['id_wf'])
        ->update($this->water,$data);       

    } 

    function check_Name($id = '',$genus_id,$gencode) {
        $idpa = $this->input->post('gencode');
        $where = "species_id='$genus_id' and randomcode='$idpa'";
        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_wfspecies',$id,'randomcode',$idpa);
        }
        return $this->db->get('tblwaterfowlspecies')->num_rows();
    }

    public function getAllData($id_wf=null)
    {
        return $this->db->select("*")
                        ->from($this->water)
                        ->join('tblwetland','tblwaterfowl.wetlandid = tblwetland.id_wetland','LEFT')
                        ->where('id_wf',$id_wf)
                        ->get()
                        ->row();
    }

    public function prov_list($id_wf = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwaterfowl','tbllocprovince.regionid = tblwaterfowl.regionid','left');
        $this->db->from('tbllocprovince');
        $this->db->where('id_wf',$id_wf);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Province';
                    $result[$row->id_p]= strtoupper($row->provinceName);
                }
         
                return $result;
            }

    public function wetland_list($id_wf = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwaterfowl','tblwetland.provinceid = tblwaterfowl.provinceid','left');
        $this->db->from('tblwetland');
        $this->db->where('id_wf',$id_wf);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Wetland';
                    $result[$row->id_wetland]= strtoupper($row->wetlandname);
                }
         
                return $result;
            }

    function check_Wetlands($id = '',$wetlandid) {
        $where = "wetlandid='$wetlandid'";
        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_wf',$id);
        }
        return $this->db->get('tblwaterfowl')->num_rows();
    }
}