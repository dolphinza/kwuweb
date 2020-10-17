<?php
	include "config.php";
	session_start();
	if (!isset($_SESSION["email"])) {
		echo "<script>alert('Login terlebih dahulu !');window.location.href='index.php';</script>";
	}
	$msg = "";
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
		$q = $con->query("SELECT * FROM barang WHERE id_barang = '$id'");
		if ($q->num_rows > 0) {
			$email = $_SESSION['email'];
    		$q2 = $con->query("INSERT INTO trolly VALUES ('$email','$id')");
    		if ($q2) {
	    		$msg .= "Berhasil menambah barang ke trolly";
    			echo "<script>alert('$msg');window.location.href='index.php';</script>";
    		} else {
    			$msg .= "Barang sudah ada di trolly";
    			echo "<script>alert('$msg');window.location.href='index.php';</script>";
    		}
		} else {
    		$msg .= "Barang dengan id " . strval($_GET["id"]) . " tidak ada";
    		echo "<script>alert('$msg');window.location.href='index.php';</script>";
		}
	} else {
		echo "<script>alert('Invalid parameter');window.location.href='index.php';</script>";
	}
?>