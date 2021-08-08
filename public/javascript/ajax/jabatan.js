$("#modal_button").click(function(){
  $("#idForm").css("display", "none");
  $("#title").text("Edit Data Unit");
  $("#id").val(null);
  $("#nama_jabatan").val(null);
  $('#alert').html('');
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  var table = $('#jabatan_table').DataTable( {
    processing: true,
    autoWidth: false,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "api/jabatan",
      dataSrc: ""
    },
    order: [ 0, "desc" ],
    columns: [
      {
        data: "id",
        className: "align-middle",
      },
      {
        data: "nama_jabatan",
        className: "align-middle",
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

$(document).on('click', '#add', function(){
  var nama_jabatan = $('#nama_jabatan').val();
  if(nama_jabatan != '')
  {
    $.ajax({
      url: "/api/jabatan",
      method: "POST",
      data: {nama_jabatan:nama_jabatan},
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#jabatan_table').DataTable().ajax.reload();
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
    url: `/api/jabatan/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $("#idForm").css("display", "block");
      $("#title").text("Edit Data");
      $('#modal').modal('toggle');
      $('#add').attr("id", "update");
      $("#id").val(data.id);
      $("#nama_jabatan").val(data.nama_jabatan);
    }
  });
}

$(document).on('click', '#update', function(){
  var id = $('#id').val();
  var nama_jabatan = $('#nama_jabatan').val();
  if(nama_jabatan != '')
  {
    $.ajax({
      url: `/api/jabatan/${id}`,
      method: "PUT",
      data: {nama_jabatan:nama_jabatan},
      success:function(data)
      {
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Oke",
        });
        $('#modal').modal('toggle');
        $('#jabatan_table').DataTable().ajax.reload();
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
        url: `/api/jabatan/${id}`,
        method: "DELETE",
        data: {},
        success:function(data)
        {
          $('#unit_table').DataTable().ajax.reload();
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
