<?php defined('BASEPATH') or exit ('No direct script access allowed!');

/**
 * 
 */
class User_model extends CI_Model
{
	private $user = "tbluser";
	private $blood = "tblbloodtype";

	public function getAllUser()
	{
		return $this->db
                ->join('tblpamain','tbluser.user_id = tblpamain.pasu_id','LEFT')
	            ->from($this->user)
                ->order_by('pa_name')
	            ->get()
	            ->result();
	}

	public function fetchAllUser($id=null)
	{
		return $this->db->select("*")
	            ->from($this->user)
	            ->where('user_id',$id)
	            ->get()
	            ->row();
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

    public function provList($userreg=null)
    {
        $result = $this->db->select("*")
            ->from('tbllocprovince')
			->join('tbluser', 'tbllocprovince.regionid = tbluser.region','left')            
            ->where('user_id',$userreg)
            ->get()
            ->result();

            $list[''] = "SELECT PROVINCE";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_p] = $value->provinceName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function munList($userreg=null)
    {
        $result = $this->db->select("*")
            ->from('tbllocmunicipality')
			->join('tbluser', 'tbllocmunicipality.provinceid = tbluser.province','left')            
            ->where('user_id',$userreg)
            ->get()
            ->result();

            $list[''] = "SELECT MUNICIPALITY";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_m] = $value->municipalName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function blood_list()
    {
        $result = $this->db->select("*")
            ->from($this->blood)
            ->get()
            ->result();

            $list[''] = "Select Blood";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_blood] = strtoupper($value->symbol);
            }
            return $list;
        } else {
            return false;
        }
            
    }

    public function create($data = [])
    {    
        return $this->db->insert($this->user,$data);
    }

    public function update($data = [])
    {
        return $this->db->where('user_id',$data['user_id'])
        ->update($this->user,$data);       

    } 
}
?>