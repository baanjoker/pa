<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
 
	private $table = "ws_setting";
	private $setting = "tblwsettings";
	private $slide	= "tblwslides";
	private $project= "tblwprojects";
	private $advisory= "tbladvisory";

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 	
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->limit(1)
			->get()
			->row();
	} 
	
  	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 

	public function setting()
	{
		return $this->db->select("*")
			->from('ws_setting')
			->where('status',1) 
			->order_by('id','asc')
			->limit(1)
			->get()
			->row();
	} 

	public function wsliderload()
	{
		return $this->db->select('*')
            ->from('tblwslides')           
            ->get()
            ->result();		
	}

	public function about()
	{
		return $this->db->select('*')
            ->from('tbl_web_about')
            ->where('status',1)
            ->order_by('id_about','asc')
            ->get()
            ->result();
	}

	public function webSetting()
	{
		return $this->db->select("*")
			->from($this->setting)
			->limit(1)
			->get()
			->row();
	} 

	public function webslide()
	{
		 $this->db->where('status',1);
		 $this->db->order_by('id','desc');
		 $this->db->limit(5);
        $query = $this->db->get($this->slide);
        return $query->result();
	} 

	public function getData($id=null)
    {
        return $this->db->select("*")           
            ->from($this->slide)
            ->where('id',$id)
            ->get()
            ->row();
    }

    public function getNews($id=null)
    {
        return $this->db->select("*")           
            ->from($this->advisory)
            ->where('id_advisory',$id)
            // ->where('advisory_status','1')            
            ->get()
            ->row();
    }

    public function loadNews()
    {
        // $this->db->where('advisory_status',1);
        $query = $this->db->get($this->advisory);
        return $query->result();
    }

	public function webproject()
	{
		 $this->db->where('status',1);
        $query = $this->db->get($this->project);
        return $query->result();
	} 

	public function createWeb($data = [])
	{	 
		return $this->db->insert($this->setting,$data);
	}

	public function updateWeb($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->setting,$data); 
	} 

	public function insertfile($data = []){
		return $this->db->insert('tblwslides',$data);
	}

	public function updatefile($data = [])
    {
        return $this->db->where('id',$data['id'])
        ->update('tblwslides',$data);       
    }

    public function insertnews($data = []){
		return $this->db->insert('tbladvisory',$data);
	}

	public function updatenews($data = [])
    {
        return $this->db->where('id_advisory',$data['id_advisory'])
        ->update('tbladvisory',$data);       
    }
}