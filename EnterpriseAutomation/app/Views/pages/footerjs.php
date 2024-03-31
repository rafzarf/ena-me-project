<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('input_msg') ?>" class="data-input d-none"> </div>
<div data-flash="<?= session()->getFlashdata('del_msg') ?>" class="data-delete d-none"> </div>
<div data-flash="<?= session()->getFlashdata('edit_msg') ?>" class="data-edit d-none"> </div>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script src="/assets/js/myfunction.js"></script>

<script>
    // Creating response and call Sweet alert 
    const input_response = $('.data-input');
    const edit_response = $('.data-edit');
    const delete_response = $('.data-delete');
    
    response(input_response, "Data Berhasil Ditambahkan", "Data Gagal Ditambahkan");
    response(edit_response, "Data Berhasil Diedit", "Data Gagal Diedit");
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

        //button edit pada modal edit dan validasi
        $(".btn-edit-allow").click(function () {
            $('#edit-form').find(':input(:disabled)').prop('disabled', false);
            $('#edit-form').find('select').prop('disabled', false);
        });

        /*event hide pada modal adalah saat modal hendak hilang sepenuhnya
        jika hidden saat sudah hilang sepenuhnya.*/

        $('#modal_info').on('hidden.bs.modal', function (e) {
            $('#edit-form .modal-body').find(':input:not(:disabled)').prop('disabled', true);
            $('#edit-form .modal-body').find('select').prop('disabled', true);
        });
    })

    /*ini fungsi buat modal input sama edit yang input formnya banyak bgt 
    karena jelek kalau manjang dan perlu scroll scroll, jadi kita buat Multi step 
    aja, silahkan di amati struktur htmlnya sama fungsi js dibawah ini
    
    MULTI STEP INPUT MODAL*/

    let currentInputTab = {
        nilai: 0
    };

    const tabInput = $(".tab")
    const tabInputLength = tabInput.length - 1;
    const prevBtnInput = $("#prevBtn");
    const nextBtnInput = $("#nextBtn");
    const forminput = $("#create-form");
    const modalinput = "#createModal";

    showTab(currentInputTab, tabInput, tabInputLength, prevBtnInput, nextBtnInput);

    $('body').on('click', "#nextBtn", function () {
        nextPrev(1, tabInput, tabInputLength, currentInputTab, forminput, modalinput, prevBtnInput,
            nextBtnInput);
    });

    $('body').on('click', "#prevBtn", function () {
        nextPrev(-1, tabInput, tabInputLength, currentInputTab, forminput, modalinput, prevBtnInput,
            nextBtnInput);
    });

    //MULTI STEP EDIT MODAL
    let currentEditTab = {
        nilai: 0
    };

    const tabEdit = $(".tab_edit")
    const tabEditLength = tabEdit.length - 1;
    const prevBtnEdit = $("#prevBtn_edit");
    const nextBtnEdit = $("#nextBtn_edit");
    const formEdit = $("#edit-form");
    const modalEdit = "#modal_info";

    showTab(currentEditTab, tabEdit, tabEditLength, prevBtnEdit, nextBtnEdit);

    $('body').on('click', "#nextBtn_edit", function () {
        nextPrev(1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit);
    });

    $('body').on('click', "#prevBtn_edit", function () {
        nextPrev(-1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit);
    });

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
            popup_yellow("Tidak Ada Data Yang Dipilih !");
        } else {
            // alert(sel);
            $('.btn-ok').attr('href', ($(".fixed-delete .fixed-plugin-button").data('href') + sel));

            $('#confirm-delete').modal('show');
        }
    });
</script>