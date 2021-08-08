function date_time() {
  var date = new Date();

  var day = new Array(7);
  day[0] = "Sunday";
  day[1] = "Monday";
  day[2] = "Tuesday";
  day[3] = "Wednesday";
  day[4] = "Thursday";
  day[5] = "Friday";
  day[6] = "Saturday";
  var days1 = day[date.getDay()];

  var days2 = date.getDate();

  var month = new Array();
  month[0] = "January";
  month[1] = "February";
  month[2] = "March";
  month[3] = "April";
  month[4] = "May";
  month[5] = "June";
  month[6] = "July";
  month[7] = "August";
  month[8] = "September";
  month[9] = "October";
  month[10] = "November";
  month[11] = "December";
  var months = month[date.getMonth()];

  var year = date.getFullYear();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();
  $("#time_now").text(hours + ":" + minutes + ":" + seconds);
  $("#date_now").text(days1 + ", " + days2 + " " + months + " " + year);
  setTimeout(date_time, 1000);
}


$("#modal_button").click(function(){
  $("#idForm").css("display", "none");
  $("#title").text("Edit Data Unit");
  $("#id").val(null);
  $("#nama_unit").val(null);
  $('#alert').html('');
});

$(document).ready(function() {
  var id = sessionStorage.getItem("pegawai_id");
  var table = $('#absensi_table').DataTable( {
    processing: true,
    responsive: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: `api/absensi/${id}`,
      dataSrc: ""
    },
    order: [ 0, "desc" ],
    columns: [
      {
        data: "id",
        className: "align-middle",
      },
      {
        data: "clock_in",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "clock_out",
        className: "align-middle",
        orderable: false,
        searchable: false,
      },
      {
        data: "date",
        className: "align-middle",
      },
      {
        data: "id",
        className: "align-middle",
        orderable: false,
        searchable: false,
        render: function(data, type, full){
          if(type === 'display'){
            if (full['kehadiran'] == 1) {
              data_row = '<div class="btn-group"><button class="btn btn-warning bi bi-pencil-fill" data-id="' + data + '" onclick="revisi(event.target)" type="button"> Revisi</button>';
            } else if (full['kehadiran'] == 2) {
              data_row = 'Menunggu Approval';
            } else if (full['kehadiran'] == 3){
              data_row = 'Approved';
            } else {
              data_row = '';
            }
            var absensi_id = sessionStorage.setItem("absensi_id", data);
          }
          return data_row;
        }
      },
    ]
  });
});

$(document).ready(function() {
  var absen = sessionStorage.getItem("absen");

  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();
  var times = hours + ":" + minutes;

  console.log(absen);

  if (absen == null) {
    if (hours >= 0 && hours < 24) {
      $('#absen_masuk').removeAttr("disabled");
      $('#absen_keluar').removeAttr("disabled");
    }
  } else if (absen == 0) {
    if (hours >= 0) {
      $('#absen_masuk').attr("disabled", "disabled");
      $('#absen_pulang').removeAttr("disabled");
    }
  }
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).on('click', '#absen_masuk', function(){
  var full_date = new Date();
  var date = full_date.getDate();
  var month = full_date.getMonth();
  var year = full_date.getFullYear();

  var time = full_date.getTime();
  var hours = full_date.getHours();
  var minutes = full_date.getMinutes();
  var seconds = full_date.getSeconds();

  var pegawai_id = sessionStorage.getItem("pegawai_id");
  var clock_in = hours + ":" + minutes + ":" + seconds;
  var date_now = year + "-" + (month + 1) + "-" + date;

  console.log(pegawai_id);
  console.log(clock_in);
  console.log(date_now);

  $.ajax({
    url: "/api/absensi",
    method: "POST",
    data: {pegawai_id:pegawai_id, clock_in:clock_in, date_now:date_now},
    success:function(data)
    {
      swal({
        title: "Berhasil!",
        text: "Data telah tersimpan",
        icon: "success",
        button: "Oke",
      })
      .then((value) => {
        sessionStorage.setItem("absen", 0);
        location.reload();
      });
    }
  });
});

$(document).on('click', '#absen_pulang', function(){
  var id = sessionStorage.getItem("absensi_id");
  var full_date = new Date();
  var time = full_date.getTime();
  var hours = full_date.getHours();
  var minutes = full_date.getMinutes();
  var seconds = full_date.getSeconds();
  var clock_out = hours + ":" + minutes + ":" + seconds;
  $.ajax({
    url: `/api/absensi/${id}`,
    method: "PUT",
    data: {clock_out:clock_out},
    success:function(data)
    {
      swal({
        title: "Berhasil!",
        text: "Data telah diperbaharui",
        icon: "success",
        button: "Oke",
      })
      .then((value) => {
        sessionStorage.setItem("absen", 1);
        sessionStorage.removeItem("absen");
        location.reload();
      });
    }
  });
});

function revisi(event){
  var id  = $(event).data("id");
  $.ajax({
    url: `/api/absensi_get/${id}`,
    method: "GET",
    data:{},
    success:function(data)
    {
      $('#modal').modal('toggle');
      $("#id").val(data.id);
      $("#clock_in").val(data.clock_in);
      $("#clock_out").val(data.clock_out);
      $("#date").val(data.date);
    }
  });
}

$(document).on('click', '#add', function(){
  var absensi_id = sessionStorage.getItem("absensi_id");
  var pegawai_id = sessionStorage.getItem("pegawai_id");
  var clock_in = $("#clock_in").val();
  var clock_out = $("#clock_out").val();
  var date = $("#date").val();
  var keterangan = $("#keterangan").val();
    $.ajax({
      url: "/api/revisi",
      method: "POST",
      data: {absensi_id:absensi_id, pegawai_id:pegawai_id, clock_in:clock_in, clock_out:clock_out, date:date, keterangan:keterangan},
      success:function(data) {
        $('#modal').modal('toggle');
        swal({
          title: "Berhasil!",
          text: "Data telah tersimpan",
          icon: "success",
          button: "Oke",
        })
        .then((value) => {
          location.href = "/revisi";
        });
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
      var id  = $(event).data("id");
      $.ajax({
        url: `/api/unit/${id}`,
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
