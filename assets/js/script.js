let approveBtn = document.getElementsByClassName('approve-vendor');
if (approveBtn) {
    let statusTd = document.querySelectorAll('.status-td');
    Array.from(approveBtn).forEach((item, index) => {
        item.addEventListener('click', () => {
            var userResponse = confirm("are you sure you want to approve");
            if (userResponse) {
                let choosenOne = statusTd[index].querySelector('span')
                choosenOne.classList.remove('pending');
                choosenOne.classList.add('suc');
                choosenOne.textContent = 'approved'
            }


        })
    })
}


// code for tabs switching?
function tabsShuffle(btnArray, tabArray) {
    Array.from(btnArray).forEach((item) => {
        item.addEventListener('click', function () {
            Array.from(btnArray).forEach((element) => {
                element.classList.remove('active-anc')
            })
            Array.from(tabArray).forEach((tabElement) => {
                tabElement.classList.add('d-none')
                tabElement.classList.remove('active-vendor-tab');
            })
            //    console.log()
            let actTab = document.querySelector(`#${this.getAttribute('data-id')}`)
            actTab.classList.remove('d-none');
            setTimeout(() => {
                actTab.classList.add('active-vendor-tab');
            }, 300)
            this.classList.add('active-anc')
        })
    })
}

let tabsBtn = document.getElementsByClassName('tabs-anc');
let venTabs = document.getElementsByClassName('vendor-tab');


tabsShuffle(tabsBtn, venTabs)

