<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Pengajuan Cuti</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <div id="alert"></div>
          <form id="inputForm" enctype="multipart/form-data">
            <div id="idForm" class="form-group">
              <label>Pengajuan ID</label>
              <input type="number" class="form-control" name="id" id="id" readonly>
            </div>            
            <div class="form-group">
              <label>Jenis Cuti</label>
              <select class="form-control" name="jenis_cuti" id="jenis_cuti" required>
                <option value="Tahunan">Cuti Tahunan</option>
                <option value="Sakit">Cuti Sakit</option>
                <option value="Penting">Cuti Penting</option>
                <option value="Hamil">Cuti Hamil</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Pengajuan</label>
              <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" required>
            </div>
            <div class="form-group">
              <label>Lama Cuti</label>
              <input type="number" class="form-control" min="0" max="" name="lama_cuti" id="lama_cuti" required>
            </div>
            <div class="form-group">
              <label>Mulai</label>
              <input type="date" class="form-control" name="mulai" id="mulai" required>
            </div>
            <div class="form-group">
              <label>Hingga</label>
              <input type="date" class="form-control" name="hingga" id="hingga" required>
            </div>
            <div class="form-group" id="file_upload">
              <label>File</label>
              <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="file">
                <label class="custom-file-label">Choose file</label>
              </div>
            </div>
            <button type="button" class="btn btn-success" id="add">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
