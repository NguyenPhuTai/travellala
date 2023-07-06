<?php

use function PHPSTORM_META\sql_injection_subst;

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;
$kq=edi($id);
$kq2=ed();
$kq3=e();
$err=[];
if(isset($_POST['submit'])){
    $code=$_POST['code'];
    $time=$_POST['time'];
    $codea=$_POST['codea'];
    $sum=$_POST['sum'];
    $status=$_POST['status'];

    if(empty($code)){
        $err[]="Không để trống Mã đặt chỗ";
    }
    else{
        $kq22=$kq2[0]['pnr_number'];
        //echo $kq22;
        $b=mysqli_query($conn,"UPDATE `booking_ticket` SET `pnr_number` = '$code' WHERE `booking_ticket`.`pnr_number` = $kq22;");
    }
    if(empty($time)){
        $err[]="Không để trống Thời gian giao dịch";
    }
    if(empty($codea)){
        $err[]="Không để trống Mã admin xử lí";
    }
    else{
    //     echo '_'. $kq3[0]['id_admin'].' '.$codea;
    //     //lấy thông tin trước khi xóa
    // $before_add=id_admin_1($codea);
    // $name_admin=$before_add[0]['name_admin'];
    // echo $name_admin;
    // $id_admin=$before_add[0]['id_admin'];
    // $email=$before_add[0]['email'];
    // $password=$before_add[0]['password'];
    // $role=$before_add[0]['role'];
    // //
    // $si=$kq3[0]['id_admin'];
    
    // $before_add=id_admin_1($si);
    // $name_admin1=$before_add[0]['name_admin'];
    // echo $name_admin1;
    // $id_admin1=$before_add[0]['id_admin'];
    // $email1=$before_add[0]['email'];
    // $password1=$before_add[0]['password'];
    // $role1=$before_add[0]['role'];
    // // //xóa trước khi update
    // $b0=mysqli_query($conn,"DELETE FROM admin  WHERE id_admin=$id_admin");
    // // // $b update bị trùng id khóa chính
    // $b=mysqli_query($conn,"UPDATE admin a SET a.id_admin=$id_admin,a.name_admin='$name_admin',a.email='$email',a.password='$password',a.role='$role'
    //  where a.id_admin=$id_admin1");
    // //  //khi đó thằng đầu tiên sẽ biến mất, thay vào đó là thông tin $b
    // //  //thì phải thêm lại thằng đầu tiên để database không thiếu
     
    //  $b1=mysqli_query($conn,"INSERT INTO admin(name_admin,id_admin,email,password,role)
    //  VALUES ('$name_admin1', $id_admin1,'$email1','$password1',$role1)");


    // //     $kq33=$kq3[0]['id_admin'];
    // //     echo $kq33;
    // //     $a=mysqli_query($conn,"UPDATE `admin` SET `id_admin` = '$codea' WHERE `admin`.`id_admin` = '$kq33';");
    }
    if(empty($sum)){
        $err[]="Không để trống Tổng tiền";
    }

    if(empty($status)){
        $err[]="Không để trống Mã admin xử lí";
    }
    $ngu=mysqli_query($conn,"UPDATE transaction SET date_transaction='$time',sum_price='$sum',status='$status',id_admin=$codea,pnr_number=$code Where id_transaction=$id");

    if(empty($err)){
        
    }
    if($ngu){
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
      <select name="code" id="">
      <option value="<?php echo $kq2[0]['pnr_number'] ?>"><?php echo $kq2[0]['pnr_number'].' - ' . $kq2[0]['phone']; ?></option>
            <?php 
                
                $sql = "SELECT * FROM booking_ticket 
                ";
                
                $result = mysqli_query($conn, $sql);
                foreach ($result as $class) : ?>
                    <option value='<?php echo $class['pnr_number']; ?>'><?php echo $class['pnr_number'].' - ' .$class['phone']; ?></option>
            <?php endforeach; ?>
      </select>
      
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Thời gian giao dịch</label>
      <input name="time" type="datetime-local"  class="form-control" placeholder="Thời gian giao dịch" value="<?php echo $kq[0]['date_transaction'] ?>">
    </div>
    <div class="mb-3">

      <label for="disabledTextInput" class="form-label">Mã admin xử lí</label>
      <select name="codea" id="">
      <option value="<?php echo $kq3[0]['id_admin']; ?>"><?php echo $kq3[0]['id_admin'].' - ' . $kq3[0]['name_admin']; ?></option>
            <?php 
                
                $sql1 = "SELECT * FROM admin";
                
                $result1 = mysqli_query($conn, $sql1);
                foreach ($result1 as $class1) : ?>
                    <option value='<?php echo $class1['id_admin']; ?>'><?php echo $class1['id_admin'].' - ' .$class1['name_admin']; ?></option>
            <?php endforeach; ?>
      </select>
      

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tổng tiền</label>
      <input name="sum" type="text"  class="form-control" placeholder="Tổng tiền" value="<?php echo $kq[0]['sum_price'] ?>">
    </div><div class="mb-3">
      <label for="disabledTextInput" class="form-label">Trạng thái</label>
      <?php $kq1=$kq[0]['status'] ?>
      <select name="status" id="">
      <option value="<?php echo $status ?>"><?php echo $kq[0]['status']==0 ? "Chưa thành công":"Thành công" ?></option>
        <option value="0">Chưa thành công </option>
        <option value="1">Thành công</option>
      </select>
      
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>