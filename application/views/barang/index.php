  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=str_replace('_', ' ', $title)?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"></a></li>
        <li class="#"><?=str_replace('_', ' ', $title)?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data <?=str_replace('_', ' ', $title)?></h3>
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus" title="Tambah <?=$title?>"></i>
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Subkategori</th>
                  <th>Kode Barang</th>
                  <th>Nama barang</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="tampil">
                  
                </tbody>  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php echo validation_errors(); ?>
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?=str_replace('_', ' ', $title)?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambah" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" id="kategori" class="form-control" required="">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $key => $value):?>
              <option value="<?=$value->id_kategori?>"><?=$value->nama_kategori?></option>
            <?php endforeach ?>
            
          </select>
        </div>
        <div class="form-group">
          <label>Subkategori</label>
          <select name="id_subkategori" id="id_subkategori" class="form-control" required="">
            
          </select>
        </div>
        <div class="form-group">
          <label>Nama barang</label>
          <input required="" type="text" name="nama_produk" class="form-control" required="">
        </div>
      </div>
    </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save">Save changes</button>
      </div>
      
      </div>
    </div>
  </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php echo validation_errors(); ?>
        <h5 class="modal-title" id="exampleModalLabel">Edit <?=str_replace('_', ' ', $title)?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_cuy" method="post">
      <div class="modal-body">
        <input = type="hidden" id="id_edit" name="id_barang">
        <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" id="kategori" class="form-control" required="">
            <option value="">Pilih Kategori</option>
            <?php foreach ($kategori as $key => $value):?>
              <option value="<?=$value->id_kategori?>"><?=$value->nama_kategori?></option>
            <?php endforeach ?>
            
          </select>
        </div>
        <div class="form-group">
          <label>Subkategori</label>
          <select name="id_subkategori" id="id_subkategori" class="form-control" required="">
            
          </select>
        </div>
        <div class="form-group">
          <label>Nama barang</label>
          <input required="" type="text" id="nama_barang_edit" name="nama_barang" class="form-control" required="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ubah">Save changes</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   
  $('.save').on('click',function(){
    $.ajax({
    url : '<?=base_url()?>barang/add',
    method : 'post',
    data : $('#tambah').serialize(),
    dataType : 'json',
    success : function(data){
      console.log(data.status);
      if (data.status =='sukses') {
        // alert('test');
        $('#exampleModal').modal('hide');
        swal("Sukses", "Input berhasil", "success");
        tampil();
      }else{
        html = '<div class="form-error-text-block">'+data.pesan+'</div>';
        $('#error_validasi').html(html);
        // alert(html)
      }
    }
    })  
  });
  function hapusCoy(id){
    // alert(id);
      swal({
        title: "Apakah Kamu Yakin?",
        text: "Akan Menghapus Data Ini",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url : '<?=base_url()?>barang/delete/'+id,
            success : function(data){
               swal("data telah dihapus", {
                icon: "success",
              });
               tampil();
             
            }
          });
         
        } else {
          swal("Data Tidak Di hapus");
        }
      })
  }
  function edit(id)
  {
    // alert(id);
    $.ajax({
      url : '<?=base_url()?>barang/by_id/'+id,
      dataType : 'json',
      success : function(data){
        console.log(data);
        $('[name="id_barang"]').val(id);
        $('[name="nama_barang"]').val(data.nama_barang);
        $('#edit').modal('show');
      }
    });
  }
  $('.ubah').on('click',function(){
    var id_barang = $('#id_edit').val();
    var nama_barang = $('#nama_barang_edit').val();
    $.ajax({
    url : '<?=base_url()?>barang/update',
    method : 'post',
    data : $('#edit_cuy').serialize(),
    dataType : 'json',
    success : function(data){
      console.log(data.status);
      if (data.status =='sukses') {
        // alert('test');
        $('#edit').modal('hide');
        swal("Sukses", "Updated berhasil", "success");
        tampil();
      }else{
        html = '<div class="form-error-text-block">'+data.pesan+'</div>';
        $('#error_validasi').html(html);
      }
    }
    })  
  })
  $('#kategori').on('change',function(){
    var id =  $('#kategori').val();
    // alert(id);
    $.ajax({
      url : '<?=base_url()?>Subkategori/option/'+id,
      dataType : 'json',
      success : function(data){
        console.log(data);
        var html ='';
        for (var i = 0; i < data.length; i++) {
          html += '<option value="'+data[i].id_subkategori+'">'+data[i].nama_subkategori+'</option>';
        }
        $('#id_subkategori').html(html);
      }
    })
  })
  function tampil()
  {
    // alert('test');
    $.ajax({
      url : '<?=base_url()?>barang/tampil',
      success : function(data){
        
        // console.log(html);
        $('#tampil').html(data);
        // tampil();
      }
    })
  }

  
  tampil();
</script>