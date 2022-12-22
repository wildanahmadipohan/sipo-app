<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Transaksi Perubahan Lokasi Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Perubahan Lokasi Obat</li>
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
            <h5 class="m-0">Perubahan Lokasi Obat</h5>
          </div>
          <?php $validation = \Config\Services::validation(); ?>
          <form id="form-perubahan" action="/transaksi/perubahan" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('message'); ?>
                </div>
              <?php endif; ?>
              <?php if (session()->getFlashdata('inserted')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->getFlashdata('inserted'); ?>
                </div>
              <?php endif; ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kd_perubahan">Kode Perubahan</label>
                    <input type="text" id="kd_perubahan" name="kd_perubahan" class="form-control" value="<?= $kodePerubahan ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="petugas">Petugas</label>
                    <input type="text" id="petugas" name="petugas" class="form-control" value="<?= $user ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="lokasi">Lokasi Tujuan</label>
                    <div class="row">
                      <div class="col-3">
                        <input type="text" id="lokasi" name="lokasi" class="form-control" value="Apotek" readonly>
                      </div>
                      <div class="col-1 text-center">
                        <span class="align-middle">/</span>
                      </div>
                      <div class="col-8">
                        <input type="text" id="rak" name="rak" class="form-control <?= $validation->hasError('rak') ? 'is-invalid' : null ?>" placeholder="Lokasi Rak" value="<?= old('rak') ?>" required>
                        <div class="invalid-feedback">
                          <?= $validation->getError('rak') ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tgl_perubahan">Tanggal Perubahan</label>
                    <div class="input-group date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tgl_perubahan" id="tgl_perubahan" name="tgl_perubahan" required/>
                        <div class="input-group-append" data-target="#tgl_perubahan" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="obat">Nama Obat</label>
                    <select class="form-control select2-nama" style="width: 100%;" name="obat" id="obat" required>
                      <option value="">Pilih Obat</option>
                      <?php foreach ($semuaObat as $obat) : ?>
                        <option value="<?= $obat['id'] ?>"><?= $obat['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jumlah">Jumlah Pemindahan</label>
                    <input type="number" min="1" id="jumlah" name="jumlah" class="form-control <?= $validation->hasError('jumlah') ? 'is-invalid' : null ?>" value="<?= old('jumlah') ?>" required>
                    <div class="invalid-feedback">
                      <?= $validation->getError('jumlah') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success float-right">Simpan</button>
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

<?= $this->section('scripts') ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2-nama').select2()
  })

  $('#tgl_perubahan').datetimepicker({
      format: 'YYYY-MM-DD',
      defaultDate: new Date(),
      locale: 'id'
  });
</script>
<?= $this->endSection() ?>