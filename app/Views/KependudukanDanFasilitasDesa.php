<?php if (isset($data) && is_iterable($data)): ?>
    <?php foreach($data as $b): ?>
<section class="py-5 bg-light" id="kependudukan">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Kependudukan dan Fasilitas Desa</h2>
            <p class="lead fw-normal text-muted">Informasi kependudukan dan fasilitas yang ada di Desa SukaMaju.</p>
        </div>
        <div class="row gx-5">
            <div class="col-lg-12">
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">Informasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Jumlah Penduduk</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_penduduk']); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Kelamin</strong></td>
                            <td>
                                Laki-laki: <?= htmlspecialchars($b['laki_laki']); ?> (<?= round(($b['laki_laki'] / $b['jumlah_penduduk']) * 100, 1); ?>%)<br>
                                Perempuan: <?= htmlspecialchars($b['perempuan']); ?> (<?= round(($b['perempuan'] / $b['jumlah_penduduk']) * 100, 1); ?>%)
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Kepala Keluarga</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_kepala_keluarga']); ?> KK</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah RT/RW</strong></td>
                            <td>RT: <?= htmlspecialchars($b['jumlah_rt']); ?>, RW: <?= htmlspecialchars($b['jumlah_rw']); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Sekolah</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_sekolah']); ?> Sekolah</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Puskesmas</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_puskesmas']); ?> Puskesmas</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Balai Desa</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_balaidesa']); ?> Balai Desa</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Tempat Ibadah</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_tempat_ibadah']); ?> Tempat Ibadah</td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Pasar Desa</strong></td>
                            <td><?= htmlspecialchars($b['jumlah_pasar_desa']); ?> Pasar Desa</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
<?php else: ?>
    <p>Tidak Ada Informasi.</p>
<?php endif; ?>
