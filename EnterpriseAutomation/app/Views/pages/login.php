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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
</head>

<body style="background: url(/assets/img/sampul.png) no-repeat center center fixed; -webkit-background-size: cover;
-moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    <div class="formlogin bg-body">
        <form method="post" id="login-form" data-url="<?=base_url()."Login/Auth"?>">
            <div class="row align-items-center">
                <div class="col text-center">
                    <img class="w-75" src="/assets/img/favicon.png" alt="">
                </div>
                <div class="col-8 px-0">
                    <h3 class="fw-bolder text-start mt-2 text-dark">Halaman Login<br> Enterprise ME </h3>
                </div>
            </div>
            <hr class="text-dark bg-dark">
            <p class="text-center text-sm mt-2 text-wrap">Selamat Datang di Sistem Enterprise
                Jurusan Teknik Manufaktur Politeknik Manufaktur Bandung.
                <span class="fw-bold">Silahkan Login Terlebih dahulu</span></p>
            <div class="pt-2">
                <label for="" class="text-uppercase text-xxs form-label">Username</label>
                <div class="input-set px-1">
                    <i class='bx bx-user'></i>
                    <input id="Username" type="text" name="Username" class="form-control"
                        placeholder="Masukan Username" />
                </div>
            </div>
            <div class="pt-2">
                <label for="" class="text-uppercase text-xxs form-label">Password</label>
                <div class="input-set px-1">
                    <i class='bx bx-key'></i>
                    <input id="Password" name="Password" class="form-control" type="password"
                        placeholder="Masukan Password"></input>
                </div>
            </div>
            <div class="form-group text-start pt-2">
                <div class="checkbox-wrapper-46 ps-2 py-2">
                    <input class="shadow inp-cbx" id="cbx-46" type="checkbox" onclick="showpass()">
                    <label class="cbx" for="cbx-46"><span>
                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg></span><span class="ps-2 text-uppercase">Show Password</span>
                    </label>
                </div>
            </div>
            <div class="form-group ">
                <button type="button" name="login" class="w-100 btn btn-login btn-info"><span
                        class="d-flex justify-content-center">
                        <p class="text-sm my-auto fw-bolder">Login</p><i
                            class="d-flex my-auto fs-6 ms-2 bx bx-log-in"></i>
                    </span></button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script>
        //response : success (green) ,warning (yellow), error (red)
        function swaltoast(title, response) {
            return Swal.fire({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                icon: response,
                title: title,
                customClass: {
                    popup: 'colored-toast'
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                showCloseButton: true,
                showClass: {
                    popup: "slide-bottom"
                }
            })
        }

        $(".btn-login").on("click", function () {
            var form = document.getElementById("login-form");
            var data = new FormData(form);
            var link = $("#login-form").data("url");
            console.log(data);
            $.ajax({
                type: 'POST',
                url: link,
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.success) {
                        swaltoast(
                            "Anda Berhasil Login, Anda akan segera di arahkan ke halaman Dashboard",
                            'success').then(function () {
                            window.location.href = "<?=base_url()?>";
                        });
                    } else {
                        swaltoast("Login Gagal. Username Atau Password Salah!", 'warning');
                    }
                    console.log(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swaltoast(thrownError, 'error');
                }
            });
        });

        function showpass() {
            var pass = document.getElementById("Password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
    </script>
</body>

</html>