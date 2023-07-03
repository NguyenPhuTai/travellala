<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;
$route=mysqli_query($conn,"SELECT r.id_route,a.id_airport,b.id_airport,a.name_airport AS 'name airport go',b.name_airport AS'name airport come' FROM `route` r
  CROSS JOIN airport a ON r.id_airport_go = a.id_airport
  CROSS JOIN airport b ON r.id_airport_come = b.id_airport");
$dt = date("Y-m-d\\h:i:s");
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
    $route_2=$_POST['route'];

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
        
        $a=mysqli_query($conn,"INSERT INTO schedule(time,sum_time,fix_number_vip_1,fix_number_vip_2,
        fix_number_vip_3,price_number_vip_1,price_number_vip_2,price_number_vip_3,price_adult,price_child,price_baby,id_route)
         VALUES ('$time','$sumtime',$fixvip1,$fixvip2,$fixvip3,$gvip1,$gvip2,$gvip3,$gl1,$gl2,$gl3,$route_2)");
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
      <label for="disabledTextInput" class="form-label">Thời gian</label>
      <input name="time" type="datetime-local" class="form-control" placeholder="Thời gian" min="<?php echo $dt;?>" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tổng thời gian</label>
      <input name="sumtime" type="text" class="form-control" placeholder="Tổng thời gian" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Thương gia</label>
      <input name="fixvip1" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Thương gia" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông đặc biệt</label>
      <input name="fixvip2" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Phổ thông đặc biệt" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông</label>
      <input name="fixvip3" type="text"  class="form-control" placeholder="Số ghế còn lại hạng Phổ thông" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Thương gia</label>
      <input name="gvip1" type="text"  class="form-control" placeholder="Giá ghế hạng Thương gia" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông đặc biệt</label>
      <input name="gvip2" type="text"  class="form-control" placeholder="Giá ghế hạng Phổ thông đặc biệt" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông</label>
      <input name="gvip3" type="text"  class="form-control" placeholder="Giá ghế hạng Phổ thông">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé Người lớn</label>
      <input name="gl1" type="text"  class="form-control" placeholder="Giá vé Người lớn" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé trẻ em</label>
      <input name="gl2" type="text"  class="form-control" placeholder="Giá vé trẻ em" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Giá vé em bé</label>
      <input name="gl3" type="text"  class="form-control" placeholder="Giá vé em bé" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">route</label>
      <select name="route" id="">
        <?php foreach ($route as $key) {?>
        <option value="<?php echo $key['id_route'];?>"><?php echo $key['name airport go'].' - '.$key['name airport come'];?></option>
        <?php } ?>
      </select>
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>