<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Profil Desa</h1>
            <?php if (session()->getFlashdata('pesan')): ?>
                <div id="flash-message" class="alert alert-success">
                    <?= session()->getFlashdata('pesan') ?>
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
                <h3 class="card-title">Profil Desa</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Nama Desa</th>
                      <th>Tentang Desa</th>
                      <th>Visi</th>
                      <th>Misi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($data) && is_iterable($data)): ?>
                      <?php foreach($data as $id => $d): ?>
                        <tr>
                          <td><?= htmlspecialchars($d['nama_desa']); ?></td>
                          <td><?= htmlspecialchars($d['tentang_desa']); ?></td>
                          <td><?= htmlspecialchars($d['visi']); ?></td>
                          <td>
                            <ul>
                              <?php 
                              $misi_array = json_decode($d['misi'], true);
                              if(is_array($misi_array)) {
                                foreach ($misi_array as $misi) {
                                  echo "<li>" . htmlspecialchars($misi) . "</li>";
                                }
                              } else {
                                echo "<li>Misi tidak tersedia</li>";
                              }
                              ?>
                            </ul>
                          </td>
                          <td>
                            <img src="<?php echo base_url('uploads/profil/' . $d['gambar_desa']) ?>" alt="<?= esc($d['gambar_desa']) ?>" width="100">
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $d['id'] ?>"><i class="fa fa-pencil-alt"></i></button>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="7">No data available</td>
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

<!-- Modal Edit Desa -->
<?php if (isset($data) && is_iterable($data)): ?>
  <?php foreach($data as $d): ?>
    <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open('dashboard/profil/EditData/' . $d['id'], ['enctype' => 'multipart/form-data']); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_desa">Nama Desa</label>
              <input type="text" class="form-control" id="nama_desa" value="<?= htmlspecialchars($d['nama_desa']); ?>" name="nama_desa" required>
            </div>
            <div class="form-group">
              <label for="tentang_desa">Tentang Desa</label>
              <textarea class="form-control" id="tentang_desa" name="tentang_desa" rows="5" required><?= htmlspecialchars($d['tentang_desa']); ?></textarea>
            </div>
            <div class="form-group">
              <label for="visi">Visi</label>
              <textarea class="form-control" id="visi" name="visi" rows="3" required><?= htmlspecialchars($d['visi']); ?></textarea>
            </div>
            <div class="form-group">
              <label for="misi">Misi</label>
              <textarea class="form-control" id="misi" name="misi" rows="5" required><?= json_encode(json_decode($d['misi']), JSON_PRETTY_PRINT) ?></textarea>
            </div>
            <div class="form-group">
              <label for="gambar_desa">Gambar Desa</label>
              <input type="file" class="form-control-file" id="gambar_desa" name="gambar_desa">
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
