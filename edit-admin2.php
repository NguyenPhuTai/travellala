<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
$airport = mysqli_query($conn, "SELECT * FROM airport WHERE id_airport=$id");
foreach ($airport as $a);
$schedule = mysqli_query($conn, "SELECT s.id_flight,s.id_airline,a.id_airport as 'id di',b.id_airport as 'id den',s.id,s.time, a.name_airport,s.sum_time,s.fix_number_vip_1,s.fix_number_vip_2,s.fix_number_vip_3,
s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.name_airport AS'san bay di',
b.name_airport AS'san bay den' FROM schedule s 
      CROSS JOIN route r ON s.id_route=r.id_route
      CROSS JOIN airport a ON r.id_airport_go=a.id_airport
      CROSS JOIN airport b ON r.id_airport_come=b.id_airport
      WHERE s.id=$id");
foreach ($schedule as $s);
$test = mysqli_query($conn, "SELECT s.id_flight,s.id_airline,s.id_route,s.id,r.id_airport_go,a.name_airport AS'san bay di',r.id_airport_come,b.name_airport AS'san bay den' FROM schedule s 
CROSS JOIN route r ON s.id_route=r.id_route
CROSS JOIN airport a ON r.id_airport_go=a.id_airport
CROSS JOIN airport b ON r.id_airport_come=b.id_airport
WHERE s.id=$id");
foreach ($test as $t);
$t1 = $t['id_airport_go'];
$t2 = $t['id_airport_come'];
$t3 = $t['id_route'];
$t4 = $t['id_flight'];
$t5 = $t['id_airline'];

$kq = edit3($id);
$err = [];

if (isset($_POST['submit'])) {

  $time = $_POST['time'];
  $sumtime = $_POST['sumtime'];
  $fixvip1 = $_POST['fixvip1'];
  $fixvip2 = $_POST['fixvip2'];
  $fixvip3 = $_POST['fixvip3'];
  $gvip1 = $_POST['gvip1'];
  $gvip2 = $_POST['gvip2'];
  $gvip3 = $_POST['gvip3'];
  $gl1 = $_POST['gl1'];
  $gl2 = $_POST['gl2'];
  $gl3 = $_POST['gl3'];
  $add1 = $_POST['add1'];
  $add2 = $_POST['add2'];
  $add4 = $_POST['add4'];
  $add5 = $_POST['add5'];
  if (empty($time)) {
    $err[] = "Không để trống Thời gian bay";
  }
  if (empty($sumtime)) {
    $err[] = "Không để trống Tổng thời gian bay";
  }
  if (empty($fixvip1)) {
    $err[] = "Không để trống Số ghế hạng Thương gia";
  }
  if (empty($fixvip2)) {
    $err[] = "Không để trống Số ghế Phổ thông đặc biệt";
  }
  if (empty($fixvip3)) {
    $err[] = "Không để trống Số ghế Phổ thông";
  }
  if (empty($gvip1)) {
    $err[] = "Không để trống Giá vé Thương gia";
  }
  if (empty($gvip2)) {
    $err[] = "Không để trống Giá vé Phổ thông đặc biệt";
  }
  if (empty($gvip3)) {
    $err[] = "Không để trống Giá vé Phổ thông";
  }
  if (empty($gl1)) {
    $err[] = "Không để trống Giá vé Người lớn";
  }
  if (empty($gl2)) {
    $err[] = "Không để trống Giá vé Trẻ em";
  }
  if (empty($gl3)) {
    $err[] = "Không để trống Giá vé Em bé";
  } 
  if (empty($add1)) {
    $err[] = "Không để trống Airport Đi";
  }
  if (empty($add2)) {
    $err[] = "Không để trống Airport Đến";
  }
  if (empty($add4)) {
    $err[] = "Không để trống ID Flight";
  }
  if (empty($add5)) {
    $err[] = "Không để trống ID Airline";
  }
  if (empty($err)) {
    $them_moi=mysqli_query($conn,"INSERT INTO `route` (`id_route`, `id_airport_go`, `id_airport_come`) VALUES (NULL, '$add1', '$add2');");
    $idmax=max_id2();
    $idmax2=$idmax[0]['id_route'];
    $a = mysqli_query($conn, "UPDATE schedule SET time='$time', 
    sum_time='$sumtime', fix_number_vip_1=$fixvip1,fix_number_vip_2=$fixvip2,
    fix_number_vip_3=$fixvip3,price_number_vip_1=$gvip1,price_number_vip_2=$gvip2,
    price_number_vip_3=$gvip3,price_adult=$gl1,price_child=$gl2,price_baby=$gl3,id_route=$idmax2 WHERE id=$id");
   // $b=mysqli_query($conn,"UPDATE `route` SET `id_airport_go` = '$add1', `id_airport_come` = '$add2',`id_route` = '98' WHERE `route`.`id_route` = '$t3';");
    
    $c=mysqli_query($conn,"UPDATE `schedule` SET `id_airline` = '$add5' WHERE `schedule`.`id` = '$id';");
    
    $d=mysqli_query($conn,"UPDATE `schedule` SET `id_flight` = '$add4' WHERE `schedule`.`id` = '$id';");
    header("Location: thanhcong.php");
  } else {
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
    <label for="disabledTextInput" class="form-label">Thời gian</label>
    <input name="time" type="datetime-local" class="form-control" placeholder="Thời gian" value="<?php echo $kq[0]['time'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Tổng thời gian</label>
    <input name="sumtime" type="text" class="form-control" placeholder="Tổng thời gian" value="<?php echo $kq[0]['sum_time'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Thương gia</label>
    <input name="fixvip1" type="text" class="form-control" placeholder="Số ghế còn lại hạng Thương gia" value="<?php echo $kq[0]['fix_number_vip_1']; ?> ">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông đặc biệt</label>
    <input name="fixvip2" type="text" class="form-control" placeholder="Số ghế còn lại hạng Phổ thông đặc biệt" value="<?php echo $kq[0]['fix_number_vip_2']; ?> ">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông</label>
    <input name="fixvip3" type="text" class="form-control" placeholder="Số ghế còn lại hạng Phổ thông" value="<?php echo $kq[0]['fix_number_vip_3']; ?> ">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Thương gia</label>
    <input name="gvip1" type="text" class="form-control" placeholder="Giá ghế hạng Thương gia" value="<?php echo $kq[0]['price_number_vip_1'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông đặc biệt</label>
    <input name="gvip2" type="text" class="form-control" placeholder="Giá ghế hạng Phổ thông đặc biệt" value="<?php echo $kq[0]['price_number_vip_2'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông</label>
    <input name="gvip3" type="text" class="form-control" placeholder="Giá ghế hạng Phổ thông" value="<?php echo $kq[0]['price_number_vip_3'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé Người lớn</label>
    <input name="gl1" type="text" class="form-control" placeholder="Giá vé Người lớn" value="<?php echo $kq[0]['price_adult'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé trẻ em</label>
    <input name="gl2" type="text" class="form-control" placeholder="Giá vé trẻ em" value="<?php echo $kq[0]['price_child'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé em bé</label>
    <input name="gl3" type="text" class="form-control" placeholder="Giá vé em bé" value="<?php echo $kq[0]['price_baby'] ?>">
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Airport Đi</label>
    <br>
    <!-- <input name="add2" type="text" class="form-control" placeholder="Airport Đi" value="<?php echo $s['id di'] . ' - ' . $s['san bay di']; ?>"> -->
    <select id="class" name="add1">
      <option value="<?php echo $t1; ?>"><?php echo $s['id di'] . ' - ' . $s['san bay di']; ?></option>
      <?php

      $sql = "SELECT * FROM airport";

      $result = mysqli_query($conn, $sql);
      foreach ($result as $class) : ?>
        <option value='<?php echo $class['id_airport']; ?>'><?php echo $class['id_airport'] . ' - ' . $class['name_airport']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Airport Đến</label>
    <br>
    <select id="class" name="add2">
      <option value="<?php echo $t2; ?>"><?php echo $s['id den'] . ' - ' .  $s['san bay den']; ?></option>
      <?php

      $sql = "SELECT * FROM airport";

      $result = mysqli_query($conn, $sql);
      foreach ($result as $class) : ?>
        <option value="<?php echo $class['id_airport']; ?>"><?php echo $class['id_airport'] . ' - ' . $class['name_airport']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">ID Flight</label>
    <br>
    <select id="class" name="add4">
      <option value="<?php echo $t4; ?>"><?php echo $s['id_flight'];?></option>
      <?php

      $sql = "SELECT * FROM flight";

      $result = mysqli_query($conn, $sql);
      foreach ($result as $class) : ?>
        <option value="<?php echo $class['id_flight']; ?>"><?php echo $class['id_flight'] . ' - ' . $class['code_flight']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">ID Airline</label>
    <br>
    <select id="class" name="add5">
      <option value="<?php echo $t5; ?>"><?php echo $s['id_airline'];?></option>
      <?php

      $sql = "SELECT * FROM airline";

      $result = mysqli_query($conn, $sql);
      foreach ($result as $class) : ?>
        <option value="<?php echo $class['id_airline']; ?>"><?php echo $class['id_airline'] . ' - ' . $class['name_airline']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>


  <br>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>