<?php 
require_once "config.php";
require_once "user.php";
$err=[];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    if(empty($name)){
        $err[]="Không để trống Loại máy bay";
    }
    if(empty($err)){
        $a=mysqli_query($conn,"INSERT INTO airline(name_airline) VALUES ('$name')");
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
 
    <legend>Thêm mới thông tin</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Loại máy bay</label>
      <input name="name" type="text" class="form-control" placeholder="Tên sân bay" >
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>