$(document).ready(() => {
  $(".items_state_pointer").each((no, item) => {
    $(item).on("change", function () {
      let sts = $(item).val();
      let item_id = $(item).attr("data-item_id");
      let item_type = $(item).attr("data-i-type");
      if (item_type == "service") {
        if ($(item).val() == "1" || $(item).val() == "2") {
          $(".verfication-div").css({ display: "flex" });
          setTimeout(() => {
            $(".verfication-div").css({ transform: "scale(1)",opacity:"1" });
          }, 50);
          // 2
          $("#order_item_id").val(`${item_id}`);
          $("#item_state").val(`${$(item).val()}`);
          $(".order-overlay-div").click(() => {
            $(".verfication-div").css({ transform: "scale(1.2)",opacity:"0" });
            setTimeout(() => {
              $(".verfication-div").css({ display: "none" });
            }, 550);
          });
        } else {
          $.ajax({
            url: "../ajax/default-service-status.php",
            type: "POST",
            data: {
              id: item_id,
              item_status: sts,
            },
            datatype: "json",
            success: function (res) {
              let data = res;
              if (data.i_status == "success") {
                alert(`${data.message}`);
              } else {
                alert(`${data.message}`);
              }
            },

            error: function (error) {
              alert(`${error.message}`);
            },
          });
        }
      }
    });
  });
});
