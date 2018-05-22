<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
 
	private $table = "tbluser";

	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where('email',$data['email'])
			->where('password',$data['password'])
			->where('user_role',$data['user_role'])
			->where('status',1)
			->get();
	}

	public function read_by_id($user_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('user_id',$user_id)
			->get()
			->row();
	} 
}