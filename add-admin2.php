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
    $airport =mysqli_query($conn,"");
    $airport_go= $_GET[''];
    $airport_come=$_GET[''];
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
  }
  
$id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
$airport= mysqli_query($conn,"SELECT * FROM airport WHERE id_airport=$id");
foreach($airport as $a);
$schedule = mysqli_query($conn, "SELECT a.id_airport as 'id di',b.id_airport as 'id den',s.id,s.time, a.name_airport,s.sum_time,s.fix_number_vip_1,s.fix_number_vip_2,s.fix_number_vip_3,
s.price_number_vip_1,s.price_number_vip_2,s.price_number_vip_3,s.price_adult,s.price_child,s.price_baby,a.name_airport AS'san bay di',
b.name_airport AS'san bay den' FROM schedule s 
      CROSS JOIN route r ON s.id_route=r.id_route
      CROSS JOIN airport a ON r.id_airport_go=a.id_airport
      CROSS JOIN airport b ON r.id_airport_come=b.id_airport
      WHERE s.id=$id");
foreach($schedule as $s);
$test = mysqli_query($conn,"SELECT s.id,r.id_airport_go,a.name_airport AS'san bay di',r.id_airport_come,b.name_airport AS'san bay den' FROM schedule s 
CROSS JOIN route r ON s.id_route=r.id_route
CROSS JOIN airport a ON r.id_airport_go=a.id_airport
CROSS JOIN airport b ON r.id_airport_come=b.id_airport
WHERE s.id=$id");
// foreach($test as $t);
// $t1=$t['id_airport_go'];
// $t2=$t['id_airport_come'];



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
  if (empty($add2)) {
    $err[] = "Không để trống Airport Đến";
  }
  else{
    // //lấy thông tin trước khi xóa
    // $before_add=id_airport_1($add2);
    // $name_add=$before_add[0]['name_airport'];
    // $id_add=$before_add[0]['id_airport'];
    // $city_add=$before_add[0]['city'];
    // $code_add=$before_add[0]['code_airport'];
    // //
    // $si=$s['id den'];
    
    // $before_add=id_airport_1($si);
    //  $name_add1=$before_add[0]['name_airport'];
    //  $id_add1=$before_add[0]['id_airport'];
    //  $city_add1=$before_add[0]['city'];
    //  $code_add1=$before_add[0]['code_airport'];
    // //xóa trước khi update
    // $b0=mysqli_query($conn,"DELETE FROM airport  WHERE id_airport=$id_add");
    // // $b update bị trùng id khóa chính
    // $b=mysqli_query($conn,"UPDATE airport a SET a.id_airport=$id_add,a.name_airport='$name_add',a.city='$city_add',a.code_airport='$code_add'
    //  where a.id_airport=$si ");
    //  //khi đó thằng đầu tiên sẽ biến mất, thay vào đó là thông tin $b
    //  //thì phải thêm lại thằng đầu tiên để database không thiếu
     
    //  $b1=mysqli_query($conn,"INSERT INTO airport(name_airport,id_airport,city,code_airport)
    //  VALUES ('$name_add1', $id_add1,'$city_add1','$code_add1')");
  }
  if (empty($add1)) { //$add1 la` id
    $err[] = "Không để trống Airport Đi";
  }
  else{
    // //lấy thông tin trước khi xóa
    // $before_add=id_airport_1($add1);
    // $name_add=$before_add[0]['name_airport'];
    // $id_add=$before_add[0]['id_airport'];
    // $city_add=$before_add[0]['city'];
    // $code_add=$before_add[0]['code_airport'];
    // //
    // $sid=$s['id di'];
    
    // $before_add=id_airport_1($sid);
    //  $name_add1=$before_add[0]['name_airport'];
    //  $id_add1=$before_add[0]['id_airport'];
    //  $city_add1=$before_add[0]['city'];
    //  $code_add1=$before_add[0]['code_airport'];
    // //xóa trước khi update
    // $b0=mysqli_query($conn,"DELETE FROM airport  WHERE id_airport=$id_add");
    // // $b update bị trùng id khóa chính
    // $b=mysqli_query($conn,"UPDATE airport a SET a.id_airport=$id_add,a.name_airport='$name_add',a.city='$city_add',a.code_airport='$code_add'
    //  where a.id_airport=$sid ");
    //  //khi đó thằng đầu tiên sẽ biến mất, thay vào đó là thông tin $b
    //  //thì phải thêm lại thằng đầu tiên để database không thiếu
     
    //  $b1=mysqli_query($conn,"INSERT INTO airport(name_airport,id_airport,city,code_airport)
    //  VALUES ('$name_add1', $id_add1,'$city_add1','$code_add1')");
  }
  if(!empty($add1) && !empty($add2)){
    $a=mysqli_query($conn,"INSERT INTO route(id_airport_go,id_airport_come) VALUES ($add1,$add2)");
    $hi=route();
    $hihi=$hi['LastID'];
  }
  if (!empty($err)) {
    $b=mysqli_query($conn,"INSERT INTO schedule(time,sum_time,	fix_number_vip_1 ,fix_number_vip_2,fix_number_vip_3,
    price_number_vip_1,price_number_vip_2,price_number_vip_3,price_adult,price_child,price_baby,id_route) 
    VALUES ($time,$sumtime,$fixvip1,$fixvip2,$fixvip3,$gvip1,$gvip2,$gvip3 ,$gl1,$gl2,$gl3,$hihi) ");
  }


 
  // if ($a && $b) {
  //   header("Location: thanhcong.php");
  // } else {
  //   header("Location: thatbai.php");
  // }
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
    <input name="time" type="datetime-local" class="form-control" placeholder="Thời gian" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Tổng thời gian</label>
    <input name="sumtime" type="text" class="form-control" placeholder="Tổng thời gian" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Thương gia</label>
    <input name="fixvip1" type="text" class="form-control" placeholder="Số ghế còn lại hạng Thương gia" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông đặc biệt</label>
    <input name="fixvip2" type="text" class="form-control" placeholder="Số ghế còn lại hạng Phổ thông đặc biệt" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Số ghế còn lại hạng Phổ thông</label>
    <input name="fixvip3" type="text" class="form-control" placeholder="Số ghế còn lại hạng Phổ thông" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Thương gia</label>
    <input name="gvip1" type="text" class="form-control" placeholder="Giá ghế hạng Thương gia" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông đặc biệt</label>
    <input name="gvip2" type="text" class="form-control" placeholder="Giá ghế hạng Phổ thông đặc biệt" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá ghế hạng Phổ thông</label>
    <input name="gvip3" type="text" class="form-control" placeholder="Giá ghế hạng Phổ thông" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé Người lớn</label>
    <input name="gl1" type="text" class="form-control" placeholder="Giá vé Người lớn" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé trẻ em</label>
    <input name="gl2" type="text" class="form-control" placeholder="Giá vé trẻ em" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Giá vé em bé</label>
    <input name="gl3" type="text" class="form-control" placeholder="Giá vé em bé" >
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Airport Đi</label>
    <br>
    <!-- <input name="add2" type="text" class="form-control" placeholder="Airport Đi" value="<?php echo $s['id di'].' - ' . $s['san bay di']; ?>"> -->
    <select id="class" name="add1">
            <option value="">Chọn</option>
            <?php 
                
                $sql = "SELECT * FROM airport";
                
                $result = mysqli_query($conn, $sql);
                foreach ($result as $class) : ?>
                    <option value='<?php echo $class['id_airport']; ?>'><?php echo $class['id_airport'].' - ' .$class['name_airport']; ?></option>
            <?php endforeach; ?>
        </select>
  </div>
  <div class="mb-3">
    <label for="disabledTextInput" class="form-label">Airport Đến</label>
    <br>
    <!-- <input name="add1" type="text" class="form-control" placeholder="Airport Đến" value="<?php  $s['san bay den']; ?>">
  </div> -->
  <select id="class" name="add2">
            <option value="">Chọn</option>
            <?php 
                
                $sql = "SELECT * FROM airport";
            
                $result = mysqli_query($conn, $sql);
                foreach ($result as $class) : ?>
                    <option value="<?php echo $class['id_airport']; ?>" ><?php echo $class['id_airport'].' - ' . $class['name_airport']; ?></option>
            <?php endforeach; ?>
        </select>
        </div> 
  
  <br>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>