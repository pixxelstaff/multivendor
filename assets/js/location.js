$(".country-edit-btn").each((indx, item) => {
  $(item).on("click", function () {
    let country_id = $(this).attr("data-action-id");
    let countryInp = document.querySelector("#country-name");
    let countryCodeInp = document.querySelector("#country-code");
    let countryUpdkey = document.querySelector("#country-key");
    let countrySub = document.querySelector("#country_sub_btn");

    $.ajax({
      url: "../ajax/location_country.php",
      type: "POST",
      data: { id: country_id },
      datatype: "json",
      success: function (response) {
        if (response.status_define == "success") {
          let data = response.data[0];
          countryInp.value = data.name;
          countryCodeInp.value = data.code;
          countryUpdkey.value = data.id;
          countrySub.setAttribute("name", "upd_loc_country");
          countrySub.value = "update country";
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});

//city data here

$(".upd-city-data").each((indx, item) => {
  $(item).on("click", function (e) {
    e.stopPropagation();
    let cityId = $(this).attr("data-action-id");
    let cityConData = document.querySelector("#country-data");
    let cityNameInp = document.querySelector("#city-name");
    let cityUpdkey = document.querySelector("#city-key");
    let citySub = document.querySelector("#city_sub_btn");

    $.ajax({
      url: "../ajax/location_city.php",
      type: "POST",
      data: { id: cityId },
      datatype: "json",
      success: function (response) {
        if (response.status_define == "success") {
          //other data
          let data = response.data[0];
          //countries
          let countries = response.country_data; // Assuming country is an array
          cityConData.innerHTML = ""; // Clear existing options

          // Create and append default option
          let defaultOpt = document.createElement("option");
          defaultOpt.value = "";
          defaultOpt.textContent = "select country";
          cityConData.append(defaultOpt);

          // Append dynamic options
          countries.forEach((country, indx) => {
            let opt = document.createElement("option");
            opt.value = country.Id; // Assuming Id is the unique identifier
            opt.text = country.name;
            if (country.Id == data.country_id) {
              opt.setAttribute("selected", "");
            }
            cityConData.append(opt);
          });
          cityNameInp.value = `${data.name}`;
          cityUpdkey.value = `${data.id}`;
          citySub.value = "update city";
          citySub.setAttribute("name", "upd_city");
          console.log(response);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});

$(".area-edit-btn").each((indx, item) => {
  $(item).on("click", function (e) {
    e.stopPropagation();
    let areaId = $(this).attr("data-action-id");
    let areaCityData = document.querySelector("#areaCityData");
    let areaNameInp = document.querySelector("#area-name");
    let areaUpdkey = document.querySelector("#area-key");
    let areaSub = document.querySelector("#area_sub_btn");

    $.ajax({
      url: "../ajax/location_area.php",
      type: "POST",
      data: { id: areaId },
      datatype: "json",
      success: function (response) {
        if (response.status_define == "success") {
          //other data
          let data = response.data[0];
          //cities
          let cities = response.city_data; // Assuming country is an array
          areaCityData.innerHTML = ""; // Clear existing options

          // Create and append default option
          let defaultOpt = document.createElement("option");
          defaultOpt.value = "";
          defaultOpt.textContent = "select city";
          areaCityData.append(defaultOpt);

          // Append dynamic options
          cities.forEach((city, indx) => {
            let opt = document.createElement("option");
            opt.value = city.Id; // Assuming Id is the unique identifier
            opt.text = city.name;
            if (city.Id == data.city_id) {
              opt.setAttribute("selected", "");
            }
            areaCityData.append(opt);
          });
          areaNameInp.value = `${data.name}`;
          areaUpdkey.value = `${data.id}`;
          areaSub.value = "update area";
          areaSub.setAttribute("name", "upd_area");
          console.log(response);
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});

//for city and area
