<?php
	header('Content-Type: application/json');
	include "config.php";
	session_start();
	$result = array();
	$email = $_SESSION['email'];
	$id = $_POST['id'];
	$tipe = $_POST['type'];
	if ($tipe == "hapus") {
		$q = $con->query("DELETE FROM wishlist WHERE id_barang='$id' AND email='$email'");
		if ($q) {
			$result["result"] = "Berhasil hapus!";
			$result["resp"] = true;
		} else {
			$result["result"] = "Gagal hapus !";
			$result["resp"] = false;
		}
	} else if ($tipe == "tambah") {
		$q = $con->query("INSERT INTO trolly VALUES ('$email','$id')");
		if ($q) {
			$result["result"] = "Berhasil menambah ke trolly";
			$result["resp"] = true;
		} else {
			$result["result"] = "Barang sudah ada di trolly !";
			$result["resp"] = false;
		}
	}

	echo json_encode($result);
?>