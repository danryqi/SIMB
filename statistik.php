<?php
include 'config.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Statistik</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="header">
        <div class="navbar-color text-light pb-1 pt-2">
            <div class="container">
                <div class="row justify-content-between nav-atas">
                    <div class="col-4">
                        <span class="text-white-50"><i class="bi bi-map-fill me-1" style="color: #f35525;"></i> Yogyakarta, Indonesia</span>
                    </div>
                    <div class="col-3" style="padding-left: 4%;">
                        <span id="time" class="text-white-50 fst-italic" style="margin-left: 20px;"></span>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-color">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <span class="fw-bold fs-3 text-color1">SI BENCANA</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav mb-2 mb-lg-0 fs-6 fw-bolder ms-auto">
                        <li class="nav-item mx-3">
                            <a class="nav-link nav-aktif" href="index.php">Home</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="dataupdate.html">Data Terbaru</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="statistik.html">Statistik</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="definisi.html">Definisi</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Laporan</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kontak
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="kontakpenting.html">Kontak Penting</a></li>
                                <li><a class="dropdown-item" href="#">Hubungi Kami</a></li>
                            </ul>
                        </li>                        
                        <li class="nav-item mx-3" id="login">
                            <i class="bi bi-person-fill login-icon"></i>
                            <a class="nav-link text-color2 p-0" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
        <marquee>Selamat Datang di Website Sistem Informasi Bencana Gempa Bumi</marquee>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="card card-statistik" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">TOTAL ADUAN</h5>
                    <p class="card-text">17</p>
                    <P class="keterangan mt-4">Last Update <?php echo date("d M Y"); ?></P>
                </div>
            </div>
            <div class="card card-statistik" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">KORBAN JIWA</h5>
                    <p class="card-text"><?php echo $total?></p>
                    <P class="keterangan">Meninggal <?php echo $tmeninggal?>, Hilang <?php echo $thilang ?>,<br> Terluka <?php echo $tluka ?>, Selamat <?php echo $tselamat?></P>
                </div>
            </div>
            <div class="card card-statistik" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">DATA KEJADIAN</h5>
                    <p class="card-text"><?php echo $tkejadian?></p>
                    <P class="keterangan mt-4">Data diupdate secara berkala</P>
                </div>
            </div>
            <div>
                <div class="chart bg-light pt-4 card-statistik">
                    <center>
                        <p>DATA KEJADIAN<br>2024</p>
                    </center>
                    <canvas id="myChart" height="100"></canvas>
                </div>
                <div class="chart bg-light pt-4 card-statistik">
                    <center>
                        <p>DATA KORBAN<br>2024</p>
                    </center>
                    <canvas id="korban" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Laporan Masuk',
                    data: [<?php echo $jan ?>, <?php echo $feb ?>, <?php echo $mar ?>, <?php echo $apr ?>, <?php echo $mei ?>, <?php echo $jun ?>, <?php echo $jul ?>, <?php echo $agu ?>, <?php echo $sep ?>, <?php echo $okt ?>, <?php echo $nov ?>, <?php echo $des ?>],
                    borderWidth: 1,
                    borderColor: '#ff0000',
                    backgroundColor: '#ff6666',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        document.getElementById('myChart').height = 200;
    </script>
    <script>
        const ctx1 = document.getElementById('korban');

        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Korban Selamat',
                    data: [<?php echo $selamat1 ?>, <?php echo $selamat2 ?>, <?php echo $selamat3 ?>, <?php echo $selamat4 ?>, <?php echo $selamat5 ?>, <?php echo $selamat6 ?>, <?php echo $selamat7 ?>, <?php echo $selamat8 ?>, <?php echo $selamat9 ?>, <?php echo $selamat10 ?>, <?php echo $selamat11 ?>, <?php echo $selamat12 ?>],
                    borderWidth: 1,
                    borderColor: '#379700',
                    backgroundColor: '#51df00',
                },
                {
                    label: 'Korban Luka',
                    data: [<?php echo $luka1 ?>, <?php echo $luka2 ?>, <?php echo $luka3 ?>, <?php echo $luka4 ?>, <?php echo $luka5 ?>, <?php echo $luka6 ?>, <?php echo $luka7 ?>, <?php echo $luka8 ?>, <?php echo $luka9 ?>, <?php echo $luka10 ?>, <?php echo $luka11 ?>, <?php echo $luka12 ?>],
                    borderWidth: 1,
                    borderColor: '#ff0000',
                    backgroundColor: '#ff6666',
                },
                {
                    label: 'Korban Meninggal',
                    data: [<?php echo $meninggal1 ?>, <?php echo $meninggal2 ?>, <?php echo $meninggal3 ?>, <?php echo $meninggal4 ?>, <?php echo $meninggal5 ?>, <?php echo $meninggal6 ?>, <?php echo $meninggal7 ?>, <?php echo $meninggal8 ?>, <?php echo $meninggal9 ?>, <?php echo $meninggal10 ?>, <?php echo $meninggal11 ?>, <?php echo $meninggal12 ?>],
                    borderWidth: 1,
                    borderColor: '#000000',
                    backgroundColor: '#545454',
                },
                {
                    label: 'Korban Hilang',
                    data: [<?php echo $hilang1 ?>, <?php echo $hilang2 ?>, <?php echo $hilang3 ?>, <?php echo $hilang4 ?>, <?php echo $hilang5 ?>, <?php echo $hilang6 ?>, <?php echo $hilang7 ?>, <?php echo $hilang8 ?>, <?php echo $hilang9 ?>, <?php echo $hilang10 ?>, <?php echo $hilang11 ?>, <?php echo $hilang12 ?>],
                    borderWidth: 1,
                    borderColor: '#0f00ff',
                    backgroundColor: '#4337ff',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <div class="container-fluid bg-dark footer mt-5 wow fadeIn">
        <div class="container pt-2 pb-3 text-center">
            <span style="color: #f9f7e4;">&copy; Copyright 2024 - Website Sistem Informasi Manajemen Bencana Gempa Bumi</span>
        </div>
    </div>









        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>