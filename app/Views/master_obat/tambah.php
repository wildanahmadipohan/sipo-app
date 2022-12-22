<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Data Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Tambah Obat</li>
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
            <h5 class="m-0">Form Tambah Data Obat</h5>
          </div>
          <form action="/obat/save" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="kd_obat">Kode Obat</label>
                    <input type="text" id="kd_obat" name="kd_obat" class="form-control" value="<?= $kodeObat; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Obat</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Obat">
                  </div>

                  <div class="form-group">
                    <label for="jenis">Jenis Obat</label>
                    <select class="form-control select2" style="width: 100%;" name="jenis" id="jenis">
                      <option selected="selected">Pilih Jenis Obat</option>
                      <?php foreach ($jenisObat as $jenis) : ?>
                        <option value="<?= $jenis['jenis']; ?>"><?= $jenis['jenis']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="suhu">Suhu Penyimpanan Obat</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="suhu" name="suhu" placeholder="Suhu Dalam Celcius">
                      <div class="input-group-append">
                        <span class="input-group-text">&#8451;</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="satuan">Satuan Obat</label>
                    <select class="form-control select2" style="width: 100%;" id="satuan" name="satuan">
                      <option selected="selected">Pilih Satuan Obat</option>
                      <?php foreach ($satuanObat as $satuan) : ?>
                        <option value="<?= $satuan['satuan']; ?>"><?= $satuan['satuan']; ?></option>
                      <?php endforeach; ?>
                    </select>
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
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>