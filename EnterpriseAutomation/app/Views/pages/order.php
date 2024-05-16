<?php $this->extend("layout/template.php", $title);

$this->section('content');

?>
<div class="row mt-4">
    <!-- CARD ORDER START -->
    <div class="col">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="row mx-0 w-100">
                    <div class="col ps-0 d-flex">
                        <div class="icon my-auto icon-shape bg-gradient-warning shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-cart-alt'></i>
                        </div>
                        <div class="d-flex">
                            <h3 class="text-dark lh-1 ms-3 my-auto">Order<br>
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
                                if (isset($getSPK[0]->gbr_kerja)) {
                                    $valid = $getSPK[0]->gbr_kerja;
                                } else {
                                    $valid = "";
                                }

                                if (!isset($getSPK[0]->gbr_kerja)) {
                                    echo '<a id="btn-validate" class="text-sm text-wrap my-auto w-100 py-2 btn btn-info" href="#"
                                    data-bs-toggle="modal" data-bs-target="#validation_modal"
                                    data-href="' . base_url() . 'Order/validateSPK/' . $getSPK[0]->id_spk . '"
                                    data-valid="' . $valid . '">Validasi</a>';
                                } else {
                                    echo '<a id="btn-validate" class="text-sm text-wrap my-auto w-100 py-2 btn btn-success"
                                    href="#" data-bs-toggle="modal"
                                    data-bs-target="#validation_modal"
                                    data-href="' . base_url() . 'Order/validateSPK/' . $getSPK[0]->id_spk . '" 
                                    data-valid="' . $valid . '">Info Validasi</a>';
                                } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-end text-lg-center mt-3">
                                <div data-valid="<?= $valid ?>" class="text-wrap status_validate">
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
    <!-- CARD ORDER END -->

    <!-- CARD BATAS WAKTU START -->
    <!-- <div class="col-lg-5 mt-4 mt-lg-0">
        <?php

        $epoch = time();
        $currentdate = date_create("@$epoch", new DateTimeZone("UTC"))
            ->setTimezone(new DateTimeZone("Asia/Jakarta"))->format("Y-m-d");
        $date_batas = $getSPK[0]->tgl_selesai;
        date_create($currentdate) > date_create($date_batas) ? $punc = "+" : $punc = '-';
        $diff = date_diff(date_create($currentdate), date_create($date_batas));

        ?>
        <div class="card waktu h-100 <?php
                                        if ($punc == "+" && $diff->format("%a") > 0) {
                                            echo "bg-gradient-danger";
                                        } else if ($punc == '-' && $diff->format("%a") > 7) {
                                            echo "bg-gradient-success";
                                        } else if ($punc == '-' && $diff->format("%a") <= 7) {
                                            echo 'bg-gradient-warning';
                                        } ?>
                
                py-auto z-index-2">
            <div class="card-header <?php
                                    if ($punc == "+" && $diff->format("%a") > 0) {
                                        echo "bg-gradient-danger";
                                    } else if ($punc == '-' && $diff->format("%a") > 7) {
                                        echo "bg-gradient-success";
                                    } else if ($punc == '-' && $diff->format("%a") <= 7) {
                                        echo 'bg-gradient-warning';
                                    }
                                    ?> ">
                <div class="my-auto text-center py-auto">
                    <h5 class="text-white fw-bolder letter-spacing-2 text-center">BATAS WAKTU</h5>
                </div>
                <h4 class="text-white text-center fw-light"><?= $getSPK[0]->tgl_selesai ?> |
                    <?= "H" . $punc . $diff->format("%a") ?>
                </h4>
            </div>
            <div class="card-body p-1">

            </div>
        </div>
    </div> -->
    <!-- CARD BATAS WAKTU END -->
</div>

<!-- TABEL DATA ORDER START -->
<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <h5 class="d-flex ms-1 mt-lg-2 mb-0 text-dark">Tabel Data Order Logistik</h5>
                </div>
            </div>
            <div class="col col-lg-auto pe-0 d-flex justify-content-lg-end justify-content-center">
                <div class="row w-100">
                    <div class="col px-0">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                            <form action="" id="searchbar" method="GET">
                                <div class="position-relative">
                                    <div class="input-set">
                                        <input type="text" id="searchbox" class="form-control" placeholder="Type here..." name="keyword" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>">
                                        <?php
                                        if (empty($_GET['keyword'])) {
                                            echo ' <button anim="ripple" type="button" class="arrowicon searchbtn btn m-0"><i
                                            class="text-white fs-6 bx bx-search"></i> </button>';
                                        } else {
                                            echo '<button anim="ripple" type="button" class="bg-danger arrowicon searchdel btn m-0"><i
                                            class="text-white fs-6 bx bxs-trash-alt"></i> </button>';
                                        } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="option-dropdown col-auto ps-0 pe-lg-0 me-lg-4">
                        <div class="btn-group dropstart">
                            <button class="pt-2 ps-lg-0 ps-2 pe-0 btn btn-mesin" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                <i class="text-dark fs-3 bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <div class="w-100 btn-group dropstart">
                                        <a type="button" class="ps-0 d-flex text-dark dropdown-item" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        Multiple Delete Selection</a>
                                </li>
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
                        <th class="sticky-left check-th d-none text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Jumlah</th>
                        <th class="sticky-left text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Nama Barang</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Uraian</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Ukuran</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.Barang</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.Gambar</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Tanggal Penerima</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Nama Penerima</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Berat(kg)</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Tanggal Pelaporan/Pembelian</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1));
                    foreach ($getOrder as $dataOrder) { ?>
                        <tr>
                            <td data-label="Select Data" class="sticky-left stext-dark text-center check-td d-none">
                                <div class="checkbox-wrapper-46">
                                    <input class="shadow inp-cbx" id="cbx-46-<?= $dataOrder['id_orderlog'] ?>" type="checkbox" value="<?= $dataOrder['id_orderlog'] ?>">
                                    <label class="cbx" for="cbx-46-<?= $dataOrder['id_orderlog'] ?>"><span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg></span><span class="ps-0"></span>
                                    </label>
                                </div>
                            </td>
                            <td data-label="No" class="text-dark text-center"><?= $no; ?></td>
                            <td data-label="Jumlah" class="text-dark text-center"><?= $dataOrder['jml_satuan'] ?></td>
                            <td data-label="Nama Barang" class="sticky-left text-dark text-center">
                                <?= $dataOrder['nama_barang'] ?></td>
                            <td data-label="Uraian" class="text-dark text-center">
                                <?= $dataOrder['uraian'] ?></td>
                            <td data-label="Ukuran" class="text-dark text-center">
                                <?= $dataOrder['ukuran'] ?></td>
                            <td data-label="No.Barang" class="text-dark text-center"><?= $dataOrder['no_barang'] ?></td>
                            <td data-label="No.Gambar" class="text-dark text-center"><?= $dataOrder['no_gambar'] ?></td>
                            <td data-label="Tanggal Penerima" class="text-dark text-center">
                                <?= $dataOrder['tgl_penerima'] ?></td>
                            <td data-label="Nama Penerima" class="text-dark text-center"><?= $dataOrder['nama_penerima'] ?>
                            </td>
                            <td data-label="Berat(kg)" class="text-dark text-center"><?= $dataOrder['berat_barang'] ?></td>
                            <td data-label="Tanggal Pelaporan/Pembelian" class="text-dark text-center">
                                <?= $dataOrder['tgl_pembelian'] ?></td>
                            <td data-label="Option" class="text-dark text-center">
                                <div class="btn-group dropstart">
                                    <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window">
                                        <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                        <li class="mb-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_info" class="btn-edit dropdown-item" data-id_orderlog="<?= $dataOrder['id_orderlog'] ?>" data-pengorder="<?= $dataOrder['pemesan'] ?>" data-tgl_created="<?= $dataOrder['tanggal_created'] ?>" data-unit_kerja="<?= $dataOrder['unit_kerja'] ?>" data-batas_waktu="<?= $dataOrder['batas_waktu'] ?>" data-disetujui="<?= $dataOrder['disetujui'] ?>" data-no_spk="<?= $dataOrder['no_spk'] ?>" data-jml_satuan="<?= $dataOrder['jml_satuan'] ?>" data-nama_barang="<?= $dataOrder['nama_barang'] ?>" data-uraian="<?= $dataOrder['uraian'] ?>" data-ukuran="<?= $dataOrder['ukuran'] ?>" data-no_barang="<?= $dataOrder['no_barang'] ?>" data-no_gambar="<?= $dataOrder['no_gambar'] ?>" data-tgl_penerima="<?= $dataOrder['tgl_penerima'] ?>" data-nama_penerima="<?= $dataOrder['nama_penerima'] ?>" data-tgl_pembelian="<?= $dataOrder['tgl_pembelian'] ?>" data-berat_barang="<?= $dataOrder['berat_barang'] ?>" data-tgl_pesanan="<?= $dataOrder['tgl_pesanan'] ?>" data-record_order="<?= $dataOrder['record_order'] ?>" data-nama_pelaksana="<?= $dataOrder['nama_pelaksana'] ?>" data-catatan="<?= $dataOrder['catatan'] ?>">
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
                                            <a href="#" data-href="/Order/deleteOrder/<?= $dataOrder['id_orderlog'] ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="dropdown-item">
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
                    <?php $no++;
                    } ?>
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
    <a data-bs-toggle="modal" data-bs-target="#createModal" class="bg-gradient-polman fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<div class="fixed-plugin fixed-delete d-none">
    <a href="#" data-href="/Order/bulkDelOrder/" class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>

<!-- FLOATING ACTION BUTTON END -->

<!-- MODAL CREATE START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?= base_url() . 'Order/createOrder' ?>">
            <?= csrf_field() ?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel"> Order</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1 pengorder-div">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="pengorder" class="form-control" id="pengorder" placeholder="Masukan Nama Pemesan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_created-div">
                            <label for="" class="text-uppercase form-label">Tanggal</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_created" class="dateselect form-control" id="tgl_created" placeholder="Masukkan Tanggal (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 unit_kerja-div">
                            <label for="" class="text-uppercase form-label">Unit Kerja</label>
                            <div class="input-set">
                                <i class='bx bx-hard-hat'></i>
                                <input type="text" name="unit_kerja" class="form-control" id="unit_kerja" placeholder="Masukkan Unit Kerja">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 batas_waktu-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="batas_waktu" class="dateselect form-control" id="batas_waktu" placeholder="Masukkan Batas Waktu (YYYY/MM/DD">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 disetujui-div">
                            <label for="disetujui" class="text-uppercase form-label">Disetujui</label>
                            <div class="input-set">
                                <i class='bx bx-user-check'></i>
                                <select name="disetujui" class="form-select" id="disetujui">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">

                        <div class="mb-1 no_spk-div">
                            <label for="" class="text-uppercase form-label">No. Pembebanan</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="hidden" class="form-control" id="no_spk" name="no_spk" value="<?= $getSPK[0]->no_spk ?>">
                                <input type="text" class="form-control" id="" name="" value="<?= $getSPK[0]->no_spk ?>" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 uraian-div">
                            <label for="" class="text-uppercase form-label">Uraian</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="uraian" class="form-control" id="uraian" placeholder="Masukkan Uraian Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 ukuran-div">
                            <label for="" class="text-uppercase form-label">Ukuran (PxLxT)</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="ukuran" class="form-control" id="ukuran" placeholder="Masukkan Ukuran Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 jml_satuan-div">
                            <label for="" class="text-uppercase form-label">Jumlah/Satuan</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" name="jml_satuan" class="form-control" id="jml_satuan" placeholder="Masukkan Jumlah" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 no_barang-div">
                            <label for="" class="text-uppercase form-label">No. Barang</label>
                            <div class="input-set">
                                <i class='bx bx-tag-alt'></i>
                                <input type="text" name="no_barang" class="form-control" id="no_barang" placeholder="Masukkan No.Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 no_gambar-div">
                            <label for="" class="text-uppercase form-label">No. Gambar</label>
                            <div class="input-set">
                                <i class='bx bx-photo-album'></i>
                                <input type="text" name="no_gambar" class="form-control" id="no_gambar" placeholder="Masukkan No.Gambar">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_penerima-div">
                            <label for="" class="text-uppercase form-label">Tanggal Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_penerima" class="dateselect form-control" id="tgl_penerima" placeholder="Masukkan Tanggal Penerima">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_penerima-div">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_penerima" class="form-control" id="nama_penerima" placeholder="Masukkan Nama Penerima">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 berat_barang-div">
                            <label for="" class="text-uppercase form-label">Berat (Kg)</label>
                            <div class="input-set">
                                <i class='bx bx-package'></i>
                                <input type="number" name="berat_barang" class="form-control" id="berat_barang" placeholder="Masukkan Berat Dalam Kilogram (Kg)" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_pembelian-div">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaporan/Pembelian</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_pembelian" class="dateselect form-control" id="tgl_pembelian" placeholder="Masukkan Tanggal Pelaporan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tgl_pesanan-div">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaksana Pesanan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tgl_pesanan" class="dateselect form-control" id="tgl_pesanan" placeholder="Masukkan Tanggal Pelaksana Pesanan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_pelaksana-div">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Pelaksana Pesanan</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_pelaksana" class="form-control" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 catatan-div">
                            <label for="" class="text-uppercase form-label">Catatan</label>
                            <textarea class="form-control" name="catatan" id="catatan" placeholder="Tuliskan Catatan (Jika Diperlukan)"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                        <!-- verification untuk submit only ketika sudah mencapai tab akhir, perlu buat
                        form input yg non mandatory -->
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
                            <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2" id="prevBtn">Back</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- CREATE MODAL END -->

<!-- MODAL VALIDATION START -->
<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="validate-form" data-url="<?= base_url() . 'Order/validateSPK' ?>">
            <?= csrf_field() ?>
            <div class=" modal-content p-3">
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
                                <input type="text" id="validation" class="form-control" placeholder="Masukkan Link Gambar Kerja Disini" name="validation">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col text-start">
                        </div>
                        <div class="col pe-0 text-end">
                            <button anim="ripple" type="button" class="btn btn-secondary m-0 me-2" id="prevBtn_valid">Previous</button>
                            <button anim="ripple" type="button" class="btn btn-info m-0" id="nextBtn_valid">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- MODAL VALIDATION END -->

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
                <button anim="ripple" type="button" class="text-sm m-0 me-2 btn btn-light" data-bs-dismiss="modal">Kembali</button>
                <a class="text-sm btn btn-danger btn-ok m-0">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- DELETE MODAL END -->

<!-- EDIT MODAL START -->
<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" data-url="<?= base_url() . 'Order/editOrder' ?>">
            <?= csrf_field() ?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Info Order</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <div class="mb-1 edit_pengorder-div">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="edit_pengorder" class="form-control" id="edit_pengorder">
                                <input type="hidden" name="edit_id_orderlog" class="form-control" id="edit_id_orderlog">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_created-div">
                            <label for="" class="text-uppercase form-label">Tanggal</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tgl_created" class="dateselect form-control" id="edit_tgl_created">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_unit_kerja-div">
                            <label for="" class="text-uppercase form-label">Unit Kerja</label>
                            <div class="input-set">
                                <i class='bx bx-hard-hat'></i>
                                <input type="text" name="edit_unit_kerja" class="form-control" id="edit_unit_kerja">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_batas_waktu-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_batas_waktu" class="dateselect form-control" id="edit_batas_waktu">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="edit_disetujui-div">
                            <div class="mb-1">
                                <label for="disetujui" class="text-uppercase form-label">Disetujui</label>
                                <div class="input-set">
                                    <i class='bx bx-user-check'></i>
                                    <select name="edit_disetujui" class="form-select" id="edit_disetujui">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_edit">
                        <div class="mb-1 edit_no_spk-div">
                            <label for="" class="text-uppercase form-label">No. Pembebanan</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                                <input type="text" name="edit_no_spk" class="form-control" id="edit_no_spk" disabled>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_jml_satuan-div">
                            <label for="" class="text-uppercase form-label">Jumlah/Satuan</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" name="edit_jml_satuan" class="form-control" id="edit_jml_satuan" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_nama_barang" class="form-control" id="edit_nama_barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_uraian-div">
                            <label for="" class="text-uppercase form-label">Uraian</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_uraian" class="form-control" id="edit_uraian" placeholder="Masukkan Uraian Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_ukuran-div">
                            <label for="" class="text-uppercase form-label">Ukuran (PxLxT)</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_ukuran" class="form-control" id="edit_ukuran" placeholder="Masukkan Ukuran Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_edit">
                        <div class="mb-1 edit_no_barang-div">
                            <label for="" class="text-uppercase form-label">No.Barang</label>
                            <div class="input-set">
                                <i class='bx bx-tag-alt'></i>
                                <input type="text" class="form-control" name="edit_no_barang" id="edit_no_barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_no_gambar-div">
                            <label for="" class="text-uppercase form-label">No.Gambar</label>
                            <div class="input-set">
                                <i class='bx bx-photo-album'></i>
                                <input type="text" class="form-control" name="edit_no_gambar" id="edit_no_gambar">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_penerima-div">
                            <label for="" class="text-uppercase form-label">Tanggal Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tgl_penerima" class="dateselect form-control" id="edit_tgl_penerima">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_penerima-div">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_nama_penerima" class="form-control" id="edit_nama_penerima">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_edit">
                        <div class="mb-1 edit_berat_barang-div">
                            <label for="" class="text-uppercase form-label">Berat (Kg)</label>
                            <div class="input-set">
                                <i class='bx bx-package'></i>
                                <input type="number" name="edit_berat_barang" class="form-control" id="edit_berat_barang" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_pembelian-div">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaporan/Pembelian</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tgl_pembelian" class="dateselect form-control" id="edit_tgl_pembelian">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tgl_pesanan-div">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaksana Pesanan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tgl_pesanan" class="dateselect form-control" id="edit_tgl_pesanan" placeholder="Masukkan Tanggal Pelaksana Pesanan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_pelaksana-div">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Pelaksana
                                Pesanan</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="edit_nama_pelaksana" class="form-control" id="edit_nama_pelaksana">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_catatan-div">
                            <label for="" class="text-uppercase form-label">Catatan</label>
                            <textarea class="form-control" name="edit_catatan" id="edit_catatan" placeholder="Tuliskan Catatan (Jika Diperlukan)"></textarea>
                            <div class="invalid-feedback"></div>
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
                                        document.write(document.querySelectorAll(".tab_edit").length)
                                    </script>
                                </span>
                            </div>
                        </div>
                        <div class="col p-0 text-end">
                            <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2" id="prevBtn_edit">Back</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn_edit">Next</button>
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
    let arrlength = $(".status_validate").data('valid').length;
    if (arrlength > 0) {
        $(".status_validate span").html("STATUS : TERVALIDASI").addClass('bg-gradient-success');
    } else {
        $(".status_validate span").html("STATUS : BELUM TERVALIDASI").addClass('bg-gradient-secondary');
    }

    $(document).ready(function() {
        //modal validation
        $('#validation_modal').on('show.bs.modal', function(e) {
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

        $('.btn-edit').on('click', function() {
            const id_orderlog = $(this).data('id_orderlog');
            const pengorder = $(this).data('pengorder');
            const tgl_created = $(this).data('tgl_created');
            const unit_kerja = $(this).data('unit_kerja');
            const batas_waktu = $(this).data('batas_waktu');
            const disetujui = $(this).data('disetujui');
            const no_spk = $(this).data('no_spk');
            const jml_satuan = $(this).data('jml_satuan');
            const nama_barang = $(this).data('nama_barang');
            const uraian = $(this).data('uraian');
            const ukuran = $(this).data('ukuran');
            const no_barang = $(this).data('no_barang');
            const no_gambar = $(this).data('no_gambar');
            const tgl_penerima = $(this).data('tgl_penerima');
            const nama_penerima = $(this).data('nama_penerima');
            const tgl_pembelian = $(this).data('tgl_pembelian');
            const berat_barang = $(this).data('berat_barang');
            const tgl_pesanan = $(this).data('tgl_pesanan');
            const record_order = $(this).data('record_order');
            const nama_pelaksana = $(this).data('nama_pelaksana');
            const catatan = $(this).data('catatan');

            // Set data to Form Edit
            $('#edit_id_orderlog').val(id_orderlog);
            $('#edit_pengorder').val(pengorder);
            $('#edit_tgl_created').val(tgl_created);
            $('#edit_unit_kerja').val(unit_kerja);
            $('#edit_batas_waktu').val(batas_waktu);
            $('#edit_disetujui').val(disetujui);
            $('#edit_no_spk').val(no_spk);
            $('#edit_jml_satuan').val(jml_satuan);
            $('#edit_nama_barang').val(nama_barang);
            $('#edit_uraian').val(uraian);
            $('#edit_ukuran').val(ukuran);
            $('#edit_no_barang').val(no_barang);
            $('#edit_no_gambar').val(no_gambar);
            $('#edit_tgl_penerima').val(tgl_penerima);
            $('#edit_nama_penerima').val(nama_penerima);
            $('#edit_tgl_pembelian').val(tgl_pembelian);
            $('#edit_berat_barang').val(berat_barang);
            $('#edit_tgl_pesanan').val(tgl_pesanan);
            $('#edit_record_order').val(record_order);
            $('#edit_nama_pelaksana').val(nama_pelaksana);
            $('#edit_catatan').val(catatan);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    })
</script>
<?= $this->endSection(); ?>