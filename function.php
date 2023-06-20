<?php 
session_start();
include "admin.php";

if(isset($_GET['act'])){
    switch ($_GET['act']){
        case 'thoat': 
            if(isset($_SESSION['role'])) unset($_SESSION['role']);
            include "index.php";
            break;
        default:
            include "index.php";
            break;
    }
}
?>