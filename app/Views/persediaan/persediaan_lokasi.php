<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Persediaan Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Persediaan Obat</li>
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
            <h5 class="m-0 card-title">Persediaan Obat Di <?= $lokasi == 'gudang' ? 'Gudang' : 'Apotek' ?></h5>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="#"
                    ><i class="fas fa-plus"></i></a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <table id="persediaan" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Nomor Batch</th>
                <th>ED</th>
                <th>QTY</th>
                <th>Status</th>
                <!-- <th>Aksi</th> -->
              </tr>
              </thead>
              <tbody>
              <?php foreach ($persediaan as $p) : ?>
                <tr>
                  <td><?= $p->kd_obat ?></td>
                  <td><?= $p->nama ?></td>
                  <td><?= $p->no_batch ?></td>
                  <td><?= $p->expired ?></td>
                  <td><?= $p->qty ?></td>
                  <td><?= $p->status ?></td>
                  <!-- <td><a href="<?= base_url('/persediaan/' . $p->id) ?>">Detail</a></td> -->
                </tr>
              <?php endforeach; ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Nomor Batch</th>
                <th>ED</th>
                <th>QTY</th>
                <th>Status</th>
                <!-- <th>Aksi</th> -->
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
    // init datatable
    $("#persediaan").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#persediaan_wrapper .col-md-6:eq(0)');
  })
</script>
<?= $this->endSection() ?>