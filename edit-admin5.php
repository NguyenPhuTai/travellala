<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edit23($id);
$err=[];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    if(empty($name)){
        $err[]="Không để trống tên Admin";
    }
    if(empty($email)){
        $err[]="Không để trống Email";
    }
    if(empty($password)){
        $err[]="Không để trống Mật khẩu";
    }
    if(empty($role)){
        $err[]="Không để trống Trạng thái";
    }
    $a=mysqli_query($conn,"UPDATE admin SET name_admin='$name', email='$email', password='$password',role='$role' WHERE id_admin=$id");
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
      <label for="disabledTextInput" class="form-label">Tên Admin</label>
      <input name="name" type="text" class="form-control" placeholder="Tên Admin" value="<?php echo $kq[0]['name_admin'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Email</label>
      <input name="email" type="text"  class="form-control" placeholder="Email" value="<?php echo $kq[0]['email']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Password</label>
      <input name="password" type="text"  class="form-control" placeholder="Password" value="<?php echo $kq[0]['password'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Trạng thái</label>
      <select name="role" id="">
      <option value="<?php echo $role ?>"><?php echo $kq[0]['role']==0 ? "Chưa hoạt động":"Hoạt động" ?></option>
        <option value="0">Chưa hoạt động </option>
        <option value="1">Hoạt động</option>
      </select>
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>