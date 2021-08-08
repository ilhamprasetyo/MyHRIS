<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Profile</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <section class="margin-top" id="profile">
    <div class="container">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3">
          <h1 class="title display-4">Profile</h1>
        </div>

        <!-- Content -->
        <div class="row mobile">

          <!-- Photo Section -->
          <div class="col-md-6 col-sm-12 m-auto text-center">
            <div class="biodata mobile p-3" id="photo_frame">
              <div class="m-auto mb-3">
                <img class="photo-profile img-thumbnail" id="photo">
              </div>
            </div>
          </div>

          <!-- Biodata -->
          <div class="col m-auto">
            <section id="profile_user">

              <div class="biodata mobile p-3 scrollable-content-x">
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Pegawai ID</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="pegawai_id_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Nama</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="nama_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Email</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="email_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Alamat</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="alamat_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Unit</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="unit_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Jabatan</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="jabatan_profile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-3 p-1">
                    <strong>Cuti</strong>
                  </div>
                  <div class="col-1 p-1">
                    <strong>:</strong>
                  </div>
                  <div class="col p-1" id="cuti_profile">
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="m-auto">
          <button type="button" class="btn btn-warning bi bi-pencil" data-toggle="modal" id="id_user" onclick="editData(event.target)"> Ubah Data</button>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="modal fade dark" id="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title">Ubah Data</h5>
            <button type="button" class="close bg-danger text-white p-2" data-dismiss="modal">
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
          <div class="modal-body">

            <!-- Photo -->
            <div class="mb-3" id="view_photo_frame">
              <img class="d-block w-100" id="view_photo">
            </div>

            <!-- Upload Photo -->
            <div class="mb-3">
              <h3>Photo</h3>
              <form id="upload_photo" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                  <div class="p-3">
                    <div class="custom-file mb-3">
                      <input type="file" name="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="text-right">
                      <div>
                        <button type="button" class="btn btn-success bi bi-upload" id="update_photo"> Upload</button>
                        <button type="button" class="btn btn-danger bi bi-trash" id="delete_photo" disabled> Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <!-- Update Data -->
            <div>
              <div id="alert"></div>
              <h3>Data</h3>
              <form id="inputForm">
                <div class="card">
                  <div class="p-3">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="text-right">
                      <button type="button" class="btn btn-success bi bi-save" id="update"> Simpan</button>
                      <button type="reset" class="btn btn-danger bi bi-x-square"> Reset</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/profile.js"></script>
  <script type="text/javascript" src="javascript/ajax/user.js"></script>


</body>
</html>
