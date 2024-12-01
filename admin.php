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
        <a href="ad_laporan.php">Laporan</a>
    </div>
    <!-- Konten Utama -->
    <div class="konten">
        <div class="row">
            <div class="card" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">TOTAL ADUAN</h5>
                    <p class="card-text">17</p>
                    <P class="keterangan mt-4">Last Update <?php echo date("d M Y"); ?></P>
                </div>
            </div>
            <div class="card" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">KORBAN JIWA</h5>
                    <p class="card-text"><?php echo $total?></p>
                    <P class="keterangan">Meninggal <?php echo $tmeninggal?>, Hilang <?php echo $thilang ?>,<br> Terluka <?php echo $tluka ?>, Selamat <?php echo $tselamat?></P>
                </div>
            </div>
            <div class="card" style="width: 30%;">
                <div class="card-body">
                    <h5 class="card-title">DATA KEJADIAN</h5>
                    <p class="card-text"><?php echo $tkejadian?></p>
                    <P class="keterangan mt-4">Data diupdate secara berkala</P>
                </div>
            </div>
            <div>
                <div class="chart bg-light pt-4">
                    <center>
                        <p>DATA KEJADIAN<br>2024</p>
                    </center>
                    <canvas id="myChart" height="100"></canvas>
                </div>
                <div class="chart bg-light pt-4"  style="margin-bottom: 100px;">
                    <center>
                        <p>DATA KORBAN<br>2024</p>
                    </center>
                    <canvas id="korban" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="footer bg-dark"b >
        <center>
            <p>&copy;2024 Sistem Informasi Bencana Gempa Bumi</p>
        </center>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>