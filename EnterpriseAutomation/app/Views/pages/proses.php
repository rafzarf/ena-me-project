<?php $this->extend("layout/template.php", $title);
$this->section('content');

?>

<!-- FLOATING ACTION BUTTON -->
<div class="fab-container fixed-create">
    <div class="fab shadow">
        <div class="fab-content">
            <i class='plus text-white fs-4 bx bx-plus'></i>
        </div>
    </div>
    <div class="sub-button shadow">
        <span class="badge badge-sm bg-info">Tambah Komponen</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalType">
            <i class='fs-5 mt-1 text-white bx bxs-customize'></i>
        </a>
    </div>
    <div class="sub-button shadow">
        <span class="badge badge-sm bg-info">Tambah Permesinan</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class='fs-5 mt-1 text-white bx bxs-wrench'></i>
        </a>
    </div>
</div>

<div class="fixed-plugin fixed-delete d-none">
    <a href="#" data-href="/Proses/bulkDelProses/"
        class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>
<!-- FLOATING ACTION BUTTON END -->

<div class="row mt-4">
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="row mx-0 w-100">
                    <div class="col ps-0 d-flex">
                        <div class="icon my-auto icon-shape bg-gradient-warning shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-pie-chart-alt-2'></i>
                        </div>
                        <div class="d-flex">
                            <h3 class="text-dark lh-1 ms-3 my-auto">Proses<br>
                                <span class="text-sm lh-1 text-dark text-start"> No.SPK :
                                    <?= $getSPK[0]->no_spk ?>
                                </span><br>
                                <span class="text-sm lh-1 text-dark text-start"> Nama Produk :
                                    <?= $getSPK[0]->nama_produk ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="col-auto pe-0 my-auto">
                        <div class="row">
                            <div class="text-end text-lg-center">
                                <?php 
                                if(isset($getSPK[0]->gbr_kerja)) { 
                                    $valid = $getSPK[0]->gbr_kerja;
                                } else {
                                    $valid = "";
                                }
                                
                                if(!isset($getSPK[0]->gbr_kerja)) { 
                                    echo '<a id="btn-validate" class="text-sm text-wrap my-auto w-100 py-2 btn btn-info" href="#"
                                    data-bs-toggle="modal" data-bs-target="#validation_modal"
                                    data-href="/Proses/validateSPK/'.$getSPK[0]->id_spk.'"
                                    data-valid="'.$valid.'">Validasi</a>';
                                } 
                                else {
                                    echo '<a id="btn-validate" class="text-sm text-wrap my-auto w-100 py-2 btn btn-success"
                                    href="#" data-bs-toggle="modal"
                                    data-bs-target="#validation_modal"
                                    data-href="/Proses/validateSPK/'.$getSPK[0]->id_spk.'" 
                                    data-valid="'.$valid.'">Info Validasi</a>';
                                }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-end text-lg-center mt-3">
                                <div data-valid="<?=$valid?>" class="text-wrap status_validate">
                                    <span class="py-2 h-100 badge badge-sm"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
            </div>
        </div>
    </div>
    <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="card h-100 z-index-2">
            <div class="card-header m-0 pb-0">
                <div class="w-100 my-auto text-center">
                    <h5 class="text-dark">Kemajuan Proses</h5>
                </div>
            </div>
            <div class="card-body mx-auto text-center py-0">
                <h1 class="text-dark fw-light mb-4 mb-lg-0">
                    <?php 
                if(!empty($finishCount) AND !empty($count)) {
                    echo ($finishCount / $count) * 100 ;
                } else {
                    echo 0;
                }
                ?> %
                </h1>
            </div>
        </div>
    </div>
</div>


<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <h5 class="d-flex ms-1 mt-lg-2 mb-0 text-dark">Tabel Data Proses</h5>
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
        <!-- <div class="w-100 d-flex col-4 my-auto text-start">
                    <h4 class="d-flex ms-3 mt-2 fw-bolder mb-0 text-dark">Data Proses</h4>
                </div> -->
    </div>
    <div class="card-body pt-0 mt-0">
        <div class="table-responsive p-0">
            <table class="table table-hover align-items-center">
                <thead class="text-xs">
                    <tr>
                        <th
                            class="sticky-left check-th d-none text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Komponen</th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Jumlah Komponen</th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Permesinan</th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Kode Mesin</th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Waktu(jam)</th>
                        <th class="text-wrap text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Status</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php 
                            $no = 1 + ($entries * ($current_page - 1));
                            foreach($getProses as $data){
                            ?>
                    <tr>
                        <td data-label="Select Data" class="sticky-left stext-dark text-center check-td d-none">
                            <div class="checkbox-wrapper-46">
                                <input class="shadow inp-cbx" id="cbx-46-<?=$data['id_proses_start']?>" type="checkbox"
                                    value="<?=$data['id_proses_start']?>">
                                <label class="cbx" for="cbx-46-<?=$data['id_proses_start']?>"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span class="ps-0"></span>
                                </label>
                            </div>
                        </td>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="Nama Komponen" class="text-dark text-center">
                            <?= $data['nama_komponen']; ?>
                        </td>
                        <td data-label="Jumlah Komponen" class="text-dark text-center">
                            <?= $data['jml_komponen']; ?>
                        </td>
                        <td data-label="Nama Mesin" class="text-dark text-center"><?= $data['nama_mesin']; ?>
                        </td>
                        <td data-label="Kode Mesin" class="text-dark text-center"><?= $data['no_mesin']; ?>
                        </td>
                        <td data-label="Durasi Waktu" class="text-dark text-center">
                            <?= $data['durasi_waktu']; ?></td>
                        <td data-label="status" class="text-dark text-center">
                            <span class="badge badge-sm bg-gradient-success">
                                <?= $data['status']; ?></span>
                        </td>
                        <td data-label="Option" class="text-dark text-center">
                            <div class="btn-group dropstart">
                                <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                    <li class="mb-0">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_info"
                                            class="btn-edit dropdown-item"
                                            data-id_proses_start="<?=$data['id_proses_start']?>"
                                            data-nama_komponen="<?=$data['nama_komponen']?>"
                                            data-nama_mesin="<?=$data['nama_mesin']?>"
                                            data-durasi_waktu="<?=$data['durasi_waktu']?>"
                                            data-no_spk="<?=$data['no_spk']?>"
                                            data-jml_komponen="<?=$data['jml_komponen']?>">
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
                                        <a href="#" data-href="/Proses/deleteProses/<?=$data['id_proses_start']?>"
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

<!-- MODAL CREATE KOMPONEN START -->
<div class="modal fade" id="ModalType" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="createTypeform" data-url="<?=base_url().'Proses/createKomponen'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Tambah Komponen</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tabType">
                        <div class="mb-1 no_spk-div">
                            <label for="" class="text-uppercase form-label">No. SPK</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="hidden" class="form-control" id="no_spk" name="no_spk"
                                    value="<?=$getSPK[0]->no_spk?>">
                                <input type="text" class="form-control" id="" name="" value="<?=$getSPK[0]->no_spk?>"
                                    disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_komponen-div">
                            <label for="" class="text-uppercase form-label">Nama Komponen</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_komponen" class="form-control" id="nama_komponen"
                                    placeholder="Masukkan Nama Komponen">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
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
<!-- CREATE MODAL END -->

<!-- CREATE MODAL PERMESINAN START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?=base_url().'Proses/createProses'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Tambah Permesinan</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1 no_spk-div">
                            <label for="" class="text-uppercase form-label">No. Pembebanan</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="hidden" class="form-control" id="no_spk" name="no_spk"
                                    value="<?=$getSPK[0]->no_spk?>">
                                <input type="text" class="form-control" id="" name="" value="<?=$getSPK[0]->no_spk?>"
                                    disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_komponen-div">
                            <label for="" class="text-uppercase form-label">Nama Komponen</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="nama_komponen" class="form-select" id="selector_komponen">
                                    <?php foreach ($getKomponen as $nama_komponen) : ?>
                                    <option value="<?= $nama_komponen ?>">
                                        <?= $nama_komponen ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 jml_komponen-div">
                            <label for="" class="text-uppercase form-label">Jumlah Komponen</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="number" min="0" name="jml_komponen" class="form-control" id="jml_komponen"
                                    placeholder="Masukkan Jumlah Komponen">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 nama_mesin-div">
                            <label for="" class="text-uppercase form-label">Proses Permesinan</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="nama_mesin" class="form-select" id="nama_mesin">
                                    <?php for ($i = 0; $i < sizeof($DataMesin); $i++) {?>
                                    <option class="" value="<?=$DataMesin[$i]->nama_mesin?>">
                                        <?=$DataMesin[$i]->nama_mesin?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 kode_mesin-div">
                            <label for="" class="text-uppercase form-label">Kode Mesin</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="kode_mesin" class="form-select" id="kode_mesin" disabled>
                                    <option value="" selected>Pilih Kode Mesin</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 durasi_waktu-div">
                            <label for="" class="text-uppercase form-label">Durasi Waktu (jam)</label>
                            <div class="input-set">
                                <i class='bx bx-timer'></i>
                                <input type="number" min="0" name="durasi_waktu" class="form-control" id="durasi_waktu"
                                    placeholder="Masukkan Durasi Waktu (Jam)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $getSPK[0]->nama_produk ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2"
                        id="prevBtn">Previous</button>
                    <button anim="ripple" type="button" class="btn btn-info m-0" id="nextBtn">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- CREATE MODAL PERMESINAN END -->

<!-- DELETE MODAL START -->
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
                <a class="text-sm btn btn-danger btn-ok m-0">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- DELETE MODAL END -->

<!-- MODAL INFO START -->
<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" data-url="<?=base_url().'Proses/editProses'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Info Mesin</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <input type="hidden" name="edit_id_proses_start" id="edit_id_proses_start">
                        <div class="mb-1 edit_nama_komponen-div">
                            <label for="" class="text-uppercase form-label">Nama Komponen</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="edit_nama_komponen" class="form-select" id="selector_komponen">
                                    <?php foreach ($getKomponen as $nama_komponen) : ?>
                                    <option value="<?= $nama_komponen ?>">
                                        <?= $nama_komponen ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 edit_jml_komponen-div">
                            <label for="" class="text-uppercase form-label">Jumlah Komponen</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="number" min="0" name="edit_jml_komponen" class="form-control"
                                    id="edit_jml_komponen" placeholder="Masukkan Jumlah Komponen">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_mesin-div">
                            <label for="" class="text-uppercase form-label">Proses Permesinan</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="edit_nama_mesin" class="form-select" id="edit_nama_mesin">
                                    <option class="edit_nama_mesin_value"></option>
                                    <?php for ($i = 0; $i < sizeof($DataMesin); $i++) {?>
                                    <option class="" value="<?=$DataMesin[$i]->nama_mesin?>">
                                        <?=$DataMesin[$i]->nama_mesin?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 edit_kode_mesin-div">
                            <label for="" class="text-uppercase form-label">Kode Mesin</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <select name="edit_kode_mesin" class="form-select" id="edit_kode_mesin" disabled>
                                    <option value="" selected>Pilih Kode Mesin</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-1 edit_durasi_waktu-div">
                            <label for="" class="text-uppercase form-label">Durasi Waktu (jam)</label>
                            <div class="input-set">
                                <i class='bx bx-hard-hat'></i>
                                <input type="number" min="0" name="edit_durasi_waktu" class="form-control"
                                    id="edit_durasi_waktu">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
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
<!-- MODAL INFO END -->

<!-- MODAL VALIDATION START -->
<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="validate-form" data-url="<?=base_url().'Proses/validateSPK'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">Validasi</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="bg-polman text-white p-3 rounded-2 text-sm">Validasi diperlukan untuk melakukan ACC pada
                        Project,
                        silahkan lampirkan link gambar kerja. Link dapat berupa link google drive.</p>
                    <div class="tab_valid">
                        <div class="mb-1 validation-div">
                            <label for="" class="text-uppercase form-label">Link Gambar Kerja</label>
                            <div class="input-set">
                                <i class='bx bx-link'></i>
                                <a anim="ripple" target="_blank" type="button" class="arrowicon btn m-0">
                                    <i class='text-white fs-6 bx bx-link-external'></i>
                                </a>
                                <input type="text" id="validation" class="form-control"
                                    placeholder="Masukkan Link Gambar Kerja Disini" name="validation">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col pe-0 text-end">
                            <button anim="ripple" type="button" class="btn btn-secondary m-0 me-2"
                                id="prevBtn_valid">Previous</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info"
                                id="nextBtn_valid">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL VALIDATION END -->

<!-- call generic js file -->

<?php 

include "footerjs.php"

?>

<script>
    let arrlength = $(".status_validate").data('valid').length;
    if (arrlength > 0) {
        $(".status_validate span").html("STATUS : TERVALIDASI").addClass('bg-gradient-success');

    } else {
        $(".status_validate span").html("STATUS : BELUM TERVALIDASI").addClass('bg-gradient-secondary');
    }

    $(document).ready(function () {
        $("#nama_mesin").change(function () {
            $.ajax({
                type: "POST", 
                url: "<?= base_url()."Proses/KodeMesin"?>", 
                data: {
                    nama_mesin:$("#nama_mesin").val()
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) { 
                    $("#kode_mesin").removeAttr('disabled');
                    $("#kode_mesin").html(response.data_kode);
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    swaltoast(thrownError,"error");
                }
            });
        })

        $("#edit_nama_mesin").change(function () {
            $.ajax({
                type: "POST", 
                url: "<?= base_url()."Proses/KodeMesin"?>", 
                data: {
                    nama_mesin:$("#edit_nama_mesin").val()
                },
                dataType: "json",
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (response) { 
                    $("#edit_kode_mesin").removeAttr('disabled');
                    $("#edit_kode_mesin").html(response.data_kode);
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    swaltoast(thrownError,"error");
                }
            });
        })
        
        //modal validation
        $('#validation_modal').on('show.bs.modal', function (e) {
            form[2].url = $(e.relatedTarget).data('href');
            if ($(e.relatedTarget).data('valid')) {
                $("#validation_modal .arrowicon").css('display', 'inline-block').attr('href', $(e
                    .relatedTarget).data(
                    'valid'));
                $('#validation').val($(e.relatedTarget).data('valid'));
            } else {
                $("#validation_modal .arrowicon").css('display', 'none');
                $('#validation').val($(e.relatedTarget).data('valid'));
            }
        });
    });

    $('.btn-edit').on('click', function () {
        const id_proses_start = $(this).data('id_proses_start');
        const nama_komponen = $(this).data('nama_komponen');
        const nama_mesin = $(this).data('nama_mesin');
        const durasi_waktu = $(this).data('durasi_waktu');
        const jml_komponen = $(this).data('jml_komponen');

        // Set data to Form Edit
        $('#edit_id_proses_start').val(id_proses_start);
        $('#edit_nama_komponen').val(nama_komponen);
        $('#edit_nama_mesin').val(nama_mesin);
        $('#edit_durasi_waktu').val(durasi_waktu);
        $('#edit_jml_komponen').val(jml_komponen);
        $('.edit_nama_mesin_value').val(nama_mesin);

        // Call Modal Edit
        $('#modal_info').modal('show');
    });
</script>

<?=$this->endSection();?>