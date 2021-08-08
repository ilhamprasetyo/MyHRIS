$(document).ready(function() {
  var table = $('#pengajuan_table').DataTable( {
    processing: true,
    autoWidth: false,
    scrollX: true,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "api/pengajuan",
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
        data: "tanggal_pengajuan",
        className: "align-middle",
      },
      {
        data: "lama_cuti",
        className: "align-middle",
        orderable: false
      },
      {
        data: "mulai",
        className: "align-middle",
        orderable: false
      },
      {
        data: "hingga",
        className: "align-middle",
        orderable: false
      },
      {
        data: "nama_unit",
        className: "align-middle",
      },
      {
        data: "nama_jabatan",
        className: "align-middle",
      },
      {
        data: "status",
        className: "align-middle",
      },
    ]
  });
});
