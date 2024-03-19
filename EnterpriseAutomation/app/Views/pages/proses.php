<?php $this->extend("layout/template.php", $title);

$this->section('content');

?>
<div class="fab-container">
    <div class="fab shadow">
        <div class="fab-content">
            <i class='text-white fs-4 bx bx-plus'></i>
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
    <div class="col-lg-7">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <div class="my-auto d-flex text-start">
                    <div class="icon my-auto icon-shape bg-gradient-warning shadow text-center border-radius-md">
                        <i class='fs-4 bx bxs-pie-chart-alt-2'></i>
                    </div>
                    <div class="d-flex">
                        <h3 class="text-dark lh-1 ms-3 my-auto poppins-bold">Proses<br>
                            <span class="text-sm lh-1 poppins-regular text-dark text-start"> No.SPK : <?= $getSPK[0]->no_spk ?>
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
            <div class="card-header m-0 pb-0">
                <div class="my-auto text-center">
                    <!-- <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                        <i class='fs-4 bx bxs-calendar'></i>
                    </div> -->
                    <!-- <h3 class="text-dark text-center my-auto poppins-bold">Progress</h3> -->
                </div>
            </div>
            <div class="card-body mx-auto text-center pt-0">
                <div class="progress-halfcircle w-100">
                    <div class="barOverflow">
                        <div class="bar"></div>
                        <h4 class="text-dark text-center mt-5 poppins-bold">Progress</h4>
                        <span class="text-dark">100%</span>
                    </div>

                </div>
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
            <h4 class="d-flex ms-3 mt-2 poppins-bold mb-0 text-dark">Data Proses</h4>
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
                            Komponen</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Sec</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Permesinan</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            No.Gambar</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Waktu(jam)</th>
                        <th class="text-uppercase text-center text-sm text-dark font-weight-bolder opacity-10">
                            Status</th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="No" class="text-dark text-center">1</td>
                        <td data-label="No.SPK" class="text-dark text-center">Pencekam Crank Shaft</td>
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


<!-- <div class="fixed-plugin">
    <a data-bs-toggle="modal" data-bs-target="#createModal"
        class=" fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class='fs-4 bx bx-plus py-2'></i>
    </a>
</div> -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="/Spk/createSPK">
            <div class="modal-content">
                <div class="bg-polman modal-header">
                    <h5 class="text-white poppins-bold modal-title" id="exampleModalLabel">Tambah Komponen</h5>
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
                <h5 class="modal-title text-white poppins-bold" id="myModalLabel">Tambah Permesinan</h5>
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


<?=$this->endSection();?>