<?php
include 'config.php';
$id = $_POST["id"];
$email = $_POST["email"];
$con->query("DELETE FROM trolly WHERE id='$id' and email='$email'");

?>