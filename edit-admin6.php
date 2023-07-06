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
    $a=mysqli_query($conn,"UPDATE booking_ticket SET id_schedule='$ids', id_customer='$idc',phone ='$phone',email='$email',time='$time',status='$status'
     WHERE pnr_number=$id");
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
      <input name="ids" type="text" class="form-control" placeholder="ID Schedule" value="<?php echo $kq[0]['id_schedule'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Mã khách hàng</label>
      <input name="idc" type="text"  class="form-control" placeholder="Mã khách hàng" value="<?php echo $kq[0]['id_customer']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số điện thoại</label>
      <input name="phone" type="text"  class="form-control" placeholder="Số điện thoại" value="<?php echo $kq[0]['phone'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Email</label>
      <input name="email" type="text"  class="form-control" placeholder="Email" value="<?php echo $kq[0]['email'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thời gian bay</label>
      <input name="time" type="datetime-local"  class="form-control" placeholder="Thời gian bay" value="<?php echo $kq[0]['time'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Trạng thái</label>
      <select name="status" id="">
      <option value="<?php echo $status ?>"><?php echo $kq[0]['status']==0 ? "Chưa hoạt động":"Hoạt động" ?></option>
        <option value="0">Chưa hoạt động </option>
        <option value="1">Hoạt động</option>
      </select>
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>