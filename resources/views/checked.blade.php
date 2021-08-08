<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>CutiKu - Checked</title>
</head>
<body>
  <div class="fixed-top" align="center">
    @include('messages')
  </div>

  <section class="content" id="checked">
    <div class="container">
      <div class="mb-3 p-1 text-center">
        <h1 class="display-4">Registrasi Akun</h1>
      </div>
      <div class="card p-3">

        <div class="row">

          <div class="col-md-6 col-sm-12 m-auto">
            <div class="biodata mobile p-3">
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>ID</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->id }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Nama</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Alamat</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->alamat }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 p-1">
                  <strong>Unit</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama_unit }}
                </div>
              </div>
              <div class="row">
                <div class="col-3 p-1">
                  <strong>Jabatan</strong>
                </div>
                <div class="col-1 p-1">
                  <strong>:</strong>
                </div>
                <div class="col p-1">
                  {{ $pegawai->nama_jabatan }}
                </div>
              </div>
            </div>
          </div>

          <div class="col m-auto">
            <div class="signup mobile p-3">
              <div class="mb-3">
                <form method="head" action="/registered">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="pegawai_id" value="{{ $pegawai->id }}">
                  </div>
                  <div class="form-group">
                    <label>Email :</label>
                    <input type="Email" class="form-control" name="email" placeholder="Your email" required>
                  </div>
                  <div class="form-group">
                    <label>Password :</label>
                    <input type="Password" class="form-control" name="password" placeholder="Your password" required>
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="unit_id" value="{{ $pegawai->unit_id }}">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="jabatan_id" value="{{ $pegawai->jabatan_id }}">
                  </div>
                  <button type="submit" class="btn btn-success">Registrasi</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <a href="/check" class="btn btn-dark">Kembali</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>
