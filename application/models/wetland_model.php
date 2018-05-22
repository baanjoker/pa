<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class wetland_model extends CI_Model
{
	private $wetland = 'tblwetland';

	public function wetlandtypeList()
    {
        $result = $this->db->select("*")
        ->from('tblwetlandtype')
        ->get()
        ->result();
        $list[''] = "Select Wetland Type";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_wtype] = $value->wtypedesc;
            }
            return $list;
        } else {
            return false;
        }
    }

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

    public function create($data = [])
    {    
        return $this->db->insert($this->wetland,$data);

    }

    public function update($data = [])
    {
        return $this->db->where('id_wetland',$data['id_wetland'])
        ->update($this->wetland,$data);       

    } 

    public function getData($id_wetland=null)
    {
        return $this->db->select("*")           
            ->from($this->wetland)
            ->where('id_wetland',$id_wetland)
            ->get()
            ->row();
    }

    public function wldesc($id_wetland = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwetland','tblwetlanddesc.wtype_id = tblwetland.wltypeid','left');
        $this->db->from('tblwetlanddesc');
        $this->db->where('id_wetland',$id_wetland);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Wetland description';
                    $result[$row->id_wdesc]= strtoupper($row->wdescdesc);
                }
         
                return $result;
            }

    public function prov_list($id_wetland = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwetland','tbllocprovince.regionid = tblwetland.regionid','left');
        $this->db->from('tbllocprovince');
        $this->db->where('id_wetland',$id_wetland);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Province';
                    $result[$row->id_p]= strtoupper($row->provinceName);
                }
         
                return $result;
            }

    public function mun_list($id_wetland = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwetland','tbllocmunicipality.provinceid = tblwetland.provinceid','left');
        $this->db->from('tbllocmunicipality');
        $this->db->where('id_wetland',$id_wetland);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Municipality';
                    $result[$row->id_m]= strtoupper($row->municipalName);
                }
         
                return $result;
            }
	
    public function bar_list($id_wetland = null)
    {
        $result = array();
        $this->db->select('*');
        $this->db->join('tblwetland','tbllocbarangay.municipalid = tblwetland.municipalid','left');
        $this->db->from('tbllocbarangay');
        $this->db->where('id_wetland',$id_wetland);
        $array_keys_values = $this->db->get();
                foreach ($array_keys_values->result() as $row)
                {
                    $result[0]= 'Select Municipality';
                    $result[$row->id_b]= strtoupper($row->barangayName);
                }
         
                return $result;
            }

    function check_name($id = '', $wetlandname) {
        $this->db->where('wetlandname', $wetlandname);
        if($id) {
            $this->db->where_not_in('id_wetland', $id);
        }
        return $this->db->get($this->wetland)->num_rows();
    }
}