window.addEventListener("DOMContentLoaded", () => {
  let viewCatPop = document.getElementsByClassName("eye-pop");
  let editCatPop = document.getElementsByClassName("edit-pop");
  let wrapper = document.querySelector(".popup-wrapper");
  let closeBtn = document.querySelector(".close-btn");
  // we have 2 forms view and edit
  let viewForm = document.getElementById("view-form");
  let editForm = document.getElementById("edit-form");

  //function for encoding and decoding

  function decodeHTMLEntities(html) {
    var element = document.createElement("div");
    element.innerHTML = html;
    return element.textContent || element.innerText;
  }

  //function to show and hide

  function popShow(
    action,
    wrapper,
    whichFormShow,
    viewform = viewForm,
    editform = editForm
  ) {
    if (action == "show") {
      if (whichFormShow == "view") {
        if (viewform.classList.contains("d-none")) {
          editform.classList.add("d-none");
          viewform.classList.remove("d-none");
        }
      } else {
        if (editform.classList.contains("d-none")) {
          viewform.classList.add("d-none");
          editform.classList.remove("d-none");
        }
      }
      wrapper.style.display = "flex";
      setTimeout(() => {
        wrapper.style.transform = "scale(1)";
        wrapper.style.opacity = "1";
      }, 50);
    } else {
      wrapper.style.display = "none";
      setTimeout(() => {
        wrapper.style.opacity = "0";
        wrapper.style.transform = "scale(1.4)";
      }, 10);
    }
  }

  Array.from(viewCatPop).forEach((item, index) => {
    item.addEventListener("click", function () {
      let ajax_url = '';
      if(this.getAttribute('data-category-page') == 'product'){
        ajax_url = "ajax/category.php"
      }
      else if(this.getAttribute('data-category-page') == 'service'){
        ajax_url = "ajax/service-category.php";
      }
      popShow("show", wrapper, "view");
      let id = $(this).attr("data-action-id");
      console.log(id);
      $.ajax({
        url: ajax_url,
        type: "POST",
        dataType: "json",
        data: { id: id },
        success: function (res) {
          console.log(res);
          var decodedName = decodeHTMLEntities(res[0].name);
          $("#view-category-name").val(decodedName);
          $("#view-parent-category").empty();
          $("#view-parent-category").append(
            `<option value="">${res[0].parent_category}</option>`
          );
          $("#view-category-image").attr(
            "src",
            `../images/uploadimg/${res[0].image}`
          );
          $("#category-description").val(`${res[0].des}`);
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  });
  Array.from(editCatPop).forEach((item, index) => {
    item.addEventListener("click", function () {
      popShow("show", wrapper, "edit");
      let id = $(this).attr("data-action-id");
      let ajax_url = '';
      if(this.getAttribute('data-category-page') == 'product'){
        ajax_url = "ajax/category.php"
      }
      else if(this.getAttribute('data-category-page') == 'service'){
        ajax_url = "ajax/service-category.php";
      }
      $.ajax({
        url: ajax_url,
        type: "POST",
        dataType: "json",
        data: { id: id },
        success: function (res) {
          console.log(res);
          $("#upd__Id").val(res[0].id);
          var decodedName = decodeHTMLEntities(res[0].name);
          $("#upd__name").val(decodedName);
          $("#upd__p__cat").empty();
          let categoryData = res[0].categories;
          $("#upd__p__cat").append(`<option value="">select options</option>`);
          $("#upd__p__cat").append(`<option value="0">no-parent</option>`);
          categoryData.forEach((item) => {
            if (item.id == res[0].p_id) {
              $("#upd__p__cat").append(
                `<option value="${item.id}" selected>${item.name}</option>`
              );
            } else {
              $("#upd__p__cat").append(
                `<option value="${item.id}">${item.name}</option>`
              );
            }
          });

          $("#prev_image").val(`${res[0].image}`);
          $("#upd__des").val(`${res[0].des}`);
        },
        error: function (error) {
          console.log(error);
        },
      });
    });
  });
  closeBtn.addEventListener("click", () => {
    popShow("close", wrapper, "view");
  });
});
