<?php 

class M_user extends CI_Model{

	protected $table = 'user';

	public function login($username)
	{
		return $this->db
		->where('email',$username)
		->get('user');
	}
	public function partner()
	{
		return $this->db
		->where('hak_akses',3)
		->get($this->table);
	}
	public function all()
	{
		return $this->db
		->get($this->table);
	}
	public function add($data)
	{
		return $this->db
		->insert($this->table,$data);
	}
	public function delete($id)
	{
		return $this->db
		->where('id_user',$id)
		->delete($this->table);
	}

}