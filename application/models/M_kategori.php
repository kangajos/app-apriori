<?php 

class M_kategori extends CI_Model{

	Protected $table = 'kategori';

	public function all()
	{
		return $this->db
		->get($this->table);
	}
	public function add($data)
	{
		return 	$this->db->insert($this->table,$data);
	}
	public function delete($id=null)
	{
		return $this->db
				->where('id_kategori',$id)
				->delete($this->table);
	}
	public function by_id($id=null)
	{
		return $this->db
				->where('id_kategori',$id)
				->get($this->table);
	}
	public function update($id,$data)
	{
		return $this->db
				->where('id_kategori',$id)
				->update($this->table,$data);
	}

}