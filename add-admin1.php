<?php

require_once "config.php";
require_once "user.php";

$id = !empty($_GET['id']) ? (INT)$_GET['id'] : 0;

$kq=edit1($id);
$err=[];
if(isset($_POST['submit'])){
    $code=$_POST['code'];
    $type=$_POST['type'];
    $img=$_POST['img'];
    $vip1=$_POST['vip1'];
    $vip2=$_POST['vip2'];
    $vip3=$_POST['vip3'];

    if(empty($code)){
        $err[]="Không để trống Code airport";
    }
    if(empty($type)){
        $err[]="Không để trống Kiểu máy bay";
    }
    if(empty($vip1)){
        $err[]="Không để trống Số ghế hạng Thương gia";
    }
    if(empty($vip2)){
        $err[]="Không để trống Số ghế hạng Phổ thông đặc biệt";
    }

    if(empty($vip3)){
        $err[]="Không để trống Số ghế hạng Phổ thông";
    }


    // Kiểm tra đã chọn file ảnh hay chưa
    if(empty($_FILES['img']['name'])) {
        $err[] ="Vui lòng chọn ảnh";
    } else {
        // Lấy thông tin của ảnh upload thông qua biến $_FILES
        $file_name = $_FILES['img']['name']; // Lấy ra tên file gốc ban đầu
        $file_type = $_FILES['img']['type']; // Lấy ra kiểu của file
        $file_tmp = $_FILES['img']['tmp_name']; // Lấy ra đường dẫn tạm thời của file
        $types = ['image/jpeg', 'image/png', 'image/jpg'];
        // Kiểm tra định dạng file có thuộc mảng $types không
        if(in_array($file_type, $types)) {
            // Di chuyển file từ thư mục tạm sang thư mục đích
            move_uploaded_file($file_tmp, 'img/'.$file_name);
            
        } else {
            $err[] = "Định dạng file không hợp lệ";
        }
    }

    // Kiểm tra có xảy ra lỗi hay không
    if(empty($err)) {
      
        
            $sql2 = "INSERT INTO flight(code_flight, type_air, img, number_vip_1,number_vip_2,number_vip_3) VALUES ('$code', '$type', '$file_name', $vip1,$vip2,$vip3)";

        
      


      

        $result2 = mysqli_query($conn, $sql2);
        if($result2) {
            //Điều hướng sang trang thông báo thành công
            header("Location: thanhcong.php");
        } else {
            header("Location: thatbai.php");
        }
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
<form method="POST" enctype="multipart/form-data">
 
    <legend>Thêm mới thông tin</legend>
    <?php if(count($err)) : ?>
    <div class="alert alert-danger">
        <?php foreach($err as $errr) : ?>
            <p><?php echo $errr; ?></p>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Code Airport</label>
      <input name="code" type="text" class="form-control" placeholder="Code Airport" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Kiểu máy bay</label>
      <input name="type" type="text"  class="form-control" placeholder="Kiểu máy bay" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Ảnh</label>
      <input name="img" type="file"  class="form-control" placeholder="Ảnh" >
      
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Thương gia</label>
      <input name="vip1" type="text"  class="form-control" placeholder="Số ghế hạng Thương gia" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Phổ thông đặc biệt</label>
      <input name="vip2" type="text"  class="form-control" placeholder="Số ghế hạng Phổ thông đặc biệt" >
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Phổ thông</label>
      <input name="vip3" type="text"  class="form-control" placeholder="Số ghế hạng Phổ thông" >
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>