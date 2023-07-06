<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edit24($id);
$err=[];
if(isset($_POST['submit'])){
    $ids=$_POST['ids'];
    $idc=$_POST['idc'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $time=$_POST['time'];
    $status=$_POST['status'];
    

    // if(empty($name)){
    //     $err[]="Không để trống tên Admin";
    // }
    // if(empty($email)){
    //     $err[]="Không để trống Email";
    // }
    // if(empty($password)){
    //     $err[]="Không để trống Mật khẩu";
    // }
    // if(empty($role)){
    //     $err[]="Không để trống Trạng thái";
    // }
    $a=mysqli_query($conn,"INSERT INTO booking_ticket(id_schedule, id_customer,phone,email,time,status) VALUES ('$ids','$idc','$phone','$email','$time','$status') ");
  
    if(empty($err)){
       
    }
    if($a){
        header("Location: thanhcong.php");
    }else{
        header("Location: thatbai.php");
    }
}




?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="short icon" href="photo/logo3.png">

<form method="POST">
 
    <legend>Chỉnh sửa thông tin</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">ID Schedule</label>
      <input name="ids" type="text" class="form-control" placeholder="ID Schedule" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Mã khách hàng</label>
      <input name="idc" type="text"  class="form-control" placeholder="Mã khách hàng" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số điện thoại</label>
      <input name="phone" type="text"  class="form-control" placeholder="Số điện thoại" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Email</label>
      <input name="email" type="text"  class="form-control" placeholder="Email" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thời gian bay</label>
      <input name="time" type="datetime-local"  class="form-control" placeholder="Thời gian bay" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Trạng thái</label>
      <select name="status" id="">
      <option value="">--Chọn--</option>
        <option value="0">Chưa hoạt động </option>
        <option value="1">Hoạt động</option>
      </select>
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>