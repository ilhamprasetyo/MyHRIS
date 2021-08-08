$(document).ready(function() {
  var id = sessionStorage.getItem("pegawai_id");
  var table = $('#revisi_table').DataTable( {
    processing: true,
    responsive: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: `api/revisi/${id}`,
      dataSrc: ""
    },
    order: [ 0, "desc" ],
    columns: [
      {
        data: "id",
        className: "align-middle",
      },
      {
        data: "absensi_id",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "clock_in",
        className: "align-middle",
      },
      {
        data: "clock_out",
        className: "align-middle",
      },
      {
        data: "date",
        className: "align-middle",
      },
      {
        data: "keterangan",
        className: "align-middle",
      },
      {
        data: "approval_koordinator",
        className: "align-middle",
      },
      {
        data: "approval_hrd",
        className: "align-middle",
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, full){
          if(type === 'display'){
            data_row = '<div class="btn-group"><button class="btn btn-warning bi bi-pencil-fill" data-id="' + data + '" onclick="editRevisi(event.target)" type="button"> Edit Revisi</button>';
          }
          var revisi_id = sessionStorage.setItem("revisi_id", data);
          return data_row;
        }
      },
    ]
  });
});

$(document).ready(function() {
  var unit_id = sessionStorage.getItem("unit_id");
  var table = $('#approval_revisi_table').DataTable( {
    processing: true,
    responsive: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: `api/approval_revisi_all/${unit_id}`,
      dataSrc: ""
    },
    order: [ 0, "desc" ],
    columns: [
      {
        data: "id",
        className: "align-middle",
      },
      {
        data: "nama",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "clock_in",
        className: "align-middle",
      },
      {
        data: "clock_out",
        className: "align-middle",
      },
      {
        data: "date",
        className: "align-middle",
      },
      {
        data: "keterangan",
        className: "align-middle",
      },
      {
        data: "approval_koordinator",
        className: "align-middle",
      },
      {
        data: "approval_hrd",
        className: "align-middle",
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, full){
          if(type === 'display'){
            if(full['approval_koordinator'] === "Disetujui" && full['approval_hrd'] === "Disetujui") {
              data = '';
            } else {
              data = '<div class="btn-group"><select class="form-control" data-id="' + data + '" onchange="approval(event.target)" id="approval"><option></option><option value="Disetujui">Disetujui</option><option value="Tidak Disetujui">Tidak Disetujui</option><option value="Dibatalkan">Dibatalkan</option></select></div>';
            }
            }
          return data;
        }
      }
    ]
  });
});

function approval(event){
  swal({
    title: "Apakah anda yakin?",
    text: "Anda akan menyetujui pengajuan revisi ini?",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var id  = $(event).data("id");
      var pegawai_id  = sessionStorage.getItem('pegawai_id');
      var status = $('#approval').val();
      var jabatan_id = 3;
      $.ajax({
        url: `/api/approval_revisi/${id}`,
        method: "PUT",
        data:{status:status, jabatan_id:jabatan_id, pegawai_id:pegawai_id},
        success:function(data)
        {
          swal({
            title: "Berhasil!",
            text: "Pengajuan telah disetujui  ",
            icon: "success",
            button: "Oke",
          })
          .then((value) =>{
            $('#approval_revisi_table').DataTable().ajax.reload();
          });
        }
      });
    } else {
      swal("Approval canceled!");
    }
  });

}

function editRevisi(event){
  var id  = $(event).data("id");
  $.ajax({
    url: `/api/revisi_get/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $('#modal').modal('toggle');
      $('#form_id').show();
      $('#form_absensi_id').show();
      $('#form_pegawai_id').show();
      $("#id").val(data.id);
      $("#absensi_id").val(data.absensi_id);
      $("#pegawai_id").val(data.pegawai_id);
      $("#clock_in").val(data.clock_in);
      $("#clock_out").val(data.clock_out);
      $("#date").val(data.date);
      $("#keterangan").val(data.keterangan);
    }
  });
}

$("#request").click(function(){
  $('#form_id').hide();
  $('#form_absensi_id').hide();
  $('#form_pegawai_id').hide();
  $("#id").val("");
  $("#clock_in").val("");
  $("#clock_out").val("");
  $("#date").val("");
  $("#keterangan").val("");
  $("#update").attr("id", "add");
});

$(document).on('click', '#add', function(){
  var pegawai_id = sessionStorage.getItem("pegawai_id");
  var clock_in = $("#clock_in").val();
  var clock_out = $("#clock_out").val();
  var date = $("#date").val();
  var keterangan = $("#keterangan").val();
    $.ajax({
      url: "/api/revisi",
      method: "POST",
      data: {pegawai_id:pegawai_id, clock_in:clock_in, clock_out:clock_out, date:date, keterangan:keterangan},
      success:function(data) {
        $('#modal').modal('toggle');
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        })
        .then((value) => {
          $('#revisi_table').DataTable().ajax.reload();
        });
      }
    });
});

$(document).on('click', '#update', function(){
  var id = $("#id").val();
  var clock_in = $("#clock_in").val();
  var clock_out = $("#clock_out").val();
  var date = $("#date").val();
  var keterangan = $("#keterangan").val();
    $.ajax({
      url: `/api/revisi/${id}`,
      method: "PUT",
      data: {clock_in:clock_in, clock_out:clock_out, date:date, keterangan:keterangan},
      success:function(data) {
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#revisi_table').DataTable().ajax.reload();
      }
    });
});
