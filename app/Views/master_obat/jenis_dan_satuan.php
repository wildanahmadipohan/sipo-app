<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Jenis & Satuan Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jenis & Satuan Obat</li>
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
      <div class="col-md-4">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0 card-title">Data Jenis Obat</h5>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('tambah jenis')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tambah jenis'); ?>
              </div>
            <?php endif; ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Jenis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($jenisObat) :
                  $i = 1;
                  foreach ($jenisObat as $jenis) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $jenis['jenis']; ?></td>
                    <td>
                      <div class="row justify-content-around ">
                        <div class="align-items-center">
                          <a href="" class="text-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                        </div>
                        <div class="align-items-center">
                          <a href="" class="text-danger">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; 
                else: ?>
                  <tr>
                    <td colspan="3" class="text-center">Data masih kosong.</td>
                  </tr>
                <?php
                endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0 card-title">Tambah Jenis</h5>
          </div>
          <form action="/jenisdansatuan/save" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="type" value="jenis">
                <input type="text" class="form-control form-control-sm" id="jenis" name="jenis" placeholder="Jenis baru...">
              </div>
              <button type="submit" class="btn btn-success btn-sm float-right">Tambah</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0 card-title">Data Satuan Obat</h5>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('tambah satuan')): ?>
              <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('tambah satuan'); ?>
              </div>
            <?php endif; ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($jenisObat):
                  $i = 1;
                  foreach ($satuanObat as $satuan) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $satuan['satuan']; ?></td>
                    <td>
                      <div class="row justify-content-around ">
                        <div class="align-items-center">
                          <a href="" class="text-success">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                        </div>
                        <div class="align-items-center">
                          <a href="" class="text-danger">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; 
                else: ?>
                  <tr>
                    <td colspan="3" class="text-center">Data masih kosong.</td>
                  </tr>
                <?php
                endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h5 class="m-0 card-title">Tambah Satuan</h5>
          </div>
          <form action="/jenisdansatuan/save" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="type" value="satuan">
                <input type="text" class="form-control form-control-sm" id="satuan" name="satuan" placeholder="Satuan baru...">
              </div>
              <button type="submit" class="btn btn-success btn-sm float-right">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>