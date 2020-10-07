<?php
    session_start();
    include 'config.php';
    if (isset($_POST["user-email"])) {
        $nama = $_POST["user-nama"];
        $email = $_POST["user-email"];
        $notelp = $_POST["user-notelp"];
        $password = md5($_POST["user-password"]);
        $q = $con->query("INSERT INTO akun VALUES ('','$nama','','$email','$notelp','','$password','',0,'')");
        if($q) {
            echo "<script>alert('Success register');window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal register');</script>";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/register.css">
</head>

<body>
    <div id="card">
        <div id="card-content">
        <div id="card-title">
            <h2>REGISTER</h2>
            <div class="underline-title"></div>
        </div>
        <!-- nama email notelp pw -->
        <form method="post" class="form">
            <label for="user-nama" style="padding-top:13px">&nbsp;Username</label>
            <input id="user-nama" class="form-content" type="text" name="user-nama" autocomplete="on" required />
            <div class="form-border"></div>

            <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
            <input id="user-email" class="form-content" type="email" name="user-email" autocomplete="on" required />
            <div class="form-border"></div>

            <label for="user-notelp" style="padding-top:13px">&nbsp;No.Telp</label>
            <input id="user-notelp" class="form-content" type="text" name="user-notelp" autocomplete="on" required />
            <div class="form-border"></div>

            <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
            <input id="user-password" class="form-content" type="password" name="user-password" required />
            <div class="form-border"></div>

            <input id="submit-btn" type="submit" name="submit" value="REGISTER" />
            <a href="./login.php" id="signup">Have account ? Login</a>
        </form>
        </div>
    </div>
</body>

</html>