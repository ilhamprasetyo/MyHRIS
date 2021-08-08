var date = new Date();
var time = date.getTime();

$("#modal_button").click(function(){
  $("#title").text("Pengajuan Cuti");
  $('#update').attr("id", "add");
  $("#idForm").css("display", "none");
  $("#id").val(null);
  $("#jenis_cuti").val(null);
  $("#tanggal_pengajuan").val(null);
  $("#lama_cuti").val(null);
  $("#mulai").val(null);
  $("#hingga").val(null);
  $("#file").val(null);
  $('#alert').html('');
  $("#file_upload").hide();
});

$(document).ready(function() {
  $('#jenis_cuti').change(function(){
    if($(this).val() === "Tahunan") {
      $("#file_upload").fadeOut();
    } else {
      $("#file_upload").fadeIn();
    }
  });
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  var table = $('#user_table').DataTable( {
    processing: true,
    scrollY: 300,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "/pengajuan_user",
      dataSrc: ""
    },
    order: [ 0, "desc" ],
    columns: [
      {
        data: "id",
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
        data: "lama_cuti",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "mulai",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "hingga",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "file",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type){
          if(type === 'display'){
            if (data === null) {

            } else {
              data = '<a class="btn btn-success" href="storage/'+ data +'" target="_blank">Download</a>'
            }
          }
          return data;
        }
      },
      {
        data: "status",
        className: "align-middle",
        searchable: false
      },
      {
        data: "keterangan",
        className: "align-middle",
        orderable: false,
        searchable: false
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, full){
          if(type === 'display'){
            if (full['status'] === "Disetujui" || full['status'] === "Dibatalkan") {
              data = "";
            } else {
              data = '<div class="btn-group"><button class="btn btn-warning bi bi-pencil-fill" data-id="' + data + '" onclick="editData(event.target)" type="button"> Edit</button><button class="btn btn-danger bi bi-trash-fill" data-id="' + data + '" onclick="confirmDelete(event.target)" type="button"> Delete</button></div>';
            }
          }
          return data;
        }
      },
    ]
  });
});

$(document).on('click', '#add', function(){
  var form = $("#inputForm")[0];
  var formData = new FormData(form);
  formData.append("pegawai_id", sessionStorage.getItem("pegawai_id"));
  formData.append("unit_id", sessionStorage.getItem("unit_id"));
  formData.append("jabatan_id", sessionStorage.getItem("jabatan_id"));
  formData.append("number", time);
    $.ajax({
      url: "/api/pengajuan",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success:function(data) {
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#user_table').DataTable().ajax.reload();
        $('#inputForm')[0].reset();
      }
    });
});

function editData(event){
  var id  = $(event).data("id");
  $("#add").attr("id", "update");
  $.ajax({
    url: `/api/pengajuan/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $("#title").text("Edit Data Pengajuan");
      $("#idForm").css("display", "block");
      $('#modal').modal('toggle');
      $('#id').val(data.id);
      $("#jenis_cuti").val(data.jenis_cuti);
      $("#tanggal_pengajuan").val(data.tanggal_pengajuan);
      $("#lama_cuti").val(data.lama_cuti);
      $("#mulai").val(data.mulai);
      $("#hingga").val(data.hingga);
      var date = new Date();
      var time = date.getTime();
      $("#number").val(time);
    }
  });
}

$(document).on('click', '#update', function(){
  var id = $('#id').val();
  var form = $("#inputForm")[0];
  var formData = new FormData(form);
  formData.append("pegawai_id", sessionStorage.getItem("pegawai_id"));
  formData.append("unit_id", sessionStorage.getItem("unit_id"));
  formData.append("jabatan_id", sessionStorage.getItem("jabatan_id"));
  formData.append("number", time);
  if(formData != "")
  {
    $.ajax({
      url: `/api/pengajuan/${id}`,
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#user_table').DataTable().ajax.reload();
        $('#inputForm')[0].reset();
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
        url: `/api/pengajuan/${id}`,
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
