<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');


?>

<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('input_msg') ?>" class="data-input d-none"> </div>
<div data-flash="<?= session()->getFlashdata('del_msg') ?>" class="data-delete d-none"> </div>
<div data-flash="<?= session()->getFlashdata('edit_msg') ?>" class="data-edit d-none"> </div>
<div data-flash="<?= session()->getFlashdata('validate_msg') ?>" class="data-valid d-none"> </div>

<div class="card mt-4">
    <div class="card-header pe-0">
        <div class="row">
            <div class="col col-10 col-lg mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                            class='fs-4 bx bxs-briefcase-alt-2'></i>
                    </div>
                    <h4 class="d-flex ms-3 mt-2 poppins-bold mb-0 text-dark">Data SPK</h4>
                </div>
            </div>
            <div class="col pe-0 d-flex  justify-content-lg-end justify-content-center">
                <div class="row">
                    <div class="col px-0">
                        <div
                            class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                            <form action="" id="searchbar" method="POST">
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
                    <div class="col">
                        <div class="dropdown h-100 w-0">
                            <button class="h-100 my-auto dropdown-toggle btn btn-info" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Show <?= $entries ?> Entries
                                <span class="ms-2 me-0 pe-0"><i class='bx bxs-chevron-down'></i></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="text-dark dropdown-item" href="/Spk?page=1&entries=5">5</a></li>
                                <li><a class="text-dark dropdown-item" href="/Spk?page=1&entries=10">10</a></li>
                                <li><a class="text-dark dropdown-item" href="/Spk?page=1&entries=15">15</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card-body pt-0 mt-0">
        <div class="table-responsive p-0">
            <table class="table align-items-center">
                <thead>
                    <tr>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">No.
                        </th>
                        <th
                            class="sticky-left text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.SPK</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Penawaran</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Order</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Pengorder</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Batas Waktu</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Validasi</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 + ($entries * ($current_page - 1)); foreach($getSPK as $dataSPK){?>
                    <tr>
                        <td data-label="No" class="text-dark text-center"><?= $no;?></td>
                        <td data-label="No.SPK" class="sticky-left text-dark text-center"><?= $dataSPK['no_spk'];?>
                        </td>
                        <td data-label="No.Penawaran" class=" text-dark text-center"><?= $dataSPK['no_penawar'];?></td>
                        <td data-label="No.Order" class=" text-dark text-center"><?= $dataSPK['no_order'];?></td>
                        <td data-label="Pengorder" class="text-dark text-center"><?= $dataSPK['pengorder'];?></td>
                        <td data-label="Batas Waktu" class="text-dark text-center"><?= $dataSPK['tgl_selesai'];?></td>
                        <td data-label="Validasi" class="text-dark text-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#validation_modal"
                                data-href="/Spk/validateSPK/<?= $dataSPK['id_spk'];?>">
                                <?php if(!isset($dataSPK['gbr_kerja'])) { ?>
                                <span class="badge badge-sm bg-gradient-secondary">BELUM ADA</span>
                                <?php } else { ?>
                                <span class="badge badge-sm bg-gradient-success">TERVALIDASI</span>
                                <?php } ?>
                            </a>
                        </td>
                        <td data-label="Aksi" class="text-dark text-center">
                            <a href="#" class="btn btn-edit btn-info" data-idspk="<?=$dataSPK['id_spk']?>"
                                data-nospk="<?=$dataSPK['no_spk']?>" data-pengorder="<?= $dataSPK['pengorder']?>"
                                data-tglsel="<?= $dataSPK['tgl_selesai']?>"
                                data-tglserah="<?= $dataSPK['tgl_penyerahan']?>"
                                data-namaprod="<?= $dataSPK['nama_produk']?>" data-jml="<?= $dataSPK['jml_pesanan']?>"
                                data-penawaran="<?= $dataSPK['no_penawar']?>" data-order="<?= $dataSPK['no_order']?>"
                                data-upm="<?= $dataSPK['tgl_upm']?>" data-href="/Spk/editSPK/">Info</a>
                            <a href="/order" class="btn btn-info">
                                Order</a>
                            <a href="/proses" class="btn btn-warning">
                                Proses</a>
                            <a href="#" data-href="/Spk/deleteSPK/<?=$dataSPK['id_spk']?>" data-bs-toggle="modal"
                                data-bs-target="#confirm-delete" class="p-2 btn btn-danger">
                                <i class='fs-4 bx bxs-trash'></i></a>

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

<div class="fixed-plugin">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class=" fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="tambahSPK" action="/Spk/createSPK">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white poppins-bold modal-title" id="exampleModalLabel">Tambah SPK</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Pemesan</label>
                            <input type="text" name="pengorder" class="form-control" id="pengorder"
                                placeholder="Masukan Nama Pemesan">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Pesanan (No.spk)</label>
                            <input type="text" class="form-control" id="no_spk" name="no_spk"
                                value="PM<?=substr(date("Y"), -2);?><?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>">
                        </div>

                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Penawaran</label>
                            <input type="text" class="form-control" id="no_penawar" name="no_penawar"
                                value="Q<?=substr(date("Y"), -2);?>.<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Order Pembelian</label>
                            <input type="text" class="form-control" id="no_order" name="no_order"
                                value="<?=str_pad(($latest_id), 4, '0', STR_PAD_LEFT);?>/PTR/II/<?=date("Y")?>">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Penyerahan</label>
                            <input type="text" name="tgl_penyerahan" class="dateselect form-control" id="tgl_penyerahan"
                                placeholder="Masukkan Tanggal Penyerahan (YYYY/MM/DD)">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <input type="text" name="tgl_selesai" class="dateselect form-control" id="tgl_selesai"
                                placeholder="Masukkan Batas Waktu (YYYY/MM/DD)">
                        </div>
                    </div>

                    <div class="tab">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk"
                                placeholder="Masukkan Nama produk">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <input type="number" name="jml_pesanan" class="form-control" id="jml_pesanan"
                                placeholder="Masukkan Jml Pesanan">
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Dikeluarkan UPM</label>
                            <input type="text" class="form-control dateselect" id="tgl_upm"
                                placeholder="Masukkan Tgl Dikeluarkan UPM (YYYY/MM/DD)" name="tgl_upm">
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
        <form method="POST" id="edit-form" action="/Spk/editSPK">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white poppins-bold" id="">Info SPK</h5>
                </div>
                <div class="modal-body">

                    <div class="tab_edit">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Pengorder</label>
                            <input type="text" name="edit_pengorder" value="" class="form-control" id="edit_pengorder"
                                disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Pesanan (No.SPK)</label>
                            <input type="text" class="form-control" id="edit_id_spk" name="edit_id_spk" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Penawaran</label>
                            <input type="text" class="form-control" id="edit_no_penawar" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">No.Order Pembelian</label>
                            <input type="text" class="form-control" id="edit_no_order" disabled>
                        </div>
                        <input type="hidden" name="idspk" id="idspk">
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Penyerahan</label>
                            <input type="text" id="edit_tgl_penyerahan" name="edit_tgl_penyerahan"
                                class="dateselect form-control" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Batas Waktu</label>
                            <input type="text" id="edit_tgl_selesai" name="edit_tgl_selesai"
                                class="dateselect form-control" disabled>
                        </div>
                    </div>

                    <div class="tab_edit">
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Nama Produk</label>
                            <input type="text" id="edit_nama_produk" name="edit_nama_produk" class="form-control"
                                disabled>
                        </div>

                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Jumlah</label>
                            <input type="number" id="edit_jml_pesanan" name="edit_jml_pesanan" class="form-control"
                                disabled>
                        </div>

                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Tanggal Dikeluarkan UPM</label>
                            <input type="text" class="dateselect form-control" id="edit_tgl_upm" name="edit_tgl_upm"
                                disabled>
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

<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="validate-form" action="/Spk/validateSPK">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white poppins-bold" id="myModalLabel">Validasi</h5>
                </div>

                <div class="modal-body">
                    <p class="text-sm">Validasi diperlukan untuk melakukan ACC pada Project,
                        silahkan lampirkan link gambar kerja</p>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Link Gambar Kerja</label>
                        <input type="text" class="form-control" id="" name="validation">
                        <p class="debug-url-valid"></p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" name="submit" class="btn btn-info btn-valid">Simpan</button>
                    <!-- <a class="btn btn-info btn-valid">Simpan</a> -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script src="/assets/js/myfunction.js"></script>

<script>
    const input_response = $('.data-input');
    const edit_response = $('.data-edit');
    const valid_response = $('.data-valid');
    const delete_response = $('.data-delete');

    response(input_response, "Data Berhasil Ditambahkan", "Data Gagal Ditambahkan");
    response(edit_response, "Data Berhasil Diedit", "Data Gagal Diedit");
    response(delete_response, "Data Berhasil Dihapus", "Data Gagal Dihapus");
    response(valid_response, "Validasi Berhasil Ditambahkan", "Validasi Gagal Ditambahkan");

    //modal delete
    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

            //debugging url
            // $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') +
            //     '</strong>');
        });

        $('#validation_modal').on('show.bs.modal', function (e) {
            $(this).find('#validate-form').attr('action', $(e.relatedTarget).data('href'));

            //debugging url
            // $('.debug-url-valid').html('Delete URL: <strong>' + $(this).find('#validate-form').attr(
            //         'action') +
            //     '</strong>');
        });

        $(".btn-edit-allow").click(function () {
            $('#edit-form').find(':input(:disabled)').prop('disabled', false);
        });

        $('#modal_info').on('hide.bs.modal', function (e) {
            $('#edit-form .modal-body').find(':input:not(:disabled)').prop('disabled', true);
        });

        //PASSING DATA FROM FRONTEND TO MODAL , SO CAN BE SENDED TO BACKEND
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
            $('#idspk').val(id);
            $('#edit_pengorder').val(pengorder);
            $('#edit_tgl_selesai').val(tglselesai);
            $('#edit_tgl_penyerahan').val(tglpenyerahan);
            $('#edit_nama_produk').val(nama);
            $('#edit_jml_pesanan').val(jml);
            $('#edit_no_penawar').val(penawar);
            $('#edit_no_order').val(order);
            $('#edit_tgl_upm').val(tglupm);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    });

    //MULTI STEP INPUT MODAL
    let currentInputTab = {
        nilai: 0
    };

    const tabInput = $(".tab")
    const tabInputLength = tabInput.length - 1;
    const prevBtnInput = $("#prevBtn");
    const nextBtnInput = $("#nextBtn");
    const forminput = $("#tambahSPK");
    const modalinput = "#createModal";

    showTab(currentInputTab, tabInput, tabInputLength, prevBtnInput, nextBtnInput);

    $('body').on('click', "#nextBtn", function () {
        nextPrev(1, tabInput, tabInputLength, currentInputTab, forminput, modalinput, prevBtnInput,
            nextBtnInput);
    });

    $('body').on('click', "#prevBtn", function () {
        nextPrev(-1, tabInput, tabInputLength, currentInputTab, forminput, modalinput, prevBtnInput,
            nextBtnInput);
    });

    //MULTI STEP EDIT MODAL
    let currentEditTab = {
        nilai: 0
    };

    const tabEdit = $(".tab_edit")
    const tabEditLength = tabEdit.length - 1;
    const prevBtnEdit = $("#prevBtn_edit");
    const nextBtnEdit = $("#nextBtn_edit");
    const formEdit = $("#edit-form");
    const modalEdit = "#modal_info";

    showTab(currentEditTab, tabEdit, tabEditLength, prevBtnEdit, nextBtnEdit);

    $('body').on('click', "#nextBtn_edit", function () {
        nextPrev(1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit);
    });

    $('body').on('click', "#prevBtn_edit", function () {
        nextPrev(-1, tabEdit, tabEditLength, currentEditTab, formEdit, modalEdit, prevBtnEdit, nextBtnEdit);
    });
</script>
<?=$this->endSection();?>