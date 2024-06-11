window.addEventListener("DOMContentLoaded", function () {
  //now add check-label on change;
  let daysInpField = document.getElementsByClassName("days-checkbox");
  console.log(daysInpField);
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
  //one we have to use when body is load and one we have to used when make slot is clicked?
  function up_down() {
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
  }
  up_down();

  //add btns

  function remove_row() {
    let removeSlotRow = document.querySelectorAll(".remove-slot-row");
    Array.from(removeSlotRow).forEach((rem, num) => {
      rem.addEventListener("click", function (e) {
        e.stopImmediatePropagation();
        let id = this.getAttribute("data-id");
        let row = document.getElementById(`${id}`);
        // let otherDiv = rowParent.querySelectorAll('div');
        if (row) {
          let rowParent = row.parentElement;
          let OtherSlotRow = rowParent.querySelectorAll(".slot-field-wrapper");
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
  }
  remove_row();

  //row things?
  function add_row() {
    //add row
    let addSlotBtn = document.querySelectorAll(".add-slot-btn");
    console.log(addSlotBtn);
    let slotCounter = {}; // Object to maintain counters for each day
    Array.from(addSlotBtn).forEach((btn, num) => {
      btn.addEventListener("click", function (e) {
        e.stopImmediatePropagation();
        let slotDay = this.getAttribute("data-day-name");
        let slotAppendDiv = this.getAttribute("data-append-div"); //body
        let appendContainer = document.querySelector(`#${slotAppendDiv}`);
        let uniqueClass = slotDay + "-row";

        if (!slotCounter[slotDay]) {
          slotCounter[slotDay] = document.querySelectorAll(
            `.${uniqueClass}`
          ).length;
        }
        console.log(slotCounter);
        // let uniqueNum;
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
        remove_row();
      });
      //click ends here
    });
  }

  add_row();

  //now make other slot also?
  //making slot body structure
  let slotContainer = document.querySelector(".slots-p");
  let makeSlotBtn = document.getElementById("make-slot");
  makeSlotBtn.addEventListener("click", function () {
    let daysCheckedBoxes = document.querySelectorAll(".days-checkbox:checked");
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
    up_down();
    //ends here
    add_row();
    //ends row
  });
});
