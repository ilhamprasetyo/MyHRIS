<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Karyawan</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Content -->
  <section id="karyawan">
    <div class="container-fluid">
      <div class="card p-3">
        <!-- Title -->
        <div class="mb-3">
          <h1 class="display-4">Karyawan</h1>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap" id="karyawan_table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Cuti</th>
              <th scope="col">Foto</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/karyawan.js"></script>
  <script type="text/javascript" src="javascript/ajax/user.js"></script>

</body>
</html>
