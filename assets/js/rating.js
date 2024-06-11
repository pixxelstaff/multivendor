if (document.getElementsByClassName("product-rating-div")) {
  let ratingParent = document.getElementsByClassName("product-rating-div");
  for (let i = 0; i < ratingParent.length; i++) {
    let ratingDiv = ratingParent[i];
    let rating = ratingDiv.getAttribute("data-rating");
    let roundedNum = Math.ceil(rating);
    let ratingIcons = ratingDiv.querySelectorAll(".rating-icon");
    if (rating % 1 != 0) {
      ratingIcons[roundedNum - 1].innerHTML =
        '<i class="fa-solid fa-star-half-stroke"></i>';
    }
    for (let j = 0; j < roundedNum; j++) {
      ratingIcons[j].classList.add("rated-icon");
    }
  }
}

if(window.innerWidth <= 768){
    if (document.getElementsByClassName("filter-head")) {
        let filter_head = document.getElementsByClassName("filter-head");
        Array.from(filter_head).forEach((item) => {
          item.addEventListener('click',()=>{
              let element__id = item.getAttribute('data-id');
              $(`#${element__id}`).slideToggle();
          })
        });
      }
}


