<div class="modal fade dark" id="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div id="alert"></div>
          <form id="inputForm">
            <div id="idForm" class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id" id="id" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat">
            </div>
            <div class="form-group">
              <label>Unit</label>
              <select class="form-control" name="unit_id" id="unit_id">

              </select>
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="jabatan_id" id="jabatan_id">

              </select>
            </div>
            <div id="cutiForm" class="form-group">
              <label>Cuti</label>
              <input type="text" class="form-control" name="id" id="cuti">
            </div>
            <button type="button" class="btn btn-success" id="add">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
