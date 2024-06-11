window.addEventListener("DOMContentLoaded", () => {
  if (document.getElementById("banner")) {
    $("#banner .owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      animateOut: "fadeOut", // Optional: Use fadeOut for the current item animation
      animateIn: "fadeIn",
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
  }
  if (document.getElementById("category-slider")) {
    $("#category-slider .owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      dots: false,
      loop: true,
      autoplay: true,
      responsive: {
        0: {
          items: 2,
        },
        600: {
          items: 4,
        },
        1000: {
          items: 6,
        },
      },
    });
  }
  if (document.getElementById("single-service-page-slide")) {
    $("#single-service-page-slide .owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      dots: true,
      loop: true,
      autoplay: true,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 2,
        },
        1000: {
          items: 3,
        },
      },
    });
  }

  if (document.getElementById("sng-service-slider")) {
    $("#sng-service-slider .owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000, // Set the delay in milliseconds (e.g., 3000 for 3 seconds)
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 1,
        },
      },
    });
    $("#sng-service-slider .owl-nav .owl-prev span").html(
      `<i class="fa-solid fa-arrow-left"></i>`
    );
    $("#sng-service-slider .owl-nav .owl-next span").html(
      `<i class="fa-solid fa-arrow-right"></i>`
    );
  }

  if (document.getElementsByClassName("exp-btn")) {
    let expandBtns = document.getElementsByClassName("exp-btn");
    Array.from(expandBtns).forEach((item, ind) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        let contentDiv = e.target.parentElement.parentElement;
        let list = contentDiv.querySelector(".service-ul");
        if (e.target.getAttribute("data-expand") == "true") {
          list.style.height = "auto";
          e.target.textContent = "expand less";
          e.target.setAttribute("data-expand", "false");
        } else {
          e.target.textContent = "expand";
          list.style.height = "100px";
          e.target.setAttribute("data-expand", "true");
        }
      });
    });
  }

  //tabs code starts here

  //it mainly used for products single page and service single page

  if (
    document.querySelectorAll(".info-nav-ul li") &&
    document.querySelectorAll(".tab-box")
  ) {
    let tabBtns = document.querySelectorAll(".info-nav-ul li");
    let tabs = document.querySelectorAll(".tab-box");

    tabBtns.forEach((item) => {
      item.addEventListener("click", function (e) {
        e.stopImmediatePropagation();
        tabBtns.forEach((element) => {
          element.classList.remove("active-info-li");
        });
        this.classList.add("active-info-li");
        let id = this.getAttribute("data-id");
        tabs.forEach((elem) => {
          elem.classList.add("d-none");
        });
        document.getElementById(`${id}`).classList.remove("d-none");
      });
    });
  }

  //it mainly used for products single page and service single page

  if (
    document.querySelectorAll(".review-rating-div a") &&
    document.getElementById("p-rating-num")
  ) {
    let rateIcons = document.querySelectorAll(".review-rating-div a");
    let ratingInp = document.getElementById("p-rating-num");

    rateIcons.forEach((anc) => {
      anc.addEventListener("click", function (e) {
        e.stopImmediatePropagation();
        let val = this.getAttribute("data-rating-val");
        rateIcons.forEach((icon) => {
          icon.classList.remove("rated-icon");
        });
        ratingInp.value = val;
        for (let ic = 0; ic < val; ic++) {
          rateIcons[ic].classList.add("rated-icon");
        }
      });
    });
  }
});
