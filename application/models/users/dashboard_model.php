<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 * 
 */
class dashboard_model extends CI_Model
{
	private $regions = "tbllocregion";
	private $user	=  "tbluser";
        private $location = "tblpamainlocation";
        private $main   = "tblpamain";

	public function region_display($user_region){		 
        return $this->db->select("*")
                        ->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
        		->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->from($this->user)
                        ->where('region',$user_region)
                        ->get()
                        ->row();
	}

        public function paCount($user_region)
        {
        $this->db->select('COUNT(*)');
        $this->db->join('tblpamainlocation','tblpamain.generatedcode = tblpamainlocation.generatedcode','LEFT');
        // $this->db->distinct('region_id');
        $this->db->where('region_id',$user_region);
        $this->db->group_by('tblpamainlocation.generatedcode');
        $query = $this->db->get($this->main);

        return $query->num_rows(); 
        }

}