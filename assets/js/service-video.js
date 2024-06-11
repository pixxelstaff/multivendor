function close_video_pop() {
  $(".mega-video-div").css({ opacity: "0", transform: "translateX(80px)" });
  setTimeout(() => {
    $(".v-overlay-div").css({ opacity: "0" });
    setTimeout(() => {
      $(".video-popup-container").css({ display: "none" });
      $(".mega-video-div").css({ transform: "translateX(-80px)" });
    }, 700);
  }, 50);
}

$(".video-box").on("click", function () {
  $(".video-popup-container").css({ display: "flex" });
  setTimeout(() => {
    $(".v-overlay-div").css({ opacity: "1" });
    $(".mega-video-div").css({ opacity: "1", transform: "translateX(0px)" });
  }, 50);
  $("#close_video_popup").on("click", function () {
    close_video_pop();
  });
  $(".v-overlay-div").on("click", function () {
    close_video_pop();
  });
});
