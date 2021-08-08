<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Admin</title>
</head>
<body>
  <section id="pengajuan">

    <!-- Navbar -->
    @include('navbar_admin')

    <!-- Content -->
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3">
          <h1 class="display-4">Pengajuan</h1>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap text-center" id="pengajuan_table">
          <thead class="bg-secondary text-white">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Lama Cuti</th>
              <th scope="col">Mulai</th>
              <th scope="col">Hingga</th>
              <th scope="col">Unit</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody class="bg-light">
          </tbody>
        </table>
      </div>
    </div>

  </section>

  <!-- Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/pengajuan.js">

  </script>
</body>
</html>
