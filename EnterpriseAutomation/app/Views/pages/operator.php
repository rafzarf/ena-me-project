<?php

use App\Controllers\Permesinan;

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>
<!-- PASSING FLASH DATA FOR SWEETALERT2 -->
<div data-flash="<?= session()->getFlashdata('worker_msg') ?>" class="data-worker d-none"> </div>
<div data-flash="<?= session()->getFlashdata('start_msg') ?>" class="data-start d-none"> </div>
<div data-flash="<?= session()->getFlashdata('stop_msg') ?>" class="data-stop d-none"> </div>

<!-- MODAL WORKER START -->
<div class="modal fade" id="worker_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="worker_form" action="<?= base_url()."Permesinan/SaveWorker"?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">Pilih Pelaksana</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-none">ID Worker : <?=session()->get('id_worker')?></p>
                    <p>Nama Pengguna :<?=session()->get('Name')?></p>
                    <p>Role:<?=session()->get('Role')?></p>
                    <input type="hidden" name="id_worker" id="id_worker" value="<?=session()->get('id_worker')?>">
                    <input type="hidden" name="name" id="name" value="<?=session()->get('Name')?>">
                    <input type="hidden" name="role" id="role" value="<?=session()->get('Role')?>">
                    <input type="hidden" name="id_pengerjaan" id="id_pengerjaan">
                </div>
                <div class="modal-footer">
                    <button type="submit" anim="ripple" class="text-sm btn btn-info m-0">Pilih Pelaksana</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL WORKER END -->

<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 d-flex my-auto text-start">
                    <h5 class="d-flex ms-1 mt-2 mb-0 text-dark"><?=$mesin?> - <?=$no_spk?></h5>
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
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=6">6
                                                </a></li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=9">9
                                                </a>
                                            </li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=12">12
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0 mt-0">

        <?php
$i = 0;

echo "<div class='table-responsive'>\n";
echo "<table class='table table-operator table-mesin table-borderless align-items-center mb-0'>\n";
echo "<tr>\n";

foreach($getPengerjaan as $dataPengerjaan){
    if ($i++ % 2 == 0) {
        echo "</tr><tr>\n";
    }
        echo'<td class="">
        <div class="rounded-3 pb-0 h-100">
            <div class="card h-100 w-100">
                <div class="card-body p-4 rounded-3 operator-menu bg-light cardBackground">
                    <div class="row w-100 mx-0">
                        <div class="col text-wrap">
                            <p class="mb-0 fw-bold">  <span class="text-xs mb-2 badge badge-sm bg-gradient-polman"> '.$dataPengerjaan["no_spk"].'</span> </p>
                            <h5 class="mb-0  text-dark fw-bolder"> '.$dataPengerjaan['nama_komponen'].'</h5>
                            <p class="mb-0 text-dark"> Nama Produk : '.$dataPengerjaan["nama_produk"].'</p>
                            <p class="mb-0 text-dark"> Kode Mesin : '.$dataPengerjaan["no_mesin"].'</p>
                            <p class="mb-0  text-dark"> Jumlah : '.$dataPengerjaan['jml_barang'].'</p>
                            <p class="mb-0 text-dark"> Durasi Waktu : '.$dataPengerjaan['wkt_pengerjaan'].' jam </p>
                            <button data-id="'.$dataPengerjaan['id_pengerjaan'].'" class="btn btn-worker btn-mesin p-0 mb-0 text-dark';
                            if($dataPengerjaan['pelaksana']) { echo '" disabled><span class="mt-2 badge text-xs badge-sm bg-gradient-success"> Pelaksana : '.$dataPengerjaan['pelaksana']; } else {
                                echo '"><span class="mt-2 badge text-xs badge-sm bg-gradient-secondary">'."Pilih Pelaksana";
                            }
                        echo '</span></button>
                        </div>
                        <div class="col-auto my-auto">
                            <ul class="list-unstyled mb-0">
                                <li><button type="button" class="text-uppercase my-2 w-100 btn disabled btn-status ';
                                if($dataPengerjaan['status'] == "Menunggu") { echo 'btn-info';} else if($dataPengerjaan['status'] == "Diproses") { echo "btn-warning";} 
                                else if($dataPengerjaan['status'] == "Selesai") { echo "btn-success";}
                                echo '">'.$dataPengerjaan['status'].'</button></li>
                                <form method="post" id="start_machining_form" action="'.base_url()."Permesinan/StartMachining".'">
                                <?=csrf_field()?>
                                <input type="hidden" name="id_start" id="id_start" value="'.$dataPengerjaan['id_pengerjaan'].'">
                                <input type="hidden" name="no_spk" id="no_spk" value="'.$dataPengerjaan['no_spk'].'">
                                <input type="hidden" name="id_proses_start" id="id_proses_start" value="'.$dataPengerjaan['id_prosesstart'].'">
                                <input type="hidden" name="status" id="status" value="Diproses">
                                <li><button type="submit" class="text-uppercase my-2 w-100 btn btn-polman btn-start ';
                                if($dataPengerjaan['status'] == "Diproses" || $dataPengerjaan['status'] == "Selesai" || !$dataPengerjaan['pelaksana']) { echo 'disabled';} 
                                echo '">Mulai</button></li>
                                </form>

                                <form method="post" id="stop_machining_form" action="'.base_url()." Permesinan/StopMachining".'">
                                <?=csrf_field()?> 
                                <input type="hidden" name="id_stop" id="id_stop" value="'.$dataPengerjaan['id_pengerjaan'].'">
                                <input type="hidden" name="id_proses_stop" id="id_proses_stop" value="'.$dataPengerjaan['id_prosesstart'].'">
                                <input type="hidden" name="status" id="status" value="Selesai">
                                <input type="hidden" name="nama_mesin" id="nama_mesin" value="'.$dataPengerjaan['nama_mesin'].'">
                                <li><button type="submit" class="text-uppercase my-2 w-100 btn btn-danger btn-stop ';
                                if($dataPengerjaan['status'] == "Menunggu" || $dataPengerjaan['status'] == "Selesai") { echo 'disabled';} 
                                echo '">Stop</button></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>' ; } while ($i++ % 2 !=0) { echo "<td></td>\n" ; } echo "</tr>\n" ; echo "</table>\n" ; echo "</div>\n" ; ?>
                    <div class="mt-4">
                        <?= $pager->links() ?>
                    </div>
    </div>
</div>

<?php 

include "footerjs.php"

?>
<script>
    $(document).ready(function () {
        $('.btn-worker').on('click', function () {
            const id = $(this).data('id');
            $('#id_pengerjaan').val(id);
            $('#worker_modal').modal('show');
        });
    })

    // Creating response and call Sweet alert 
    const worker = $('.data-worker');
    response(worker, "Pelaksana Sukses Ditambahkan", "Pelaksana Gagal Ditambahkan");
    const start = $('.data-start');
    response(start, "Proses Machining Dimulai", "Proses Machining Gagal");
    const stop = $('.data-stop');
    response(stop, "Proses Machining Selesai", "Proses Machining Gagal");
</script>
<?=$this->endSection();?>