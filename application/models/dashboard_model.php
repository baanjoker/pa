<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class dashboard_model extends CI_Model
{
	private $table = "tbluser";
	private $blood = "tblbloodtype";

	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
			->join('tblsex','tbluser.sex = tblsex.id','LEFT')
			->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
			->from($this->table)
			->where('user_id',$user_id)
			->get()
			->row();
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
        return $this->db->insert($this->table,$data);

    }

    public function update($data = [])
    {
        return $this->db->where('user_id',$data['user_id'])
        ->update($this->table,$data);       

    } 

    public function get_by_map() 
    { 
        return $this->db->select('*')
                        // ->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')
                        // ->group_by('tblpamain.cpabi_id')
                        ->get('tbllocregion')->result(); 
    } 

   
}