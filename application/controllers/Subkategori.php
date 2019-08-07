<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class subkategori extends CI_Controller
 {
 	
 	function __construct()
 	{
	    parent::__construct();
	    if (!$this->session->userdata('id_login')) {
	    	redirect(base_url());
	    	# code...
	    }
	    $this->load->model('M_subkategori');
	    $this->load->model('M_kategori');
	}
 	public function index()
	{
		$data['page'] = 'subkategori/index';
		$data['title'] =  'subkategori';
		$data['js'] = 'subkategori';
		$data['kategori'] = $this->M_kategori->all()->result();
			
		$this->load->view('template',$data);
		
	}
	public function tampil()
	{ 

		$data['tampil'] = $this->M_subkategori->all()->result();
		$this->load->view('subkategori/tampil',$data);
	}
	public function update()
	{
		$post = $this->input->post();
		// print_r($post);die();
		$update = $this->M_subkategori->update($post['id_subkategori'],$post);
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
		$jumlah_subkategori = $this->M_subkategori->all()->num_rows();
		$jumlah_subkategori = $jumlah_subkategori+1;
		// echo $jumlah_subkategori;die();
		$data = array(
			'id_subkategori' => 'SK'.$jumlah_subkategori.rand(0,9),
			'id_kategori' => $post['id_kategori'],
			'nama_subkategori' => $post['nama_subkategori'],
		);
		$insert = $this->M_subkategori->add($data);
		if ($insert) {
			# code...
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
		
	}
	public function delete($id=null)
	{
		$delete = $this->M_subkategori->delete($id);
		if ($delete) {
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
	}
	public function by_id($id=null)
	{
		echo json_encode($this->M_subkategori->by_id($id)->row());
	}
	public function option($id_kategori)
	{
		echo json_encode($this->M_subkategori->by_id_kategori($id_kategori)->result());
		// echo json_encode($subkategori);
	}
}