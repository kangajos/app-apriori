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
  public function betwen($start,$end)
  {
    return $this->db
    ->query("SELECT * FROM detail_transaksi  WHERE tanggal BETWEEN '$start' AND '$end'");
    // ->where('tanggal >=',$start)
    // ->where('tanggal <=',$end)
    // ->get($this->table2); 
  }
  public function apriori($tanggal)
  {
    return $this->db
    ->select('kategori')
    ->join('produk','produk.id_produk=detail_transaksi.kode_barang')
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