<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edit11($id);
$err=[];
if(isset($_POST['submit'])){
    $name=$_POST['name'];

    if(empty($name)){
        $err[]="Không để trống Loại máy bay";
    }

    if(empty($err)){
        $a=mysqli_query($conn,"UPDATE airline SET name_airline='$name' WHERE id_airline=$id");
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
      <label for="disabledTextInput" class="form-label">Loại máy bay</label>
      <input name="name" type="text" class="form-control" placeholder="Loại máy bay" value="<?php echo $kq[0]['name_airline'] ?>">
</div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>