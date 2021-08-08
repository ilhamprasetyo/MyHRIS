<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Admin</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar_admin')

  <!-- Modal form input pegawai -->
  @include('pegawai_modal')

  <!-- Content -->
  <section>
    <div class="container-fluid">
      <div class="card p-3">

          <!-- Title -->
          <div class="mb-3 form-inline">
            <div class="ml-0 mr-auto">
              <h1 class="display-4">Pegawai</h1>
            </div>
            <div class="mr-0">
              <button type="button" class="btn btn-success bi bi-plus-lg" data-toggle="modal" data-target="#modal" id="modal_button"> Add Data</button>
            </div>
          </div>

          <!-- Table -->
          <table class="table table-borderless table-hover text-nowrap text-center" id="pegawai_table">
            <thead class="bg-secondary text-white">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Unit</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Cuti</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-light">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/pegawai.js"></script>

</body>
</html>
