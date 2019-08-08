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
		$all = $this->M_transaksi->betwen($post['start'],$post['end'])->result();
		// echo '<pre>';
		// print_r($all);die();
		$data = null;
		foreach ($all as $key => $value) {
			# code...
			$by_tanggal = $this->M_transaksi->apriori($value->tanggal)->result();

			$kategori = null;
			foreach ($by_tanggal as $k => $v) {
				# code...
				$kategori .= " ".$v->kategori.',';
			}
			$data .= substr($kategori,0,-1)."\n";
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
		// error_reporting(0);
		$this->Apriori->setMaxScan(20);       //Scan 2, 3, ...
		$this->Apriori->setMinSup(6);         //Minimum support 1, 2, 3, ...
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

		// Frequent Itemsets
		// echo '<pre>';
		// echo '<h1>Frequent Itemsets</h1>';
		// $this->Apriori->printFreqItemsets();

		// echo '<h3>Frequent Itemsets Array</h3>';
		// print_r($this->Apriori->getFreqItemsets()); 

		// Association Rules
		// echo '<h1>Association Rules</h1>';
		// $data['apriori'] = $this->Apriori->printAssociationRules();


		// print_r($data['apriori']);







		$table1 = "<table class='table table-bordered' id='example1'>";
		$table1 .= "<thead><tr>";
		$table1 .= "<th>Jika Beli</th><th>Nama Produk</th><th>Maka Beli</th><th>Nama Produk</th><th>Confident</th>";
		$table1 .= "</thead></tr><tbody>";
		$table = "";
		// echo "<pre>";
		// print_r($this->Apriori->getAssociationRules());
		// die();
		foreach ($this->Apriori->getAssociationRules() as $k => $value) {
			foreach ($value as $key => $val) {
				
				$produk_utama = explode(',', $k);
				$jika_beli = "";
				foreach ($produk_utama as $kode_produk_utama) {
					$nm_produk = $this->M_kategori->by_id($kode_produk_utama)->row();
					$jika_beli .= $nm_produk->nama_kategori.", ";
				}

				// echo "$k => $key = $val<br>";
				$produk_relasi = explode(',', $key);
				$maka_beli = "";
				foreach ($produk_relasi as $kode_produk) {
				$sub_nm_produk = $this->M_kategori->by_id($kode_produk)->row();
				$maka_beli .= $sub_nm_produk->nama_kategori.", ";
				}

				// print_r(explode(',', $key));
			// 	echo $key;
			// echo "<br>";
			$table .=
			"<tr>
				<td>Jika Beli</td>
				<td>".$jika_beli."</td>
				<td>Maka Beli</td>
				<td>".$maka_beli."</td>
				<td>".$val."%</td>
			</tr>";
			}
			// print_r($value);
		}
		// die();
			$table2 = "</tbody></table>";
			$joinTable = $table1.$table.$table2;
			// echo $joinTable;
		// echo '<h3>Association Rules Array</h3><pre>';
		// print_r($this->Apriori->getAssociationRules());
		$data['page'] = 'apriori/result';
		$data['title'] =  'apriori';
		$data['js'] = 'barang';
		$data['table'] = $joinTable;
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