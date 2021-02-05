$(function () {
  $(".showAddCustomerModal").on("click", function () {
    $("#addCustomerFormModalLabel").html("Tambah Data Customer");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  $(".showEditCustomerModal").on("click", function () {
    $("#addCustomerFormModalLabel").html("Ubah Data Customer");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-body form").attr(
      "action",
      "http://localhost:8080/dtu/public/customer/update"
    );

    const id = $(this).data("id");
    //console.log(id)

    $.ajax({
      url: "http://localhost:8080/dtu/public/customer/get_customer",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#exampleInputID").val(data.id);
        $("#exampleInputFullName").val(data.nama_lengkap);
        $("#exampleInputPhoneNumber").val(data.no_telp);
        $("#exampleInputEmail").val(data.email);
        $("#exampleInputAddress").val(data.alamat);
        $("#exampleInputIDCardNumber").val(data.no_ktp);
        $("#exampleInputBankName").val(data.nama_bank);
        $("#exampleInputATMCardNumber").val(data.no_rekening);
        if (data.jenis_kelamin == "1") {
          $("#jkLakiLaki").attr("checked", true).change();
        } else if (data.jenis_kelamin == "2") {
          $("#jkPerempuan").attr("checked", true).change();
        }
      },
    });
  });
});
