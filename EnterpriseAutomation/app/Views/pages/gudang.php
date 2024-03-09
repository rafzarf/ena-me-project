<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

?>

<div class="card mt-4">
    <div class="card-header ">
        <div class="w-100 d-flex col-4 my-auto text-start">
            <!-- <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                    class='fs-4 bx bxs-briefcase-alt-2'></i>
            </div> -->
            <h4 class="d-flex ms-3 mt-2 poppins-bold mb-0 text-dark">Inventaris Gudang</h4>
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


<?=$this->endSection();?>