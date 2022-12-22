<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Beranda</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Beranda</li>
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>Pemesanan Obat</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-invoice"></i>
          </div>
          <a href="#" class="small-box-footer"
            >Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>350</h3>

            <p>Penerimaan Obat</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-down"></i>
          </div>
          <a href="#" class="small-box-footer"
            >Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>530</h3>

            <p>Pengeluaran Obat</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-up"></i>
          </div>
          <a href="#" class="small-box-footer"
            >Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>600</h3>

            <p>Perubahan Lokasi Obat</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrows-alt"></i>
          </div>
          <a href="#" class="small-box-footer"
            >Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i
          ></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-6">
        <div class="card card-outline card-warning">
          <div class="card-header">
            <h3 class="card-title">Daftar Obat Yang Akan Expired</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Nomor Batch</th>
                  <th>Expire Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Ambroxol sirup</td>
                  <td>E9D039</td>
                  <td>ED 07-2022</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Ambroxol Tablet</td>
                  <td>E9D040</td>
                  <td>ED 07-2022</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Diltiazem HCl tablet 30 mg</td>
                  <td>E9D041</td>
                  <td>ED 07-2022</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Efedrin HCL inj 50 mg/ml </td>
                  <td>E9D042</td>
                  <td>ED 07-2022</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
    
      <div class="col-6">
        <div class="card card-outline card-warning">
          <div class="card-header">
            <h3 class="card-title">Daftar Obat Yang Akan Habis</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Nomor Batch</th>
                  <th>Stok</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Difenhidramin HCl inj 10 mg/ml - 1 ml</td>
                  <td>C8D029</td>
                  <td>30</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Etambutol HCl tablet 250 mg</td>
                  <td>D9C043</td>
                  <td>100</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Kloramfenikol kapsul 250 mg</td>
                  <td>F6G126</td>
                  <td>60</td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Tramadol Injeksi 50 mg/ml</td>
                  <td>H6C061</td>
                  <td>20</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
    </div>
  
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>