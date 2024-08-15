<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0">Kontak Desa</h1>
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
                  <h3 class="card-title">Kontak Desa</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>alamat</th>
                        <th>telpon</th>
                        <th>email</th>
                        <th>lokasi map</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($data) && is_iterable($data)): ?>
                        <?php foreach($data as $id => $d): ?>
                          <tr>
      
                            <td><?= htmlspecialchars($d['alamat']); ?></td>
                            <td><?= htmlspecialchars($d['telepon']); ?></td>
                            <td><?= htmlspecialchars($d['email']); ?></td>
                            <td><a href="<?= htmlspecialchars($d['lokasi_map']); ?>" target="_blank">Lihat Peta</a></td>

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
            <?= form_open('dashboard/kontak/EditData/' . $d['id'], ['enctype' => 'multipart/form-data']); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($d['alamat']); ?>" required>
              </div>
              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= htmlspecialchars($d['telepon']); ?>" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($d['email']); ?>" required>
              </div>
              <div class="form-group">
                <label for="lokasi_map">Lkasi Map</label>
                <input type="text" class="form-control" id="lokasi_map" name="lokasi_map" value="<?= htmlspecialchars($d['lokasi_map']); ?>" required>
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

