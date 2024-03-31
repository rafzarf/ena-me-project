$('.dateselect').datepicker({
    format: 'yyyy/mm/dd',
    autoclose: true,
    todayHighlight: true,
});


function popup_green(title) {
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        icon: 'success',
        title: title,
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })
}

function popup_yellow(title) {
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        icon: 'warning',
        title: title,
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })

}

function popup_red(title) {
    Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        icon: 'error',
        title: title,
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
}

function response(dataflash, successText, errorText) {
    setTimeout(() => {
        dataflash.data('flash') == "success" ? popup_green(successText) :
            dataflash.data('flash') == "error" ? popup_red(errorText) : null;
    }, 3000);
}

function showTab(currentTab, tabElement, tabLength, prevBtnElement, nextBtnElement) {
    tabElement.eq(currentTab.nilai).css("display", "block");
    if (currentTab.nilai == 0) {
        prevBtnElement.css("display", "none");
    } else {
        prevBtnElement.css("display", "inline");
    }
    if (currentTab.nilai == tabLength) {
        nextBtnElement.html("Submit");
    } else {
        nextBtnElement.html("Next");
    }
}

function nextPrev(adderVal, tabElement, tabLength, currentTab, formElement, ModalElement, prevBtnElement, nextBtnElement) {

    if (adderVal == 1 && !validateForm(tabElement, currentTab)) return false;
    // Hide the current tab:
    tabElement.eq(currentTab.nilai).css("display", "none");
    // Increase or decrease the current tab by 1:
    currentTab.nilai = currentTab.nilai + adderVal;

    if (currentTab.nilai > tabLength) {
        // ... the form gets submitted:
        formElement.trigger("submit");
        $(ModalElement).modal("hide");
        return false;
    }
    showTab(currentTab, tabElement, tabLength, prevBtnElement, nextBtnElement);
}

function validateForm(tabElement, currentTab) {
    // This function deals with validation of the form fields
    var y, i, valid = true;
    y = tabElement.eq(currentTab.nilai).find("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y.eq(i).val() == "") {
            // add an "invalid" class to the field:
            y.eq(i).addClass("invalid");
            // and set the current valid status to false
            valid = false;
            popup_yellow('Input Ini Wajib Diisi');
        }
    }
    return valid;
}

//ripple effect button
[].map.call(document.querySelectorAll('[anim="ripple"]'), el=> {
    el.addEventListener('click',e => {
        e = e.touches ? e.touches[0] : e;
        const r = el.getBoundingClientRect(), d = Math.sqrt(Math.pow(r.width,2)+Math.pow(r.height,2)) * 2;
        el.style.cssText = `--s: 0; --o: 1;`;  el.offsetTop; 
        el.style.cssText = `--t: 1; --o: 0; --d: ${d}; --x:${e.clientX - r.left}; --y:${e.clientY - r.top};`
    })
})