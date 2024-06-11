function serviceAction() {
  //hide and show div here
  if (document.getElementsByClassName("attribute-head")) {
    let attr__head = document.getElementsByClassName("attribute-head");
    Array.from(attr__head).forEach((item) => {
      item.addEventListener("click", (e) => {
        e.stopImmediatePropagation();
        let boxId = e.target.getAttribute("data-id");
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

function serviceCreation() {
  if (document.getElementById("add-service")) {
    let attr_parent = document.getElementById("attr-parent");
    let make__service = document.querySelector("#add-service");
    let attr_no = document.getElementsByClassName("attribute-wrapper")
      ? document.getElementsByClassName("attribute-wrapper").length
      : 0;
    make__service.addEventListener("click", (e) => {
      e.stopPropagation();
      e.stopImmediatePropagation();

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
                        service-${attr_no} - click to add services
                    </span>
                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:void(0)" class="text-white remove-attr-box" data-attr-id="attribute-${attr_no}">remove</a>
                        <span class="material-symbols-outlined attr-direction">
                            expand_more
                        </span>
                    </div>
                </div>
                <div class="attribute-field-div col-12" id="attribute-f-div-${attr_no}">
                    <input type="text" name="service[]" placeholder="attribute-name" id="" class="p-inp-field attr-name">
                    <textarea name="service_des[]" id="" class="w-100 p-inp-field attribute-val-area" rows="4" placeholder="Enter service values"></textarea>
                </div>
                    `;
      div.innerHTML = attrHtml;
      attr_parent.append(div);

      attributeAction();
    });
  }
}
serviceAction();
serviceCreation();
if (document.getElementById("upload-video")) {
  let validVideoTypes = ["video/mp4", "video/webm", "video/ogg"];
  let upload_video_btn = document.getElementById("upload-video");
  upload_video_btn.addEventListener("change", function (e) {
    $(".video-progress").empty();
    let v__file = e.target.files[0];
    if (validVideoTypes.includes(v__file.type)) {
      let formData = new FormData(); // Create a FormData object
      formData.append("video", v__file); // Append the file to the FormData object
      $.ajax({
        url: "../ajax/upload__video.php",
        type: "POST",
        data: formData, // Send the FormData object instead of raw file content
        processData: false, // Prevent jQuery from automatically processing the data
        contentType: false, // Prevent jQuery from automatically setting the content type
        xhr: function () {
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
            let div = document.createElement("div");
            div.setAttribute("class", "progress-div");
            div.innerHTML = `
            <div class="progress-icon-div">
                <span class="material-symbols-outlined">
                    video_file
                </span>
           </div>
           <div class="progress-content-div">
              <p></p>
            <div class="progress-bar-p">
                <div class="progress-bar-c"></div>
            </div>
        </div>`;
            $(".video-progress").append(div);
            xhr.upload.addEventListener(
              "progress",
              function (event) {
                if (event.lengthComputable) {
                  var percentComplete = (event.loaded / event.total) * 100;
                  $(".progress-bar-c").css({
                    width: `${percentComplete}%`,
                  });
                  $(".progress-content-div p").text(`${v__file.name}`);
                }
              },
              false
            );
          }
          return xhr;
        },
        success: function (response) {
          alert("Video uploaded successfully!");
        },
        error: function (xhr, status, error) {
          alert("Video upload failed: " + error);
        },
      });
    } else {
      alert("incorrect format,please upload video with right format");
    }
  });
}

//slot working

let slot = document.getElementById("slot-selector");

let days = [
  "saturday",
  "sunday",
  "monday",
  "tuesday",
  "wednesday",
  "thursday",
  "friday",
];

let userSelectedSlotDays = [];

function the_slot_booking(Elementvalue) {
  let slotWrapper = document.getElementById("slot-wrapper");
  if (Elementvalue == "1") {
    slotWrapper.classList.replace("d-none", "d-flex");
    let label = document.createElement("label");
    label.setAttribute("class", "p-inp-label");
    label.textContent = "Select slot days";
    slotWrapper.append(label);
    //let create days wrapper
    let daysWrapper = document.createElement("div");
    daysWrapper.setAttribute("class", "col-12 d-flex gap-2 flex-wrap mb-1");
    slotWrapper.append(daysWrapper);
    days.forEach((item, indx) => {
      let daysDiv = document.createElement("div");
      daysDiv.setAttribute("class", "slot-days");
      daysDiv.innerHTML = ` <input type="checkbox" name="slotdays[]" class="days-checkbox" value="${item}" id="${item}" hidden>
      <label for="${item}" >${item}</label>`;
      daysWrapper.append(daysDiv);
    });

    let btn = document.createElement("a");
    let prop = {
      className: "action-btn",
      id: "make-slot",
      href: "javascript:void(0)",
    };
    Object.assign(btn, prop);
    btn.textContent = "Make Slot";
    slotWrapper.append(btn);

    //slot wrapper

    let slotContainer = document.createElement("div");
    slotContainer.setAttribute("class", "slots-p col-12");
    slotWrapper.append(slotContainer);

    //now add check-label on change;
    let daysInpField = document.getElementsByClassName("days-checkbox");
    Array.from(daysInpField).forEach((elem, no) => {
      elem.addEventListener("change", function () {
        let parent = this.parentElement;
        let label = parent.querySelector("label");
        if (this.checked) {
          label.className = "checked-label";
          //make slot
        } else {
          label.classList.remove("checked-label");
        }
      });
    });
    //making slot body structure
    let makeSlotBtn = document.getElementById("make-slot");
    makeSlotBtn.addEventListener("click", function () {
      let daysCheckedBoxes = document.querySelectorAll(
        ".days-checkbox:checked"
      );
      //work will need on submitting
      userSelectedSlotDays = Array.from(daysCheckedBoxes);

      if (daysCheckedBoxes.length > 0) {
        let selectDays = [];
        Array.from(daysCheckedBoxes).forEach((itm, num) => {
          selectDays.push(itm.value);
        });
        slotContainer.innerHTML = "";
        selectDays.forEach((days, num) => {
          let slotbox = document.createElement("div");
          let dy_id = days + "-" + num;
          slotbox.setAttribute("class", "slot-box w-100");
          slotbox.innerHTML = `
          <div class="slot-head d-flex justify-content-between p-inp-field" data-body-id="${dy_id}">
            <span>${days} slot - click here</span>
              <a href="javascript:void(0)" class="add-slot-btn" data-day-name=${days} data-append-div="${dy_id}">
                  <span class="material-symbols-outlined">
                     add
                 </span>
              </a>
          </div>
         <div class="slot-body w-100" id="${dy_id}" show-body="true">
             <div class="empty-slot w-100 d-flex flex-column gap-1 align-items-center justify-content-center">
               <img src="../images/dashboard-img/slot.png" alt="">
               <p>No slots added</p>
             </div>
         </div>
          `;
          slotContainer.append(slotbox);
        });
      } else {
        slotContainer.innerHTML = "";
        alert("please select days");
      }
      //open and close body on clicking on head;
      let slotHead = document.querySelectorAll(".slot-head");
      Array.from(slotHead).forEach((item, no) => {
        item.addEventListener("click", function () {
          let bodyId = this.getAttribute("data-body-id");
          $(`#${bodyId}`).slideToggle();
          $(`#${bodyId}`).attr("show-body") == "true"
            ? $(`#${bodyId}`).attr("show-body", "false")
            : $(`#${bodyId}`).attr("show-body", "true");
        });
      });
      //ends here
      //add row
      let addSlotBtn = document.querySelectorAll(".add-slot-btn");
      let slotCounter = {}; // Object to maintain counters for each day
      Array.from(addSlotBtn).forEach((btn, num) => {
        btn.addEventListener("click", function (e) {
          e.stopImmediatePropagation();
          let slotDay = this.getAttribute("data-day-name");
          let slotAppendDiv = this.getAttribute("data-append-div"); //body
          let appendContainer = document.querySelector(`#${slotAppendDiv}`);

          if (!slotCounter[slotDay]) {
            slotCounter[slotDay] = 0;
          }
          console.log(slotCounter);
          // let uniqueNum;
          let uniqueClass = slotDay + "-row";
          if (document.querySelectorAll(`.${uniqueClass}`).length < 1) {
            appendContainer.innerHTML = "";
          }
          if (appendContainer.getAttribute("show-body") == "false") {
            $(`#${slotAppendDiv}`).slideToggle();
            $(`#${slotAppendDiv}`).attr("show-body", "true");
          }
          let div = document.createElement("div");
          div.setAttribute(
            "class",
            `slot-field-wrapper col-12 d-flex flex-wrap my-2 ${uniqueClass} `
          );
          let unqId = slotDay + "-slot-" + slotCounter[slotDay];
          div.setAttribute("id", `${unqId}`);
          div.innerHTML = `
          <div class="col-lg-4 col-md-4 col-sm-12 p-1">
          <label for="" class="p-inp-label">slot start time</label>
          <input type="time" name="${slotDay}-start-time[]" class="p-inp-field ${slotDay}-start-time" placeholder="start time" id="">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 p-1">
          <label for="" class="p-inp-label">slot end time</label>
          <input type="time" name="${slotDay}-end-time[]" class="p-inp-field ${slotDay}-end-time" placeholder="end time" id="">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 p-1">
          <label for="" class="p-inp-label">person per slot</label>
          <input type="text" name="${slotDay}-person[]" class="p-inp-field ${slotDay}-person" placeholder="no of person " id="">
          </div>
          <a href="javascript:void(0)" class="remove-slot-row" data-id="${unqId}">
          <span class="material-symbols-outlined">
              remove
          </span>
          </a>
          `;
          appendContainer.append(div);
          slotCounter[slotDay]++;
          //remove row
          let removeSlotRow = document.querySelectorAll(".remove-slot-row");
          Array.from(removeSlotRow).forEach((rem, num) => {
            rem.addEventListener("click", function (e) {
              e.stopImmediatePropagation();
              let id = this.getAttribute("data-id");
              let row = document.getElementById(`${id}`);
              // let otherDiv = rowParent.querySelectorAll('div');
              if (row) {
                let rowParent = row.parentElement;
                let OtherSlotRow = rowParent.querySelectorAll(
                  ".slot-field-wrapper"
                );
                if (OtherSlotRow.length == 1) {
                  rowParent.innerHTML = ` <div class="empty-slot w-100 d-flex flex-column gap-1 align-items-center justify-content-center">
               <img src="../images/dashboard-img/slot.png" alt="">
               <p>No slots added</p>
             </div>`;
                }
              }
              if (row) {
                row.remove();
              }
            });
          });
        });
        //click ends here
      });
      //ends row
    });
  } else {
    slotWrapper.innerHTML = "";
    if (slotWrapper.classList.contains("d-flex")) {
      slotWrapper.classList.replace("d-flex", "d-none");
    }
  }
}

slot.addEventListener("change", function () {
  the_slot_booking(this.value);
});

//working on submiting;

let service__form = document.getElementById("service-form");

service__form.addEventListener("submit", function (e) {
  // e.preventDefault();
  let slotDaysContainer = [];
  let slotDataContainer = [];
  selectedDaysInp = Array.from(
    document.querySelectorAll(".days-checkbox:checked")
  );
  if (selectedDaysInp.length > 0) {
    selectedDaysInp.forEach((item, indx) => {
      slotDaysContainer.push(item.value);
      let keyName = item.value;
      let data = [];
      let slot__start__time = document.getElementsByClassName(
        `${item.value}-start-time`
      );

      let slot__end__time = document.getElementsByClassName(
        `${item.value}-end-time`
      );
      let slot__person = document.getElementsByClassName(
        `${item.value}-person`
      );

      Array.from(slot__start__time).map((element, indx) => {
        data.push({
          startTime: element.value,
          endTime: slot__end__time[indx].value,
          person: slot__person[indx].value,
        });
      });
      slotDataContainer.push({ [keyName]: data });
    });
    let jsonDaysData = JSON.stringify(slotDaysContainer);
    let jsonDataContainer = JSON.stringify(slotDataContainer);

   
    document.getElementById("slot_days_inp").value = jsonDaysData;
    document.getElementById("slot_days_data").value = jsonDataContainer;
  }
});
