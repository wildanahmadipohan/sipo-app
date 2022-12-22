<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Obat</li>
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
            <h5 class="m-0 card-title">Data Obat</h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="<?= base_url('/obat/tambah') ?>"
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <!-- <th>Jenis</th> -->
                  <th>Suhu Penyimpanan (&#8451;)</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($semuaObat as $obat) : ?>
                  <tr>
                    <td><?= $obat['kd_obat'] ?></td>
                    <td><?= $obat['nama'] ?></td>
                    <!-- <td><?= $obat['jenis'] ?></td> -->
                    <td><?= $obat['suhu_penyimpanan'] ?></td>
                    <td><?= $obat['satuan'] ?></td>
                    <td><?= $obat['keterangan'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <!-- <th>Jenis</th> -->
                  <th>Suhu Penyimpanan (&#8451;)</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
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