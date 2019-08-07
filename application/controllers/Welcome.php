<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
 	{
	    parent::__construct();

	    $this->load->model('M_user');
	    	// $this->load->library('Widget');
	}
	public function index()
	{
		if (!$this->session->userdata('id_login')) {
			# code...
		$this->load->view('login');
		}else{

		$data['page'] = 'dashboard';
		$this->load->view('template',$data);
	
		}
	}
	public function login()
	{
		$post = $this->input->post();
		// echo password_hash("admin", PASSWORD_DEFAULT);
		// die();
		// print_r($post);die();
	
		$check = $this->M_user->login($post['username'])->row();
		if (empty($check)) {
			$this->session->set_flashdata('msg','<script>swal("OOPS!", "Username Salah", "failed");</script>');
			redirect(base_url());
			# code...
		}
		// print_r($check);die();
		if(password_verify($post["password"], $check->password) === TRUE){
			// echo "benar";die;
			$this->session->set_userdata('id_login',$check->id_user);
			$this->session->set_userdata('nama_lengkap',$check->nama_lengkap);
			$this->session->set_userdata('hak_akses',$check->hak_akses);
			if ($check->hak_akses==2) {
				# code...				
			$this->session->set_userdata('fakultas',$check->fakultas);
			}
			redirect(base_url());
		}
		else{
			// echo "Salah";die();

			$this->session->set_flashdata('msg','<script>swal("OOPS!", "Username Atau Password Salah", "failed");</script>');
			redirect(base_url());
		}

		if (empty($check)) {
			$this->session->set_flashdata('msg','<script>swal("OOPS!", "Username Atau Password Salah", "failed");</script>');
			redirect(base_url());
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
