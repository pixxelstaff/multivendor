window.addEventListener('DOMContentLoaded',function(){
    
// Get all elements with the class "anc"
const ancElements = document.querySelectorAll('.page-link');

// Function to extract the base URL without parameters
function getBaseUrl(url) {
    const urlObject = new URL(url);
    return urlObject.origin + urlObject.pathname;
}

// Loop through each element
ancElements.forEach(element => {
    // Check if the base URL (without parameters) of the element matches the window's base URL
    if (getBaseUrl(element.href) === getBaseUrl(window.location.href)) {
        // If there's a match, add the "active" class
        ancElements.forEach((item) => {
            item.classList.remove('active')
        })
        element.classList.add('active');
    }


});

if(window.location.href == 'http://localhost/Lanotte/admin/' || window.location.href == 'http://localhost/Lanotte/vendor/'){
    ancElements[0].classList.add('active') 
}

let dropDownParent = document.getElementsByClassName('dp-parent');
let dropDown = document.getElementsByClassName('sidebar-dropDown');
Array.from(dropDownParent).forEach((elem) => {
    elem.addEventListener('click', function (e) {
        e.stopImmediatePropagation();
        e.stopPropagation();
        // $('.sidebar-dropDown').slideUp();
        this.querySelector('.ex-more').classList.contains('ex-less') ? this.querySelector('.ex-more').classList.remove('ex-less') : this.querySelector('.ex-more').classList.add('ex-less')
        let dpId = this.getAttribute('data-id');
        $(`#${dpId}`).slideToggle()
    })
})

let subAnchors = document.getElementsByClassName('sub-anc');

Array.from(subAnchors).forEach((elem)=>{
    if (getBaseUrl(elem.href) === getBaseUrl(window.location.href)) {
        // If there's a match, add the "active" class
      console.log(elem.parentElement.parentElement.parentElement)
      elem.classList.add('active-page-anc')
      elem.parentElement.parentElement.parentElement.style.display = 'inline-block'
      let  actAncId =  elem.parentElement.parentElement.parentElement.getAttribute('id');
      ancElements.forEach((item) => {
        if(item.getAttribute('data-id') == actAncId ){
            item.classList.add('active')
        }
    })
    }
})
})
// ancElements.forEach((item) => {
//     item.classList.remove('active')
// })
// element.classList.add('active');