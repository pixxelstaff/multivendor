let p__type__btns = document.getElementsByClassName("p-type-radio");
let label__p__type__btns = document.getElementsByClassName("c-radio");
let button__app__div = document.querySelector(".complex-action");

//attributes and variations button properties?
var attr__properties = {
  className: "action-btn",
  id: "make-attr",
  href: "javascript:void(0)",
};
//make variations buttons properties
var var__properties = {
  className: "action-btn",
  id: "make-var",
  href: "javascript:void(0)",
};

//iterator function the main function for making varaitions?

function arrayIterator(array, current = []) {
  let result = [];

  if (array.length === 0) {
    // If the array is empty, return the current combination
    return [current];
  }

  // Remove and get the first subarray
  var arr1 = array.shift();

  // Iterate through the removed subarray
  for (let index = 0; index < arr1.length; index++) {
    var element = arr1[index];
    // Recursive call with the modified array // here slice is used here to make copy
    result = result.concat(
      arrayIterator(array.slice(), current.concat([element]))
    );
  }

  return result;
}
//class removal
function classRemoval(label, item) {
  Array.from(label).forEach((elem) => {
    elem.classList.remove("active-radio");
  });
  item.nextElementSibling.classList.add("active-radio");
}

function createBtns(element, properties, textContent, parentElement) {
  let btn = document.createElement(element);
  Object.assign(btn, properties);
  btn.textContent = textContent;
  parentElement.append(btn);
}

function attributeAction() {
  //hide and show div here
  if (document.getElementsByClassName("attribute-head")) {
    let attr__head = document.getElementsByClassName("attribute-head");
    Array.from(attr__head).forEach((item) => {
      item.addEventListener("click", function(e){
        e.stopImmediatePropagation();
        let boxId = this.getAttribute("data-id");
        let spans = this.querySelectorAll('span');
        Array.from(spans).forEach((item)=>{
          item.addEventListener('click',(e)=>{
            e.stopImmediatePropagation();
            $(`#${boxId}`).slideToggle();
          })
        })
        $(`#${boxId}`).slideToggle();
      });
    });
  }
  //when we write attribute name the name also change in head
  if (document.getElementsByClassName("attr-name")) {
    let attr__name_field = document.getElementsByClassName("attr-name");
    Array.from(attr__name_field).forEach((itm) => {
      itm.addEventListener("input", (e) => {
        e.stopPropagation();
        e.stopImmediatePropagation();
        let parentBox = e.target.parentElement.parentElement.querySelector(
          ".attribute-head-name"
        );
        parentBox.textContent = e.target.value;
      });
    });
  }
  //remove attributes
  if (document.getElementsByClassName("remove-attr-box")) {
    let remove_btn = document.getElementsByClassName("remove-attr-box");
    Array.from(remove_btn).forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        e.stopImmediatePropagation();
        let div_to_remove = document.querySelector(
          `#${e.target.getAttribute("data-attr-id")}`
        );
        document.getElementById("attr-parent").removeChild(div_to_remove);
      });
    });
  }
}

function attributeCreation() {
  if (document.getElementById("make-attr")) {
    let attr_parent = document.getElementById("attr-parent");
    let make__attributes = document.querySelector("#make-attr");
    let attr_no = document.getElementsByClassName("attribute-wrapper")
      ? document.getElementsByClassName("attribute-wrapper").length
      : 0;
    make__attributes.addEventListener("click", (e) => {
      e.stopPropagation();
      e.stopImmediatePropagation();
      if (!document.querySelector(".attr-label")) {
        let label = document.createElement("label");
        label.setAttribute("class", "p-inp-label attr-label");
        label.textContent = "Attribute";
        attr_parent.append(label);
      }

      attr_no++;
      let div = document.createElement("div");
      let attribute_properties = {
        className: "attribute-wrapper col-12 p-0",
        id: `attribute-${attr_no}`,
      };
      Object.assign(div, attribute_properties);
      let attrHtml = `
                  <div class="attribute-head col-12" data-id="attribute-f-div-${attr_no}">
                  <span class="attribute-head-name">
                      attribute-${attr_no}
                  </span>
                  <div class="d-flex align-items-center gap-2">
                      <a href="javascript:void(0)" class="text-white remove-attr-box" data-attr-id="attribute-${attr_no}">remove</a>
                      <span class="material-symbols-outlined attr-direction">
                          expand_more
                      </span>
                  </div>
              </div>
              <div class="attribute-field-div col-12" id="attribute-f-div-${attr_no}">
                  <input type="text" name="attributeName[]" placeholder="attribute-name" id="" class="p-inp-field attr-name">
                  <textarea name="attributeVal[]" id="" class="w-100 p-inp-field attribute-val-area" rows="4" placeholder="Enter attribute values separate values by (|)"></textarea>
              </div>
                  `;
      div.innerHTML = attrHtml;
      attr_parent.append(div);

      attributeAction();
    });
  }
}
function variationAction() {
  // for toggle
  if (document.getElementsByClassName("variation-head")) {
    let var__head = document.getElementsByClassName("variation-head");
    Array.from(var__head).forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopImmediatePropagation();
        let boxId = e.target.getAttribute("data-id");
        $(`#${boxId}`).slideToggle();
      });
    });
  }
  //for removing the variations>?
  //remove attributes
  if (document.getElementsByClassName("remove-variation")) {
    let remove_btn = document.getElementsByClassName("remove-variation");
    Array.from(remove_btn).forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopPropagation();
        e.stopImmediatePropagation();
        let div_to_remove = document.querySelector(
          `#${e.target.getAttribute("data-var-id")}`
        );
        document.getElementById("var-parent").removeChild(div_to_remove);
      });
    });
  }
}
function variationCreation() {
  if (document.getElementById("make-var")) {
    let variation_parent = document.getElementById("var-parent");
    let make__variations = document.getElementById("make-var");
    let var_no = 0;
    let proceedFurther = true;
    make__variations.addEventListener("click", (e) => {
      e.stopPropagation();
      let attrValArr = [];
      variation_parent.innerHTML = "";
      if (document.getElementsByClassName("attribute-wrapper").length > 0) {
        let label = document.createElement("label");
        label.setAttribute("class", "p-inp-label");
        label.textContent = "Variation";
        variation_parent.append(label);

        Array.from(
          document.getElementsByClassName("attribute-val-area")
        ).forEach((elem) => {
          proceedFurther = elem.value == "" ? false : true;
        });

        if (proceedFurther) {
          let attributeName = document.getElementsByClassName("attr-name");
          let attributeValArray =
            document.getElementsByClassName("attribute-val-area");

          Array.from(attributeValArray).forEach((elem) => {
            let splitted = elem.value.split("|");
            splitted.length == 0 ? false : "";
            attrValArr.push(splitted);
          });

          let variations = arrayIterator(attrValArr, []);
          variations.forEach((vart) => {
            var_no++;
            let div = document.createElement("div");
            let var__properties = {
              className: "variation-wrapper col-12 p-0",
              id: `variation-${var_no}`,
            };
            Object.assign(div, var__properties);
            var__html = `
                              <div class="variation-head col-12" data-id="var-div-${var_no}">
                              <span class="variation-head-name">
                                  ${vart.join("-")}
                              </span>
                              <input type='hidden' name='variation_name[]' value='${vart.join("-")}'>
                              <div class="d-flex align-items-center gap-1">
                                  <a href="javascript:void(0)" class="remove-variation text-white" data-var-id='variation-${var_no}'>remove</a>
                                  <span class="material-symbols-outlined attr-direction">
                                      expand_more
                                  </span>
                              </div>
                          </div>
                          <div class="variable-product-field-div col-12" id="var-div-${var_no}">
                              <div class="col-12 d-flex flex-wrap small-column">
                                  <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">price</label>
                                      <input type="text" name="var_regular_price[]" class="p-inp-field" placeholder="regular price" id="">
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">sale price</label>
                                      <input type="text" name="var_sale_price[]" class="p-inp-field" placeholder="sale price" id="">
                                  </div>
                              </div>
                              <div class="col-12 d-flex flex-wrap small-column">
                                  <div class="col-lg-4 col-md-4 col-sm-12  p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">length</label>
                                      <input type="text" name="var_p_width[]" id="" placeholder="in cm" class="p-inp-field">
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12  p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">width</label>
                                      <input type="text" name="var_p_length[]" id="" placeholder="in cm" class="p-inp-field">
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12  p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">height</label>
                                      <input type="text" name="var_p_height[]" id="" placeholder="in cm" class="p-inp-field">
                                  </div>
                  
                              </div>
                              <div class="col-12 d-flex flex-wrap small-column">
                                  <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">Quantity</label>
                                      <input type="text" name="var_p_quantity[]" class="p-inp-field" placeholder="Quantity" id="">
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">Sku (optional)</label>
                                      <input type="text" name="var_p_sku[]" class="p-inp-field" placeholder="ege-0986" id="">
                                  </div>
                                  <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                      <label for="" class="p-inp-label">stock</label>
                                      <select name="var_p_stock[]" id="" class="p-inp-field">
                                          <option value="1">In stock</option>
                                          <option value="0">Out of stock</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-12 p-inp-div d-flex flex-column p-2">
                                  <label for="" class="p-inp-label">Excerpt</label>
                                  <textarea id="des-editor" name="var_p_exercept[]" class="w-100 p-inp-field" rows="6"></textarea>
                              </div>
                          </div>
                              `;
            div.innerHTML = var__html;
            variation_parent.append(div);
            variationAction();
          });
        } else {
          alert("fill the attribute property properly");
        }
      } else {
        alert("first make the attributes");
      }
    });
  }
}
//window function updating content;
window.addEventListener("DOMContentLoaded", function () {
  Array.from(p__type__btns).forEach((item) => {
    if (item.checked) {
      value = item.value;
      if (value == "attribute") {
        document.querySelector(".p-type-info").textContent =
          "Attribute Product";
        classRemoval(label__p__type__btns, item);
        createBtns("a", attr__properties, "Add attributes", button__app__div);
        attributeCreation();
        attributeAction();
      } else if (value == "variation") {
        document.querySelector(".p-type-info").textContent =
          "Variation Product";
        classRemoval(label__p__type__btns, item);
        createBtns("a", attr__properties, "Add attributes", button__app__div);
        createBtns("a", var__properties, "Make variations", button__app__div);
        attributeAction();
        attributeCreation();
        variationAction();
        variationCreation();
      }
    }
  });
});
//ends here

//function for appending buttons

Array.from(p__type__btns).forEach((element) => {
  element.addEventListener("change", (e) => {
    e.stopPropagation();
    Array.from(label__p__type__btns).forEach((elem) => {
      elem.classList.remove("active-radio");
    });
    let id = e.target.id;
    document.querySelector([`[for='${id}']`]).classList.add("active-radio");
    document.querySelector(
      ".p-type-info"
    ).textContent = `${e.target.value} product`;
    if (e.target.value == "simple") {
      // if we want simple product so we remove buttons and attribute and variations product
      button__app__div.innerHTML = "";
      document.getElementById("attr-parent").innerHTML = "";
      document.getElementById("var-parent").innerHTML = "";
    } else if (e.target.value == "attribute") {
      // if we want attribute product so we remove variations buttons and  variations box

      if (document.getElementById("make-var")) {
        button__app__div.removeChild(document.getElementById("make-var"));
      }
      document.getElementById("var-parent").innerHTML = "";
    }
    //appending buttons
    //add attr buttons properties

    if (
      e.target.value == "attribute" &&
      !document.querySelector("#make-attr")
    ) {
      createBtns("a", attr__properties, "Add attributes", button__app__div);
    } else if (
      e.target.value == "variation" &&
      !document.querySelector("#make-var")
    ) {
      if (!document.querySelector("#make-attr")) {
        createBtns("a", attr__properties, "Add attributes", button__app__div);
      }
      createBtns("a", var__properties, "Make variations", button__app__div);
    }

    attributeCreation();

    variationCreation();
    //for hiding and showing attribute section
  });
});

// function for tags appending?

let tagInput = document.getElementById("tagsInp");
let tagsContainer = document.querySelector(".tags-div");
let dbValArr = tagInput.value != "" ? tagInput.value.split(",") : [];
let tagInpValueHolder = document.getElementById("tags-val-holder");

tagInput.addEventListener("keypress", (e) => {
  if (e.key == "Enter" && e.target.value.trim() != "") {
    e.preventDefault();
    let value = e.target.value.trim();
    let splitVal = value.split(",");
    dbValArr.push(...splitVal);
    // e.target.value = "";
    showCommaStr();
  

  }
});

function showCommaStr() {
  tagsContainer.innerHTML = "";
  dbValArr.forEach((item, index) => {
    let anc = document.createElement("a");
    anc.setAttribute("class", "actual-tags");
    anc.innerHTML = `
            ${item}
            <span class="tag-close" data-tag-id="${index}">
                <span class="material-symbols-outlined">close</span>
            </span>
        `;
    tagsContainer.append(anc);
  });
  tagInpValueHolder.value = dbValArr.join(",");
  let tagRemoveBtn = document.getElementsByClassName("tag-close");
  Array.from(tagRemoveBtn).forEach((item) => {
    item.addEventListener("click", function () {
      let r_index = parseInt(this.getAttribute("data-tag-id"));
      dbValArr.splice(r_index, 1);
      showCommaStr();
    });
  });
  tagInput.value = '';
}

showCommaStr();