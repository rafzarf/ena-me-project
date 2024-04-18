    let currentInputTab = {
        nilai: 0
    };

    const tabInput = $(".tab")
    const tabInputLength = tabInput.length - 1;
    const prevBtnInput = $("#prevBtn");
    const nextBtnInput = $("#nextBtn");
    // const forminput = $("#create-form");
    const forminput = document.getElementById("create-form");
    const modalinput = "#createModal";
    // const url = forminput.data('url');
    const url = forminput.getAttribute('data-url');


    showTab(currentInputTab, tabInput, tabInputLength, prevBtnInput, nextBtnInput);

    $('body').on('click', "#nextBtn", function () {
        // >>>callback value hrs di chain gini soalnya ga support buat fungsi yang
        // memiliki argumen.
        validateFormAJAX(forminput, url, tabInput, currentInputTab,
            nextfunction);

        function nextfunction(valid) {
            let valid_cb = valid;
            nextPrev(1, tabInput, tabInputLength, currentInputTab, forminput, modalinput,
                prevBtnInput,
                nextBtnInput, valid_cb);
        }

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
    // const formEdit = $("#edit-form");
    const formEdit = document.getElementById("edit-form");
    const modalEdit = "#modal_info";
    // const urlEdit = formEdit.data('url');
    const urlEdit = formEdit.getAttribute('data-url');

    showTab(currentEditTab, tabEdit, tabEditLength, prevBtnEdit, nextBtnEdit);

    $('body').on('click', "#nextBtn_edit", function () {
        // >>>callback value hrs di chain gini soalnya ga support buat fungsi yang
        // memiliki argumen.
        validateFormAJAX(formEdit, urlEdit, tabEdit, currentEditTab,
            nextfunctionEdit);

        function nextfunctionEdit(valid) {
            let valid_cb_edit = valid;
            nextPrev(1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit,
                valid_cb_edit);
        }
    });

    $('body').on('click', "#prevBtn_edit", function () {
        nextPrev(-1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit);
    });



    let currentValidTab = {
        nilai: 0
    };

    const tabValid = $(".tab_valid")
    const tabValidLength = tabValid.length - 1;
    const prevBtnValid = $("#prevBtn_valid");
    const nextBtnValid = $("#nextBtn_valid");
    //const formValid = $("#validate-form");
    const formValid = document.getElementById("validate-form");
    const modalValid = "#validation_modal";
    // const urlEdit = formEdit.data('url');
    var urlValid;


    showTab(currentValidTab, tabValid, tabValidLength, prevBtnValid, nextBtnValid);

    $('body').on('click', "#nextBtn_valid", function () {

        // >>>callback value hrs di chain gini soalnya ga support buat fungsi yang
        // memiliki argumen.
        validateFormAJAX(formValid, urlValid, tabValid, currentValidTab,
            nextfunctionValid);

        function nextfunctionValid(valid) {
            let valid_cb_valid = valid;
            //console.log("valid_cb = " + valid_cb);
            nextPrev(1, tabValid, tabValidLength, currentValidTab, formValid, modalValid,
                prevBtnValid, nextBtnValid, valid_cb_valid);
        }

    });

    $('body').on('click', "#prevBtn_valid", function () {
        nextPrev(-1, tabValid, tabValidLength, currentValidTab, formValid, modalValid, prevBtnValid,
            nextBtnValid);
    });

    let currentTypeTab = {
        nilai: 0
    };
    const tabType = $(".tabType")
    const tabTypeLength = tabType.length - 1;
    const prevBtnType = $("#prevBtnType");
    const nextBtnType = $("#nextBtnType");
    const formType = document.getElementById("createTypeform");
    const modalType = "#ModalType";
    const urlType = formType.getAttribute('data-url');
    showTab(currentTypeTab, tabType, tabTypeLength, prevBtnType, nextBtnType);
    $('body').on('click', "#nextBtnType", function () {
        validateFormAJAX(formType, urlType, tabType, currentTypeTab,
            nextfunctionType);

        function nextfunctionType(valid) {
            let valid_cb_Type = valid;
            nextPrev(1, tabType, tabTypeLength, currentTypeTab, formType, modalType,
                prevBtnType,
                nextBtnType, valid_cb_Type);
        }
    });
    $('body').on('click', "#prevBtnType", function () {
        nextPrev(-1, tabType, tabTypeLength, currentTypeTab, formType, modalType, prevBtnType,
            nextBtnType);
    });

    