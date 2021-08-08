$(document).ready(function() {
  var table = $('#karyawan_table').DataTable( {
    processing: true,
    responsive: true,
    scrollY: 300,
    lengthMenu: [10, 25, 50, 100],
    ajax: {
      url: "/karyawan_all",
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
    ]
  });
});
