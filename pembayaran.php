<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            /* position: absolute; */
            top: 0;
            bottom: 0;
            width: 500px;
            height: 300px;
        }
    </style>
</head>
<?php
include "config.php";
date_default_timezone_set('Asia/Jakarta');
$date = date('mdY-His', time());
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
function toRupiah($angka){
    $hasilRupiah = "Rp. ".number_format($angka,0,',','.');
    return $hasilRupiah;
}
?>
<body>
    <div class="container mt-3">
        <div class="jumbotron">
            <h1 style="text-align: center;">DETAIL PEMBAYARAN</h1>
            <div class="alamatPengirim">
                <div class="row">
                    <div class="col-6">
                        <div id="map"></div>
                    </div>
                    <div class="col-6">
                        <h5>Alamat Pengiriman</h5>
                        <!-- <div id="alamat"></div> -->
                        <div class="area">
                            <textarea id="alamat" name="jalan" cols="60" rows="5" placeholder="Nama jalan rumahmu dan nomor rumah jika ada"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border: 5px solid white;border-radius: 5px;">
            <div class="barang">
                <div class="row">
                    <div class="col-2">
                        <img src="<?= $img?>" alt="puma" class="img-responsive img-fluid" style="width: 200px;height: 200px;">
                    </div>
                    <div class="col-5">
                        <div class="namaBarang">
                            <h5><?= $nama_barang?></h5>
                        </div>
                        <div class="totBarang">
                            <p style="color:darkgrey;"><?= $_GET['jumlah']?> barang</p>
                        </div>
                        <div class="harga">
                            <p style="font-weight: bold; color: red;">
                                <?php if ($diskon > 0) {
                                    echo toRupiah(($hasilDiskon*$_GET['jumlah']));
                                } else {
                                    echo toRupiah(($harga*$_GET['jumlah']));
                                } ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="jasa-pengirim">
                            <h6>Jasa Pengiriman</h6>
                        </div>
                        <div class="kurir form-groups">
                            <select name="pengirim" id="pengirim" class="form-control">
                                <option value="puma">KURIR PUMA</option>
                            </select>
                        </div>
                        <div class="estimasi">
                            <p>Estimasi : 2-4 Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="border: 5px solid white;border-radius: 5px;">
            <div class="ringkasan">
                <h5>Ringkasan Belanja</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="totHarga">Total Harga (<?= $_GET['jumlah']; ?> Barang)</div>
                    </div>
                    <div class="col-6">
                        <?php if ($diskon > 0) {
                            echo toRupiah(($hasilDiskon*$_GET['jumlah']));
                        } else {
                            echo toRupiah(($harga*$_GET['jumlah']));
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="totOngkos">Total Ongkos Kirim (Km)</div>
                    </div>
                    <div class="col-6">
                        Rp 10.000
                    </div>
                </div>
            </div>
            <hr style="border: 5px solid white;border-radius: 5px;">
            <div class="pembayaran">
                <div class="row">
                    <div class="col-9">
                        <h5>Total Tagihan</h5>
                        <div class="harga">
                            <h5><?php if ($diskon > 0) {
                                    echo toRupiah(($hasilDiskon*$_GET['jumlah'])+10000);
                                } else {
                                    echo toRupiah(($harga*$_GET['jumlah'])+10000);
                                } ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button id="bayar" class="btn btn-success" style="width: 100%;">Bayar Sekarang!</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="mapAlamat.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        $("button#bayar").click(function(){
            var alamat = $("textarea#alamat").val();
            var jasa_pengiriman = $("select#pengirim").val()
            if(alamat == "") {
                alert("Mohon diisi alamat tujuan");
            } else {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah informasi sudah benar?",
                    icon: 'question',
                    showCancelButton: true,
                    allowOutsideClick:false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    console.log(result)
                    if (result.isConfirmed) {
                        $.ajax({
                            type:"POST",
                            url:"prosessBayar.php",
                            dataType:"JSON",
                            data: {
                                id_pembayaran: "<?= $_GET['id']; ?>-<?=$date?>",
                                id_barang: "<?= $_GET['id']; ?>",
                                email: "<?= $_SESSION['email'];?>",
                                ukuran_sepatu: "<?= $_GET['ukuran'] ?>",
                                jumlah: "<?= $_GET['jumlah'];?>",
                                harga: "<?php if ($diskon > 0) {echo ($hasilDiskon*$_GET['jumlah'])+10000;} else {echo ($harga*$_GET['jumlah'])+10000;} ?>",
                                alamat: alamat,
                                jasa_pengiriman: jasa_pengiriman,
                                status: '0'
                            },
                            success: function(s) {
                                if (s.status) {
                                    window.location.href = "paymentSuccess.php";
                                }
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        })
                    }
                })
            }
        })
    </script>
</body>
</html>