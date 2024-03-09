<?php $this->extend("layout/template.php", $title);

$this->section('content');

?>

<div class="row mt-4">
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="my-auto d-flex text-start">
                    <div class="icon my-auto icon-shape bg-gradient-warning shadow text-center border-radius-md">
                        <i class='fs-4 bx bxs-cart-alt'></i>
                    </div>
                    <div class="d-flex">
                        <h3 class="text-dark lh-1 ms-3 my-auto poppins-bold">Order<br>
                            <span class="text-sm lh-1 poppins-regular text-dark text-start"> No.SPK : PM2004.01
                            </span>
                        </h3>
                    </div>
                </div>
                <div class="row text-start mt-3">

                    <div class="col-lg-4 mb-lg-0 mb-3 text-start">
                        <button type="submit" name="submit" class="my-auto w-lg-100 py-2 btn btn-success">ACC
                            Project</button>
                    </div>
                    <div class="col text-start my-auto">
                        <span class="py-2 h-100 badge badge-sm bg-gradient-success">status : Tervalidasi</span>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">

            </div>
        </div>
    </div>
    <div class="col-lg-5 mt-4 mt-lg-0">
        <div class="card h-100 z-index-2">
            <div class="card-header mb-3 pb-0">
                <div class="my-auto text-center">
                    <!-- <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                        <i class='fs-4 bx bxs-calendar'></i>
                    </div> -->
                    <h3 class="text-dark text-center my-auto poppins-bold">Batas Waktu</h3>
                </div>
            </div>
            <div class="card-body text-center pt-0">
                <h3 class="text-dark">24/03/2024 | H-18</h3>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header ">
        <div class="w-100 d-flex col-4 my-auto text-start">
            <!-- <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                    class='fs-4 bx bxs-briefcase-alt-2'></i>
            </div> -->
            <h4 class="d-flex ms-3 mt-2 poppins-bold mb-0 text-dark">Data Order Logistik</h4>
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
                            Jumlah</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Nama Barang/Uraian/Ukuran</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Barang</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Gambar</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Tanggal Penerima</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Nama Penerima</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Berat(kg)</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Tanggal Pelaporan/Pembelian</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="No" class="text-dark text-center">1</td>
                        <td data-label="No.SPK" class="text-dark text-center">2</td>
                        <td data-label="Pengorder" class="text-dark text-center">Crank Shaft</td>
                        <td data-label="Batas Waktu" class="text-dark text-center">P-2340</td>
                        <td data-label="No" class="text-dark text-center">G-0002</td>
                        <td data-label="No.SPK" class="text-dark text-center">06/03/2024</td>
                        <td data-label="Pengorder" class="text-dark text-center">Hafidz</td>
                        <td data-label="Batas Waktu" class="text-dark text-center">0.5</td>
                        <td data-label="No" class="text-dark text-center">01/03/2024</td>
                        <td data-label="No.SPK" class="text-dark text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_info"
                                class="btn btn-edit btn-info">Edit</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-delete"
                                class="p-2 btn btn-danger">
                                <i class='fs-4 bx bxs-trash'></i></a>
                        </td>
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

<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="createOrder" action="">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white poppins-bold modal-title" id="exampleModalLabel">Tambah Order</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->

                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <input type="text" name="pengorder" class="form-control" id="pengorder">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal</label>
                            <input type="text" class="dateselect form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Unit Kerja</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <input type="text" class="dateselect form-control" id="">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Disetujui</label>
                            <input type="text" name="" class="form-control"
                                id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No. Pembebanan</label>
                            <input type="text" name="" class="form-control" id="">
                        </div>

                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Jumlah/Satuan</label>
                            <input type="number" name="" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Barang/Uraian/Ukuran</label>
                            <input type="text" name="" class="form-control" id="">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No. Barang</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No. Gambar</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Penerima</label>
                            <input type="text" class="dateselect form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Penerima</label>
                            <input type="text" class="form-control" id="">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Berat (Kg)</label>
                            <input type="number" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaporan/Pembelian</label>
                            <input type="text" class="dateselect form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Pelaksana Pesanan</label>
                            <input type="text" class="dateselect form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama & Paraf Pelaksana Pesanan</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Catatan</label>
                            <textarea class="form-control" id=""> </textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-secondary" id="prevBtn"
                        onclick="nextPrev(-1)">Previous</button>
                    <button type="button" class="btn btn-info" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-polman">
                <h5 class="modal-title text-white poppins-bold" id="myModalLabel">Konfirmasi Hapus Data</h5>
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

<div class="modal fade" id="modal_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="edit-form" action="">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white poppins-bold" id="">Edit Data Order</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Pemesan</label>
                        <input type="text" name="pengorder" class="form-control" id="pengorder">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Tanggal</label>
                        <input type="text" class="dateselect form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Unit Kerja</label>
                        <input type="text" class="form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Batas Waktu</label>
                        <input type="text" class="dateselect form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Disetujui</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">No. Pembebanan</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>

                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Jumlah/Satuan</label>
                        <input type="number" name="" class="form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Nama Barang/Uraian/Ukuran</label>
                        <input type="text" name="" class="form-control" id="">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">No. Barang</label>
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">No. Gambar</label>
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">Tanggal Penerima</label>
                                <input type="text" class="dateselect form-control" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">Nama & Paraf Penerima</label>
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Berat (Kg)</label>
                        <input type="number" class="form-control" id="">
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Tanggal Pelaporan/Pembelian</label>
                        <input type="text" class="dateselect form-control" id="">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">Tanggal Pelaksana Pesanan</label>
                                <input type="text" class="dateselect form-control" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-1">
                                <label for="" class="text-uppercase form-label">Nama & Paraf Pelaksana Pesanan</label>
                                <input type="text" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Catatan</label>
                        <textarea class="form-control" id=""> </textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-warning btn-edit-allow">Edit</button>
                    <!-- <a class="btn btn-info btn-edit-save">Simpan</a> -->
                    <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js
"></script>
<script src="/assets/js/myfunction.js"></script>

<script>

</script>
<?=$this->endSection();?>