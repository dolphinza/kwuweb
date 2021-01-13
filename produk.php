<?php 
include "config.php";
$id_barang = "P".strval($i+1);
$q = $con->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
$data = $q->fetch_array();
$linkImg = "img/".$data["path"];
$namaProduk = $data["nama_barang"];
$txtPrice = $data["harga"];
$diskon = $data["diskon"];
$hitungDiskon = ($txtPrice*($diskon/100));
$hasilDiskon = $txtPrice - $hitungDiskon;
?>


<img src="<?php echo $linkImg; ?>" class="card-img-top" alt="...">
<div class="card-body">
    <!-- karakter yang dapat di tampung card: 18 char -->
    <p class="card-text"><?php echo $namaProduk; ?></p>
    <?php if($diskon >0){
        echo '<div class="row title-discount">'.
        '<div class="discountbox">'.$diskon.'%</div>'.
        '<del>'."Rp. ".number_format($txtPrice,0,',','.').'</del>'.
        '<div class="col"></div>'.
        '<div class="col"></div>'.
        '</div>';
        echo '<p class="card-text price">'."Rp. ".number_format($hasilDiskon,0,',','.').'</p>';
    }else{
        echo '<p class="card-text price">'."Rp. ".number_format($txtPrice,0,',','.').'</p>';
    }

    ?>
</div>