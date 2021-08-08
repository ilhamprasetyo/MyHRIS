<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Approval</title>
</head>
<body>

  <!-- Navbar -->
  @include('navbar')

  <!-- Content -->
  <section id="revisi">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Form Title -->
        <div class="form-inline mb-3">
          <div class="ml-0 mr-auto">
            <h1 class="display-4">Revisi</h1>
          </div>
          <div class="mr-3">
            <button type="button" class="btn btn-success bi bi-plus-lg" data-toggle="modal" data-target="#modal" id="request"> Request Attendace</button>
          </div>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap" id="revisi_table">
          <thead class="bg-secondary text-white">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Absensi ID</th>
              <th scope="col">Clock In</th>
              <th scope="col">Clock Out</th>
              <th scope="col">Date</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Approval Koordinator</th>
              <th scope="col">Approval HRD</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-light">
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Modal Edit Revisi -->
  <section>
    <div class="modal fade dark" id="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title">Edit Pengajuan Revisi</h5>
            <button type="button" class="close bg-danger" data-dismiss="modal">
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <div id="alert"></div>
              <form id="inputForm">
                <div class="form-group" id="form_id">
                  <label>ID</label>
                  <input type="text" class="form-control" id="id" disabled>
                </div>
                <div class="form-group" id="form_absensi_id">
                  <label>Absensi ID</label>
                  <input type="text" class="form-control" id="absensi_id" disabled>
                </div>
                <div class="form-group" id="form_pegawai_id">
                  <label>Pegawai ID</label>
                  <input type="text" class="form-control" id="pegawai_id" disabled>
                </div>
                <div class="form-group">
                  <label>Clock In</label>
                  <input type="time" class="form-control" name="clock_in" id="clock_in">
                </div>
                <div class="form-group">
                  <label>Clock Out</label>
                  <input type="time" class="form-control" name="clock_out" id="clock_out">
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group">
                  <label>Ketarangan</label>
                  <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                </div>
                <button type="button" class="btn btn-success bi bi-save" id="update"> Simpan</button>
                <button type="reset" class="btn btn-danger bi bi-x-square"> Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Javascript -->
  @include('javascript')

  <script type="text/javascript" src="javascript/ajax/revisi.js"></script>
  <script type="text/javascript" src="javascript/ajax/user.js"></script>
</body>
</html>
