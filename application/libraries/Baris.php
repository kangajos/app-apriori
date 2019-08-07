<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baris {

           public function test()
            {
              echo "INI ADALAH TEST";
            }

            function kolom_1($data){
              if (trim($data['board_content1']) == ''){
                $data1 = false;
              } else {
                $data1 = json_decode($data['board_content1'], true);
              }
            ?>
            <div class="card mg-t-10 sort_item" id="row<?php echo $data['board_id']; ?>" data-post-id="<?php echo $data['board_id']; ?>">
              <div class="card">
                <div class="card-body">
            <?php
              if ($data1 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('widget/add')?>">
                      <input type="hidden" name="col" value="1" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data1['judul']; ?></h5>

            <?php
              $exe = $data1['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data1['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/1');?>" class="card-link">Hapus</a>
                </div>
              </div><!-- card -->
            </div>
            <?php
            }


            function kolom_2($data){
              // print_r($data);die();
              if (trim($data['board_content1']) == ''){
                $data1 = false;
              } else {
                $data1 = json_decode($data['board_content1'], true);
              }

              if (trim($data['board_content2']) == ''){
                $data2 = false;
              } else {
                $data2 = json_decode($data['board_content2'], true);
              }
            ?>
              <div class="row row-xs mg-t-10 sort_item" id="row<?php echo $data['board_id']; ?>" data-post-id="<?php echo $data['board_id']; ?>">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data1 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('widget/add')?>">
                      <input type="hidden" name="col" value="1" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data1['judul']; ?></h5>

            <?php
              $exe = $data1['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data1['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/1');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->      

                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data2 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="2" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data2['judul']; ?></h5>

            <?php
              $exe = $data2['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data2['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/2');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
              </div>
            <?php
            }


            function kolom_3($data){
              // print_r($data);die();
              if (trim($data['board_content1']) == ''){
                $data1 = false;
              } else {
                $data1 = json_decode($data['board_content1'], true);
              }

              if (trim($data['board_content2']) == ''){
                $data2 = false;
              } else {
                $data2 = json_decode($data['board_content2'], true);
              }

              if (trim($data['board_content3']) == ''){
                $data3 = false;
              } else {
                $data3 = json_decode($data['board_content3'], true);
              }
            ?>
              <div class="row row-xs mg-t-10 sort_item" id="row<?php echo $data['board_id']; ?>" data-post-id="<?php echo $data['board_id']; ?>">
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data1 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="1" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data1['judul']; ?></h5>

            <?php
              $exe = $data1['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data1['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/1');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->      

                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data2 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="2" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data2['judul']; ?></h5>

            <?php
              $exe = $data2['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data2['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/2');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->

                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data3 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="3" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data3['judul']; ?></h5>

            <?php
              $exe = $data3['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data3['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/3');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
              </div>
            <?php
            }



            function kolom_4($data){
              // print_r($data);die();
              if (trim($data['board_content1']) == ''){
                $data1 = false;
              } else {
                $data1 = json_decode($data['board_content1'], true);
              }

              if (trim($data['board_content2']) == ''){
                $data2 = false;
              } else {
                $data2 = json_decode($data['board_content2'], true);
              }

              if (trim($data['board_content3']) == ''){
                $data3 = false;
              } else {
                $data3 = json_decode($data['board_content3'], true);
              }

              if (trim($data['board_content4']) == ''){
                $data4 = false;
              } else {
                $data4 = json_decode($data['board_content4'], true);
              }
            ?>
              <div class="row row-xs mg-t-10 sort_item" id="row<?php echo $data['board_id']; ?>" data-post-id="<?php echo $data['board_id']; ?>">
                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data1 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="1" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data1['judul']; ?></h5>

            <?php
              $exe = $data1['widget'] . '_show';
              // echo $exe;die();
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data1['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/1');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->      

                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data2 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="2" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data2['judul']; ?></h5>

            <?php
              $exe = $data2['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data2['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/2');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->

                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data3 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="3" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data3['judul']; ?></h5>

            <?php
              $exe = $data3['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data3['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/3');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->

                <div class="col-lg-3">
                  <div class="card">
                    <div class="card-body">
            <?php
              if ($data4 === false){
            ?>
                  <div class="tx-center">
                    <form method="POST" action="<?=site_url('Widget/add')?>">
                      <input type="hidden" name="col" value="4" >
                      <input type="hidden" name="rid" value="<?php echo $data['board_id']; ?>" >      
                      <button class="btn btn-primary btn-icon"><div><i class="fa fa-plus"></i></div></button>
                    </form>
                  </div>
            <?php  
              } else {
            ?>    
                  <h5 class="card-title tx-dark tx-medium mg-b-10"><?php echo $data4['judul']; ?></h5>

            <?php
              $exe = $data4['widget'] . '_show';
              $CI =& get_instance();
              $CI->load->library('widget');
              $CI->widget->$exe($data4['config']);
            ?>

                  <a href="#" class="card-link">Edit</a>
            <?php
              }
            ?>    
                  <a href="<?=site_url('Widget/delete/'.$data['board_id'].'/4');?>" class="card-link">Hapus</a>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
              </div>
            <?php
            }
}
?>