<?php if (isset($data) && is_iterable($data)): ?>
    <?php foreach($data as $b): ?>
<section class="py-5" style="background-color: #F6F6F6;" id="contact">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <div class="embed-responsive embed-responsive-16by9 mb-4 mb-lg-0">
                    <iframe class="embed-responsive-item" 
                            src="<?php echo $b['lokasi_map']; ?>" 
                            width="600" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">Kontak Kami</h2>
                <p class="lead fw-normal text-muted mb-4">Hubungi kami melalui informasi kontak berikut:</p>
                <p class="lead fw-normal">
                    <strong>Alamat:</strong> <?php echo $b['alamat'] ?> <br>
                    <strong>Telepon:</strong> <?php echo $b['telepon'] ?> <br>
                    <strong>Email:</strong>  <?php echo $b['email'] ?> <br>
                </p>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
<?php else: ?>
    <p>Tidak Ada Informasi.</p>
<?php endif; ?>

