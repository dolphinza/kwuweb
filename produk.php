<?php 
$linkImg = "img/sepatu.jpg";
$namaProduk = "Nama Produk bla ...";
$txtPrice = "Rp. 40x.xxx";

?>

<img src="<?php echo $linkImg; ?>" class="card-img-top" alt="...">
<div class="card-body">
    <!-- karakter yang dapat di tampung card: 18 char -->
    <p class="card-text"><?php echo $namaProduk; ?></p>
    <p class="card-text price"><?php echo $txtPrice; ?></p>
</div>