
<?php
    include "config.php";
    session_start();
    if (!isset($_SESSION["email"])) {
        echo "<script>alert('Login terlebih dahulu !');window.location.href='index.php';</script>";
    }
    $email = $_SESSION['email'];
    $msg = "";
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $q = $con->query("SELECT * FROM barang WHERE id_barang = '$id'");
        if ($q->num_rows > 0) {
            $email = $_SESSION['email'];
            $q2 = $con->query("INSERT INTO wishlist VALUES ('$email','$id')");
            if ($q2) {
                $msg .= "Berhasil menambah barang ke wishlist";
                echo "<script>alert('$msg');window.location.href='index.php';</script>";
            } else {
                $msg .= "Barang sudah ada di trolly";
                echo "<script>alert('$msg');window.location.href='index.php';</script>";
            }
        } else {
            $msg .= "Barang dengan id " . strval($_GET["id"]) . " tidak ada";
            echo "<script>alert('$msg');window.location.href='index.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">
    <link rel="stylesheet" href="bootstrap/css/index.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Favorite List</title>
    <style>
        .card-header{
            /* padding: 0px 10px 0px 0px; */
            background-color: transparent;
            border-bottom: transparent;
            margin: 0px;
        }
        .card-body{
            font-style: normal;
            color: black;
        }
        .img{
            width: 200px;
            height: 200px;
        }
        .harga{
            font-weight: bold;
        }
        .bintang{
            color: darkslategray;
        }
        .search.scrollIn{
            box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 2px 6px 2px rgba(60,64,67,0.149);
            border-bottom: 0;
        }
        .search{
            background: white;
            transition: transform cubic-bezier(0.4,0.0,0.2,1) 240ms;
            width: 100%;
            z-index: 50;
        }
        nav{
            display: block;
        }
    </style>
</head>
<body>
    <?php include "static/header.php"; ?> 
    <div class="container mt-3">
        <div class="jumbotron pt-3">
			<?php
                $q = $con->query("SELECT * FROM wishlist WHERE email='$email'");
                if($q->num_rows > 0) {
                    while($data = $q->fetch_array()) {
                        $id = strval($data['id_barang']);
                        $q2 = $con->query("SELECT * FROM barang WHERE id_barang='$id'");
                        $data2 = $q2->fetch_array();
                        $img = "img/".$data2["path"];
                        $nama_barang = $data2["nama_barang"];
                        $harga = $data2["harga"];
            ?>
                <div class="card mt-3">
                    <!-- href disesuaikan linknya dengan card -->
                    <a href="<?php echo 'viewProduct.php?id='. strval($id)?>" class="link" style="text-decoration: none;">
                        <div class="row">
                            <div class="card-header">
                                <img src="<?php echo $img; ?>" class="img img-fluid" alt="card">
                            </div>
                            <div class="card-body">
                                <h5><?php echo $nama_barang; ?></h5>
                                <p class="harga"><?php echo $harga; ?></p>
                                <p class="bintang">✨✨✨✨✨ (10)</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="row">
                            <div class="hapus pr-3">
                                <button class="btn btn-outline-danger" onclick="return manggil('<?php echo $id; ?>','hapus');">Hapus</button>
                            </div>
                            <div class="keranjang">
                                <button class="btn btn-outline-primary" onclick="return manggil('<?php echo $id; ?>','tambah');">Tambah Ke Keranjang</button>
                            </div>
                        </div>
                    </div>
                </div>
			<?php }} ?>
			
        </div>
    </div>

    <?php include "static/footer.php"; ?>

    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
        function manggil(id,tipe) {
            $.ajax({
                type: "POST",
                url: "function.php",
                dataType: "JSON",
                data: {
                    type: tipe,
                    id: id
                },
                success: function(e) {
                    alert(e.result);
                    window.location.href='index.php';
                },
                error: function(e) {
                    console.log(e);
                }
            })
        }

    </script>
</body>
</html>