<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class kategori extends CI_Controller
 {
 	
 	function __construct()
 	{
	    parent::__construct();
	    if (!$this->session->userdata('id_login')) {
	    	redirect(base_url());
	    	# code...
	    }
	    $this->load->model('M_kategori');
	    	// $this->load->library('Widget');
	}
 	public function index()
	{
		$data['page'] = 'kategori/index';
		$data['title'] =  'kategori';
		$data['js'] = 'kategori';
			
		$this->load->view('template',$data);
		
	}
	public function tampil()
	{ 

		$data['tampil'] = $this->M_kategori->all()->result();
		// print_r($data);
		$this->load->view('kategori/tampil',$data);
	}
	public function update()
	{
		$post = $this->input->post();
		// print_r($post);die();
		$update = $this->M_kategori->update($post['id_kategori'],$post);
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
		$jumlah_kategori = $this->M_kategori->all()->num_rows();
		$jumlah_kategori = $jumlah_kategori+1;
		// echo $jumlah_kategori;die();
		$data = array(
			'id_kategori' => 'K'.$jumlah_kategori.rand(0,9),
			'nama_kategori' => $post['nama_kategori'],
		);
		$insert = $this->M_kategori->add($data);
		if ($insert) {
			# code...
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
		
	}
	public function delete($id=null)
	{
		$delete = $this->M_kategori->delete($id);
		if ($delete) {
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
	}
	public function by_id($id=null)
	{
		echo json_encode($this->M_kategori->by_id($id)->row());
	}
}