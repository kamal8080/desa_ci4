<?php if (isset($profil) && is_iterable($profil)): ?>
    <?php foreach($profil as $b): ?>
<section class="py-5" style="background-color: #F6F6F6;" id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
            <img src="<?php echo base_url('uploads/profil/' . $b['gambar_desa']) ?>" alt="<?= esc($b['gambar_desa']) ?>" width="500" height="400">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bolder"> <?php echo htmlspecialchars($b['nama_desa']); ?> </h2>
                <p class="lead fw-normal text-muted mb-0">
                    <?php echo htmlspecialchars($b['tentang_desa']); ?>
                </p>
            </div>
        </div>
        <div class="row gx-5 align-items-center mt-5">
            <div class="col-lg-12">
                <h2 class="fw-bolder">Visi dan Misi</h2>
                <h3 class="fw-bold">Visi:</h3>
                <p class="lead fw-normal text-muted">
                    <?php echo htmlspecialchars($b['visi']); ?>
                </p>
                <h3 class="fw-bold">Misi:</h3>
                <ul class="lead fw-normal text-muted">
                <?php
                    $misi_array = json_decode($b['misi'], true);
                    if (is_array($misi_array)) {
                        foreach ($misi_array as $misi) {
                            echo "<li>" . htmlspecialchars($misi) . "</li>";
                        }
                    } else {
                        echo "<li>Misi tidak tersedia</li>";
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
</section>
    <?php endforeach; ?>
<?php else: ?>
    <p>Tidak Ada Informasi.</p>
<?php endif; ?>
