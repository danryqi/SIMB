<?php
$conn = new mysqli('localhost', 'root', '', 'simb');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql1   = "SELECT * FROM  kejadian";
$query1 = mysqli_query($conn, $sql1);
$r1     = mysqli_fetch_assoc($query1);
$jan    = $r1['jan'];
$feb    = $r1['feb'];
$mar    = $r1['mar'];
$apr    = $r1['apr'];
$mei    = $r1['mei'];
$jun    = $r1['jun'];
$jul    = $r1['jul'];
$agu    = $r1['agu'];
$sep    = $r1['sep'];
$okt    = $r1['okt'];
$nov    = $r1['nov'];
$des    = $r1['des'];
$tkejadian = $r1['jan'] + $r1['feb'] + $r1['mar'] + $r1['apr'] + $r1['mei'] + $r1['jun'] + $r1['jul'] + $r1['agu'] + $r1['sep'] + $r1['okt'] + $r1['nov'] + $r1['des'];

$sql2   = "SELECT * FROM  korban WHERE bulan = 'Januari'";
$query2 = mysqli_query($conn, $sql2);
$r2     = mysqli_fetch_assoc($query2);
$meninggal1  = $r2['meninggal'];
$luka1  = $r2['luka'];
$hilang1  = $r2['hilang'];
$selamat1  = $r2['selamat'];

$sql3   = "SELECT * FROM  korban WHERE bulan = 'Februari'";
$query3 = mysqli_query($conn, $sql3);
$r3     = mysqli_fetch_assoc($query3);
$meninggal2  = $r3['meninggal'];
$luka2  = $r3['luka'];
$hilang2  = $r3['hilang'];
$selamat2  = $r3['selamat'];

$sql4   = "SELECT * FROM  korban WHERE bulan = 'Maret'";
$query4 = mysqli_query($conn, $sql4);
$r4     = mysqli_fetch_assoc($query4);
$meninggal3  = $r4['meninggal'];
$luka3  = $r4['luka'];
$hilang3  = $r4['hilang'];
$selamat3  = $r4['selamat'];

$sql5   = "SELECT * FROM  korban WHERE bulan = 'April'";
$query5 = mysqli_query($conn, $sql5);
$r5     = mysqli_fetch_assoc($query5);
$meninggal4  = $r5['meninggal'];
$luka4  = $r5['luka'];
$hilang4  = $r5['hilang'];
$selamat4  = $r5['selamat'];

$sql6   = "SELECT * FROM  korban WHERE bulan = 'Mei'";
$query6 = mysqli_query($conn, $sql6);
$r6     = mysqli_fetch_assoc($query6);
$meninggal5  = $r6['meninggal'];
$luka5  = $r6['luka'];
$hilang5  = $r6['hilang'];
$selamat5  = $r6['selamat'];

$sql7   = "SELECT * FROM  korban WHERE bulan = 'Juni'";
$query7 = mysqli_query($conn, $sql7);
$r7     = mysqli_fetch_assoc($query7);
$meninggal6  = $r7['meninggal'];
$luka6  = $r7['luka'];
$hilang6  = $r7['hilang'];
$selamat6  = $r7['selamat'];

$sql8   = "SELECT * FROM  korban WHERE bulan = 'Juli'";
$query8 = mysqli_query($conn, $sql8);
$r8     = mysqli_fetch_assoc($query8);
$meninggal7  = $r8['meninggal'];
$luka7  = $r8['luka'];
$hilang7  = $r8['hilang'];
$selamat7  = $r8['selamat'];

$sql9   = "SELECT * FROM  korban WHERE bulan = 'Agustus'";
$query9 = mysqli_query($conn, $sql9);
$r9     = mysqli_fetch_assoc($query9);
$meninggal8  = $r9['meninggal'];
$luka8  = $r9['luka'];
$hilang8  = $r9['hilang'];
$selamat8  = $r9['selamat'];

$sql10   = "SELECT * FROM  korban WHERE bulan = 'September'";
$query10 = mysqli_query($conn, $sql10);
$r10     = mysqli_fetch_assoc($query10);
$meninggal9  = $r10['meninggal'];
$luka9  = $r10['luka'];
$hilang9  = $r10['hilang'];
$selamat9  = $r10['selamat'];

$sql11   = "SELECT * FROM  korban WHERE bulan = 'Oktober'";
$query11 = mysqli_query($conn, $sql11);
$r11     = mysqli_fetch_assoc($query11);
$meninggal10  = $r11['meninggal'];
$luka10  = $r11['luka'];
$hilang10  = $r11['hilang'];
$selamat10  = $r11['selamat'];

$sql12   = "SELECT * FROM  korban WHERE bulan = 'November'";
$query12 = mysqli_query($conn, $sql12);
$r12     = mysqli_fetch_assoc($query12);
$meninggal11  = $r12['meninggal'];
$luka11  = $r12['luka'];
$hilang11  = $r12['hilang'];
$selamat11  = $r12['selamat'];

$sql13   = "SELECT * FROM  korban WHERE bulan = 'Desember'";
$query13 = mysqli_query($conn, $sql13);
$r13     = mysqli_fetch_assoc($query13);
$meninggal12  = $r13['meninggal'];
$luka12  = $r13['luka'];
$hilang12  = $r13['hilang'];
$selamat12  = $r13['selamat'];

$sql = "SELECT SUM(total) as total FROM korban";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total = $row['total'];

$sql = "SELECT SUM(luka) as tluka FROM korban";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tluka = $row['tluka'];

$sql = "SELECT SUM(selamat) as tselamat FROM korban";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tselamat = $row['tselamat'];

$sql = "SELECT SUM(hilang) as thilang FROM korban";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$thilang = $row['thilang'];

$sql = "SELECT SUM(meninggal) as tmeninggal FROM korban";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tmeninggal = $row['tmeninggal'];

if (isset($_POST['UpdateKejadian'])) {
    $bulan      = $_POST['bulan'];
    $kejadian   = $_POST['kejadian'];
    if ($bulan == '1') {
        $sql    = "UPDATE kejadian SET jan = jan + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '2') {
        $sql    = "UPDATE kejadian SET feb = feb + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '3') {
        $sql    = "UPDATE kejadian SET mar = mar + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '4') {
        $sql    = "UPDATE kejadian SET apr = apr + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '5') {
        $sql    = "UPDATE kejadian SET mei = mei + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '6') {
        $sql    = "UPDATE kejadian SET jun = jun + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '7') {
        $sql    = "UPDATE kejadian SET jul = jul + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '8') {
        $sql    = "UPDATE kejadian SET agu = agu + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '9') {
        $sql    = "UPDATE kejadian SET sep = sep + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '10') {
        $sql    = "UPDATE kejadian SET okt = okt + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '11') {
        $sql    = "UPDATE kejadian SET nov = nov + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    } else if ($bulan == '12') {
        $sql    = "UPDATE kejadian SET des = des + '$kejadian'";
        $q      = mysqli_query($conn, $sql);
        header("Location: kejadian.php");
    }
}
if (isset($_POST['UpdateKorban'])) {
    $bulan      = $_POST['bln'];
    $jumlah     = $_POST['jumlah'];
    $status     = $_POST['status'];
    if ($jumlah) {
        $tot        = "total = meninggal + selamat + luka + hilang";
        $sql        = "UPDATE korban SET $status = $status + $jumlah, $tot WHERE bulan = '$bulan'";
        $q          = mysqli_query($conn, $sql);
        header("Location: korban.php");
    }
}
if (isset($_POST['register'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $sql        = "INSERT INTO user (username, password) values ('$username', '$password')";
    $q          = mysqli_query($conn, $sql);
?>
    <script type="text/javascript">
        alert("Pendaftaran berhasil");
        window.location.href = 'login.php';
    </script>
<?php
}
