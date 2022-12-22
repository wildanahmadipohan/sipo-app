<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pengeluaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Pengeluaran</li>
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
            <h5 class="m-0 card-title">Data Pengeluaran</h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="<?= base_url('/transaksi/pengeluaran') ?>"
                    >Buat Pengeluaran</a
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
                  <th>Kode Pengeluaran</th>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Dokter</th>
                  <th>Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pengeluaran as $key => $value) : ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['kd_pengeluaran'] ?></td>
                    <td><?= $value['tgl_pengeluaran'] ?></td>
                    <td><?= $value['jenis'] ?></td>
                    <td><?= $value['nama_dokter'] ?></td>
                    <td><?= $value['nama_pengguna'] ?></td>
                    <td><?= $value['jk_pengguna'] ?></td>
                    <td><?= $value['umur_pengguna'] ?></td>
                    <td><?= $value['keterangan'] ?></td>
                    <td>
                      <a href="<?= base_url('/pengeluaran/'.$value['id']) ?>">Detail Item</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Pengeluaran</th>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Dokter</th>
                  <th>Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Keterangan</th>
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