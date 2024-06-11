$(document).ready(() => {
  function hidePop(btn) {
    btn.click(() => {
      $(".verfication-div").css({ transform: "scale(1.2)", opacity: "0" });
      setTimeout(() => {
        $(".verfication-div").css({ display: "none" });
      }, 550);
    });
  }
  $(".account_status").each(function (no, item) {
    $(item).on("change", function () {
      let vendor_id = $(this).attr("data-vendor-id");
      let vendor_name = $(this).attr("data-v-name");
      let current_status = $(this).attr("data-current-state");
      let account_status = $(this).val();
      console.log(current_status);

      let sts_name = "";
      if (account_status == "-2") {
        sts_name = "suspend";
      } else {
        sts_name = "terminate";
      }
      if (account_status != "") {
        $(".verfication-div").css({ display: "flex" });
        setTimeout(() => {
          $(".verfication-div").css({ transform: "scale(1)", opacity: "1" });
        }, 50);
        hidePop($(".order-overlay-div"));
        hidePop($("#cancel_action"));

        $(".v__name").text(vendor_name);
        $(".acc_state").text(sts_name);
        $("#confirm_action").attr("data-vendor-id", vendor_id);
        $("#confirm_action").attr("data-status", account_status);
        $("#confirm_action").attr("data-current-status", current_status);
      }
    });
  });
  $("#confirm_action").click(function () {
    let v__id = $(this).attr("data-vendor-id");
    let acc__status = $(this).attr("data-status");
    let acc_current_status = $(this).attr("data-current-status");
    if (v__id != "" || acc__status != "") {
      $(".ver-loader").css({ display: "flex" });
      $.ajax({
        url: "../ajax/vendor_state.php",
        type: "POST",
        data: {
          id: v__id,
          v__state: acc__status,
          c__state: acc_current_status,
        },
        datatype: "json",
        success: function (response) {
          $(".ver-loader").css({ display: "none" });
          if (response.request_status == "success") {
            $(".verfication-box").html("");
            let div = document.createElement("div");
            div.setAttribute(
              "class",
              "warn-img d-flex col-12 justify-content-center mt-4 py-4"
            );
            div.innerHTML = ` <img src="../images/dashboard-img/successs.gif" alt="">`;
            $(".verfication-box").append(div);
            setTimeout(() => {
              window.location.href = "";
            }, 3000);
          }
        },
        error: function (xhr, status, errorThrown) {
          // alert("something went wrong");
          console.log(errorThrown)
        },
      });
    } else {
      alert("provide complete information");
    }
  });
});
