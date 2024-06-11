$(document).ready(() => {
  $("#ar-city").on("change", function () {
    let select_opt = $('#area-select');
    let id = $(this).val();
    $.ajax({
      url: "../ajax/area.php",
      type: "POST",
      data: { id: id },
      datatype: 'json',
      success: function (response) {
        let state = response.status_define;
        console.log(state)
        if(state == 'success'){
            let data = response.data;
            select_opt.empty();
            select_opt.append(`<option value=''>select area</option>`)
            Array.from(data).forEach(element => {
                select_opt.append(`<option value='${element.id}'>${element.name}</option>`)
            });
        }
        else{
            alert(`${response.message}`)
        }
      },
      error: function (errorthrown) {
        console.log(errorthrown.responseText);
      },
    });
  });
});
