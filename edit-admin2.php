<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edit3($id);
$err=[];
if(isset($_POST['submit'])){
    $time=$_POST['time'];
    $sumtime=$_POST['sumtime'];
    $fixvip1=$_POST['fixvip1'];
    $fixvip2=$_POST['fixvip2'];
    $fixvip3=$_POST['fixvip3'];
    $gvip1=$_POST['gvip1'];
    $gvip2=$_POST['gvip2'];
    $gvip3=$_POST['gvip3'];
    $gl1=$_POST['gl1'];
    $gl2=$_POST['gl2'];
    $gl3=$_POST['gl3'];

    if(empty($time)){
        $err[]="Không để trống Thời gian bay";
    }
    if(empty($sumtime)){
        $err[]="Không để trống Tổng thời gian bay";
    }
    if(empty($fixvip1)){
        $err[]="Không để trống Số ghế hạng Thương gia";
    }
    if(empty($fixvip2)){
        $err[]="Không để trống Số ghế Phổ thông đặc biệt";
    }
    if(empty($fixvip3)){
        $err[]="Không để trống Số ghế Phổ thông";
    }
    if(empty($gvip1)){
        $err[]="Không để trống Giá vé Thương gia";
    }
    if(empty($gvip2)){
        $err[]="Không để trống Giá vé Phổ thông đặc biệt";
    }
    if(empty($gvip3)){
        $err[]="Không để trống Giá vé Phổ thông";
    }

    if(empty($gl1)){
        $err[]="Không để trống Giá vé Người lớn";
    }
    if(empty($gl2)){
        $err[]="Không để trống Giá vé Trẻ em";
    }if(empty($gl3)){
        $err[]="Không để trống Giá vé Em bé";
    }

    if(empty($err)){
        $a=mysqli_query($conn,"UPDATE schedule SET time='$time', sum_time='$sumtime', fix_number_vip_1=$fixvip1,fix_number_vip_2=$fixvip2,fix_number_vip_3=$fixvip3,price_number_vip_1=$gvip1,price_number_vip_2=$gvip2,price_number_vip_3=$gvip3,price_adult=$gl1,price_child=$gl2,price_baby=$gl3 WHERE id=$id");
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
 
    <legend>Chỉnh sửa thông tin</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thời gian</label>
      <input name="time" type="text" class="form-control" placeholder="Thời gian" value="<?php echo $kq[0]['time'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tổng thời gian</label>
      <input name="sumtime" type="text" class="form-control" placeholder="Tổng thời gian" value="<?php echo $kq[0]['sum_time'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Thương gia</label>
      <input name="fixvip1" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Thương gia" value="<?php echo $kq[0]['fix_number_vip_1']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông đặc biệt</label>
      <input name="fixvip2" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Phổ thông đặc biệt" value="<?php echo $kq[0]['fix_number_vip_2']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông</label>
      <input name="fixvip3" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Phổ thông" value="<?php echo $kq[0]['fix_number_vip_3']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Thương gia</label>
      <input name="gvip1" type="text"  class="form-control" placeholder="Giá ghế hạng Thương gia" value="<?php echo $kq[0]['price_number_vip_1'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông đặc biệt</label>
      <input name="gvip2" type="text"  class="form-control" placeholder="Giá ghế hạng Phổ thông đặc biệt" value="<?php echo $kq[0]['price_number_vip_2'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông</label>
      <input name="gvip3" type="text"  class="form-control" placeholder="Giá ghế hạng Phổ thông" value="<?php echo $kq[0]['price_number_vip_3'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé Người lớn</label>
      <input name="gl1" type="text"  class="form-control" placeholder="Giá vé Người lớn" value="<?php echo $kq[0]['price_adult'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé trẻ em</label>
      <input name="gl2" type="text"  class="form-control" placeholder="Giá vé trẻ em" value="<?php echo $kq[0]['price_child'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé em bé</label>
      <input name="gl3" type="text"  class="form-control" placeholder="Giá vé em bé" value="<?php echo $kq[0]['price_baby'] ?>">
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>