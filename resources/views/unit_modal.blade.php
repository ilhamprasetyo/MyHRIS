<div class="modal fade dark" id="modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Tambah Unit</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="inputForm">
          <div id="idForm" class="form-group">
            <label>ID</label>
            <input type="text" class="form-control" name="id" id="id" readonly>
          </div>
          <div class="form-group">
            <label>Nama Unit</label>
            <input type="text" class="form-control" name="nama_unit" id="nama_unit">
          </div>
          <button type="button" class="btn btn-success" id="add">Simpan</button>
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
