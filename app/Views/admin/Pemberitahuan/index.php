<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen pemberitahuan</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah pemberitahuan</button>
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
                <h3 class="card-title">Daftar pemberitahuan</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Judul</th>
                      <th>Slug</th>
                      <th>Isi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($data) && is_iterable($data)): ?>
                    <?php foreach($data as $id => $b): ?>
                      <tr>
                        <td><?= $id + 1 ?></td>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['slug'] ?></td>
                        <td><?= $b['isi'] ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $b['id'] ?>"><i class="fa fa-pencil-alt"></i></button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $b['id'] ?>"><i class="fa fa-trash"></i></button>
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

<!-- EDIT -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah pemberitahuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('dashboard/pemberitahuan/TambahData'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="judul">Judul pemberitahuan</label>
          <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
          <label for="slug">Slug pemberitahuan</label>
          <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="form-group">
          <label for="isi">Isi pemberitahuan</label>
          <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
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
  <?php foreach($data as $id_pemberitahuan => $b): ?>
    <div class="modal fade" id="delete<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Hapus pemberitahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open('dashboard/pemberitahuan/HapusData/' . $b['id']); ?>
          <div class="modal-body">
          Apakah Anda yakin ingin menghapus pemberitahuan ini? <?= $b['judul'] ?>
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
    <div class="modal fade" id="edit<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit pemberitahuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open('dashboard/pemberitahuan/EditData/' . $b['id'], ['enctype' => 'multipart/form-data']); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="judul">Judul pemberitahuan</label>
              <input type="text" class="form-control" id="judul" value="<?= $b['judul'] ?>" name="judul" required>
            </div>
            <div class="form-group">
              <label for="slug">Slug pemberitahuan</label>
              <input type="text" class="form-control" id="slug" value="<?= $b['slug'] ?>" name="slug" required>
            </div>
            <div class="form-group">
              <label for="isi">Isi pemberitahuan</label>
              <textarea class="form-control" id="isi" name="isi" rows="5" required><?= $b['isi'] ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $b['id'] ?>">
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