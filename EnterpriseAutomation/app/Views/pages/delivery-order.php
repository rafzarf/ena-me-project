<?php $this->extend("layout/template.php", $title);
$this->section('content');
?>

<div data-flash="<?= session()->getFlashdata('finish_msg') ?>" class="data-finish d-none"> </div>

<div class="row mt-4">
    <!-- CARD ORDER START -->
    <div class="col">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="row mx-0 w-100">
                    <div class="col ps-0 d-flex">
                        <div class="icon my-auto icon-shape bg-gradient-polman shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-truck fw-lighter'></i>
                        </div>
                        <div class="d-flex">
                            <h3 class="text-dark lh-1 ms-3 my-auto">Delivery Order<br>
                                <span class="text-sm lh-1 text-dark text-start"> No.Order :
                                    <?= $getSPK[0]->no_order ?>
                                </span><br>
                                <span class="text-sm lh-1 text-dark text-start"> Nama Produk :
                                    <?= $getSPK[0]->nama_produk ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="col-auto">
                        <form method="post" id="finishOrder" action="<?=base_url() . "DeliveryOrder/FinishOrder"?>">
                            <?=csrf_field()?>
                            <input type="hidden" name="no_spk" id="no_spk" value="<?=$getSPK[0]->no_spk?>">
                            <input type="hidden" name="status" id="status" value="Selesai">
                            <?php
                            if($getSPK[0]->status != "Selesai") {
                                echo '<button type="submit" class="text-uppercase my-2 w-100 btn btn-polman text-warp">Selesaikan
                                Order</button>';
                            } else {
                                echo '<button type="submit" class="disabled text-uppercase my-2 w-100 btn btn-success text-warp">Order Telah Selesai</button>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">

            </div>
        </div>
    </div>
    <!-- CARD ORDER END -->
    <!-- CARD BATAS WAKTU END -->
</div>

<!-- TABEL DATA ORDER START -->
<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <h5 class="d-flex ms-1 mt-lg-2 mb-0 text-dark">Tabel Data Delivery Order</h5>
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
                                                        <i class=' my-auto text-xxs bx bxs-left-arrow'></i></span>
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
        <div class="table-responsive p-0">
            <table class="table table-hover align-items-center">
                <thead class="text-xs">
                    <tr>
                        <th
                            class="sticky-left check-th d-none text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.Order</th>
                        <th
                            class="sticky-left text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Pemesan</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Nama Barang</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Uraian</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Bahan</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Jumlah</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Tanggal Kirim</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Total Kirim</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Sisa Kirim</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1)); foreach($getDO as $dataDO){?>
                    <tr>
                        <td data-label="Select Data" class="sticky-left stext-dark text-center check-td d-none">
                            <div class="checkbox-wrapper-46">
                                <input class="shadow inp-cbx" id="cbx-46-<?=$dataDO['id_do']?>" type="checkbox"
                                    value="<?=$dataDO['id_do']?>">
                                <label class="cbx" for="cbx-46-<?=$dataDO['id_do']?>"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span class="ps-0"></span>
                                </label>
                            </div>
                        </td>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="No.Order" class="text-dark text-center"><?= $dataDO['no_order'] ?></td>
                        <td data-label="Pemesan" class="sticky-left text-dark text-center">
                            <?= $dataDO['pemesan'] ?></td>
                        <td data-label="Nama Barang" class="text-dark text-center">
                            <?= $dataDO['nama_barang'] ?></td>
                        <td data-label="Uraian" class="text-dark text-center">
                            <?= $dataDO['uraian'] ?></td>
                        <td data-label="Bahan" class="text-dark text-center"><?= $dataDO['bahan'] ?></td>
                        <td data-label="Jumlah" class="text-dark text-center"><?= $dataDO['jumlah'] ?></td>
                        <td data-label="Tanggal Kirim" class="text-dark text-center">
                            <?= $dataDO['tanggal_kirim'] ?></td>
                        <td data-label="Total Kirim" class="text-dark text-center"><?= $dataDO['total_kirim'] ?>
                        </td>
                        <td data-label="Sisa Kirim" class="text-dark text-center"><?= $dataDO['sisa_kirim'] ?></td>
                        <td data-label="Option" class="text-dark text-center">
                            <div class="btn-group dropstart">
                                <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                    <li class="mb-0">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_info"
                                            class="btn-edit dropdown-item" data-id_do="<?=$dataDO['id_do']?>"
                                            data-no_order="<?=$dataDO['no_order']?>"
                                            data-pemesan="<?=$dataDO['pemesan']?>"
                                            data-nama_barang="<?=$dataDO['nama_barang']?>"
                                            data-uraian="<?=$dataDO['uraian']?>" data-jumlah="<?=$dataDO['jumlah']?>"
                                            data-bahan="<?=$dataDO['bahan']?>"
                                            data-tanggal_kirim="<?=$dataDO['tanggal_kirim']?>"
                                            data-total_kirim="<?=$dataDO['total_kirim']?>"
                                            data-sisa_kirim="<?=$dataDO['sisa_kirim']?>">
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
                                        <a href="#" data-href="/DeliveryOrder/deleteDO/<?=$dataDO['id_do']?>"
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
<!-- TABEL DATA ORDER START -->

<!-- FLOATING ACTION BUTTON START -->
<div class="fixed-plugin">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class="bg-gradient-polman fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<div class="fixed-plugin fixed-delete d-none">
    <a href="#" data-href="/DeliveryOrder/bulkDelDO/"
        class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>
<!-- FLOATING ACTION BUTTON END -->

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

<!-- MODAL CREATE START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?=base_url().'DeliveryOrder/createDO'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Tambah Delivery Order</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1 no_order-div">
                            <label for="" class="text-uppercase form-label">No Order</label>
                            <div class="input-set">
                                <i class='bx bx-cart'></i>
                                <input type="hidden" name="no_order" class="form-control" id="no_order"
                                    placeholder="Masukan No Order" value="<?=$getSPK[0]->no_order?>">
                                <input type="text" name="" class="form-control" id="" placeholder="Masukan No Order"
                                    value="<?=$getSPK[0]->no_order?>" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 pemesan-div">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>

                                <select name="pemesan" class="form-select" id="pemesan">
                                    <option value="">Pilih Pemesan</option>
                                    <option value="<?= $pemesan ?>"> <?= $pemesan ?> </option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <select name="nama_barang" class="form-select" id="nama_barang">
                                    <option value="">Pilih Barang Yang Sudah TerQC</option>
                                    <?php foreach ($has_qc as $nama_komponen) : ?>
                                    <option value="<?= $nama_komponen ?>">
                                        <?= $nama_komponen ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    placeholder="Masukkan Nama Barang"> -->
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 uraian-div">
                            <label for="" class="text-uppercase form-label">Uraian</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="uraian" class="form-control" id="uraian"
                                    placeholder="Masukkan Uraian">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 bahan-div">
                            <label for="disetujui" class="text-uppercase form-label">Bahan</label>
                            <div class="input-set">
                                <i class='bx bx-package'></i>
                                <input type="text" name="bahan" class="form-control" id="bahan"
                                    placeholder="Masukkan Bahan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 jumlah-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" min="0" name="jumlah" class="form-control" id="jumlah"
                                    placeholder="Masukkan Jumlah">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_kirim-div">
                            <label for="" class="text-uppercase form-label">Tanggal Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_kirim" class="dateselect form-control" id="tgl_kirim"
                                    placeholder="Masukkan Tanggal Kirim (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 total_kirim-div">
                            <label for="" class="text-uppercase form-label">Total Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="number" min="0" name="total_kirim" class="form-control" id="total_kirim"
                                    placeholder="Masukkan Total Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 sisa_kirim-div">
                            <label for="" class="text-uppercase form-label">Sisa Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" min="0" name="sisa_kirim" class="form-control" id="sisa_kirim"
                                    placeholder="Masukkan Sisa Kirim" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="curr_tab" class="curr_tab">
                        <input type="hidden" name="end_tab" class="end_tab">
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
<!-- CREATE MODAL END -->

<!-- MODAL EDIT START -->
<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="edit-form" data-url="<?=base_url().'DeliveryOrder/updateDO'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Info Delivery Order</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <input type="hidden" name="id_edit_do" class="form-control" id="id_edit_do"
                            placeholder="Masukan No Order">
                        <div class="mb-1 edit_no_order-div">
                            <label for="" class="text-uppercase form-label">No Order</label>
                            <div class="input-set">
                                <i class='bx bx-cart'></i>
                                <input type="hidden" name="edit_no_order" class="form-control" id="edit_no_order"
                                    placeholder="Masukan No Order" value="<?=$getSPK[0]->no_order?>">
                                <input type="text" name="" class="form-control" id="" placeholder="Masukan No Order"
                                    value="<?=$getSPK[0]->no_order?>" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_pemesan-div">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="edit_pemesan" class="form-control" id="edit_pemesan"
                                    placeholder="Masukkan Pemesan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_nama_barang" class="form-control" id="edit_nama_barang"
                                    placeholder="Masukkan Nama Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_uraian-div">
                            <label for="" class="text-uppercase form-label">Uraian</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_uraian" class="form-control" id="edit_uraian"
                                    placeholder="Masukkan Uraian">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_bahan-div">
                            <label for="disetujui" class="text-uppercase form-label">Bahan</label>
                            <div class="input-set">
                                <i class='bx bx-package'></i>
                                <input type="text" name="edit_bahan" class="form-control" id="edit_bahan"
                                    placeholder="Masukkan Bahan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_edit">
                        <div class="mb-1 edit_jumlah-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" min="0" name="edit_jumlah" class="form-control" id="edit_jumlah"
                                    placeholder="Masukkan Jumlah">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_kirim-div">
                            <label for="" class="text-uppercase form-label">Tanggal Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tgl_kirim" class="dateselect form-control"
                                    id="edit_tgl_kirim" placeholder="Masukkan Tanggal Kirim (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_total_kirim-div">
                            <label for="" class="text-uppercase form-label">Total Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="number" min="0" name="edit_total_kirim" class="form-control"
                                    id="edit_total_kirim" placeholder="Masukkan Total Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_sisa_kirim-div">
                            <label for="" class="text-uppercase form-label">Sisa Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" min="0" name="edit_sisa_kirim" class="form-control"
                                    id="edit_sisa_kirim" placeholder="Masukkan Sisa Kirim" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="edit_curr_tab" class="curr_tab">
                        <input type="hidden" name="edit_end_tab" class="end_tab">
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
                                id="prevBtn_edit">Back</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn_edit">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- EDIT MODAL END -->
<!-- call generic js file -->

<?php 

include "footerjs.php"

?>
<script>
    $(document).ready(function () {
        $('.btn-edit').on('click', function () {
            const id_edit_do = $(this).data('id_do');
            const no_order = $(this).data('no_order');
            const pemesan = $(this).data('pemesan');
            const nama_barang = $(this).data('nama_barang');
            const uraian = $(this).data('uraian');
            const bahan = $(this).data('bahan');
            const jumlah = $(this).data('jumlah');
            const tanggal_kirim = $(this).data('tanggal_kirim');
            const total_kirim = $(this).data('total_kirim');
            const sisa_kirim = $(this).data('sisa_kirim');

            // Set data to Form Edit
            $('#id_edit_do').val(id_edit_do);
            $('#edit_no_order').val(no_order);
            $('#edit_pemesan').val(pemesan);
            $('#edit_nama_barang').val(nama_barang);
            $('#edit_uraian').val(uraian);
            $('#edit_bahan').val(bahan);
            $('#edit_jumlah').val(jumlah);
            $('#edit_tgl_kirim').val(tanggal_kirim);
            $('#edit_total_kirim').val(total_kirim);
            $('#edit_sisa_kirim').val(sisa_kirim);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    })

    const finish = $('.data-finish');
    response(finish, "Order Telah Selesai", "Gagal Memperbarui Order");

</script>
<?=$this->endSection();?>