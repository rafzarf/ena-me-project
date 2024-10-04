<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <!-- <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                            class='fs-4 bx bxs-briefcase-alt-2'></i>
                    </div> -->
                    <h5 class="d-flex ms-1 mt-2 mb-0 text-dark">Tabel Data Akun</h5>
                </div>
            </div>
            <div class="col col-lg-auto pe-0 d-flex justify-content-lg-end justify-content-center">
                <div class="row w-100">
                    <div class="col px-0">
                        <div
                            class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                            <form action="" id="searchbar" method="GET">
                                <div class="position-relative">
                                    <div class="input-set">
                                        <input type="text" id="searchbox" class="form-control"
                                            placeholder="Type here..." name="keyword"
                                            value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'];?>">
                                        <?php 
                                        if(empty($_GET['keyword'])) {
                                            echo ' <button anim="ripple" type="button" class="arrowicon searchbtn btn m-0"><i
                                            class="text-white fs-6 bx bx-search"></i> </button>';
                                        } else {
                                            echo '<button anim="ripple" type="button" class="bg-danger arrowicon searchdel btn m-0"><i
                                            class="text-white fs-6 bx bxs-trash-alt"></i> </button>';
                                        }?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="option-dropdown col-auto ps-0 pe-lg-0 me-lg-4">
                        <div class="btn-group dropstart">
                            <button class="pt-2 ps-lg-0 ps-2 pe-0 btn btn-mesin" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <i class="text-dark fs-3 bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <div class="w-100 btn-group dropstart">
                                        <a type="button" class="ps-0 d-flex text-dark dropdown-item"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="row mx-0 w-100">
                                                <div class="col">
                                                    <span class="text-start">
                                                        <i class='my-auto text-xxs bx bxs-left-arrow'></i></span>
                                                </div>
                                                <div class="col px-0">
                                                    <span class="text-end">Data Per Halaman</span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=5">5
                                                </a></li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=10">10
                                                </a>
                                            </li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=15">15
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="">
                                    <a class="text-wrap multiple-dlt-btn ps-0 text-dark text-end dropdown-item">
                                        Multiple Delete Selection</a></li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0 mt-0">
        <div class="table-responsive overflow-y-hidden p-0">
            <table class="table table-hover mb-0 align-items-center">
                <thead class="text-xs">
                    <tr>
                        <th
                            class="sticky-left check-th d-none text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">No.
                        </th>
                        <th class="sticky-left text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Username</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Name</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Role</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1)); foreach($getAkun as $dataAkun){?>
                    <tr>
                        <td data-label="Select Data" class="sticky-left text-dark text-center check-td d-none">
                            <div class="checkbox-wrapper-46">
                                <input class="shadow inp-cbx" id="cbx-46-<?=$dataAkun['id_worker']?>" type="checkbox"
                                    value="<?=$dataAkun['id_worker']?>">
                                <label class="cbx" for="cbx-46-<?=$dataAkun['id_worker']?>"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span class="ps-0"></span>
                                </label>
                            </div>
                        </td>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="Username" class="sticky-left text-dark text-center"><?= $dataAkun['Username'];?>
                        </td>
                        <td data-label="Name" class=" text-dark text-center"><?= $dataAkun['Name'];?></td>
                        <td data-label="Role" data-role="<?= $dataAkun['Role'];?>"
                            class="role-td text-dark text-center">
                            <span class="badge">
                            </span></td>
                        <td data-label="Option" class="text-dark text-center">
                            <div class="btn-group dropstart">
                                <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                    <li class="mb-0">
                                        <a class="btn-edit dropdown-item" data-id_worker="<?=$dataAkun['id_worker']?>"
                                            data-username="<?=$dataAkun['Username']?>"
                                            data-name="<?= $dataAkun['Name']?>" data-href="/KelolaAkun/editInfo/">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 text-center bx bxs-info-circle 
                                            btn bg-gradient-info px-2 py-1'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Info
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Tampilkan info
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a class="btn-edit-pass dropdown-item"
                                            data-id_worker="<?=$dataAkun['id_worker']?>"
                                            data-href="/KelolaAkun/editPassword/">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 text-center bx bx-key
                                            btn bg-gradient-warning px-2 py-1'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Edit Password
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Edit Password Akun
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a class="btn-edit-role dropdown-item"
                                            data-id_worker="<?=$dataAkun['id_worker']?>"
                                            data-role="<?=$dataAkun['Role']?>" data-href="/KelolaAkun/editRole/">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 text-center bx bx-universal-access
                                            btn bg-gradient-primary px-2 py-1'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Edit Role
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Edit Role Akun
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a data-href="/KelolaAkun/deleteAkun/<?=$dataAkun['id_worker']?>"
                                            data-bs-toggle="modal" data-bs-target="#confirm-delete"
                                            class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 bx bxs-trash px-2 py-1 btn bg-gradient-danger'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Hapus
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Hapus Data
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php $no++;}?>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <?= $pager->links() ?>
        </div>
    </div>
</div>

<div class="fixed-plugin fixed-create ">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class=" fixed-plugin-button bg-gradient-polman text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<div class="fixed-plugin fixed-delete d-none">
    <a href="#" data-href="/KelolaAkun/bulkDelAkun/"
        class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?=base_url().'KelolaAkun/createAkun'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Register Akun</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1 Username-div">
                            <label for="" class="text-uppercase form-label">Username</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="Username" class="form-control" id="Username"
                                    placeholder="Masukan Username" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 Name-div">
                            <label for="" class="text-uppercase form-label">Name</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="Name" class="form-control" id="Name" placeholder="Masukan Nama"
                                    autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 Role-div">
                            <label for="" class="text-uppercase form-label">Role</label>
                            <div class="input-set">
                                <i class='bx bx-universal-access'></i>
                                <select name="Role" class="form-select" id="Role">
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="Operator">Operator</option>
                                    <option value="Gudang">Gudang</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Kajur">Ka.Jurusan</option>
                                    <option value="Sekjur">Sek.Jurusan</option>
                                    <option value="Kappc">Ka.PPC</option>
                                    <option value="Kalab">Ka.Lab</option>

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 Password-div">
                            <label for="" class="text-uppercase form-label">Password</label>
                            <div class="input-set">
                                <i class='bx bx-key'></i>
                                <input type="password" name="Password" class="pass form-control" id="Password"
                                    placeholder="Masukan Password" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 ConfirmPassword-div">
                            <label for="" class="text-uppercase form-label">Confirmation Password</label>
                            <div class="input-set">
                                <i class='bx bx-key'></i>
                                <input type="password" name="ConfirmPassword" class="pass form-control"
                                    id="ConfirmPassword" placeholder="Masukan Password" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="checkbox-wrapper-46 ps-2 py-2">
                            <input class="shadow inp-cbx" id="cbx-46" type="checkbox">
                            <label class="cbx" for="cbx-46"><span>
                                    <svg width="12px" height="10px" viewbox="0 0 12 10">
                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                    </svg></span><span class="ps-2 text-uppercase">Show Password</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100 m-0">
                        <div class="col-auto ms-2 p-0 my-auto text-start tabnum">
                            <div class="d-flex my-auto">
                                <p class="d-flex fw-bold my-auto ">1/</p>
                                <span class="d-flex fw-bold mt-2 my-auto text-xs">
                                    <script type="text/javascript">
                                        document.write(document.querySelectorAll(".tab").length)
                                    </script>
                                </span>
                            </div>
                        </div>
                        <div class="col p-0 text-end">
                            <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2"
                                id="prevBtn">Back</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                    <i class='text-dark fs-4 bx bx-x'></i>
                </button>
            </div>

            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini ?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button anim="ripple" type="button" class="text-sm m-0 me-2 btn btn-light"
                    data-bs-dismiss="modal">Kembali</button>
                <a anim="ripple" class="text-sm btn btn-danger m-0 btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" data-url="<?=base_url().'KelolaAkun/editInfo'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Edit Akun</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <div class="mb-1 Username_edit-div">
                            <label for="" class="text-uppercase form-label">Username</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="Username_edit" class="form-control" id="Username_edit"
                                    placeholder="Masukan Username" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 Name_edit-div">
                            <label for="" class="text-uppercase form-label">Name</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="Name_edit" class="form-control" id="Name_edit"
                                    placeholder="Masukan Nama" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="id_worker" id="id_worker">
                    </div>
                </div>
                <div class="modal-footer">
                    <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2"
                        id="prevBtn_edit">Back</button>
                    <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn_edit">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                        <input type="hidden" name="id_worker_pass" id="id_worker_pass">
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

<!-- Modal -->
<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="validate-form" data-url="<?=base_url().'KelolaAkun/editRole'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Edit Role Akun</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_valid">
                        <div class="mb-1 Role_edit-div">
                            <label for="" class="text-uppercase form-label">Role</label>
                            <div class="input-set">
                                <i class='bx bx-universal-access'></i>
                                <select name="Role_edit" class="form-select" id="Role_edit">
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="Operator">Operator</option>
                                    <option value="Gudang">Gudang</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Kajur">Ka.Jurusan</option>
                                    <option value="Sekjur">Sek.Jurusan</option>
                                    <option value="Kappc">Ka.PPC</option>
                                    <option value="Kalab">Ka.Lab</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="id_worker_role" id="id_worker_role">
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
<!-- call generic js file -->

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
    })

    $(document).ready(function () {
        $('.btn-edit').on('click', function () {
            // get data from button edit
            const id_worker = $(this).data('id_worker');
            const username = $(this).data('username');
            const name = $(this).data('name');

            // Set data to Form Edit
            $('#id_worker').val(id_worker);
            $('#Username_edit').val(username);
            $('#Name_edit').val(name);
            // Call Modal Edit
            $('#modal_info').modal('show');
        });

        $('.btn-edit-pass').on('click', function () {
            // get data from button edit
            const id_worker_pass = $(this).data('id_worker');

            // Set data to Form Edit
            $('#id_worker_pass').val(id_worker_pass);
            // Call Modal Edit
            $('#ModalType').modal('show');
        });

        $('.btn-edit-role').on('click', function () {
            // get data from button edit
            form[2].url = $(this).data('href');
            const id_worker_role = $(this).data('id_worker');
            const role = $(this).data('role');

            // Set data to Form Edit
            $('#id_worker_role').val(id_worker_role);
            $('#Role_edit').val(role);
            // Call Modal Edit
            $('#validation_modal').modal('show');
        });


        $(".role-td").each(function () {
            let arrlength = $(this).data('role').length;
            let role = $(this).data('role');
            if (arrlength > 0) {
                $(this).find("span").html(role).addClass('bg-gradient-polman');

            } else {
                $(this).find("span").html("BELUM ADA").addClass('bg-gradient-secondary');
            }
        });
    });
</script>

<?=$this->endSection();?>