<?php
    include_once('header.php');
    require_once('config.php');
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = md5($_POST['password']);
        $result=mysqli_query($conn,"INSERT INTO `customer` (`id_customer`, `name_customer`, `number_customer`, `email`, `password`) VALUES (NULL, '$name', '$phone', '$email', '$password')");
        if($result){
            header('location: index.php');
            // echo "Đăng kí thành công";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            font-size: 24px;
            font-weight: 700;
        }
        h3{
            font-size: 20px;
            font-weight: 700;
        }
        body{
            font-family:  Godwit,MuseoSans,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;
            font-weight: 550;
            font-size: 16px;
        }
        .container{
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }
        .left-body{
            flex:0 30%;

        }
        .right-body{
            flex:0 60%;
            display: flex;
            flex-direction: column;


        }
        .btn-primary{
            width: 100%;
        }
        .right-body-banner{
            display: flex;
            flex-wrap:wrap ;
            justify-content: space-between;
        }
        .banner{
            flex:0 45%;
            margin: 1%;
        }
        .icon{
            max-width: 70px;
            max-height: 70px;
        }
    </style>
</head>
<body>
    <div class="container">
    
        <div class="right-body">
            <div class="">
                <h1>Đăng ký thành viên của Travellala và trải nghiệm ưu đãi hấp dẫn!</h1>
                <h3>Thật nhanh và an toàn, hãy đăng ký ngay để được:</h3>
            </div>
            <div class="right-body-banner">
                <div class="banner">
                    <img src="icon/icon-phone.png" alt="" class="icon">
                    <h3>Nhận thưởng cho mỗi lần đặt vé</h3>
                    <p>Tích điểm cho mỗi đặt vé máy bay. Quy đổi để du lịch tiết kiệm hơn! </p>
                    <a href="">tìm hiểu thêm.</a>
                </div>
                <div class="banner">
                <img src="icon/icon-convenient.png" alt="" class="icon">
                    <h3>Tiện lợi ngay cả sau khi đặt vé</h3>
                    <p>Xem vé điện tử và phiếu thanh toán khi không có kết nối mạng. Hoàn tiền hoặc đổi lịch dễ dàng khi bạn phải thay đổi kế hoạch.</p>
                    <a href="">tìm hiểu thêm.</a>
                </div>
                <div class="banner">
                <img src="icon/icon-pay.png" alt="" class="icon">
                    <h3>Thanh toán không cần thẻ với travelalaPay</h3>
                    <p>Lưu thông tin thẻ trong My Cards để thanh toán an toàn và thuận tiện cho lần sau.</p>
                    <a href="">tìm hiểu thêm.</a>
                </div>
                <div class="banner">
                <img src="icon/icon-adventure.png" alt="" class="icon">
                    <h3>Trải nghiệm đặt vé suôn sẻ</h3>
                    <p>Tính năng Thông báo giá giúp bạn dễ dàng đặt vé vào thời điểm thích hợp nhất. Điền thông tin hành khách trong nháy mắt với Passenger Quick Pick. </p>
                    <a href="">tìm hiểu thêm.</a>
                </div>
            </div>
        </div>
        <div class="left-body">
            <form action="" method="POST" role="form">
                <h1>Đặng ký thành viên Travellala</h1>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="tel" class="form-control" id="" placeholder="Phone" name="phone" required pattern="[0-9]{4}[0-9]{3}[0-9]{3}">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" placeholder="Username" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" placeholder="Password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Đăng ký</button>
            </form>
        </div>
    </div>
<?php
    include_once('footer.php');
?>
