<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Berita</h1>
            <div id="flash-message" class="alert alert-success">
                Berhasil menambahkan berita!
            </div>
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
                    <tr>
                      <td>1</td>
                      <td>Judul Berita Pertama</td>
                      <td>judul-berita-pertama</td>
                      <td>Ini adalah isi berita pertama.</td>
                      <td><img src="uploads/contoh_gambar.jpg" alt="contoh_gambar.jpg" width="100"></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit1"><i class="fa fa-pencil-alt"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete1"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Judul Berita Kedua</td>
                      <td>judul-berita-kedua</td>
                      <td>Ini adalah isi berita kedua.</td>
                      <td><img src="uploads/contoh_gambar2.jpg" alt="contoh_gambar2.jpg" width="100"></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit2"><i class="fa fa-pencil-alt"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete2"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
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
</html>
