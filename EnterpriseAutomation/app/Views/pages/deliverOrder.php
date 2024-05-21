<?php $this->extend("layout/template.php", $title);

$this->section('content');

?>
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
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No. Order
                        </th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Tanggal Kirim</th>
                        <th class="sticky-left text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Nama Barang Jadi</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Bahan</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Total Kirim</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Sisa Kirim</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Keterangan</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Catatan</th>
                        <th class="text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            Status Persetujuan</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1));
                    foreach ($getDeliverOrder as $data) { ?>
                        <tr>
                            <td data-label="Select Data" class="sticky-left stext-dark text-center check-td d-none">
                                <div class="checkbox-wrapper-46">
                                    <input class="shadow inp-cbx" id="cbx-46-<?= $data['id_do'] ?>" type="checkbox" value="<?= $data['id_do'] ?>">
                                    <label class="cbx" for="cbx-46-<?= $data['id_do'] ?>"><span>
                                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                            </svg></span><span class="ps-0"></span>
                                    </label>
                                </div>
                            </td>
                            <td data-label="no" class="text-dark text-center"><?= $no; ?></td>
                            <td data-label="no_order" class="text-dark text-center"><?= $data['no_order'] ?></td>
                            <td data-label="tangal_kirim" class="sticky-left text-dark text-center">
                                <?= $data['tanggal_kirim'] ?></td>
                            <td data-label="nama_barang_jadi" class="text-dark text-center">
                                <?= $data['nama_barang_jadi'] ?></td>
                            <td data-label="bahan" class="text-dark text-center">
                                <?= $data['bahan'] ?></td>
                            <td data-label="total_kirim" class="text-dark text-center"><?= $data['total_kirim'] ?></td>
                            <td data-label="sisa_kirim" class="text-dark text-center"><?= $data['sisa_kirim'] ?></td>
                            <td data-label="keterangan" class="text-dark text-center">
                                <?= $data['keterangan'] ?></td>
                            <td data-label="catatan" class="text-dark text-center"><?= $data['catatan'] ?>
                            </td>
                            <td data-label="status_persetujuan" class="text-dark text-center"><?= $data['status_persetujuan'] ?></td>
                            <td data-label="Option" class="text-dark text-center">
                                <div class="btn-group dropstart">
                                    <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-boundary="window">
                                        <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right p-1 position-fixed">
                                        <li class="mb-0">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_info" class="btn-edit dropdown-item" data-id_do="<?= $data['id_do'] ?>" data-no_order="<?= $data['no_order'] ?>" data-tanggal_kirim="<?= $data['tanggal_kirim'] ?>" data-nama_barang_jadi="<?= $data['nama_barang_jadi'] ?>" data-bahan="<?= $data['bahan'] ?>" data-total_kirim="<?= $data['total_kirim'] ?>" data-sisa_kirim="<?= $data['sisa_kirim'] ?>" data-keterangan="<?= $data['keterangan'] ?>" data-catatan="<?= $data['catatan'] ?>" data-status_persetujuan="<?= $data['status_persetujuan'] ?>">
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
                                            <a href="#" data-href="/DeliverOrder/deleteDeliverOrder/<?= $data['id_do'] ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="dropdown-item">
                                                <div class="row mt-2">
                                                    <div class="col-auto">
                                                        <i class='fs-4 bx bxs-trash px-2 py-1 btn bg-gradient-danger'></i>
                                                    </div>
                                                    <div class="col-8 ps-0 text-wrap">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm text-dark fw-bold mb-1">
                                                                Hapus
                                                                <p class="text-xs text-wob text-dark mb-0 ">
                                                                    Hapus Data
                                                                </p>
                                                            </h6>
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
        <form method="post" id="create-form" data-url="<?= base_url() . 'DeliverOrder/createDeliverOrder' ?>">
            <?= csrf_field() ?>
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
                                <i class='bx bx-list-ol'></i>
                                <input type="text" name="no_order" class="form-control" id="no_order" placeholder="Masukan No Order">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tanggal_kirim-div">
                            <label for="" class="text-uppercase form-label">Tanggal Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="tanggal_kirim" class="dateselect form-control" id="tanggal_kirim" placeholder="Masukkan Tanggal (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 nama_barang_jadi-div">
                            <label for="" class="text-uppercase form-label">Nama Barang Jadi</label>
                            <div class="input-set">
                                <i class='bx bxs-package'></i>
                                <input type="text" name="nama_barang_jadi" class="form-control" id="nama_barang_jadi" placeholder="Masukkan Nama Barang Jadi">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 bahan-div">
                            <label for="" class="text-uppercase form-label">Bahan</label>
                            <div class="input-set">
                                <i class='bx bx-cylinder'></i>
                                <input type="text" name="bahan" class="form-control" id="bahan" placeholder="Masukkan Nama Bahan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 total_kirim-div">
                            <label for="" class="text-uppercase form-label">Total Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-package'></i>
                                <input type="text" name="total_kirim" class="form-control" id="total_kirim" placeholder="Masukkan Total Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 sisa_kirim-div">
                            <label for="" class="text-uppercase form-label">Sisa Kirim</label>
                            <div class="input-set">
                                <i class='bx bxs-component'></i>
                                <input type="text" name="sisa_kirim" class="form-control" id="sisa_kirim" placeholder="Masukkan Sisa Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 keterangan-div">
                            <label for="" class="text-uppercase form-label">Keterangan</label>
                            <div class="input-set">
                                <i class='bx bx-notepad'></i>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Nama Keterangan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 catatan-div">
                            <label for="" class="text-uppercase form-label">Catatan</label>
                            <div class="input-set">
                                <i class='bx bxs-edit'></i>
                                <input type="text" name="catatan" class="form-control" id="catatan" placeholder="Masukkan Catatan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 status_persetujuan-div">
                            <label for="status_persetujuan" class="text-uppercase form-label">Disetujui</label>
                            <div class="input-set">
                                <i class='bx bx-user-check'></i>
                                <select name="status_persetujuan" class="form-select" id="status_persetujuan">
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
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
        <form method="POST" id="validate-form" data-url="<?= base_url() . 'DeliverOrder/validateDeliverOrder' ?>">
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
        <form method="POST" id="edit-form" data-url="<?= base_url() . 'DeliverOrder/editDeliverOrder' ?>">
            <?= csrf_field() ?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Info Delivery Order</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <div class="mb-1 edit_no_order-div">
                            <label for="" class="text-uppercase form-label">No Order</label>
                            <div class="input-set">
                                <i class='bx bx-user'></i>
                                <input type="text" name="edit_no_order" class="form-control" id="edit_no_order" placeholder="Masukan No Order">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tanggal_kirim-div">
                            <label for="" class="text-uppercase form-label">Tanggal Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_tanggal_kirim" class="dateselect form-control" id="edit_tanggal_kirim" placeholder="Masukkan Tanggal (YYYY/MM/DD)">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_nama_barang_jadi-div">
                            <label for="" class="text-uppercase form-label">Nama Barang Jadi</label>
                            <div class="input-set">
                                <i class='bx bx-hard-hat'></i>
                                <input type="text" name="edit_nama_barang_jadi" class="form-control" id="edit_nama_barang_jadi" placeholder="Masukkan Nama Barang Jadi">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_bahan-div">
                            <label for="" class="text-uppercase form-label">Bahan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_bahan" class="form-control" id="edit_bahan" placeholder="Masukkan Nama Bahan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_edit">
                        <div class="mb-1 edit_total_kirim-div">
                            <label for="" class="text-uppercase form-label">Total Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_total_kirim" class="form-control" id="edit_total_kirim" placeholder="Masukkan Total Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_sisa_kirim-div">
                            <label for="" class="text-uppercase form-label">Sisa Kirim</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_sisa_kirim" class="form-control" id="edit_sisa_kirim" placeholder="Masukkan Sisa Kirim">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_keterangan-div">
                            <label for="" class="text-uppercase form-label">Keterangan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_keterangan" class="form-control" id="edit_keterangan" placeholder="Masukkan Nama Keterangan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_catatan-div">
                            <label for="" class="text-uppercase form-label">Catatan</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" name="edit_catatan" class="form-control" id="edit_catatan" placeholder="Masukkan Catatan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_status_persetujuan-div">
                            <label for="edit_disetujui" class="text-uppercase form-label">Disetujui</label>
                            <div class="input-set">
                                <i class='bx bx-user-check'></i>
                                <select name="edit_disetujui" class="form-select" id="edit_disetujui">
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
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
                            <button anim="ripple" type="button" class="btn m-0 btn-light text-sm me-2" id="prevBtn">Back</button>
                            <button anim="ripple" type="button" class="btn m-0 btn-info" id="nextBtn">Next</button>
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
            const no_order = $(this).data('no_order');
            const tanggal_kirim = $(this).data('tanggal_kirim');
            const nama_barang_jadi = $(this).data('nama_barang_jadi');
            const bahan = $(this).data('bahan');
            const total_kirim = $(this).data('total_kirim');
            const sisa_kirim = $(this).data('sisa_kirim');
            const keterangan = $(this).data('keterangan');
            const catatan = $(this).data('catatan');
            const status_persetujuan = $(this).data('status_persetujuan');

            // Set data to Form Edit
            $('#edit_no_order').val(no_order);
            $('#edit_tanggal_kirim').val(tanggal_kirim);
            $('#edit_nama_barang_jadi').val(nama_barang_jadi);
            $('#edit_bahan').val(bahan);
            $('#edit_total_kirim').val(total_kirim);
            $('#edit_sisa_kirim').val(sisa_kirim);
            $('#edit_keterangan').val(keterangan);
            $('#edit_catatan').val(catatan);
            $('#edit_status_persetujuan').val(status_persetujuan);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    })
</script>
<?= $this->endSection(); ?>