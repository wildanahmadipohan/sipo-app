<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Perubahan Lokasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Perubahan Lokasi</li>
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
            <h5 class="m-0 card-title">Data Perubahan Lokasi Obat</h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="<?= base_url('/transaksi/perubahan') ?>"
                    >Buat Perubahan</a
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
                  <th>Kode Perubahan</th>
                  <th>Tanggal</th>
                  <th>Lokasi Tujuan</th>
                  <th>Jumlah</th>
                  <th>Obat</th>
                  <th>Nomor Batch</th>
                  <th>Expired</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($perubahan as $key => $value) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['kd_perubahan'] ?></td>
                    <td><?= $value['tgl_perubahan'] ?></td>
                    <td><?= $value['lokasi'] ?></td>
                    <td align="right"><?= $value['qty'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['no_batch'] ?></td>
                    <td><?= $value['expired'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Perubahan</th>
                  <th>Tanggal</th>
                  <th>Lokasi Tujuan</th>
                  <th>Jumlah</th>
                  <th>Obat</th>
                  <th>Nomor Batch</th>
                  <th>Expired</th>
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