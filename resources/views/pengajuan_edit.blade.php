<div class="modal fade" id="pengajuan_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="pengajuan_edit" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Janis Cuti</label>
            <select class="form-control jenis_cuti" name="jenis_cuti" id="jenis_cuti" required>
              <option value="Tahunan">Cuti Tahunan</option>
              <option value="Sakit">Cuti Sakit</option>
              <option value="Penting">Cuti Penting</option>
              <option value="Hamil">Cuti Hamil</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Pengajuan</label>
            <input type="date" class="form-control tanggal_pengajuan" name="tanggal_pengajuan">
          </div>
          <div class="form-group">
            <label>Lama Cuti</label>
            <input type="number" class="form-control lama_cuti" name="lama_cuti">
          </div>
          <div class="form-group">
            <label>Mulai</label>
            <input type="date" class="form-control mulai" name="mulai">
          </div>
          <div class="form-group">
            <label>Hingga</label>
            <input type="date" class="form-control hingga" name="hingga">
          </div>
          <div class="form-group" id="upload_file">
            <label for="">Upload dokument pendukung</label>
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile"></label>
            </div>
            <label for="" class="text-danger"> <i>Jika memilih cuti tahunan, tidak perlu upload file</i> </label>
          </div>
          <button type="submit" class="btn btn-primary simpan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
