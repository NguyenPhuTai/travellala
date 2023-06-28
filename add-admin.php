<?php 
require_once "config.php";
require_once "user.php";
$err=[];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $city=$_POST['city'];
    $code=$_POST['code'];
    if(empty($name)){
        $err[]="Không để trống tên sân bay";
    }
    if(empty($city)){
        $err[]="Không để trống tên thành phố";
    }
    if(empty($code)){
        $err[]="Không để trống code airport";
    }
    if(empty($err)){
        $a=mysqli_query($conn,"INSERT INTO airport(name_airport,city,code_airport) VALUES ('$name','$city','$code')");
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


<form method="POST">
 
    <legend>Thêm mới thông tin</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tên sân bay</label>
      <input name="name" type="text" class="form-control" placeholder="Tên sân bay" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thành phố</label>
      <input name="city" type="text"  class="form-control" placeholder="Thành phố" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Code Airport</label>
      <input name="code" type="text"  class="form-control" placeholder="Code Airport" >
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>