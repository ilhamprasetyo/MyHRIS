$("#modal_button").click(function(){
  $("#idForm").css("display", "none");
  $("#cutiForm").css("display", "none");
  $("#title").text("Tambah Data Pegawai");
  $("#id").val(null);
  $("#nama").val(null);
  $("#alamat").val(null);
  $("#unit_id").val(null);
  $("#jabatan_id").val(null);
  $("#cuti").val(null);
  $('#alert').html('');
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  var table = $('#pegawai_table').DataTable( {
    processing: true,
    autoWidth: false,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "api/pegawai",
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
        data: "alamat",
        className: "align-middle",
        orderable: false
      },
      {
        data: "nama_unit",
        className: "align-middle",
        orderable: false
      },
      {
        data: "nama_jabatan",
        className: "align-middle",
        orderable: false
      },
      {
        data: "cuti",
        className: "align-middle",
        orderable: false,
        searchable: false
      },
      {
        data: "file",
        className: "align-middle",
        orderable: false,
        render: function(data, type, row, meta){
          if(type === 'display') {
            if(data === null) {
              data = ''
            } else {
              data = '<img class="photo" src="storage/images/' + data + '">';
            }
          }

          return data;
        }
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, row, meta){
          if(type === 'display'){
            data = '<div class="btn-group"><button class="btn btn-warning bi bi-pencil-fill" data-id="' + data + '" onclick="editData(event.target)" type="button"> Edit</button><button class="btn btn-danger bi bi-trash-fill" data-id="' + data + '" onclick="confirmDelete(event.target)" type="button"> Delete</button></div>';
          }

          return data;
        }
      },
    ]
  });
});

$(document).ready(function() {
  var url = "api/unit";
  fetch(url).then(response => response.json())
  .then(function(data){
    var template = data.map(data => {
      return `
      <option value="${data.id}">${data.nama_unit}</option>
      `;
    });

    document.getElementById("unit_id").innerHTML = template.join('<br>');
  }).catch(function(e){
    alert("Data Error");
  });
});

$(document).ready(function() {
  var url = "api/jabatan";
  fetch(url).then(response => response.json())
  .then(function(data){
    var template = data.map(data => {
      return `
      <option value="${data.id}">${data.nama_jabatan}</option>
      `;
    });

    document.getElementById("jabatan_id").innerHTML = template.join('<br>');
  }).catch(function(e){
    alert("Data Error");
  });
});

$(document).on('click', '#add', function(){
  var nama = $('#nama').val();
  var alamat = $('#alamat').val();
  var unit_id = $('#unit_id').val();
  var jabatan_id = $('#jabatan_id').val();
  var cuti = 12;
  if(nama != '')
  {
    $.ajax({
      url: "/api/pegawai",
      method: "POST",
      data: {nama:nama, alamat:alamat, unit_id:unit_id, jabatan_id:jabatan_id, cuti:cuti},
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#pegawai_table').DataTable().ajax.reload();
        $('#inputForm')[0].reset();
      }
    });
  }
  else
  {
    $('#alert').html("<div class='alert alert-danger'>All Fields are required</div>");
    $("#alert").fadeIn();
    setInterval(function(){
      $("#alert").fadeOut();
    }, 3000);
  }
});

function editData(event){
  var id  = $(event).data("id");
  $.ajax({
    url: `/api/pegawai/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $("#idForm").css("display", "block");
      $("#title").text("Edit Data Pegawai");
      $('#modal').modal('toggle');
      $('#add').attr("id", "update");
      $("#id").val(data.id);
      $("#nama").val(data.nama);
      $("#alamat").val(data.alamat);
      $("#unit_id").val(data.unit_id);
      $("#jabatan_id").val(data.jabatan_id);
      $("#cuti").val(data.cuti);
    }
  });
}

$(document).on('click', '#update', function(){
  var id = $('#id').val();
  var nama = $('#nama').val();
  var alamat = $('#alamat').val();
  var unit_id = $('#unit_id').val();
  var jabatan_id = $('#jabatan_id').val();
  var cuti = $('#cuti').val();
  if(nama != '')
  {
    $.ajax({
      url: `/api/pegawai/${id}`,
      method: "PUT",
      data: {nama:nama, alamat:alamat, unit_id:unit_id, jabatan_id:jabatan_id, cuti:cuti},
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#pegawai_table').DataTable().ajax.reload();
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
        url: `/api/pegawai/${id}`,
        method: "DELETE",
        data: {},
        success:function(data)
        {
          $('#pegawai_table').DataTable().ajax.reload();
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
