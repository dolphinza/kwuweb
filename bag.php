<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION['email'])) {
        echo "<script>alert('Login terlebih dahulu !');window.location.href='index.php';</script>";
    }
    $email = $_SESSION['email'];
    function toRupiah($angka){
        $hasilRupiah = "Rp. ".number_format($angka,0,',','.');
        return $hasilRupiah;
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
    <link rel="stylesheet" href="bootstrap/css/univstyle.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>BAG</title>
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
        .black{
            background-color:grey;
        }
    </style>
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            // console.log(scroll);
        });
    </script>
</head>
<body>
    <?php include "static/header.php"; ?>
    <div class="container mt-3">
        <div class="jumbotron pt-3">
			<?php
            $total_bayar = 0;
                $q = $con->query("SELECT a.id_barang,a.email,a.qty,b.nama_barang,b.keterangan,b.harga,b.path,b.diskon from trolly a,barang b where a.id_barang = b.id_barang and a.email = '$email'");
                if($q->num_rows > 0) {
                    while($data = $q->fetch_array()) {
                        $id = $data["id_barang"];
                        $img = "img/".$data["path"];
                        $nama_barang = $data["nama_barang"];
                        $harga = $data["harga"];
                        $diskon = $data["diskon"];
                        $hitungDiskon = ($harga*($diskon/100));
                        $hasilDiskon = $harga - $hitungDiskon;
                        $ket = $data["keterangan"];
                        $qty = $data["qty"];
                        $_SESSION['qtys'] = $qty;
                        $total = $diskon ? $hasilDiskon*$qty : $harga*$qty;
                        $total_bayar += $total;
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
                                <?php
                                    if($diskon > 0){
                                        echo '<div class="row hidden title-discount" style="padding-left:15px">'.
                                        '<div class="discountbox">'.$diskon.'%</div>'.
                                        '<del>'.toRupiah($harga).'</del>'.
                                        '<div class="col"></div>'.
                                        '<div class="col"></div>'.
                                        '</div>';
                                        echo '<p class="harga">'.toRupiah($hasilDiskon).'</p>';
                                    }
                                    else{
                                        echo '<p class="harga">'.toRupiah($harga).'</p>';
                                    }
                                ?>
                                <p class="bintang">✨✨✨✨✨ (10)</p>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="row">
                            <div class="buang">
                                <img src="./img/trash.png" alt="buang" class="buang" style="width:30px;height:30px" onclick="deleteTrolly('<?=$id?>')">
                            </div>&nbsp;
                            <div class="minus">
                                <img src="./img/minus.png" alt="kurang" class="kurang" style="width:30px;height:30px" onclick="kurang(<?=$qty?>,'<?=$id?>')">
                            </div>&nbsp;
                            <div class="angkaBeli">
                                <input type="text" class="form-control" id="value-<?= $id?>" min="1" value="<?= $qty?>" style="width:80px;text-align:center;">
                            </div>&nbsp;
                            <div class="plus">
                                <img src="./img/plus.png" alt="tambah" class="tambah" style="width:30px;height:30px" onclick="tambah(<?=$qty?>,'<?=$id?>')">
                            </div>
                        </div>
                    </div>
                </div>
			<?php }} ?>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm navbar-light text-white black">
            <div class="row">
                Total Belanja : &nbsp;
                <div class="harga">
                    <?= toRupiah($total_bayar)?>
                </div>
            </div>
            <div class="row ml-auto">
                <button class="beli btn btn-success">Beli Sekarang</button>
            </div>
        </nav>

    <?php include "static/footer.php"; ?>
    <script>
    function deleteTrolly(id){
        
        // $.ajax({
        //     method:"POST",
        //     url:"deleteTrolly.php",
        //     data:{
        //         id:id,
        //         email:email
        //     }
        // })

    }

    function tambah(qty,id){
        qty = qty += 1;
        document.getElementById(`value-${id}`).value = qty;
    }

    function kurang(qty,id){
        qty--;
        if(qty<=0){
            qty=0
        }
        $(".angkaBeli").text(" "+qty+" ")
    }
    </script>
    <script src="/bootstrap/js/jquery.min.js"></script> <!-- Menambahkan tanda /  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
</body>
</html>