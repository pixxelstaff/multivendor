let sliderParent = document.querySelector(".p-slider-wrapper");
let slideImg = document.getElementsByClassName("slide-images");
let slidesImages = document.querySelectorAll(".slide-images img");
sliderParent.style.width = `${100 * slideImg.length}%`;
//append thumb to it?it will given the width dynamically
let thumbWrapper = document.querySelector(".thumb-parent"); // slide parent main div
let slideThumbParent = document.querySelector(".slider-thumb"); // div where slide to be append
// let thumb = document.getElementsByClassName("thumb-image");
//calculations to

let mainWidth = thumbWrapper.offsetWidth;
let slidesToShow = 6;
let thumbSection = Math.ceil(mainWidth / slidesToShow);
let thumbWidth = thumbSection - 10;
let thumbPwidth = thumbSection * slideImg.length;

//appending thumbdivs

Array.from(slidesImages).forEach((item, ind) => {
  let div = document.createElement("div");
  ind == 0
    ? div.setAttribute("class", "thumb-image active-thumb")
    : div.setAttribute("class", "thumb-image");

  div.style.width = `${thumbWidth}px`;
  div.style.height = `${thumbWidth}px`;
  div.innerHTML = `<img src="${item.src}" alt="img here">`;
  slideThumbParent.append(div);
});

slideThumbParent.style.width = `${thumbPwidth}px`;

//check if thumb are present

if (document.getElementsByClassName("thumb-image")) {
  let slider_thumbs = document.getElementsByClassName("thumb-image");
  Array.from(slider_thumbs).forEach((elem, index) => {
    elem.addEventListener("click", function (e) {
      e.stopImmediatePropagation();
      Array.from(slider_thumbs).forEach((items) => {
        items.classList.remove("active-thumb");
      });
      this.classList.add("active-thumb");
      sliderParent.style.transform = `translateX(-${
        (index * 100) / slideImg.length
      }%)`;
    });
  });
}

let prevBtn = document.querySelector(".thumb-left");
let nextPrev = document.querySelector(".thumb-right");

if (thumbPwidth > mainWidth) {
  prevBtn.style.display = "flex";
  nextPrev.style.display = "flex";
  let thumbs_length = document.getElementsByClassName("thumb-image").length;
  let sld = 0;
  prevBtn.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
    if (sld > 0) {
      sld--;
      slideThumbParent.style.transform = `translateX(-${sld * thumbSection}px)`;
    }
  });
  nextPrev.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
    if (sld + slidesToShow < thumbs_length) {
      sld++;
      slideThumbParent.style.transform = `translateX(-${sld * thumbSection}px)`;
    }
  });
}

//counter code ends here

let counterNum = 1;

let decCounter = document.querySelector(".decreement_num");
let counter = document.querySelector(".quantity_num");
let incCounter = document.querySelector(".increement_num");

counter.textContent = `${counterNum}`;

decCounter.addEventListener("click", function (e) {
  e.stopImmediatePropagation();
  if (counterNum > 1) {
    counterNum--;
    counter.textContent = `${counterNum}`;
  }
});
incCounter.addEventListener("click", function (e) {
  e.stopImmediatePropagation();
  counterNum++;
  counter.textContent = `${counterNum}`;
});

// rating code starts here


