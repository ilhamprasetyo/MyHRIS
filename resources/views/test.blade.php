<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS CDN and  Custom CSS -->
  @include('style')

  <title>Review</title>
</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="note"></div>
          <form id="inputForm">
            <div id="idForm" class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" name="id" id="id" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
              <label>Ulasan</label>
              <textarea type="text" class="form-control" name="message" id="message" required></textarea>
            </div>
            <button type="button" class="hide_button btn btn-success" id="add">Simpan</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <section class="mt-3">
    <div class="container-fluid">
      <div class="card p-3">

        <!-- Title -->
        <div class="mb-3">
          <h1 class="title display-4">Review</h1>
        </div>

        <!-- Button trigger modal -->
        <div class="mb-3">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" id="button_hide">
            Make Review
          </button>
        </div>

        <!-- Table -->
        <table class="table table-hover text-nowrap" id="myTable">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Message</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="bg-light">
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CDN Javascript dan Custom Javascript -->
  @include('behavior')

  <script type="text/javascript">

  $("#button_hide").click(function(){
    $("#idForm").css("display", "none");
    $("#exampleModalLabel").text("Make Review");
    $("#id").val(null);
    $("#name").val(null);
    $("#email").val(null);
    $("#message").val(null);
  });

  $("#button_hide").click(function(){
    $('#note').html('');
  });

  $(document).ready( function () {
    $(document).on('click', '#add', function(){
      var name = $('#name').val();
      var email = $('#email').val();
      var message = $('#message').val();
      if(name != '' && email != '' && message != '')
      {
        $.ajax({
          url: "/api/store",
          method:"POST",
          data:{name:name, email:email, message:message},
          success:function(data)
          {
            swal({
              title: "Berhasil!",
              text: "Data telah tersimpan",
              icon: "success",
              button: "Oke",
            });
            $('#exampleModal').modal('toggle');
            $('#myTable').DataTable().ajax.reload();
            $('#inputForm')[0].reset();
          }
        });
      }
      else
      {
        $('#note').html("<div class='alert alert-danger'>All Fields are required</div>");
        setInterval(function(){
          $("#note").fadeOut();
        }, 3000);
      }
    });
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

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var id  = $(event).data("id");
        $.ajax({
          url: `/api/delete/${id}`,
          method:"DELETE",
          data:{},
          success:function(data)
          {
            $('#myTable').DataTable().ajax.reload();
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

  function editData(event){
    var id  = $(event).data("id");
    $.ajax({
      url: `/api/edit/${id}`,
      method: "GET",
      data:{},
      success:function(data)
      {
        $("#dododo").css("display", "block");
        $("#exampleModalLabel").text("Edit Review");
        $('#exampleModal').modal('toggle');
        $('#add').attr("id", "update");
        $("#id").val(data.id);
        $("#name").val(data.name);
        $("#email").val(data.email);
        $("#message").val(data.message);
      }
    });
  }

  $(document).on('click', '#update', function(){
    var id = $('#id').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var message = $('#message').val();
    if(name != '' && email != '' && message != '')
    {
      $.ajax({
        url: `/api/update/${id}`,
        method: "PUT",
        data: {id:id, name:name, email:email, message:message},
        success:function(data)
        {
          swal({
            title: "Berhasil!",
            text: "Data telah diperbaharui",
            icon: "success",
            button: "Oke",
          });
          $('#exampleModal').modal('toggle');
          $('#myTable').DataTable().ajax.reload();
          $('#inputForm')[0].reset();
          $('#update').attr("id", "add");
        }
      });
    }
    else
    {
      $('#note').html("<div class='alert alert-danger'>All fields are required</div>");
      setInterval(function(){
        $("#note").fadeOut();
      }, 3000);
    }
  });

  $(document).ready(function() {
    var table = $('#myTable').DataTable( {
      processing: true,
      responsive: true,
      scrollY: 300,
      lengthMenu: [10, 25, 50, 100],
      ajax: {
        url: "/api/all",
        dataSrc: ""
      },
      order: [ 0, "desc" ],
      columns: [
        {
          data: "id",
          className: "align-middle",
        },
        {
          data: "name",
          className: "align-middle",
        },
        {
          data: "email",
          className: "align-middle",
          orderable: false
        },
        {
          data: "message",
          className: "align-middle",
          orderable: false,
          searchable: false
        },
        {
          data: "id",
          className: "align-middle",
          orderable: false,
          searchable: false,
          render: function(data, type, row, meta){
            if(type === 'display'){
              data = '<div class="btn-group"><button class="btn btn-warning" data-id="' + data + '" onclick="editData(event.target)" type="button">Edit</button><button class="btn btn-danger" data-id="' + data + '" onclick="confirmDelete(event.target)" type="button">Delete</button></div>';
            }

            return data;
          }
        },
      ]
    });
  });

</script>
</body>
</html>
