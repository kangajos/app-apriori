<?php 

class M_barang extends CI_Model{


	
  Protected $table = 'produk';

  public function all()
  {
    return $this->db
    ->join('kategori','kategori.id_kategori=produk.id_kategori','left')
    ->join('subkategori','subkategori.id_subkategori=produk.id_subkategori','left')
    ->get($this->table);
  }
  public function add($data)
  {
    return  $this->db->insert($this->table,$data);
  }
  public function delete($id=null)
  {
    return $this->db
        ->where('id_produk',$id)
        ->delete($this->table);
  }
  public function by_id($id=null)
  {
    return $this->db
        ->where('id_produk',$id)
        ->get($this->table);
  }
  public function update($id,$data)
  {
    return $this->db
        ->where('id_produk',$id)
        ->update($this->table,$data);
  }

}