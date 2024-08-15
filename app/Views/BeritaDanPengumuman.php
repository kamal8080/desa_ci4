<section class="py-5" style="background-color: #F6F6F6;" id="berita-pengumuman">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Berita dan Pengumuman</h2>
            <p class="lead fw-normal text-muted">Tetap terinformasi dengan berita dan pengumuman terbaru dari Desa SukaMaju.</p>
        </div>
        <div class="row gx-5">
            <!-- Berita Terkini -->
            <div class="col-lg-6">
            <h3 class="fw-bolder">Berita Terkini</h3>
            <?php if (isset($berita) && is_iterable($berita)): ?>
                    <?php foreach($berita as $b): ?>
                        <div class="card mb-4 shadow border-0">
                            <img class="card-img-top" src="<?php echo base_url('uploads/berita/' . $b['gambar']) ?>" alt="<?= esc($b['judul_berita']) ?>" style="max-height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder"><?= $b['judul_berita'] ?></h5>
                                <p class="card-text text-muted"><?= $b['isi_berita'] ?></p>
                                <a href="#!" class="stretched-link">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>Tidak ada berita terkini.</p>
                <?php endif ?>
            </div>
            <!-- Pengumuman -->
            <div class="col-lg-6">
    <h3 class="fw-bolder">Pengumuman</h3>
    <?php if (isset($pemberitahuan) && is_iterable($pemberitahuan)): ?>
        <?php foreach($pemberitahuan as $b): ?>
            <div class="card mb-4 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title fw-bolder"><?= esc($b['judul']) ?></h5>
                    <p class="card-text text-muted"><?= esc($b['isi']) ?></p>
                    <a href="#!" class="stretched-link">Baca Selengkapnya</a>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
        <p>Tidak ada pemberitahuan terkini.</p>
    <?php endif ?>
</div>
            </div>
        </div>
    </div>
</section>
