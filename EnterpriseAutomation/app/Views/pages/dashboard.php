<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

$role = (object) [
    "admin" => (object) [
        "Kajur" => "Kajur", 
        "Sekjur" => "Sekjur",
        "Kappc" => "Kappc",
        "Superuser" => "Superuser",
    ]
];
$currentRole = session()->get('Role');


foreach($dataGrafik as $data) {
    $mesin[] = $data->nama_mesin;
    $jam[] = $data->total_jam;
}

?><div class="mt-5">
    <!-- < !-- inner section -->

    <input type="hidden" class="googledata" data-client="<?=$gcalData[0]['CLIENT_ID']?>"
        data-api="<?=$gcalData[0]['API_KEY']?>" data-gcal="<?=$gcalData[0]['GCAL_ID']?>">

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize fw-bold">Jumlah SPK Aktif</p>
                                <h5 class="text-dark poppins-bold mb-0"><?=$sedang_diproses?></h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-briefcase-alt-2'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah SPK Selesai</p>
                                <h5 class="text-dark poppins-bold mb-0"><?= $selesai ?></h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-badge-check'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Progress <br>Order</p>
                                <h5 class="text-dark poppins-bold mb-0"><?=$progress_order?></h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md"><i
                                    class='fs-4 bx bxs-pie-chart'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="row m-auto">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Proses Keseluruhan</p>
                                <h5 class="text-dark poppins-bold mb-0"><?=$proses_keseluruhan?> </h5>
                            </div>
                        </div>
                        <div class="col-4 d-lg-block d-flex my-auto justify-content-end text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                                <i class='fs-4 bx bxs-hard-hat'></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7">
            <div class="card bg-gradient-dark z-index-2">
                <div class="card-body p-4">
                    <div class="my-auto text-start">
                        <h6 class="text-white badge bg-gradient-secondary my-auto poppins-bold">
                            Jumlah Jam Permesinan</h6>
                    </div>
                    <div id="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mt-4 mt-lg-0">
            <div class="card h-100 z-index-2">
                <div class="card-header mb-3 pb-0">
                    <div class="my-auto text-start d-flex">
                        <!-- <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                            <i class='fs-4 bx bxs-calendar'></i>
                        </div> -->
                        <div class="row mx-0 w-100">
                            <div class="col-auto px-0 text-start">
                                <h6 class="text-white d-flex badge bg-gradient-polman my-auto poppins-bold">Scheduling
                                    Calendar</h6>
                            </div>
                            <div class="col px-0 text-end">
                                <div class="btn-group dropstart
                                <?php
                                if(!property_exists($role->admin, $currentRole)) echo "d-none";
                                ?>">
                                    <button class="p-0 my-auto btn btn-mesin" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-boundary="window">
                                        <i class="fs-5 text-dark bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu position-fixed dropdown-menu-right pb-3 p-1">
                                        <li class="mb-0">
                                            <a data-bs-toggle="modal" data-bs-target="#createEvent"
                                                class="btn-edit dropdown-item ">
                                                <div class="row mt-2">
                                                    <div class="col-auto">
                                                        <i class="fs-4 text-center bx bxs-calendar-plus 
                                            btn bg-gradient-info px-2 py-1"></i>
                                                    </div>
                                                    <div class="col-8 ps-0 text-wrap">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm text-dark fw-bold mb-1">
                                                                Tambah Schedule
                                                            </h6>
                                                            <p class="text-xs text-wob text-dark mb-0 ">
                                                                Tambah Schedule
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-0">
                                            <a data-bs-toggle="modal" data-bs-target="#createModal"
                                                class="dropdown-item">
                                                <div class="row mt-2">
                                                    <div class="col-auto">
                                                        <i
                                                            class="fs-4 bx bxs-cog px-2 py-1 btn bg-gradient-secondary"></i>
                                                    </div>
                                                    <div class="col-8 ps-0 text-wrap">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="text-sm text-dark fw-bold mb-1">
                                                                Konfigurasi
                                                            </h6>
                                                            <p class="text-xs text-wob text-dark mb-0 ">
                                                                Atur Konfigurasi Kalender
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
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <!-- < !-- inner section end here -->
</div>

<!-- MODAL INFO CALENDAR -->
<div class="modal fade" id="calendar_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <div class="row w-100 mx-0">
                    <div class="col">
                        <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">
                        </h5>
                    </div>
                    <div class="col-auto">
                        <a href="" target="_blank" class="btn btn-gcal btn-close-modal">
                            <i class='text-dark fs-6 bx bx-link-external'></i>
                        </a>
                    </div>
                    <div class="col-auto pe-0">
                        <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                            <i class='text-dark fs-4 bx bx-x'></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row w-100 mx-0">
                    <div class="col-auto my-auto">
                        <i class='bx d-flex fs-5 bx-calendar-event'></i>
                    </div>
                    <div class="col">
                        <h5 class="mb-1 event-title text-dark fw-bolder" id="">Nama Event</h5>
                        <p class="mb-0 event-date text-sm text-dark" id="">
                            <span class="datestart">Date</span><span class="start"></span> - <span
                                class="dateend">Date</span><span class="end"></span>
                        </p>
                    </div>
                </div>
                <div class="row w-100 mt-3 mx-0">
                    <div class="col-auto my-auto">
                        <i class='bx bx-signal-4 fs-5 bx-notepad'></i>
                    </div>
                    <div class="col">
                        <p class="mb-0 text-sm text-info fw-bolder " id="">Description</p>
                        <p class="mb-0 event-desc text-sm text-dark" id="">Tidak Ada Deskripsi</p>
                    </div>
                </div>
                <div class="row w-100 mt-3 mx-0">
                    <div class="col-auto my-auto">
                        <i class='bx d-flex fs-5 bx-map'></i>
                    </div>
                    <div class="col">
                        <p class="mb-0 text-sm text-info fw-bolder " id="">Location</p>
                        <p class="mb-0 event-loc text-sm text-dark" id="">Tidak Ada Detail Lokasi</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- MODAL CALENDAR CONFIG -->
<div class="modal fade createKey" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="create-form" data-url="<?=base_url().'Dashboard/insertConfigCalendar'?>">
            <?=csrf_field()?>
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">Google Calendar Configuration</h5>
                    <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                        <i class='text-dark fs-4 bx bx-x'></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <div id="carousel1" data-bs-wrap="false" class="px-0 carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="bg-polman text-white p-3 rounded-2 text-sm">
                                        <span class="fs-5 fw-bolder">Enable API</span><br>
                                        Sebelum menggunakan Google API, user perlu menyalakan API pada
                                        Google Cloud
                                        Project. <br> Di konsol Google Cloud, aktifkan API Google Kalender.
                                        <br>
                                        <span class=""><a anim="ripple"
                                                href="https://console.cloud.google.com/flows/enableapi?apiid=calendar-json.googleapis.com"
                                                class="btn mt-3 text-uppercase m-0 btn-light" id="">Enable
                                                API</a></span>
                                    </p>
                                    <img src="/assets/img/apienable.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <p class="bg-polman text-white p-3 rounded-2 text-sm">
                                        <span class="fs-5 fw-bolder">Configure OAuth</span><br>
                                        Jika Anda menggunakan proyek Google Cloud baru untuk menyelesaikan mulai
                                        cepat ini, konfigurasikan layar izin OAuth dan tambahkan diri Anda
                                        sebagai pengguna uji.
                                        Untuk Tipe pengguna pilih Internal, lalu klik Buat.
                                        <br>
                                        <span class=""><a anim="ripple"
                                                href="https://console.cloud.google.com/apis/credentials/consent"
                                                class="btn mt-3 text-uppercase m-0 btn-light" id="">
                                                Setting OAuth Consent</a></span>
                                    </p>
                                    <img src="/assets/img/oauth.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <p class="bg-polman text-white p-3 rounded-2 text-sm">
                                        <span class="fs-5 fw-bolder">Authorize credentials</span><br>
                                        Untuk mengautentikasi pengguna akhir dan mengakses data pengguna di
                                        aplikasi, Anda perlu membuat satu atau beberapa ID Klien OAuth 2.0. ID
                                        klien digunakan untuk mengidentifikasi satu aplikasi ke server OAuth
                                        Google.
                                        <br>
                                        <span class=""><a anim="ripple"
                                                href="https://console.cloud.google.com/apis/credentials"
                                                class="btn mt-3 text-uppercase m-0 btn-light" id="">
                                                Go To Credentials</a></span>
                                    </p>
                                    <img src="/assets/img/cred1.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/cred2.png" class="rounded-2 d-block w-100" alt="...">
                                    <img src="/assets/img/cred3.png" class="mt-2 rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/cred4.png" class="my-2 rounded-2 d-block w-100" alt="...">
                                    <div class="mb-1 clientid-div">
                                        <label for="" class="text-uppercase form-label">OAuth/ClientID</label>
                                        <div class="input-set px-1">
                                            <i class='bx bx-key'></i>
                                            <input type="text" name="clientid" class="form-control" id="clientid"
                                                placeholder="Masukan Client ID key" autofocus>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-3 mx-0">
                                <div class="col p-0">
                                    <div class="carousel-indicators m-0">
                                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="4"
                                            aria-label="Slide 5"></button>
                                    </div>
                                </div>
                                <div class="col-auto pe-3 p-0">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                                        data-bs-slide="prev">
                                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-left-arrow-alt'></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>
                                <div class="col-auto p-0">
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                                        data-bs-slide="next">
                                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-right-arrow-alt'></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div id="carousel2" data-bs-wrap="false" class="px-0 carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="bg-polman text-white p-3 rounded-2 text-sm">
                                        <span class="fs-5 fw-bolder">Create an API key</span><br>
                                        API Key digunakan untuk mendapatkan data dari google calendar.
                                        Click Create credentials > API key.
                                        <br>
                                        <span class=""><a anim="ripple"
                                                href="https://console.cloud.google.com/apis/credentials"
                                                class="btn mt-3 text-uppercase m-0 btn-light" id="">Create API
                                                Key</a></span>
                                    </p>
                                    <img src="/assets/img/api1.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/api2-2.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/api2.png" class="mt-2 rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/api3.png" class="mt-2 rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/api4.png" class="my-2 rounded-2 d-block w-100" alt="...">
                                    <div class="mb-1 apikey-div">
                                        <label for="" class="text-uppercase form-label">API KEY</label>
                                        <div class="input-set px-1">
                                            <i class='bx bx-key'></i>
                                            <input type="text" name="apikey" class="form-control" id="apikey"
                                                placeholder="Masukan API key" autofocus>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-3 mx-0">
                                <div class="col p-0">
                                    <div class="carousel-indicators m-0">
                                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="3"
                                            aria-label="Slide 4"></button>
                                        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="4"
                                            aria-label="Slide 5"></button>
                                    </div>
                                </div>
                                <div class="col-auto pe-3 p-0">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                                        data-bs-slide="prev">
                                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-left-arrow-alt'></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>
                                <div class="col-auto p-0">
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                                        data-bs-slide="next">
                                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-right-arrow-alt'></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div id="carousel3" data-bs-wrap="false" class="px-0 carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="bg-polman text-white p-3 rounded-2 text-sm">
                                        <span class="fs-5 fw-bolder">Create Google Calendar ID</span><br>
                                        Untuk dapat menampilkan dan melakukan sinkronisasi Google Calendar memerlukan
                                        Google Calendar ID, yang didapatkan dari pembuatan event khusus pada Google
                                        Calendar.
                                        <br>
                                        <span class=""><a anim="ripple" href="https://calendar.google.com/calendar/"
                                                class="btn mt-3 text-uppercase m-0 btn-light" id="">Create
                                                Calendar</a></span>
                                    </p>
                                    <img src="/assets/img/gcal1.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/gcal2.png" class="rounded-2 d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="/assets/img/gcal3.png" class="my-2 rounded-2 d-block w-100" alt="...">
                                    <img src="/assets/img/gcal4.png" class="my-2 rounded-2 d-block w-100" alt="...">
                                    <div class="mb-1 gcalid-div">
                                        <label for="" class="text-uppercase form-label">Google Calendar ID</label>
                                        <div class="input-set px-1">
                                            <i class='bx bx-key'></i>
                                            <input type="text" name="gcalid" class="form-control" id="gcalid"
                                                placeholder="Masukan Google Calendar ID" autofocus>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row w-100 mt-3 mx-0">
                                <div class="col p-0">
                                    <div class="carousel-indicators m-0">
                                        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                    </div>
                                </div>
                                <div class="col-auto pe-3 p-0">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3"
                                        data-bs-slide="prev">
                                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-left-arrow-alt'></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                </div>
                                <div class="col-auto p-0">
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3"
                                        data-bs-slide="next">
                                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                                        <i class='fs-4 rounded-3 bg-light text-dark bx bx-right-arrow-alt'></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0">
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

<!-- CREATE EVENT MODAL -->
<div class="modal fade" id="createEvent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="modal-header">
                <div class="row w-100 mx-0">
                    <div class="col ps-0">
                        <h5 class="modal-title text-dark fw-bolder" id="myModalLabel">Create Scheduling Event
                        </h5>
                    </div>
                    <div class="col-auto pe-0">
                        <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">
                            <i class='text-dark fs-4 bx bx-x'></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body pt-0">
                <form id="event_form">
                    <?=csrf_field()?>
                    <fieldset>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Event Title</label>
                            <div class="input-set">
                                <i class='bx bx-calendar-event'></i>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Masukkan Judul Event">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Location</label>
                            <div class="input-set">
                                <i class='bx bx-map'></i>
                                <input type="text" name="loc" class="form-control" id="loc"
                                    placeholder="Masukkan Lokasi">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="text-uppercase form-label">Tanggal Mulai</label>
                                    <div class="input-set">
                                        <i class='bx bx-calendar'></i>
                                        <input type="text" name="dateStart" class="dateselect form-control"
                                            id="dateStart" placeholder="Tanggal Mulai">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="text-uppercase form-label">Tanggal Selesai</label>
                                    <div class="input-set">
                                        <i class='bx bx-calendar'></i>
                                        <input type="text" name="dateEnd" class="dateselect form-control" id="dateEnd"
                                            placeholder="Tanggal Selesai">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="text-uppercase form-label">Start Time</label>
                                    <div class="input-set">
                                        <i class='bx bx-time-five'></i>
                                        <input type="text" name="st" id="st" class="form-control timePicker"
                                            placeholder="Waktu Mulai">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="text-uppercase form-label">End Time</label>
                                    <div class="input-set">
                                        <i class='bx bx-time-five'></i>
                                        <input type="text" name="et" id="et" class="form-control timePicker"
                                            placeholder="Waktu Selesai">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="" class="text-uppercase form-label">Description</label>
                            <textarea type="text" name="desc" class="form-control" id="desc"
                                placeholder="Masukkan Deskripsi Event"></textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer p-0">
                <div class="row w-100 mx-0">
                    <div class="col text-start">
                        <button type="button" class="btn text-sm btn-light" id="authorize_button"
                            onclick="handleAuthClick()">Authorize</button>
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn text-sm btn-info btn-addevent" onclick="addEvent()">Add
                            Schedule</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php 

include "footerjs.php"

?>

<script src="/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.11/index.global.min.js'></script>
<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>

<script>
    $('#st').timepicker({
        
    });
    $('#et').timepicker({});
    const CLIENT_ID = $(".googledata").data('client');
    const API_KEY = $(".googledata").data('api');
    const CALENDAR_ID = $(".googledata").data('gcal');
    const DISCOVERY_DOC =
        "https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest";

    const SCOPES = "https://www.googleapis.com/auth/calendar";
    let tokenClient;
    let gapiInited = false;
    let gisInited = false;

    // FULL CALENDAR + GSYNC
    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                right: 'dayGridMonth,listYear prev,next',
                left: 'title today'
            },
            googleCalendarApiKey: API_KEY,
            events: {
                googleCalendarId: CALENDAR_ID,
            },
            eventClick: function (info) {
                info.jsEvent.preventDefault();

                function formatDateCalendar(string) {
                    return FullCalendar.formatDate(string, {
                        month: 'short',
                        day: 'numeric',
                        weekday: 'long',
                    })
                }

                function formatClock(string) {
                    return FullCalendar.formatDate(string, {
                        hour: '2-digit',
                        minute: '2-digit',
                    })
                }
                if (!info.event.allDay) {
                    $('.datestart').html(formatDateCalendar(info.event.start) + " • ");
                    $('.dateend').html(formatDateCalendar(info.event.end) + " • ");
                    $('.event-date .start').html(formatClock(info.event.start));
                    $('.event-date .end').html(formatClock(info.event.end));
                } else {
                    $('.datestart').html(formatDateCalendar(info.event.start));
                    $('.dateend').html(formatDateCalendar(info.event.end));
                    $('.event-date .start').html("");
                    $('.event-date .end').html("");
                }
                $('.event-title').html(info.event.title);
                (info.event.extendedProps.description) ? $('.event-desc').html(info.event
                    .extendedProps.description): $('.event-desc').html("Tidak Ada Deskripsi");
                (info.event.extendedProps.location) ? $('.event-loc').html(info.event.extendedProps
                    .location): $('.event-loc').html("Tidak Ada Detail Lokasi");
                $(".btn-gcal").attr("href", info.event.url)
                $('#calendar_info').modal('show');
            }
        });
        calendar.render();
    })

    //GCALENDAR API INSERT EVENT
    $("#authorize_button").css('visibility', 'hidden');
    $("#event_form").find(":input").prop('disabled', true);
    $(".btn-addevent").prop('disabled', true);

    function gapiLoaded() {
        gapi.load("client", initializeGapiClient);
    }

    async function initializeGapiClient() {
        await gapi.client.init({
            apiKey: API_KEY,
            discoveryDocs: [DISCOVERY_DOC]
        });
        gapiInited = true;
        maybeEnableButtons();
    }

    function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: "" // defined later
        });
        gisInited = true;
        maybeEnableButtons();
    }

    function maybeEnableButtons() {
        if (gapiInited && gisInited) {
            $("#authorize_button").html(
                '<span class="d-flex"><p class="text-sm my-auto fw-bolder">Authorize</p><i class="d-flex my-auto fs-6 ms-2 bx bx-lock"></i> </span>'
            );
            $("#authorize_button").css('visibility', 'visible');
        }
    }

    function handleAuthClick() {
        tokenClient.callback = async resp => {
            if (resp.error !== undefined) {
                throw resp;
            }
            $('#event_form').find(":input").prop('disabled', false);
            $("#authorize_button").html(
                '<span class="d-flex"><p class="text-sm my-auto fw-bolder">Authorized</p><i class="d-flex my-auto fs-6 ms-2 bx bx-lock-open"></i> </span>'
            ).prop('disabled', true);
            $(".btn-addevent").prop('disabled', false);
            //await listUpcomingEvents();
        };

        if (gapi.client.getToken() === null) {
            // Prompt the user to select a Google Account and ask for consent to share their data
            // when establishing a new session.
            tokenClient.requestAccessToken({
                prompt: "consent"
            });
        } else {
            // Skip display of account chooser and consent dialog for an existing session.
            tokenClient.requestAccessToken({
                prompt: ""
            });
        }
    }

    const addEvent = () => {

        const title = $('#title').val();
        const desc = $('#desc').val();
        const loc = $('#loc').val();
        const dateStart = $('#dateStart').val();
        const dateEnd = $('#dateEnd').val();
        const timeStart = $('#st').val();
        const timeEnd = $('#et').val();
        var ISOstartdate = "";
        //const inputLength = $('#createEvent input').length;
        // var y = $('#createEvent').find('input')

        // for (let i = 0; i <= inputLength; i++) {
        //     if (!y.eq(i)) {
        //         y.eq(i).addClass("is-invalid");
        //         return false;
        //     }
        // }

        if (!title) {
            swaltoast("Judul Event Wajib diisi", "warning");
            $('#title').addClass("is-invalid").siblings('.invalid-feedback').html("Judul Event Wajib diisi");
        } else if (!desc) {
            swaltoast("Deskripsi Event Wajib diisi", "warning");
            $('#desc').addClass("is-invalid").siblings('.invalid-feedback').html("Deskripsi Event Wajib diisi");
        } else if (!loc) {
            swaltoast("Lokasi Event Wajib diisi", "warning");
            $('#loc').addClass("is-invalid").siblings('.invalid-feedback').html("Lokasi Event Wajib diisi");
        } else if (!dateStart) {
            swaltoast("Tanggal Mulai Event Wajib diisi", "warning");
            $('#dateStart').addClass("is-invalid").siblings('.invalid-feedback').html(
                "Wajib diisi");
        } else if (!dateEnd) {
            swaltoast("Tanggal Selesai Event Wajib diisi", "warning");
            $('#dateEnd').addClass("is-invalid").siblings('.invalid-feedback').html(
                "Wajib diisi");
        } else if (!timeStart) {
            swaltoast("Waktu Mulai Event Wajib diisi", "warning");
            $('#st').addClass("is-invalid").siblings('.invalid-feedback').html("Wajib diisi");
        } else if (!timeEnd) {
            swaltoast("Waktu Selesai Event Wajib diisi", "warning");
            $('#et').addClass("is-invalid").siblings('.invalid-feedback').html("Wajib diisi");
        } else {
            const startTime = new Date(dateStart + "," + timeStart).toISOString();
            const endTime = new Date(dateEnd + "," + timeEnd).toISOString();
            const stime = new Date(dateStart);
            const etime = new Date(dateEnd);

            if (stime < etime) {
                var event = {
                    summary: title,
                    location: loc,
                    description: desc,
                    start: {
                        dateTime: startTime,
                        timeZone: "Asia/Jakarta"
                    },
                    end: {
                        dateTime: endTime,
                        timeZone: "Asia/Jakarta"
                    },
                    // recurrence: ["RRULE:FREQ=DAILY;COUNT=2"],
                    // attendees: [{
                    //     email: "abc@google.com"
                    // }, {
                    //     email: "xyz@google.com"
                    // }],
                    // reminders: {
                    //     useDefault: false,
                    //     overrides: [{
                    //             method: "email",
                    //             minutes: 24 * 60
                    //         },
                    //         {
                    //             method: "popup",
                    //             minutes: 10
                    //         }
                    //     ]
                    // }
                };

                //console.log(event);
                var request = gapi.client.calendar.events.insert({
                    calendarId: CALENDAR_ID,
                    resource: event
                });

                request.execute(async function (event) {
                    // console.log(event.htmlLink);
                    if (event) {
                        await swaltoast("Schedule Telah Berhasil Disimpan", 'success').then(
                            function () {
                                location.reload();
                            });
                    } else {
                        await swaltoast("Schedule Gagal Ditambahkan", 'error');
                    }
                });
            } else {
                swaltoast("Tanggal Selesai Tidak Boleh Lebih Kecil dari Tanggal Mulai", "warning");
            }
        }
    };


    // CHART JS
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: <?= json_encode($mesin) ?>,
            datasets: [{
                label: "Total Jam Permesinan",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                data: <?= json_encode($jam) ?>,
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Plus Jakarta Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Plus Jakarta Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
            },
        },
    });
</script>

<?=$this->endSection();?>