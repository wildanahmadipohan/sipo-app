<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

    <li class="nav-item">
      <a href="/" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Beranda
        </p>
      </a>
    </li>

    <li class="nav-header">TRANSAKSI</li>
    <li class="nav-item">
      <a href="<?= base_url('/transaksi/pemesanan') ?>" class="nav-link">
        <i class="nav-icon fas fa-pills"></i>
        <p>
          Pemesanan Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/transaksi/penerimaan') ?>" class="nav-link">
        <i class="nav-icon fas fa-pills"></i>
        <p>
          Penerimaan Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/transaksi/pengeluaran') ?>" class="nav-link">
        <i class="nav-icon fas fa-pills"></i>
        <p>
          Pengeluaran Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/transaksi/perubahan') ?>" class="nav-link">
        <i class="nav-icon fas fa-pills"></i>
        <p>
          Ubah Lokasi Obat
        </p>
      </a>
    </li>

    <li class="nav-header">PERSEDIAAN</li>
    <li class="nav-item menu-close">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Persediaan
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url('/persediaan') ?>" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p>Semua Persediaan Obat</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/persediaan/gudang') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Persediaan Obat Gudang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/persediaan/apotek') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Persediaan Obat Apotek</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-header">DATA TRANSAKSI</li>
    <li class="nav-item menu-close">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Data Transaksi
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url('/pemesanan') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Pemesanan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/penerimaan') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Penerimaan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/pengeluaran') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Pengeluaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('/perubahan') ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Data Perubahan Lokasi</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-header">DATA MASTER</li>
    <li class="nav-item">
      <a href="<?= base_url('obat') ?>" class="nav-link">
        <i class="nav-icon fas fa-pills"></i>
        <p>
          Data Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('obat/tambah') ?>" class="nav-link">
        <i class="nav-icon fas fa-first-aid"></i>
        <p>
          Tambah Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/obat/jenisdansatuan') ?>" class="nav-link">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
          Jenis & Satuan Obat
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('/ketenagaan') ?>" class="nav-link">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
          Ketenagaan
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->

<!-- <li class="nav-item menu-close">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Starter Pages
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Active Page</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Inactive Page</p>
      </a>
    </li>
  </ul>
</li> -->