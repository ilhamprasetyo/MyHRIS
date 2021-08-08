$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
      $('#modal').modal('toggle');
      $("#id").val(data.id);
      $("#nama").val(data.nama);
      $("#alamat").val(data.alamat);
      if (data.file !== null) {
        $("#delete_photo").removeAttr("disabled");
      }
    }
  });
}

$(document).on('click', '#update', function(){
  var id = sessionStorage.getItem("pegawai_id");
  var nama = $('#nama').val();
  var alamat = $('#alamat').val();
  if(nama != '' && alamat != '')
  {
    $.ajax({
      url: `api/profile/${id}`,
      method: "PUT",
      data: {nama:nama, alamat:alamat},
      success:function(data)
      {
        $('#modal').modal('toggle');
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Okay"
        })
        .then((value) => {
          location.reload();
        });
      }
    });
  }
  else
  {
    var alert = $('#alert').html("<div class='alert alert-danger'>All fields are required</div>").fadeIn();
    $("#alert").delay(3000).fadeOut();
  }
});

$(document).on('click', '#update_photo', function(){
  var id = sessionStorage.getItem("pegawai_id");
  var form = $('#upload_photo')[0];
  var formData = new FormData(form);
    $.ajax({
      url: `api/upload_photo/${id}`,
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success:function(data)
      {
        $('#modal').modal('toggle');
        swal({
          title: "Berhasil!",
          text: "Data telah diperbaharui",
          icon: "success",
          button: "Okay"
        })
        .then((value) => {
          location.reload();
        });
      }
    });
});

$(document).on('click', '#delete_photo', function(){
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var id = sessionStorage.getItem("pegawai_id");
      $.ajax({
        url: `api/delete_photo/${id}`,
        method: "DELETE",
        data: {},
        success:function(data)
        {
          location.reload();
          $('#modal').modal('toggle');
        }
      });
      swal("Poof! Your data has been deleted!", {
        icon: "success",
      });
    } else {
      swal("Your imaginary file is safe!");
    }
  });
});
