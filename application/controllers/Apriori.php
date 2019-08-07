<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /**
  * 
  */
 class apriori extends CI_Controller
 {
 	
 	function __construct()
 	{
	    parent::__construct();
	    // if (!$this->session->userdata('id_login')) {
	    // 	redirect(base_url());
	    // 	# code...
	    // }
	    $this->load->model('M_barang');
	    $this->load->model('M_kategori');
	    $this->load->model('M_apriori','Apriori');
	    $this->load->model('M_transaksi');
	    	// $this->load->library('Widget');
	}
 	public function index()
	{
		$data['page'] = 'apriori/index';
		$data['title'] =  'apriori';
		$data['js'] = 'barang';
		$data['kategori'] = $this->M_kategori->all()->result();
			
		$this->load->view('template',$data);
		
	}
	public function proses()
	{ 
		$post = $this->input->post();
		// print_r($post);die();
		// $this->Apriori = new Apriori();
		$all = $this->M_transaksi->all()->result();
		$data = null;
		foreach ($all as $key => $value) {
			# code...
			$by_tanggal = $this->M_transaksi->apriori($value->tanggal)->result();
			$kode_barang = null;
			foreach ($by_tanggal as $k => $v) {
				# code...
				$kode_barang .= " ".$v->kode_barang.',';
			}
			$data .= substr($kode_barang,0,-1)."\n";
		}
		// echo $data;die();	
		$myfile = fopen("dataset.txt", "w") or die("Unable to open file!");
		$txt = substr($data, 0,-1);
		fwrite($myfile, $txt);
		
		fclose($myfile);

		redirect('Apriori/result/'.$post['confiden']);
	}
	public function result($confiden)
	{
		$this->Apriori->setMaxScan(20);       //Scan 2, 3, ...
		$this->Apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
		$this->Apriori->setMinConf($confiden);       //Minimum confidence - Percent 1, 2, ..., 100
		$this->Apriori->setDelimiter(','); 

		/*
		Use Array:
		$dataset   = array();
		1 $dataset[] = array('A', 'B', 'C', 'D'); 
		2 $dataset[] = array('A', 'D', 'C');  
		3 $dataset[] = array('B', 'C'); 
		4 $dataset[] = array('A', 'E', 'C'); 
		$this->Apriori->process($dataset);
		*/
		$this->Apriori->process('dataset.txt');

		//Frequent Itemsets
		// echo '<pre>';
		// // echo '<h1>Frequent Itemsets</h1>';
		// // $this->Apriori->printFreqItemsets();

		// echo '<h3>Frequent Itemsets Array</h3>';
		// print_r($this->Apriori->getFreqItemsets()); 

		//Association Rules
		// echo '<h1>Association Rules</h1>';
		$data['apriori'] = $this->Apriori->printAssociationRules();
		echo "<table border='1' width='100%'>";
		foreach ($this->Apriori->getAssociationRules() as $k => $value) {
			foreach ($value as $key => $val) {
				$produk = $this->M_barang->by_id($key)->row();
				print_r('produk');
			echo "<tr>";
				echo '<td>'.$produk->nama_produk."</td><td>".$val.'</td>';
			echo "</tr>";
			}
			// print_r($value);
		}
		die();
			echo "</table>";
		// echo '<h3>Association Rules Array</h3><pre>';
		// print_r($this->Apriori->getAssociationRules());
		$data['page'] = 'apriori/result';
		$data['title'] =  'apriori';
		$data['js'] = 'barang';
		print_r($data);die();
		$this->load->view('template',$data);

	}




	// public function tanggal_update()
	// {
	// 	# code...
	// 	$transaksi = $this->M_transaksi->all()->result();
	// 	print_r($transaksi);die()
	// 	foreach ($transaksi as $key => $value) {
	// 		$data['tanggal'] = $value->tanggal;
	// 		$this->db
	// 		->where('Kode_transaksi',$value->id)
	// 		->update('detail_transaksi',$data);
	// 		# code...
	// 	}
	// }
}