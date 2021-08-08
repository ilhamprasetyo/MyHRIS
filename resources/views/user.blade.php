<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Home User</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Pengajuan Modal -->
  @include('pengajuan_modal')

  <!-- Content -->
  <section id="user">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Title -->
        <div class="form-inline mb-3">
          <div class="ml-0 mr-auto">
            <h1 class="display-4">Cuti Saya</h1>
          </div>
          <div class="form-inline mr-0 align-middle">
            <div class="p-2 mr-1">
              <span>Cuti : <b id="cuti_user"></b> hari</span>
            </div>
            <div class="mr-3">
              <button type="button" class="btn btn-success bi bi-plus-lg" data-toggle="modal" data-target="#modal" id="modal_button"> Pengajuan Cuti</button>
            </div>
          </div>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap text-center" id="user_table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Jenis</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lama</th>
              <th scope="col">Mulai</th>
              <th scope="col">Hingga</th>
              <th scope="col">Lampiran</th>
              <th scope="col">Status</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/user.js"></script>
  <script type="text/javascript" src="javascript/ajax/pengajuan_user.js"></script>

</body>
</html>
