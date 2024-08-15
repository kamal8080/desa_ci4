<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Informasi Kependudukan dan Fasilitas Desa</h1>
              <?php if (session()->getFlashdata('pesan')): ?>
                <div id="flash-message" class="alert alert-success">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
              <?php endif ?>
              <?php if (session()->getFlashdata('error')): ?>
                <div id="flash-message" class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Data Kependudukan dan Fasilitas Desa</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Jumlah Penduduk</th>
                        <th>Laki-laki</th>
                        <th>Perempuan</th>
                        <th>Jumlah Kepala Keluarga</th>
                        <th>Jumlah RT</th>
                        <th>Jumlah RW</th>
                        <th>Jumlah Sekolah</th>
                        <th>Jumlah Puskesmas</th>
                        <th>Jumlah Balai Desa</th>
                        <th>Jumlah Tempat Ibadah</th>
                        <th>Jumlah Pasar Desa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($data) && is_iterable($data)): ?>
                        <?php foreach($data as $id => $d): ?>
                          <tr>
                            <td><?= htmlspecialchars($d['jumlah_penduduk']); ?></td>
                            <td><?= htmlspecialchars($d['laki_laki']); ?></td>
                            <td><?= htmlspecialchars($d['perempuan']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_kepala_keluarga']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_rt']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_rw']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_sekolah']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_puskesmas']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_balaidesa']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_tempat_ibadah']); ?></td>
                            <td><?= htmlspecialchars($d['jumlah_pasar_desa']); ?></td>
                            <td>
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d['id'] ?>"><i class="fa fa-pencil-alt"></i></button>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="13">No data available</td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

<!-- EDIT -->
  <?php if (isset($data) && is_iterable($data)): ?>
    <?php foreach($data as $d): ?>
      <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Data Desa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open('dashboard/kependudukan/EditData/' . $d['id'], ['enctype' => 'multipart/form-data']); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" value="<?= htmlspecialchars($d['jumlah_penduduk']); ?>" required>
              </div>
              <div class="form-group">
                <label for="laki_laki">Jumlah Laki-laki</label>
                <input type="number" class="form-control" id="laki_laki" name="laki_laki" value="<?= htmlspecialchars($d['laki_laki']); ?>" required>
              </div>
              <div class="form-group">
                <label for="perempuan">Jumlah Perempuan</label>
                <input type="number" class="form-control" id="perempuan" name="perempuan" value="<?= htmlspecialchars($d['perempuan']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_kepala_keluarga">Jumlah Kepala Keluarga</label>
                <input type="number" class="form-control" id="jumlah_kepala_keluarga" name="jumlah_kepala_keluarga" value="<?= htmlspecialchars($d['jumlah_kepala_keluarga']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_rt">Jumlah RT</label>
                <input type="number" class="form-control" id="jumlah_rt" name="jumlah_rt" value="<?= htmlspecialchars($d['jumlah_rt']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_rw">Jumlah RW</label>
                <input type="number" class="form-control" id="jumlah_rw" name="jumlah_rw" value="<?= htmlspecialchars($d['jumlah_rw']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_sekolah">Jumlah Sekolah</label>
                <input type="number" class="form-control" id="jumlah_sekolah" name="jumlah_sekolah" value="<?= htmlspecialchars($d['jumlah_sekolah']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_puskesmas">Jumlah Puskesmas</label>
                <input type="number" class="form-control" id="jumlah_puskesmas" name="jumlah_puskesmas" value="<?= htmlspecialchars($d['jumlah_puskesmas']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_balaidesa">Jumlah Balai Desa</label>
                <input type="number" class="form-control" id="jumlah_balaidesa" name="jumlah_balaidesa" value="<?= htmlspecialchars($d['jumlah_balaidesa']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_tempat_ibadah">Jumlah Tempat Ibadah</label>
                <input type="number" class="form-control" id="jumlah_tempat_ibadah" name="jumlah_tempat_ibadah" value="<?= htmlspecialchars($d['jumlah_tempat_ibadah']); ?>" required>
              </div>
              <div class="form-group">
                <label for="jumlah_pasar_desa">Jumlah Pasar Desa</label>
                <input type="number" class="form-control" id="jumlah_pasar_desa" name="jumlah_pasar_desa" value="<?= htmlspecialchars($d['jumlah_pasar_desa']); ?>" required>
              </div>
              <input type="hidden" name="id" value="<?= $d['id'] ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  <?php endif ?> 
  
  <script>
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.transition = 'opacity 0.5s ease';
            flashMessage.style.opacity = '0';
            setTimeout(function() {
                flashMessage.remove();
            }, 500); 
        }
    }, 3000); 
</script>
