<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Ketenagaan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Ketenagaan</li>
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
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0 card-title">Data Ketenagaan</h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="<?= base_url('/ketenagaan/tambah') ?>"
                    ><i class="fas fa-plus"></i></a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('inserted')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('inserted'); ?>
              </div>
            <?php endif; ?>
            <table id="tabel-ketenagaan" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Pegawai/Staf</th>
                  <th>NIP Pegawai/Gol</th>
                  <th>Status</th>
                  <th>Pendidikan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ketenagaan as $k) : ?>
                  <tr>
                    <td><?= $k['nama'] ?></td>
                    <td><?= $k['nip'] ?></td>
                    <td><?= $k['status'] ?></td>
                    <td><?= $k['pendidikan'] ?></td>
                    <td>
                      <a href="#">Edit </a> 
                      |
                      <a href="#">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Nama Pegawai/Staf</th>
                  <th>NIP Pegawai/Gol</th>
                  <th>Status</th>
                  <th>Pendidikan</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
  $(function () {
    $("#tabel-ketenagaan").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tabel-ketenagaan_wrapper .col-md-6:eq(0)');
  })
</script>
<?= $this->endSection() ?>