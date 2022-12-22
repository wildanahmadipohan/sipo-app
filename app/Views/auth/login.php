<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPO | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/vendor/adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>SI</b>PO</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login terlebih dulu.</p>

      <?= view('Myth\Auth\Views\_message_block') ?>

      <form action="<?= route_to('login') ?>" method="post">
        <?= csrf_field() ?>

        <?php if ($config->validFields === ['email']): ?>
          <div class="input-group mb-3">
            <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div class="invalid-feedback">
								<?= session('errors.login') ?>
						</div>
          </div>
        <?php else: ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
          </div>
        <?php endif; ?>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        </div>
        <div class="row">
          <?php if ($config->allowRemembering): ?>
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <?php endif; ?>

          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      
      <?php if ($config->activeResetter): ?>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <?php endif; ?>
      <?php if ($config->allowRegistration) : ?>
      <p class="mb-0">
        <a href="<?= base_url('/register') ?>" class="text-center">Register a new membership</a>
      </p>
      <?php endif; ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/vendor/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
