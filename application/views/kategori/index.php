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
                  <th>Kode Kategori</th>
                  <th>Nama Kategori</th>
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
          <label>Nama Kategori</label>
          <input required="" type="text" name="nama_kategori" class="form-control">
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
      <form id="edit" method="post">
      <div class="modal-body">
        <input = type="hidden" id="id_edit" name="id_kategori">
        <div class="form-group">
          <label>Nama Kategori</label>
          <input required="" id="nama_kategori_edit" type="text" name="nama_kategori" class="form-control">
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
    url : '<?=base_url()?>kategori/add',
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
            url : '<?=base_url()?>kategori/delete/'+id,
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
      url : '<?=base_url()?>kategori/by_id/'+id,
      dataType : 'json',
      success : function(data){
        console.log(data);
        $('[name="id_kategori"]').val(id);
        $('[name="nama_kategori"]').val(data.nama_kategori);
        $('#edit').modal('show');
      }
    });
  }
  $('.ubah').on('click',function(){
    var id_kategori = $('#id_edit').val();
    var nama_kategori = $('#nama_kategori_edit').val();
    $.ajax({
    url : '<?=base_url()?>kategori/update',
    method : 'post',
    data : { id_kategori: id_kategori, nama_kategori:nama_kategori },
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
  function tampil()
  {
    // alert('test');
    $.ajax({
      url : '<?=base_url()?>kategori/tampil',
      success : function(data){
        
        // console.log(html);
        $('#tampil').html(data);
        // tampil();
      }
    })
  }

  
  tampil();
</script>