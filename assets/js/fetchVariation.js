$(document).ready(() => {
  function trimSpaces(str) {
    return str.replace(/^\s+|\s+$/g, "");
  }
  let selectOpts = $(".product-opts");
  let variation_id = selectOpts.eq(0).data("v-id"); // Use eq() instead of array notation to get the first element's data-v-id attribute
  //targetting variable that have to be changes
  let price_wrapper = $(".price-wrapper");
  let product_btn = $(".product-btn-wrapper");
  let price_box = $(".price-box");
  let product_exercept = $(".product-excerpt");
  let p_length = $("#length-td");
  let p_width = $("#width-td");
  let p_height = $("#height-td");
  let sku = $(".sku");
  let quantity = $(".quantity");
  let prev_old_data = [
    {
      price_wrapper_content: price_wrapper.html(),
      product_exercept_con: product_exercept.text(),
      length_con: p_length.text(),
      width_con: p_width.text(),
      height_con: p_height.text(),
      sku_con: sku.text(),
      quantity_con: quantity.text(),
    },
  ];
  //consoling
  let variation__data = [];
  selectOpts.each(function (index, item) {
    // Check if the value of the current item is empty
    $(item).on("change", function () {
      if ($(this).val() != "") {
        selectOpts.each(function (ind, elem) {
          if ($(elem).val() == "") {
            console.log("values should not be empty");
            return;
          }
        });
        variation__data[index] = trimSpaces($(this).val());
        if (variation__data.length == selectOpts.length) {
          $.ajax({
            url: "ajax/variation.php",
            type: "POST",
            data: {
              variation_id: variation_id,
              vari_name: JSON.stringify(variation__data),
            },
            dataType: "json",
            success: function (response) {
              if (response.status == "success") {
                let data__array = response.data[0];
                console.log(data__array.variation_price);
                //removing if in any case we have already sale tags
                if ($(".p-action-tag").length > 0) {
                  $(".p-action-tag").remove();
                }
                if (data__array.variation_sale_price != "") {
                  price_box.html(
                    `<span class='cross-val-ser'>$${data__array.variation_price}</span>
                    <span class='p_actaul_price'>$${data__array.variation_sale_price}</span>`
                  );
                  //appending sale tags with % off
                  let calculations =
                    ((+data__array.variation_price -
                      +data__array.variation_sale_price) /
                      data__array.variation_price) *
                    100;
                  price_wrapper.append(
                    `<span class='p-action-tag'>${Math.floor(
                      calculations
                    )}% off</span>`
                  );
                } else {
                  price_box.html(
                    `<span class='p_actaul_price'>$${data__array.variation_price}</span>`
                  );
                }
                product_exercept.text(`${data__array.variation_exercept}`);
                sku.text(`${data__array.variation_sku}`);
                quantity.text(`${data__array.variation_quantity}`);
                p_length.text(`${data__array.variation_length}`);
                p_width.text(`${data__array.variation_width}`);
                p_height.text(`${data__array.variation_height}`);
              }
            },
            error: function (error) {
              console.log("error occurs" + error.message);
            },
          });
        }
      } else {
        price_wrapper.html(`${prev_old_data[0].price_wrapper_content}`)
        product_exercept.text(`${prev_old_data[0].product_exercept_con}`);
        sku.text(`${prev_old_data[0].sku_con}`);
        quantity.text(`${prev_old_data[0].quantity_con}`);
        p_length.text(`${prev_old_data[0].length_con}`);
        p_width.text(`${prev_old_data[0].width_con}`);
        p_height.text(`${prev_old_data[0].height_con}`);
      }
    });
  });
});


