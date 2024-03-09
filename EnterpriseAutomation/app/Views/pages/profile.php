<?php $this->extend("layout/template.php", $title);

$this->section('content');


?>
<div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('/assets/img/sampul.png'); background-position-y: 50%;">
    <span class="mask bg-polman opacity-5"></span>
</div>
<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
                <img src="/assets/img/profiles.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="profile_name poppins-bold mb-1">
                    PPC ME
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    Ketua PPC
                </p>
            </div>
        </div>
    </div>
</div>

<form method="POST" class="align-item-center mt-4" id="edit-form" action="/Spk/editSPK">
    <!-- <h5 class="modal-title text-dark poppins-bold" id="">Info Akun</h5> -->
    <div class="mb-1">
        <label for="" class="text-uppercase form-label">Nama</label>
        <input type="text" name="edit_pengorder" value="" class="form-control" id="edit_pengorder" disabled>
    </div>
    <div class="mb-1">
        <label for="" class="text-uppercase form-label">Password</label>
        <input type="password" class="form-control" id="edit_id_spk" name="edit_id_spk" disabled>
    </div>
    <div class="mb-1">
        <label for="" class="text-uppercase form-label">Role</label>
        <input type="text" id="edit_tgl_penyerahan" name="edit_tgl_penyerahan" class="dateselect3 form-control"
            disabled>
    </div>
    <div class="mt-3">
        <button type="button" class="btn me-3 btn-warning btn-edit-allow">Edit</button>
        <!-- <a class="btn btn-info btn-edit-save">Simpan</a> -->
        <button type="submit" name="submit" class="btn btn-info">Simpan</button>
    </div>

</form>
<?=$this->endSection();?>