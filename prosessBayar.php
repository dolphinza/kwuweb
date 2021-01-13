<?php
    session_start();
    include "config.php";
    if(isset($_POST['id_pembayaran'])) {
        $id_pembayaran = $_POST['id_pembayaran'];
        $id_barang = $_POST['id_barang'];
        $email = $_POST['email'];
        $ukuran_sepatu = $_POST['ukuran_sepatu'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $alamat = $_POST['alamat'];
        $jasa_pengiriman = $_POST['jasa_pengiriman'];
        $status = $_POST['status'];
        $q = $con->query("INSERT INTO pembayaran VALUES ('$id_pembayaran','$id_barang','$email','$ukuran_sepatu','$jumlah','$harga',now(),'$alamat','$jasa_pengiriman','$status')");
        $res = array();
        if($q) {
            $res['status'] = true;
            $res['msg'] = "Berhasil!";
        } else {
            $res['status'] = false;
            $res['msg'] = "Gagal!";
        }
        echo json_encode($res);
    }
?>