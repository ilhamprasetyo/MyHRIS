$(document).ready(function() {
  $.ajax({
    url: "/pegawai_user",
    method: "GET",
    data:{},
    success:function(data)
    {
      var pegawai_id = data.id.pegawai_id;
      var unit_id = data.id.unit_id;
      var jabatan_id = data.id.jabatan_id;

      $("#nama_user").text(data.pegawai.nama);
      $("#unit_user").text(data.pegawai.nama_unit);
      $("#jabatan_user").text(data.pegawai.nama_jabatan);
      $("#cuti_user").text(data.pegawai.cuti);

      $("#id_user").attr("data-id", data.pegawai.id);
      $("#pegawai_id_profile").text(data.pegawai.id);
      $("#nama_profile").text(data.pegawai.nama);
      $("#email_profile").text(data.id.email);
      $("#alamat_profile").text(data.pegawai.alamat);
      $("#unit_profile").text(data.pegawai.nama_unit);
      $("#jabatan_profile").text(data.pegawai.nama_jabatan);
      $("#cuti_profile").text(data.pegawai.cuti + " hari");

      $("#email").val(data.id.email);

      if (data.pegawai.file !== null) {
        $("#photo_frame").delay(1000).fadeIn();
        $("#view_photo_frame").delay(1000).fadeIn();
        $("#option").fadeIn();
        $("#photo").attr("src", "storage/images/" + data.pegawai.file);
        $("#view_photo").attr("src", "storage/images/" + data.pegawai.file);
      } else {

      }

      if(data.pegawai.nama_jabatan === "Koordinator") {
        $('#koordinator_menu').css("display", "flex");
      }

      if(data.pegawai.cuti === 0) {
        $('#modal_button').attr("disabled", "disabled");
      }

      if (typeof(Storage) !== "undefined") {
        // Store
        sessionStorage.setItem("pegawai_id", pegawai_id);
        sessionStorage.setItem("unit_id", unit_id);
        sessionStorage.setItem("jabatan_id", jabatan_id);
      } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage";
      }

    }
  });
});
