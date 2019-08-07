<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class barang extends CI_Controller
 {
 	
 	function __construct()
 	{
	    parent::__construct();
	    if (!$this->session->userdata('id_login')) {
	    	redirect(base_url());
	    	# code...
	    }
	    $this->load->model('M_barang');
	    $this->load->model('M_kategori');
	    	// $this->load->library('Widget');
	}
 	public function index()
	{
		$data['page'] = 'barang/index';
		$data['title'] =  'barang';
		$data['js'] = 'barang';
		$data['kategori'] = $this->M_kategori->all()->result();
			
		$this->load->view('template',$data);
		
	}
	public function tampil()
	{ 

		$data['tampil'] = $this->M_barang->all()->result();
		$this->load->view('barang/tampil',$data);
	}
	public function update()
	{
		$post = $this->input->post();
		// print_r($post);die();
		$update = $this->M_barang->update($post['id_barang'],$post);
		if ($update) {
			# code...
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
	}
	public function add()
	{
		$post = $this->input->post();
		// print_r($post);die();
		$jumlah_barang = $this->M_barang->all()->num_rows();
		$jumlah_barang = $jumlah_barang+1;
		// echo $jumlah_barang;die();
		$data = array(
			'kode_barang' => 'P'.$jumlah_barang.rand(0,9),
			'id_kategori' => $post['id_kategori'],
			'id_subkategori' => $post['id_subkategori'],
			'nama_barang' => $post['nama_barang'],
		);
		$insert = $this->M_barang->add($data);
		if ($insert) {
			# code...
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
		
	}
	public function delete($id=null)
	{
		$delete = $this->M_barang->delete($id);
		if ($delete) {
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
	}
	public function by_id($id=null)
	{
		echo json_encode($this->M_barang->by_id($id)->row());
	}
}