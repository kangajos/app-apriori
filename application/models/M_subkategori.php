<?php 

class M_subkategori extends CI_Model{

	Protected $table = 'subkategori';

	public function all()
	{
		return $this->db
		->join('kategori','kategori.id_kategori = subkategori.id_kategori','left')
		->get($this->table);
	}
	public function add($data)
	{
		return 	$this->db->insert($this->table,$data);
	}
	public function delete($id=null)
	{
		return $this->db
				->where('id_subkategori',$id)
				->delete($this->table);
	}
	public function by_id($id=null)
	{
		return $this->db
				->where('id_subkategori',$id)
				->get($this->table);
	}
	public function update($id,$data)
	{
		return $this->db
				->where('id_subkategori',$id)
				->update($this->table,$data);
	}
	public function by_id_kategori($id_kategori)
	{
		return $this->db
				->where('id_kategori',$id_kategori)
				->get($this->table);
	}

}