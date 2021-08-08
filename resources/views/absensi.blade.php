<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  @include('style')

  <title>CutiKu - Approval</title>
</head>
<body onload="date_time()">

  <!-- Navbar -->
  @include('navbar')

  <!-- Content -->
  <section id="absensi">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Form Title -->
        <div class="text-center mb-3">
          <h1 class="display-4">Absensi</h1>
        </div>

        <div class="card bg-light mb-3">
          <div class="p-3">
            <div class="row text-center">
              <div class="col m-auto">
                <div class="card bg-danger text-white">
                  <div class="p-3">
                    <h1 id="time_now"></h1>
                    <h5 id="date_now"></h5>
                  </div>
                </div>
              </div>
              <div class="col m-auto">
                <div class="row">
                  <div class="col">
                    <h5>08:00 - 09:00</h5>
                    <button type="button" class="btn btn-primary d-block w-100 p-3" id="absen_masuk" disabled>Clock In</button>
                  </div>
                  <div class="col">
                    <h5>16:00</h5>
                    <button type="button" class="btn btn-primary d-block w-100 p-3" id="absen_pulang" disabled>Clock Out</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <table class="table table-borderless table-hover text-nowrap" id="absensi_table">
          <thead class="bg-secondary text-white">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Clock In</th>
              <th scope="col">Clock Out</th>
              <th scope="col">Date</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-light">
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Revisi Modal -->
  <section>
    <div class="modal fade dark" id="modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title">Pengajuan Revisi Absensi</h5>
            <button type="button" class="close bg-danger" data-dismiss="modal">
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="card-body">
              <div id="alert"></div>
              <form id="inputForm">
                <div class="form-group">
                  <label>Absensi ID</label>
                  <input type="text" class="form-control" id="id" disabled>
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
                <button type="button" class="btn btn-success bi bi-save" id="add"> Simpan</button>
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

  <script type="text/javascript" src="javascript/ajax/absensi.js"></script>
  <script type="text/javascript" src="javascript/ajax/user.js"></script>
</body>
</html>
