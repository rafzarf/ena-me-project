<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<!-- FLOATING ACTION BUTTON START -->
<div class="fab-container">
    <div class="fab shadow">
        <div class="fab-content">
            <i class='plus text-white fs-4 bx bx-plus'></i>
        </div>
    </div>
    <div class="sub-button shadow">
        <span class="badge shadow badge-sm bg-info">Tambah Mesin</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class='fs-5 mt-1 text-white bx bxs-chip'></i>
        </a>
    </div>
    <div class="sub-button shadow">
        <span class="badge shadow badge-sm bg-info">Tambah No Mesin</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createModalType">
            <i class='fs-5 mt-1 text-white bx bxs-cog'></i>
        </a>
    </div>
</div>
<!-- FLOATING ACTION BUTTON END -->

<!-- MAIN CONTENT START -->
<div class="card mt-4 p-2">
    <?php
// A counter which is incremented by one for each product row
// in the loop below.
$i = 0;

echo "<div class='table-responsive'>\n";
echo "<table class='table table-mesin table-borderless align-items-center mb-0'>\n";
echo "<tr>\n";

foreach($DataMesin as $Mesin){
    if ($i++ % 3 == 0) {
        echo "</tr><tr>\n";
    }
    
    $img_src = htmlspecialchars($Mesin->gambar_mesin);

    echo'<td>
        <div class="rounded-3 pb-0 h-100">
            <div class="card h-100 w-100">';
    if ($img_src != null) {
        echo '<div class="card-body p-0 bg-polman cardBackground"
            style="background-image: url(/assets/img/'.$img_src.');">';
    } else {
        echo '<div class="card-body p-0 rounded-3 bg-gradient-info cardBackground">';
    }

    echo '
                    <div class="overlay px-1 py-3 m-0">
                        <div class="row">
                            <div class="col text-start">
                                <h5 class="fs-3 text-wrap mx-3 card-title fw-bolder text-white">'.$Mesin->nama_mesin.'</h5>
                            </div>
                            <div class="col-3 text-end">
                                <div class="btn-group dropstart">
                                <button class="btn btn-mesin" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" data-boundary="window">
                                    <i class="fs-5 bx bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu position-fixed dropdown-menu-right p-1">
                                    <li class="mb-0">
                                        <a href="#" class="btn-edit dropdown-item"
                                            data-id_mesin="'.$Mesin->id_mesin.'"
                                            data-nama_mesin="'.$Mesin->nama_mesin.'"
                                            data-gambar_mesin="'.$Mesin->gambar_mesin.'"
                                            data-href="/Permesinan/editMesin/">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class="fs-4 text-center bx bxs-info-circle 
                                            btn bg-gradient-info px-2 py-1"></i>
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
                                        <a href="#" data-href="/Permesinan/deleteMesin/'.$Mesin->id_mesin.'"
                                            data-bs-toggle="modal" data-bs-target="#confirm-delete"
                                            class="dropdown-item">
                                            <div class="row mt-2">
                                                <div class="col-auto">
                                                    <i class="fs-4 bx bxs-trash px-2 py-1 btn bg-gradient-danger"></i>
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
                        </div>
                    </div>
                        <div class="h-60 d-flex align-items-end">
                            <button anim="ripple" class="d-flex justify-content-start ms-3 mt-1 btn btn-info"> 
                            <span class="d-flex"><p class="text-xs my-auto fw-bold">Lihat Proses</p><i class="d-flex fs-5 ms-2 bx bx-right-arrow-alt"></i> </span</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>';
}
while ($i++ % 3 != 0) {
    echo "<td></td>\n";
}
echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";
?>
</div>
<!-- MAIN CONTENT END -->

<!-- MODAL CREATE MESIN START -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" action="/Permesinan/createMesin" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white fw-bolder modal-title" id="exampleModalLabel">Tambah Data Mesin</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Nama Mesin</label>
                        <input type="text" name="nama_mesin" class="form-control" id="nama_mesin"
                            placeholder="Masukan Nama Mesin">
                    </div>
                    <div class="mb-1">
                        <label for="formFile" class="text-uppercase form-label">Upload Gambar Mesin</label>
                        <input class="form-control" type="file" id="gambar_mesin" name="gambar_mesin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="submitInput" name="submit" class="btn btn-info">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL CREATE MESIN END -->

<!-- MODAL CREATE TYPE MESIN START -->
<div class="modal fade" id="createModalType" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="create-form" action="/Permesinan/createTypeMesin">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white fw-bolder modal-title" id="exampleModalLabel">Tambah Data Tipe Mesin</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Nama Mesin</label>
                        <select name="nama_mesin_select" class="form-select" id="nama_mesin_select">
                            <?php for ($i = 0; $i < sizeof($DataMesin); $i++) {?>
                            <option class="mb-1" value="<?=$DataMesin[$i]->nama_mesin?>">
                                <?=$DataMesin[$i]->nama_mesin?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Tipe Mesin</label>
                        <input type="text" name="no_mesin" class="form-control" id="no_mesin"
                            placeholder="Masukan Tipe / No Mesin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" id="submitInput" name="submit" class="btn btn-info">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL CREATE TYPE MESIN END -->

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
        <form method="POST" id="edit-form" action="/Permesinan/editMesin" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white fw-bolder" id="">Info Mesin</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit_id_mesin" id="edit_id_mesin">
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Nama Mesin</label>
                        <input type="text" name="edit_nama_mesin" class="form-control" 
                        id="edit_nama_mesin" placeholder="Masukan Nama Mesin" disabled>
                    </div>
                    <div class="mb-1">
                        <label class="text-uppercase form-label">Upload Gambar Mesin</label>
                        <input class="form-control" type="file" id="edit_gambar_mesin" name="gambar_mesin" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col text-start">
                            <button type="button" class="btn btn-warning btn-edit-allow">Edit</button>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" id="" name="submit" class="btn btn-info">Simpan</button>
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
            const id_mesin = $(this).data('id_mesin');
            const nama_mesin = $(this).data('nama_mesin');

            // Set data to Form Edit
            $('#edit_id_mesin').val(id_mesin);
            $('#edit_nama_mesin').val(nama_mesin);

            // Call Modal Edit
            $('#modal_info').modal('show');
        });
    })
</script>

<?=$this->endSection();?>