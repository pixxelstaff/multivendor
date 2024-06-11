$(document).ready(() => {
  let mtaost = $("#multiVendor-toast");

  // function to remove toast
  function createToast(parent, status, sign, message) {
    let toast = document.createElement("div");
    toast.setAttribute("class", `toast-child w-100 d-flex ${status}`);
    toast.innerHTML = `<span class="message-mark">${sign}</i></span>${message}`;
    parent.append(toast);
    setTimeout(() => {
      toast.remove();
    }, 6000);
  }
  function upd_counter_sup(response) {
    if ($(".counter_sup")) {
      $(".counter_sup").text(`${response.length}`);
    }
  }
  //======================================================function for cart row creation on cart page
  function cart_row_creation(response, parentWrapper) {
    if (parentWrapper) {
      if (response.status == "success") {
        let remainingItems = JSON.parse(response.data);
        upd_counter_sup(remainingItems);

        if (remainingItems.length > 0) {
          parentWrapper.empty();
          //it is used for subtotal
          let totalExpense = 0;

          Array.from(remainingItems).forEach((item, indx) => {
            //actual price will be salePrice if it is not empty otherwise price
            let ac_price = "";
            if (item.salePrice != "") {
              ac_price = item.salePrice;
            } else {
              ac_price = item.price;
            }
            //multiplying quantity and price
            let p_total = parseInt(item.quantity) * parseInt(ac_price);
            totalExpense += p_total;
            //creating a div
            let cartDiv = document.createElement("div");
            //setting attrs
            cartDiv.setAttribute("class", "cart-row d-flex position-relative");
            //setting html
            cartDiv.innerHTML = `<div class="cart-boxes"><img src="images/uploadimg/${item.image}" class="cart-img" alt="cart image"></div>
                <div class="cart-boxes title-box">${item.name}</div>
                <div class="cart-boxes">$${ac_price} </div>
                <div class="cart-boxes justify-content-between">
                    <a href="javascript:void(0)" class="dec_num" data-item-id='${item.id}'><i class="fa-solid fa-minus"></i></a>
                    <span class="quantity_num">${item.quantity}</span>
                    <a href="javascript:void(0)" class="inc_num" data-item-id='${item.id}'><i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="cart-boxes justify-content-center subtotal-bx">$ ${p_total}</div>
                <a href="javascript:void(0)" class="remove-cart-item" data-item-id=${item.id}><i class="fa-solid fa-xmark"></i></a>`;
            parentWrapper.append(cartDiv);
          });
          let remove_btn_row = document.createElement("div");
          remove_btn_row.setAttribute(
            "class",
            "cart-row d-flex position-relative no-border"
          );
          remove_btn_row.innerHTML = `
                <div class="col-12 d-flex justify-content-end py-4">
                     <a href="javascript:void(0)" class="remove_all_btn">Remove All</a>
               </div>`;
          parentWrapper.append(remove_btn_row);
          //setting subtotal prive
          $(".sb-t").each((indx, itm) => {
            $(itm).text(`$${totalExpense}`);
          });
        } else {
          //empty
          parentWrapper.empty();
          //creating divs
          let div = document.createElement("div");
          div.setAttribute("class", "cart-empty-box col-12");
          div.innerHTML = `<div class="cart-empty-box col-12">
              <div class="col-12 vector-bg-div"></div>
              <p class="cart-message-p">Add items to your cart for shopping</p>`;
          parentWrapper.append(div);
          $(".sb-t").each((indx, itm) => {
            $(itm).text(`$0`);
          });
        }
      }

      quantity_manupulation();

      remove_cart_item_row();
    }
  }
  //forincreementing
  function quantity_manupulation() {
    if ($(".dec_num") && $(".inc_num")) {
      load_div = $(".cart-load-div");
      $(".dec_num").each(function (indx, item) {
        $(item).on("click", function () {
          let itemId = $(this).attr("data-item-id");
          let quantity_no = $(this).parent().find("span.quantity_num");
          let item_qn = parseInt(quantity_no.eq(0).text());
          if (item_qn > 1) {
            item_qn--;
            quantity_no.text(`${item_qn}`);
            load_div.css({ display: "flex" });
            $.ajax({
              url: "ajax/updatequantity.php",
              type: "POST",
              data: { id: itemId, quantity: item_qn },
              datatype: "json",
              success: function (response) {
                let res = JSON.parse(response.data);

                load_div.css({ display: "none" });
                let subTotalAmount = 0;
                Array.from(res).forEach((elem, indx) => {
                  let pr = "";
                  if (elem.salePrice != "") {
                    pr = elem.salePrice;
                  } else {
                    pr = elem.price;
                  }
                  let amount = pr * parseInt(elem.quantity);
                  $(".subtotal-bx").eq(indx).text(`$${amount}`);
                  subTotalAmount += amount;
                });
                $(".sb-t").each(function (indx, item) {
                  $(item).text(`$${subTotalAmount}`);
                });
                updateCart(response, $("#the_cart_wrapper"));
                removeItemsFromCart();
              },
              error: function (xhr, status, errorThrown) {
                createToast(
                  mtaost,
                  "error",
                  '<i class="fa-solid fa-circle-exclamation"></i>',
                  "unable to update the quantity"
                );
              },
            });
          }
        });
      });
      $(".inc_num").each(function (indx, item) {
        $(item).on("click", function () {
          let itemId = $(this).attr("data-item-id");
          let quantity_no = $(this).parent().find("span.quantity_num");
          let item_qn = parseInt(quantity_no.eq(0).text());
          item_qn++;
          quantity_no.text(`${item_qn}`);
          load_div.css({ display: "flex" });
          $.ajax({
            url: "ajax/updatequantity.php",
            type: "POST",
            data: { id: itemId, quantity: item_qn },
            datatype: "json",
            success: function (response) {
              let res = JSON.parse(response.data);
              load_div.css({ display: "none" });
              let subTotalAmount = 0;
              Array.from(res).forEach((elem, indx) => {
                let pr = "";
                if (elem.salePrice != "") {
                  pr = elem.salePrice;
                } else {
                  pr = elem.price;
                }
                let amount = pr * parseInt(elem.quantity);
                $(".subtotal-bx").eq(indx).text(`$${amount}`);
                subTotalAmount += amount;
              });
              $(".sb-t").each(function (indx, item) {
                $(item).text(`$${subTotalAmount}`);
              });
              updateCart(response, $("#the_cart_wrapper"));
              cart_row_creation(response, $("#cart-row-wrapper"));

              removeItemsFromCart();
            },
            error: function (error) {
              createToast(
                mtaost,
                "error",
                '<i class="fa-solid fa-circle-exclamation"></i>',
                "unable to update the quantity"
              );
            },
          });
        });
      });
    }
  }
  //function for removing cart items
  function remove_cart_item_row() {
    if ($(".remove-cart-item")) {
      $(".remove-cart-item").each(function (no, elem) {
        $(elem).on("click", function () {
          let cartWrapper = $("#cart-row-wrapper");
          let id = $(this).attr("data-item-id");
          $.ajax({
            url: "ajax/remove-cart-item.php",
            type: "POST",
            data: { id: id },
            datatype: "json",
            success: function (response) {
              //success it removes
              cart_row_creation(response, cartWrapper);
              updateCart(response, $("#the_cart_wrapper"));
            },
            error: function (xhr, status, errorThrown) {
              console.log(errorThrown);
            },
          });
        });
      });
    }
  }

  //======================================================function for cart row creation

  //function for updating cart // sidebar cart
  function removeItemsFromCart() {
    if ($(".remove-item")) {
      $(".remove-item").each(function (no, elem) {
        $(elem).on("click", function () {
          let id = $(this).attr("data-remove-id");
          $.ajax({
            url: "ajax/remove-cart-item.php",
            type: "POST",
            data: { id: id },
            datatype: "json",
            success: function (response) {
              updateCart(response, $("#the_cart_wrapper"));
              cart_row_creation(response, $("#cart-row-wrapper"));
            },
            error: function (xhr, status, errorThrown) {
              console.log(errorThrown);
            },
          });
        });
      });
    }
  }

  function updateCart(response, parent) {
    //response success like
    let subtotal = 0; // this is subtotal
    if (response.status == "success") {
      let dataObj = JSON.parse(response.data); //making json string to array
      upd_counter_sup(dataObj);

      if (dataObj.length > 0) {
        parent.empty(); //empty array so that duplication doesnot occur
        Array.from(dataObj).forEach((item, indx) => {
          let itemImg = item.image != "" ? item.image : "down.webp";
          let price = item.salePrice != "" ? item.salePrice : item.price;
          let options_String = "";
          subtotal += parseInt(price) * parseInt(item.quantity);
          if (Array.isArray(item.options) && item.options.length > 0) {
            let options_arrr = [];
            let optss = item.options;
            optss.forEach((item, no) => {
              options_arrr.push(`${item.optname}:${item.optValue}`);
            });
            options_String = `- ${options_arrr.join("-")}`;
          } else {
            if(item.itemType == 'service'){
              options_String = item.options;
            }else{
              options_String = "";

            }
          }

          let div = document.createElement("div");
          div.setAttribute(
            "class",
            "col-12 cart-item d-flex flex-wrap align-items-start"
          );
          div.innerHTML = ` 
         <div class="col-3 cart-item-img overflow-hidden d-flex align-items-center">
              <img src="images/uploadimg/${itemImg}" alt="">
        </div>
        <div class="col-9 cart-item-content d-flex flex-column gap-1">
          <h6 class="c-item-title"> ${item.name} ${options_String} </h6>
          <p class="c-item-title m-0">${item.itemType}</p>
            <div class="col-12 price-div d-flex align-items-center justify-content-between">
                <div class="quantity-div">
                    <span class="item-q">${
                      item.quantity
                    }</span> x <span class="item-sing-price">$${price}</span>
                </div>
                <span class="multipled-price">$${
                  parseInt(price) * parseInt(item.quantity)
                }</span>
            </div>
        </div>
        <a href="javascript:void(0)" class="remove-item" data-remove-id='${
          item.id
        }'><i class="fa-solid fa-xmark"></i></a>`;
          parent.append(div);
        });
        let sbDiv = document.createElement("div");
        sbDiv.setAttribute(
          "class",
          "col-12 sub-total-div d-flex justify-content-between"
        );
        sbDiv.innerHTML = ` <span class="subtotal-label">Subtotal</span>
        <span class="subtotal-label">$${subtotal}</span>`;
        parent.append(sbDiv);
        let btnDiv = document.createElement("div");
        btnDiv.setAttribute(
          "class",
          "col-12 cart-btn-div d-flex flex-column gap-2 mt-4"
        );
        btnDiv.innerHTML = ` <a href="cart.php" class="cart-action-btn w-100">View Cart</a>
        <a href="checkout.php" class="cart-action-btn w-100">CheckOUT</a>`;
        parent.append(btnDiv);
        removeItemsFromCart();
      } else {
        parent.empty();
        let div = document.createElement("div");
        div.setAttribute("class", "cart-empty-box col-12");
        div.innerHTML = `<div class="cart-empty-box col-12">
        <div class="col-12 vector-bg-div"></div>
        <p class="cart-message-p">Add items to your cart for shopping</p>`;
        parent.append(div);
      }
    }
  }

  function trimSpaces(str) {
    return str.replace(/^\s+|\s+$/g, "");
  }

  //for selecting options
  let labels = $(".select-labels");
  let productOpts = $(".product-opts");
  let opts = [];
  productOpts.on("change", function () {
    opts = [];

    let disabled = false;
    productOpts.each(function (num, itm) {
      if ($(itm).val() === "") {
        disabled = true;
        return false; // exit the loop early if any product option is empty
      }
    });

    if (disabled) {
      $(".product-btn-wrapper").addClass("disabled-btn");
      $(".product-btn").addClass("disabled-btn");
    } else {
      $(".product-btn-wrapper").removeClass("disabled-btn");
      $(".product-btn").removeClass("disabled-btn");
      labels.each(function (number, element) {
        opts.push({
          optname: trimSpaces($(element).text()),
          optValue: trimSpaces(productOpts.eq(`${number}`).val()),
        });
      });
    }
  });
  $(".product-action-btn").each(function (index, element) {
    $(element).on("click", function () {
      let productId = $(this).attr("data-product-id");
      let productType = $(this).attr("data-product-type");
      let productQauntity = $(`#${$(this).attr("data-q-id")}`).text();
      if (productType == "simple") {
        $.ajax({
          url: "ajax/cart.php",
          type: "POST",
          data: {
            id: productId,
            itemType: "product",
            quantity: productQauntity,
            productOptions: "",
          },
          datatype: "json",
          success: function (response) {
            updateCart(response, $("#the_cart_wrapper"));
            removeItemsFromCart();
            if (response.status == "success") {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-check"></i>',
                response.message
              );
            } else if (response.status == "invalid") {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-exclamation"></i>',
                response.message
              );
            } else {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-xmark"></i>',
                response.message
              );
            }
          },
          error: function (error) {
            createToast(
              mtaost,
              response.status,
              '<i class="fa-solid fa-circle-xmark"></i>',
              `error occured something went wrong`
            );
          },
        });
      } else if (productType == "attribute" || productType == "variation") {
        if (opts.length == productOpts.length) {
          let disabled = false;
          productOpts.each(function (num, itm) {
            if ($(itm).val() === "") {
              disabled = true;
              return false; // exit the loop early if any product option is empty
            }
          });
          if (!disabled) {
            $.ajax({
              url: "ajax/cart.php",
              type: "POST",
              data: {
                id: productId,
                itemType: "product",
                quantity: productQauntity,
                productOptions: JSON.stringify(opts),
              },
              datatype: "json",
              success: function (response) {
                updateCart(response, $("#the_cart_wrapper"));
                if (response.status == "success") {
                  createToast(
                    mtaost,
                    response.status,
                    '<i class="fa-solid fa-circle-check"></i>',
                    response.message
                  );
                } else if (response.status == "invalid") {
                  createToast(
                    mtaost,
                    response.status,
                    '<i class="fa-solid fa-circle-exclamation"></i>',
                    response.message
                  );
                } else {
                  createToast(
                    mtaost,
                    response.status,
                    '<i class="fa-solid fa-circle-xmark"></i>',
                    response.message
                  );
                }
              },
              error: function (error) {
                createToast(
                  mtaost,
                  response.status,
                  '<i class="fa-solid fa-circle-xmark"></i>',
                  `error occured something went wrong`
                );
              },
            });
          } else {
            alert("select the options properly");
          }
        } else {
          alert("select all the options");
        }
      }
    });
  });
  $(".s-add-cart").each(function (no, element) {
    $(element).on("click", function () {
      let serviceId = $(this).attr("data-service-id");
      let slotOpts = "";
      let slot = "0";
      let add_opt = true;
      if (this.hasAttribute("data-slot")) {
        slot = "1";
        let day = document.getElementById("slot-days").value;
        let timing = document.getElementById("slot-time").value;
        if (day != "" && timing != "") {
          slotOpts = day + "-" + timing;
          add_opt = true;
        } else {
          add_opt = false;
        }
      } else {
        slotOpts = "";
      }
      if (add_opt) {
        $.ajax({
          url: "ajax/service-cart.php",
          type: "POST",
          data: { id: serviceId, opts: slotOpts,slot:slot },
          datatype: "json",
          success: function (response) {
            updateCart(response, $("#the_cart_wrapper"));
            if (response.status == "success") {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-check"></i>',
                response.message
              );
            } else if (response.status == "invalid") {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-exclamation"></i>',
                response.message
              );
            } else {
              createToast(
                mtaost,
                response.status,
                '<i class="fa-solid fa-circle-xmark"></i>',
                response.message
              );
            }
          },
          error: function (error) {
            createToast(
              mtaost,
              response.status,
              '<i class="fa-solid fa-circle-xmark"></i>',
              `error occured something went wrong unable to add items`
            );
          },
        });
      } else {
        createToast(
          mtaost,
          "error",
          '<i class="fa-solid fa-circle-xmark"></i>',
          `we add to cart unitl slot options are selected properly`
        );
      }
    });
  });
  removeItemsFromCart();
  //this for cart page?
  quantity_manupulation();
  remove_cart_item_row();
});
