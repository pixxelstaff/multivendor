//product page

$(document).ready(() => {
  let color = true;
  $(".filter-toggle").click(() => {
    color
      ? $(".filter-toggle span").css({ color: "#FF9900" })
      : $(".filter-toggle span").css({ color: "#000" });
    color = !color;
    $(".filter-options").slideToggle();
  });
});

let prodcutGridWrapper = document.querySelector(".product-grid");
let searchWrapper = document.querySelector(".search-div");
let searchInput = document.querySelector(".search-products");
let searchPopDiv = document.querySelector(".search-result-popup");
let searchHeight = searchInput.offsetHeight;
searchPopDiv.style.top = `${searchHeight + 10}px`;

searchInput.addEventListener("focus", () => {
  searchPopDiv.style.display = "inline-block";
  setTimeout(() => {
    searchPopDiv.style.transform = "translateY(0px)";
    searchPopDiv.style.opacity = "1";
  }, 20);
});
searchInput.addEventListener("blur", () => {
  searchPopDiv.style.transform = "translateY(40px)";
  searchPopDiv.style.opacity = "0";
  setTimeout(() => {
    searchPopDiv.style.display = "none";
  }, 550);
});
if (document.getElementsByClassName("cut-title").length) {
  let titles = document.getElementsByClassName("cut-title");
  Array.from(titles).forEach((elem) => {
    let title = elem.textContent.trim(); // Get the text content of the element and remove leading/trailing whitespaces
    if (title.length > 18) {
      // Adjusted length considering the additional characters for the quotes and ellipsis
      let truncatedTitle = `${title.substring(0, 18)}...`; // Adjusted substring length considering the additional characters for the quotes and ellipsis
      elem.textContent = `${truncatedTitle}`;
    }
  });
}
