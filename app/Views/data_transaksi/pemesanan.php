<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pemesanan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Pemesanan</li>
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
            <h5 class="m-0 card-title">Data Pemesanan</h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="<?= base_url('/transaksi/pemesanan') ?>"
                    >Buat Pemesanan</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Jumlah Kunjungan (Umum)</th>
                  <th>Jumlah Kunjungan (BPJS/JKN)</th>
                  <th>Jumlah Kunjungan (JAMKESDA)</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pemesanan as $key => $value) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['kd_pemesanan'] ?></td>
                    <td><?= $value['tgl_dokumen'] ?></td>
                    <td align="right"><?= $value['umum'] ?></td>
                    <td align="right"><?= $value['bpjs'] ?></td>
                    <td align="right"><?= $value['jamkesda'] ?></td>
                    <td><?= $value['keterangan'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Jumlah Kunjungan (Umum)</th>
                  <th>Jumlah Kunjungan (BPJS/JKN)</th>
                  <th>Jumlah Kunjungan (JAMKESDA)</th>
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