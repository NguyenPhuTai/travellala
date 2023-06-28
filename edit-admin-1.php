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
    if(empty($_FILES['image']['name'])) {
        $upload = 'no'; // Không có sự upload file
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
            $upload = 'ok'; // Có sự upload file
        } else {
            $err[] = "Định dạng file không hợp lệ";
        }
    }

    // Kiểm tra có xảy ra lỗi hay không
    if(empty($err)) {
        // Kiểm tra xem có sự upload file mới không
        if($upload == 'ok') {
            $sql2 = "UPDATE flight SET code_flight = '$code', type_air = '$type', number_vip_1=$vip1,number_vip_2=$vip2,number_vip_3=$vip3, img = '$file_name' WHERE id_flight = $id";
        } else {
            $sql2 = "UPDATE flight SET code_flight = '$code', type_air = '$type', number_vip_1=$vip1,number_vip_2=$vip2,number_vip_3=$vip3 WHERE id_flight  = $id";

        }

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


<form method="POST">
 
    <legend>Chỉnh sửa thông tin</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Code Airport</label>
      <input name="code" type="text" class="form-control" placeholder="Code Airport" value="<?php echo $kq[0]['code_flight'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Kiểu máy bay</label>
      <input name="type" type="text"  class="form-control" placeholder="Kiểu máy bay" value="<?php echo $kq[0]['type_air']; ?> ">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Ảnh</label>
      <input name="img" type="file"  class="form-control" placeholder="Ảnh" value="<?php echo $kq[0]['img'] ?>">
      <img src="img/<?php echo $kq[0]['img']; ?>" width="50px" height="50px" alt="">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Thương gia</label>
      <input name="vip1" type="text"  class="form-control" placeholder="Số ghế hạng Thương gia" value="<?php echo $kq[0]['number_vip_1'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Phổ thông đặc biệt</label>
      <input name="vip2" type="text"  class="form-control" placeholder="Số ghế hạng Phổ thông đặc biệt" value="<?php echo $kq[0]['number_vip_2'] ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Số ghế hạng Phổ thông</label>
      <input name="vip3" type="text"  class="form-control" placeholder="Số ghế hạng Phổ thông" value="<?php echo $kq[0]['number_vip_3'] ?>">
    </div>
    <br>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</form>