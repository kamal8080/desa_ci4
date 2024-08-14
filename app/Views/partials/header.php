<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desa SukaMaju</title>
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D9D9D9;">
  <div class="container">
    <a class="navbar-brand" href="#">Desa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('profil')?>">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('layanan')?>">Layanan Desa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('berita')?>">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('kependudukan')?>">Kependudukan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('kontak')?>">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="<?php echo base_url('/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
