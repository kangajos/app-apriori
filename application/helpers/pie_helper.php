<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('widget'))
{
    function widget()
    {
       $data = array('contoh'=>'Contoh Label');
       return $data;
    }
    function contoh_label(){
		    return "Contoh menampilan label";
		  }


		  function pie_form(){
		    //prefix nama input sama dengan nama widget
		?>  
		    <label class="section-title">Contoh Form Inputan Widget</label>
		    <p class="mg-b-20 mg-sm-b-40">Tampilkan tabel dari URL yang disediakan.</p>    

		    <div class="row mg-t-20">
		      <label class="col-sm-4 form-control-label"><span class="tx-danger"></span> Data Url:</label>
		      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		        <input name="contoh_url" type="text" class="form-control" placeholder="https://">
		      </div>
		    </div>
		    
		    <div class="row mg-t-20">
		      <label class="col-sm-4 form-control-label"><span class="tx-danger"> </span> Field yang Ditampilkan (Pisahkan dengan koma):</label>
		      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		        <input name="contoh_field" type="text" class="form-control" placeholder="field1, field2, field3">
		      </div>
		    </div>

		    <div class="row mg-t-20">
		      <label class="col-sm-4 form-control-label"><span class="tx-danger"></span> Informasi tambahan:</label>
		      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
		        <textarea name="contoh_info" rows="2" class="form-control" placeholder="Informasi Tambahan"></textarea>
		      </div>
		    </div><!-- row -->
		    
		<?php  
		  }
		  
		  
		  function contoh_save($data){
		    
		    //SIAPKAN DATA YANG AKAN DISIMPAN DALAM BENTUK ARRAY
		    $DATA = array();
		    $DATA['url'] = $data['contoh_url'];
		    $DATA['field'] = $data['contoh_field'];
		    $DATA['info'] = $data['contoh_info'];
		    
		    return json_encode($DATA);
		  
		  }
		  
		  
		  
		  
		  function contoh_show($data){

		    //DATA SUDAH DALAM BENTUK ARRAY  
		    //print_r($data);
		      
		    //GUNAKAN UNTUK ID JIKA DIBUTUHKAN. HARUS UNIK!
		    $id = 'contoh' . time();
		    
		    //PROSES DATA DISINI
		    //ambil data dari url gunakan CURL
		    //  $url = 'https://localhost/page';
				//  $param = array(
		    //      'username' => $user,
		    //      'password' => $pass //dst...
				//  );
				//  $DATA = post_curl($url, $param);
		    
		    //ambil data dari database, gunakan:
		    //$db = new Database('localhost', 'dbuser', 'dbpass', 'dbname');
		    //INSERT
		    //  $data['nama_field'] = $value1;
		    //  $data['nama_field2'] = $value2; //dst...
		    //  $DB->insert('nama_table', $data);
		    //  
		    //UPDATE
		    //  $where = array('nama_field'=>$value); //WHERE
		    //  $data['nama_field'] = $value;
		    //  $data['nama_field2'] = $value2; //dst
		    //  $DB->where($where)->update('nama_table', $data);
		    //
		    //SELECT ALL
		    //  $sql = "SELECT * FROM table WHERE nama_field = value";
		    //  $DATA = $DB->query($sql)->fetch(); 
		    //
		    //SELECT FIRST
		    //  $sql = "SELECT * FROM table WHERE nama_field = value";
		    //  $DATA = $DB->query_first($sql)->fetch(); 
		     
		?>
		          <label class="section-title">Data Contoh</label>
		          <p class="mg-b-20 mg-sm-b-40"><?php echo $data['info']; ?></p>
		          
		          
		          <div class="table-responsive">
		            <table id="<?php echo $id; ?>" class="table display responsive nowrap datatables">
		              <thead>
		                <tr>
		                  <th class="wd-15p">First name</th>
		                  <th class="wd-15p">Last name</th>
		                  <th class="wd-20p">Position</th>
		                  <th class="wd-15p">Start date</th>
		                  <th class="wd-10p">Salary</th>
		                  <th class="wd-25p">E-mail</th>
		                </tr>
		              </thead>
		              <tbody>
		              
		              
		              
		              
		                <tr>
		                  <td>Tiger</td>
		                  <td>Nixon</td>
		                  <td>System Architect</td>
		                  <td>2011/04/25</td>
		                  <td>$320,800</td>
		                  <td>t.nixon@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Airi</td>
		                  <td>Satou</td>
		                  <td>Accountant</td>
		                  <td>2008/11/28</td>
		                  <td>$162,700</td>
		                  <td>a.satou@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Brielle</td>
		                  <td>Williamson</td>
		                  <td>Integration Specialist</td>
		                  <td>2012/12/02</td>
		                  <td>$372,000</td>
		                  <td>b.williamson@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Herrod</td>
		                  <td>Chandler</td>
		                  <td>Sales Assistant</td>
		                  <td>2012/08/06</td>
		                  <td>$137,500</td>
		                  <td>h.chandler@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Rhona</td>
		                  <td>Davidson</td>
		                  <td>Integration Specialist</td>
		                  <td>2010/10/14</td>
		                  <td>$327,900</td>
		                  <td>r.davidson@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Colleen</td>
		                  <td>Hurst</td>
		                  <td>Javascript Developer</td>
		                  <td>2009/09/15</td>
		                  <td>$205,500</td>
		                  <td>c.hurst@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Sonya</td>
		                  <td>Frost</td>
		                  <td>Software Engineer</td>
		                  <td>2008/12/13</td>
		                  <td>$103,600</td>
		                  <td>s.frost@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Jena</td>
		                  <td>Gaines</td>
		                  <td>Office Manager</td>
		                  <td>2008/12/19</td>
		                  <td>$90,560</td>
		                  <td>j.gaines@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Quinn</td>
		                  <td>Flynn</td>
		                  <td>Support Lead</td>
		                  <td>2013/03/03</td>
		                  <td>$342,000</td>
		                  <td>q.flynn@datatables.net</td>
		                </tr>
		                <tr>
		                  <td>Charde</td>
		                  <td>Marshall</td>
		                  <td>Regional Director</td>
		                  <td>2008/10/16</td>
		                  <td>$470,600</td>
		                  <td>c.marshall@datatables.net</td>
		                </tr>
		                
		                
		                
		              </tbody>
		            </table>
		          </div><!-- table-wrapper -->

		<?php  



		      //JIKA PERLU MEMANGGIL JAVASCRIPT DI AKHIR PAGE GUNAKAN VARIABEL GLOBAL $JS
		      global $JS;
		      //SELALU TAMBAHKAN INDEX BARU
		      $JS[] = "          
		            $(function() {            
		              $('.datatables').DataTable({
		                responsive: true,
		                language: {
		                  searchPlaceholder: 'cari...',
		                  sSearch: '',
		                  lengthMenu: '_MENU_ items/page',
		                }
		              });                        
		            });
		            ";
		          



		  }   
}