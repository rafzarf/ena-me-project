$('.dateselect').datepicker({
    format: 'yyyy/mm/dd',
    autoclose: true,
    todayHighlight: true,
});


//response : success (green) ,warning (yellow), error (red)
function swaltoast(title,response) {
    return Swal.fire({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        icon: response,
        title: title,
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        showCloseButton: true,
        showClass: {
            popup: "slide-bottom"
        }
    })
}

function response(dataflash, successText, errorText) {
    setTimeout(() => {
        dataflash.data('flash') == "success" ? swaltoast(successText,'success') :
            dataflash.data('flash') == "error" ? swaltoast(errorText,'error') : null;
    }, 3000);
}

function showTab(currentTab, tabElement, tabLength, prevBtnElement, nextBtnElement, stringsubmit,ModalElement) {
    $(ModalElement).find(".tabnum p").html((currentTab.nilai+1) + "/");
    $(".curr_tab").val(currentTab.nilai+1);
    $(".end_tab").val($(tabElement).length);
    $(tabElement).eq(currentTab.nilai).css("display", "block");
    if (currentTab.nilai == 0) {
        prevBtnElement.css("display", "none");
    } else {
        prevBtnElement.css("display", "inline");
    }
    if (currentTab.nilai == tabLength) { 
        nextBtnElement.html('<span class="d-flex"><p class="text-sm my-auto fw-bolder">'+stringsubmit+'</p><i class="d-flex my-auto fs-6 ms-2 bx bx-save"></i> </span>');
    } else {
        nextBtnElement.html('<span class="d-flex"><p class="text-sm my-auto fw-bolder">Next Step</p><i class="d-flex my-auto fs-5 ms-1 bx bx-right-arrow-alt"></i> </span>');
    }
}

function nextPrev(adderVal, tabElement, tabLength, currentTab, formElement, ModalElement, prevBtnElement, nextBtnElement, valid, stringsubmit) {
    if (adderVal == 1 && valid === false) return false;
    if (adderVal == -1 && currentTab.nilai == 0) return false;
    $(tabElement).eq(currentTab.nilai).css("display", "none");
    currentTab.nilai += adderVal;
    if (currentTab.nilai > tabLength) {
        currentTab.nilai = currentTab.nilai -= 1;
    }
    
    showTab(currentTab, tabElement, tabLength, prevBtnElement, nextBtnElement,stringsubmit,ModalElement);
}

// validasi form pake ajax, kelemahannya setiap next dia request ajax , ntah ngaruh ke performa atau nggak
// ini efek karena formnya dibagi bbrp section . validasi backend udh dilempar ke frontend pake ajax ini.
// penting buat yang validasi gambar, klo validasi kosong mungkin frontend cukup.
function validateFormAJAX(formElement, link, tabElement, currentTab, callback) {
    var y, i, keys, feedback, valid, msg = [];
    valid = true;
    feedback = $('.invalid-feedback');
    y = $(tabElement).eq(currentTab.nilai).find("input");
    var data = new FormData(formElement);
    $.ajax({
        type: 'POST',
        url: link,
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (data) {
            if (data) {
                for (i = 0; i < y.length; i++) {
                    keys = y.eq(i).attr("id");
                    if (data[keys]) {
                        y.eq(i).addClass("is-invalid");
                        $('.' + keys + '-div').find(feedback).html(data[keys]);
                        valid = false;
                        msg.push(data[keys])
                    }
                }(valid == true) ? null: swaltoast(msg,'warning');
            }
            if (currentTab.nilai == ($(tabElement).length - 1)) {
                if (data.success) {
                    swaltoast("Data Telah Berhasil Disimpan",'success').then(function () {
                        location.reload();
                    });
                }
            }
            
            //console.log(valid);
            callback(valid);
        },
        error: function (xhr, ajaxOptions, thrownError) { 
            swaltoast(thrownError,'error');
        }
    });
}

//ripple effect button
[].map.call(document.querySelectorAll('[anim="ripple"]'), el => {
    el.addEventListener('click', e => {
        e = e.touches ? e.touches[0] : e;
        const r = el.getBoundingClientRect(),
            d = Math.sqrt(Math.pow(r.width, 2) + Math.pow(r.height, 2)) * 2;
        el.style.cssText = `--s: 0; --o: 1;`;
        el.offsetTop;
        el.style.cssText = `--t: 1; --o: 0; --d: ${d}; --x:${e.clientX - r.left}; --y:${e.clientY - r.top};`
    })
})

$('.searchdel').click(function() {
    $("#searchbox").val("");
    $("#searchbar").trigger('submit');
})

//search bar validation
$('.searchbtn').click(function() {
    if($("#searchbox").val()) {
        $("#searchbar").trigger('submit');
    } else {
        swaltoast("Searchbar tidak boleh kosong","warning");
    }
})