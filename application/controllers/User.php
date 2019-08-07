<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class user extends CI_Controller
 {
 	
 	function __construct()
 	{
	    parent::__construct();
	    if (!$this->session->userdata('id_login')) {
	    	redirect(base_url());
	    	# code...
	    }
	    $this->load->model('M_user');
	    	// $this->load->library('Widget');
	}
 	public function index()
	{
		$data['page'] = 'user/index';
		$data['title'] =  'user';
		$data['js'] = 'user';
			
		$this->load->view('template',$data);
		
	}
	public function tampil()
	{ 
		echo json_encode($this->M_user->all()->result());
	}
	public function update()
	{
		$post = $this->input->post();
		// print_r($post);die();
		$update = $this->M_user->update($post['id_user'],$post);
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
		$password = 'admin';
		// echo $password;die();78u
		// print_r($post);die();
		$password_hash  = array('password' => password_hash('admin', PASSWORD_DEFAULT), );
		$data = array_merge($post,$password_hash);
		// print_r($data);die();
		$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'mail.myskripsi.id',
			    'smtp_port' => 465,
			    'smtp_user' => 'info@myskripsi.id',
			    'smtp_pass' => '@myskripsi!',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1',			    
	               'crlf'      => "\r\n",
	               'newline'   => "\r\n"
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");


			$this->email->from('saefulyaditedi@gmail.com', 'Admin Tedi Saefulyadi');
			$this->email->to($post['email']);

			$this->email->subject('Password');
			$this->email->message('trimakasih telah melakukan registrasi password adna adalah :'.$password);

			$this->email->send();
			var_dump($this->email->print_debugger());die();
		$input = $this->M_user->add($data);
		if ($input) {
			# code...
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}

	}
	public function delete($id=null)
	{
		$delete = $this->M_user->delete($id);
		if ($delete) {
			echo json_encode($arrayName = array('status' => 'sukses', ));
		}else{

			echo json_encode($arrayName = array('status' => 'gagal', ));
		}
	}
	public function by_id($id=null)
	{
		echo json_encode($this->M_user->by_id($id)->row());
	}
	public function cek_emali()
	{
		$post = $this->input->post();
		// print_r($post);die();
		
		// $check = $this->M_user->login($post['username'])->row();
		$this->form_validation->set_rules('email', 'E-mail;', 'required|is_unique[user.email]|valid_email',
                        array(
                        	'is_unique' => 'E-mail Sudah Ada',
                        	'valid_email' => 'E-mail Salah',
                        )
                );
		if ($this->form_validation->run() == FALSE)
		{
			echo '<div style="color:red;">'.validation_errors().'</div>';
		}else{
			echo '<div style="color:green;">E-mail Valid</div>';
		}
	}
	
 }