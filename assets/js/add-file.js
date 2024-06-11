window.addEventListener("DOMContentLoaded", () => {
  // image upload system

  const upload_featured_image = document.querySelector("#upload-f-image");
  let img = document.querySelector(".featured-img");
  let rm_f_img = document.querySelector(".remove-f-image");
  function removeFeaturedImage(btn, img, inputF) {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      img.src = "";
      inputF.value = "";
      img.classList.add("d-none");
      btn.classList.add("d-none");
    });
  }
  removeFeaturedImage(rm_f_img, img, upload_featured_image);
  upload_featured_image.addEventListener("change", (e) => {
    let fileInput = e.target;
    let file = fileInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        img.src = e.target.result;
      };
      reader.readAsDataURL(file);
      img.classList.remove("d-none");
      rm_f_img.classList.remove("d-none");
      removeFeaturedImage(rm_f_img, img, upload_featured_image);
    }
  });

  let galleryBtn = document.getElementById("upload-gallery-image");
  let galleryImgParent = document.querySelector(".gallery-image-parent");
  let selectedFiles = [];

  //adding filelsit function for handling files;

  function FileListArray(files) {
    var fileList = new DataTransfer();
    for (var i = 0; i < files.length; i++) {
      fileList.items.add(files[i]);
    }
    return fileList.files;
  }

  galleryBtn.addEventListener("change", (e) => {
    let files = e.target.files;
    galleryImgParent.innerHTML = "";
    // for background removing?
    files.length > 0
      ? (galleryImgParent.style.background = "url()")
      : (galleryImgParent.style = "");
    Array.from(files).forEach((item, ind) => {
      selectedFiles.push(item);
      const Mreader = new FileReader();
      Mreader.onload = function (e) {
        let currentSource = e.target.result;
        let div = document.createElement("div");
        div.setAttribute("class", "image-div");
        div.innerHTML = `<img src="${currentSource}" alt="image here">
            <a href="javascript:void(0)" class="remove-gallery-image">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>`;
        galleryImgParent.append(div);
        if (document.getElementsByClassName("remove-gallery-image")) {
          console.log("close btn is present");
          let removeBtn = document.getElementsByClassName(
            "remove-gallery-image"
          );
          Array.from(removeBtn).forEach((elem) => {
            elem.addEventListener("click", function (e) {
              e.stopImmediatePropagation();
              let parentDiv = this.parentElement; // Get the parent div containing the image and remove button
              let indexToRemove = Array.from(
                parentDiv.parentNode.children
              ).indexOf(parentDiv); // Find the index of the parent div
              parentDiv.parentNode.removeChild(parentDiv); // Remove the parent div
              selectedFiles.splice(indexToRemove, 1); // Remove the corresponding file from selectedFiles array
              galleryBtn.files = new FileListArray(selectedFiles);
            });
          });
        }
      };

      Mreader.readAsDataURL(item);
    });
  });
});
