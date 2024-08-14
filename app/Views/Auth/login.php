<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>LOGIN</b>
  </div>
  <div class="card">
    <div class="card-body register-card-body">

      <?php $errors = session()->getFlashdata('error'); ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
              <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
              </ul>
            </div>
      <?php endif ?>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif ?>
        
        <?= form_open('login/cek_login') ?>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
        <?= form_close() ?>

      <a href="<?= base_url('register') ?>" class="text-center">Belum Mempunyai Akun? Register</a>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>