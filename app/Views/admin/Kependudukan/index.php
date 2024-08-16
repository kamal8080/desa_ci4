<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Management Kependudukan</h1>
            </div>
            <div class="col-sm-6">
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penduduk</h3>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-hover text-nowrap">
                    <thead class="thead-dark">
                      <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIK</th>
                        <th>NO. KK</th>
                        <th>NAMA AYAH</th>
                        <th>NAMA IBU</th>
                        <th>ALAMAT</th>
                        <th>DUSUN</th>
                        <th>RW</th>
                        <th>RT</th>
                        <th>UMUR</th>
                        <th>PEKERJAAN</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $id = 1 + ($currentPage - 1) * 50; ?>
                      <?php foreach ($data as $row): ?>
                        <tr>
                          <td><?= $id ?></td>
                          <td><?= $row['nama'] ?></td>
                          <td><?= $row['nik'] ?></td>
                          <td><?= $row['no_kk'] ?></td>
                          <td><?= $row['nama_ayah'] ?></td>
                          <td><?= $row['nama_ibu'] ?></td>
                          <td><?= $row['alamat'] ?></td>
                          <td><?= $row['dusun'] ?></td>
                          <td><?= $row['rw'] ?></td>
                          <td><?= $row['rt'] ?></td>
                          <td><?= $row['umur'] ?></td>
                          <td><?= $row['pekerjaan'] ?></td>
                          <td>
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $row['id'] ?>">Edit</button>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $row['id'] ?>">Hapus</button>
                          </td>
                        </tr>
                        <?php $id++; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <nav>
                  <ul class="pagination">
                    <?php if ($currentPage > 1): ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $currentPage - 1 ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php
                    $range = 2; // This controls how many pages to show before and after the current page
                    for ($i = max(1, $currentPage - $range); $i <= min($currentPage + $range, $totalPages); $i++):
                      if ($i == $currentPage):
                        echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
                      else:
                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                      endif;
                    endfor;
                    ?>

                    <?php if ($currentPage < $totalPages): ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a></li>
                    <?php endif; ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <?php if (isset($data) && is_iterable($data)): ?>
    <?php foreach($data as $row): ?>
      <div class="modal fade" id="edit<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Data Penduduk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open('dashboard/kependudukan/EditData/' . $row['id'], ['enctype' => 'multipart/form-data']); ?>
            <div class="modal-body">
              <!-- Form fields -->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>
              </div>
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?= htmlspecialchars($row['nik']); ?>" required>
              </div>
              <div class="form-group">
                <label for="no_kk">No. KK</label>
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?= htmlspecialchars($row['no_kk']); ?>" required>
              </div>
              <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?= htmlspecialchars($row['nama_ayah']); ?>" required>
              </div>
              <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= htmlspecialchars($row['nama_ibu']); ?>" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($row['alamat']); ?>" required>
              </div>
              <div class="form-group">
                <label for="dusun">Dusun</label>
                <input type="text" class="form-control" id="dusun" name="dusun" value="<?= htmlspecialchars($row['dusun']); ?>" required>
              </div>
              <div class="form-group">
                <label for="rw">RW</label>
                <input type="number" class="form-control" id="rw" name="rw" value="<?= htmlspecialchars($row['rw']); ?>" required>
              </div>
              <div class="form-group">
                <label for="rt">RT</label>
                <input type="number" class="form-control" id="rt" name="rt" value="<?= htmlspecialchars($row['rt']); ?>" required>
              </div>
              <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" value="<?= htmlspecialchars($row['umur']); ?>" required>
              </div>
              <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= htmlspecialchars($row['pekerjaan']); ?>" required>
              </div>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>

      <!-- Modal Hapus Data -->
      <div class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Konfirmasi Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open('dashboard/kependudukan/HapusData/' . $row['id']); ?>
            <div class="modal-body">
              <p>Anda yakin ingin menghapus data penduduk dengan NIK <strong><?= htmlspecialchars($row['nik']); ?></strong>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(function() {
                flashMessage.style.opacity = '0';
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 500);
            }, 3000);
        }
    });
  </script>
</body>
