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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/dark-mode.css">
</head>

<body style="background: url(/assets/img/sampul.png) no-repeat center center fixed; -webkit-background-size: cover;
-moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    <div class="formlogin bg-body">
        <div class="">
            <div class="row align-items-center">
                <div class="col text-center">
                    <img class="w-75" src="/assets/img/favicon.png" alt="">
                </div>
                <div class="col-8">
                    <h3 class="poppins-bold text-start mt-2 text-dark">Halaman Login<br> Enterprise ME </h3>
                </div>
            </div>

            <hr class="text-dark bg-dark">

            <p class="text-center text-sm mt-2 text-wrap">Selamat Datang di Sistem Enterprise
                Jurusan Teknik Manufaktur Politeknik Mnufaktur Bandung. 
                <span class="fw-bold">Silahkan Login Terlebih dahulu</span></p>
            <div class="form-group pt-2">
                <input id="username" type="text" name="username" class="form-control" placeholder="Masukan Username" />
            </div>
            <div class="form-group pt-2">
                <input id="password" name="password" class="form-control" type="password"
                    placeholder="Masukan Password"></input>
            </div>
            <div class="form-group text-start pt-2">
                <input class="form-check-input" type="checkbox" onclick="showpass()">
                <label class="form-check-label ps-2">
                    Show Password
                </label>
            </div>
            <div class="form-group ">
                <!-- <div class="row">
                    <div class="col">
                        <button type="submit" name="login" class="w-100 btn btn-login btn-primary">Login</button>
                    </div>
                    <div class="col">
                        <input type="button" class="w-100 btn btn-secondary" value="Sign Up" onclick="showhide()" />
                    </div>
                </div> -->
                <a href="/Dashboard" type="submit" name="login" class="w-100 btn btn-login btn-info">Login</a>
            </div>
        </div>
    </div>
</body>

</html>