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
              <h3 class="box-title">Form Hitung <?=str_replace('_', ' ', $title)?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?=base_url('apriori/proses')?>">
                <div class="form-group">
                  <label>Confiden</label>
                  <input type="number" min="20" class="form-control" name="confiden">
                </div>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </form>
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
