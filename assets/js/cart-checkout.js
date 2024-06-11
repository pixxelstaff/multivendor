$(document).ready(() => {
  if ($(".payOpts")) {
    $(".payOpts").each(function (index, element) {
      $(element).on("change", function () {
        let boxId = $(this).attr("data-msg-id");
        if (boxId == "csh-msg") {
          $(`#${boxId}`).slideDown();
          $(`#bank-msg`).slideUp();
        } else {
          $(`#${boxId}`).slideDown();
          $(`#csh-msg`).slideUp();
        }
      });
    });
  }
});
