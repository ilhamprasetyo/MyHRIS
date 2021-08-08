<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and Custom CSS -->
  @include('style')

  <title>CutiKu - Approval</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Content -->
  <section id="approval">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Form Title -->
        <div class="mb-3">
          <h1 class="display-4">Approval Cuti</h1>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap" id="approval_table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama</th>
              <th scope="col">Jenis</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Rincian Pengajuan -->
    @include('approval_modal')

  </section>

  <!-- Javascript CDN and Custom Javascript -->
  @include('javascript')

<script type="text/javascript" src="javascript/ajax/approval.js"></script>
<script type="text/javascript" src="javascript/ajax/user.js"></script>
</body>
</html>
