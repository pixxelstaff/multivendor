window.addEventListener("DOMContentLoaded", () => {
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

  //gallery images wala seen?
  let galleryBtn = document.getElementById("upload-gallery-image");
  let galleryImgParent = document.querySelector(".gallery-image-parent");
  let uploaded_gallery_images = document.getElementById(
    "uploaded_gallery_images"
  );
  let upl_images = uploaded_gallery_images.value != '' ? uploaded_gallery_images.value.split(",") : [];
  let selectedFiles = [];
  upl_images.length > 0
    ? (galleryImgParent.style.background = "url()")
    : (galleryImgParent.style = "");
  //appending images
  function attachPrevImg(imageArr, parent) {
    if (upl_images.length > 0) {
      imageArr.forEach((elem) => {
        let div = document.createElement("div");
        div.setAttribute("class", "image-div");
        div.innerHTML = `<img src="../images/uploadimg/${elem}" alt="image here">
        <a href="javascript:void(0)" class="remove-previous-gallery-image" data-previous-img='true'>
            <span class="material-symbols-outlined">
                close
            </span>
        </a>`;
        parent.append(div);
      });
    }
  }
  function handleUploadedImg() {
    attachPrevImg(upl_images, galleryImgParent);
    //removing prevoius image

    if (document.getElementsByClassName("remove-previous-gallery-image")) {
      let remove_p_imgs = document.getElementsByClassName(
        "remove-previous-gallery-image"
      );
      Array.from(remove_p_imgs).forEach((btn, no) => {
        btn.addEventListener("click", function (e) {
          e.stopPropagation();
          let parent = this.parentElement;
          let indexToRemove = Array.from(parent.parentNode.children).indexOf(
            parent
          );
          parent.parentNode.removeChild(parent);
          upl_images.splice(indexToRemove, 1);
          uploaded_gallery_images.value = upl_images.join(",");
          console.log(uploaded_gallery_images.value)
        });
      });
    }
  }

  handleUploadedImg();

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
    handleUploadedImg();
    // for background removing?
    files.length > 0
      ? (galleryImgParent.style.background = "url()")
      : (galleryImgParent.style = "");
    let allowedFormat = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
    Array.from(files).forEach((item, ind) => {
      if (allowedFormat.includes(item.type)) {
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
                let upd_index = indexToRemove - upl_images.length;
                parentDiv.parentNode.removeChild(parentDiv);
                selectedFiles.splice(upd_index, 1); // Remove the corresponding file from selectedFiles array
                galleryBtn.files = new FileListArray(selectedFiles);
              });
            });
          }
        };

        Mreader.readAsDataURL(item);
      } else {
        alert("only jpg,jpeg,png,webp file formats are allowed");
      }
    });
  });
});
