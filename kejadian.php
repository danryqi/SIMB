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
                Update Data Laporan Kejadian
            </div>
            <div class="card-body">
                <form action="config.php" method="POST">
                    <div class="mb-3 row">
                        <label for="bulan" class="col-sm-2 col-form-labe">Bulan</label>
                        <div class="col-sm-10">
                            <select id="bulan" class="form-select" name="bulan" required>
                                <option value="" selected>-Pilih Bulan-</option>
                                <option value="1">Januari</option>
                                <option value="2">FebruarI</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kejadian" class="col-sm-2 col-form-label">Tambah/kurang kejadian</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="kejadian" name="kejadian" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="UpdateKejadian" value="Update Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="chart bg-light pt-4" style="margin-bottom: 100px;">
            <center>
                <p>DATA KEJADIAN<br>2024</p>
            </center>
            <canvas id="myChart" height="90"></canvas>
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
</body>

</html>