<?php if (isset($kontak) && is_iterable($kontak)): ?>
  <?php foreach($kontak as $b): ?>
    <footer class="bg-body-tertiary text-left text-lg-start" style="background-color: #D9D9D9;">
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Tentang Kami</h5>
        <p>
        Selamat datang di website resmi Desa SukaMaju, tempat informasi, pelayanan, dan komunikasi untuk seluruh warga dan pengunjung desa kami.
        </p>
      </div>
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Hubungi Kami</h5>
        <p>
        <strong>Alamat:</strong> <?php echo $b['alamat'] ?> <br>
        <strong>Telepon:</strong> <?php echo $b['telepon'] ?> <br>
        <strong>Email:</strong>  <?php echo $b['email'] ?> <br>
        </p>
      </div>
    </div>
  </div>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Hak Cipta:
    <a class="text-body" href="#">Desa [Nama Desa]</a>
  </div>
</footer>
</body>
<?php endforeach; ?>
<?php else: ?>
    <p>Tidak Ada Informasi.</p>
<?php endif; ?>