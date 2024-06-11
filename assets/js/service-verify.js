$(document).ready(() => {
  $("#service-verfied").on("submit", function (e) {
    e.preventDefault();
    let item_id = $("#order_item_id").val();
    let item_status = $("#item_state").val();
    let coupon_no = $("#coupon_no").val();
    $.ajax({
      url: "../ajax/service-verify.php",
      type: "POST",
      data: {
        id: item_id,
        item_status: item_status,
        coupon_no: coupon_no,
      },
      datatype: "json",
      success: function (res) {
        let data = res;
        console.log(data);
        if (data.i_status == "success") {
            alert(`${data.message}`);
            console.log('jdhfdh')
            window.location.href = "order-action.php";
        } else {
          alert(`${data.message}`);
        }
      },

      error: function (error) {
        alert(`${error.message}`);
      },
    });
    document.getElementById("coupon_no").value = "";
  });
});
