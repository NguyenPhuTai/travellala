<?php
require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$a=mysqli_query($conn,"DELETE FROM transaction WHERE id_transaction=$id");
if($a){
    header("Location: thanhcong.php");
}else{
    header("Location: thatbai.php");
}

?>
<link rel="short icon" href="photo/logo3.png">