<?php

if (!isset($nav_active)) {
    $nav_active = -1;
}

$role = (object) [
    "admin" => (object) [
        "Kajur" => "Kajur", 
        "Sekjur" => "Sekjur",
        "Kappc" => "Kappc",
    ],
    "operator" => (object) [
        "Operator" => "Operator",
        "Kalab" => "Kalab",
    ],
    "user" => (object) [
        "Gudang" => "Gudang",
        "Produksi" => "Produksi",
    ],
    "superuser" => (object) [
        "Superuser" => "Superuser",
    ],
];
$currentRole = session()->get('Role');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>
        Enterprise System | Teknik Manufaktur (ME)
    </title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/dark-mode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>

<body id="mainbody" class="g-sidenav-show  bg-gray-100">
    <div id="preloader">
        <div class="row align-items-center">
            <div class="col text-center">
                <img class="" src="/assets/img/favicon.png" alt="">
            </div>
            <div class="col-auto px-0">
                <h3 class="fw-bolder text-start mt-2 text-dark">Enterprise ME</h3>
            </div>
        </div>
    </div>
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-polman"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fs-4 bx bx-x p-3 cursor-pointer text-white position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/" target="_self">
                <img src="/assets/img/navimg.png" class="navbar-brand-img h-100" alt="logo">
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mb-3" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Klik menu ini untuk menampilkan informasi dari akun anda"
                    data-bs-custom-class="mytooltip">
                    <a class=" navi-item nav-link bg-gradient-info border-radius-md" href="/Profile">
                        <div class="w-100 py-2 row mx-0">
                            <div class="col-auto px-0">
                                <img width="70px" src="<?=base_url("assets/img/").session()->get('profile_picture')?>" class="shadow border-radius-md"
                                    alt="">
                            </div>
                            <div class="col ps-3 pe-0 my-auto">
                                <p class="my-0 fw-bolder text-wrap"><?=session()->get('Name')?></p>
                                <span class="text-wrap"><?=session()->get('Role')?></span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Tampilan Awal Aplikasi Enterprise, digunakan untuk melihat beberapa informasi penting dengan cepat"
                    data-bs-custom-class="mytooltip">
                    <a anim="ripple" class="nav-link navi-item" href="/">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bxs-dashboard'></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item
                <?php 
                if(property_exists($role->operator, $currentRole)) echo "d-none";
                if(property_exists($role->user, $currentRole)) echo "d-none";
                ?>" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Menu ini digunakan untuk melakukan management data data SPK yang masuk ke sistem Enterprise ME"
                    data-bs-custom-class="mytooltip">
                    <a anim="ripple" class="nav-link  navi-item" href="/Spk">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bx-list-ul'></i>
                        </div>
                        <span class="nav-link-text ms-1">SPK</span>
                    </a>
                </li>
                <li class="nav-item
                <?php 
                if(property_exists($role->operator, $currentRole)) echo "d-none";
                if(property_exists($role->user, $currentRole)) echo "d-none";
                ?>" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Menu ini adalah visualisasi dari proses yang sedang terjadi 
                di ME, dapat digunakan untuk melakukan tracking SPK yang ada di Workshop ME"
                    data-bs-custom-class="mytooltip">
                    <a anim="ripple" class="nav-link  navi-item" href="/Visualization">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bxs-zap'></i>
                        </div>
                        <span class="nav-link-text ms-1">Visualization</span>
                    </a>
                </li>
                <li class="nav-item
                <?php 
                if(property_exists($role->admin, $currentRole)) echo "d-none";
                ?>" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Menu ini digunakan untuk melakukan manajemen pada proses permesinan yang ada di ME"
                    data-bs-custom-class="mytooltip">
                    <a anim="ripple" class="nav-link  navi-item" href="/Permesinan">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bxs-cog'></i>
                        </div>
                        <span class="nav-link-text ms-1">Permesinan</span>
                    </a>
                </li>
                <li class="nav-item
                <?php 
                if(property_exists($role->admin, $currentRole)) echo "d-none";
                if(property_exists($role->operator, $currentRole)) echo "d-none";
                ?>" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Menu ini digunakan untuk melakukan manajemen terutama inventaris barang pada gudang ME"
                    data-bs-custom-class="mytooltip">
                    <a anim="ripple" class="nav-link  navi-item" href="/Gudang">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bxs-package'></i>
                        </div>
                        <span class="nav-link-text ms-1">Gudang</span>
                    </a>
                </li>
                <li class="nav-item
                <?php 
                if(property_exists($role->operator, $currentRole)) echo "d-none";
                if(property_exists($role->user, $currentRole)) echo "d-none";
                ?>">
                    <a class="nav-link  navi-item" href="/KelolaAkun">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white 
                            text-center me-2 d-flex align-items-center justify-content-center">
                            <i class='fs-6 text-dark bx bxs-user'></i>
                        </div>
                        <span class="nav-link-text ms-1">Account</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <a anim="ripple" class="text-sm btn mb-0 btn-warning mt-3 w-100"
                href="<?=base_url('Login/logout')?>">Logout</a>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl 
        position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $title ?></li>
                    </ol>
                    <h6 class="text-dark fw-bolder mb-0"><?= $title ?></h6>
                </nav>
                <div class="collapse justify-content-end navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-2 pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item dropdown d-flex align-items-center">
                            <span class="buttondark nav-link me-lg-1 ps-1 pt-0 mt-3">
                                <label class="switch" for="darkSwitch">
                                    <input type="checkbox" id="darkSwitch">
                                    <div class="header_icon" data-bs-toggle="tooltip" data-bs-placement="left"
                                        data-bs-custom-class="mytooltip">
                                        <i class='fs-5 btn-moon bxs-moon bx'></i>
                                        <i class='fs-5 btn-sun bxs-sun d-none bx'></i>
                                    </div>
                                </label>
                            </span>
                            <!-- <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='fs-5 bx bxs-bell' data-bs-toggle="tooltip" data-bs-placement="left"
                                    data-bs-title="Lihat Notifikasi" data-bs-custom-class="mytooltip"></i>
                            </a> -->
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm text-dark font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-wob text-dark mb-0 ">
                                                    <i class='bx bx-time-five'></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid">
            <?= $this->renderSection('content'); ?>
        </div>

        <footer class="footer pt-3  ">
            <div class=" container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="text-center mb-4">
                        <div class="copyright text-center text-sm text-muted">
                            © 2024. All Rights Reserved.
                            <a href="https://polman-bandung.ac.id" class="font-weight-bold" target="_blank">Politeknik
                                Manufaktur Bandung</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/dark-mode-switch.min.js"></script>
    <script src="/assets/js/pace.js"></script>
    <script src="/assets/js/soft-ui-dashboard.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script>
        var navi_item = $("ul li:nth-child(<?= $nav_active + 1?>) .navi-item");
        var navi_icon = $("ul li:nth-child(<?= $nav_active + 1?>) i");

        navi_item.addClass("active");

        if (navi_item.hasClass("active")) {
            navi_icon.removeClass("text-dark");
        }

        $("#darkSwitch").click(function () {
            $(".btn-moon").toggleClass("d-none");
            $(".btn-sun").toggleClass("d-none");
        })

        function changetooltip() {
            if (localStorage.getItem("darkSwitch") == "dark") {
                $('.header_icon').tooltip('dispose').attr('title', 'Ubah Ke Dark Mode');
                $('.header_icon').tooltip('show');

            } else {
                $('.header_icon').tooltip('dispose').attr('title', 'Ubah Ke Light Mode');
                $('.header_icon').tooltip('show');
            }
        }

        $("#darkSwitch").on("change", function () {
            changetooltip()
        });

        $(document).ready(function () {
            if (localStorage.getItem("darkSwitch") == "dark") {
                $('.header_icon').tooltip('dispose').attr('title', 'Ubah Ke Light Mode');
                $('.header_icon').tooltip();

            } else {
                $('.header_icon').tooltip('dispose').attr('title', 'Ubah Ke Dark Mode');
                $('.header_icon').tooltip();
            }
        })

        paceOptions = {
            ajax: true,
            document: true,
            eventLag: false
        };

        Pace.on('done', function () {
            // $('#preloader').addClass('d-none');
            var tl = gsap.timeline();
            tl.to('#preloader .row', {
                    y: 3,
                    opacity: 0,
                    duration: 0.6
                })

                .to("#preloader", {
                    y: -1000,
                    duration: 1,
                    onComplete() {
                        localStorage.setItem("load", true);
                        //console.log(localStorage.getItem("load"));
                        setTimeout(() => {
                            localStorage.setItem("load", false);
                            //console.log(localStorage.getItem("load"));
                        }, 1000);
                    }
                })
        });
    </script>

</body>

</html>