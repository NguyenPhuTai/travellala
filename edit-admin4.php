<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edi($id);
$err=[];
if(isset($_POST['submit'])){
    $code=$_POST['code'];
    $time=$_POST['time'];
    $codea=$_POST['codea'];
    $sum=$_POST['sum'];
    $status=$_POST['Trạng thái'];

    if(empty($code)){
        $err[]="Không để trống Mã đặt chỗ";
    }
    if(empty($time)){
        $err[]="Không để trống Thời gian giao dịch";
    }
    if(empty($codea)){
        $err[]="Không để trống Mã admin xử lí";
    }
    if(empty($sum)){
        $err[]="Không để trống Tổng tiền";
    }

    if(empty($status)){
        $err[]="Không để trống Mã admin xử lí";
    }


    if(empty($err)){
        $a=mysqli_query($conn,"UPDATE transaction SET pnr_number=$code,date_transaction='$time',id_admin=$codea,sum_price='$sum',status=$status WHERE id_transaction=$id");
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
      <label for="disabledTextInput" class="form-label">Mã đặt chỗ</label>
      <input name="code" type="text" class="form-control" placeholder="Mã đặt chỗ" value="<?php echo $kq[0]['pnr_number'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thời gian giao dịch</label>
      <input name="time" type="datetime-local"  class="form-control" placeholder="Thời gian giao dịch" value="<?php echo $kq[0]['date_transaction']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Mã admin xử lí</label>
      <input name="codea" type="text"  class="form-control" placeholder="Mã admin xử lí" value="<?php echo $kq[0]['id_admin'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tổng tiền</label>
      <input name="sum" type="text"  class="form-control" placeholder="Tổng tiền" value="<?php echo $kq[0]['sum_price'] ?>">
    </div><div class="mb-3">
      <label for="disabledTextInput" class="form-label">Trạng thái</label>
      <?php $kq1=$kq[0]['status'] ?>
      <input name="status" type="text"  class="form-control" placeholder="Trạng thái" value="<?php echo ($kq1)==0?'Chưa thành công':'Thành công' ?>">
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>