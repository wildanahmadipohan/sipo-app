<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Data Ketenagaan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Ketenagaan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0">Form Tambah Data Ketenagaan</h5>
          </div>
          <form action="/ketenagaan/save" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Nama Pegawai/Staf</label>
                <input type="text" id="nama" name="nama" class="form-control">
              </div>

              <div class="form-group">
                <label for="nip">NIP Pegawai/Gol</label>
                <input type="text" class="form-control" id="nip" name="nip">
              </div>
              
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status">
              </div>

              <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <input type="text" class="form-control" id="pendidikan" name="pendidikan">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>