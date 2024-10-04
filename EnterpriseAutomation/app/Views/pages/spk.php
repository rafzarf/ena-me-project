<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('validate_msg') ?>" class="data-valid d-none"> </div>

<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <!-- <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                            class='fs-4 bx bxs-briefcase-alt-2'></i>
                    </div> -->
                    <h5 class="d-flex ms-1 mt-2 mb-0 text-dark">Tabel Data SPK</h5>
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
                                            placeholder="Type here..." name="keyword" value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'];?>">
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
                            No.SPK</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            No.Penawaran</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            No.Order</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Nama Produk</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Pengorder</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Batas Waktu</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Validasi</th>
                            <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                            Status</th>
                        <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">

                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1)); foreach($getSPK as $dataSPK){?>
                    <tr>
                        <td data-label="Select Data" class="sticky-left text-dark text-center check-td d-none">
                            <div class="checkbox-wrapper-46">
                                <input class="shadow inp-cbx" id="cbx-46-<?=$dataSPK['id_spk']?>" type="checkbox"
                                    value="<?=$dataSPK['id_spk']?>">
                                <label class="cbx" for="cbx-46-<?=$dataSPK['id_spk']?>"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span class="ps-0"></span>
                                </label>
                            </div>
                        </td>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="No.SPK" class="sticky-left text-dark text-center"><?= $dataSPK['no_spk'];?>
                        </td>
                        <td data-label="No.Penawaran" class=" text-dark text-center"><?= $dataSPK['no_penawar'];?></td>
                        <td data-label="No.Order" class=" text-dark text-center"><?= $dataSPK['no_order'];?></td>
                        <td data-label="Nama Produk" class=" text-dark text-center"><?= $dataSPK['nama_produk'];?></td>
                        <td data-label="Pengorder" class="text-dark text-center"><?= $dataSPK['pengorder'];?></td>
                        <td data-label="Batas Waktu" class="text-dark text-center"><?= $dataSPK['tgl_selesai'];?></td>
                        <td data-label="Validasi" class="text-dark text-center">
                            <a anim="ripple" class="btn-valid-status" href="#" data-bs-toggle="modal"
                                data-bs-target="#validation_modal"
                                data-href="<?=base_url()."Spk/validateSPK/".$dataSPK['id_spk'];?>" data-valid="<?php 
                            if(isset($dataSPK['gbr_kerja'])) { 
                                echo $dataSPK['gbr_kerja'];
                            } else {
                                echo "";
                            }?>">
                                <span class="status_validate badge badge-sm"></span>
                            </a>
                        </td>
                        <td data-label="Status" class="text-dark text-center">
                        <span class="status_validate badge badge-sm <?php 
                        if($dataSPK['status'] == "Menunggu") {
                            echo "bg-gradient-polman";
                        } else if($dataSPK['status'] == "Diproses") {
                            echo "bg-gradient-warning";
                        } else if($dataSPK['status'] == "Selesai") {
                            echo "bg-gradient-success";
                        }
                        
                        ?> badge-sm ">
                        <?= $dataSPK['status'];?>
                        </span>
                        </td>
                        <td data-label="Option" class="text-dark text-center">
                            <div class="btn-group dropstart">
                                <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                    <li class="mb-0">
                                        <a href="#" class="btn-edit dropdown-item" data-idspk="<?=$dataSPK['id_spk']?>"
                                            data-nospk="<?=$dataSPK['no_spk']?>"
                                            data-pengorder="<?= $dataSPK['pengorder']?>"
                                            data-tglsel="<?= $dataSPK['tgl_selesai']?>"
                                            data-tglserah="<?= $dataSPK['tgl_penyerahan']?>"
                                            data-namaprod="<?= $dataSPK['nama_produk']?>"
                                            data-jml="<?= $dataSPK['jml_pesanan']?>"
                                            data-penawaran="<?= $dataSPK['no_penawar']?>"
                                            data-order="<?= $dataSPK['no_order']?>" 
                                            data-upm="<?= $dataSPK['tgl_upm']?>"
                                            data-status="<?= $dataSPK['status']?>"
                                            data-href="/Spk/editSPK/">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 text-center bx bxs-info-circle 
                                            btn bg-gradient-info px-2 py-1 fw-lighter'></i>
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
                                        <a href="/order/<?=$dataSPK['id_spk']?>" class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i
                                                        class='fs-4 fw-lighter bx bxs-cart-alt btn bg-gradient-info px-2 py-1 text-center'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Order
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Order Logistik
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="/proses/<?=$dataSPK['id_spk']?>" class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 bx bxs-pie-chart-alt-2 fw-lighter text-center 
                                                    btn bg-gradient-warning py-1 px-2'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Proses
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Tampilkan Proses
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="/DeliveryOrder/<?=$dataSPK['id_spk']?>" class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 bx bxs-truck text-center 
                                                    btn bg-gradient-polman text-white fw-lighter py-1 px-2'></i>
                                                </div>
                                                <div class="col-8 ps-0 text-wrap">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm text-dark fw-bold mb-1">
                                                            Delivery Order
                                                        </h6>
                                                        <p class="text-xs text-wob text-dark mb-0 ">
                                                            Tampilkan DO
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="#" data-href="/Spk/deleteSPK/<?=$dataSPK['id_spk']?>"
                                            data-bs-toggle="modal" data-bs-target="#confirm-delete"
                                            class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class='fs-4 bx bxs-trash px-2 py-1 btn fw-lighter bg-gradient-danger'></i>
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
    <a href="#" data-href="/Spk/bulkDelSPK/"
        class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?=base_url().'Spk/createSPK'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Tambah SPK</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <input type="hidden" class="form-control" id="status" name="status" value="Menunggu">
                        <div class="mb-1 pengorder-div">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="pengorder" class="form-control" id="pengorder"
                                    placeholder="Masukan Nama Pemesan" autofocus>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Pesanan (No.spk)</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="hidden" class="form-control" id="no_spk" name="no_spk"
                                    value="PM<?=substr(date("Y"), -2);?><?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>">
                                <input type="text" class="form-control" id="disp_no_spk" name=""
                                    value="PM<?=substr(date("Y"), -2);?><?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>"
                                    disabled>
                            </div>
                        </div>

                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Penawaran</label>
                            <div class="input-set">
                                <i class='bx bxs-purchase-tag'></i>
                                <input type="hidden" class="form-control" id="no_penawar" name="no_penawar"
                                    value="Q<?=substr(date("Y"), -2);?>.<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>">
                                <input type="text" class="form-control" id="disp_no_penawar" name=""
                                    value="Q<?=substr(date("Y"), -2);?>.<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>"
                                    disabled>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Order Pembelian</label>
                            <div class="input-set">
                                <i class='bx bx-cart'></i>
                                <input type="hidden" class="form-control" id="no_order" name="no_order"
                                    value="<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>/PTR/II/<?=date("Y")?>">
                                <input type="text" class="form-control" id="disp_no_order" name=""
                                    value="<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>/PTR/II/<?=date("Y")?>"
                                    disabled>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1 tgl_penyerahan-div">
                            <label for="" class="text-uppercase form-label">Tanggal Penyerahan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_penyerahan" class="dateselect form-control"
                                    id="tgl_penyerahan" placeholder="Masukkan Tanggal Penyerahan (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_selesai-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_selesai" class="dateselect form-control" id="tgl_selesai"
                                    placeholder="Masukkan Batas Waktu (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1 nama_produk-div">
                            <label for="" class="text-uppercase form-label">Nama Produk</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                    placeholder="Masukkan Nama produk">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 jml_pesanan-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" name="jml_pesanan" class="form-control" id="jml_pesanan"
                                    placeholder="Masukkan Jml Pesanan" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_upm-div">
                            <label for="" class="text-uppercase form-label">Tanggal Dikeluarkan UPM</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" class="form-control dateselect" id="tgl_upm"
                                    placeholder="Masukkan Tgl Dikeluarkan UPM (YYYY/MM/DD)" name="tgl_upm">
                                <div class="invalid-feedback"></div>
                            </div>
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
        <form method="POST" id="edit-form" data-url="<?=base_url().'Spk/editSPK'?>">
        <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Info SPK</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <div class="mb-1 edit_pengorder-div">
                            <label for="" class="text-uppercase form-label">Pengorder</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="edit_pengorder" value="" class="form-control"
                                    id="edit_pengorder">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Pesanan (No.SPK)</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="hidden" class="form-control" id="edit_id_spk" name="edit_id_spk">
                                <input type="text" class="form-control" id="disp_edit_id_spk" name="" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Penawaran</label>
                            <div class="input-set">
                                <i class='bx bxs-purchase-tag'></i>
                                <input type="hidden" class="form-control" id="edit_no_penawar">
                                <input type="text" class="form-control" id="disp_edit_no_penawar" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Order Pembelian</label>
                            <div class="input-set">
                                <i class='bx bx-cart'></i>
                                <input type="hidden" class="form-control" id="edit_no_order">
                                <input type="text" class="form-control" id="disp_edit_no_order" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <input type="hidden" name="idspk" id="idspk">
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1 edit_tgl_penyerahan-div">
                            <label for="" class="text-uppercase form-label">Tanggal Penyerahan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" id="edit_tgl_penyerahan" name="edit_tgl_penyerahan"
                                    class="dateselect form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_selesai-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" id="edit_tgl_selesai" name="edit_tgl_selesai"
                                    class="dateselect form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1 edit_nama_produk-div">
                            <label for="" class="text-uppercase form-label">Nama Produk</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" id="edit_nama_produk" name="edit_nama_produk" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-1 edit_jml_pesanan-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" id="edit_jml_pesanan" name="edit_jml_pesanan" class="form-control"
                                    min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="mb-1 edit_tgl_upm-div">
                            <label for="" class="text-uppercase form-label">Tanggal Dikeluarkan UPM</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" class="dateselect form-control" id="edit_tgl_upm"
                                    name="edit_tgl_upm">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <p class="debug-url-edit"></p>
                </div>
                <div class="modal-footer">
                    <div class="row w-100 m-0">
                        <div class="col-auto ms-2 p-0 my-auto text-start tabnum">
                            <div class="d-flex my-auto">
                                <p class="d-flex fw-bold my-auto ">1/</p>
                                <span class="d-flex fw-bold mt-2 my-auto text-xs">
                                    <script type="text/javascript">
                                        document.write(document.querySelectorAll(".tab_edit").length)
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

<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="validate-form" data-url="<?=base_url().'Spk/validateSPK'?>">
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

<!-- call generic js file -->

<?php 

include "footerjs.php"


?>

<script>
    /*Beberapa fungsi harus masuk document ready function 
    karena beberapa akan / baru bisa bekerja ketika halaman
    sudah selesai melakukan proses load , tapi untuk fungsi yang
    bisa tanpa ready function silahkan taro diluar saja, ingat pakai sesuai 
    kaidah dan fungsinya
    
    debugging url silahkan di uncomment jika ingin melihat url yang digunakan
    untuk memanggil method dari controller*/

    $(document).ready(function () {
        //modal validation
        $('#validation_modal').on('show.bs.modal', function (e) {
            form[2].url = $(e.relatedTarget).data('href');
            if ($(e.relatedTarget).data('valid')) {
                $("#validation_modal .arrowicon").css('display', 'inline-block').attr('href', $(e.relatedTarget).data(
                    'valid'));
                $('#validation').val($(e.relatedTarget).data('valid'));
            } else {
                $("#validation_modal .arrowicon").css('display', 'none');
                $('#validation').val($(e.relatedTarget).data('valid'));
            }
        });

        //edit modal
        $('.btn-edit').on('click', function () {
            // get data from button edit
            const id = $(this).data('idspk');
            const nospk = $(this).data('nospk');
            const pengorder = $(this).data('pengorder');
            const tglselesai = $(this).data('tglsel');
            const tglpenyerahan = $(this).data('tglserah');
            const nama = $(this).data('namaprod');
            const jml = $(this).data('jml');
            const url = $(this).data('href');
            const penawar = $(this).data('penawaran');
            const order = $(this).data('order');
            const tglupm = $(this).data('upm');

            // Set data to Form Edit
            $('#edit_id_spk').val(nospk);
            $('#disp_edit_id_spk').val(nospk);
            $('#idspk').val(id);
            $('#edit_pengorder').val(pengorder);
            $('#edit_tgl_selesai').val(tglselesai);
            $('#edit_tgl_penyerahan').val(tglpenyerahan);
            $('#edit_nama_produk').val(nama);
            $('#edit_jml_pesanan').val(jml);
            $('#edit_no_penawar').val(penawar);
            $('#disp_edit_no_penawar').val(penawar);
            $('#edit_no_order').val(order);
            $('#disp_edit_no_order').val(order);
            $('#edit_tgl_upm').val(tglupm);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });

        $(".btn-valid-status").each(function () {
            let arrlength = $(this).data('valid').length;
            if (arrlength > 0) {
                $(this).find(".status_validate").html("TERVALIDASI").addClass('bg-gradient-success');

            } else {
                $(this).find(".status_validate").html("BELUM ADA").addClass('bg-gradient-secondary');
            }
        });
    });
</script>

<?=$this->endSection();?>