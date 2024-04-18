<?php $this->extend("layout/template.php", $title);

$this->section('content');

?>

<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('validate_msg') ?>" class="data-valid d-none"> </div>

<div class="fab-container">
    <div class="fab shadow">
        <div class="fab-content">
            <i class='plus text-white fs-4 bx bx-plus'></i>
        </div>
    </div>
    <div class="sub-button shadow">
        <span class="badge badge-sm bg-info">Tambah Komponen</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class='fs-5 mt-1 text-white bx bxs-customize'></i>
        </a>
    </div>
    <div class="sub-button shadow">
        <span class="badge badge-sm bg-info">Tambah Permesinan</span>
        <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-delete">
            <i class='fs-5 mt-1 text-white bx bxs-wrench'></i>
        </a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-proses">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="row mx-0 w-100">
                    <div class="col ps-0 d-flex">
                        <div class="icon my-auto icon-shape bg-gradient-warning shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-pie-chart-alt-2'></i>
                        </div>
                        <div class="d-flex">
                            <h3 class="text-dark lh-1 ms-3 my-auto">Proses<br>
                                <span class="text-sm lh-1 text-dark text-start"> No.SPK :
                                    <?= $getSPK[0]->no_spk ?>
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="col-auto pe-0 my-auto">
                        <div class="row">
                            <div class="text-end text-lg-center">
                                <?php 
                                if(isset($getSPK[0]->gbr_kerja)) { 
                                    $valid = $getSPK[0]->gbr_kerja;
                                } else {
                                    $valid = "";
                                }
                                
                                if(!isset($getSPK[0]->gbr_kerja)) { 
                                    echo '<a id="btn-validate" class="text-wrap my-auto w-100 py-2 btn btn-info" href="#"
                                    data-bs-toggle="modal" data-bs-target="#validation_modal"
                                    data-href="/Proses/validateSPK/'.$getSPK[0]->id_spk.'"
                                    data-valid="'.$valid.'">Validasi</a>';
                                } 
                                else {
                                    echo '<a id="btn-validate" class="text-wrap my-auto w-100 py-2 btn btn-success"
                                    href="#" data-bs-toggle="modal"
                                    data-bs-target="#validation_modal"
                                    data-href="/Proses/validateSPK/'.$getSPK[0]->id_spk.'" 
                                    data-valid="'.$valid.'">Info Validasi</a>';
                                }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-end text-lg-center mt-3">
                                <div data-valid="<?=$valid?>" class="text-wrap status_validate">
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
        <div class="card mt-4">
            <div class="card-header pb-1 pe-0">
                <div class="row w-100">
                    <div class="col mb-lg-0 mb-3">
                        <div class="w-100 d-flex my-auto text-start">
                            <h5 class="d-flex ms-1 mt-lg-2 mb-0 text-dark">Tabel Data Proses</h5>
                        </div>
                    </div>
                    <div class="col col-lg-auto pe-0 d-flex justify-content-lg-end justify-content-center">
                        <div class="row w-100">
                            <div class="col px-0">
                                <div
                                    class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                                    <form action="" id="searchbar" method="GET">
                                        <div class="input-group">
                                            <input type="text" id="searchbox" class="form-control"
                                                placeholder="Type here..." name="keyword">
                                            <button anim="ripple" type="submit"
                                                class="searchicon px-3 py-auto btn m-0"><i
                                                    class='text-white fs-6 bx bx-search'></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="option-dropdown col-auto ps-0 pe-lg-0 me-lg-4">
                                <div class="btn-group dropstart">
                                    <button class="pt-2 ps-lg-0 ps-2 pe-0 btn btn-mesin" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                        <i class="text-dark fs-3 bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="py-1 text-center mb-0">
                                            <div class="btn-group dropstart">
                                                <a type="button" class="ps-0 text-dark text-center dropdown-item"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class='me-2 text-xxs bx bxs-left-arrow'></i>Data Per Halaman
                                                </a>
                                                <ul class="dropdown-menu sub-menu">
                                                    <li><a class="text-dark text-center dropdown-item"
                                                            href="?entries=5">5
                                                        </a></li>
                                                    <li><a class="text-dark text-center dropdown-item"
                                                            href="?entries=10">10
                                                        </a>
                                                    </li>
                                                    <li><a class="text-dark text-center dropdown-item"
                                                            href="?entries=15">15
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="py-1 mb-0">
                                            <a class="multiple-dlt-btn ps-0 text-dark text-center dropdown-item"
                                                href="#">
                                                Multiple Delete Selection</a></li>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="w-100 d-flex col-4 my-auto text-start">
                    <h4 class="d-flex ms-3 mt-2 fw-bolder mb-0 text-dark">Data Proses</h4>
                </div> -->
            </div>
            <div class="card-body pt-0 mt-0">
                <div class="table-responsive p-0">
                    <table class="table table-hover align-items-center">
                        <thead class="text-xs">
                            <tr>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    No.
                                </th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    Komponen</th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    No.Sec</th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    Permesinan</th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    No.Gambar</th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    Waktu(jam)</th>
                                <th class="text-uppercase text-center text-dark font-weight-bolder opacity-10">
                                    Status</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr>
                                <td data-label="No" class="text-dark text-center">1</td>
                                <td data-label="No.SPK" class="text-dark text-center">Pencekam Crank Shaft
                                </td>
                                <td data-label="Pengorder" class="text-dark text-center">1</td>
                                <td data-label="Batas Waktu" class="text-dark text-center">Milling</td>
                                <td data-label="No" class="text-dark text-center">G-0003</td>
                                <td data-label="No.SPK" class="text-dark text-center">5</td>
                                <td data-label="Pengorder" class="text-dark text-center">
                                    <span class="badge badge-sm bg-gradient-success">Selesai</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg mt-4 mt-lg-0">
        <div class="card h-100 z-index-2">
            <div class="card-header m-0 pb-0">
                <div class="w-100 my-auto text-center">
                    <h5 class="text-dark">Kemajuan Proses</h5>
                </div>
            </div>
            <div class="card-body mx-auto text-center py-auto">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="/Spk/createSPK">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white fw-bolder modal-title" id="exampleModalLabel">Tambah Komponen</h5>
                    <!-- <button type="button" class="text-white opacity-10 btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button> -->

                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Nama Komponen</label>
                        <input type="text" name="pengorder" class="form-control" id="pengorder">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" name="submit" class="btn btn-info">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-polman">
                <h5 class="modal-title text-white fw-bolder" id="myModalLabel">Tambah Permesinan</h5>
            </div>

            <div class="modal-body">
                <div class="mb-1">
                    <label for="" class="text-uppercase form-label">Nama Komponen</label>
                    <input type="text" name="pengorder" class="form-control" id="pengorder">
                </div>
                <div class="mb-1">
                    <label for="" class="text-uppercase form-label">Proses Permesinan</label>
                    <input type="text" name="pengorder" class="form-control" id="pengorder">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <a class="btn btn-info">Tambah</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VALIDATION START -->
<div class="modal fade" id="validation_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="validate-form" action="/Order/validateSPK">
            <div class="modal-content">
                <div class="modal-header bg-polman">
                    <h5 class="modal-title text-white fw-bolder" id="myModalLabel">Validasi</h5>
                </div>
                <div class="modal-body">
                    <p class="text-sm">Validasi diperlukan untuk melakukan ACC pada Project,
                        silahkan lampirkan link gambar kerja. Link dapat berupa link google drive.</p>
                    <div class="mb-1">
                        <label for="" class="text-uppercase form-label">Link Gambar Kerja</label>
                        <div class="input-group">
                            <input type="text" id="validation_input" class="form-control"
                                placeholder="Masukkan Link Gambar Kerja Disini" name="validation">
                            <a anim="ripple" target="_blank" href="" type="button"
                                class="arrowicon px-3 py-auto btn m-0"><i
                                    class='text-white fs-5 bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                        <p class="debug-url-valid"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col text-start">
                            <button anim="ripple" type="button" class="btn btn-warning btn-edit-valid">Edit</button>
                        </div>
                        <div class="col text-end">
                            <button anim="ripple" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Kembali</button>
                            <button anim="ripple" type="submit" name="submit"
                                class="btn btn-info btn-valid">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL VALIDATION END -->

<!-- call generic js file -->

<?php 

include "footerjs.php"

?>

<script src="/assets/js/plugins/chartjs.min.js"></script>
<script>
    let arrlength = $(".status_validate").data('valid').length;
    if (arrlength > 0) {
        $(".status_validate span").html("STATUS : TERVALIDASI").addClass('bg-gradient-success');

    } else {
        $(".status_validate span").html("STATUS : BELUM TERVALIDASI").addClass('bg-gradient-secondary');
    }

    // Creating response and call Sweet alert 
    const valid_response = $('.data-valid');
    response(valid_response, "Validasi Berhasil Ditambahkan", "Validasi Gagal Ditambahkan");

    $(document).ready(function () {
        //modal validation
        $('#validation_modal').on('show.bs.modal', function (e) {
            $(this).find('#validate-form').attr('action', $(e.relatedTarget).data('href'));
            if ($(e.relatedTarget).data('valid')) {
                $(".arrowicon").css('display', 'inline-block').attr('href', $(e
                    .relatedTarget).data(
                    'valid'));
                $(".btn-edit-valid").css('display', 'inline-block');
                $('#validation_input').val($(e.relatedTarget).data('valid')).prop(
                        'disabled', true)
                    .addClass('border-tb-none');
            } else {
                $(".arrowicon").css('display', 'none');
                $(".btn-edit-valid").css('display', 'none');
                $('#validation_input').val($(e.relatedTarget).data('valid')).prop(
                        'disabled', false)
                    .removeClass('border-tb-none');
            }
            //debugging url
            // $('.debug-url-valid').html('Delete URL: <strong>' + $(this).find('#validate-form').attr(
            //         'action') +
            //     '</strong>');
        });

        //button edit pada modal edit dan validasi
        $(".btn-edit-valid").click(function () {
            $('#validate-form').find(':input(:disabled)').prop('disabled', false);
        });
    });

    var ctx = document.getElementById("pieChart");
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>

<?=$this->endSection();?>