<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Berita</h1>
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
          <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah Berita</button>
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
                <h3 class="card-title">Daftar Berita</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Judul Berita</th>
                      <th>Slug Berita</th>
                      <th>Isi Berita</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($data) && is_iterable($data)): ?>
                      <?php foreach($data as $id_berita => $b): ?>
                        <tr>
                          <td><?= $id_berita + 1 ?></td>
                          <td><?= $b['judul_berita'] ?></td>
                          <td><?= $b['slug_berita'] ?></td>
                          <td><?= $b['isi_berita'] ?></td>
                          <td>
                            <img src="<?php echo base_url('uploads/berita/' . $b['gambar']) ?>" alt="<?= esc($b['gambar']) ?>" width="100">
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $b['id_berita'] ?>"><i class="fa fa-pencil-alt"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $b['id_berita'] ?>"><i class="fa fa-trash"></i></button>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6">No data available</td>
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
</body>

<!-- TAMBAH DATA -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('dashboard/berita/TambahData'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="judul_berita">Judul Berita</label>
          <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
        </div>
        <div class="form-group">
          <label for="slug_berita">Slug Berita</label>
          <input type="text" class="form-control" id="slug_berita" name="slug_berita" required>
        </div>
        <div class="form-group">
          <label for="isi_berita">Isi Berita</label>
          <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" required></textarea>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" class="form-control-file" id="gambar" name="gambar" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<!-- HAPUS -->
<?php if (isset($data) && is_iterable($data)): ?>
  <?php foreach($data as $id_berita => $b): ?>
    <div class="modal fade" id="delete<?= $b['id_berita'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open('dashboard/berita/HapusData/' . $b['id_berita']); ?>
          <div class="modal-body">
          Apakah Anda yakin ingin menghapus berita ini? <?= $b['judul_berita'] ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
<?php endif ?>

<!-- EDIT  -->
<?php if (isset($data) && is_iterable($data)): ?>
  <?php foreach($data as $b): ?>
    <div class="modal fade" id="edit<?= $b['id_berita'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open('dashboard/berita/EditData/' . $b['id_berita'], ['enctype' => 'multipart/form-data']); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="judul_berita">Judul Berita</label>
              <input type="text" class="form-control" id="judul_berita" value="<?= $b['judul_berita'] ?>" name="judul_berita" required>
            </div>
            <div class="form-group">
              <label for="slug_berita">Slug Berita</label>
              <input type="text" class="form-control" id="slug_berita" value="<?= $b['slug_berita'] ?>" name="slug_berita" required>
            </div>
            <div class="form-group">
              <label for="isi_berita">Isi Berita</label>
              <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" required><?= $b['isi_berita'] ?></textarea>
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>
            <input type="hidden" name="id_berita" value="<?= $b['id_berita'] ?>">
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