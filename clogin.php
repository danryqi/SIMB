<?php
session_start();

include 'config.php';
if (isset($_POST['admin'])) {
    $user       = $_POST['username'];
    $password   = $_POST['password'];
    $data       = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user' AND password = '$password'")
        or die(mysqli_error($conn));
    $cekdata = mysqli_num_rows($data);

    if ($cekdata > 0) {
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $password;
        header("location: admin.php");
    } else { ?>
        <script type="text/javascript">
            alert("Username/password salah!");
            window.location.href = 'login.php';
        </script>
<?php
    }
}

if (isset($_POST['user'])) {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND password = '$password'")  
        or die(mysqli_error($conn));

    $cekdata = mysqli_num_rows($data);

    if ($cekdata > 0) {
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $password;
        header("location: lapor.php");
    } else { ?>
        <script type="text/javascript">
            alert("Username/password salah!");
            window.location.href = 'login.php';
        </script>
<?php
    }
}