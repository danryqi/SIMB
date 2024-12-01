<?php
session_start();
if (empty($_SESSION['username'])) {
?>
    <script type="text/javascript">
        alert("Harap Login Terlebih Dahulu !");
        window.location.href = 'login.php';
    </script>
<?php
}
include 'config.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php" target="_blank">SI Bencana </a>
            <button class="navbar-toggler bg-secondary mt-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="logout.php" style="text-decoration: none;">
                    <button class="btn btn-outline-danger d-flex">Logout</button>
                </a>
            </div>
        </div>
    </nav>
    <!-- Side Bar -->
    <div class="sidebar">
        <a href="admin.php">Dashboard</a>
        <a href="kejadian.php">Kejadian</a>
        <a href="korban.php">Korban</a>
        <a href="ad_laporan.html">Laporan</a>
    </div>
    <!-- Konten Utama -->
    <div class="konten">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    Update Data Laporan Korban
                </div>
                <div class="card-body">
                    <form action="config.php" method="POST">
                        <div class="mb-3 row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Korban</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="bln" class="col-sm-2 col-form-labe">Bulan</label>
                            <div class="col-sm-10">
                                <select id="bln" class="form-select" name="bln" required>
                                    <option value="" selected>-Pilih Bulan-</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">FebruarI</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-labe">Status</label>
                            <div class="col-sm-10">
                                <select id="status" class="form-select" name="status" required>
                                    <option value="" selected>-Pilih Status-</option>
                                    <option value="meninggal">Meninggal</option>
                                    <option value="luka">Luka</option>
                                    <option value="hilang">Hilang</option>
                                    <option value="selamat">Selamat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="UpdateKorban" value="Update Data" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
                <div class="chart bg-light pt-4" style="margin-bottom: 100px;">
                    <center>
                        <p>DATA KORBAN<br>2024</p>
                    </center>
                    <canvas id="korban" height="100"></canvas>
                </div>
    </div>

    <div class="footer bg-dark">
        <center>
            <p>&copy;2024 Sistem Informasi Bencana Gempa Bumi</p>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</body>

</html>