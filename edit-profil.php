<?php
    session_start();
    include "config.php";
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
        $q = $con->query("SELECT * FROM akun WHERE email='$email'");
        $data = $q->fetch_array();
        $jenis_kelamin = $data["jenis_kelamin"];
        $alamat = $data["alamat"];
        $nama = $data["nama"];
        $notelp = $data["notelp"];
        $saldo = $data["saldo"];
        $desc = $data["description"];
        $avatar = $data["avatar"];
    } else {
        echo "<script>alert('Login terlebih dahulu!');window.location.href='login.php';</script>";
    }

    if (isset($_POST["done-edit"])) {
        $nama = $_POST["nama"];
        $email_sebelum = $_POST["email_asli"];
        $email_sesudah = $_POST["email"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $alamat = $_POST["alamat"];
        $notelp = $_POST["notelp"];
        $description = $_POST["isi-desc"]; 
        $q = $con->query("UPDATE akun SET nama='$nama', email='$email_sesudah', jenis_kelamin='$jenis_kelamin', alamat='$alamat', description='$description', notelp='$notelp' WHERE email='$email_sebelum'");
        if ($q) {
            $_SESSION["nama"] = $nama;
            echo "<script>alert('Berhasil edit profile !');window.location.href='akun.php';</script>";
        } else {
            echo "<script>alert('Gagal edit profile !');window.location.href='edit-profil.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/akun.css">
    <link rel="stylesheet" href="bootstrap/css/index.css">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">

    <title>Account Page &mdash; namanya</title>
</head>
<body>
    <?php include "static/header.php"; ?>
    <form class="mb-4" method="post">
        <div class="container mt-4">
            <input class="btn btn-success" type="submit" name="done-edit" value="DONE"></input>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <!-- data cardnya diambil dari database -->
                    <div class="card">
                        <div class="card-header img-header">
                            <!-- cari biar image bisa diubah tapi ada preview sebelumnya -->
                            <img src="<?php if($avatar == null) { echo 'img/default-avatar.png'; } else { echo $avatar; }?>   " alt="profil" class="img-responsive img-fluid img-profile">
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="email_asli" value="<?php echo $email; ?>">
                            <div class="nama">Nama : <input type="text" value="<?php echo $nama; ?>" name="nama"></div>
                            <div class="sex">Jenis Kelamin : <input type="text" value="<?php echo $jenis_kelamin; ?>" name="jenis_kelamin"></div>
                            <div class="email">Email : <input type="email" value="<?php echo $email; ?>" name="email"></div>
                            <div class="alamat">Alamat : <input type="text" value="<?php echo $alamat; ?>" name="alamat"></div>
                            <div class="telp">Nomor HP : <input type="tel" value="<?php echo $notelp; ?>" name="notelp"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <!-- data diambil dari bentuk angka di convert jadi ada angka dan huruf bulan -->
                            <div class="bergabung"><p class="bergabung">Bergabung Sejak : 31 july 2012</p></div>
                            <div class="info">Info</div>
                        </div>
                        <div class="card-body">
                            <div class="saldo">
                                <label id="title-saldo">Saldo</label>
                                <div class="total-saldo">
                                    <?php
                                        if ($saldo <= 0) {
                                            echo "Saldo kosong";
                                        } else {
                                            echo $saldo;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="description pt-4">
                                <label id="title-desc">Description</label>
                                <div class="isi-description">
                                    <textarea name="isi-desc" id="isDesc" cols="80" rows="10"><?php echo $desc; ?></textarea>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </form>

    <?php include "static/footer.php"; ?>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>