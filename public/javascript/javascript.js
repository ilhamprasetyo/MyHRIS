// Index Welcome Modal
$(document).ready(function() {
  if ($.cookie('disable') == null) {
    $('#welcome_message').modal('show');
    $.cookie('disable', '1');
  }
});

// DataTable
$(document).ready( function () {
  $('#table_id').DataTable({
    scrollX: true,
    scrollY: 300,
  })
});

// Popover
$(function () {
  $('[data-toggle="popover"]').popover()
})

$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

setInterval(function(){
  $('#messages').fadeOut();
}, 3000);

$(document).ready(function(){
    $('#jenis_cuti').on('change', function() {
      if ( this.value !== 'Tahunan') {
        $("#upload_file").show();
      } else {
        $("#upload_file").hide();
      }
    });
});


// Pegawai
$('#pegawai_edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nama = button.data('nama')
  var email = button.data('email')
  var alamat = button.data('alamat')
  var unit_id = button.data('unit_id')
  var jabatan_id = button.data('jabatan_id')
  var cuti = button.data('cuti')
  var simpan = button.data('simpan')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama').val(nama)
  modal.find('.email').val(email)
  modal.find('.alamat').val(alamat)
  modal.find('.unit_id').val(unit_id)
  modal.find('.jabatan_id').val(jabatan_id)
  modal.find('.cuti').val(cuti)
  modal.find('.simpan').closest("form").attr("action", simpan)
})


// Unit
$('#unit_edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  var nama_unit = button.data('nama_unit')
  var simpan = button.data('simpan')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama_unit').val(nama_unit)
  modal.find('.simpan').closest("form").attr("action",simpan)
})


// Jabatan
$('#jabatan_edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attribute
  var nama_jabatan = button.data('nama_jabatan')
  var simpan = button.data('simpan')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.nama_jabatan').val(nama_jabatan)
  modal.find('.simpan').closest("form").attr("action",simpan)
})



// Pengajuan
$('#pengajuan_edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var jenis_cuti = button.data('jenis_cuti')
  var tanggal_pengajuan = button.data('tanggal_pengajuan')
  var lama_cuti = button.data('lama_cuti')
  var mulai = button.data('mulai')
  var hingga = button.data('hingga')
  var hingga = button.data('hingga')
  var simpan = button.data('simpan')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)

  modal.find('.jenis_cuti').val(jenis_cuti)
  modal.find('.tanggal_pengajuan').val(tanggal_pengajuan)
  modal.find('.lama_cuti').val(lama_cuti)
  modal.find('.mulai').val(mulai)
  modal.find('.hingga').val(hingga)
  modal.find('.simpan').closest("form").attr("action",simpan)
});



// Approval
$('#rincian').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id') // Extract info from data-* attributes
  var pegawai_id = button.data('pegawai_id')
  var nama = button.data('nama')
  var tanggal_pengajuan = button.data('tanggal_pengajuan')
  var lama_cuti = button.data('lama_cuti')
  var mulai = button.data('mulai')
  var hingga = button.data('hingga')
  var unit_id = button.data('unit_id')
  var nama_unit = button.data('nama_unit')
  var jabatan_id = button.data('jabatan_id')
  var nama_jabatan = button.data('nama_jabatan')
  var status = button.data('status')
  var keterangan = button.data('keterangan')
  var simpan = button.data('simpan')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.id').val(id)
  modal.find('.pegawai_id').val(pegawai_id)
  modal.find('.nama').val(nama)
  modal.find('.tanggal_pengajuan').val(tanggal_pengajuan)
  modal.find('.lama_cuti').val(lama_cuti)
  modal.find('.mulai').val(mulai)
  modal.find('.hingga').val(hingga)
  modal.find('.unit_id').val(unit_id)
  modal.find('.nama_unit').val(nama_unit)
  modal.find('.jabatan_id').val(jabatan_id)
  modal.find('.nama_jabatan').val(nama_jabatan)
  modal.find('.status').val(status)
  modal.find('.keterangan').val(keterangan)
  modal.find('.simpan').closest("form").attr("action",simpan)
})



// Delete
$('#delete').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var hapus = button.data('hapus') // Extract info from data-* attributes

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.hapus').closest("form").attr("action",hapus)
});
