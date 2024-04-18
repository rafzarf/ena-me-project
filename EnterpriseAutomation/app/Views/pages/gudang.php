<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<!-- CARD START -->
<div class="card mt-4">

    <!-- CARD HEADER START -->
    <div class="card-header pb-1 pe-0">

        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <h5 class="d-flex ms-1 mt-lg-2 mb-0 text-dark">Tabel Inventaris Gudang</h5>
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
    <!-- CARD HEADER END -->

    <!-- CARD BODY START -->
    <div class="card-body pt-0 mt-0">
        <div class="table-responsive p-0">
            <table class="table table-hover align-items-center">
                <thead class="text-xs">
                    <tr>
                        <th
                            class="sticky-left  check-th d-none text-uppercase text-center text-dark font-weight-bolder opacity-10">
                        </th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th
                            class="sticky-left text-uppercase text-wrap text-center text-dark font-weight-bolder opacity-10">
                            No.SPK</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Nama Barang</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Jumlah</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Batas Waktu</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Status</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Nama Penerima</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                            Lokasi Penyimpanan</th>
                        <th class="text-uppercase text-center text-wrap text-dark font-weight-bolder opacity-10">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php $no = 1 + ($entries * ($current_page - 1)); foreach($getLogistik as $data){?>
                    <tr>
                        <td data-label="Select Data" class="sticky-left  text-dark text-center check-td d-none">
                            <div class="checkbox-wrapper-46">
                                <input class="shadow inp-cbx" id="cbx-46-<?=$data['id_stoklogistik']?>" type="checkbox"
                                    value="<?=$data['id_stoklogistik']?>">
                                <label class="cbx" for="cbx-46-<?=$data['id_stoklogistik']?>"><span>
                                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg></span><span class="ps-0"></span>
                                </label>
                            </div>
                        </td>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="No.SPK" class="sticky-left text-dark text-center"><?= $data['no_spk']?></td>
                        <td data-label="Nama Barang" class="text-dark text-center"><?= $data['nama_barang']?></td>
                        <td data-label="Jumlah" class="text-dark text-center"><?= $data['jml_komponen']?></td>
                        <td data-label="Batas Waktu" class="text-dark text-center"><?= $data['batas_waktu']?></td>
                        <td data-label="Status" class="text-dark text-center">
                            <span class="status_barang badge badge-sm 
                            <?php 
                            if($data['status'] == 'Tersedia') {
                                echo 'bg-gradient-success';
                            } else {
                                echo 'bg-gradient-secondary';
                            }
                            ?>"><?=$data['status'] ?></span>
                        </td>
                        <td data-label="Nama Penerima" class="text-dark text-center"><?= $data['nama_penerima']?></td>
                        <td data-label="Lokasi Penyimpanan" class="text-dark text-center"><?= $data['tempat_simpan']?>
                        </td>
                        <td data-label="Option" class="text-dark text-center">
                            <div class="btn-group dropstart">
                                <button class="btn btn-mesin mb-0" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx text-dark bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu position-fixed dropdown-menu-right p-1">
                                    <li class="mb-0">
                                        <a href="#" class="btn-edit dropdown-item"
                                            data-idlogistik="<?=$data['id_stoklogistik']?>"
                                            data-nospk="<?=$data['no_spk']?>"
                                            data-penerima="<?= $data['nama_penerima']?>"
                                            data-status="<?= $data['status']?>" data-waktu="<?= $data['batas_waktu']?>"
                                            data-nama_barang="<?= $data['nama_barang']?>"
                                            data-tempat="<?= $data['tempat_simpan']?>"
                                            data-jumlah="<?= $data['jml_komponen']?>" data-href="/Gudang/editLogistik/">
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
                                        <a href="#" data-href="/Gudang/deleteLogistik/<?=$data['id_stoklogistik']?>"
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
    <!-- CARD BODY END -->
</div>
<!-- CARD END -->

<!-- FLOATING ACTION BUTTON START -->
<div class="fixed-plugin">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class=" fixed-plugin-button bg-gradient-polman text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<div class="fixed-plugin fixed-delete d-none">
    <a href="#" data-href="/Gudang/bulkDelGudang/"
        class="fixed-plugin-button bg-gradient-danger text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bxs-trash-alt py-2'></i>
    </a>
</div>
<!-- FLOATING ACTION BUTTON END -->

<!-- MODAL CREATE START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" data-url="<?=base_url().'Gudang/createLogistik'?>">
        <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="text-dark fw-bolder modal-title" id="exampleModalLabel">Tambah Data Logistik</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.SPK</label>
                            <div class="input-set">
                                <i class='bx bx-list-ol'></i>
                            <select name="no_spk" class="form-select" id="selector_spk">
                                <?php for ($i = 0; $i < sizeof($getSPKNumber); $i++) {?>
                                <option class="mb-1" value="<?=$getSPKNumber[$i]->no_spk?>">
                                    <?=$getSPKNumber[$i]->no_spk?></option>
                                <?php }?>
                            </select>
                            </div>
                        </div>
                        <div class="mb-1 nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                    placeholder="Masukan Nama Barang">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 jml_komponen-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                                <input type="number" name="jml_komponen" class="form-control" id="jml_komponen"
                                    placeholder="Masukan Jumlah Barang" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 batas_waktu-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                                <input type="text" class="form-control dateselect" id="batas_waktu"
                                    placeholder="Masukkan Tgl Batas Waktu (YYYY/MM/DD)" name="batas_waktu">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="mb-1 nama_penerima-div">
                            <label for="" class="text-uppercase form-label">Nama Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                                <input type="text" name="nama_penerima" class="form-control" id="nama_penerima"
                                    placeholder="Masukan Nama Penerima">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 tempat_simpan-div">
                            <label for="" class="text-uppercase form-label">Lokasi Penyimpanan</label>
                            <div class="input-set">
                                <i class='bx bx-map-pin'></i>
                                <input type="text" name="tempat_simpan" class="form-control" id="tempat_simpan"
                                    placeholder="Masukan Lokasi Penyimpanan">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 selector_status-div">
                            <label for="" class="text-uppercase form-label">Status Barang</label>
                            <div class="input-set">
                                <i class='bx bx-info-circle'></i>
                                <select name="status" class="form-select" id="selector_status">
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
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
<!-- MODAL CREATE END -->

<!-- MODAL DELETE START -->
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
                <a class="btn text-sm btn-danger btn-ok m-0">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DELETE END -->

<!-- MODAL EDIT START -->
<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" data-url="<?=base_url().'Gudang/editLogistik'?>">
        <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="">Info Logistik</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <input type="hidden" name="idlogistik" id="edit_idlogistik">
                        <div class="mb-1 edit_nama_barang-div">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                            <input type="text" name="edit_nama_barang" class="form-control" id="edit_nama_barang"
                                placeholder="Masukan Nama Barang">
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_jml_komponen-div">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <div class="input-set">
                                <i class='bx bx-basket'></i>
                            <input type="number" name="edit_jml_komponen" class="form-control" id="edit_jml_komponen"
                                placeholder="Masukan Jumlah Barang" min="0">
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_batas_waktu-div">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <div class="input-set">
                                <i class='bx bx-calendar'></i>
                            <input type="text" class="form-control dateselect" id="edit_batas_waktu"
                                placeholder="Masukkan Tgl Batas Waktu (YYYY/MM/DD)" name="edit_batas_waktu">
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1 edit_nama_penerima-div">
                            <label for="" class="text-uppercase form-label">Nama Penerima</label>
                            <div class="input-set">
                                <i class='bx bx-rename'></i>
                            <input type="text" name="edit_nama_penerima" class="form-control" id="edit_nama_penerima"
                                placeholder="Masukan Nama Penerima">
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_tempat_simpan-div">
                            <label for="" class="text-uppercase form-label">Lokasi Penyimpanan</label>
                            <div class="input-set">
                                <i class='bx bx-map-pin'></i>
                            <input type="text" name="edit_tempat_simpan" class="form-control" id="edit_tempat_simpan"
                                placeholder="Masukan Lokasi Penyimpanan">
                            <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1 edit_selector_status-div">
                            <label for="" class="text-uppercase form-label">Status Barang</label>
                            <div class="input-set">
                                <i class='bx bx-info-circle'></i>
                            <select name="edit_status" class="form-select" id="edit_selector_status">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
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

<!-- MODAL EDIT END -->


<!-- call generic js file -->
<?php include "footerjs.php"?>
<script>
    $(document).ready(function () {
        $('.btn-edit').on('click', function () {
            // get data from button edit
            const id = $(this).data('idlogistik');
            const nama_barang = $(this).data('nama_barang');
            const jumlah = $(this).data('jumlah');
            const batas_waktu = $(this).data('waktu');
            const nama_penerima = $(this).data('penerima');
            const tempat_simpan = $(this).data('tempat');
            const status = $(this).data('status');

            // Set data to Form Edit
            $('#edit_idlogistik').val(id);
            $('#edit_nama_barang').val(nama_barang);
            $('#edit_jml_komponen').val(jumlah);
            $('#edit_batas_waktu').val(batas_waktu);
            $('#edit_nama_penerima').val(nama_penerima);
            $('#edit_tempat_simpan').val(tempat_simpan);
            $('#edit_selector_status').val(status);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    })
</script>

<?=$this->endSection();?>