let cartParentWrapper = document.querySelector(".cart-parent-div");
let overlayDiv = document.querySelector(".cart-overly-div");
let cartDiv = document.querySelector(".multivendor-cart-div");
let cartCloseBtn = document.querySelector(".close-cart-btn");
let cartButton = document.querySelector("#multivendor-cart");

//window on load

function showCart(parent, overlayDiv, cartdiv) {
  parent.style.display = "flex";
  setTimeout(() => {
    overlayDiv.style.transform = `translateX(0%)`;
    setTimeout(() => {
      cartDiv.style.transform = `translateX(0%)`;
    }, 300);
  }, 100);
}
function hideCart(parent, overlayDiv, cartdiv) {
  cartDiv.style.transform = `translateX(100%)`;
  setTimeout(() => {
    overlayDiv.style.transform = `translateX(100%)`;
    setTimeout(() => {
      parent.style.display = "none";
    }, 600);
  }, 200);
}
cartButton.addEventListener("click", function () {
  showCart(cartParentWrapper, overlayDiv, cartDiv);
});
cartCloseBtn.addEventListener("click", function () {
  hideCart(cartParentWrapper, overlayDiv, cartDiv);
});
