<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class report_main extends CI_Model
{
	private $pamain = 'tblpamain';
	private $member = 'tblpambmember';
	private $location = 'tblpamainlocation';
	private $proclamation = 'tblpamainlegislation';
	private $biological = 'tblpamainbiological';
	private $project = 'tblpamainproject';
	private $image = 'tblpamainimageupload';
	private $attract = 'tblpaattraction';
	private $facility = 'tblpafacility';
	private $activity = 'tblpaecotourism';
	private $income = 'tblpavisitorsrate';
	private $pasu = 'tbluser';
	private $multiplezone = 'tblpamultiplezone';
	private $strictzone = 'tblstrictprotzone';
	private $tribe = 'tblsrpaoregister';
	private $agro = 'tblpaagroforestry';
	private $threats = 'tblpathreat';
	private $reference = 'tblpareference';
    private $fee_new = 'tblpaipaf';

    public function queryboundary($gencode){
    	$query = $this->db->get($this->pamain);
		return $query->result();
    }

    public function data_main($gencode)
    {
		 	$this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','left');
		 	$this->db->join('tblnipsub','tblpamain.nipsub_id = tblnipsub.id_subnip','left');	
		 	$this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','left');
			$this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','left');
			$this->db->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','left');
			$this->db->join('tbliucncode','tblpamain.iucn_id = tbliucncode.id','left');
			$this->db->join('tbldatemonth','tblpamain.pamb_month = tbldatemonth.id_month','left');
			$this->db->join('tbldateyear','tblpamain.pamb_year = tbldateyear.id_year','left');
			$this->db->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query = $this->db->get($this->pamain);
		    return $query->result();
    }

    public function query_apasu($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpaapasuinfo.id_apasu = tblpamain.pasu_id','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpaapasuinfo');
            return $query->result();
    }

    public function cepaactivityreport($gencode)
    {
    	$this->db->join('tbldatemonth','tblpamaincepa_activity_details.activity_month = tbldatemonth.id_month','LEFT');
		$this->db->join('tbldateyear','tblpamaincepa_activity_details.activity_year = tbldateyear.id_year','left');
		// $this->db->join('tblpamaincepa_print_materials','tblpamaincepa_activity_details.cepacode = tblpamaincepa_print_materials.cepa_code','left');
    	$this->db->where('tblpamaincepa_activity_details.generatedcode',$gencode);
    	$query = $this->db->get('tblpamaincepa_activity_details');
    	return $query->result();
    }

    public function cepaprint($cepacode)
    {
    	// $this->db->select('group_concat(cepa_print_details separator "\n ") as printtext');
    	$this->db->join('tblpamaincepa_print_list','tblpamaincepa_print_materials.print_name = tblpamaincepa_print_list.id_cepa_print','LEFT');
    	$this->db->where('cepa_code',$cepacode);
    	$query = $this->db->get('tblpamaincepa_print_materials');
    	return $query->result();
    }

    public function cepamultimedia($cepacode)
    {
    	$this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_multimedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT');
    	$this->db->where('cepa_code',$cepacode);
    	$query = $this->db->get('tblpamaincepa_multimedia_materials');
    	return $query->result();
    }

    public function cepasocialmedia($cepacode)
    {
    	$this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_socialmedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT');
    	$this->db->where('cepa_code',$cepacode);
    	$query = $this->db->get('tblpamaincepa_socialmedia_materials');
    	return $query->result();
    }

    public function cepabroadcast($cepacode)
    {
    	$this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_radiostation.radiostation = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT');
    	$this->db->where('cepa_code',$cepacode);
    	$query = $this->db->get('tblpamaincepa_radiostation');
    	return $query->result();
    }

    public function cepasouvenir($cepacode)
    {
    	$this->db->join('tblpamaincepa_souvenir_list','tblpamaincepa_souvenir.souveniritem = tblpamaincepa_souvenir_list.id_cepa_souvenir','LEFT');
    	$this->db->where('cepa_code',$cepacode);
    	$query = $this->db->get('tblpamaincepa_souvenir');
    	return $query->result();
    }

    public function cepaprintlist()
    {
    	$query = $this->db->get('tblpamaincepa_print_list');
    	return $query->result();
    }

    public function query_pasu($gencode)
    {
			$this->db->join('tblpamain','tbluser.user_id = tblpamain.pasu_id','left');
			$this->db->where('tblpamain.generatedcode',$gencode)
			->group_by('user_id');
			$query= $this->db->get($this->pasu);
		    return $query->result();
	}

	public function get_cepa_activity_img($cepacode){
        $this->db->from('tblpamaincepa_activity_img');
        $this->db->where('cepacode',$cepacode);
        $res = $this->db->get();
        return $res->result();
    }
}