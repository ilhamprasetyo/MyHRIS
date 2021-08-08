<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Approval</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="alert"></div>
        <form id="inputForm">
          <div class="form-group">
            <label>ID Pengajuan : </label>
            <input type="text" class="form-control" id="id" disabled>
          </div>
          <div class="form-group">
            <label>Nama : </label>
            <input type="text" class="form-control" id="nama" disabled>
          </div>
          <div class="form-group">
            <label>Jenis Cuti : </label>
            <input type="text" class="form-control" id="jenis_cuti" disabled>
          </div>
          <div class="form-group">
            <label>Tanggal Pengajuan : </label>
            <input type="text" class="form-control" id="tanggal_pengajuan" disabled>
          </div>
          <div class="form-group">
            <label>Lama Cuti : </label>
            <input type="text" class="form-control" id="lama_cuti" disabled>
          </div>
          <div class="form-group">
            <label>Mulai : </label>
            <input type="text" class="form-control" id="mulai" disabled>
          </div>
          <div class="form-group">
            <label>Hingga : </label>
            <input type="text" class="form-control" id="hingga" disabled>
          </div>
          <div class="form-group">
            <label>Unit : </label>
            <input type="text" class="form-control" id="nama_unit" disabled>
          </div>
          <div class="form-group">
            <label>Jabatan : </label>
            <input type="text" class="form-control" id="nama_jabatan" disabled>
          </div>
          <div class="form-group" id="file_input">
            <label>Lampiran :</label><br>
            <a class="btn btn-success" id="file" target="_blank">Download</a>
          </div>
          <div class="form-group">
            <label>Status : </label>
            <select class="form-control status" name="status" id="status">
              <option value="Disetujui">Disetujui</option>
              <option value="Tidak Disetujui">Tidak Disetujui</option>
              <option value="Dibatalkan">Dibatalkan</option>
            </select>
          </div>
          <div id="keterangan_form">
            <div class="form-group">
              <label>Keterangan : </label>
              <textarea class="form-control keterangan" name="keterangan" id="keterangan"></textarea>
            </div>
          </div>
          <button type="button" class="btn btn-primary" id="add">Simpan</button>
        </form>
      </div>
        </div>
      </div>
    </div>
  </div>
