//hidepop
function hidePop(btn, parent, onlyParent = false) {
  btn.click(() => {
    parent.css({ transform: "scale(1.2)", opacity: "0" });
    setTimeout(() => {
      parent.css({ display: "none" });
      if (!onlyParent) {
        warnImg.src = "../images/dashboard-img/warn.png";
        action___msg.innerHTML = `are you sure that you want to delete the vendor? <span class="analytics-msg"></span>`;
      }
    }, 550);
  });
}
//showpop
function showPop(parent) {
  parent.css({ display: "flex" });
  setTimeout(() => {
    parent.css({ transform: "scale(1)", opacity: "1" });
  }, 50);
}

$("#all_check").on("change", function () {
  const isChecked = $(this).prop("checked"); // Store parent checkbox state
  $(".mini-checkbox").each(function (index, item) {
    $(item).prop("checked", isChecked); // Set checked state based on parent
  });
});

$("#act-select").on("change", function () {
  let itemCheck = $(".mini-checkbox:checked").length > 0;
  if ($(this).val() != "") {
    if (itemCheck) {
      if ($(this).val() == "-11") {
        showPop($(".delete-confirmation"));
        hidePop($(".delete-overlay-div"), $(".delete-confirmation"), true);
        hidePop($("#cancel_deletion"), $(".delete-confirmation"), true);
        console.log(itemCheck);
        $("#permenant_deletion_confirmation").click(() => {
          $("#act-form").submit();
        });
      } else {
        $("#act-form").submit();
      }
    }
    else{
      alert("please select at least one")
    }
  }
});

//for deleting vendor

if (document.querySelectorAll(".del-vendor-btn").length > 0) {
  let delParent = $(".delete-confirmation");
  let delOverlayDiv = $(".delete-overlay-div");
  let delConfirmDiv = $(".confirmation-box");
  let cancelBtn = $("#cancel_deletion");
  let confirmBtn = $("#confirm_deletion");
  let loader = $(".ver-loader");
  //some popup items
  let warnDiv = document.querySelector(".warn-img");
  let warnImg = document.querySelector(".warn-img img");
  let action___msg = document.querySelector(".confirmation-box p");

  //this click events
  $(".del-vendor-btn").each(function (indx, item) {
    $(item).on("click", function () {
      showPop(delParent);
      hidePop(delOverlayDiv, delParent);
      hidePop(cancelBtn, delParent);
      loader.css({ display: "flex" });
      let v__id = $(this).attr("data-vendor-id");
      confirmBtn.attr("data-vendor-id", v__id);
      $.ajax({
        url: "../ajax/vendor_details.php",
        type: "POST",
        data: { id: v__id },
        dataType: "json",
        success: function (response) {
          if (response.detail_status == "success") {
            $(".analytics-msg").text(`${response.message}`);
          }
          loader.css({ display: "none" });
        },
        error: function (xhr, errorThrown) {
          console.log(errorThrown);
        },
      });

      //on confirming it

      let button__div = document.querySelector(".btn-div");
      confirmBtn.on("click", () => {
        loader.css({ display: "flex" });
        $.ajax({
          url: "../ajax/vendor_deletion.php",
          type: "POST",
          data: { id: v__id },
          dataType: "json",
          success: function (response) {
            if (response.detail_status == "success") {
              warnDiv.classList.add("scale-div");
              warnImg.src = "../images/dashboard-img/successs.gif";
              action___msg.textContent = `${response.message}`;
              button__div.innerHTML = "";
              setTimeout(() => {
                window.location.href = "";
              }, 2500);
            } else {
              warnImg.src = "../images/dashboard-img/cross_Animation.gif";
              action___msg.textContent = `${response.message}`;
            }
            loader.css({ display: "none" });
          },
          error: function (xhr, errorThrown) {
            console.log(errorThrown);
          },
        });
      });
    });
  });
}
