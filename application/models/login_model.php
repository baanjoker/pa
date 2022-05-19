<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
 
	private $table = "tbluser";
	private $login_logs = "tblloginlog";

	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('email',$data['email'])
			->where('password',$data['password'])
			// ->where('user_role',$data['user_role'])
			->where('status',1)
			->get();
	}

	public function check_user_disabled($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('email',$data['email'])
			->where('password',$data['password'])
			// ->where('user_role',$data['user_role'])
			->where('status',2)
			->get();
	}

	public function read_by_id($userid = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('user_id',$userid)
			->get()
			->row();
	} 

	public function login_logs($data = [])
    {    
        return $this->db->insert($this->login_logs,$data);
    }

    public function update_logs($data = [])
	{
		return $this->db->where('user_id',$data['user_id'])
		->update($this->table,$data);		

	} 


    public function read_lastlogs($userid = null)
	{
	return $this->db->select("*")
			->from($this->login_logs)
			->where('status','logout')
			->where('account_id',$userid)
			->order_by('id_loginlog','DESC')
			->get()
			->row();
	} 
}