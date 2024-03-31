<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<div class="card mt-4">
<<<<<<< Updated upstream
    <div class="card-header ">
        <div class="w-100 d-flex col-4 my-auto text-start">
            <!-- <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                    class='fs-4 bx bxs-briefcase-alt-2'></i>
            </div> -->
            <h4 class="d-flex ms-3 mt-2 poppins-bold mb-0 text-dark">Inventaris Gudang</h4>
=======

    <!-- CARD HEADER START -->
    <div class="card-header pe-0 ">
        <div class="row">
            <div class="col col-10 col-lg mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md"><i
                            class='fs-4 bx bxs-package'></i>
                    </div>
                    <h4 class="d-flex ms-3 mt-2 fw-bolder mb-0 text-dark">Inventaris Gudang</h4>
                </div>
            </div>
            <div class="col pe-0 d-flex  justify-content-lg-end justify-content-center">
                <div class="row w-100">
                    <div class="col px-0">
                        <div
                            class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                            <form action="" id="searchbar" method="GET">
                                <div class="input-group">
                                    <input type="text" id="searchbox" class="form-control" placeholder="Type here..."
                                        name="keyword">
                                    <button type="submit" class="searchicon px-3 py-auto btn m-0"><i
                                            class='text-white fs-6 bx bx-search'></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col pe-lg-0 me-lg-0 me-4">
                        <div class="dropdown h-100">
                        <button class="h-100 w-lg-75 w-100 my-auto dropdown-toggle btn btn-info ps-3 pe-2" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Show <?= $entries ?> Data
                                <span class="ms-2 me-0 pe-0"><i class='bx bxs-chevron-down'></i></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="text-dark text-center dropdown-item" href="/Gudang?entries=5">5 Data /
                                        Halaman</a></li>
                                <li><a class="text-dark text-center dropdown-item" href="/Gudang?entries=10">10 Data
                                        / Halaman</a></li>
                                <li><a class="text-dark text-center dropdown-item" href="/Gudang?entries=15">15 Data
                                        / Halaman</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
>>>>>>> Stashed changes
        </div>

    </div>
    <div class="card-body pt-0 mt-0">
        <div class="table-responsive p-0">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.
                        </th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.SPK</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Nama Barang</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Tanggal Sampai</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Status</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Nama Penerima</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Lokasi Penyimpanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="No" class="text-dark text-center">1</td>
                        <td data-label="No.SPK" class="text-dark text-center">PM240050</td>
                        <td data-label="Pengorder" class="text-dark text-center">Crank Shaft</td>
                        <td data-label="Batas Waktu" class="text-dark text-center">2024/03/19</td>
                        <td data-label="No" class="text-dark text-center">ADA</td>
                        <td data-label="No.SPK" class="text-dark text-center">Hafidz</td>
                        <td data-label="Pengorder" class="text-dark text-center">Rak A</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="fixed-plugin">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class=" fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<<<<<<< Updated upstream
=======
<!-- MODAL CREATE START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" action="/Gudang/createLogistik">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white fw-bolder modal-title" id="exampleModalLabel">Tambah Data Logistik</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.SPK</label>
                            <select name="no_spk" class="form-select" id="selector_spk">
                                <?php for ($i = 0; $i < sizeof($getSPKNumber); $i++) {?>
                                <option class="mb-1" value="<?=$getSPKNumber[$i]->no_spk?>">
                                    <?=$getSPKNumber[$i]->no_spk?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                placeholder="Masukan Nama Barang">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <input type="number" name="jml_komponen" class="form-control" id="jml_komponen"
                                placeholder="Masukan Jumlah Barang">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <input type="text" class="form-control dateselect" id="batas_waktu"
                                placeholder="Masukkan Tgl Batas Waktu (YYYY/MM/DD)" name="batas_waktu">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control" id="nama_penerima"
                                placeholder="Masukan Nama Penerima">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Lokasi Penyimpanan</label>
                            <input type="text" name="tempat_simpan" class="form-control" id="tempat_simpan"
                                placeholder="Masukan Lokasi Penyimpanan">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Status Barang</label>
                            <select name="status" class="form-select" id="selector_status">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                    <button type="button" class="btn btn-info" id="nextBtn">Next</button>
                    <!-- <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button> -->
                    <!-- <button type="submit" id="submitInput" name="submit" class="btn btn-info">Tambah</button> -->
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL CREATE END -->

<!-- MODAL DELETE START -->
<div class="modal fade" id="confirm-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-polman">
                <h5 class="modal-title text-white fw-bolder" id="myModalLabel">Konfirmasi Hapus Data</h5>
            </div>

            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini ?</p>
                <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DELETE END -->

<!-- MODAL EDIT START -->
<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" action="/Gudang/editLogistik">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white fw-bolder" id="">Info Logistik</h5>
                </div>
                <div class="modal-body">
                    <div class="tab_edit">
                        <input type="hidden" name="idlogistik" id="edit_idlogistik">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Barang</label>
                            <input type="text" name="edit_nama_barang" class="form-control" id="edit_nama_barang"
                                placeholder="Masukan Nama Barang" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <input type="number" name="edit_jml_komponen" class="form-control" id="edit_jml_komponen"
                                placeholder="Masukan Jumlah Barang" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <input type="text" class="form-control dateselect" id="edit_batas_waktu"
                                placeholder="Masukkan Tgl Batas Waktu (YYYY/MM/DD)" name="edit_batas_waktu" disabled>
                        </div>
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Penerima</label>
                            <input type="text" name="edit_nama_penerima" class="form-control" id="edit_nama_penerima"
                                placeholder="Masukan Nama Penerima" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Lokasi Penyimpanan</label>
                            <input type="text" name="edit_tempat_simpan" class="form-control" id="edit_tempat_simpan"
                                placeholder="Masukan Lokasi Penyimpanan" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Status Barang</label>
                            <select name="edit_status" class="form-select" id="edit_selector_status" disabled>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <p class="debug-url-edit"></p>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col text-start">
                            <button type="button" class="btn btn-warning btn-edit-allow">Edit</button>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-secondary" id="prevBtn_edit">Previous</button>
                            <button type="button" class="btn btn-info" id="nextBtn_edit">Next</button>
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
>>>>>>> Stashed changes

<?=$this->endSection();?>