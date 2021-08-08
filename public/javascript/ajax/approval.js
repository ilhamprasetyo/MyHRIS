$("#modal_button").click(function(){
  $("#idForm").css("display", "none");
  $("#title").text("Approval");
  $("#id").val(null);
  $("#nama").val(null);
  $("#status").val(null);
  $("#keterangan").val(null);
  $("#keterangan_form").css("display", "none");
});

$(document).ready(function() {
  $('#status').change(function(){
    if($(this).val() === "Disetujui") {
      $("#keterangan_form").fadeOut();
    } else {
      $("#keterangan_form").fadeIn();
    }
  });
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  var table = $('#approval_table').DataTable( {
    processing: true,
    responsive: true,
    scrollY: 300,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "/approval_all",
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
      },
      {
        data: "jenis_cuti",
        className: "align-middle",
      },
      {
        data: "tanggal_pengajuan",
        className: "align-middle",
      },
      {
        data: "status",
        className: "align-middle",
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, full){
          if(type === 'display'){
              if (full['status'] === "Disetujui") {
                data = '<div class="btn-group"><button class="btn btn-danger bi bi-pencil-fill" id="batalkan_button" data-id="' + data + '" onclick="batalkan(event.target)" type="button"> Batalkan</button>'
              } else if (full['status'] === "Dibatalkan") {
                data = '';
              } else {
                data = '<div class="btn-group"><button class="btn btn-warning bi bi-pencil-fill" id="approval_button" data-id="' + data + '" onclick="editData(event.target)" type="button"> Approval</button>';
              }
            }

          return data;
        }
      }
    ]
  });
});

function editData(event){
  var id  = $(event).data("id");
  $.ajax({
    url: `/api/pengajuan/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $("#title").text("Approval");
      $("#idForm").css("display", "block");
      $('#add').attr("id", "update");
      $('#modal').modal('toggle');
      $("#id").val(data.id);
      $("#pegawai_id").val(data.pegawai_id);
      $("#nama").val(data.nama);
      $("#jenis_cuti").val(data.jenis_cuti);
      $("#tanggal_pengajuan").val(data.tanggal_pengajuan);
      $("#lama_cuti").val(data.lama_cuti);
      $("#mulai").val(data.mulai);
      $("#hingga").val(data.hingga);
      $("#nama_unit").val(data.nama_unit);
      $("#nama_jabatan").val(data.nama_jabatan);
      if (data.file === null) {
        $("#file_input").hide();
      }
      $("#file").attr("href", "storage/" + data.file);
      $("#status").val(data.status);
      if (data.status === "Disetujui") {
        $("#keterangan_form").css("display", "none");
      }
      if ($(".status_data").text() === "Disetujui") {
        $("#approval_button").css("display", "none");
        $("#batalkan_button").css("display", "display");
      }
      $("#keterangan").val(data.keterangan);
    }
  });
}

$(document).on('click', '#update', function(){
  var id = $('#id').val();
  var status = $('#status').val();
  var keterangan = $('#keterangan').val();
  if(status != "")
  {
    $.ajax({
      url: `/api/approval/${id}`,
      method: "PUT",
      data: {status:status, keterangan:keterangan},
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#approval_table').DataTable().ajax.reload();
        $('#inputForm')[0].reset();
        $('#update').attr("id", "add");
      }
    });
  }
  else
  {
    $('#alert').html("<div class='alert alert-danger'>All fields are required</div>");
    setInterval(function(){
      $("#alert").fadeOut();
    }, 3000);
  }
});

function confirmDelete(event){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var id  = $(event).data("id");
      $.ajax({
        url: `/api/approval/${id}`,
        method: "DELETE",
        data: {},
        success:function(data)
        {
          $('#user_table').DataTable().ajax.reload();
        }
      });

      swal("Poof! Your data has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Delete canceled!");
    }
  });
}

function batalkan(event){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var id  = $(event).data("id");
      $.ajax({
        url: `/api/batalkan/${id}`,
        method: "PUT",
        data: {},
        success:function(data)
        {
          $('#approval_table').DataTable().ajax.reload();
        }
      });

      swal("Poof! Your data has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Delete canceled!");
    }
  });
}
