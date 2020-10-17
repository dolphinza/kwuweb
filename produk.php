<?php 
include "config.php";
$id_barang = "P".strval($i+1);
$q = $con->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
$data = $q->fetch_array();
$linkImg = "img/".$data["path"];
$namaProduk = $data["nama_barang"];
$txtPrice = $data["harga"];
?>

<img src="<?php echo $linkImg; ?>" class="card-img-top" alt="...">
<div class="card-body">
    <!-- karakter yang dapat di tampung card: 18 char -->
    <p class="card-text"><?php echo $namaProduk; ?></p>
    <p class="card-text price"><?php echo $txtPrice; ?></p>
</div>