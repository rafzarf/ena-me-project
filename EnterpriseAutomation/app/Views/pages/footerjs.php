<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('del_msg') ?>" class="data-delete d-none"> </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script src="/assets/js/myfunction.js"></script>

<script>
    // Creating response and call Sweet alert 
    const delete_response = $('.data-delete');
    response(delete_response, "Data Berhasil Dihapus", "Data Gagal Dihapus");

    $(document).ready(function () {
        /*saat modal akan tampil (event show pada modal berarti saat modal hendak popup)
        jika shown adalah modal saat sudah popup. lakukan fungsi dibawah ini.
        modal delete*/
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            // debugging url
            // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') +
            //     '</strong>');
        });

        // form setelah invalid pas di keyup atau change sama pas modal show ilang invalidnya.
        $(":input").on("keyup change focus", function () {
            ($(this).hasClass('is-invalid')) ? $(this).removeClass('is-invalid'): null;
            $('.invalid-feedback').each(function () {
                $(this).html('');
            });
        });

        $(".modal").on('hide.bs.modal', function () {
            $(this).find(":input").each(function () {
                ($(this).hasClass('is-invalid')) ? $(this).removeClass('is-invalid'): null;
            });
            $('.invalid-feedback').each(function () {
                $(this).html('');
            });
        })
    });

    /*MULTI STEP MODAL
    buat input,edit & validasi harus sama idnya biar efisien,
    kalau ada form selain itu baru buat / tambah lagi varnya disini*/
    let form = {
        0: {
            currentTab: {
                nilai: 0
            },
            tabElement: ".tab",
            tabLength: $(".tab").length - 1,
            prevBtn: "#prevBtn",
            nextBtn: "#nextBtn",
            formElement: document.getElementById("create-form"),
            modalElement: "#createModal",
            url: document.getElementById("create-form").getAttribute('data-url'),
            stringSubmit: "Simpan Data",
        },
        1: {
            currentTab: {
                nilai: 0
            },
            tabElement: ".tab_edit",
            tabLength: $(".tab_edit").length - 1,
            prevBtn: "#prevBtn_edit",
            nextBtn: "#nextBtn_edit",
            formElement: document.getElementById("edit-form"),
            modalElement: "#modal_info",
            url: (document.getElementById("edit-form")) ? 
            document.getElementById("edit-form").getAttribute('data-url') : "",
            stringSubmit: "Simpan Data",
        },
        2: {
            currentTab: {
                nilai: 0
            },
            tabElement: ".tab_valid",
            tabLength: $(".tab_valid").length - 1,
            prevBtn: "#prevBtn_valid",
            nextBtn: "#nextBtn_valid",
            formElement: document.getElementById("validate-form"),
            modalElement: "#validation_modal",
            url: "", //updated on event validation modal show
            stringSubmit: "Simpan Data",
        },
        3: {
            currentTab: {
                nilai: 0
            },
            tabElement: ".tabType",
            tabLength: $(".tabType").length - 1,
            prevBtn: "#prevBtnType",
            nextBtn: "#nextBtnType",
            formElement: document.getElementById("createTypeform"),
            modalElement: "#ModalType",
            url: (document.getElementById("createTypeform")) ? document.getElementById("createTypeform")
                .getAttribute('data-url') : "",
            stringSubmit: "Simpan Data",
        },
    }

    for (let i = 0; i < Object.keys(form).length; i++) {
        showTab(form[i].currentTab, form[i].tabElement,
            form[i].tabLength, $(form[i].prevBtn), $(form[i].nextBtn), form[i].stringSubmit, form[i].modalElement);
        $('body').on('click', form[i].nextBtn, function () {
            validateFormAJAX(form[i].formElement, form[i].url, form[i].tabElement, form[i].currentTab,
                nextfunction);

            function nextfunction(valid) {
                let valid_cb = valid;
                nextPrev(1, form[i].tabElement, form[i].tabLength,
                    form[i].currentTab, form[i].formElement, form[i].modalElement,
                    $(form[i].prevBtn), $(form[i].nextBtn), valid_cb, form[i].stringSubmit);
            }
        });
        $('body').on('click', form[i].prevBtn, function () {
            nextPrev(-1, form[i].tabElement, form[i].tabLength,
                form[i].currentTab, form[i].formElement, form[i].modalElement,
                $(form[i].prevBtn), $(form[i].nextBtn));
        });
    }

    // MULTIPLE DELETE FUNCTION
    $('.multiple-dlt-btn').on('click', function () {
        $('.check-th').toggleClass('d-none');
        $('.check-td').toggleClass('d-none');
        $('.fixed-create').toggleClass('d-none');
        $('.fixed-delete').toggleClass('d-none');
    });
    $('.fixed-delete').click(function () {
        var sel = $('.inp-cbx:checked').map(function (_, el) {
            return $(el).val();
        }).get();
        if (sel == "") {
            swaltoast("Tidak Ada Data Yang Dipilih !", 'warning');
        } else {
            $('.btn-ok').attr('href', ($(".fixed-delete .fixed-plugin-button").data('href') + sel));
            $('#confirm-delete').modal('show');
        }
    });
</script>