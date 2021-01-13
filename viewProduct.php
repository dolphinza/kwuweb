<?php
include "config.php";
session_start();
if(!isset($_GET["id"])) {
    echo "<script>alert('Invalid parameter');window.location.href='index.php';</script>";
}
$id = "".strval($_GET["id"]);
$q = $con->query("SELECT * FROM barang WHERE id_barang = '$id'");
if ($q->num_rows > 0) {
    $data = $q->fetch_array();
    $img = "img/".$data["path"];
    $nama_barang = $data["nama_barang"];
    $jumlah = $data["jumlah"];
    $harga = $data["harga"];
    $diskon = $data["diskon"];
    $hitungDiskon = ($harga*($diskon/100));
    $hasilDiskon = $harga - $hitungDiskon;
    $deskripsi = $data["keterangan"];
} else {
    $msg = "Barang dengan id " . strval($_GET["id"]) . " tidak ada";
    echo "<script>alert('$msg');window.location.href='index.php';</script>";
}

if (isset($_POST["submitUlasan"])) {
    if (isset($_SESSION['email'])) {
        $ulasan = $_POST['ulasanInput'];
        $email = $_SESSION['email'];
        $q = $con->query("INSERT INTO ulasan(id_barang,email,ulasan,tanggal) VALUES ('$id','$email','$ulasan',now())");
        if($q) {
            echo "<script>alert('Berhasil menambah ulasan');window.location.href='viewProduct.php?id='+$id;</script>";
        } else {
            echo "<script>alert('Gagal menambah ulasan');window.location.href='viewProduct.php?id='+$id;</script>";
        }
    } else {
        unset($_POST['submitUlasan']);
        echo "<script>alert('Login terlebih dahulu');location.reload();</script>";
    }
    unset($_POST['submitUlasan']);
}
?>
<?php
function toRupiah($angka){
    $hasilRupiah = "Rp. ".number_format($angka,0,',','.');
    return $hasilRupiah;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- CSS Online -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- CSS Offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/univstyle.css">
    <link rel="stylesheet" href="bootstrap/css/allmobileview.css">
    <link rel="stylesheet" href="bootstrap/css/loader.css">

    <title>viewProduct</title>
</head>

<body>

    <?php include "static/header.php"; ?>

    <!-- main content viewProduct -->
    <div class="container">

        <!-- produk picture and mini description -->
        <div class="row mt-4">

            <!-- (bagian kiri) bagian gambar produk dan 3 versi mini gambar produk -->
            <?php
                $img1 = "img/sepatu.jpg";
                $img2 = "img/shoes.jpg";
                $img3 = "img/shoes2.jpeg";
            ?>
            <div class="col">
                <div class="">
                <img src="<?= $img?>" class="border main-image" alt="" ><!-- width="360" -->
                </div>
                <div class="mt-3 mb-2">
                    <div class="row mr-2 p-2 pl-0">
                        <div class="col">
                            <img class="border border-dark item-img-1 img-thumbnail" src="<?php echo $img; ?>" alt="" style="width: 100px; height: 80px;">
                        </div>  
                        <div class="col">
                            <img class=" item-img-2 img-thumbnail" src="<?php echo $img; ?>" alt="" style="width: 100px; height: 80px;">
                        </div>
                        <div class="col">
                            <img class=" item-img-3 img-thumbnail" src="<?php echo $img; ?>" alt="" style="width: 100px; height: 80px;">
                        </div>
                    </div>
                </div>

                <!-- <ul>
                    <li class="img-thumbnail img-list "></li>
                    <li class="img-thumbnail img-list mr-2 mt-2 mb-2"><img src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;"></li>
                    <li class="img-thumbnail img-list mr-2 mt-2 mb-2"><img src="img/sepatu.jpg" alt="" style="width: 120px; height: 80px;"></li>
                </ul> -->
            </div>

            <!-- bagian kanan (judul produk, harga, discount, jumlah) -->
            <div class="col mt-5">

                <!-- bagian judul produk -->
                <h3 class="mt-4 product-title"><?php echo $nama_barang; ?></h3>
                <div class="line-space-price"></div>

                <!-- bagian Harga dan discount -->
                <!-- rumus diskon harga x diskon/100 -->
                <!-- jika diskon 0 maka tidak masuk kondisi -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Harga</h6>
                    </div>

                    <div class="col">

                        <!-- bagian yang menampilkan discount dan potongan harganya -->
                        <!-- bisa disembunyikan menggunakan style -->
                        <?php
                            if($diskon > 0){
                                echo '<div class="row hidden title-discount">'.
                                '<div class="discountbox">'.$diskon.'%</div>'.
                                '<del>'.toRupiah($harga).'</del>'.
                                '<div class="col"></div>'.
                                '<div class="col"></div>'.
                                '</div>';
                            }
                        ?>

                        <!-- bagian harga barang -->
                        <div class="row">
                            <?php
                                if($diskon > 0){
                                    echo '<h3 class="text-success price">'.toRupiah($hasilDiskon).'</h3>';
                                }
                                else{
                                    echo '<h3 class="text-success price">'.toRupiah($hasilDiskon).'</h3>';
                                }
                            ?>
                        </div>

                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian jumlah -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Jumlah</h6>
                    </div>

                    <div class="col">
                        <?php if($jumlah == 0) { ?>
                            <p class="stok-null">stok habis</p>
                        <?php } else { ?>
                            <input type="number" name="jumlahBarang" id="jumlahBeli" min="1" max="<?php echo $jumlah; ?>" >
                        <?php } ?>
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian info produk -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">Info Produk</h6>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: normal;">Berat</h6>
                                <h6>1kg</h6>
                            </div>
                            <div class="col">
                                <h6 style="font-weight: normal;">Asuransi</h6>
                                <h6>Ya</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>
                <div class="line-space-price"></div>

                <!-- bagian ukuran sepatu -->
                <div class="row mt-2">
                    <div class="col">
                        <h6 class="title-mini-product">ukuran</h6>
                    </div>

                    <!-- option for select length -->
                    <div class="col">
                        <select class="form-control" name="ukuran" id="ukuran">
                            <option selected>Pilih ukuran</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="5.5">5.5</option>
                            <option value="6">6</option>
                            <option value="6.5">6.5</option>
                            <option value="7">7</option>
                            <option value="7.5">7.5</option>

                        </select>
                    </div>

                    <div class="col"></div> <!-- pemberi space di sisi kanan bagian harga -->
                </div>

            </div>
        </div> 

        <!-- bagian deskripsi produk dan review konsumen-->
        <div class="row my-5 container">
            <!-- navigasi pengontrol pilihan (deskripsi atau ulasan) -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">Deskripsi</a>
                    <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">Ulasan</a>
                </div>
            </nav>

            <!-- Isi dari navigasi deskripsi dan ulasan (review) -->
            <div class="tab-content" id="nav-tabContent">
                
                <!-- Isi deskripsi -->
                <div class="bg-light tab-pane fade show active p-4" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                <?php echo $deskripsi; ?>
                </div>
                
                <!-- isi ulasan (max 150 karakter untuk isi ulasan dan max ulasan yang ditampilkan 3 kolom) -->
                <div class="bg-light tab-pane fade p-4" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">

                    <!-- ulasan dari pengguna, terdapat nama, tanggal, isi ulasan -->
                    <?php
                        include "config.php";
                        $q = $con->query("SELECT * FROM ulasan");
                        if ($q->num_rows > 0 ) {
                            while($data = $q->fetch_array()) {
                                $email = $data['email'];
                                $q2 = $con->query("SELECT * FROM akun WHERE email= '$email'");
                                $data2 = $q2->fetch_array();
                    ?>
                    <div class="ulas mt-2 p-3 bg-white">
                        <div class="container">
                            <div class="row">
                                <h6><?php echo $data2["nama"];?></h6>   
                            </div>
                            <div class="row"> 
                                <p><?php echo date( 'd F Y ', strtotime($data['tanggal']) );?></p>
                            </div>
                            <div class="row">
                                <i><?php echo $data["ulasan"];?></i>
                            </div>
                            </div>
                    </div>
                   <?php } ?>
                    
                    <div class=" row container mt-2">
                        <div class="show-more btn text-info" style="display:none;cursor: pointer;">Show more</div>
                    </div>

                    <?php } ?>

                    <!-- Form membuat ulasan -->
                    <form method="POST">
                        <div class="row container">
                            <h6 class="ml-2 mt-5"><label for="exampleFormControlTextarea1">Masukan ulasan</label></h6>
                            <textarea class="form-control" name="ulasanInput" rows="3"></textarea>
                            <input type="submit" name="submitUlasan" class="btn btn-dark mt-3 ml-2" value="Kirim ulasan"></input>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="row my-5 py-5"><i></i></div> <!-- Jarak antara desc/review dan Menu WBT  --> 
    </div>

    <!-- footer for wishlist, beli, and tambah trolly (Menu WBT)-->
    <div class="sub-foot pt-1 pb-2">
        <div class="container">
            <ul>
                <li class="ftright"><a class="btn btn-dark mr-1" id="btn-trolly" style="color:white">Tambah Ke Trolly</a></li>
                <li class="ftright"><a class="btn mr-1 btn-beli" id="btn-beli"> Beli </a></li>
                <li class="ftright"><a class="btn mr-1 w-love" href="<?php echo 'wishlist.php?id='.$id ?>"><i class="fa fa-heart" style="color: red;"
                            aria-hidden="true"></i></a></li>
                <!-- <li class="ftright"><a class="btn mr-2 w-love" href="#"><i class="fa fa-heart-o" style="color: red;" aria-hidden="true"></i></a></li> -->
                <li class="ftright mr-4">
                    <div class="row">
                        <div style="font-size: 12px">Harga</div>
                    </div>
                    <div class="row">
                        <?php
                            if($diskon > 0){
                                echo '<h6 class="text-success">'.toRupiah($hasilDiskon).'</h6>';
                            }else{
                                echo '<h6 class="text-success" style="font-weight:bold;">'.$harga.'</h6>';
                            }
                        ?>
                    </div>
                </li>

            </ul>

        </div>
    </div>


    <!-- CDN Offline -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/showMore.js"></script>
    <!-- Gak guna, hanya nambah lama load halaman <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script> -->
    <script>
        $(window).on('load', function(){
            $('.se-pre-con').fadeOut("slow");
        });
    </script>
    <!-- JS untuk slide gambar produk -->
    <script>
        $(document).ready(function () {
            
            $('.item-img-1').click(function () {
                $('.main-image').attr('src', '<?php echo $img1; ?>');
                $('.item-img-1').addClass('border border-dark');

                $('.item-img-2').removeClass('border border-dark');
                $('.item-img-3').removeClass('border border-dark');
                $('.item-img-4').removeClass('border border-dark');
            });
            $('.item-img-2').click(function () {
                $('.main-image').attr('src', '<?php echo $img2; ?>');
                $('.item-img-2').addClass('border border-dark');

                $('.item-img-1').removeClass('border border-dark');
                $('.item-img-3').removeClass('border border-dark');
                $('.item-img-4').removeClass('border border-dark');
            });
            $('.item-img-3').click(function () {
                $('.main-image').attr('src', '<?php echo $img3; ?>');
                $('.item-img-3').addClass('border border-dark');

                $('.item-img-1').removeClass('border border-dark');
                $('.item-img-2').removeClass('border border-dark');
                $('.item-img-4').removeClass('border border-dark');
            });
            $('.item-img-4').click(function () {
                $('.main-image').attr('src', '<?php echo $img3; ?>');
                $('.item-img-4').addClass('border border-dark');

                $('.item-img-1').removeClass('border border-dark');
                $('.item-img-2').removeClass('border border-dark');
                $('.item-img-3').removeClass('border border-dark');
            });
            const btnTrolly = $("a#btn-trolly");
            let ukuranSepatu = "";
            let qty = "";
            $("#ukuran").on("change",function(){
                qty = document.getElementById("jumlahBeli").value;
                ukuranSepatu = $("#ukuran option:selected").attr("value");
            })
            $("#btn-beli").click(function(){
                var jumlah = $("input#jumlahBeli").val();
                var ukuran = $("select#ukuran").val();
                if (jumlah == "") {
                    alert("Masukkan jumlah barang");
                } else if (ukuran == "Pilih ukuran") {
                    alert("Masukkan ukuran barang")
                } else {
                    window.location.href = `pembayaran.php?id=<?= $id?>&jumlah=${jumlah}&ukuran=${ukuran}`;
                }
            })
            btnTrolly.click(function(){
                window.location.href = `trolly.php?id=<?= $id?>&ukuranSepatu=${ukuranSepatu}&qty=${qty}`;
            })
        })
    </script>

</body>

</html>