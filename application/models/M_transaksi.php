<?php 

class M_transaksi extends CI_Model{


	
  Protected $table = 'transaksi';
  Protected $table2 = 'detail_transaksi';

  public function all()
  {
    return $this->db
    ->select('tanggal')
    ->limit(30)
    ->get($this->table);
  }
  public function apriori($tanggal)
  {
    return $this->db
    ->select('kode_barang')
    // ->join('detail_transaksi','detail_transaksi.Kode_transaksi=transaksi.id')
    ->where('tanggal',$tanggal)
    ->get($this->table2);
  }
  public function add($data)
  {
    return  $this->db->insert($this->table,$data);
  }
  public function delete($id=null)
  {
    return $this->db
        ->where('id_transaksi',$id)
        ->delete($this->table);
  }
  public function by_id($id=null)
  {
    return $this->db
        ->where('id_transaksi',$id)
        ->get($this->table);
  }
  public function update($id,$data)
  {
    return $this->db
        ->where('id_transaksi',$id)
        ->update($this->table,$data);
  }

}