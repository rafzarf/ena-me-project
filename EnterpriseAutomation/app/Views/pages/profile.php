<?php $this->extend("layout/template.php", $title);

$this->section('content');


?>
<div class="btn-group btn-profile mt-3 me-4 dropstart">
    <button class="btn btn-mesin" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window">
        <i class="fs-4 bx bxs-cog"></i>
    </button>
    <ul class="dropdown-menu position-fixed dropdown-menu-right p-1">
        <li class="mb-0">
            <a data-bs-toggle="modal" data-bs-target="#confirm-delete" class="dropdown-item">
                <div class="row mt-2">
                    <div class="col-auto">
                        <i class="fs-4 text-center bx bxs-user-circle 
                                            btn bg-gradient-info px-2 py-1"></i>
                    </div>
                    <div class="col-8 ps-0 text-wrap">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm text-wob text-dark fw-bold mb-1">
                                Ubah Profile Picture
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="mb-0">
            <a data-bs-toggle="modal" data-bs-target="#validation_modal" class="dropdown-item">
                <div class="row mt-2">
                    <div class="col-auto">
                        <i class="fs-4 bx bx-rename px-2 py-1 btn bg-gradient-secondary"></i>
                    </div>
                    <div class="col-8 ps-0 text-wrap">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm text-wob text-dark fw-bold mb-1">
                                Ubah Display Name
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li class="mb-0">
            <a data-bs-toggle="modal" data-bs-target="#ModalType" class="dropdown-item">
                <div class="row mt-2">
                    <div class="col-auto">
                        <i class="fs-4 bx bx-key px-2 py-1 btn bg-gradient-warning"></i>
                    </div>
                    <div class="col-8 ps-0 text-wrap">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm text-wob text-dark fw-bold mb-1">
                                Ubah <br> Password
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>
<div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('/assets/img/sampul.png'); background-position-y: 50%;">
    <span class="mask bg-polman opacity-5"></span>
</div>

<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="/assets/img/profiles.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col my-auto">
            <div class="h-100">
                <h5 class="profile_name poppins-bold mb-1">
                <?=session()->get('Name')?>
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                <?=session()->get('Role')?>
                </p>
            </div>
        </div>
        <div class="col-3 text-end">
        </div>
    </div>
</div>

<!-- MODAL EDIT PASSWORD START -->
<div class="modal fade" id="ModalType" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="createTypeform" data-url="<?=base_url().'KelolaAkun/editPassword'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Edit Password</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabType">
                        <div class="mb-1 Password_edit-div">
                            <label for="" class="text-uppercase form-label">Password</label>
                            <div class="input-set">
                                <i class='bx bx-key'></i>
                                <input type="password" name="Password_edit" class="form-control pass" id="Password_edit"
                                    placeholder="Masukan Password" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 ConfirmPassword_edit-div">
                            <label for="" class="text-uppercase form-label">Confirmation Password</label>
                            <div class="input-set">
                                <i class='bx bx-key'></i>
                                <input type="password" name="ConfirmPassword_edit" class="pass form-control"
                                    id="ConfirmPassword_edit" placeholder="Masukan Password" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="checkbox-wrapper-46 ps-2 py-2">
                            <input class="shadow inp-cbx" id="cbx-46-edit" type="checkbox">
                            <label class="cbx" for="cbx-46-edit"><span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span><span class="ps-2 text-uppercase">Show Password</span>
                            </label>
                        </div>
                        <input type="hidden" name="id_worker_pass" id="id_worker_pass"
                            value="<?=session()->get('id_worker')?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2"
                        id="prevBtnType">Back</button>
                    <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtnType">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL EDIT PASSWORD END -->


<!-- MODAL CHANGE DISPLAY NAME START -->
<!-- Modal -->
<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="validate-form" data-url="<?=base_url().'KelolaAkun/editName'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Edit Display Name Akun</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_valid">
                        <div class="mb-1 Name_edit-div">
                            <label for="" class="text-uppercase form-label">Name</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="Name_edit" class="form-control" id="Name_edit"
                                    placeholder="Masukan Nama" value="<?=session()->get('Name')?>">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="id_worker_name" id="id_worker_name"
                            value="<?=session()->get('id_worker')?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button anim="ripple" type="button" class="btn btn-secondary m-0 me-2"
                        id="prevBtn_valid">Previous</button>
                    <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn_valid">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL CHANGE DISPLAY NAME END -->
<?php 

include "footerjs.php"

?>

<script>
    $(".inp-cbx").on('click', function () {

        if ($(".pass").attr("type") === "password") {
            $(".pass").attr("type", "text")
        } else {
            $(".pass").attr("type", "password")
        }
    });

    form[2].url = $("#validate-form").data('url');

</script>
<?=$this->endSection();?>